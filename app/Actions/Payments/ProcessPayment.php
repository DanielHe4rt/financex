<?php

namespace App\Actions\Payments;

use App\Enums\PaymentStatusEnum;
use App\Repositories\Payment\PaymentRepository;

class ProcessPayment
{
    public function __construct(
        private readonly PaymentRepository $paymentRepository,
        private readonly FindPayment       $findPayment
    )
    {
    }

    public function denyPayment(string $paymentId): void
    {
        $payment = $this->findPayment->byId($paymentId);

        $this->paymentRepository->updateStatus($payment, PaymentStatusEnum::DENIED);
    }
}
