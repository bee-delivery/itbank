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

    public function cliente($token, $conta) {
        return new Cliente($token, $conta);
    }

    public function transferencia($token, $conta) {
        return new Transferencia($token, $conta);
    }

    public function saldo($token, $conta) {
        return new Saldo($token, $conta);
    }


}
