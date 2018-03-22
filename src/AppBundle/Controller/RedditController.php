<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class RedditController extends Controller{
    
    /**
     * @Route("/posts", name="list")
     */
    
    public function listAction()
    {   
        $posts = $this->getDoctrine()->getRepository('AppBundle:RedditPost')->findAll();
        return $this->render('reddit/index.html.twig',[
            'posts' => $posts 
        ]);
    }
}
