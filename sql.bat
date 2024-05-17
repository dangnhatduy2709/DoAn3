CREATE TABLE sanpham (
  ID int NOT NULL,
  HinhAnh varchar(500) COLLATE utf8mb3_unicode_ci NOT NULL,
  MaLoai int NOT NULL,
  MaNCC int NOT NULL,
  TenSP varchar(1500) COLLATE utf8mb3_unicode_ci NOT NULL,
  MauSac varchar(1500) COLLATE utf8mb3_unicode_ci NOT NULL,
  DonGia float NOT NULL,
  GiaSale float NOT NULL,
  GhiChu text COLLATE utf8mb3_unicode_ci NOT NULL,
  SoLuong int NOT NULL,
  KichThuoc varchar(500) COLLATE utf8mb3_unicode_ci NOT NULL,
  created_at text COLLATE utf8mb3_unicode_ci,
  updated_at text COLLATE utf8mb3_unicode_ci
)