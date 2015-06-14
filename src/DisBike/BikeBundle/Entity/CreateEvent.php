<?php

namespace DisBike\BikeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CreateEvent
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DisBike\BikeBundle\Entity\CreateEventRepository")
 */
class CreateEvent
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
     * @ORM\Column(name="created_date", type="datetime")
     */
    private $createdDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="buy_date", type="datetime")
     */
    private $buyDate;

    /**
     * @var string
     *
     * @ORM\Column(name="brand_name", type="string", length=200)
     */
    private $brandName;

    /**
     * @var string
     *
     * @ORM\Column(name="model_name", type="string", length=200)
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
     * @return CreateEvent
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
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return CreateEvent
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set buyDate
     *
     * @param \DateTime $buyDate
     * @return CreateEvent
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
     * @return CreateEvent
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
     * @return CreateEvent
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
