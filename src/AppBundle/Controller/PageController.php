<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        
        return $this->render('page/index.html.twig');
    }
    
    /**
     * @Route("/kontakt", name="contactpage")
     */
    public function contactAction()
    {
        
        return $this->render('page/contact.html.twig');
    }
    
    /**
     * @Route("/kontakt", name="contactpage")
     */
    public function contactAction()
    {
        
        return $this->render('page/contact.html.twig');
    }
    
    /**
     * @Route("/kontakt", name="contactpage")
     */
    public function contactAction()
    {
        
        return $this->render('page/contact.html.twig');
    }
    
    /**
     * @Route("/kontakt", name="contactpage")
     */
    public function contactAction()
    {
        
        return $this->render('page/contact.html.twig');
    }
}
