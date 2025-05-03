<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('logo/logo1.png') }}" type="image/png">

    <title>Services Report</title>
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
    <h2>FurrHUB Services Report</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Service Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Discount Value</th>
                    <th>Discounted Price</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->Category->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->price }}</td>
                    <td>{{ $service->discount_value }}</td>
                    <td>{{ $service->discounted_price }}</td>
                    <td>{{ $service->created_at }}</td>
                    <td>{{ $service->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>