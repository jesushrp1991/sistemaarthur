<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\DineroEnCasaTransaction;
use AdminBundle\Entity\TarjetaTransaction;
use AdminBundle\Form\DineroEnCasaTransactionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DineroEnCasaTransactionController extends Controller
{
    public $activelink = array('transaccion', 'dineroencasa');

    public function dineroencasaAddAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $dineroencasa = new DineroEnCasaTransaction();
        $tarjeta = new TarjetaTransaction();
        $form = $this->createForm(new DineroEnCasaTransactionType(), $dineroencasa);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($dineroencasa->getConcepto() == 'INVERSION') {
                $dineroencasa->setCredito(true);
                $usuario->setDineroencasa($usuario->getDineroencasa() + $dineroencasa->getMonto());
                $em->persist($usuario);
            } elseif ($dineroencasa->getConcepto() == 'TARJETA') {
                $usuario->setDineroencasa($usuario->getDineroencasa() - $dineroencasa->getMonto());
                $usuario->setTarjeta($usuario->getTarjeta() + $dineroencasa->getMonto());
                $tarjeta->setCredito(true);
                $tarjeta->setFechaHora(new \DateTime('now'));
                $tarjeta->setMonto($dineroencasa->getMonto());
                $tarjeta->setConcepto('INVERSION');
                $tarjeta->setDescription('Inversión de dinero en casa.');
                $em->persist($usuario);
                $em->persist($tarjeta);
            }
            $em->persist($dineroencasa);
            $em->flush();
            return $this->redirect($this->generateUrl('dineroencasa_show'));
        }
        return $this->render('AdminBundle:DineroEnCasaTransaction:dineroencasaAdd.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink
        ));
    }

    public function dineroencasaDeleteAction($id)
    {
    }

    public function dineroencasaEditAction($id)
    {
        return $this->render('AdminBundle:DineroEnCasaTransaction:dineroencasaEdit.html.twig', array(// ...
        ));
    }

    public function dineroencasaShowAction()
    {
        $em = $this->getDoctrine()->getManager();
        $dineroencasa = $em->getRepository('AdminBundle:DineroEnCasaTransaction')->findAll();
        return $this->render('AdminBundle:DineroEnCasaTransaction:dineroencasaShow.html.twig', array(
            'dineroencasa' => $dineroencasa,
            'activelink' => $this->activelink
        ));
    }

}
