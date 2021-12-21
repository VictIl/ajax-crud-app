-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 15 2021 г., 21:51
-- Версия сервера: 8.0.26
-- Версия PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `match`
--

-- --------------------------------------------------------

--
-- Структура таблицы `del`
--

CREATE TABLE `del` (
  `user_pl_id` int NOT NULL,
  `user_pl_access` tinyint(1) NOT NULL,
  `user_pl_password` varchar(300) NOT NULL DEFAULT '1',
  `user_pl_name` varchar(200) NOT NULL,
  `user_pl_song` varchar(200) NOT NULL,
  `user_pl_artist` varchar(200) NOT NULL,
  `user_pl_album` varchar(200) DEFAULT NULL,
  `user_pl_genre` int NOT NULL,
  `user_pl_img` varchar(300) NOT NULL DEFAULT 'default_music.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `del`
--

INSERT INTO `del` (`user_pl_id`, `user_pl_access`, `user_pl_password`, `user_pl_name`, `user_pl_song`, `user_pl_artist`, `user_pl_album`, `user_pl_genre`, `user_pl_img`) VALUES
(1, 0, '1', 'whatever', 'deam', 'reverie', NULL, 2, ''),
(2, 0, '1', 'whatever', 'deam', 'reverie', NULL, 2, 'NULL'),
(3, 0, '1', 'whatever', 'deam', 'reverie', '', 2, ''),
(4, 0, '$2y$10$6VX2k9.xsZVmciNhV2EliO0Kx7mnfBDfMT7SCcf4dYzw.X9m2kNYy', 'tab', 'now or never', 'halsey', '', 7, ''),
(5, 0, '$2y$10$6VX2k9.xsZVmciNhV2EliO0Kx7mnfBDfMT7SCcf4dYzw.X9m2kNYy', 'tab', 'mov', 'halsey', 'vb', 2, 'Arduino last2.png');

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `g_id` int NOT NULL,
  `g_genre` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`g_id`, `g_genre`) VALUES
(1, 'Pop'),
(2, 'Country'),
(3, 'Jazz'),
(4, 'Rock'),
(5, 'Hip hop'),
(6, 'Heavy metal'),
(7, 'Indie'),
(8, 'Alternative rock'),
(9, 'Blues'),
(10, 'Punk rock'),
(11, 'Folk music'),
(12, 'Rap');

-- --------------------------------------------------------

--
-- Структура таблицы `main`
--

