<?php

namespace AppBundle\Service\Security;


use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\User;

Class UserSecurity
{
    const SALT = "TOTOCHE";

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        // perhaps you only want to act on some "Product" entity
        if ($entity instanceof User) {
            // ... do something with the Product
            $entity->setPassword($entity->getPlainPassword());
            $entity->setSalt(self::SALT);
        }
    }

}