-- Hôte : 127.0.0.1
-- Généré le : mar. 23 mai 2023 à 15:43
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `le_quai_antique`
--

-- --------------------------------------------------------

--
-- Structure de la table `desserts`
--

CREATE TABLE `desserts` (
  `dessert_id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `desserts`
--

INSERT INTO `desserts` (`dessert_id`, `titre`, `detail`, `prix`) VALUES
(1, 'Fraise Française / Tanaisie', 'Petit Pois Mentholé', 12),
(2, 'Chocolat Noir Sao Tomé ', 'Crémeux à la fève de Tonka / Crème glacée à l’Amande douce', 15);

-- --------------------------------------------------------

--
-- Structure de la table `entrees`
--

CREATE TABLE `entrees` (
  `entree_id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entrees`
--

INSERT INTO `entrees` (`entree_id`, `titre`, `detail`, `prix`) VALUES
(1, 'Ballotine de lapin fermier', 'Foie de volaille, lard poivré, gelée chartreuse et estragon, pickles de radis et carottes', 18),
(3, 'Thon Rouge et Betterave mariné à la Japonaise', 'Voile de betterave fermentée au Géranium Rosat\r\n\r\nGingembre rose / Riz à Sushi', 25);

-- --------------------------------------------------------

--
-- Structure de la table `horaires`
--

CREATE TABLE `horaires` (
  `horaire_id` int(1) NOT NULL,
  `lundi_midi` varchar(15) NOT NULL,
  `lundi_soir` varchar(15) NOT NULL,
  `mardi_midi` varchar(15) NOT NULL,
  `mardi_soir` varchar(15) NOT NULL,
  `mercredi_midi` varchar(15) NOT NULL,
  `mercredi_soir` varchar(15) NOT NULL,
  `jeudi_midi` varchar(15) NOT NULL,
  `jeudi_soir` varchar(15) NOT NULL,
  `vendredi_midi` varchar(15) NOT NULL,
  `vendredi_soir` varchar(15) NOT NULL,
  `samedi_midi` varchar(15) NOT NULL,
  `samedi_soir` varchar(15) NOT NULL,
  `dimanche_midi` varchar(15) NOT NULL,
  `dimanche_soir` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `horaires`
--

INSERT INTO `horaires` (`horaire_id`, `lundi_midi`, `lundi_soir`, `mardi_midi`, `mardi_soir`, `mercredi_midi`, `mercredi_soir`, `jeudi_midi`, `jeudi_soir`, `vendredi_midi`, `vendredi_soir`, `samedi_midi`, `samedi_soir`, `dimanche_midi`, `dimanche_soir`) VALUES
(1, '12:00 - 14:00', '19:00 - 22:00', '12:00 - 14:00', '19:00 - 22:00', 'Fermé', 'Fermé', '12:00 - 14:00', '19:00 - 22:00', '12:00 - 14:00', '19:00 - 22:00', 'Fermé', '19:00 - 23:00', '12:00 - 14:00', 'Fermé');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `image_data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`image_id`, `name`, `type`, `image_data`) VALUES
(0, '', '', 0x6956424f5277304b47676f414141414e53556845556741414144494141414179434149414141435258522f6d41414145736d6c555748525954557736593239744c6d466b62324a6c4c6e68746341414141414141504439346347466a6132563049474a6c5a326c7550534c767537386949476c6b50534a584e553077545842445a576870534870795a564e36546c526a656d746a4f575169507a344b5048673665473177625756305953423462577875637a703450534a685a4739695a547075637a70745a5852684c7949676544703462584230617a30695745315149454e76636d55674e5334314c6a416950676f6750484a6b5a6a70535245596765473173626e4d36636d526d50534a6f644852774f693876643364334c6e637a4c6d39795a7938784f546b354c7a41794c7a49794c584a6b5a69317a6557353059586774626e4d6a496a344b49434138636d526d4f6b526c63324e79615842306157397549484a6b5a6a7068596d39316444306949676f674943416765473173626e4d365a5868705a6a30696148523063446f764c32357a4c6d466b62324a6c4c6d4e766253396c65476c6d4c7a45754d433869436941674943423462577875637a703061575a6d50534a6f644852774f693876626e4d7559575276596d5575593239744c3352705a6d59764d5334774c79494b49434167494868746247357a4f6e426f6233527663326876634430696148523063446f764c32357a4c6d466b62324a6c4c6d4e76625339776147393062334e6f623341764d5334774c79494b49434167494868746247357a4f6e6874634430696148523063446f764c32357a4c6d466b62324a6c4c6d4e7662533934595841764d5334774c79494b49434167494868746247357a4f6e68746345314e50534a6f644852774f693876626e4d7559575276596d5575593239744c336868634338784c6a41766257307649676f674943416765473173626e4d3663335246646e5139496d6830644841364c793975637935685a4739695a53356a62323076654746774c7a45754d43397a56486c775a5339535a584e7664584a6a5a5556325a5735304979494b494341675a5868705a6a70516158686c624668456157316c626e4e7062323439496a557749676f674943426c65476c6d4f6c427065475673575552706257567563326c76626a30694e5441694369416749475634615759365132397362334a546347466a5a5430694d53494b4943416764476c6d5a6a704a6257466e5a5664705a48526f505349314d43494b4943416764476c6d5a6a704a6257466e5a55786c626d6430614430694e54416943694167494852705a6d5936556d567a6232783164476c76626c567561585139496a496943694167494852705a6d593657464a6c633239736458527062323439496a4d774d43387849676f674943423061575a6d4f6c6c535a584e7662485630615739755053497a4d4441764d53494b49434167634768766447397a614739774f6b4e76624739795457396b5a5430694d79494b49434167634768766447397a614739774f6b6c445131427962325a7062475539496e4e5352304967535556444e6a45354e6a59744d69347849676f6749434234625841365457396b61575a35524746305a5430694d6a41794d7930774e4330794f5651784d446f314d446f794f5373774d6a6f774d43494b49434167654731774f6b316c6447466b59585268524746305a5430694d6a41794d7930774e4330794f5651784d446f314d446f794f5373774d6a6f774d43492b43694167494478346258424e5454704961584e3062334a3550676f674943416750484a6b5a6a70545a58452b436941674943416750484a6b5a6a707361516f67494341674943427a64455632644470685933527062323439496e4279623252315932566b49676f67494341674943427a644556326444707a62325a30643246795a55466e5a57353050534a425a6d5a70626d6c306553425161473930627941784c6a45774c6a5969436941674943416749484e3052585a304f6e646f5a573439496a49774d6a4d744d4451744d6a6c554d5441364e5441364d6a6b724d4449364d4441694c7a344b4943416749447776636d526d4f6c4e6c6354344b49434167504339346258424e5454704961584e3062334a3550676f6749447776636d526d4f6b526c63324e79615842306157397550676f67504339795a475936556b524750676f384c33673665473177625756305954344b504439346347466a61325630494756755a4430696369492f5071634a70556f414141474361554e4455484e5352304967535556444e6a45354e6a59744d6934784141416f6b58575275307344515243487630516c51534d4b576c676f425047426b45694d454c53786947675531434a47384e556b5a783543487364646767526277546167494e72344b7651763046617746675246456352576130556244656463496b54457a444937332f35325a3969644257736f7161543057672b6b306c6b7447504137357863576e625a6e61756e41546939395955565870326648513153316a7a73735a7278786d3757716e2f7658476c616975674957752f43496f6d705a34516e687162577361764b32634b7553434b38496e7771374e4c6d67384b327052387238596e4b387a46386d613648674b466962685a337858787a357855704353776e4c792b6c4b4a58504b7a33334d6c7a696936626c5a695a336937656745436544487953526a6a4f4a6a6747475a66626a78306938727175523753766b7a5a4352586b566b6c6a38597163524a6b63596d616b2b7052695448526f7a4b53354d332b2f2b3272486876306c7173372f4644335a42687633574462676d4c424d44345044614e3442445750634a47753547634f594f686439454a4636397148706730347536786f6b52303433345332427a5773685574536a626731466f505845326863674a5a7271463871392b786e6e2b4e37434b334c563133423768373079506d6d35572b6765326741596f31364377414141416c7753466c7a41414175497741414c694d42654b552f646741414167704a52454655574958746d4d394c4730455578392b596f4e436a312b4c424833696f326971497262564230555169456e727031554e5631467678554c78374b525273616c744255525077496f624555476b4a394138522f3471716837714c737676316f4b6a547a69795a7a4b4f70644c37735a535a76762f6e775a76664e32784541364e39545137304231484a594a6e4a594a727066574546417854314b4a5369566f4f496542514862483134354a3139514b6b476c6774595a5370574c6545433356376d6f4471744270594c6b2f485666476158426d6b784b4e30386d3262416d5269586e7a4c677953724f495a372b69686a61717a6c6d444e544d664e6252526c6337715650732b566c6651315961754e7179757750665a4674487a72703237322f48706738355a49474b72766e704e596a4732564e3131466f4961744f55704571742b756c2f6c744e357957435a795743626977777044347173314846696552352b7a394b53546e76565366704f6e43324c59547a6257704b62672b34473970585732414e70616c325a2b4739596b617977684b4236585a686f62625431356e71335a42576e493067585a50776677666551334d66415959304d6f37434949374333354f676941684f43783471786266457a3048315235566a6b73457a6b734539554a4b77796a663964676e5a2f54546f34472b326a304f5256324f5539736a6e2f5375325871624b4830434232557457487134722b546b337156796a66372f65526153347553383947684d6b71444e66785575766c56686f664a382f437757584a2b2b30595a71462f456947484e2b764d4450785a58427637644535756d4a7070364c63314d7a366b6a74646e2b3868453948656a76787659474c6935344668484136516d79372f476f46532f542b464852525555324e6d464951764332426a664a694c5a314a7a596d636c676d636c676d756754746a4a636c4d334459754141414141424a52553545726b4a6767673d3d);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `membre_id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `alergies` int(11) NOT NULL,
  `type` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`membre_id`, `nom`, `prenom`, `mdp`, `mail`, `alergies`, `type`) VALUES
(7, 'client', 'client', '62608e08adc29a8d6dbc9754e659f125', 'client@test.com', 0, 'client'),
(8, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@test.com', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `prix` int(11) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `menus`
--

INSERT INTO `menus` (`menu_id`, `titre`, `prix`, `desc`) VALUES
(1, 'MENU DÉCOUVERTE', 60, 'Un Menu en 6 temps (Carte Blanche du Chef),\r\nUn accord mets / vins en 4 verres, (hors apéritif et digestif), Une bouteille d’eau plate ou gazeuse.'),
(2, 'MENU SIGNATURE', 110, 'Laissez vous tenter par cet invitation en découvrant l’univers culinaire du chef grâce à quatre petits plats.'),
(3, 'MENU GOURMAND', 160, 'Un déjeuner gastronomique autour de produits de saison. Le chef vous propose un déjeuner étoilé.');

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

CREATE TABLE `plats` (
  `plat_id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`plat_id`, `titre`, `detail`, `prix`) VALUES
