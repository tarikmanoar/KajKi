-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2020 at 11:57 PM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_kajki`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Accounting / Finanace', 'accounting-finanace', 'flaticon-calculator', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(2, 'Automotive Jobs', 'automotive-jobs', 'flaticon-wrench', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(3, 'Construction / Facilities', 'construction-facilities', 'flaticon-worker', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(4, 'Telecommunications', 'telecommunications', 'flaticon-telecommunications', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(5, 'Healthcare', 'healthcare', 'flaticon-stethoscope', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(6, 'Design, Art & Multimedia', 'design-art-multimedia', 'flaticon-computer-graphic', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(7, 'Transportation & Logistics', 'transportation-logistics', 'flaticon-trolley', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(8, 'Restaurant / Food Service', 'restaurant-food-service', 'flaticon-restaurant', '2020-03-08 14:45:50', '2020-03-08 14:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `cname`, `slug`, `address`, `phone`, `email`, `website`, `logo`, `cover_photo`, `slogan`, `description`, `created_at`, `updated_at`) VALUES
(1, 19, 'Huels-Kuhn', 'huels-kuhn', '23321 Prosacco Fall\nEast Elsie, IL 28660', '+1-872-673-2033', 'edwin.brown@example.com', 'kling.org', 'bag.png', 'cv2.png', '\"All the News That\'s Fit to Print\"', 'March Hare. \'It was the BEST butter,\' the March Hare meekly replied. \'Yes, but some crumbs must have got in as well,\' the Hatter grumbled: \'you shouldn\'t have put it in with the bread-knife.\' The.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(2, 12, 'Monahan-Kris', 'monahan-kris', '835 Mac Parkway\nLangoshchester, WA 25726-0783', '1-247-991-8464 x922', 'haven05@example.org', 'hoppe.com', 'logo.jpg', 'cv2.png', '\"The Few. The Proud. The Marines\"', 'She had just succeeded in curving it down into a graceful zigzag, and was going to dive in among the leaves, which she found to be nothing but the tops of the trees under which she had been.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(3, 14, 'Stanton-Goldner', 'stanton-goldner', '383 D\'Amore Corners Suite 956\nEast Cleo, UT 42303-8758', '+1 (456) 505-5181', 'madalyn.johnston@example.com', 'klein.com', 'man.jpg', 'cv2.png', '\"Maybe she\'s born with it. Maybe it\'s Maybelline.\"', 'King, \'that saves a world of trouble, you know, as we needn\'t try to find any. And yet I don\'t know,\' he went on, spreading out the verses on his knee, and looking at them with one eye; \'I seem to.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(4, 11, 'Ebert, Sporer and Stark', 'ebert-sporer-and-stark', '538 Dickinson Hill\nPort Matteofort, NY 16944', '664-710-7909', 'jordon77@example.net', 'gaylord.net', 'man.jpg', 'cv1.jpg', '\"We Power Transactions That Drive Commerce\"', 'King, and the Queen, who were all talking at once, while all the rest were quite silent, and looked very uncomfortable. The moment Alice appeared, she was appealed to by all three to settle the.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(5, 5, 'Macejkovic PLC', 'macejkovic-plc', '57206 Senger Spurs Apt. 182\nLake Trinityshire, WV 09582-8668', '1-703-572-6351 x8189', 'welch.letitia@example.org', 'turner.org', 'bag.png', 'cv2.png', '\"Advancement Through Technology\"', 'I shall think nothing of tumbling down stairs! How brave they\'ll all think me at home! Why, I wouldn\'t say anything about it, even if I fell off the top of the house!\' (Which was very likely true.).', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(6, 4, 'Hammes, Romaguera and Robel', 'hammes-romaguera-and-robel', '1603 Murphy Ports\nCristianborough, NV 45109', '790-729-6531', 'towne.alvera@example.org', 'kreiger.com', 'logo.jpg', 'cv1.jpg', '\"It Does Exactly What It Says on the Tin.\"', 'Caterpillar took the hookah out of its mouth and yawned once or twice, and shook itself. Then it got down off the mushroom, and crawled away in the grass, merely remarking as it went, \'One side will.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(7, 18, 'Donnelly, Volkman and Hartmann', 'donnelly-volkman-and-hartmann', '577 Bonnie Mission Apt. 783\nSipesfort, MI 92939', '960-653-1349 x9780', 'gstroman@example.org', 'miller.org', 'man.jpg', 'cv1.jpg', '\"We Power Transactions That Drive Commerce\"', 'WOULD twist itself round and look up in her face, with such a puzzled expression that she could not help bursting out laughing: and when she had got its head down, and was going to begin again, it.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(8, 2, 'Heaney-Wyman', 'heaney-wyman', '33179 Tyler Run Suite 638\nSchuppeshire, FL 02240', '1-808-738-2078 x300', 'oflatley@example.org', 'breitenberg.info', 'logo.jpg', 'cv1.jpg', '\"We Power Transactions That Drive Commerce\"', 'Alice thought she had never seen such a curious croquet-ground in her life; it was all ridges and furrows; the balls were live hedgehogs, the mallets live flamingoes, and the soldiers had to double.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(9, 20, 'McKenzie-Kertzmann', 'mckenzie-kertzmann', '269 Norval Stravenue\nNorth Hubertfurt, AZ 23221-3182', '1-824-284-7296 x77849', 'ismith@example.org', 'hill.com', 'bag.png', 'cv2.png', '\"It Does Exactly What It Says on the Tin.\"', 'Alice dodged behind a great thistle, to keep herself from being run over; and the moment she appeared on the other side, the puppy made another rush at the stick, and tumbled head over heels in its.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(10, 19, 'Dicki-Hermann', 'dicki-hermann', '519 Amalia Trail Suite 973\nPort Shanna, WA 37238', '401.830.3602 x79516', 'wilkinson.enoch@example.org', 'stoltenberg.net', 'logo.jpg', 'cv1.jpg', '\"Advancement Through Technology\"', 'Queen of Hearts, and I had to sing \"Twinkle, twinkle, little bat! How I wonder what you\'re at!\" You know the song, perhaps?\' \'I\'ve heard something like it,\' said Alice. \'It goes on, you know,\' the.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(11, 13, 'Gulgowski Ltd', 'gulgowski-ltd', '669 Aditya Forge Apt. 435\nStefaniemouth, HI 57195', '496-605-0833', 'merl15@example.com', 'olson.com', 'logo.jpg', 'cv1.jpg', '\"Like a Good Neighbor, State Farm is There\"', 'Queen\'s shrill cries to the voice of the shepherd boy--and the sneeze of the baby, the shriek of the Gryphon, and all the other queer noises, would change (she knew) to the confused clamour of the.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(12, 18, 'Gislason, Mann and Buckridge', 'gislason-mann-and-buckridge', '34690 Dickens Fall\nWest Eveline, NJ 63058', '+13129867004', 'emmy.fay@example.org', 'bednar.com', 'logo.jpg', 'cv1.jpg', '\"The Few. The Proud. The Marines\"', 'She had just succeeded in curving it down into a graceful zigzag, and was going to dive in among the leaves, which she found to be nothing but the tops of the trees under which she had been.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(13, 15, 'O\'Conner-Douglas', 'oconner-douglas', '80860 Tiffany Island Apt. 470\nEast Amani, NV 50000-8127', '+1 (635) 417-3060', 'kari94@example.org', 'gutmann.org', 'bag.png', 'cv1.jpg', '\"All the News That\'s Fit to Print\"', 'Duchess and the baby--the fire-irons came first; then followed a shower of saucepans, plates, and dishes. The Duchess took no notice of them even when they hit her; and the baby was howling so much.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(14, 19, 'Zemlak-Spencer', 'zemlak-spencer', '1362 Brian Point Suite 614\nDorisborough, MA 47431', '1-927-721-1975', 'matteo50@example.org', 'botsford.com', 'bag.png', 'cv2.png', '\"Maybe she\'s born with it. Maybe it\'s Maybelline.\"', 'No, I\'ve made up my mind about it; if I\'m Mabel, I\'ll stay down here! It\'ll be no use their putting their heads down and saying \"Come up again, dear!\" I shall only look up and say \"Who am I then?.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(15, 1, 'Hagenes-Bergnaum', 'hagenes-bergnaum', '726 Alexie Crossroad Apt. 369\nZechariahland, MI 20438', '324-957-7767', 'brown.lysanne@example.org', 'williamson.com', 'logo.jpg', 'cv2.png', '\"The Few. The Proud. The Marines\"', 'The cook threw a frying-pan after her as she went out, but it just missed her. Alice caught the baby with some difficulty, as it was a queer-shaped little creature, and held out its arms and legs in.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(16, 19, 'Robel-Klocko', 'robel-klocko', '273 Howell Ford\nNorth Codyshire, ID 73252', '1-730-568-6615 x99507', 'casandra.anderson@example.com', 'nader.com', 'man.jpg', 'cv1.jpg', '\"Like a Good Neighbor, State Farm is There\"', 'Duchess and the baby--the fire-irons came first; then followed a shower of saucepans, plates, and dishes. The Duchess took no notice of them even when they hit her; and the baby was howling so much.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(17, 20, 'Bashirian, Hansen and Howell', 'bashirian-hansen-and-howell', '162 Frami Route\nWest Deshawn, UT 20791-5421', '+1.463.406.4275', 'jordy.hudson@example.com', 'huels.com', 'logo.jpg', 'cv2.png', '\"We Power Transactions That Drive Commerce\"', 'I think.\' And she began thinking over other children she knew, who might do very well as pigs, and was just saying to herself, \'if one only knew the right way to change them--\' when she was a little.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(18, 14, 'Mueller, Larkin and Mitchell', 'mueller-larkin-and-mitchell', '86429 Gregorio Summit Suite 825\nColeport, GA 44291-3587', '+1 (652) 318-3496', 'reilly.marcelle@example.org', 'bartell.biz', 'bag.png', 'cv1.jpg', '\"Like a Good Neighbor, State Farm is There\"', 'Hatter: \'but you could keep it to half-past one as long as you liked.\' \'Is that the way YOU manage?\' Alice asked. The Hatter shook his head mournfully. \'Not I!\' he replied. \'We quarrelled last.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(19, 13, 'Schowalter, Kerluke and Muller', 'schowalter-kerluke-and-muller', '6924 Gavin Fort Apt. 671\nDedricmouth, TX 04597', '517-819-8654 x96545', 'nitzsche.leif@example.com', 'hegmann.com', 'man.jpg', 'cv2.png', '\"Maybe she\'s born with it. Maybe it\'s Maybelline.\"', 'Hatter. This piece of rudeness was more than Alice could bear: she got up in great disgust, and walked off; the Dormouse fell asleep instantly, and neither of the others took the least notice of her.', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(20, 17, 'Cronin-Willms', 'cronin-willms', '33817 Quitzon Forks Apt. 642\nPort Lavon, SD 91151', '1-749-455-5002', 'towne.addie@example.org', 'lemke.biz', 'logo.jpg', 'cv2.png', '\"Like a Good Neighbor, State Farm is There\"', 'I could, if I only knew how to begin.\' For, you see, so many out-of-the-way things had happened lately, that Alice had begun to think that very few things indeed were really impossible. There seemed.', '2020-03-08 14:45:50', '2020-03-08 14:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Tarik Manoar', 'Jashore', '01945609799', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `album_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `last_date` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` int(11) NOT NULL,
  `number_of_vacancy` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `company_id`, `category_id`, `title`, `slug`, `description`, `position`, `roles`, `address`, `job_type`, `status`, `last_date`, `salary`, `gender`, `experience`, `number_of_vacancy`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 7, 'Alice. \'Why?\' \'IT DOES THE BOOTS AND SHOES.\' the.', 'alice-why-it-does-the-boots-and-shoes-the', 'Pigeon the opportunity of adding, \'You\'re looking for eggs, I know THAT well enough; and what does it matter to me whether you\'re a little girl or a serpent?\' \'It matters a good deal to ME,\' said.', 'Stock Broker', 'NOT, being made entirely of cardboard.) \'All right, so far,\' said the Cat. \'I said pig,\' replied Alice; \'and I wish I hadn\'t begun my tea--not above a week or so--and what with the next moment she.', '1413 Elnora Center Suite 780\nWest Mazie, GA 77211-1275', 'Full Time', 1, '1974-01-04', '24603', 'Female', 10, 3, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(2, 13, 18, 6, 'The Mouse did not like the look of things at all, at.', 'the-mouse-did-not-like-the-look-of-things-at-all-at', 'And have grown most uncommonly fat; Yet you turned a back-somersault in at the door-- Pray, what is the reason of that?\' \'In my youth,\' said the sage, as he shook his grey locks, \'I kept all my.', 'Health Specialties Teacher', 'Shall I try the first figure,\' said the King: \'however, it may kiss my hand if it began ordering people about like mad things all this time, and was immediately suppressed by the end of every line.', '744 Eryn Ranch\nPort Pearlie, MS 65602', 'Full Time', 0, '1973-04-21', '38787', 'Male', 7, 7, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(3, 13, 18, 4, 'Eaglet. \'I don\'t think it\'s at all the jelly-fish out.', 'eaglet-i-dont-think-its-at-all-the-jelly-fish-out', 'Queen, turning purple. \'I won\'t!\' said Alice. \'Off with her head!\' the Queen shouted at the top of her voice. Nobody moved. \'Who cares for you?\' said Alice, (she had grown to her full size by this.', 'Financial Specialist', 'M?\' said Alice. \'Exactly so,\' said Alice. \'Who\'s making personal remarks now?\' the Hatter continued, \'in this way:-- \"Up above the world you fly, Like a tea-tray in the air. This time there could be.', '9044 Keven Plains Suite 611\nNorth Elinor, WI 99144-4416', 'Full Time', 1, '1974-12-08', '30542', 'Female', 7, 9, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(4, 3, 3, 8, 'Rabbit say, \'A barrowful of WHAT?\' thought Alice; \'I.', 'rabbit-say-a-barrowful-of-what-thought-alice-i', 'However, \'jury-men\' would have done just as well. The twelve jurors were all writing very busily on slates. \'What are they doing?\' Alice whispered to the Gryphon. \'They can\'t have anything to put.', 'Taper', 'King was the White Rabbit was no one else seemed inclined to say a word, but slowly followed her back to my right size: the next verse,\' the Gryphon interrupted in a very curious thing, and she went.', '7162 Llewellyn Rapid\nReichelfort, ME 98225-6184', 'Full Time', 1, '1973-06-28', '20498', 'Male', 6, 3, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(5, 4, 5, 5, 'March Hare said to the puppy; whereupon the puppy.', 'march-hare-said-to-the-puppy-whereupon-the-puppy', 'ARE a simpleton.\' Alice did not feel encouraged to ask any more questions about it, so she turned to the Mock Turtle, and said \'What else had you to learn?\' \'Well, there was Mystery,\' the Mock.', 'Producer', 'Dinah, tell me who YOU are, first.\' \'Why?\' said the King. \'It began with the Mouse was bristling all over, and she jumped up in great fear lest she should push the matter with it. There could be no.', '308 Kristin Ridge\nVerniehaven, MA 02485-3831', 'Full Time', 1, '2000-01-03', '35785', 'Female', 4, 8, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(6, 17, 15, 2, 'Lizard\'s slate-pencil, and the words don\'t FIT you,\'.', 'lizards-slate-pencil-and-the-words-dont-fit-you', 'The Antipathies, I think--\' (she was rather glad there WAS no one listening, this time, as it didn\'t sound at all the right word) \'--but I shall have to ask them what the name of the country is, you.', 'Truck Driver', 'Alice soon began talking to him,\' said Alice sharply, for she had looked under it, and behind it when she had asked it aloud; and in another minute there was room for her. \'I can tell you just now.', '4262 Wade Passage Apt. 179\nEast Skylashire, MO 29133-0761', 'Casual', 0, '1971-06-14', '15891', 'Female', 2, 9, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(7, 17, 10, 1, 'Alice; \'it\'s laid for a minute or two, they began.', 'alice-its-laid-for-a-minute-or-two-they-began', 'Alice thought to herself. \'I dare say you\'re wondering why I don\'t put my arm round your waist,\' the Duchess said after a pause: \'the reason is, that I\'m doubtful about the temper of your flamingo.', 'Medical Assistant', 'Latin Grammar, \'A mouse--of a mouse--to a mouse--a mouse--O mouse!\') The Mouse only shook its head down, and nobody spoke for some time in silence: at last the Mock Turtle, \'but if they do, why then.', '93485 Spinka Plaza\nNew Svenbury, WY 73238-9787', 'Casual', 1, '1986-06-29', '12666', 'Any', 7, 7, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(8, 20, 18, 2, 'Alice could bear: she got up in great disgust, and.', 'alice-could-bear-she-got-up-in-great-disgust-and', 'ARE OLD, FATHER WILLIAM,\"\' said the Caterpillar. Alice folded her hands, and began:-- \'You are old, Father William,\' the young man said, \'And your hair has become very white; And yet you incessantly.', 'Mine Cutting Machine Operator', 'There seemed to have wondered at this, but at any rate,\' said Alice: \'I don\'t see,\' said the Mouse was speaking, so that it was not a regular rule: you invented it just missed her. Alice caught the.', '78017 Marc Roads\nPort Jillianchester, OH 79358-7282', 'Casual', 1, '1990-05-31', '25152', 'Male', 2, 3, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(9, 19, 9, 1, 'It did so indeed, and much sooner than she had known.', 'it-did-so-indeed-and-much-sooner-than-she-had-known', 'And she\'s such a capital one for catching mice--oh, I beg your pardon!\' cried Alice again, for this time the Mouse was bristling all over, and she felt certain it must be really offended. \'We won\'t.', 'Tailor', 'But I\'ve got to the shore. CHAPTER III. A Caucus-Race and a Canary called out to sea. So they got settled down in a tone of great dismay, and began singing in its sleep \'Twinkle, twinkle, twinkle.', '806 Myah Via Apt. 286\nSouth Suzanne, NM 98289-9871', 'Part Time', 0, '1979-12-16', '26965', 'Male', 3, 1, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(10, 9, 16, 7, 'She pitied him deeply. \'What is it?\' Alice panted as.', 'she-pitied-him-deeply-what-is-it-alice-panted-as', 'Queen of Hearts, she made some tarts, All on a summer day: The Knave of Hearts, he stole those tarts, And took them quite away!\' \'Consider your verdict,\' the King said to the jury, and the jury.', 'Broadcast Technician', 'Lizard in head downwards, and the shrill voice of the deepest contempt. \'I\'ve seen a rabbit with either a waistcoat-pocket, or a serpent?\' \'It matters a good deal until she had brought herself down.', '301 Pascale Crossroad Suite 702\nEast Pink, OK 32191', 'Casual', 0, '2000-02-19', '44681', 'Male', 7, 7, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(11, 14, 14, 2, 'Queen,\' and she felt unhappy. \'It was a dead silence.', 'queen-and-she-felt-unhappy-it-was-a-dead-silence', 'The Caterpillar was the first to speak. \'What size do you want to be?\' it asked. \'Oh, I\'m not particular as to size,\' Alice hastily replied; \'only one doesn\'t like changing so often, you know.\' \'I.', 'Maid', 'Queen,\' and she ran across the garden, and I had not noticed before, and she crossed her hands up to Alice, they all cheered. Alice thought to herself. (Alice had no pictures or conversations?\' So.', '826 Williamson Shoals Apt. 606\nNorth Elfriedaland, SC 70530', 'Part Time', 0, '1983-06-08', '26866', 'Female', 4, 5, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(12, 20, 4, 4, 'What happened to me! When I used to it!\' pleaded poor.', 'what-happened-to-me-when-i-used-to-it-pleaded-poor', 'Down, down, down. There was nothing else to do, so Alice soon began talking again. \'Dinah\'ll miss me very much to-night, I should think!\' (Dinah was the cat.) \'I hope they\'ll remember her saucer of.', 'Pile-Driver Operator', 'Queen, the royal children; there were ten of them, and considered a little, and then keep tight hold of its mouth open, gazing up into a line along the passage into the open air. \'IF I don\'t keep.', '6112 Josephine Ramp\nPurdyview, AZ 77068', 'Full Time', 0, '1994-01-19', '38582', 'Male', 9, 5, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(13, 15, 17, 6, 'Either the well was very glad that it was very hot.', 'either-the-well-was-very-glad-that-it-was-very-hot', 'A little bright-eyed terrier, you know, with oh, such long curly brown hair! And it\'ll fetch things when you throw them, and it\'ll sit up and beg for its dinner, and all sorts of things--I can\'t.', 'Plant and System Operator', 'Stop this moment, and fetch me a pair of white kid gloves: she took up the other, trying every door, she ran off at once took up the chimney, and said to Alice, \'Have you seen the Mock Turtle said.', '7625 Johnson Square Apt. 000\nLake Zelda, MA 28755-3427', 'Part Time', 0, '1982-12-29', '35157', 'Female', 10, 3, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(14, 2, 20, 2, 'White Rabbit; \'in fact, there\'s nothing written on.', 'white-rabbit-in-fact-theres-nothing-written-on', 'The master was an old Turtle--we used to call him Tortoise--\' \'Why did you call him Tortoise, if he wasn\'t one?\' Alice asked. \'We called him Tortoise because he taught us,\' said the Mock Turtle.', 'Precision Printing Worker', 'Queen,\' and she dropped it hastily, just in time to wash the things get used to do:-- \'How doth the little creature down, and felt quite unhappy at the place where it had no pictures or.', '8005 Champlin Landing\nPort Mason, DC 02272-1884', 'Full Time', 1, '1993-12-08', '15408', 'Male', 10, 8, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(15, 12, 18, 2, 'THAT. Then again--\"BEFORE SHE HAD THIS FIT--\" you.', 'that-then-again-before-she-had-this-fit-you', 'There was no \'One, two, three, and away,\' but they began running when they liked, and left off when they liked, so that it was not easy to know when the race was over. However, when they had been.', 'Radio and Television Announcer', 'I said \"What for?\"\' \'She boxed the Queen\'s shrill cries to the cur, \"Such a trial, dear Sir, With no jury or judge, would be worth the trouble of getting up and down looking for them, but they were.', '8459 Magnolia Garden Suite 827\nSouth Janetburgh, ID 96482-1396', 'Casual', 0, '1994-05-06', '42333', 'Any', 4, 2, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(16, 15, 15, 5, 'Alice to herself, as well go back, and see how he can.', 'alice-to-herself-as-well-go-back-and-see-how-he-can', 'I\'ve got to do,\' said Alice to herself, as she wandered about in the wood, \'is to grow to my right size again; and the second thing is to find my way into that lovely garden. I think that will be.', 'Plant and System Operator', 'It\'s by far the most confusing thing I know. Silence all round, if you like!\' the Duchess replied, in a twinkling! Half-past one, time for dinner!\' (\'I only wish they WOULD put their heads off?\'.', '888 Lucie Trace\nDavehaven, MI 28149-5155', 'Full Time', 1, '1992-03-06', '49386', 'Female', 7, 8, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(17, 11, 12, 3, 'Time as well as she could. The next witness would be.', 'time-as-well-as-she-could-the-next-witness-would-be', 'I fancied that kind of thing never happened, and now here I am in the middle of one! There ought to be a book written about me, that there ought! And when I grow up, I\'ll write one--but I\'m grown up.', 'Credit Analyst', 'CURTSEYING as you\'re falling through the doorway; \'and even if my head would go anywhere without a grin,\' thought Alice; \'I must go back and finish your story!\' Alice called out to sea as you say.', '307 Emilio Lights Suite 742\nLake Erika, OK 82460', 'Part Time', 0, '2002-10-29', '30729', 'Any', 6, 3, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(18, 18, 19, 5, 'Bill\'s place for a baby: altogether Alice did not.', 'bills-place-for-a-baby-altogether-alice-did-not', 'King in a very grave voice, \'until all the jurymen are back in their proper places--ALL,\' he repeated with great emphasis, looking hard at Alice as he said do. Alice looked at the jury-box, and saw.', 'Claims Examiner', 'Hatter: \'but you could keep it to be talking in his confusion he bit a large canvas bag, which tied up at the sudden change, but she ran off as hard as he could think of any use, now,\' thought poor.', '491 Jeffery Drive Apt. 193\nRathfurt, WY 45754-9289', 'Full Time', 0, '2004-01-05', '23027', 'Female', 9, 2, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(19, 8, 15, 3, 'This of course, to begin with.\' \'A barrowful of.', 'this-of-course-to-begin-with-a-barrowful-of', 'French mouse, come over with William the Conqueror.\' (For, with all her knowledge of history, Alice had no very clear notion how long ago anything had happened.) So she began again: \'Ou est ma.', 'Coil Winders', 'I shall only look up in spite of all the rest, Between yourself and me.\' \'That\'s the judge,\' she said to itself \'The Duchess! The Duchess! Oh my dear paws! Oh my fur and whiskers! She\'ll get me.', '645 Tromp Center\nEast Bryonburgh, TN 40570', 'Full Time', 0, '1989-11-21', '47888', 'Any', 10, 5, '2020-03-08 14:45:51', '2020-03-08 14:45:51'),
(20, 10, 16, 5, 'Rabbit in a low, timid voice, \'If you didn\'t sign.', 'rabbit-in-a-low-timid-voice-if-you-didnt-sign', 'WOULD always get into her eyes--and still as she listened, or seemed to listen, the whole place around her became alive with the strange creatures of her little sister\'s dream. The long grass.', 'Substance Abuse Social Worker', 'I suppose.\' So she tucked it away under her arm, and timidly said \'Consider, my dear: she is of yours.\"\' \'Oh, I BEG your pardon!\' she exclaimed in a sulky tone, as it could go, and making quite a.', '984 Volkman Ways Apt. 111\nNew Laurianneberg, TX 73652', 'Full Time', 1, '1991-12-17', '37843', 'Male', 8, 10, '2020-03-08 14:45:51', '2020-03-08 14:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `job_user`
--

CREATE TABLE `job_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_10_31_105518_create_contacts_table', 1),
(4, '2019_10_31_171536_create_albums_table', 1),
(5, '2019_10_31_171719_create_images_table', 1),
(6, '2019_11_02_113124_create_profiles_table', 1),
(7, '2019_11_02_113216_create_companies_table', 1),
(8, '2019_11_02_113241_create_categories_table', 1),
(9, '2019_11_02_113413_create_jobs_table', 1),
(10, '2019_11_02_115735_create_job_user_table', 1),
(11, '2019_11_02_115912_create_favourites_table', 1),
(12, '2019_11_04_235954_add_phone_number_to_profiles_table', 1),
(13, '2019_11_13_000520_add_column_to_jobs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_latter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `address`, `phone_number`, `gender`, `dob`, `experience`, `bio`, `cover_latter`, `resume`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 5, '18154 Harber Shores\nLake Collinberg, CA 46285-7318', '(709) 798-2589 x4115', 'Male', '1997-08-29', 'Good', 'As soon as she was trying to touch her. \'Poor little thing!\' It did so indeed.', 'Arithmetic--Ambition, Distraction, Uglification, and Derision.\' \'I never.', 'Eel4a.pdf', 'man.jpg', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(2, 10, '7535 Schuster Park Suite 736\nMyriamborough, IA 99520', '717-959-3417', 'Male', '1997-10-23', 'Good', 'There was not much like keeping so close to her great delight it fitted! Alice.', 'Alice went on, turning to Alice: he had come to the Knave \'Turn them over!\'.', 'Eel4a.pdf', 'bag.png', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(3, 9, '211 Isaias Center Apt. 054\nJoannieland, MI 50945', '+1 (423) 479-9085', 'Male', '1996-09-05', 'Good', 'Alice to herself. \'I dare say you never even introduced to a day-school, too,\'.', 'Hatter, \'you wouldn\'t talk about trouble!\' said the Caterpillar. \'Not QUITE.', 'Eel4a.pdf', 'bag.png', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(4, 7, '24665 Jameson Coves Suite 270\nFrancescaton, RI 59617-3095', '552-758-5565 x88752', 'Female', '1997-01-16', 'Good', 'Alice, very loudly and decidedly, and there she saw them, they set to.', 'Elsie, Lacie, and Tillie; and they lived at the picture.) \'Up, lazy thing!\'.', 'Eel4a.pdf', 'man.jpg', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(5, 12, '3866 Lakin Ranch Apt. 734\nLake Melodyview, MN 97090-0336', '337.953.9263 x43388', 'Male', '2003-11-11', 'Good', 'She was moving them about as she had got so close to her ear, and whispered.', 'Lory and an old crab, HE was.\' \'I never went to him,\' the Mock Turtle\'s heavy.', 'Eel4a.pdf', 'bag.png', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(6, 3, '3000 Derek Forges\nWest Titomouth, ND 49447-2043', '(802) 865-5738 x385', 'Female', '1997-03-15', 'Good', 'The Panther took pie-crust, and gravy, and meat, While the Duchess asked, with.', 'HE taught us Drawling, Stretching, and Fainting in Coils.\' \'What was THAT.', 'Eel4a.pdf', 'man.jpg', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(7, 10, '66294 Audrey Row\nLake Serena, RI 83465-1545', '+1-438-972-8521', 'Female', '2002-10-07', 'Good', 'What would become of you? I gave her answer. \'They\'re done with a sudden leap.', 'Mouse. \'Of course,\' the Dodo could not be denied, so she set to work nibbling.', 'Eel4a.pdf', 'man.jpg', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(8, 18, '6590 Effie Greens\nSouth Reyesport, NE 46341-1911', '673-775-6555', 'Female', '1995-11-26', 'Good', 'I must be Mabel after all, and I never heard of uglifying!\' it exclaimed. \'You.', 'March Hare, \'that \"I breathe when I grow up, I\'ll write one--but I\'m grown up.', 'Eel4a.pdf', 'man.jpg', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(9, 14, '4721 Becker Expressway Apt. 238\nEast Eldridgeton, NH 18032-7421', '(831) 534-1663 x604', 'Male', '2002-08-07', 'Good', 'Mock Turtle, capering wildly about. \'Change lobsters again!\' yelled the.', 'I only wish it was,\' said the King. The White Rabbit cried out, \'Silence in.', 'Eel4a.pdf', 'man.jpg', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(10, 9, '770 Christiansen Branch Suite 618\nJenkinshaven, OK 68854-3882', '613-883-3388', 'Female', '2004-08-22', 'Good', 'Ann! Mary Ann!\' said the King. \'I can\'t go no lower,\' said the Gryphon. \'Do.', 'Alice. \'I\'ve read that in some book, but I hadn\'t drunk quite so much!\' Alas!.', 'Eel4a.pdf', 'bag.png', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(11, 7, '3687 Collin Turnpike Suite 470\nAbnerfurt, NE 71531', '667.366.2862 x0729', 'Male', '2004-05-04', 'Good', 'Alice, as she picked her way through the wood. \'If it had struck her foot! She.', 'Alice, rather alarmed at the Gryphon went on. \'I do,\' Alice hastily replied.', 'Eel4a.pdf', 'man.jpg', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(12, 6, '95330 Wiegand Estate\nNew Casey, MO 34460-9674', '697-491-9181 x6726', 'Male', '1995-06-22', 'Good', 'And the Gryphon said, in a low, hurried tone. He looked at each other for some.', 'Pray how did you manage on the shingle--will you come to the Cheshire Cat: now.', 'Eel4a.pdf', 'bag.png', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(13, 12, '1264 Corrine Islands Suite 823\nSouth Mozellland, WY 17634-1442', '1-580-996-3613', 'Male', '2002-07-16', 'Good', 'Mock Turtle went on, \'you throw the--\' \'The lobsters!\' shouted the Queen in a.', 'Where CAN I have done that, you know,\' the Hatter grumbled: \'you shouldn\'t.', 'Eel4a.pdf', 'bag.png', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(14, 13, '806 Harber Manor Suite 297\nHeaneystad, TN 44542', '587-562-7649', 'Male', '1995-06-23', 'Good', 'In a minute or two, and the cool fountains. CHAPTER VIII. The Queen\'s argument.', 'Lobster Quadrille, that she still held the pieces of mushroom in her lessons.', 'Eel4a.pdf', 'bag.png', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(15, 19, '23910 Blake Garden\nPort Amandatown, KS 62734-3187', '(376) 878-9275', 'Male', '1999-04-23', 'Good', 'THEN--she found herself lying on the top of it. She went on growing, and, as.', 'But there seemed to be a book of rules for shutting people up like a.', 'Eel4a.pdf', 'bag.png', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(16, 6, '8641 Hamill Falls\nLorenshire, NV 93545-5891', '560-986-7047 x978', 'Male', '2002-03-13', 'Good', 'I can\'t be Mabel, for I know is, it would not give all else for two Pennyworth.', 'I chose,\' the Duchess to play croquet.\' The Frog-Footman repeated, in the.', 'Eel4a.pdf', 'bag.png', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(17, 10, '185 Maudie Squares\nNiamouth, KS 14258', '1-412-248-0497 x497', 'Female', '1995-10-15', 'Good', 'Alice \'without pictures or conversations in it, and yet it was perfectly.', 'King say in a deep sigh, \'I was a little nervous about this; \'for it might.', 'Eel4a.pdf', 'man.jpg', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(18, 18, '24746 Genoveva Villages Suite 790\nMarquardtville, AZ 11710', '441.227.1285 x70665', 'Female', '2002-04-22', 'Good', 'I think?\' \'I had NOT!\' cried the Gryphon, and, taking Alice by the English.', 'Footman continued in the world! Oh, my dear paws! Oh my fur and whiskers!.', 'Eel4a.pdf', 'bag.png', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(19, 7, '76389 Jadyn Ranch Apt. 768\nSouth Caesarport, LA 32654', '(203) 758-0318 x442', 'Male', '2002-06-24', 'Good', 'Alice, and sighing. \'It IS the same thing with you,\' said the Hatter.', 'Alice. \'Well, then,\' the Cat said, waving its tail about in all directions.', 'Eel4a.pdf', 'bag.png', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(20, 4, '912 Katelynn Unions\nOrloville, OH 61034-4033', '929.630.3950 x5569', 'Male', '1999-03-10', 'Good', 'Alice, (she had grown in the middle. Alice kept her waiting!\' Alice felt a.', 'I can\'t put it to half-past one as long as there was mouth enough for it to.', 'Eel4a.pdf', 'bag.png', '2020-03-08 14:45:50', '2020-03-08 14:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Hank Pouros', 'mireya27@example.org', 'employer', '2020-03-08 14:45:49', '$2y$10$VGJYBYP7.OHbWxO4WcVBq.UyFBna7YYNqMFo4Q.ZCfLaqHMAhXX8.', 'Em3maKSN5q', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(2, 'Demario Stokes', 'kallie.smith@example.com', 'employer', '2020-03-08 14:45:49', '$2y$10$uthJRYTafyxjhtGTJmdKWOB/YqyBSbz8pnIEIq9JEgU6qs6ApuXsm', 'DTvaDFrGU1', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(3, 'Gregory Boehm', 'xblick@example.org', 'employer', '2020-03-08 14:45:49', '$2y$10$hDSIDfnjOnnT1TyFBoX3Y.a/8.TCIH8roJgWHNH2oNanN9XrrvKhO', 'aKHQGNEpiH', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(4, 'Clare Stiedemann', 'bhoppe@example.net', 'employer', '2020-03-08 14:45:49', '$2y$10$gVDJ4mhyT/p.fD4YWgNk4OF5s6HYQ7oxQSCyUeP0K6u5f3SpWV9Kq', 'GYT3rYmozB', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(5, 'Kamron Hermiston', 'piper.oconner@example.com', 'employer', '2020-03-08 14:45:49', '$2y$10$y8vkbtSdxRf/6w2oW/IPK.zc4UpugqM1VPRl/7O.bKaxRcI4RJmLC', 'mJYrlfsuHH', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(6, 'Wilburn Orn Sr.', 'quitzon.hertha@example.com', 'seeker', '2020-03-08 14:45:49', '$2y$10$YfgRMa6NvXc1/9kzabW2UOhMq4W9tPWPpZi1yD3i0U0CDx7Xk0mRO', 'lrygOcDWtb', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(7, 'Alexandra Kerluke', 'kutch.neva@example.com', 'seeker', '2020-03-08 14:45:49', '$2y$10$HXKE6ogO7DCkoQL3sJvz8umf1U0GxaJM4FzMhbGhckEgCiQmUIZ6y', '4Um1ttH5oW', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(8, 'Chaz Monahan', 'becker.mario@example.org', 'seeker', '2020-03-08 14:45:49', '$2y$10$tRPmkpDsN5z3U7kMOr/nXee1LORdbJRBZw3DXk1Z3XEW9JcacNf2u', '5TI8KpjzkR', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(9, 'Abbey Kling', 'francisca49@example.com', 'employer', '2020-03-08 14:45:49', '$2y$10$NAYNxOsuDeAh4eTC4e8zuuevGiX4RWqrpQTymfzVVnFvho/Z57Y9a', 'gpde7Mt6G8', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(10, 'Meagan Greenfelder II', 'qlehner@example.org', 'seeker', '2020-03-08 14:45:49', '$2y$10$Tbfa1OI6T5DdUB1jxzvbkO5drK087UAXEVH7mVheyeVR25/mjGP0S', 'q3HVfv2L89', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(11, 'Prof. Uriel Conn', 'vada07@example.com', 'seeker', '2020-03-08 14:45:49', '$2y$10$i1MuZnEF89.NpQcbb/KvEu/ogsKcBqBKPhamKuKbVyQNOga2Xxjuu', 'PGVlQXdocY', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(12, 'Jacques Conn IV', 'davis.alfredo@example.net', 'employer', '2020-03-08 14:45:50', '$2y$10$0nDC7aAl8seDYFbBnO54a.KMNeq0kePW0Qf/GJRS6kREj35AomlzG', 'w5wuyEOfya', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(13, 'Tess Gislason', 'lhowell@example.com', 'seeker', '2020-03-08 14:45:50', '$2y$10$2uWydVY.l7fXJWZu8MyUGuLY.wZxcK3WnCCL.WSvlByaT6PzRnQ1.', 'sLKLO45wDu', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(14, 'Dr. Jayden Aufderhar PhD', 'dubuque.howard@example.org', 'seeker', '2020-03-08 14:45:50', '$2y$10$nM49LAzIw2ymz.gnVY/OJ.NyyuUGdkq/TSjrN4K8o4qIdPmIBkfJq', 'WsXG6LJavB', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(15, 'Declan Bechtelar', 'abshire.boris@example.org', 'employer', '2020-03-08 14:45:50', '$2y$10$wVJX9GFp1QAD7DNZx.0DP.8twI5r455WrsXDM7QvySz7KNT6L5P5y', 'jd5LfALDlf', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(16, 'Nicola Kuphal', 'vicenta52@example.org', 'employer', '2020-03-08 14:45:50', '$2y$10$dcH/BXv3tAxRGLMvmklGE.pPuwLaGiSayGrfm5DE.VZSVqOtKjTcW', '0Hsc17ZQPk', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(17, 'Sabrina Tremblay', 'finn.jacobson@example.org', 'employer', '2020-03-08 14:45:50', '$2y$10$72H.iba3c7ca.ofB3bcqnO1cFWcdVmD3W8XNfo/WiXN8V0WDOIQ7a', '4JoUHIM9Vv', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(18, 'Paolo Nikolaus', 'hilton80@example.org', 'employer', '2020-03-08 14:45:50', '$2y$10$eXOa4L/7LwF.n5YGFITJfOQ2vdvi5IEJYCUVNrAmkAg22OMpgSEvS', '9E3zdP6WeT', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(19, 'April Rippin', 'donnelly.lonny@example.org', 'seeker', '2020-03-08 14:45:50', '$2y$10$8LhSHKF0bYUXBRKn2xM2Ru3fyqefXlV121mH0fQDMZ3h6wlaX6XPu', 'ovdG67EIjz', '2020-03-08 14:45:50', '2020-03-08 14:45:50'),
(20, 'Reta Connelly', 'kendrick24@example.com', 'seeker', '2020-03-08 14:45:50', '$2y$10$0SzAwqCkG5TFUaMzZqMS0OsA.g12q7PjFDWTKKT5hP5gygTYovMHa', '0XKlB1twb4', '2020-03-08 14:45:50', '2020-03-08 14:45:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`),
  ADD UNIQUE KEY `companies_phone_unique` (`phone`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_phone_unique` (`phone`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_user_id_foreign` (`user_id`),
  ADD KEY `favourites_job_id_foreign` (`job_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`),
  ADD KEY `jobs_company_id_foreign` (`company_id`),
  ADD KEY `jobs_category_id_foreign` (`category_id`);

--
-- Indexes for table `job_user`
--
ALTER TABLE `job_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_user_user_id_foreign` (`user_id`),
  ADD KEY `job_user_job_id_foreign` (`job_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_phone_number_unique` (`phone_number`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `job_user`
--
ALTER TABLE `job_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_user`
--
ALTER TABLE `job_user`
  ADD CONSTRAINT `job_user_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
