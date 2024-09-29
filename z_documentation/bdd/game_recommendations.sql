-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 29 sep. 2024 à 11:23
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `game_recommendations`
--
CREATE DATABASE IF NOT EXISTS `game_recommendations` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `game_recommendations`;

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `developer` varchar(50) NOT NULL,
  `release_year` year NOT NULL,
  `genre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `game_title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `title`, `developer`, `release_year`, `genre`, `description`) VALUES
(1, 'The Legend Of Zelda : Echoes Of Wisdom', 'Nintendo', '2024', 'Action/Aventure', 'Dans \"The Legend of Zelda: Echoes of Wisdom\", vous incarnez la princesse Zelda elle-même dans une aventure passionnante pour sauver Hyrule. De mystérieuses failles sont apparues, engloutissant les habitants, y compris Link. Accompagnée de la fée Tri, Zelda devra utiliser sa sagesse et ses nouveaux pouvoirs pour résoudre les énigmes, explorer des donjons et combattre des ennemis.'),
(2, 'The Legend Of Zelda : Ocarina of Time', 'Nintendo', '1998', 'Action/Aventure', '\"The Legend of Zelda: Ocarina of Time\" est un jeu d\'action-aventure emblématique sorti en 1998, considéré comme l\'un des plus grands jeux vidéo de tous les temps. Vous incarnez Link, un jeune garçon Kokiri, qui se lance dans une quête épique à travers le temps pour sauver Hyrule du maléfique Ganondorf.'),
(3, 'The Legend of Zelda', 'Nintendo', '1986', 'Action-Aventure', 'Le premier jeu de la légendaire série Zelda, où Link explore Hyrule pour rassembler les fragments de la Triforce de la Sagesse et sauver la Princesse Zelda.'),
(4, 'Zelda II: The Adventure of Link', 'Nintendo', '1987', 'Action-Aventure', 'Une suite directe avec une perspective à défilement latéral, où Link doit réveiller la Princesse Zelda endormie en récupérant les six cristaux et en vainquant le maléfique Shadow Link.'),
(5, 'The Legend of Zelda: A Link to the Past', 'Nintendo', '1991', 'Action-Aventure', 'Un classique de la Super Nintendo, où Link voyage entre le monde de la Lumière et le monde des Ténèbres pour sauver Hyrule et la Princesse Zelda du sorcier Agahnim.'),
(6, 'The Legend of Zelda: Link\'s Awakening', 'Nintendo', '1993', 'Action-Aventure', 'Link se retrouve échoué sur l\'île Cocolint et doit réveiller le Poisson-Rêve pour pouvoir rentrer chez lui.'),
(7, 'The Legend of Zelda: Ocarina of Time', 'Nintendo', '1998', 'Action-Aventure', 'Un chef-d\'œuvre de la Nintendo 64, où Link voyage à travers le temps pour empêcher Ganondorf de s\'emparer de la Triforce.'),
(8, 'The Legend of Zelda: Majora\'s Mask', 'Nintendo', '2000', 'Action-Aventure', 'Une suite directe d\'Ocarina of Time, où Link doit sauver le monde de Termina de la chute de la Lune en trois jours.'),
(9, 'The Legend of Zelda: Oracle of Ages', 'Capcom', '2001', 'Action-Aventure', 'Link est transporté dans le pays de Labrynna et doit voyager à travers le temps pour sauver Nayru, l\'Oracle des Âges.'),
(10, 'The Legend of Zelda: Oracle of Seasons', 'Capcom', '2001', 'Action-Aventure', 'Link arrive dans le pays d\'Holodrum et doit restaurer les saisons pour sauver Din, l\'Oracle des Saisons.'),
(11, 'The Legend of Zelda: The Wind Waker', 'Nintendo', '2002', 'Action-Aventure', 'Un jeu au style visuel unique sur GameCube, où Link navigue sur les mers à la recherche de sa sœur enlevée et affronte Ganondorf.'),
(12, 'The Legend of Zelda: Four Swords Adventures', 'Nintendo', '2004', 'Action-Aventure', 'Un jeu multijoueur sur GameCube où jusqu\'à quatre joueurs contrôlent des Links de différentes couleurs pour sauver Hyrule.'),
(13, 'The Legend of Zelda: The Minish Cap', 'Capcom', '2004', 'Action-Aventure', 'Link peut rétrécir grâce à un chapeau magique et explorer le monde des Minish pour sauver la Princesse Zelda.'),
(14, 'The Legend of Zelda: Twilight Princess', 'Nintendo', '2006', 'Action-Aventure', 'Link se transforme en loup dans le Royaume du Crépuscule et doit sauver Hyrule et Midona, la princesse du Crépuscule.'),
(15, 'The Legend of Zelda: Phantom Hourglass', 'Nintendo', '2007', 'Action-Aventure', 'Une suite de The Wind Waker sur Nintendo DS, où Link explore de nouvelles îles et donjons.'),
(16, 'The Legend of Zelda: Spirit Tracks', 'Nintendo', '2009', 'Action-Aventure', 'Link conduit un train à travers Hyrule pour restaurer les voies sacrées et sauver la Princesse Zelda.'),
(17, 'The Legend of Zelda: Skyward Sword', 'Nintendo', '2011', 'Action-Aventure', 'Un préquel à toute la série Zelda sur Wii, où Link vole dans les cieux et explore la terre en contrebas.'),
(18, 'The Legend of Zelda: A Link Between Worlds', 'Nintendo', '2013', 'Action-Aventure', 'Une suite spirituelle à A Link to the Past sur 3DS, où Link peut se transformer en peinture pour se déplacer sur les murs.'),
(19, 'The Legend of Zelda: Tri Force Heroes', 'Nintendo', '2015', 'Action-Aventure', 'Un jeu multijoueur sur 3DS où trois Links doivent coopérer pour résoudre des énigmes et vaincre des boss.'),
(20, 'The Legend of Zelda: Breath of the Wild', 'Nintendo', '2017', 'Action-Aventure', 'Un jeu en monde ouvert acclamé par la critique sur Switch et Wii U, où Link explore un vaste Hyrule pour vaincre Ganon et sauver Zelda.'),
(21, 'The Legend of Zelda: Link\'s Awakening (Remake)', 'Grezzo', '2019', 'Action-Aventure', 'Un remake fidèle du jeu original sur Switch, avec des graphismes améliorés et de nouvelles fonctionnalités.'),
(22, 'The Legend of Zelda: Tears of the Kingdom', 'Nintendo', '2023', 'Action-Aventure', 'La suite très attendue de Breath of the Wild, où Link explore les cieux et les profondeurs d\'Hyrule pour affronter une nouvelle menace.'),
(23, 'Super Mario 64', 'Nintendo', '1996', 'Plateforme', 'Un jeu de plateforme 3D révolutionnaire qui a défini le genre sur la Nintendo 64.'),
(24, 'Grand Theft Auto V', 'Rockstar North', '2013', 'Action-Aventure', 'Un jeu en monde ouvert immense et détaillé, où vous suivez les histoires de trois criminels à Los Santos.'),
(25, 'Minecraft', 'Mojang Studios', '2011', 'Bac à sable', 'Un jeu de construction en blocs où vous pouvez créer tout ce que vous imaginez.'),
(26, 'Tetris', 'Alexey Pajitnov', '1984', 'Puzzle', 'Un jeu de puzzle classique où vous devez empiler des blocs qui tombent pour former des lignes complètes.'),
(27, 'Red Dead Redemption 2', 'Rockstar Studios', '2018', 'Action-Aventure', 'Un western épique en monde ouvert qui suit les aventures d\'Arthur Morgan et de la bande de Dutch van der Linde.'),
(28, 'The Witcher 3: Wild Hunt', 'CD Projekt Red', '2015', 'Action-RPG', 'Un RPG en monde ouvert acclamé par la critique, où vous incarnez Geralt de Riv, un chasseur de monstres à la recherche de sa fille adoptive Ciri.'),
(29, 'Half-Life 2', 'Valve Corporation', '2004', 'FPS', 'Un FPS révolutionnaire qui a repoussé les limites de la narration et du gameplay.'),
(30, 'Portal 2', 'Valve Corporation', '2011', 'Puzzle-Plateforme', 'Un jeu de puzzle-plateforme innovant et hilarant qui utilise des portails pour résoudre des énigmes.'),
(31, 'Dark Souls', 'FromSoftware', '2011', 'Action-RPG', 'Un RPG difficile mais gratifiant qui a popularisé le genre \"Souls-like\".'),
(32, 'Elden Ring', 'FromSoftware', '2022', 'Action-RPG', 'Le dernier jeu de FromSoftware, un monde ouvert immense et dangereux rempli de défis et de secrets.'),
(33, 'Teenage Mutant Ninja Turtles', 'Konami', '1989', 'Beat\'em up', 'Incarnez les Tortues Ninja et combattez Shredder et son clan Foot pour sauver April O\'Neil et la ville de New York.');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `games_with_average_ratings`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `games_with_average_ratings`;
CREATE TABLE IF NOT EXISTS `games_with_average_ratings` (
`average_rating` decimal(14,4)
,`description` text
,`developer` varchar(50)
,`game_id` int
,`genre` varchar(50)
,`release_year` year
,`title` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`) VALUES
(1, 'Ced', 'Password59!'),
(3, 'Cedounet', 'Password59!'),
(5, 'Homer', 'Simpsons'),
(7, 'HomerSimpson', 'Password'),
(8, 'Marge', 'erddes'),
(10, 'Lisa', 'Simpson'),
(11, 'Bart', 'SdfsKkkd'),
(12, 'Apu', 'Napatamenrosq$dsn');

-- --------------------------------------------------------

--
-- Structure de la table `user_ratings`
--

DROP TABLE IF EXISTS `user_ratings`;
CREATE TABLE IF NOT EXISTS `user_ratings` (
  `rating` int NOT NULL,
  `user_id` int NOT NULL,
  `game_id` int NOT NULL,
  KEY `game_id` (`game_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user_ratings`
--

INSERT INTO `user_ratings` (`rating`, `user_id`, `game_id`) VALUES
(10, 1, 2),
(9, 1, 1),
(9, 5, 1),
(9, 3, 2),
(10, 12, 2),
(6, 1, 29),
(7, 8, 1),
(8, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la vue `games_with_average_ratings`
--
DROP TABLE IF EXISTS `games_with_average_ratings`;

DROP VIEW IF EXISTS `games_with_average_ratings`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `games_with_average_ratings`  AS SELECT `g`.`id` AS `game_id`, `g`.`title` AS `title`, `g`.`developer` AS `developer`, `g`.`genre` AS `genre`, `g`.`description` AS `description`, `g`.`release_year` AS `release_year`, avg(`r`.`rating`) AS `average_rating` FROM (`games` `g` left join `user_ratings` `r` on((`g`.`id` = `r`.`game_id`))) GROUP BY `g`.`id` ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD CONSTRAINT `game_id` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
