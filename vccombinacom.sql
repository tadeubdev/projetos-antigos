-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Ago-2015 às 23:31
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vccombinacom`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amigos`
--

CREATE TABLE IF NOT EXISTS `amigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recebou` int(11) NOT NULL,
  `convidou` int(11) NOT NULL,
  `aceitou` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `convidados` varchar(250) NOT NULL,
  `criacao` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  `descricao` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `feed`
--

CREATE TABLE IF NOT EXISTS `feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` longtext NOT NULL,
  `user` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE IF NOT EXISTS `mensagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `de` varchar(100) NOT NULL,
  `para` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  `conteudo` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `cod_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `escolaridade` varchar(100) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `genero` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `nasc_dia` varchar(10) NOT NULL,
  `nasc_mes` varchar(10) NOT NULL,
  `nasc_ano` varchar(10) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `perfil` varchar(250) NOT NULL,
  `relacionamento` varchar(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  PRIMARY KEY (`cod_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
