<?php

namespace Abhay\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\View\View;
use FOS\Rest\Util\Codes;
use FOS\RestBundle\Controller\FOSRestController;
/*
* @Route("/babas")
*/
class BabasController extends Controller
{
    public function getBabasAction()
    {
        
	    $babaManger = $this->get('abhay_api.baba_manager');
	    $babas = $babaManger->loadAll();
	    $output = array();
	    foreach ($babas as $baba ) {
	    	$output[] = $baba->serialise();
	    }
	    return array("babas"=>$output);
    }
    public function postBabasAction()
    {
        
	    $postData = $this->getRequest()->request->all();
        $babaManager = $this->get('abhay_api.baba_manager');
        $baba = $babaManager->add($postData);
        return View::create($baba->serialise(),
        	   Codes::HTTP_CREATED);
     }


}
