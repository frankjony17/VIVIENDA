<?php

namespace QuejasBundle\Controller;
use QuejasBundle\Entity\QuejaRespuesta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use QuejasBundle\Entity\Quejas;
use QuejasBundle\Entity\QuejaAcciones;

/**
 * @Route("quejas/")
 */
class QuejasController extends Controller
{
    /**
     * List All values from Quejas
     *
     * @Route("list")
     * @param Request $rq
     * @return Response
     */
    public function listAction(Request $rq)
    {
        $data = array();
        $criteria = array();
        $respuestaData = "";
        if(json_decode($rq->get('rechazada')) === true) {
            $criteria['quejasTipo'] = $this->getDoctrine()->getManager()->getRepository('NomencladorBundle:QuejasTipo')->findOneBy(array('nombre' => 'Rechazada'));
        } else if (json_decode($rq->get('rechazada')) === false) {
            $criteria['estado'] = json_decode($rq->get('estado'));
        }
        foreach($this->getDoctrine()->getManager()->getRepository('QuejasBundle:Quejas')->findBy($criteria) as $value ) {
            $estado = $value->getEstado();

            $respuesta = $this->getDoctrine()->getManager()->getRepository('QuejasBundle:QuejaRespuesta')->findOneBy(array(
                'queja' => $value
            ));
            if (json_decode($rq->get('rechazada')) === 'ALL') {
                $resp = $obsr = "";
                if (is_object($respuesta)) {
                    $resp = $respuesta->getRespuesta();
                    $obsr = $respuesta->getObservacion();
                    $estado = $respuesta->getEstado();
                } else {
                    $estado = false;
                }
                $respuestaData = "<table>";
                $respuestaData .="<tr><th>Respuesta</th><th>Observación</th></tr>";
                $respuestaData .="<tr><th>". $resp ."</th><th>". $obsr ."</th></tr>";
                $respuestaData .="</table>";
            }
            $data[] = array(
                'id' => $value->getId(), 
                'fecha' => $value->getFecha()->format('Y-m-d'),
                'estado' => $estado,
                'fecha_culminacion' => $value->getFechaCulminacion()->format('Y-m-d'),
                'cliente' => "<b>(". $value->getEntrevista()->getCliente()->getCi() ." - ". $value->getEntrevista()->getCliente()->getNombre() ." ". $value->getEntrevista()->getCliente()->getApellidos() .")</b> ". $value->getEntrevista()->getAsunto(),
                'entrevista_id' => $value->getEntrevista()->getId(),
                'quejas_tipo_id' => $value->getQuejasTipo()->getId(),

                'respuesta-id' => $respuesta ? $respuesta->getId() : "",
                'respuesta-data' => $respuestaData,
                'respuesta-respuesta' => $respuesta ? $respuesta->getRespuesta() : "",
                'respuesta-observacion' => $respuesta ? $respuesta->getObservacion() : ""
            );
        }
        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

    /**
     * List All values QuejasRespuestas
     *
     * @Route("respuesta/list")
     * @return Response
     */
    public function respuestaListAction()
    {
        $data = array();
        foreach($this->getDoctrine()->getManager()->getRepository('QuejasBundle:QuejaRespuesta')->findAll() as $value ) {
            $no = 0; $estadoAcciones = true;
            $respuestaData = "<table>";
            $respuestaData .="<tr><td>Respuesta</td><td>". $value->getRespuesta() ."</td></tr>";
            $respuestaData .="<tr><td>Observación</td><td>". $value->getObservacion() ."</td></tr>";
            $respuestaData .="</table>";
            $respuestaData .="<br>";
            $acciones = $this->getDoctrine()->getManager()->getRepository('QuejasBundle:QuejaAcciones')->findBy(array(
                'quejaRespuesta' => $value
            ));
            $respuestaData .="<table>";
            $respuestaData .="<tr><td>No</td><td>Nombre</td><td>Descripción</td></tr>";
            foreach ($acciones as $accion) {
                $respuestaData .="<tr><td>". ++$no ."</td><td>". $accion->getNombre() ."</td><td>". $accion->getDescripcion() ."</td></tr>";
            }
            $respuestaData .="</table>";
            $respuestaData .="<br>";
            $respuestaData .="<table>";
            $respuestaData .="<tr><td>Asunto</td><td>". $value->getQueja()->getEntrevista()->getAsunto() ."</td></tr>";
            $respuestaData .="<tr><td>Tramites</td><td>". $value->getQueja()->getEntrevista()->getTramitesRealizados() ."</td></tr>";
            $respuestaData .="<tr><td>Concluciones</td><td>". $value->getQueja()->getEntrevista()->getConcluciones() ."</td></tr>";
            $respuestaData .="</table>";

            $data[] = array(
                'id' => $value->getId(),
                'fecha' => $value->getQueja()->getFecha()->format('Y-m-d'),
                'cliente' => "<b>(". $value->getQueja()->getEntrevista()->getCliente()->getCi() ." - ". $value->getQueja()->getEntrevista()->getCliente()->getNombre() ." ". $value->getQueja()->getEntrevista()->getCliente()->getApellidos() .")</b> ". $value->getQueja()->getEntrevista()->getAsunto(),
                'respuesta' => $value->getRespuesta(),
                'observacion' => $value->getObservacion(),
                'estado' => $value->getEstado(),
                'respuesta-data' => $respuestaData
            );
        }
        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

    /**
     * Add or Edit Quejas.
     *
     * @Route("add-edit")
     * @param Request $rq
     * @return Response
     */
    public function addEditAction(Request $rq)
    {
        $em = $this->getDoctrine()->getManager();
        /* Add or Edit Entrevista */
        if ($rq->get('id')) {
            $entity = $em->getRepository('QuejasBundle:Quejas')->find($rq->get('id'));
        } else {
            $entity = new Quejas();
            $entity->setEstado(false);
        }
        /* Sets */
        $entity->setFecha(new \DateTime(date('Y-m-d')));
        $entity->setFechaCulminacion(new \DateTime($rq->get('fecha')));
        if (is_numeric($rq->get('tipo'))) {
            $entity->setQuejasTipo($em->getRepository('NomencladorBundle:QuejasTipo')->find($rq->get('tipo')));
        }
        if (is_numeric($rq->get('entrevista'))) {
            $entity->setEntrevista($em->getRepository('QuejasBundle:Entrevista')->find($rq->get('entrevista')));
        }
        $em->persist($entity);
        $em->flush();
        return new Response('');
    }

    /**
     * Remove
     *
     * @Route("remove")
     * @param Request $rq
     * @return Response
     */
    public function removeAction(Request $rq)
    {
        $em = $this->getDoctrine()->getManager();
        /* Delete Quejas */
        foreach (json_decode($rq->get('ids')) as $id) {
            $entity = $em->getRepository('QuejasBundle:Quejas')->find($id);
            $em->remove($entity);
        }
        return new Response($em->flush());
    }

    /**
     * Add or Edit Respuesta.
     *
     * @Route("respuesta/add-edit")
     * @param Request $rq
     * @return Response
     */
    public function respuestaAddEditAction(Request $rq)
    {
        $em = $this->getDoctrine()->getManager();
        /* Add or Edit Entrevista */
        if ($rq->get('id')) {
            $entity = $em->getRepository('QuejasBundle:QuejaRespuesta')->find($rq->get('id'));
        } else {
            $entity = new QuejaRespuesta();
            $entity->setEstado(false);
        }
        /* Sets */
        $entity->setRespuesta($rq->get('respuesta'));
        $entity->setObservacion($rq->get('observacion'));
        $entity->setQueja($em->getRepository('QuejasBundle:Quejas')->find($rq->get('queja')));

        $em->persist($entity);
        $em->flush();
        return new Response('');
    }

    /**
     * Add or Edit Respuesta ESTADO.
     *
     * @Route("respuesta/estado")
     * @param Request $rq
     * @return Response
     */
    public function respuestaEstadoAction(Request $rq)
    {
        $em = $this->getDoctrine()->getManager();

        if ($rq->get('id')) {
            $entity = $em->getRepository('QuejasBundle:QuejaRespuesta')->find($rq->get('id'));
            $entity->setEstado(json_decode($rq->get('estado')));
            $em->persist($entity);
            $em->flush();
        }
        return new Response('');
    }

    /**
     * @Route("acciones/list")
     */
    public function listAccionesAction()
    {
        $data = array();

        foreach($this->getDoctrine()->getManager()->getRepository('QuejasBundle:QuejaAcciones')->findAll() as $value ) {
            $data[] = array(
                'id' => $value->getId(),
                'fecha' => $value->getFecha()->format("Y-m-d"),
                'nombre' => $value->getNombre(),
                'descripcion' => $value->getDescripcion(),
                'queja' => $value->getQuejaRespuesta()->getId()
            );
        }
        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

    /**
     * @Route("acciones/add-edit")
     * @param Request $rq
     * @return Response
     */
    public function addEditAccionesAction(Request $rq)
    {
        $em = $this->getDoctrine()->getManager();
        /* Add or Edit Entrevista */
        if ($rq->get('id') === 'add') {
            $entity = new QuejaAcciones();
        } else {
            $entity = $em->getRepository('QuejasBundle:QuejaAcciones')->find($rq->get('id'));
        }
        /* Sets */
        $entity->setFecha(new \DateTime($rq->get('fecha')));
        $entity->setNombre($rq->get('nombre'));
        $entity->setDescripcion($rq->get('descripcion'));
        $entity->setQuejaRespuesta($em->getRepository('QuejasBundle:QuejaRespuesta')->find($rq->get('quejaRespuesta')));
        /* Validate errors */
        if (count($errors = $this->get('validator')->validate($entity)) > 0) {
            return new Response('unique');
        }
        $em->persist($entity);
        $em->flush();
        return new Response('');
    }

    /**
     * Remove
     *
     * @Route("acciones/remove")
     * @param Request $rq
     * @return Response
     */
    public function removeAccionAction(Request $rq)
    {
        $em = $this->getDoctrine()->getManager();
        /* Delete Quejas */
        $entity = $em->getRepository('QuejasBundle:QuejaAcciones')->find($rq->get('id'));
        $em->remove($entity);
        return new Response($em->flush());
    }
}