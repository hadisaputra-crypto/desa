<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inovasi Digital BUMDes - Fitur Utama</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Chosen Palette: Earthy Harmony -->
    <!-- Application Structure Plan: Struktur diperbarui untuk fokus pada 'Fitur'. 1. Hero Section. 2. Latar Belakang Masalah (ringkas). 3. Fitur Unggulan sebagai inti: Menggunakan sistem Tab (Pilar Utama) dan Sub-Konten Interaktif (Detail Fitur) untuk memungkinkan eksplorasi mendalam, termasuk integrasi fitur LLM. 4. Dampak. 5. Rencana Aksi. Struktur interaktif Tab & Sub-Konten dipilih karena fitur adalah elemen terpenting yang perlu dijelaskan secara rinci tanpa membuat halaman terlalu panjang. Pengguna dapat mengklik pilar dan melihat tiga fitur kunci di bawahnya. -->
    <!-- Visualization & Content Choices: 1. Masalah & Tantangan (Inform): Kartu HTML/CSS. 2. Fitur Utama (Organize/Interact): Tab Interaktif (JS) yang mengaktifkan konten, dan di dalamnya terdapat 3 sub-fitur dengan deskripsi (JS Show/Hide). Ini termasuk dua fitur baru yang didukung Gemini API untuk memberikan nilai tambah AI: Asisten Panen (Edukasi) dan Perumus Deskripsi Produk (Pemasaran). 3. Target Kapasitas & Ekonomi (Compare/Change): Bar Chart & Line Chart (Chart.js). 4. Anggaran (Compare): Doughnut Chart (Chart.js). Semua pilihan ini dibuat untuk meningkatkan keterbacaan dan interaktivitas tanpa menggunakan SVG atau Mermaid. -->
    <!-- CONFIRMATION: NO SVG graphics used. NO Mermaid JS used. -->
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

    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 shadow-sm">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-[#4A4035]">
                BUMDes<span class="text-[#8C6A46]">Digital</span> Kerinci
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="#beranda" class="text-gray-600 hover:text-[#8C6A46] transition-colors">Beranda</a>
                <a href="#fitur" class="text-[#8C6A46] font-semibold transition-colors">Fitur Platform</a>
                <a href="#dampak" class="text-gray-600 hover:text-[#8C6A46] transition-colors">Dampak</a>
                <a href="#rencana" class="text-gray-600 hover:text-[#8C6A46] transition-colors">Rencana Aksi</a>
            </div>
        </nav>
    </header>

    <main>
        <section id="beranda" class="pt-20 pb-12 md:pb-20 bg-[#F7F2EC]">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-3xl md:text-5xl font-bold section-title mb-4 leading-tight">Inovasi Digital BUMDes: Platform Terintegrasi</h1>
                <p class="text-lg md:text-xl text-gray-700 max-w-3xl mx-auto">Solusi lengkap yang menghubungkan edukasi modern, pemasaran digital, dan pendampingan ahli untuk memperkuat BUMDes dan petani Kerinci.</p>
            </div>
        </section>

        <section id="masalah" class="py-16">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold section-title">Masalah yang Kami Atasi</h2>
                    <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Meningkatkan akses pasar, literasi digital, dan kualitas hasil panen melalui teknologi.</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 text-center">
                        <span class="text-3xl mb-2 block">&#x1F4B8;</span>
                        <h3 class="font-semibold text-lg text-[#4A4035] mb-2">Harga Jual Rendah</h3>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 text-center">
                         <span class="text-3xl mb-2 block">&#x1F4BB;</span>
                        <h3 class="font-semibold text-lg text-[#4A4035] mb-2">Gap Digital</h3>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 text-center">
                        <span class="text-3xl mb-2 block">&#x1F33E;</span>
                        <h3 class="font-semibold text-lg text-[#4A4035] mb-2">Kualitas Panen Tidak Optimal</h3>
                    </div>
                </div>
            </div>
        </section>

        <section id="fitur" class="py-16 bg-[#F7F2EC]">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold section-title">Fitur Unggulan Platform & Asisten AI</h2>
                    <p class="text-gray-600 mt-2 max-w-3xl mx-auto">Jelajahi tiga pilar utama dan fitur yang kami tingkatkan dengan Kecerdasan Buatan dari Gemini.</p>
                </div>
                
                <!-- Tab Navigasi Pilar Utama -->
                <div class="flex justify-center border-b border-gray-300 mb-8 sticky top-20 bg-[#F7F2EC] pt-4 z-40">
                    <button id="tab-edukasi" class="tab-button px-4 md:px-8 py-3 border-b-2 active-tab transition-all">Pilar 1: Edukasi &#x1F4DA;</button>
                    <button id="tab-pemasaran" class="tab-button px-4 md:px-8 py-3 border-b-2 inactive-tab transition-all">Pilar 2: Pemasaran &#x1F6CD;</button>
                    <button id="tab-pendampingan" class="tab-button px-4 md:px-8 py-3 border-b-2 inactive-tab transition-all">Pilar 3: Pendampingan &#x1F91D;</button>
                </div>

                <!-- Konten Pilar Edukasi -->
                <div id="content-edukasi" class="tab-content">
                    <h3 class="text-2xl font-bold text-[#8C6A46] mb-6 text-center">Edukasi Digital & Kapasitas SDM</h3>
                    <p class="text-gray-600 mb-8 text-center max-w-4xl mx-auto">Fokus pada peningkatan literasi digital, teknik pertanian, dan manajemen bisnis melalui konten yang relevan dan mudah diakses.</p>
                    <div class="grid md:grid-cols-4 gap-6">
                        <div id="feat-edukasi-1" class="feature-card bg-white p-6 rounded-xl shadow-md border border-gray-200 active-feature" onclick="showFeatureDetail('edukasi', 1)">
                            <div class="text-3xl mb-2">📚</div>
                            <h4 class="font-semibold text-lg text-[#4A4035]">Modul Video Interaktif</h4>
                        </div>
                        <div id="feat-edukasi-2" class="feature-card bg-white p-6 rounded-xl shadow-md border border-gray-200" onclick="showFeatureDetail('edukasi', 2)">
                            <div class="text-3xl mb-2">📊</div>
                            <h4 class="font-semibold text-lg text-[#4A4035]">Pelatihan Keuangan BUMDes</h4>
                        </div>
                        <div id="feat-edukasi-3" class="feature-card bg-white p-6 rounded-xl shadow-md border border-gray-200" onclick="showFeatureDetail('edukasi', 3)">
                            <div class="text-3xl mb-2">⭐</div>
                            <h4 class="font-semibold text-lg text-[#4A4035]">Sertifikasi Digital Petani</h4>
                        </div>
                        <div id="feat-edukasi-4" class="feature-card bg-white p-6 rounded-xl shadow-md border border-gray-200" onclick="showFeatureDetail('edukasi', 4)">
                            <div class="text-3xl mb-2">✨</div>
                            <h4 class="font-semibold text-lg text-[#4A4035]">Asisten Panen AI</h4>
                        </div>
                    </div>
                    <!-- Detail Konten Edukasi (Hanya satu yang aktif) -->
                    <div id="detail-edukasi-1" class="feature-detail bg-white mt-8 p-8 rounded-xl border-l-4 border-[#8C6A46] shadow-lg">
                        <h4 class="font-bold text-xl text-[#4A4035] mb-2">📚 Modul Video Interaktif</h4>
                        <p class="text-gray-700">Menyediakan serangkaian video tutorial singkat mengenai teknik budidaya unggulan Kerinci, manajemen hama terpadu (PHT), dan praktik pasca-panen. Konten dapat diakses secara offline setelah diunduh.</p>
                    </div>
                    <div id="detail-edukasi-2" class="feature-detail bg-white mt-8 p-8 rounded-xl border-l-4 border-[#8C6A46] shadow-lg hidden">
                        <h4 class="font-bold text-xl text-[#4A4035] mb-2">📊 Pelatihan Keuangan BUMDes</h4>
                        <p class="text-gray-700">Materi dan *template* pencatatan keuangan sederhana berbasis digital. Fitur ini membantu BUMDes dalam membuat laporan laba rugi dasar, mengelola inventaris produk, dan menghitung bagi hasil secara transparan.</p>
                    </div>
                    <div id="detail-edukasi-3" class="feature-detail bg-white mt-8 p-8 rounded-xl border-l-4 border-[#8C6A46] shadow-lg hidden">
                        <h4 class="font-bold text-xl text-[#4A4035] mb-2">⭐ Sertifikasi Digital Petani</h4>
                        <p class="text-gray-700">Setelah menyelesaikan modul tertentu, petani akan mendapatkan lencana atau sertifikat digital yang dapat digunakan untuk meningkatkan kredibilitas produk mereka di pasar digital (integrasi dengan fitur pemasaran).</p>
                    </div>
                    <div id="detail-edukasi-4" class="feature-detail ai-feature-box mt-8 p-8 rounded-xl border-l-4 border-[#8C6A46] shadow-lg hidden">
                        <h4 class="font-bold text-xl text-[#4A4035] mb-4">✨ Asisten Panen AI (Didukung Gemini)</h4>
                        <p class="text-gray-700 mb-4">Asisten virtual yang memberikan saran cepat dan tepat mengenai masalah pertanian spesifik Anda, seperti identifikasi hama atau langkah penanganan penyakit tanaman. Pertanyaan akan dijawab berdasarkan data ilmiah dan praktik terbaik.</p>
                        
                        <div class="flex flex-col md:flex-row gap-4">
                            <input type="text" id="panen-input" placeholder="Contoh: Mengapa daun kopi saya menguning dan bagaimana cara mengatasinya?" class="flex-grow p-3 border border-gray-300 rounded-lg focus:ring-[#8C6A46] focus:border-[#8C6A46] text-sm">
                            <button id="panen-button" class="ai-button text-white px-6 py-3 rounded-lg font-semibold flex items-center justify-center">
                                Tanya Asisten &#x2728;
                            </button>
                        </div>
                        <div class="mt-4 p-4 bg-white rounded-lg border border-gray-200">
                            <h5 class="font-semibold text-sm mb-2 text-[#4A4035]">Jawaban AI:</h5>
                            <div id="panen-result" class="ai-result text-sm text-gray-800 italic">
                                Hasil akan muncul di sini...
                            </div>
                            <div id="panen-loading" class="hidden flex items-center justify-center pt-2">
                                <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-6 w-6 animate-spin"></div>
                                <span class="ml-3 text-sm text-gray-500">Mencari solusi...</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Konten Pilar Pemasaran (Hidden by Default) -->
                <div id="content-pemasaran" class="tab-content hidden">
                    <h3 class="text-2xl font-bold text-[#8C6A46] mb-6 text-center">Marketplace & Integrasi Logistik</h3>
                    <p class="text-gray-600 mb-8 text-center max-w-4xl mx-auto">Membuka akses pasar yang lebih luas dan efisien, memotong rantai pasok yang panjang, dan memberikan harga yang lebih adil bagi petani.</p>
                    <div class="grid md:grid-cols-4 gap-6">
                        <div id="feat-pemasaran-1" class="feature-card bg-white p-6 rounded-xl shadow-md border border-gray-200 active-feature" onclick="showFeatureDetail('pemasaran', 1)">
                            <div class="text-3xl mb-2">🛒</div>
                            <h4 class="font-semibold text-lg text-[#4A4035]">E-Commerce B2B/B2C</h4>
                        </div>
                        <div id="feat-pemasaran-2" class="feature-card bg-white p-6 rounded-xl shadow-md border border-gray-200" onclick="showFeatureDetail('pemasaran', 2)">
                            <div class="text-3xl mb-2">📈</div>
                            <h4 class="font-semibold text-lg text-[#4A4035]">Info Harga Real-Time</h4>
                        </div>
                        <div id="feat-pemasaran-3" class="feature-card bg-white p-6 rounded-xl shadow-md border border-gray-200" onclick="showFeatureDetail('pemasaran', 3)">
                            <div class="text-3xl mb-2">🚚</div>
                            <h4 class="font-semibold text-lg text-[#4A4035]">Manajemen Pengiriman</h4>
                        </div>
                         <div id="feat-pemasaran-4" class="feature-card bg-white p-6 rounded-xl shadow-md border border-gray-200" onclick="showFeatureDetail('pemasaran', 4)">
                            <div class="text-3xl mb-2">📝</div>
                            <h4 class="font-semibold text-lg text-[#4A4035]">Perumus Deskripsi Produk ✨</h4>
                        </div>
                    </div>
                    <!-- Detail Konten Pemasaran -->
                    <div id="detail-pemasaran-1" class="feature-detail bg-white mt-8 p-8 rounded-xl border-l-4 border-[#8C6A46] shadow-lg">
                        <h4 class="font-bold text-xl text-[#4A4035] mb-2">🛒 E-Commerce B2B/B2C</h4>
                        <p class="text-gray-700">Layanan toko digital bagi BUMDes untuk menjual produk pertanian dan olahan langsung ke konsumen (B2C) atau ke bisnis besar (B2B) seperti hotel, restoran, dan distributor di luar Kerinci.</p>
                    </div>
                    <div id="detail-pemasaran-2" class="feature-detail bg-white mt-8 p-8 rounded-xl border-l-4 border-[#8C6A46] shadow-lg hidden">
                        <h4 class="font-bold text-xl text-[#4A4035] mb-2">📈 Info Harga Real-Time</h4>
                        <p class="text-gray-700">Fitur dasbor yang menampilkan tren harga komoditas utama (misalnya kopi, sayuran) di pasar lokal dan nasional, membantu petani dan BUMDes menentukan harga jual yang kompetitif dan menguntungkan.</p>
                    </div>
                    <div id="detail-pemasaran-3" class="feature-detail bg-white mt-8 p-8 rounded-xl border-l-4 border-[#8C6A46] shadow-lg hidden">
                        <h4 class="font-bold text-xl text-[#4A4035] mb-2">🚚 Manajemen Pengiriman</h4>
                        <p class="text-gray-700">Integrasi API dengan penyedia logistik lokal dan nasional. BUMDes dapat melacak status pengiriman, menghitung biaya kirim otomatis, dan mengelola pesanan dalam satu tempat.</p>
                    </div>
                    <div id="detail-pemasaran-4" class="feature-detail ai-feature-box mt-8 p-8 rounded-xl border-l-4 border-[#8C6A46] shadow-lg hidden">
                        <h4 class="font-bold text-xl text-[#4A4035] mb-4">📝 Perumus Deskripsi Produk ✨ (Didukung Gemini)</h4>
                        <p class="text-gray-700 mb-4">Ubah poin-poin sederhana tentang produk Anda menjadi deskripsi yang menarik dan persuasif untuk *e-commerce*. Cukup masukkan detail produk, dan AI akan merumuskan drafnya.</p>
                        
                        <div class="flex flex-col gap-4">
                            <textarea id="deskripsi-input" placeholder="Contoh: Kopi Arabika Kerinci. Tanam di ketinggian 1600 mdpl. Proses wine. Rasa manis, sedikit asam buah. Dipanen petani Desa Kayo Aro." rows="4" class="p-3 border border-gray-300 rounded-lg focus:ring-[#8C6A46] focus:border-[#8C6A46] text-sm"></textarea>
                            <button id="deskripsi-button" class="ai-button text-white px-6 py-3 rounded-lg font-semibold flex items-center justify-center">
                                Rumuskan Deskripsi &#x2728;
                            </button>
                        </div>
                        <div class="mt-4 p-4 bg-white rounded-lg border border-gray-200">
                            <h5 class="font-semibold text-sm mb-2 text-[#4A4035]">Hasil Rumusan AI:</h5>
                            <div id="deskripsi-result" class="ai-result text-sm text-gray-800 italic">
                                Hasil akan muncul di sini...
                            </div>
                            <div id="deskripsi-loading" class="hidden flex items-center justify-center pt-2">
                                <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-6 w-6 animate-spin"></div>
                                <span class="ml-3 text-sm text-gray-500">Merumuskan deskripsi...</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Konten Pilar Pendampingan (Hidden by Default) -->
                <div id="content-pendampingan" class="tab-content hidden">
                    <h3 class="text-2xl font-bold text-[#8C6A46] mb-6 text-center">Pendampingan Ahli & Komunitas Berbagi</h3>
                    <p class="text-gray-600 mb-8 text-center max-w-4xl mx-auto">Menyediakan dukungan teknis langsung dari ahli dan membangun jejaring antar-desa untuk berbagi pengetahuan dan sumber daya.</p>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div id="feat-pendampingan-1" class="feature-card bg-white p-6 rounded-xl shadow-md border border-gray-200 active-feature" onclick="showFeatureDetail('pendampingan', 1)">
                            <div class="text-3xl mb-2">💬</div>
                            <h4 class="font-semibold text-lg text-[#4A4035]">Forum Komunitas Desa</h4>
                        </div>
                        <div id="feat-pendampingan-2" class="feature-card bg-white p-6 rounded-xl shadow-md border border-gray-200" onclick="showFeatureDetail('pendampingan', 2)">
                            <div class="text-3xl mb-2">🧑‍🌾</div>
                            <h4 class="font-semibold text-lg text-[#4A4035]">Konsultasi Video Ahli</h4>
                        </div>
                        <div id="feat-pendampingan-3" class="feature-card bg-white p-6 rounded-xl shadow-md border border-gray-200" onclick="showFeatureDetail('pendampingan', 3)">
                            <div class="text-3xl mb-2">📍</div>
                            <h4 class="font-semibold text-lg text-[#4A4035]">Peta Sebaran Produk</h4>
                        </div>
                    </div>
                    <!-- Detail Konten Pendampingan -->
                    <div id="detail-pendampingan-1" class="feature-detail bg-white mt-8 p-8 rounded-xl border-l-4 border-[#8C6A46] shadow-lg">
                        <h4 class="font-bold text-xl text-[#4A4035] mb-2">💬 Forum Komunitas Desa</h4>
                        <p class="text-gray-700">Ruang diskusi online terorganisir per desa atau per jenis komoditas. Memungkinkan petani untuk cepat berbagi informasi tentang cuaca, hama, atau kebutuhan benih, memupuk kolaborasi antar-petani di Kerinci.</p>
                    </div>
                    <div id="detail-pendampingan-2" class="feature-detail bg-white mt-8 p-8 rounded-xl border-l-4 border-[#8C6A46] shadow-lg hidden">
                        <h4 class="font-bold text-xl text-[#4A4035] mb-2">🧑‍🌾 Konsultasi Video Ahli</h4>
                        <p class="text-gray-700">Fasilitas penjadwalan sesi konsultasi 1-on-1 dengan akademisi atau penyuluh pertanian secara virtual. Fitur ini memungkinkan diagnosis masalah pertanian secara real-time dan pemberian solusi yang terpersonalisasi.</p>
                    </div>
                    <div id="detail-pendampingan-3" class="feature-detail bg-white mt-8 p-8 rounded-xl border-l-4 border-[#8C6A46] shadow-lg hidden">
                        <h4 class="font-bold text-xl text-[#4A4035] mb-2">📍 Peta Sebaran Produk</h4>
                        <p class="text-gray-700">Peta interaktif berbasis lokasi yang menunjukkan konsentrasi BUMDes dan jenis produk unggulan di Kabupaten Kerinci, mempermudah pembeli besar untuk melakukan pencarian sumber daya.</p>
                    </div>
                </div>

            </div>
        </section>
        
        <section id="dampak" class="py-16">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold section-title">Dampak & Proyeksi</h2>
                    <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Indikator kinerja yang ditargetkan setelah implementasi platform selama satu tahun.</p>
                </div>

                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
                        <h3 class="text-xl font-semibold text-center mb-4 text-[#4A4035]">Peningkatan Kapasitas SDM (%)</h3>
                        <div class="chart-container">
                            <canvas id="kapasitasChart"></canvas>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
                        <h3 class="text-xl font-semibold text-center mb-4 text-[#4A4035]">Proyeksi Pertumbuhan Ekonomi Desa</h3>
                        <div class="chart-container">
                            <canvas id="ekonomiChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="rencana" class="py-16 bg-[#F7F2EC]">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold section-title">Rencana Aksi dan Anggaran</h2>
                    <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Detail linimasa implementasi dan alokasi dana.</p>
                </div>

                <div class="grid lg:grid-cols-5 gap-12">
                    <div class="lg:col-span-3">
                        <h3 class="text-xl font-semibold mb-6 text-[#4A4035]">Linimasa Kegiatan (1 Tahun)</h3>
                        <div class="relative border-l-2 border-dashed border-[#D4BBA2] pl-8">
                            <div class="timeline-item mb-8">
                                <h4 class="font-semibold text-lg">Bulan 1-3: Riset & Perancangan</h4>
                            </div>
                            <div class="timeline-item mb-8">
                                <h4 class="font-semibold text-lg">Bulan 4-7: Pengembangan Platform</h4>
                            </div>
                            <div class="timeline-item mb-8">
                                <h4 class="font-semibold text-lg">Bulan 8-10: Uji Coba & Pelatihan</h4>
                            </div>
                            <div class="timeline-item">
                                <h4 class="font-semibold text-lg">Bulan 11-12: Evaluasi & Pelaporan</h4>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-2">
                        <h3 class="text-xl font-semibold text-center mb-6 text-[#4A4035]">Alokasi Anggaran</h3>
                        <div class="chart-container" style="height: 320px; max-height: 350px;">
                            <canvas id="anggaranChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <footer class="bg-[#4A4035] text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2025 BUMDes Digital. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script>
        // --- API Keys dan URL ---
        const apiKey = ""; 
        const apiUrl = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-05-20:generateContent?key=${apiKey}`;

        // --- Fungsi Pembantu (Exponential Backoff) ---
        async function fetchWithRetry(url, options, maxRetries = 5) {
            for (let i = 0; i < maxRetries; i++) {
                try {
                    const response = await fetch(url, options);
                    if (response.status === 429 && i < maxRetries - 1) {
                        const delay = Math.pow(2, i) * 1000;
                        await new Promise(resolve => setTimeout(resolve, delay));
                        continue;
                    }
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response;
                } catch (error) {
                    if (i === maxRetries - 1) throw error;
                }
            }
        }

        // --- Logika Asisten Panen (Pilar Edukasi) ---
        async function handlePanenQuery() {
            const inputElement = document.getElementById('panen-input');
            const resultElement = document.getElementById('panen-result');
            const loadingElement = document.getElementById('panen-loading');
            const query = inputElement.value.trim();

            if (query === "") {
                resultElement.innerHTML = "Mohon masukkan pertanyaan tentang masalah tanaman Anda.";
                return;
            }

            loadingElement.classList.remove('hidden');
            resultElement.innerHTML = ""; 

            const systemPrompt = "Anda adalah Asisten Ahli Pertanian untuk petani Kerinci, Indonesia. Jawab pertanyaan tentang hama, penyakit, dan budidaya tanaman dengan solusi yang praktis dan mudah dipahami, gunakan bahasa Indonesia yang sopan dan lugas. Sertakan langkah-langkah penanganan yang jelas dan ringkas. Jangan membuat informasi jika tidak yakin.";
            
            const payload = {
                contents: [{ parts: [{ text: query }] }],
                tools: [{ "google_search": {} }],
                systemInstruction: {
                    parts: [{ text: systemPrompt }]
                }
            };

            try {
                const response = await fetchWithRetry(apiUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                });
                
                const result = await response.json();
                const text = result.candidates?.[0]?.content?.parts?.[0]?.text || "Maaf, Asisten tidak dapat menemukan jawaban untuk pertanyaan tersebut saat ini. Coba pertanyaan lain.";
                resultElement.innerHTML = text;
            
            } catch (error) {
                console.error("Gemini API Error:", error);
                resultElement.innerHTML = "Terjadi kesalahan saat menghubungi Asisten AI. Mohon coba lagi.";
            } finally {
                loadingElement.classList.add('hidden');
            }
        }

        // --- Logika Perumus Deskripsi Produk (Pilar Pemasaran) ---
        async function handleDeskripsiRumusan() {
            const inputElement = document.getElementById('deskripsi-input');
            const resultElement = document.getElementById('deskripsi-result');
            const loadingElement = document.getElementById('deskripsi-loading');
            const details = inputElement.value.trim();

            if (details === "") {
                resultElement.innerHTML = "Mohon masukkan detail produk (nama, asal, keunikan, rasa).";
                return;
            }

            loadingElement.classList.remove('hidden');
            resultElement.innerHTML = ""; 

            const systemPrompt = "Anda adalah copywriter pemasaran profesional. Buat deskripsi produk e-commerce yang sangat menarik dan persuasif dalam Bahasa Indonesia. Gunakan gaya naratif yang menonjolkan keunikan lokal dan kualitas produk. Output harus dalam bentuk satu paragraf, maksimal 4 kalimat, sangat ringkas dan menjual. Jangan tambahkan judul atau tanda bintang di hasil akhir.";
            const userQuery = `Buatkan deskripsi produk berdasarkan detail berikut: ${details}`;

            const payload = {
                contents: [{ parts: [{ text: userQuery }] }],
                tools: [{ "google_search": {} }],
                systemInstruction: {
                    parts: [{ text: systemPrompt }]
                }
            };

            try {
                const response = await fetchWithRetry(apiUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                });
                
                const result = await response.json();
                const text = result.candidates?.[0]?.content?.parts?.[0]?.text || "Maaf, AI gagal merumuskan deskripsi. Coba detail produk yang berbeda.";
                resultElement.innerHTML = text;
            
            } catch (error) {
                console.error("Gemini API Error:", error);
                resultElement.innerHTML = "Terjadi kesalahan saat menghubungi Asisten AI. Mohon coba lagi.";
            } finally {
                loadingElement.classList.add('hidden');
            }
        }

        // --- Logika Navigasi & Tampilan ---
        function showFeatureDetail(pilar, index) {
            const pilarId = `#content-${pilar}`;
            // 4 fitur di Edukasi/Pemasaran, 3 di Pendampingan. Kita pakai querySelectorAll.
            const featureCards = document.querySelectorAll(`${pilarId} .feature-card`);
            const featureDetails = document.querySelectorAll(`${pilarId} .feature-detail`);
            const targetDetailId = `detail-${pilar}-${index}`;
            const targetCardId = `feat-${pilar}-${index}`;

            featureDetails.forEach(detail => detail.classList.add('hidden'));
            const targetDetail = document.getElementById(targetDetailId);
            if (targetDetail) {
                targetDetail.classList.remove('hidden');
            }

            featureCards.forEach(card => card.classList.remove('active-feature'));
            const targetCard = document.getElementById(targetCardId);
            if (targetCard) {
                targetCard.classList.add('active-feature');
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Event Listeners untuk Fitur AI
            document.getElementById('panen-button').addEventListener('click', handlePanenQuery);
            document.getElementById('deskripsi-button').addEventListener('click', handleDeskripsiRumusan);
            
            // Inisialisasi Chart (Kode Chart.js, sama seperti sebelumnya)
            const chartFontColor = '#312A21';

            const kapasitasData = {
                labels: ['Literasi Digital', 'Manajemen Keuangan', 'Teknik Pasca-Panen', 'Akses Pemasaran'],
                datasets: [
                    { label: 'Sebelum', data: [25, 30, 20, 15], backgroundColor: '#D4BBA2', borderColor: '#C8A988', borderWidth: 1 },
                    { label: 'Target Sesudah', data: [75, 70, 65, 60], backgroundColor: '#8C6A46', borderColor: '#7A5C3D', borderWidth: 1 }
                ]
            };
            const kapasitasCtx = document.getElementById('kapasitasChart').getContext('2d');
            new Chart(kapasitasCtx, {
                type: 'bar', data: kapasitasData,
                options: {
                    responsive: true, maintainAspectRatio: false,
                    plugins: { legend: { position: 'bottom', labels: { color: chartFontColor } }, tooltip: { callbacks: { label: (context) => `${context.dataset.label}: ${context.raw}%` } } },
                    scales: { y: { beginAtZero: true, max: 100, ticks: { color: chartFontColor, callback: (value) => value + '%' }, grid: { color: '#EAE5E0' } }, x: { ticks: { color: chartFontColor }, grid: { display: false } } }
                }
            });

            const ekonomiData = {
                labels: ['Tahun 0', 'Tahun 1', 'Tahun 2 (Proyeksi)', 'Tahun 3 (Proyeksi)'],
                datasets: [{ label: 'Rata-rata Pendapatan BUMDes (Juta Rp)', data: [120, 125, 150, 185], fill: true, backgroundColor: 'rgba(140, 106, 70, 0.2)', borderColor: '#8C6A46', tension: 0.3 }]
            };
            const ekonomiCtx = document.getElementById('ekonomiChart').getContext('2d');
            new Chart(ekonomiCtx, {
                type: 'line', data: ekonomiData,
                options: {
                    responsive: true, maintainAspectRatio: false,
                     plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true, ticks: { color: chartFontColor }, grid: { color: '#EAE5E0' } }, x: { ticks: { color: chartFontColor }, grid: { display: false } } }
                }
            });

            const anggaranData = {
                labels: ['Pengembangan Sistem', 'Riset & Analisis', 'Pelatihan & Sosialisasi', 'Publikasi & Laporan'],
                datasets: [{
                    label: 'Alokasi Dana', data: [20000000, 10000000, 15000000, 5000000],
                    backgroundColor: ['#8C6A46', '#A88F72', '#C4B39E', '#D4BBA2'], hoverOffset: 4
                }]
            };
            const anggaranCtx = document.getElementById('anggaranChart').getContext('2d');
            new Chart(anggaranCtx, {
                type: 'doughnut', data: anggaranData,
                options: {
                    responsive: true, maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { color: chartFontColor } },
                        tooltip: {
                            callbacks: {
                                label: (context) => {
                                    let label = context.label || '';
                                    if (label) { label += ': '; }
                                    if (context.parsed !== null) {
                                        label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(context.parsed);
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });

            // Logika Navigasi Pilar Utama
            const tabs = document.querySelectorAll('.tab-button');
            const contents = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const pilar = tab.id.replace('tab-', '');
                    const targetContentId = `content-${pilar}`;
                    
                    tabs.forEach(t => {
                        t.classList.remove('active-tab');
                        t.classList.add('inactive-tab');
                    });
                    tab.classList.add('active-tab');
                    tab.classList.remove('inactive-tab');

                    contents.forEach(content => {
                        if (content.id === targetContentId) {
                            content.classList.remove('hidden');
                            // Reset state sub-fitur saat ganti pilar
                            showFeatureDetail(pilar, 1);
                        } else {
                            content.classList.add('hidden');
                        }
                    });
                });
            });

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
            
            // Pastikan tab Edukasi aktif saat dimuat
            showFeatureDetail('edukasi', 1);
        });
    </script>
</body>
</html>