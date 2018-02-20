<?php
/**
 * Created by PhpStorm.
 * User: ons
 * Date: 14/02/2018
 * Time: 00:06
 */

namespace OnsBundle\Controller;


use OnsBundle\Entity\Article;
use OnsBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;

class BlogController extends Controller
{

    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Article = $em->getRepository("OnsBundle:Article")->findAll();
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
            array('Article' => $Article
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
        $devisFile = $Article->getDevisFile();
        $date = $Article->getDate();
        return $this->render("OnsBundle:Blog:details.html.twig"
            ,array(
                "id"=>$id,
                "title"=>$title,
                "content"=>$content,
                "devisFile"=>$devisFile,
                "date"=>$date


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

        $Article->setImage(
            new File($this->getParameter('images_directory').'/'.$Article->getImage())
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
        return $this->render("@Ons/Blog/addTheme.html.twig",
            array('form'=>$form->createView()));
    }

}