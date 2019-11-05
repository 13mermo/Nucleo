<?php

namespace Nidiap\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ServicosController extends Controller
{
    public function indexAction($name)
    {
        $servicos = $this->getDoctrine()
            ->getRepository('NidiapBlogBundle:Servicos')
            ->findAll();
        return $this->render(
            '/dashboard/nidiap/servicos.html.twig',
            array('servico' => $servicos)
        );
    }

    /**
     * @Route("/nidiap/servico", requirements={"id" = "\d+"}, name="servico_index"),
     */
    public function create(){

    }
    public function update(){

    }

    public function  delete(){

    }
}
