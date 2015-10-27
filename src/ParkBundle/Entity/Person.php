<?php

namespace ParkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ParkBundle\Entity\PersonRepository")
 */
class Person
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=150)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=150)
     */
    private $lastName;

    /**
     *
     * @ORM\OneToMany(targetEntity="ParkBundle\Entity\Computer", mappedBy="person")
     * @ORM\JoinColumn(nullable=true)
     */
    private $computers;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->computers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Person
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Person
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Add computers
     *
     * @param \ParkBundle\Computer $computers
     * @return Person
     */
    public function addComputer(\ParkBundle\Entity\Computer $computers)
    {
        $this->computers[] = $computers;

        return $this;
    }

    /**
     * Remove computers
     *
     * @param \ParkBundle\Computer $computers
     */
    public function removeComputer(\ParkBundle\Entity\Computer $computers)
    {
        $this->computers->removeElement($computers);
    }

    /**
     * Get computers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComputers()
    {
        return $this->computers;
    }

    public function __toString() {
        return $this->firstName . ' ' . $this->lastName;
    }
}
