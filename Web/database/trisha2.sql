-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2021 pada 17.25
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trisha2`
--

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `getNow` () RETURNS DATETIME BEGIN
	DECLARE x datetime;
	SET x = (SELECT now());
    RETURN x;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(35) NOT NULL,
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
(12, 'Nasi Goreng Lado Hijau Double', 18000);

--
-- Trigger `barang`
--
DELIMITER $$
CREATE TRIGGER `checkNamaBarang` BEFORE INSERT ON `barang` FOR EACH ROW BEGIN
DECLARE a integer;
SET a = (select count(*) from barang where nama_barang = new.nama_barang);

IF (a>0) THEN
SET new.id_barang = 'abc';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `tanggal` date NOT NULL,
  `no` int(4) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`tanggal`, `no`, `id_barang`, `jumlah_barang`) VALUES
('2021-11-24', 9, 1, 1),
('2021-11-24', 9, 2, 1),
('2021-11-24', 9, 12, 1),
('2021-11-26', 6, 1, 1),
('2021-11-26', 6, 2, 1),
('2021-11-26', 6, 12, 1),
('2021-12-01', 1, 1, 1),
('2021-12-01', 1, 2, 1),
('2021-12-01', 1, 12, 1),
('2021-12-01', 2, 1, 1),
('2021-12-01', 2, 2, 1),
('2021-12-01', 2, 12, 1),
('2021-12-01', 3, 1, 1),
('2021-12-01', 3, 12, 1),
('2021-12-01', 4, 1, 1),
('2021-12-01', 4, 2, 1),
('2021-12-01', 4, 12, 1),
('2021-12-01', 5, 1, 1),
('2021-12-01', 5, 2, 1),
('2021-12-01', 5, 12, 1),
('2021-12-01', 7, 3, 1),
('2021-12-01', 8, 1, 1),
('2021-12-01', 8, 2, 1),
('2021-12-01', 8, 3, 2),
('2021-12-01', 10, 1, 1),
('2021-12-01', 10, 12, 1),
('2021-12-01', 11, 1, 1),
('2021-12-01', 11, 12, 1),
('2021-12-01', 12, 12, 1),
('2021-12-01', 13, 12, 1),
('2021-12-01', 14, 1, 1),
('2021-12-01', 14, 12, 1),
('2021-12-01', 15, 12, 1),
('2021-12-01', 16, 12, 1),
('2021-12-01', 17, 3, 1),
('2021-12-01', 18, 3, 1),
('2021-12-01', 19, 3, 1),
('2021-12-01', 20, 3, 1),
('2021-12-01', 21, 3, 1),
('2021-12-01', 22, 3, 1),
('2021-12-01', 23, 3, 1),
('2021-12-02', 1, 1, 1),
('2021-12-02', 1, 12, 1),
('2021-12-02', 2, 2, 1),
('2021-12-02', 2, 7, 1),
('2021-12-02', 2, 12, 1),
('2021-12-02', 3, 1, 1),
('2021-12-02', 3, 2, 1),
('2021-12-02', 3, 3, 1),
('2021-12-02', 3, 7, 1),
('2021-12-02', 3, 12, 1),
('2021-12-05', 1, 1, 1),
('2021-12-05', 1, 12, 1),
('2021-12-05', 2, 1, 1),
('2021-12-05', 2, 2, 1),
('2021-12-05', 2, 12, 1),
('2021-12-05', 3, 12, 1),
('2021-12-05', 4, 12, 1),
('2021-12-05', 5, 12, 1),
('2021-12-05', 6, 1, 2),
('2021-12-05', 6, 2, 2),
('2021-12-05', 6, 3, 4),
('2021-12-05', 6, 7, 3),
('2021-12-05', 6, 12, 1),
('2021-12-05', 7, 12, 1),
('2021-12-05', 8, 1, 1),
('2021-12-05', 8, 12, 1);

--
-- Trigger `detail_pesanan`
--
DELIMITER $$
CREATE TRIGGER `getIdentifier` BEFORE INSERT ON `detail_pesanan` FOR EACH ROW BEGIN
DECLARE a integer;

SET new.tanggal = DATE(getNow());

SET a = (SELECT MAX(pesanan.no) FROM pesanan WHERE pesanan.tanggal = new.tanggal);

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
('1', 'Adi', 'c4ca4238a0b923820dcc509a6f75849b', 0),
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
  `verify_status` tinyint(1) NOT NULL DEFAULT 0,
  `request_create` datetime DEFAULT NULL,
  `request_type` varchar(3) DEFAULT 'REG',
  `request_key` varchar(50) DEFAULT NULL,
  `fcm_token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`username`, `nama_pelanggan`, `password`, `email`, `no_hp`, `saldo`, `verify_status`, `request_create`, `request_type`, `request_key`, `fcm_token`) VALUES
