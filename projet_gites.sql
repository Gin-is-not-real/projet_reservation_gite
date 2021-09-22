-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 22 sep. 2021 à 13:29
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_gites`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `utilisateur` varchar(255) NOT NULL,
  `motPasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`utilisateur`, `motPasse`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `hebergements`
--

CREATE TABLE `hebergements` (
  `id_hebergement` int(10) UNSIGNED NOT NULL,
  `intitule` varchar(50) NOT NULL,
  `categorie` set('Appartement','Maison','Villa','Chambre') NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `nb_lits` int(11) NOT NULL,
  `nb_sdb` int(11) NOT NULL,
  `localisation` varchar(255) NOT NULL,
  `prix` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `hebergements`
--

INSERT INTO `hebergements` (`id_hebergement`, `intitule`, `categorie`, `description`, `photo`, `nb_lits`, `nb_sdb`, `localisation`, `prix`) VALUES
(45, 'Chambre Cottage', 'Chambre', 'Magnifique chambre exposÃ©e sud, avec vue sur la mer, trÃ¨s bien situÃ©e, proche de tout commerces', 'static/img/imglibre/chambre5_H500_L893.jpg', 1, 1, 'Montpellier', '60'),
(48, 'Chambre Bella', '', 'Magnifique chambre, en plein coeur d\'un quartier historique, proche des commerces, idÃ©al pour des ballades Ã  pied', 'static/img/imglibre/chambre3_H500_L833.jpg', 1, 1, 'Montpellier', '35'),
(49, 'Appartement Perle Marine', 'Appartement', 'Grand appartement au centre de la ville, proches des restaurants et seulement a quelques kilomÃ¨tres de la plage', 'static/img/imglibre/villa2_H500_L916.jpg', 2, 2, 'Montpellier', '100'),
(50, 'Appartement Doux Refuge', 'Appartement', 'Petit appartement, Ã  200 mÃ¨tres de la plage, idÃ©al pour un magnifique week-end en couple', 'static/img/imglibre/chambre2_H500_L849.jpg', 1, 1, 'Montpellier', '75'),
(51, 'Maison SÃ©rÃ©nitÃ©', '', 'Jolie maison, parfait pour un week-end dans le calme et la sÃ©rÃ©nitÃ©', 'static/img/imglibre/maison5_H500_L668.jpg', 3, 2, 'Montpellier', '120'),
(52, 'Maison de la falaise ', 'Maison', 'Petite maison situÃ© sur les falaises de bord de mer, parfaite pour les vacances en famille', 'static/img/imglibre/maison_H500_L885.jpg', 5, 3, 'Montpellier', '150'),
(53, 'Villa du Sud', '', 'Grande villa Ã  1 kilomÃ¨tre de la plage, proches des bars et des discothÃ¨ques, idÃ©al pour des vacances entre amis ', 'static/img/imglibre/villa3_H500_L890.jpg', 6, 4, 'Montpellier', '300'),
(54, 'Villa Coconut ', 'Villa', 'TrÃ¨s jolie villa, Ã  quelques kilomÃ¨tre de la mer, Ã©quipÃ©e d\'un cour de tennis, proches des commerces parfaite pour des vacances en famille', 'static/img/imglibre/villa6_H500_L893.jpg', 6, 4, 'Montpellier', '500'),
(55, 'Le Flamant Rose', 'Chambre', 'Jolie chambre en bord de mer, Ã  proximitÃ© de restaurants et d\'un spa, idÃ©al pour un week-end dÃ©tente', 'static/img/imglibre/chambre4_H500_L668.jpg', 2, 1, 'Montpellier', '80'),
(56, 'Appartement Les Palmiers', 'Appartement', 'Bel appartement, Ã  100 mÃ¨tres de la plage, entourÃ© de joli palmiers, il est parfait pour des vacances farniente', 'static/img/imglibre/maison2_H500_L751.jpg', 2, 1, 'Montpellier', '130'),
(57, 'Maison Calypso', 'Maison', 'Jolie maison, situÃ© dans les terres, idÃ©al pour des vacances loin de tout ', 'static/img/imglibre/maison4_H500_L751.jpg', 2, 2, 'Montpellier', '150'),
(58, 'Villa', '', 'Grande villa, en bord de mer, proche de tout, avec spa et jacuzzi, parfaite pour des vacances dÃ©tendus', 'static/img/imglibre/villa4_H500_L737.jpg', 6, 4, 'Montpellier', '600');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id_reservation` int(10) UNSIGNED NOT NULL,
  `id_hebergement` int(11) NOT NULL,
  `date_occupation` date NOT NULL,
  `date_liberation` date NOT NULL,
  `client_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id_reservation`, `id_hebergement`, `date_occupation`, `date_liberation`, `client_mail`) VALUES
(1, 3, '2021-06-20', '2021-06-30', ''),
(41, 45, '2021-06-01', '2021-06-06', 'a@live.fr'),
(42, 48, '2021-06-04', '2021-06-11', 'a@live.fr'),
(43, 45, '2021-06-25', '2021-06-28', 'a@live.fr'),
(44, 49, '2021-07-11', '2021-07-20', 'a@live.fr'),
(45, 49, '2021-06-02', '2021-06-05', 'a@live.fr'),
(46, 48, '2021-07-18', '2021-07-21', 'a@live.fr'),
(47, 53, '2021-06-04', '2021-06-21', 'a@live.fr'),
(48, 45, '2021-07-02', '2021-07-05', 'a@live.fr'),
(49, 45, '2021-06-01', '2021-06-11', 'nina@live.fr'),
(50, 48, '2021-06-18', '2021-06-20', 'nina@live.fr'),
(51, 45, '2021-06-01', '2021-06-01', 'fake@mail.fr');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `hebergements`
--
ALTER TABLE `hebergements`
  ADD PRIMARY KEY (`id_hebergement`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_hebergement` (`id_hebergement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `hebergements`
--
ALTER TABLE `hebergements`
  MODIFY `id_hebergement` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
