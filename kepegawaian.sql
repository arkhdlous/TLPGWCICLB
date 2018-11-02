-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Nov 2018 pada 10.43
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_project`
--

CREATE TABLE `m_project` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `category` char(50) NOT NULL,
  `description` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `m_project`
--

INSERT INTO `m_project` (`id`, `title`, `url`, `category`, `description`) VALUES
(1, 'Membuat Sistem Pakar Berbasis Web Di Sebuah Perusahaan Ternama', 'http://localhost:8088/kepegawaian/index.php/user/dashboard/project', 'Easy', 'Membuat Sistem Pakar Berbasis Web Di Sebuah Perusahaan Ternama'),
(2, 'blahhh ', 'blahhhh.com', 'blaahhhhh', 'blahhhhhh'),
(3, 'adasd1212', 'dasd12312a', 'adsasd', '12123'),
(4, 'assdasd', '12313123', 'weqweqwe', 'asdasdasdas'),
(5, 'asdwadw', '213123', 'sdasda', '123123123'),
(6, 'weqwe', 'dasdwqw', '1232asdaw', 'sdadsd'),
(7, 'dawe', '1231', 'dsds', '123213'),
(8, '       hhhh      s', '123123', 'asdad', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_project`
--
ALTER TABLE `m_project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_project`
--
ALTER TABLE `m_project`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
