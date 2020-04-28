-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Apr 2020 um 13:46
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `traktor_boerse`
--
CREATE DATABASE IF NOT EXISTS `traktor_boerse` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `traktor_boerse`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `UserID` int(255) NOT NULL,
  `Passwort` varchar(255) NOT NULL,
  `Vorname` varchar(255) NOT NULL,
  `Nachname` varchar(255) NOT NULL,
  `Strasse` varchar(255) NOT NULL,
  `Hausnummer` int(5) NOT NULL,
  `PLZ` int(8) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telefonnummer` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`UserID`, `Passwort`, `Vorname`, `Nachname`, `Strasse`, `Hausnummer`, `PLZ`, `Email`, `Telefonnummer`) VALUES
(1, '$2y$10$/7Igposh/0hB7JOx0RNmj.ZqLGCK7IlMgBpRdK32ddfoczxiAbHA6', 'Jonas', 'Berchtold', 'Berg ', 29, 3939, 'jonas.berchtold@hotmail.com', 796282594),
(2, '$2y$10$MUBdW5ta046JR0q.Ke9Keefmvuy2KOsSyKL.e6Pm4RpBMreywhXUO', 'Hans', 'Meier', 'Kantonsstrasse', 32, 3930, 'hans.meier@bringhen.ch', 2147483647);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fahrzeuge`
--

CREATE TABLE `fahrzeuge` (
  `ProductID` int(255) NOT NULL,
  `Fahrzeugname` varchar(255) NOT NULL,
  `Einsatzgebiet` varchar(255) NOT NULL,
  `Bild` varchar(255) NOT NULL,
  `Name_des_Halters` varchar(255) NOT NULL,
  `Telefonnummer` int(30) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `fahrzeuge`
--

INSERT INTO `fahrzeuge` (`ProductID`, `Fahrzeugname`, `Einsatzgebiet`, `Bild`, `Name_des_Halters`, `Telefonnummer`, `Email`) VALUES
(5, 'John Deere', 'Landwirtschaft (Karottenanbau)', 'johndeere5e.png', 'Hans Meier', 2147483647, 'hans.meier@bringhen.ch');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `liste`
--

CREATE TABLE `liste` (
  `UserID` int(100) NOT NULL,
  `ProductID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `liste`
--

INSERT INTO `liste` (`UserID`, `ProductID`) VALUES
(2, 3);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`UserID`);

--
-- Indizes für die Tabelle `fahrzeuge`
--
ALTER TABLE `fahrzeuge`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `UserID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `fahrzeuge`
--
ALTER TABLE `fahrzeuge`
  MODIFY `ProductID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
