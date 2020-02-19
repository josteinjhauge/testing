-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 14. Feb, 2020 13:49 PM
-- Tjener-versjon: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Bank`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Konto`
--

DROP TABLE IF EXISTS `Konto`;
CREATE TABLE `Konto` (
  `Kontonummer` varchar(20) NOT NULL,
  `Personnummer` varchar(11) NOT NULL,
  `Saldo` float NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Valuta` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `Konto`
--

INSERT INTO `Konto` (`Kontonummer`, `Personnummer`, `Saldo`, `Type`, `Valuta`) VALUES
('105010123456', '01010110523', 720, 'Lønnskonto', 'NOK'),
('105020123456', '01010110523', 100500, 'Sparekonto', 'NOK'),
('22222334444', '11029700112', 9000000, 'Brukskonto', 'USD'),
('22334412345', '01010110523', 10234.5, 'Brukskonto', 'NOK'),
('33333662222', '11029700112', 45, 'Sparekonto', 'USD'),
('44444992222', '11029700112', 200, 'Lønnskonto', 'USD'),
('55555224444', '12345123456', 3, 'Brukskonto', 'SEK');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Kunde`
--

DROP TABLE IF EXISTS `Kunde`;
CREATE TABLE `Kunde` (
  `Personnummer` varchar(11) NOT NULL,
  `Fornavn` varchar(30) NOT NULL,
  `Etternavn` varchar(30) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `Postnr` varchar(4) NOT NULL,
  `Telefonnr` varchar(8) NOT NULL,
  `Passord` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `Kunde`
--

INSERT INTO `Kunde` (`Personnummer`, `Fornavn`, `Etternavn`, `Adresse`, `Postnr`, `Telefonnr`, `Passord`) VALUES
('01010110523', 'Lene', 'Jensen', 'Askerveien 22', '3270', '22224444', 'Passord1!'),
('11029700112', 'Zak', 'Ibrahim', 'Nesveien', '1440', '12020509', 'Passord1!'),
('12345123456', 'Johan', 'Olsson', 'Svenskevegen', '9999', '22223535', 'Passord1!'),
('12345678901', 'Per', 'Hansen', 'Osloveien 82', '1234', '12345678', 'Passord1!');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Poststed`
--

DROP TABLE IF EXISTS `Poststed`;
CREATE TABLE `Poststed` (
  `Postnr` varchar(4) NOT NULL,
  `Poststed` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `Poststed`
--

INSERT INTO `Poststed` (`Postnr`, `Poststed`) VALUES
('1234', 'Oslo'),
('1440', 'Nesoya'),
('3270', 'Asker');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Transaksjon`
--

DROP TABLE IF EXISTS `Transaksjon`;
CREATE TABLE `Transaksjon` (
  `TxID` int(11) NOT NULL,
  `FraTilKontonummer` varchar(20) NOT NULL,
  `Belop` float NOT NULL,
  `Dato` date NOT NULL,
  `Melding` varchar(100) NOT NULL,
  `Kontonummer` varchar(20) NOT NULL,
  `Avventer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `Transaksjon`
--

INSERT INTO `Transaksjon` (`TxID`, `FraTilKontonummer`, `Belop`, `Dato`, `Melding`, `Kontonummer`, `Avventer`) VALUES
(1, '20102012345', -100.5, '2015-03-15', 'Meny Storo', '105010123456', 0),
(2, '20102012345', 400.4, '2015-03-20', 'Innebtaling', '105010123456', 0),
(3, '20102012345', -1400.7, '2015-03-13', 'Husleie', '55551166677', 1),
(4, '20102012347', -5000.5, '2015-03-30', 'Skatt', '105010123456', 0),
(5, '20102012345', 345.56, '2015-03-13', 'Test', '55551166677', 0),
(6, '345678908', 3000, '2012-12-12', '', '105010123456', 0),
(7, '234534678', 15, '2012-12-12', 'Hei', '105010123456', 0),
(8, '1234254365', 125, '2012-12-12', 'Hopp', '105010123456', 0),
(9, '09090909090', 2, '2020-02-14', 'Tapas', '55555224444', 1),
(10, '55555224444', 9000000, '2019-12-24', 'Takk for i går ;)', '22222334444', 1),
(11, '55555224444', -80, '2019-12-25', 'For dårlig samvittighet', '22222334444', 1),
(12, '105010123456', -123, '2020-01-01', 'En nyyydelig dag', '22222334444', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Konto`
--
ALTER TABLE `Konto`
  ADD PRIMARY KEY (`Kontonummer`);

--
-- Indexes for table `Kunde`
--
ALTER TABLE `Kunde`
  ADD PRIMARY KEY (`Personnummer`);

--
-- Indexes for table `Poststed`
--
ALTER TABLE `Poststed`
  ADD PRIMARY KEY (`Postnr`);

--
-- Indexes for table `Transaksjon`
--
ALTER TABLE `Transaksjon`
  ADD PRIMARY KEY (`TxID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Transaksjon`
--
ALTER TABLE `Transaksjon`
  MODIFY `TxID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
