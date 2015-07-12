<?php

namespace Abhay\ApiBundle\Manager;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Symfony\Component\Validator\ValidatorInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Abhay\ApiBundle\Entity\Ashram;

/**
 * Bhakt Manager
 */
class AshramManager 
{
   
    protected $doctrine;
   
    public function __construct(Doctrine $doctrine)
    {
        $this->doctrine = $doctrine; 
    }

     
    public function load($bhaktId = null)
    {
        

       
    }

    /**
     * Load All Filter groups
     *
     * @return array
     */
    public function loadAll()
    {
        $er = $this->doctrine->getManager()->getRepository('AbhayApiBundle:Ashram');
        return $er->retrieveAll();
    }
    public function add($requestParams)
    {
        $ashram = new Ashram();
        $ashram->setAttributes($requestParams);
        $em = $this->doctrine->getManager();
        $em->persist($ashram);
        $em->flush();
        return $ashram;
    }

    
}

