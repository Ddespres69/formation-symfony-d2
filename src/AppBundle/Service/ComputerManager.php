<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;


Class ComputerManager
{

    private $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return array
     */
    public function getComputers()
    {
        return $this->em->getRepository('AppBundle:Computer')->findAll();
    }

    /**
     * @param $id
     * @return null|object
     */
    public function getComputer($id)
    {
        return $this->em->getRepository('AppBundle:Computer')->find($id);
    }


    public function getEntityManager()
    {
        return $this->em;
    }
}