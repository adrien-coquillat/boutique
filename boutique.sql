-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 09, 2021 at 08:59 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `boutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categorie`
--

CREATE TABLE `Categorie` (
  `id_c` int(11) NOT NULL,
  `nom_c` varchar(50) NOT NULL,
  `description_c` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Commande`
--

CREATE TABLE `Commande` (
  `id_com` int(11) NOT NULL,
  `prix_ttc_com` int(11) NOT NULL,
  `date_com` date NOT NULL,
  `id_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Composer`
--

CREATE TABLE `Composer` (
  `id_com` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `qt_article` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Produit`
--

CREATE TABLE `Produit` (
  `id_p` int(11) NOT NULL,
  `nom_p` varchar(255) NOT NULL,
  `prix_ht_p` int(10) NOT NULL,
  `description_p` text NOT NULL,
  `nom_image_p` varchar(255) NOT NULL,
  `stock_p` int(10) NOT NULL,
  `id_sc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Sous_categorie`
--

CREATE TABLE `Sous_categorie` (
  `id_sc` int(11) NOT NULL,
  `nom_sc` varchar(50) NOT NULL,
  `description_sc` text NOT NULL,
  `id_c` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id_u` int(11) NOT NULL,
  `adresse_u` varchar(255) NOT NULL,
  `mail_u` varchar(255) NOT NULL,
  `nom_u` varchar(50) NOT NULL,
  `prenom_u` varchar(50) NOT NULL,
  `telephone_u` int(10) NOT NULL,
  `login_u` varchar(50) NOT NULL,
  `infodepaiement_u` varchar(50) NOT NULL,
  `motdepass_u` varchar(100) NOT NULL,
  `rang_u` varchar(50) NOT NULL DEFAULT '1',
  `datedenaissance_u` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`id_c`);

--
-- Indexes for table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `fk_u(id_u)` (`id_u`);

--
-- Indexes for table `Composer`
--
ALTER TABLE `Composer`
  ADD KEY `fk_com(id_com)` (`id_com`),
  ADD KEY `fk_p(id_p)` (`id_p`);

--
-- Indexes for table `Produit`
--
ALTER TABLE `Produit`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `fk_sc(id_sc)` (`id_sc`);

--
-- Indexes for table `Sous_categorie`
--
ALTER TABLE `Sous_categorie`
  ADD PRIMARY KEY (`id_sc`),
  ADD KEY `fk_c(id_c)` (`id_c`);

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Produit`
--
ALTER TABLE `Produit`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Sous_categorie`
--
ALTER TABLE `Sous_categorie`
  MODIFY `id_sc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `fk_u(id_u)` FOREIGN KEY (`id_u`) REFERENCES `Utilisateur` (`id_u`) ON UPDATE CASCADE;

--
-- Constraints for table `Composer`
--
ALTER TABLE `Composer`
  ADD CONSTRAINT `fk_com(id_com)` FOREIGN KEY (`id_com`) REFERENCES `Commande` (`id_com`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_p(id_p)` FOREIGN KEY (`id_p`) REFERENCES `Produit` (`id_p`) ON UPDATE CASCADE;

--
-- Constraints for table `Produit`
--
ALTER TABLE `Produit`
  ADD CONSTRAINT `fk_sc(id_sc)` FOREIGN KEY (`id_sc`) REFERENCES `Sous_categorie` (`id_sc`) ON UPDATE CASCADE;

--
-- Constraints for table `Sous_categorie`
--
ALTER TABLE `Sous_categorie`
  ADD CONSTRAINT `fk_c(id_c)` FOREIGN KEY (`id_c`) REFERENCES `Categorie` (`id_c`) ON UPDATE CASCADE;
