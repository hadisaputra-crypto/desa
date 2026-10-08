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
    <title><?php echo $judul ?> | BUMDes Digital</title>
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
        * { box-sizing: border-box; }
        img { max-width: 100%; height: auto; }
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
        
        /* Hamburger Menu Animation */
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
        @media (max-width: 768px) {
            .page-header { flex-direction: column; align-items: stretch !important; gap: 0.5rem; }
            .page-header h2 { font-size: 1.1rem; }
            .page-header a { justify-content: center !important; padding: 0.5rem 1rem !important; font-size: 0.85rem; gap: 0.35rem !important; }
            .overflow-x-auto { overflow-x: auto !important; -webkit-overflow-scrolling: touch; scrollbar-width: auto; }
            .overflow-x-auto::-webkit-scrollbar { height: 5px; }
            .overflow-x-auto::-webkit-scrollbar-thumb { background: #1565c0; border-radius: 3px; }
            .overflow-x-auto::-webkit-scrollbar-track { background: #e2e8f0; }
            .overflow-x-auto table { width: max-content !important; min-width: 100%; }
            .overflow-x-auto table th,
            .overflow-x-auto table td { white-space: nowrap; }
            .bg-white.overflow-hidden { overflow: visible !important; }
            .content-area { padding: 0.5rem !important; }
        }
        @media (max-width: 576px) {
            .overflow-x-auto table { font-size: 0.7rem; }
            .overflow-x-auto table th,
            .overflow-x-auto table td { padding: 0.25rem !important; }
            .overflow-x-auto table td .flex.gap-2 { gap: 0.1rem; }
            .overflow-x-auto table td a.p-2 { padding: 0.15rem 0.2rem !important; }
            .overflow-x-auto table td a i { font-size: 0.65rem; }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans flex min-h-screen">
    <!-- Overlay untuk mobile -->
    <div class="sidebar-overlay fixed inset-0 bg-black bg-opacity-50 z-40 hidden" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <div class="sidebar w-64 bg-gradient-to-b from-biru-tua to-biru-utama text-white fixed h-screen overflow-y-auto transition-all duration-300 z-50 -translate-x-full lg:translate-x-0 flex-shrink-0" id="sidebar">
        <div class="sidebar-header p-8 border-b border-white border-opacity-10 text-center relative">
            <img src="<?= base_url('logo/' . $web['logo']) ?>" alt="Logo BUMDes" class="w-16 h-16 rounded-full border-2 border-white mx-auto mb-4">
            <!-- <h3 class="text-lg font-semibold mb-1"><?= $user['nama'] ?? 'Nama User' ?></h3>
            <p class="text-sm text-white text-opacity-80"><?= ucfirst($user['role'] ?? 'Role') ?></p> -->
            <button class="close-sidebar absolute top-4 right-4 bg-transparent border-none text-white text-xl cursor-pointer lg:hidden" id="closeSidebar">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <!-- Menu dengan UL-LI -->
        <nav class="sidebar-menu py-5">
            <ul class="space-y-2">
                <li>
                    <a href="<?= base_url('bumdes/beranda') ?>" class="menu-item flex items-center px-6 py-3 text-white no-underline transition-all duration-300 border-l-4 border-transparent hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah <?= $active_menu === 'beranda' ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                        <i class="fas fa-tachometer-alt w-5 text-center mr-3"></i>
                        <span class="flex-1">Beranda</span>
                    </a>
                </li>
                
            <!-- UNIT USAHA -->
            <li>
                <a href="<?= base_url('bumdes/unitusaha') ?>" 
                class="menu-item flex items-center px-6 py-3 text-white 
                        no-underline transition-all duration-300 
                        border-l-4 border-transparent 
                        hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah
                        <?= $active_menu === 'unitusaha' ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                    <i class="fas fa-store w-5 text-center mr-3"></i>
                    <span class="flex-1">Unit Usaha</span>
                </a>
            </li>

            <!-- PRODUK -->
            <li>
                <a href="<?= base_url('bumdes/produk') ?>" 
                class="menu-item flex items-center px-6 py-3 text-white 
                        no-underline transition-all duration-300 
                        border-l-4 border-transparent 
                        hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah
                        <?= $active_menu === 'produk' ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                    <i class="fas fa-box w-5 text-center mr-3"></i>
                    <span class="flex-1">Produk</span>
                </a>
            </li>

            <!-- KATEGORI PRODUK -->
            <li>
                <a href="<?= base_url('bumdes/kategori') ?>" 
                class="menu-item flex items-center px-6 py-3 text-white 
                        no-underline transition-all duration-300 
                        border-l-4 border-transparent 
                        hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah
                        <?= $active_menu === 'kategori' ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                    <i class="fas fa-tags w-5 text-center mr-3"></i>
                    <span class="flex-1">Kategori Produk</span>
                </a>
            </li>

            <!-- LAYANAN / JASA -->
            <li>
                <a href="<?= base_url('bumdes/layanan') ?>" 
                class="menu-item flex items-center px-6 py-3 text-white 
                        no-underline transition-all duration-300 
                        border-l-4 border-transparent 
                        hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah
                        <?= $active_menu === 'layanan' ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                    <i class="fas fa-concierge-bell w-5 text-center mr-3"></i>
                    <span class="flex-1">Layanan / Jasa</span>
                </a>
            </li>

            <!-- TRANSAKSI -->
            <li class="menu-with-submenu">
                <a href="javascript:void(0)" class="menu-item flex items-center justify-between px-6 py-3 text-white no-underline transition-all duration-300 border-l-4 border-transparent hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah <?= in_array($active_menu, ['transaksi', 'kategoritransaksi']) ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                    <div class="flex items-center">
                        <i class="fas fa-exchange-alt w-5 text-center mr-3"></i>
                        <span class="flex-1">Transaksi</span>
                    </div>
                    <i class="fas fa-chevron-down text-sm transition-transform duration-300"></i>
                </a>
                <ul class="submenu pl-14 mt-1 space-y-1 hidden">
                    <li>
                        <a href="<?= base_url('bumdes/transaksi') ?>" class="block px-3 py-2 text-white text-opacity-80 no-underline transition-all duration-300 hover:bg-white hover:bg-opacity-10 hover:text-opacity-100 rounded">Transaksi Keuangan</a>
                    </li>
                    <li>
                        <a href="<?= base_url('bumdes/kategoritransaksi') ?>" class="block px-3 py-2 text-white text-opacity-80 no-underline transition-all duration-300 hover:bg-white hover:bg-opacity-10 hover:text-opacity-100 rounded">Kategori Transaksi</a>
                    </li>
                </ul>
            </li>

                <li>
                    <a href="<?= base_url('bumdes/laporan') ?>" class="menu-item flex items-center px-6 py-3 text-white no-underline transition-all duration-300 border-l-4 border-transparent hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah <?= $active_menu === 'laporan' ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                        <i class="fas fa-chart-bar w-5 text-center mr-3"></i>
                        <span class="flex-1">Laporan</span>
                    </a>
                </li>

                <!-- SHU -->
                <li>
                    <a href="<?= base_url('bumdes/shu') ?>" class="menu-item flex items-center px-6 py-3 text-white no-underline transition-all duration-300 border-l-4 border-transparent hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah <?= $active_menu === 'shu' ? 'bg-white bg-opacity-10 border-biru-cerah' : '' ?>">
                        <i class="fas fa-percentage w-5 text-center mr-3"></i>
                        <span class="flex-1">Pengaturan SHU</span>
                    </a>
                </li>
                
                <!-- Menu dengan submenu contoh -->
                <li class="menu-with-submenu">
                    <a href="javascript:void(0)" class="menu-item flex items-center justify-between px-6 py-3 text-white no-underline transition-all duration-300 border-l-4 border-transparent hover:bg-white hover:bg-opacity-10 hover:border-biru-cerah">
                        <div class="flex items-center">
                            <i class="fas fa-cog w-5 text-center mr-3"></i>
                            <span class="flex-1">Pengaturan</span>
                        </div>
                        <i class="fas fa-chevron-down text-sm transition-transform duration-300"></i>
                    </a>
                    <ul class="submenu pl-14 mt-1 space-y-1 hidden">
                        <li>
                            <a href="<?= base_url('bumdes/settings') ?>" class="block px-3 py-2 text-white text-opacity-80 no-underline transition-all duration-300 hover:bg-white hover:bg-opacity-10 hover:text-opacity-100 rounded">
                                Settings
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('bumdes/profile') ?>" class="block px-3 py-2 text-white text-opacity-80 no-underline transition-all duration-300 hover:bg-white hover:bg-opacity-10 hover:text-opacity-100 rounded">
                                Profil Sistem
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('bumdes/user') ?>" class="block px-3 py-2 text-white text-opacity-80 no-underline transition-all duration-300 hover:bg-white hover:bg-opacity-10 hover:text-opacity-100 rounded">
                                Manajemen User
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content flex-1 ml-0 lg:ml-64 transition-all duration-300 min-h-screen min-w-0" id="mainContent">
        <!-- Top Navbar -->
        <div class="top-navbar bg-white px-4 sm:px-6 py-3 shadow-sm sticky top-0 z-30 flex justify-between items-center">
            <div class="nav-left flex items-center gap-3">
                <!-- Hamburger Menu Button -->
                <button class="menu-toggle hamburger bg-transparent border-none text-biru-tua cursor-pointer lg:hidden p-2 flex flex-col justify-center items-center w-8 h-8" id="menuToggle">
                    <span class="hamburger-line bg-biru-tua w-6 h-0.5 mb-1.5"></span>
                    <span class="hamburger-line bg-biru-tua w-6 h-0.5 mb-1.5"></span>
                    <span class="hamburger-line bg-biru-tua w-6 h-0.5"></span>
                </button>
                
                <!-- Logo Mobile -->
                <div class="lg:hidden flex items-center gap-2">
                    <img src="<?= base_url('logo/' . $web['logo']) ?>" alt="Logo BUMDes" class="w-8 h-8 rounded">
                    <h1 class="text-lg font-semibold text-biru-tua">BUMDes</h1>
                </div>
                
                <!-- Judul Halaman (hidden di mobile kecil) -->
                <h1 class="text-lg sm:text-xl lg:text-2xl font-semibold text-biru-tua hidden sm:block"><?php //echo $judul ?></h1>
            </div>
            
            <div class="nav-right flex items-center gap-3 sm:gap-5">
                <!-- User Info -->
                <div class="user-info flex items-center gap-2 sm:gap-3">
                    <div class="user-avatar w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-biru-utama text-white flex items-center justify-center font-semibold text-sm sm:text-base">
                        <?= strtoupper(substr($user['nama'] ?? 'U', 0, 1)) ?>
                    </div>
                    <span class="hidden md:inline text-sm sm:text-base"><?= $user['nama'] ?? 'User' ?></span>
                </div>
                
                <!-- Logout Button -->
                <a href="<?= base_url('auth/logout') ?>" class="logout-btn text-biru-tua px-3 py-2 sm:px-4 sm:py-2 rounded-lg no-underline transition-all duration-300  flex items-center gap-1 sm:gap-2 text-sm sm:text-base">
                    <i class="fas fa-sign-out-alt text-xs sm:text-sm"></i>
                    <span class="hidden sm:inline">Logout</span>
                </a>
            </div>
        </div>

        <!-- Content Area -->
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
            const menuItemsWithSubmenu = document.querySelectorAll('.menu-with-submenu > a');

            // Toggle sidebar
            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                menuToggle.classList.toggle('active');
                sidebarOverlay.classList.toggle('hidden');
                document.body.style.overflow = sidebar.classList.contains('-translate-x-full') ? '' : 'hidden';
            }

            // Event listeners
            menuToggle.addEventListener('click', toggleSidebar);
            closeSidebar.addEventListener('click', toggleSidebar);
            sidebarOverlay.addEventListener('click', toggleSidebar);

            // Close sidebar ketika resize ke desktop
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

            // ESC key untuk close sidebar
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !sidebar.classList.contains('-translate-x-full')) {
                    toggleSidebar();
                }
            });

            // Close sidebar ketika klik di luar sidebar (untuk mobile)
            document.addEventListener('click', function(e) {
                if (window.innerWidth < 1024 && 
                    !sidebar.contains(e.target) && 
                    !menuToggle.contains(e.target) && 
                    !sidebar.classList.contains('-translate-x-full')) {
                    toggleSidebar();
                }
            });

            menuItemsWithSubmenu.forEach(menuItem => {
                menuItem.addEventListener('click', function(e) {
                    e.preventDefault();
                    const submenu = this.nextElementSibling;
                    const icon = this.querySelector('.fa-chevron-down');
                    
                    // Toggle submenu
                    submenu.classList.toggle('hidden');
                    
                    // Rotate icon
                    icon.classList.toggle('rotate-180');
                    
                    // Close other submenus
                    document.querySelectorAll('.menu-with-submenu > a').forEach(otherMenuItem => {
                        if (otherMenuItem !== this) {
                            const otherSubmenu = otherMenuItem.nextElementSibling;
                            const otherIcon = otherMenuItem.querySelector('.fa-chevron-down');
                            otherSubmenu.classList.add('hidden');
                            otherIcon.classList.remove('rotate-180');
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>