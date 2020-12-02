-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Nov-2020 às 19:40
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sportnews`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clubes`
--

CREATE TABLE IF NOT EXISTS `clubes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teamName` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `matchsPlayed` int(11) NOT NULL,
  `win` int(11) NOT NULL,
  `draw` int(11) NOT NULL,
  `lose` int(11) NOT NULL,
  `goalsFor` int(11) NOT NULL,
  `goalsAgainst` int(11) NOT NULL,
  `goalsDiff` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
