-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 08 oct. 2021 à 17:15
-- Version du serveur : 10.4.10-MariaDB
-- Version de PHP : 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hospitale2n`
--

-- --------------------------------------------------------

--
-- Structure de la table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `dateHour` datetime NOT NULL,
  `idPatients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `appointments`
--

INSERT INTO `appointments` (`id`, `dateHour`, `idPatients`) VALUES
(13, '2021-10-14 21:12:00', 6);

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES
(6, 'Durand', 'kiki', '2007-10-12', '0659786541', 'testy@gmail.com'),
(7, 'aerty', 'loiic', '2007-10-12', '0659786541', 'testy@gmail.com'),
(12, 'john', 'does', '1105-10-12', '0659786541', 'dooo@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_appointments_id_patients` (`idPatients`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `FK_appointments_id_patients` FOREIGN KEY (`idPatients`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
