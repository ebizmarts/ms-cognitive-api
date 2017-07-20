<?php

namespace Ebizmarts\MsCognitiveService\Command;

use Ebizmarts\MsCognitiveService\Face\FaceApiManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListPersonGroupCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('face:list-groups')
            ->setDescription('Lists all person groups.')
            ->setHelp('This command allows you to query all person groups.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = new FaceApiManager();

        $groups = $manager->getAllPersonGroups();

        $output->writeln([
            'All person groups',
            '============',
            '',
        ]);

        foreach ($groups as $group) {
            /** @var $group \Ebizmarts\MsCognitiveService\Face\Data\V1_0\PersonGroup */
            $output->writeln([
                'ID: ' . $group->getPersonGroupId(),
                'Name: ' . $group->getName(),
                'User data: ' . $group->getUserData(),
                ''
            ]);
        }
    }
}