<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hitung Bilangan</title>
</head>
<body>
    <h1>Hitung Bilangan</h1>

    @if(session('error'))
        <div style="color: red; margin-bottom: 10px;">
            {{ session('error') }}
        </div>
    @endif

    <form action="/result" method="POST">
        @csrf
        Angka 1: <input type="number" name="number1" step="any" required><br><br>

        Operasi:
        <select name="operation" required>
            <option value="add">Tambah (+)</option>
            <option value="subtract">Kurang (-)</option>
            <option value="multiply">Kali (x)</option>
            <option value="divide">Bagi (/)</option>
        </select><br><br>

        Angka 2: <input type="number" name="number2" step="any" required><br><br>

        <button type="submit">Hitung</button>
    </form>

    @if(isset($result))
        <hr>
        <h2>{{ $number1 }} + {{ $number2 }} = {{ $result }}</h2>
    @endif
</body>
</html>
