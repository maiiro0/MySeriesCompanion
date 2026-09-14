-- ============================================================
-- Données de test MySeriesCompanion (séries réelles)
-- Usage : mysql -u root my_series_companion -e "source donnees-test.sql"
-- ============================================================

SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE episode;
TRUNCATE TABLE saison;
TRUNCATE TABLE serie;
SET FOREIGN_KEY_CHECKS = 1;

-- SERIES ------------------------------------------------------
INSERT INTO serie (id, nom, resume, vignette, date_sortie) VALUES
(1, 'Breaking Bad', 'Diagnostiqué d’un cancer en phase terminale, un professeur de chimie se lance dans la fabrication de méthamphétamine pour subvenir aux besoins de sa famille.', 'https://image.tmdb.org/t/p/original/ggFHVNu6YYI5L9pCfOacjizRGt.jpg', '2008-01-20'),
(2, 'Game of Thrones', 'Neuf familles nobles s’affrontent pour s’emparer du Trône de Fer de Westeros, tandis qu’une ancienne menace se réveille au-delà du Mur.', 'https://image.tmdb.org/t/p/original/1XS1oqL89opfnbLl8WnZY1O1uJx.jpg', '2011-04-17'),
(3, 'Stranger Things', 'À Hawkins, dans l’Indiana des années 1980, la disparition d’un jeune garçon met au jour des expériences secrètes et des forces surnaturelles.', 'https://image.tmdb.org/t/p/original/49WJfeN0moxb9IPfGn8AIqMGskD.jpg', '2016-07-15'),
(4, 'The Last of Us', 'Vingt ans après qu’une pandémie a dévasté le monde, un survivant endurci doit escorter à travers les États-Unis une adolescente immunisée.', 'https://image.tmdb.org/t/p/original/uKvVjHNqB5VmOrdxqAt2F7J78ED.jpg', '2023-01-15'),
(5, 'Dark', 'La disparition de deux enfants dans la petite ville allemande de Winden expose les secrets et les liens cachés entre quatre familles, du passé au futur.', 'https://static.tvmaze.com/uploads/images/original_untouched/504/1262352.jpg', '2017-12-01');

-- SAISONS (Breaking Bad + Game of Thrones) --------------------
INSERT INTO saison (id, nom, resume, vignette, date_sortie, serie_id) VALUES
(1, 'Saison 1', 'Walter White, 50 ans, apprend sa maladie et fait ses premiers pas dans le business de la méthamphétamine aux côtés de Jesse Pinkman.', 'https://image.tmdb.org/t/p/original/ggFHVNu6YYI5L9pCfOacjizRGt.jpg', '2008-01-20', 1),
(2, 'Saison 2', 'Walt et Jesse s’associent avec le distributeur Tuco Salamanca, avec des conséquences de plus en plus violentes.', 'https://image.tmdb.org/t/p/original/ggFHVNu6YYI5L9pCfOacjizRGt.jpg', '2009-03-08', 1),
(3, 'Saison 3', 'Walt refuse l’argent de Gus Fring et reprend le laboratoire, pendant que Hank traque Heisenberg.', 'https://image.tmdb.org/t/p/original/ggFHVNu6YYI5L9pCfOacjizRGt.jpg', '2010-03-21', 1),
(4, 'Saison 4', 'La tension entre Walt et Gus atteint son paroxysme tandis que Jesse tente de trouver sa place.', 'https://image.tmdb.org/t/p/original/ggFHVNu6YYI5L9pCfOacjizRGt.jpg', '2011-07-17', 1),
(5, 'Saison 5', 'Walt, devenu Heisenberg, construit son empire avec Mike et Jesse, et doit échapper à la justice.', 'https://image.tmdb.org/t/p/original/ggFHVNu6YYI5L9pCfOacjizRGt.jpg', '2012-07-15', 1),
(6, 'Saison 1', 'Eddard Stark quitte Winterfell pour Port-Réal afin de servir le roi Robert Baratheon, tandis que les intrigues se multiplient.', 'https://image.tmdb.org/t/p/original/1XS1oqL89opfnbLl8WnZY1O1uJx.jpg', '2011-04-17', 2),
(7, 'Saison 2', 'La guerre des Cinq Rois fait rage après la mort du roi Robert Baratheon.', 'https://image.tmdb.org/t/p/original/1XS1oqL89opfnbLl8WnZY1O1uJx.jpg', '2012-04-01', 2),
(8, 'Saison 3', 'Les Stark et les Lannister poursuivent leur affrontement ; Robb Stark tente de sauver ses sœurs.', 'https://image.tmdb.org/t/p/original/1XS1oqL89opfnbLl8WnZY1O1uJx.jpg', '2013-03-31', 2),
(9, 'Saison 4', 'Les conséquences du mariage pourpre bouleversent l’équilibre des forces à Westeros.', 'https://image.tmdb.org/t/p/original/1XS1oqL89opfnbLl8WnZY1O1uJx.jpg', '2014-04-06', 2),
(10, 'Saison 5', 'Tyrion fuit Port-Réal, Daenerys règne à Meereen et Jon Snow rejoint la Garde de Nuit.', 'https://image.tmdb.org/t/p/original/1XS1oqL89opfnbLl8WnZY1O1uJx.jpg', '2015-04-12', 2),
(11, 'Saison 6', 'Les grandes maisons se relèvent de leurs défaites pendant que Jon Snow devient Lord Commandant.', 'https://image.tmdb.org/t/p/original/1XS1oqL89opfnbLl8WnZY1O1uJx.jpg', '2016-04-24', 2),
(12, 'Saison 7', 'Daenerys débarque à Westeros et Jon Snow tente de l’allier contre l’armée des morts.', 'https://image.tmdb.org/t/p/original/1XS1oqL89opfnbLl8WnZY1O1uJx.jpg', '2017-07-16', 2),
(13, 'Saison 8', 'Dernier affrontement entre les vivants et les morts, et lutte finale pour le Trône de Fer.', 'https://image.tmdb.org/t/p/original/1XS1oqL89opfnbLl8WnZY1O1uJx.jpg', '2019-04-14', 2);

