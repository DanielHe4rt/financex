<?php

namespace App\Repositories\Payment;

use App\Enums\PaymentStatusEnum;
use App\Models\Payment;

interface PaymentRepository
{
    public function create(array $payment): Payment;

    public function find(string $paymentId): ?Payment;

    public function updateStatus(Payment $payment, PaymentStatusEnum $statusEnum);
}
