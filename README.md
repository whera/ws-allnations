# API WS All Nations

[![Build Status](https://travis-ci.org/whera/ws-allnations.svg?branch=1.0.0alpha3)](https://travis-ci.org/whera/ws-allnations)
[![Latest Stable Version](https://poser.pugx.org/wsw/allnations/v/stable)](https://packagist.org/packages/wsw/allnations) 
[![Total Downloads](https://poser.pugx.org/wsw/allnations/downloads)](https://packagist.org/packages/wsw/allnations) 
[![Latest Unstable Version](https://poser.pugx.org/wsw/allnations/v/unstable)](https://packagist.org/packages/wsw/allnations) 
[![License](https://poser.pugx.org/wsw/allnations/license)](https://packagist.org/packages/wsw/allnations)


API de integração com o Web Service All Nations para PHP 5.5+, deve ser utilizado um Autoloader compatível com a PSR-4.

## Instalação

A instalação desta biblioteca pode ser feita utilizando o [Composer](https://getcomposer.org/).

## Exemplos básicos

Nesta versão é possível gerenciar:

* Listar produtos por data;
* Listar produtos em estoque por data;

### Credenciais de acesso

Para poder realizar requisições ao WS All Nations você deve configurar as credenciais de acesso:

```php
<?php

// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use WSW\AllNations\Credentials;

$credentials = new Credentials(':CodigoCliente', ':Senha');

```

### Solicitações

Conjunto de serviços para solicitação de lista de pedidos.

Este serviço é responsável por solicitar produtos, seu fluxo básico é:
     
* (A) A loja cria uma solicitação para listar os pedidos
* (B) All Nations processa a requisição
* (C) All Nations envia resposta da requisição (informando erros caso houverem)


O seguinte código pode ser utilizado como exemplo básico para solicitação de produtos:

```php

<?php

// Consideramos que já existe um autoloader compatível com a PSR-4 registrado e as credenciais foram configuradas em $credentials

use WSW\AllNations\Products\Products;
use WSW\AllNations\AllNationsException;

try {
    $Products = new Products($Credentials);
    
    /**
     * use Products::PRODUCT_LIST  Para listar todos os produtos relacionandos a data da pesquisa.
     * use Products::PRODUCT_STOCK Para listar todos os produtos em estoque relacionados a data da pesquisa
     */
    $result = $Products->setDate('10/10/2015')->send(Products::PRODUCT_LIST);

} catch (AllNationsException $e) {
    echo $e->getMessage();
}


```


### Licença de uso

Esta biblioteca segue os termos de uso da [The MIT License (MIT)](LICENSE.md)
