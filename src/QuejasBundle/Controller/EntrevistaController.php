<?php

namespace QuejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use QuejasBundle\Entity\Entrevista;

/**
 * @Route("quejas/entrevista/")
 */
class EntrevistaController extends Controller
{
    /**
     * List All values from Entrevista
     *
     * @Route("list")
     */
    public function listAction()
    {
        $data = array();
        foreach($this->getDoctrine()->getManager()->getRepository('QuejasBundle:Entrevista')->findAll() as $value ) {
            $html = "<table><thead><tr><th>Código</th><th>Expediente</th><th>Clasificación</th><th>Conformidad</th></tr></thead>";
            $html .="<tbody><tr><td>". $value->getCodigo() ."</td><td>". $value->getExpediente() ."</td><td>". $value->getClasificacion()->getNombre() ."</td><td>". $value->getConformidad()->getNombre() ."</td></tr></tbody></table>";
            $html .="<br>";
            $html .="<table><tr><th>Síntesis</th><th>". $value->getSintesis() ."</th></tr></table>";
            $html .="<br>";
            $html .="<table><tr><th>Tramites Realizados</th><th>". $value->getTramitesRealizados() ."</th></tr></table>";
            $html .="<br>";
            $html .="<table><tr><th>Concluciones</th><th>". $value->getConcluciones() ."</th></tr></table>";
            $html .="<br>";
            $html .="<table><tr><th>Nivel Solución</th><th>". $value->getNivelSolucion() ."</th></tr></table>";

            $data[] = array(
                'id' => $value->getId(), 
                'fecha' => $value->getFecha()->format('Y-m-d'),
                'codigo' => $value->getCodigo(), 
                'asunto' => $value->getAsunto(), 
                'sintesis' => $value->getSintesis(), 
                'tramites_realizados' => $value->getTramitesRealizados(), 
                'concluciones' => $value->getConcluciones(), 
                'nivel_solucion' => $value->getNivelSolucion(), 
                'expediente' => $value->getExpediente(),
                'cliente' => $value->getCliente()->getCi() ." - ". $value->getCliente()->getNombre() ." ". $value->getCliente()->getApellidos(),
                'cliente_id' => $value->getCliente()->getId(),
                'clasificacion_id' => $value->getClasificacion()->getId(),
                'trabajador_id' => $value->getTrabajador()->getId(),
                'conformidad_id' => $value->getConformidad()->getId(),
                'queja' => $value->getQuejas() ? true : false,
                'data' => $html
            );
        }
        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

    /**
     * Add or Edit Entrevista.
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
            $entity = $em->getRepository('QuejasBundle:Entrevista')->find($rq->get('id'));
        } else {
            $entity = new Entrevista();
        }
        /* Sets */
        $entity->setFecha(new \DateTime($rq->get('fecha')));
        $entity->setCodigo($rq->get('codigo'));
        $entity->setAsunto($rq->get('asunto'));
        $entity->setSintesis($rq->get('sintesis'));
        $entity->setTramitesRealizados($rq->get('tramites_realizados'));
        $entity->setConcluciones($rq->get('concluciones'));
        $entity->setNivelSolucion($rq->get('nivel_solucion'));
        $entity->setExpediente($rq->get('expediente'));
        if (is_numeric($rq->get('cliente_id'))) {
            $entity->setCliente($em->getRepository('QuejasBundle:Cliente')->find($rq->get('cliente_id')));
        }
        if (is_numeric($rq->get('clasificacion_id'))) {
            $entity->setClasificacion($em->getRepository('NomencladorBundle:Clasificacion')->find($rq->get('clasificacion_id')));
        }
        if (is_numeric($rq->get('trabajador_id'))) {
            $entity->setTrabajador($em->getRepository('NomencladorBundle:Trabajador')->find($rq->get('trabajador_id')));
        }
        if (is_numeric($rq->get('conformidad_id'))) {
            $entity->setConformidad($em->getRepository('NomencladorBundle:Conformidad')->find($rq->get('conformidad_id')));
        }
        /* Validate errors */
        if (count($errors = $this->get('validator')->validate($entity)) > 0) {
            return new Response('unique');
        }
        $em->persist($entity);
        $em->flush();
        return new Response($entity->getId());
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
        /* Delete Entrevista */
        $entity = $em->getRepository('QuejasBundle:Entrevista')->find($rq->get('id'));
        $em->remove($entity);
        $em->flush();
        return new Response('');
    }
}