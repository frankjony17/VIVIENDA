<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $checker = $this->get('security.authorization_checker');

        if ($checker->isGranted('ROLE_ADMIN')) {
            return new RedirectResponse($this->generateUrl('_admin'));
        }
        if ($checker->isGranted('ROLE_ENTREVISTA')) {
            return $this->render('QuejasBundle:Entrevista:index.html.twig');
        }
        if ($checker->isGranted('ROLE_JEFEDEPARTAMENTO')) {
            return $this->render('QuejasBundle:JefeDepartamento:index.html.twig');
        }
        if ($checker->isGranted('ROLE_DESPACHO')) {
            return $this->render('QuejasBundle:Despacho:index.html.twig');
        }
    }
}
