<?php

namespace Nidiap\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    /**
     *@Route("/", requirements={"id" = "\d+"}, name="dashboard_index")
     */
    public function showAction()
    {
        $projetos = $this->getDoctrine()
            ->getRepository('NidiapBlogBundle:Projetos')
            ->findAll();
        $noticias = $this->getDoctrine()
            ->getRepository('NidiapBlogBundle:Noticia')
            ->findAll();
        return $this->render(
            '/nidiap/home/index.html.twig',
            array('projetos' => $projetos, 'noticias' => $noticias)
        );
    }

    /**
     *@Route("/servico", name="servico_index")
     */
    public function showActionServico()
    {
        return $this->render(
            '/nidiap/home/servico.html.twig'
        );
    }

    /**
     *@Route("/detalhe-servico", name="detalhe_servico_index")
     */
    public function showActionMostrar()
    {
        return $this->render(
            '/nidiap/home/mostrar-servico.html.twig'
        );
    }

    /**
     *@Route("/noticia", requirements={"id" = "\d+"}, name="noticia_index")
     */
    public function showActionNoticia()
    {
        $noticias = $this->getDoctrine()
            ->getRepository('NidiapBlogBundle:Noticia')
            ->findAll();
        return $this->render(
            '/nidiap/home/noticia.html.twig',
            array('noticias' => $noticias)
        );
    }

    /**
     *@Route("/detalhe-noticia", name="detalhe_noticia_index")
     */
    public function showActionDetalheNoticia()
    {
        return $this->render(
            '/nidiap/home/detalhe-noticia.html.twig'
        );
    }


}

