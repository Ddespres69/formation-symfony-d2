<?php

namespace AppBundle\Service\Security;


use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\User\UserInterface;


Class UserSecurity
{

    /**
     * @var
     */
    protected $encoderFactory;

    /**
     * @param EncoderFactoryInterface $encoderFactory
     */
    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }

    /**
     * @param UserInterface $user
     */
    protected function getEncoder(UserInterface $user)
    {
        return $this->encoderFactory->getEncoder($user);
    }

    /**
     * @param UserInterface $user
     */
    protected function updatePassword(UserInterface $user) {

        if ( 0 !== strlen($password = $user->getPlainPassword())) {
            $encoder = $this->getEncoder($user);
            $user->setPassword($encoder->encodePassword($password, $user->getSalt()));
            $user->eraseCredentials();
        }
    }


    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        // perhaps you only want to act on some "User" entity
        if ($entity instanceof UserInterface) {
            // ... do something with the User
            $this->updatePassword($entity);

        }
    }
}