-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 26 Nov 2021 pada 04.31
-- Versi server: 10.5.12-MariaDB
-- Versi PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17809846_trisha`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`) VALUES
(1, 'Nasi Goreng Lado Hijau', 15000),
(2, 'Mie Goreng', 15000),
(3, 'Es Teh Manis', 6000),
(7, 'Jus Jeruk', 12000),
(12, 'Nasi Goreng Lado Hijau Dobel', 18000),
(13, '1', 1),
(14, '2', 2),
(15, '3', 3),
(16, '4', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `tanggal` date NOT NULL,
  `no` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`tanggal`, `no`, `id_barang`, `jumlah_barang`) VALUES
('2021-11-20', 1, 1, 1),
('2021-11-20', 1, 2, 1),
('2021-11-20', 1, 3, 1),
('2021-11-20', 2, 1, 1),
('2021-11-20', 3, 1, 1),
('2021-11-20', 3, 2, 1),
('2021-11-20', 3, 3, 1),
('2021-11-20', 4, 1, 1),
('2021-11-20', 4, 2, 1),
('2021-11-20', 4, 3, 1),
('2021-11-20', 4, 7, 1),
('2021-11-20', 4, 12, 1),
('2021-11-20', 5, 1, 1),
('2021-11-20', 6, 1, 1),
('2021-11-20', 7, 2, 1),
('2021-11-20', 8, 7, 1),
('2021-11-20', 9, 1, 1),
('2021-11-20', 9, 2, 1),
('2021-11-20', 9, 3, 1),
('2021-11-20', 9, 7, 1),
('2021-11-20', 9, 12, 1),
('2021-11-20', 10, 1, 1),
('2021-11-20', 10, 2, 1),
('2021-11-20', 10, 3, 1),
('2021-11-20', 10, 7, 1),
('2021-11-20', 10, 12, 1),
('2021-11-20', 11, 1, 2),
('2021-11-20', 11, 2, 2),
('2021-11-20', 11, 7, 1),
('2021-11-20', 11, 12, 1),
('2021-11-20', 12, 13, 1),
('2021-11-21', 1, 13, 1),
('2021-11-21', 2, 15, 1),
('2021-11-21', 3, 13, 1),
('2021-11-21', 4, 13, 1),
('2021-11-21', 5, 14, 1),
('2021-11-21', 6, 15, 1),
('2021-11-21', 7, 13, 1),
('2021-11-21', 8, 15, 1),
('2021-11-21', 8, 16, 1),
('2021-11-23', 1, 1, 1),
('2021-11-23', 2, 2, 1),
('2021-11-23', 3, 1, 1),
('2021-11-23', 4, 1, 1),
('2021-11-23', 5, 1, 1),
('2021-11-23', 6, 1, 1),
('2021-11-23', 7, 1, 1),
('2021-11-23', 8, 1, 1),
('2021-11-24', 1, 1, 1),
('2021-11-24', 1, 2, 1),
('2021-11-24', 2, 1, 1),
('2021-11-24', 3, 1, 1),
('2021-11-24', 4, 1, 1),
('2021-11-24', 5, 1, 1),
('2021-11-24', 6, 1, 1),
('2021-11-24', 7, 1, 1),
('2021-11-24', 7, 2, 1),
('2021-11-24', 7, 3, 1),
('2021-11-24', 7, 7, 1),
('2021-11-24', 7, 12, 1),
('2021-11-24', 8, 12, 1),
('2021-11-24', 9, 12, 1),
('2021-11-24', 10, 1, 1),
('2021-11-24', 10, 12, 1),
('2021-11-24', 11, 1, 1),
('2021-11-24', 11, 12, 1),
('2021-11-25', 1, 1, 1),
('2021-11-25', 1, 12, 1),
('2021-11-26', 1, 1, 1),
('2021-11-26', 1, 2, 1),
('2021-11-26', 1, 3, 1),
('2021-11-26', 1, 7, 1),
('2021-11-26', 1, 12, 1),
('2021-11-26', 2, 1, 1),
('2021-11-26', 2, 12, 1);

--
-- Trigger `detail_pesanan`
--
DELIMITER $$
CREATE TRIGGER `getIdentifier` BEFORE INSERT ON `detail_pesanan` FOR EACH ROW BEGIN
DECLARE a integer;
SET a = (SELECT MAX(pesanan.no) FROM pesanan WHERE pesanan.tanggal = CURRENT_DATE);

SET new.no = a;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `username` varchar(20) NOT NULL,
  `nama_kasir` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`username`, `nama_kasir`, `password`, `admin`) VALUES
