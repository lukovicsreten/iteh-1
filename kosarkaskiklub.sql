-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2022 at 01:08 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosarkaskiklub`
--

-- --------------------------------------------------------

--
-- Table structure for table `drzava`
--

CREATE TABLE `drzava` (
  `drzavaid` int(10) NOT NULL,
  `drzavaime` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `drzava`
--

INSERT INTO `drzava` (`drzavaid`, `drzavaime`) VALUES
(1, 'Srbija'),
(2, 'Slovenija'),
(3, 'Grčka'),
(4, 'Francuska'),
(5, 'Španija'),
(6, 'Nemačka'),
(7, 'Italija'),
(8, 'Poljska');

-- --------------------------------------------------------

--
-- Table structure for table `igraci`
--

CREATE TABLE `igraci` (
  `id` int(10) NOT NULL,
  `igracime` varchar(50) COLLATE utf8_bin NOT NULL,
  `igracprezime` varchar(50) COLLATE utf8_bin NOT NULL,
  `klubid` int(10) NOT NULL,
  `drzavaid` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `igraci`
--

INSERT INTO `igraci` (`id`, `igracime`, `igracprezime`, `klubid`, `drzavaid`) VALUES
(1, 'Nikola ', 'Jokic', 1, 1),
(2, 'Vasilije', 'Micić', 2, 1),
(3, 'Nikola', 'Kalinić', 3, 1),
(4, 'Vladimir', 'Lučić', 4, 1),
(5, 'Nemanja', 'Nedović', 5, 1),
(6, 'Marko', 'Gudurić', 6, 1),
(7, 'Ognjen', 'Jaramaz', 4, 1),
(8, 'Vanja', 'Marinković', 7, 1),
(9, 'Nikola', 'Milutinov', 8, 1),
(10, 'Dejan', 'Davidovac', 8, 1),
(11, 'Luka', 'Dončić', 9, 2),
(12, 'Goran', 'Dragić', 10, 2),
(13, 'Vlatko', 'Čančar', 1, 2),
(14, 'Jaka', 'Blažič', 11, 2),
(15, 'Klemen', 'Prepelič', 12, 2),
(16, 'Giannis', 'Antetokounmpo', 13, 3),
(17, 'Tyler', 'Dorsey', 9, 3),
(18, 'Ioannis', 'Papapetrou', 14, 3),
(19, 'Nick', 'Kalates', 6, 3),
(20, 'Kostas', 'Sloukas', 15, 3),
(21, 'Rudy', 'Gobert', 16, 4),
(22, 'Evan', 'Fournier', 17, 4),
(23, 'Guerschon', 'Yabusele', 18, 4),
(24, 'Timothé', 'Luwawu-Cabarrot', 19, 4),
(25, 'Thomas', 'Huertel', 18, 4),
(26, 'Willy', 'Hernangomez', 20, 5),
(27, 'Juancho', 'Hernangomez', 1, 5),
(28, 'Rudy', 'Fernandez', 18, 5),
(29, 'Lorenzo', 'Brown', 21, 5),
(30, 'Usman', 'Garuba', 18, 5),
(31, 'Dennis', 'Schroder', 22, 6),
(32, 'Andreas', 'Obst', 4, 6),
(33, 'Johannes', 'Voigtmann', 8, 6),
(34, 'Franz', 'Wagner', 23, 6),
(35, 'Daniel', 'Theis', 24, 6),
(36, 'Achile', 'Polonara', 2, 7),
(37, 'Simone', 'Fontecchio', 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `klub`
--

CREATE TABLE `klub` (
  `klubid` int(10) NOT NULL,
  `klubime` varchar(30) COLLATE utf8_bin NOT NULL,
  `grad` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `klub`
--

INSERT INTO `klub` (`klubid`, `klubime`, `grad`) VALUES
(1, 'Denver Nuggets', 'Denver'),
(2, 'Anadolu Efes', 'Istanbul'),
(3, 'Barcelona', 'Barcelona'),
(4, 'Bayern Munich', 'Munich'),
(5, 'Crvena Zvezda', 'Beograd'),
(6, 'Fenerbahce', 'Istanbul'),
(7, 'Baskonia', 'Vitoria'),
(8, 'CSKA', 'Moscow'),
(9, 'Dallas Mavericks', 'Dallas'),
(10, 'Chikago Bulls', 'Chikago'),
(11, 'Cedevita Olimpija', 'Ljubljana'),
(12, 'Valencia', 'Valencia'),
(13, 'Milwakee Bucks', 'Milwakee'),
(14, 'Partizan', 'Beograd'),
(15, 'Olympiakos', 'Piraeus'),
(16, 'Minnesota Timberwolves', 'Minnesota'),
(17, 'New York Knicks', 'New York'),
(18, 'Real Madrid', 'Madrid'),
(19, 'Atlanta Hawks', 'Atlanta'),
(20, 'New Orleans Pelicans', 'New Orleans'),
(21, 'Maccabi', 'Tel Aviv'),
(22, 'Houston Rockers', 'Houston'),
(23, 'Orlando Magic', 'Orlando'),
(24, 'Indiana Pacers', 'Indianapolis'),
(25, 'Utah Jazz', 'Utah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drzava`
--
ALTER TABLE `drzava`
  ADD PRIMARY KEY (`drzavaid`);

--
-- Indexes for table `igraci`
--
ALTER TABLE `igraci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klub`
--
ALTER TABLE `klub`
  ADD PRIMARY KEY (`klubid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drzava`
--
ALTER TABLE `drzava`
  MODIFY `drzavaid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `igraci`
--
ALTER TABLE `igraci`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `klub`
--
ALTER TABLE `klub`
  MODIFY `klubid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
