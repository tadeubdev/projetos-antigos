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
-- Database: `memes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amigos`
--

CREATE TABLE IF NOT EXISTS `amigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recebi` int(11) NOT NULL,
  `convidei` int(11) NOT NULL,
  `aceitou` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE IF NOT EXISTS `atividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atualizacao` longtext NOT NULL,
  `megusta` int(11) NOT NULL,
  `meme` int(11) NOT NULL,
  `nomegusta` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` longtext NOT NULL,
  `idPost` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `megusta`
--

CREATE TABLE IF NOT EXISTS `megusta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `onde` varchar(100) NOT NULL,
  `oque` varchar(100) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `mes` varchar(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `relacionamento` varchar(50) NOT NULL,
  `sobre` longtext NOT NULL,
  `sobreNome` varchar(100) NOT NULL,
  `ano` varchar(4) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `dia` varchar(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `escolaridade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `img`, `link`, `mes`, `nome`, `pass`, `relacionamento`, `sobre`, `sobreNome`, `ano`, `cidade`, `dia`, `email`, `escolaridade`, `estado`, `genero`) VALUES
(1, '', 'tadeu', '', 'Tadeu', '123456789', '', '', 'barbosa', '', '', '', 'tadeufbarbosa@gmail.com', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
