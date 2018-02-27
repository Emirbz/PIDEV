<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)


    {

        #########Recherche Etablissement################
        $em = $this->getDoctrine()->getManager();
        $souscat = $em->CreateQuery("SELECT v  From SlimBundle:Categorie v")->getResult();
        $name = $request->get('name');
        $cat = $request->get('sc');
        $restaurant = $em->CreateQuery("SELECT v  From AmirBundle:Etablissement v where v.categorie=:p AND v.name LIKE '%$name%'")->setParameter('p',$cat)->getResult();
        if ($request->isMethod('POST'))
        {
            if($cat=='Restaurant')
                { $souscat = $em->CreateQuery("SELECT v  From SlimBundle:sous_categorie v where v.idCategorie=4");
                    $soucatresult = $souscat->getResult();

                    return $this->render("AmirBundle:Etablissement:list_restaurant.html.twig",
                    array('restaurants' => $restaurant, 'souscat' => $soucatresult
                    ));
                }
            if($cat=='Hôtel')
            { $souscat = $em->CreateQuery("SELECT v  From SlimBundle:sous_categorie v where v.idCategorie=3");
                $soucatresult = $souscat->getResult();
                return $this->render("@Amir/Hotel/list_hotels.html.twig",
                    array('restaurants' => $restaurant, 'souscat' => $soucatresult
                    ));
            }
            if ($cat=='Espace culturel')
            {
                $souscat = $em->CreateQuery("SELECT v  From SlimBundle:sous_categorie v where v.idCategorie=2");
                $soucatresult = $souscat->getResult();
                return $this->render("@Amir/Culture/list_culture.html.twig",
                    array('restaurants' => $restaurant, 'souscat' => $soucatresult
                    ));
            }
            if ($cat=='Beauté et bien être')
            {$souscat = $em->CreateQuery("SELECT v  From SlimBundle:sous_categorie v where v.idCategorie=4");
                $soucatresult = $souscat->getResult();
                return $this->render("AmirBundle:Beauteetbienetre:list_beaute_et_bien_etre.html.twig",
                    array('restaurants' => $restaurant, 'souscat' => $soucatresult
                    ));
            }
        }
        ##############FINNNNNN #######################

        ############### RECHERCHE Evenemnts#################


        ################FIN EVENEMNTS################
        ############### RECHERCHE DEAL#################


        ################FINN DEAL#################
        ############### RECHERCHE Article#################


        ################FIN ARTICLE#################

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig',array(
            'restaurant' => $restaurant,
            'souscat' => $souscat
        ));
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
