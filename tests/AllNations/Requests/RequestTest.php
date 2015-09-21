<?php

namespace WSW\AllNations\Requests;

use GuzzleHttp\Client;

class RequestTest extends \PHPUnit_Framework_TestCase
{

    private $request;

    private $returnMock;

    protected function setUp()
    {
        $this->request = $this->getMockForAbstractClass(Request::class);

    }

    public function testResortOfTransportClient()
    {
        $request = new Request();
        $this->assertAttributeInstanceOf(Client::class, 'client', $request);
    }


}