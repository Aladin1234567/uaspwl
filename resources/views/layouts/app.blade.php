<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Rental Barang')</title>
    <link href="https://fonts.googleapis.com/css?family=Segoe+UI:400,700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --bg-light: #f4f6fa;
            --bg-dark: #23272f;
            --text-light: #23272f;
            --text-dark: #f4f6fa;
            --card-light: #fff;
            --card-dark: #2d3240;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg-light);
            color: var(--text-light);
            margin: 0;
            min-height: 100vh;
            transition: background 0.3s, color 0.3s;
        }
        .dark-mode {
            background: var(--bg-dark);
            color: var(--text-dark);
        }
        .container {
            max-width: 900px;
            margin: 40px auto 0 auto;
            background: var(--card-light);
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(102,126,234,0.10);
            padding: 36px 24px 24px 24px;
            transition: background 0.3s, color 0.3s;
        }
        .dark-mode .container {
            background: var(--card-dark);
            color: var(--text-dark);
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            min-height: 56px;
            padding: 0 8px;
        }
        .navbar-title {
            font-size: 1.5em;
            font-weight: bold;
            color: var(--primary);
        }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .nav-links a {
            color: var(--primary);
            text-decoration: none;
            margin: 0 8px;
            font-weight: 500;
            transition: color 0.2s;
            font-size: 1em;
            padding: 8px 10px;
            border-radius: 6px;
        }
        .nav-links a:hover {
            color: var(--secondary);
            background: #f4f6fa;
        }
        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .user-icon {
            font-size: 1.2em;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #e9eaf0;
        }
        .toggle-btn {
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 8px 18px;
            font-size: 1em;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.2s;
            min-height: 38px;
            min-width: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .toggle-btn:hover {
            background: linear-gradient(45deg, var(--secondary), var(--primary));
        }
        .footer {
            margin-top: 40px;
            color: #aaa;
            text-align: center;
            font-size: 0.95em;
        }
        @media (max-width: 600px) {
            .container { padding: 8px 0; }
            .navbar-title { font-size: 1.1em; }
            .navbar { min-height: 44px; padding: 0 2px; }
            .nav-links a { font-size: 0.95em; padding: 6px 6px; }
            .toggle-btn, .user-icon { min-width: 32px; min-height: 32px; font-size: 1em; }
        }
    </style>
    @yield('head')
</head>
<body>
    @php use Illuminate\Support\Facades\Auth; @endphp
    <div class="container">
        <div class="navbar">
            <div class="navbar-title">Sistem Rental Barang</div>
            <div class="nav-links">
                <a href="/dashboard">Dashboard</a>
                <a href="/barang">Barang</a>
                <a href="/pelanggan">Pelanggan</a>
                <a href="/transaksi">Transaksi</a>
                <a href="/notifikasi">Notifikasi</a>
            </div>
            <div class="navbar-actions">
                <span class="user-icon">👤</span>
                @if(Auth::check())
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="toggle-btn" style="margin-left:0;">Logout</button>
                </form>
                @else
                <a href="/login" class="toggle-btn" style="margin-left:0;">Login</a>
                @endif
                <button class="toggle-btn" id="toggleMode" title="Mode Terang/Gelap">🌙/☀️</button>
            </div>
        </div>
        @yield('content')
        @if(!Auth::check() && request()->is('dashboard'))
        <div style="margin:32px 0;text-align:center;">
            <a href="/login" class="toggle-btn" style="font-size:1.2em;padding:16px 40px;display:inline-block;">Login ke Sistem</a>
        </div>
        @endif
        <div class="footer">&copy; 2024 Sistem Manajemen Rental Barang</div>
    </div>
    <script>
        // Dark/Light mode toggle
        const btn = document.getElementById('toggleMode');
        const body = document.body;
        btn.onclick = function() {
            body.classList.toggle('dark-mode');
            localStorage.setItem('rental-dark-mode', body.classList.contains('dark-mode'));
        };
        // Load mode from localStorage
        if(localStorage.getItem('rental-dark-mode') === 'true') {
            body.classList.add('dark-mode');
        }
    </script>
    @yield('scripts')
</body>
</html> 