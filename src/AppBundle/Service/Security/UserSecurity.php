<?php

namespace AppBundle\Service\Security;


use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\User;

Class UserSecurity
{
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        // perhaps you only want to act on some "User" entity
        if ($entity instanceof User) {
            // ... do something with the User
            $entity->setPassword($entity->getPlainPassword());
            $entity->setSalt($entity::SALT);
        }
    }
}