('1', '1', 'c4ca4238a0b923820dcc509a6f75849b', 0),
('2', 'Dua', 'c81e728d9d4c2f636f067f89cc14862c', 0),
('admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `username` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `saldo` int(11) NOT NULL DEFAULT 0,
  `fcm_token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`username`, `nama_pelanggan`, `password`, `email`, `no_hp`, `saldo`, `fcm_token`) VALUES
('abc', 'abc', '900150983cd24fb0d6963f7d28e17f72', 'abc', 'abc', 454000, 'eWKMgIL1T5ywg5MihTU9MG:APA91bFs5WgfeA_meR1SwcUABnBlf-PhwuH-XxTXKC_u1yGaFh07E7Nb0hd4pB3p-kvXai4bVmEK0q7vajb7KwRHyHFY3a1f4meb-JX-GFQ6jJCrAhaJe--dgQIIVMqCQtE1zmQ0x9Dz'),
('def', 'def', '4ed9407630eb1000c0f6b63842defa7d', 'def', 'def', 18000, NULL),
('rasakmarsawa', 'Yoga', 'cd84edc80d0c5b88b98bc67300d4b971', 'rasakmarsawa@gmail.com', '085274224215', 200000, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `no` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `total_harga` int(11) NOT NULL DEFAULT 0,
  `id_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`tanggal`, `no`, `status`, `total_harga`, `id_pelanggan`) VALUES
('2021-11-20', 1, 4, 36000, 'abc'),
('2021-11-20', 2, 4, 15000, 'def'),
('2021-11-20', 3, 5, 36000, 'abc'),
('2021-11-20', 4, 5, 66000, 'abc'),
('2021-11-20', 5, 5, 15000, 'def'),
('2021-11-20', 6, 5, 15000, 'abc'),
('2021-11-20', 7, 5, 15000, 'def'),
('2021-11-20', 8, 4, 12000, 'def'),
('2021-11-20', 9, 5, 66000, 'abc'),
('2021-11-20', 10, 4, 66000, 'abc'),
('2021-11-20', 11, 5, 90000, 'abc'),
('2021-11-20', 12, 5, 1, 'abc'),
('2021-11-21', 1, 5, 1, 'abc'),
('2021-11-21', 2, 5, 3, 'abc'),
('2021-11-21', 3, 5, 1, 'abc'),
('2021-11-21', 4, 5, 1, 'abc'),
('2021-11-21', 5, 5, 2, 'abc'),
('2021-11-21', 6, 5, 3, 'abc'),
('2021-11-21', 7, 5, 1, 'abc'),
('2021-11-21', 8, 5, 7, 'abc'),
('2021-11-23', 1, 4, 15000, 'abc'),
('2021-11-23', 2, 4, 15000, 'abc'),
('2021-11-23', 3, 4, 15000, 'abc'),
('2021-11-23', 4, 4, 15000, 'abc'),
('2021-11-23', 5, 4, 15000, 'abc'),
('2021-11-23', 6, 4, 15000, 'abc'),
('2021-11-23', 7, 4, 15000, 'abc'),
('2021-11-23', 8, 4, 15000, 'abc'),
('2021-11-24', 1, 4, 30000, 'abc'),
('2021-11-24', 2, 4, 15000, 'abc'),
('2021-11-24', 3, 4, 15000, 'abc'),
('2021-11-24', 4, 4, 15000, 'abc'),
('2021-11-24', 5, 4, 15000, 'abc'),
('2021-11-24', 6, 5, 15000, 'abc'),
('2021-11-24', 7, 4, 66000, 'abc'),
('2021-11-24', 8, 4, 18000, 'abc'),
('2021-11-24', 9, 4, 18000, 'abc'),
('2021-11-24', 10, 4, 33000, 'abc'),
('2021-11-24', 11, 4, 33000, 'abc'),
('2021-11-25', 1, 4, 33000, 'abc'),
('2021-11-26', 1, 5, 66000, 'abc'),
('2021-11-26', 2, 4, 33000, 'abc');

--
-- Trigger `pesanan`
--
DELIMITER $$
CREATE TRIGGER `beforeCancel` BEFORE UPDATE ON `pesanan` FOR EACH ROW BEGIN
IF(old.status!=1 AND new.status=5)THEN
SET new.id_pelanggan = null;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `onCancel` AFTER UPDATE ON `pesanan` FOR EACH ROW BEGIN
IF(new.status=5)THEN
UPDATE pelanggan SET pelanggan.saldo = pelanggan.saldo + new.total_harga WHERE pelanggan.username = new.id_pelanggan;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validate_pesanan` BEFORE INSERT ON `pesanan` FOR EACH ROW BEGIN
DECLARE a integer;
DECLARE s integer;
SET s = (select pelanggan.saldo from pelanggan where username = new.id_pelanggan);
IF s < new.total_harga THEN
	SET new.id_pelanggan = null;
ELSE
	SET a = (select max(pesanan.no) from pesanan where pesanan.tanggal = CURRENT_DATE);

	IF a IS null THEN
		SET new.no = 1;
	ELSE
		SET new.no = a+1;
	END IF;
    
    UPDATE pelanggan SET pelanggan.saldo = pelanggan.saldo - new.total_harga where pelanggan.username = new.id_pelanggan;
    
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_antrian`
--

