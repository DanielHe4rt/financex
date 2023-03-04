<?php

namespace App\Actions\Payments;

use App\Enums\PaymentStatusEnum;
use App\Repositories\Payment\PaymentRepository;
use Illuminate\Support\Facades\Hash;

class CreatePayment
{
    public function __construct(private readonly PaymentRepository $paymentRepository)
    {
    }

    public function persist(array $payload): array
    {
        $payload['card_hash'] = Hash::make(json_encode($payload['card']));
        $payload['status'] = PaymentStatusEnum::CREATED->value;

        $payment = $this->paymentRepository->create($payload);

        return [
            'id' => $payment->getKey(),
            'status' => $payment->status,
        ];
    }
}
