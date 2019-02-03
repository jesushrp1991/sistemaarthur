<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public $activelink = array('noconfig', 'usuario');

    public function usuarioShowAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository('AdminBundle:User')->findAll();
        return $this->render('AdminBundle:Usuario:usuarioShow.html.twig', array(
            'usuarios' => $usuarios,
            'activelink' => $this->activelink
        ));
    }

    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render( '@Admin/Default/login.html.twig', array(
                'last_username' => $lastUsername, 'error' => $error,
            )
        );
    }

    public function usuarioAddAction()
    {
    }

    public function usuarioDeleteAction()
    {
    }

    public function usuarioEditAction()
    {
    }
}
