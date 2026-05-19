<?php
$user = session()->get('user');
$db = \Config\Database::connect();
$web = $db->table('tbl_web')->where('id', '1')->get()->getRowArray();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | BUMDes Digital</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --hijau-utama: #2e7d32;
            --hijau-muda: #4caf50;
            --hijau-tua: #1b5e20;
            --hijau-cerah: #81c784;
            --hijau-pastel: #e8f5e9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f5f5;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--hijau-tua) 0%, var(--hijau-utama) 100%);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 30px 25px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
            position: relative;
        }

        .sidebar-header img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 3px solid white;
            margin-bottom: 15px;
        }

        .sidebar-header h3 {
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .sidebar-header p {
            font-size: 0.8rem;
            opacity: 0.8;
        }

        .close-sidebar {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            display: none;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            padding: 12px 25px;
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .menu-item:hover, .menu-item.active {
            background: rgba(255,255,255,0.1);
            border-left-color: var(--hijau-cerah);
        }

        .menu-item i {
            margin-right: 12px;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .menu-text {
            flex: 1;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            transition: all 0.3s ease;
            min-height: 100vh;
        }

        .top-navbar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .menu-toggle {
            background: none;
            border: none;
            font-size: 1.3rem;
            color: var(--hijau-tua);
            cursor: pointer;
            display: none;
            padding: 5px;
        }

        .nav-left h1 {
            color: var(--hijau-tua);
            font-size: 1.5rem;
            font-weight: 600;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--hijau-utama);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .logout-btn {
            background: var(--hijau-utama);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .logout-btn:hover {
            background: var(--hijau-tua);
        }

        /* Content Area */
        .content-area {
            padding: 30px;
        }

        .welcome-card {
            background: linear-gradient(135deg, var(--hijau-utama), var(--hijau-muda));
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(76, 175, 80, 0.3);
        }

        .welcome-card h2 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border-top: 4px solid var(--hijau-utama);
            text-align: center;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: var(--hijau-pastel);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: var(--hijau-utama);
            font-size: 1.5rem;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--hijau-tua);
            margin-bottom: 5px;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }

        .quick-actions {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }

        .section-title {
            color: var(--hijau-tua);
            margin-bottom: 20px;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .action-btn {
            background: var(--hijau-pastel);
            color: var(--hijau-tua);
            padding: 20px;
            border-radius: 10px;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .action-btn:hover {
            background: var(--hijau-utama);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .action-btn i {
            font-size: 1.5rem;
            margin-bottom: 10px;
            display: block;
        }

        /* Overlay untuk mobile */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 999;
            display: none;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .menu-toggle {
                display: block;
            }
            
            .close-sidebar {
                display: block;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .action-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .top-navbar {
                padding: 12px 20px;
            }
            
            .nav-left h1 {
                font-size: 1.3rem;
            }
            
            .content-area {
                padding: 20px;
            }
            
            .welcome-card {
                padding: 20px;
            }
            
            .welcome-card h2 {
                font-size: 1.5rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .stat-card {
                padding: 20px;
            }
            
            .quick-actions {
                padding: 20px;
            }
            
            .action-grid {
                grid-template-columns: 1fr;
            }
            
            .user-info span {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .top-navbar {
                padding: 10px 15px;
            }
            
            .nav-left h1 {
                font-size: 1.1rem;
            }
            
            .content-area {
                padding: 15px;
            }
            
            .welcome-card {
                padding: 15px;
            }
            
            .welcome-card h2 {
                font-size: 1.3rem;
            }
            
            .stat-card {
                padding: 15px;
            }
            
            .stat-number {
                font-size: 1.5rem;
            }
            
            .logout-btn span {
                display: none;
            }
            
            .logout-btn {
                padding: 8px 10px;
            }
        }

        /* Smooth transitions */
        .sidebar, .main-content {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>
<body>
    <!-- Overlay untuk mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <img src="<?= base_url('logo/' . $web['logo']) ?>" alt="Logo BUMDes">
            <h3></h3>
            <p></p>
            <button class="close-sidebar" id="closeSidebar">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="sidebar-menu">
            <a href="<?= base_url('user/dashboard') ?>" class="menu-item active">
                <i class="fas fa-tachometer-alt"></i>
                <span class="menu-text">Dashboard</span>
            </a>
            <a href="<?= base_url('user/profile') ?>" class="menu-item">
                <i class="fas fa-user"></i>
                <span class="menu-text">Profil Saya</span>
            </a>
            <a href="<?= base_url('user/layanan') ?>" class="menu-item">
                <i class="fas fa-handshake"></i>
                <span class="menu-text">Layanan</span>
            </a>
            <a href="<?= base_url('user/transaksi') ?>" class="menu-item">
                <i class="fas fa-exchange-alt"></i>
                <span class="menu-text">Transaksi</span>
            </a>
            <a href="<?= base_url('user/laporan') ?>" class="menu-item">
                <i class="fas fa-chart-bar"></i>
                <span class="menu-text">Laporan</span>
            </a>
            <a href="<?= base_url('user/pengumuman') ?>" class="menu-item">
                <i class="fas fa-bullhorn"></i>
                <span class="menu-text">Pengumuman</span>
            </a>
            <a href="<?= base_url('user/settings') ?>" class="menu-item">
                <i class="fas fa-cog"></i>
                <span class="menu-text">Pengaturan</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <div class="nav-left">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Dashboard BUMDes</h1>
            </div>
            <div class="nav-right">
                <div class="user-info">
                    <div class="user-avatar">
                        
                    </div>
                    <span></span>
                </div>
                <a href="<?= base_url('auth/logout') ?>" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-area">
            <!-- Welcome Card -->
            <div class="welcome-card">
                <h2>Selamat Datang, ! 👋</h2>
                <p>Selamat datang di sistem manajemen BUMDes Digital. Kelola usaha desa dengan mudah dan efisien.</p>
            </div>

            <!-- Statistics Grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number">1,248</div>
                    <div class="stat-label">Anggota Aktif</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="stat-number">56</div>
                    <div class="stat-label">Layanan Aktif</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-number">Rp 2.1M</div>
                    <div class="stat-label">Total Aset</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stat-number">12</div>
                    <div class="stat-label">Kegiatan Bulan Ini</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <h3 class="section-title">Aksi Cepat</h3>
                <div class="action-grid">
                    <a href="<?= base_url('user/transaksi/tambah') ?>" class="action-btn">
                        <i class="fas fa-plus-circle"></i>
                        <span>Tambah Transaksi</span>
                    </a>
                    <a href="<?= base_url('user/layanan/tambah') ?>" class="action-btn">
                        <i class="fas fa-handshake"></i>
                        <span>Kelola Layanan</span>
                    </a>
                    <a href="<?= base_url('user/laporan/keuangan') ?>" class="action-btn">
                        <i class="fas fa-file-alt"></i>
                        <span>Laporan Keuangan</span>
                    </a>
                    <a href="<?= base_url('user/anggota') ?>" class="action-btn">
                        <i class="fas fa-user-plus"></i>
                        <span>Data Anggota</span>
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="quick-actions">
                <h3 class="section-title">Aktivitas Terbaru</h3>
                <div style="color: #666; text-align: center; padding: 20px;">
                    <i class="fas fa-clock" style="font-size: 2rem; margin-bottom: 10px; opacity: 0.5;"></i>
                    <p>Tidak ada aktivitas terbaru</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const menuToggle = document.getElementById('menuToggle');
            const closeSidebar = document.getElementById('closeSidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            // Toggle sidebar
            function toggleSidebar() {
                sidebar.classList.toggle('active');
                sidebarOverlay.style.display = sidebar.classList.contains('active') ? 'block' : 'none';
                document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
            }

            // Event listeners
            menuToggle.addEventListener('click', toggleSidebar);
            closeSidebar.addEventListener('click', toggleSidebar);
            sidebarOverlay.addEventListener('click', toggleSidebar);

            // Menu aktif berdasarkan URL
            const currentPage = window.location.pathname;
            const menuItems = document.querySelectorAll('.menu-item');
            
            menuItems.forEach(item => {
                if (item.getAttribute('href') === currentPage) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });

            // Close sidebar ketika resize ke desktop
            function handleResize() {
                if (window.innerWidth > 1024) {
                    sidebar.classList.remove('active');
                    sidebarOverlay.style.display = 'none';
                    document.body.style.overflow = '';
                }
            }

            window.addEventListener('resize', handleResize);

            // ESC key untuk close sidebar
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && sidebar.classList.contains('active')) {
                    toggleSidebar();
                }
            });
        });
    </script>
</body>
</html>