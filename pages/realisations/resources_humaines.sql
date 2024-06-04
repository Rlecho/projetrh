-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 03 mars 2024 à 22:23
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
-- Base de données : `resources_humaines`
--

-- --------------------------------------------------------

--
-- Structure de la table `annoncement`
--

CREATE TABLE `annoncement` (
  `idannonce` int(11) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annoncement`
--

INSERT INTO `annoncement` (`idannonce`, `titre`, `description`) VALUES
(8, 'Presentation de projet IOT', '<p>une r&eacute;union a &eacute;t&eacute; programmer pour discuter sur le prochaine projet de l\'entreprise</p>'),
(9, 'cvb', 'bbbbbbbbb');

-- --------------------------------------------------------

--
-- Structure de la table `annonce_employes`
--

CREATE TABLE `annonce_employes` (
  `idannonce` int(11) UNSIGNED NOT NULL,
  `idemploye` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `banque_info`
--

CREATE TABLE `banque_info` (
  `id` int(11) NOT NULL,
  `idemp` int(11) UNSIGNED NOT NULL,
  `nom_banque` varchar(255) DEFAULT NULL,
  `nom_branche` varchar(255) DEFAULT NULL,
  `nom_compte` varchar(255) DEFAULT NULL,
  `numero_compte` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `banque_info`
--

INSERT INTO `banque_info` (`id`, `idemp`, `nom_banque`, `nom_branche`, `nom_compte`, `numero_compte`) VALUES
(2, 69, 'vb', 'gh', 'ml', '74741'),
(3, 75, 'UBA', 'SDFGH', 'CFGBHN?', '789654');

-- --------------------------------------------------------

--
-- Structure de la table `candidats`
--

CREATE TABLE `candidats` (
  `idcand` int(11) NOT NULL,
  `prenom` varchar(39) NOT NULL,
  `nom` varchar(39) NOT NULL,
  `dateNaissance` date NOT NULL,
  `genre` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telephone` int(40) NOT NULL,
  `poste` varchar(70) NOT NULL,
  `niveau` varchar(40) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `lettre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `candidats`
--

INSERT INTO `candidats` (`idcand`, `prenom`, `nom`, `dateNaissance`, `genre`, `email`, `telephone`, `poste`, `niveau`, `cv`, `lettre`) VALUES
(21, 'nada', 'barir', '2003-03-13', 'Femme', 'nadabarir3@gmail.com', 667268568, 'mobile developer', 'bac+5', 'lab2(DT).pdf', 'projet DNS (3).pdf'),
(22, 'nada', 'barir', '1998-03-13', 'Femme', 'nadabarir1@gmail.com', 67865467, 'DEVELOPPEUR', 'bac+5', 'cvnada.pdf', 'lettrenada.pdf'),
(23, 'nada', 'barir', '1999-03-13', 'Femme', 'nada.barir@etu.uae.ac.ma', 657268627, 'developpeur', 'bac+5', 'cvnada.pdf', 'lettrenada.pdf'),
(24, 'Serge', 'ELECHO', '2003-05-03', 'Homme', 'elechoserge@gmail.com', 98964647, 'Prof', 'Bac+5', 'Mémoire .pdf', 'Les_Strat_gies_des_Ressources_Humaines.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date_acquisition` date DEFAULT NULL,
  `niveau_maitrise` enum('Débutant','Intermédiaire','Avancé','Expert') DEFAULT NULL,
  `duree_apprentissage` int(11) DEFAULT NULL,
  `domaine` varchar(100) DEFAULT NULL,
  `idemp` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

CREATE TABLE `conges` (
  `idconge` int(11) NOT NULL,
  `datecreation` date NOT NULL,
  `periode` int(11) NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `typeconge` varchar(100) NOT NULL,
  `motif` text NOT NULL,
  `nom` varchar(100) NOT NULL,
  `idemp` int(10) UNSIGNED NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `conges`
--

INSERT INTO `conges` (`idconge`, `datecreation`, `periode`, `datedebut`, `datefin`, `typeconge`, `motif`, `nom`, `idemp`, `nombre`) VALUES
(30, '2024-02-23', 8, '2024-02-29', '2024-03-08', 'Arrêt Maladie', 'Non rien', 'akoba', 69, 0);

-- --------------------------------------------------------

--
-- Structure de la table `congesdemandes`
--

CREATE TABLE `congesdemandes` (
  `idconge` int(11) UNSIGNED NOT NULL,
  `datecreation` date NOT NULL,
  `periode` int(50) NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `typeconge` varchar(100) NOT NULL,
  `motif` text NOT NULL,
  `nom` varchar(39) NOT NULL,
  `idemp` int(11) UNSIGNED NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `congesdemandes`
--

INSERT INTO `congesdemandes` (`idconge`, `datecreation`, `periode`, `datedebut`, `datefin`, `typeconge`, `motif`, `nom`, `idemp`, `nombre`) VALUES
(48, '2024-02-29', 5, '2024-03-01', '2024-03-06', 'Congé', 'DFGH', 'Serge ELECHO', 75, 0),
(49, '2024-02-29', -19783, '2024-03-01', '0000-00-00', 'Mission professionnelle', 'FGHJK', 'Serge ELECHO', 75, 0);

-- --------------------------------------------------------

--
-- Structure de la table `coordonnees`
--

CREATE TABLE `coordonnees` (
  `id` int(11) NOT NULL,
  `idemp` int(11) UNSIGNED NOT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `quartier` varchar(255) DEFAULT NULL,
  `facebook_nom` varchar(255) DEFAULT NULL,
  `facebook_lien` varchar(255) DEFAULT NULL,
  `twitter_nom` varchar(255) DEFAULT NULL,
  `twitter_lien` varchar(255) DEFAULT NULL,
  `linkedin_nom` varchar(255) DEFAULT NULL,
  `linkedin_lien` varchar(255) DEFAULT NULL,
  `instagram_nom` varchar(255) DEFAULT NULL,
  `instagram_lien` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `coordonnees`
--

INSERT INTO `coordonnees` (`id`, `idemp`, `pays`, `ville`, `quartier`, `facebook_nom`, `facebook_lien`, `twitter_nom`, `twitter_lien`, `linkedin_nom`, `linkedin_lien`, `instagram_nom`, `instagram_lien`) VALUES
(1, 69, 'Benin', 'Cotonou', 'Fidjrosse', 'Serge', 'www.facebook.serge.com', 'dfghjklkjhg', 'wxcvbn,kiugf', 'Sergeo', 'www.Linkedin.serge.com', 'azertyuiok,n ', 'defghjkiuygf');

-- --------------------------------------------------------

--
-- Structure de la table `defi`
--

CREATE TABLE `defi` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description_detaillee` text DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `niveau_difficulte` enum('Facile','Moyen','Difficile') DEFAULT NULL,
  `strategie_approche` text DEFAULT NULL,
  `collaborateurs_impliques` varchar(255) DEFAULT NULL,
  `lecons_apprises` text DEFAULT NULL,
  `idemp` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id_departement` int(11) NOT NULL,
  `nom_departement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id_departement`, `nom_departement`) VALUES
(9, 'IFRI'),
(10, 'FLAAC');

-- --------------------------------------------------------

--
-- Structure de la table `details_perso`
--

CREATE TABLE `details_perso` (
  `id` int(11) NOT NULL,
  `num_cip` varchar(255) DEFAULT NULL,
  `num_ifu` varchar(255) DEFAULT NULL,
  `lieu_naissance` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `situation_familiale` varchar(255) DEFAULT NULL,
  `nationalite` varchar(255) DEFAULT NULL,
  `id_employes` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `details_perso`
--

INSERT INTO `details_perso` (`id`, `num_cip`, `num_ifu`, `lieu_naissance`, `genre`, `situation_familiale`, `nationalite`, `id_employes`) VALUES
(1, '123456789', '987654321011', 'Parakou', 'Homme', 'Célibataire', 'Béninois', 75),
(2, '14125', '1365', 'Node', 'Homme', 'Concubin(e)', 'Togolais', 76);

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

CREATE TABLE `diplome` (
  `id` int(11) NOT NULL,
  `idemp` int(11) UNSIGNED NOT NULL,
  `diplome_obtenu` varchar(255) DEFAULT NULL,
  `etablissement` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `niveau` varchar(255) DEFAULT NULL,
  `plus_eleve` enum('oui','non') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `diplome`
--

INSERT INTO `diplome` (`id`, `idemp`, `diplome_obtenu`, `etablissement`, `ville`, `annee`, `niveau`, `plus_eleve`) VALUES
(1, 69, 'Atestation de Bac', 'Kilze', 'Kilibo', 2020, 'Bac+6', 'oui'),
(2, 69, 'nn', 'bb', 'ooo', 2001, 'ddd', 'non'),
(3, 75, 'Licence', 'UAC', 'Calavi', 2024, 'Bac+3', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `filed` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `cover_image_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `idemp` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`id`, `filed`, `file_name`, `file_size`, `file_type`, `cover_image_path`, `uploaded_at`, `idemp`) VALUES
(36, '65cd44c2ed54c4.60704775.pdf', '65cd4a67be3164.61845822.pdf', 3234919, 'application/pdf', 'icons/pdf-icon.png', '2024-02-14 23:19:03', 75),
(37, 'download.jpg', '65cd4a76a98aa1.29687703.jpg', 6862, 'image/jpeg', 'uploads/65cd4a76a98aa1.29687703.jpg', '2024-02-14 23:19:18', 75),
(38, 'LILU_SMIS_2021_064.pdf', '65cd4a7fd492b2.13795581.pdf', 1691235, 'application/pdf', 'icons/pdf-icon.png', '2024-02-14 23:19:27', 75),
(39, 'Les_Strat_gies_des_Ressources_Humaines.pdf', '65cd4a8a44ca20.94791798.pdf', 881749, 'application/pdf', 'icons/pdf-icon.png', '2024-02-14 23:19:38', 75),
(40, '625310148-J-apprends-Le-Piano-Tout-Simplement-Full.pdf', '65e2520c0af082.66227532.pdf', 2560197, 'application/pdf', 'icons/pdf-icon.png', '2024-03-01 22:09:16', 75);

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `idemp` int(11) UNSIGNED NOT NULL,
  `email` varchar(39) NOT NULL,
  `dateNaissance` date NOT NULL,
  `nom` varchar(39) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `poste` varchar(50) NOT NULL,
  `telephone` int(70) NOT NULL,
  `motdepasse` varchar(39) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 0,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`idemp`, `email`, `dateNaissance`, `nom`, `departement`, `poste`, `telephone`, `motdepasse`, `etat`, `photo`) VALUES
(52, 'nada.barir@etu.uae.ac.ma', '1999-03-12', 'nada barir', 'informatique', 'administrateur reseaux et systeme', 657269628, '12345', 1, 'emp.jfif'),
(69, 'nada.barir@gmail.com', '1953-02-10', 'akoba', 'ITsx', 'Developpeur', 21474, '123', 1, 'employe.jfif'),
(72, 'pacitted2@gmail.com', '2003-05-05', 'Serge ELECHO', 'Hist', 'prof', 98964647, '1234', 0, 'download (1).jpg'),
(73, 'elechoserge@gmail.com', '2005-05-08', 'Serge ELECHO', 'Hist', 'prof', 98964647, '1234', 1, 'WhatsApp Image 2023-11-21 at 6.44.44 PM.jpeg'),
(74, 'bioakani@gmail.com', '2002-06-01', 'sede', 'hist', 'doctor', 33333333, 'EGNQtA5CH1h-WrvFoYOG5LfydNBHnL_dQBEMybN', 0, 'dd.png'),
(75, 'coco@gmail.com', '2004-01-01', 'Serge ELECHO', 'DG', 'POSTE1', 7797412, '123', 1, 'seqs2.png'),
(76, 'elechoserge@gmail.com', '0000-00-00', 'qre', 'Hist', 'prof', 98964647, '123', 1, 'download.jpg'),
(77, 'elechoserge@gmail.com', '2024-02-22', 'Bio TATA', 'FLAAC', 'Anglais', 68696765, '123', 1, 'vue-3d-du-modele-maison.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `employesarchiver`
--

CREATE TABLE `employesarchiver` (
  `idemp` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `dateNaissance` date NOT NULL,
  `nom` varchar(40) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `poste` varchar(50) NOT NULL,
  `telephone` int(40) NOT NULL,
  `motdepasse` varchar(40) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 0,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employesarchiver`
--

INSERT INTO `employesarchiver` (`idemp`, `email`, `dateNaissance`, `nom`, `departement`, `poste`, `telephone`, `motdepasse`, `etat`, `photo`) VALUES
(65, 'nadabarir1@gmail.com', '2000-09-12', 'nada ', 'IT', 'responsable', 654687321, '123', 0, 'employe1.jfif'),
(67, 'pacitted2@gmail.com', '2003-05-05', 'Serge ELECHO', 'Hist', 'prof', 98964647, '1234', 0, 'download (1).jpg');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `organisme_formateur` varchar(255) DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `duree_en_jours` int(11) DEFAULT NULL,
  `charge` tinyint(1) DEFAULT NULL,
  `periode_debut` date DEFAULT NULL,
  `periode_fin` date DEFAULT NULL,
  `piece_justificatif` varchar(255) DEFAULT NULL,
  `idemp` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `titre`, `organisme_formateur`, `lieu`, `duree_en_jours`, `charge`, `periode_debut`, `periode_fin`, `piece_justificatif`, `idemp`) VALUES
(73, 'SDFGH', 'IUGF', 'dfghj', 13, 1, '2024-02-15', '2024-02-28', 'nouveau_doc2[1].pdf', 73),
(74, 'SDFGH', 'IUGF', 'dfghj', 14, NULL, '2024-03-01', '2024-03-15', 'Basic English Grammar, Book 2.pdf', 69),
(75, 'dfghn', 'vbn,', 'ghn,', 7, 1, '2024-02-29', '2024-03-07', 'Mémoire -1.pdf', 75);

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE `langue` (
  `id` int(11) NOT NULL,
  `idemp` int(11) UNSIGNED NOT NULL,
  `langue` varchar(255) DEFAULT NULL,
  `lue` enum('oui','non') DEFAULT NULL,
  `ecrite` enum('oui','non') DEFAULT NULL,
  `parlee` enum('oui','non') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`id`, `idemp`, `langue`, `lue`, `ecrite`, `parlee`) VALUES
(5, 69, 'Anglaiss', 'non', 'oui', 'non'),
(6, 75, 'Français', 'oui', 'oui', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `postes`
--

CREATE TABLE `postes` (
  `id_poste` int(11) NOT NULL,
  `nom_poste` varchar(100) NOT NULL,
  `id_departement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `postes`
--

INSERT INTO `postes` (`id_poste`, `nom_poste`, `id_departement`) VALUES
(12, 'GL', 9),
(13, 'SI', 9),
(15, 'Langue', 10),
(16, 'Anglais', 10),
(17, 'Fon', 10);

-- --------------------------------------------------------

--
-- Structure de la table `realisation`
--

CREATE TABLE `realisation` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description_detaillee` text DEFAULT NULL,
  `date_realisation` date DEFAULT NULL,
  `impact` enum('Faible','Moyen','Élevé') DEFAULT NULL,
  `documentation` text DEFAULT NULL,
  `commentaires` text DEFAULT NULL,
  `responsables_collaborateurs_impliques` varchar(255) DEFAULT NULL,
  `idemp` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reunion`
--

CREATE TABLE `reunion` (
  `idreunion` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `datereunion` date NOT NULL,
  `heurereunion` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reunion`
--

INSERT INTO `reunion` (`idreunion`, `titre`, `type`, `datereunion`, `heurereunion`) VALUES
(90, 'Fear Woman', 'Réunion interne', '2024-02-29', '17:23:00'),
(91, 'Big bang2', 'Réunion interne', '2024-02-29', '16:26:00'),
(92, 'Ici c\'est nous', 'Réunion externe', '2024-03-01', '20:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `reunion_employes`
--

CREATE TABLE `reunion_employes` (
  `idreunion` int(11) UNSIGNED NOT NULL,
  `idemploye` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reunion_employes`
--

INSERT INTO `reunion_employes` (`idreunion`, `idemploye`) VALUES
(88, 0),
(89, 0),
(90, 76),
(91, 76),
(92, 76);

-- --------------------------------------------------------

--
-- Structure de la table `rh`
--

CREATE TABLE `rh` (
  `idrh` int(11) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `motdepasse` varchar(40) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `poste` varchar(70) NOT NULL,
  `departement` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rh`
--

INSERT INTO `rh` (`idrh`, `prenom`, `nom`, `email`, `motdepasse`, `photo`, `poste`, `departement`) VALUES
(2, 'nada', 'barir', 'nadabarir@gmail.com', '1234', 'nada.jpg', 'RH', 'resources humaines');

-- --------------------------------------------------------

--
-- Structure de la table `situa_pro`
--

CREATE TABLE `situa_pro` (
  `id` int(11) NOT NULL,
  `idemp` int(11) UNSIGNED NOT NULL,
  `date_recrutement` date DEFAULT NULL,
  `grade_recrutement` varchar(255) DEFAULT NULL,
  `echelle_recrutement` varchar(255) DEFAULT NULL,
  `echelon` varchar(255) DEFAULT NULL,
  `fiche_embauche` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `situa_pro`
--

INSERT INTO `situa_pro` (`id`, `idemp`, `date_recrutement`, `grade_recrutement`, `echelle_recrutement`, `echelon`, `fiche_embauche`) VALUES
(1, 69, '2024-02-16', 'fgh', 'xcvb', 'kjhg', 'embauche/CIM.pdf'),
(2, 0, '2024-02-16', 'fgh', 'xcvb', 'kjhg', ''),
(3, 69, '2024-02-16', 'fgh', 'xcvb', 'kjhg', ''),
(4, 0, '0000-00-00', '', '', '', ''),
(5, 0, '0000-00-00', '', '', '', ''),
(6, 69, '2024-02-16', 'fgh', 'xcvb', 'kjhg', ''),
(7, 69, '2024-02-16', 'fgh', 'xcvb', 'kjhg', ''),
(8, 69, '2024-02-16', 'fgh', 'xcvb', 'kjhg', ''),
(9, 69, '2024-02-16', 'fgh', 'xcvb', 'kjhg', ''),
(10, 69, '2024-02-16', 'fgh', 'xcvb', 'kjhg', ''),
(11, 72, '0000-00-00', '', '', '', ''),
(12, 72, '0000-00-00', '', '', '', ''),
(13, 72, '2024-02-16', 'fgh', 'xcvb', 'kjhg', ''),
(14, 0, '2024-02-16', 'fgh', 'xcvb', 'kjhg', ''),
(15, 0, '2024-02-16', 'fgh', 'xcvb', 'kjhg', ''),
(16, 0, '2024-02-16', 'fgh', 'xcvb', 'kjhg', ''),
(17, 69, '2024-02-16', 'fgh', 'xcvb', 'kjhg', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annoncement`
--
ALTER TABLE `annoncement`
  ADD PRIMARY KEY (`idannonce`);

--
-- Index pour la table `banque_info`
--
ALTER TABLE `banque_info`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD PRIMARY KEY (`idcand`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conges`
--
ALTER TABLE `conges`
  ADD PRIMARY KEY (`idconge`),
  ADD KEY `conges_ibfk_1` (`idemp`);

--
-- Index pour la table `congesdemandes`
--
ALTER TABLE `congesdemandes`
  ADD PRIMARY KEY (`idconge`),
  ADD KEY `idemp` (`idemp`);

--
-- Index pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `defi`
--
ALTER TABLE `defi`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Index pour la table `details_perso`
--
ALTER TABLE `details_perso`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`idemp`);

--
-- Index pour la table `employesarchiver`
--
ALTER TABLE `employesarchiver`
  ADD PRIMARY KEY (`idemp`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `postes`
--
ALTER TABLE `postes`
  ADD PRIMARY KEY (`id_poste`),
  ADD KEY `id_departement` (`id_departement`);

--
-- Index pour la table `realisation`
--
ALTER TABLE `realisation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reunion`
--
ALTER TABLE `reunion`
  ADD PRIMARY KEY (`idreunion`);

--
-- Index pour la table `rh`
--
ALTER TABLE `rh`
  ADD PRIMARY KEY (`idrh`);

--
-- Index pour la table `situa_pro`
--
ALTER TABLE `situa_pro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annoncement`
--
ALTER TABLE `annoncement`
  MODIFY `idannonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `banque_info`
--
ALTER TABLE `banque_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `candidats`
--
ALTER TABLE `candidats`
  MODIFY `idcand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `conges`
--
ALTER TABLE `conges`
  MODIFY `idconge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `congesdemandes`
--
ALTER TABLE `congesdemandes`
  MODIFY `idconge` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `defi`
--
ALTER TABLE `defi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `details_perso`
--
ALTER TABLE `details_perso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `idemp` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `employesarchiver`
--
ALTER TABLE `employesarchiver`
  MODIFY `idemp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `langue`
--
ALTER TABLE `langue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `postes`
--
ALTER TABLE `postes`
  MODIFY `id_poste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `realisation`
--
ALTER TABLE `realisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reunion`
--
ALTER TABLE `reunion`
  MODIFY `idreunion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT pour la table `rh`
--
ALTER TABLE `rh`
  MODIFY `idrh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `situa_pro`
--
ALTER TABLE `situa_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `conges`
--
ALTER TABLE `conges`
  ADD CONSTRAINT `conges_ibfk_1` FOREIGN KEY (`idemp`) REFERENCES `employes` (`idemp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `congesdemandes`
--
ALTER TABLE `congesdemandes`
  ADD CONSTRAINT `congesdemandes_ibfk_1` FOREIGN KEY (`idemp`) REFERENCES `employes` (`idemp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `postes`
--
ALTER TABLE `postes`
  ADD CONSTRAINT `postes_ibfk_1` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id_departement`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
