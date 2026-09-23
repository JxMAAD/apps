<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kategori Barang</title>
</head>
<body>
    <h1>Daftar Kategori Barang</h1>
    <table border="3">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
