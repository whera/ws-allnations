<?php

namespace WSW\AllNations\Environments;


abstract class Environment
{

    /**
     * @return mixed
     */
    abstract public function getWsHost();

    /**
     * @param $host
     * @return bool
     */
    public static function isValid($host)
    {
        return in_array($host, [Production::WS_HOST]);
    }


    /**
     * @param $resource
     * @return string
     */
    public function getWsUrl($resource)
    {
        return sprintf(
            'http://%s%s',
            $this->getWsHost(),
            $resource
        );
    }

}