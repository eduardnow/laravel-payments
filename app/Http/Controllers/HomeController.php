<?php

namespace App\Http\Controllers;

use App\Currency;
use App\PaymentGateway;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currencies = Currency::all();
        $paymentGateways = PaymentGateway::all();

        return view('home')->with([
            'currencies' => $currencies,
            'paymentGateways' => $paymentGateways,
        ]);
    }
}
