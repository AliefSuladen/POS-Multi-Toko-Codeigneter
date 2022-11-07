-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Nov 2022 pada 00.14
-- Versi server: 10.3.36-MariaDB-cll-lve
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasirkit_v2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(25) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id_akses`, `nama_akses`, `deskripsi`) VALUES
(1, 'administrator', 'sebagai  pengelola kendali penuh pada sistem aplikasi'),
(2, 'Asisten admin', 'sebagai pengelola sistem stok barang, penjualan dan laporan'),
(3, 'Master', 'Master');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id`, `nama_bank`) VALUES
(1, 'MANDIRI'),
(2, 'BNI'),
(3, 'BCA'),
(4, 'BRI'),
(5, 'CIMB Niaga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `ukuran` varchar(5) NOT NULL,
  `harga` int(20) NOT NULL,
  `foto` varchar(80) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `ukuran`, `harga`, `foto`, `id_user`) VALUES
(85, 'Kuali Hitam', 0, '', 100000, '', 2),
(86, 'Kue Coklat Sedang', 0, '', 80000, '', 16),
(88, 'Kue tart', 0, '', 35000, '', 16),
(89, 'Slice cake', 0, '', 10000, '', 16),
(90, 'ayam', 0, '', 100000, '', 16),
(91, 'ICE COFFEE MURABE', 0, '', 17000, '', 22),
(92, 'ICE COFFEE BROUN SUGAR', 0, '', 17000, '', 22),
(93, 'WHM MINI', 0, '', 15000, '', 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `no_trf` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(35) NOT NULL,
  `totalpure` bigint(20) NOT NULL,
  `grand_total` bigint(20) NOT NULL,
  `diskon` int(3) NOT NULL,
  `bayar` bigint(20) NOT NULL,
  `kembalian` bigint(20) NOT NULL,
  `catatan` varchar(50) NOT NULL,
  `tgl_trf` date NOT NULL,
  `jam_trf` time NOT NULL,
  `id_pembayaran` int(2) NOT NULL,
  `no_rek` int(18) DEFAULT NULL,
  `atas_nama` varchar(35) NOT NULL,
  `id_bank` int(2) DEFAULT NULL,
  `id_user` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `no_trf`, `nama_pelanggan`, `totalpure`, `grand_total`, `diskon`, `bayar`, `kembalian`, `catatan`, `tgl_trf`, `jam_trf`, `id_pembayaran`, `no_rek`, `atas_nama`, `id_bank`, `id_user`) VALUES
(37, 'C20221023001', '', 100000, 90000, 10, 100000, 10000, '', '2022-10-23', '14:57:26', 1, 0, '', NULL, 2),
(38, 'C20221023037', '', 300000, 300000, 0, 300000, 0, '', '2022-10-23', '14:58:36', 1, 0, '', NULL, 2),
(40, 'C20221023039', '', 80000, 80000, 0, 100000, 20000, '', '2022-10-23', '22:21:48', 1, 0, '', NULL, 16),
(41, 'C20221023040', 'Riski', 80000, 80000, 0, 100000, 20000, 'Ambil tnggl 24', '2022-10-23', '22:25:04', 1, 0, '', NULL, 16),
(42, 'C20221023041', 'jhon', 480000, 480000, 0, 500000, 20000, '', '2022-10-23', '22:50:48', 1, 0, '', NULL, 16),
(43, 'C20221023042', 'Agam', 100000, 100000, 0, 100000, 0, 'note bw', '2022-10-23', '23:14:07', 1, 0, '', NULL, 2),
(44, 'C20221023043', '', 100000, 0, 100, 0, 0, '', '2022-10-23', '23:15:45', 1, 0, '', NULL, 2),
(45, 'C20221024044', 'Riski', 160000, 160000, 0, 200000, 40000, 'Diambil hari ini', '2022-10-24', '11:17:02', 1, 0, '', NULL, 16),
(46, 'C20221024045', 'Alep', 225000, 225000, 0, 300000, 75000, 'Diambil hari ini', '2022-10-24', '11:26:27', 1, 0, '', NULL, 16),
(47, 'C20221025046', 'siti', 90000, 90000, 0, 50000, -40000, 'pembayaran cash', '2022-10-25', '13:29:39', 1, 0, '', NULL, 16),
(48, 'C20221027047', 'Agam', 185000, 185000, 0, 200000, 15000, 'mantap', '2022-10-27', '00:25:31', 1, 0, '', NULL, 16),
(49, 'C20221027048', 'jki', 45000, 45000, 0, 100000, 55000, 'sdnasj', '2022-10-27', '09:21:12', 1, 0, '', NULL, 16),
(50, 'C20221027049', 'Riski', 45000, 45000, 0, 100000, 55000, 'Dnnsms', '2022-10-27', '09:23:12', 1, 0, '', NULL, 16),
(51, 'C20221027050', 'Putra', 125000, 125000, 0, 150000, 25000, 'Nsjsj', '2022-10-27', '09:28:15', 1, 0, '', NULL, 16),
(52, 'C20221027051', 'agam', 10000, 10000, 0, 20000, 10000, '', '2022-10-27', '10:44:39', 1, 0, '', NULL, 16),
(53, 'C20221027052', 'agam', 80000, 72000, 10, 100000, 28000, 'kkk', '2022-10-27', '10:55:50', 1, 0, '', NULL, 16),
(54, 'C20221101053', 'Pace', 34000, 34000, 0, 50000, 16000, '', '2022-11-01', '12:21:48', 1, 0, '', NULL, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `id_user`) VALUES
(1, ' Kemeja pendek', 2),
(4, ' Nametag ', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL,
  `nama_operator` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_akses` int(3) NOT NULL,
  `last_login` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id_operator`, `nama_operator`, `username`, `password`, `id_akses`, `last_login`, `alamat`) VALUES
