<?php

namespace Ebizmarts\MsCognitiveService\Command;

use Ebizmarts\MsCognitiveService\Face\Data\V1_0\PersonGroup;
use Ebizmarts\MsCognitiveService\Face\FaceApiManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TrainPersonGroupCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('face:train-group')
            ->setDescription('Train Person Group.')
            ->setHelp('This command allows you to train a person group.')
            ->addArgument('id', InputArgument::REQUIRED, 'The Person Group Id.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Person group trainer',
            '============',
            '',
        ]);

        $output->writeln("Training Person Group...");
        $output->writeln("ID: <comment>" . $input->getArgument('id') . "</comment>");

        $manager = new FaceApiManager();

        $manager->trainPersonGroup($input->getArgument('id'));

        $output->writeln("<info>Training task queued successfully.</info>");
    }
}