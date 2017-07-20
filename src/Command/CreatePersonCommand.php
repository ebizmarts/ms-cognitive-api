<?php

namespace Ebizmarts\MsCognitiveService\Command;

use Ebizmarts\MsCognitiveService\Face\Data\V1_0\Person;
use Ebizmarts\MsCognitiveService\Face\FaceApiManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreatePersonCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('face:create-person')
            ->setDescription('Creates a new Person.')
            ->setHelp('This command allows you to create a person.')
            ->addArgument('person-group-id', InputArgument::REQUIRED, 'The Person Group Id.')
            ->addArgument('name', InputArgument::REQUIRED, 'The Person Name.')
            ->addArgument('user-data', InputArgument::OPTIONAL, 'The Person Additonal Data.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            'Person creator',
            '============',
            '',
        ]);

        $output->writeln("Creating Person...");
        $output->writeln("Group Id: <comment>" . $input->getArgument('person-group-id') . '</comment>');
        $output->writeln("Name: <comment>" . $input->getArgument('name') . '</comment>');
        $output->writeln("User data: " . $input->getArgument('user-data'));

        $manager = new FaceApiManager();

        $person = new Person();
        $person->setName($input->getArgument('name'));
        $person->setUserData($input->getArgument('user-data'));

        $personResult = $manager->createPerson($person, $input->getArgument('person-group-id'));

        $output->writeln("<info>Person created successfully.</info>");
        $output->writeln("<info>Person ID: {$personResult->getPersonId()}</info>");
    }
}