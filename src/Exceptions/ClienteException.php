<?php

namespace BeeDelivery\ItBank\Exceptions;

use Exception;

class ClienteException extends Exception{

    public static function invalidClient()
    {
        return new static('Os dados fornecidos para o cadastro do cliente não são válidos.');
    }
}
