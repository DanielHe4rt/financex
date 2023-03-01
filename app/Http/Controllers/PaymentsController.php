<?php

namespace App\Http\Controllers;

use App\Actions\Payments\CreatePayment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentsController extends Controller
{
    public function postNewPayment(
        Request $request,
        CreatePayment $createPayment
    )
    {
        $response = $createPayment->persist($request->all());

        return response()->json($response, Response::HTTP_CREATED);
    }
}
