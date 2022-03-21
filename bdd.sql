-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 21, 2022 at 10:07 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `selection`
--

-- --------------------------------------------------------

--
-- Table structure for table `grille`
--

CREATE TABLE `grille` (
  `id_grille` int(11) NOT NULL,
  `numero_candidat` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `type_bac` varchar(50) NOT NULL,
  `serieux` varchar(50) NOT NULL,
  `absence` varchar(50) NOT NULL,
  `attitude` varchar(50) NOT NULL,
  `etude` varchar(50) NOT NULL,
  `avis_pp` varchar(50) NOT NULL,
  `avis_proviseur` varchar(50) NOT NULL,
  `lettre` varchar(50) NOT NULL,
  `remarque` text NOT NULL,
  `etat_dossier` varchar(50) NOT NULL,
  `note_finale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grille`
--

INSERT INTO `grille` (`id_grille`, `numero_candidat`, `nom`, `prenom`, `type_bac`, `serieux`, `absence`, `attitude`, `etude`, `avis_pp`, `avis_proviseur`, `lettre`, `remarque`, `etat_dossier`, `note_finale`) VALUES
(2, 302432, 'ETTOUIL', 'Adel zibard', 'stmg', 'serieux-no', 'absence-yes', 'attitude-no', 'etude-yes', 'insuffisant', 'assez_bien', 'bien', 'bla bla bla bla bla oui le bla bla', 'accepte', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `pwd` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `pwd`, `type`) VALUES
(1, 'admin', 'sio', 'admin'),
(2, 'secretaire', 'sio', 'secretaire'),
(4, 'evaluateur', 'sio', 'evaluateur'),
(5, 'test', 'sio', 'evaluateur'),
(8, 'siocrack', 'sio', 'evaluateur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grille`
--
ALTER TABLE `grille`
  ADD PRIMARY KEY (`id_grille`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grille`
--
ALTER TABLE `grille`
  MODIFY `id_grille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
