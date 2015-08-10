-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Ago-2015 às 23:29
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `redesocial`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod_user`, `email`, `cidade`, `escolaridade`, `estado`, `first_name`, `last_name`, `genero`, `img`, `link`, `nasc_dia`, `nasc_mes`, `nasc_ano`, `pass`, `perfil`, `relacionamento`, `status`) VALUES
(1, 'tadeufbarbos@gmail.com', 'Caeté', 'Ensino Médio Completo', 'MG', 'Tadeu', 'Barbosa', 'Masculino', 'tadeu.jpg', 'tadeu', '24', '03', '1994', '123', 'tadeu', 'solteiro', 'teste'),
(2, 'geek@email.com', '', '', '', 'Geek', ';)', '', 'geek.jpg', 'geek', '', '', '', '123', 'geek', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
