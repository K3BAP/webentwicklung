-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 20. Jan 2023 um 18:41
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
  `aufgabeErstellt` date NOT NULL,
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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aufgabe_mitglied`
--

CREATE TABLE `aufgabe_mitglied` (
  `aufgabeId` int(10) UNSIGNED NOT NULL,
  `mitgliedId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `aufgabe_mitglied`
--

INSERT INTO `aufgabe_mitglied` (`aufgabeId`, `mitgliedId`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitglied`
--

CREATE TABLE `mitglied` (
  `mitgliedId` int(10) UNSIGNED NOT NULL,
  `mitgliedUsername` varchar(50) NOT NULL,
  `mitgliedEmail` varchar(50) NOT NULL,
  `mitgliedPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `mitglied`
--

INSERT INTO `mitglied` (`mitgliedId`, `mitgliedUsername`, `mitgliedEmail`, `mitgliedPassword`) VALUES
(1, 'Max Mustermann', 'mustermann@muster.de', '$2y$10$..fQtlR6xRvVcHNRV/eN.uZ8DqJ8.BaDGQi7n8BdfR8cUIiODdpv6'),
(2, 'Petra Müller', 'petra@mueller.de', '$2y$10$..fQtlR6xRvVcHNRV/eN.uZ8DqJ8.BaDGQi7n8BdfR8cUIiODdpv6');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projekt`
--

CREATE TABLE `projekt` (
  `projektId` int(10) UNSIGNED NOT NULL,
  `projektName` varchar(50) NOT NULL,
  `projektBeschreibung` text NOT NULL,
  `projektErstellerMitgliedId` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `projekt`
--

INSERT INTO `projekt` (`projektId`, `projektName`, `projektBeschreibung`, `projektErstellerMitgliedId`) VALUES
(1, 'Großes Gesamtprojekt', 'Dieses Projekt befasst sich mit der Lösung der endgültigen Frage nach dem Leben, dem Universum und dem ganzen Rest.', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projekt_mitglied`
--

CREATE TABLE `projekt_mitglied` (
  `projektId` int(10) UNSIGNED NOT NULL,
  `mitgliedId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `projekt_mitglied`
--

INSERT INTO `projekt_mitglied` (`projektId`, `mitgliedId`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reiter`
--

CREATE TABLE `reiter` (
  `reiterId` int(10) UNSIGNED NOT NULL,
  `reiterName` varchar(100) NOT NULL,
  `reiterBeschreibung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `reiter`
--

INSERT INTO `reiter` (`reiterId`, `reiterName`, `reiterBeschreibung`) VALUES
(1, 'ToDo', 'Dinge, die erledigt werden müssen'),
(2, 'Erledigt', 'Dinge, die erledigt sind'),
(3, 'Verschoben', 'Dinge, die später erledigt werden');

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
-- Indizes für die Tabelle `aufgabe_mitglied`
--
ALTER TABLE `aufgabe_mitglied`
  ADD PRIMARY KEY (`aufgabeId`,`mitgliedId`),
  ADD KEY `aufgabe_mitglied_ibfk_2` (`mitgliedId`);

--
-- Indizes für die Tabelle `mitglied`
--
ALTER TABLE `mitglied`
  ADD PRIMARY KEY (`mitgliedId`),
  ADD UNIQUE KEY `mitgliedEmail` (`mitgliedEmail`);

--
-- Indizes für die Tabelle `projekt`
--
ALTER TABLE `projekt`
  ADD PRIMARY KEY (`projektId`),
  ADD KEY `erstellerMitgliedId` (`projektErstellerMitgliedId`);

--
-- Indizes für die Tabelle `projekt_mitglied`
--
ALTER TABLE `projekt_mitglied`
  ADD PRIMARY KEY (`projektId`,`mitgliedId`),
  ADD KEY `projekt_mitglied_ibfk_1` (`mitgliedId`);

--
-- Indizes für die Tabelle `reiter`
--
ALTER TABLE `reiter`
  ADD PRIMARY KEY (`reiterId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `aufgabe`
--
ALTER TABLE `aufgabe`
  MODIFY `aufgabeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `mitglied`
--
ALTER TABLE `mitglied`
  MODIFY `mitgliedId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `projekt`
--
ALTER TABLE `projekt`
  MODIFY `projektId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `reiter`
--
ALTER TABLE `reiter`
  MODIFY `reiterId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `aufgabe`
--
ALTER TABLE `aufgabe`
  ADD CONSTRAINT `aufgabe_ibfk_1` FOREIGN KEY (`aufgabeErstellerMitgliedId`) REFERENCES `mitglied` (`mitgliedId`) ON DELETE SET NULL,
  ADD CONSTRAINT `aufgabe_ibfk_2` FOREIGN KEY (`aufgabeReiterId`) REFERENCES `reiter` (`reiterId`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `aufgabe_mitglied`
--
ALTER TABLE `aufgabe_mitglied`
  ADD CONSTRAINT `aufgabe_mitglied_ibfk_1` FOREIGN KEY (`aufgabeId`) REFERENCES `aufgabe` (`aufgabeId`) ON DELETE CASCADE,
  ADD CONSTRAINT `aufgabe_mitglied_ibfk_2` FOREIGN KEY (`mitgliedId`) REFERENCES `mitglied` (`mitgliedId`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `projekt`
--
ALTER TABLE `projekt`
  ADD CONSTRAINT `projekt_ibfk_1` FOREIGN KEY (`projektErstellerMitgliedId`) REFERENCES `mitglied` (`mitgliedId`) ON DELETE SET NULL;

--
-- Constraints der Tabelle `projekt_mitglied`
--
ALTER TABLE `projekt_mitglied`
  ADD CONSTRAINT `projekt_mitglied_ibfk_1` FOREIGN KEY (`mitgliedId`) REFERENCES `mitglied` (`mitgliedId`) ON DELETE CASCADE,
  ADD CONSTRAINT `projekt_mitglied_ibfk_2` FOREIGN KEY (`projektId`) REFERENCES `projekt` (`projektId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