CREATE TABLE `status_antrian` (
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `no` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `id_kasir` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_antrian`
--

INSERT INTO `status_antrian` (`tanggal`, `no`, `status`, `id_kasir`) VALUES
('2021-10-21', '1', 2, '1'),
('2021-10-21', '2', 2, '1'),
('2021-10-21', '3', 2, '1'),
('2021-10-21', '4', 1, '1'),
('2021-10-21', '5', 2, '1'),
('2021-10-21', '6', 1, '2'),
('2021-10-21', '7', 2, '2'),
('2021-10-25', '1', 1, '2'),
('2021-10-25', '2', 2, '2'),
('2021-10-25', '3', 1, '2'),
('2021-11-12', '1', 1, '1'),
('2021-11-12', '2', 2, '1'),
('2021-11-12', '3', 1, '1'),
('2021-11-12', '4', 1, '1'),
('2021-11-12', '5', 1, '1'),
('2021-11-12', '6', 2, '1'),
('2021-11-12', '7', 1, '1'),
('2021-11-12', '8', 2, '1'),
('2021-11-12', '9', 1, '1'),
('2021-11-13', '1', 1, '1'),
('2021-11-15', '1', 1, '1'),
('2021-11-16', '1', 1, '1'),
('2021-11-17', '1', 1, '1'),
('2021-11-18', '1', 1, '1'),
('2021-11-19', '1', 1, '1'),
('2021-11-19', '2', 2, '1'),
('2021-11-19', '3', 1, '1'),
('2021-11-20', '1', 1, '1'),
('2021-11-21', '1', 1, '1'),
('2021-11-23', '1', 1, '1'),
('2021-11-23', '2', 2, '1'),
('2021-11-23', '3', 1, '1'),
('2021-11-24', '1', 1, '1'),
('2021-11-25', '1', 1, '1'),
('2021-11-26', '1', 1, '1');

--
-- Trigger `status_antrian`
--
DELIMITER $$
CREATE TRIGGER `statusantrian` BEFORE INSERT ON `status_antrian` FOR EACH ROW BEGIN
DECLARE a integer;
SET a = (select max(status_antrian.no) from status_antrian where status_antrian.tanggal = CURRENT_DATE);

IF a IS null THEN
	SET new.no = 1;
ELSE
	SET new.no = a+1;        
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `topup`
--

CREATE TABLE `topup` (
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `no` int(11) NOT NULL,
  `jumlah_topup` int(11) NOT NULL,
  `id_kasir` varchar(20) DEFAULT NULL,
  `id_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `topup`
--

INSERT INTO `topup` (`tanggal`, `no`, `jumlah_topup`, `id_kasir`, `id_pelanggan`) VALUES
('2021-11-19', 1, 1000000, '1', 'abc'),
('2021-11-20', 1, 15000, '1', 'def'),
('2021-11-20', 2, 15000, '1', 'def'),
('2021-11-20', 3, 15000, '1', 'def'),
('2021-11-26', 1, 200000, '1', 'rasakmarsawa');

--
-- Trigger `topup`
--
DELIMITER $$
CREATE TRIGGER `topup_no` BEFORE INSERT ON `topup` FOR EACH ROW BEGIN
DECLARE a integer;
SET a = (select max(topup.no) from topup where topup.tanggal = CURRENT_DATE);

IF a IS null THEN
	SET new.no = 1;
ELSE
	SET new.no = a+1;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `topup_update_saldo` AFTER INSERT ON `topup` FOR EACH ROW BEGIN
UPDATE pelanggan 
SET pelanggan.saldo = pelanggan.saldo+new.jumlah_topup
WHERE
pelanggan.username = new.id_pelanggan;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`tanggal`,`no`,`id_barang`),
  ADD KEY `barang_detail_pesanan_fk` (`id_barang`);

--
-- Indeks untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`tanggal`,`no`),
  ADD KEY `pelanggan_pesanan_fk` (`id_pelanggan`);

--
-- Indeks untuk tabel `status_antrian`
--
ALTER TABLE `status_antrian`
  ADD PRIMARY KEY (`tanggal`,`no`),
  ADD KEY `kasir_status_antrian_fk` (`id_kasir`);

--
-- Indeks untuk tabel `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`tanggal`,`no`),
  ADD KEY `pelanggan_topup_fk` (`id_pelanggan`),
  ADD KEY `kasir_topup_fk` (`id_kasir`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `barang_detail_pesanan_fk` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_detail_pesanan_fk` FOREIGN KEY (`tanggal`,`no`) REFERENCES `pesanan` (`tanggal`, `no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pelanggan_pesanan_fk` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `status_antrian`
--
ALTER TABLE `status_antrian`
  ADD CONSTRAINT `kasir_status_antrian_fk` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`username`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `topup`
--
ALTER TABLE `topup`
  ADD CONSTRAINT `kasir_topup_fk` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`username`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pelanggan_topup_fk` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
