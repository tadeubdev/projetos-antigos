-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Ago-2015 às 23:24
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `palavraeoracao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessos_online`
--

CREATE TABLE IF NOT EXISTS `acessos_online` (
  `ip` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `TIME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oracao`
--

CREATE TABLE IF NOT EXISTS `oracao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_autor` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `oracao` longtext NOT NULL,
  `ajuda` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oracao_comen`
--

CREATE TABLE IF NOT EXISTS `oracao_comen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_oracao` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `comentario` longtext NOT NULL,
  `data` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `palavra`
--

CREATE TABLE IF NOT EXISTS `palavra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_autor` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `naogostei` varchar(100) NOT NULL,
  `palavra` longtext NOT NULL,
  `autor` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  `gostei` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `palavra_comen`
--

CREATE TABLE IF NOT EXISTS `palavra_comen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  `id_palavra` int(11) NOT NULL,
  `comentario` longtext NOT NULL,
  `data` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idade` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `orkut` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `site` varchar(100) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `adm` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `idade`, `img`, `login`, `nome`, `orkut`, `senha`, `site`, `sobrenome`, `adm`, `email`, `facebook`) VALUES
(1, '', 'user/img/tadeu.jpg', 'tadeu', 'Tadeu', '', 'MTIzNDU=', '', '', '1', 'tadeufbarbosa@gmail.com', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
