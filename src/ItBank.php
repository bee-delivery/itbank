<?php

namespace BeeDelivery\ItBank;

use BeeDelivery\ItBank\Functions\Cliente;
use BeeDelivery\ItBank\Functions\Saldo;
use BeeDelivery\ItBank\Functions\Transferencia;

class ItBank
{
    public function cliente($apiKey){
        return new Cliente($apiKey);
    }

    public function transferencia($apiKey){
        return new Transferencia($apiKey);
    }

    public function saldo($apiKey){
        return new Saldo($apiKey);
    }
}
