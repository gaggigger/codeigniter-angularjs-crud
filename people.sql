-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2016 at 07:41 PM
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
  `image` varchar(535) DEFAULT NULL,
  `descr` text
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`, `city`, `country`, `image`, `descr`) VALUES
(80, 'Miley Cyrus', 'Franklin, Tennessee', 'USA', 'https://pbs.twimg.com/profile_images/666667045459750912/vN6qTsT5.jpg', 'Miley Ray Cyrus (born Destiny Hope Cyrus; November 23, 1992) is an American singer, songwriter, and actress. Born and raised in Franklin, Tennessee, she held minor roles in the television series Doc and the film Big Fish in her childhood. Cyrus became a teen idol for her portrayal of the starring character Miley Stewart in the Disney Channel television series Hannah Montana in 2006; her father Billy Ray Cyrus additionally starred in the show. Cyrus subsequently signed a recording contract with Hollywood Records; her debut studio album Meet Miley Cyrus (2007) was certified quadruple-platinum by the Recording Industry Association of America (RIAA) for exceeding four million shipments. Cyrus released her second album Breakout and launched her film career as a voice actress in the animated film Bolt in 2008.'),
(81, 'Taylor Swift', 'Wyomissing, Pennsylvania', 'USA', 'https://pbs.twimg.com/profile_images/623322978038759424/pR7mpED2.jpg', NULL),
(82, 'Selena Gomez', 'Grand Prairie, Texas', 'USA', 'http://npe.media.streamtheworld.com/images/4e/08845C7F76C7CE3B7BDA7AB00DBAB529_256.png', NULL),
(83, 'Demi Lovato', 'Albuquerque, New Mexico', 'USA', 'http://s.smule.com/s26/arr/eb/f8/8e412cfb-37ce-4470-9305-303c7b5d6969.jpg', NULL),
(85, 'test name', 'test city', 'test country', '', NULL),
(101, 'Katy Perry', 'Santa Barbara, California', 'United States', 'http://ichef.bbci.co.uk/images/ic/256x256/p01f2f53.jpg', NULL),
(102, 'Beyoncé', 'Houston, Texas', 'USA', 'http://2.bp.blogspot.com/-c8qGm9HBveE/UEbLqcxoIzI/AAAAAAAAALE/uRNBeuZueEU/s1600/beyonce__193.gif', NULL),
(103, 'Rihanna', 'Saint Michael', 'Barbados', 'http://s.smule.com/z0/store/61/a3/c3b741c5-57e4-474c-beb8-3c12045bd279_256.jpg', NULL),
(104, 'Taylor Momsen', 'St. Louis, Missouri', 'USA', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Taylor_Momsen_-_Warped_Tour_Kickoff_(5).jpg/220px-Taylor_Momsen_-_Warped_Tour_Kickoff_(5).jpg', NULL),
(105, 'Kylie Minogue', 'Melbourne, Victoria', 'Australia', 'http://www.saana-warrioroflight.com/wp-content/uploads/2010/07/kylie-minogue-perezrela-dlya-beremennosti-1.jpg', ''),
(106, 'Gigi Hadid', 'Los Angeles', 'USA', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Gigi_Hadid_2016.jpg/220px-Gigi_Hadid_2016.jpg', ''),
(107, 'Ciara', 'Austin, Texas', 'USA', '/uploads/aptekwyN.png', 'Ciara Princess Harris (born October 25, 1985), known mononymously as Ciara (pronounced /siːˈɛrə/, see-err-ə),[1] is an American singer, songwriter, record producer, dancer, actress and fashion model. Born in Austin, Texas, she traveled around the world during her childhood, eventually moving to Atlanta, Georgia where she joined the girl group Hearsay (not to be confused with the British group Hear''Say); however, the group disbanded after having differences. It was at this time Ciara was noticed for her songwriting. In 2002, Ciara met music producer Jazze Pha. With his help, she signed a record deal with LaFace Records.'),
(112, 'asdas', 'dsad', 'dsa', '/uploads/8e412cfb-37ce-4470-9305-303c7b5d6969.jpg', '');

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
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
