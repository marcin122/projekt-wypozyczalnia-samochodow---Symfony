<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Car;

class AjaxController extends Controller
{
    /**
    *@Method({"POST"})
    */
    public function findCarAction(Request $request)
    {
        $data=$request->get('input');
        $em=$this->getDoctrine()->getManager();
        
        $query=$em->createQuery('SELECT c FROM AppBundle:Car c WHERE c.marka LIKE :data OR c.model LIKE :data ORDER BY c.marka ASC')
                  ->setParameter('data', '%'.$data.'%');
        
        $results=$query->getResult();
        $carList='<ul id="matchList">';
        
        foreach ($results as $result) {
            $name=$result->getMarka().' '.$result->getModel();
            $matchStringBold = preg_replace('/('.$data.')/i', '<strong>$1</strong>', $name);
            $carList .= '<li id="'.$result->getMarka().'">'.$matchStringBold.'</li>';
        }
        $carList.='</ul>';
        
        $response=new JsonResponse();
        $response->setData(array('carList'=>$carList));
        return $response;
    }
}