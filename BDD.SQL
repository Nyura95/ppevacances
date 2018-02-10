SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ppevacances`
--

-- --------------------------------------------------------

--
-- Structure de la table `COMPTE`
--

CREATE TABLE `COMPTE` (
  `USER` char(8) NOT NULL,
  `MDP` char(10) DEFAULT NULL,
  `NOMCPTE` char(40) DEFAULT NULL,
  `PRENOMCPTE` char(30) DEFAULT NULL,
  `DATEINSCRIP` date DEFAULT NULL,
  `DATEFERME` date DEFAULT NULL,
  `TYPECOMPTE` char(3) DEFAULT NULL,
  `ADRMAILCPTE` char(60) DEFAULT NULL,
  `NOTELCPTE` char(15) DEFAULT NULL,
  `NOPORTCPTE` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `COMPTE`
--

INSERT INTO `COMPTE` (`USER`, `MDP`, `NOMCPTE`, `PRENOMCPTE`, `DATEINSCRIP`, `DATEFERME`, `TYPECOMPTE`, `ADRMAILCPTE`, `NOTELCPTE`, `NOPORTCPTE`) VALUES
('as1', 'as2', 'Ayache', 'Lola', '2017-10-10', '2017-10-30', '1', 'sqds@free.fr', '065223650', NULL),
('as4', 'ss', 'Lorthios', 'Florian', '2017-11-02', NULL, '1', 'sqds@free.fr', NULL, NULL),
('asd', 'ddd', 'Coquet', 'Thomas', '2017-10-04', '2017-10-30', '2', NULL, NULL, NULL),
('Edz', 'ss', 'Aronowicz', 'Judith', '2017-11-23', '2017-11-08', '3', 'sqds@free.fr', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ETAT_RESA`
--

