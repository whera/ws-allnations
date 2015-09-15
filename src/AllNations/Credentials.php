<?php

namespace WSW\AllNations;

use WSW\AllNations\Environments\Environment;
use WSW\AllNations\Environments\Production;

class Credentials
{

    /**
     * @var
     */
    private $clientCode;

    /**
     * @var
     */
    private $password;

    /**
     * @var Production
     */
    private $environment;

    /**
     * @param $clientCode
     * @param $password
     * @param Environment $environment
     */
    public function __construct($clientCode, $password, Environment $environment = null)
    {
        $this->clientCode  = filter_var($clientCode, FILTER_SANITIZE_STRING);
        $this->password    = filter_var($password, FILTER_SANITIZE_STRING);
        $this->environment = $environment ?: new Production();
    }

    /**
     * @param $resource
     * @param array $params
     * @return string
     */
    public function getWsUrl($resource, array $params = [])
    {
        $params = array_merge(
            $params,
            ['CodigoCliente' => $this->clientCode, 'Senha' => $this->password]
        );
        return sprintf(
            '%s?%s',
            $this->environment->getWsUrl($resource),
            http_build_query($params)
        );
    }

}