-- SAISONS (Stranger Things + The Last of Us + Dark) -----------
INSERT INTO saison (id, nom, resume, vignette, date_sortie, serie_id) VALUES
(14, 'Saison 1', 'Will Byers disparaît et une jeune fille aux pouvoirs étranges apparaît dans la vie de ses amis.', 'https://image.tmdb.org/t/p/original/49WJfeN0moxb9IPfGn8AIqMGskD.jpg', '2016-07-15', 3),
(15, 'Saison 2', 'Un an après, Will est hanté par le Monde à l’Envers et une nouvelle créature le menace.', 'https://image.tmdb.org/t/p/original/49WJfeN0moxb9IPfGn8AIqMGskD.jpg', '2017-10-27', 3),
(16, 'Saison 3', 'À l’été 1985, le Starcourt Mall cache une menace soviétique liée au Monde à l’Envers.', 'https://image.tmdb.org/t/p/original/49WJfeN0moxb9IPfGn8AIqMGskD.jpg', '2019-07-04', 3),
(17, 'Saison 4', 'Huit mois après, une nouvelle terreur surgit : Vecna cible les adolescents de Hawkins.', 'https://image.tmdb.org/t/p/original/49WJfeN0moxb9IPfGn8AIqMGskD.jpg', '2022-05-27', 3),
(18, 'Saison 1', 'Joel escorte Ellie à travers les États-Unis post-apocalyptiques pour rejoindre les Révolus.', 'https://image.tmdb.org/t/p/original/uKvVjHNqB5VmOrdxqAt2F7J78ED.jpg', '2023-01-15', 4),
(19, 'Saison 2', 'Cinq ans plus tard, Joel et Ellie vivent à Jackson, mais leur passé refait surface.', 'https://image.tmdb.org/t/p/original/uKvVjHNqB5VmOrdxqAt2F7J78ED.jpg', '2025-04-13', 4),
(20, 'Saison 1', 'La disparition de deux enfants et la découverte d’un portail temporel bouleversent Winden.', 'https://static.tvmaze.com/uploads/images/original_untouched/504/1262352.jpg', '2017-12-01', 5),
(21, 'Saison 2', 'Les familles de Winden explorent 1987 et l’avenir pour déjouer les manipulations d’Adam.', 'https://static.tvmaze.com/uploads/images/original_untouched/504/1262352.jpg', '2019-06-21', 5),
(22, 'Saison 3', 'Jonas et Martha tentent de briser le cycle et de sauver les deux mondes depuis le monde de l’origine.', 'https://static.tvmaze.com/uploads/images/original_untouched/504/1262352.jpg', '2020-06-27', 5);

