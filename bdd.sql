-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 05, 2021 at 03:40 PM
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

--
-- Dumping data for table `Categorie`
--

INSERT INTO `Categorie` (`id_c`, `nom_c`, `description_c`) VALUES
(1, 'Sextoy', 'Super categorie'),
(2, 'Seconde categorie', 'Super seconde categorie'),
(3, 'Frech', 'Jouet frecj');

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

--
-- Dumping data for table `Commande`
--

INSERT INTO `Commande` (`id_com`, `prix_ttc_com`, `date_com`, `id_u`) VALUES
(1, 123, '2021-02-19', 1),
(2, 0, '2021-02-22', 4),
(3, 0, '2021-02-27', 5),
(4, 1200, '2021-02-27', 11),
(5, 1200, '2021-03-01', 11),
(6, 14000, '2021-03-02', 11),
(7, 0, '2021-03-02', 12),
(8, 1200, '2021-03-02', 11),
(9, 5500, '2021-03-03', 11),
(10, 14000, '2021-03-03', 11),
(11, 12100, '2021-03-03', 11),
(12, 1200, '2021-03-05', 11),
(13, 8500, '2021-03-05', 11),
(14, 1200, '2021-03-05', 11),
(15, 1200, '2021-03-05', 11),
(16, 5500, '2021-03-05', 11),
(17, 1200, '2021-03-05', 11),
(18, 19500, '2021-03-05', 11),
(19, 19400, '2021-03-05', 11),
(20, 0, '2021-03-05', 11);

-- --------------------------------------------------------

--
-- Table structure for table `Composer`
--

