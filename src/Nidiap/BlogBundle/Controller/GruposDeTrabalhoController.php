<?php

namespace Nidiap\BlogBundle\Controller;

use Nidiap\BlogBundle\Entity\GruposDeTrabalho;
use Nidiap\BlogBundle\Form\GruposDeTrabahosType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GruposDeTrabalhoController extends Controller
{
    /**
     * @Route("/nidiap/grupos_de_trabalho", name="grupos_index")
     */

    public function showAction()
    {
        $grupos = $this->getDoctrine()
            ->getRepository('NidiapBlogBundle:GruposDeTrabalho')
            ->findAll();
        return $this->render(
            '/dashboard/nidiap/gruposDeTrabalho.html.twig',
            array('grupos' => $grupos)
        );
    }

    /**
     * @Route("/nidiap/grupo/novo", name="create_grupo")
     * @Method({"POST", "GET"})
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(GruposDeTrabahosType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {

            $grupo = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($grupo);
            $em->flush();
            return $this->redirectToRoute('grupos_index');
        }

        return $this->render(

            '/dashboard/nidiap/newGrupo.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/nidiap/grupo/update/{id}", requirements={"id" = "\d+"}, name="update_grupo")
     * @Method({"POST", "GET"})
     */

    public function updateAction(GruposDeTrabalho $grupo, Request $request)
    {
        $form = $this->createForm(GruposDeTrabahosType::class, $grupo);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('grupos_index');
        }
        return $this->render(
            '/dashboard/nidiap/newGrupo.html.twig',
            array('form' => $form->createView())
        );
    }
    /**
     * @Route("/nidiap/grupo/delete/{id}", requirements={"id" = "\d+"}, name="delete_grupo")
     * @Method({"POST", "GET"})
     */
    /* pega o objeto direto da entidade*/
    public function deleteAction(GruposDeTrabalho $grupo, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($grupo);
        $em->flush();
        return $this->redirectToRoute('grupos_index');
    }
}
