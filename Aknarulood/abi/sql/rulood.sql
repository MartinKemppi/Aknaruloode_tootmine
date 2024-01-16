-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Jaan 16, 2024 kell 10:56 EL
-- Serveri versioon: 10.4.27-MariaDB
-- PHP versioon: 8.2.0

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
-- Tabeli struktuur tabelile `rulood`
--

CREATE TABLE `rulood` (
  `id` int(11) NOT NULL,
  `mustrinr` text DEFAULT NULL,
  `riievalmis` int(11) DEFAULT 0,
  `puuvalmis` int(11) DEFAULT 0,
  `pakitud` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `rulood`
--

INSERT INTO `rulood` (`id`, `mustrinr`, `riievalmis`, `puuvalmis`, `pakitud`) VALUES
(1, '700x1400 polüuretaaniga valge', 0, 0, 0),
(2, '700x1400 vill valge', 0, 0, 0),
(3, '700x1400 mikrokiud valge', 0, 0, 0),
(4, '700x1400 puuvill valge', 0, 0, 0),
(5, '700x1400 bambus valge', 0, 0, 0),
(6, '700x1400 fliis valge', 0, 0, 0),
(7, '700x1400 mayka valge', 0, 0, 0),
(8, '700x1400 coolmax valge', 0, 0, 0),
(9, '700x1400 toorsiid valge', 0, 0, 0),
(10, '700x1400 polüuretaaniga beež', 0, 0, 0),
(11, '700x1400 vill beež', 0, 0, 0),
(12, '700x1400 mikrokiud beež', 0, 0, 0),
(13, '700x1400 puuvill beež', 0, 0, 0),
(14, '700x1400 bambus beež', 0, 0, 0),
(15, '700x1400 fliis beež', 0, 0, 0),
(16, '700x1400 mayka beež', 0, 0, 0),
(17, '700x1400 coolmax beež', 0, 0, 0),
(18, '700x1400 toorsiid beež', 0, 0, 0),
(19, '700x1400 polüuretaaniga pruun', 0, 0, 0),
(20, '700x1400 vill pruun', 0, 0, 0),
(21, '700x1400 mikrokiud pruun', 0, 0, 0),
(22, '700x1400 puuvill pruun', 0, 0, 0),
(23, '700x1400 bambus pruun', 0, 0, 0),
(24, '700x1400 fliis pruun', 0, 0, 0),
(25, '700x1400 mayka pruun', 0, 0, 0),
(26, '700x1400 coolmax pruun', 0, 0, 0),
(27, '700x1400 toorsiid pruun', 0, 0, 0),
(28, '700x1400 polüuretaaniga must', 0, 0, 0),
(29, '700x1400 vill must', 0, 0, 0),
(30, '700x1400 mikrokiud must', 0, 0, 0),
(31, '700x1400 puuvill must', 0, 0, 0),
(32, '700x1400 bambus must', 0, 0, 0),
(33, '700x1400 fliis must', 0, 0, 0),
(34, '700x1400 mayka must', 0, 0, 0),
(35, '700x1400 coolmax must', 0, 0, 0),
(36, '700x1400 toorsiid must', 0, 0, 0);

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `rulood`
--
ALTER TABLE `rulood`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `rulood`
--
ALTER TABLE `rulood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
