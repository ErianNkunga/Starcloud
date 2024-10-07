-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 07 okt 2024 om 21:17
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starcloud`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `games`
--

CREATE TABLE `games` (
  `Artikelnr` int(11) NOT NULL,
  `Naam` varchar(255) DEFAULT NULL,
  `Prijs` decimal(10,2) DEFAULT NULL,
  `Genre` varchar(255) DEFAULT NULL,
  `Voorraad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `games`
--

INSERT INTO `games` (`Artikelnr`, `Naam`, `Prijs`, `Genre`, `Voorraad`) VALUES
(1, 'Grand Theft Auto 6', '60.00', 'Action', 6),
(2, 'Sims 4', '59.00', 'Simulation', 18),
(3, 'Minecraft', '20.00', 'Sandbox', 33),
(4, 'Call of Duty', '60.00', 'FPS', 24),
(5, 'Mario Kart', '20.00', 'Racing', 28),
(6, 'Mortal Kombat', '40.00', 'Fighting', 30),
(7, 'Legend of Zelda', '60.00', 'Adventure', 44),
(8, 'Street Fighter', '60.00', 'Adventure', 41),
(10, 'Roblox', '10.00', 'building', 22);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `Klantnr` int(11) NOT NULL,
  `Naam` varchar(255) DEFAULT NULL,
  `Adres` varchar(255) DEFAULT NULL,
  `Postcode` varchar(10) DEFAULT NULL,
  `Woonplaats` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`Klantnr`, `Naam`, `Adres`, `Postcode`, `Woonplaats`, `Email`) VALUES
(1, 'J. Albema', 'Hoofdstraat 59', '1025 KN', 'Amsterdam', 'J.Albema@Ziggo.com'),
(2, 'K. Balema', 'Lindengracht 33', '1082 KL', 'Amsterdam', 'KBaal@hotmail.com'),
(3, 'P. de Vries', 'Kasteel 5', '3872 LM', 'Alkmaar', 'PdeVries@hotmail.com'),
(4, 'P. Haarlem', 'Amsterdamse weg 107', '3038 DF', 'Haarlem', 'PHaarlem@gmail.com'),
(5, 'L. Halsema', 'Boerenlaan 77', '3974 PK', 'Groningen', 'Superman@hotmail.com'),
(6, 'L. Groothoofd', 'Jan de Bouvierstraat 21', '8564 LP', 'Amstelveen', 'Grootkop@gmail.com'),
(7, 'L. Bartels', 'Veenwegen 974', '2963 KL', 'Hoofddorp', 'Bartel@gmail.com'),
(8, 'P. de Jong', 'Amstelkade 64', '1957 ED', 'Rotterdam', 'P.deJong@hotmail.com'),
(9, 'K. Vrolijk', 'Parkstraat 54', '4045 MN', 'Rotterdam', 'Vrolijkjoch@gmail.com'),
(10, 'L. Vroom', 'Kerkstraat 9', '2046 LK', 'Haarlem', 'VroomL@gmail.com'),
(11, 'Denny', 'feasfr', '2034KL', 'Haarlem', 'test@test.nl');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

CREATE TABLE `order` (
  `ordernummer` int(11) NOT NULL,
  `Klantnr` int(11) NOT NULL,
  `orderdatum` date NOT NULL,
  `betaald` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `order`
--

INSERT INTO `order` (`ordernummer`, `Klantnr`, `orderdatum`, `betaald`) VALUES
(1, 1, '2021-11-05', 1),
(2, 2, '2021-10-08', 0),
(3, 8, '2021-01-05', 0),
(4, 2, '2021-10-07', 0),
(5, 7, '2021-11-05', 1),
(6, 1, '2021-10-08', 1),
(7, 8, '2021-04-02', 1),
(8, 5, '2021-08-07', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orderregel`
--

CREATE TABLE `orderregel` (
  `ordernummer` int(11) NOT NULL,
  `Artikelnr` int(11) NOT NULL,
  `aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `orderregel`
--

INSERT INTO `orderregel` (`ordernummer`, `Artikelnr`, `aantal`) VALUES
(1, 1, 4),
(1, 2, 1),
(2, 3, 1),
(2, 4, 2),
(3, 1, 3),
(3, 2, 1),
(3, 6, 1),
(3, 4, 2),
(4, 3, 1),
(4, 2, 2),
(4, 6, 1),
(4, 2, 1),
(5, 2, 1),
(6, 3, 2),
(6, 5, 1),
(7, 1, 5),
(7, 2, 3),
(7, 5, 1),
(8, 4, 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`Artikelnr`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`Klantnr`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `games`
--
ALTER TABLE `games`
  MODIFY `Artikelnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `Klantnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
