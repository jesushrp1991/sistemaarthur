<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Categoria;
use AdminBundle\Form\CategoriaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CategoriaController extends Controller
{
    public $activelink = array('config', 'categoria');

    public function categoriaAddAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categoria = new Categoria();
        $form = $this->createForm(new CategoriaType(), $categoria);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($categoria);
            $em->flush();
            return $this->redirect($this->generateUrl('categoria_show'));
        }
        return $this->render('AdminBundle:Categoria:categoriaAdd.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink
        ));
    }

    public function categoriaDeleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $categoria = $em->getRepository('AdminBundle:Categoria')->find($id);
        $em->remove($categoria);
        $em->flush();
        return $this->redirect($this->generateUrl('categoria_show'));
    }

    public function categoriaEditAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $categoria = $em->getRepository('AdminBundle:Categoria')->find($id);
        $form = $this->createForm(new CategoriaType(), $categoria);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($categoria);
            $em->flush();
            return $this->redirect($this->generateUrl('categoria_show'));
        }
        return $this->render('AdminBundle:Categoria:categoriaEdit.html.twig', array(
            'form' => $form->createView(),
            'activelink' => $this->activelink,
            'categoria' => $categoria
        ));
    }

    public function categoriaGetEspecficacionesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categoria_id = $request->get('categoria_id');
        $especificaciones = $em->getRepository('AdminBundle:Especificacion')->findByCategoria($categoria_id);
        return new JsonResponse($especificaciones);
    }

    public function categoriaShowAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository('AdminBundle:Categoria')->findAll();
        return $this->render('AdminBundle:Categoria:categoriaShow.html.twig', array(
            'categorias' => $categorias,
            'activelink' => $this->activelink
        ));
    }

}
