<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AdminBundle:Default:index.html.twig', array('name' => $name));
    }

    public function objetoGetDatosAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $objeto_id = $request->get('objeto_id');
        $objeto = $em->getRepository('AdminBundle:Objeto')->find($objeto_id);
        return new JsonResponse(array(
            'cantidad' => $objeto->getCantidadenstock(),
            'precioventa' => $objeto->getPrecioventa(),
            'preciocompra' => $objeto->getPreciocompra()
        ));
    }
}
