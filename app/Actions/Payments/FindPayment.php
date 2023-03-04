<?php

namespace App\Actions\Payments;

use App\Exceptions\Financex\PaymentException;
use App\Models\Payment;
use App\Repositories\Payment\PaymentRepository;

class FindPayment
{
    public function __construct(private readonly PaymentRepository $paymentRepository)
    {
    }

    public function byId(string $paymentId): Payment
    {
        $payment = $this->paymentRepository->find($paymentId);

        if (is_null($payment)) {
            throw PaymentException::notFound();
        }

        return $payment;
    }
}
