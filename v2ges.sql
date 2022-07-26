-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 26 juil. 2022 à 18:17
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `v2ges`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `description`, `telephone`, `adresse`, `created_at`, `updated_at`) VALUES
(8, 'Ndao E-dev', 'Formation pro', '+261 00 000 00', 'Lot N  3e Rue Pasteur', '2022-06-18 04:43:21', '2022-06-18 04:43:21'),
(2, 'Hotel Radisson ', 'Hôtel, restaurant, piscine', '+261 00 000 00', 'Tana Water Front Ambodivona ', '2022-06-18 04:11:18', '2022-07-25 07:40:21'),
(9, 'Shoprite', 'Vente produits ', '+261 00 000 00', 'Lot N  3e Rue Pasteur', '2022-06-18 04:44:02', '2022-07-25 05:17:57'),
(5, 'ESTI DEV', 'Ecole d\'informatique dev et reseau et système', '+261 00 000 00', 'Lot N  3e Rue Pasteur', '2022-06-18 04:12:50', '2022-06-18 04:33:06'),
(6, 'JB', 'Entreprise de production biscuits', '+261 00 000 00', 'Lot N  3e Rue Pasteur', '2022-06-18 04:13:17', '2022-07-25 05:26:57'),
(12, 'Mazdacar', 'Vente voitures', '+261 00 000 00', 'Lot N  3e Rue Pasteur', '2022-06-18 04:44:29', '2022-06-18 04:44:29'),
(13, 'Jovena', 'Statique d\'essence', '+261 00 000 00', 'Lot N  3e Rue Pasteur', '2022-06-18 04:50:11', '2022-06-18 04:50:11'),
(14, 'Specio', 'Réparateur ordinateur portable (spécialiste)', '+261 00 000 00', 'Lot N  3e Rue Pasteur', '2022-06-18 04:58:16', '2022-06-18 04:58:16'),
(15, 'Relia Consulting', 'Boite informatique: développement siteweb, application ', '+261 00 000 00', 'Lot N  3e Rue Pasteur', '2022-06-18 05:10:34', '2022-06-18 05:10:34'),
(16, 'Canal+ Madagascar', 'Distributeur chaine de télévision internationales', '+261 00 000 00', 'Lot N  3e Rue Pasteur', '2022-06-18 05:15:00', '2022-06-18 05:15:00');

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

CREATE TABLE `conges` (
  `id` bigint(20) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `motif` text NOT NULL,
  `status` int(11) NOT NULL,
  `personnel_id` bigint(20) NOT NULL,
  `depart_date` datetime NOT NULL,
  `retour_date` datetime NOT NULL,
  `answered_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `conges`
--

INSERT INTO `conges` (`id`, `nom`, `motif`, `status`, `personnel_id`, `depart_date`, `retour_date`, `answered_at`, `created_at`, `updated_at`) VALUES
(1, 'Demande congé', 'Raison familiale', 1, 10, '2022-07-25 14:23:04', '2022-07-31 15:23:04', '2022-07-25 16:23:04', '2022-07-25 14:23:04', '2022-07-25 16:43:58'),
(3, 'Demande absence', 'Voyage', 0, 5, '2022-08-01 00:00:00', '2022-08-05 00:00:00', NULL, '2022-07-25 14:23:04', '2022-07-25 14:51:25'),
(4, 'Demande congés', 'Maladies', -1, 11, '2022-07-28 00:00:00', '2022-07-29 00:00:00', '2022-07-25 16:47:49', '2022-07-25 13:12:19', '2022-07-25 16:47:49'),
(6, 'Demande congés', 'Vacances', 0, 6, '2022-07-26 00:00:00', '2022-08-21 00:00:00', NULL, '2022-07-25 13:20:20', '2022-07-25 13:20:20'),
(7, 'Demande congé', 'Raison familiale', 1, 10, '2022-07-25 14:23:04', '2022-07-31 15:23:04', NULL, '2022-07-25 14:23:04', '2022-07-25 16:43:58'),
(8, 'Demande absence', 'Voyage', 0, 5, '2022-08-01 00:00:00', '2022-08-05 00:00:00', NULL, '2022-07-25 14:23:04', '2022-07-25 14:51:25'),
(9, 'Demande congés', 'Maladies', -1, 11, '2022-07-28 00:00:00', '2022-07-29 00:00:00', '2022-07-25 16:47:49', '2022-07-25 13:12:19', '2022-07-25 16:47:49'),
(11, 'Demande congés', 'Vacances', 0, 6, '2022-07-26 00:00:00', '2022-08-21 00:00:00', NULL, '2022-07-25 13:20:20', '2022-07-25 13:20:20');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `id` bigint(20) NOT NULL,
  `personnel_id` bigint(20) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`id`, `personnel_id`, `adresse`, `telephone`, `date_de_naissance`) VALUES
(1, 10, 'Lot IV 5 Ambohimanarina', '+261 00 000 00', '2004-07-30');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_18_065345_create_clients_table', 1),
(6, '2022_06_18_112440_create_postes_table', 2),
(7, '2022_06_18_113027_create_personnels_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
--

CREATE TABLE `personnels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poste_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnels`
--

INSERT INTO `personnels` (`id`, `nom`, `poste_id`, `created_at`, `updated_at`) VALUES
(1, 'Jean Celestin', 5, NULL, '2022-07-25 07:36:41'),
(2, 'Eric Ravony', 4, NULL, NULL),
(3, 'Charles Leclerc', 1, NULL, NULL),
(5, 'Lewis Hamilton', 3, NULL, NULL),
(6, 'Esteban Ocon', 2, NULL, NULL),
(7, 'Sergio Perez', 1, NULL, NULL),
(9, 'Tsiory RAVELOJAONA', 2, '2022-07-25 06:01:14', '2022-07-25 06:01:14'),
(10, 'Tsanta RAKOTONJANAHARY', 3, '2022-07-25 06:13:32', '2022-07-25 06:13:32'),
(11, 'Vahatra Yd', 3, '2022-07-25 07:15:12', '2022-07-25 07:15:12');

-- --------------------------------------------------------

--
-- Structure de la table `postes`
--

CREATE TABLE `postes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `postes`
--

INSERT INTO `postes` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Expert en base de données', NULL, '2022-07-25 07:44:30'),
(2, 'Developpeur ', NULL, NULL),
(3, 'Administrateur réseau', NULL, NULL),
(4, 'Webdesigner', '2022-07-25 08:01:26', '2022-07-25 08:01:26'),
(5, 'Chef de projet', '2022-07-25 07:25:16', '2022-07-25 07:25:16'),
(7, 'Stagiaire', '2022-07-25 14:15:39', '2022-07-25 14:15:39');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conges`
--
ALTER TABLE `conges`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnels_poste_id_foreign` (`poste_id`);

--
-- Index pour la table `postes`
--
ALTER TABLE `postes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `conges`
--
ALTER TABLE `conges`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `postes`
--
ALTER TABLE `postes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
