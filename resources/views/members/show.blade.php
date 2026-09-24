<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Anggota</title>
    <style>
        body { font-family: sans-serif; margin: 40px; max-width: 700px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { width: 180px; background: #f3f4f6; }
    </style>
</head>
<body>
    <h1>Detail Anggota</h1>
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a></p>

    <table>
        <tr><th>Nama</th><td>{{ $member['nama'] }}</td></tr>
        <tr><th>NIM</th><td>{{ $member['nim'] }}</td></tr>
        <tr><th>Email</th><td>{{ $member['email'] }}</td></tr>
        <tr><th>Nomor Telepon</th><td>{{ $member['nomor_telepon'] }}</td></tr>
        <tr><th>Alamat</th><td>{{ $member['alamat'] }}</td></tr>
        <tr><th>Status</th><td>{{ $member['status'] }}</td></tr>
    </table>

    <p>
        <a href="{{ route('members.edit', $member['id']) }}">Edit Anggota</a>
    </p>
</body>
</html>
