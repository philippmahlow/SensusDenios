-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Erstellungszeit: 04. Feb 2020 um 15:06
-- Server-Version: 5.7.29
-- PHP-Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `docker`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `vegan` tinyint(1) NOT NULL,
  `vegetarian` tinyint(1) NOT NULL,
  `contains_gluten` tinyint(1) NOT NULL,
  `contains_pork` tinyint(1) NOT NULL,
  `contains_fish` tinyint(1) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `dish`
--

INSERT INTO `dish` (`id`, `name`, `vegan`, `vegetarian`, `contains_gluten`, `contains_pork`, `contains_fish`, `price`) VALUES
(1, 'Spaghetti Bolo', 0, 0, 1, 0, 0, 6.99),
(2, 'Salat', 1, 1, 0, 0, 0, 3.5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `isVegan` tinyint(1) NOT NULL,
  `isVegetarian` tinyint(1) NOT NULL,
  `avoidGluten` tinyint(1) NOT NULL,
  `avoidPork` tinyint(1) NOT NULL,
  `avoidFish` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `guest`
--

INSERT INTO `guest` (`id`, `name`, `isVegan`, `isVegetarian`, `avoidGluten`, `avoidPork`, `avoidFish`) VALUES
(1, 'Philipp', 0, 0, 0, 0, 1),
(2, 'Hans-Peter', 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `menu`
--

INSERT INTO `menu` (`id`, `name`) VALUES
(1, 'Woche 1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `menu_dish`
--

CREATE TABLE `menu_dish` (
  `menu_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `menu_dish`
--

INSERT INTO `menu_dish` (`menu_id`, `dish_id`) VALUES
(1, 1),
(1, 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `menu_dish`
--
ALTER TABLE `menu_dish`
  ADD KEY `menu_dish_menu` (`menu_id`),
  ADD KEY `menu_dish_dish` (`dish_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `menu_dish`
--
ALTER TABLE `menu_dish`
  ADD CONSTRAINT `menu_dish_dish` FOREIGN KEY (`dish_id`) REFERENCES `dish` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_dish_menu` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
