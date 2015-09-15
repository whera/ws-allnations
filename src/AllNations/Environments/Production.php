<?php

namespace WSW\AllNations\Environments;

use WSW\AllNations\Environments\Environment;


class Production extends Environment
{

    const WS_HOST = 'wspub.allnations.com.br';


    /**
     * @return string
     */
    public function getWsHost()
    {
        return static::WS_HOST;
    }

}