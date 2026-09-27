<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Anggota</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 40px;
            max-width: 600px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            width: 180px;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 8px 16px;
            background: #2563eb;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <h1>Detail Anggota</h1>

    <p>
        <a href="{{ route('members.index') }}">
            &larr; Kembali ke daftar anggota
        </a>
    </p>

    <table>
        <tr>
            <th>ID</th>
            <td>{{ $member->id }}</td>
        </tr>

        <tr>
            <th>Nama</th>
            <td>{{ $member->nama }}</td>
        </tr>

        <tr>
            <th>NIM</th>
            <td>{{ $member->nim }}</td>
        </tr>

        <tr>
            <th>Email</th>
            <td>{{ $member->email }}</td>
        </tr>

        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $member->nomor_telepon }}</td>
        </tr>

        <tr>
            <th>Alamat</th>
            <td>{{ $member->alamat }}</td>
        </tr>

        <tr>
            <th>Status</th>
            <td>{{ $member->status }}</td>
        </tr>

        <tr>
            <th>Dibuat</th>
            <td>{{ $member->created_at }}</td>
        </tr>

        <tr>
            <th>Diperbarui</th>
            <td>{{ $member->updated_at }}</td>
        </tr>
    </table>

    <a
        href="{{ route('members.edit', $member->id) }}"
        class="btn"
    >
        Edit Anggota
    </a>

</body>
</html>