<?php
namespace DisBike\BikeBundle\Console;


use DisBike\BikeBundle\Entity\Bike;


class BikeBuilder {
    public function buildWriteModel($entityManager)
    {
#         $entityManager = $this->getContainer()->get('doctrine');
        $repository = $entityManager->getRepository('BikeBundle:CreateEvent');

        foreach ($repository->findAll() as $bikeCreateEvent) {
            $bike = new Bike();
            $bike->setBikeId($bikeCreateEvent->getBikeId());
            $bike->setBuyDate($bikeCreateEvent->getBuyDate());
            $bike->setBrandName($bikeCreateEvent->getBrandName());
            $bike->setModelName($bikeCreateEvent->getModelName());

            $entityManager->persist($bike);
            $entityManager->flush();
        }
    }
}
