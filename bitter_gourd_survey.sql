-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 01:15 PM
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
-- Database: `bitter_gourd_survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `income` varchar(50) DEFAULT NULL,
  `enjoy` varchar(10) DEFAULT NULL,
  `frequency` varchar(50) DEFAULT NULL,
  `interested` varchar(10) DEFAULT NULL,
  `product_type` text DEFAULT NULL,
  `buy_factors` text DEFAULT NULL,
  `price_powder` varchar(10) DEFAULT NULL,
  `price_fresh` varchar(10) DEFAULT NULL,
  `price_chips` varchar(10) DEFAULT NULL,
  `price_pickles` varchar(10) DEFAULT NULL,
  `price_tea` varchar(10) DEFAULT NULL,
  `packaging` varchar(50) DEFAULT NULL,
  `marketing` text DEFAULT NULL,
  `discover` text DEFAULT NULL,
  `buy_place` text DEFAULT NULL,
  `aware` varchar(10) DEFAULT NULL,
  `health` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
