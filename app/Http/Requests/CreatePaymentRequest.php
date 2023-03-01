<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'card' => ['required', 'array'],
            'card.card_holder' => ['required'],
            'card.card_number' => ['required', 'min:16', 'max:16'],
            'card.expiration' => ['required', 'date_format:Y-m', 'max:7', 'min:7'],
            'card.cvv' => ['required', 'min:3', 'max:4'],
            'value' => ['required', 'min:0', 'numeric']
        ];
    }
}
