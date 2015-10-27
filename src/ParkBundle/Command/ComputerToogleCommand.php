<?php
namespace ParkBundle\Command;

use Doctrine\Common\Proxy\Exception\InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ComputerToogleCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('park:computer:toggle')
            ->setDescription('Computers Enable/Disable')
            ->addArgument(
                'action',
                InputArgument::REQUIRED,
                'Disable/Enable ?'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $action =  $input->getArgument('action');
        if ($action != 'disable' && $action != 'enable'){
            throw new InvalidArgumentException ('arguments requis (disable|enable)');
        }

        $enabled=true;
        if ($action == 'disable') {
            $enabled=false;
        }

        $em = $this->getContainer()->get('doctrine')->getManager();

        foreach ($em->getRepository('ParkBundle:Computer')->findAll() as $computer) {
            $computer->setEnabled($enabled);
            $em->persist($computer);
        }

        $em->flush();

        $output->writeln('computers '. $action .'d');
    }
}