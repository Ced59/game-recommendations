-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 29 sep. 2024 à 15:24
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
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `title`, `developer`, `release_year`, `genre`, `description`) VALUES
(1, 'The Legend Of Zelda: Echoes Of Wisdom', 'Nintendo', '2024', 'Action-Aventure', 'Dans \"The Legend of Zelda: Echoes of Wisdom\", vous incarnez la princesse Zelda elle-même dans une aventure passionnante pour sauver Hyrule. De mystérieuses failles sont apparues, engloutissant les habitants, y compris Link. Accompagnée de la fée Tri, Zelda devra utiliser sa sagesse et ses nouveaux pouvoirs pour résoudre les énigmes, explorer des donjons et combattre des ennemis.'),
(2, 'The Legend Of Zelda: Ocarina of Time', 'Nintendo', '1998', 'Action-Aventure', '\"The Legend of Zelda: Ocarina of Time\" est un jeu d\'action-aventure emblématique sorti en 1998, considéré comme l\'un des plus grands jeux vidéo de tous les temps. Vous incarnez Link, un jeune garçon Kokiri, qui se lance dans une quête épique à travers le temps pour sauver Hyrule du maléfique Ganondorf.'),
(3, 'The Legend of Zelda', 'Nintendo', '1986', 'Action-Aventure', 'Le premier jeu de la légendaire série Zelda, où Link explore Hyrule pour rassembler les fragments de la Triforce de la Sagesse et sauver la Princesse Zelda.'),
(4, 'Zelda II: The Adventure of Link', 'Nintendo', '1987', 'Action-Aventure', 'Une suite directe avec une perspective à défilement latéral, où Link doit réveiller la Princesse Zelda endormie en récupérant les six cristaux et en vainquant le maléfique Shadow Link.'),
(5, 'The Legend of Zelda: A Link to the Past', 'Nintendo', '1991', 'Action-Aventure', 'Un classique de la Super Nintendo, où Link voyage entre le monde de la Lumière et le monde des Ténèbres pour sauver Hyrule et la Princesse Zelda du sorcier Agahnim.'),
(6, 'The Legend of Zelda: Link\'s Awakening', 'Nintendo', '1993', 'Action-Aventure', 'Link se retrouve échoué sur l\'île Cocolint et doit réveiller le Poisson-Rêve pour pouvoir rentrer chez lui.'),
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
(33, 'Teenage Mutant Ninja Turtles', 'Konami', '1989', 'Beat\'em up', 'Incarnez les Tortues Ninja et combattez Shredder et son clan Foot pour sauver April O\'Neil et la ville de New York.'),
(34, 'Final Fantasy VII', 'Square Enix', '1997', 'RPG', 'Un RPG emblématique qui suit Cloud Strife et son groupe dans leur lutte contre la Shinra Corporation.'),
(35, 'Chrono Trigger', 'Square Enix', '1995', 'RPG', 'Un voyage dans le temps épique avec Crono et ses amis pour sauver le monde.'),
(36, 'Baldur\'s Gate II: Shadows of Amn', 'BioWare', '2000', 'RPG', 'Une aventure D&D classique où vous incarnez l\'Enfant de Bhaal.'),
(37, 'Planescape: Torment', 'Black Isle Studios', '1999', 'RPG', 'Un RPG profond et philosophique qui explore les thèmes de l\'identité et de la mortalité.'),
(38, 'Fallout: New Vegas', 'Obsidian Entertainment', '2010', 'RPG', 'Un RPG post-apocalyptique dans le désert du Mojave, où vos choix façonnent l\'histoire.'),
(40, 'Mass Effect 2', 'BioWare', '2010', 'Action-RPG', 'Le Commandant Shepard rassemble une équipe pour une mission suicide contre les Moissonneurs.'),
(41, 'Dragon Age: Inquisition', 'BioWare', '2014', 'Action-RPG', 'Fermez la Brèche et sauvez Thedas en tant qu\'Inquisiteur.'),
(42, 'Persona 5 Royal', 'Atlus', '2020', 'RPG', 'Volez les cœurs corrompus en tant que Joker et les Voleurs Fantômes de Cœurs.'),
(43, 'Divinity: Original Sin 2', 'Larian Studios', '2017', 'RPG', 'Un RPG riche et complexe où vous explorez Rivellon en tant que Sourcier.'),
(44, 'Final Fantasy VI', 'Square Enix', '1994', 'RPG', 'Un JRPG classique avec Terra Branford et un groupe de rebelles luttant contre l\'Empire Gestahlien.'),
(45, 'Dragon Quest XI: Echoes of an Elusive Age', 'Square Enix', '2017', 'RPG', 'Une aventure épique en tant qu\'Éclairé pour sauver le monde d\'Erdrea.'),
(46, 'Xenoblade Chronicles', 'Monolith Soft', '2010', 'RPG', 'Explorez les vastes paysages de Bionis et Mechonis dans ce JRPG en monde ouvert.'),
(47, 'Ni no Kuni II: Revenant Kingdom', 'Level-5', '2018', 'RPG', 'Evan Pettiwhisker Tildrum, un jeune roi, construit un nouveau royaume.'),
(48, 'Octopath Traveler', 'Square Enix', '2018', 'RPG', 'Suivez les histoires entrelacées de huit voyageurs dans ce JRPG au style visuel unique.'),
(50, 'Bloodborne', 'FromSoftware', '2015', 'Action-RPG', 'Un RPG d\'action gothique et lovecraftien se déroulant dans la ville cauchemardesque de Yharnam.'),
(51, 'Sekiro: Shadows Die Twice', 'FromSoftware', '2019', 'Action-Aventure', 'Incarnez le Loup, un shinobi en quête de vengeance dans le Japon Sengoku.'),
(52, 'Monster Hunter: World', 'Capcom', '2018', 'Action-RPG', 'Chassez des monstres gigantesques dans un monde ouvert luxuriant.'),
(53, 'NieR: Automata', 'PlatinumGames', '2017', 'Action-RPG', 'Un RPG d\'action post-apocalyptique avec des androïdes combattant pour la survie de l\'humanité.'),
(54, 'Undertale', 'Toby Fox', '2015', 'RPG', 'Un RPG unique où vous pouvez choisir de vous lier d\'amitié ou de combattre les monstres.'),
(55, 'Disco Elysium', 'ZA/UM', '2019', 'RPG', 'Un RPG narratif où vous incarnez un détective amnésique enquêtant sur un meurtre.'),
(56, 'Hades', 'Supergiant Games', '2020', 'Rogue-like', 'Un rogue-like acclamé par la critique où vous incarnez Zagreus, le fils d\'Hadès, tentant de s\'échapper des Enfers.'),
(57, 'Stardew Valley', 'ConcernedApe', '2016', 'Simulation de vie/RPG', 'Quittez la vie urbaine pour gérer une ferme et vous lier d\'amitié avec les habitants de Pelican Town.'),
(58, 'Hollow Knight', 'Team Cherry', '2017', 'Metroidvania', 'Explorez le royaume souterrain d\'Hallownest en tant que Chevalier.'),
(59, 'World of Warcraft', 'Blizzard Entertainment', '2004', 'MMORPG', 'Le MMORPG le plus populaire, explorez Azeroth et combattez pour la Horde ou l\'Alliance.'),
(60, 'Final Fantasy XIV', 'Square Enix', '2013', 'MMORPG', 'Un MMORPG acclamé par la critique avec une histoire riche et un monde magnifique à explorer.'),
(61, 'The Elder Scrolls Online', 'ZeniMax Online Studios', '2014', 'MMORPG', 'Explorez le monde de Tamriel mille ans avant les événements de Skyrim.'),
(62, 'Guild Wars 2', 'ArenaNet', '2012', 'MMORPG', 'Un MMORPG dynamique avec un système de combat unique et un monde vivant.'),
(63, 'Black Desert Online', 'Pearl Abyss', '2015', 'MMORPG', 'Un MMORPG magnifique avec un système de combat d\'action intense et un monde ouvert immense.'),
(70, 'Banjo-Kazooie', 'Rare', '1998', 'Plateforme', 'Banjo et Kazooie sauvent Tooty de la méchante Gruntilda.'),
(71, 'Spyro the Dragon', 'Insomniac Games', '1998', 'Plateforme', 'Spyro libère ses compagnons dragons et affronte Gnasty Gnorc.'),
(72, 'Crash Bandicoot', 'Naughty Dog', '1996', 'Plateforme', 'Crash Bandicoot sauve Tawna du Dr. Neo Cortex.'),
(73, 'Ratchet & Clank', 'Insomniac Games', '2002', 'Plateforme', 'Ratchet et Clank voyagent à travers la galaxie pour arrêter le Président Drek.'),
(74, 'Super Mario Odyssey', 'Nintendo', '2017', 'Plateforme', 'Mario explore de nouveaux mondes avec Cappy pour sauver Peach de Bowser.'),
(75, 'Celeste', 'Matt Makes Games', '2018', 'Plateforme', 'Madeline escalade la montagne Celeste dans ce jeu difficile mais gratifiant.'),
(77, 'Ori and the Blind Forest', 'Moon Studios', '2015', 'Plateforme-Aventure', 'Ori, un esprit gardien, part à l aventure pour sauver la forêt de Nibel.'),
(78, 'Cuphead', 'Studio MDHR', '2017', 'Run and gun', 'Cuphead et Mugman doivent rembourser leur dette au Diable dans ce jeu difficile inspiré des dessins animés des années 30.'),
(79, 'Rayman Legends', 'Ubisoft Montpellier', '2013', 'Plateforme', 'Rayman, Globox et les Ptizêtres sauvent les princesses et les Teensies.'),
(80, 'Psychonauts', 'Double Fine Productions', '2005', 'Plateforme', 'Razputin, un jeune psychique, explore les esprits de ses camarades campeurs.'),
(81, 'Limbo', 'Playdead', '2010', 'Puzzle-Plateforme', 'Un garçon traverse un monde sombre et dangereux à la recherche de sa sœur.'),
(82, 'Inside', 'Playdead', '2016', 'Puzzle-Plateforme', 'Un garçon fuit une organisation mystérieuse dans ce jeu atmosphérique.'),
(83, 'LittleBigPlanet', 'Media Molecule', '2008', 'Plateforme', 'Sackboy explore un monde créatif où tout est possible.'),
(85, 'Dr. Mario', 'Nintendo', '1990', 'Puzzle', 'Utilisez des capsules colorées pour éliminer les virus dans ce jeu de puzzle.'),
(86, 'Puyo Puyo', 'Compile', '1991', 'Puzzle', 'Associez des Puyos de la même couleur pour les faire disparaître et envoyer des nuisances à votre adversaire.'),
(87, 'Lumines', 'Q Entertainment', '2004', 'Puzzle', 'Un jeu de puzzle rythmique où vous devez aligner des blocs de couleurs sur une grille.'),
(88, 'Puzzle Bobble', 'Taito', '1994', 'Puzzle', 'Tirez des bulles colorées pour former des groupes de trois ou plus et les faire éclater.'),
(89, 'Portal', 'Valve Corporation', '2007', 'Puzzle-Plateforme', 'Utilisez un pistolet à portails pour résoudre des énigmes spatiales.'),
(91, 'The Witness', 'Thekla, Inc.', '2016', 'Puzzle', 'Explorez une île mystérieuse et résolvez des énigmes visuelles pour progresser.'),
(92, 'Baba Is You', 'Hempuli Oy', '2019', 'Puzzle', 'Un jeu de puzzle unique où vous pouvez manipuler les règles du jeu en déplaçant des blocs de mots.'),
(93, 'Tetris Effect', 'Monstars Inc., Resonair', '2018', 'Puzzle', 'Une version moderne et immersive de Tetris avec des visuels et une musique époustouflants.'),
(94, 'The Talos Principle', 'Croteam', '2014', 'Puzzle', 'Résolvez des énigmes complexes dans un monde philosophique et atmosphérique.'),
(95, 'Fez', 'Polytron Corporation', '2012', 'Puzzle-Plateforme', 'Explorez un monde en 2D qui peut être pivoté en 3D pour révéler de nouveaux chemins et secrets.'),
(96, 'Stephen\'s Sausage Roll', 'Increpare Games', '2016', 'Puzzle', 'Faites cuire des saucisses sur un gril en les faisant rouler avec une fourchette, un concept simple mais des énigmes diaboliquement difficiles.'),
(97, 'Return of the Obra Dinn', 'Lucas Pope', '2018', 'Puzzle-Aventure', 'Enquêtez sur le sort de l\'équipage disparu de l\'Obra Dinn en utilisant un mystérieux chronomètre.'),
(98, 'World of Goo', '2D Boy', '2008', 'Puzzle-Construction', 'Construisez des structures avec des boules de goo pour atteindre la sortie de chaque niveau.');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`) VALUES
(15, 'Ced', 'Coucou'),
(16, 'HomerSimpson', 'Donuts'),
(17, 'Gandalf', 'YouShouldNotPass'),
(18, 'Link', 'MasterSword'),
(19, 'DarkVador', 'LukeImYourFather'),
(20, 'Pikachu', 'PikaPika'),
(21, 'HarryPotter', 'ExpectoPatronum');

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
(8, 16, 2),
(10, 16, 43),
(8, 16, 36),
(10, 15, 2),
(8, 15, 3),
(7, 15, 4),
(10, 15, 5),
(8, 15, 6),
(10, 15, 8),
(10, 15, 11),
(10, 15, 14),
(8, 15, 13),
(9, 15, 18),
(5, 15, 81),
(8, 17, 74),
(9, 18, 40),
(7, 18, 41),
(7, 18, 1),
(7, 19, 95),
(9, 20, 86),
(9, 20, 2),
(9, 21, 57);

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