('', 'guess', '', '', '', 0, 2, NULL, NULL, NULL, NULL),
('marsawa002', 'marsawa002', '8e933201a769ead05cad04b3fad8adbb', 'marsawa002@gmail.com', '081234567890', 559000, 1, '2021-11-30 01:22:03', 'FPW', '353566d4db4843592f30255e72a1fac1', 'e1adR_qkWgxkWLan9L_ir5:APA91bHGbdsIPrUcwCyJ5JsjGdxHaua1ERt9G3O4eV3WPMqJDM_COyOG-kHL-GSpw0eUVqJsvD6YQggzc8U9SuHUFgh7pxBMp9FgVYyeheyt7Gh2b1pdxHd84WP7RMy0BwUx-B6gWkHe'),
('marsawa004', 'marsawa004', '8e933201a769ead05cad04b3fad8adbb', 'marsawa004@gmail.com', '08123456789', 8000, 1, '2021-11-29 10:14:04', 'FPW', 'a2afe9692da8ea90c8b4fbd15a595986', NULL),
('rasakmarsawa', 'Yoga', '8e933201a769ead05cad04b3fad8adbb', 'rasakmarsawa@gmail.com', '085274224215', 250003, 1, '2021-11-30 09:15:50', 'FPW', 'db64811e36e50479e47b055d0b03c640', 'eWKMgIL1T5ywg5MihTU9MG:APA91bFs5WgfeA_meR1SwcUABnBlf-PhwuH-XxTXKC_u1yGaFh07E7Nb0hd4pB3p-kvXai4bVmEK0q7vajb7KwRHyHFY3a1f4meb-JX-GFQ6jJCrAhaJe--dgQIIVMqCQtE1zmQ0x9Dz');

--
-- Trigger `pelanggan`
--
DELIMITER $$
CREATE TRIGGER `getRegKey` BEFORE INSERT ON `pelanggan` FOR EACH ROW BEGIN
SET new.request_create = GetNow();