CREATE TABLE `Composer` (
  `id_comp` int(11) NOT NULL,
  `id_com` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `qt_article` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Composer`
--

INSERT INTO `Composer` (`id_comp`, `id_com`, `id_p`, `qt_article`) VALUES
(1, 1, 1, 2),
(7, 2, 1, 3),
(8, 2, 2, 1),
(9, 3, 1, 4),
(10, 3, 2, 1),
(11, 4, 1, 4),
(12, 4, 2, 4),
(13, 5, 1, 1),
(14, 6, 3, 1),
(15, 6, 2, 1),
(16, 7, 2, 2),
(17, 8, 1, 1),
(18, 9, 2, 1),
(19, 10, 2, 1),
(20, 10, 3, 1),
(24, 11, 4, 1),
(25, 11, 1, 1),
(27, 12, 1, 1),
(29, 13, 3, 1),
(30, 14, 1, 1),
(31, 15, 1, 1),
(32, 16, 2, 1),
(33, 17, 1, 1),
(34, 18, 2, 2),
(35, 18, 3, 1),
(36, 19, 3, 1),
(37, 19, 4, 1),
(38, 20, 1, 1),
(39, 20, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Configuration`
--

CREATE TABLE `Configuration` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Configuration`
--

INSERT INTO `Configuration` (`id`, `type`, `name`, `value`) VALUES
(1, 'string', 'title', 'Joujou coquin'),
(2, 'string', 'subtitle', 'Les jouets qui font du bien'),
(3, 'string', 'best_sellers_catch_phrase', 'bientôt en rupture de stock !'),
(4, 'int', 'best_sellers_first_id_p', '2'),
(5, 'int', 'best_sellers_second_id_p', '2'),
(6, 'int', 'best_sellers_third_id_p', '3'),
(7, 'int', 'carousel_first_id_p', '1'),
(8, 'int', 'carousel_second_id_p', '3'),
(9, 'int', 'carousel_third_id_p', '2'),
(10, 'int', 'carousel_interval', '5000');

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

--
-- Dumping data for table `Produit`
--

INSERT INTO `Produit` (`id_p`, `nom_p`, `prix_ht_p`, `description_p`, `nom_image_p`, `stock_p`, `id_sc`) VALUES
(1, 'Plug', 12, 'Collection de plugs anaux, du plus petits au plus gros, du plus large au plus fin, vous trouverez forcement chaussure à votre pied. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid inventore commodi, mollitia adipisci veniam corporis nesciunt repellendus cupiditate minus vel nihil illum rem libero asperiores omnis odio nulla aut doloremque!', 'truc.jpg', 10, 1),
(2, 'Pitchoune', 55, 'Pitchoune, petit joujou qui va bien. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid inventore commodi, mollitia adipisci veniam corporis nesciunt repellendus cupiditate minus vel nihil illum rem libero asperiores omnis odio nulla aut doloremque!', 'pitchoune.jpg', 8, 2),
(3, 'Fifou', 85, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid inventore commodi, mollitia adipisci veniam corporis nesciunt repellendus cupiditate minus vel nihil illum rem libero asperiores omnis odio nulla aut doloremque!', 'lul.jpg', 100, 2),
(4, 'Lush 3', 109, '<p><span style=\"color: #843fa1;\"><u>Oeuf vibrant</u></span></p>\r\n<p>Le plus puissant et le plus discret des oeufs vibrants connect&eacute;s ! &OElig;uf Vibrant Bluetooth Jeu solo Pr&eacute;liminaires Jeu discret en public.</p>', 'Lush3.png', 10, 1),
(5, 'Ploug', 50, 'test', 'pasimage.png', 12, 1),
(6, 'Ploug', 50, 'test', 'pasimage.png', 12, 1);

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

--
-- Dumping data for table `Sous_categorie`
--

INSERT INTO `Sous_categorie` (`id_sc`, `nom_sc`, `description_sc`, `id_c`) VALUES
(1, 'Petit', 'Gamme small', 1),
(2, 'Vibro Petit', 'Gamme small', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id_u` int(11) NOT NULL,
  `login_u` varchar(50) NOT NULL,
  `adresse_u` varchar(255) NOT NULL,
  `mail_u` varchar(255) NOT NULL,
  `nom_u` varchar(50) NOT NULL,
  `prenom_u` varchar(50) NOT NULL,
  `telephone_u` int(12) NOT NULL,
  `infodepaiement_u` varchar(50) DEFAULT NULL,
  `motdepass_u` varchar(100) NOT NULL,
  `rang_u` int(50) NOT NULL DEFAULT '1',
  `datedenaissance_u` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id_u`, `login_u`, `adresse_u`, `mail_u`, `nom_u`, `prenom_u`, `telephone_u`, `infodepaiement_u`, `motdepass_u`, `rang_u`, `datedenaissance_u`) VALUES
(1, 'admina', '12, rue example, Ville, 13001', 'admin@admin.com', 'Administrateur', 'Admin', 633660712, '', 'mdp', 100, '2021-02-16'),
(2, 'testa', '1, rue, ville, 12021', 'test@test.com', 'test', 'test', 491623054, '', 'test', 1, '2021-12-01'),
(3, 'rob', '12, rouille, Marseille, 13009', 'arbona.robin@gmail.com', 'arbona', 'robin', 633660712, '', '$2y$10$KvU4Ornbpoec1TlwFyWXlOixigvjL/z1GL0lZw9jKOqme1qOlElaS', 1, '1987-01-15'),
(4, 'robin', '1, lala, lala, 12345', 'arbona.robin@gmail.com', 'lala', 'lala', 633660712, NULL, '$2y$10$8jKphTaHfBqVk0ON2w5/3.S.Gx3F5s0KTm8R0bZE3iB0yEljAnkma', 1, '1987-01-01'),
(11, 'ro', '1, lala, MARSEILLE, 13002', 'arbona.robin@gmail.com', 'ro', 'ro', 633660712, NULL, '$2y$10$pXMelQxWaW7WXaVOwPcnSehxRkfZSzgn2Kz3UHAIK4kheBmnevHES', 1, '2021-02-27'),
(12, 'mk5lrclp4c3bh0qcthtg96pkr5', ' ', ' ', 'temp', 'temp', 0, NULL, ' ', 1, '2000-01-01'),
(14, 'hc3hn3d43r3lv20931og9klkca', ' ', ' ', 'temp', 'temp', 0, NULL, ' ', 1, '2000-01-01'),
(15, 'irfdfhlq1ofeh5k1k256ufq6fj', ' ', ' ', 'temp', 'temp', 0, NULL, ' ', 1, '2000-01-01'),
(16, 'hilh5q9re7lmqic5pn2a512bf3', ' ', ' ', 'temp', 'temp', 0, NULL, ' ', 1, '2000-01-01');

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
  ADD PRIMARY KEY (`id_com`);

--
-- Indexes for table `Composer`
--
ALTER TABLE `Composer`
  ADD PRIMARY KEY (`id_comp`);

--
-- Indexes for table `Configuration`
--
ALTER TABLE `Configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Produit`
--
ALTER TABLE `Produit`
  ADD PRIMARY KEY (`id_p`);

--
-- Indexes for table `Sous_categorie`
--
ALTER TABLE `Sous_categorie`
  ADD PRIMARY KEY (`id_sc`);

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
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Composer`
--
ALTER TABLE `Composer`
  MODIFY `id_comp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `Configuration`
--
ALTER TABLE `Configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Produit`
--
ALTER TABLE `Produit`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Sous_categorie`
--
ALTER TABLE `Sous_categorie`
  MODIFY `id_sc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
