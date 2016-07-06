<?php

namespace OC\PlatformBundle\Repository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;

/**
 * ApplicationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ApplicationRepository extends \Doctrine\ORM\EntityRepository
{
    public function getApplicationsWithAdvert($limit){
        
        $qb = $this
            ->createQueryBuilder('ap')
            ->join('ap.advert', 'ad')
            ->addSelect('ad')
            ->setMaxResults($limit)
        ;

        return $qb->getQuery()->getResult();
        
    }
    
}