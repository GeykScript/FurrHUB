<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('logo/logo1.png') }}" type="image/png">

    <title>Services History Report</title>
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
                    <th>Customer Name</th>
                    <th>Pet Name</th>
                    <th>Type of Service</th>
                    <th>Service Availed</th>
                    <th>Initial Fee</th>
                    <th>Appointment Date </th>
                    <th>Time </th>
                    <th>Total Payment</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{ $service->Customername }}</td>
                    <td>{{ $service->Petname }}</td>
                    <td>{{ $service->Type_of_service }}</td>
                    <td>{{ $service->Service_availed }}</td>
                    <td>{{ number_format($service->Initial_fee, 2) }}</td>
                    <td>{{ $service->Appointment_date }}</td>
                    <td>{{ $service->Time }}</td>
                    <td>{{ number_format($service->Total_payment, 2) }}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>