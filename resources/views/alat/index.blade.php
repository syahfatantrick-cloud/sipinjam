@extends('layouts.app')
@section('judul', 'Daftar Alat')

@section('konten')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Alat Peminjaman</h5>
        <a href="{{ route('alat.create') }}" class="btn btn-primary btn-sm">+ Tambah Alat</a>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('alat.index') }}" class="d-flex mb-3" style="max-width: 340px;">
            <input type="text" name="cari" class="form-control form-control-sm me-2"
                   placeholder="Cari nama alat..." value="{{ request('cari') }}">
            <button type="submit" class="btn btn-outline-secondary btn-sm">Cari</button>
            @if (request('cari'))
                <a href="{{ route('alat.index') }}" class="btn btn-link btn-sm">Reset</a>
            @endif
        </form>

        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Kode</th><th>Nama</th><th>Stok</th><th>Lokasi</th><th>Kondisi</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($alat as $a)
                    @php
                        $warna = ['baik' => 'primary', 'rusak ringan' => 'warning', 'rusak berat' => 'danger'][$a->kondisi] ?? 'secondary';
                    @endphp
                    <tr>
                        <td>{{ $a->kode }}</td>
                        <td>{{ $a->nama }}</td>
                        <td>
                            @if ($a->stok == 0)
                                <span class="badge bg-danger">0 (Habis)</span>
                            @else
                                <span class="badge bg-success">{{ $a->stok }}</span>
                            @endif
                        </td>
                        <td>{{ $a->lokasi }}</td>
                        <td><span class="badge bg-{{ $warna }}">{{ ucfirst($a->kondisi) }}</span></td>
                        <td>
                            <a href="{{ route('alat.show', $a) }}" class="btn btn-info btn-sm text-white">Detail</a>
                            <a href="{{ route('alat.edit', $a) }}" class="btn btn-warning btn-sm">Ubah</a>
                            <form action="{{ route('alat.destroy', $a) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus alat ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted">Belum ada data alat.</td></tr>
                @endforelse
            </tbody>
        </table>

        {{ $alat->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection