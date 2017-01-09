<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Car;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
    public function carAction(Request $request)
    {   
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Car');
            
        $carList=$repository->findBy(
            array('id'=>'DESC')
        );
          
        $cars=$this->getDoctrine()->getRepository('AppBundle:Car')->findAll();
        
        $em=$this->getDoctrine()->getManager();
        
        $defaultData = array('message' => '');
        $form = $this->createFormBuilder($defaultData)
            ->add('name', TextType::class, array('label'=>false))
            ->add('send', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $data = $form->getData();
            $name="";
            foreach ($data as $d) {
                $name.=$d;
            }
            $n=explode(" ",$name);
            $parameters = array(
                'marka' => '%'.$n[0].'%', 
                'model' => '%'.$n[1].'%'
);
            
            $query=$em->createQuery('
            SELECT c 
            FROM AppBundle:Car c 
            WHERE c.marka LIKE :marka 
            AND c.model LIKE :model
            ')
            ->setParameters($parameters);
            
            $cars=$query->getResult();
        }
        
        return $this->render('page/car.html.twig', array('cars'=>$cars, 'carList'=>$carList, 'form'=>$form->createView()));
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
