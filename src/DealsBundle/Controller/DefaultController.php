<?php

namespace DealsBundle\Controller;

use DealsBundle\Entity\Deal;
use DealsBundle\Form\DealType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    public function ajout_dealAction(Request $request)
    {
        $deal = new Deal();
        $form = $this->createForm(DealType::class,$deal);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $op=$deal->getOldprix()-($deal->getOldprix()*$deal->getPromotion()/100);
            $deal->setNewprix($op);
            $deal->setDatecreation(new \DateTime('now'));
            $deal->setIduser($this->getUser());
            $em->persist($deal);
            $em->flush();
            return $this->redirectToRoute("Deals_list");
        }
        return $this->render("DealsBundle:Deals:ajout_deal.html.twig"
            , array('form' => $form->createView()));
    }
    public function list_dealAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT d
    FROM DealsBundle:Deal d');
        $cat = $query->getResult();
        return $this->render("DealsBundle:Deals:list_deal.html.twig",
            array('cat' => $cat
            ));

    }
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $deal = $em->getRepository("DealsBundle:Deal")->find($id);
        $form = $this->createForm(DealType::class, $deal);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $op=$deal->getOldprix()-($deal->getOldprix()*$deal->getPromotion()/100);
            $deal->setDatecreation(new \DateTime('now'));
            $deal->setNewprix($op);
            $em->persist($deal);
            $em->flush();
            return $this->redirectToRoute("Deals_list");
        }
        return $this->render("DealsBundle:Deals:update_deal.html.twig"
            , array('form' => $form->createView())
        );

    }
    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $deal = $em->getRepository("DealsBundle:Deal")->find($id);
        $em->remove($deal);
        $em->flush();
        return $this->redirectToRoute("Deals_list");
    }
    public function delautoAction()
    {

            $now = new \DateTime('now');

            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery('DELETE  FROM DealsBundle:Deal D 
            WHERE D.datecreation <:now ')
                ->SetParameter('now', $now);
            $query->getResult();



    }

    public function rechercheAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $search = $em->getRepository("DealsBundle:Deal")->findAll();
        $cat=$em->getRepository('DealsBundle:CatDeal')->findAll();
        $s=$request->get('search');
        $c=$request->get('cat');
        if ($request->isMethod('POST') and $s=='' and $c=='')
        { return $this->redirectToRoute('Deals_list');}

        if ($request->isMethod('POST') and $s!='')
        {
                $this->redirectToRoute('Deals_list');
                $p=$em->createQuery("Select d from DealsBundle:Deal d WHERE d.nom LIKE :s")->setParameter('s', '%'.$s.'%');
                $search=$p->getResult();

        }
        return $this->render("DealsBundle:Deals:list_deal.html.twig", array('search' => $search,'cat'=>$cat));
        }
    public function profil_dealAction($id)
    {


        $em = $this->getDoctrine()->getManager();
        $deal = $em->getRepository("DealsBundle\\Entity\\Deal")->findBy(array('id'=>$id));
        return $this->render('DealsBundle:Deals:deal_profile.html.twig',
            array('deal' => $deal));
    }
}
