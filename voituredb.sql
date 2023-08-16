-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 13 fév. 2020 à 14:07
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `voituredb`
--

-- --------------------------------------------------------

--
-- Structure de la table `passager`
--

DROP TABLE IF EXISTS `passager`;
CREATE TABLE IF NOT EXISTS `passager` (
  `trajet_id` int(11) NOT NULL,
  `utilisateur_login` varchar(32) NOT NULL,
  PRIMARY KEY (`trajet_id`,`utilisateur_login`),
  KEY `utilisateur_login` (`utilisateur_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `passager`
--

INSERT INTO `passager` (`trajet_id`, `utilisateur_login`) VALUES
(2, 'femme'),
(2, 'moni'),
(3, 'moni');

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

DROP TABLE IF EXISTS `trajet`;
CREATE TABLE IF NOT EXISTS `trajet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depart` varchar(32) NOT NULL,
  `arrivee` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `nbplaces` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `conducteur_login` varchar(32) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `conducteur_login` (`conducteur_login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`id`, `depart`, `arrivee`, `date`, `nbplaces`, `prix`, `conducteur_login`) VALUES
(2, 'CASA', 'RABT', '2020-01-22', 1, 200, 'moni'),
(3, 'meknes', 'fes', '2020-01-15', 12, 1456, 'moni');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `login` varchar(32) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `nom`, `prenom`) VALUES
('femme', 'rajie', 'rajae'),
('moni', 'ELMQGHRQOUI', 'MOUNIR');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `immatriculation` varchar(8) NOT NULL,
  `marque` varchar(25) NOT NULL,
  `couleur` varchar(12) NOT NULL,
  PRIMARY KEY (`immatriculation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`immatriculation`, `marque`, `couleur`) VALUES
('A15-8790', 'vert', 'bmw'),
('B34-789', 'GINETTA', 'VERT'),
('R56-567', 'bmw', 'rouge');

-- --------------------------------------------------------

--
-- Structure de la table `voiture2`
--

DROP TABLE IF EXISTS `voiture2`;
CREATE TABLE IF NOT EXISTS `voiture2` (
  `immatriculation` varchar(8) NOT NULL,
  `marque` varchar(25) NOT NULL,
  `couleur` varchar(12) NOT NULL,
  PRIMARY KEY (`immatriculation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `voiture2`
--

INSERT INTO `voiture2` (`immatriculation`, `marque`, `couleur`) VALUES
('12345678', 'Ferrari', 'vert'),
('259641', 'Renault', 'Noire'),
('710097', 'Tesla', 'Bleu nuit'),
('8369210', 'Tesla', 'Bleu nuit'),
('abc124az', 'Renault', 'bleu');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `passager`
--
ALTER TABLE `passager`
  ADD CONSTRAINT `passager_ibfk_1` FOREIGN KEY (`trajet_id`) REFERENCES `trajet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `passager_ibfk_2` FOREIGN KEY (`utilisateur_login`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `trajet_ibfk_1` FOREIGN KEY (`conducteur_login`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
