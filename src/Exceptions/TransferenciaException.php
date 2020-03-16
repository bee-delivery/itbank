<?php

namespace BeeDelivery\ItBank\Exceptions;

use Exception;

class TransferenciaException extends Exception{

    public static function invalidClient()
    {
        return new static('Os dados fornecidos para a transferência não são válidos.');
    }
}
