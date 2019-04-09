<?php

namespace QuejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use QuejasBundle\Entity\Cliente;

/**
 * @Route("quejas/cliente/")
 */
class ClienteController extends Controller
{
    /**
     * List All values from Cliente
     *
     * @Route("list")
     */
    public function listAction()
    {
        $data = array();

        foreach($this->getDoctrine()->getManager()->getRepository('QuejasBundle:Cliente')->findAll() as $value ) {
            $data[] = array(
                'id' => $value->getId(), 
                'ci' => $value->getCi(), 
                'nombre_apellidos' => $value->getNombreApellidos(), 
                'calle' => $value->getCalle(), 
                'entre' => $value->getEntre(), 
                'apartamento' => $value->getApartamento(), 
                'edificio' => $value->getEdificio(), 
                'casa' => $value->getCasa(), 
                'telefonos' => $value->getTelefonos(), 
                'correo' => $value->getCorreo(), 
                'empresa_id' => $value->getEmpresa()->getNombre(), 
                'municipio_id' => $value->getMunicipio()->getNombre()
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
            $entity = $em->getRepository('QuejasBundle:Cliente')->find($rq->get('id'));
        } else {
            $entity = new Cliente();
        }
        /* Sets */
        $entity->setCi($rq->get('ci'));
        $entity->setNombreApellidos($rq->get('nombre_apellidos'));
        $entity->setCalle($rq->get('calle'));
        $entity->setEntre($rq->get('entre'));
        $entity->setApartamento($rq->get('apartamento'));
        $entity->setEdificio($rq->get('edificio'));
        $entity->setCasa($rq->get('casa'));
        $entity->setTelefonos($rq->get('telefonos'));
        $entity->setCorreo($rq->get('correo'));
        if (is_numeric($rq->get('empresa_id'))) {
            $entity->setEmpresa($em->getRepository('QuejasBundle:Empresa')->find($rq->get('empresa_id')));
        }
        if (is_numeric($rq->get('municipio_id'))) {
            $entity->setMunicipio($em->getRepository('QuejasBundle:Municipio')->find($rq->get('municipio_id')));
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
        /* Delete Cliente */
        foreach (json_decode($rq->get('ids')) as $id) {
            $entity = $em->getRepository('QuejasBundle:Cliente')->find($id);
            $em->remove($entity);
        }
        return new Response($em->flush());
    }
}