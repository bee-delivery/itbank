<?php

namespace BeeDelivery\ItBank;

use BeeDelivery\ItBank\src\Cliente;
use BeeDelivery\ItBank\src\Conta;
use BeeDelivery\ItBank\src\P2P;
use BeeDelivery\ItBank\src\Saldo;
use BeeDelivery\ItBank\src\Transferencia;

class ItBank
{
    public function p2p($token, $conta) {
        return new P2P($token, $conta);
    }

    public function conta($token, $conta) {
        return new Conta($token, $conta);
    }

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
