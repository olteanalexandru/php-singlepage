-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 08:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `colocviu`
--

-- --------------------------------------------------------

--
-- Table structure for table `contract_j`
--

CREATE TABLE `contract_j` (
  `ID_CJ` smallint(6) NOT NULL,
  `DATA` datetime DEFAULT NULL,
  `OBIECT` varchar(30) DEFAULT NULL CHECK (`OBIECT` = 'actiune civila' or `OBIECT` = 'actiune penala'),
  `ONORAR` decimal(20,0) DEFAULT NULL,
  `NR_PAGINI` int(11) DEFAULT NULL,
  `ID_CLIENT` smallint(6) DEFAULT NULL,
  `ID_AVOCAT` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract_j`
--

INSERT INTO `contract_j` (`ID_CJ`, `DATA`, `OBIECT`, `ONORAR`, `NR_PAGINI`, `ID_CLIENT`, `ID_AVOCAT`) VALUES
(1, '2021-09-09 00:00:00', 'actiune civila', '1000', 5, 1, 2),
(2, '2021-09-09 00:00:00', 'actiune penala', '2500', 7, 1, 3),
(3, '2021-10-10 00:00:00', 'actiune civila', '1200', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contract_m`
--

CREATE TABLE `contract_m` (
  `id_cm` smallint(6) NOT NULL,
  `data` datetime DEFAULT NULL,
  `functie` varchar(20) DEFAULT NULL,
  `salar_baza` decimal(20,0) DEFAULT NULL,
  `comision` decimal(20,0) DEFAULT NULL,
  `id_angajat` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract_m`
--

INSERT INTO `contract_m` (`id_cm`, `data`, `functie`, `salar_baza`, `comision`, `id_angajat`) VALUES
(1, '2021-09-09 00:00:00', 'avocat', '5000', '18', 2),
(2, '2021-07-09 00:00:00', 'avocat', '4000', '18', 3),
(3, '2021-09-10 00:00:00', 'avocat', '3400', '12', 4),
(4, '2021-02-09 00:00:00', 'non avocat', '4000', '18', 5),
(5, '2021-10-10 00:00:00', 'non avocat', '3400', '12', 6),
(123, '2021-10-10 00:00:00', 'non avocat', '3400', '12', 6);

-- --------------------------------------------------------

--
-- Table structure for table `persoana`
--

CREATE TABLE `persoana` (
  `id_p` smallint(6) NOT NULL,
  `nume` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `adresa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persoana`
--

INSERT INTO `persoana` (`id_p`, `nume`, `email`, `adresa`) VALUES
(1, 'Andrei', 'andrei@gmail.com', 'Cluj Napoca'),
(2, 'Marius', 'Marius@gmail.com', 'Sibiu'),
(3, 'Flavius', 'Flavius@gmail.com', 'Mures'),
(5, 'Marius2', 'Marius2@gmail.com', 'Sibiu2'),
(6, 'Flavius2', 'Flavius2@gmail.com', 'Mures2');

-- --------------------------------------------------------

--
-- Table structure for table `rata`
--

CREATE TABLE `rata` (
  `id_cj` smallint(6) DEFAULT NULL,
  `id_r` smallint(6) NOT NULL,
  `data` datetime DEFAULT NULL,
  `suma` decimal(20,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rata`
--

INSERT INTO `rata` (`id_cj`, `id_r`, `data`, `suma`) VALUES
(1, 1, '2021-01-01 00:00:00', '2000'),
(1, 2, '2021-02-02 00:00:00', '2000'),
(1, 3, '2021-03-03 00:00:00', '2000'),
(1, 4, '2021-03-03 00:00:00', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'ceva', '970c7956028654ac329b12c10b112058'),
(2, 'ceva2', 'efee4405fc77b59719872cb1b55a698e'),
(3, 'ttt', '9990775155c3518a0d7917f7780b24aa'),
(4, 'rrr', '44f437ced647ec3f40fa0841041871cd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contract_j`
--
ALTER TABLE `contract_j`
  ADD PRIMARY KEY (`ID_CJ`);

--
-- Indexes for table `contract_m`
--
ALTER TABLE `contract_m`
  ADD PRIMARY KEY (`id_cm`);

--
-- Indexes for table `persoana`
--
ALTER TABLE `persoana`
  ADD PRIMARY KEY (`id_p`);

--
-- Indexes for table `rata`
--
ALTER TABLE `rata`
  ADD PRIMARY KEY (`id_r`),
  ADD KEY `id_cj` (`id_cj`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rata`
--
ALTER TABLE `rata`
  ADD CONSTRAINT `rata_ibfk_1` FOREIGN KEY (`id_cj`) REFERENCES `contract_j` (`ID_CJ`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
