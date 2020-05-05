<?php

namespace BeeDelivery\ItBank;

use BeeDelivery\ItBank\src\Cliente;
use BeeDelivery\ItBank\src\ContaBancaria;
use BeeDelivery\ItBank\src\Saldo;
use BeeDelivery\ItBank\src\Tarifa;
use BeeDelivery\ItBank\src\Transferencia;
use BeeDelivery\ItBank\src\Usuario;

class ItBank
{

    public function cliente($token, $token) {
        return new Cliente($token, $token);
    }

    public function transferencia($token, $token) {
        return new Transferencia($token, $token);
    }

    public function saldo($token, $token) {
        return new Saldo($token, $token);
    }


}
