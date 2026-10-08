-- ============================================================
-- Migration: Kategori Transaksi + Modal
-- ============================================================

CREATE TABLE IF NOT EXISTS tbl_kategori_transaksi (
    id_kat_trans INT AUTO_INCREMENT PRIMARY KEY,
    id_bumdes INT NULL,
    id_unit INT NULL,
    tipe ENUM('pemasukan', 'pengeluaran', 'modal') NOT NULL,
    nama_kategori VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Kategori default untuk BUMDes (contoh)
-- Pemasukan
INSERT INTO tbl_kategori_transaksi (id_bumdes, id_unit, tipe, nama_kategori) VALUES
(NULL, NULL, 'pemasukan', 'Penjualan Produk'),
(NULL, NULL, 'pemasukan', 'Pendapatan Jasa'),
(NULL, NULL, 'pemasukan', 'Pendapatan Lain-lain'),
(NULL, NULL, 'pengeluaran', 'Pembelian Stok Barang'),
(NULL, NULL, 'pengeluaran', 'Gaji Karyawan'),
(NULL, NULL, 'pengeluaran', 'Biaya Operasional'),
(NULL, NULL, 'pengeluaran', 'Biaya Transportasi'),
(NULL, NULL, 'pengeluaran', 'Biaya Listrik & Air'),
(NULL, NULL, 'pengeluaran', 'Biaya Lain-lain'),
(NULL, NULL, 'modal', 'Setoran Modal dari BUMDes');
