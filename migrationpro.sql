-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 10:40 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `migrationpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(250) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL DEFAULT 3,
  `salary` decimal(65,0) NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `surname`, `age`, `email`, `password`, `admin`, `position`, `salary`, `block`, `deleted`) VALUES
(1, 'Edgar ', 'İbrahimov', 26, 'edgar@gmail.com', '123', 1, 1, '20000', 0, 0),
(2, 'Yusif', 'İbrahimov', 21, 'feko.manutd.99@gmail.com', '1905', 1, 2, '15000', 0, 0),
(3, 'Anar', 'Şahbazov', 20, 'anar@gmail.com', '123', 0, 1, '100000', 0, 0),
(4, 'ferid', 'ibrahimov', 11, 'ferid.manutd.99@gmail.com', '123', 0, 3, '5', 0, 0),
(5, 'İnci', 'Osmanova', 20, 'inci@gmail.com', '1905', 0, 2, '15000', 0, 0),
(6, 'Ferid', 'İbrahimov', 14, 'feko.manutd.99@gmail.comss', '123', 0, 2, '0', 0, 0),
(8, 'Yusif', 'İbrahimov', 21, 'yusif@gmail.com', '123', 0, 0, '0', 0, 0),
(9, 'Eldar', 'İbrahimov', 40, 'eldar@gmail.com', '123', 0, 1, '0', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
