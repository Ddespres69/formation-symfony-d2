<?php

namespace ParkBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ParkBundle\Entity\Computer;
use ParkBundle\Entity\Person;
use ParkBundle\Form\ComputerType;

/**
 * Computer controller.
 */
class ComputerController extends Controller
{

    /**
     * List computers
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $computers = $em->getRepository('ParkBundle:Computer')->findAll();
        //$computers = $this->getComputerList();

        return $this->render('ParkBundle:Computer:index.html.twig', array(
            'computers' => $computers,
        ));
    }

    /**
     * Debug, for demo purposes
     */
    public function debugAction()
    {

        echo '<pre>';
        var_dump($this->getComputerList());
        die();

    }


    public function testAction() {

        $em = $this->getDoctrine()->getManager();

        foreach ($em->getRepository('ParkBundle:Computer')->findAll() as $computer){
            $em->remove($computer);
        }
        $em->flush();


        $idx = 0;
        foreach ($this->getComputerList() as $cmp) {

            $computer = new Computer();
            $computer->setName($cmp['name']);
            $computer->setIp($cmp['ip']);
            $computer->setEnabled($cmp['enabled']);
            $person = new Person();
            $person->setFirstName('TOTO_' . $idx);
            $person->setLastName('Toto_' . $idx);
            $computer->setPerson($person);
            $em->persist($computer);

            $idx++;
        }

        $em->flush();
        return $this->indexAction();
    }


    /**
     * Computer list build
     * @return array
     */
    protected function getComputerList()
    {
        return array(
            0 => array(
              'id' => 1,
              'name' => 'Ordinateur 1',
              'ip' => '192.168.0.1',
              'enabled' => true
            ),
            1 => array(
                'id' => 2,
                'name' => 'Ordinateur 2',
                'ip' => '192.168.0.2',
                'enabled' => false
            ),
            2 => array(
                'id' => 3,
                'name' => 'Ordinateur 3',
                'ip' => '192.168.0.3',
                'enabled' => true
            ),
            3 => array(
                'id' => 4,
                'name' => 'Ordinateur 4',
                'ip' => '192.168.0.4',
                'enabled' => false
            ),
            4 => array(
                'id' => 5,
                'name' => 'Ordinateur 5',
                'ip' => '192.168.0.5',
                'enabled' => true
            ),
        );
    }
}
