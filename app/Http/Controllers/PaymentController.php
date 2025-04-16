<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Cart_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use GuzzleHttp\Client;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        $productIds = $request->input('product_ids');
        $productPrices = $request->input('product_prices');
        $productNames = $request->input('product_names');

        $quantities = $request->input('quantities');
        $shipping_total = $request->input('shipping_total');
        $shippingFee = (int)$request->input('shipping_fee') * 100;
        $shippingCount = (float)$request->input('shipping_count');

        $referenceNumber = uniqid();
        $addressId = $request->input('address_id');
        $totalPayment = $request->input('total_payment');

        session([
            'product_ids' => $productIds,
            'product_prices' => $productPrices,
            'quantities' => $quantities,
            'reference_number' => $referenceNumber,
            'address_id' => $addressId,
            'shipping_fee' => $shipping_total, // store original
            'total_payment' => $totalPayment,
        ]);

        $lineItems = [];
        foreach ($productIds as $i => $id) {
            $lineItems[] = [
                'name' => $productNames[$i],
                'quantity' => (int)$quantities[$i],
                'amount' => (float)$productPrices[$i] * 100,
                'currency' => 'PHP',
            ];
        }

        $lineItems[] = [
            'name' => 'Shipping Fee',
            'quantity' => $shippingCount,
            'amount' => $shippingFee,
            'currency' => 'PHP',
        ];

        $payload = [
            'data' => [
                'attributes' => [
                    'payment_method_types' => ['card', 'gcash', 'grab_pay', 'paymaya', 'brankas_landbank', 'brankas_bdo', 'brankas_metrobank'],
                    'line_items' => $lineItems,
                    'success_url' => route('payment.success'),
                    'cancel_url' => route('shoppingCart'),
                ]
            ]
        ];

        $client = new Client();
        $response = $client->request('POST', env('PAYMONGO_API_URL'), [
            'headers' => [
                'Content-Type' => 'application/json',
                'accept' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode(env('PAYMONGO_SECRET_KEY') . ':'),
            ],
            'body' => json_encode($payload),
        ]);

        $responseBody = json_decode($response->getBody(), true);

        return redirect($responseBody['data']['attributes']['checkout_url']);
    }

    public function success()
    {
        $user = Auth::user();

        // Check if session has required data
        if (!session()->has('reference_number')) {
            return redirect()->route('orders-successfull');
        }

        $productIds = session('product_ids');
        $productPrices = session('product_prices');
        $quantities = session('quantities');
        $referenceNumber = session('reference_number');
        $addressId = session('address_id');
        $shippingFee = session('shipping_fee');
        $totalPayment = session('total_payment');

        // Create the order
        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => $totalPayment,
            'reference_number' => $referenceNumber,
            'status' => 3, //to ship
            'payment_status' => 9, //paid
            'payment_method' => 1, // online payment
            'shipping_address' => $addressId,
            'shipping_fee' => $shippingFee,
        ]);

        foreach ($productIds as $index => $productId) {
            Order_item::create([
                'order_id' => $order->order_id,
                'product_id' => $productId,
                'quantity' => $quantities[$index],
                'price' => $productPrices[$index],
            ]);
        }
        $cart = Cart::where('user_id', $user->id)->first();

        Cart_item::whereIn('product_id', $productIds)
            ->where('cart_id', $cart->cart_id)
            ->delete();


        foreach ($productIds as $index => $productId) {
            Product::where('product_id', $productId)->update([
                'quantity_sold' => DB::raw("quantity_sold + {$quantities[$index]}"),
                'stock_quantity' => DB::raw("stock_quantity - {$quantities[$index]}") // Assuming you want to reduce stock after order
            ]);
        }

        // Clear session data to avoid double submission
        session()->forget(['product_ids', 'product_prices', 'product_names', 'quantities', 'reference_number', 'address_id', 'shipping_fee', 'total_payment']);

        return view('profile.order-successfull')->with('success', 'Payment successful! Your order has been placed.');
    }



    public function pay_direct(Request $request){
        $user = Auth::user();

        $productIds = $request->input('product_ids');
        $productPrices = $request->input('product_prices');

        $quantities = $request->input('quantities');
        $shipping_total = $request->input('shipping_total');

        $referenceNumber = uniqid();
        $addressId = $request->input('address_id');
        $totalPayment = $request->input('total_payment');


        // Create the order
        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => $totalPayment,
            'reference_number' => $referenceNumber,
            'status' => 3, //to ship
            'payment_status' => 10,//not paid
            'payment_method' => 3, //cash on delivery
            'shipping_address' => $addressId,
            'shipping_fee' => $shipping_total,
        ]);

        foreach ($productIds as $index => $productId) {
            Order_item::create([
                'order_id' => $order->order_id,
                'product_id' => $productId,
                'quantity' => $quantities[$index],
                'price' => $productPrices[$index],
            ]);
        }
        $cart = Cart::where('user_id', $user->id)->first();

        Cart_item::whereIn('product_id', $productIds)
            ->where('cart_id', $cart->cart_id)
            ->delete();


        foreach ($productIds as $index => $productId) {
            Product::where('product_id', $productId)->update([
                'quantity_sold' => DB::raw("quantity_sold + {$quantities[$index]}"),
                'stock_quantity' => DB::raw("stock_quantity - {$quantities[$index]}") // Assuming you want to reduce stock after order
            ]);
        }
        return view('profile.order-successfull')->with('success', 'Payment successful! Your order has been placed.');
    }
    
}
