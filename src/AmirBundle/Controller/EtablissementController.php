<?php
/**
 * Created by PhpStorm.
 * User: Emir
 * Date: 12/02/2018
 * Time: 16:44
 */

namespace AmirBundle\Controller;





use AmirBundle\Entity\Etablissement;


use AmirBundle\Form\HotelType;
use AmirBundle\Form\RestaurantType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class EtablissementController extends Controller
{
    public function ajout_restaurantAction(Request $request)

   {
       $restaurant = new Etablissement();

       $restaurant->setCategorie('Restaurant');
       $restaurant->setIduser($this->getUser());
       $form = $this->createForm(RestaurantType::class,$restaurant);


       $form->handleRequest($request);
       if ($form->isSubmitted() && ($form->isValid()))
       {

           $em = $this->getDoctrine()->getManager();
           $em->persist($restaurant);
           $em->flush();
           return  $this->redirectToRoute('App_bon_plan_list_restaurant');
       }
       return $this->render("@Amir/Etablissement/ajout_restaurant.html.twig"
           , array('form' => $form->createView()));

   }
    /**
     * @return string
     */


    public function list_restaurantAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")->findBy(array('categorie'=>'Restaurant'));

        if ($request->isMethod('POST') and $request->get('name')=='')
        { return $this->redirectToRoute('App_bon_plan_list_restaurant');
        }

        if ($request->isMethod('POST'))
        {
            $name=$request->get('name');
            $address=$request->get('address');
            $this->redirectToRoute('App_bon_plan_list_restaurant');
            $restaurant = $em->getRepository("AmirBundle:Etablissement")
                ->findBy(array("name"=> $name,"address"=>$address));
        }
        return $this->render("AmirBundle:Etablissement:list_restaurant.html.twig",
            array('restaurants' => $restaurant
            ));
    }
    public function updateAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")
            ->find($id);



        $form = $this->createForm(RestaurantType::class,$restaurant);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $em->persist($restaurant);
            $em->flush();
            return $this->redirectToRoute('App_bon_plan_list_restaurant');
        }
        return $this->render("@Amir/Etablissement/update_restaurant.html.twig"
            ,array("form"=>$form->createView()));
    }
    public function updatehotelAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")
            ->find($id);



        $form = $this->createForm(HotelType::class,$restaurant);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $em->persist($restaurant);
            $em->flush();
            return $this->redirectToRoute('App_bon_plan_list_hotels');
        }
        return $this->render("@Amir/Etablissement/update_hotel.twig"
            ,array("form"=>$form->createView()));
    }
    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")->find($id);
        $em->remove($restaurant);
        $em->flush();
        return $this->redirectToRoute("App_bon_plan_list_restaurant"); }




    public function profil_restaurantAction($id)
    {


        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")->findBy(array('id'=>$id));
        return $this->render('@Amir/Etablissement/profil_restaurant.html.twig',
            array('restaurants' => $restaurant));
    }
    public function profil_hotelAction($id)
    {


        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")->findBy(array('id'=>$id));
        return $this->render('@Amir/Hotel/profil_hotel.html.twig',
            array('restaurants' => $restaurant));
    }


    public function list_hotelsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")->findBy(array('categorie'=>'Hotel'));

        if ($request->isMethod('POST') and $request->get('name')=='')
        { return $this->redirectToRoute('App_bon_plan_list_hotels');
        }

        if ($request->isMethod('POST'))
        {
            $name=$request->get('name');
            $address=$request->get('address');
            $this->redirectToRoute('App_bon_plan_list_hotels');
            $restaurant = $em->getRepository("AmirBundle:Etablissement")
                ->findBy(array("name"=> $name,"address"=>$address));
        }
        return $this->render("@Amir/Hotel/list_hotels.html.twig",
            array('restaurants' => $restaurant
            ));
    }
    public function list_beaute_et_bien_etreAction()
    {
        return $this->render('@Amir/Beauteetbienetre/list_beaute_et_bien_etre.html.twig');
    }
    public function ajout_etablissementAction()
    {
        return $this->render('@Amir/Etablissement/Ajout Etablissement.twig');
    }
    public function ajout_hotelAction(Request $request)
    {
        $restaurant = new Etablissement();
        $restaurant->setCategorie('Hotel');
        
        $form = $this->createForm(HotelType::class,$restaurant);


        $form->handleRequest($request);
        if ($form->isSubmitted() && ($form->isValid()))
        {

            $em = $this->getDoctrine()->getManager();
            $em->persist($restaurant);
            $em->flush();
            return  $this->redirectToRoute('App_bon_plan_list_hotels');
        }
        return $this->render("@Amir/Hotel/ajout_hotel.html.twig"
            , array('form' => $form->createView()));
    }


}
