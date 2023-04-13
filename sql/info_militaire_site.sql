-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 13 avr. 2023 à 12:48
-- Version du serveur : 8.0.30
-- Version de PHP : 8.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `info_militaire_site`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int NOT NULL,
  `comment` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `validated_at` datetime DEFAULT NULL,
  `id_event` int NOT NULL,
  `id_users` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id_region` int NOT NULL,
  `id_dep` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id_region`, `id_dep`, `name`) VALUES
(84, '01', 'Ain'),
(32, '02', 'Aisne'),
(84, '03', 'Allier'),
(93, '04', 'Alpes-de-Haute-Provence'),
(93, '05', 'Hautes-Alpes'),
(93, '06', 'Alpes-Maritimes'),
(84, '07', 'Ardèche'),
(44, '08', 'Ardennes'),
(76, '09', 'Ariège'),
(44, '10', 'Aube'),
(76, '11', 'Aude'),
(76, '12', 'Aveyron'),
(93, '13', 'Bouches-du-Rhône'),
(28, '14', 'Calvados'),
(84, '15', 'Cantal'),
(75, '16', 'Charente'),
(75, '17', 'Charente-Maritime'),
(24, '18', 'Cher'),
(75, '19', 'Corrèze'),
(27, '21', 'Côte-d\'Or'),
(53, '22', 'Côtes-d\'Armor'),
(75, '23', 'Creuse'),
(75, '24', 'Dordogne'),
(27, '25', 'Doubs'),
(84, '26', 'Drôme'),
(28, '27', 'Eure'),
(24, '28', 'Eure-et-Loir'),
(53, '29', 'Finistère'),
(94, '2A', 'Corse-du-Sud'),
(94, '2B', 'Haute-Corse'),
(76, '30', 'Gard'),
(76, '31', 'Haute-Garonne'),
(76, '32', 'Gers'),
(75, '33', 'Gironde'),
(76, '34', 'Hérault'),
(53, '35', 'Ille-et-Vilaine'),
(24, '36', 'Indre'),
(24, '37', 'Indre-et-Loire'),
(84, '38', 'Isère'),
(27, '39', 'Jura'),
(75, '40', 'Landes'),
(24, '41', 'Loir-et-Cher'),
(84, '42', 'Loire'),
(84, '43', 'Haute-Loire'),
(52, '44', 'Loire-Atlantique'),
(24, '45', 'Loiret'),
(76, '46', 'Lot'),
(75, '47', 'Lot-et-Garonne'),
(76, '48', 'Lozère'),
(52, '49', 'Maine-et-Loire'),
(28, '50', 'Manche'),
(44, '51', 'Marne'),
(44, '52', 'Haute-Marne'),
(52, '53', 'Mayenne'),
(44, '54', 'Meurthe-et-Moselle'),
(44, '55', 'Meuse'),
(53, '56', 'Morbihan'),
(44, '57', 'Moselle'),
(27, '58', 'Nièvre'),
(32, '59', 'Nord'),
(32, '60', 'Oise'),
(28, '61', 'Orne'),
(32, '62', 'Pas-de-Calais'),
(84, '63', 'Puy-de-Dôme'),
(75, '64', 'Pyrénées-Atlantiques'),
(76, '65', 'Hautes-Pyrénées'),
(76, '66', 'Pyrénées-Orientales'),
(44, '67', 'Bas-Rhin'),
(44, '68', 'Haut-Rhin'),
(84, '69', 'Rhône'),
(27, '70', 'Haute-Saône'),
(27, '71', 'Saône-et-Loire'),
(52, '72', 'Sarthe'),
(84, '73', 'Savoie'),
(84, '74', 'Haute-Savoie'),
(11, '75', 'Paris'),
(28, '76', 'Seine-Maritime'),
(11, '77', 'Seine-et-Marne'),
(11, '78', 'Yvelines'),
(75, '79', 'Deux-Sèvres'),
(32, '80', 'Somme'),
(76, '81', 'Tarn'),
(76, '82', 'Tarn-et-Garonne'),
(93, '83', 'Var'),
(93, '84', 'Vaucluse'),
(52, '85', 'Vendée'),
(75, '86', 'Vienne'),
(75, '87', 'Haute-Vienne'),
(44, '88', 'Vosges'),
(27, '89', 'Yonne'),
(27, '90', 'Territoire de Belfort'),
(11, '91', 'Essonne'),
(11, '92', 'Hauts-de-Seine'),
(11, '93', 'Seine-Saint-Denis'),
(11, '94', 'Val-de-Marne'),
(11, '95', 'Val-d\'Oise');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id_event` int NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dateHour` datetime NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `validated_at` datetime DEFAULT NULL,
  `id_region` int NOT NULL,
  `id_dep` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  `id_users` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id_event`, `title`, `address`, `dateHour`, `description`, `created_at`, `validated_at`, `id_region`, `id_dep`, `id_users`) VALUES
(2, 'test', 'jqhbjqdbkjq', '2023-05-02 10:00:00', 'test', '2023-04-12 12:41:53', NULL, 11, '75', 13),
(3, 'uzhdbhsdjb', 'zigfzhje', '2023-02-15 15:00:00', 'jhbzdkqjbksehdbkzkejfbskjbkjbskejfbskfbskjbskdjbcksjbskejbzkbsdjbsk', '2023-04-12 20:44:35', NULL, 44, '55', 13),
(4, 'bonjout', 'ojzdhazkjdn', '2023-05-01 10:00:00', 'ezoiudhzoefijqsodklsdncksjedf', '2023-04-13 12:14:58', NULL, 28, '27', 5);

-- --------------------------------------------------------

--
-- Structure de la table `music`
--

CREATE TABLE `music` (
  `id_music` int NOT NULL,
  `title` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `links` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `validated_at` datetime DEFAULT NULL,
  `id_users` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `music`
--

INSERT INTO `music` (`id_music`, `title`, `description`, `links`, `created_at`, `validated_at`, `id_users`) VALUES
(35, 'test', 'test', 'https://youtu.be/ZMjvcnhvCNA', '2023-04-11 20:53:22', NULL, 13);

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id_region` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id_region`, `name`) VALUES
(11, 'Île-de-France'),
(24, 'Centre-Val de Loire'),
(27, 'Bourgogne-Franche-Comté'),
(28, 'Normandie'),
(32, 'Hauts-de-France'),
(44, 'Grand Est'),
(52, 'Pays de la Loire'),
(53, 'Bretagne'),
(75, 'Nouvelle-Aquitaine'),
(76, 'Occitanie'),
(84, 'Auvergne-Rhône-Alpes'),
(93, 'Provence-Alpes-Côte d\'Azur'),
(94, 'Corse');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `pseudo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatded_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `validated_at` datetime DEFAULT NULL,
  `disabled_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `id_role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `pseudo`, `email`, `password`, `created_at`, `updatded_at`, `validated_at`, `disabled_at`, `deleted_at`, `id_role`) VALUES
