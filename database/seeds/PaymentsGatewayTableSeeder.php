<?php

use App\PaymentGateway;
use Illuminate\Database\Seeder;

class PaymentsGatewayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentGateway::create([
            'name' => 'PayPal',
            'image' => 'img/payments-gateway/paypal.jpg',
        ]);

        PaymentGateway::create([
            'name' => 'Stripe',
            'image' => 'img/payments-gateway/stripe.jpg',
        ]);
    }
}
