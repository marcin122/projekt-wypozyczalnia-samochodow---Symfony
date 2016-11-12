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
        $contact="Kontakt";
        return $this->render('page/contact.html.twig', array('contact' =>$contact));
    }
    
    /**
     * @Route("/samochody", name="carpage")
     */
    public function carAction()
    {
        
        return $this->render('page/car.html.twig');
    }
    
    /**
     * @Route("/warunku-najmu", name="detailpage")
     */
    public function detailAction()
    {
        
        return $this->render('page/detail.html.twig');
    }
    
    /**
     * @Route("/cennik", name="pricepage")
     */
    public function priceAction()
    {
        
        return $this->render('page/price.html.twig');
    }
    
    /**
     * @Route("/punkty-odbioru", name="placepage")
     */
    public function placeAction()
    {
        
        return $this->render('page/place.html.twig');
    }
}
