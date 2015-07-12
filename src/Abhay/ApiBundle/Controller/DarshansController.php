<?php

namespace Abhay\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\View\View;
use FOS\Rest\Util\Codes;
use FOS\RestBundle\Controller\FOSRestController;
/*
* @Route("/darshans")
*/
class DarshansController extends Controller
{
    public function getDarshansAction()
    {
        
	    $darshanManager = $this->get('abhay_api.darshan_manager');

	    $darshans = $darshanManager->loadAll();
	    $output = array();
	    foreach ($darshans as $darshan ) {
	    	$output[] = $darshan->serialise();
	    }
	    return array("darshans"=>$output);
    }
    public function postDarshansAction()
    {
        
	    $postData = $this->getRequest()->request->all();
        $darshanManager = $this->get('abhay_api.darshan_manager');
        $darshan = $darshanManager->add($postData);
        return View::create($darshan->serialise(),
        	   Codes::HTTP_CREATED);
     }


}