SET new.request_key = MD5(CONCAT(new.username,new.request_create));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `tanggal` date NOT NULL,
  `no` int(4) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `total_harga` int(11) NOT NULL DEFAULT 0,
  `id_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`tanggal`, `no`, `status`, `total_harga`, `id_pelanggan`) VALUES
('2021-11-24', 9, 4, 48000, 'marsawa002'),
('2021-11-26', 6, 4, 48000, 'marsawa002'),
('2021-12-01', 1, 4, 48000, ''),
('2021-12-01', 2, 4, 48000, ''),
('2021-12-01', 3, 4, 33000, ''),
('2021-12-01', 4, 5, 48000, 'marsawa002'),
('2021-12-01', 5, 4, 48000, 'marsawa002'),
('2021-12-01', 7, 4, 6000, 'marsawa002'),
('2021-12-01', 8, 4, 42000, 'marsawa002'),
('2021-12-01', 10, 4, 33000, 'marsawa002'),
('2021-12-01', 11, 4, 33000, 'marsawa002'),
('2021-12-01', 12, 4, 18000, 'marsawa002'),
('2021-12-01', 13, 4, 18000, 'marsawa002'),
('2021-12-01', 14, 4, 33000, 'marsawa002'),
('2021-12-01', 15, 4, 18000, 'marsawa002'),
('2021-12-01', 16, 4, 18000, 'rasakmarsawa'),
('2021-12-01', 17, 5, 6000, 'rasakmarsawa'),
('2021-12-01', 18, 4, 6000, 'rasakmarsawa'),
('2021-12-01', 19, 4, 6000, 'rasakmarsawa'),
('2021-12-01', 20, 4, 6000, 'rasakmarsawa'),
('2021-12-01', 21, 4, 6000, 'rasakmarsawa'),
('2021-12-01', 22, 4, 6000, 'rasakmarsawa'),
('2021-12-01', 23, 5, 6000, 'rasakmarsawa'),
('2021-12-02', 1, 4, 33000, ''),
('2021-12-02', 2, 4, 45000, ''),
('2021-12-02', 3, 4, 66000, ''),
('2021-12-05', 1, 4, 33000, ''),
('2021-12-05', 2, 4, 48000, ''),
('2021-12-05', 3, 4, 18000, ''),
('2021-12-05', 4, 4, 18000, ''),
('2021-12-05', 5, 4, 18000, ''),
('2021-12-05', 6, 4, 138000, ''),
('2021-12-05', 7, 4, 18000, ''),
('2021-12-05', 8, 4, 33000, '');

--
-- Trigger `pesanan`
--
DELIMITER $$
CREATE TRIGGER `beforeCancel` BEFORE UPDATE ON `pesanan` FOR EACH ROW BEGIN
IF (new.status=5) THEN
	IF (old.status!=1) THEN
    	SET new.status = NULL;
    END IF;
ELSE
	IF (old.status=5) THEN
    	SET new.status = NULL;
    END IF;	
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
DECLARE x integer;

SET new.tanggal = DATE(getNow());

SET a = (select max(pesanan.no) from pesanan where pesanan.tanggal = new.tanggal);

IF a IS null THEN
	SET new.no = 1;
ELSE
	SET new.no = a+1;
END IF;

SELECT pelanggan.saldo,pelanggan.verify_status INTO s,x FROM pelanggan WHERE username = new.id_pelanggan;

IF x != 0 THEN
	IF x = 1 THEN
    	IF s < new.total_harga THEN
        	SET new.id_pelanggan = null;
        ELSE
        	UPDATE pelanggan SET pelanggan.saldo = pelanggan.saldo - new.total_harga where pelanggan.username = new.id_pelanggan;
        END IF;
    END IF;
ELSE
	SET new.id_pelanggan = null;
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_antrian`
--

