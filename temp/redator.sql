-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Nov-2020 às 19:41
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
-- Estrutura da tabela `redator`
--

CREATE TABLE IF NOT EXISTS `redator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `redator`
--

INSERT INTO `redator` (`id`, `username`, `password`) VALUES
(1, 'Pedro Swan', 'd2f04c2a7cdcbe8efaef996a6249e728'),
(2, 'Douglas Gomes', '25d55ad283aa400af464c76d713c07ad'),
(3, 'Heitor Andrade', '7bd55d37a871f8fb3bfd6bbf3e1eb101'),
(4, 'Pedro Manoel', '5e8667a439c68f5145dd2fcbecf02209'),
(5, 'Yan Neves', '1df29747a7d7650697799e861b21f0fb');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
