<?php

namespace Nidiap\BlogBundle\Controller;


use Nidiap\BlogBundle\Entity\Projetos;
use Nidiap\BlogBundle\Form\ProjetosType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProjetosController extends Controller
{
    /**
     * @Route("/nidiap/projeto", requirements={"id" = "\d+"}, name="projeto_index"),
     *
     */
    public function showAction()
    {
        $projetos = $this->getDoctrine()
            ->getRepository('NidiapBlogBundle:Projetos')
            ->findAll();
        return $this->render(
            '/dashboard/nidiap/projeto.html.twig',
            array('projetos' => $projetos)
        );
    }

    /**
     * @Route("nidiap/projeto/novo", requirements={"id" = "\d+"}, name="create_projeto")
     * @Method({"POST", "GET"})
     */
    /* * @Security("has_role('ROLE_ADMIN')") controle de permissoes*/

    public function createAction(Request $request)
    {
        $form = $this->createForm(ProjetosType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {

            $projeto = $form->getData();
            $em = $this->getDoctrine()->getManager();
            var_dump($projeto);
            die();
            $em->persist($projeto);
            $em->flush();
            return $this->redirectToRoute('projeto_index');
        }

        return $this->render(

            '/dashboard/nidiap/newProjeto.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/nidiap/projeto/update/{id}", requirements={"id" = "\d+"}, name="update_projeto")
     * @Method({"POST", "GET"})
     */

    public function updateAction(Projetos $projeto, Request $request)
    {
        $form = $this->createForm(ProjetosType::class, $projeto);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('projeto_index');
        }
        return $this->render(
            '/dashboard/nidiap/newProjeto.html.twig',
            array('form' => $form->createView())
        );
    }
    /**
     * @Route("/nidiap/projeto/delete/{id}", requirements={"id" = "\d+"}, name="delete_projeto")
     * @Method({"POST", "GET"})
     */
    /* pega o objeto direto da entidade*/
    public function deleteAction(Projetos $projeto, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($projeto);
        $em->flush();
        return $this->redirectToRoute('projeto_index');
    }
}
