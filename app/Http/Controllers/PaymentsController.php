<?php

namespace App\Http\Controllers;

use App\Actions\Payments\CreatePayment;
use App\Http\Requests\CreatePaymentRequest;
use Symfony\Component\HttpFoundation\Response;

class PaymentsController extends Controller
{
    public function postNewPayment(
        CreatePaymentRequest $request,
        CreatePayment $createPayment
    ): Response
    {
        $response = $createPayment->persist($request->validated());
        return response()->json($response, Response::HTTP_CREATED);
    }
}
