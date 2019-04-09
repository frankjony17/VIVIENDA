<?php

namespace NomencladorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use NomencladorBundle\Entity\Empresa;

/**
 * @Route("nomenclador/empresa/")
 */
class EmpresaController extends Controller
{
    /**
     * List All values from Empresa
     *
     * @Route("list")
     */
    public function listAction()
    {
        $data = array();

        foreach($this->getDoctrine()->getManager()->getRepository('NomencladorBundle:Empresa')->findAll() as $value ) {
            $data[] = array(
                'id' => $value->getId(), 
                'nombre' => $value->getNombre(), 
                'codigo' => $value->getCodigo(), 
                'telefonos' => $value->getTelefonos(), 
                'calle' => $value->getCalle(), 
                'entre' => $value->getEntre(), 
                'numero' => $value->getNumero()
            );
        }
        return new Response('({"total":"'.count($data).'","data":'.json_encode($data).'})');
    }

    /**
     * Add or Edit Empresa.
     *
     * @Route("add-edit")
     * @param Request $rq
     * @return Response
     */
    public function addEditAction(Request $rq)
    {
        $em = $this->getDoctrine()->getManager();
        /* Add or Edit Empresa */
        if ($rq->get('id')) {
            $entity = $em->getRepository('NomencladorBundle:Empresa')->find($rq->get('id'));
        } else {
            $entity = new Empresa();
        }
        /* Sets */
        $entity->setNombre($rq->get('nombre'));
        $entity->setCodigo($rq->get('codigo'));
        $entity->setTelefonos($rq->get('telefonos'));
        $entity->setCalle($rq->get('calle'));
        $entity->setEntre($rq->get('entre'));
        $entity->setNumero($rq->get('numero'));
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
        /* Delete Empresa */
        foreach (json_decode($rq->get('ids')) as $id) {
            $entity = $em->getRepository('NomencladorBundle:Empresa')->find($id);
            $em->remove($entity);
        }
        return new Response($em->flush());
    }
}