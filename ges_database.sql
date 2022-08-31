-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 31 août 2022 à 17:25
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ges_0`
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
                          `user_id` bigint(20) NOT NULL,
                          `depart_date` datetime NOT NULL,
                          `retour_date` datetime NOT NULL,
                          `answered_at` datetime DEFAULT NULL,
                          `created_at` datetime NOT NULL,
                          `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `conges`
--

INSERT INTO `conges` (`id`, `nom`, `motif`, `status`, `user_id`, `depart_date`, `retour_date`, `answered_at`, `created_at`, `updated_at`) VALUES
                                                                                                                                              (1, 'Demande congé', 'Raison familiale', 1, 4, '2022-07-25 14:23:04', '2022-07-31 15:23:04', '2022-07-25 16:23:04', '2022-07-25 14:23:04', '2022-07-25 16:43:58'),
                                                                                                                                              (3, 'Demande absence', 'Voyage', 0, 4, '2022-08-01 00:00:00', '2022-08-05 00:00:00', NULL, '2022-07-25 14:23:04', '2022-07-25 14:51:25'),
                                                                                                                                              (4, 'Demande congés', 'Maladies', -1, 1, '2022-07-28 00:00:00', '2022-07-29 00:00:00', '2022-07-25 16:47:49', '2022-07-25 13:12:19', '2022-07-25 16:47:49'),
                                                                                                                                              (6, 'Demande congés', 'Vacances', 0, 2, '2022-07-26 00:00:00', '2022-08-21 00:00:00', NULL, '2022-07-25 13:20:20', '2022-07-25 13:20:20'),
                                                                                                                                              (7, 'Demande congé', 'Raison familiale', 1, 4, '2022-07-25 14:23:04', '2022-07-31 15:23:04', NULL, '2022-07-25 14:23:04', '2022-07-25 16:43:58'),
                                                                                                                                              (8, 'Demande absence', 'Voyage', 0, 4, '2022-08-01 00:00:00', '2022-08-05 00:00:00', NULL, '2022-07-25 14:23:04', '2022-07-25 14:51:25'),
                                                                                                                                              (9, 'Demande congés', 'Maladies', -1, 2, '2022-07-28 00:00:00', '2022-07-29 00:00:00', '2022-07-25 16:47:49', '2022-07-25 13:12:19', '2022-07-25 16:47:49'),
                                                                                                                                              (11, 'Demande congés', 'Vacances', 0, 3, '2022-07-26 00:00:00', '2022-08-21 00:00:00', NULL, '2022-07-25 13:20:20', '2022-07-25 13:20:20');

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
                               `user_id` bigint(20) NOT NULL,
                               `adresse` varchar(255) DEFAULT NULL,
                               `telephone` varchar(255) DEFAULT NULL,
                               `date_de_naissance` date DEFAULT NULL,
                               `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`id`, `user_id`, `adresse`, `telephone`, `date_de_naissance`, `updated_at`) VALUES
                                                                                                           (1, 1, 'Lot IV 5 Besarety', '+261342781751', '2002-04-05', '2022-08-23 08:54:52'),
                                                                                                           (2, 4, 'Lot IV 5 Ambohimandroso', '+261342781751', '2002-01-21', '2022-08-24 06:40:33');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
                            `id` bigint(20) UNSIGNED NOT NULL,
                            `from` bigint(20) NOT NULL,
                            `to` bigint(20) NOT NULL,
                            `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                            `is_read` tinyint(4) NOT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
                                                                                                  (1, 4, 1, 'hello', 1, '2022-08-24 15:06:42', '2022-08-24 15:11:20'),
                                                                                                  (2, 4, 1, 'how are you', 1, '2022-08-24 15:08:25', '2022-08-24 15:11:20'),
                                                                                                  (3, 1, 2, 'hello Syvio, it\'s Ryan', 1, '2022-08-24 15:11:42', '2022-08-24 16:10:13'),
