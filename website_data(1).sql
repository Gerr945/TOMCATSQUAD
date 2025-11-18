-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2025 at 09:32 AM
-- Server version: 5.7.39
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `formulir`
--

CREATE TABLE `formulir` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `jenjang` varchar(10) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `program` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formulir`
--

INSERT INTO `formulir` (`id`, `nama`, `email`, `telepon`, `jenjang`, `jurusan`, `kelas`, `program`, `pesan`, `tanggal`) VALUES
(15, 'qwerty', 'qwerty@gmail.com', '085814005660', '11', 'DKV', '2', 'Dasar Mikrotik', 'hehe', '2025-10-15 13:05:14'),
(16, 'ppp', 'ppp@gmail.com', '083485739399', '10', 'RPL', '3', 'Robotic Arduino', 'ppp', '2025-10-15 14:37:30'),
(17, 'baba', 'baba@gmail.com', '805843502345', '10', 'DKV', '1', 'Dasar Mikrotik', 'bwa bwa babababwa', '2025-10-17 10:24:24'),
(18, 'Geronimo Estrada Ramadhan', 'geronimoestradaramadhan@gmail.com', '085814005660', '11', 'RPL', '2', 'Dasar Mikrotik', 'apakah sekarang pendaftaran tomcat masih terbuka?', '2025-10-17 11:17:03'),
(19, 'Morren Bangkit Al-Fatih', 'morrenbangkitfatih@gmail.com', '085835463123', '11', 'RPL', '1', 'Dasar Mikrotik', 'mau daftar eskul min, apakah masih dibuka?', '2025-10-17 13:27:19'),
(21, 'Azka', 'azka@gmail.com', '085812237685', '10', 'RPL', '3', 'Dasar Mikrotik', 'mabar bang, gw exp', '2025-10-19 13:49:02'),
(22, 'Dzaky Alfakhri Ramadhan', 'dzakyganteng@gmail.com', '085774334300', '11', 'RPL', '2', 'Dasar Mikrotik', 'saya ganteng gak min', '2025-10-20 00:48:34'),
(23, 'Fazlan', 'fazlan@gmail.com', '0818417312', '11', 'RPL', '2', 'Dasar Mikrotik', 'ppp', '2025-10-24 01:32:39'),
(27, 'janaba', 'janaba@gmail.com', '0858237628', '10', 'RPL', '3', 'Dasar Mikrotik', 'hai jan', '2025-10-24 02:45:09'),
(28, 'Gayuh Ackerman', 'anggergayuh2515@gmail.com', '081909292992', '12', 'TKJ', '2', 'Robotic Arduino', 'aku mau makan mbg', '2025-10-24 05:40:14'),
(29, 'Muhammad Rizky Arfian', 'rizkyarfian@gmail.com', '082747326472', '11', 'RPL', '1', 'Dasar Mikrotik', 'plenger kali wok, omak', '2025-10-24 11:43:50'),
(30, 'Nathanael Dewanto', 'nathanael@gmail.com', '084823648723', '11', 'RPL', '3', 'Dasar Mikrotik', 'hai', '2025-10-24 12:47:30'),
(31, 'Muhammad Gilang Raditya', 'gilangraditya@gmail.com', '085892379427', '11', 'RPL', '2', 'Dasar Mikrotik', 'skylar tambun', '2025-10-24 12:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `nama`, `komentar`, `tanggal`) VALUES
(1, 'Geroh', 'website nya keren', '2025-08-12 01:48:49'),
(2, 'hadi', 'ikut tomcat dong', '2025-08-12 01:50:04'),
(3, 'Nazmi Shakira Aulia Putri', 'wihh website eskul nya bagus banget dehh', '2025-08-13 08:07:35'),
(4, 'ell', 'haii kamu kaya ee', '2025-08-13 08:09:28'),
(5, 'harun', 'website nya bagus sekali min', '2025-08-19 01:37:47'),
(6, 'Zaskia Anandya Pratiwi', 'wih websitenya bagus min', '2025-08-19 12:25:40'),
(7, 'amii', 'p min', '2025-08-20 07:07:58'),
(8, 'jikri', 'aewokawok', '2025-08-20 07:12:26'),
(9, 'Ciko Tampati', 'min apakah pendaftaran tomcat masih dibuka', '2025-08-27 07:11:26'),
(10, 'Fachri Nur Sya\'ban', 'min, apakah setelah keluar dari tomcat bisa mendaftarkan diri untuk masuk lagi', '2025-09-03 06:59:24'),
(11, 'nazmitsq', 'Eta ku kakang', '2025-09-03 07:14:32'),
(15, 'qwerty', 'bagus', '2025-10-15 07:42:25'),
(20, 'Geronimo Estrada Ramadhan', 'Wah websitenya bagus', '2025-10-17 11:16:09'),
(21, 'Azka', 'main ml bang', '2025-10-19 13:48:07'),
(22, 'Dzaky Alfakhri Ramadhan', 'aku suka main game', '2025-10-20 00:45:13'),
(24, 'ppppp', 'pipipipipi', '2025-10-24 15:08:04'),
(25, 'Naufal', 'Apakah masih bisa mendaftar?:', '2025-11-07 13:20:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formulir`
--
ALTER TABLE `formulir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formulir`
--
ALTER TABLE `formulir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
