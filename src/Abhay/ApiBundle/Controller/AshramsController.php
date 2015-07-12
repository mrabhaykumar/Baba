<?php

namespace Abhay\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\View\View;
use FOS\Rest\Util\Codes;
use FOS\RestBundle\Controller\FOSRestController;
/*
* @Route("/ashrams")
*/
class AshramsController extends Controller
{
    public function getAshramsAction()
    {
        
        $ashramManager = $this->get('abhay_api.ashram_manager');

        $ashrams = $ashramManager->loadAll();
        $output = array();
        foreach ($ashrams as $ashram ) {
            $output[] = $ashram->serialise();
        }
        return array("ashrams"=>$output);
    }
    public function postAshramsAction()
    {
        
        $postData = $this->getRequest()->request->all();
        $ashramManager = $this->get('abhay_api.ashram_manager');
        $ashram = $ashramManager->add($postData);
        return View::create($ashram->serialise(),
               Codes::HTTP_CREATED);
     }


}
