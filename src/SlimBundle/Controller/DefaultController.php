<?php

namespace SlimBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SlimBundle:Default:index.html.twig');
    }
}
