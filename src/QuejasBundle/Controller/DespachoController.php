<?php

namespace QuejasBundle\Controller;

use QuejasBundle\Entity\Despacho;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("despacho/")
 */
class DespachoController extends Controller
{
    /**
     * List All values from Cliente
     *
     * @Route("list")
     */
    public function listAction()
    {
        $data = array();

        foreach($this->getDoctrine()->getManager()->getRepository('QuejasBundle:Despacho')->findAll() as $value ) {
            $i = 0;
            $j = 0;
            $html = "";
            $estado = "<span style='color: red'><b>Sin Atender (OjO)</b></span>";

            $acuerdos = $this->getDoctrine()->getManager()->getRepository('QuejasBundle:DespachoAcuerdo')->findBy(
                array('despacho' => $value)
            );
            if (count($acuerdos) > 0) {
                $html .= "Acuerdos<br>";
                $html .= "<table><tr><td>No</td><td>Nombre</td><td>Descripción</td></tr>";
                $estado = "<span style='color: green'><b>Atendido (OK)</b></span>";
            }
            foreach ($acuerdos as $acuerdo) {
                $html .= "<tr><td>".++$i."</td><td>". $acuerdo->getNombre() ."</td><td>". $acuerdo->getDescripcion() ."</td></tr>";
            }
            if (count($acuerdos) > 0) {
                $html .= "</table><br>";
            }
            $planteamientos = $this->getDoctrine()->getManager()->getRepository('QuejasBundle:DespachoPlanteamientos')->findBy(
                array('despacho' => $value)
            );
            if (count($planteamientos) > 0) {
                $html .= "Planteamientos<br>";
                $html .= "<table><tr><td>No</td><td>Nombre</td><td>Descripción</td></tr>";
                $estado = "<span style='color: green'><b>Atendido (OK)</b></span>";
            }
            foreach ($planteamientos as $planteamiento) {
                $html .= "<tr><td>".++$j."</td><td>". $planteamiento->getNombre() ."</td><td>". $planteamiento->getDescripcion() ."</td></tr>";
            }
            if (count($planteamientos) > 0) {
                $html .= "</table><br>";
            }
            $data[] = array(
                'id' => $value->getId(),
                'cliente' => "<b>". $value->getCliente()->getCi() ."</b>, ". $value->getCliente()->getNombre() ." ". $value->getCliente()->getApellidos(),
                'asunto' => $value->getAsunto(),
                'fecha_creacion' => $value->getFechaCreacion()->format('Y-m-d'),
                'fecha_culminacion' => $value->getFechaCulminacion()->format('Y-m-d'),
                'estado' => $estado,
                'data' => $html
            );
        }
        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

    /**
     * Add or Edit Cliente.
     *
     * @Route("add-edit")
     * @param Request $rq
     * @return Response
     */
    public function addEditAction(Request $rq)
    {
        $em = $this->getDoctrine()->getManager();
        /* Add or Edit Cliente */
        if ($rq->get('id')) {
            $entity = $em->getRepository('QuejasBundle:Despacho')->find($rq->get('id'));
        } else {
            $entity = new Despacho();
        }
        /* Sets */
        $entity->setAsunto($rq->get('asunto'));
        $entity->setFechaCreacion(new \DateTime(date("Y-m-d")));
        $entity->setFechaCulminacion(new \DateTime($rq->get('fecha_culminacion')));
        if (is_numeric($rq->get('cliente_id'))) {
            $entity->setCliente($em->getRepository('QuejasBundle:Cliente')->find($rq->get('cliente_id')));
        }
        /* Validate errors */
        if (count($errors = $this->get('validator')->validate($entity)) > 0) {
            return new Response('unique');
        }
        $em->persist($entity);
        return new Response($em->flush());
    }
//
//    /**
//     * Remove
//     *
//     * @Route("remove")
//     * @param Request $rq
//     * @return Response
//     */
//    public function removeAction(Request $rq)
//    {
//        $em = $this->getDoctrine()->getManager();
//        /* Delete Cliente */
//        foreach (json_decode($rq->get('ids')) as $id) {
//            $entity = $em->getRepository('QuejasBundle:Cliente')->find($id);
//            $em->remove($entity);
//        }
//        return new Response($em->flush());
//    }

    /**
     * Planteamiento list
     *
     * @Route("planteamiento/list")
     */
    public function listPlanteamientoAction()
    {
        $data = array();

        foreach($this->getDoctrine()->getManager()->getRepository('QuejasBundle:DespachoPlanteamientos')->findAll() as $value ) {
            $data[] = array(
                'id' => $value->getId(),
                'nombre' => $value->getNombre(),
                'descripcion' => $value->getDescripcion()
            );
        }
        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

    /**
     * Acuerdos list
     *
     * @Route("planteamiento/list")
     */
    public function listAcuerdosAction()
    {
        $data = array();

        foreach($this->getDoctrine()->getManager()->getRepository('QuejasBundle:DespachoAcuerdo')->findAll() as $value ) {
            $data[] = array(
                'id' => $value->getId(),
                'nombre' => $value->getNombre(),
                'descripcion' => $value->getDescripcion()
            );
        }
        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }
}