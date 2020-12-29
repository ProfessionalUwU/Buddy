-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Aug 2020 um 19:08
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `buddy`
--
CREATE DATABASE IF NOT EXISTS `buddy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `buddy`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `VN` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NN` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Str` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PLZ` int(4) NOT NULL,
  `Tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`ID`, `VN`, `NN`, `Str`, `PLZ`, `Tel`, `Email`, `Timestamp`) VALUES
(3, 'Andre', 'Fuhry', 'Rosenbergstraße 60/T3', 1220, '+4369918386025', 'andreas.fuhry@gmail.com', '2020-08-16 16:01:36'),
(4, '', '', '', 0, '', '', '2020-08-16 16:23:16'),
(5, 'hbvqwe fgizbhwsggtgsgwhfgwefua', 'faebjSVDFJHKbsiudfbiuGSDFGVIUW', 'FkljheafhgwIUFVGUIDSGVFUIGHSfvbghuieavgFIVUGgwvafvgbhjkjGBWV', 0, '&=(%$=($=(&$(/', '&@cock.com', '2020-08-16 16:24:59'),
(6, '', '', '', 0, '', '', '2020-08-16 16:26:01'),
(7, 'g', 'g', 'g', 0, '', '', '2020-08-16 16:27:31');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
