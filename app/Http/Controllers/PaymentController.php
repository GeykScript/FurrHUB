<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->post(env('PAYMONGO_API_URL'), [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Basic ' . base64_encode(env('PAYMONGO_SECRET_KEY') . ':'),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'data' => [
                        'attributes' => [
                            'amount' => 105000, // Amount in centavos (₱1050.00)
                            'description' => 'Payment for Order',
                            'remarks' => 'Purchase from FurrHUB',
                        ]
                    ]
                ]
            ]);

            $body = json_decode($response->getBody(), true);

            return redirect()->away($body['data']['attributes']['checkout_url']); // Redirect to PayMongo payment page
        } catch (\Exception $e) {
            return back()->with('error', 'Payment failed. Please try again.');
        }
    }
}
