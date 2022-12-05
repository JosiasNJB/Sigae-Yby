-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2022 at 02:34 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banco_projetointegrador`
--
CREATE DATABASE IF NOT EXISTS `banco_projetointegrador` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `banco_projetointegrador`;

-- --------------------------------------------------------

--
-- Table structure for table `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `id_Aluno` int(11) NOT NULL DEFAULT '0',
  `matricula` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FK_PESSOA_id_Pessoa` int(11) NOT NULL DEFAULT '0',
  `FK_COTA_id_Cota` int(11) DEFAULT NULL,
  `FK_STATUS_M_id_Status` int(11) DEFAULT NULL,
  `FK_INSTITUICAO_EXTRAC_id_Extra` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Aluno`,`FK_PESSOA_id_Pessoa`),
  UNIQUE KEY `id_Aluno` (`id_Aluno`),
  KEY `FK_ALUNO_2` (`FK_PESSOA_id_Pessoa`),
  KEY `FK_ALUNO_3` (`FK_COTA_id_Cota`),
  KEY `FK_ALUNO_4` (`FK_STATUS_M_id_Status`),
  KEY `FK_ALUNO_5` (`FK_INSTITUICAO_EXTRAC_id_Extra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE IF NOT EXISTS `campus` (
  `id_Campus` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datOrigCampus` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_Campus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id_Campus`, `nome`, `datOrigCampus`) VALUES
(1, 'Serra', '2001'),
(2, 'Vitoria', '1909'),
(3, 'Linhares', '2008'),
(4, 'Vila Velha', '2010');

-- --------------------------------------------------------

--
-- Table structure for table `cota`
--

CREATE TABLE IF NOT EXISTS `cota` (
  `id_Cota` int(11) NOT NULL,
  `descCota` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_Cota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cota`
--

INSERT INTO `cota` (`id_Cota`, `descCota`) VALUES
(1, 'Racial'),
(2, 'Economica'),
(3, 'Necessidade Especial'),
(4, 'Escolaridade'),
(5, 'Ampla concorrencia');

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_Curso` int(11) NOT NULL,
  `descCurs` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_Curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`id_Curso`, `descCurs`) VALUES
(1, 'Informatica'),
(2, 'Mecatronica'),
(3, 'Automacao'),
(4, 'IOT');

-- --------------------------------------------------------

--
-- Table structure for table `depoimento`
--

CREATE TABLE IF NOT EXISTS `depoimento` (
  `id_dep` int(11) NOT NULL,
  `tema` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grupo` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descdep` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fk_ALUNO_id_Aluno` int(11) DEFAULT NULL,
  `fk_ALUNO_FK_PESSOA_id_Pessoa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dep`),
  UNIQUE KEY `id_dep` (`id_dep`),
  KEY `FK_depoimento_2` (`fk_ALUNO_id_Aluno`,`fk_ALUNO_FK_PESSOA_id_Pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `etnia`
--

CREATE TABLE IF NOT EXISTS `etnia` (
  `descEtnia` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_etnia` int(11) NOT NULL,
  PRIMARY KEY (`id_etnia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etnia`
--

INSERT INTO `etnia` (`descEtnia`, `id_etnia`) VALUES
('Preto', 1),
('Pardo', 2),
('Branco', 3),
('Indigena', 4),
('Amarela', 5);

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` int(11) NOT NULL,
  `eventnom` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tema` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descevent` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eventstatus` tinyint(1) DEFAULT NULL,
  `fk_PESSOA_id_Pessoa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  UNIQUE KEY `id_evento` (`id_evento`),
  KEY `FK_evento_2` (`fk_PESSOA_id_Pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instituicao_extrac`
--

CREATE TABLE IF NOT EXISTS `instituicao_extrac` (
  `id_Extra` int(11) NOT NULL,
  `tipo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_Extra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instituicao_extrac`
--

INSERT INTO `instituicao_extrac` (`id_Extra`, `tipo`) VALUES
(1, 'Linguas'),
(2, 'pre-vest'),
(3, 'instrumentos'),
(4, 'esportes');

-- --------------------------------------------------------

--
-- Table structure for table `neabi`
--

CREATE TABLE IF NOT EXISTS `neabi` (
  `id_Neabi` int(11) NOT NULL,
  `datOrig` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `administrador` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FK_CAMPUS_id_Campus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Neabi`),
  KEY `FK_NEABI_2` (`FK_CAMPUS_id_Campus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `neabi`
--

INSERT INTO `neabi` (`id_Neabi`, `datOrig`, `administrador`, `FK_CAMPUS_id_Campus`) VALUES
(1, '2007', 'ana', 1),
(2, '2004', 'diego', 2),
(3, '2010', 'edilson', 3),
(4, '2012', 'moises', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `id_Pessoa` int(11) NOT NULL,
  `nome` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senha` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `telefone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adm` tinyint(1) DEFAULT NULL,
  `FK_NEABI_id_Neabi` int(11) DEFAULT NULL,
  `FK_CURSO_id_Curso` int(11) DEFAULT NULL,
  `FK_RENDA_id_Renda` int(11) DEFAULT NULL,
  `FK_ETNIA_id_etnia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Pessoa`),
  UNIQUE KEY `id_Pessoa` (`id_Pessoa`),
  KEY `FK_PESSOA_2` (`FK_NEABI_id_Neabi`),
  KEY `FK_PESSOA_3` (`FK_CURSO_id_Curso`),
  KEY `FK_PESSOA_4` (`FK_RENDA_id_Renda`),
  KEY `FK_PESSOA_5` (`FK_ETNIA_id_etnia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relatorio`
--

CREATE TABLE IF NOT EXISTS `relatorio` (
  `id_relatorio` int(11) NOT NULL,
  `matriculaRelat` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomRelat` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assuntoRelat` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descRelat` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fk_PESSOA_id_Pessoa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_relatorio`),
  UNIQUE KEY `id_relatorio` (`id_relatorio`),
  KEY `FK_relatorio_2` (`fk_PESSOA_id_Pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `renda`
--

CREATE TABLE IF NOT EXISTS `renda` (
  `id_Renda` int(11) NOT NULL,
  `descRend` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_Renda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renda`
--

INSERT INTO `renda` (`id_Renda`, `descRend`) VALUES
(1, 'Até um salario'),
(2, 'De um a dois salários'),
(3, 'De dois a tres salários');

-- --------------------------------------------------------

--
-- Table structure for table `status_m`
--

CREATE TABLE IF NOT EXISTS `status_m` (
  `id_Status` int(11) NOT NULL,
  `descStat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_Status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_m`
--

INSERT INTO `status_m` (`id_Status`, `descStat`) VALUES
(1, 'Trancado'),
(2, 'Cursando'),
(3, 'Desistente');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `FK_ALUNO_5` FOREIGN KEY (`FK_INSTITUICAO_EXTRAC_id_Extra`) REFERENCES `instituicao_extrac` (`id_Extra`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ALUNO_2` FOREIGN KEY (`FK_PESSOA_id_Pessoa`) REFERENCES `pessoa` (`id_Pessoa`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ALUNO_3` FOREIGN KEY (`FK_COTA_id_Cota`) REFERENCES `cota` (`id_Cota`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_ALUNO_4` FOREIGN KEY (`FK_STATUS_M_id_Status`) REFERENCES `status_m` (`id_Status`);

--
-- Constraints for table `depoimento`
--
ALTER TABLE `depoimento`
  ADD CONSTRAINT `FK_depoimento_2` FOREIGN KEY (`fk_ALUNO_id_Aluno`, `fk_ALUNO_FK_PESSOA_id_Pessoa`) REFERENCES `aluno` (`id_Aluno`, `FK_PESSOA_id_Pessoa`) ON DELETE CASCADE;

--
-- Constraints for table `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `FK_evento_2` FOREIGN KEY (`fk_PESSOA_id_Pessoa`) REFERENCES `pessoa` (`id_Pessoa`) ON DELETE CASCADE;

--
-- Constraints for table `neabi`
--
ALTER TABLE `neabi`
  ADD CONSTRAINT `FK_NEABI_2` FOREIGN KEY (`FK_CAMPUS_id_Campus`) REFERENCES `campus` (`id_Campus`) ON DELETE CASCADE;

--
-- Constraints for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `FK_PESSOA_5` FOREIGN KEY (`FK_ETNIA_id_etnia`) REFERENCES `etnia` (`id_etnia`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_PESSOA_2` FOREIGN KEY (`FK_NEABI_id_Neabi`) REFERENCES `neabi` (`id_Neabi`),
  ADD CONSTRAINT `FK_PESSOA_3` FOREIGN KEY (`FK_CURSO_id_Curso`) REFERENCES `curso` (`id_Curso`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_PESSOA_4` FOREIGN KEY (`FK_RENDA_id_Renda`) REFERENCES `renda` (`id_Renda`) ON DELETE SET NULL;

--
-- Constraints for table `relatorio`
--
ALTER TABLE `relatorio`
  ADD CONSTRAINT `FK_relatorio_2` FOREIGN KEY (`fk_PESSOA_id_Pessoa`) REFERENCES `pessoa` (`id_Pessoa`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
