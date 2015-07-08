<?php

namespace Practo\ApiBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Practo\ApiBundle\Entity\OfferCampaign;

/**
 * OfferCampaign Repository
 */
class OfferCampaignRepository extends EntityRepository
{
    
    public function retrieve($campaignId)
    {
        if (is_null($campaignId)) {
            return null;
        }
        $entity = $this->find($campaignId);
        if ($entity) {
            return $entity;
        }

        return null;
    }

    
    public function retrieveAll()
    {
        $qb = $this->createQueryBuilder('e')
       
        $query = $qb->getQuery();

       return $query->getResult();
    }

}
