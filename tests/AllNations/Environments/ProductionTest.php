<?php


namespace WSW\AllNations\Environments;


class ProductionTest extends \PHPUnit_Framework_TestCase
{

    public function testGetWsHostShouldReturnTheConstantValue()
    {
        $env = new Production();
        $this->assertEquals(Production::WS_HOST, $env->getWsHost());
    }

}