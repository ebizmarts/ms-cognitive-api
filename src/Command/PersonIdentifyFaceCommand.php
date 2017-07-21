<?php

namespace Ebizmarts\MsCognitiveService\Command;

use Ebizmarts\MsCognitiveService\Face\Data\V1_0\Person;
use Ebizmarts\MsCognitiveService\Face\FaceApiManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PersonIdentifyFaceCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('face:identify')
            ->setDescription('Identify face by FaceId, given a PersonGroupId.')
            ->setHelp('This command allows you to identify a face by its id.')
            ->addArgument('person-group-id', InputArgument::REQUIRED, 'Person group Id.')
            ->addArgument('face-id', InputArgument::REQUIRED, 'Face Id.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Person identify face',
            '============',
            '',
        ]);

        $manager = new FaceApiManager();

        $personId = $manager->identifyFace(
            $input->getArgument('person-group-id'),
            $input->getArgument('face-id')
        );

        if (empty($personId)) {
            $output->writeln("<error>No person identified.</error>");
        } else {
            $output->writeln("Detected person id: <info>$personId</info>");
        }
    }
}