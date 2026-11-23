@extends('layouts.app')
@section('judul', 'Tambah Peminjaman')

@section('konten')
<div class="card shadow-sm">
    <div class="card-header bg-white"><h5 class="mb-0">Tambah Peminjaman</h5></div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('peminjaman.store') }}">
            @csrf
            <div class="mb-3"><label class="form-label">Alat</label>
                <select class="form-select" name="alat_id">
                    <option value="">-- Pilih alat --</option>
                    @foreach ($alats as $a)
                        <option value="{{ $a->id }}" @selected(old('alat_id') == $a->id)>{{ $a->nama }} (stok: {{ $a->stok }})</option>
                    @endforeach
                </select></div>
            <div class="mb-3"><label class="form-label">Nama Peminjam</label>
                <input class="form-control" name="nama_peminjam" value="{{ old('nama_peminjam') }}"></div>
            <div class="mb-3"><label class="form-label">Tanggal Pinjam</label>
                <input class="form-control" type="date" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}"></div>
            <div class="mb-3"><label class="form-label">Jumlah</label>
                <input class="form-control" type="number" name="jumlah" value="{{ old('jumlah', 1) }}"></div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-link">Batal</a>
        </form>
    </div>
</div>
@endsection