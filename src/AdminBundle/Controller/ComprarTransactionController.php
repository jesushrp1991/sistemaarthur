<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\CompraTransaction;
use AdminBundle\Form\CompraTransactionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ComprarTransactionController extends Controller
{
    public $activelink = array('transaccion', 'comprar');

    public function comprarAddAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $compra = new CompraTransaction();
        $form = $this->createForm(new CompraTransactionType(), $compra);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($compra);
            $em->flush();
            return $this->redirect($this->generateUrl('comprar_show'));
        }
        return $this->render('AdminBundle:ComprarTransaction:comprarAdd.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink
        ));
    }

    public function comprarDeleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $compra = $em->getRepository('AdminBundle:CompraTransaction')->find($id);
        $em->remove($compra);
        $em->flush();
        return $this->redirect($this->generateUrl('comprar_show'));
    }

    public function comprarEditAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $compra = $em->getRepository('AdminBundle:CompraTransaction')->find($id);
        $form = $this->createForm(new CompraTransactionType(), $compra);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($compra);
            $em->flush();
            return $this->redirect($this->generateUrl('comprar_show'));
        }
        return $this->render('AdminBundle:ComprarTransaction:comprarEdit.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink,
            'compra' => $compra
        ));
    }

    public function comprarShowAction()
    {
        $em = $this->getDoctrine()->getManager();
        $compras = $em->getRepository('AdminBundle:CompraTransaction')->findAll();
        return $this->render('AdminBundle:ComprarTransaction:comprarShow.html.twig', array(
            'compras' => $compras,
            'activelink' => $this->activelink
        ));
    }

}
