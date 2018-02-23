<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use OnsBundle\Entity\Article;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Article = $em->getRepository("OnsBundle:Article")->findAll();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig',[
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            "Article" => $Article
        ]);
    }
    public function getTokenAction()
    {
        return new Response($csrfToken = $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue());


    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/who-is-user", name="user_question")
     */
    public function determineuser(Request $request)
    {

        return $this->render('user.html.twig');
    }
}
