<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Payment_method;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Cart_item;
use App\Models\User;
use App\Models\Address;
use App\Models\Status;


class PaymentController extends Controller
{
    public function process(Request $request)
    {
        $user = $request->user();

        $amount = $request->input('total_payment'); 
        $total_payment = (int)($amount * 100); // Convert to centavos (PayMongo uses cent values)
        $referenceNumber = uniqid();

        try {

            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $amount,
                'reference_number' => $referenceNumber,
                'status' => 9, // Default status paid
                'payment_status' => 9, // Default paid
                'payment_method' => 1, // Pay Digital
                'shipping_address' => $request->input('address_id'),
                'shipping_fee' => $request->input('shipping_fee'),

                
            ]);

            // Save each item in the order
            $productIds = $request->input('product_ids');
            $quantities = $request->input('quantities');
            $product_prices = $request->input('product_prices'); 

            foreach ($productIds as $index => $productId) {
                Order_item::create([
                    'order_id' => $order->order_id,
                    'product_id' => $productId,
                    'quantity' => $quantities[$index],
                    'price' => $product_prices[$index], 
                ]);
            }


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
                            'amount' => $total_payment,
                            'description' => 'Payment for Order - Ref #' . $referenceNumber,
                            'remarks' => 'Purchase from FurrHUB',
                        ],

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
