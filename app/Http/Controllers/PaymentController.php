<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $rules = [
            'value' => ['required', 'numeric', 'min:5'],
            'currency' => ['required', 'exists:currencies,iso'],
            'paymentGateway' => ['required', 'exists:payment_gateways,id'],
        ];

        $request->validate($rules);

        return $request->all();
    }

    public function approval()
    {

    }

    public function cancelled()
    {

    }
}
