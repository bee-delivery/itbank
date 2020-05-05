<?php

namespace BeeDelivery\ItBank\src;

use BeeDelivery\ItBank\Connection;

class Saldo
{

    public $http;

    public function __construct($token, $conta)
    {
        $this->http = new Connection($token, $conta);
    }

    /**
     * Consulta o saldo de um cliente ItBank.
     *
     * @see https://www.itbank.com.br/Help/Api/GET-api-v1-Saldo
     * @param Array saldo
     * @return Array
     */
    public function saldo()
    {
        return $this->http->get('saldo');
    }

}
