<?php

namespace WSW\AllNations\Requests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use WSW\AllNations\Requests\Serializer;

class Request
{

    protected $client;


    protected $uri;


    public function __construct($client = null)
    {
        $this->client = $client ?: new Client();
    }

    public function sendProducts($uri)
    {

        try {
            $response = $this->client->request('GET', $uri, ['allow_redirects' => false]);

            return Serializer::toArrayProducts($response->getbody());

        } catch (RequestException $e) {
                throw new AllNationsException($e->getMessage());
        }

    }

}