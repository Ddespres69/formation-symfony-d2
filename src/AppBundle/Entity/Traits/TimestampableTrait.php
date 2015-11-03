<?php
namespace AppBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait TimestampableTrait
{

    /**
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     *
     * @ORM\PrePersist()
     *
     */
    public function handleCreatedAt()
    {
        $this->setCreatedAt(new \Datetime('now'));
    }

    /**
     *
     * @ORM\PreUpdate()
     *
     */
    public function handleUpdateAt()
    {
        $this->setUpdatedAt(new \Datetime('now'));
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param $datetime
     * @return $this
     */
    public function setCreatedAt($datetime)
    {
        $this->createdAt = $datetime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param $datetime
     * @return $this
     */
    public function setUpdatedAt($datetime)
    {
        $this->updatedAt = $datetime;
        return $this;
    }

}

