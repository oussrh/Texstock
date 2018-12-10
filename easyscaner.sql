-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Dim 08 Octobre 2017 à 14:59
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `scannerfly`
--
CREATE DATABASE IF NOT EXISTS `scannerfly` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `scannerfly`;

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `nom_s` varchar(100) NOT NULL,
  `forme_jr` varchar(10) NOT NULL,
  `tva_c` varchar(50) NOT NULL,
  `adress_c` varchar(50) NOT NULL,
  `code_p` varchar(10) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `tel_c` varchar(50) NOT NULL,
  `email_c` varchar(50) NOT NULL,
  `color_bg_pdf` varchar(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `account`
--

INSERT INTO `account` (`id`, `nom_s`, `forme_jr`, `tva_c`, `adress_c`, `code_p`, `ville`, `pays`, `tel_c`, `email_c`, `color_bg_pdf`) VALUES
(1, 'Batrade', 'SPRL', '1234567789', 'Rue de la carrière 48', '1081', 'Koekelberg', 'Belgique', '0473734188', 'contact@batrade.be', '');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `ref_client` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id_client`, `ref_client`, `nom`, `adress`, `tel`, `email`, `date_ajout`, `pwd`) VALUES
(24, 'CL179310624', 'Congo Textilles', 'Burham Centre, 81 Beresford Road Longsight', '+32487860420', 'Saady50@hotmail.com', '2017-09-03 13:06:23', ''),
(26, 'CL1795104126', 'sara tex', 'bruxelles', 'vwvxcvcx', 'saraellamrani@gmail.com', '2017-09-05 10:41:41', ''),
(32, 'CL179560832', 'Othman SPRL', 'Bruxelles', '055Z463446', 'oth@oth.be', '2017-09-05 18:08:50', '');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id_commande` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `comnt` varchar(255) NOT NULL,
  `statut_cmd` varchar(50) NOT NULL COMMENT 'EC / A / T',
  `ref_cmd` varchar(50) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `id_client`, `comnt`, `statut_cmd`, `ref_cmd`, `date_creation`) VALUES
(1, 24, 'd', 'EC', 'BT17928656C1', '2017-09-28 18:56:29');

-- --------------------------------------------------------

--
-- Structure de la table `inventaire`
--

CREATE TABLE `inventaire` (
  `id_scan` int(11) NOT NULL,
  `cpt` int(11) NOT NULL,
  `modif_date` datetime NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `inventaire`
--

INSERT INTO `inventaire` (`id_scan`, `cpt`, `modif_date`, `id_produit`, `id_commande`) VALUES
(1, 5, '2017-09-28 19:33:15', 133, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `code_br` varchar(10) NOT NULL,
  `descript` varchar(100) NOT NULL,
  `qualite` varchar(10) NOT NULL,
  `poids` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `code_br`, `descript`, `qualite`, `poids`) VALUES
(19, 'A-55-LHP', 'A', 'A', '55'),
(22, 'B-85-LCT', 'D', 'B', '60'),
(23, 'B-85-LCP', 'E', 'B', '60'),
(24, 'B-55-PYJ', 'B', 'A', '50'),
(133, '12345678', 'ohtman tshirt', 'B', '1'),
(134, '12345671', 'testexport', 'AA', '55'),
(135, '12345672', 'testexport', 'AA', '56'),
(136, '12345673', 'testexport', 'AA', '57'),
(137, '12345674', 'testexport', 'AA', '58'),
(138, '12345675', 'testexport', 'AA', '59'),
(139, '12345676', 'testexport', 'AA', '60'),
(140, '12345677', 'testexport', 'AA', '61');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `privilege` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_client_2` (`id_client`),
  ADD KEY `id_client_3` (`id_client`),
  ADD KEY `id_client_4` (`id_client`),
  ADD KEY `id_client_5` (`id_client`),
  ADD KEY `id_client_6` (`id_client`);

--
-- Index pour la table `inventaire`
--
ALTER TABLE `inventaire`
  ADD PRIMARY KEY (`id_scan`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_commande_2` (`id_commande`),
  ADD KEY `id_produit_2` (`id_produit`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`),
  ADD UNIQUE KEY `code_br` (`code_br`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `inventaire`
--
ALTER TABLE `inventaire`
  MODIFY `id_scan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE CASCADE;

--
-- Contraintes pour la table `inventaire`
--
ALTER TABLE `inventaire`
  ADD CONSTRAINT `inventaire_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id_commande`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventaire_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE CASCADE;
