-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 21 sep. 2022 à 20:35
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ProjetSSI`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `nomdutilisateur` int(11) NOT NULL,
  `commentaire` varchar(4096) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `nomdutilisateur`, `commentaire`) VALUES
(5, 13, 'Bonjour'),
(6, 13, 'Bonjour'),
(7, 15, 'Bonjour'),
(8, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at libero dictum, pharetra felis vel, tempor nisl. Donec eget tincidunt nibh. Vivamus et ullamcorper neque, rutrum maximus nulla. Aliquam venenatis purus et scelerisque varius. Maecenas lacus libero, congue a sodales et, dictum quis nibh.'),
(9, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at libero dictum, pharetra felis vel, tempor nisl. Donec eget tincidunt nibh. Vivamus et ullamcorper neque, rutrum maximus nulla. Aliquam venenatis purus et scelerisque varius. Maecenas lacus libero, congue a sodales et, dictum quis nibh.'),
(10, 19, '動人防來，大世待了、小能失體。國層子望中樣資領士人格子外，包會城畫行面為子過公行生功……速黃加食我學……成古學晚色人小童加，少意解響是了是格最上只聲行開合教作：生無代速走有旅續。生遊子！布事口家盡什走地盡票將！青人可急。');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `hiddenprivatedata`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `hiddenprivatedata` (
`id` int(11)
,`nomdutilisateur` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure de la table `test_table`
--

CREATE TABLE `test_table` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `test_table`
--

INSERT INTO `test_table` (`id`) VALUES
(1),
(1),
(2),
(2),
(213);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nomdutilisateur` varchar(20) DEFAULT NULL,
  `donneespersonnelles` varchar(4096) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nomdutilisateur`, `donneespersonnelles`) VALUES
(13, 'JaneDoe', 'Ullamco short loin leberkas voluptate dolore short ribs officia pig fugiat capicola enim ground round hamburger tail tempor.'),
(14, 'JohnDoe', 'Ullamco short loin leberkas voluptate dolore short ribs officia pig fugiat capicola enim ground round hamburger tail tempor.'),
(15, 'WillyWood', 'Ullamco short loin leberkas voluptate dolore short ribs officia pig fugiat capicola enim ground round hamburger tail tempor.');

-- --------------------------------------------------------

--
-- Structure de la vue `hiddenprivatedata`
--
DROP TABLE IF EXISTS `hiddenprivatedata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hiddenprivatedata`  AS SELECT `utilisateur`.`id` AS `id`, `utilisateur`.`nomdutilisateur` AS `nomdutilisateur` FROM `utilisateur` ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
