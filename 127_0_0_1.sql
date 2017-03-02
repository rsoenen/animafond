-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 02 Mars 2017 à 23:55
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `animafond`
--
CREATE DATABASE IF NOT EXISTS `animafond` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `animafond`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `titre` varchar(250) NOT NULL,
  `contenu` text NOT NULL,
  `dateposte` datetime NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `ipPosteur` varchar(100) NOT NULL,
  `numeroarticle` int(11) NOT NULL,
  `evenement` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `preambule` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`titre`, `contenu`, `dateposte`, `auteur`, `ipPosteur`, `numeroarticle`, `evenement`, `image`, `preambule`) VALUES
('La République du Centre du 15 septembre 2014', ' <img src=\'image/forum des associations-méritants 2014.jpg\'/>', '2014-09-18 14:23:47', 'christine', '', 13, 0, '', ''),
('La République du Centre du 16/09/2014', 'Le 13 septembre 2014, Cyril a animé une fête au relais des assistantes maternelles d’Ormes en faisant pour le plus grand plaisir des petits (et des plus grands !) des sculptures de ballons.<br/><br/><img src=\'image/rep du centre 16.09.2014.jpg\'/>', '2014-09-22 09:11:18', 'christine', '', 14, 0, '', ''),
('NOS MEDAILLES AUX UNICON', 'Du 30 juillet au 10 août 2014 ont eu lieu les 17ème UNICON (championnat du monde de monocycle) à MONTREAL. Plusieurs licenciés d’Anim à Fond (Pierre, Laurent, Marin, Cyril, Melchior et François dit Gingo) étaient inscrits dans différentes disciplines (100m, 800m, 10km, one foot, trial, freestyle...) et ils n’ont pas démérité au niveau des résultats ! Plus en     détail :<br/>    En monohockey, notre équipe a terminé 5ème de sa poule (qui comprenait 12 équipes)<br/>    En monobasket, elle a terminé 7ème de sa poule (qui en comprenait 9)<br/>   Notre relais 4 x 100m a fini 4ème de sa catégorie.<br/>    Cyril a eu une médaille de bronze en « downhill » (descente de montagne), catégorie homme 30-39 ans.<br/>    Marin a eu lui aussi une médaille de bronze en « downhill » catégorie garçon 10-14 ans et une médaille d’argent en Wheel Walk (pied sur la roue). Il est arrivé 4ème au 100m. <br/>Nous déplorons la blessure de Gingo (fracture du bras gauche), nous lui souhaitons un prompt rétablissement.<br/><br/><img src=\'image/medailles unicon.jpg\'/>', '2014-08-13 10:32:03', 'christine', '', 9, 0, '', ''),
('', 'Nous serons présents au gymnase de la Coudraye d\'Ingré pour le forum des associations ce <b>dimanche 14 septembre de 10h à 18h</b>. Venez nombreux vous renseigner, essayer notre matériel, vous inscrire!<br/><br/>\r\n<img src=\'image/forum1.jpg\'/>', '2014-09-09 17:40:11', 'christine', '', 10, 0, '', ''),
('La république du Centre du 14 septembre 2014', '<img src=\'image/La Rep - 2014_09_14.jpg\'/>', '2014-09-15 07:14:22', 'christine', '', 11, 0, '', ''),
('Les monobasketeurs juniors à l\'honneur', 'L\'équipe junior de monobasket, championne de France 2013, lors de la remise des médailles des sportifs les plus méritants de la ville d\'Ingré, le 14 septembre 2014.<br/><br/><img src=\'image/Equipe junior méritante 2013.jpg\'/>', '2014-09-17 09:16:46', 'christine', '', 12, 0, '', ''),
('Notre Assemblée Générale du 12/10/2014 ', 'Apres un repas partagé convivial, notre AG a eu lieu à 14h30, de nouveaux membres dans  le conseil d’administration ont été élus : bientôt de nouvelles photos dans le trombinoscope de "qui sommes-nous"  dans l’onglet "L’association".<br/>\r\nA 16h, nous avons pu voir le spectacle "Requiem pour un ballon" avec Cyril et Valérie RAVET et nous avons terminé par des démonstrations de nos jeunes et talentueux adhérents.\r\n<br/><br/><img src=\'image/ag2014.jpg\'/>', '2014-10-25 16:03:18', 'christine', '', 18, 0, '', ''),
('Le Départ pour la Coupe de France de Monocycle le 28/10/2014', '17 adhérents  d’Anim à fond  âgés de 7 à 50 ans vont participer à la coupe de France de Monocycle. Ils se sont inscrits, selon leurs envies à différentes épreuves  qui vont se dérouler  à Brumath du 29/10 au 02/11.\r\nParmi les épreuves : monobasket, monohockey,trial, cross, 10 km, marathon et athlétisme (100 m, saut en hauteur, saut en longueur…)\r\nPas facile de mettre la quarantaine de monocycles dans le trafic!\r\n<br/><br/><img src=\'image/cfmdepart2.jpg\'/>', '2014-10-28 16:58:34', 'christine', '', 21, 0, '', ''),
('Bonne route vers Brumath ', 'Revenez-nous avec pleins de bons souvenirs (et quelques médailles éventuellement).\r\n<br/><br/><img src=\'image/cfm voitures.jpg\'/>', '2014-10-28 17:30:49', 'christine', '', 22, 0, '', ''),
('La République du Centre du 05/11/2014', ' <img src=\'image/rep du centre 05.11.2014.jpg\'/>', '2014-11-06 09:05:03', 'christine', '', 23, 0, '', ''),
('Notre équipe junior championne de France de monobasket 2014', 'Dommage sur la photo il manque le coach Gaby<br/><br/><img src=\'image/Equipe junior championne de france 2014.jpg\'/>', '2014-11-19 14:34:05', 'christine', '', 24, 0, '', ''),
('La galette du samedi 10 janvier 2015', 'Anim\'à  Fond a partagé la galette avec ses adhérents le samedi 10 janvier, nous avons agrÃ©mentÃ© ce moment de convivialitÃ© avec des jeux en bois qui ont fait le bonheur des petits et des grands!<br/><br/><img src=\'image/Galette 2015 3.jpg\'/>', '2015-01-23 15:12:03', 'christine', '109.209.116.52', 27, 0, '', ''),
('test titre modifié', 'Ceci est mon contenu modifié', '2016-07-05 11:02:09', 'romain admin', 'mon IP', 46, 0, '', ''),
(' testtestes', '<p>testsetestestestestsetsetset</p>\r\n', '2016-12-03 12:44:02', 'admin', '127.0.0.1', 47, 0, '', ''),
(' testtestes', '<p>testsetestestestestsetsetset</p>\r\n', '2016-12-03 12:46:32', 'admin', '127.0.0.1', 54, 0, '', ''),
(' article avec image', '<p>cette fois c&#39;est la bonne, j&#39;ai mon image</p>\r\n', '2017-01-07 11:36:33', 'admin', '127.0.0.1', 59, 0, 'article59.jpg', ''),
(' premier article complet', '<p>Ceci est mon premier article complet, profitez s&#39;en.</p>\r\n', '2017-01-08 10:38:15', 'admin', '127.0.0.1', 60, 0, 'article60.jpg', 'PrÃ©ambule au premier article					');

