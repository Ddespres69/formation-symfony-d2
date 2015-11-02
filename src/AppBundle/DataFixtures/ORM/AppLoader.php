<?php

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;

/**
 * Class ParkLoader
 * @package AppBundle\DataFixtures\ORM
 */
class AppLoader extends DataFixtureLoader
{

    /**
     * {@inheritDoc}
     */
    protected function getFixtures()
    {
        return array(
            __DIR__ . '/user.yml'
        );
    }
}