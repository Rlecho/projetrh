

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




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
);

--
-- Déchargement des données de la table `annoncement`
--

INSERT INTO `annoncement` (`idannonce`, `titre`, `description`) VALUES
(8, 'Presentation de projet IOT', '<p>une r&eacute;union a &eacute;t&eacute; programmer pour discuter sur le prochaine projet de l\'entreprise</p>');

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
);

--
-- Déchargement des données de la table `candidats`
--

INSERT INTO `candidats` (`idcand`, `prenom`, `nom`, `dateNaissance`, `genre`, `email`, `telephone`, `poste`, `niveau`, `cv`, `lettre`) VALUES
(21, 'nada', 'barir', '2003-03-13', 'Femme', 'nadabarir3@gmail.com', 667268568, 'mobile developer', 'bac+5', 'lab2(DT).pdf', 'projet DNS (3).pdf'),
(22, 'nada', 'barir', '1998-03-13', 'Femme', 'nadabarir1@gmail.com', 67865467, 'DEVELOPPEUR', 'bac+5', 'cvnada.pdf', 'lettrenada.pdf'),
(23, 'nada', 'barir', '1999-03-13', 'Femme', 'nada.barir@etu.uae.ac.ma', 657268627, 'developpeur', 'bac+5', 'cvnada.pdf', 'lettrenada.pdf');

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
  `nom` varchar(100) NOT NULL,
  `idemp` int(10) UNSIGNED NOT NULL
);

--
-- Déchargement des données de la table `conges`
--

INSERT INTO `conges` (`idconge`, `datecreation`, `periode`, `datedebut`, `datefin`, `typeconge`, `nom`, `idemp`) VALUES
(19, '2023-07-13', 7, '2023-07-18', '2023-07-25', 'congé de formation individuelle', 'nada barir', 52),
(20, '2023-07-24', 5, '2023-07-25', '2023-07-30', 'congé de formation individuelle', 'nada barir', 52);

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
  `nom` varchar(39) NOT NULL,
  `idemp` int(11) UNSIGNED NOT NULL
);

CREATE TABLE formations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255),
    organisme_formateur VARCHAR(255),
    lieu VARCHAR(255),
    duree_en_jours INT,
    charge BOOLEAN,
    periode_debut DATE,
    periode_fin DATE,
    piece_justificatif VARCHAR(255),
   `idemp` int(11) UNSIGNED NOT NULL
);



CREATE TABLE document (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_size INT NOT NULL,
    file_type VARCHAR(255) NOT NULL,
    cover_image_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    `idemp` int(11) UNSIGNED NOT NULL
);

--
-- Déchargement des données de la table `congesdemandes`
--

INSERT INTO `congesdemandes` (`idconge`, `datecreation`, `periode`, `datedebut`, `datefin`, `typeconge`, `nom`, `idemp`) VALUES
(38, '2023-08-25', 6, '2023-09-21', '2023-09-27', 'conge de formation individuelle', 'nada barir', 52);

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
  `telephone` int(39) NOT NULL,
  `motdepasse` varchar(39) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 0,
  `photo` text NOT NULL
);

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`idemp`, `email`, `dateNaissance`, `nom`, `departement`, `poste`, `telephone`, `motdepasse`, `etat`, `photo`) VALUES
(52, 'nada.barir@etu.uae.ac.ma', '1999-03-12', 'nada barir', 'informatique', 'administrateur reseaux et systeme', 657269628, '12345', 1, 'emp.jfif'),
(69, 'nada.barir@gmail.com', '2009-03-12', 'nada', 'IT', 'dev', 667676795, '123', 1, 'employe.jfif');

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
);

--
-- Déchargement des données de la table `employesarchiver`
--

INSERT INTO `employesarchiver` (`idemp`, `email`, `dateNaissance`, `nom`, `departement`, `poste`, `telephone`, `motdepasse`, `etat`, `photo`) VALUES
(65, 'nadabarir1@gmail.com', '2000-09-12', 'nada ', 'IT', 'responsable', 654687321, '123', 0, 'employe1.jfif');

