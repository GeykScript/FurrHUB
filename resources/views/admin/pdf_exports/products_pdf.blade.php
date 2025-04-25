<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Products Report</title>
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
    <h2>FurrHUB Services History Report</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Serial Number</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Stock Quantity</th>
                    <th>Price</th>
                    <th>Discount Value</th>
                    <th>Discounted Price </th>
                    <th>Quantity Sold</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->serial_number }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? 'Unknown' }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>{{ number_format($product->price) }}</td>
                    <td>{{ $product->discount_value }}</td>
                    <td>{{ number_format($product->discounted_price) }}</td>
                    <td>{{ $product->quantity_sold }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>