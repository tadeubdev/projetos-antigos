-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Ago-2015 às 23:23
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `maxbody`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  `dados` varchar(100) NOT NULL,
  `estoque` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `key` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `categoria`, `dados`, `estoque`, `img`, `key`, `nome`, `valor`) VALUES
(1, 'emagrecimento', '', '21', 'a:1:{i:0;s:5:"1.jpg";}', '2dmlsdmflmflmsdf', 'Teste', '222');

-- --------------------------------------------------------

--
-- Estrutura da tabela `refer`
--

CREATE TABLE IF NOT EXISTS `refer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cont` varchar(100) NOT NULL,
  `site` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
