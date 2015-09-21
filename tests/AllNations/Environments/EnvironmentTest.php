<?php


namespace WSW\AllNations\Environments;

use WSW\AllNations\Environments\Environment;

class EnvironmentTest extends \PHPUnit_Framework_TestCase
{

    private $environment;

    protected function setUp()
    {
        $this->environment = $this->getMockForAbstractClass(Environment::class);

        $this->environment->expects($this->any())
            ->method('getWsHost')
            ->willReturn('ws.test.com');
    }

    public function testIsValidShouldReturnTrueWhenWSHostIsProduction()
    {
        $this->assertTrue(Environment::isValid(Production::WS_HOST));
    }

    public function testIsValidShouldReturnFalseWhenWSHostIsProduction()
    {
        $this->assertFalse(Environment::isValid('exemple.com'));
    }

}