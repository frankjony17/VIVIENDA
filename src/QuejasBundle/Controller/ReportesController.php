<?php

namespace QuejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("reporte/")
 */
class ReportesController extends Controller
{
    /**
     * @Route("quejas/entrevista")
     * @param Request $rq
     * @return Response
     */
    public function entrevistaAction(Request $rq)
    {
        $entrevista = $this->getDoctrine()->getManager()->getRepository('QuejasBundle:Entrevista')->find($rq->get('id'));

        $html = $this->renderView('QuejasBundle:Reportes:entrevista.html.twig', array(
            'fecha' => $entrevista->getFecha()->format('Y-m-d'),
            'clasificacion' => $entrevista->getClasificacion()->getNombre(),
            'codigo' => $entrevista->getCodigo(),
            'expediente' => $entrevista->getExpediente() ? "Si" : "No",
            'nombre' => $entrevista->getCliente()->getNombre() ." ". $entrevista->getCliente()->getApellidos(),
            'ci' => $entrevista->getCliente()->getCi(),
            'direccion' => $entrevista->getCliente()->getCalle() ." / ". $entrevista->getCliente()->getEntre() .", ". $entrevista->getCliente()->getEdificio() .", ". $entrevista->getCliente()->getApartamento() .", ". $entrevista->getCliente()->getCasa(),
            'asunto' => $entrevista->getAsunto(),
            'sintesis' => $entrevista->getSintesis(),
            'tramites' => $entrevista->getTramitesRealizados(),
            'concluciones' => $entrevista->getConcluciones(),
            'solucion' => $entrevista->getNivelSolucion(),
            'trabajador' => $entrevista->getTrabajador()->getNombreApellidos(),
            'conformidad' => $entrevista->getConformidad()->getNombre()
        ));

        if (file_exists('pdf/entrevista.pdf')) {
            @unlink('pdf/entrevista.pdf');
        }
        $this->get('knp_snappy.pdf')->generateFromHtml($html, 'pdf/entrevista.pdf', array(
            'orientation' => 'Portrait',
            'page-size' => 'Letter',
            'encoding' => 'UTF-8'
        ));
        return new Response('pdf/entrevista.pdf');
    }
}