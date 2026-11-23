<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul', 'Aplikasi Perpustakaan Buku')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', Arial, sans-serif; background: #f4f6f9; color: #212529; }
        .wrap { max-width: 900px; margin: 30px auto; background: #fff; padding: 22px 28px 28px;
                border-radius: 8px; box-shadow: 0 1px 6px rgba(0,0,0,.08); }
        .wrap h2 { font-size: 1.35rem; font-weight: 600; margin: 0; }
        .wrap h3 { font-size: 1.05rem; font-weight: 600; margin: 18px 0 10px; }
        table.tabel-buku thead th { background: #0d6efd; color: #fff; font-weight: 600; font-size: .85rem; }
        table.tabel-buku td { font-size: .85rem; }
        .flash { color: #198754; font-size: .9rem; }
        .daftar-error { color: #dc3545; font-size: .85rem; }
        label { font-size: .85rem; }
    </style>
</head>
<body>
    <div class="wrap">
        <h2>Aplikasi Perpustakaan Buku</h2>
        <hr>
        @if (session('sukses'))
            <p class="flash">{{ session('sukses') }}</p>
        @endif
        @yield('konten')
    </div>
</body>
</html>