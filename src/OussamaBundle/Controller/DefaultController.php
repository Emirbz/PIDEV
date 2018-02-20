<?php

namespace OussamaBundle\Controller;

use OussamaBundle\Entity\Events;
use OussamaBundle\Entity\Temoignages;
use OussamaBundle\Form\eventsType;
use OussamaBundle\Form\temoignageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OussamaBundle:Default:index.html.twig');
    }


    public function addAction(Request $request)
    {
        $Events = new Events();
        $form = $this->createForm(eventsType::class,$Events);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Events);
            $em->flush();
            return $this->redirectToRoute('APP_bon_plan_afficher_events');
        }
        return $this->render("OussamaBundle:Event:add.html.twig"
            ,array(
                "form"=>$form->createView()
            ));
    }
    public function afficherAction(Request $request)
    {
        //Instantier l'Entity Manager
        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository("OussamaBundle:Events")
            ->findAll();
        if($request->isMethod("post")){
            $criteria = $request->get('name');

            $events = $em->getRepository("OussamaBundle:Events")
                ->findBy(array('name'=>$criteria));

        }

        return $this->render('OussamaBundle:Event:afficher.html.twig', array(
            "events"=>$events
        ));
    }
    public function updateAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository("OussamaBundle:Events")
            ->find($id);
        $form = $this->createForm(eventsType::class,$event);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $em->persist($event);
            $em->flush();
            return $this->redirectToRoute('afficher');
        }
        return $this->render("OussamaBundle:Event:modifier.html.twig"
            ,array("Form"=>$form->createView()));
    }
    public function rechercheAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository("OussamaBundle:Events")
            ->findAll();
        if($request->isMethod("post")){
            $criteria = $request->get('name');

            $events = $em->getRepository("OussamaBundle:Events")
                ->findBy(array('name'=>$criteria));

        }

        return $this->render('OussamaBundle:Event:afficher.html.twig',
            array("events"=>$events));
    }
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository("OussamaBundle:Events")->find($id);
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute('APP_bon_plan_afficher_events');
    }
    public function ajouterAction(Request $request)
    {
        $Temoignages = new Temoignages();
        $form = $this->createForm(temoignageType::class,$Temoignages);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Temoignages);
            $em->flush();
            return $this->redirectToRoute('APP_bon_plan_ajout_temoignage');
        }
        return $this->render("OussamaBundle:Temoignages:ajout.html.twig"
            ,array(
                "form"=>$form->createView()
            ));
    }
    public function rechercherAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository("OussamaBundle:Temoignages")
            ->findAll();
        if($request->isMethod("post")){
            $criteria = $request->get('name');

            $events = $em->getRepository("OussamaBundle:Temoignages")
                ->findBy(array('name'=>$criteria));

        }

        return $this->render('OussamaBundle:Event:afficher.html.twig',
            array("events"=>$events));
    }


}