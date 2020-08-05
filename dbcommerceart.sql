-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 05 août 2020 à 11:18
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbcommerceart`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_titre` varchar(100) NOT NULL,
  `cat_descr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_titre`, `cat_descr`) VALUES
(1, 'Peint', 'c\'est une category des oeuvre d\'art qui se fait a l\'aide d\'une pinceaux'),
(2, 'Sculpure', 'c\'est une category des oeuvre d\'art qui se fait a l\'aide des bois tailler marquant un evenement  d\'un tribut ou un autre.'),
(3, 'Picassa', 'c\'est une category des oeuvre d\'art qui se fait a l\'aide d\'une pinceaux'),
(4, 'Dessin', 'c\'est une category des oeuvre d\'art qui se fait a l\'aide des bois tailler marquant un evenement  d\'un tribut ou un autre.'),
(5, 'Autres', 'les oeuvres interrecant mais non classer parties les categories des oeuvre  arts');

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE `slider` (
  `id_slide` int(10) NOT NULL,
  `nom_slide` varchar(255) NOT NULL,
  `image_slide` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`id_slide`, `nom_slide`, `image_slide`) VALUES
(4, 'slide 4', 'slide-4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `t_admins`
--

CREATE TABLE `t_admins` (
  `admin_id` int(10) NOT NULL,
  `nom_admin` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `motpass_admin` varchar(255) NOT NULL,
  `image_admin` text NOT NULL,
  `pays_admin` text NOT NULL,
  `apropos_admin` text NOT NULL,
  `contact _admin` text NOT NULL,
  `ocup_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_admins`
--

INSERT INTO `t_admins` (`admin_id`, `nom_admin`, `email_admin`, `motpass_admin`, `image_admin`, `pays_admin`, `apropos_admin`, `contact _admin`, `ocup_admin`) VALUES
(1, 'Admin Chiza', 'chizampenzi@gmail.com', 'adminadmin', 'profile_admin.jpg', 'Republique  Democratique du congo', 'l\'admini principal est le concepteur directe de ce marcher des oeuvres d\'arts en ligne. ', '09949865421', 'Directeur du system.');

-- --------------------------------------------------------

--
-- Structure de la table `t_arts`
--

CREATE TABLE `t_arts` (
  `id_Art` int(10) NOT NULL,
  `art_cat_id` int(10) NOT NULL,
  `id_cat` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titre_Art` text NOT NULL,
  `art_img1` text NOT NULL,
  `art_img2` text NOT NULL,
  `art_img3` text NOT NULL,
  `prix_art` int(11) NOT NULL,
  `art_motcles` text NOT NULL,
  `art_desc` text NOT NULL,
  `art_vente` varchar(100) NOT NULL,
  `art_label` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_arts`
--

INSERT INTO `t_arts` (`id_Art`, `art_cat_id`, `id_cat`, `date`, `titre_Art`, `art_img1`, `art_img2`, `art_img3`, `prix_art`, `art_motcles`, `art_desc`, `art_vente`, `art_label`) VALUES
(3, 6, 4, '2020-07-09 11:37:04', 'chameau', '4 (8).jpg', '4 (7).jpg', '4 (6).jpg', 500, 'trans Archaic ', '<p>cette oeuvre illustres les choses anciennes</p>', '0', 'Vente'),
(5, 2, 1, '2020-07-09 11:51:11', 'Montantepeint', 'art6 (3).jpg', 'art6 (4).jpg', 'art6 (5).jpg', 155, 'femme design', '<p>ce dessin ullistre le physique naturelle de le femme dans village africain</p>', '1', 'Nouveau'),
(6, 6, 3, '2020-07-09 12:02:35', 'Art en mur', 'at7 (5).jpg', 'at7 (3).jpg', 'at7 (2).jpg', 147, 'muraille', '<p>ce dessin ullistre la decoration dans un mur</p>', '', ''),
(7, 1, 1, '2020-07-09 12:09:12', 'photoart', 'art5 (5).jpg', 'art5 (6).jpg', 'art5 (7).jpg', 93, 'jhf', '<p>bhhsbhglwhouglN Vb</p>', '', ''),
(8, 1, 1, '2020-07-09 12:18:37', 'enfanantcongo', 'IMG_5071 (14).JPG', '', '', 250, 'kjnh', '<p>bfdydgfyvydjndb</p>', '', ''),
(9, 5, 2, '2020-07-09 12:27:28', 'paysage', 'is5.jpg', '3 (4).jpg', '3 (4).jpg', 194, 'kkk', '<p>bhbckccjbcjsc,ns,cvfn</p>', '', ''),
(10, 2, 3, '2020-07-09 12:31:52', 'Parapluie cover', 'burgundy-1122165_1280.jpg', 'burgundy-1122165_1280.jpg', 'burgundy-1122165_1280.jpg', 194, 'Ã¹lkjhvgul', '<p>nbvcxsdtfyghjl;:;</p>', '', ''),
(12, 6, 3, '2020-07-09 13:12:12', 'ARTbbch', '17.jpg', '16b.jpg', '16a.jpg', 316, 'KJGUHB', '<p>jbkbu,vjmc;,fipm</p>', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `t_arts_categorie`
--

CREATE TABLE `t_arts_categorie` (
  `art_cat_id` int(10) NOT NULL,
  `art_cat_titre` text NOT NULL,
  `art_cat_descr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_arts_categorie`
--

INSERT INTO `t_arts_categorie` (`art_cat_id`, `art_cat_titre`, `art_cat_descr`) VALUES
(1, '  Dessin', 'le dessin est un productivity lier a la capaticiter artististique de savoir comment manupuler le crayon poitut'),
(2, '  sculpture ', 'cette merveille production est un dessin de  trï¿½s celebre artiste de la ville  de la republique democratique du Congo.'),
(5, 'Tableaux ', 'cette merveille production est une œuvre de collection très rare cartonnant dans les Années 1800 par l’empereur roi de l\'empire lunda'),
(6, 'Multidimensionnel', 'cette merveille production est une œuvre de collection très rare cartonnant dans les Années 1800 par l’empereur Nebcadnesor dans Ethiopians Ethiopie');

-- --------------------------------------------------------

--
-- Structure de la table `t_box`
--

CREATE TABLE `t_box` (
  `id_box` int(10) NOT NULL,
  `titre_box` text NOT NULL,
  `desc_box` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_box`
--

INSERT INTO `t_box` (`id_box`, `titre_box`, `desc_box`) VALUES
(1, 'Bon prix Pour tous Nos clients', 'Notre marche en ligne des œuvre d\'art est ouvert pour tous les monde est des prix abordable sont livrer pour client qui apprecies nos oeuvres d\'art '),
(4, 'Cadeaux disponibles pour toi', 'Des nombreuses surprises t\'entend dans notre marche des œuvres d\'arts une fois acheter habituellement vous devenir membre et une fois devenir membre vous allez voir vous me'),
(6, 'Nos Promotions en cours', 'Beaucoup des surprise sont disponibles pour tous ce qui vont acheter des œuvres d\'arts a cette périodes en tenant compte des quantités acheter. les réduction aura lieu  a la livraison.');

-- --------------------------------------------------------

--
-- Structure de la table `t_clients`
--

CREATE TABLE `t_clients` (
  `client_id` int(10) NOT NULL,
  `client_nom` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_password` varchar(255) NOT NULL,
  `client_pays` text NOT NULL,
  `client_ville` text NOT NULL,
  `client_contact` varchar(300) NOT NULL,
  `client_adress` text NOT NULL,
  `client_photo` text NOT NULL,
  `client_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_clients`
--

INSERT INTO `t_clients` (`client_id`, `client_nom`, `client_email`, `client_password`, `client_pays`, `client_ville`, `client_contact`, `client_adress`, `client_photo`, `client_ip`) VALUES
(4, 'James Chiza', 'jmschiza@gmail.com', 'jameschiza', 'RDC', 'Kinshasa', '+243971921094', 'Limete/Gombe', '48939734_2206591592914642_885316428993921024_o.jpg', '::1');

-- --------------------------------------------------------

--
-- Structure de la table `t_client_orders`
--

CREATE TABLE `t_client_orders` (
  `order_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `due_montant` int(100) NOT NULL,
  `invoice_no` text NOT NULL,
  `qty` int(100) NOT NULL,
  `num` text NOT NULL,
  `order_date` date NOT NULL,
  `order_stutus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_client_orders`
--

INSERT INTO `t_client_orders` (`order_id`, `client_id`, `due_montant`, `invoice_no`, `qty`, `num`, `order_date`, `order_stutus`) VALUES
(3, 3, 500, '508379394', 1, '550px', '2020-05-13', 'Pending'),
(4, 3, 100, '508379394', 1, '152px', '2020-05-13', 'Pending'),
(5, 4, 99, '1181746426', 1, '1000px', '2020-05-15', 'Pending'),
(6, 5, 200, '1979766552', 2, '550px', '2020-05-15', 'Pending'),
(7, 5, 297, '1979766552', 3, '1000px', '2020-05-15', 'Pending'),
(8, 4, 300, '648318200', 3, '1000px', '2020-05-16', 'Pending'),
(9, 4, 500, '597485712', 1, '550px', '2020-05-16', 'Pending'),
(10, 4, 297, '1162327404', 3, '550px', '2020-05-22', 'Pending'),
(11, 4, 198, '1661260146', 2, '152px', '2020-05-26', 'Pending'),
(12, 4, 1500, '236761560', 3, '550px', '2020-07-09', 'Deja Payer'),
(13, 4, 963, '1769537107', 3, '550px', '2020-07-11', 'Deja Payer'),
(14, 4, 465, '229930918', 3, '152px', '2020-07-14', 'Entente'),
(15, 4, 194, '229930918', 1, '152px', '2020-07-14', 'Entente'),
(16, 4, 250, '317611390', 1, '550px', '2020-07-16', 'Entente'),
(17, 4, 155, '574822538', 1, '152px', '2020-07-23', 'Deja Payer'),
(18, 4, 388, '623173030', 2, '1800px', '2020-07-27', 'Deja Payer'),
(19, 4, 632, '25392005', 2, '152px', '2020-08-04', 'Entente');

-- --------------------------------------------------------

--
-- Structure de la table `t_paiement`
--

CREATE TABLE `t_paiement` (
  `paie_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `montant` int(10) NOT NULL,
  `mode_paie` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `paie_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_paiement`
--

INSERT INTO `t_paiement` (`paie_id`, `invoice_no`, `montant`, `mode_paie`, `ref_no`, `code`, `paie_date`) VALUES
(1, 236761560, 1500, 'Paypal', 145274, 5784, '14/01/2019'),
(2, 1769537107, 963, 'Paypal', 546, 654, '14/14/2014'),
(3, 574822538, 155, 'Paypal', 785, 2895, '14/14/2016'),
(4, 623173030, 388, 'Paypal', 45874, 4584, '14/12/2019');

-- --------------------------------------------------------

--
-- Structure de la table `t_panier`
--

CREATE TABLE `t_panier` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `num` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_pending_orders`
--

CREATE TABLE `t_pending_orders` (
  `order_id` int(10) NOT NULL,
  `client_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `art_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `num` text NOT NULL,
  `order_stutus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_pending_orders`
--

INSERT INTO `t_pending_orders` (`order_id`, `client_id`, `invoice_no`, `art_id`, `qty`, `num`, `order_stutus`) VALUES
(2, 4, 1162327404, '5', 3, '550px', 'Pending'),
(3, 4, 1661260146, '5', 2, '152px', 'Pending'),
(4, 4, 236761560, '3', 3, '550px', 'Entente'),
(5, 4, 1769537107, '11', 3, '550px', 'Entente'),
(6, 4, 229930918, '5', 3, '152px', 'Entente'),
(7, 4, 229930918, '9', 1, '152px', 'Entente'),
(8, 4, 317611390, '8', 1, '550px', 'Entente'),
(9, 4, 574822538, '5', 1, '152px', 'Entente'),
(10, 4, 623173030, '10', 2, '1800px', 'Entente'),
(11, 4, 25392005, '12', 2, '152px', 'Entente');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slide`);

--
-- Index pour la table `t_admins`
--
ALTER TABLE `t_admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `t_arts`
--
ALTER TABLE `t_arts`
  ADD PRIMARY KEY (`id_Art`);

--
-- Index pour la table `t_arts_categorie`
--
ALTER TABLE `t_arts_categorie`
  ADD PRIMARY KEY (`art_cat_id`);

--
-- Index pour la table `t_box`
--
ALTER TABLE `t_box`
  ADD PRIMARY KEY (`id_box`);

--
-- Index pour la table `t_clients`
--
ALTER TABLE `t_clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Index pour la table `t_client_orders`
--
ALTER TABLE `t_client_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `t_paiement`
--
ALTER TABLE `t_paiement`
  ADD PRIMARY KEY (`paie_id`);

--
-- Index pour la table `t_panier`
--
ALTER TABLE `t_panier`
  ADD PRIMARY KEY (`p_id`);

--
-- Index pour la table `t_pending_orders`
--
ALTER TABLE `t_pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slide` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_admins`
--
ALTER TABLE `t_admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_arts`
--
ALTER TABLE `t_arts`
  MODIFY `id_Art` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `t_arts_categorie`
--
ALTER TABLE `t_arts_categorie`
  MODIFY `art_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_box`
--
ALTER TABLE `t_box`
  MODIFY `id_box` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_clients`
--
ALTER TABLE `t_clients`
  MODIFY `client_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_client_orders`
--
ALTER TABLE `t_client_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `t_paiement`
--
ALTER TABLE `t_paiement`
  MODIFY `paie_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_pending_orders`
--
ALTER TABLE `t_pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
