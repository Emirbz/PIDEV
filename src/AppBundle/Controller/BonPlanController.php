<?php
/**
 * Created by PhpStorm.
 * User: Emir
 * Date: 04/02/2018
 * Time: 16:01
 */

namespace AppBundle\Controller;



use AppBundle\Entity\Restaurant;
use AppBundle\Form\RestaurantType;
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
        return $this->render('default/index.html.twig');
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