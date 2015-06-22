<?php
namespace DisBike\BikeBundle\Console;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class BuildBikeCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('bike:build')
            ->setDescription('Build bike read model from write model')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $builder = new BikeBuilder();

        $builder->buildWriteModel($this->getContainer()->get('doctrine')->getEntityManager());

        $output->writeln('Bike build success!');
    }
}