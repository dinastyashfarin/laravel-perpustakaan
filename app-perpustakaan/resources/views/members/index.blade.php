<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 40px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            background: #2563eb;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #f3f4f6;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 6px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 200px;
        }

        button[type="submit"] {
            padding: 6px 12px;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .success {
            background: #d1fae5;
            color: #065f46;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        a {
            color: #2563eb;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination a {
            display: inline-block;
            padding: 6px 12px;
            border: 1px solid #ddd;
            margin-right: 4px;
            border-radius: 4px;
        }

        .pagination a.active {
            background: #2563eb;
            color: #fff;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .delete-btn {
            background: #dc2626;
            color: #fff;
            border: none;
            padding: 4px 8px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h1>Daftar Anggota</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('members.create') }}" class="btn">
        + Tambah Anggota
    </a>

    <form action="{{ route('members.index') }}" method="GET">
        <input
            type="text"
            name="search"
            placeholder="Cari nama anggota..."
            value="{{ request('search') }}"
        >

        <button type="submit">
            Cari
        </button>

        @if(request('search'))
            <a href="{{ route('members.index') }}">
                Reset
            </a>
        @endif
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->nim }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->nomor_telepon }}</td>
                    <td>{{ $member->alamat }}</td>
                    <td>{{ $member->status }}</td>

                    <td class="actions">
                        <a href="{{ route('members.show', $member->id) }}">
                            Detail
                        </a>

                        <a href="{{ route('members.edit', $member->id) }}">
                            Edit
                        </a>

                        <form
                            action="{{ route('members.destroy', $member->id) }}"
                            method="POST"
                            style="display:inline;"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete-btn">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">
                        Tidak ada data anggota.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $members->appends(request()->query())->links() }}

</body>
</html>