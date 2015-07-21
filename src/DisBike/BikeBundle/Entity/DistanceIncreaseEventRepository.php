<?php

namespace DisBike\BikeBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * DistanceIncreaseEventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DistanceIncreaseEventRepository extends EntityRepository
{
	public function findByBikeId($bikeId)
	{
		assert(is_string($bikeId));
		assert(strlen($bikeId) > 0);

		return $this->findBy(array('bikeId' => $bikeId));
	}
}