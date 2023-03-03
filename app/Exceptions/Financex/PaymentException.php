<?php

namespace App\Exceptions\Financex;

use Exception;
use Illuminate\Support\Facades\Log;

class PaymentException extends Exception
{
    public static function notFound(): self
    {
        Log::channel('slack')->alert('po o mano n conseguiu achar o pagamento, sepá tão fazendo bruteforce');
        return new self('Registro de pagamento não encontrado :/', 404);
    }
}
