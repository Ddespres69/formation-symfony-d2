<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
 * Class SecurityController
 * @package AppBundle\Controller
 */
class SecurityController extends Controller
{


    /**
     *
     * @Route("/login", name="login")
     * @Method("GET")
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'AppBundle:Security:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }


    /**
     *
     * @Route("/login_check", name="login_check")
     * @Method("POST")
     *
     */
    public function loginCheckAction()
    {

    }

    /**
     *
     * @Route("/logout", name="logout")
     * @Method("GET")
     *
     */
    public function logoutAction()
    {

    }

}
