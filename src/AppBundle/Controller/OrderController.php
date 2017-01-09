<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\OrderCar;
use AppBundle\Entity\Facility;
use AppBundle\Form\OrderType;

class OrderController extends Controller
{
    /**
    * @Route("/rezerwacja/{car}", name="order")
    */
    public function orderAction(Request $request, $car)
    {
        $db=$this->getDoctrine()->getManager();
        $c=$db->getRepository('AppBundle:Car')->find($car);
        
        $user=$this->getUser();
        
        $order=new OrderCar();
        
        $form=$this->createForm(OrderType::class, $order);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted()){
            
            $order=$form->getData();
            $order->setCar($c);        
            $order->setUser($user);
            $c->addOrderCar($order);
            $user->addOrderUser($order);
            
            $db->persist($order);
            $db->flush();
            
            $message="Rezerwacja przebiegla pomyslnie";
            
            return $this->render('information/information.html.twig', array('message'=>$message));
        }
        
        return $this->render('order/order.html.twig', array('c'=>$c, 'car'=>$car, 'form'=>$form->createView()));
    }
    
}