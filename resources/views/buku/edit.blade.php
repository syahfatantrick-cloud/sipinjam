@extends('layouts.buku')
@section('judul', 'Ubah Buku')

@section('konten')
<h3>Ubah Buku</h3>

@if ($errors->any())
    <ul class="daftar-error">
        @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('buku.update', $buku) }}">
    @csrf
    @method('PUT')
    <div class="mb-3"><label>Kode Buku:</label>
        <input class="form-control form-control-sm" name="kode_buku" value="{{ old('kode_buku', $buku->kode_buku) }}"></div>
    <div class="mb-3"><label>Judul Buku:</label>
        <input class="form-control form-control-sm" name="judul" value="{{ old('judul', $buku->judul) }}"></div>
    <div class="mb-3"><label>Penulis:</label>
        <input class="form-control form-control-sm" name="penulis" value="{{ old('penulis', $buku->penulis) }}"></div>
    <div class="mb-3"><label>Stok:</label>
        <input class="form-control form-control-sm" type="number" name="stok" value="{{ old('stok', $buku->stok) }}"></div>
    <div class="mb-3"><label>Kategori:</label>
        <input class="form-control form-control-sm" name="kategori" value="{{ old('kategori', $buku->kategori) }}"></div>
    <button type="submit" class="btn btn-primary btn-sm">Perbarui</button>
    <a href="{{ route('buku.index') }}" class="text-decoration-none small ms-1">Batal</a>
</form>
@endsection