<?php

namespace Nidiap\BlogBundle\Controller;


use Nidiap\BlogBundle\Entity\Noticia;
use Nidiap\BlogBundle\Form\NoticiaType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class NoticiasController extends Controller
{
    /**
     * @Route("/nidiap/noticia", requirements={"id" = "\d+"}, name="noticias_index"),
     *
     */

    public function showAction()
    {
        $noticias = $this->getDoctrine()
            ->getRepository('NidiapBlogBundle:Noticia')
            ->findAll();
        return $this->render(
            '/dashboard/nidiap/noticias.html.twig',
            array('noticias' => $noticias)
        );
    }

    /**
     * @Route("nidiap/notica/nova", requirements={"id" = "\d+"}, name="create_noticia")
     * @Method({"POST", "GET"})
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(NoticiaType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {

            $noticia = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($noticia);
            $em->flush();
            return $this->redirectToRoute('noticias_index');
        }

        return $this->render(

            '/dashboard/nidiap/newNoticia.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/nidiap/noticia/update/{id}", requirements={"id" = "\d+"}, name="update_noticia")
     * @Method({"POST", "GET"})
     */

    public function updateAction(Noticia $noticia, Request $request)
    {
        $form = $this->createForm(NoticiaType::class, $noticia);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('noticias_index');
        }
        return $this->render(
            '/dashboard/nidiap/newNoticia.html.twig',
            array('form' => $form->createView())
        );
    }
    /**
     * @Route("/nidiap/noticia/delete/{id}", requirements={"id" = "\d+"}, name="delete_noticia")
     * @Method({"POST", "GET"})
     */
    /* pega o objeto direto da entidade*/
    public function deleteAction(Noticia $noticia, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($noticia);
        $em->flush();
        return $this->redirectToRoute('noticias_index');
    }

    /**
     * @Route("/nidiap/noticia/view/{id}", requirements={"id" = "\d+"}, name="view_noticia")
     * @Method({"POST", "GET"})
     */
    public function viewAction()
    {


    }
}
