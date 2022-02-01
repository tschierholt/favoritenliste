-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Erstellungszeit: 01. Feb 2022 um 22:38
-- Server-Version: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- PHP-Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `favoriten`
--
CREATE DATABASE IF NOT EXISTS `favoriten` DEFAULT CHARACTER SET utf16 COLLATE utf16_general_ci;
USE `favoriten`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `passwort` text NOT NULL,
  `erstellt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `eintrag`
--

CREATE TABLE `eintrag` (
  `id` int(11) NOT NULL,
  `titel` text NOT NULL,
  `kuenstler` text NOT NULL,
  `link` text NOT NULL,
  `listen_id` int(11) NOT NULL,
  `benutzer_id` int(11) NOT NULL,
  `erstellt` date NOT NULL DEFAULT current_timestamp(),
  `aktualisiert` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `favoritenlisten`
--

CREATE TABLE `favoritenlisten` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `privat` tinyint(1) NOT NULL DEFAULT 1,
  `erstellt` date NOT NULL DEFAULT current_timestamp(),
  `benutzer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `eintrag`
--
ALTER TABLE `eintrag`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `favoritenlisten`
--
ALTER TABLE `favoritenlisten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `eintrag`
--
ALTER TABLE `eintrag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `favoritenlisten`
--
ALTER TABLE `favoritenlisten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
