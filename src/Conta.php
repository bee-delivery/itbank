<?php

namespace BeeDelivery\ItBank\src;



use BeeDelivery\ItBank\Connection;

class Conta
{

    public $http;
    protected $cliente;

    public function __construct($token, $conta)
    {
        $this->http = new Connection($token, $conta);
    }

    /**
     * Efetua assinatura de um novo cliente ItBank.
     *
     * @see https://itbank.docs.apiary.io/#reference/0/contas/criar-uma-conta
     * @param Array conta
     * @return Array
     */
    public function criar($conta)
    {
        return $this->http->post('conta', ['json' => $conta]);
    }

}

