<?php
namespace DisBike\BikeBundle\Console;


use DisBike\BikeBundle\Entity\Bike;

use Doctrine\ORM\EntityManager;


class BikeBuilder {
    public function buildReadModel(EntityManager $entityManager)
    {
        $this->clearBikeRepository($entityManager);

        $repository = $entityManager->getRepository('BikeBundle:CreateEvent');

        foreach ($repository->findAll() as $bikeCreateEvent) {
            $bike = new Bike();
            $bike->setBikeId($bikeCreateEvent->getBikeId());
            $bike->setBuyDate($bikeCreateEvent->getBuyDate());
            $bike->setBrandName($bikeCreateEvent->getBrandName());
            $bike->setModelName($bikeCreateEvent->getModelName());
            $bike = $this->increaseDistance($bike, $entityManager);

            $entityManager->persist($bike);
            $entityManager->flush();
        }
    }

    private function clearBikeRepository(EntityManager $entityManager)
    {
        $entityManager->createQuery('DELETE FROM BikeBundle:Bike')->execute();
    }

    /**
     * @param Bike $bike
     * @param EntityManager $entityManager
     * @return Bike
     */
    private function increaseDistance(Bike $bike, EntityManager $entityManager)
    {
        $repository = $entityManager->getRepository('BikeBundle:DistanceIncreaseEvent');

        foreach ($repository->findByBikeId($bike->getBikeId()) as $distanceIncreaseEvent) {
            $distanceMeters = $bike->getDistanceMeters() + $distanceIncreaseEvent->getMeters();
            $bike->setDistanceMeters($distanceMeters);
        }

        return $bike;
    }
}
