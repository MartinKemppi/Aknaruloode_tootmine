-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Jaan 20, 2024 kell 03:11 PL
-- Serveri versioon: 10.4.28-MariaDB
-- PHP versioon: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `tarpv22`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `kasutajad`
--

CREATE TABLE `kasutajad` (
  `id` int(11) NOT NULL,
  `kasutaja` varchar(30) NOT NULL,
  `parool` varchar(100) NOT NULL,
  `onAdmin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `kasutajad`
--

INSERT INTO `kasutajad` (`id`, `kasutaja`, `parool`, `onAdmin`) VALUES
(1, 'riideosakond', 'suYoPblHhNB2k', 1),
(2, 'puuosakond', 'suph5ey.4rDbY', 2),
(3, 'komplekteerijad', 'suC7fuSAlL/Bk', 3),
(4, 'admin', 'su.L0YXg7to9I', 4),
(5, 'Vasilius', 'suP1xwQDPv3TU', 0);

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `kasutajad`
--
ALTER TABLE `kasutajad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `kasutajad`
--
ALTER TABLE `kasutajad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
