@extends('layouts.app')
@section('judul', 'Ubah Alat')

@section('konten')
<div class="card shadow-sm">
    <div class="card-header bg-white"><h5 class="mb-0">Ubah Alat</h5></div>
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

        <form method="POST" action="{{ route('alat.update', $alat) }}">
            @csrf
            @method('PUT')
            <div class="mb-3"><label class="form-label">Kode</label>
                <input class="form-control" name="kode" value="{{ old('kode', $alat->kode) }}"></div>
            <div class="mb-3"><label class="form-label">Nama</label>
                <input class="form-control" name="nama" value="{{ old('nama', $alat->nama) }}"></div>
            <div class="mb-3"><label class="form-label">Stok</label>
                <input class="form-control" type="number" name="stok" value="{{ old('stok', $alat->stok) }}"></div>
            <div class="mb-3"><label class="form-label">Lokasi</label>
                <input class="form-control" name="lokasi" value="{{ old('lokasi', $alat->lokasi) }}"></div>
            <div class="mb-3"><label class="form-label">Kondisi</label>
                <select class="form-select" name="kondisi">
                    @foreach (['baik', 'rusak ringan', 'rusak berat'] as $k)
                        <option value="{{ $k }}" @selected(old('kondisi', $alat->kondisi) == $k)>{{ $k }}</option>
                    @endforeach
                </select></div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('alat.index') }}" class="btn btn-link">Batal</a>
        </form>
    </div>
</div>
@endsection