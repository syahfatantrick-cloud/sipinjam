@extends('layouts.buku')
@section('judul', 'Daftar Buku')

@section('konten')
<h3>Daftar Buku</h3>
<p><a href="{{ route('buku.create') }}" class="text-decoration-none small">+ Tambah Buku Baru</a></p>

<table class="table table-bordered tabel-buku align-middle">
    <thead>
        <tr><th>Kode Buku</th><th>Judul</th><th>Penulis</th><th>Stok</th><th>Kategori</th><th>Aksi</th></tr>
    </thead>
    <tbody>
        @forelse ($bukus as $b)
            <tr>
                <td>{{ $b->kode_buku }}</td>
                <td>{{ $b->judul }}</td>
                <td>{{ $b->penulis }}</td>
                <td>{{ $b->stok }}</td>
                <td>{{ $b->kategori }}</td>
                <td>
                    <a href="{{ route('buku.show', $b) }}" class="text-decoration-none">Detail</a> |
                    <a href="{{ route('buku.edit', $b) }}" class="text-decoration-none">Ubah</a> |
                    <form action="{{ route('buku.destroy', $b) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Hapus buku ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link btn-sm p-0 text-danger text-decoration-none align-baseline">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center text-muted">Belum ada data buku.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $bukus->links('pagination::bootstrap-5') }}
@endsection