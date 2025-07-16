<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .dashboard-container {
            background: white;
            border-radius: 24px;
            box-shadow: 0 12px 32px rgba(102, 126, 234, 0.15);
            padding: 48px 32px 32px 32px;
            max-width: 600px;
            width: 95%;
            text-align: center;
        }
        .dashboard-title {
            color: #667eea;
            font-size: 2.4em;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .dashboard-subtitle {
            color: #666;
            font-size: 1.1em;
            margin-bottom: 32px;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 28px;
            margin-top: 16px;
        }
        .menu-card {
            background: linear-gradient(120deg, #667eea 60%, #764ba2 100%);
            color: white;
            border-radius: 16px;
            padding: 32px 12px 24px 12px;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1em;
            box-shadow: 0 4px 16px rgba(102, 126, 234, 0.10);
            transition: transform 0.18s, box-shadow 0.18s;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }
        .menu-card:hover {
            transform: translateY(-6px) scale(1.04);
            box-shadow: 0 12px 32px rgba(102, 126, 234, 0.18);
            background: linear-gradient(120deg, #764ba2 60%, #667eea 100%);
        }
        .menu-icon {
            font-size: 2.5em;
            margin-bottom: 12px;
            filter: drop-shadow(0 2px 6px rgba(0,0,0,0.08));
        }
        .footer {
            margin-top: 36px;
            color: #aaa;
            font-size: 0.95em;
        }
        @media (max-width: 600px) {
            .dashboard-container {
                padding: 24px 6px 18px 6px;
            }
            .dashboard-title {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-title">Sistem Manajemen Rental Barang</div>
        <div class="dashboard-subtitle">Selamat datang! Silakan pilih menu di bawah untuk mengelola sistem.</div>
        <div class="menu-grid">
            <a href="/barang" class="menu-card">
                <span class="menu-icon">📦</span>
                Manajemen Barang
            </a>
            <a href="/pelanggan" class="menu-card">
                <span class="menu-icon">👥</span>
                Data Pelanggan
            </a>
            <a href="/transaksi" class="menu-card">
                <span class="menu-icon">💰</span>
                Transaksi
            </a>
            <a href="/notifikasi" class="menu-card">
                <span class="menu-icon">🔔</span>
                Notifikasi
            </a>
        </div>
        <div class="footer">
            &copy; 2024 Sistem Manajemen Rental Barang
        </div>
    </div>
</body>
</html> 