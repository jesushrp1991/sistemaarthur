<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\TarjetaTransaction;
use AdminBundle\Form\TarjetaTransactionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TarjetaTransactionController extends Controller
{
    public $activelink = array('transaccion', 'tarjeta');

    public function tarjetaAddAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $tarjeta = new TarjetaTransaction();
        $form = $this->createForm(new TarjetaTransactionType(), $tarjeta);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($tarjeta);
            $em->flush();
            return $this->redirect($this->generateUrl('tarjeta_edit'));
        }
        return $this->render('AdminBundle:TarjetaTransaction:tarjetaAdd.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink
        ));
    }

    public function tarjetaDeleteAction($id)
    {

    }

    public function tarjetaEditAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $tarjeta = $em->getRepository('AdminBundle:TarjetaTransaction')->find($id);
        $form = $this->createForm(new TarjetaTransactionType(), $tarjeta);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($tarjeta);
            $em->flush();
            return $this->redirect($this->generateUrl('tarjeta_show'));
        }
        return $this->render('AdminBundle:TarjetaTransaction:tarjetaEdit.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink,
            'tarjeta' => $tarjeta
        ));
    }

    public function tarjetaShowAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tarjetas = $em->getRepository('AdminBundle:TarjetaTransaction')->findAll();
        return $this->render('AdminBundle:TarjetaTransaction:tarjetaShow.html.twig', array(
            'tarjetas' => $tarjetas,
            'activelink' => $this->activelink
        ));
    }

}
