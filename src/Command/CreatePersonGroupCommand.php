<?php

namespace Ebizmarts\MsCognitiveService\Command;

use Ebizmarts\MsCognitiveService\Face\Data\V1_0\PersonGroup;
use Ebizmarts\MsCognitiveService\Face\FaceApiManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreatePersonGroupCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('face:create-group')
            ->setDescription('Creates a new Person Group.')
            ->setHelp('This command allows you to create a person group.')
            ->addArgument('id', InputArgument::REQUIRED, 'The Person Group Id.')
            ->addArgument('name', InputArgument::REQUIRED, 'The Person Group Name.')
            ->addArgument('user-data', InputArgument::OPTIONAL, 'The Person Group Additonal Data.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            'Person group creator',
            '============',
            '',
        ]);

        $output->writeln("Creating Person Group...");
        $output->writeln("ID: " . $input->getArgument('id'));
        $output->writeln("Name: " . $input->getArgument('name'));
        $output->writeln("User data: " . $input->getArgument('user-data'));

        $manager = new FaceApiManager();

        $personGroup = new PersonGroup();
        $personGroup->setPersonGroupId($input->getArgument('id'));
        $personGroup->setName($input->getArgument('name'));
        $personGroup->setUserData($input->getArgument('user-data'));

        $manager->createPersonGroup($personGroup);

        $output->writeln("<info>Group created successfully.</info>");
    }
}