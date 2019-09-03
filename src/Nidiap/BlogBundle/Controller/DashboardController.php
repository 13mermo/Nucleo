<?php

namespace Nidiap\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    /**
     *@Route("/nucleo", name="dashboard_index")
     */
    public function showAction()
    {
        return $this->render(
            '/nidiap/home/index.html.twig'
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
     *@Route("/noticia", name="noticia_index")
     */
    public function showActionNoticia()
    {
        return $this->render(
            '/nidiap/home/noticia.html.twig'
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

