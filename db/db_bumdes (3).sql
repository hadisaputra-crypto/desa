-- phpMyAdmin SQL Dump
-- version 5.2.2deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Apr 2026 pada 08.33
-- Versi server: 11.4.7-MariaDB-0ubuntu0.25.04.1
-- Versi PHP: 8.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bumdes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_agenda`
--

CREATE TABLE `tbl_agenda` (
  `id_agenda` int(11) NOT NULL,
  `nama_agenda` varchar(100) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `isi_agenda` longtext DEFAULT NULL,
  `cover_agenda` varchar(255) DEFAULT NULL,
  `tgl_post` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_agenda`
--

INSERT INTO `tbl_agenda` (`id_agenda`, `nama_agenda`, `tgl_mulai`, `tgl_selesai`, `lokasi`, `isi_agenda`, `cover_agenda`, `tgl_post`) VALUES
(17, 'Rapat Koordinasi BUMDes & UMKM', '2026-05-05', '2026-05-05', 'Aula Balai Desa Kerinci', '<p>Pertemuan rutin untuk mensinergikan program kerja BUMDes dengan para pelaku UMKM lokal guna meningkatkan daya saing produk desa.</p>', 'festival_kerinci.jpg', '2026-04-30'),
(18, 'Pelatihan Pembukuan Keuangan Digital', '2026-05-12', '2026-05-13', 'Sentra Kuliner BUMDes', '<p>Pelatihan intensif penggunaan aplikasi keuangan digital untuk mempermudah pelaporan dan transparansi pengelolaan dana usaha desa.</p>', 'kayu_manis_news.jpg', '2026-04-30'),
(19, 'Pesta Rakyat & Bazar Produk Unggulan', '2026-05-20', '2026-05-22', 'Lapangan Hijau Desa', '<p>Kegiatan tahunan yang menampilkan berbagai produk unggulan desa, mulai dari kerajinan tangan hingga olahan makanan khas Kerinci.</p>', 'kopi_kerinci_news.jpg', '2026-04-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_album`
--

CREATE TABLE `tbl_album` (
  `id_album` int(11) NOT NULL,
  `nama_album` varchar(255) DEFAULT NULL,
  `cover_album` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_album`
--

INSERT INTO `tbl_album` (`id_album`, `nama_album`, `cover_album`) VALUES
(2, 'Jalan Sehat', '700x500.jpg'),
(3, 'Judul Album', '700x500.jpg'),
(4, 'Rapat', '700x500.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_bumdes` int(11) NOT NULL,
  `nama_anggota` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NOT NULL,
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `no_hp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `jenis_usaha` varchar(255) DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `id_bumdes`, `nama_anggota`, `nik`, `jenis_kelamin`, `jabatan`, `alamat`, `no_hp`, `email`, `jenis_usaha`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Samsul Bahri', NULL, 'L', NULL, 'Dusun 1, Sukamaju', '081233445566', NULL, 'Petani Padi', NULL, 1, '2025-12-10 16:01:27', '2025-12-10 16:01:27'),
(2, 1, 'Maya Kartika', NULL, 'P', NULL, 'Dusun 2, Sukamaju', '082233445577', NULL, 'Produsen Keripik', NULL, 1, '2025-12-10 16:01:27', '2025-12-10 16:01:27'),
(3, 2, 'Riski Ananda', NULL, 'L', NULL, 'Dusun Timur, Sukamakmur', '083344556688', NULL, 'Pengrajin Rotan', NULL, 1, '2025-12-10 16:01:27', '2025-12-10 16:01:27'),
(4, 3, 'Yulianti', NULL, 'P', NULL, 'RT 03 Bukit Sari', '084455667799', NULL, 'Peternak Ayam', NULL, 1, '2025-12-10 16:01:27', '2025-12-10 16:01:27'),
(5, 3, 'Fajar Setiawan', NULL, 'L', NULL, 'RT 01 Bukit Sari', '085566778899', NULL, 'Pedagang Harian', NULL, 1, '2025-12-10 16:01:27', '2025-12-10 16:01:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_app`
--

CREATE TABLE `tbl_app` (
  `id_app` int(2) NOT NULL,
  `nama_app` varchar(50) DEFAULT NULL,
  `url_app` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_app`
--

INSERT INTO `tbl_app` (`id_app`, `nama_app`, `url_app`) VALUES
(1, 'Jurnal', 'https://jurnal.ananpublisher.com/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `id_kategori_berita` int(2) DEFAULT NULL,
  `judul_berita` varchar(255) DEFAULT NULL,
  `slug_berita` varchar(255) DEFAULT NULL,
  `isi_berita` longtext DEFAULT NULL,
  `cover_berita` varchar(255) DEFAULT NULL,
  `view` int(11) DEFAULT 0,
  `id_user` int(3) DEFAULT NULL,
  `tgl_berita` date DEFAULT NULL,
  `jam_berita` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `id_kategori_berita`, `judul_berita`, `slug_berita`, `isi_berita`, `cover_berita`, `view`, `id_user`, `tgl_berita`, `jam_berita`) VALUES
(227, 12, 'Festival Kerinci 2024: Menampilkan Keindahan Alam dan Budaya Bumi Sakti Alam Kerinci', NULL, '<p>Festival Kerinci kembali digelar tahun ini dengan meriah. Acara yang dipusatkan di kawasan Danau Kerinci ini menampilkan berbagai atraksi budaya, pameran produk UMKM, dan lomba seni tradisional. Festival ini diharapkan dapat meningkatkan kunjungan wisatawan dan memperkenalkan potensi BUMDes Kerinci ke kancah nasional.</p>', 'festival_kerinci.jpg', 126, 1, '2026-04-30', NULL),
(228, 12, 'Kopi Arabika Kerinci Mendapat Sertifikasi Indikasi Geografis, Harga di Tingkat Petani Meningkat', NULL, '<p>Kabar gembira bagi petani kopi di Kerinci. Kopi Arabika Kerinci resmi mendapatkan sertifikasi Indikasi Geografis (IG). Hal ini menegaskan kualitas dan kekhasan kopi asal Kerinci yang tumbuh di lereng Gunung Kerinci. BUMDes di berbagai desa kini mulai fokus pada hilirisasi produk kopi untuk meningkatkan nilai tambah bagi warga.</p>', 'kopi_kerinci_news.jpg', 221, 1, '2026-04-30', NULL),
(229, 12, 'Ekspor Kayu Manis Kerinci Tembus Pasar Eropa Melalui Kemitraan BUMDes', NULL, '<p>Produk Kayu Manis (Cinnamon) asal Kerinci terus memperluas jangkauan pasarnya. Melalui kemitraan strategis antara BUMDes dan eksportir nasional, kayu manis kualitas premium kini mulai rutin dikirim ke pasar Eropa. Langkah ini membuktikan bahwa produk desa mampu bersaing di pasar global jika dikelola dengan profesional.</p>', 'kayu_manis_news.jpg', 185, 1, '2026-04-30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(255) NOT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `slug_buku` varchar(255) DEFAULT NULL,
  `penulis_buku` varchar(255) DEFAULT NULL,
  `deskripsi_buku` text DEFAULT NULL,
  `harga_buku` int(11) DEFAULT NULL,
  `penerbit_buku` varchar(255) DEFAULT NULL,
  `cover_buku` varchar(255) DEFAULT NULL,
  `halaman_buku` int(11) DEFAULT NULL,
  `tgl_terbit` date DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `isbn`, `judul_buku`, `slug_buku`, `penulis_buku`, `deskripsi_buku`, `harga_buku`, `penerbit_buku`, `cover_buku`, `halaman_buku`, `tgl_terbit`, `create_at`, `update_at`) VALUES
(1, '9786230938108', 'Dasar Dasar Sistem Informasi Geografis Berbasis Web', 'Dasar-Dasar-Sistem-Informasi-Geografis-Berbasis-Web', 'Febri Dristyan, Mardalius', 'Buku \"Dasar-Dasar Sistem Informasi Geografis Berbasis Web\" yang membahas tentang dasar Web GIS dengan menggunakan framework CodeIgniter dan library Leaflet adalah sebuah panduan yang menjelaskan bagaimana membangun sistem informasi geografis berbasis web menggunakan teknologi tersebut.\r\n\r\nBuku ini memberikan penjelasan tentang dasar-dasar sistem informasi geografis, termasuk konsep pemetaan, analisis spasial, dan integrasi data geografis. Selain itu, buku ini juga fokus pada penggunaan framework CodeIgniter untuk mengembangkan aplikasi web yang terintegrasi dengan komponen GIS.\r\n\r\nPenggunaan framework CodeIgniter memungkinkan pengembang untuk dengan mudah mengelola aspek backend dari aplikasi web GIS. Buku ini menjelaskan cara mengatur model data, membuat kontroler, dan merancang tampilan menggunakan CodeIgniter.\r\n\r\nSelain itu, buku ini juga memperkenalkan penggunaan library Leaflet, yang merupakan sebuah library JavaScript untuk pemetaan interaktif di web. Anda akan belajar cara menggunakan Leaflet untuk menampilkan peta interaktif, menambahkan lapisan data geografis, dan melakukan interaksi dengan elemen peta.\r\n\r\nBuku ini cocok bagi pembaca yang memiliki pemahaman dasar tentang sistem informasi geografis dan ingin mengembangkan aplikasi web GIS menggunakan framework CodeIgniter dan library Leaflet.', 75000, 'Padang Tekno', '1697178013_92e59874133586c5f4f8.jpg', 113, '2023-05-30', '2023-05-30', '2023-10-09'),
(8, '9786230950278', 'Konsep Dasar Pemodelan Dan Simulasi', 'KONSEP-DASAR-PEMODELAN-DAN-SIMULASI', 'Juna Eska,M.Kom, Zulfitri Yani,M.Kom, Riandana Afira,M.Kom, Devi Gusmita,M.Kom, Febby Kesumaningtyas,M.Kom', 'Pemodelan dan Simulasi adalah metode yang digunakan untuk merepresentasikan suatu sistem atau proses secara abstrak dengan menggunakan model matematis atau komputasi. Tujuan utamanya adalah untuk memahami, menganalisis, dan meramalkan perilaku sistem yang kompleks sebelum mengimplementasikannya di dunia nyata. Dalam konteks ini, kita akan fokus pada pemodelan dan simulasi dalam ilmu komputer dan ilmu teknik. Pemodelan dan simulasi terus berkembang seiring dengan kemajuan teknologi dan kebutuhan untuk mengatasi tantangan dunia nyata. Dengan lebih baiknya teknologi dan metode, mereka berperan penting dalam membantu manusia memahami dan mengatasi masalah yang semakin kompleks di berbagai bidang kehidupan.', 75000, 'Padang Tekno Corp', '1697178013_92e59874133586c5f4f8.jpg', 82, '2023-08-14', '2023-07-31', '2023-08-21'),
(9, '9786230950070', 'Administrasi Jaringan Komputer', 'Administrasi-Jaringan-Komputer', 'Sahren, S.Kom., M.Kom Ruri Ashari Dalimunthe., S.Kom, M.Kom Herman Saputra, S.Kom., M.Kom Irianto, S.Kom., M.Kom', 'Buku \"Administrasi Jaringan Komputer\" merupakan panduan komprehensif yang memberikan wawasan mendalam tentang pengelolaan dan administrasi jaringan komputer secara efisien. Ditujukan kepada para profesional IT, administrator jaringan, dan mahasiswa bidang teknologi informasi, buku ini mengupas berbagai aspek kunci dalam merencanakan, mengkonfigurasi, mengamankan, dan memelihara jaringan komputer yang andal dan berkinerja tinggi.\r\n\r\nDalam buku ini, pembaca akan diarahkan melalui langkah-langkah praktis untuk mengelola infrastruktur jaringan dari awal hingga akhir, termasuk pemilihan perangkat keras, desain topologi, konfigurasi perangkat lunak, pemantauan kinerja, serta tindakan perbaikan dan pencegahan. Penjelasan yang jelas dan ilustrasi visual membantu pembaca memahami konsep-konsep teknis yang kompleks, seperti pengaturan router, firewall, switch, dan perangkat jaringan lainnya.', 75000, 'Padang Tekno Corp', '1697178013_92e59874133586c5f4f8.jpg', 90, '2023-08-28', '2023-08-14', '2023-09-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bumdes`
--

CREATE TABLE `tbl_bumdes` (
  `id_bumdes` int(11) NOT NULL,
  `nama_bumdes` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `desa` varchar(150) DEFAULT NULL,
  `kecamatan` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `kabupaten` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `provinsi` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `no_hp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `website` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `header_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_bumdes`
--

INSERT INTO `tbl_bumdes` (`id_bumdes`, `nama_bumdes`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `no_hp`, `email`, `website`, `logo`, `header_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BUMDes Maju Sejahtera', 'Jl. Raya Desa No.12', 'Sukamaju', 'Karang Tengah', 'Jambi', 'Jambi', '081234567890', 'maju@bumdes.id', NULL, NULL, NULL, 1, '2025-12-10 14:58:30', '2025-12-10 14:58:30'),
(2, 'BUMDes Mandiri Bersama', 'Jl. Dusun 3 Barat', 'Sukamakmur', 'Muara Bulian', 'Batanghari', 'Jambi', '082345678901', 'mandiri@bumdes.id', NULL, NULL, NULL, 1, '2025-12-10 14:58:30', '2025-12-10 14:58:30'),
(3, 'BUMDes Karya Utama', 'Jl. Utama No.45', 'Bukit Sari', 'Muara Tembesi', 'Batanghari', 'Jambi', '083456789012', 'karyautama@bumdes.id', NULL, NULL, NULL, 1, '2025-12-10 14:58:30', '2025-12-10 14:58:30'),
(4, 'BUMDes Berkah Mandiri', NULL, 'Desa Makmur', 'Kecamatan Jaya', 'Kerinci', 'Jambi', NULL, NULL, NULL, NULL, NULL, 1, '2026-04-24 11:48:52', '2026-04-24 11:48:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id_pengumuman` int(11) NOT NULL,
  `judul_pengumuman` varchar(255) DEFAULT NULL,
  `isi_pengumuman` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokumen`
--

CREATE TABLE `tbl_dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `nama_dokumen` varchar(255) DEFAULT NULL,
  `file_dokumen` varchar(255) DEFAULT NULL,
  `ukuran_file` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_dokumen`
--

INSERT INTO `tbl_dokumen` (`id_dokumen`, `nama_dokumen`, `file_dokumen`, `ukuran_file`) VALUES
(3, 'File File File File File File File File ', 'file.pdf', 256);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_foto`
--

CREATE TABLE `tbl_foto` (
  `id_foto` int(11) NOT NULL,
  `id_album` int(11) DEFAULT NULL,
  `file_foto` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_foto`
--

INSERT INTO `tbl_foto` (`id_foto`, `id_album`, `file_foto`) VALUES
(1, 4, '700x500.jpg'),
(2, 4, '700x500.jpg'),
(3, 4, '700x500.jpg'),
(4, 4, '700x500.jpg'),
(5, 4, '700x500.jpg'),
(6, 4, '700x500.jpg'),
(7, 4, '700x500.jpg'),
(8, 4, '700x500.jpg'),
(9, 4, '700x500.jpg'),
(10, 4, '700x500.jpg'),
(13, 3, '700x500.jpg'),
(14, 3, '700x500.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `id_bumdes` int(11) NOT NULL,
  `nama_kategori` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `urutan` int(11) DEFAULT 1,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `id_bumdes`, `nama_kategori`, `deskripsi`, `urutan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pertanian', NULL, 1, 1, '2025-12-10 15:01:38', '2025-12-10 15:01:38'),
(2, 1, 'Olahan Pangan', NULL, 1, 1, '2025-12-10 15:01:38', '2025-12-10 15:01:38'),
(3, 2, 'Kerajinan Tangan', NULL, 1, 1, '2025-12-10 15:01:38', '2025-12-10 15:01:38'),
(4, 3, 'Peternakan', NULL, 1, 1, '2025-12-10 15:01:38', '2025-12-10 15:01:38'),
(5, 3, 'Perdagangan', NULL, 1, 1, '2025-12-10 15:01:38', '2025-12-10 15:01:38'),
(6, 4, 'Perkebunan', NULL, 1, 1, '2026-04-24 13:18:49', '2026-04-24 13:18:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori_berita`
--

CREATE TABLE `tbl_kategori_berita` (
  `id_kategori_berita` int(2) NOT NULL,
  `kategori_berita` varchar(50) DEFAULT NULL,
  `slug_kategori_berita` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_kategori_berita`
--

INSERT INTO `tbl_kategori_berita` (`id_kategori_berita`, `kategori_berita`, `slug_kategori_berita`) VALUES
(1, 'Kampus', 'Kampus'),
(2, 'Komputer', 'Komputer'),
(4, 'Study Tour', 'Study-Tour'),
(5, 'Politik', 'Politik'),
(6, 'Agama', 'Agama'),
(12, 'Berita Desa', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_layanan`
--

CREATE TABLE `tbl_layanan` (
  `id_layanan` int(11) NOT NULL,
  `id_bumdes` int(11) NOT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `nama_layanan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `harga` decimal(12,2) DEFAULT 0.00,
  `satuan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT 'paket',
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_layanan`
--

INSERT INTO `tbl_layanan` (`id_layanan`, `id_bumdes`, `id_unit`, `nama_layanan`, `slug`, `deskripsi`, `harga`, `satuan`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Sewa Alat Pertanian', NULL, 'Penyewaan traktor dan alat pertanian lainnya', 100000.00, 'paket', NULL, 1, '2025-12-10 15:13:52', '2025-12-10 15:13:52'),
(2, 1, NULL, 'Jasa Penggilingan Padi', NULL, 'Layanan giling padi modern dan cepat', 30000.00, 'paket', NULL, 1, '2025-12-10 15:13:52', '2025-12-10 15:13:52'),
(3, 2, NULL, 'Pelatihan Kerajinan', NULL, 'Pelatihan membuat kerajinan anyaman', 50000.00, 'paket', NULL, 1, '2025-12-10 15:13:52', '2025-12-10 15:13:52'),
(4, 3, NULL, 'Jasa Pengiriman Desa', NULL, 'Layanan kurir dalam desa', 15000.00, 'paket', NULL, 1, '2025-12-10 15:13:52', '2025-12-10 15:13:52'),
(5, 3, NULL, 'Sewa Kios Pasar Desa', NULL, 'Penyewaan kios untuk UMKM', 250000.00, 'paket', NULL, 0, '2025-12-10 15:13:52', '2025-12-10 15:13:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_layanan_pusat`
--

CREATE TABLE `tbl_layanan_pusat` (
  `id_layanan_pusat` int(11) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `syarat` text DEFAULT NULL,
  `prosedur` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data untuk tabel `tbl_layanan_pusat`
--

INSERT INTO `tbl_layanan_pusat` (`id_layanan_pusat`, `nama_layanan`, `instansi`, `deskripsi`, `syarat`, `prosedur`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Pembuatan Kartu Tanda Penduduk (KTP)', 'Dinas Kependudukan dan Catatan Sipil', 'Layanan untuk warga yang baru berusia 17 tahun atau KTP hilang/rusak.', '<ul><li>Fotokopi KK</li><li>Surat Pengantar RT/RW</li><li>KTP Lama (untuk perbaikan)</li></ul>', '<ol><li>Datang ke Kantor Desa</li><li>Perekaman Data</li><li>Verifikasi</li></ol>', NULL, '2026-04-24 06:47:09', '2026-04-24 06:47:09'),
(2, 'Pengurusan Akta Kelahiran', 'Dinas Kependudukan dan Catatan Sipil', 'Layanan pencatatan kelahiran anak.', '<ul><li>Surat Kenal Lahir</li><li>Fotokopi Buku Nikah Orang Tua</li><li>Fotokopi KK/KTP Orang Tua</li></ul>', '<ol><li>Melapor ke Petugas Desa</li><li>Pengisian Form</li><li>Proses di Disdukcapil</li></ol>', NULL, '2026-04-24 06:47:09', '2026-04-24 06:47:09'),
(3, 'Izin Mendirikan Bangunan (IMB)', 'Dinas Penanaman Modal dan PTSP', 'Izin resmi untuk mendirikan bangunan di wilayah desa.', '<ul><li>Sertifikat Tanah</li><li>Gambar Rencana Bangunan</li><li>Identitas Pemilik</li></ul>', '<ol><li>Pengajuan Berkas</li><li>Survei Lapangan</li><li>Penerbitan Izin</li></ol>', NULL, '2026-04-24 06:47:09', '2026-04-24 06:47:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lembaga`
--

CREATE TABLE `tbl_lembaga` (
  `id_lembaga` int(11) NOT NULL,
  `nama_lembaga` varchar(255) DEFAULT NULL,
  `url_lembaga` varchar(255) DEFAULT NULL,
  `logo_lembaga` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_lembaga`
--

INSERT INTO `tbl_lembaga` (`id_lembaga`, `nama_lembaga`, `url_lembaga`, `logo_lembaga`) VALUES
(55, 'Lembaga', '#', '1701960990_7e0eab0088aa97ac4002.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengumuman`
--

CREATE TABLE `tbl_pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_bumdes` int(11) DEFAULT NULL,
  `judul_pengumuman` varchar(255) DEFAULT NULL,
  `isi_pengumuman` longtext DEFAULT NULL,
  `tgl_pengumuman` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_pengumuman`
--

INSERT INTO `tbl_pengumuman` (`id_pengumuman`, `id_bumdes`, `judul_pengumuman`, `isi_pengumuman`, `tgl_pengumuman`) VALUES
(11, NULL, 'Pengumuman', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum velit laoreet id donec ultrices tincidunt arcu. Volutpat odio facilisis mauris sit amet massa vitae tortor condimentum. Rutrum quisque non tellus orci ac auctor. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies. Ut enim blandit volutpat maecenas volutpat. Tellus elementum sagittis vitae et. Vestibulum lectus mauris ultrices eros in cursus turpis massa tincidunt. Faucibus pulvinar elementum integer enim neque volutpat. Massa placerat duis ultricies lacus sed.</p><p><br></p><p>Cursus in hac habitasse platea dictumst quisque sagittis purus sit. Quisque id diam vel quam. In hendrerit gravida rutrum quisque non tellus orci. Ac turpis egestas maecenas pharetra convallis posuere. Fermentum leo vel orci porta non pulvinar neque laoreet. Non sodales neque sodales ut. Condimentum mattis pellentesque id nibh tortor id aliquet. Et ultrices neque ornare aenean euismod elementum nisi quis. Consequat interdum varius sit amet mattis vulputate enim. Aliquet enim tortor at auctor urna nunc. Malesuada fames ac turpis egestas integer. Pretium aenean pharetra magna ac. Varius vel pharetra vel turpis nunc. Eget gravida cum sociis natoque. Pharetra pharetra massa massa ultricies mi quis hendrerit. Tortor dignissim convallis aenean et tortor at risus. Felis imperdiet proin fermentum leo vel orci. Nisi scelerisque eu ultrices vitae auctor eu augue.</p><p><br></p><p>Fermentum leo vel orci porta non pulvinar neque laoreet suspendisse. Duis ut diam quam nulla. Augue eget arcu dictum varius duis at consectetur lorem. Tristique senectus et netus et malesuada fames ac turpis egestas. Vitae congue mauris rhoncus aenean vel elit. Blandit libero volutpat sed cras ornare arcu. Purus sit amet luctus venenatis lectus magna. Euismod lacinia at quis risus sed vulputate odio ut enim. Et netus et malesuada fames. Et netus et malesuada fames. Quis imperdiet massa tincidunt nunc pulvinar sapien. Purus gravida quis blandit turpis. Morbi tristique senectus et netus et malesuada. Auctor neque vitae tempus quam pellentesque nec nam. Nisl condimentum id venenatis a. Nullam non nisi est sit amet facilisis. Ornare massa eget egestas purus viverra.</p><p><br></p><p>Nulla malesuada pellentesque elit eget gravida cum sociis natoque penatibus. Ultricies mi eget mauris pharetra et ultrices neque. Massa enim nec dui nunc mattis enim ut. Dictumst vestibulum rhoncus est pellentesque elit. Nunc lobortis mattis aliquam faucibus. Nunc faucibus a pellentesque sit amet porttitor eget dolor morbi. Congue quisque egestas diam in. Congue eu consequat ac felis donec et odio pellentesque diam. Quis lectus nulla at volutpat diam. Urna condimentum mattis pellentesque id nibh tortor id aliquet. Nec nam aliquam sem et tortor consequat. Quam pellentesque nec nam aliquam. Nulla aliquet enim tortor at auctor. Sed felis eget velit aliquet sagittis. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam. Ultrices dui sapien eget mi proin sed libero enim sed. Ultrices vitae auctor eu augue ut lectus arcu. Vel quam elementum pulvinar etiam non quam lacus suspendisse. Est ultricies integer quis auctor elit sed vulputate mi sit.</p><p><br></p><p>Tellus mauris a diam maecenas. Eget nunc scelerisque viverra mauris in aliquam. At volutpat diam ut venenatis tellus in metus vulputate. Habitant morbi tristique senectus et netus et malesuada fames. Id faucibus nisl tincidunt eget nullam non nisi est. Justo nec ultrices dui sapien eget mi proin sed libero. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Aliquam sem et tortor consequat id porta. Mattis enim ut tellus elementum sagittis vitae. Consectetur a erat nam at lectus urna. Rutrum quisque non tellus orci ac auctor. Morbi tempus iaculis urna id volutpat lacus laoreet.</p>', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `id_bumdes` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_produk` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `harga` decimal(12,2) NOT NULL DEFAULT 0.00,
  `stok` int(11) DEFAULT 0,
  `satuan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT 'pcs',
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `foto2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `foto3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `berat` decimal(10,2) DEFAULT 0.00,
  `min_beli` int(11) DEFAULT 1,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_bumdes`, `id_kategori`, `nama_produk`, `slug`, `deskripsi`, `harga`, `stok`, `satuan`, `foto`, `foto2`, `foto3`, `berat`, `min_beli`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Beras Organik', NULL, 'Beras organik kualitas premium hasil panen desa', 15000.00, 200, 'pcs', 'kayu_manis.png', NULL, NULL, 0.00, 1, 1, '2025-12-10 15:08:38', '2026-04-30 10:27:26'),
(2, 1, 2, 'Keripik Singkong', NULL, 'Keripik singkong renyah berbagai rasa', 12000.00, 150, 'pcs', 'kerajinan_kerinci.png', NULL, NULL, 0.00, 1, 1, '2025-12-10 15:08:38', '2026-04-30 10:27:26'),
(3, 2, 3, 'Tas Rotan', NULL, 'Tas rotan buatan tangan pengrajin lokal', 85000.00, 50, 'pcs', 'kerajinan_kerinci.png', NULL, NULL, 0.00, 1, 1, '2025-12-10 15:08:38', '2026-04-30 10:27:26'),
(4, 3, 4, 'Telur Ayam Kampung', NULL, 'Telur ayam kampung fresh dari peternak', 2500.00, 300, 'pcs', 'kopi_kerinci.png', NULL, NULL, 0.00, 1, 1, '2025-12-10 15:08:38', '2026-04-30 10:27:26'),
(5, 3, 5, 'Minyak Goreng Curah', NULL, 'Minyak goreng curah untuk kebutuhan harian', 14000.00, 100, 'pcs', 'kopi_kerinci.png', NULL, NULL, 0.00, 1, 1, '2025-12-10 15:08:38', '2026-04-30 10:27:26'),
(6, 4, 6, 'Kakao', NULL, 'Kakao kering', 2000.00, 100, 'pcs', 'kerajinan_kerinci.png', NULL, NULL, 0.00, 1, 1, '2026-04-24 13:19:19', '2026-04-30 10:27:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id_slider` int(11) NOT NULL,
  `judul_slider` varchar(255) DEFAULT NULL,
  `url_slider` varchar(255) DEFAULT NULL,
  `cover_slider` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_slider`
--

INSERT INTO `tbl_slider` (`id_slider`, `judul_slider`, `url_slider`, `cover_slider`) VALUES
(9, 'Keindahan Alam Kerinci', '#', 'slider1.png'),
(10, 'Pesona Danau Kerinci', '#', 'slider2.png'),
(11, 'Budaya Bumi Sakti Alam Kerinci', '#', 'slider3.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_team`
--

CREATE TABLE `tbl_team` (
  `id_team` int(11) NOT NULL,
  `nama_team` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `foto_team` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_team`
--

INSERT INTO `tbl_team` (`id_team`, `nama_team`, `jabatan`, `foto_team`) VALUES
(25, 'Nama', 'Jabatan', '600x620.jpg'),
(17, 'Nama', 'Jabatan', '600x620.jpg'),
(18, 'Nama', 'Jabatan', '600x620.jpg'),
(19, 'Nama', 'Jabatan', '600x620.jpg'),
(20, 'Nama', 'Jabatan', '600x620.jpg'),
(21, 'Nama', 'Jabatan', '600x620.jpg'),
(22, 'Nama', 'Jabatan', '600x620.jpg'),
(16, 'Nama', 'Jabatan', '600x620.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_bumdes` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tipe` enum('pemasukan','pengeluaran') CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NOT NULL,
  `kategori` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_bumdes`, `id_user`, `tipe`, `kategori`, `nominal`, `tanggal`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'pemasukan', NULL, 500000.00, '2025-01-10', 'Pendapatan sewa tenda', '2025-12-10 17:42:20', '2025-12-10 17:42:20'),
(2, 1, 2, 'pemasukan', NULL, 350000.00, '2025-01-11', 'Penjualan air mineral desa', '2025-12-10 17:42:20', '2025-12-10 17:42:20'),
(3, 1, 2, 'pengeluaran', NULL, 120000.00, '2025-01-13', 'Pembelian galon isi ulang', '2025-12-10 17:42:20', '2025-12-10 17:42:20'),
(4, 1, 2, 'pengeluaran', NULL, 250000.00, '2025-01-15', 'Pembayaran listrik unit wisata', '2025-12-10 17:42:20', '2025-12-10 17:42:20'),
(5, 1, 2, 'pemasukan', NULL, 750000.00, '2025-01-18', 'Pendapatan tiket embung wisata', '2025-12-10 17:42:20', '2025-12-10 17:42:20'),
(6, 2, 3, 'pemasukan', NULL, 1500000.00, '2025-01-05', 'Pemasukan simpan pinjam', '2025-12-10 17:42:20', '2025-12-10 17:42:20'),
(7, 2, 3, 'pengeluaran', NULL, 85000.00, '2025-01-06', 'Biaya ATK kantor', '2025-12-10 17:42:20', '2025-12-10 17:42:20'),
(8, 2, 3, 'pemasukan', NULL, 420000.00, '2025-01-08', 'Usaha pengolahan pangan terjual', '2025-12-10 17:42:20', '2025-12-10 17:42:20'),
(9, 2, 3, 'pengeluaran', NULL, 210000.00, '2025-01-09', 'Pembelian bahan baku pangan', '2025-12-10 17:42:20', '2025-12-10 17:42:20'),
(10, 2, 3, 'pemasukan', NULL, 300000.00, '2025-01-12', 'Pendapatan kebersihan desa', '2025-12-10 17:42:20', '2025-12-10 17:42:20'),
(11, 3, 4, 'pemasukan', NULL, 600000.00, '2025-01-03', 'Penjualan ayam potong', '2025-12-10 17:42:20', '2025-12-10 17:42:20'),
(12, 3, 4, 'pengeluaran', NULL, 200000.00, '2025-01-04', 'Pembelian pakan ayam', '2025-12-10 17:42:20', '2025-12-10 17:42:20'),
(13, 3, 4, 'pemasukan', NULL, 250000.00, '2025-01-07', 'Jasa transport desa', '2025-12-10 17:42:20', '2025-12-10 17:42:20'),
(14, 3, 4, 'pengeluaran', NULL, 180000.00, '2025-01-10', 'Perawatan kendaraan operasional', '2025-12-10 17:42:20', '2025-12-10 17:42:20'),
(15, 3, 4, 'pemasukan', NULL, 320000.00, '2025-01-14', 'Penjualan kerajinan UMKM', '2025-12-10 17:42:20', '2025-12-10 17:42:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_unit_usaha`
--

CREATE TABLE `tbl_unit_usaha` (
  `id_unit` int(11) NOT NULL,
  `id_bumdes` int(11) NOT NULL,
  `nama_unit` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NOT NULL,
  `penanggung_jawab` varchar(150) DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `slug` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `ikon` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_unit_usaha`
--

INSERT INTO `tbl_unit_usaha` (`id_unit`, `id_bumdes`, `nama_unit`, `penanggung_jawab`, `kontak`, `slug`, `deskripsi`, `ikon`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Unit Embung Wisata', 'Rudi Hartono', '081234567890', NULL, NULL, NULL, 1, '2025-12-10 17:03:07', '2025-12-10 17:03:07'),
(2, 1, 'Unit Air Mineral Desa', 'Siti Rohani', '082345678910', NULL, NULL, NULL, 1, '2025-12-10 17:03:07', '2025-12-10 17:03:07'),
(3, 1, 'Unit Persewaan Tenda & Kursi', 'Bambang Heri', '083214567890', NULL, NULL, NULL, 0, '2025-12-10 17:03:07', '2025-12-10 17:03:07'),
(4, 2, 'Unit Pengolahan Pangan', 'Dewi Anggraini', '081356789012', NULL, NULL, NULL, 1, '2025-12-10 17:03:07', '2025-12-10 17:03:07'),
(5, 2, 'Unit Simpan Pinjam', 'Ahmad Fauzan', '082198765432', NULL, NULL, NULL, 1, '2025-12-10 17:03:07', '2025-12-10 17:03:07'),
(6, 2, 'Unit Kebersihan Desa', 'Intan Permata', '089512345678', NULL, NULL, NULL, 1, '2025-12-10 17:03:07', '2025-12-10 17:03:07'),
(7, 3, 'Unit Peternakan Ayam', 'Joko Susilo', '081234567123', NULL, NULL, NULL, 1, '2025-12-10 17:03:07', '2025-12-10 17:03:07'),
(8, 3, 'Unit UMKM Kerajinan', 'Laila Karimah', '082334455667', NULL, NULL, NULL, 0, '2025-12-10 17:03:07', '2025-12-10 17:03:07'),
(9, 3, 'Unit Layanan Transport Desa', 'Wawan Saputra', '081288899900', NULL, NULL, NULL, 1, '2025-12-10 17:03:07', '2025-12-10 17:03:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(3) NOT NULL,
  `nama_user` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` int(11) DEFAULT NULL COMMENT '1. Admin\r\n2. User',
  `id_bumdes` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level`, `id_bumdes`, `create_at`, `update_at`) VALUES
(2, 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, NULL, '2022-08-29 16:58:30', '2025-12-10 09:33:54'),
(10, 'nana surya ', 'user', '12dea96fec20593566ab75692c9949596833adc9', 2, 1, '2025-12-10 03:10:39', '2026-04-24 05:10:40'),
(12, 'hadi', 'hadi', 'f626bfe8a6716f0e60b0f3989b67f5ad2fa9fda2', 2, NULL, '2026-04-24 06:17:40', '2026-04-24 13:17:40'),
(11, 'Pengelola BUMDes Berkah', 'bumdes_berkah', '153b56bd2db53cee0b41b8b7392884da7b57cead', 2, 4, '2026-04-24 04:48:52', '2026-04-24 13:17:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id_video` int(11) NOT NULL,
  `judul_video` varchar(255) DEFAULT NULL,
  `embed_video` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_video`
--

INSERT INTO `tbl_video` (`id_video`, `judul_video`, `embed_video`) VALUES
(1, 'Video', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iZyBMg8F5rU?si=dbjqtgb3sPTQh6jV\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(2, 'Video', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iZyBMg8F5rU?si=dbjqtgb3sPTQh6jV\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(3, 'Video', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iZyBMg8F5rU?si=dbjqtgb3sPTQh6jV\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(4, 'Video', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iZyBMg8F5rU?si=dbjqtgb3sPTQh6jV\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(6, 'Video', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iZyBMg8F5rU?si=dbjqtgb3sPTQh6jV\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web`
--

CREATE TABLE `tbl_web` (
  `id` int(1) NOT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `logo_header` varchar(50) DEFAULT NULL,
  `nama_kampus` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telpon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama_pimpinan` varchar(255) DEFAULT NULL,
  `dipimpin_oleh` varchar(255) DEFAULT NULL,
  `foto_pimpinan` varchar(255) DEFAULT NULL,
  `kata_sambutan` longtext DEFAULT NULL,
  `tentang` longtext DEFAULT NULL,
  `visi_misi` longtext DEFAULT NULL,
  `struktur_organisasi` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `ig` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `yt` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_web`
--

INSERT INTO `tbl_web` (`id`, `logo`, `logo_header`, `nama_kampus`, `alamat`, `telpon`, `email`, `nama_pimpinan`, `dipimpin_oleh`, `foto_pimpinan`, `kata_sambutan`, `tentang`, `visi_misi`, `struktur_organisasi`, `fb`, `ig`, `twitter`, `yt`, `linkedin`) VALUES
(1, 'logo.png', 'logo.png', 'Bumdes Digital Kerinci', 'Jl. A.Yani No. 63 Komp. Griya Sapta Marga Kec. Sunggal, Kel. Sei Mencirim', '082304690083', 'ananpublisher@gmail.com', 'Nama Pimpinan', 'Direktur', 'logo.png', '<p style=\"text-align: justify;\">Assalamu\'alaikum Wr. Wb.</p><p></p><div style=\"text-align: justify;\"><p style=\"margin-bottom: 1.65em; text-align: left; line-height: 1.5;\" class=\"\"><font color=\"#6f6f6f\" face=\"Roboto, sans-serif\"><span style=\"font-size: 18px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et pharetra pharetra massa massa ultricies mi. Mattis rhoncus urna neque viverra. Eget velit aliquet sagittis id consectetur purus ut faucibus. Sagittis orci a scelerisque purus semper. Id interdum velit laoreet id donec ultrices. Enim tortor at auctor urna nunc id cursus metus. Ultrices neque ornare aenean euismod elementum nisi quis eleifend. Ipsum dolor sit amet consectetur. Mollis nunc sed id semper risus in. Vel pharetra vel turpis nunc eget lorem dolor. Ultricies mi eget mauris pharetra et ultrices neque ornare aenean. Pellentesque nec nam aliquam sem. A condimentum vitae sapien pellentesque. Non enim praesent elementum facilisis leo. Cursus in hac habitasse platea dictumst quisque sagittis purus sit. Lorem ipsum dolor sit amet.</span></font></p></div><p style=\"text-align: justify;\">Terima kasih atas kunjungan Anda, dan semoga website ini bermanfaat bagi Anda. Kami selalu terbuka untuk mendengar masukan dan saran dari Anda.</p><p style=\"text-align: justify; \"><span style=\"font-size: 1rem;\">Wassalamu\'alaikum Wr. Wb.</span></p><p><br></p>', '<h2 data-section-id=\"1t0stj7\" data-start=\"150\" data-end=\"170\"><strong data-start=\"176\" data-end=\"197\" style=\"color: inherit; font-family: inherit; font-size: 1.75rem;\">1. Tentang BUMDes</strong></h2><p data-start=\"198\" data-end=\"457\">Badan Usaha Milik Desa (BUMDes) Kerinci merupakan lembaga usaha desa yang didirikan oleh pemerintah desa bersama masyarakat dengan tujuan untuk meningkatkan perekonomian desa, mengoptimalkan potensi lokal, serta memberikan pelayanan ekonomi kepada masyarakat.</p><p data-start=\"459\" data-end=\"628\">BUMDes Kerinci hadir sebagai wadah pengelolaan berbagai unit usaha desa secara profesional, transparan, dan berkelanjutan guna menciptakan kesejahteraan masyarakat desa.</p><h3 data-section-id=\"bmiznj\" data-start=\"635\" data-end=\"650\"><span role=\"text\"><strong data-start=\"639\" data-end=\"650\">2. Visi</strong></span></h3><p data-start=\"651\" data-end=\"767\">Menjadi lembaga usaha desa yang mandiri, profesional, dan berdaya saing dalam meningkatkan kesejahteraan masyarakat.</p><h3 data-section-id=\"1vqlimd\" data-start=\"774\" data-end=\"789\"><span role=\"text\"><strong data-start=\"778\" data-end=\"789\">3. Misi</strong></span></h3>\r\n\r\n<p></p><ul data-start=\"790\" data-end=\"1064\">\r\n</ul><p>\r\nMengembangkan potensi ekonomi desa berbasis sumber daya lokal\r\n</p><p>\r\nMeningkatkan pendapatan asli desa (PADes)\r\n</p><p>\r\nMemberikan pelayanan usaha yang optimal kepada masyarakat\r\n</p><p>\r\nMendorong terciptanya lapangan kerja di desa\r\n</p><p>\r\nMengelola usaha secara transparan dan akuntabel</p><ul data-start=\"790\" data-end=\"1064\">\r\n</ul>', '<p></p><div style=\"text-align: center;\"><div style=\"text-align: center;\"><b>Visi :</b></div><div><div style=\"text-align: center;\"><span style=\"font-size: 1rem;\">“Menjadi agen yang mampu meningkatkan kualitas masyarakat melalui pendidikan, penelitian dan pengembangan produk inovasi”</span></div><div style=\"text-align: center;\"><br></div></div><div style=\"text-align: center;\"><b>Misi :</b></div><div style=\"text-align: center;\">1.<span style=\"white-space: pre;\">	</span>Menyelenggarakan pendidikan inklusif yang mampu membentuk individu yang siap hidup dan memiliki daya saing</div><div style=\"text-align: center;\">2.<span style=\"white-space:pre\">	</span>Menyelenggarakan pertemuan ilmiah secara rutin dalam bentuk seminar nasional atau international conference yang mampu meningkatkan wawasan keterbaruan para ilmuan</div><div style=\"text-align: center;\">3.<span style=\"white-space:pre\">	</span>Memberikan layanan publikasi yang berkualitas yang dapat diakses dan dimanfaatkan oleh masyarakat dalam mendorong peningkatan keilmuan masyarakat</div><div style=\"text-align: center;\">4.<span style=\"white-space:pre\">	</span>Membangun forum ilmuan yang membahas keterbaruan ilmu</div><div style=\"text-align: center;\">5.<span style=\"white-space: pre;\">	</span>Membuat produk inovasi yang dapat mendukung peningkatan kemajuan peradaban masyarakat</div></div><p></p>', '1698555524_a809ff012e9af3fd17e7.jpg', '#', '#', '#', '#', '#');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_berita`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_berita` (
`id_berita` int(11)
,`id_kategori_berita` int(2)
,`kategori_berita` varchar(50)
,`judul_berita` varchar(255)
,`slug_berita` varchar(255)
,`isi_berita` longtext
,`cover_berita` varchar(255)
,`tgl_berita` date
,`view` int(11)
,`id_user` int(3)
,`nama_user` varchar(25)
,`jam_berita` time
);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD PRIMARY KEY (`id_agenda`) USING BTREE;

--
-- Indeks untuk tabel `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD PRIMARY KEY (`id_album`) USING BTREE;

--
-- Indeks untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `fk_anggota_bumdes` (`id_bumdes`);

--
-- Indeks untuk tabel `tbl_app`
--
ALTER TABLE `tbl_app`
  ADD PRIMARY KEY (`id_app`) USING BTREE;

--
-- Indeks untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`) USING BTREE;

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`) USING BTREE;

--
-- Indeks untuk tabel `tbl_bumdes`
--
ALTER TABLE `tbl_bumdes`
  ADD PRIMARY KEY (`id_bumdes`);

--
-- Indeks untuk tabel `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id_pengumuman`) USING BTREE;

--
-- Indeks untuk tabel `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  ADD PRIMARY KEY (`id_dokumen`) USING BTREE;

--
-- Indeks untuk tabel `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD PRIMARY KEY (`id_foto`) USING BTREE;

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `fk_kategori_bumdes` (`id_bumdes`);

--
-- Indeks untuk tabel `tbl_kategori_berita`
--
ALTER TABLE `tbl_kategori_berita`
  ADD PRIMARY KEY (`id_kategori_berita`) USING BTREE;

--
-- Indeks untuk tabel `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_layanan_bumdes` (`id_bumdes`),
  ADD KEY `fk_layanan_unit` (`id_unit`);

--
-- Indeks untuk tabel `tbl_layanan_pusat`
--
ALTER TABLE `tbl_layanan_pusat`
  ADD PRIMARY KEY (`id_layanan_pusat`);

--
-- Indeks untuk tabel `tbl_lembaga`
--
ALTER TABLE `tbl_lembaga`
  ADD PRIMARY KEY (`id_lembaga`) USING BTREE;

--
-- Indeks untuk tabel `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`) USING BTREE;

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_produk_bumdes` (`id_bumdes`),
  ADD KEY `fk_produk_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id_slider`) USING BTREE;

--
-- Indeks untuk tabel `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`id_team`) USING BTREE;

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_transaksi_bumdes` (`id_bumdes`);

--
-- Indeks untuk tabel `tbl_unit_usaha`
--
ALTER TABLE `tbl_unit_usaha`
  ADD PRIMARY KEY (`id_unit`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_unit_bumdes` (`id_bumdes`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE,
  ADD KEY `fk_user_bumdes` (`id_bumdes`);

--
-- Indeks untuk tabel `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id_video`) USING BTREE;

--
-- Indeks untuk tabel `tbl_web`
--
ALTER TABLE `tbl_web`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_album`
--
ALTER TABLE `tbl_album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_app`
--
ALTER TABLE `tbl_app`
  MODIFY `id_app` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_bumdes`
--
ALTER TABLE `tbl_bumdes`
  MODIFY `id_bumdes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3049;

--
-- AUTO_INCREMENT untuk tabel `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_foto`
--
ALTER TABLE `tbl_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori_berita`
--
ALTER TABLE `tbl_kategori_berita`
  MODIFY `id_kategori_berita` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_layanan_pusat`
--
ALTER TABLE `tbl_layanan_pusat`
  MODIFY `id_layanan_pusat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_lembaga`
--
ALTER TABLE `tbl_lembaga`
  MODIFY `id_lembaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_unit_usaha`
--
ALTER TABLE `tbl_unit_usaha`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_berita`
--
DROP TABLE IF EXISTS `v_berita`;

CREATE ALGORITHM=UNDEFINED DEFINER=`pma_user`@`localhost` SQL SECURITY DEFINER VIEW `v_berita`  AS SELECT `tbl_berita`.`id_berita` AS `id_berita`, `tbl_berita`.`id_kategori_berita` AS `id_kategori_berita`, `tbl_kategori_berita`.`kategori_berita` AS `kategori_berita`, `tbl_berita`.`judul_berita` AS `judul_berita`, `tbl_berita`.`slug_berita` AS `slug_berita`, `tbl_berita`.`isi_berita` AS `isi_berita`, `tbl_berita`.`cover_berita` AS `cover_berita`, `tbl_berita`.`tgl_berita` AS `tgl_berita`, `tbl_berita`.`view` AS `view`, `tbl_berita`.`id_user` AS `id_user`, `tbl_user`.`nama_user` AS `nama_user`, `tbl_berita`.`jam_berita` AS `jam_berita` FROM ((`tbl_berita` join `tbl_kategori_berita` on(`tbl_berita`.`id_kategori_berita` = `tbl_kategori_berita`.`id_kategori_berita`)) join `tbl_user` on(`tbl_berita`.`id_user` = `tbl_user`.`id_user`)) ORDER BY `tbl_berita`.`id_berita` DESC ;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD CONSTRAINT `fk_anggota_bumdes` FOREIGN KEY (`id_bumdes`) REFERENCES `tbl_bumdes` (`id_bumdes`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD CONSTRAINT `fk_kategori_bumdes` FOREIGN KEY (`id_bumdes`) REFERENCES `tbl_bumdes` (`id_bumdes`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  ADD CONSTRAINT `fk_layanan_bumdes` FOREIGN KEY (`id_bumdes`) REFERENCES `tbl_bumdes` (`id_bumdes`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_layanan_unit` FOREIGN KEY (`id_unit`) REFERENCES `tbl_unit_usaha` (`id_unit`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `fk_produk_bumdes` FOREIGN KEY (`id_bumdes`) REFERENCES `tbl_bumdes` (`id_bumdes`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_produk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `fk_transaksi_bumdes` FOREIGN KEY (`id_bumdes`) REFERENCES `tbl_bumdes` (`id_bumdes`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_unit_usaha`
--
ALTER TABLE `tbl_unit_usaha`
  ADD CONSTRAINT `fk_unit_bumdes` FOREIGN KEY (`id_bumdes`) REFERENCES `tbl_bumdes` (`id_bumdes`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
