<?php

namespace Nidiap\BlogBundle\Controller;

use Nidiap\BlogBundle\Entity\Servicos;
use Nidiap\BlogBundle\Form\ServicosType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ServicosController extends Controller
{
     /**
     * @Route("/nidiap/servicos", requirements={"id" = "\d+"}, name="servicos_index"),
     *
     */
    public function showAction()
    {
        $servicos = $this->getDoctrine()
            ->getRepository('NidiapBlogBundle:Servicos')
            ->findAll();
        return $this->render(
            '/dashboard/nidiap/servicos.html.twig',
            array('servicos' => $servicos)
        );
    }

    /**
     * @Route("/nidiap/servicos/novo", requirements={"id" = "\d+"}, name="create_servico")
     * @Method({"POST", "GET"})
     */
     public function createAction(Request $request)
    {
        $form = $this->createForm(ServicosType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {

            $servicos = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($servicos);
            $em->flush();
            return $this->redirectToRoute('servicos_index');
        }
        return $this->render(
            '/dashboard/nidiap/newServico.html.twig', array('form' => $form->createView())
        );

    }
    /**
    * @Route("/nidiap/servicos/update/{id}", requirements={"id" = "\d+"}, name="update_servico")
    * @Method({"POST", "GET"})
    */
    public function updateAction(Servicos $servicos, Request $request){
        $form = $this->createForm(ServicosType::class, $servicos);
        $form->handleRequest($request);

        if ($form->isSubmitted()){

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('servicos_index');
        }
        return $this->render('/dashboard/nidiap/newServico.html.twig', array('form' => $form->createView())
        );
    }
    /**
    * @Route("/nidiap/servicos/delete/{id}", requirements={"id" = "\d+"}, name="delete_servico")
    * @Method({"POST", "GET"})
    */
    public function  deleteAction(Servicos $servicos, Request $request){
        $em = $this->getDoctrine()->getManager();
        $em->remove($servicos);
        $em->flush();
        return $this->redirectToRoute('servicos_index');
    }
}
