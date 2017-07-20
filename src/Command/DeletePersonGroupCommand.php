<?php

namespace Ebizmarts\MsCognitiveService\Command;

use Ebizmarts\MsCognitiveService\Face\FaceApiManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeletePersonGroupCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('face:delete-group')
            ->setDescription('Deletes a Person Group by ID.')
            ->setHelp('This command allows you to delete a person group.')
            ->addArgument('id', InputArgument::REQUIRED, 'The Person Group Id.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Person group creator',
            '============',
            '',
        ]);

        $output->writeln("Deleting Person Group...");
        $output->writeln("ID: " . $input->getArgument('id'));

        $manager = new FaceApiManager();
        $manager->deletePersonGroup($input->getArgument('id'));

        $output->writeln("<info>Group delete successfully.</info>");
    }
}