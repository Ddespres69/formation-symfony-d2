<?php

namespace AppBundle\Tests\Service;

use AppBundle\Service\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase

{

    public function testMakeSum()
    {
        $calc = new Calculator();
        // assert that your calculator added the numbers correctly!

        $this->assertEquals(42, $calc->makeSum(30, 12));
        $this->assertNotEquals(5, $calc->makeSum(2, 2));
    }
}
