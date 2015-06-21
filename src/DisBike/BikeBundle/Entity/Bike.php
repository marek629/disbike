<?php

namespace DisBike\BikeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bike
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Bike
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
     * @ORM\Column(name="bikeId", type="string", length=200)
     */
    private $bikeId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="buyDate", type="datetime")
     */
    private $buyDate;

    /**
     * @var string
     *
     * @ORM\Column(name="brandName", type="string", length=200)
     */
    private $brandName;

    /**
     * @var string
     *
     * @ORM\Column(name="modelName", type="string", length=200)
     */
    private $modelName;


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
     * @return Bike
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
     * Set buyDate
     *
     * @param \DateTime $buyDate
     * @return Bike
     */
    public function setBuyDate($buyDate)
    {
        $this->buyDate = $buyDate;

        return $this;
    }

    /**
     * Get buyDate
     *
     * @return \DateTime 
     */
    public function getBuyDate()
    {
        return $this->buyDate;
    }

    /**
     * Set brandName
     *
     * @param string $brandName
     * @return Bike
     */
    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;

        return $this;
    }

    /**
     * Get brandName
     *
     * @return string 
     */
    public function getBrandName()
    {
        return $this->brandName;
    }

    /**
     * Set modelName
     *
     * @param string $modelName
     * @return Bike
     */
    public function setModelName($modelName)
    {
        $this->modelName = $modelName;

        return $this;
    }

    /**
     * Get modelName
     *
     * @return string 
     */
    public function getModelName()
    {
        return $this->modelName;
    }
}