CREATE TABLE `status_antrian` (
  `tanggal` date NOT NULL,
  `no` int(2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_kasir` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_antrian`
--

INSERT INTO `status_antrian` (`tanggal`, `no`, `status`, `id_kasir`) VALUES
('2021-11-29', 1, 1, '1'),
('2021-11-29', 2, 2, '1'),
('2021-11-29', 3, 1, '1'),
('2021-11-29', 4, 2, '1'),
('2021-11-29', 5, 1, '1'),
('2021-11-30', 1, 1, '1'),
('2021-12-01', 1, 1, '1'),
('2021-12-02', 1, 1, '1'),
('2021-12-02', 2, 2, '1'),
('2021-12-02', 3, 1, '1'),
('2021-12-02', 4, 2, '1'),
('2021-12-02', 5, 1, '1'),
('2021-12-05', 1, 1, '1'),
('2021-12-05', 2, 2, '1'),
('2021-12-05', 3, 1, '1'),
('2021-12-05', 4, 2, '1'),
('2021-12-05', 5, 1, '1'),
('2021-12-05', 6, 2, '1'),
('2021-12-05', 7, 1, '1'),
('2021-12-05', 8, 2, '1'),
('2021-12-05', 9, 1, '1'),
('2021-12-05', 10, 2, '1'),
('2021-12-05', 11, 1, '1'),
('2021-12-05', 12, 2, '1'),
('2021-12-05', 13, 1, '1'),
('2021-12-05', 14, 2, '1'),
('2021-12-05', 15, 1, '1'),
('2021-12-05', 16, 2, '1'),
('2021-12-05', 17, 1, '1'),
('2021-12-05', 18, 2, '1'),
('2021-12-05', 19, 1, '1'),
('2021-12-05', 20, 2, '1'),
('2021-12-05', 21, 1, '1'),
('2021-12-05', 22, 2, '1'),
('2021-12-05', 23, 1, '1'),
('2021-12-05', 24, 2, '1');

--
-- Trigger `status_antrian`
--
DELIMITER $$
CREATE TRIGGER `statusantrian` BEFORE INSERT ON `status_antrian` FOR EACH ROW BEGIN
DECLARE a integer;

SET new.tanggal = DATE(getNow());

SET a = (select max(status_antrian.no) from status_antrian where status_antrian.tanggal = new.tanggal);

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
-- Struktur dari tabel `status_pesanan`
--

CREATE TABLE `status_pesanan` (
  `id_status` int(1) NOT NULL,
  `nama_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `status_pesanan`
--

INSERT INTO `status_pesanan` (`id_status`, `nama_status`, `message`) VALUES
(1, 'Menunggu', ''),
(2, 'Diproses', 'Pesananmu udah mulai disiapin nih.'),
(3, 'Menunggu Pengambilan', 'Pesananmu udah siap. Lagi nunggu jemputan.'),
(4, 'Selesai', 'Pesananmu sudah diambil dan selesai ya. Selamat makan.'),
(5, 'Dibatalkan', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `topup`
--

CREATE TABLE `topup` (
  `tanggal` date NOT NULL,
  `no` int(4) NOT NULL,
  `jumlah_topup` int(11) NOT NULL,
  `id_kasir` varchar(20) DEFAULT NULL,
  `id_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `topup`
--

INSERT INTO `topup` (`tanggal`, `no`, `jumlah_topup`, `id_kasir`, `id_pelanggan`) VALUES
('2021-11-29', 1, 1000000, '1', 'marsawa002'),
('2021-11-30', 1, 50000, '1', 'marsawa004'),
('2021-11-30', 2, 100000, '1', 'rasakmarsawa'),
('2021-12-01', 1, 10000, '1', 'rasakmarsawa'),
('2021-12-01', 2, 1, '1', 'rasakmarsawa'),
('2021-12-01', 3, 9999, '1', 'rasakmarsawa'),
('2021-12-05', 1, 46000, '1', 'rasakmarsawa'),
('2021-12-05', 2, 50000, '1', 'rasakmarsawa'),
('2021-12-05', 3, 50000, '1', 'rasakmarsawa'),
('2021-12-05', 4, 10000, '1', 'rasakmarsawa'),
('2021-12-05', 5, 10000, '1', 'rasakmarsawa'),
('2021-12-05', 6, 10000, '1', 'rasakmarsawa'),
('2021-12-05', 7, 10001, '1', 'rasakmarsawa'),
('2021-12-05', 8, 2, '1', 'rasakmarsawa');

--
-- Trigger `topup`
--
DELIMITER $$
CREATE TRIGGER `topup_no` BEFORE INSERT ON `topup` FOR EACH ROW BEGIN
DECLARE a integer;

SET new.tanggal = DATE(getNow());

SET a = (select max(topup.no) from topup where topup.tanggal = new.tanggal);

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
  ADD KEY `pelanggan_pesanan_fk` (`id_pelanggan`),
  ADD KEY `id_status` (`status`);

--
-- Indeks untuk tabel `status_antrian`
--
ALTER TABLE `status_antrian`
  ADD PRIMARY KEY (`tanggal`,`no`),
  ADD KEY `kasir_status_antrian_fk` (`id_kasir`);

--
-- Indeks untuk tabel `status_pesanan`
--
ALTER TABLE `status_pesanan`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `id_status` (`id_status`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  ADD CONSTRAINT `pelanggan_pesanan_fk` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status_pesanan` (`id_status`) ON DELETE CASCADE;

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