(4, 2, 1, 'hello ryan it\'s syvio', 0, '2022-08-24 15:16:56', '2022-08-24 15:16:56'),
                                                                                                  (5, 2, 1, 'Hello', 0, '2022-08-24 15:41:37', '2022-08-24 15:41:37'),
                                                                                                  (6, 2, 4, 'Coucou toi', 1, '2022-08-24 15:42:02', '2022-08-25 06:48:53'),
                                                                                                  (7, 4, 2, 'Salut Nancya!', 1, '2022-08-24 15:44:59', '2022-08-25 06:50:18'),
                                                                                                  (8, 4, 2, 'Hello', 1, '2022-08-25 06:48:45', '2022-08-25 06:50:18'),
                                                                                                  (9, 2, 4, 'coucou', 0, '2022-08-25 06:50:01', '2022-08-25 06:50:01');

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
                                                                   (1, 'Expert en base de données', '2022-07-25 08:01:26', '2022-07-25 08:01:26'),
                                                                   (2, 'Developpeur ', '2022-07-25 08:01:26', '2022-07-25 08:01:26'),
                                                                   (3, 'Administrateur réseau', '2022-07-25 08:01:26', '2022-07-25 08:01:26'),
                                                                   (4, 'Webdesigner', '2022-07-25 08:01:26', '2022-07-25 08:01:26'),
                                                                   (5, 'Chef de projet', '2022-07-25 07:25:16', '2022-07-25 07:25:16'),
                                                                   (7, 'Stagiaire', '2022-07-25 14:15:39', '2022-07-25 14:15:39');

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
                            `id` bigint(20) NOT NULL,
                            `status` int(11) NOT NULL,
                            `title` varchar(500) NOT NULL,
                            `description` text DEFAULT NULL,
                            `client_id` bigint(20) DEFAULT NULL,
                            `date_echeance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `status`, `title`, `description`, `client_id`, `date_echeance`) VALUES
                                                                                                  (1, 0, 'M\'sera', 'E-commerce\nProject Angular+Laravel et MySQL : ', 15, '2022-09-30'),
(2, 0, 'Proxizone', 'React + Symfony et MySQL : gestion banque', 8, '2022-10-31'),
(3, 0, 'MyCanal', 'Project Symfony+React et MongoDB: télévision et chaines en ligne', 16, '2022-09-30'),
(4, 0, 'Finance', 'Finance site\nReact + Symfony et MySQL', 15, '2022-10-31'),
(5, 0, 'Gestion Carburant', 'Project Symfony+React et MongoDB: gestion carburant pour madagascar', 13, '2022-09-30'),
(6, 0, 'Site web Radisson', 'Site web Radisson Blue\r\nReact + Symfony et MySQL', 2, '2022-10-31');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'manager'),
(2, 'directeur'),
(3, 'personnel');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) NOT NULL,
  `title` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `completed` int(11) NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `description` text NOT NULL,
  `date_start` date NOT NULL,
  `date_echeance` date NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `status`, `completed`, `project_id`, `user_id`, `description`, `date_start`, `date_echeance`, `updated_at`) VALUES
(1, 'Intégration', 0, 60, 1, 2, 'Commencer l\'intégration des pages d\'accueil et login register sur Angular en utilisant Bootstrap', '2022-08-10', '2022-08-12', '2022-08-09 21:20:35'),
(2, 'Base de données', 0, 60, 1, 1, 'Créer MCD de notre application', '2022-08-10', '2022-08-16', '2022-08-23 07:34:26'),
(3, 'Intégration', 0, 30, 2, 3, 'Commencer l\'intégration des pages d\'accueil et login register sur Angular en utilisant Bootstrap', '2022-08-10', '2022-08-12', '2022-08-09 21:20:17'),
(4, 'Login ', 0, 30, 1, 2, 'Commencer la partie Login et Register', '2022-08-10', '2022-08-16', '2022-08-09 21:21:07'),
(6, 'Annonces liste', 0, 0, 1, 2, 'Get all announces, with pagination', '2022-08-10', '2022-08-12', '2022-08-09 20:58:18'),
(7, 'Detail-annonce', 0, 30, 1, 3, 'Page detail-announce with seller', '2022-08-10', '2022-08-16', '2022-08-09 17:53:48'),
(8, 'Update image annonces', 0, 30, 1, 1, 'Function update announce\'s images', '2022-08-10', '2022-08-12', '2022-08-23 07:34:33'),
                                                                                                  (9, 'Logout ', 0, 60, 1, 4, 'Commencer la partie Logout', '2022-08-10', '2022-08-16', '2022-08-24 05:39:19'),
                                                                                                  (10, 'Intégration page d\'accueil', 0, 60, 6, 3, 'Commencer l\'intégration des pages d\'accueil et login register sur Angular en utilisant Bootstrap', '2022-08-10', '2022-08-12', '2022-08-09 21:20:35'),
(11, 'Base de données de Radisson', 0, 30, 6, 3, 'Créer MCD de notre site', '2022-08-10', '2022-08-16', '2022-08-09 17:53:48'),
(12, 'Importer photos de l\'hôtel', 0, 30, 6, 3, 'Prendre et importer toutes les photos nécessaires de l\'hôtel', '2022-08-10', '2022-08-12', '2022-08-09 21:20:17'),
(13, 'Login ', 0, 0, 6, 3, 'Commencer la partie Login et Register', '2022-08-10', '2022-08-16', '2022-08-09 21:42:52'),
(14, 'Services liste', 0, 0, 6, 2, 'Données des différents service, avec pagination', '2022-08-10', '2022-08-12', '2022-08-09 20:58:18'),
(15, 'Detail-annonce', 0, 30, 6, 3, 'Page detail-service avec prix', '2022-08-10', '2022-08-16', '2022-08-09 17:53:48'),
(16, 'Localisation', 0, 100, 6, 1, 'carte de localisation', '2022-08-10', '2022-08-12', '2022-08-09 21:44:27'),
(17, 'Logout ', 0, 100, 2, 2, 'Commencer la partie Logout', '2022-08-10', '2022-08-16', '2022-08-09 19:23:25');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/images/default-avatar.png	',
  `poste_id` bigint(20) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `lastname`, `email`, `email_verified_at`, `avatar`, `poste_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'Ryan', 'Andriamanantoanina', 'ryan.tsiory@gmail.com', NULL, '1660071017.jpg', 1, '$2y$10$rVDqZ//6A1dRFd2fauOvWOccHVVLW7yvLL8NuInkdD7sOzjCVIo6a', NULL, '2022-08-09 03:34:26', '2022-08-23 05:46:58'),
