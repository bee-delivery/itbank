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

    public function cliente($token) {
        return new Cliente($token);
    }

    public function transferencia($token) {
        return new Transferencia($token);
    }

    public function saldo($token) {
        return new Saldo($token);
    }


}
