<?php

namespace App\Repositories\Payment;

use App\Enums\PaymentStatusEnum;
use App\Models\Payment;

class PaymentEloquentRepository implements PaymentRepository
{

    public function create(array $payment): Payment
    {
        return Payment::create($payment);
    }

    public function find(string $paymentId): ?Payment
    {
        return Payment::find($paymentId);
    }

    public function updateStatus(Payment $payment, PaymentStatusEnum $statusEnum): Payment
    {
        $payment->update(['status' => $statusEnum->value]);

        return $payment->refresh();
    }
}
