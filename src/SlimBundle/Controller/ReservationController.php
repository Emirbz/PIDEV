<?php
/**
 * Created by PhpStorm.
 * User: Slim sl
 * Date: 14/02/2018
 * Time: 16:56
 */

namespace SlimBundle\Controller;


use SlimBundle\Entity\Reservation;
use SlimBundle\Form\ReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReservationController extends Controller
{
    public function ajoutReservationAction(Request $request)
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();
            return $this->redirectToRoute("listR");
        }
        return $this->render("SlimBundle:Slim:AjoutReservation.html.twig",
            array('form' => $form->createView()

            ));

    }
    public function listReservationAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository("SlimBundle:Reservation")->findAll();
        return $this->render("SlimBundle:Slim:listReservation.html.twig",
            array('reservations' => $reservations));

    }
    public function deleteReservationAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $reservation = $em->getRepository("SlimBundle:Reservation")->find($id);
        $em->remove($reservation);
        $em->flush();
        return $this->redirectToRoute("reservation_list");


    }
    public function updateReservationAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $reservation = $em->getRepository("SlimBundle:Reservation")->find($id);
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em->persist($reservation);
            $em->flush();
            return $this->redirectToRoute("reservation_list");
        }
        return $this->render("SlimBundle:Slim:updateReservation.html.twig"
            , array('form' => $form->createView())
        );

    }


}