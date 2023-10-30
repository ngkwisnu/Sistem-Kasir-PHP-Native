-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2023 pada 06.33
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectuas_webdas_final`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `nama_kategori`) VALUES
('KB1', 'Alat Tulis'),
('KB2', 'Pakaian'),
('KB3', 'Makanan'),
('KB4', 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` varchar(10) NOT NULL,
  `id_kategori` varchar(10) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `stok_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `id_kategori`, `nama_barang`, `harga_barang`, `stok_barang`) VALUES
('KB01', 'KB1', 'Buku Tulis', 4000, 9),
('KB02', 'KB2', 'Baju Anak', 15000, 8),
('KB03', 'KB3', 'Roti Coklat', 5000, 9),
('KB04', 'KB4', 'Minuman Jeruk', 6000, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `tgl_transaksi`, `id_user`) VALUES
(2, '2023-10-30 13:18:00', 1),
(3, '2023-10-30 13:19:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_uangmasuk`
--

CREATE TABLE `tb_uangmasuk` (
  `id_transaksi` int(11) DEFAULT NULL,
  `uang_masuk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_uangmasuk`
--

INSERT INTO `tb_uangmasuk` (`id_transaksi`, `uang_masuk`) VALUES
(2, 20000),
(3, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password_user` varchar(50) DEFAULT NULL,
  `role_user` varchar(50) DEFAULT NULL,
  `tlpn` int(11) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_lengkap`, `username`, `password_user`, `role_user`, `tlpn`, `alamat`) VALUES
(1, 'Ayu Maharani', 'ayu', 'ayu123', 'kasir', NULL, NULL),
(2, 'Kevin Julio', 'kevin', 'kevin123', 'staf_gudang', NULL, NULL),
(3, 'Kadek Jupi', 'jupi', 'jupi123', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi` int(11) DEFAULT NULL,
  `kode_barang` varchar(10) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi`, `kode_barang`, `jumlah_barang`, `total_harga`) VALUES
(2, 'KB01', 3, 12000),
(2, 'KB03', 1, 5000),
(3, 'KB02', 4, 60000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_uangmasuk`
--
ALTER TABLE `tb_uangmasuk`
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_barang` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_uangmasuk`
--
ALTER TABLE `tb_uangmasuk`
  ADD CONSTRAINT `tb_uangmasuk_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`),
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `tb_barang` (`kode_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
