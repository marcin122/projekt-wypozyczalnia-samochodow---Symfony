<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\UserType;
use AppBundle\Form\OrderType;
use AppBundle\Entity\User;
use AppBundle\Entity\OrderCar;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends Controller
{
    /**
     * @Route("/logowanie", name="login")
     */
     public function loginAction()
     {
         $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', array(
          'last_username' => $lastUsername,
          'error'         => $error,
        ));
     }
    
    /**
     * @Route("/rejestracja", name="registration")
     */
    public function registerAction(Request $request)
    {
        $user=new User();
        $form=$this->createForm(UserType::class, $user);
        
        $form->handleRequest($request);
     
        if($form->isSubmitted())
        {
            $validator=$this->get('validator');
            $errors=$validator->validate($user);
            
            if(count($errors)>0){
                return $this->render('security/registrationError.html.twig', array('errors' => $errors, 'form'=>$form->createView()));
            }
            
            $password=$this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
            $user->setHaslo($password);
            
            $em=$this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            return $this->redirectToRoute('homepage');
        }
        
        return $this->render('security/registration.html.twig', array('form'=>$form->createView()));
    }
    
    /**
    * @Route("twoje-konto", name="user")
    */
    public function userAction(Request $request){
        
        $db=$this->getDoctrine()->getManager();
        $user=$this->getUser();
        $order=$db->getRepository('AppBundle:OrderCar')->findByUser($user);
      
        return $this->render('order/userorders.html.twig', array(
            'orders'=>$order,
        ));
    }
    
    /**
    * @Route("twoje-konto/remove-{order}", name="remove")
    */
    public function removeOrderAction(Request $request, $order){
        $db=$this->getDoctrine()->getManager();
        
        $o=$db->getRepository('AppBundle:OrderCar')->find($order);
        $o->getCar()->removeOrderCar($o);
        $o->getFacility()->removeOrderFacility($o);
        
        $db->remove($o);
        $db->flush();
        
        return $this->redirectToRoute('user');
    }
  
    /**
    * @Route("twoje-konto/updatecar-{order}", name="updatecarlist")
    */
    public function listCarAction(Request $request, $order){
        $db=$this->getDoctrine()->getManager();
        $cars=$db->getRepository('AppBundle:Car')->findAll();
        
        return $this->render('order/updatecar.html.twig', array(
            'cars'=>$cars,
            'order'=>$order
        ));
    }
  
    /**
    * @Route("twoje-konto/updatecar-{order}/{car}", name="updatecar")
    */
    public function updateCarAction(Request $request, $order, $car){
        $db=$this->getDoctrine()->getManager();
        
        $orderDb=$db->getRepository('AppBundle:OrderCar')->find($order);
        
            
        $c=$db->getRepository('AppBundle:Car')->find($car);
        $orderDb->getCar()->removeOrderCar($orderDb);
        $orderDb->setCar($c);
        $orderDb->getCar()->addOrderCar($orderDb);
        $db->flush();
            
        return $this->redirectToRoute('user');
    }
    
    /**
    * @Route("twoje-konto/updatefac-{order}", name="updatefac")
    */
    public function updateFacilityAction(Request $request, $order){
        $db=$this->getDoctrine()->getManager();
        
        $orderDb=$db->getRepository('AppBundle:OrderCar')->find($order);
        
        $form=$this->createForm(OrderType::class, $orderDb);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted()){
            $orderDb->getFacility()->removeOrderFacility($orderDb);
            $orderDb->getFacility()->addOrderFacility($orderDb);
            $db->flush();
            return $this->redirectToRoute('user');
        }
        return $this->render('order/updatefac.html.twig', array(
            'c'=>$orderDb->getCar(), 
            'form'=>$form->createView(),
            'order'=>$orderDb
            ));
    }
}
