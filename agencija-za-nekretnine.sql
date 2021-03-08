-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2021 at 02:07 AM
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

--
-- Dumping data for table `fotografija`
--

INSERT INTO `fotografija` (`ID`, `naziv`, `nekretnina_ID`) VALUES
(15, '../uploads/603c654f5aa79_nek.jfif', 33),
(16, '../uploads/603c654f5b3d3_pozadina_detalj.jpg', 33),
(17, '../uploads/603c654f5bc91_pozadina_grad.jpg', 33),
(18, '../uploads/603c67962cb1a_pozadina_grad.jpg', 34),
(19, '../uploads/603c67962d6ad_pozadina_nova.jpg', 34);

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

--
-- Dumping data for table `nekretnina`
--

INSERT INTO `nekretnina` (`ID`, `godina`, `povrsina`, `opis`, `cijena`, `status`, `datum`, `grad_id`, `tip_id`, `oglas_id`) VALUES
(33, 2009, '100', 'Centar', '103000', 'Dostupno', '0000-00-00', 4, 1, 1),
(34, 2019, '233', 'U samom centru grada.', '350', 'Dostupno', '0000-00-00', 12, 4, 2);

--
-- Dumping data for table `tip-nekretnine`
--

INSERT INTO `tip-nekretnine` (`ID`, `naziv_tipa`) VALUES
(1, 'Stan'),
(2, 'Kuca'),
(3, 'Garaza'),
(4, 'Poslovni prostor');

--
-- Dumping data for table `tip-oglasa`
--

INSERT INTO `tip-oglasa` (`ID`, `naziv`) VALUES
(1, 'Prodaja'),
(2, 'Iznajmljivanje'),
(3, 'Kompenzacija');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
