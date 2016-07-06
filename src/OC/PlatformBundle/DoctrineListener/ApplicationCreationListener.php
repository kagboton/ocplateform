<?php

namespace OC\PlatformBundle\DoctrineListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use OC\PlatformBundle\Entity\Application;
use OC\PlatformBundle\Email\ApplicationMailer;

class ApplicationCreationListener{

    /**
     * @var ApplicationMailer
     */
    private $aplicationMailer;

    public function __construct(ApplicationMailer $applicationMailer)
    {
        $this->aplicationMailer = $applicationMailer;
    }

    
    public function postPersist(LifecycleEventArgs $args){

        $entity = $args->getObject();
        if(!$entity instanceof Application){
            return;
        }

        $this->aplicationMailer->sendNewNotification($entity);
    }
}