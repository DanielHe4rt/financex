<?php

namespace Database\Factories;

use App\Enums\PaymentStatusEnum;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class PaymentFactory extends Factory
{

    protected $model = Payment::class;
    public function definition(): array
    {
        $cardHash = json_encode([
            'card_number' => '123412341234123',
            'card_holder' => 'danielhe4rt',
            'expiration' => '2025-05',
            'cvv' => '123'
        ]);
        return [
            'card_hash' => Hash::make($cardHash),
            'value' => rand(1000, 10000),
            'status' => PaymentStatusEnum::CREATED,
        ];
    }
}
