<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SecuredController extends Controller
{
    /**
     * @Route("login", name="_login")
     * @Template()
     */
    public function loginAction()
    {
        return array();
    }

    /**
     * @Route("/login_check", name="_security_check")
     */
    public function securityCheckAction()
    {
        // The security layer will intercept this request
    }

    /**
     * @Route("logout", name="_logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request
    }
}