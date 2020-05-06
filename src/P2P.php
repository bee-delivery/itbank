<?php

namespace BeeDelivery\ItBank\src;



use BeeDelivery\ItBank\Connection;

class P2P
{

    public $http;
    protected $P2P;

    public function __construct($token, $conta)
    {
        $this->http = new Connection($token, $conta);
    }

    /**
     * Efetua uma transferência p2p entre contas ItBank.
     *
     * @see https://www.itbank.com.br/Help/Api/POST-api-v3-Transferencia
     * @param Array transferencia
     * @return Array
     */
    public function criar($P2P)
    {
        return $this->http->post('p2p', ['json' => $P2P]);
    }

}