(1, 'Alep', 'alep', '123', 3, '2022-11-06', ''),
(2, 'Toko Bangunan Maju Bersama', 'admin', '123', 1, '2022-11-01', 'Jl. Raja Madak 1'),
(17, 'TOKO ALDI', 'aldi', 'aldi123', 0, '2022-10-24', ''),
(20, 'Toko Kue Nasiah', 'nas', '123', 0, '2022-11-01', ''),
(22, 'MURABE', 'Murabe', 'Murabe12@', 0, '2022-11-06', ''),
(23, 'DickiProject ', 'DickiProject', 'diki3211', 0, '2022-11-05', ''),
(24, 'Toko bayi', 'Bay', 'Yi', 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_byr` int(2) NOT NULL,
  `metode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_byr`, `metode`) VALUES
(1, 'Cash'),
(2, 'Transfer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_transaksi` int(11) NOT NULL,
  `id_dtlpen` int(5) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `harga_barang` bigint(20) NOT NULL,
  `sub_total` bigint(20) NOT NULL,
  `id_user` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_transaksi`, `id_dtlpen`, `id_barang`, `jumlah_stok`, `harga_barang`, `sub_total`, `id_user`) VALUES
(95, 37, 85, 1, 100000, 100000, 2),
(96, 38, 85, 3, 100000, 300000, 2),
(98, 40, 86, 1, 80000, 80000, 16),
(99, 41, 86, 1, 80000, 80000, 16),
(100, 42, 86, 1, 80000, 80000, 16),
(101, 42, 87, 1, 400000, 400000, 16),
(102, 43, 85, 1, 100000, 100000, 2),
(103, 44, 85, 1, 100000, 100000, 2),
(104, 45, 86, 2, 80000, 160000, 16),
(105, 46, 86, 2, 80000, 160000, 16),
(106, 46, 89, 3, 10000, 30000, 16),
(107, 46, 88, 1, 35000, 35000, 16),
(108, 47, 86, 1, 80000, 80000, 16),
(109, 47, 89, 1, 10000, 10000, 16),
(110, 48, 88, 3, 35000, 105000, 16),
(111, 48, 86, 1, 80000, 80000, 16),
(112, 49, 89, 1, 10000, 10000, 16),
(113, 49, 88, 1, 35000, 35000, 16),
(114, 50, 88, 1, 35000, 35000, 16),
(115, 50, 89, 1, 10000, 10000, 16),
(116, 51, 86, 1, 80000, 80000, 16),
(117, 51, 89, 1, 10000, 10000, 16),
(118, 51, 88, 1, 35000, 35000, 16),
(119, 52, 89, 1, 10000, 10000, 16),
(120, 53, 86, 1, 80000, 80000, 16),
(121, 54, 91, 2, 17000, 34000, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `tanggal_stok` date NOT NULL,
  `id_user` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id_stok`, `id_barang`, `stok_barang`, `tanggal_stok`, `id_user`) VALUES
(74, 85, 994, '2022-10-23', 2),
(75, 86, 981, '2022-10-27', 16),
(76, 87, 99, '2022-10-23', 16),
(77, 88, 13, '2022-10-27', 16),
(78, 89, 17, '2022-10-27', 16),
(80, 91, 10, '2022-11-05', 22),
(81, 92, 10, '2022-11-05', 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `nama_ukuran` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `nama_ukuran`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL'),
(6, 'No Size');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_byr`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indeks untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_byr` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
