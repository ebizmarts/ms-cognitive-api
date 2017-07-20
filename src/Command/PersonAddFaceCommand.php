<?php

namespace Ebizmarts\MsCognitiveService\Command;

use Ebizmarts\MsCognitiveService\Face\Data\V1_0\Person;
use Ebizmarts\MsCognitiveService\Face\FaceApiManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PersonAddFaceCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('face:add')
            ->setDescription('Adds new face to a Person.')
            ->setHelp('This command allows you to add a face to an existent Person.')
            ->addArgument('person-group-id', InputArgument::REQUIRED, 'The Person Group Id.')
            ->addArgument('person-id', InputArgument::REQUIRED, 'The Person Id.')
            ->addArgument('file-path', InputArgument::REQUIRED, 'Path to file on disk.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            'Person add face',
            '============',
            '',
        ]);

        $manager = new FaceApiManager();

        $personGroupId = $input->getArgument('person-group-id');
        $personId = $input->getArgument('person-id');
        $filePath = $input->getArgument('file-path');

        $fileContents = file_get_contents($filePath);

        $manager->addFace($personGroupId, $personId, $fileContents);
    }
}