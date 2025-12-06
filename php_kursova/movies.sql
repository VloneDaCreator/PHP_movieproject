-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2025 at 07:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `genre`, `year`, `description`) VALUES
(1, 'The Conjuring', 'Horror', '2013', 'A family is terrorized by a dark presence in their farmhouse.'),
(2, 'Hereditary', 'Horror', '2018', 'A grieving family is haunted by disturbing and supernatural occurrences.'),
(3, 'The Ring', 'Horror', '2002', 'A cursed videotape causes a terrifying death within seven days.'),
(4, 'Sinister', 'Horror', '2012', 'A true-crime writer discovers home movies of gruesome murders.'),
(5, 'It', 'Horror', '2017', 'A demonic entity terrorizes children in Derry, Maine.'),
(6, 'The Babadook', 'Horror', '2014', 'A mysterious book unleashes a sinister presence in a mother’s home.'),
(7, 'A Quiet Place', 'Horror', '2018', 'A family survives in silence while hiding from sound-hunting creatures.'),
(8, 'Insidious', 'Horror', '2010', 'A child falls into a coma and is trapped in a realm of spirits.'),
(9, 'Paranormal Activity', 'Horror', '2007', 'A couple records eerie events happening in their home.'),
(10, 'The Descent', 'Horror', '2005', 'Cave explorers encounter horrifying creatures underground.'),
(11, 'The Lord of the Rings: The Fellowship of the Ring', 'Fantasy', '2001', 'A hobbit begins a journey to destroy a powerful ring.'),
(12, 'Harry Potter and the Sorcerer\'s Stone', 'Fantasy', '2001', 'A boy discovers he is a wizard and attends a magical school.'),
(13, 'Pan\'s Labyrinth', 'Fantasy', '2006', 'A young girl encounters mythical creatures during wartime Spain.'),
(14, 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe', 'Fantasy', '2005', 'Siblings enter a magical world ruled by a tyrannical witch.'),
(15, 'Stardust', 'Fantasy', '2007', 'A young man crosses into a magical realm to retrieve a fallen star.'),
(16, 'Inception', 'Sci-Fi', '2010', 'A thief enters people’s dreams to steal secrets.'),
(17, 'The Dark Knight', 'Action', '2008', 'Batman faces his greatest foe, the Joker.'),
(18, 'Interstellar', 'Sci-Fi', '2014', 'Astronauts travel through a wormhole to save humanity.'),
(19, 'Forrest Gump', 'Drama', '1994', 'A simple man witnesses historical events through his remarkable life.'),
(20, 'The Matrix', 'Sci-Fi', '1999', 'A hacker discovers the truth about his simulated reality.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
