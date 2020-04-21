<?php

namespace BeeDelivery\ItBank\Exceptions;

use Exception;

class ContaException extends Exception{

    public static function invalidConta()
    {
        return new static('Os dados fornecidos para o cadastro da conta não são válidos.');
    }
}
