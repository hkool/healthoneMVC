-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 nov 2020 om 16:56
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health-one`
--
CREATE DATABASE IF NOT EXISTS `health-one` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `health-one`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `apotheker`
--

CREATE TABLE `apotheker` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `beroep` varchar(100) NOT NULL,
  `straat` varchar(100) NOT NULL,
  `postccode` varchar(100) NOT NULL,
  `plaats` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoonummer` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `apotheker`
--

INSERT INTO `apotheker` (`id`, `naam`, `beroep`, `straat`, `postccode`, `plaats`, `email`, `telefoonummer`, `username`, `wachtwoord`) VALUES
(1, 'Harry Bannink', 'oncoloog', 'Baarnseweg 7', '3500 PP', 'Amerongen', 'h.bannink@big.nl', 644558877, 'Bannink', '2a5c5f2623024ce3de6fe7dc8f5e13ca55b7aadc13174254b40af574e37018c1'),
(2, 'Ties Kruise', 'kno arts', 'Amsterdamse straatweg 81', '3572 LL ', 'Utrecht', 't.kruise@big.nl', 612121212, 'Kruise', '2a5c5f2623024ce3de6fe7dc8f5e13ca55b7aadc13174254b40af574e37018c1'),
(3, 'Wilma van Tuyl', 'kinderarts', 'Damrak 1', '1000 AA', 'Amsterdam', 'w.v.tuyl@big.nl', 204587458, 'Tuyl', '2a5c5f2623024ce3de6fe7dc8f5e13ca55b7aadc13174254b40af574e37018c1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medicijnen`
--

CREATE TABLE `medicijnen` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `omschrijving` varchar(200) NOT NULL,
  `bijwerkingen` varchar(200) NOT NULL,
  `prijs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `medicijnen`
--

INSERT INTO `medicijnen` (`id`, `naam`, `omschrijving`, `bijwerkingen`, `prijs`) VALUES
(2, 'diclofenac', 'pijnstiller, koortsverlagende werking, ontstekingsremmende werking. Goed bij acute pijn en chronische ziektes zoals reuma en jicht', 'pijn op de borst, kortademingheid, zwarte of zeer donkere ontlasting, ophoesten van bloed, blauwe plekken', 25),
(3, 'amoxicilline', 'breedspectrum antibioticum, actief tegen grampositieve en gramnegatieve bacterië', 'braken, buikpijn, diarree, spijsverteringsstoornissen, huidirritaties, maagdarm-stoornissen', 40),
(4, 'omeprazol', 'remt de productie van overmatig maagzuur. Omeprazol behoort tot de klasse van protonremmers. Omeprazol wordt ingezet ter preventie en behandeling van maagzweren.', 'duizeligheid, verwarring, snelle en onregelmatige hartslag, schokkende spierbewegingen, zich schrikachtig voelen, spierkrampen, spierzwakte of slap gevoel.', 50);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `naam` varchar(200) NOT NULL,
  `zknummer` varchar(200) NOT NULL,
  `adres` varchar(200) NOT NULL,
  `stad` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `Telefoonnummer` varchar(100) NOT NULL,
  `verzekering` int(11) NOT NULL,
  `geboortedatum` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `patient`
--

INSERT INTO `patient` (`id`, `naam`, `zknummer`, `adres`, `stad`, `email`, `Telefoonnummer`, `verzekering`, `geboortedatum`) VALUES
(1, 'Kees Verkerk', 'ZK250012018', 'Markt 1, 2500PT', 'Den Haag', 'k.verkerk@xs4all.nl', '0701234567', 1809001, '10-11-1985'),
(2, 'Hilbert van der Duim', 'ZK250022015', 'Markt 2, 2500PT', 'Den Haag', 'h.v.d.duim@xs4all.nl', '0702154871', 1809001, '05-02-2008'),
(3, 'Yvonne van Gennip', 'ZK250032000', 'Markt 3, 2500 PT', 'Den Haag', 'y.v.gennip@xs4all.nl', '0709876549', 1809003, '24-07-1978');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recepten`
--

CREATE TABLE `recepten` (
  `id` int(11) NOT NULL,
  `medicijnid` int(50) NOT NULL,
  `patientid` int(100) NOT NULL,
  `dosis` varchar(200) NOT NULL,
  `looptijd` varchar(100) NOT NULL,
  `datum` varchar(100) NOT NULL,
  `herhaling` varchar(200) NOT NULL,
  `aantal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `recepten`
--

INSERT INTO `recepten` (`id`, `medicijnid`, `patientid`, `dosis`, `looptijd`, `datum`, `herhaling`, `aantal`) VALUES
(1, 3, 1, '500mg', '24 uur', '26-11-2020', 'Wel herhaling', '25'),
(2, 2, 3, '25mg', '6 uur', '26-11-2020', 'Geen herhaling', '7'),
(3, 2, 2, '75mg', '12 uur', '26-11-2020', 'Geen Herhaling', '14');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `apotheker`
--
ALTER TABLE `apotheker`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `recepten`
--
ALTER TABLE `recepten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKMedicijn` (`medicijnid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `apotheker`
--
ALTER TABLE `apotheker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT voor een tabel `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `recepten`
--
ALTER TABLE `recepten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `recepten`
--
ALTER TABLE `recepten`
  ADD CONSTRAINT `FKMedicijn` FOREIGN KEY (`medicijnid`) REFERENCES `medicijnen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
