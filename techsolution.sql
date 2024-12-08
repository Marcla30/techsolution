-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 08 déc. 2024 à 19:09
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `techsolution`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
                            `idArticle` int(11) NOT NULL,
                            `titreArticle` varchar(255) NOT NULL,
                            `imgArticle` varchar(255) NOT NULL,
                            `tagArticle` varchar(255) NOT NULL,
                            `contentArticle` text DEFAULT NULL,
                            `fkuserId` int(11) NOT NULL,
                            `fkcodeTag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idArticle`, `titreArticle`, `imgArticle`, `tagArticle`, `contentArticle`, `fkuserId`, `fkcodeTag`) VALUES
                                                                                                                                (2, 'Windows 365 Link', 'https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/hero-thumbnail-image-353934?resMode=sharp2&op_usm=1.5,0.65,15,0&wid=608&hei=342&qlt=100&fit=constrain', 'Windows', 'Microsoft s’apprête lancer un nouveau produit qui rappelle étrangement le mac mini.\r\nApple serait-t-il en danger face a cette concurrence ? (Spoiler : non.)\r\n\r\nLe Windows 365 Link est un mini PC embarquant un processeur Intel (dont la référence n’est pas connue), 8 Go de RAM et 64 Go de stockage. Le tout dans un boitier aux dimensions compacte (12 x 12 x 3 cm) et sans ventilateur, avec une connectique complète, incluant des ports USB, Ethernet, HDMI et Display Port. \r\nSi ses caractéristiques semblent ne pas faire rêver, c’est « normal », cet appareil n’a pour rôle que de servir d’interface entre l’utilisateur et un environnement virtuel hébergé sur le cloud via Microsoft 365. Il ne prend en charge aucune application locale, tout se passe à distance.\r\nL’objet serait donc plutôt réservé aux professionnels, en leur fournissant un outil de travail sécurisé et collaboratif avec tous les outils cloud de l’écosystème de Microsoft.\r\n\r\nLe Windows 365 Link devrait être disponible au prix de 349 USD, dès avril 2025 dans certains pays, excluant, pour le moment, la France. Reste à voir lors de sa sortie si le produit apporte une réelle plus-value en entreprise…', 1, 1),
                                                                                                                                (13, 'Titre article 1', 'https://media.istockphoto.com/id/1485939448/photo/data-processing-digital-technology-software-development-concept-computer-programmer-software.jpg?s=612x612&w=0&k=20&c=AMaqBgU79i_uPbJmGzoO9b_RoLwYpGwCaJsnTAsNPaY=', 'fdp fdp', 'Jean est le plus beauu', 1, 1),
                                                                                                                                (14, 'Article 2', 'https://www.swg.com/can/wp-content/uploads/sites/38/2014/09/Integration-Landing-page-banner.jpg', 'Développement', 'Jean le boss des boss le mec est trop beau', 1, 1),
                                                                                                                                (17, 'Article de bz', 'https://cdn-icons-png.flaticon.com/512/88/88167.png', 'Infrastructure', 'oui', 1, 1),
                                                                                                                                (18, 'article b', 'https://media.istockphoto.com/id/1485939448/photo/data-processing-digital-technology-software-development-concept-computer-programmer-software.jpg?s=612x612&w=0&k=20&c=AMaqBgU79i_uPbJmGzoO9b_RoLwYpGwCaJsnTAsNPaY=', 'Design', 'Non', 1, 1),
                                                                                                                                (21, 'TEST2', 'TEST2', 'Infrastructure', 'tg', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `formContact`
--

CREATE TABLE `formContact` (
                               `idMessage` int(11) NOT NULL,
                               `nomContact` varchar(255) NOT NULL,
                               `prenomContact` varchar(255) NOT NULL,
                               `emailContact` varchar(255) NOT NULL,
                               `contentContact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formContact`
--

INSERT INTO `formContact` (`idMessage`, `nomContact`, `prenomContact`, `emailContact`, `contentContact`) VALUES
                                                                                                             (3, 'Jean', 'Leboss', 'lemaildejean@jean.fr', 'oui'),
                                                                                                             (4, 'Marc', 'Marc', 'marc@marc.fr', 'demande'),
                                                                                                             (6, 'hgf', 'erferf', '', 'eferf'),
                                                                                                             (8, 'Test', 'prenol', 'email@email.fr', 'test2'),
                                                                                                             (9, 'Test', 'prenol', 'email@email.fr', 'test2');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
                        `codeTag` int(11) NOT NULL,
                        `libeleTag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`codeTag`, `libeleTag`) VALUES
                                                (1, 'Développement'),
                                                (2, 'Design'),
                                                (3, 'Infrastructure');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
                                `userId` int(11) NOT NULL,
                                `username` varchar(50) NOT NULL,
                                `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`userId`, `username`, `password`) VALUES
    (1, 'marc', 'oui');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
    ADD PRIMARY KEY (`idArticle`),
    ADD KEY `fkuserId` (`fkuserId`),
    ADD KEY `fkcodeTag` (`fkcodeTag`);

--
-- Index pour la table `formContact`
--
ALTER TABLE `formContact`
    ADD PRIMARY KEY (`idMessage`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
    ADD PRIMARY KEY (`codeTag`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
    ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
    MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `formContact`
--
ALTER TABLE `formContact`
    MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
    MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
    ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`fkuserId`) REFERENCES `utilisateurs` (`userId`),
    ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`fkcodeTag`) REFERENCES `tags` (`codeTag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
