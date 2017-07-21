<?php

namespace Ebizmarts\MsCognitiveService\Command;

use Ebizmarts\MsCognitiveService\Face\Data\V1_0\Person;
use Ebizmarts\MsCognitiveService\Face\FaceApiManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PersonDetectFaceCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('face:detect')
            ->setDescription('Detects face on image.')
            ->setHelp('This command allows you to detect a face on an image.')
            ->addArgument('file-path', InputArgument::REQUIRED, 'Path to file on disk.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Person detect face',
            '============',
            '',
        ]);

        $manager = new FaceApiManager();
        $filePath = $input->getArgument('file-path');

        $fileContents = file_get_contents($filePath);

        $faceId = $manager->detectFace($fileContents);

        if (empty($faceId)) {
            $output->writeln("<error>No face detected.</error>");
        } else {
            $output->writeln("Detected face id: <info>$faceId</info>");
        }
    }
}