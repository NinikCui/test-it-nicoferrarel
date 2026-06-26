<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Table D - Data Sales</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h4 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #343a40; color: white; padding: 6px; text-align: left; }
        td { padding: 6px; border-bottom: 1px solid #dee2e6; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h4>Table D - Data Sales</h4>
    <table>
        <thead>
            <tr>
                <th>Kode Sales</th>
                <th>Nama Sales</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->kode_sales }}</td>
                <td>{{ $item->nama_sales }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>