<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { font-family: 'Segoe UI', 'Inter', sans-serif; }

        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            /* Background foto perpustakaan */
            background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Overlay gradient ungu transparan */
        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.85) 0%, rgba(124, 58, 237, 0.80) 50%, rgba(147, 51, 234, 0.75) 100%);
            z-index: 1;
        }

        /* Dekorasi lingkaran */
        body::after {
            content: '';
            position: absolute;
            bottom: -200px; left: -100px;
            width: 500px; height: 500px;
            background: rgba(255,255,255,0.06);
            border-radius: 50%;
            z-index: 2;
        }

        .login-wrapper {
            position: relative;
            z-index: 3;
            width: 100%;
            max-width: 460px;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 26px;
            padding: 46px 40px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.35),
                        0 0 0 1px rgba(255, 255, 255, 0.15);
            animation: fadeUp 0.7s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }

        /* Efek garis berkilau di atas card */
        .login-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 5px;
            background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899, #6366f1);
            background-size: 200% 100%;
            animation: shimmer 3s linear infinite;
        }

        @keyframes shimmer {
            0% { background-position: 0% 0; }
            100% { background-position: 200% 0; }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-logo {
            width: 88px;
            height: 88px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 26px;
            box-shadow: 0 16px 40px rgba(99, 102, 241, 0.45);
            position: relative;
        }

        .login-logo::after {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 28px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6, #ec4899);
            z-index: -1;
            opacity: 0.4;
            filter: blur(12px);
        }

        .login-logo i {
            font-size: 2.6rem;
            color: #fff;
        }

        .login-title {
            font-size: 1.85rem;
            font-weight: 800;
            color: #1e293b;
            text-align: center;
            margin-bottom: 8px;
            letter-spacing: -0.6px;
        }

        .login-subtitle {
            text-align: center;
            color: #64748b;
            font-size: 0.95rem;
            margin-bottom: 34px;
            line-height: 1.5;
        }

        .form-control {
            border-radius: 12px;
            border: 1.5px solid #e2e8f0;
            padding: 14px 18px 14px 48px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            background: #f8fafc;
        }

        .form-control::placeholder { color: #94a3b8; }

        .form-control:focus {
            border-color: #6366f1;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
        }

        .input-icon {
            position: relative;
        }

        .input-icon > i {
            position: absolute;
            left: 17px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.15rem;
            z-index: 3;
            transition: color 0.2s ease;
        }

        .input-icon:focus-within > i {
            color: #6366f1;
        }

        .btn-login {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 700;
            font-size: 1rem;
            width: 100%;
            box-shadow: 0 8px 24px rgba(79, 70, 229, 0.45);
            transition: all 0.25s ease;
            letter-spacing: 0.3px;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            width: 0; height: 0;
            background: rgba(255,255,255,0.25);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.5s ease, height 0.5s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(79, 70, 229, 0.55);
            color: #fff;
        }

        .btn-login:hover::before {
            width: 400px;
            height: 400px;
        }

        .btn-login:active { transform: translateY(0); }

        .alert {
            border-radius: 12px;
            border: none;
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 16px;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-text {
            text-align: center;
            color: rgba(255,255,255,0.85);
            margin-top: 26px;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        .footer-text i { color: #a5f3fc; }

        /* Responsive */
        @media (max-width: 480px) {
            .login-card { padding: 36px 26px; border-radius: 22px; }
            .login-title { font-size: 1.5rem; }
            .login-logo { width: 72px; height: 72px; }
            .login-logo i { font-size: 2.1rem; }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-logo">
                <i class="bi bi-book-half"></i>
            </div>
            <h1 class="login-title">Selamat Datang</h1>
            <p class="login-subtitle">Masuk untuk mengelola data perpustakaan</p>

            @if($errors->any())
                <div class="alert mb-4">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3 input-icon">
                    <i class="bi bi-envelope-fill"></i>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="form-control" placeholder="Masukkan email" required autofocus>
                </div>
                <div class="mb-4 input-icon">
                    <i class="bi bi-lock-fill"></i>
                    <input type="password" name="password"
                           class="form-control" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="btn-login">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Login
                </button>
            </form>
        </div>

        <p class="footer-text">
            <i class="bi bi-shield-check"></i> Sistem Manajemen Perpustakaan
        </p>
    </div>
</body>
</html>