(1, 'Blanc de Cabillaud laqué au Mizo ', 'Étuvé de Coquillages / Huile Ail des Ours / Crème Argenteuil', 20),
(2, 'Quasi de Veau de la région au poivre Kerala', 'Petits Artichauts violet / Crème Soubise à la graine de café\r\n\r\nJus de veau au Vin Jaune', 22);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `tel` int(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `couvert` int(11) NOT NULL,
  `alergie` varchar(50) NOT NULL,
  `heure` time NOT NULL,
  `membre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `nom`, `prenom`, `tel`, `mail`, `date`, `couvert`, `alergie`, `heure`, `membre_id`) VALUES
(11, 'test', 'test', 606000000, 'test@test.com', '2023-05-26', 5, '', '12:00:00', 0),
(12, 'test', 'test', 606000000, 'test@test.com', '2023-05-27', 14, '', '12:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reservation2`
--

CREATE TABLE `reservation2` (
  `reservation2_id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `tel` int(10) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `couvert` int(11) NOT NULL,
  `alergie` varchar(100) NOT NULL,
  `heure` time NOT NULL,
  `membre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation2`
--

INSERT INTO `reservation2` (`reservation2_id`, `nom`, `prenom`, `tel`, `mail`, `date`, `couvert`, `alergie`, `heure`, `membre_id`) VALUES
(4, 'autre test', 'autretest', 606000000, 'test@test.com', '2023-05-27', 13, '', '21:00:00', 0),
(5, 'test', 'test', 600000000, 'test@test.com', '2023-05-28', 12, '', '19:00:00', 0),
(6, 'mamy', 'randria', 606000000, 'razah@test.com', '2023-05-31', 20, 'gluten', '19:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `vins`
--

CREATE TABLE `vins` (
  `vin_id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vins`
--

INSERT INTO `vins` (`vin_id`, `titre`, `detail`, `prix`) VALUES
(2, 'Chardonnay IGP Pays d\'Oc,', 'Les Cardounettes', 27),
(3, 'Bergerac aoc', 'Château Tour des Gendres, \"Cuvée des Conti\" (sec)', 31);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `desserts`
--
ALTER TABLE `desserts`
  ADD PRIMARY KEY (`dessert_id`);

--
-- Index pour la table `entrees`
--
ALTER TABLE `entrees`
  ADD PRIMARY KEY (`entree_id`);

--
-- Index pour la table `horaires`
--
ALTER TABLE `horaires`
  ADD PRIMARY KEY (`horaire_id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`membre_id`);

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Index pour la table `plats`
--
ALTER TABLE `plats`
  ADD PRIMARY KEY (`plat_id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Index pour la table `reservation2`
--
ALTER TABLE `reservation2`
  ADD PRIMARY KEY (`reservation2_id`);

--
-- Index pour la table `vins`
--
ALTER TABLE `vins`
  ADD PRIMARY KEY (`vin_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `desserts`
--
ALTER TABLE `desserts`
  MODIFY `dessert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `entrees`
--
ALTER TABLE `entrees`
  MODIFY `entree_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `horaires`
--
ALTER TABLE `horaires`
  MODIFY `horaire_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `membre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `plats`
--
ALTER TABLE `plats`
  MODIFY `plat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `reservation2`
--
ALTER TABLE `reservation2`
  MODIFY `reservation2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `vins`
--
ALTER TABLE `vins`
  MODIFY `vin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