-- EPISODES (Breaking Bad) -------------------------------------
INSERT INTO episode (id, saison_id, nom, resume, vignette, date_sortie, duree) VALUES
(1, 1, 'Chimie', 'Walter White apprend son cancer et découvre un ancien élève devenu dealer.', NULL, '2008-01-20', 58),
(2, 1, 'Le Chat dans le sac', 'Walt et Jesse doivent gérer les conséquences de leur premier coup.', NULL, '2008-01-27', 56),
(3, 1, 'Et le sac dans le fleuve', 'Les associés cherchent à effacer les traces de leur activité.', NULL, '2008-02-10', 56),
(4, 1, 'Le Cancer', 'Walt envisage un traitement coûteux et reprend contact avec son passé.', NULL, '2008-02-17', 58),
(5, 1, 'Gray Matter', 'Un dîner embarrassant avec ses anciens associés pousse Walt à changer d’approche.', NULL, '2008-02-24', 56),
(6, 1, 'Crazy Handful of Nothin’', 'L’apparition de Heisenberg face à Tuco marque un tournant.', NULL, '2008-03-02', 58),
(7, 1, 'Une histoire de folie', 'Le deal avec Tuco tourne court et l’affaire s’annonce explosive.', NULL, '2008-03-09', 58),
(8, 2, 'Sans limites', 'Walt et Jesse cherchent un nouveau distributeur.', NULL, '2009-03-08', 47),
(9, 2, 'Grillés', 'Un rendez-vous tendu avec Tuco dégénère dans le désert.', NULL, '2009-03-15', 47),
(10, 2, 'Piqué par une abeille morte', 'Walt tente de reprendre une vie normale malgré les ennuis.', NULL, '2009-03-22', 47);

-- EPISODES (Game of Thrones S1) -------------------------------
INSERT INTO episode (id, saison_id, nom, resume, vignette, date_sortie, duree) VALUES
(11, 6, 'L’Hiver vient', 'Le roi Robert demande à Eddard Stark de devenir Protecteur du royaume.', NULL, '2011-04-17', 62),
(12, 6, 'La Route Royale', 'Catelyn part alerter Ned tandis que les tensions grandissent à Port-Réal.', NULL, '2011-04-24', 56),
(13, 6, 'Lord Snow', 'Ned découvre les rouages du pouvoir et les secrets de la cour.', NULL, '2011-05-01', 58),
(14, 6, 'Infirmes, bâtards et choses brisées', 'Tyrion rend visite à Bran ; Jon Snow trouve sa place au Mur.', NULL, '2011-05-08', 56),
(15, 6, 'Le Lion et le Loup', 'Catelyn arrête Tyrion et l’emmène à Eyrie.', NULL, '2011-05-15', 55),
(16, 6, 'Une couronne dorée', 'La guerre menace après l’arrestation de Tyrion Lannister.', NULL, '2011-05-22', 53),
(17, 6, 'Gagner ou mourir', 'Ned affronte la vérité sur les héritiers du trône.', NULL, '2011-05-29', 58),
(18, 6, 'Le Point de rupture', 'La rupture entre Stark et Lannister devient inévitable.', NULL, '2011-06-05', 53),
(19, 6, 'Baelor', 'Ned Stark prend une décision fatale pour sauver ses filles.', NULL, '2011-06-12', 67),
(20, 6, 'Feu et sang', 'Les dragons naissent au-delà de la mer, avec Daenerys.', NULL, '2011-06-19', 53);

