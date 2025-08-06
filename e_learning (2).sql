-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 05 août 2025 à 11:17
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e_learning`
--

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE `contenu` (
  `id_contenu` int(11) NOT NULL,
  `titre_contenu` varchar(255) NOT NULL,
  `type_contenu` varchar(50) DEFAULT NULL,
  `url_fichier` varchar(255) DEFAULT NULL,
  `chiffre` tinyint(1) DEFAULT 1,
  `id_cours` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `id_enseignant` int(11) NOT NULL,
  `id_semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `titre`, `description`, `id_enseignant`, `id_semestre`) VALUES
(1, 'introduction au reseau', 'reseau informatique', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id_groupe` int(11) NOT NULL,
  `nom_groupe` varchar(100) NOT NULL,
  `niveau` varchar(50) DEFAULT NULL,
  `cle_chiffrement` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id_groupe`, `nom_groupe`, `niveau`, `cle_chiffrement`) VALUES
(1, 'Informatique', 'niveau1', 'k??>?WC)??Z?A?x'),
(2, 'Mathematique', 'niveau1', 'goldong');

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

CREATE TABLE `semestre` (
  `id_semestre` int(11) NOT NULL,
  `nom_semestre` varchar(50) NOT NULL,
  `niveau` varchar(50) DEFAULT NULL,
  `annee_academique` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `semestre`
--

INSERT INTO `semestre` (`id_semestre`, `nom_semestre`, `niveau`, `annee_academique`) VALUES
(1, 'semestre1', 'niveau', '2024-2025'),
(2, 'semestre2', 'niveau1', '2024-2025');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `type_utilisateur` enum('etudiant','enseignant','admin') NOT NULL,
  `id_groupe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `mot_de_passe`, `type_utilisateur`, `id_groupe`) VALUES
(1, 'tchopwe', 'emilien', 'enmilien@gmail.com', 'tchopwe', 'admin', 1),
(2, 'djong', 'fabrice', 'fabrice@gmail.com', 'fabrice', 'etudiant', 2),
(3, 'ngansop', 'leslie', 'leslie@gmail.com', 'leslie', 'enseignant', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`id_contenu`),
  ADD KEY `id_cours` (`id_cours`),
  ADD KEY `id_groupe` (`id_groupe`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `id_enseignant` (`id_enseignant`),
  ADD KEY `id_semestre` (`id_semestre`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_groupe`);

--
-- Index pour la table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id_semestre`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_groupe` (`id_groupe`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD CONSTRAINT `contenu_ibfk_1` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id_cours`),
  ADD CONSTRAINT `contenu_ibfk_2` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id_groupe`),
  ADD CONSTRAINT `contenu_ibfk_3` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`id_enseignant`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id_groupe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
