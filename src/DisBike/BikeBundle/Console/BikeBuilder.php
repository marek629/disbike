<?php
namespace DisBike\BikeBundle\Console;


use DisBike\BikeBundle\Entity\Bike;
use DisBike\BikeBundle\Entity\CreateEvent;

use Doctrine\ORM\EntityManager;


class BikeBuilder {
    public function buildReadModel(EntityManager $entityManager)
    {
        $this->clearBikeRepository($entityManager);

        $repository = $entityManager->getRepository('BikeBundle:CreateEvent');

        foreach ($repository->findAll() as $bikeCreateEvent) {
            $bike = $this->createBike($bikeCreateEvent);
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
     * @param CreateEvent $createEvent
     * @return Bike
     */
    private function createBike(CreateEvent $createEvent)
    {
        $bike = new Bike();
        $bike->setBikeId($createEvent->getBikeId());
        $bike->setBuyDate($createEvent->getBuyDate());
        $bike->setBrandName($createEvent->getBrandName());
        $bike->setModelName($createEvent->getModelName());

        return $bike;
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
