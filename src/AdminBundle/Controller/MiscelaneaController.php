<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\CompraTransaction;
use AdminBundle\Entity\DeudaTransaction;
use AdminBundle\Entity\DineroEnCasaTransaction;
use AdminBundle\Entity\Miscelanea;
use AdminBundle\Entity\TarjetaTransaction;
use AdminBundle\Entity\VentaTransaction;
use AdminBundle\Form\CompraTransactionType;
use AdminBundle\Form\MiscelaneaType;
use AdminBundle\Form\VentaTransactionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MiscelaneaController extends Controller
{
    public $activelink = array('noconfig', 'miscelanea');

    public function miscelaneaAddAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $miscelanea = new Miscelanea();
        $form = $this->createForm(new MiscelaneaType(), $miscelanea);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($miscelanea);
            $em->flush();
            return $this->redirect($this->generateUrl('miscelanea_show'));
        }
        return $this->render('AdminBundle:Miscelanea:miscelaneaAdd.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink
        ));
    }

    public function miscelaneaDeleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $miscelanea = $em->getRepository('AdminBundle:Miscelanea')->find($id);
        $em->remove($miscelanea);
        $em->flush();
        return $this->redirect($this->generateUrl('miscelanea_show'));
    }

    public function miscelaneaEditAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $miscelanea = $em->getRepository('AdminBundle:Miscelanea')->find($id);
        $form = $this->createForm(new MiscelaneaType(), $miscelanea);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($miscelanea);
            $em->flush();
            return $this->redirect($this->generateUrl('miscelanea_show'));
        }
        return $this->render('AdminBundle:Miscelanea:miscelaneaEdit.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink,
            'miscelanea' => $miscelanea
        ));
    }

    public function miscelaneaShowAction()
    {
        $em = $this->getDoctrine()->getManager();
        $miscelaneas = $em->getRepository('AdminBundle:Miscelanea')->findAll();
        return $this->render('AdminBundle:Miscelanea:miscelaneaShow.html.twig', array(
            'miscelaneas' => $miscelaneas,
            'activelink' => $this->activelink
        ));
    }

    public function miscelaneaComprarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $compra = new CompraTransaction();
        $tarjeta = new TarjetaTransaction();
        $form = $this->createForm(new CompraTransactionType(), $compra, array('obj' => 'miscelanea'));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $objeto = $form['objeto']->getData();
            $objeto->setCantidadenstock($objeto->getCantidadenstock() + $form['cantidadcomprada']->getData());
            $usuario->setTarjeta($usuario->getTarjeta() - ($form['preciocompra']->getData() * $form['cantidadcomprada']->getData()));
            $tarjeta->setDescription('Compra de miscelánea: ' . $objeto->getEspecificaciones() . ' - ' . $objeto->getDescripcion());
            $tarjeta->setConcepto('COMPRA');
            $tarjeta->setMonto($form['preciocompra']->getData() * $form['cantidadcomprada']->getData());
            $tarjeta->setFechaHora(new \DateTime('now'));
            $em->persist($tarjeta);
            $em->persist($usuario);
            $em->persist($objeto);
            $em->persist($compra);
            $em->flush();
            return $this->redirect($this->generateUrl('miscelanea_show'));
        }
        return $this->render('AdminBundle:Miscelanea:miscelaneaComprar.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink
        ));
    }

    public function miscelaneaVentaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $venta = new VentaTransaction();
        $deuda = new DeudaTransaction();
        $dineroencasa = new DineroEnCasaTransaction();
        $form = $this->createForm(new VentaTransactionType(), $venta, array('obj' => 'miscelanea'));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $objeto = $form['objeto']->getData();
            $objeto->setCantidadenstock($objeto->getCantidadenstock() - $form['cantidadventa']->getData());
            $usuario->setDineroencasa($usuario->getDineroencasa() + (($form['precioventa']->getData() * $form['cantidadventa']->getData()) - $form['deuda']->getData()));
            if ($form['deuda']->getData() != 0){
                if ($form['deuda']->getData() != ($form['precioventa']->getData() * $form['cantidadventa']->getData())) {
                    $dineroencasa->setConcepto('DEUDA');
                    $dineroencasa->setFechaHora(new \DateTime('now'));
                    $dineroencasa->setMonto(($form['precioventa']->getData() * $form['cantidadventa']->getData()) - $form['deuda']->getData());
                    $dineroencasa->setCredito(false);
                    $em->persist($dineroencasa);
                }
                $deuda->setDescripcion('Venta de miscelánea: ' . $objeto->getEspecificaciones() . ' - ' . $objeto->getDescripcion());
                $deuda->setConcepto('VENTA');
                $deuda->setFechaHora(new \DateTime('now'));
                $deuda->setDeudor($form['comprador']->getData());
                $deuda->setMontoinicial($form['deuda']->getData());
                $deuda->setMontorestante($form['deuda']->getData());
                $deuda->setSaldada(false);
                $em->persist($deuda);
            }
            $em->persist($usuario);
            $em->persist($objeto);
            $em->persist($venta);
            $em->flush();
            return $this->redirect($this->generateUrl('miscelanea_show'));
        }
        return $this->render('AdminBundle:Miscelanea:miscelaneaVenta.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink
        ));
    }

}
