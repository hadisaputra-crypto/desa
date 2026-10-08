-- ============================================================
-- Migration: Tambah level Unit Usaha (level 3)
-- ============================================================

-- 1. Tambah kolom id_unit ke tbl_user
ALTER TABLE tbl_user 
  ADD COLUMN id_unit INT NULL AFTER id_bumdes;

-- 2. Tambah kolom id_unit ke tabel data untuk scope per-unit
ALTER TABLE tbl_anggota 
  ADD COLUMN id_unit INT NULL AFTER id_bumdes;

ALTER TABLE tbl_produk 
  ADD COLUMN id_unit INT NULL AFTER id_bumdes;

ALTER TABLE tbl_transaksi 
  ADD COLUMN id_unit INT NULL AFTER id_bumdes;

ALTER TABLE tbl_kategori 
  ADD COLUMN id_unit INT NULL AFTER id_bumdes;

-- 3. Update tbl_user untuk level 3 (Unit Usaha)
-- Contoh: akun unit usaha (isi id_unit sesuai id_unit_usaha yang ada)
-- INSERT INTO tbl_user (nama_user, username, password, level, id_bumdes, id_unit, create_at, update_at)
-- VALUES ('Operator Unit Usaha', 'unit', SHA1('unit'), 3, 1, 1, NOW(), NOW());
