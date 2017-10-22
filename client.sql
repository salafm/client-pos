-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Okt 2017 pada 13.36
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `client`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `apilogin`
--

CREATE TABLE `apilogin` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telfon` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `apikeys` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) UNSIGNED NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(11) UNSIGNED NOT NULL,
  `stok` decimal(10,3) UNSIGNED NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `cons` decimal(10,5) NOT NULL DEFAULT '1.00000',
  `tanggal` datetime(2) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `id` int(11) NOT NULL,
  `idtransaksi` varchar(15) NOT NULL,
  `idpetugas` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `totalbarang` int(2) UNSIGNED NOT NULL,
  `totalharga` int(10) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangkeluar_details`
--

CREATE TABLE `barangkeluar_details` (
  `id` int(11) NOT NULL,
  `idtransaksi` varchar(15) NOT NULL,
  `idproduk` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jumlah` int(2) UNSIGNED NOT NULL,
  `harga` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `barangkeluar_details`
--
DELIMITER $$
CREATE TRIGGER `kurang_bahan` BEFORE INSERT ON `barangkeluar_details` FOR EACH ROW UPDATE barang INNER JOIN produk_details ON produk_details.idbarang = barang.idbarang SET stok = stok - (jumlah*NEW.jumlah) WHERE idproduk = NEW.idproduk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `id` int(11) NOT NULL,
  `idtransaksi` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk_details`
--

CREATE TABLE `barangmasuk_details` (
  `id` int(11) NOT NULL,
  `idtransaksi` varchar(10) NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `harga` int(11) UNSIGNED DEFAULT '0',
  `jumlah` int(11) UNSIGNED NOT NULL,
  `satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `barangmasuk_details`
--
DELIMITER $$
CREATE TRIGGER `tambah_stok_barang` AFTER INSERT ON `barangmasuk_details` FOR EACH ROW UPDATE barang SET stok = stok + (cons*(NEW.jumlah)) WHERE idbarang = NEW.idbarang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk_sementara`
--

CREATE TABLE `barangmasuk_sementara` (
  `id` int(11) NOT NULL,
  `idtransaksi` varchar(10) NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `harga` int(11) UNSIGNED DEFAULT '0',
  `jumlah` int(11) UNSIGNED NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(5) UNSIGNED NOT NULL,
  `idpetugas` varchar(10) NOT NULL,
  `user` varchar(15) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `idproduk` varchar(13) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(11) UNSIGNED NOT NULL,
  `stok` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_details`
--

CREATE TABLE `produk_details` (
  `id` int(11) UNSIGNED NOT NULL,
  `idproduk` varchar(13) NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `jumlah` decimal(10,3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_dtl`
--

CREATE TABLE `trans_dtl` (
  `id` int(11) NOT NULL,
  `idtransaksi` varchar(15) NOT NULL,
  `idproduk` varchar(10) NOT NULL,
  `jumlah` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_meja`
--

CREATE TABLE `trans_meja` (
  `id` int(11) NOT NULL,
  `idtransaksi` varchar(15) DEFAULT '0',
  `meja` int(2) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apilogin`
--
ALTER TABLE `apilogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idtransaksi` (`idtransaksi`),
  ADD UNIQUE KEY `dupidx` (`idtransaksi`);

--
-- Indexes for table `barangkeluar_details`
--
ALTER TABLE `barangkeluar_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangmasuk_details`
--
ALTER TABLE `barangmasuk_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangmasuk_sementara`
--
ALTER TABLE `barangmasuk_sementara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `idpetugas` (`idpetugas`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idproduk` (`idproduk`);

--
-- Indexes for table `produk_details`
--
ALTER TABLE `produk_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_dtl`
--
ALTER TABLE `trans_dtl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_meja`
--
ALTER TABLE `trans_meja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apilogin`
--
ALTER TABLE `apilogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barangkeluar_details`
--
ALTER TABLE `barangkeluar_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barangmasuk_details`
--
ALTER TABLE `barangmasuk_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barangmasuk_sementara`
--
ALTER TABLE `barangmasuk_sementara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk_details`
--
ALTER TABLE `produk_details`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trans_dtl`
--
ALTER TABLE `trans_dtl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trans_meja`
--
ALTER TABLE `trans_meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