CREATE TABLE `ETAT_RESA` (
  `CODEETATRESA` char(2) NOT NULL,
  `NOMETATRESA` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ETAT_RESA`
--

INSERT INTO `ETAT_RESA` (`CODEETATRESA`, `NOMETATRESA`) VALUES
('1', 'Bloquée'),
('2', 'Arrhes versées'),
('3', 'Soldé'),
('4', 'Clée retirés'),
('5', 'Annulée'),
('6', 'Terminé');

-- --------------------------------------------------------

--
-- Structure de la table `HEBERGEMENT`
--

CREATE TABLE `HEBERGEMENT` (
  `NOHEB` int(4) NOT NULL,
  `CODETYPEHEB` char(5) NOT NULL,
  `NOMHEB` char(40) NOT NULL,
  `NBPLACEHEB` int(2) NOT NULL,
  `SURFACEHEB` int(3) NOT NULL,
  `INTERNET` tinyint(1) DEFAULT NULL,
  `ANNEEHEB` int(4) DEFAULT NULL,
  `SECTEURHEB` char(15) NOT NULL,
  `ORIENTATIONHEB` char(5) NOT NULL,
  `ETATHEB` char(32) DEFAULT NULL,
  `DESCRIHEB` char(200) DEFAULT NULL,
  `PHOTOHEB` char(50) DEFAULT NULL,
  `TARIFSEMHEB` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `HEBERGEMENT`
--

INSERT INTO `HEBERGEMENT` (`NOHEB`, `CODETYPEHEB`, `NOMHEB`, `NBPLACEHEB`, `SURFACEHEB`, `INTERNET`, `ANNEEHEB`, `SECTEURHEB`, `ORIENTATIONHEB`, `ETATHEB`, `DESCRIHEB`, `PHOTOHEB`, `TARIFSEMHEB`) VALUES
(1, '1', 'Le dodo', 2, 30, NULL, 2016, 'les Alpes', 'Sud', NULL, 'Laevorsum extimas fulminis si huius cogitabat praetenturis quod crebro aliquando.', 'jj.jpg', '1200.00'),
(2, '4', 'Le rouge', 2, 20, 0, 2011, 'les Alpes', 'Nord', 'Propre', 'Laevorsum extimas fulminis si huius cogitabat praetenturis quod crebro aliquando.', 'aa.jpg', '1000.00'),
(3, '3', 'Le bleu', 8, 200, 1, 2012, 'le Jura', 'Sud', 'Propre', 'Et eodem impetu Domitianum praecipitem per scalas itidem funibus constrinxerunt, eosque coniunctos per ampla spatia civitatis acri raptavere discursu. iamque artuum et membrorum divulsa conpage supers', 'kk.jpg', '3000.00'),
(4, '1', 'Le Coco', 2, 30, 1, 2011, 'les Alpes', 'Ouest', NULL, NULL, 'pp.jpg', '700.00'),
(5, '1', 'Le Tréfle', 1, 20, 0, 2010, 'le jura', 'Sud', NULL, NULL, 'll.jpg', '650.00'),
(6, '3', 'Le Jaune', 5, 120, 1, NULL, 'les Alpes', 'Sud', NULL, NULL, 'uu.jpg', '1599.00'),
(7, '2', 'Le chaleureux', 4, 150, 1, NULL, 'les Alpes', 'Sud', NULL, NULL, 'oo.jpg', '1500.00'),
(8, '4', 'Le Grand', 6, 180, 1, NULL, 'les Alpes', 'Est', NULL, NULL, 'mm.jpg', '1870.00'),
(9, '4', 'Le familliale', 8, 200, 1, NULL, 'les Alpes', 'Sud', NULL, NULL, 'zz.jpg', '2100.00'),
(14, '4', 'Le blanc', 3, 70, 1, NULL, 'les Alpes', 'Nord', NULL, 'a', 'chaletpp.jpg', '500.00');

-- --------------------------------------------------------

--
-- Structure de la table `RESA`
--

CREATE TABLE `RESA` (
  `NOHEB` int(4) NOT NULL,
  `DATEDEBSEM` date NOT NULL,
  `USER` char(8) NOT NULL,
  `CODEETATRESA` char(2) NOT NULL,
  `DATERESA` datetime DEFAULT CURRENT_TIMESTAMP,
  `DATEARRHES` date DEFAULT NULL,
  `MONTANTARRHES` decimal(7,2) DEFAULT NULL,
  `NBOCCUPANT` int(2) DEFAULT NULL,
  `TARIFSEMRESA` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `RESA`
--

INSERT INTO `RESA` (`NOHEB`, `DATEDEBSEM`, `USER`, `CODEETATRESA`, `DATERESA`, `DATEARRHES`, `MONTANTARRHES`, `NBOCCUPANT`, `TARIFSEMRESA`) VALUES
(2, '2017-11-11', 'as1', '1', '2017-11-02 17:03:24', '2017-11-11', '200.00', 2, '200.00'),
(3, '2017-12-02', 'as1', '1', '2017-11-21 13:26:21', '2017-12-02', '12.00', 3, '12.00'),
(4, '2017-11-11', 'asd', '1', '2017-11-02 16:57:46', '2017-11-11', '200.00', 2, '200.00'),
(6, '2017-12-09', 'Edz', '1', '2017-11-21 13:34:23', '2017-12-09', '12.00', 3, '12.00'),
(8, '2017-11-18', 'as1', '1', '2017-09-12 00:00:00', '2017-11-18', '1200.00', 4, '1200.00'),
(14, '2017-11-11', 'as1', '2', '2017-11-11 00:00:00', '2017-11-11', '1200.00', 4, '1200.00');

-- --------------------------------------------------------

--
-- Structure de la table `SEMAINE`
--

CREATE TABLE `SEMAINE` (
  `DATEDEBSEM` date NOT NULL,
  `DATEFINSEM` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `SEMAINE`
--

INSERT INTO `SEMAINE` (`DATEDEBSEM`, `DATEFINSEM`) VALUES
('2017-11-04', '2017-11-11'),
('2017-11-11', '2017-11-18'),
('2017-11-18', '2017-11-25'),
('2017-11-25', '2017-12-02'),
('2017-12-02', '2017-12-09'),
('2017-12-09', '2017-12-16'),
('2017-12-16', '2017-12-23'),
('2017-12-23', '2017-12-30'),
('2018-01-06', '2018-01-13'),
('2018-01-13', '2018-01-20');

-- --------------------------------------------------------

--
-- Structure de la table `TYPE_HEB`
--

CREATE TABLE `TYPE_HEB` (
  `CODETYPEHEB` char(5) NOT NULL,
  `NOMTYPEHEB` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `TYPE_HEB`
--

INSERT INTO `TYPE_HEB` (`CODETYPEHEB`, `NOMTYPEHEB`) VALUES
('1', 'Appartement'),
('2', 'Bungalow'),
('3', 'Mobil home'),
('4', 'Chalet');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `COMPTE`
--
ALTER TABLE `COMPTE`
  ADD PRIMARY KEY (`USER`);

--
-- Index pour la table `ETAT_RESA`
--
ALTER TABLE `ETAT_RESA`
  ADD PRIMARY KEY (`CODEETATRESA`);

--
-- Index pour la table `HEBERGEMENT`
--
ALTER TABLE `HEBERGEMENT`
  ADD PRIMARY KEY (`NOHEB`),
  ADD KEY `I_FK_HEBERGEMENT_TYPE_HEB` (`CODETYPEHEB`);

--
-- Index pour la table `RESA`
--
ALTER TABLE `RESA`
  ADD PRIMARY KEY (`NOHEB`,`DATEDEBSEM`),
  ADD KEY `I_FK_RESA_COMPTE` (`USER`),
  ADD KEY `I_FK_RESA_SEMAINE` (`DATEDEBSEM`),
  ADD KEY `I_FK_RESA_ETAT_RESA` (`CODEETATRESA`);

--
-- Index pour la table `SEMAINE`
--
ALTER TABLE `SEMAINE`
  ADD PRIMARY KEY (`DATEDEBSEM`);

--
-- Index pour la table `TYPE_HEB`
--
ALTER TABLE `TYPE_HEB`
  ADD PRIMARY KEY (`CODETYPEHEB`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `HEBERGEMENT`
--
ALTER TABLE `HEBERGEMENT`
  MODIFY `NOHEB` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `HEBERGEMENT`
--
ALTER TABLE `HEBERGEMENT`
  ADD CONSTRAINT `hebergement_ibfk_1` FOREIGN KEY (`CODETYPEHEB`) REFERENCES `TYPE_HEB` (`CODETYPEHEB`);

--
-- Contraintes pour la table `RESA`
--
ALTER TABLE `RESA`
  ADD CONSTRAINT `resa_ibfk_1` FOREIGN KEY (`USER`) REFERENCES `COMPTE` (`USER`),
  ADD CONSTRAINT `resa_ibfk_2` FOREIGN KEY (`DATEDEBSEM`) REFERENCES `SEMAINE` (`DATEDEBSEM`),
  ADD CONSTRAINT `resa_ibfk_4` FOREIGN KEY (`CODEETATRESA`) REFERENCES `ETAT_RESA` (`CODEETATRESA`);