<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manajemen Data') - UTS PBO</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f5f7fa; color: #222; }
        header { background: #1e3a8a; color: #fff; padding: 16px 24px; }
        nav { margin-top: 8px; display: flex; gap: 12px; }
        nav a { color: #dbeafe; text-decoration: none; font-size: 14px; }
        nav a:hover { text-decoration: underline; }
        main { max-width: 1000px; margin: 24px auto; background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.06); }
        footer { text-align: center; padding: 16px; font-size: 13px; color: #666; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; font-size: 14px; }
        th { background: #f1f5f9; }
        .btn { display: inline-block; padding: 6px 12px; border-radius: 4px; text-decoration: none; border: none; cursor: pointer; font-size: 13px; }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-info { background: #0284c7; color: #fff; }
        .btn-warning { background: #d97706; color: #fff; }
        .btn-danger { background: #dc2626; color: #fff; }
        .alert-success { background: #dcfce7; color: #166534; padding: 12px; border-radius: 4px; margin-bottom: 16px; }
        .alert-error { background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 4px; margin-bottom: 16px; }
        .form-group { margin-bottom: 14px; }
        label { display: block; margin-bottom: 6px; font-weight: bold; font-size: 14px; }
        input, select { width: 100%; padding: 8px 10px; border: 1px solid #cbd5e1; border-radius: 4px; box-sizing: border-box; }
        .actions { display: flex; gap: 6px; align-items: center; }
    </style>
</head>
<body>
    <header>
        <h1>@yield('heading', 'Sistem Manajemen Data')</h1>
        <nav>
            <a href="{{ route('barang.index') }}">Daftar Data</a>
            <a href="{{ route('barang.create') }}">Tambah Data</a>
        </nav>
    </header>

    <main>
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                <strong>Terjadi kesalahan validasi:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        UTS Pemrograman Berorientasi Objek — Laravel 13 Session App
    </footer>
</body>
</html>