CREATE TABLE `main` (
  `id` int NOT NULL,
  `song` varchar(55) NOT NULL,
  `artist` varchar(55) NOT NULL,
  `genre` int NOT NULL,
  `album` varchar(250) DEFAULT NULL,
  `review` int DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `main`
--

INSERT INTO `main` (`id`, `song`, `artist`, `genre`, `album`, `review`) VALUES
(1, 'Do I wanna know', 'Arctic Monkeys', 8, 'Do I wanna know', 5),
(2, 'Movements', 'Pham', 1, 'Feeling', 3),
(3, 'Highway to hell', 'AC/DC', 4, 'Back to black', 8),
(4, 'Killing you', 'Asking Alexandria', 6, 'The Black', 19),
(5, 'Blame', 'Bastille', 8, 'Pompeii', 21),
(6, 'toxic', 'Britney Spears', 1, '', 18),
(7, 'Candy shop', '50 cent', 5, 'In da club', 16),
(8, 'Miss you', 'corpse', 10, 'Never satisfied', 17),
(9, 'Selene', 'NIKI', 7, 'Rhythms of light', 15),
(10, 'Swerve', 'Ksi ft. Jay1', 12, 'All over the place', 11),
(11, 'Take me to church', 'Hozier', 1, 'Home', 6),
(12, 'Twisted', 'MISSIO', 3, NULL, 9),
(13, 'S&M', 'Rihanna', 1, NULL, 5),
(14, 'You can be the boss', 'Lana Del Ray', 1, 'Ultra violance', 4),
(15, 'Sucker', 'Jonas brothers', 1, NULL, 21),
(16, 'The bakery', 'Melanie Martinez', 7, 'K-12', 19),
(17, 'Shape of you', 'Ed Sheeran', 1, 'Photographer', 1),
(18, 'Seil', 'Awolnation', 8, 'Seil', 4),
(19, 'Recuerdo', 'TINI', 1, 'Fresa', 7),
(20, 'Pompeii', 'Bastille', 7, 'Pompei', 3),
(21, 'Just like magic', 'Ariana Grande', 1, 'Positions', 18),
(22, 'No good ', 'Kaleo', 8, 'Way down', 15),
(23, 'Old Town road', 'Lil Nas X', 2, NULL, 17),
(24, 'Horns', 'Bryce Fox', 3, '', 14),
(25, 'road', 'kehlani', 9, NULL, 14),
(26, 'now or never', 'halsey', 1, '', 7),
(27, 'now or never', 'halsey', 1, '', 16),
(28, 'now ', 'halsey', 5, '', 11),
(29, 'now or never', 'halsey', 1, '', 15),
(30, 'wildest dreams', 'ts', 2, '', 17),
(31, 'sweet dreams', 'muse', 8, '', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `match`
--

CREATE TABLE `match` (
  `first team` varchar(20) NOT NULL,
  `second team` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `tie` tinyint DEFAULT '0',
  `i.d.` int NOT NULL,
  `first goal` time(3) DEFAULT '00:00:00.000',
  `start of the game` timestamp NOT NULL,
  `city code` char(8) DEFAULT 'Unknown',
  `status` enum('Successful',' Delayed',' Failed') DEFAULT 'Successful',
  `penalty` set('Offside','Pass Interference','Personal Foul','Roughing the Passer','None') DEFAULT 'None',
  `profit` float(16,6) UNSIGNED DEFAULT '0.000000',
  `score` char(5) NOT NULL DEFAULT '0:0',
  `details` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `match`
--

INSERT INTO `match` (`first team`, `second team`, `date`, `tie`, `i.d.`, `first goal`, `start of the game`, `city code`, `status`, `penalty`, `profit`, `score`, `details`) VALUES
('arsenal', 'chelsea', '2012-09-09', 1, 1, '00:00:09.000', '2012-11-11 09:00:00', 'K098LJ', 'Successful', 'Pass Interference', 5678.890137, '3:3', 'An illegal, flagrant foul considered risky to the health of another player.'),
('aston villa', 'everton', '2021-12-10', 0, 2, '00:00:00.000', '2018-12-03 12:00:00', 'KM32AJNN', ' Failed', 'None', 3444.000000, '3:0', 'An action which delays the game; for example, if the offense allows the play clock to run out'),
('reading', 'leicester', '2008-08-08', 0, 3, '05:00:09.000', '2017-07-17 04:07:07', 'J3HJ0F', ' Delayed', 'None', 9128.669922, '2:0', ''),
('Schalke 04 ', 'West Ham United', '2015-10-16', 0, 4, '02:09:00.000', '2015-10-15 21:00:00', 'GH7DGRHG', 'Successful', 'Personal Foul', 4455.979980, '9:8', 'When a defensive player makes any contact with the punter, provided the defensive player hasn’t touched the kicked ball before contact.'),
('Southampton FC', 'Soholli', '2019-05-06', 0, 5, '20:12:06.200', '2019-05-06 17:50:00', 'FGBBB9HH', 'Successful', 'None', 67546.000000, '7:3', NULL),
('Xanties', 'Dawnyin LK', '2011-09-05', 1, 6, '04:03:00.000', '2011-05-09 11:00:00', 'DV4DSDFF', ' Delayed', 'Pass Interference,Roughing the Passer', 23000.779297, '4:4', NULL),
('Everton FC ', 'Napoli', '2020-06-09', 1, 7, '00:00:00.000', '2020-05-09 06:00:00', 'ASSA4XCB', ' Failed', 'None', 89975.093750, '0:0', 'a tie'),
('Leicester', 'Inter Milan', '2019-07-08', 0, 8, '09:08:07.000', '2019-08-06 21:08:00', 'GH7JI7GH', 'Successful', 'None', 70857.093750, '5:9', 'When a player grabs the face mask of another player while attempting to block or tackle.'),
(' Atlético Madrid', ' Tottenham Hostpur', '2018-03-07', 0, 9, '09:08:03.000', '2018-03-06 22:00:00', NULL, 'Successful', 'None', 34000.000000, '8:12', 'When one player tackles another by grabbing inside their shoulder pads (or jersey) from behind and yanking them down.'),
('Borussia Dortmund', 'Manchester City ', '2023-10-13', 0, 10, '05:09:08.000', '2002-07-04 02:00:00', 'MNI7JMLO', 'Successful', 'Offside', 45877.601562, '12:9', NULL),
('Liverpool FC', 'Juventus', '2020-02-13', 0, 11, '01:12:07.000', '2020-02-13 19:00:00', 'AS4DF5GH', 'Successful', 'None', 643455.875000, '6:7', NULL),
('READING', 'ARSENAL', '2019-06-17', 1, 12, '00:00:00.000', '2017-02-18 22:30:00', 'HBNL7NJK', 'Successful', 'None', 29541.000000, '2:2', 'A judgment call made by an official who sees a defensive player make contact with the intended receiver before the ball arrives, thus restricting his opportunity to catch the forward pass.'),
('Aston villla', 'Paris Saint-Germain', '2018-01-18', 0, 13, '00:05:00.000', '2018-01-18 14:00:00', 'SFVD5DCG', 'Successful', 'Pass Interference,Personal Foul,Roughing the Passer', 89006.898438, '3:8', 'When a defensive player tackles or holds an offensive player other than the ball carrier.'),
('Bayern Munich ', 'Liverpool FC', '2019-12-18', 0, 14, '01:30:00.000', '2020-12-18 12:00:00', 'KMBGG7HJ', 'Successful', 'Pass Interference', 87689.000000, '6:9', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `panda`
--

CREATE TABLE `panda` (
  `panda_id` int NOT NULL,
  `panda_name` varchar(255) NOT NULL,
  `panda_year` int NOT NULL,
  `panda_property` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `panda`
--

INSERT INTO `panda` (`panda_id`, `panda_name`, `panda_year`, `panda_property`) VALUES
(1, 'first', 1996, 'some info'),
(2, 'second', 2096, 'some info'),
(3, 'third', 3333, 'yep'),
(4, 'fourth', 3444444, 'ddddddddd'),
(5, 'fifth', 3333, 'yep'),
(6, 'sixth', 3444444, 'xx'),
(7, 'seventh', 5555, 'cool'),
(8, 'eight', 5555, 'alright');

-- --------------------------------------------------------

--
-- Структура таблицы `ph`
--

CREATE TABLE `ph` (
  `ph_id` int NOT NULL,
  `ph_name` varchar(160) NOT NULL,
  `ph_credits` varchar(120) NOT NULL,
  `ph_img` varchar(300) NOT NULL,
  `ph_des` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `ph`
--

INSERT INTO `ph` (`ph_id`, `ph_name`, `ph_credits`, `ph_img`, `ph_des`) VALUES
(1, 'Late gift', 'Studio @lumi.studio', 'lg.jpg', 'The pure concept of time and how we, as humans are situated working such a gargantuan cosmological force.'),
(2, 'Mind in blossom', '@denisastrakovaofficial', 'fg.jpg', 'Revisiting the brightest of moments.'),
(3, 'Spotted differences', ' @eyesofandrei', 'bg.jpg', 'Overcoming your fears and facing new opportunities.'),
(4, 'Girl on Garda heel', 'Giuseppe Milo ', 'rg.jpg', 'The genre of fine art photography is confusing partly because its definition is so vague.'),
(5, 'The study in pink', 'Sombrebeings studio', 'mbs.jpg', 'Friendship guide lines in motion.'),
(6, 'Seventh cloud', '@la_amayita', 'tg.jpg', 'Mind searching'),
(7, 'Trapped ', '@ellocofish', 'ws.jpg', 'Creative motion in play'),
(8, 'Virtual closeness', '@steve_dean_mendes', 'ag.jpg', 'Shifting the perspective ');

-- --------------------------------------------------------

--
-- Структура таблицы `rating`
--

CREATE TABLE `rating` (
  `rating_id` int NOT NULL,
  `rated` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `rating`
--

INSERT INTO `rating` (`rating_id`, `rated`) VALUES
(1, 'Low'),
(2, 'Moderate'),
(3, 'Medium'),
(4, 'Good'),
(5, 'High');

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `review_id` int NOT NULL,
  `user` varchar(55) DEFAULT 'Unkown',
  `rating` int NOT NULL,
  `comment` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`review_id`, `user`, `rating`, `comment`) VALUES
(1, 'Amanda', 4, 'One of the best from the album.'),
(2, 'Ben', 5, 'After collaborations with Rosalía and SOPHIE on 2020’s KiCk i and a recent remix for Lady Gaga, Arca’s latest joint venture, “Born Yesterday” with Sia, represents her latest foray into more mainstream pop.'),
(3, 'Linda', 3, 'One of the weakest in my opinion,yet I still enjoy it'),
(4, 'Dave', 5, 'I don\'t seem to find just one favourite album. My love for music has made me go through all of them.'),
(5, 'Ken', 1, 'Stuck in my head all day.Kill me'),
(6, 'Steffany', 5, 'What a journey.A must listen for me)'),
(7, 'Henry', 3, 'Average really..'),
(8, 'Ted', 4, 'Great for workouts.'),
(9, 'Hannnah', 5, 'My morning jam!)'),
(10, 'John', 3, 'Pretty basic compared to others.'),
(11, 'Louren', 5, 'Love his latest tracks)great app'),
(12, 'George', 2, 'Guess I\'m too old-fashioned for this..'),
(13, 'Craig', 3, 'Great app,Song not so much!'),
(14, 'Ross', 1, 'Pivot'),
(15, 'Monica', 4, 'Love me some classic on the weekend,has that childhood vibe'),
(16, 'Fiona', 2, 'Pretty trash,ngl'),
(17, 'Crystoff', 5, 'The instrumental in this truly deserved a review.Incredible'),
(18, 'Emily', 4, 'True representation of this genre,you gotta love it.'),
(19, 'Jacob', 5, 'I\'ve been listening to this for 4 days now.Such a refreshing beat!'),
(20, 'Dave', 4, 'As a music producer this album has been so refreshing to listen to.'),
(21, 'Randy', 3, 'I\'ve been waiting on this one far too long.Maybe my expectations were too high(');

-- --------------------------------------------------------

--
-- Структура таблицы `table`
--

CREATE TABLE `table` (
  `user_pl_id` int NOT NULL,
  `user_pl_access` tinyint(1) NOT NULL,
  `user_pl_password` varchar(300) NOT NULL DEFAULT '1',
  `user_pl_name` varchar(200) NOT NULL,
  `user_pl_song` varchar(200) NOT NULL,
  `user_pl_artist` varchar(200) NOT NULL,
  `user_pl_album` varchar(200) DEFAULT NULL,
  `user_pl_genre` int NOT NULL,
  `user_pl_img` varchar(300) NOT NULL DEFAULT 'default_music.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tabledfghg@dfgg.ug`
--

CREATE TABLE `tabledfghg@dfgg.ug` (
  `user_pl_id` int NOT NULL,
  `user_pl_access` tinyint(1) NOT NULL,
  `user_pl_password` varchar(300) NOT NULL DEFAULT '1',
  `user_pl_name` varchar(200) NOT NULL,
  `user_pl_song` varchar(200) NOT NULL,
  `user_pl_artist` varchar(200) NOT NULL,
  `user_pl_album` varchar(200) DEFAULT NULL,
  `user_pl_genre` int NOT NULL,
  `user_pl_img` varchar(300) NOT NULL DEFAULT 'default_music.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tablefghj@dvb.gh`
--

CREATE TABLE `tablefghj@dvb.gh` (
  `user_pl_id` int NOT NULL,
  `user_pl_access` tinyint(1) NOT NULL,
  `user_pl_password` varchar(300) NOT NULL DEFAULT '1',
  `user_pl_name` varchar(200) NOT NULL,
  `user_pl_song` varchar(200) NOT NULL,
  `user_pl_artist` varchar(200) NOT NULL,
  `user_pl_album` varchar(200) DEFAULT NULL,
  `user_pl_genre` int NOT NULL,
  `user_pl_img` varchar(300) NOT NULL DEFAULT 'default_music.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tablefghj@dvb.gh`
--

INSERT INTO `tablefghj@dvb.gh` (`user_pl_id`, `user_pl_access`, `user_pl_password`, `user_pl_name`, `user_pl_song`, `user_pl_artist`, `user_pl_album`, `user_pl_genre`, `user_pl_img`) VALUES
(1, 0, '$2y$10$mAFrdIwxTD9Zr52reb3D3eAz7OPQR2ZFcbQFZxdKuyoXBwX.2hoC.', '9vbnm', 'had some drinks ', 'two feet', '', 3, 'ag.jpg'),
(2, 0, '$2y$10$mAFrdIwxTD9Zr52reb3D3eAz7OPQR2ZFcbQFZxdKuyoXBwX.2hoC.', '9vbnm', 'movements', 'two feet', '', 7, 'bg.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `tablem`
--

CREATE TABLE `tablem` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int NOT NULL,
  `charactern` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tablemppn@mk.com`
--

CREATE TABLE `tablemppn@mk.com` (
  `user_pl_id` int NOT NULL,
  `user_pl_access` tinyint(1) NOT NULL,
  `user_pl_password` varchar(300) NOT NULL DEFAULT '1',
  `user_pl_name` varchar(200) NOT NULL,
  `user_pl_song` varchar(200) NOT NULL,
  `user_pl_artist` varchar(200) NOT NULL,
  `user_pl_album` varchar(200) DEFAULT NULL,
  `user_pl_genre` int NOT NULL,
  `user_pl_img` varchar(300) NOT NULL DEFAULT 'default_music.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tablemppn@mk.com`
--

INSERT INTO `tablemppn@mk.com` (`user_pl_id`, `user_pl_access`, `user_pl_password`, `user_pl_name`, `user_pl_song`, `user_pl_artist`, `user_pl_album`, `user_pl_genre`, `user_pl_img`) VALUES
(1, 0, '$2y$10$nIWXdxAbprDqtUxtUCm3seB9YEx39rZ2rc8KwdYkHp0Sn6OA/k85m', 'dream', 'now or never', 'halsey', '', 1, ''),
(2, 0, '$2y$10$nIWXdxAbprDqtUxtUCm3seB9YEx39rZ2rc8KwdYkHp0Sn6OA/k85m', 'dream', 'had some drinks', 'halsey', '', 1, ''),
(3, 0, '$2y$10$nIWXdxAbprDqtUxtUCm3seB9YEx39rZ2rc8KwdYkHp0Sn6OA/k85m', 'dream', 'had some drinks', 'two feet', '', 3, 'CsUEem2XgAAzUQz.jpg'),
(4, 0, '$2y$10$nIWXdxAbprDqtUxtUCm3seB9YEx39rZ2rc8KwdYkHp0Sn6OA/k85m', 'dream', 'movements', 'Pham', 'Let me die php', 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `tableorang@gmail.com`
--

CREATE TABLE `tableorang@gmail.com` (
  `user_pl_id` int NOT NULL,
  `user_pl_access` tinyint(1) NOT NULL,
  `user_pl_password` varchar(300) NOT NULL DEFAULT '1',
  `user_pl_name` varchar(200) NOT NULL,
  `user_pl_song` varchar(200) NOT NULL,
  `user_pl_artist` varchar(200) NOT NULL,
  `user_pl_album` varchar(200) DEFAULT NULL,
  `user_pl_genre` int NOT NULL,
  `user_pl_img` varchar(300) NOT NULL DEFAULT 'default_music.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tabletddy@fg.mm`
--

CREATE TABLE `tabletddy@fg.mm` (
  `user_pl_id` int NOT NULL,
  `user_pl_access` tinyint(1) NOT NULL,
  `user_pl_password` varchar(300) NOT NULL DEFAULT '1',
  `user_pl_name` varchar(200) NOT NULL,
  `user_pl_song` varchar(200) NOT NULL,
  `user_pl_artist` varchar(200) NOT NULL,
  `user_pl_album` varchar(200) DEFAULT NULL,
  `user_pl_genre` int NOT NULL,
  `user_pl_img` varchar(300) NOT NULL DEFAULT 'default_music.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tabletddy@fg.mm`
--

INSERT INTO `tabletddy@fg.mm` (`user_pl_id`, `user_pl_access`, `user_pl_password`, `user_pl_name`, `user_pl_song`, `user_pl_artist`, `user_pl_album`, `user_pl_genre`, `user_pl_img`) VALUES
(1, 0, '$2y$10$6VX2k9.xsZVmciNhV2EliO0Kx7mnfBDfMT7SCcf4dYzw.X9m2kNYy', 'tab', 'had some drinks ', 'two feet', 'Nightmarish ', 7, 'CsUEem2XgAAzUQz.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int NOT NULL,
  `pic` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `pic`) VALUES
(1, 'vb.jpg'),
(2, 'tur.jpg'),
(3, 'lgh.jpg'),
(5, 'blue.jpg'),
(6, 'st.jpg'),
(7, 'bw.jpg'),
(8, 'firrr.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `hash` varchar(200) NOT NULL DEFAULT 't',
  `name` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `table_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `hash`, `name`, `email`, `table_name`) VALUES
(1, 'root', '$2y$10$ChrPVlYmmLctldlwAuuJj.YDOuIz/6z0PM/HDaNpwyYkATSklJG3u', '', 'moon', 'mppn@mk.com', 'tablemppn@mk.com'),
(5, 'rooti', '$2y$10$m2TemztESP.lo/nPdsI1B.nrqYMK/tzR04.T6k23smzBHn2lkx3HO', '', 'bnnnnnnnn', 'dfg@gm.com', ''),
(10, 'teddy', '$2y$10$R4NbTW3Ll7xnCjTlnKRSVO8v3iw3GYlCAD9fuVmSDFJoYFYVrKj2O', '', 'bvbn', 'vg@d.ua', ''),
(11, 'ghost', '$2y$10$gkqCmL6B1Bd1ApOpkzNEkeH4aJxGNvtWYS6KpTQE.AExE/mJ.jVam', '', 'Teddy', 'tddy@fg.mm', 'tabletddy@fg.mm'),
(12, 'rajesh', '$2y$10$VTeNnEgKlt8H45TcwOb5ouk5swWZd0pdsr8f8deUS4Z9zAxNOqU.y', '', 'lost', 'lost@df.cv', ''),
(23, 'crad', '$2y$10$HE3xdPKI8oETZ82tYGQh3eLPgLKwKchKTEPkAdI42NT.9yA.uSUbu', '', 'citru', 'cit@git.mint', ''),
(24, 'phpphp', '$2y$10$cvZmQvjaHa63ebNxkUldWOcYUGcd37Uiv0CRLmkdKHPGdl7Lux1eC', '', 'xazzz', 'xaz@dsa.cvx', ''),
(25, 'gthnnb', '$2y$10$NOhkDq0fF048soGnYVqA3OEmz0UoNQDDCNMmcXsBUwapH7p6nzani', '', 'gosh', 'fghj@dvb.gh', 'tablefghj@dvb.gh'),
(26, 'roote33', '$2y$10$uWj1HZG6Dz0wlNUGyGHdnuovWT/Ec5CYN7Njrzb/rjAPMb1NAvKsa', '', 'fvbbgyg', 'dfghg@dfgg.ug', 'tabledfghg@dfgg.ug');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `del`
--
ALTER TABLE `del`
  ADD PRIMARY KEY (`user_pl_id`),
  ADD KEY `user_pl_genre` (`user_pl_genre`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`g_id`);

--
-- Индексы таблицы `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_key` (`review`),
  ADD KEY `genre` (`genre`);

--
-- Индексы таблицы `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`i.d.`);

--
-- Индексы таблицы `panda`
--
ALTER TABLE `panda`
  ADD PRIMARY KEY (`panda_id`);

--
-- Индексы таблицы `ph`
--
ALTER TABLE `ph`
  ADD PRIMARY KEY (`ph_id`);

--
-- Индексы таблицы `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `rating_key` (`rating`);

--
-- Индексы таблицы `table`
--
ALTER TABLE `table`
  ADD PRIMARY KEY (`user_pl_id`),
  ADD KEY `_genre_key` (`user_pl_genre`);

--
-- Индексы таблицы `tabledfghg@dfgg.ug`
--
ALTER TABLE `tabledfghg@dfgg.ug`
  ADD PRIMARY KEY (`user_pl_id`),
  ADD KEY `dfghg@dfgg.ug_genre_key` (`user_pl_genre`);

--
-- Индексы таблицы `tablefghj@dvb.gh`
--
ALTER TABLE `tablefghj@dvb.gh`
  ADD PRIMARY KEY (`user_pl_id`),
  ADD KEY `fghj@dvb.gh_genre_key` (`user_pl_genre`);

--
-- Индексы таблицы `tablem`
--
ALTER TABLE `tablem`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tablemppn@mk.com`
--
ALTER TABLE `tablemppn@mk.com`
  ADD PRIMARY KEY (`user_pl_id`);

--
-- Индексы таблицы `tableorang@gmail.com`
--
ALTER TABLE `tableorang@gmail.com`
  ADD PRIMARY KEY (`user_pl_id`),
  ADD KEY `orang@gmail.com_genre_key` (`user_pl_genre`);

--
-- Индексы таблицы `tabletddy@fg.mm`
--
ALTER TABLE `tabletddy@fg.mm`
  ADD PRIMARY KEY (`user_pl_id`),
  ADD KEY `tddy@fg.mm_genre_key` (`user_pl_genre`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `del`
--
ALTER TABLE `del`
  MODIFY `user_pl_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `g_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `main`
--
ALTER TABLE `main`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `match`
--
ALTER TABLE `match`
  MODIFY `i.d.` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `panda`
--
ALTER TABLE `panda`
  MODIFY `panda_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `ph`
--
ALTER TABLE `ph`
  MODIFY `ph_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `table`
--
ALTER TABLE `table`
  MODIFY `user_pl_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tabledfghg@dfgg.ug`
--
ALTER TABLE `tabledfghg@dfgg.ug`
  MODIFY `user_pl_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tablefghj@dvb.gh`
--
ALTER TABLE `tablefghj@dvb.gh`
  MODIFY `user_pl_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tablem`
--
ALTER TABLE `tablem`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tablemppn@mk.com`
--
ALTER TABLE `tablemppn@mk.com`
  MODIFY `user_pl_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tableorang@gmail.com`
--
ALTER TABLE `tableorang@gmail.com`
  MODIFY `user_pl_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tabletddy@fg.mm`
--
ALTER TABLE `tabletddy@fg.mm`
  MODIFY `user_pl_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `del`
--
ALTER TABLE `del`
  ADD CONSTRAINT `user_genre_key` FOREIGN KEY (`user_pl_genre`) REFERENCES `genre` (`g_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `main`
--
ALTER TABLE `main`
  ADD CONSTRAINT `genre_key` FOREIGN KEY (`genre`) REFERENCES `genre` (`g_id`),
  ADD CONSTRAINT `review_key` FOREIGN KEY (`review`) REFERENCES `review` (`review_id`);

--
-- Ограничения внешнего ключа таблицы `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `rating_key` FOREIGN KEY (`rating`) REFERENCES `rating` (`rating_id`);

--
-- Ограничения внешнего ключа таблицы `table`
--
ALTER TABLE `table`
  ADD CONSTRAINT `_genre_key` FOREIGN KEY (`user_pl_genre`) REFERENCES `genre` (`g_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `tabledfghg@dfgg.ug`
--
ALTER TABLE `tabledfghg@dfgg.ug`
  ADD CONSTRAINT `dfghg@dfgg.ug_genre_key` FOREIGN KEY (`user_pl_genre`) REFERENCES `genre` (`g_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `tablefghj@dvb.gh`
--
ALTER TABLE `tablefghj@dvb.gh`
  ADD CONSTRAINT `fghj@dvb.gh_genre_key` FOREIGN KEY (`user_pl_genre`) REFERENCES `genre` (`g_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `tableorang@gmail.com`
--
ALTER TABLE `tableorang@gmail.com`
  ADD CONSTRAINT `orang@gmail.com_genre_key` FOREIGN KEY (`user_pl_genre`) REFERENCES `genre` (`g_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `tabletddy@fg.mm`
--
ALTER TABLE `tabletddy@fg.mm`
  ADD CONSTRAINT `tddy@fg.mm_genre_key` FOREIGN KEY (`user_pl_genre`) REFERENCES `genre` (`g_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
