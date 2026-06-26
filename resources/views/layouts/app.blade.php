<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            color: #adb5bd;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active {
            color: #fff;
            background-color: #495057;
        }
        .sidebar .nav-header {
            color: #6c757d;
            padding: 10px 20px;
            font-size: 12px;
            text-transform: uppercase;
        }
        .main-content {
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        {{-- Sidebar --}}
        <div class="col-md-2 sidebar p-0">
            <div class="text-white text-center py-3 border-bottom border-secondary">
                <strong>Toko CRUD</strong>
            </div>
            <div class="nav-header mt-2">Master Data</div>
            <a href="{{ route('table-a.index') }}" class="{{ request()->is('table-a*') ? 'active' : '' }}">
                Table A (Toko)
            </a>
            <a href="{{ route('table-b.index') }}" class="{{ request()->is('table-b*') ? 'active' : '' }}">
                Table B (Transaksi)
            </a>
            <a href="{{ route('table-c.index') }}" class="{{ request()->is('table-c*') ? 'active' : '' }}">
                Table C (Area)
            </a>
            <a href="{{ route('table-d.index') }}" class="{{ request()->is('table-d*') ? 'active' : '' }}">
                Table D (Sales)
            </a>
        </div>

        {{-- Main Content --}}
        <div class="col-md-10 main-content">
            {{-- Alert --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>