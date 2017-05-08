-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2017 at 12:49 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bioskop`
--

CREATE TABLE `bioskop` (
  `id_bioskop` varchar(15) NOT NULL,
  `id_manager` int(4) NOT NULL,
  `nama_bioskop` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bioskop`
--

INSERT INTO `bioskop` (`id_bioskop`, `id_manager`, `nama_bioskop`, `alamat`) VALUES
('BS001', 4, 'Dinoyo Cineplex', 'Jalan Dinoyo no 1 Malang'),
('BS002', 7, '21 Malang Plaza', 'Jalan Mawar'),
('BS003', 6, 'Sarinah Cineplex', 'Jalan alun-alun Malang'),
('BS004', 7, 'Dieng XXI', 'Jalan Dieng 1 Malang');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `saldo` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `email`, `nama`, `gender`, `no_hp`, `saldo`) VALUES
('CTM002', 'faf@gmail.com', 'sd', 'Perempuan', '086543215611', 116000),
('CTM007', 'chusmitaadi0516@gmail.com', 'ui', 'Laki-laki', '083834177799', 79000),
('CTM008', 'tika@gmail.com', 'hsjshja', 'Laki-laki', '7374937487334', 9000000),
('CTM009', 'tikaakusumaa@gmail.com', 'lilis', 'Perempuan', '089612311623', 100000),
('CTM010', 'tikakusuma03@gmail.com', 'tika', 'Perempuan', '081222121999', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `jam_pemutaran`
--

CREATE TABLE `jam_pemutaran` (
  `id_jadwal` varchar(15) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam_pemutaran`
--

INSERT INTO `jam_pemutaran` (`id_jadwal`, `jam`) VALUES
('1', '02:00:00'),
('2', '13:00:00'),
('3', '14:25:00'),
('4', '16:25:00'),
('5', '17:00:00'),
('6', '18:00:00'),
('7', '20:00:00'),
('8', '21:00:00'),
('9', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kursi_bioskop`
--

CREATE TABLE `kursi_bioskop` (
  `id_kursi` varchar(15) NOT NULL,
  `nama_kursi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursi_bioskop`
--

INSERT INTO `kursi_bioskop` (`id_kursi`, `nama_kursi`) VALUES
('1', 'A1'),
('10', 'A10'),
('11', 'B1'),
('12', 'B2'),
('13', 'B3'),
('14', 'B4'),
('15', 'B5'),
('16', 'B6'),
('17', 'B7'),
('18', 'B8'),
('19', 'B9'),
('2', 'A2'),
('20', 'B10'),
('21', 'C1'),
('22', 'C2'),
('23', 'C3'),
('24', 'C4'),
('25', 'C5'),
('26', 'C6'),
('27', 'C7'),
('28', 'C8'),
('29', 'C9'),
('3', 'A3'),
('30', 'C10'),
('4', 'A4'),
('5', 'A5'),
('6', 'A6'),
('7', 'A7'),
('8', 'A8'),
('9', 'A9');

-- --------------------------------------------------------

--
-- Table structure for table `manager_register`
--

CREATE TABLE `manager_register` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `no_rekening` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manager_register`
--

INSERT INTO `manager_register` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture_url`, `profile_url`, `created`, `modified`, `no_rekening`, `saldo`) VALUES
(4, 'google', '103594736457296581338', 'Chusmita', 'Adi', 'chusmitaadi0516@gmail.com', 'male', 'in', 'https://lh6.googleusercontent.com/-eTN9I0tzWIY/AAAAAAAAAAI/AAAAAAAAABk/MAImoBnbSCU/photo.jpg', 'https://plus.google.com/103594736457296581338', '2017-04-11 11:10:39', '2017-05-01 12:47:52', '0', 577000),
(5, 'google', '109086189261824735957', 'Tika', 'Kusuma', 'tikakusuma03@gmail.com', 'female', 'in', 'https://lh5.googleusercontent.com/-jg5iMJG5DqY/AAAAAAAAAAI/AAAAAAAAAGI/QpGVosVLHsg/photo.jpg', 'https://plus.google.com/109086189261824735957', '2017-04-13 14:15:02', '2017-04-13 14:35:42', '0', 0),
(6, 'google', '108235373229104738387', 'Adi', 'Pranoto', 'selvianaadi65@gmail.com', 'male', 'in', 'https://lh4.googleusercontent.com/-jG48zDyQKqg/AAAAAAAAAAI/AAAAAAAABH8/S1A_ij-PTjs/photo.jpg', 'https://plus.google.com/108235373229104738387', '2017-04-13 14:34:38', '2017-04-13 15:19:48', '0', 0),
(7, 'google', '110179582775645620288', 'tika', 'kusuma', 'tikaakusumaa@gmail.com', NULL, 'en', 'https://lh3.googleusercontent.com/-XwEDX95uMGo/AAAAAAAAAAI/AAAAAAAAABA/GVmTSiqA4CM/photo.jpg', '', '2017-04-17 05:45:36', '2017-04-30 18:14:46', '0', 0),
(8, 'google', '102557159192632125437', 'Ardhi', 'Fauzi', 'ar.dhi950@gmail.com', NULL, 'en', 'https://lh3.googleusercontent.com/-eG2OUzZGACI/AAAAAAAAAAI/AAAAAAAAA48/QiqYDqRZOc8/photo.jpg', '', '2017-04-17 05:47:37', '2017-04-17 05:50:52', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id_movie` varchar(15) NOT NULL,
  `id_bioskop` varchar(15) NOT NULL,
  `nama_film` varchar(20) NOT NULL,
  `id_jadwal` varchar(15) NOT NULL,
  `harga` int(9) NOT NULL,
  `kategori` enum('Action','Adventure','Animation','Biography','Comedy','Crime','Documentary','Drama','Family','Fantasy','History','Horror','Musical','Mistery','Roance','Science','Sport','Triller','War','western') NOT NULL,
  `sinopsis` text NOT NULL,
  `kuota` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id_movie`, `id_bioskop`, `nama_film`, `id_jadwal`, `harga`, `kategori`, `sinopsis`, `kuota`) VALUES
('BS001MJ4RMV002', 'BS001', 'Kahitna', '1', 23000, 'Drama', '<p>ini adalah movie ter laris pada minggu ini anda bisa tercengang jika tidak nonton</p>\r\n', 18),
('BS001MJ4RMV003', 'BS001', 'DANUR', '2', 25000, 'Horror', 'fILm hantu yang nyata', 0),
('BS001MJ4RMV004', 'BS001', 'SI Miskin dan Kaya', '3', 20000, 'Comedy', '<p>sinopsis e aku lali</p>\r\n', 100),
('BS002MJ7RMV001', 'BS002', 'Ika', '5', 21000, 'Crime', '<p>This is my textarea to be replaced with CKEditor.</p>\r\n', 81);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_tiket`
--

CREATE TABLE `pembelian_tiket` (
  `id_pembelian` varchar(15) NOT NULL,
  `id_customer` varchar(15) NOT NULL,
  `id_bioskop` varchar(15) NOT NULL,
  `id_movie` varchar(15) NOT NULL,
  `id_kursi` varchar(15) NOT NULL,
  `tanggal_pemutaran` date NOT NULL,
  `id_jadwal` varchar(15) NOT NULL,
  `jml_uang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_tiket`
--

INSERT INTO `pembelian_tiket` (`id_pembelian`, `id_customer`, `id_bioskop`, `id_movie`, `id_kursi`, `tanggal_pemutaran`, `id_jadwal`, `jml_uang`) VALUES
('1', 'CTM002', 'BS001', 'BS001MJ4RMV003', '1', '2017-04-04', '1', '200000');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_tiket`
--

CREATE TABLE `penjualan_tiket` (
  `id_penjualan` varchar(15) NOT NULL,
  `id_pembelian` varchar(15) NOT NULL,
  `id_bioskop` varchar(15) NOT NULL,
  `jml_uang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyedia_layanan`
--

CREATE TABLE `penyedia_layanan` (
  `id_admin` varchar(15) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `saldo` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyedia_layanan`
--

INSERT INTO `penyedia_layanan` (`id_admin`, `nama`, `saldo`, `email`, `password`) VALUES
('admin', 'admin', 57700, 'bieji', 'd41d8cd98f00b204e9800998ecf8427e');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_saldo`
--

CREATE TABLE `transaksi_saldo` (
  `id_transaksi_saldo` varchar(15) NOT NULL,
  `jumlah_saldo` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_customer` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_saldo`
--

INSERT INTO `transaksi_saldo` (`id_transaksi_saldo`, `jumlah_saldo`, `tanggal`, `id_customer`, `status`) VALUES
('NA001', 30000, '2017-04-24', 'CTM002', 'accepted'),
('T077', 10000, '2017-04-24', 'CTM002', 'accepted'),
('V561', 30000, '2017-04-24', 'CTM002', 'accepted');

--
-- Triggers `transaksi_saldo`
--
DELIMITER $$
CREATE TRIGGER `TG_beli` AFTER INSERT ON `transaksi_saldo` FOR EACH ROW BEGIN
UPDATE `customer` SET saldo = saldo + new.jumlah_saldo
WHERE id_customer = new.id_customer;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_withdrawal`
--

CREATE TABLE `transaksi_withdrawal` (
  `id_withdrawal` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time DEFAULT NULL,
  `id_manager` int(11) NOT NULL,
  `id_admin` varchar(15) NOT NULL,
  `jumlah` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_withdrawal`
--

INSERT INTO `transaksi_withdrawal` (`id_withdrawal`, `tanggal`, `waktu`, `id_manager`, `id_admin`, `jumlah`, `status`) VALUES
('4545', '2017-05-01', '05:26:00', 4, 'admin', '43500', 1),
('54353', '2017-05-05', '00:00:00', 4, 'admin', '50000', 1),
('sjdgsasjhda', '2017-04-30', '00:00:00', 4, 'admin', '200000', 1),
('yutuz', '2017-05-01', '00:00:00', 4, 'admin', '20000', 0);

--
-- Triggers `transaksi_withdrawal`
--
DELIMITER $$
CREATE TRIGGER `TG_TFSaldo` AFTER UPDATE ON `transaksi_withdrawal` FOR EACH ROW BEGIN
UPDATE `manager_register` SET `saldo` = saldo + new.jumlah WHERE `manager_register`.`id` = new.id_manager;

UPDATE `penyedia_layanan` SET `saldo` = saldo + new.jumlah/10 WHERE `penyedia_layanan`.`id_admin` = 'admin';

END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bioskop`
--
ALTER TABLE `bioskop`
  ADD PRIMARY KEY (`id_bioskop`),
  ADD KEY `id_manager` (`id_manager`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `jam_pemutaran`
--
ALTER TABLE `jam_pemutaran`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kursi_bioskop`
--
ALTER TABLE `kursi_bioskop`
  ADD PRIMARY KEY (`id_kursi`);

--
-- Indexes for table `manager_register`
--
ALTER TABLE `manager_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id_movie`),
  ADD KEY `id_bioskop` (`id_bioskop`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `pembelian_tiket`
--
ALTER TABLE `pembelian_tiket`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_bioskop` (`id_bioskop`),
  ADD KEY `id_movie` (`id_movie`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_kursi` (`id_kursi`);

--
-- Indexes for table `penjualan_tiket`
--
ALTER TABLE `penjualan_tiket`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `penyedia_layanan`
--
ALTER TABLE `penyedia_layanan`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `transaksi_saldo`
--
ALTER TABLE `transaksi_saldo`
  ADD PRIMARY KEY (`id_transaksi_saldo`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `transaksi_withdrawal`
--
ALTER TABLE `transaksi_withdrawal`
  ADD PRIMARY KEY (`id_withdrawal`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_manager` (`id_manager`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manager_register`
--
ALTER TABLE `manager_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bioskop`
--
ALTER TABLE `bioskop`
  ADD CONSTRAINT `bioskop_ibfk_1` FOREIGN KEY (`id_manager`) REFERENCES `manager_register` (`id`);

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`id_bioskop`) REFERENCES `bioskop` (`id_bioskop`),
  ADD CONSTRAINT `movie_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jam_pemutaran` (`id_jadwal`);

--
-- Constraints for table `pembelian_tiket`
--
ALTER TABLE `pembelian_tiket`
  ADD CONSTRAINT `pembelian_tiket_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `pembelian_tiket_ibfk_2` FOREIGN KEY (`id_bioskop`) REFERENCES `bioskop` (`id_bioskop`),
  ADD CONSTRAINT `pembelian_tiket_ibfk_3` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id_movie`),
  ADD CONSTRAINT `pembelian_tiket_ibfk_4` FOREIGN KEY (`id_jadwal`) REFERENCES `jam_pemutaran` (`id_jadwal`),
  ADD CONSTRAINT `pembelian_tiket_ibfk_5` FOREIGN KEY (`id_kursi`) REFERENCES `kursi_bioskop` (`id_kursi`);

--
-- Constraints for table `transaksi_saldo`
--
ALTER TABLE `transaksi_saldo`
  ADD CONSTRAINT `transaksi_saldo_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `transaksi_withdrawal`
--
ALTER TABLE `transaksi_withdrawal`
  ADD CONSTRAINT `transaksi_withdrawal_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `penyedia_layanan` (`id_admin`),
  ADD CONSTRAINT `transaksi_withdrawal_ibfk_3` FOREIGN KEY (`id_manager`) REFERENCES `manager_register` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
