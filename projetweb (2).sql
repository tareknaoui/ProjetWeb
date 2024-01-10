-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mar. 09 jan. 2024 à 19:53
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
-- Base de données : `projetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `AdresseEmail` varchar(255) DEFAULT NULL,
  `MotDePasse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `encadreurs`
--

CREATE TABLE `encadreurs` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `AdresseEmail` varchar(255) DEFAULT NULL,
  `MotDePasse` varchar(255) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `universite` varchar(255) DEFAULT NULL,
  `departement` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `encadreurs`
--

INSERT INTO `encadreurs` (`ID`, `Nom`, `Prenom`, `AdresseEmail`, `MotDePasse`, `date_naissance`, `universite`, `departement`) VALUES
(8, 'Boudjabi', 'Farid', 'salam@gmail.com', 'Dadi2003@', '0000-00-00', 'esst', 'info');

-- --------------------------------------------------------

--
-- Structure de la table `equipesprojet`
--

CREATE TABLE `equipesprojet` (
  `ID` int(11) NOT NULL,
  `ProjetID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipesprojet`
--

INSERT INTO `equipesprojet` (`ID`, `ProjetID`) VALUES
(1, 18);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `AdresseEmail` varchar(255) DEFAULT NULL,
  `MotDePasse` varchar(255) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `Universite` varchar(255) DEFAULT NULL,
  `Faculte` varchar(255) DEFAULT NULL,
  `Specialite` varchar(255) DEFAULT NULL,
  `IdEquipe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`ID`, `Nom`, `Prenom`, `AdresseEmail`, `MotDePasse`, `DateNaissance`, `Universite`, `Faculte`, `Specialite`, `IdEquipe`) VALUES
(1, 'Fahd', 'Ali', 'ali@gmail.com', 'Dadi2003@', '2024-01-09', 'esst', 'info', 'isil', 1),
(6, 'NAOUI', 'Tarek', 'naoui.tarekanis@gmail.com', 'Dadi2003@', '0000-00-00', 'ESST', 'Info', 'ISIL', 1);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `encadreur_id` int(11) DEFAULT NULL,
  `sender` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `etudiant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `encadreur_id`, `sender`, `message`, `created_at`, `etudiant_id`) VALUES
(6, 1, '', 'dwa', '2024-01-09 14:13:51', 6);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `ID` int(11) NOT NULL,
  `TitreProjet` varchar(255) DEFAULT NULL,
  `DescriptionProjet` varchar(300) DEFAULT NULL,
  `EncadreurID` int(11) DEFAULT NULL,
  `EtatProjet` varchar(20) DEFAULT NULL,
  `DateCreation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`ID`, `TitreProjet`, `DescriptionProjet`, `EncadreurID`, `EtatProjet`, `DateCreation`) VALUES
(18, 'Projet 1', 'Description du projet 1', 8, 'En cours', '2024-01-09'),
(19, 'Projet 2', 'Description du projet 2', 8, 'En attente', '2024-01-10'),
(20, 'Projet 3', 'Description du projet 3', 8, 'Terminé', '2024-01-11');

-- --------------------------------------------------------

--
-- Structure de la table `tachesprojet`
--

CREATE TABLE `tachesprojet` (
  `ID` int(11) NOT NULL,
  `ProjetID` int(11) DEFAULT NULL,
  `DescriptionTache` text DEFAULT NULL,
  `ResponsableTacheID` int(11) DEFAULT NULL,
  `Echeance` date DEFAULT NULL,
  `EtatTache` enum('To do','In progress') DEFAULT 'To do'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `encadreurs`
--
ALTER TABLE `encadreurs`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `equipesprojet`
--
ALTER TABLE `equipesprojet`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ProjetID` (`ProjetID`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk` (`IdEquipe`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `encadreur_id` (`encadreur_id`),
  ADD KEY `notification_ibfk_2` (`etudiant_id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EncadreurID` (`EncadreurID`);

--
-- Index pour la table `tachesprojet`
--
ALTER TABLE `tachesprojet`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ProjetID` (`ProjetID`),
  ADD KEY `ResponsableTacheID` (`ResponsableTacheID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `encadreurs`
--
ALTER TABLE `encadreurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `equipesprojet`
--
ALTER TABLE `equipesprojet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `tachesprojet`
--
ALTER TABLE `tachesprojet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233233;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
