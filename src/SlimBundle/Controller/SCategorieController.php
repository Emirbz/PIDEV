<?php
/**
 * Created by PhpStorm.
 * User: Slim sl
 * Date: 14/02/2018
 * Time: 12:05
 */

namespace SlimBundle\Controller;


use SlimBundle\Entity\Sous_Categorie;
use SlimBundle\Form\Sous_CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SCategorieController extends  Controller
{
    public function ajoutSCategorieAction(Request $request)
    {
        $Scategorie = new Sous_Categorie();
        $form = $this->createForm(Sous_CategorieType::class, $Scategorie);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Scategorie);
            $em->flush();
            return $this->redirectToRoute("solo_ajout2");
        }
        return $this->render("SlimBundle:Slim:SAjoutCategorie.html.twig",
            array('form' => $form->createView()

            ));

    }

    public function listSCategorieAction()
    {
        $em = $this->getDoctrine()->getManager();
        $Scategories = $em->getRepository("SlimBundle:Sous_Categorie")->findAll();
        return $this->render("SlimBundle:Slim:listSCategorie.html.twig",
            array('Scategories' => $Scategories));

    }

    public function deleteSCategorieAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $Scategorie = $em->getRepository("SlimBundle:Sous_Categorie")->find($id);
        $em->remove($Scategorie);
        $em->flush();
        return $this->redirectToRoute("solo_list2");


    }

    public function SupdateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Scategorie = $em->getRepository("SlimBundle:Sous_Categorie")->find($id);
        $form = $this->createForm(Sous_CategorieType::class, $Scategorie);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em->persist($Scategorie);
            $em->flush();
            return $this->redirectToRoute("solo_list2");
        }
        return $this->render("SlimBundle:Slim:updateSCategorie.html.twig"
            , array('form' => $form->createView())
        );
    }
}