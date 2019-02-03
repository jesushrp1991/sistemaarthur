<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\VentaTransaction;
use AdminBundle\Form\VentaTransactionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VentaTransactionController extends Controller
{
    public $activelink = array('transaccion', 'venta');

    public function ventaAddAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $venta = new VentaTransaction();
        $form = $this->createForm(new VentaTransactionType(), $venta);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($venta);
            $em->flush();
            return $this->redirect($this->generateUrl('venta_show'));
        }
        return $this->render('AdminBundle:VentaTransaction:ventaAdd.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink
        ));
    }

    public function ventaDeleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $venta = $em->getRepository('AdminBundle:VentaTransaction')->find($id);
        $em->remove($venta);
        $em->flush();
        return $this->redirect($this->generateUrl('venta_show'));
    }

    public function ventaEditAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $venta = $em->getRepository('AdminBundle:VentaTransaction')->find($id);
        $form = $this->createForm(new VentaTransactionType(), $venta);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($venta);
            $em->flush();
            return $this->redirect($this->generateUrl('venta_show'));
        }
        return $this->render('AdminBundle:VentaTransaction:ventaEdit.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink,
            'venta' => $venta
        ));
    }

    public function ventaShowAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ventas = $em->getRepository('AdminBundle:VentaTransaction')->findAll();
        return $this->render('AdminBundle:VentaTransaction:ventaShow.html.twig', array(
            'ventas' => $ventas,
            'activelink' => $this->activelink
        ));
    }

}
