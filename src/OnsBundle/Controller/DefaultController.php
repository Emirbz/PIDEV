<?php

namespace OnsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OnsBundle:Default:index.html.twig');
    }
    public function blogAction()
    {
        return $this->render('OnsBundle:Blog:articles.html.twig');
    }

}
