<?php

namespace DisBike\BikeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DistanceIncreaseEvent
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DisBike\BikeBundle\Entity\DistanceIncreaseEventRepository")
 */
class DistanceIncreaseEvent
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
     * @ORM\Column(name="bike_id", type="string", length=200)
     */
    private $bikeId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;

    /**
     * @var integer
     *
     * @ORM\Column(name="meters", type="integer")
     */
    private $meters;


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
     * Set bikeId
     *
     * @param string $bikeId
     * @return DistanceIncreaseEvent
     */
    public function setBikeId($bikeId)
    {
        $this->bikeId = $bikeId;

        return $this;
    }

    /**
     * Get bikeId
     *
     * @return string 
     */
    public function getBikeId()
    {
        return $this->bikeId;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return DistanceIncreaseEvent
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime 
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set meters
     *
     * @param integer $meters
     * @return DistanceIncreaseEvent
     */
    public function setMeters($meters)
    {
        $this->meters = $meters;

        return $this;
    }

    /**
     * Get meters
     *
     * @return integer 
     */
    public function getMeters()
    {
        return $this->meters;
    }
}
