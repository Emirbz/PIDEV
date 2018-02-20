<?php

namespace SkanderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SkanderBundle:Default:index.html.twig');
    }
}
