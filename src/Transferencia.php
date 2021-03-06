<?php

namespace BeeDelivery\ItBank\src;



use BeeDelivery\ItBank\Connection;

class Transferencia
{

    public $http;
    protected $transferencia;

    public function __construct($token, $conta)
    {
        $this->http = new Connection($token, $conta);
    }

    /**
     * Efetua uma transferência entre contas ItBank.
     *
     * @see https://www.itbank.com.br/Help/Api/POST-api-v3-Transferencia
     * @param Array transferencia
     * @return Array
     */
    public function criar($transferencia)
    {
        return $this->http->post('api/v3/Transferencia', ['json' => $transferencia]);
    }

}
