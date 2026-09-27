-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2026 at 08:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db mhws`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `npm` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `program_studi` varchar(100) DEFAULT NULL,
  `angkatan` int(11) DEFAULT NULL,
  `agama` enum('Budha','Hindu','Islam','Katolik','Kepercayaan','Konghucu','Protestan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `npm`, `nama_mahasiswa`, `jenis_kelamin`, `program_studi`, `angkatan`, `agama`) VALUES
(1, '25081010101', 'Muhammad Rizky Ramadhan', 'P', 'Informatika', 2025, 'Islam'),
(2, '25081010102', 'Nabila Putri Anggraeni', 'L', 'Informatika', 2025, 'Islam'),
(3, '25081010103', 'Arya Sute Parawangsa', 'P', 'bisnis digital', 2025, 'Islam'),
(4, '25081010104', 'Ferdinand Leandro Widjaja', 'P', 'Informatika', 2025, 'Islam'),
(5, '25081010105', 'Salsabila Ayu Ningtyas', 'L', 'Informatika', 2025, 'Islam'),
(6, '25081010106', 'Dimas Prasetyo Nugraha', 'P', 'Informatika', 2025, 'Islam'),
(7, '25081010107', 'Zahra Aulia Rahman', 'L', 'Informatika', 2025, 'Islam'),
(8, '25081010108', 'Bagas Wahyu Firmansyah', 'P', 'Informatika', 2025, 'Islam'),
(9, '25081010109', 'Clarissa Putri Maharani', 'L', 'Informatika', 2025, 'Islam'),
(10, '25081010110', 'Aditiya Pratama', 'P', 'Informatika', 2025, 'Protestan'),
(11, '25081010111', 'Farah Ayunda Safitri', 'L', 'Informatika', 2025, 'Protestan'),
(12, '25081010112', 'Gazha Patra Atmaja', 'P', 'Informatika', 2025, 'Protestan'),
(13, '25081010113', 'Reza Fahlevi Ramadhan', 'P', 'Informatika', 2025, 'Protestan'),
(14, '25081010114', 'Intan Permata Sari', 'L', 'Informatika', 2025, 'Protestan'),
(15, '25081010115', 'Fikri Ardiansyah', 'P', 'Informatika', 2025, 'Protestan'),
(16, '25081010116', 'Devi Anjani Putri', 'L', 'Informatika', 2025, 'Protestan'),
(17, '25081010117', 'Rangga Saputra Wijaya', 'P', 'Informatika', 2025, 'Protestan'),
(18, '25081010118', 'Amelia Rahmawati', 'L', 'Informatika', 2025, 'Protestan'),
(19, '25081010159', 'Taufiiqul Hakim', 'P', 'Informatika', 2025, 'Katolik'),
(20, '25081010120', 'Wahyu Setiaji Nugroho', 'P', 'Informatika', 2025, 'Katolik'),
(21, '25081010119', 'Fauzan Ramadhan', 'P', 'Informatika', 2025, 'Katolik'),
(22, '25081010122', 'Siti Aisyah Putri', 'L', 'Informatika', 2025, 'Katolik'),
(23, '25081010123', 'Rizky Maulana', 'P', 'Informatika', 2025, 'Katolik'),
(24, '25081010124', 'Dinda Maharani', 'L', 'Informatika', 2025, 'Katolik'),
(25, '25081010125', 'Fajar Nugroho', 'P', 'Informatika', 2025, 'Katolik'),
(26, '25081010126', 'Anisa Rahmawati', 'L', 'Informatika', 2025, 'Katolik'),
(27, '25081010127', 'Bagus Setiawan', 'P', 'Informatika', 2025, 'Katolik'),
(28, '25081010128', 'Nadia Permatasari', 'L', 'Informatika', 2025, 'Hindu'),
(29, '25081010129', 'Rafi Akbar', 'P', 'Informatika', 2025, 'Hindu'),
(30, '25081010130', 'Citra Lestari', 'L', 'Informatika', 2025, 'Hindu'),
(31, '25081010131', 'Yoga Pratama', 'P', 'Informatika', 2025, 'Hindu'),
(32, '25081010132', 'Aulia Safitri', 'L', 'Informatika', 2025, 'Hindu'),
(33, '25081010133', 'Dimas Arya Putra', 'P', 'Informatika', 2025, 'Hindu'),
(34, '25081010134', 'Nanda Putri Amelia', 'L', 'Informatika', 2025, 'Hindu'),
(35, '25081010135', 'Ilham Fauzi', 'P', 'Informatika', 2025, 'Hindu'),
(36, '25081010136', 'Maya Sari Dewi', 'L', 'Informatika', 2025, 'Budha'),
(37, '25081010137', 'Rendra Saputra', 'P', 'Informatika', 2025, 'Budha'),
(38, '25081010138', 'Vina Oktaviani', 'L', 'Informatika', 2025, 'Budha'),
(39, '25081010139', 'Arif Setiawan', 'P', 'Informatika', 2025, 'Budha'),
(40, '25081010140', 'Putri Ayu Lestari', 'L', 'Informatika', 2025, 'Budha'),
(41, '25081010141', 'Andika Wijaya', 'P', 'bisnis digital', 2025, 'Budha'),
(42, '25081010142', 'Nisa Amalia', 'L', 'bisnis digital', 2025, 'Budha'),
(43, '25081010143', 'Raka Aditya', 'P', 'bisnis digital', 2025, 'Konghucu'),
(44, '25081010144', 'Bella Novitasari', 'L', 'bisnis digital', 2025, 'Konghucu'),
(45, '25081010145', 'Rizal Fadillah', 'P', 'bisnis digital', 2025, 'Konghucu'),
(46, '25081010146', 'Salsa Nuraini', 'L', 'bisnis digital', 2025, 'Konghucu'),
(47, '25081010147', 'Kevin Ramadhan', 'P', 'bisnis digital', 2025, 'Kepercayaan'),
(48, '25081010148', 'Intan Permata', 'L', 'bisnis digital', 2025, 'Kepercayaan'),
(49, '25081010149', 'Farhan Hidayat', 'P', 'bisnis digital', 2025, 'Kepercayaan'),
(50, '25081010150', 'Rina Kartika Sari', 'L', 'bisnis digital', 2025, 'Kepercayaan'),
(51, '25081020001', 'Budi Santoso', 'L', 'Sistem Informasi', 2025, 'Islam'),
(52, '25081020002', 'Ayu Lestari', 'P', 'Sistem Informasi', 2025, 'Islam'),
(53, '25081020003', 'Candra Wijaya', 'L', 'Sistem Informasi', 2025, 'Protestan'),
(54, '25081020004', 'Dian Sastro', 'P', 'Sistem Informasi', 2025, 'Katolik'),
(55, '25081020005', 'Eko Prasetyo', 'L', 'Sistem Informasi', 2025, 'Hindu'),
(56, '25081020006', 'Fitriani', 'P', 'Sistem Informasi', 2025, 'Islam'),
(57, '25081020007', 'Gilang Ramadhan', 'L', 'Sistem Informasi', 2025, 'Islam'),
(58, '25081020008', 'Hana Maharani', 'P', 'Sistem Informasi', 2025, 'Budha'),
(59, '25081020009', 'Indra Setiawan', 'L', 'Sistem Informasi', 2025, 'Islam'),
(60, '25081020010', 'Joko Susanto', 'L', 'Sistem Informasi', 2025, 'Kepercayaan'),
(61, '25081020011', 'Kartika Putri', 'P', 'Sistem Informasi', 2025, 'Islam'),
(62, '25081020012', 'Lukman Hakim', 'L', 'Sistem Informasi', 2025, 'Konghucu'),
(63, '25081020013', 'Mega Pertiwi', 'P', 'Sistem Informasi', 2025, 'Islam'),
(64, '25081020014', 'Niko Saputra', 'L', 'Sistem Informasi', 2025, 'Protestan'),
(65, '25081020015', 'Oka Antara', 'L', 'Sistem Informasi', 2025, 'Hindu'),
(66, '25081020016', 'Putri Ayu', 'P', 'Sistem Informasi', 2025, 'Islam'),
(67, '25081020017', 'Qori Akbar', 'L', 'Sistem Informasi', 2025, 'Islam'),
(68, '25081020018', 'Rina Wati', 'P', 'Sistem Informasi', 2025, 'Katolik'),
(69, '25081020019', 'Surya Saputra', 'L', 'Sistem Informasi', 2025, 'Islam'),
(70, '25081020020', 'Tia Ivanka', 'P', 'Sistem Informasi', 2025, 'Budha'),
(71, '25081020021', 'Umar Wirahadi', 'L', 'Sistem Informasi', 2025, 'Islam'),
(72, '25081020022', 'Vera Zanobia', 'P', 'Sistem Informasi', 2025, 'Protestan'),
(73, '25081020023', 'Wawan Hendrawan', 'L', 'Sistem Informasi', 2025, 'Islam'),
(74, '25081020024', 'Xena Larasati', 'P', 'Sistem Informasi', 2025, 'Hindu'),
(75, '25081020025', 'Yudi Mulyana', 'L', 'Sistem Informasi', 2025, 'Islam'),
(76, '25081030001', 'Zara Latuconsina', 'P', 'Sains Data', 2025, 'Islam'),
(77, '25081030002', 'Andi Firmansyah', 'L', 'Sains Data', 2025, 'Katolik'),
(78, '25081030003', 'Bunga Citra', 'P', 'Sains Data', 2025, 'Islam'),
(79, '25081030004', 'Deddy Corbuzier', 'L', 'Sains Data', 2025, 'Katolik'),
(80, '25081030005', 'Endang Setyawati', 'P', 'Sains Data', 2025, 'Islam'),
(81, '25081030006', 'Ferry Salim', 'L', 'Sains Data', 2025, 'Budha'),
(82, '25081030007', 'Gita Gutawa', 'P', 'Sains Data', 2025, 'Islam'),
(83, '25081030008', 'Hassan Ali', 'L', 'Sains Data', 2025, 'Islam'),
(84, '25081030009', 'Irfan Hakim', 'L', 'Sains Data', 2025, 'Islam'),
(85, '25081030010', 'Jessica Iskandar', 'P', 'Sains Data', 2025, 'Protestan'),
(86, '25081030011', 'Kiki Amalia', 'P', 'Sains Data', 2025, 'Islam'),
(87, '25081030012', 'Luna Maya', 'P', 'Sains Data', 2025, 'Islam'),
(88, '25081030013', 'Maudy Ayunda', 'P', 'Sains Data', 2025, 'Islam'),
(89, '25081030014', 'Nadine Chandrawinata', 'P', 'Sains Data', 2025, 'Katolik'),
(90, '25081030015', 'Omesh Ananda', 'L', 'Sains Data', 2025, 'Islam'),
(91, '25081030016', 'Pevita Pearce', 'P', 'Sains Data', 2025, 'Islam'),
(92, '25081030017', 'Raditya Dika', 'L', 'Sains Data', 2025, 'Islam'),
(93, '25081030018', 'Raffi Ahmad', 'L', 'Sains Data', 2025, 'Islam'),
(94, '25081030019', 'Sule Prikitiew', 'L', 'Sains Data', 2025, 'Islam'),
(95, '25081030020', 'Tukul Arwana', 'L', 'Sains Data', 2025, 'Islam'),
(96, '25081030021', 'Uya Kuya', 'L', 'Sains Data', 2025, 'Islam'),
(97, '25081030022', 'Vino G Bastian', 'L', 'Sains Data', 2025, 'Islam'),
(98, '25081030023', 'Wulan Guritno', 'P', 'Sains Data', 2025, 'Islam'),
(99, '25081030024', 'Yayan Ruhian', 'L', 'Sains Data', 2025, 'Islam'),
(100, '25081030025', 'Zaskia Gotik', 'P', 'Sains Data', 2025, 'Islam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `npm` (`npm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
