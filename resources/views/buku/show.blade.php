@extends('layouts.buku')
@section('judul', 'Detail Buku')

@section('konten')
<h3>Detail Buku: {{ $buku->judul }}</h3>
<ul class="small">
    <li><strong>Kode Buku:</strong> {{ $buku->kode_buku }}</li>
    <li><strong>Judul:</strong> {{ $buku->judul }}</li>
    <li><strong>Penulis:</strong> {{ $buku->penulis }}</li>
    <li><strong>Stok:</strong> {{ $buku->stok }}</li>
    <li><strong>Kategori:</strong> {{ $buku->kategori }}</li>
</ul>
<a href="{{ route('buku.index') }}" class="text-decoration-none small">Kembali ke Daftar Buku</a>
@endsection