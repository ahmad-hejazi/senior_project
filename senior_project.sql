-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 03:00 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `senior_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'Rami Srour', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `Image_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `name`, `Image_name`) VALUES
(2, 'action', 'action.jpg'),
(3, 'horror', 'horror.jpg'),
(4, 'adventure', 'adventure.jpg'),
(5, 'comedy', 'comedy.jpg'),
(6, 'fantasy', 'fantasy.jpg'),
(9, 'Thriller', 'Thriller.jpg'),
(10, 'Animation', 'Animation.jpg'),
(11, 'Crime', 'Crime.jpg'),
(12, 'Drama', 'Drama.jpeg'),
(13, 'Historical', 'Historical.jpeg'),
(14, 'Biography', 'Biography.jpeg'),
(15, 'Doc', 'Documentary.jpeg'),
(16, 'Family', 'Family.jpeg'),
(17, 'Mystery', 'Mystery.jpeg'),
(18, 'Sci-Fi', 'Sci-Fi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `feedback` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `feedback`, `uid`) VALUES
(9, 'You are amazing', 3);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `cast` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image_name` varchar(50) DEFAULT NULL,
  `rate` decimal(8,2) DEFAULT NULL,
  `trailer` varchar(50) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `cid1` int(11) DEFAULT NULL,
  `cid2` int(11) DEFAULT NULL,
  `tag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `cast`, `description`, `image_name`, `rate`, `trailer`, `year`, `cid1`, `cid2`, `tag`) VALUES
