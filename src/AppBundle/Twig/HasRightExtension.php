<?php

namespace AppBundle\Twig;

use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

/**
 * Class ComputerStatusExtension
 * @package AppBundle\Twig
 */
class HasRightExtension extends \Twig_Extension
{

    private $authorizationChecker;

    public function __construct(AuthorizationChecker $authorizationChecker) {
        $this->authorizationChecker = $authorizationChecker;
    }

    public function aLeDroit($role)
    {

        return $this->authorizationChecker->isGranted($role);

    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new  \Twig_SimpleFunction (
                'has_right',
                array($this, 'aLeDroit'),
                array(
                    'is_safe' => array('html'),
                )
            ),
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_has_right';

    }
}
