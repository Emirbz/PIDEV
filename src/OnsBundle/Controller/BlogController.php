<?php
/**
 * Created by PhpStorm.
 * User: ons
 * Date: 14/02/2018
 * Time: 00:06
 */

namespace OnsBundle\Controller;

use OnsBundle\Entity\Comment;
use OnsBundle\Form\CommentType;
use OnsBundle\Entity\Article;
use OnsBundle\Entity\Theme;
use OnsBundle\Form\ArticleType;
use OnsBundle\Form\ThemeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;


class BlogController extends Controller
{

    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "select Article from OnsBundle:Article Article";
        $query = $em->createQuery($dql);
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            3/*limit per page*/
        );
        if ($request->isMethod('POST'))
        {
            {
                $title = $request->get('title');
               
                $Article = $em->getRepository("OnsBundle:Article")

                    ->findBy(array("title" => $title));
                $this->redirectToRoute('App_bon_plan_list_article');
            }
        }
        return $this->render("@Ons/Blog/articles.html.twig",
            array('pagination' => $pagination
            ));

    }

    public function detailsAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Article = $em->getRepository("OnsBundle:Article")
            ->find($id);
        $title = $Article->getTitle();
        $content = $Article->getContent();
        $date = $Article->getDate();
        //commentaire
        $Comment = new Comment();

        $Comment->setIdUser($this->getUser());
        $Comment->setDate(new \DateTime('now'));
        $Comment->setIdArticle($Article);
        $form = $this->createForm(CommentType::class, $Comment);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Comment);
            $em->flush();
        }
        return $this->render("OnsBundle:Blog:details.html.twig"
            ,array(
                "id"=>$id,
                "title"=>$title,
                "content"=>$content,
                "date"=>$date,
                "Article"=>$Article,
                'form'=>$form->createView()

            ));
    }
    public function addAction(Request $request)
    {

        $Article = new Article();
        $Article->setDate(new \DateTime('now'));
        $form = $this->createForm(ArticleType::class,$Article);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Article);
            $em->flush();
            return $this->redirectToRoute('App_bon_plan_list_article');
        }
        return $this->render("@Ons/Blog/addArticle.html.twig",
            array('form'=>$form->createView()));
    }

    public function updateAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Article = $em->getRepository("OnsBundle:Article")
            ->find($id);

        $Article->setDevisFile(
            new File($this->getParameter('images_directory').'/'.$Article->getDevisName())
        );
        $form = $this->createForm(ArticleType::class,$Article);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $em->persist($Article);
            $em->flush();

            return $this->redirectToRoute('App_bon_plan_list_article');
        }
        return $this->render("OnsBundle:Blog:updateArticle.html.twig"
            ,array("form"=>$form->createView()));
    }
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Article = $em->getRepository("OnsBundle:Article")->find($id);
        $em->remove($Article);
        $em->flush();
        return $this->redirectToRoute('App_bon_plan_list_article');
    }

    //Theme Related

    public function addThemeAction(Request $request)
    {
        $Theme = new Theme();
        $form = $this->createForm(ThemeType::class,$Theme);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Theme);
            $em->flush();
            return $this->redirectToRoute('App_bon_plan_list_theme');
        }
        return $this->render("@Ons/Theme/addTheme.html.twig",
            array('form'=>$form->createView()));
    }

    public function listThemeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Theme = $em->getRepository("OnsBundle:Theme")->findAll();
        if ($request->isMethod('POST'))
        {
            {
                $name = $request->get('name');

                $Theme = $em->getRepository("OnsBundle:Theme")

                    ->findBy(array("name" => $name));
                $this->redirectToRoute('App_bon_plan_list_theme');
            }
        }
        return $this->render("@Ons/Theme/listTheme.html.twig",
            array('Theme' => $Theme
            ));

    }


    public function deleteThemeAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Theme = $em->getRepository("OnsBundle:Theme")->find($id);
        $em->remove($Theme);
        $em->flush();
        return $this->redirectToRoute('App_bon_plan_list_theme');
    }

    //Comment related

    public function addCommentAction(Request $request)
    {


    }






}