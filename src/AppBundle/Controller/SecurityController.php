<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;
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
            
            return $this->redirectToRoute('replace_with_some_route');
        }
        
        return $this->render('security/registration.html.twig', array('form'=>$form->createView()));
    }
}
