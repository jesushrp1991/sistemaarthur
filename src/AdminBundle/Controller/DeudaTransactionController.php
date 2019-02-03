<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\DineroEnCasaTransaction;
use AdminBundle\Form\DeudaTransactionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DeudaTransactionController extends Controller
{
    public $activelink = array('transaccion', 'deuda');

    public function deudaShowAction()
    {
        $em = $this->getDoctrine()->getManager();
        $deudas = $em->getRepository('AdminBundle:DeudaTransaction')->findAll();
        return $this->render('AdminBundle:DeudaTransaction:deudaShow.html.twig', array(
            'deudas' => $deudas,
            'activelink' => $this->activelink
        ));
    }

    public function deudaEditAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $deuda = $em->getRepository('AdminBundle:DeudaTransaction')->find($id);
        $dineroencasa = new DineroEnCasaTransaction();
        $montorestante = $deuda->getMontorestante();
        $form = $this->createForm(new DeudaTransactionType(), $deuda);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $usuario->setDineroencasa($usuario->getDineroencasa() + ($montorestante - $deuda->getMontorestante()));
            if ($deuda->getMontorestante() == 0) {
                $deuda->setSaldada(true);
            }
            $dineroencasa->setConcepto('DEUDA');
            $dineroencasa->setFechaHora(new \DateTime('now'));
            $dineroencasa->setMonto($montorestante - $deuda->getMontorestante());
            $dineroencasa->setCredito(true);
            $em->persist($dineroencasa);
            $em->persist($usuario);
            $em->persist($deuda);
            $em->flush();
            return $this->redirect($this->generateUrl('deuda_show'));
        }
        return $this->render('AdminBundle:DeudaTransaction:deudaEdit.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink,
            'deuda' => $deuda
        ));
    }

}
