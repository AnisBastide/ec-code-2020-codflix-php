-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2020 at 06:56 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `episode`
--

CREATE TABLE `episode` (
  `id` int(11) NOT NULL,
  `serie_id` int(11) DEFAULT NULL,
  `episode_number` int(11) DEFAULT NULL,
  `episode_title` varchar(25) DEFAULT NULL,
  `season` int(11) DEFAULT NULL,
  `episode_link` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `episode`
--

INSERT INTO `episode` (`id`, `serie_id`, `episode_number`, `episode_title`, `season`, `episode_link`) VALUES
(1, 4, 1, 'le commencement', 1, 'https://www.youtube.com/embed/HBTzpuQFeB0'),
(2, 4, 2, 'la suite', 1, 'https://www.youtube.com/embed/QWVpIMV1J6A'),
(3, 4, 1, 'debut saison 2', 2, 'https://www.youtube.com/embed/k8SKwtQF0rc'),
(4, 4, 2, 'la suite s2', 2, 'https://www.youtube.com/embed/m1wEHOR7E5Q');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Horreur'),
(3, 'Science-Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime DEFAULT NULL,
  `watch_duration` int(11) NOT NULL DEFAULT '0' COMMENT 'in seconds'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `media_id`, `start_date`, `finish_date`, `watch_duration`) VALUES
(2, 14, 4, '2020-01-20 19:31:34', NULL, 0),
(184, 15, 1, '2020-06-25 00:00:00', NULL, 0),
(185, 15, 1, '2020-06-25 00:00:00', NULL, 0),
(186, 15, 3, '2020-06-25 00:00:00', NULL, 0),
(187, 15, 2, '2020-06-25 00:00:00', NULL, 0),
(188, 15, 1, '2020-06-25 00:00:00', NULL, 0),
(189, 15, 3, '2020-06-25 00:00:00', NULL, 0),
(190, 15, 2, '2020-06-25 00:00:00', NULL, 0),
(191, 15, 2, '2020-06-25 00:00:00', NULL, 0),
(192, 15, 1, '2020-06-25 00:00:00', NULL, 0),
(193, 15, 3, '2020-06-25 00:00:00', NULL, 0),
(194, 15, 1, '2020-06-25 00:00:00', NULL, 0),
(195, 15, 2, '2020-06-25 00:00:00', NULL, 0),
(196, 15, 1, '2020-06-25 00:00:00', NULL, 0),
(197, 15, 1, '2020-06-25 00:00:00', NULL, 0),
(198, 15, 1, '2020-06-25 00:00:00', NULL, 0),
(199, 15, 1, '2020-06-25 00:00:00', NULL, 0),
(200, 15, 1, '2020-06-25 00:00:00', NULL, 0),
(201, 15, 1, '2020-06-25 00:00:00', NULL, 0),
(202, 15, 1, '2020-06-25 00:00:00', NULL, 0),
(203, 15, 3, '2020-06-25 00:00:00', NULL, 0),
(204, 15, 2, '2020-06-25 00:00:00', NULL, 0),
(205, 15, 1, '2020-06-25 00:00:00', NULL, 0),
(206, 15, 3, '2020-06-25 00:00:00', NULL, 0),
(207, 15, 2, '2020-06-25 00:00:00', NULL, 0),
(208, 16, 1, '2020-06-25 00:00:00', NULL, 0),
(209, 16, 1, '2020-06-25 00:00:00', NULL, 0),
(210, 16, 1, '2020-06-25 00:00:00', NULL, 0),
(211, 16, 4, '2020-06-25 00:00:00', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `release_date` date NOT NULL,
  `summary` longtext NOT NULL,
  `trailer_url` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumbnail` varchar(25000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `genre_id`, `title`, `type`, `status`, `release_date`, `summary`, `trailer_url`, `image`, `thumbnail`) VALUES
(1, 1, 'Michel et ses kheys', 'film', 'publié', '2020-06-01', 'Film d\'action sortie en 2020.', 'https://www.youtube.com/watch?v=HBTzpuQFeB0', 'https://photos.tf1.fr/700/933/vignette-portrait-paw-patrol-eeb718-537506-0@1x.webp', 'https://images.genius.com/d23a466815115bbd93c13a7c7ad2b642.600x600x1.jpg'),
(2, 2, 'ca', 'film', 'publié', '2018-04-18', 'ca fait peur', 'https://www.youtube.com/watch?v=HBTzpuQFeB0', 'https://images.genius.com/910d1c3df334252b30706d1cafcf15c2.664x1000x1.jpg', 'https://fr.web.img6.acsta.net/pictures/17/03/29/14/40/513263.jpg'),
(3, 3, 'star trek', 'film', 'publié', '2018-08-21', 'it\'s LIT', 'https://www.youtube.com/watch?v=HBTzpuQFeB0', 'https://i2.wp.com/www.16x16.fr/wp-content/uploads/2019/10/Michel-ft-Sneazzy-moi-et-mes-kheyes.jpg?fit=1280%2C1280&ssl=1', 'https://www.cdiscount.com/pdt2/8/2/1/1/700x700/auc5050574344821/rw/star-trek-discovery-poster-61x91-next-adventur.jpg'),
(4, 1, 'Game of thrones', 'serie', 'publié', '2019-05-20', 'Bonne serie!', 'https://www.youtube.com/watch?v=HBTzpuQFeB0', 'https://fr.web.img6.acsta.net/pictures/19/03/21/17/05/1927893.jpg', 'https://fr.hespress.com/wp-content/uploads/2019/03/got.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(80) NOT NULL,
  `status` enum('Verified','NotVerified') NOT NULL DEFAULT 'NotVerified'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `status`) VALUES
(14, 'anis.bastide@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9', 'NotVerified'),
(15, 'coding@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'NotVerified'),
(16, 'darkdip.games@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9', 'NotVerified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serie_id` (`serie_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_user_id_fk_media_id` (`user_id`),
  ADD KEY `history_media_id_fk_media_id` (`media_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_genre_id_fk_genre_id` (`genre_id`) USING BTREE,
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `episode`
--
ALTER TABLE `episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `series` FOREIGN KEY (`serie_id`) REFERENCES `media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_media_id_fk_media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_user_id_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_genre_id_b1257088_fk_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