-- --------------------------------------------------------

--
-- Structure de la table `articleevenement`
--

CREATE TABLE `articleevenement` (
  `idArticle` int(11) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `contenu` text NOT NULL,
  `dateposte` datetime NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `ipPosteur` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articleevenement`
--

INSERT INTO `articleevenement` (`idArticle`, `titre`, `contenu`, `dateposte`, `auteur`, `ipPosteur`) VALUES
(1, 'tests', 'testse', '2015-02-16 12:19:04', 'admin', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `bandeau`
--

CREATE TABLE `bandeau` (
  `textBandeau` varchar(400) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bandeau`
--

INSERT INTO `bandeau` (`textBandeau`) VALUES
('Tournoi de monobasket d\'IngrÃ©  les 7 et 8 mars 2015');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `numeroarticle` int(11) NOT NULL,
  `numerocommentaire` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `auteur` varchar(30) NOT NULL,
  `ipPosteur` varchar(100) NOT NULL,
  `dateposte` datetime NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `nbxedition` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`numeroarticle`, `numerocommentaire`, `contenu`, `auteur`, `ipPosteur`, `dateposte`, `visible`, `nbxedition`) VALUES
(9, 2, 'surtout celui de gauche !', 'invite(sylvie)', '', '2014-08-22 15:41:46', 0, 0),
(9, 1, 'Comme ils sont beaux nos médaillés!', 'christine', '', '2014-08-13 10:39:40', 0, 0),
(9, 3, 'Bravo a nos champions du mooonnde !', 'invite(guytout)', '', '2014-08-29 16:31:51', 0, 0),
(9, 4, 'bon retablissement à gingo !', 'cyril', '', '2014-09-02 15:31:35', 0, 0),
(22, 1, '16 médailles, pleins de beaux souvenirs et quelques courbatures pour certains!\r\nRendez-vous l’année prochaine à Scioncier!', 'christine', '', '2014-11-03 09:59:04', 0, 0),
(18, 1, 'testestestestes', 'admin', '127.0.0.1', '2017-01-01 15:35:04', 1, 0),
(18, 2, 'tetestestestes', 'romain', '127.0.0.1', '2017-01-01 15:35:14', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `pseudo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `datemessage` datetime NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `mail` text COLLATE utf8_unicode_ci NOT NULL,
  `objet` text COLLATE utf8_unicode_ci NOT NULL,
  `ipPosteur` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`pseudo`, `datemessage`, `contenu`, `mail`, `objet`, `ipPosteur`) VALUES
('base préados de la caillerette', '2014-12-10 14:43:47', 'Bonjour,\r\nnous sommes des enfants de la base de la Caillerette de Saran ,nous aimerions que vous veniez à la base pour que vous nous appreniez à faire des figures de diabolo.\r\nNous avons un projet de fin d\'année scolaire qui est une représentation de diabolo et cela nous permettrai de progresser.\r\nDans l\'attente d\'une réponse positive,nous vous remercions par avance.\r\n\r\n\r\n                      Les enfants de la base préados.', 'base.caillerette@ville-saran.fr', '', ''),
('TRIAU Emeric', '2014-11-19 10:20:09', 'Bonjour Cyril,\r\n\r\nJe venais vers toi car je travaille au lycée Saint Paul à Orléans et on souhaiterait organiser un arbre de Noël pour les enfants des salariés.\r\n\r\nJe voulais savoir si vous faisiez des prestations dans les entreprises (magie, clown...)\r\n\r\nSi oui, quel serait le tarif d\'une telle prestation?\r\n\r\nEn te remerciant par avance.\r\n\r\nEmeric TRIAU', 'emeric.triau@sfr.fr', '', ''),
('cyril', '2014-09-02 15:23:17', 'bonjour, j\'essaye le mail pour voir comment ca marche !', 'ravet.cyril@wanadoo.fr', '', ''),
('sylvie', '2014-09-03 17:30:59', 'Dans ANIMATIONS : un S à carnaval\r\nDans MONOCYCLE : casse-cou ? pas de majuscule à trial, freestyle en un seul mot\r\n\r\nPARTENAIRE : un S aussi, vous en avez plusieurs.\r\n\r\nC\'est l\'heure de passer à table, à bientôt !', 'zimcoumi@yahoo.fr', '', ''),
('titi', '2014-09-03 10:43:22', 'dthyhilo', 'tc.soenen@orange.fr', '', ''),
('trésorier', '2014-09-03 10:12:58', 'test again', 'thierry.soenen@fr.imtob.com', '', ''),
('christine', '2014-09-16 14:01:07', 'Coucou', 'tc.soenen@orange.fr', '', ''),
('boby', '2014-09-22 13:38:09', 'Coucou', '', '', ''),
('Maud Gailledrat', '2014-11-16 20:38:19', ' Bonjour, Je vous contacte car je fais partie de l\'association de la crèche parentale du p\'tit mouflet située à Orléans, et nous sommes actuellement à la recherche d\'une animation pour nos petits lors de notre fête de l\'hiver du 20 décembre 2014. Il me semble que vous avez déjà effectué un spectacle il y a deux ans pour la même occasion. Si vous êtes encore disponibles à cette date serait-il possible pour vous de me recontacter en me donnant vos tarifs ainsi qu\'un descriptif de ce que vous pouvez proposer à des enfants âgés de 18 mois à 7/8 ans. Cordialement Maud Gailledrat', 'leptitmouflet.presidence@gmail.com', '', ''),
('admin', '2014-12-02 14:44:28', 'ajout message', 'romain@tom.fr', 'test', ''),
('BRICOUT Claudine', '2015-01-07 08:04:01', 'Bonjour, je cherche un stage ou une initiation au jonglage pour mon petit fils qui a 10ans,qu\'avez vous à me proposer? Merci d\'avance de votre réponse.\nCordialement. C.Bricout', 'claudinebricout@orange.fr', '', '90.20.165.24'),
('Gary Mitchell', '2015-01-13 09:15:50', 'Want more clients and customers? We will help them find you by putting you on the 1st page of Google. Email us back to get a full proposal.', 'garymitchell446@gmail.com', '', '182.64.97.245'),
('testes', '2016-08-05 16:58:09', 'testests', 'tet@test.fr', 'test', '127.0.0.1'),
('testes', '2016-08-05 16:58:42', 'testests sans objet', 'tet@test.fr', '', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `date`
--

CREATE TABLE `date` (
  `evenement` varchar(250) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `date`
--

INSERT INTO `date` (`evenement`, `date`) VALUES
('conseiladmin', '12 octobre 2014');

-- --------------------------------------------------------

--
-- Structure de la table `dateconseiladministration`
--

CREATE TABLE `dateconseiladministration` (
  `evenement` varchar(250) NOT NULL,
  `dateConseil` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `dateconseiladministration`
--

INSERT INTO `dateconseiladministration` (`evenement`, `dateConseil`) VALUES
('conseiladmin', '2017-02-06');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `NomEvenement` varchar(200) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`NomEvenement`, `visible`) VALUES
('Test evenement 2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE `galerie` (
  `evenement` varchar(250) NOT NULL,
  `createurGalerie` varchar(250) NOT NULL,
  `dateCreation` datetime NOT NULL,
  `numeroEvenement` int(11) NOT NULL,
  `nomDossier` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `galerie`
--

INSERT INTO `galerie` (`evenement`, `createurGalerie`, `dateCreation`, `numeroEvenement`, `nomDossier`) VALUES
('2011-03-10 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-08-18 17:30:30', 2, 'evenement2'),
('2011-06-24 - Spectacle Ecole de musique d\'Ingré', 'trésorier', '2014-08-18 17:31:29', 3, 'evenement3'),
('2011-09-24 - Siège Banque Populaire en fête à Tours', 'trésorier', '2014-08-18 17:32:23', 4, 'evenement4'),
('2011-10-29 - Coupe de France de Monocycle à Doles', 'trésorier', '2014-08-18 17:32:53', 5, 'evenement5'),
('2012-01-07 - Atelier maquillage', 'trésorier', '2014-08-18 17:33:23', 6, 'evenement6'),
('2012-03-10 - Mi-temps match Orléans Basket', 'trésorier', '2014-08-18 17:33:53', 7, 'evenement7'),
('2012-03-24 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-08-18 17:34:30', 8, 'evenement8'),
('2012-04-22 - Rencontre amicale avec Clermont-Ferrand', 'trésorier', '2014-08-18 17:35:17', 9, 'evenement9'),
('2012-06-03 - Vélotours Orléans', 'trésorier', '2014-08-18 17:35:44', 10, 'evenement10'),
('2012-06-30 - Spectacle de fin d\'année', 'trésorier', '2014-08-18 17:36:09', 11, 'evenement11'),
('2012-07-25 - Championnats du monde de monocycle en Italie', 'trésorier', '2014-08-18 17:36:41', 12, 'evenement12'),
('2012-08-26 - Fête le pont à Olivet', 'trésorier', '2014-08-18 17:37:06', 13, 'evenement13'),
('2012-11-01 - Coupe de France de monocycle à Soultzmatt', 'trésorier', '2014-08-18 17:38:20', 14, 'evenement14'),
('2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-18 17:39:03', 15, 'evenement15'),
('2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:13:21', 16, 'evenement16');

-- --------------------------------------------------------

--
-- Structure de la table `imagearticle`
--

CREATE TABLE `imagearticle` (
  `nomimage` varchar(250) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `dateposte` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `imagearticle`
--

INSERT INTO `imagearticle` (`nomimage`, `auteur`, `dateposte`) VALUES
('forum.jpg', 'christine', '2014-09-09 17:45:05'),
('forum des associations.jpg', 'christine', '2014-09-09 17:46:23'),
('unicon.jpg', 'Trésorier', '2014-08-14 13:52:41'),
('TEST.jpg', 'admin', '2014-09-09 18:48:07'),
('forum1.jpg', 'christine', '2014-09-09 18:51:16'),
('.jpg', 'trésorier', '2014-09-11 19:06:57'),
('medailles unicon.jpg', 'trésorier', '2014-09-14 06:20:36'),
('la rép 2014-09-14.jpg', 'christine', '2014-09-15 07:14:06'),
('La Rep - 2014_09_14.jpg', 'trésorier', '2014-09-15 07:55:25'),
('Equipe junior méritante 2013.jpg', 'christine', '2014-09-17 09:16:09'),
('forum des associations-méritants 2014.jpg', 'christine', '2014-09-18 14:23:12'),
('rep du centre 16.09.2014.jpg', 'christine', '2014-09-22 09:10:50'),
('testetstest.jpg', 'admin', '2014-10-06 13:05:17'),
('tetsetgdf.JPG', 'admin', '2014-10-22 20:43:56'),
('AG.JPG', 'christine', '2014-10-25 15:13:38'),
('2014 AG.jpg', 'christine', '2014-10-25 15:52:40'),
('tetetet.jpg', 'admin', '2014-10-25 16:00:36'),
('ag nbinini.jpg', 'admin', '2014-10-25 16:01:12'),
('2014ag.jpg', 'christine', '2014-10-25 16:02:58'),
('ag2014.jpg', 'christine', '2014-10-25 16:06:19'),
('départ.jpg', 'christine', '2014-10-28 16:58:12'),
('depart 2.jpg', 'christine', '2014-10-28 17:03:20'),
('cfmdepart2.jpg', 'christine', '2014-10-28 17:03:49'),
('cfm voitures.jpg', 'christine', '2014-10-28 17:30:23'),
('rep du centre 05.11.2014.jpg', 'christine', '2014-11-06 09:04:46'),
('Equipe junior championne de france 2014.jpg', 'christine', '2014-11-19 14:33:44'),
('testetset.jpg', 'admin', '2014-11-22 14:06:42'),
('Galette 2015.jpg', 'christine', '2015-01-23 15:11:15'),
('Galette 2015.2.jpg', 'christine', '2015-01-23 15:14:22'),
('Galette 2015 3.jpg', 'christine', '2015-01-23 15:16:43');

-- --------------------------------------------------------

--
-- Structure de la table `membreconseil`
--

CREATE TABLE `membreconseil` (
  `role` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `position` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membreconseil`
--

INSERT INTO `membreconseil` (`role`, `prenom`, `nom`, `position`, `image`) VALUES
('president', 'romain', 'soenen', 1, 'soenenromain.png'),
('web designer', 'florian', 'soenen', 5, ''),
('testeur', 'papa', 'soenen', 3, 'soenenpapa.png'),
('inconnu', 'maman', 'soenen', 4, '');

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `nom` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL,
  `lien` text NOT NULL,
  `statut` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `partenaire`
--

INSERT INTO `partenaire` (`nom`, `image`, `lien`, `statut`) VALUES
('Ville d\'Ingr&eacute;', 'Ville d\'Ingre.jpg', 'http://www.ingre.fr/', 'officiel'),
('Conseil G&eacute;n&eacute;ral du Loiret', 'ConseilGeneralduLoiret.png', 'http://www.loiret.fr/', 'officiel'),
('Minist&egrave;re de la Jeunesse et des Sports', 'Ministere de la Jeunesse et des Sports.jpg', 'http://www.sports.gouv.fr/', 'officiel'),
('CDK - Monocyles', 'CDK - Monocyles.png', 'http://www.cdk.fr/monocycle-105/', 'materiel'),
('Olie\'s Dart - Jonglerie et Monocycles', 'Olie\'s Dart - Jonglerie et Monocycles.jpg', 'http://www.loloche.fr', 'materiel'),
('F&eacute;d&eacute;ration L&eacute;o Lagrange', 'Federation Leo Lagrange.jpg', 'http://www.leolagrange.org/', 'sportif');

-- --------------------------------------------------------

--
-- Structure de la table `photogalerie`
--

CREATE TABLE `photogalerie` (
  `nomPhoto` varchar(250) NOT NULL,
  `evenement` varchar(250) NOT NULL,
  `auteur` varchar(250) NOT NULL,
  `datePoste` datetime NOT NULL,
  `numeroPhoto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `photogalerie`
--

INSERT INTO `photogalerie` (`nomPhoto`, `evenement`, `auteur`, `datePoste`, `numeroPhoto`) VALUES
('photo2.JPG', '2012-08-26 - Fête le pont à Olivet', 'trésorier', '2014-08-19 19:51:50', 2),
('photo3.JPG', '2012-08-26 - Fête le pont à Olivet', 'trésorier', '2014-08-19 19:51:59', 3),
('photo4.JPG', '2012-08-26 - Fête le pont à Olivet', 'trésorier', '2014-08-19 19:52:09', 4),
('photo5.JPG', '2012-08-26 - Fête le pont à Olivet', 'trésorier', '2014-08-19 19:52:18', 5),
('photo6.JPG', '2012-08-26 - Fête le pont à Olivet', 'trésorier', '2014-08-19 19:52:26', 6),
('photo7.JPG', '2012-08-26 - Fête le pont à Olivet', 'trésorier', '2014-08-19 19:52:36', 7),
('photo9.JPG', '2012-07-25 - Championnats du monde de monocycle en Italie', 'trésorier', '2014-08-19 19:54:41', 9),
('photo7.JPG', '2012-11-01 - Coupe de France de monocycle à Soultzmatt', 'trésorier', '2014-08-19 19:50:47', 7),
('photo8.JPG', '2012-11-01 - Coupe de France de monocycle à Soultzmatt', 'trésorier', '2014-08-19 19:50:56', 8),
('photo17.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 20:00:46', 17),
('photo16.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 20:00:37', 16),
('photo15.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 20:00:30', 15),
('photo14.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 20:00:24', 14),
('photo13.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 20:00:15', 13),
('photo12.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 20:00:05', 12),
('photo11.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 19:59:51', 11),
('photo10.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 19:59:44', 10),
('photo9.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 19:59:37', 9),
('photo8.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 19:59:29', 8),
('photo7.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 19:59:20', 7),
('photo6.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 19:59:05', 6),
('photo5.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 19:58:57', 5),
('photo4.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 19:58:49', 4),
('photo3.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 19:58:42', 3),
('photo2.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 19:58:36', 2),
('photo1.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 19:58:28', 1),
('photo2.JPG', '2012-04-22 - Rencontre amicale avec Clermont-Ferrand', 'trésorier', '2014-08-19 19:56:37', 2),
('photo6.JPG', '2012-06-03 - Vélotours Orléans', 'trésorier', '2014-08-19 19:56:01', 6),
('photo6.JPG', '2012-11-01 - Coupe de France de monocycle à Soultzmatt', 'trésorier', '2014-08-19 19:50:32', 6),
('photo8.JPG', '2012-07-25 - Championnats du monde de monocycle en Italie', 'trésorier', '2014-08-19 19:54:31', 8),
('photo7.JPG', '2012-07-25 - Championnats du monde de monocycle en Italie', 'trésorier', '2014-08-19 19:54:20', 7),
('photo6.JPG', '2012-07-25 - Championnats du monde de monocycle en Italie', 'trésorier', '2014-08-19 19:54:06', 6),
('photo5.JPG', '2012-07-25 - Championnats du monde de monocycle en Italie', 'trésorier', '2014-08-19 19:53:56', 5),
('photo4.JPG', '2012-07-25 - Championnats du monde de monocycle en Italie', 'trésorier', '2014-08-19 19:53:48', 4),
('photo1.JPG', '2012-07-25 - Championnats du monde de monocycle en Italie', 'trésorier', '2014-08-19 19:53:25', 1),
('photo2.JPG', '2012-07-25 - Championnats du monde de monocycle en Italie', 'trésorier', '2014-08-19 19:53:32', 2),
('photo3.JPG', '2012-07-25 - Championnats du monde de monocycle en Italie', 'trésorier', '2014-08-19 19:53:39', 3),
('photo6.JPG', '2012-03-10 - Mi-temps match Orléans Basket', 'trésorier', '2014-08-19 16:35:47', 6),
('photo5.JPG', '2012-03-10 - Mi-temps match Orléans Basket', 'trésorier', '2014-08-19 16:33:42', 5),
('photo5.JPG', '2012-11-01 - Coupe de France de monocycle à Soultzmatt', 'trésorier', '2014-08-19 19:50:22', 5),
('photo4.JPG', '2012-11-01 - Coupe de France de monocycle à Soultzmatt', 'trésorier', '2014-08-19 19:50:13', 4),
('photo3.JPG', '2012-11-01 - Coupe de France de monocycle à Soultzmatt', 'trésorier', '2014-08-19 19:50:05', 3),
('photo2.JPG', '2012-11-01 - Coupe de France de monocycle à Soultzmatt', 'trésorier', '2014-08-19 19:49:57', 2),
('photo1.JPG', '2012-11-01 - Coupe de France de monocycle à Soultzmatt', 'trésorier', '2014-08-19 19:48:07', 1),
('photo1.JPG', '2012-08-26 - Fête le pont à Olivet', 'trésorier', '2014-08-19 19:51:43', 1),
('photo5.JPG', '2012-06-03 - Vélotours Orléans', 'trésorier', '2014-08-19 19:55:54', 5),
('photo3.JPG', '2012-03-10 - Mi-temps match Orléans Basket', 'trésorier', '2014-08-19 16:33:19', 3),
('photo2.JPG', '2012-03-10 - Mi-temps match Orléans Basket', 'trésorier', '2014-08-19 16:33:10', 2),
('photo4.JPG', '2012-06-03 - Vélotours Orléans', 'trésorier', '2014-08-19 19:55:44', 4),
('photo3.JPG', '2012-06-03 - Vélotours Orléans', 'trésorier', '2014-08-19 19:55:33', 3),
('photo1.JPG', '2012-06-03 - Vélotours Orléans', 'trésorier', '2014-08-19 19:55:16', 1),
('photo2.JPG', '2012-06-03 - Vélotours Orléans', 'trésorier', '2014-08-19 19:55:24', 2),
('photo10.JPG', '2012-07-25 - Championnats du monde de monocycle en Italie', 'trésorier', '2014-08-19 19:54:49', 10),
('photo1.JPG', '2012-03-10 - Mi-temps match Orléans Basket', 'trésorier', '2014-08-19 16:32:58', 1),
('photo1.JPG', '2012-04-22 - Rencontre amicale avec Clermont-Ferrand', 'trésorier', '2014-08-19 19:56:28', 1),
('photo3.JPG', '2012-04-22 - Rencontre amicale avec Clermont-Ferrand', 'trésorier', '2014-08-19 19:56:45', 3),
('photo4.JPG', '2012-04-22 - Rencontre amicale avec Clermont-Ferrand', 'trésorier', '2014-08-19 19:56:53', 4),
('photo18.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 20:00:59', 18),
('photo19.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 20:01:06', 19),
('photo20.JPG', '2012-11-17 - Les 15 ans d\'Anim\'à Fond', 'trésorier', '2014-08-19 20:01:19', 20),
('photo1.jpg', '2012-01-07 - Atelier maquillage', 'trésorier', '2014-08-20 06:46:31', 1),
('photo2.jpg', '2012-01-07 - Atelier maquillage', 'trésorier', '2014-08-20 06:46:39', 2),
('photo3.jpg', '2012-01-07 - Atelier maquillage', 'trésorier', '2014-08-20 06:46:46', 3),
('photo4.jpg', '2012-01-07 - Atelier maquillage', 'trésorier', '2014-08-20 06:46:54', 4),
('photo5.jpg', '2012-01-07 - Atelier maquillage', 'trésorier', '2014-08-20 06:47:08', 5),
('photo6.jpg', '2012-01-07 - Atelier maquillage', 'trésorier', '2014-08-20 06:47:31', 6),
('photo7.jpg', '2012-01-07 - Atelier maquillage', 'trésorier', '2014-08-20 06:47:39', 7),
('photo8.jpg', '2012-01-07 - Atelier maquillage', 'trésorier', '2014-08-20 06:47:47', 8),
('photo1.JPG', '2011-10-29 - Coupe de France de Monocycle à Doles', 'trésorier', '2014-08-20 07:03:18', 1),
('photo2.JPG', '2011-10-29 - Coupe de France de Monocycle à Doles', 'trésorier', '2014-08-20 07:03:29', 2),
('photo3.JPG', '2011-10-29 - Coupe de France de Monocycle à Doles', 'trésorier', '2014-08-20 07:03:35', 3),
('photo4.JPG', '2011-10-29 - Coupe de France de Monocycle à Doles', 'trésorier', '2014-08-20 07:03:41', 4),
('photo5.JPG', '2011-10-29 - Coupe de France de Monocycle à Doles', 'trésorier', '2014-08-20 07:03:53', 5),
('photo6.JPG', '2011-10-29 - Coupe de France de Monocycle à Doles', 'trésorier', '2014-08-20 07:04:02', 6),
('photo7.JPG', '2011-10-29 - Coupe de France de Monocycle à Doles', 'trésorier', '2014-08-20 07:04:08', 7),
('photo8.JPG', '2011-10-29 - Coupe de France de Monocycle à Doles', 'trésorier', '2014-08-20 07:04:24', 8),
('photo9.jpg', '2011-10-29 - Coupe de France de Monocycle à Doles', 'trésorier', '2014-08-20 07:04:34', 9),
('photo10.JPG', '2011-10-29 - Coupe de France de Monocycle à Doles', 'trésorier', '2014-08-20 07:04:49', 10),
('photo11.JPG', '2011-10-29 - Coupe de France de Monocycle à Doles', 'trésorier', '2014-08-20 07:04:58', 11),
('photo12.JPG', '2011-10-29 - Coupe de France de Monocycle à Doles', 'trésorier', '2014-08-20 07:05:08', 12),
('photo13.JPG', '2011-10-29 - Coupe de France de Monocycle à Doles', 'trésorier', '2014-08-20 07:05:14', 13),
('photo1.JPG', '2011-09-24 - Siège Banque Populaire en fête à Tours', 'trésorier', '2014-08-20 07:13:03', 1),
('photo2.JPG', '2011-09-24 - Siège Banque Populaire en fête à Tours', 'trésorier', '2014-08-20 07:13:09', 2),
('photo3.JPG', '2011-09-24 - Siège Banque Populaire en fête à Tours', 'trésorier', '2014-08-20 07:13:20', 3),
('photo4.JPG', '2011-09-24 - Siège Banque Populaire en fête à Tours', 'trésorier', '2014-08-20 07:13:26', 4),
('photo5.JPG', '2011-09-24 - Siège Banque Populaire en fête à Tours', 'trésorier', '2014-08-20 07:13:33', 5),
('photo6.JPG', '2011-09-24 - Siège Banque Populaire en fête à Tours', 'trésorier', '2014-08-20 07:13:40', 6),
('photo7.JPG', '2011-09-24 - Siège Banque Populaire en fête à Tours', 'trésorier', '2014-08-20 07:13:46', 7),
('photo8.JPG', '2011-09-24 - Siège Banque Populaire en fête à Tours', 'trésorier', '2014-08-20 07:14:01', 8),
('photo9.JPG', '2011-09-24 - Siège Banque Populaire en fête à Tours', 'trésorier', '2014-08-20 07:14:09', 9),
('photo10.JPG', '2011-09-24 - Siège Banque Populaire en fête à Tours', 'trésorier', '2014-08-20 07:14:15', 10),
('photo11.JPG', '2011-09-24 - Siège Banque Populaire en fête à Tours', 'trésorier', '2014-08-20 07:14:21', 11),
('photo1.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:13:53', 1),
('photo2.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:14:08', 2),
('photo3.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:14:18', 3),
('photo4.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:14:24', 4),
('photo5.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:14:35', 5),
('photo6.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:14:41', 6),
('photo7.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:14:48', 7),
('photo8.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:15:04', 8),
('photo9.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:15:20', 9),
('photo10.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:15:31', 10),
('photo11.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:15:42', 11),
('photo12.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:15:54', 12),
('photo13.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:16:03', 13),
('photo14.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:16:11', 14),
('photo15.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:16:23', 15),
('photo16.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:16:43', 16),
('photo17.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:16:54', 17),
('photo18.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:17:10', 18),
('photo19.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:17:21', 19),
('photo20.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:17:34', 20),
('photo21.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:17:46', 21),
('photo22.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:18:00', 22),
('photo23.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:18:10', 23),
('photo24.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:18:20', 24),
('photo25.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:18:31', 25),
('photo26.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:18:40', 26),
('photo27.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:18:50', 27),
('photo28.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:19:06', 28),
('photo29.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:19:19', 29),
('photo30.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:19:46', 30),
('photo31.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:19:59', 31),
('photo32.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:20:09', 32),
('photo33.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:20:19', 33),
('photo34.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:20:37', 34),
('photo35.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:20:51', 35),
('photo36.JPG', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:21:00', 36),
('photo37.jpg', '2013_03_23 - Tournoi de monobasket d\'Ingré', 'trésorier', '2014-10-05 19:21:09', 37),
('photo1.jpg', '2012-11-01 - Coupe de France de monocycle ï¿½ Soultzmatt', 'admin', '2017-03-01 23:59:54', 1);

-- --------------------------------------------------------

--
-- Structure de la table `quisommesnous`
--

CREATE TABLE `quisommesnous` (
  `Role` varchar(50) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Position` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `quisommesnous`
--

INSERT INTO `quisommesnous` (`Role`, `Prenom`, `Nom`, `Position`, `image`) VALUES
('Représentant des adhérents', 'Antoine', 'RONDEAU', 10, 'RONDEAUAntoine.jpg'),
('Trésorier', 'Thierry', 'SOENEN', 3, 'SOENENThierry.jpg'),
('Président', 'Cyril', 'RAVET', 1, 'RAVETCyril.jpg'),
('Responsable communication interne', 'Christine', 'SOENEN', 5, 'SOENENChristine.jpg'),
('Représentant des adhérents', 'Valentin', 'MILLET NAAS ', 10, ''),
('Représentante des parents', 'Carole', 'BRANDELLON', 8, 'BRANDELLONCarole.jpg'),
('Représentante des parents', 'Sylvie', 'COUTURIER', 9, 'COUTURIERSylvie.jpg'),
('Responsable Monocycle Sportif', 'Gabriel', 'POMPA VALDEZ', 7, 'POMPA VALDEZGabriel.jpg'),
('Secrétaire', 'Pierre', 'BERGER', 2, 'BERGERPierre.jpg'),
('Responsable Cirque', 'Barnabé', 'MOLVEAU', 6, 'MOLVEAUBarnabé.jpg'),
('Vice-secrétaire', 'Julie', 'RUMEAU', 4, 'RUMEAUJulie.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `rang`
--

CREATE TABLE `rang` (
  `nomRang` varchar(20) NOT NULL,
  `gererEvenement` tinyint(1) NOT NULL,
  `gererCommentaire` tinyint(1) NOT NULL,
  `gererArticle` tinyint(1) NOT NULL,
  `gererPageDiverse` tinyint(1) NOT NULL,
  `gererTrocAFond` tinyint(1) NOT NULL,
  `gererRang` tinyint(1) NOT NULL,
  `gererBandeau` tinyint(1) NOT NULL,
  `gererGalerie` tinyint(1) NOT NULL,
  `gererPointAnimation` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rang`
--

INSERT INTO `rang` (`nomRang`, `gererEvenement`, `gererCommentaire`, `gererArticle`, `gererPageDiverse`, `gererTrocAFond`, `gererRang`, `gererBandeau`, `gererGalerie`, `gererPointAnimation`) VALUES
('admin', 1, 1, 1, 1, 1, 1, 1, 1, 1),
('membre', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('moderateur', 1, 1, 1, 1, 0, 0, 0, 0, 0),
('Adherent', 1, 0, 0, 0, 0, 0, 0, 0, 0),
('test', 1, 0, 0, 0, 1, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `trocafond`
--

CREATE TABLE `trocafond` (
  `numerooffre` int(11) NOT NULL,
  `objet` varchar(250) NOT NULL,
  `prix` varchar(250) NOT NULL,
  `dateoffre` datetime NOT NULL,
  `telephone` char(10) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `vendeur` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `pseudo` varchar(30) NOT NULL,
  `mdp` text NOT NULL,
  `homme` tinyint(1) NOT NULL,
  `rang` varchar(20) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `generate_cle` text NOT NULL,
  `derniereconnexion` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`pseudo`, `mdp`, `homme`, `rang`, `mail`, `generate_cle`, `derniereconnexion`) VALUES
('admin', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 1, 'admin', 'roi-de-piqueur@hotmail.fr', '', '2017-03-02 18:53:27'),
('Trésorier', '5f06cc7427afb260ef253f584243e6a38ff5ef6e', 1, 'admin', 'tc.soenen@orange.fr', '', '2015-02-01 16:13:48'),
('christine', '70e8b6e13c18e8800ef6b67166d0409e66ab58a9', 0, 'admin', 'tc.soenen@orange.fr', '', '2015-02-01 16:10:15'),
('Guytout', '7caea79ef7e6565c8fe6c7c0a5c7173afc168d46', 1, 'Adhérent', 'guytout45@hotmail.com', '', '2014-09-01 11:40:09'),
('amandine', '4db3de16a026e9f706b70e32e178d7a90654598c', 0, 'Adhérent', 'amandine.soenen@orange.fr', '', '2015-01-12 12:08:26'),
('cyril', '5f06cc7427afb260ef253f584243e6a38ff5ef6e', 1, 'admin', 'ravet.cyril@wanadoo.fr', '', '2015-01-11 19:03:51'),
('Gabychou', 'e585da1666b629a0d90da50b5dc644ffc2c52653', 1, 'Adhérent', 'gabrielpompavaldez@yahoo.fr', '', '2014-09-03 08:24:02'),
('Sylvie', '6d1885052c786c9ecb4c4cc212af70e8ce2d37d4', 0, 'modérateur', 'zimcoumi@yahoo.fr', '', '2015-02-03 09:43:09'),
('Antoine', '6631a433dbfb20f40b6ead4e1732aae8d62b8350', 1, 'Adhérent', 'antoine-asm45@hotmail.fr', '', '2014-09-16 06:18:18'),
('melchior', '80afc814b6aec14b6d762806f036b2b0125189ed', 1, 'Adhérent', 'melchiortrela@gmail.com', '', '2015-01-24 18:57:56'),
('sacajawa', 'e1c25502066b94b51a9ba5ecb1bb02d076e5a753', 0, 'Adhérent', 'carolebrandelon@comartis.fr', '', '2014-11-03 07:55:03'),
('valentin', '0bd87793cca17a646f3b052f3d585c2bc116d01a', 1, 'Adhérent', 'yoga90@hotmail.com', '', '2015-01-18 13:59:38'),
('Antoine#00', '6631a433dbfb20f40b6ead4e1732aae8d62b8350', 1, 'Adhérent', 'antoine.rondeau@wanadoo.fr', '', '2015-01-11 17:03:29'),
('Julie', 'd3177e81518326076e3d5b9491424ccc72a609b3', 0, 'Adhérent', 'julierumeau@orange.fr', '', '2015-01-12 06:05:41'),
('Pierre', '41ba51feb87d5ebb48acb93b139e7b4af5f53c20', 1, 'Adhérent', 'pierre_berger@jabil.com', '', '2015-01-14 14:14:57');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`numeroarticle`);

--
-- Index pour la table `articleevenement`
--
ALTER TABLE `articleevenement`
  ADD PRIMARY KEY (`idArticle`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`numeroarticle`,`numerocommentaire`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`pseudo`,`datemessage`);

--
-- Index pour la table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`evenement`);

--
-- Index pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`evenement`,`numeroEvenement`);

--
-- Index pour la table `imagearticle`
--
ALTER TABLE `imagearticle`
  ADD PRIMARY KEY (`nomimage`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `photogalerie`
--
ALTER TABLE `photogalerie`
  ADD PRIMARY KEY (`evenement`,`numeroPhoto`);

--
-- Index pour la table `quisommesnous`
--
ALTER TABLE `quisommesnous`
  ADD PRIMARY KEY (`Prenom`,`Nom`);

--
-- Index pour la table `rang`
--
ALTER TABLE `rang`
  ADD PRIMARY KEY (`nomRang`);

--
-- Index pour la table `trocafond`
--
ALTER TABLE `trocafond`
  ADD PRIMARY KEY (`numerooffre`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`pseudo`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `numeroarticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT pour la table `articleevenement`
--
ALTER TABLE `articleevenement`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
