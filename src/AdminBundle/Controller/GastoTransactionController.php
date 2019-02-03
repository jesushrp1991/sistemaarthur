<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\DineroEnCasaTransaction;
use AdminBundle\Entity\GastoTransaction;
use AdminBundle\Form\GastoTransactionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GastoTransactionController extends Controller
{
    public $activelink = array('transaccion', 'gasto');

    public function gastoShowAction()
    {
        $em = $this->getDoctrine()->getManager();
        $gastos = $em->getRepository('AdminBundle:GastoTransaction')->findAll();
        return $this->render('AdminBundle:GastoTransaction:gastoShow.html.twig', array(
            'gastos' => $gastos,
            'activelink' => $this->activelink
        ));
    }

    public function gastoAddAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $gasto = new GastoTransaction();
        $dineroencasa = new DineroEnCasaTransaction();
        $form = $this->createForm(new GastoTransactionType(), $gasto);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $usuario->setDineroencasa($usuario->getDineroencasa() - $gasto->getMonto());
            $dineroencasa->setFechaHora(new \DateTime('now'));
            $dineroencasa->setConcepto('GASTO');
            $dineroencasa->setMonto($gasto->getMonto());
            $em->persist($dineroencasa);
            $em->persist($gasto);
            $em->flush();
            return $this->redirect($this->generateUrl('gasto_show'));
        }
        return $this->render('AdminBundle:GastoTransaction:gastoAdd.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink
        ));
    }

    public function gastoEditAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $gasto = $em->getRepository('AdminBundle:GastoTransaction')->find($id);
        $monto = $gasto->getMonto();
        $form = $this->createForm(new GastoTransactionType(), $gasto);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $usuario->setDineroencasa(($usuario->getDineroencasa() + $monto) - $gasto->getMonto());
            $em->persist($gasto);
            $em->flush();
            return $this->redirect($this->generateUrl('gasto_show'));
        }
        return $this->render('AdminBundle:GastoTransaction:gastoAdd.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink
        ));
    }
}
