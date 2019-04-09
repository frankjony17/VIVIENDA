<?php

namespace NomencladorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use NomencladorBundle\Entity\Conformidad;

/**
 * @Route("nomenclador/conformidad/")
 */
class ConformidadController extends Controller
{
    /**
     * List All values from Conformidad
     *
     * @Route("list")
     */
    public function listAction()
    {
        $data = array();

        foreach($this->getDoctrine()->getManager()->getRepository('NomencladorBundle:Conformidad')->findAll() as $value ) {
            $data[] = array(
                'id' => $value->getId(), 
                'nombre' => $value->getNombre(), 
                'descripcion' => $value->getDescripcion()
            );
        }
        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

    /**
     * Add or Edit Conformidad.
     *
     * @Route("add-edit")
     * @param Request $rq
     * @return Response
     */
    public function addEditAction(Request $rq)
    {
        $em = $this->getDoctrine()->getManager();
        /* Add or Edit Conformidad */
        if ($rq->get('id')) {
            $entity = $em->getRepository('NomencladorBundle:Conformidad')->find($rq->get('id'));
        } else {
            $entity = new Conformidad();
        }
        /* Sets */
        $entity->setNombre($rq->get('nombre'));
        $entity->setDescripcion($rq->get('descripcion'));
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
        /* Delete Conformidad */
        foreach (json_decode($rq->get('ids')) as $id) {
            $entity = $em->getRepository('NomencladorBundle:Conformidad')->find($id);
            $em->remove($entity);
        }
        return new Response($em->flush());
    }
}