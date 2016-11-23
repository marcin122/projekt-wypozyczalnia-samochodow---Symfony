<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;

class SecurityController extends Controller
{
    /**
     * @Route("/logowanie", name="login")
     */
     public function loginAction()
     {
         $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
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
            $password=$this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            
            $em=$this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            return $this->redirectToRoute('replace_with_some_route');
        }
        
        return $this->render('security/registration.html.twig', array('form'=>$form->createView()));
    }
}
