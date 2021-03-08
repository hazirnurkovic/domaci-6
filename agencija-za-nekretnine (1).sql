-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 12:39 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agencija-za-nekretnine`
--

-- --------------------------------------------------------

--
-- Table structure for table `fotografija`
--

CREATE TABLE `fotografija` (
  `ID` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `nekretnina_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fotografija`
--

INSERT INTO `fotografija` (`ID`, `naziv`, `nekretnina_ID`) VALUES
(15, '../uploads/603c654f5aa79_nek.jfif', 33),
(16, '../uploads/603c654f5b3d3_pozadina_detalj.jpg', 33),
(17, '../uploads/603c654f5bc91_pozadina_grad.jpg', 33),
(18, '../uploads/603c67962cb1a_pozadina_grad.jpg', 34),
(19, '../uploads/603c67962d6ad_pozadina_nova.jpg', 34);

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `ID` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`ID`, `naziv`) VALUES
(1, 'Podgorica'),
(2, 'Niksic'),
(3, 'Pljevlja'),
(4, 'Bijelo Polje'),
(5, 'Cetinje'),
(6, 'Bar'),
(7, 'Herceg Novi'),
(8, 'Berane'),
(9, 'Budva'),
(10, 'Ulcinj'),
(11, 'Tivat'),
(12, 'Rozaje'),
(13, 'Kotor'),
(14, 'Danilovgrad'),
(15, 'Mojkovac'),
(16, 'Plav'),
(17, 'Kolasin'),
(18, 'Zabljak'),
(19, 'Pluzine'),
(20, 'Andrijevica'),
(21, 'Savnik');

-- --------------------------------------------------------

--
-- Table structure for table `nekretnina`
--

CREATE TABLE `nekretnina` (
  `ID` int(11) NOT NULL,
  `godina` int(11) NOT NULL,
  `povrsina` varchar(255) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `cijena` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `datum` date NOT NULL,
  `grad_id` int(11) NOT NULL,
  `tip_id` int(11) NOT NULL,
  `oglas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nekretnina`
--

INSERT INTO `nekretnina` (`ID`, `godina`, `povrsina`, `opis`, `cijena`, `status`, `datum`, `grad_id`, `tip_id`, `oglas_id`) VALUES
(33, 2009, '100', 'Centar', '103000', 'Dostupno', '0000-00-00', 4, 1, 1),
(34, 2019, '233', 'U samom centru grada.', '350', 'Dostupno', '0000-00-00', 12, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tip-nekretnine`
--

CREATE TABLE `tip-nekretnine` (
  `ID` int(11) NOT NULL,
  `naziv_tipa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tip-nekretnine`
--

INSERT INTO `tip-nekretnine` (`ID`, `naziv_tipa`) VALUES
(1, 'Stan'),
(2, 'Kuca'),
(3, 'Garaza'),
(4, 'Poslovni prostor');

-- --------------------------------------------------------

--
-- Table structure for table `tip-oglasa`
--

CREATE TABLE `tip-oglasa` (
  `ID` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tip-oglasa`
--

INSERT INTO `tip-oglasa` (`ID`, `naziv`) VALUES
(1, 'Prodaja'),
(2, 'Iznajmljivanje'),
(3, 'Kompenzacija');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fotografija`
--
ALTER TABLE `fotografija`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_foto_nekretnina` (`nekretnina_ID`);

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nekretnina`
--
ALTER TABLE `nekretnina`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_nekretnina_grad` (`grad_id`),
  ADD KEY `fk_nekretnina_tip` (`tip_id`),
  ADD KEY `fk_nekretnina_oglas` (`oglas_id`);

--
-- Indexes for table `tip-nekretnine`
--
ALTER TABLE `tip-nekretnine`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tip-oglasa`
--
ALTER TABLE `tip-oglasa`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotografija`
--
ALTER TABLE `fotografija`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nekretnina`
--
ALTER TABLE `nekretnina`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tip-nekretnine`
--
ALTER TABLE `tip-nekretnine`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tip-oglasa`
--
ALTER TABLE `tip-oglasa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fotografija`
--
ALTER TABLE `fotografija`
  ADD CONSTRAINT `fk_foto_nekretnina` FOREIGN KEY (`nekretnina_ID`) REFERENCES `nekretnina` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `nekretnina`
--
ALTER TABLE `nekretnina`
  ADD CONSTRAINT `fk_nekretnina_grad` FOREIGN KEY (`grad_id`) REFERENCES `grad` (`ID`),
  ADD CONSTRAINT `fk_nekretnina_oglas` FOREIGN KEY (`oglas_id`) REFERENCES `tip-oglasa` (`ID`),
  ADD CONSTRAINT `fk_nekretnina_tip` FOREIGN KEY (`tip_id`) REFERENCES `tip-nekretnine` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
