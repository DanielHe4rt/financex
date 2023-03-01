<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class CreatePaymentTest extends TestCase
{
    use DatabaseMigrations;

    public function testCanCreateANewPayment(): void
    {
        $payload = [
            'card' => [
                'card_holder' => 'danielzin',
                'card_number' => '1231231231231233',
                'expiration' => '2025-02',
                'cvv' => '123'
            ],
            'value' => 10000
        ];

        $response = $this->post(route('payments.store'), $payload);

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure(['id', 'status']);

        $this->assertDatabaseHas('payments', [
            'value' => $payload['value']
        ]);
    }
}
