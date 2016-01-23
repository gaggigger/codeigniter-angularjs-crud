-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2016 at 12:09 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `people`
--

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `image` varchar(535) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`, `city`, `country`, `image`) VALUES
(80, 'Miley Cyrus', 'Franklin, Tennessee', 'USA', 'https://pbs.twimg.com/profile_images/666667045459750912/vN6qTsT5.jpg'),
(81, 'Taylor Swift', 'Wyomissing, Pennsylvania', 'USA', 'https://pbs.twimg.com/profile_images/623322978038759424/pR7mpED2.jpg'),
(82, 'Selena Gomez', 'Grand Prairie, Texas', 'USA', 'http://npe.media.streamtheworld.com/images/4e/08845C7F76C7CE3B7BDA7AB00DBAB529_256.png'),
(83, 'Demi Lovato', 'Albuquerque, New Mexico', 'USA', 'http://s.smule.com/s26/arr/eb/f8/8e412cfb-37ce-4470-9305-303c7b5d6969.jpg'),
(85, 'test name', 'test city', 'test country', ''),
(101, 'Katy Perry', 'Santa Barbara, California', 'United States', 'http://ichef.bbci.co.uk/images/ic/256x256/p01f2f53.jpg'),
(102, 'Beyoncé', 'Houston, Texas', 'USA', 'http://2.bp.blogspot.com/-c8qGm9HBveE/UEbLqcxoIzI/AAAAAAAAALE/uRNBeuZueEU/s1600/beyonce__193.gif'),
(103, 'Rihanna', 'Saint Michael', 'Barbados', 'http://s.smule.com/z0/store/61/a3/c3b741c5-57e4-474c-beb8-3c12045bd279_256.jpg'),
(104, 'Taylor Momsen', 'St. Louis, Missouri', 'USA', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Taylor_Momsen_-_Warped_Tour_Kickoff_(5).jpg/220px-Taylor_Momsen_-_Warped_Tour_Kickoff_(5).jpg'),
(105, 'Kylie Minogue', 'Melbourne, Victoria', 'Australia', 'http://www.saana-warrioroflight.com/wp-content/uploads/2010/07/kylie-minogue-perezrela-dlya-beremennosti-1.jpg'),
(106, 'Gigi Hadid', 'Los Angeles', 'USA', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Gigi_Hadid_2016.jpg/220px-Gigi_Hadid_2016.jpg'),
(107, 'Ciara', 'Austin, Texas', 'USA', 'https://pbs.twimg.com/profile_images/679715459453829120/aptekwyN.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