(5, 'Ahsoka', 'bedrouni.nawelle@gmail.com', '$2y$10$CLPFJtYQbyg9/ZgfiRJ3teMGHXZMgjYZod6s7W2tu.b1ng2J17UEu', '2023-03-30 09:15:42', '2023-03-30 11:24:16', NULL, NULL, NULL, 1),
(6, 'Adeline', 'adeline@gmail.com', '$2y$10$3I1yNJguk2S2JqErmkCosuTsXpJqzslAN0STPKTFrASDa6vaAD.rG', '2023-03-30 09:17:55', '2023-03-30 11:17:55', NULL, NULL, NULL, 2),
(10, 'test', 'test@gmail.com', '$2y$10$CM3PhdI9qwMwK0KzPLKMO.Lu27eIjdX.OU7n87r83HkcoxQf9daeO', '2023-04-03 09:47:17', '2023-04-03 11:47:18', NULL, NULL, NULL, 2),
(13, 'test01', 'test01@gmail.com', '$2y$10$4/zx7Do/No451RnUq8pzwueEyEdoAp1Z.8EZ5gqMoKZWSrrOmX/.i', '2023-04-11 19:22:32', '2023-04-11 21:22:43', NULL, NULL, NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `comments_ibfk_1` (`id_event`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_dep`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_region` (`id_region`),
  ADD KEY `id_users` (`id_users`);

--
-- Index pour la table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id_music`),
  ADD KEY `id_users` (`id_users`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id_region`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `music`
--
ALTER TABLE `music`
  MODIFY `id_music` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id_region` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `events` (`id_event`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `regions` (`id_region`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Contraintes pour la table `music`
--
ALTER TABLE `music`
  ADD CONSTRAINT `music_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
