-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:1025
-- Généré le :  Sam 06 Janvier 2018 à 11:42
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `project2`
--

-- --------------------------------------------------------

--
-- Structure de la table `Annee`
--

CREATE TABLE `Annee` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Annee`
--

INSERT INTO `Annee` (`id`, `name`) VALUES
(3, 2015),
(4, 2022),
(5, 2048);

-- --------------------------------------------------------

--
-- Structure de la table `Auteur`
--

CREATE TABLE `Auteur` (
  `id` int(11) NOT NULL,
  `nom` text COLLATE utf8_unicode_ci NOT NULL,
  `prenom` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Auteur`
--

INSERT INTO `Auteur` (`id`, `nom`, `prenom`) VALUES
(1, 'HUGO', 'Victor'),
(3, 'Rowling', 'Joanne'),
(4, 'la banane', 'coucou'),
(5, 'Cule', 'Jean');

-- --------------------------------------------------------

--
-- Structure de la table `Genre`
--

CREATE TABLE `Genre` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Genre`
--

INSERT INTO `Genre` (`id`, `name`) VALUES
(1, 'Horreur'),
(5, 'Sorcellerie'),
(6, 'Porno');

-- --------------------------------------------------------

--
-- Structure de la table `Langue`
--

CREATE TABLE `Langue` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Langue`
--

INSERT INTO `Langue` (`id`, `name`) VALUES
(1, 'Anglais'),
(3, 'Francais'),
(4, 'Allemand'),
(5, 'roumain');

-- --------------------------------------------------------

--
-- Structure de la table `Lieu`
--

CREATE TABLE `Lieu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Lieu`
--

INSERT INTO `Lieu` (`id`, `name`) VALUES
(1, 'salon'),
(2, 'jardin');

-- --------------------------------------------------------

--
-- Structure de la table `Livre`
--

CREATE TABLE `Livre` (
  `id` int(11) NOT NULL,
  `titre` text COLLATE utf8_unicode_ci NOT NULL,
  `descriptif` text COLLATE utf8_unicode_ci NOT NULL,
  `langueID` int(11) NOT NULL,
  `auteurID` int(11) NOT NULL,
  `anneeID` int(11) NOT NULL,
  `genreID` int(11) NOT NULL,
  `lieuID` int(11) NOT NULL,
  `url` varchar(450) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Livre`
--

INSERT INTO `Livre` (`id`, `titre`, `descriptif`, `langueID`, `auteurID`, `anneeID`, `genreID`, `lieuID`, `url`) VALUES
(2, 'Harry Potter', 'Francais - 2015', 3, 3, 3, 5, 1, 'https://livre.fnac.com/a11027882/Harry-Potter-Tome-4-Harry-Potter-et-la-coupe-de-feu-J-K-Rowling'),
(3, 'Harry Potter 1', 'Anglais - 2022 - Victor HUGO', 1, 1, 4, 1, 1, ''),
(4, 'tom et jerry', 'cocou', 5, 4, 4, 5, 1, ''),
(6, 'La femme nue', 'Elle suce', 1, 5, 5, 6, 2, 'youprn.com');

-- --------------------------------------------------------

--
-- Structure de la table `Note`
--

CREATE TABLE `Note` (
  `id` int(11) NOT NULL,
  `livreID` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `commentaire` varchar(600) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Note`
--

INSERT INTO `Note` (`id`, `livreID`, `note`, `commentaire`) VALUES
(1, 2, 5, 'nul'),
(2, 3, 17, 'tres bien'),
(3, 2, 15, 'bien'),
(4, 3, 3, 'de la merde'),
(5, 3, 16, 'nickel'),
(6, 3, 18, 'superbe'),
(7, 3, 18, 'superbe'),
(8, 3, 18, 'superbe'),
(9, 2, 18, 'C''est superbe'),
(10, 2, 20, 'Cool '),
(11, 2, 15, 'nickel'),
(12, 2, 12, 'coucou B.X. '),
(13, 2, 1, 'nul a chier'),
(14, 2, 1, 'batard'),
(15, 4, 20, 'top');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Annee`
--
ALTER TABLE `Annee`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Auteur`
--
ALTER TABLE `Auteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Genre`
--
ALTER TABLE `Genre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Langue`
--
ALTER TABLE `Langue`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Lieu`
--
ALTER TABLE `Lieu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Livre`
--
ALTER TABLE `Livre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `langueID` (`langueID`),
  ADD KEY `langueID_2` (`langueID`);

--
-- Index pour la table `Note`
--
ALTER TABLE `Note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livreID` (`livreID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Annee`
--
ALTER TABLE `Annee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Auteur`
--
ALTER TABLE `Auteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Genre`
--
ALTER TABLE `Genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `Langue`
--
ALTER TABLE `Langue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Lieu`
--
ALTER TABLE `Lieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Livre`
--
ALTER TABLE `Livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `Note`
--
ALTER TABLE `Note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;