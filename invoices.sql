-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 20 яну 2021 в 21:35
-- Версия на сървъра: 10.4.16-MariaDB
-- Версия на PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `invoices`
--

-- --------------------------------------------------------

--
-- Структура на таблица `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура на таблица `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `date` date NOT NULL,
  `number` int(11) NOT NULL,
  `client id` int(11) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура на таблица `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
