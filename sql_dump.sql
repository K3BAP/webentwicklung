-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 27. Jan 2023 um 16:13
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `aufgabenplaner`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aufgabe`
--

CREATE TABLE `aufgabe` (
  `aufgabeId` int(10) UNSIGNED NOT NULL,
  `aufgabeName` varchar(100) NOT NULL,
  `aufgabeBeschreibung` text DEFAULT NULL,
  `aufgabeErstellt` date NOT NULL DEFAULT current_timestamp(),
  `aufgabeFaellig` date DEFAULT NULL,
  `aufgabeErstellerMitgliedId` int(10) UNSIGNED DEFAULT NULL,
  `aufgabeReiterId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `aufgabe`
--

INSERT INTO `aufgabe` (`aufgabeId`, `aufgabeName`, `aufgabeBeschreibung`, `aufgabeErstellt`, `aufgabeFaellig`, `aufgabeErstellerMitgliedId`, `aufgabeReiterId`) VALUES
(1, 'HTML Datei erstellen', 'HTML Datei erstellen', '2022-12-13', NULL, 1, 1),
(2, 'CSS Datei erstellen', 'CSS Datei erstellen', '2022-12-13', NULL, 1, 1),
(3, 'PC eingeschaltet', 'PC einschalten', '2022-12-13', NULL, 1, 2),
(4, 'Kaffee trinken', 'Kaffee trinken fördert die Denkfähigkeit.', '2022-12-13', NULL, 1, 2),
(5, 'Für die Uni lernen', 'Für die Uni lernen ist auch wichtig.', '2022-12-13', NULL, 1, 3);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `aufgabe`
--
ALTER TABLE `aufgabe`
  ADD PRIMARY KEY (`aufgabeId`),
  ADD KEY `aufgabeErstellerMitgliedId` (`aufgabeErstellerMitgliedId`),
  ADD KEY `aufgabeReiterId` (`aufgabeReiterId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `aufgabe`
--
ALTER TABLE `aufgabe`
  MODIFY `aufgabeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `aufgabe`
--
ALTER TABLE `aufgabe`
  ADD CONSTRAINT `aufgabe_ibfk_1` FOREIGN KEY (`aufgabeErstellerMitgliedId`) REFERENCES `mitglied` (`mitgliedId`) ON DELETE SET NULL,
  ADD CONSTRAINT `aufgabe_ibfk_2` FOREIGN KEY (`aufgabeReiterId`) REFERENCES `reiter` (`reiterId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
