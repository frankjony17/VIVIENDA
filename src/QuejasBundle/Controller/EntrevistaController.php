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
            $data[] = array(
                'id' => $value->getId(), 
                'fecha' => $value->getFecha(), 
                'codigo' => $value->getCodigo(), 
                'asunto' => $value->getAsunto(), 
                'sintesis' => $value->getSintesis(), 
                'tramites_realizados' => $value->getTramitesRealizados(), 
                'concluciones' => $value->getConcluciones(), 
                'nivel_solucion' => $value->getNivelSolucion(), 
                'expediente' => $value->getExpediente(), 
                'cliente_id' => $value->getCliente()->getCi(), 
                'clasificacion_id' => $value->getClasificacion()->getNombre(), 
                'trabajador_id' => $value->getTrabajador()->getNombreApellidos(), 
                'conformidad_id' => $value->getConformidad()->getNombre()
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
        $entity->setFecha($rq->get('fecha'));
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
            $entity->setClasificacion($em->getRepository('QuejasBundle:Clasificacion')->find($rq->get('clasificacion_id')));
        }
        if (is_numeric($rq->get('trabajador_id'))) {
            $entity->setTrabajador($em->getRepository('QuejasBundle:Trabajador')->find($rq->get('trabajador_id')));
        }
        if (is_numeric($rq->get('conformidad_id'))) {
            $entity->setConformidad($em->getRepository('QuejasBundle:Conformidad')->find($rq->get('conformidad_id')));
        }
        /* Validate errors */
        if (count($errors = $this->get('validator')->validate($entity)) > 0) {
            $errorsString = (string) $errors; // Uses a __toString method on the $errors variable
            return new Response($errorsString);
        }
        $em->persist($entity);
        return new Response($em->flush());
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
        foreach (json_decode($rq->get('ids')) as $id) {
            $entity = $em->getRepository('QuejasBundle:Entrevista')->find($id);
            $em->remove($entity);
        }
        return new Response($em->flush());
    }
}