-- EPISODES (Stranger Things S1) --------------------------------
INSERT INTO episode (id, saison_id, nom, resume, vignette, date_sortie, duree) VALUES
(21, 14, 'Chapitre un : La disparition de Will Byers', 'Will disparaît à vélo et une étrange jeune fille surgit.', NULL, '2016-07-15', 52),
(22, 14, 'Chapitre deux : L’Étrange', 'Onze fait confiance à Mike tandis que la ville cherche Will.', NULL, '2016-07-15', 56),
(23, 14, 'Chapitre trois : La Chose', 'Les amis découvrent des indices troublants sur le Monde à l’Envers.', NULL, '2016-07-15', 51),
(24, 14, 'Chapitre quatre : Le Corps', 'Un corps est retrouvé, mais les amis refusent d’y croire.', NULL, '2016-07-15', 53),
(25, 14, 'Chapitre cinq : La Taupe', 'Nancy et Jonathan remontent la piste du monstre.', NULL, '2016-07-15', 52),
(26, 14, 'Chapitre six : Le Monstre', 'Onze s’enfuit et Hopper s’approche de la vérité.', NULL, '2016-07-15', 46),
(27, 14, 'Chapitre sept : Le Bain', 'Onze aide les amis à localiser Will.', NULL, '2016-07-15', 42),
(28, 14, 'Chapitre huit : Le Sous-sol', 'Le sauvetage de Will et le face-à-face avec le Démogorgon.', NULL, '2016-07-15', 55);

-- EPISODES (The Last of Us S1) ---------------------------------
INSERT INTO episode (id, saison_id, nom, resume, vignette, date_sortie, duree) VALUES
(29, 18, 'Quand tu es perdu dans les ténèbres', 'L’épidémie éclate ; Joel perd tout et le monde bascule.', NULL, '2023-01-15', 81),
(30, 18, 'Les Infectés', 'Joel et Tess découvrent l’état d’Ellie.', NULL, '2023-01-22', 56),
(31, 18, 'Très, très longtemps', 'Bill et Frank, une histoire d’amour dans un monde brisé.', NULL, '2023-01-29', 57),
(32, 18, 'S’il te plaît, prends ma main', 'Ellie et Joel traversent des ruines hostiles.', NULL, '2023-02-05', 49),
(33, 18, 'Endurer et survivre', 'Henry et Sam, frères en fuite, croisent la route de Joel.', NULL, '2023-02-12', 57),
(34, 18, 'Parent, ami ou autre', 'Kathleen mène la chasse dans Kansas City.', NULL, '2023-02-19', 54),
(35, 18, 'Seuls', 'Ellie fait une rencontre qui change sa vie.', NULL, '2023-02-26', 56),
(36, 18, 'Quand nous sommes dans le besoin', 'David révélera son vrai visage à Ellie.', NULL, '2023-03-05', 48),
(37, 18, 'Cherchez la lumière', 'Le voyage se termine à l’hôpital des Lucioles.', NULL, '2023-03-12', 63);

-- EPISODES (Dark S1) -------------------------------------------
INSERT INTO episode (id, saison_id, nom, resume, vignette, date_sortie, duree) VALUES
(38, 20, 'Secrets', 'Ulrich soupçonne un vieil habitant de Winden.', NULL, '2017-12-01', 53),
(39, 20, 'Mensonges', 'La police cherche Mikkel pendant que Jonas s’interroge.', NULL, '2017-12-01', 48),
(40, 20, 'Passé présent', 'Le passé des familles resurgit de façon troublante.', NULL, '2017-12-01', 55),
(41, 20, 'Double vie', 'Des portraits d’identité révèlent d’étranges ressemblances.', NULL, '2017-12-01', 52),
(42, 20, 'Vérités', 'Les recherches de Jonas le mènent vers la grotte.', NULL, '2017-12-01', 51),
(43, 20, 'Sic Mundus Creatus Est', 'Jonas découvre un portail vers 1986.', NULL, '2017-12-01', 52),
(44, 20, 'Carrefour', 'Les chemins des quatre familles se croisent entre les époques.', NULL, '2017-12-01', 52),
(45, 20, 'Tout ce qui est caché', 'Claudia remonte des pistes au-delà du temps.', NULL, '2017-12-01', 56),
(46, 20, 'Tout se répète', 'La boucle temporelle se referme sur Winden.', NULL, '2017-12-01', 53),
(47, 20, 'Alpha et Oméga', 'La vérité sur Mikkel et Jonas éclate au grand jour.', NULL, '2017-12-01', 55);
