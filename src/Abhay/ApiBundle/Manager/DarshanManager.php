<?php

namespace Abhay\ApiBundle\Manager;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Symfony\Component\Validator\ValidatorInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Abhay\ApiBundle\Entity\Darshan;

/**
 * Baba Manager
 */
class DarshanManager 
{
   
    protected $doctrine;
   
    public function __construct(Doctrine $doctrine)
    {
        $this->doctrine = $doctrine; 
    }

     
    public function load($babaId = null)
    {
        

       
    }

    /**
     * Load All Filter groups
     *
     * @return array
     */
    public function loadAll()
    {
        $er = $this->doctrine->getManager()->getRepository('AbhayApiBundle:Darshan');
        return $er->retrieveAll();
    }
    public function add($requestParams)
    {
        $darshan = new Darshan();
        $darshan->setAttributes($requestParams);
        $em = $this->doctrine->getManager();
        $em->persist($darshan);
        $em->flush();
        return $darshan;
    }

    
}

