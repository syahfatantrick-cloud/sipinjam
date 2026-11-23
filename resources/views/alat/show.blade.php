@extends('layouts.app')
@section('judul', 'Detail Alat')

@section('konten')
<div class="card shadow-sm">
    <div class="card-header bg-white"><h5 class="mb-0">Detail Alat: {{ $alat->nama }}</h5></div>
    <div class="card-body">
        <ul>
            <li><strong>Kode:</strong> {{ $alat->kode }}</li>
            <li><strong>Nama:</strong> {{ $alat->nama }}</li>
            <li><strong>Lokasi:</strong> {{ $alat->lokasi }}</li>
            <li><strong>Stok:</strong> {{ $alat->stok }}</li>
            <li><strong>Kondisi:</strong> {{ $alat->kondisi }}</li>
        </ul>
        <a href="{{ route('alat.index') }}">Kembali ke Daftar Alat</a>
    </div>
</div>
@endsection