(2, 3, 'Syvio Radafy', 'Kevin', 'syvio@ges.com', NULL, '1659784331.jpg', 2, '$2y$10$rVDqZ//6A1dRFd2fauOvWOccHVVLW7yvLL8NuInkdD7sOzjCVIo6a', NULL, '2022-08-09 12:27:44', '2022-08-09 12:27:44'),
(3, 3, 'Tsanta Rakotonjanahary', 'Fitia', 'tsanta@ges.com', NULL, '1659804874.jpg', 3, '$2y$10$5gjQwygjiPqwpVLJdiYNGu3J8wEQDCbTA4nupcYAZCgl83qnFCzGO', NULL, '2022-08-09 12:27:44', '2022-08-09 12:27:44'),
(4, 2, 'Faniry', 'Nancya', 'fnancya@ges.com', NULL, 'default-avatar-profile.png', 4, '$2y$10$rVDqZ//6A1dRFd2fauOvWOccHVVLW7yvLL8NuInkdD7sOzjCVIo6a', NULL, '2022-08-23 03:32:48', '2022-08-23 03:32:48'),
(5, 1, 'Finaritra', 'Randriamiandra', 'finaritrarandri@ges.com', NULL, 'default-avatar-profile.png', 7, '$2y$10$lra/X/7qafcxQe/NX7AN3O5ogNWx.LnuKnDKSeaIz446IW3KiYB6e', NULL, '2022-08-23 04:18:21', '2022-08-23 04:18:21');

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
-- Index pour la table `messages`
--
ALTER TABLE `messages`
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
-- Index pour la table `postes`
--
ALTER TABLE `postes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT pour la table `postes`
--
ALTER TABLE `postes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
