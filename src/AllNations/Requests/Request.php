<?php

namespace WSW\AllNations\Requests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Request
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var
     */
    protected $uri;

    /**
     * @param null $client
     */
    public function __construct($client = null)
    {
        $this->client = $client ?: new Client();
    }

    /**
     * @param $uri
     * @return Array
     * @throws AllNationsException
     * @throws \WSW\AllNations\AllNationsException
     */
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
