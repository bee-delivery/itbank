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

    public function cliente($clienteEmail, $clienteToken) {
        return new Cliente($clienteEmail, $clienteToken);
    }

    public function transferencia($clienteEmail, $clienteToken) {
        return new Transferencia($clienteEmail, $clienteToken);
    }

    public function usuario($clienteEmail, $clienteToken) {
        return new Usuario($clienteEmail, $clienteToken);
    }

    public function saldo($clienteEmail, $clienteToken) {
        return new Saldo($clienteEmail, $clienteToken);
    }

    public function contaBancaria($clienteEmail, $clienteToken) {
        return new ContaBancaria($clienteEmail, $clienteToken);
    }

    public function tarifa($clienteEmail, $clienteToken) {
        return new Tarifa($clienteEmail, $clienteToken);
    }

}
