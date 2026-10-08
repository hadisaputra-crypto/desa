<?php
$user = session()->get('user');
$db = \Config\Database::connect();
$web = $db->table('tbl_web')->where('id', '1')->get()->getRowArray();
$unit = $db->table('tbl_unit_usaha')->where('id_unit', $user['id_unit'] ?? 0)->get()->getRowArray();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $judul ?> | Unit Usaha</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'biru-utama': '#1565c0',
                        'biru-muda':  '#1976d2',
                        'biru-tua':   '#0d47a1',
                        'biru-cerah': '#64b5f6',
                        'biru-pastel':'#e3f2fd',
                    }
                }
            }
        }
    </script>
    <style>
        .sidebar {
            scrollbar-width: thin;
            scrollbar-color: rgba(255,255,255,0.3) transparent;
        }
        .sidebar::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 2px;
        }
        .hamburger-line {
            transition: all 0.3s ease;
        }
        .hamburger.active .hamburger-line:nth-child(1) {
            transform: rotate(45deg) translate(6px, 6px);
        }
        .hamburger.active .hamburger-line:nth-child(2) {
            opacity: 0;
        }
        .hamburger.active .hamburger-line:nth-child(3) {
            transform: rotate(-45deg) translate(6px, -6px);
        }
        /* Responsive page-header */
        @media (max-width: 768px) {
            .page-header { flex-direction: column !important; align-items: stretch !important; gap: 0.5rem; }
            .page-header h2 { font-size: 1.1rem !important; }
            .page-header > a { justify-content: center !important; padding: 0.5rem 1rem !important; font-size: 0.85rem !important; }
            .overflow-x-auto { overflow-x: auto !important; -webkit-overflow-scrolling: touch; scrollbar-width: auto; }
            .overflow-x-auto::-webkit-scrollbar { height: 5px; }
            .overflow-x-auto::-webkit-scrollbar-thumb { background: #1565c0; border-radius: 3px; }
            .overflow-x-auto::-webkit-scrollbar-track { background: #e2e8f0; }
            .overflow-x-auto table { width: max-content !important; min-width: 100%; }
            .overflow-x-auto table th,
            .overflow-x-auto table td { white-space: nowrap; }
            .content-area { padding: 0.5rem !important; }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans flex min-h-screen overflow-x-hidden">
    <div class="sidebar-overlay fixed inset-0 bg-black bg-opacity-50 z-40 hidden" id="sidebarOverlay"></div>

    <div class="sidebar w-64 bg-gradient-to-b from-biru-tua to-biru-utama text-white fixed h-screen overflow-y-auto transition-all duration-300 z-50 -translate-x-full lg:translate-x-0" id="sidebar">
        <div class="sidebar-header p-8 border-b border-white border-opacity-10 text-center relative">
            <img src="<?= base_url('logo/' . $web['logo']) ?>" alt="Logo" class="w-16 h-16 rounded-full border-2 border-white mx-auto mb-4">
            <h3 class="text-lg font-semibold mb-1"><?= $unit['nama_unit'] ?? 'Unit Usaha' ?></h3>
            <p class="text-sm text-white text-opacity-80">Unit Usaha</p>
            <button class="close-sidebar absolute top-4 right-4 bg-transparent border-none text-white text-xl cursor-pointer lg:hidden" id="closeSidebar">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <nav class="sidebar-menu py-5">
            <ul class="space-y-2">
                <li>
                    <a href="<?= base_url('unit/beranda') ?>" class="menu-item flex items-center px-6 py-3 text-white no-underline transition-all duration-300 border-l-4 border-transparent hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah <?= $active_menu === 'beranda' ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                        <i class="fas fa-tachometer-alt w-5 text-center mr-3"></i>
                        <span class="flex-1">Beranda</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('unit/anggota') ?>" class="menu-item flex items-center px-6 py-3 text-white no-underline transition-all duration-300 border-l-4 border-transparent hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah <?= $active_menu === 'anggota' ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                        <i class="fas fa-users w-5 text-center mr-3"></i>
                        <span class="flex-1">Anggota</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('unit/produk') ?>" class="menu-item flex items-center px-6 py-3 text-white no-underline transition-all duration-300 border-l-4 border-transparent hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah <?= $active_menu === 'produk' ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                        <i class="fas fa-box w-5 text-center mr-3"></i>
                        <span class="flex-1">Produk</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('unit/transaksi') ?>" class="menu-item flex items-center px-6 py-3 text-white no-underline transition-all duration-300 border-l-4 border-transparent hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah <?= $active_menu === 'transaksi' ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                        <i class="fas fa-exchange-alt w-5 text-center mr-3"></i>
                        <span class="flex-1">Transaksi</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('unit/layanan') ?>" class="menu-item flex items-center px-6 py-3 text-white no-underline transition-all duration-300 border-l-4 border-transparent hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah <?= $active_menu === 'layanan' ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                        <i class="fas fa-handshake w-5 text-center mr-3"></i>
                        <span class="flex-1">Jasa / Layanan</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('unit/kategoritransaksi') ?>" class="menu-item flex items-center px-6 py-3 text-white no-underline transition-all duration-300 border-l-4 border-transparent hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah <?= $active_menu === 'kategoritransaksi' ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                        <i class="fas fa-tags w-5 text-center mr-3"></i>
                        <span class="flex-1">Kategori Transaksi</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('unit/laporan/kas') ?>" class="menu-item flex items-center px-6 py-3 text-white no-underline transition-all duration-300 border-l-4 border-transparent hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah <?= $active_menu === 'laporan' ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                        <i class="fas fa-chart-bar w-5 text-center mr-3"></i>
                        <span class="flex-1">Laporan</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('unit/profile') ?>" class="menu-item flex items-center px-6 py-3 text-white no-underline transition-all duration-300 border-l-4 border-transparent hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah <?= $active_menu === 'profile' ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                        <i class="fas fa-user-cog w-5 text-center mr-3"></i>
                        <span class="flex-1">Profile</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="main-content flex-1 ml-0 lg:ml-64 transition-all duration-300 min-h-screen min-w-0" id="mainContent">
        <div class="top-navbar bg-white px-4 sm:px-6 py-3 shadow-sm sticky top-0 z-30 flex justify-between items-center">
            <div class="nav-left flex items-center gap-3">
                <button class="menu-toggle hamburger bg-transparent border-none text-biru-tua cursor-pointer lg:hidden p-2 flex flex-col justify-center items-center w-8 h-8" id="menuToggle">
                    <span class="hamburger-line bg-biru-tua w-6 h-0.5 mb-1.5"></span>
                    <span class="hamburger-line bg-biru-tua w-6 h-0.5 mb-1.5"></span>
                    <span class="hamburger-line bg-biru-tua w-6 h-0.5"></span>
                </button>
                <div class="lg:hidden flex items-center gap-2">
                    <img src="<?= base_url('logo/' . $web['logo']) ?>" alt="Logo" class="w-8 h-8 rounded">
                    <h1 class="text-lg font-semibold text-biru-tua">Unit Usaha</h1>
                </div>
            </div>

            <div class="nav-right flex items-center gap-3 sm:gap-5">
                <div class="user-info flex items-center gap-2 sm:gap-3">
                    <div class="user-avatar w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-biru-utama text-white flex items-center justify-center font-semibold text-sm sm:text-base">
                        <?= strtoupper(substr($user['nama'] ?? 'U', 0, 1)) ?>
                    </div>
                    <span class="hidden md:inline text-sm sm:text-base"><?= $user['nama'] ?? 'User' ?></span>
                </div>
                <a href="<?= base_url('auth/logout') ?>" class="logout-btn text-biru-tua px-3 py-2 sm:px-4 sm:py-2 rounded-lg no-underline transition-all duration-300 flex items-center gap-1 sm:gap-2 text-sm sm:text-base">
                    <i class="fas fa-sign-out-alt text-xs sm:text-sm"></i>
                    <span class="hidden sm:inline">Logout</span>
                </a>
            </div>
        </div>

        <div class="content-area p-2 sm:p-3 lg:p-4">
            <?php if ($page) {
                echo view($page);
            } ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.getElementById('menuToggle');
            const closeSidebar = document.getElementById('closeSidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                menuToggle.classList.toggle('active');
                sidebarOverlay.classList.toggle('hidden');
                document.body.style.overflow = sidebar.classList.contains('-translate-x-full') ? '' : 'hidden';
            }

            menuToggle.addEventListener('click', toggleSidebar);
            closeSidebar.addEventListener('click', toggleSidebar);
            sidebarOverlay.addEventListener('click', toggleSidebar);

            function handleResize() {
                if (window.innerWidth > 1024) {
                    sidebar.classList.remove('-translate-x-full');
                    menuToggle.classList.remove('active');
                    sidebarOverlay.classList.add('hidden');
                    document.body.style.overflow = '';
                } else {
                    sidebar.classList.add('-translate-x-full');
                    menuToggle.classList.remove('active');
                }
            }

            window.addEventListener('resize', handleResize);

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !sidebar.classList.contains('-translate-x-full')) {
                    toggleSidebar();
                }
            });

            document.addEventListener('click', function(e) {
                if (window.innerWidth < 1024 && 
                    !sidebar.contains(e.target) && 
                    !menuToggle.contains(e.target) && 
                    !sidebar.classList.contains('-translate-x-full')) {
                    toggleSidebar();
                }
            });
        });
    </script>
</body>
</html>
