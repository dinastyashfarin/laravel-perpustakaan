<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Anggota</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f3f4f6; }
        .success { padding: 10px; background: #dcfce7; margin-bottom: 15px; }
        .actions a, .actions button { margin-right: 5px; }
        .search { margin: 15px 0; }
        input { padding: 7px; width: 300px; }
        button, .btn { padding: 7px 12px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Data Anggota</h1>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <p>
        <a class="btn" href="{{ route('members.create') }}">+ Tambah Anggota</a>
    </p>

    <form class="search" action="{{ route('members.index') }}" method="GET">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama anggota..."
        >
        <button type="submit">Cari</button>
        @if (request('search'))
            <a href="{{ route('members.index') }}">Reset</a>
        @endif
    </form>

    <table>
        <thead>
            <tr>
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
            @forelse ($members as $member)
                <tr>
                    <td>{{ $member['nama'] }}</td>
                    <td>{{ $member['nim'] }}</td>
                    <td>{{ $member['email'] }}</td>
                    <td>{{ $member['nomor_telepon'] }}</td>
                    <td>{{ $member['alamat'] }}</td>
                    <td>{{ $member['status'] }}</td>
                    <td class="actions">
                        <a href="{{ route('members.show', $member['id']) }}">Detail</a>
                        <a href="{{ route('members.edit', $member['id']) }}">Edit</a>
                        <form action="{{ route('members.destroy', $member['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus anggota ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $members->appends(request()->query())->links() }}
</body>
</html>
