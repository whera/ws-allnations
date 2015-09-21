<?php

namespace WSW\AllNations;

use WSW\AllNations\Environments\Production;
use WSW\AllNations\Environments\Environment;

class CredentialsTest extends \PHPUnit_Framework_TestCase
{

    private $environment;

    protected function setUp()
    {
        $this->environment = $this->getMockForAbstractClass(Environment::class);

        $this->environment->expects($this->any())
            ->method('getWsHost')
            ->willReturn('ws.test.com');
    }


    public function testAttributesOfTheAccessCredentials()
    {
        $credentials = new Credentials(98119, '98119', $this->environment);
        $this->assertAttributeEquals('98119', 'clientCode', $credentials);
        $this->assertAttributeEquals('98119', 'password', $credentials);
        $this->assertAttributeEquals($this->environment, 'environment', $credentials);

    }


    public function testReturnUrlAccess()
    {
        $credentials = new Credentials(98119, '98119', $this->environment);

        $this->assertEquals(
            'http://ws.test.com/test?page=1&CodigoCliente=98119&Senha=98119',
            $credentials->getWsUrl('/test', ['page' => '1'])
        );

    }
}