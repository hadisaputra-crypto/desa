<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Inovasi Digital BUMDes' ?></title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS Kustom (Sama seperti sebelumnya) -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #FDFBF8;
            color: #312A21;
        }
        .chart-container {
            position: relative;
            width: 100%;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            height: 300px;
            max-height: 400px;
        }
        @media (min-width: 768px) {
            .chart-container {
                height: 350px;
            }
        }
        .section-title {
            color: #4A4035;
        }
        .active-tab {
            border-bottom-color: #8C6A46;
            color: #8C6A46;
            font-weight: 600;
        }
        .inactive-tab {
            border-bottom-color: transparent;
            color: #7E7162;
        }
        .feature-card {
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }
        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(140, 106, 70, 0.1);
        }
        .active-feature {
            background-color: #F7F2EC;
            border-color: #8C6A46;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -30px;
            top: 5px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #D4BBA2;
            border: 4px solid #FDFBF8;
        }
        .ai-feature-box {
            background-color: #FDFDF2;
            border: 1px solid #D4BBA2;
        }
        .ai-result {
            white-space: pre-wrap;
            min-height: 50px;
        }
        .ai-button {
            background-color: #8C6A46;
            transition: background-color 0.2s;
        }
        .ai-button:hover {
            background-color: #7A5C3D;
        }
        .loader {
            border-top-color: #8C6A46;
            border-left-color: #8C6A46;
        }
    </style>
</head>
<body class="antialiased">

    <!-- HEADER (Bagian yang Dapat Digunakan Kembali) -->
    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 shadow-sm">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-[#4A4035]">
                <a href="<?= base_url('/') ?>">
                    BUMDes<span class="text-[#8C6A46]">Digital</span> Kerinci
                </a>
            </div>
            <!-- NAVIGASI DIPERBARUI UNTUK MULTI-PAGE -->
            <div class="hidden md:flex space-x-8">
                <a href="<?= base_url('/') ?>" class="<?= ($page ?? '') === 'beranda' ? 'text-[#8C6A46] font-semibold' : 'text-gray-600' ?> hover:text-[#8C6A46] transition-colors">Beranda</a>
                <a href="<?= base_url('fitur') ?>" class="<?= ($page ?? '') === 'fitur' ? 'text-[#8C6A46] font-semibold' : 'text-gray-600' ?> hover:text-[#8C6A46] transition-colors">Fitur Platform</a>
                <a href="<?= base_url('dampak') ?>" class="<?= ($page ?? '') === 'dampak' ? 'text-[#8C6A46] font-semibold' : 'text-gray-600' ?> hover:text-[#8C6A46] transition-colors">Dampak</a>
                <a href="<?= base_url('rencana') ?>" class="<?= ($page ?? '') === 'rencana' ? 'text-[#8C6A46] font-semibold' : 'text-gray-600' ?> hover:text-[#8C6A46] transition-colors">Rencana Aksi</a>
                <a href="<?= base_url('login') ?>" class="<?= ($page ?? '') === 'login' ? 'text-[#8C6A46] font-semibold' : 'text-gray-600' ?> hover:text-[#8C6A46] transition-colors">Login</a>
            </div>
        </nav>
    </header>

    <!-- KONTEN DINAMIS (Placeholder) -->
    <?= $this->renderSection('content') ?>

    <!-- FOOTER (Bagian yang Dapat Digunakan Kembali) -->
    <footer class="bg-[#4A4035] text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; <?= date('Y') ?> BUMDes Digital. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <!-- SKRIP SPESIFIK HALAMAN (Placeholder) -->
    <?= $this->renderSection('scripts') ?>

</body>
</html>