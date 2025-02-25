<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Berhasil</title>
</head>
<body>
    <h1>Pendaftaran Anda telah berhasil</h1>
    <p>Jumlah Pembayaran: {{ $registration->amount }}</p>
    <h3>Detail Login Anda:</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Email</th>
            <td>{{ $email }}</td>
        </tr>
        <tr>
            <th>Password</th>
            <td>{{ $password }}</td>
        </tr>
    </table>
    <p>Terima kasih telah mendaftar!</p>
</body>
</html>ß
