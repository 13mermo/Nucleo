<?php

namespace Nidiap\BlogBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HomeController extends Controller
{
    /**
     *@Route("/nidiap/home", name="home_index")
     */
    public function showAction()
    {

        return $this->render('/dashboard/nidiap/home.html.twig', array(
            'name' => ''
        ));
    }
    
}