(16, 'Terrifier 2', 'Kailey Hyman Jenna Kanell Lauren LaVera David Howard Thornton\r\nCatherine Corcoran Samantha Scaffidi Felissa Rose Casey Hartnett\r\nGriffin Santopietro Katie Maguire Chris Jericho Amelie McLain\r\nElliott Fullam Sarah Voigt Tamara Glynn Julie Asriyan\r\nJackie Adragna Charlie McElveen', 'In Miles County, Art the Clown is mysteriously revived in the morgue and kills the coroner, in the beginning of his crime spree in the Halloween night. The teenagers Sienna and her brother Jonathanare hunted down by Art and his partner, The Little Pale Girl.', 'acvas_8778.jpg', '6.20', 'https://www.youtube.com/embed/6KkONLf_ZKU', 2022, 3, 17, 'sequel duringcreditsstinger slasher gore killer'),
(17, 'Enola Holmes 2', 'Millie Bobby Brown,Sofia Stavrinou,Henry Cavill,John Parshall,David Thewlis,Louis Partridge,Susie Wokoma,Adeel Akhtar,Sharon Duncan-Brewster,Helena Bonham Carter,Himesh Patel,Hannah Dodd,Abbie Hern,Róisín Monaghan,Gabriel Tierney,David Westhead,Tim McMullan,Lee Boardman,Serrana Su-Ling Bliss', 'Fresh off the triumph of solving her first case, Enola Holmes (Millie Bobby Brown) follows in the footsteps of her famous brother, Sherlock (Henry Cavill), and opens her own agency - only to find that life as a female detective-for-hire isn\'t as easy as it seems. Resigned to accepting the cold realities of adulthood, she is about to close shop when a penniless matchstick girl offers Enola her first official job: to find her missing sister. But this case proves to be far more puzzling than expected, as Enola is thrown into a dangerous new world - from London\'s sinister factories and colorful music halls, to the highest echelons of society and 221B Baker Street itself. As the sparks of a deadly conspiracy ignite, Enola must call upon the help of friends - and Sherlock himself - to unravel her mystery. The game, it seems, has found its feet again.', 'Enola Holmes 2_4092.jpg', '6.90', 'https://www.youtube.com/embed/EXeTwQWrcwY', 2022, 2, 3, ''),
(18, 'Enola Holmes 2', 'Millie Bobby Brown,Sofia Stavrinou,Henry Cavill,John Parshall,David Thewlis,Louis Partridge,Susie Wokoma,Adeel Akhtar,Sharon Duncan-Brewster,Helena Bonham Carter,Himesh Patel,Hannah Dodd,Abbie Hern,Róisín Monaghan,Gabriel Tierney,David Westhead,Tim McMullan,Lee Boardman,Serrana Su-Ling Bliss', 'Fresh off the triumph of solving her first case, Enola Holmes (Millie Bobby Brown) follows in the footsteps of her famous brother, Sherlock (Henry Cavill), and opens her own agency - only to find that life as a female detective-for-hire isn\'t as easy as it seems. Resigned to accepting the cold realities of adulthood, she is about to close shop when a penniless matchstick girl offers Enola her first official job: to find her missing sister. But this case proves to be far more puzzling than expected, as Enola is thrown into a dangerous new world - from London\'s sinister factories and colorful music halls, to the highest echelons of society and 221B Baker Street itself. As the sparks of a deadly conspiracy ignite, Enola must call upon the help of friends - and Sherlock himself - to unravel her mystery. The game, it seems, has found its feet again.', 'Enola Holmes 2_4980.jpg', '6.90', 'https://www.youtube.com/embed/EXeTwQWrcwY', 2022, 2, 3, ''),
(19, 'Enola Holmes 2', 'Millie Bobby Brown,Sofia Stavrinou,Henry Cavill,John Parshall,David Thewlis,Louis Partridge,Susie Wokoma,Adeel Akhtar,Sharon Duncan-Brewster,Helena Bonham Carter,Himesh Patel,Hannah Dodd,Abbie Hern,Róisín Monaghan,Gabriel Tierney,David Westhead,Tim McMullan,Lee Boardman,Serrana Su-Ling Bliss', 'Fresh off the triumph of solving her first case, Enola Holmes (Millie Bobby Brown) follows in the footsteps of her famous brother, Sherlock (Henry Cavill), and opens her own agency - only to find that life as a female detective-for-hire isn\'t as easy as it seems. Resigned to accepting the cold realities of adulthood, she is about to close shop when a penniless matchstick girl offers Enola her first official job: to find her missing sister. But this case proves to be far more puzzling than expected, as Enola is thrown into a dangerous new world - from London\'s sinister factories and colorful music halls, to the highest echelons of society and 221B Baker Street itself. As the sparks of a deadly conspiracy ignite, Enola must call upon the help of friends - and Sherlock himself - to unravel her mystery. The game, it seems, has found its feet again.', 'Enola Holmes 2_4548.jpg', '6.90', 'https://www.youtube.com/embed/EXeTwQWrcwY', 2022, 2, 3, ''),
(20, 'Enola Holmes 2', 'Millie Bobby Brown,Sofia Stavrinou,Henry Cavill,John Parshall,David Thewlis,Louis Partridge,Susie Wokoma,Adeel Akhtar,Sharon Duncan-Brewster,Helena Bonham Carter,Himesh Patel,Hannah Dodd,Abbie Hern,Róisín Monaghan,Gabriel Tierney,David Westhead,Tim McMullan,Lee Boardman,Serrana Su-Ling Bliss', 'Fresh off the triumph of solving her first case, Enola Holmes (Millie Bobby Brown) follows in the footsteps of her famous brother, Sherlock (Henry Cavill), and opens her own agency - only to find that life as a female detective-for-hire isn\'t as easy as it seems. Resigned to accepting the cold realities of adulthood, she is about to close shop when a penniless matchstick girl offers Enola her first official job: to find her missing sister. But this case proves to be far more puzzling than expected, as Enola is thrown into a dangerous new world - from London\'s sinister factories and colorful music halls, to the highest echelons of society and 221B Baker Street itself. As the sparks of a deadly conspiracy ignite, Enola must call upon the help of friends - and Sherlock himself - to unravel her mystery. The game, it seems, has found its feet again.', 'Enola Holmes 2_6887.jpg', '6.90', 'https://www.youtube.com/embed/EXeTwQWrcwY', 2022, 2, 3, ''),
(21, 'Enola Holmes 2', 'Millie Bobby Brown,Sofia Stavrinou,Henry Cavill,John Parshall,David Thewlis,Louis Partridge,Susie Wokoma,Adeel Akhtar,Sharon Duncan-Brewster,Helena Bonham Carter,Himesh Patel,Hannah Dodd,Abbie Hern,Róisín Monaghan,Gabriel Tierney,David Westhead,Tim McMullan,Lee Boardman,Serrana Su-Ling Bliss', 'Fresh off the triumph of solving her first case, Enola Holmes (Millie Bobby Brown) follows in the footsteps of her famous brother, Sherlock (Henry Cavill), and opens her own agency - only to find that life as a female detective-for-hire isn\'t as easy as it seems. Resigned to accepting the cold realities of adulthood, she is about to close shop when a penniless matchstick girl offers Enola her first official job: to find her missing sister. But this case proves to be far more puzzling than expected, as Enola is thrown into a dangerous new world - from London\'s sinister factories and colorful music halls, to the highest echelons of society and 221B Baker Street itself. As the sparks of a deadly conspiracy ignite, Enola must call upon the help of friends - and Sherlock himself - to unravel her mystery. The game, it seems, has found its feet again.', 'Enola Holmes 2_6541.jpg', '6.90', 'https://www.youtube.com/embed/KKXNmYoPkx0', 2022, 2, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `movie` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `movie`, `comment`, `status`, `uid`) VALUES
(2, 'spider-man', 'add the movie', 'Done', 1),
(3, 'Avengers', 'add this movie please', 'Done', 1),
(5, 'Doctor Strange', 'Strange', 'Pending', 1),
(109, 'Superman', 'please add superman', 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `review` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `heading` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spoiler` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `mid` int(11) NOT NULL,
  `recommend1` int(11) NOT NULL,
  `recommend2` int(11) NOT NULL,
  `recommend3` int(11) NOT NULL,
  `recommend4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Email`, `username`, `password`) VALUES
(1, 'Rami Srour', 'rami', 'rami123'),
(3, 'ahmad@gmail.com', 'ahmad', 'ahmad123'),
(4, 'ahmad.hjazi.109@gmail.com', 'ahmad', 'Ahmad');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`id`, `uid`, `mid`) VALUES
(12, 4, 16),
(14, 4, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid1` (`cid1`),
  ADD KEY `cid2` (`cid2`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mid` (`mid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD KEY `mid` (`mid`),
  ADD KEY `recommend1` (`recommend1`),
  ADD KEY `recommend2` (`recommend2`),
  ADD KEY `recommend3` (`recommend3`),
  ADD KEY `recommend4` (`recommend4`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mid` (`mid`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`cid1`) REFERENCES `categories` (`cid`),
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`cid2`) REFERENCES `categories` (`cid`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `suggestion_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `suggestion_ibfk_2` FOREIGN KEY (`recommend1`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `suggestion_ibfk_3` FOREIGN KEY (`recommend2`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `suggestion_ibfk_4` FOREIGN KEY (`recommend3`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `suggestion_ibfk_5` FOREIGN KEY (`recommend4`) REFERENCES `movies` (`id`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
