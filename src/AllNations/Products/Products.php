<?php

namespace WSW\AllNations\Products;

use WSW\AllNations\Credentials;
use WSW\AllNations\Requests\Request;

class Products
{

    const PRODUCT_LIST  = '/wsintestoqueclientesV2/ServicoReservasPedidosExt.asmx/RetornarListaProdutos';
    const PRODUCT_STOCK = '/wsintestoqueclientesV2/ServicoReservasPedidosExt.asmx/RetornarListaProdutosEstoque';

    /**
     * @var Credentials
     */
    private $credentials;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var array
     */
    private $params = [];

    /**
     * @var
     */
    private $endpoint;


    /**
     * @param Credentials $credentials
     */
    public function __construct(Credentials $credentials, $request = null)
    {
        $this->credentials = $credentials;
        $this->request = $request ?: new Request();
    }

    public function setDate($date= '')
    {
        $this->params['Data'] = $date;

        return $this;
    }


    public function send($strEndPoint = self::PRODUCT_LIST)
    {
        $this->endpoint = $strEndPoint;

        $response = $this->request->sendProducts($this->credentials->getWsUrl($this->endpoint, $this->params));

        return $response;

    }



}