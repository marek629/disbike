<?php
namespace DisBike\BikeBundle\Console;


use Symfony\Component\Console\Command\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class BuildBikeCommand extends Command
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

        $builder->buildWriteModel($this->getContainer()->get('doctrine'));

        $output->writeln('Bike build success!');
    }
}