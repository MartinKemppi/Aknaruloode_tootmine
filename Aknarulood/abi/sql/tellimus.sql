-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Jaan 20, 2024 kell 09:24 PL
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
-- Tabeli struktuur tabelile `tellimus`
--

CREATE TABLE `tellimus` (
  `id` int(11) NOT NULL,
  `tellimus_nimi` int(11) DEFAULT NULL,
  `kasutaja` varchar(30) DEFAULT NULL,
  `riievalmis` int(11) DEFAULT 0,
  `puuvalmis` int(11) DEFAULT 0,
  `pakitud` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `tellimus`
--

INSERT INTO `tellimus` (`id`, `tellimus_nimi`, `kasutaja`, `riievalmis`, `puuvalmis`, `pakitud`) VALUES
(2, 7, 'Vasilius', 1, 1, 1);

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `tellimus`
--
ALTER TABLE `tellimus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tellimus_nimi` (`tellimus_nimi`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `tellimus`
--
ALTER TABLE `tellimus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tõmmistatud tabelite piirangud
--

--
-- Piirangud tabelile `tellimus`
--
ALTER TABLE `tellimus`
  ADD CONSTRAINT `tellimus_ibfk_1` FOREIGN KEY (`tellimus_nimi`) REFERENCES `rulood` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
