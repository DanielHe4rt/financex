<?php

namespace Tests\Feature;

use App\Enums\PaymentStatusEnum;
use App\Models\Payment;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ProcessPaymentTest extends TestCase
{
    use DatabaseMigrations;

    public function testCanDeclinePayment(): void
    {
        $payment = Payment::factory()->create();

        $this->deleteJson(route('payments.cancel', $payment))
            ->assertNoContent();

        $this->assertDatabaseHas('payments', [
            'id' => $payment->id,
            'status' => PaymentStatusEnum::DENIED
        ]);
    }

    public function testShouldNotCancelAnInvalidPayment()
    {
        $this->deleteJson(route('payments.cancel', 'lalala-ta-errado'))
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJsonStructure(['error']);
    }
}
