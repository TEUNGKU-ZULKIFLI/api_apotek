# Tutorial Menghubungkan Project Flutter APP APOTEK ke MySQL dengan API

## Pendahuluan
Repository ini adalah penghubung antara project Flutter dan MySQL (dengan XAMPP sebagai server lokal), yang biasa disebut sebagai API. Ikuti langkah-langkah berikut untuk mengatur dan menjalankan aplikasi Anda.

---

## Langkah 1: Clone Repository Project Flutter
Clone terlebih dahulu repository project Flutter yang akan digunakan:

<div align="center">
  <a href="https://github.com/TEUNGKU-ZULKIFLI/18.uts_app_apotek"><button style="font-size: 18px; padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">REPO PROJECT 18</button></a>
</div>

---

## Langkah 2: Clone Repository API
Pastikan repository API ini di-clone ke dalam folder `htdocs` di direktori XAMPP Anda. Contoh lokasi:

```
C:\xampp\htdocs\
```

---

## Langkah 3: Membuat Database dan Tabel
Jalankan kode SQL berikut untuk membuat database dan tabel-tabel yang diperlukan:

```sql
-- Membuat Database
CREATE DATABASE IF NOT EXISTS app_apotek;
USE app_apotek;

-- Membuat Tabel `daftar_obat`
CREATE TABLE `daftar_obat` (
  `kode_obat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `tgl_kadaluarsa` date NOT NULL,
  PRIMARY KEY (`kode_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuat Tabel `pelanggan`
CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuat Tabel `pemasok`
CREATE TABLE `pemasok` (
  `kode_perusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `alamat_perusahaan` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_kontak` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`kode_perusahaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuat Tabel `staf_apotek`
CREATE TABLE `staf_apotek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuat Tabel `stock_obat`
CREATE TABLE `stock_obat` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT,
  `kode_obat` int(11) NOT NULL,
  `jumlah_obat_masuk` int(11) NOT NULL,
  `jumlah_obat_dipesan` int(11) NOT NULL,
  PRIMARY KEY (`id_stock`),
  KEY `kode_obat` (`kode_obat`),
  CONSTRAINT `stock_obat_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `daftar_obat` (`kode_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuat Tabel `stock_obat_in_out`
CREATE TABLE `stock_obat_in_out` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT,
  `kode_obat` int(11) NOT NULL,
  `jenis_obat` enum('padat','cair','serbuk') NOT NULL,
  `kode_perusahaan` int(11) NOT NULL,
  `jumlah_obat_masuk` int(11) NOT NULL,
  `no_rak_obat` varchar(10) DEFAULT NULL,
  `tgl_obat_masuk` date DEFAULT NULL,
  `kode_pemesan` varchar(20) DEFAULT NULL,
  `nama_pemesan` varchar(100) DEFAULT NULL,
  `jumlah_pesanan_obat` int(11) DEFAULT NULL,
  `tgl_obat_keluar` date DEFAULT NULL,
  PRIMARY KEY (`id_stock`),
  KEY `kode_obat` (`kode_obat`),
  KEY `kode_perusahaan` (`kode_perusahaan`),
  CONSTRAINT `stock_obat_in_out_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `daftar_obat` (`kode_obat`),
  CONSTRAINT `stock_obat_in_out_ibfk_2` FOREIGN KEY (`kode_perusahaan`) REFERENCES `pemasok` (`kode_perusahaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

---

## Langkah 4: Menguji API
Gunakan browser kesayangan anda untuk menguji endpoint API. Pastikan endpoint seperti `http://localhost/api_apotek/` berfungsi dengan baik.
pastikan anda melihat list foder yang sama seperti repo ini juga.
---

## Penutup
Dengan mengikuti tutorial ini, Anda telah berhasil menghubungkan project Flutter dengan MySQL menggunakan API. Semoga berhasil dan selamat mencoba!

