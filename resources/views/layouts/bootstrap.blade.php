<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judul', 'Sistem Peminjaman Alat')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <div class="d-flex align-items-center gap-3">
    <a href="{{ route('alat.index') }}" class="text-white text-decoration-none">Data Alat</a>
</div>
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark shadow-sm mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="{{ route('alat.index') }}">Sistem Peminjaman Alat</a>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('alat.index') }}" class="text-white text-decoration-none">Data Alat</a>
                <a href="{{ route('peminjaman.index') }}" class="text-white text-decoration-none">Data Peminjaman</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @if (session('sukses'))
            <div class="alert alert-success">{{ session('sukses') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('konten')
    </div>
</body>
</html>