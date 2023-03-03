<?php

namespace Tests\Feature;

use App\Models\Payment;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class FindPaymentTest extends TestCase
{
    use DatabaseMigrations;

    public function testCanFindAValidPayment(): void
    {
        $payment = Payment::factory()->create();

        $response = $this->getJson(route('payments.find', $payment->getKey()));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment($payment->toArray());
    }

    public function testShouldNotFindAnInvalidPayment()
    {
        $response = $this->getJson(route('payments.find', 'lalala-ta-errado'));
        $response->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJsonStructure(['error']);
    }

}
