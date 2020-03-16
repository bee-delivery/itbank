<?php

namespace BeeDelivery\ItBank\Functions;

use BeeDelivery\ItBank\Connection;

class Saldo
{

    public $http;

    public function __construct($apiKey)
    {
        $this->http = new Connection($apiKey);
    }

    /**
     * Recupera o saldo pela conta-id header.
     *
     * @see https://itbank.docs.apiary.io/#reference/0/saldo/recupera-o-saldo-da-conta
     * @return json
     */
    public function get()
    {
        return $this->http->get('saldo');
    }

}
