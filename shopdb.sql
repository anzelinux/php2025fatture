-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 06, 2025 alle 12:20
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE `clienti` (
  `idCliente` int(11) NOT NULL,
  `passw` varchar(32) DEFAULT NULL,
  `ragioneSociale` varchar(10) DEFAULT NULL,
  `indirizzo` varchar(50) DEFAULT NULL,
  `localita` varchar(50) DEFAULT NULL,
  `provincia` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`idCliente`, `passw`, `ragioneSociale`, `indirizzo`, `localita`, `provincia`) VALUES
(1, '', 'Angelo Bar', 'via feronia', 'posada', 'pr'),
(2, 'booooo', 'Angelo Bar', 'via feronia', 'posada', 'NU'),
(3, 'bravo', 'Angelo Bar', 'via feronia', 'posada', 'NU'),
(4, 'NASA', 'antonio', 'via vai', 'sinisco', 'NU'),
(5, 'prova', 'giovanni f', 'via cimarosa', 'posada', 'NU'),
(6, 'prova', 'giovanni m', 'via vai', 'posada', 'NU'),
(7, '189bbbb00c5f1fb7fba9ad9285f193', 'giangiacom', 'via vai', 'sinisco', 'NU'),
(9, 'fd9ab41e47a9ef4f6477a8a000bf404f', 'antonio', 'via feronia', 'budoni', 'NU');

-- --------------------------------------------------------

--
-- Struttura della tabella `fatture`
--

CREATE TABLE `fatture` (
  `idFattura` int(11) NOT NULL,
  `importo` decimal(5,0) DEFAULT NULL,
  `descrizione` varchar(50) DEFAULT NULL,
  `anno` int(11) DEFAULT NULL CHECK (`anno` between 1900 and 2010),
  `idCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indici per le tabelle `fatture`
--
ALTER TABLE `fatture`
  ADD PRIMARY KEY (`idFattura`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `clienti`
--
ALTER TABLE `clienti`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `fatture`
--
ALTER TABLE `fatture`
  MODIFY `idFattura` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
