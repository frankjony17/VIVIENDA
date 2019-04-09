<?php

namespace NomencladorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use NomencladorBundle\Entity\Trabajador;

/**
 * @Route("nomenclador/trabajador/")
 */
class TrabajadorController extends Controller
{
    /**
     * List All values from Trabajador
     *
     * @Route("list")
     */
    public function listAction()
    {
        $data = array();

        foreach($this->getDoctrine()->getManager()->getRepository('NomencladorBundle:Trabajador')->findAll() as $value ) {
            $data[] = array(
                'id' => $value->getId(), 
                'nombre_apellidos' => $value->getNombreApellidos(), 
                'trabajador_cargo_id' => $value->getTrabajadorCargo()->getNombre(), 
                'departamento_id' => $value->getDepartamento()->getNombre()
            );
        }
        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

    /**
     * Add or Edit Trabajador.
     *
     * @Route("add-edit")
     * @param Request $rq
     * @return Response
     */
    public function addEditAction(Request $rq)
    {
        $em = $this->getDoctrine()->getManager();
        /* Add or Edit Trabajador */
        if ($rq->get('id')) {
            $entity = $em->getRepository('NomencladorBundle:Trabajador')->find($rq->get('id'));
        } else {
            $entity = new Trabajador();
        }
        /* Sets */
        $entity->setNombreApellidos($rq->get('nombre_apellidos'));
        if (is_numeric($rq->get('trabajador_cargo_id'))) {
            $entity->setTrabajadorCargo($em->getRepository('NomencladorBundle:TrabajadorCargo')->find($rq->get('trabajador_cargo_id')));
        }
        if (is_numeric($rq->get('departamento_id'))) {
            $entity->setDepartamento($em->getRepository('NomencladorBundle:Departamento')->find($rq->get('departamento_id')));
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
        /* Delete Trabajador */
        foreach (json_decode($rq->get('ids')) as $id) {
            $entity = $em->getRepository('NomencladorBundle:Trabajador')->find($id);
            $em->remove($entity);
        }
        return new Response($em->flush());
    }
}