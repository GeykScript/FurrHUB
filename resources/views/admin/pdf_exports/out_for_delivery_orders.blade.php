<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('logo/logo1.png') }}" type="image/png">

    <title>Out for Delivery Orders</title>
    <style>
        @page {
            margin: 20px;
            size: A4 landscape;
            /* Change to 'portrait' if needed */
        }

        body {
            background-color: #f9fafb;
            color: #1f2937;
            padding: 10px;
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            color: #374151;
            margin-bottom: 20px;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border: 1px solid #d1d5db;
            table-layout: fixed;
            word-wrap: break-word;
        }

        thead {
            background-color: #1f2937;
            color: #ffffff;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border: 1px solid #d1d5db;
            font-size: 11px;
        }

        tbody tr:hover {
            background-color: #ebf8ff;
        }
    </style>
</head>

<body>
    <h2>FurrHUB Out for Delivery Orders Report</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Buyer</th>
                    <th>Phone Number</th>
                    <th>Reference No</th>
                    <th>Products</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Payment Method</th>
                    <th>Shipping Address</th>
                    <th>Delivery Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->buyer }}</td>
                    <td>{{ $order->phone_number }}</td>
                    <td>{{ $order->ref_no }}</td>
                    <td>{{ $order->products }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ number_format($order->total_amount, 2) }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>{{ $order->shipping_address }}</td>
                    <td></td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</body>

</html>