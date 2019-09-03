<?php

namespace Nidiap\BlogBundle\Controller;

use Nidiap\BlogBundle\Entity\Sobre;
use Nidiap\BlogBundle\Form\SobreType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SobreController extends Controller
{
    /**
    * @Route("/nidiap/sobre", name="sobre_index")
    */

        public function showAction()
        {
            $sobre = $this->getDoctrine()
                ->getRepository('NidiapBlogBundle:Sobre')
                ->findAll();
            return $this->render(
                '/dashboard/nidiap/sobre.html.twig',
                array('sobre' => $sobre)
            );
        }

        /**
         * @Route("/nidiap/sobre/novo", name="sobre_create")
         * @Method({"POST", "GET"})
         */
        public function createAction(Request $request)
        {
            $form = $this->createForm(SobreType::class);
            $form->handleRequest($request);
            if ($form->isSubmitted()) {

                $sobre = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($sobre);
                $em->flush();
                return $this->redirectToRoute('sobre_index');
            }

            return $this->render(

                '/dashboard/nidiap/newSobre.html.twig',
                array('form' => $form->createView())
            );
        }

        /**
         * @Route("/nidiap/sobre/update/{id}", requirements={"id" = "\d+"}, name="update_sobre")
         * @Method({"POST", "GET"})
         */

        public function updateAction(Sobre $sobre, Request $request)
        {
            $form = $this->createForm(SobreType::class, $sobre);
            $form->handleRequest($request);

            if ($form->isSubmitted()) {

                $em = $this->getDoctrine()->getManager();
                $em->flush();
                return $this->redirectToRoute('sobre_index');
            }
            return $this->render(
                '/dashboard/nidiap/newSobre.html.twig',
                array('form' => $form->createView())
            );
        }
        /**
         * @Route("/nidiap/sobre/delete/{id}", requirements={"id" = "\d+"}, name="delete_sobre")
         * @Method({"POST", "GET"})
         */
        /* pega o objeto direto da entidade*/
        public function deleteAction(Sobre $sobre, Request $request)
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sobre);
            $em->flush();
            return $this->redirectToRoute('sobre_index');
        }
}
