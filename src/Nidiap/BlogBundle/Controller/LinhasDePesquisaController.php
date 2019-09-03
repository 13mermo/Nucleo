<?php

namespace Nidiap\BlogBundle\Controller;

use Nidiap\BlogBundle\Entity\LinhasDePesquisa;
use Nidiap\BlogBundle\Form\LinhasDePesquisaType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LinhasDePesquisaController extends Controller
{
    /**
     * @Route("/nidiap/linha_de_desquisa", name="linha_index")
     */

    public function showAction()
    {
        $linhas = $this->getDoctrine()
            ->getRepository('NidiapBlogBundle:LinhasDePesquisa')
            ->findAll();
        return $this->render(
            '/dashboard/nidiap/linhasDePesquisa.html.twig',
            array('linhas' => $linhas)
        );
    }

    /**
     * @Route("/nidiap/linha_de_pesquisa/nova", name="create_linha")
     * @Method({"POST", "GET"})
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(LinhasDePesquisaType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {

            $linha = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($linha);
            $em->flush();
            return $this->redirectToRoute('linha_index');
        }

        return $this->render(

            '/dashboard/nidiap/newLinha.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/nidiap/linha_de_pesquisa/update/{id}", requirements={"id" = "\d+"}, name="update_linha")
     * @Method({"POST", "GET"})
     */

    public function updateAction(LinhasDePesquisa $linha, Request $request)
    {
        $form = $this->createForm(LinhasDePesquisaType::class, $linha);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('linha_index');
        }
        return $this->render(
            '/dashboard/nidiap/newLinha.html.twig',
            array('form' => $form->createView())
        );
    }
    /**
     * @Route("/nidiap/linha_de_pesquisa/delete/{id}", requirements={"id" = "\d+"}, name="delete_linha")
     * @Method({"POST", "GET"})
     */
    /* pega o objeto direto da entidade*/
    public function deleteAction(LinhasDePesquisa $linha, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($linha);
        $em->flush();
        return $this->redirectToRoute('linha_index');
    }

}
