-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Erstellungszeit: 04. Feb 2020 um 12:29
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
-- Tabellenstruktur für Tabelle `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `license_plate` varchar(12) NOT NULL,
  `mileage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `car`
--

INSERT INTO `car` (`id`, `model_id`, `license_plate`, `mileage`) VALUES
(1, 3, 'MI-AB-1234', 3000),
(2, 4, 'MI-AB-2345', 10000);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `drivelog`
--

CREATE TABLE `drivelog` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `start_place` varchar(255) NOT NULL,
  `end_place` varchar(255) NOT NULL,
  `mileage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `drivelog`
--

INSERT INTO `drivelog` (`id`, `driver_id`, `car_id`, `start_date`, `end_date`, `start_place`, `end_place`, `mileage`) VALUES
(1, 1, 1, '2020-02-04 08:26:52', '2020-02-04 08:37:52', 'Minden', 'Denios', 31234);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `driver`
--

INSERT INTO `driver` (`id`, `firstname`, `lastname`, `birthday`) VALUES
(1, 'Philipp', 'Mahlow', '1991-12-24'),
(2, 'Max', 'Mustermann', '1986-02-01');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`) VALUES
(1, 'BMW'),
(2, 'Audi');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `model`
--

INSERT INTO `model` (`id`, `manufacturer_id`, `name`) VALUES
(1, 2, 'A4'),
(2, 2, 'A6'),
(3, 1, '3er'),
(4, 1, '5er');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_model` (`model_id`);

--
-- Indizes für die Tabelle `drivelog`
--
ALTER TABLE `drivelog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drivelog_car` (`car_id`),
  ADD KEY `drivelog_driver` (`driver_id`);

--
-- Indizes für die Tabelle `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_manufacturer` (`manufacturer_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `drivelog`
--
ALTER TABLE `drivelog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_model` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`);

--
-- Constraints der Tabelle `drivelog`
--
ALTER TABLE `drivelog`
  ADD CONSTRAINT `drivelog_car` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`),
  ADD CONSTRAINT `drivelog_driver` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`);

--
-- Constraints der Tabelle `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_manufacturer` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
