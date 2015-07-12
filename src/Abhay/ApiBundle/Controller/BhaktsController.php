<?php

namespace Abhay\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\View\View;
use FOS\Rest\Util\Codes;
use FOS\RestBundle\Controller\FOSRestController;
/*
* @Route("/bhakts")
*/
class BhaktsController extends Controller
{
    public function getBhaktsAction()
    {
        
	    $bhaktManager = $this->get('abhay_api.bhakt_manager');

	    $bhakts = $bhaktManager->loadAll();
	    $output = array();
	    foreach ($bhakts as $bhakt ) {
	    	$output[] = $bhakt->serialise();
	    }
	    return array("bhakts"=>$output);
    }
    public function postBhaktsAction()
    {
        
	    $postData = $this->getRequest()->request->all();
        $bhaktManager = $this->get('abhay_api.bhakt_manager');
        $bhakt = $bhaktManager->add($postData);
        return View::create($bhakt->serialise(),
        	   Codes::HTTP_CREATED);
     }


}
