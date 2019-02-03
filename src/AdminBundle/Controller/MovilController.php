<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\CompraTransaction;
use AdminBundle\Entity\DeudaTransaction;
use AdminBundle\Entity\DineroEnCasaTransaction;
use AdminBundle\Entity\Movil;
use AdminBundle\Entity\TarjetaTransaction;
use AdminBundle\Entity\VentaTransaction;
use AdminBundle\Form\CompraTransactionType;
use AdminBundle\Form\MovilType;
use AdminBundle\Form\VentaTransactionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MovilController extends Controller
{
    public $activelink = array('noconfig', 'movil');

    public function movilAddAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $movil = new Movil();
        $form = $this->createForm(new MovilType(), $movil);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($movil);
            $em->flush();
            return $this->redirect($this->generateUrl('movil_show'));
        }
        return $this->render('AdminBundle:Movil:movilAdd.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink
        ));
    }

    public function movilDeleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $movil = $em->getRepository('AdminBundle:Movil')->find($id);
        $em->remove($movil);
        $em->flush();
        return $this->redirect($this->generateUrl('movil_show'));
    }

    public function movilEditAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $movil = $em->getRepository('AdminBundle:Movil')->find($id);
        $form = $this->createForm(new MovilType(), $movil);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($movil);
            $em->flush();
            return $this->redirect($this->generateUrl('movil_show'));
        }
        return $this->render('AdminBundle:Movil:movilEdit.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink,
            'movil' => $movil
        ));
    }

    public function movilShowAction()
    {
        $em = $this->getDoctrine()->getManager();
        $moviles = $em->getRepository('AdminBundle:Movil')->findAll();
        return $this->render('AdminBundle:Movil:movilShow.html.twig', array(
            'moviles' => $moviles,
            'activelink' => $this->activelink
        ));
    }

    public function movilShowOneAction($id)
    {
        return $this->render('AdminBundle:Movil:movilShowOne.html.twig', array(// ...
        ));
    }

    public function movilComprarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $compra = new CompraTransaction();
        $tarjeta = new TarjetaTransaction();
        $form = $this->createForm(new CompraTransactionType(), $compra, array('obj' => 'movil'));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $objeto = $form['objeto']->getData();
            $objeto->setCantidadenstock($objeto->getCantidadenstock() + $form['cantidadcomprada']->getData());
            $usuario->setTarjeta($usuario->getTarjeta() - ($form['preciocompra']->getData() * $form['cantidadcomprada']->getData()));
            $tarjeta->setDescription('Compra de móviles: ' . $objeto->getMarca() . ' - ' . $objeto->getModelo());
            $tarjeta->setConcepto('COMPRA');
            $tarjeta->setMonto($form['preciocompra']->getData() * $form['cantidadcomprada']->getData());
            $tarjeta->setFechaHora(new \DateTime('now'));
            $em->persist($tarjeta);
            $em->persist($usuario);
            $em->persist($objeto);
            $em->persist($compra);
            $em->flush();
            return $this->redirect($this->generateUrl('movil_show'));
        }
        return $this->render('AdminBundle:Movil:movilComprar.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink
        ));
    }

    public function movilVentaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $venta = new VentaTransaction();
        $deuda = new DeudaTransaction();
        $dineroencasa = new DineroEnCasaTransaction();
        $form = $this->createForm(new VentaTransactionType(), $venta, array('obj' => 'movil'));
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
                $deuda->setDescripcion('Venta de móvil: ' . $objeto->getMarca() . ' - ' . $objeto->getModelo());
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
            return $this->redirect($this->generateUrl('movil_show'));
        }
        return $this->render('AdminBundle:Movil:movilVenta.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink
        ));
    }

}
