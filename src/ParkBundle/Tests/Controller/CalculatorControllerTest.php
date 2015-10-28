<?php

namespace ParkBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculatorControllerTest extends WebTestCase
{
    public function testShowPost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/park/calculator/sum/1/2');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /computer/");;
        $this->assertEquals(
            3,
            $crawler->filter('#result')->text(), 'Wrong Result !!!!!'
        );
    }
}
