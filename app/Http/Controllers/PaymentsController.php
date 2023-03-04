<?php

namespace App\Http\Controllers;

use App\Actions\Payments\CreatePayment;
use App\Actions\Payments\FindPayment;
use App\Actions\Payments\ProcessPayment;
use App\Exceptions\Financex\PaymentException;
use App\Http\Requests\CreatePaymentRequest;
use Symfony\Component\HttpFoundation\Response;

class PaymentsController extends Controller
{
    public function getPayment(string $paymentId, FindPayment $findPayment)
    {
        try {
            return response()->json($findPayment->byId($paymentId));
        } catch (PaymentException $exception) {
            return response()->json(['error' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function postNewPayment(
        CreatePaymentRequest $request,
        CreatePayment        $createPayment
    ): Response
    {
        $response = $createPayment->persist($request->validated());
        return response()->json($response, Response::HTTP_CREATED);
    }

    public function deletePayment(string $paymentId, ProcessPayment $processor): Response
    {
        try {
            $processor->denyPayment($paymentId);
        } catch (PaymentException $exception) {
            return response()->json(['error' => $exception->getMessage()], $exception->getCode());
        }

        return response()->noContent();
    }
}
