<?php

namespace ParkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
 * Computer controller.
 *
 * @Route("/calculator")
 */
class CalculatorController extends Controller
{


    /**
     * @param $v1
     * @param $v2
     * @return array
     *
     * @Route("/sum/{v1}/{v2}", name="calculator_test", requirements={
     *     "v1": "\d+", "v2": "\d+"
     * })
     * @Method("GET")
     * @Template("ParkBundle:Calculator:show.html.twig")
     */

    public function sumAction($v1, $v2)
    {

        $calc = $this->get('park.calculator');


        return array('result' => $calc->makeSum($v1, $v2));

    }
}
