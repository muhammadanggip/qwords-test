<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2>No Invoice: #12</h2>
    <h3>{{ $order->userRelation->name }}</h3>
    <h3>{{ $order->userRelation->email }}</h3>

    <p style="text-align:right;"><b>UNPAID</b></p>

    <table>
        <tr>
            <th>No</th>
            <th>Deskripsi</th>
            <th>Total</th>
        </tr>
        <tr>
            <td class="text-center">{{ $order->domain }}</td>
            <td class="text-center">Pembelian domain {{ $order->domain }}</td>
            <td class="text-center">Rp.{{ number_format($order->harga, 0, ',', '.') }}</td>
        </tr>
    </table>

    <p style="text-align:right;"><b>Rp.{{ number_format($order->harga, 0, ',', '.') }}</b></p>

    <p>Silahkan bayar di no rekening berikut ini: <br> <b>663721667321</b></p>

</body>

</html>