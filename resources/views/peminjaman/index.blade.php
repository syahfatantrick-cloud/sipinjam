@extends('layouts.app')
@section('judul', 'Daftar Peminjaman')

@section('konten')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Peminjaman Alat</h5>
        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-sm">+ Tambah Peminjaman</a>
    </div>
    <div class="card-body">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th><th>Nama Peminjam</th><th>Nama Alat (Relasi)</th>
                    <th>Jumlah</th><th>Tanggal Pinjam</th><th>Status</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($peminjamans as $p)
                    <tr>
                        <td>{{ $peminjamans->firstItem() + $loop->index }}</td>
                        <td>{{ $p->nama_peminjam }}</td>
                        <td>{{ $p->alat->nama ?? '-' }}</td>
                        <td>{{ $p->jumlah }}</td>
                        <td>{{ $p->tanggal_pinjam }}</td>
                        <td><span class="badge bg-secondary">{{ $p->status }}</span></td>
                        <td>
                            <form action="{{ route('peminjaman.destroy', $p) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus data peminjaman ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted">Belum ada data peminjaman.</td></tr>
                @endforelse
            </tbody>
        </table>

        {{ $peminjamans->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection