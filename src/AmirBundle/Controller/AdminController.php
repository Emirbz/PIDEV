<?php
/**
 * Created by PhpStorm.
 * User: Emir
 * Date: 26/02/2018
 * Time: 18:50
 */

namespace AmirBundle\Controller;


use AmirBundle\Entity\Etablissement;
use AmirBundle\Form\BeauteType;
use AmirBundle\Form\CultureType;
use AmirBundle\Form\HotelType;
use AmirBundle\Form\RestaurantType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function ajout_restaurantAction(Request $request)

    {
        $restaurant = new Etablissement();

        $restaurant->setCategorie('Restaurant');
        $restaurant->setIduser($this->getUser());
        $form = $this->createForm(RestaurantType::class, $restaurant);


        $form->handleRequest($request);
        if ($form->isSubmitted() && ($form->isValid())) {
            $file = $restaurant->getImg1();

            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('brochures_directory'), $fileName);
            $restaurant->setImg1($fileName);
            $file2 = $restaurant->getimg2();

            $fileName2 = $this->generateUniqueFileName() . '.' . $file2->guessExtension();
            $file2->move(
                $this->getParameter('brochures_directory'), $fileName2);
            $restaurant->setimg2($fileName2);

            $file3 = $restaurant->getimg3();
            $fileName3 = $this->generateUniqueFileName() . '.' . $file3->guessExtension();
            $file3->move(
                $this->getParameter('brochures_directory'), $fileName3);
            $restaurant->setimg3($fileName3);

            $em = $this->getDoctrine()->getManager();
            $em->persist($restaurant);
            $em->flush();
            return $this->redirectToRoute('App_bon_plan_list_restaurant_admin');
        }
        return $this->render("@Amir/Admin/Ajout_restaurant.html.twig"
            , array('form' => $form->createView()));

    }

    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

    public function updateAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")
            ->find($id);
        $form = $this->createForm(RestaurantType::class, $restaurant);


        $form->handleRequest($request);
        if ($form->isValid()) {
            $file = $restaurant->getImg1();
            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move($this->getParameter('brochures_directory'), $fileName);
            $restaurant->setImg1($fileName);
            ##############
            $file2 = $restaurant->getimg2();
            $fileName2 = $this->generateUniqueFileName() . '.' . $file2->guessExtension();
            $file2->move($this->getParameter('brochures_directory'), $fileName2);
            $restaurant->setimg2($fileName2);
            #########
            $file3 = $restaurant->getimg3();
            $fileName3 = $this->generateUniqueFileName() . '.' . $file3->guessExtension();
            $file3->move($this->getParameter('brochures_directory'), $fileName3);
            $restaurant->setimg3($fileName3);
            ########
            $em->persist($restaurant);
            $em->flush();
            return $this->redirectToRoute('App_bon_plan_list_restaurant_admin');

        }
        return $this->render("AmirBundle:Admin:update_restaurant.html.twig", array("form" => $form->createView()));
    }

    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")->find($id);
        $em->remove($restaurant);
        $em->flush();
        return $this->redirectToRoute("App_bon_plan_list_restaurant_admin");
    }


    public function list_restaurantAction()
    {
        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")->findBy(array('categorie' => 'Restaurant'));

        return $this->render("@Amir/Admin/list_restaurant.html.twig",
            array('restaurants' => $restaurant
            ));
    }

    public function ajout_cultureAction(Request $request)

    {
        $restaurant = new Etablissement();

        $restaurant->setCategorie('Espace Culturel');
        $restaurant->setIduser($this->getUser());
        $form = $this->createForm(CultureType::class, $restaurant);


        $form->handleRequest($request);
        if ($form->isSubmitted() && ($form->isValid())) {
            $file = $restaurant->getImg1();

            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('brochures_directory'), $fileName);
            $restaurant->setImg1($fileName);
            $file2 = $restaurant->getimg2();

            $fileName2 = $this->generateUniqueFileName() . '.' . $file2->guessExtension();
            $file2->move(
                $this->getParameter('brochures_directory'), $fileName2);
            $restaurant->setimg2($fileName2);

            $file3 = $restaurant->getimg3();
            $fileName3 = $this->generateUniqueFileName() . '.' . $file3->guessExtension();
            $file3->move(
                $this->getParameter('brochures_directory'), $fileName3);
            $restaurant->setimg3($fileName3);

            $em = $this->getDoctrine()->getManager();
            $em->persist($restaurant);
            $em->flush();
            return $this->redirectToRoute('App_bon_plan_list_culture_admin');
        }
        return $this->render("@Amir/Admin/Ajout_culture.html.twig"
            , array('form' => $form->createView()));

    }

    public function ajout_beauteAction(Request $request)

    {
        $restaurant = new Etablissement();

        $restaurant->setCategorie('Beauté et bien être');
        $restaurant->setIduser($this->getUser());
        $form = $this->createForm(BeauteType::class, $restaurant);


        $form->handleRequest($request);
        if ($form->isSubmitted() && ($form->isValid())) {
            $file = $restaurant->getImg1();

            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('brochures_directory'), $fileName);
            $restaurant->setImg1($fileName);
            $file2 = $restaurant->getimg2();

            $fileName2 = $this->generateUniqueFileName() . '.' . $file2->guessExtension();
            $file2->move(
                $this->getParameter('brochures_directory'), $fileName2);
            $restaurant->setimg2($fileName2);

            $file3 = $restaurant->getimg3();
            $fileName3 = $this->generateUniqueFileName() . '.' . $file3->guessExtension();
            $file3->move(
                $this->getParameter('brochures_directory'), $fileName3);
            $restaurant->setimg3($fileName3);

            $em = $this->getDoctrine()->getManager();
            $em->persist($restaurant);
            $em->flush();
            return $this->redirectToRoute('App_bon_plan_list_beaute_et_bien_etre');
        }
        return $this->render("@Amir/Admin/Ajout_beaute.html.twig"
            , array('form' => $form->createView()));

    }

    public function list_hotelsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")->findBy(array('categorie' => 'Hotel'));


        return $this->render("@Amir/Admin/list_hotel.html.twig",
            array('restaurants' => $restaurant
            ));

    }

    public function ajout_hotelAction(Request $request)
    {
        $restaurant = new Etablissement();
        $restaurant->setCategorie('Hotel');
        $restaurant->setIduser($this->getUser());

        $form = $this->createForm(HotelType::class, $restaurant);


        $form->handleRequest($request);
        if ($form->isSubmitted() && ($form->isValid())) {
            $file = $restaurant->getImg1();
            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('brochures_directory'), $fileName);
            $restaurant->setImg1($fileName);
            $file2 = $restaurant->getimg2();

            $fileName2 = $this->generateUniqueFileName() . '.' . $file2->guessExtension();
            $file2->move(
                $this->getParameter('brochures_directory'), $fileName2);
            $restaurant->setimg2($fileName2);

            $file3 = $restaurant->getimg3();
            $fileName3 = $this->generateUniqueFileName() . '.' . $file3->guessExtension();
            $file3->move(
                $this->getParameter('brochures_directory'), $fileName3);
            $restaurant->setimg3($fileName3);

            $em = $this->getDoctrine()->getManager();
            $em->persist($restaurant);
            $em->flush();
            return $this->redirectToRoute('App_bon_plan_ajout_hotel_admin');
        }
        return $this->render("AmirBundle:Admin:Ajout_hotel.html.twig"
            , array('form' => $form->createView()));
    }

    public function list_cultureAction()
    {
        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")->findBy(array('categorie' => 'Espace Culturel'));

        return $this->render("AmirBundle:Admin:list_culture.html.twig",
            array('restaurants' => $restaurant
            ));
    }

    public function list_beauteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")->findBy(array('categorie' => 'Beauté et bien être'));

        return $this->render("AmirBundle:Admin:list_beaute.html.twig",
            array('restaurants' => $restaurant,
            ));


    }
    public function updatebeauteAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")
            ->find($id);
        $form = $this->createForm(BeauteType::class, $restaurant);



        $form->handleRequest($request);
        if($form->isValid()){
            $file = $restaurant->getImg1();
            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move($this->getParameter('brochures_directory'), $fileName);
            $restaurant->setImg1($fileName);
            ##############
            $file2 = $restaurant->getimg2();
            $fileName2 = $this->generateUniqueFileName() . '.' . $file2->guessExtension();
            $file2->move($this->getParameter('brochures_directory'), $fileName2);
            $restaurant->setimg2($fileName2);
            #########
            $file3 = $restaurant->getimg3();
            $fileName3 = $this->generateUniqueFileName() . '.' . $file3->guessExtension();
            $file3->move($this->getParameter('brochures_directory'), $fileName3);
            $restaurant->setimg3($fileName3);
            ########
            $em->persist ($restaurant);
            $em->flush();
            return $this->redirectToRoute('App_bon_plan_list_beaute_admin');

        }
        return $this->render("AmirBundle:Admin:update_beaute.html.twig",array("form"=>$form->createView()));
    }
    public function updatehotelAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")
            ->find($id);
        $form = $this->createForm(HotelType::class, $restaurant);


        $form->handleRequest($request);
        if($form->isValid()){
            $file = $restaurant->getImg1();
            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move($this->getParameter('brochures_directory'), $fileName);
            $restaurant->setImg1($fileName);
            ##############
            $file2 = $restaurant->getimg2();
            $fileName2 = $this->generateUniqueFileName() . '.' . $file2->guessExtension();
            $file2->move($this->getParameter('brochures_directory'), $fileName2);
            $restaurant->setimg2($fileName2);
            #########
            $file3 = $restaurant->getimg3();
            $fileName3 = $this->generateUniqueFileName() . '.' . $file3->guessExtension();
            $file3->move($this->getParameter('brochures_directory'), $fileName3);
            $restaurant->setimg3($fileName3);
            ########
            $em->persist ($restaurant);
            $em->flush();
            return $this->redirectToRoute('App_bon_plan_list_hotel_admin');

        }
        return $this->render("AmirBundle:Admin:update_hotel.html.twig",array("form"=>$form->createView()));
    }
    public function updatecultureAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository("AmirBundle:Etablissement")
            ->find($id);
        $form = $this->createForm(CultureType::class, $restaurant);



        $form->handleRequest($request);
        if($form->isValid()){
            $file = $restaurant->getImg1();
            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move($this->getParameter('brochures_directory'), $fileName);
            $restaurant->setImg1($fileName);
            ##############
            $file2 = $restaurant->getimg2();
            $fileName2 = $this->generateUniqueFileName() . '.' . $file2->guessExtension();
            $file2->move($this->getParameter('brochures_directory'), $fileName2);
            $restaurant->setimg2($fileName2);
            #########
            $file3 = $restaurant->getimg3();
            $fileName3 = $this->generateUniqueFileName() . '.' . $file3->guessExtension();
            $file3->move($this->getParameter('brochures_directory'), $fileName3);
            $restaurant->setimg3($fileName3);
            ########
            $em->persist ($restaurant);
            $em->flush();
            return $this->redirectToRoute('App_bon_plan_list_culture_admin',array('id'=>$id));

        }
        return $this->render("AmirBundle:Admin:update_culture.html.twig",array("form"=>$form->createView()));
    }
}