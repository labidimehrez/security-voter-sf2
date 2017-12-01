<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }

   /**
    * @Route("/show", name="show")
    */
   public function showAction()
   {
       $em = $this->getDoctrine()->getManager();
       $sujets = $em->getRepository('AppBundle:Sujet')->findAll();
       $sujet=[];
       foreach ($sujets as $suj) {
           if (false !==  $this->get('security.context')->isGranted('ROLE_SUJET_EDIT', $suj)) {
               $sujet[] = $suj;
           }
            
           if (false !== $this->get('security.context')->isGranted('ROLE_SUJET_DELETE', $suj)) {
               if (!in_array($suj, $sujet)) {
                   $sujet[]=$suj;
               }
           }
       }
       return $this->render('default/show.html.twig', array(
                    'sujet' => $sujet
        ));
   }
}
