<?php
/**
 * Created by PhpStorm.
 * User: Skan
 * Date: 18/02/2018
 * Time: 23:04
 */

namespace DealsBundle\Controller;


use DealsBundle\Entity\CatDeal;
use DealsBundle\Form\CatDealType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CatDealController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT d
    FROM DealsBundle:CatDeal d');
        $cat = $query->getResult();
        return $this->render('DealsBundle:Default:index.html.twig',array('cat'=>$cat));
    }
    public function ajout_catAction(Request $request)
    {
        $cat_deal = new CatDeal();
        $form = $this->createForm(CatDealType::class,$cat_deal);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat_deal);
            $em->flush();
            return $this->redirectToRoute("Deals_homepage");
        }
        return $this->render("DealsBundle:CatDeal:ajout_cat.html.twig"
            , array('form' => $form->createView()));
    }
    public function update_catAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $cat_deal = $em->getRepository("DealsBundle:CatDeal")->find($id);
        $form = $this->createForm(CatDealType::class, $cat_deal);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em->persist($cat_deal);
            $em->flush();
            return $this->redirectToRoute("Deals_homepage");
        }
        return $this->render("DealsBundle:CatDeal:update_cat.html.twig"
            , array('form' => $form->createView())
        );
    }
    public function delete_catAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $cat_deal = $em->getRepository("DealsBundle:CatDeal")->find($id);
        $em->remove($cat_deal);
        $em->flush();
        return $this->redirectToRoute("Deals_homepage");
    }
}