-- --------------------------------------------------------

--
-- Structure de la table `reunion`
--

CREATE TABLE `reunion` (
  `idreunion` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `datereunion` date NOT NULL,
  `heurereunion` time(6) NOT NULL
);

--
-- Déchargement des données de la table `reunion`
--

INSERT INTO `reunion` (`idreunion`, `titre`, `type`, `datereunion`, `heurereunion`) VALUES
(82, 'presentation de projet IOT', 'reunion interne', '2022-07-30', '16:30:00.000000'),
(83, 'reunionRH', 'reunion interne', '2023-04-13', '14:50:00.000000');

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
);

--
-- Déchargement des données de la table `rh`
--

INSERT INTO `rh` (`idrh`, `prenom`, `nom`, `email`, `motdepasse`, `photo`, `poste`, `departement`) VALUES
(2, 'nada', 'barir', 'nadabarir@gmail.com', '1234', 'nada.jpg', 'RH', 'resources humaines');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annoncement`
--
ALTER TABLE `annoncement`
  ADD PRIMARY KEY (`idannonce`);

--
-- Index pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD PRIMARY KEY (`idcand`);

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annoncement`
--
ALTER TABLE `annoncement`
  MODIFY `idannonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `candidats`
--
ALTER TABLE `candidats`
  MODIFY `idcand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `conges`
--
ALTER TABLE `conges`
  MODIFY `idconge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `congesdemandes`
--
ALTER TABLE `congesdemandes`
  MODIFY `idconge` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `idemp` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `employesarchiver`
--
ALTER TABLE `employesarchiver`
  MODIFY `idemp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `reunion`
--
ALTER TABLE `reunion`
  MODIFY `idreunion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT pour la table `rh`
--
ALTER TABLE `rh`
  MODIFY `idrh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;


 CREATE TABLE reclassement (
    id_reclassement INT AUTO_INCREMENT PRIMARY KEY,
    nom_complet_employe VARCHAR(255) NOT NULL,
    poste_actuel VARCHAR(100) NOT NULL,
    nouveau_grade_souhaite VARCHAR(100) NOT NULL,
  `idemp` int(11) UNSIGNED NOT NULL
);

CREATE TABLE licenciement (
    id_licenciement INT AUTO_INCREMENT PRIMARY KEY,
    nom_complet_employe VARCHAR(255) NOT NULL,
    poste_actuel VARCHAR(100) NOT NULL,
    motif_licenciement TEXT NOT NULL,
    date_prevue_licenciement DATE NOT NULL,
    acceptation_terms BOOLEAN NOT NULL,
  `idemp` int(11) UNSIGNED NOT NULL
); 

CREATE TABLE affectation (
    id_affectation INT AUTO_INCREMENT PRIMARY KEY,
    nom_complet_employe VARCHAR(255) NOT NULL,
    departement VARCHAR(100) NOT NULL,
    poste_propose VARCHAR(100) NOT NULL,
    date_prevue_affectation DATE NOT NULL,
  `idemp` int(11) UNSIGNED NOT NULL
);

CREATE TABLE promotion (
    id_promotion INT AUTO_INCREMENT PRIMARY KEY,
    nom_complet_employe VARCHAR(255) NOT NULL,
    poste_actuel VARCHAR(100) NOT NULL,
    departement VARCHAR(100) NOT NULL,
    approbation_responsable_rh VARCHAR(255) NOT NULL,
    date_effet_promotion DATE NOT NULL,
    salaire_propose DECIMAL(10, 2),
    acceptation_terms BOOLEAN NOT NULL,
    poste_propose VARCHAR(100) NOT NULL,
    date_prise_poste DATE NOT NULL,
    justification_promotion TEXT NOT NULL,
    avis_superieur_direct TEXT,
    commentaire_supplementaire TEXT,
  `idemp` int(11) UNSIGNED NOT NULL
);
