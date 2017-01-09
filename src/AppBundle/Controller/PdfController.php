<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\OrderCar;
use Symfony\Component\HttpFoundation\Response;;

class PdfController extends Controller
{
    /**
     * @Route("/pdf-{order}", name="pdf")
     */
    public function pdfAction(Request $request, $order){
        $db=$this->getDoctrine()->getManager();
        $o=$db->getRepository('AppBundle:OrderCar')->find($order);
        
        $html=$this->renderView('order/pdf.html.twig', array(
            'order'=>$o
        ));
        
        $filename = sprintf('Zamowienie-%s.pdf', $order);
        
        return new Response($this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            ]);
    }
}