<?php

namespace Ebizmarts\MsCognitiveService\Command;

use Ebizmarts\MsCognitiveService\Face\Data\V1_0\Person;
use Ebizmarts\MsCognitiveService\Face\FaceApiManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class GetPersonCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('face:find-person')
            ->setDescription('Find person on a group by person id.')
            ->addArgument('person-group-id', InputArgument::REQUIRED, 'The Person Group Id.')
            ->addArgument('person-id', InputArgument::REQUIRED, 'The Person Id.')
            ->setHelp('This command allows you to find a person by its id on a given person group.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = new FaceApiManager();

        $person = $manager->getPerson(
            $input->getArgument('person-group-id'),
            $input->getArgument('person-id')
        );

        if ($person->getPersonId()) {
            $output->writeln("<info>Found person:</info> {$person->getName()}");
        } else {
            $output->writeln("<error>No person found.</error>");
        }

    }
}