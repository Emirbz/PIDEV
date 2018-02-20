<?php
/**
 * Created by PhpStorm.
 * User: Slim sl
 * Date: 14/02/2018
 * Time: 11:32
 */

namespace SlimBundle\Controller;


use SlimBundle\Entity\Categorie;
use SlimBundle\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategorieController extends Controller
{
    public function ajoutCategorieAction(Request $request)
    {
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            return $this->redirectToRoute("solo_ajout");
        }
        return $this->render("SlimBundle:Slim:AjoutCategorie.html.twig",
            array('form' => $form->createView()

            ));

    }
    public function listCategorieAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository("SlimBundle:Categorie")->findAll();
        return $this->render("SlimBundle:Slim:listCategorie.html.twig",
            array('categories' => $categories));

    }
    public function deleteCategorieAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository("SlimBundle:Categorie")->find($id);
        $em->remove($categorie);
        $em->flush();
        return $this->redirectToRoute("solo_list");


    }
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository("SlimBundle:Categorie")->find($id);
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em->persist($categorie);
            $em->flush();
            return $this->redirectToRoute("solo_list");
        }
        return $this->render("SlimBundle:Slim:updateCategorie.html.twig"
            , array('form' => $form->createView())
        );

    }


}