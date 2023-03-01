<?php

namespace App\Repositories\Payment;

use App\Models\Payment;

interface PaymentRepository
{
    public function create(array $payment): Payment;
}
