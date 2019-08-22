-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 20 août 2019 à 16:41
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `burval`
--

-- --------------------------------------------------------

--
-- Structure de la table `entre_approvis`
--

DROP TABLE IF EXISTS `entre_approvis`;
CREATE TABLE IF NOT EXISTS `entre_approvis` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `debutSerie` bigint(20) UNSIGNED NOT NULL,
  `finSerie` bigint(20) UNSIGNED NOT NULL,
  `dateEntre` date NOT NULL,
  `prixUnitaire` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `prixTotal` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entre_approvis_fournisseur_id_foreign` (`fournisseur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entre_approvis`
--

INSERT INTO `entre_approvis` (`id`, `debutSerie`, `finSerie`, `dateEntre`, `prixUnitaire`, `fournisseur_id`, `prixTotal`, `created_at`, `updated_at`) VALUES
(1, 12, 15, '2019-07-24', 5000, 2, 20000, '2019-07-24 11:58:11', '2019-07-24 12:03:51'),
(2, 45, 50, '2019-07-24', 20000, 1, 120000, '2019-07-24 12:04:33', '2019-07-24 12:04:33'),
(3, 85, 90, '2019-07-24', 4000, 4, 24000, '2019-07-24 12:16:03', '2019-07-24 12:16:03'),
(5, 56, 60, '2019-07-24', 1000, 2, 5000, '2019-07-24 12:18:21', '2019-07-24 12:18:21');

-- --------------------------------------------------------

--
-- Structure de la table `entre_bon_comds`
--

DROP TABLE IF EXISTS `entre_bon_comds`;
CREATE TABLE IF NOT EXISTS `entre_bon_comds` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `debutSerie` bigint(20) UNSIGNED NOT NULL,
  `finSerie` bigint(20) UNSIGNED NOT NULL,
  `dateEntre` date NOT NULL,
  `prixUnitaire` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `prixTotal` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entre_bon_comds_fournisseur_id_foreign` (`fournisseur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entre_bon_comds`
--

INSERT INTO `entre_bon_comds` (`id`, `debutSerie`, `finSerie`, `dateEntre`, `prixUnitaire`, `fournisseur_id`, `prixTotal`, `created_at`, `updated_at`) VALUES
(1, 15, 16, '2019-07-26', 4000, 2, 8000, '2019-07-26 09:24:19', '2019-07-26 09:30:51'),
(2, 80, 90, '2019-07-26', 4500, 4, 49500, '2019-07-26 09:25:09', '2019-07-26 09:25:09'),
(3, 45, 50, '2019-07-26', 8000, 1, 48000, '2019-07-26 09:26:10', '2019-07-26 09:26:10');

-- --------------------------------------------------------

--
-- Structure de la table `entre_bordereaus`
--

DROP TABLE IF EXISTS `entre_bordereaus`;
CREATE TABLE IF NOT EXISTS `entre_bordereaus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `debutSerie` bigint(20) UNSIGNED NOT NULL,
  `finSerie` bigint(20) UNSIGNED NOT NULL,
  `dateEntre` date NOT NULL,
  `prixUnitaire` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `prixTotal` bigint(20) UNSIGNED NOT NULL,
  `paysAt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entre_bordereaus_fournisseur_id_foreign` (`fournisseur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entre_bordereaus`
--

INSERT INTO `entre_bordereaus` (`id`, `debutSerie`, `finSerie`, `dateEntre`, `prixUnitaire`, `fournisseur_id`, `prixTotal`, `paysAt`, `created_at`, `updated_at`) VALUES
(1, 150, 199, '2019-07-15', 2000, 1, 100000, '', NULL, '2019-07-23 15:49:21'),
(3, 5, 10, '2019-07-22', 5000, 4, 30000, '', NULL, '2019-07-23 15:50:18'),
(4, 6, 10, '2019-07-17', 20000, 4, 100000, '', NULL, '2019-07-23 15:50:48'),
(5, 5, 7, '2019-07-03', 50000, 3, 150000, '', NULL, '2019-07-23 15:51:11'),
(6, 10, 12, '2019-07-16', 100, 3, 300, '', '2019-07-16 17:19:16', '2019-07-23 15:51:37'),
(7, 150, 200, '2019-07-19', 2500, 3, 127500, '', '2019-07-19 17:21:08', '2019-07-23 15:52:11'),
(9, 14, 15, '2019-07-22', 200, 3, 400, '', '2019-07-22 09:43:24', '2019-07-23 15:53:16'),
(12, 8, 9, '2019-07-23', 20000, 4, 40000, '', '2019-07-23 08:17:10', '2019-07-23 15:54:33'),
(13, 700, 799, '2019-07-23', 1000, 2, 100000, '', '2019-07-23 08:17:55', '2019-07-23 15:55:41'),
(14, 70, 77, '2019-07-23', 500, 1, 4000, '', '2019-07-23 08:18:33', '2019-07-23 15:56:24'),
(15, 68, 69, '2019-07-23', 5000, 4, 10000, '', '2019-07-23 08:19:17', '2019-07-23 15:57:44'),
(16, 10, 11, '2019-07-24', 1200, 1, 2400, '', '2019-07-24 14:41:42', '2019-07-24 14:41:42'),
(17, 78, 80, '2019-07-29', 5000, 4, 15000, '', '2019-07-29 14:13:56', '2019-07-29 14:13:56'),
(18, 45, 52, '2019-08-19', 500, 6, 4000, 'Burkina', '2019-08-19 14:44:26', '2019-08-19 15:19:18'),
(19, 48, 50, '2019-08-19', 5000, 4, 15000, 'Burkina', '2019-08-19 16:00:02', '2019-08-19 16:00:02'),
(20, 10, 11, '2019-08-19', 1000, 2, 2000, 'Burkina', '2019-08-19 16:00:47', '2019-08-19 16:00:47'),
(21, 25, 50, '2019-08-19', 500, 5, 13000, 'Cote d\'ivoire', '2019-08-19 16:05:33', '2019-08-19 16:05:58'),
(22, 42, 44, '2019-08-19', 1000, 5, 3000, 'Cote d\'ivoire', '2019-08-19 16:06:31', '2019-08-19 16:06:31'),
(23, 2, 3, '2019-08-19', 4000, 3, 8000, 'Cote d\'ivoire', '2019-08-19 16:07:11', '2019-08-19 16:07:11');

-- --------------------------------------------------------

--
-- Structure de la table `entre_maintenances`
--

DROP TABLE IF EXISTS `entre_maintenances`;
CREATE TABLE IF NOT EXISTS `entre_maintenances` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `debutSerie` bigint(20) UNSIGNED NOT NULL,
  `finSerie` bigint(20) UNSIGNED NOT NULL,
  `dateEntre` date NOT NULL,
  `prixUnitaire` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `prixTotal` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entre_maintenances_fournisseur_id_foreign` (`fournisseur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entre_maintenances`
--

INSERT INTO `entre_maintenances` (`id`, `debutSerie`, `finSerie`, `dateEntre`, `prixUnitaire`, `fournisseur_id`, `prixTotal`, `created_at`, `updated_at`) VALUES
(1, 78, 80, '2019-07-29', 200, 4, 600, '2019-07-29 14:43:41', '2019-08-02 15:32:15'),
(2, 45, 55, '2019-07-29', 4000, 1, 44000, '2019-07-29 14:50:28', '2019-07-29 14:50:28'),
(3, 60, 62, '2019-07-29', 4500, 2, 13500, '2019-07-29 14:51:07', '2019-07-29 14:51:07'),
(4, 78, 88, '2019-07-29', 100, 3, 1100, '2019-07-29 14:51:45', '2019-07-29 14:51:45'),
(5, 40, 42, '2019-08-06', 500, 2, 1500, '2019-08-02 16:51:46', '2019-08-02 16:51:46');

-- --------------------------------------------------------

--
-- Structure de la table `entre_securipacks`
--

DROP TABLE IF EXISTS `entre_securipacks`;
CREATE TABLE IF NOT EXISTS `entre_securipacks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `debutSerie` bigint(20) UNSIGNED NOT NULL,
  `finSerie` bigint(20) UNSIGNED NOT NULL,
  `dateEntre` date NOT NULL,
  `prixUnitaire` bigint(20) UNSIGNED NOT NULL,
  `prixTotal` bigint(20) UNSIGNED NOT NULL,
  `reference` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entre_securipacks_fournisseur_id_foreign` (`fournisseur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entre_securipacks`
--

INSERT INTO `entre_securipacks` (`id`, `debutSerie`, `finSerie`, `dateEntre`, `prixUnitaire`, `prixTotal`, `reference`, `fournisseur_id`, `created_at`, `updated_at`) VALUES
(1, 25, 27, '2019-07-17', 20000, 60000, 232, 4, '2019-07-18 23:00:00', '2019-07-23 16:04:05'),
(2, 5, 9, '2019-07-18', 5000, 25000, 545, 3, '2019-07-19 17:31:04', '2019-07-23 16:04:24'),
(3, 51, 100, '2019-07-20', 1000, 50000, 3, 2, '2019-07-20 09:38:45', '2019-07-23 16:04:51'),
(5, 50, 55, '2019-07-20', 6000, 36000, 32, 1, '2019-07-20 09:49:51', '2019-07-23 16:05:24'),
(6, 1000, 1000, '2019-07-24', 50000, 50000, 52, 2, '2019-07-24 14:50:41', '2019-07-24 14:50:41');

-- --------------------------------------------------------

--
-- Structure de la table `entre_stocks`
--

DROP TABLE IF EXISTS `entre_stocks`;
CREATE TABLE IF NOT EXISTS `entre_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dateAppro` date NOT NULL,
  `QEntrant` bigint(20) UNSIGNED NOT NULL,
  `prixAchat` bigint(20) UNSIGNED NOT NULL,
  `observ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numFacture` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entre_stocks_produit_id_foreign` (`produit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entre_stocks`
--

INSERT INTO `entre_stocks` (`id`, `dateAppro`, `QEntrant`, `prixAchat`, `observ`, `numFacture`, `produit_id`, `created_at`, `updated_at`) VALUES
(1, '2019-08-06', 5, 250, 'azerty00', 'ry00', 1, '2019-08-06 14:47:23', '2019-08-16 14:09:07'),
(2, '2019-08-06', 10, 6, 'aqwerty', 'aezrty02', 2, '2019-08-06 15:40:55', '2019-08-14 18:06:09'),
(4, '2019-08-06', 45, 12, 'tout', '58ert', 3, '2019-08-06 16:02:38', '2019-08-13 16:48:17'),
(5, '2019-08-14', 7, 8, 'azerty', '28', 4, '2019-08-06 16:17:45', '2019-08-13 16:47:29'),
(7, '2019-08-13', 12, 5000, 'azertyu', '5025', 4, '2019-08-13 16:42:49', '2019-08-13 16:42:49'),
(8, '2019-08-13', 20, 52, 'azear', 'az20', 2, '2019-08-13 18:17:55', '2019-08-13 18:17:55'),
(10, '2019-08-14', 25, 4000, 'tout va', 'az122', 5, '2019-08-14 18:17:50', '2019-08-14 18:17:50');

-- --------------------------------------------------------

--
-- Structure de la table `entre_tickets`
--

DROP TABLE IF EXISTS `entre_tickets`;
CREATE TABLE IF NOT EXISTS `entre_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `debutSerie` bigint(20) UNSIGNED NOT NULL,
  `finSerie` bigint(20) UNSIGNED NOT NULL,
  `dateEntre` date NOT NULL,
  `prixUnitaire` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `prixTotal` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entre_tickets_fournisseur_id_foreign` (`fournisseur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entre_tickets`
--

INSERT INTO `entre_tickets` (`id`, `debutSerie`, `finSerie`, `dateEntre`, `prixUnitaire`, `fournisseur_id`, `prixTotal`, `created_at`, `updated_at`) VALUES
(1, 50, 52, '2019-08-01', 7000, 4, 21000, '2019-08-01 13:43:26', '2019-08-01 13:45:25'),
(3, 20, 26, '2019-08-01', 5000, 2, 35000, '2019-08-01 13:47:25', '2019-08-01 13:47:44'),
(4, 4, 6, '2019-07-24', 1000, 2, 3000, '2019-08-01 13:48:25', '2019-08-01 13:48:25');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

DROP TABLE IF EXISTS `fournisseurs`;
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `societe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domaineComp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delaiLivr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condiPaye` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paysAt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fournisseurs_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `nom`, `prenom`, `societe`, `civilite`, `adresse`, `pays`, `telephone`, `mobile`, `fax`, `email`, `email_verified_at`, `observation`, `domaineComp`, `delaiLivr`, `condiPaye`, `paysAt`, `created_at`, `updated_at`) VALUES
(1, 'Denco', 'adama', 'fasotech', 'M', '78546', 'burkina faso', '4567889', '7859263', 'azert4566', 'azee@yo.col', NULL, 'azertyvb\r\ngvbn,', 'informatique', '5 mois', 'espece', 'Burkina', NULL, '2019-07-27 10:32:24'),
(2, 'Toure', 'oumar', 'bafatech', 'M', 'ouaga secteur 1', 'Burkina', '7884566', '07892666', 'az144', 'az@gmail.com', NULL, 'néant', 'informatique', '1 mis', 'checque', 'Burkina', '2019-06-26 16:49:18', '2019-06-26 16:49:18'),
(3, 'Traore', 'amory', 'zen', 'M', 'ouaga secteur 2', 'Burkina', '7784566', '0689895', 'zsd', 'amory@gmail.com', NULL, 'biennn', 'informatique', '2 mois', 'espece', 'Cote d\'ivoire', '2019-06-26 16:51:51', '2019-07-29 14:58:50'),
(4, 'Sawadogo', 'adama', 'fasocom', 'M', 'ouaga secteur 52', 'Burkina', '7784566', '0689895', 'az1455', 'adama@gmail.com', NULL, 'bonjour\r\ntres coolll', 'info', '1 mois', 'checque', 'Burkina', '2019-06-26 17:17:02', '2019-07-29 14:59:11'),
(5, 'koné', 'amory', 'bafatech', 'M', 'ouaga secteur 1', 'burkina faso', '7784566', '7989562', 'aerty', 'kon@gmail.com', NULL, 'Bonsoir', 'commerce', '1 mois', 'checque', 'Cote d\'ivoire', '2019-07-29 14:55:39', '2019-07-30 14:37:28'),
(6, 'cool', 'amory', 'zeee', 'M', 'ouaga secteur 1', 'burkina faso', '7784566', '7989562', 'ezzzz2', 'asd@g.co', NULL, 'azerrtr', 'info', '2 mois', 'checque', 'Burkina', '2019-08-19 12:38:21', '2019-08-19 13:06:14');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_06_25_120347_create_fournisseurs_table', 2),
(5, '2019_07_15_142812_create_entre_bordereaus_table', 3),
(6, '2019_07_15_151534_create_sortie_bordereaus_table', 3),
(7, '2019_07_19_120755_create_entre_securipacks_table', 4),
(8, '2019_07_19_120855_create_sortie_securipacks_table', 4),
(9, '2019_07_23_172248_create_entre_approvis_table', 5),
(10, '2019_07_23_172357_create_sortie_approvis_table', 5),
(11, '2019_07_24_181906_create_entre_bon_comds_table', 6),
(12, '2019_07_24_181951_create_sortie_bon_comds_table', 6),
(15, '2019_07_27_105440_create_entre_maintenances_table', 7),
(16, '2019_07_27_105958_create_sortie_maintenances_table', 7),
(17, '2019_08_01_134308_create_entre_tickets_table', 8),
(18, '2019_08_01_134609_create_sortie_tickets_table', 8),
(22, '2019_08_02_172408_create_produits_table', 9),
(23, '2019_08_02_172551_create_entre_stocks_table', 9),
(24, '2019_08_02_175545_create_sortie_stocks_table', 9);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelleProd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seuilApprovis` bigint(20) UNSIGNED NOT NULL,
  `stockAlert` bigint(20) UNSIGNED NOT NULL,
  `ves` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` bigint(20) UNSIGNED NOT NULL,
  `prixHt` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produits_fournisseur_id_foreign` (`fournisseur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `libelleProd`, `description`, `seuilApprovis`, `stockAlert`, `ves`, `reference`, `prixHt`, `fournisseur_id`, `created_at`, `updated_at`) VALUES
(1, 'gaz', 'azerty', 12, 35, 'Non', 20, 2500, 2, '2019-08-05 12:04:38', '2019-08-16 14:25:13'),
(2, 'ram', 'qwerty', 10, 60, 'Oui', 2, 5000, 1, '2019-08-05 12:08:12', '2019-08-16 14:27:23'),
(3, 'ytes', 'jllml', 2, 45, 'Non', 3, 1000, 3, '2019-08-05 12:09:24', '2019-08-14 15:00:36'),
(4, 'zer', 'cffff', 22, 40, 'Non', 78, 500, 4, '2019-08-05 12:57:56', '2019-08-16 14:24:21'),
(5, 'erty', 'dfghfchv', 55, 50, 'Non', 47, 5200, 1, '2019-08-07 09:54:47', '2019-08-16 14:23:51');

-- --------------------------------------------------------

--
-- Structure de la table `sortie_approvis`
--

DROP TABLE IF EXISTS `sortie_approvis`;
CREATE TABLE IF NOT EXISTS `sortie_approvis` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `debutSerie` bigint(20) UNSIGNED NOT NULL,
  `finSerie` bigint(20) UNSIGNED NOT NULL,
  `dateSortie` date NOT NULL,
  `centre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` bigint(20) UNSIGNED NOT NULL,
  `prixTotal` bigint(20) UNSIGNED NOT NULL,
  `entreApprovis_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sortie_approvis_entreapprovis_id_foreign` (`entreApprovis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sortie_approvis`
--

INSERT INTO `sortie_approvis` (`id`, `debutSerie`, `finSerie`, `dateSortie`, `centre`, `prix`, `prixTotal`, `entreApprovis_id`, `created_at`, `updated_at`) VALUES
(1, 45, 50, '2019-07-24', 'Koudougou', 500, 3000, 1, '2019-07-24 14:27:27', '2019-07-24 14:27:27'),
(2, 65, 69, '2019-07-24', 'kaya', 2000, 10000, 2, '2019-07-24 14:29:21', '2019-07-24 14:29:21'),
(3, 12, 14, '2019-07-24', 'Bobo', 4000, 12000, 1, '2019-07-24 14:37:28', '2019-07-24 15:03:50'),
(4, 30, 48, '2019-07-24', 'Banfora', 500, 9500, 2, '2019-07-24 15:04:27', '2019-07-24 15:04:27');

-- --------------------------------------------------------

--
-- Structure de la table `sortie_bon_comds`
--

DROP TABLE IF EXISTS `sortie_bon_comds`;
CREATE TABLE IF NOT EXISTS `sortie_bon_comds` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `debutSerie` bigint(20) UNSIGNED NOT NULL,
  `finSerie` bigint(20) UNSIGNED NOT NULL,
  `dateSortie` date NOT NULL,
  `centre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` bigint(20) UNSIGNED NOT NULL,
  `prixTotal` bigint(20) UNSIGNED NOT NULL,
  `entreBonComd_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sortie_bon_comds_entreboncomd_id_foreign` (`entreBonComd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sortie_bon_comds`
--

INSERT INTO `sortie_bon_comds` (`id`, `debutSerie`, `finSerie`, `dateSortie`, `centre`, `prix`, `prixTotal`, `entreBonComd_id`, `created_at`, `updated_at`) VALUES
(1, 10, 11, '2019-07-26', 'Banfora', 3000, 6000, 2, '2019-07-26 10:44:32', '2019-07-26 10:44:32'),
(2, 45, 58, '2019-07-03', 'Koudougou', 500, 7000, 2, '2019-07-26 10:47:43', '2019-07-26 10:53:24'),
(3, 71, 73, '2019-07-26', 'Ouaga', 1500, 4500, 1, '2019-07-26 10:48:24', '2019-07-26 10:48:24'),
(4, 78, 81, '2019-07-26', 'kaya', 7000, 28000, 2, '2019-07-26 10:48:54', '2019-07-26 10:48:54');

-- --------------------------------------------------------

--
-- Structure de la table `sortie_bordereaus`
--

DROP TABLE IF EXISTS `sortie_bordereaus`;
CREATE TABLE IF NOT EXISTS `sortie_bordereaus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `debutSerie` bigint(20) UNSIGNED NOT NULL,
  `finSerie` bigint(20) UNSIGNED NOT NULL,
  `dateSortie` date NOT NULL,
  `centre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` bigint(20) UNSIGNED NOT NULL,
  `prixTotal` bigint(20) UNSIGNED NOT NULL,
  `paysAt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entreBordereau_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sortie_bordereaus_entrebordereau_id_foreign` (`entreBordereau_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sortie_bordereaus`
--

INSERT INTO `sortie_bordereaus` (`id`, `debutSerie`, `finSerie`, `dateSortie`, `centre`, `prix`, `prixTotal`, `paysAt`, `entreBordereau_id`, `created_at`, `updated_at`) VALUES
(1, 10, 11, '2019-07-17', 'azerty', 2500, 5000, 'Burkina', 6, '2019-07-17 12:07:31', '2019-07-23 16:02:06'),
(2, 10, 14, '2019-07-10', 'qwerty', 20000, 100000, 'Burkina', 19, '2019-07-17 13:26:06', '2019-08-19 17:27:55'),
(3, 22, 24, '2019-07-17', 'Ouaga', 20000, 60000, 'Senegal', 6, '2019-07-17 13:27:13', '2019-07-23 16:02:42'),
(4, 40, 41, '2019-07-18', 'Bobo', 22500, 45000, 'Cote d\'ivoire', 6, '2019-07-18 18:17:00', '2019-07-23 16:03:08'),
(8, 10, 11, '2019-07-26', 'Daloa', 3000, 6000, 'Cote d\'ivoire', 1, '2019-07-26 10:41:39', '2019-07-26 10:41:39'),
(9, 42, 45, '2019-08-19', 'Abidjan', 4000, 16000, 'Cote d\'ivoire', 3, '2019-08-19 16:59:45', '2019-08-19 16:59:45'),
(10, 22, 24, '2019-07-17', 'Ouaga', 20000, 60000, 'Burkina', 6, '2019-07-17 13:27:13', '2019-07-23 16:02:42'),
(11, 10, 11, '2019-07-26', 'Banfora', 3000, 6000, 'Burkina', 1, '2019-07-26 10:41:39', '2019-07-26 10:41:39'),
(12, 4, 7, '2019-08-19', 'Bouaké', 2000, 8000, 'Cote d\'ivoire', 22, '2019-08-19 17:13:30', '2019-08-19 17:14:01');

-- --------------------------------------------------------

--
-- Structure de la table `sortie_maintenances`
--

DROP TABLE IF EXISTS `sortie_maintenances`;
CREATE TABLE IF NOT EXISTS `sortie_maintenances` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `debutSerie` bigint(20) UNSIGNED NOT NULL,
  `finSerie` bigint(20) UNSIGNED NOT NULL,
  `dateSortie` date NOT NULL,
  `centre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` bigint(20) UNSIGNED NOT NULL,
  `prixTotal` bigint(20) UNSIGNED NOT NULL,
  `entreMaintenance_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sortie_maintenances_entremaintenance_id_foreign` (`entreMaintenance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sortie_maintenances`
--

INSERT INTO `sortie_maintenances` (`id`, `debutSerie`, `finSerie`, `dateSortie`, `centre`, `prix`, `prixTotal`, `entreMaintenance_id`, `created_at`, `updated_at`) VALUES
(1, 45, 50, '2019-08-01', 'Koudougou', 4000, 24000, 2, '2019-08-01 10:23:27', '2019-08-01 10:30:09'),
(3, 78, 80, '2019-08-01', 'kaya', 1000, 3000, 2, '2019-08-01 10:41:25', '2019-08-01 10:41:25'),
(4, 50, 51, '2019-08-01', 'Banfora', 5000, 10000, 2, '2019-08-01 10:42:21', '2019-08-01 10:42:21'),
(5, 56, 60, '2019-08-01', 'Bobo', 3000, 15000, 4, '2019-08-01 10:44:11', '2019-08-01 10:44:11'),
(6, 4, 5, '2018-12-20', 'Ouaga', 3000, 6000, 2, '2019-08-01 10:59:25', '2019-08-01 10:59:25');

-- --------------------------------------------------------

--
-- Structure de la table `sortie_securipacks`
--

DROP TABLE IF EXISTS `sortie_securipacks`;
CREATE TABLE IF NOT EXISTS `sortie_securipacks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `debutSerie` bigint(20) UNSIGNED NOT NULL,
  `finSerie` bigint(20) UNSIGNED NOT NULL,
  `dateSortie` date NOT NULL,
  `centre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prixUnitaire` bigint(20) UNSIGNED NOT NULL,
  `reference` bigint(20) UNSIGNED NOT NULL,
  `entreSecuripack_id` bigint(20) UNSIGNED NOT NULL,
  `prixTotal` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sortie_securipacks_entresecuripack_id_foreign` (`entreSecuripack_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sortie_securipacks`
--

INSERT INTO `sortie_securipacks` (`id`, `debutSerie`, `finSerie`, `dateSortie`, `centre`, `prixUnitaire`, `reference`, `entreSecuripack_id`, `prixTotal`, `created_at`, `updated_at`) VALUES
(1, 3, 5, '2019-07-23', 'Bobo', 5550, 2, 1, 16650, '2019-07-23 14:03:07', '2019-07-23 16:07:21'),
(2, 45, 50, '2019-07-23', 'Ouaga', 1000, 12, 2, 6000, '2019-07-23 14:33:37', '2019-07-23 16:06:53'),
(4, 50, 45, '2019-07-23', 'Ouaga', 1000, 12, 2, 5000, '2019-07-23 14:52:14', '2019-07-23 14:52:14'),
(5, 5, 3, '2019-07-23', 'Bobo', 55500, 2, 1, 111000, '2019-07-23 14:52:50', '2019-07-23 14:52:50'),
(6, 45, 58, '2019-07-24', 'Banfora', 2000, 20, 2, 28000, '2019-07-24 14:57:42', '2019-07-24 14:57:42');

-- --------------------------------------------------------

--
-- Structure de la table `sortie_stocks`
--

DROP TABLE IF EXISTS `sortie_stocks`;
CREATE TABLE IF NOT EXISTS `sortie_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dateSortie` date NOT NULL,
  `QSortant` bigint(20) UNSIGNED NOT NULL,
  `QEnStock` bigint(20) UNSIGNED NOT NULL,
  `refProduit` bigint(20) UNSIGNED NOT NULL,
  `motif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateSaisie` date NOT NULL,
  `centre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entreStock_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sortie_stocks_entrestock_id_foreign` (`entreStock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sortie_tickets`
--

DROP TABLE IF EXISTS `sortie_tickets`;
CREATE TABLE IF NOT EXISTS `sortie_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `debutSerie` bigint(20) UNSIGNED NOT NULL,
  `finSerie` bigint(20) UNSIGNED NOT NULL,
  `dateSortie` date NOT NULL,
  `centre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` bigint(20) UNSIGNED NOT NULL,
  `prixTotal` bigint(20) UNSIGNED NOT NULL,
  `entreTicket_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sortie_tickets_entreticket_id_foreign` (`entreTicket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sortie_tickets`
--

INSERT INTO `sortie_tickets` (`id`, `debutSerie`, `finSerie`, `dateSortie`, `centre`, `prix`, `prixTotal`, `entreTicket_id`, `created_at`, `updated_at`) VALUES
(1, 12, 40, '2019-08-02', 'kaya', 500, 14500, 3, '2019-08-02 13:10:37', '2019-08-02 13:22:54'),
(2, 10, 12, '2019-08-02', 'Banfora', 255, 500, 3, '2019-08-02 13:23:44', '2019-08-02 13:23:44'),
(3, 7, 10, '2019-08-02', 'Ouaga', 2000, 8000, 3, '2019-08-02 13:24:31', '2019-08-02 13:24:31'),
(4, 80, 85, '2019-08-02', 'Bobo', 500, 3000, 3, '2019-08-02 13:25:14', '2019-08-02 13:25:14');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paysAt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `name_verified_at`, `password`, `profil`, `paysAt`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Arthur', NULL, '$2y$10$R8nO4/Z4iowqlAQzn.aGv.nSPgPOhv5Rcgpe46Oxe6eGbBy0vs5XK', 'Administration', 'Burkina', 'pSmvdeMRJFDE3fZW1J5wFHNmNxcwAUYwMs3ZjjJQOXXzzIUk5DxleBCTJMRX', '2019-06-13 12:30:50', '2019-08-19 10:43:42'),
(3, 'Jordy', NULL, '$2y$10$uMMfy7LQpM5G4IzDEuvAKOORU4jREqZ2SLAc3nByZluDa0tIWMzWa', 'Commercial', 'Cote d\'ivoire', NULL, '2019-06-13 12:34:11', '2019-08-19 15:54:57'),
(4, 'aziz', NULL, '$2y$10$7CpCKHX4Ios22mQ19Ih3R./QSY3iyckJjwyFYZseZtLD9/byi2S9u', 'Administration', 'Cote d\'ivoire', NULL, '2019-06-13 12:36:01', '2019-08-19 10:52:39'),
(5, 'test', NULL, '$2y$10$8GZbp1EkLVFpoMWLgczjbuPNrQ83VuhMkp.5g1y1FxxwBesp8oCjC', 'Commercial', '', NULL, '2019-07-02 16:48:07', '2019-08-05 17:47:00'),
(9, 'admin', NULL, '$2y$10$VhoeMjGZ82G91IvGTtwSFOFZtKLR2bwgUdFARJhLql9.RC60bfoVm', 'Administration', 'Internationnal', NULL, NULL, '2019-08-19 10:45:24'),
(10, 'ben', NULL, '$2y$10$LxAR3fUge0YUtVo32wVLq.NBOpmgmI4owTAdnzvx6KvRLVL47QCUC', 'Administration', 'Senegal', NULL, '2019-08-19 11:00:11', '2019-08-19 11:00:11'),
(11, 'madina', NULL, '$2y$10$X18Rz83lOSVBhR697wPJ9eRVVDP0siQMUSXH47FcfsW6SX9ip262.', 'Commercial', 'Burkina', NULL, '2019-08-19 13:21:04', '2019-08-19 13:21:04'),
(12, 'sandrine', NULL, '$2y$10$SeL1ZUBDU6mkE/k79W88AendqLqfIyFVjEsxDyWnWegemC7qguuOO', 'Caisse', 'Burkina', NULL, '2019-08-19 13:22:14', '2019-08-19 13:22:14'),
(13, 'toto', NULL, '$2y$10$BbOwHCzIb6BhYl9MSLECiu5rd/bb7vTnjFpRouqnbkCIEqO4.0U5y', 'Comptabilité', 'Cote d\'ivoire', NULL, '2019-08-19 15:57:07', '2019-08-19 15:57:07');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `entre_approvis`
--
ALTER TABLE `entre_approvis`
  ADD CONSTRAINT `entre_approvis_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`);

--
-- Contraintes pour la table `entre_bon_comds`
--
ALTER TABLE `entre_bon_comds`
  ADD CONSTRAINT `entre_bon_comds_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`);

--
-- Contraintes pour la table `entre_bordereaus`
--
ALTER TABLE `entre_bordereaus`
  ADD CONSTRAINT `entre_bordereaus_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`);

--
-- Contraintes pour la table `entre_maintenances`
--
ALTER TABLE `entre_maintenances`
  ADD CONSTRAINT `entre_maintenances_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`);

--
-- Contraintes pour la table `entre_securipacks`
--
ALTER TABLE `entre_securipacks`
  ADD CONSTRAINT `entre_securipacks_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`);

--
-- Contraintes pour la table `entre_stocks`
--
ALTER TABLE `entre_stocks`
  ADD CONSTRAINT `entre_stocks_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `entre_tickets`
--
ALTER TABLE `entre_tickets`
  ADD CONSTRAINT `entre_tickets_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`);

--
-- Contraintes pour la table `sortie_approvis`
--
ALTER TABLE `sortie_approvis`
  ADD CONSTRAINT `sortie_approvis_entreapprovis_id_foreign` FOREIGN KEY (`entreApprovis_id`) REFERENCES `entre_approvis` (`id`);

--
-- Contraintes pour la table `sortie_bon_comds`
--
ALTER TABLE `sortie_bon_comds`
  ADD CONSTRAINT `sortie_bon_comds_entreboncomd_id_foreign` FOREIGN KEY (`entreBonComd_id`) REFERENCES `entre_bon_comds` (`id`);

--
-- Contraintes pour la table `sortie_bordereaus`
--
ALTER TABLE `sortie_bordereaus`
  ADD CONSTRAINT `sortie_bordereaus_entrebordereau_id_foreign` FOREIGN KEY (`entreBordereau_id`) REFERENCES `entre_bordereaus` (`id`);

--
-- Contraintes pour la table `sortie_maintenances`
--
ALTER TABLE `sortie_maintenances`
  ADD CONSTRAINT `sortie_maintenances_entremaintenance_id_foreign` FOREIGN KEY (`entreMaintenance_id`) REFERENCES `entre_maintenances` (`id`);

--
-- Contraintes pour la table `sortie_securipacks`
--
ALTER TABLE `sortie_securipacks`
  ADD CONSTRAINT `sortie_securipacks_entresecuripack_id_foreign` FOREIGN KEY (`entreSecuripack_id`) REFERENCES `entre_securipacks` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sortie_stocks`
--
ALTER TABLE `sortie_stocks`
  ADD CONSTRAINT `sortie_stocks_entrestock_id_foreign` FOREIGN KEY (`entreStock_id`) REFERENCES `entre_stocks` (`id`);

--
-- Contraintes pour la table `sortie_tickets`
--
ALTER TABLE `sortie_tickets`
  ADD CONSTRAINT `sortie_tickets_entreticket_id_foreign` FOREIGN KEY (`entreTicket_id`) REFERENCES `entre_tickets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
