<!DOCTYPE html>
<html>
<head>
    <title>Form Sensor</title>
</head>
<body>
    <h2>Kirim Nilai Sensor</h2>

    <form action="{{ url('/sensor') }}" method="POST">
        @csrf
        <label for="nilai">Nilai Sensor:</label>
        <input type="text" id="nilai" name="nilai" required>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>
