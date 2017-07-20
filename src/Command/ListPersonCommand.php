<?php

namespace Ebizmarts\MsCognitiveService\Command;

use Ebizmarts\MsCognitiveService\Face\FaceApiManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ListPersonCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('face:list-persons')
            ->setDescription('Lists all persons in a person group.')
            ->addArgument('id', InputArgument::REQUIRED, 'The Person Group Id.')
            ->setHelp('This command allows you to query all persons in a given person group.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = new FaceApiManager();

        $persons = $manager->getAllPersonsForPersonGroup($input->getArgument('id'));

        $output->writeln([
            'All persons',
            '============',
            '',
        ]);

        foreach ($persons as $person) {
            /** @var $person \Ebizmarts\MsCognitiveService\Face\Data\V1_0\Person */
            $output->writeln([
                'ID: <info>' . $person->getPersonId() . '</info>',
                'Name: ' . $person->getName(),
                'User data: ' . $person->getUserData(),
            ]);

            if(count($person->getPersistedFaceIds())) {
                $output->writeln("<info>Registered faces:</info>");
                foreach ($person->getPersistedFaceIds() as $faceId)
                {
                    $output->writeln("<question>$faceId</question>");
                }
            } else {
                $output->writeln("<comment>No faces found.</comment>");
            }
            $output->writeln("");
        }
    }
}