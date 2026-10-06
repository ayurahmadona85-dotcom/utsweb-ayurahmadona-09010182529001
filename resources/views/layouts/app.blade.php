<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan') — Sistem Manajemen Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --primary-light: #6366f1;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #06b6d4;
            --dark: #1e293b;
            --light: #f8fafc;
        }

        * { font-family: 'Segoe UI', 'Inter', sans-serif; }

        body {
            background: linear-gradient(135deg, #f0f4ff 0%, #faf5ff 100%);
            min-height: 100vh;
            padding-top: 76px;
        }

        /* Navbar */
        .navbar-custom {
            background: linear-gradient(90deg, #4f46e5 0%, #7c3aed 100%);
            box-shadow: 0 4px 20px rgba(79, 70, 229, 0.25);
            padding: 14px 0;
        }

        .navbar-custom .navbar-brand {
            font-weight: 700;
            font-size: 1.35rem;
            color: #fff !important;
            letter-spacing: -0.5px;
        }

        .navbar-custom .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            padding: 8px 18px !important;
            border-radius: 10px;
            margin: 0 4px;
            transition: all 0.2s ease;
        }

        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            background: rgba(255,255,255,0.18);
            color: #fff !important;
        }

        .user-badge {
            background: rgba(255,255,255,0.18);
            color: #fff;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-logout {
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.35);
            color: #fff;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-logout:hover {
            background: rgba(255,255,255,0.3);
            color: #fff;
        }

        /* Cards */
        .card-modern {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(15, 23, 42, 0.06);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card-modern:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(15, 23, 42, 0.12);
        }

        /* Stat Cards */
        .stat-card {
            border-radius: 20px;
            padding: 28px;
            color: #fff;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .stat-card:hover { transform: translateY(-5px) scale(1.02); }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -40px; right: -40px;
            width: 160px; height: 160px;
            background: rgba(255,255,255,0.12);
            border-radius: 50%;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: -60px; right: 20px;
            width: 100px; height: 100px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
        }

        .stat-card.primary { background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); }
        .stat-card.success { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .stat-card.warning { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }

        .stat-icon {
            position: absolute;
            right: 24px;
            top: 24px;
            font-size: 2.8rem;
            opacity: 0.35;
            z-index: 1;
        }

        .stat-label {
            font-size: 0.875rem;
            font-weight: 500;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 2.6rem;
            font-weight: 800;
            line-height: 1;
            margin: 0;
        }

        /* Buttons */
        .btn-modern {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            border: none;
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff;
            box-shadow: 0 4px 14px rgba(79, 70, 229, 0.3);
        }

        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.4);
            color: #fff;
        }

        .btn-soft-info { background: #e0f2fe; color: #0369a1; }
        .btn-soft-info:hover { background: #bae6fd; color: #075985; }

        .btn-soft-warning { background: #fef3c7; color: #b45309; }
        .btn-soft-warning:hover { background: #fde68a; color: #92400e; }

        .btn-soft-danger { background: #fee2e2; color: #b91c1c; }
        .btn-soft-danger:hover { background: #fecaca; color: #991b1b; }

        .btn-soft-secondary { background: #e2e8f0; color: #475569; }
        .btn-soft-secondary:hover { background: #cbd5e1; color: #334155; }

        /* Table */
        .table-modern {
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 24px rgba(15, 23, 42, 0.06);
        }

        .table-modern thead {
            background: linear-gradient(90deg, #1e293b 0%, #334155 100%);
            color: #fff;
        }

        .table-modern thead th {
            border: none;
            padding: 18px 16px;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table-modern tbody td {
            padding: 16px;
            vertical-align: middle;
            border-color: #f1f5f9;
        }

        .table-modern tbody tr {
            transition: background 0.15s ease;
        }

        .table-modern tbody tr:hover {
            background: #f8fafc;
        }

        /* Badges */
        .badge-category {
            background: linear-gradient(135deg, #e0e7ff, #c7d2fe);
            color: #4338ca;
            padding: 6px 12px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.78rem;
        }

        .badge-stock {
            background: #dcfce7;
            color: #166534;
            padding: 5px 12px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.8rem;
        }

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            padding-bottom: 18px;
            border-bottom: 2px solid #e2e8f0;
        }

        .page-header h1 {
            font-size: 1.9rem;
            font-weight: 800;
            color: #1e293b;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .page-header .subtitle {
            color: #64748b;
            font-size: 0.9rem;
            margin-top: 4px;
        }

        /* Form */
        .form-control, .form-select {
            border-radius: 10px;
            border: 1.5px solid #e2e8f0;
            padding: 11px 16px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.12);
        }

        .form-label {
            font-weight: 600;
            color: #334155;
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        /* Alerts */
        .alert-modern {
            border-radius: 12px;
            border: none;
            padding: 14px 20px;
            font-weight: 500;
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.15);
        }

        /* Filter Bar */
        .filter-bar {
            background: #fff;
            border-radius: 16px;
            padding: 18px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.05);
            margin-bottom: 22px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <i class="bi bi-book-half"></i> Perpustakaan
        </a>
        <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <i class="bi bi-list fs-3"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav me-auto ms-4">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">
                        <i class="bi bi-journal-bookmark"></i> Buku
                    </a>
                </li>
            </ul>
            @auth
                <span class="user-badge me-3">
                    <i class="bi bi-person-circle fs-5"></i>
                    {{ auth()->user()->name }}
                </span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn-logout" type="submit">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<main class="container py-4">
    @if(session('success'))
        <div class="alert alert-success alert-modern alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>