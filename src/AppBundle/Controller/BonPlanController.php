<?php
/**
 * Created by PhpStorm.
 * User: Emir
 * Date: 04/02/2018
 * Time: 16:01
 */

namespace AppBundle\Controller;



use OnsBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BonPlanController extends Controller
{
    public function layoutAction()
    {
        return $this->render('base.html.twig');
    }
    public function homeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $Article = $em->getRepository("OnsBundle:Article")->findAll();
        return $this->render('default/index.html.twig', array("Article" => $Article));
    }





    public function contactAction()
    {
        return $this->render('Contact/contact.html.twig');
    }
    public function adminAction()
    {
        return $this->render('admin.html.twig');
    }
}