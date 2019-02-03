<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Especificacion;
use AdminBundle\Form\EspecificacionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EspecificacionController extends Controller
{
    public $activelink = array('config', 'especificacion');

    public function especificacionAddAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $especificacion = new Especificacion();
        $form = $this->createForm(new EspecificacionType(), $especificacion);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($especificacion);
            $em->flush();
            return $this->redirect($this->generateUrl('especificacion_show'));
        }
        return $this->render('AdminBundle:Especificacion:especificacionAdd.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink
        ));
    }

    public function especificacionDeleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $especificacion = $em->getRepository('AdminBundle:Especificacion')->find($id);
        $em->remove($especificacion);
        $em->flush();
        return $this->redirect($this->generateUrl('especificacion_show'));
    }

    public function especificacionEditAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $especificacion = $em->getRepository('AdminBundle:Especificacion')->find($id);
        $form = $this->createForm(new EspecificacionType(), $especificacion);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($especificacion);
            $em->flush();
            return $this->redirect($this->generateUrl('especificacion_show'));
        }
        return $this->render('AdminBundle:Especificacion:especificacionEdit.html.twig', array(
            'form' => $form->createView(),
            'especificacion' => $especificacion,
            'activelink' => $this->activelink
        ));
    }

    public function especificacionShowAction()
    {
        $em = $this->getDoctrine()->getManager();
        $especificaciones = $em->getRepository('AdminBundle:Especificacion')->findAll();
        return $this->render('AdminBundle:Especificacion:especificacionShow.html.twig', array(
            'especificaciones' => $especificaciones,
            'activelink' => $this->activelink
        ));
    }

}
