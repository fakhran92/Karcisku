-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 05:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karcisku`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_date` datetime NOT NULL,
  `event_price` varchar(11) NOT NULL,
  `event_poster` varchar(50) NOT NULL,
  `event_description` mediumtext NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `event_slot` int(11) NOT NULL,
  `remaining_slot` int(11) NOT NULL,
  `event_category` enum('Webinar','Concert','Theater') NOT NULL,
  `event_tag` varchar(6) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_title`, `event_date`, `event_price`, `event_poster`, `event_description`, `event_location`, `event_slot`, `remaining_slot`, `event_category`, `event_tag`, `status`) VALUES
(1, 'Toba AI, Tools Untuk Riset Social Media', '2021-06-18 14:00:00', '25,000', '1.jpeg', 'Dalam rangka Anniversary 1 Tahun Widya Analytic, Widya Analytic mengadakan #AnalyticWeek dengan tujuan menjadikannya sebagai sarana belajar bagi kalian yang mempunyai keinginan untuk belajar. Di Talkshow kali ini, kami akan membahas tentang Toba AI!', 'ZOOM', 500, 500, 'Webinar', 'TobaAI', 'active'),
(2, 'Aset Kripto : Judi Atau Investasi?', '2021-05-22 13:00:00', '25,000', '2.png', 'Mau investasi crypto tapi gak ngerti caranya? Atau kamu udah nekat mulai.. eh malah rugi besar? Gak perlu ragu dan nyesel! Yuk kita pelajari cara investasi aset crypto bareng Kak Bagas Satriadi, pada hari Sabtu, 22 Mei 2021! Kapan lagi nih bisa diajarin sama Vice President dari Indodax secara langsung!', 'ZOOM', 1000, 1000, 'Webinar', 'KRIPTO', 'active'),
(3, 'Sinergi Metrologi Pulihkan Ekonomi Nasional', '2021-05-27 08:30:00', '75,000', '3.png', 'Masih dalam rangka peringatan Hari Metrologi Dunia tahun 2021, BSN bekerja sama dengan Direktorat Metrologi menyelenggarakan Talkshow \"Sinergi Metrologi Pulihkan Ekonomi Nasional\".\r\n\r\nTalkshow ini akan dibuka dengan keynote speech oleh Direktur Jenderal Perlindungan Konsumen dan Tertib Niaga, Kemendag dan Deputi Bidang SNSU, BSN. Menghadirkan para narasumber yang merupakan pakar di bidang metrologi dari Kementerian Kesehatan, Kementerian Perdagangan, dan Badan Standardisasi Nasional, rasanya sayang sekali bila melewatkan perbincangan mereka dalam talkshow ini.\r\n\r\nCatat tanggalnya ya!\r\n🗓️ Kamis, 27 Mei 2021\r\n🕒 Pukul 08.30 - 12.30 WIB', 'ZOOM', 500, 500, 'Webinar', 'SMPEN1', 'active'),
(4, 'SMILEMOTION CHARITY CONCERT', '2021-11-16 18:00:00', '135,000', '4.png', 'Smilemotion Charity Concert ticket sales will be donated to our patients. By purchasing the tickets, you’ve donated for the cleft lip and palate surgeries and help them smile braver.', 'Sasana Budaya Ganesha, Bandung', 700, 700, 'Concert', 'SMLECC', 'active'),
(5, 'LOCALNESIA FEST : \"Hujan dan Cinta di Penghujung Tahun\"', '2021-07-27 18:30:00', '150,000', '5.png', 'Dimeriahkan oleh penyanyi legend Indonesia, yaitu Ari Lasso, serta The Rain dan Danilla. .\r\n🗓 Sabtu, 07 Desember 2019\r\n📍GOR UNY\r\n\r\nTIKET OFFLINE:\r\n⏰ 18:30 - 23.00 WIB\r\n.\r\n📍Mitro Kopi\r\nhttps://g.co/kgs/A1hGND\r\n.\r\n📍ERHA Coffee & Literacy\r\nhttps://g.co/kgs/zDo7Mt\r\n.\r\n📍Arua Coffee\r\nhttps://g.co/kgs/qeCX3t', 'GOR UNY', 1300, 1299, 'Concert', 'LCLNSA', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `proof_file` varchar(255) NOT NULL,
  `total_price` varchar(15) NOT NULL,
  `validity` enum('validated','unvalidated','canceled') NOT NULL DEFAULT 'unvalidated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `slide_id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `slide_id`, `file`) VALUES
(1, 1, '1.png'),
(2, 2, '2.png'),
(3, 3, '3.png');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `booking_code` varchar(100) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `idcard` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `idcard`, `email`, `phone`, `username`, `password`, `role`) VALUES
(1, 'Administrator', '0000000000000000', 'admin@karcisku.epizy.com', '081200000000', 'admin', '$2y$10$aiLug7.j2J8UKFLJ1ErtVuZuLJnSjh0DEv7rbMc8mlFZRtXhOqXW2', 'admin'),
(4, 'Fikri Miftah Akmaludin', '3671051611990003', 'fikri.droid16@gmail.com', '081299648963', 'fikri', '$2y$10$BUD7E7jdkPeTYpBUwMP.2ucVZoJ7DezLOYL40p3dQ8cf8jruMZbuK', 'user'),
(5, 'Muhammad Fakhran', '3671052204000004', 'mfzm@gmail.com', '08979565131', 'fakhran', '$2y$10$PnSEIpYA1Nk7KS1tzYRj.u2Wm6HiSt/AEDBfcFULv2uVBLje2VO8u', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
