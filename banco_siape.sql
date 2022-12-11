-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 03:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco_siape`
--

-- --------------------------------------------------------

--
-- Table structure for table `aluno`
--

CREATE TABLE `aluno` (
  `Matricula` varchar(300) NOT NULL,
  `Nome` varchar(300) DEFAULT NULL,
  `FK_RENDA_id_Renda` int(11) DEFAULT NULL,
  `FK_COTA_id_Cota` int(11) DEFAULT NULL,
  `FK_STATUS_M_id_Status` int(11) DEFAULT NULL,
  `FK_INSTITUICAO_EXTRAC_id_Extra` int(11) DEFAULT NULL,
  `FK_ETNIA_id_etnia` int(11) DEFAULT NULL,
  `FK_USUARIO_Siape` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cota`
--

CREATE TABLE `cota` (
  `id_Cota` int(11) NOT NULL,
  `descCota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `id_Curso` int(11) NOT NULL,
  `descCurs` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `depoimento`
--

CREATE TABLE `depoimento` (
  `id_dep` int(11) NOT NULL,
  `tema` varchar(300) DEFAULT NULL,
  `grupo` varchar(300) DEFAULT NULL,
  `descdep` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `etnia`
--

CREATE TABLE `etnia` (
  `descEtnia` varchar(100) DEFAULT NULL,
  `id_etnia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `eventnom` varchar(300) DEFAULT NULL,
  `tema` varchar(300) DEFAULT NULL,
  `descevent` varchar(300) DEFAULT NULL,
  `eventstatus` tinyint(1) DEFAULT NULL,
  `fk_USUARIO_Siape` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instituicao_extrac`
--

CREATE TABLE `instituicao_extrac` (
  `id_Extra` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relatorio`
--

CREATE TABLE `relatorio` (
  `id_relatorio` int(11) NOT NULL,
  `matriculaRelat` varchar(300) DEFAULT NULL,
  `nomRelat` varchar(300) DEFAULT NULL,
  `assuntoRelat` varchar(300) DEFAULT NULL,
  `descRelat` varchar(300) DEFAULT NULL,
  `fk_USUARIO_Siape` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `renda`
--

CREATE TABLE `renda` (
  `id_Renda` int(11) NOT NULL,
  `descRend` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_m`
--

CREATE TABLE `status_m` (
  `id_Status` int(11) NOT NULL,
  `descStat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `Siape` int(11) NOT NULL,
  `nome` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `senha` varchar(300) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `FK_CURSO_id_Curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`Matricula`),
  ADD KEY `FK_ALUNO_2` (`FK_RENDA_id_Renda`),
  ADD KEY `FK_ALUNO_3` (`FK_COTA_id_Cota`),
  ADD KEY `FK_ALUNO_4` (`FK_STATUS_M_id_Status`),
  ADD KEY `FK_ALUNO_5` (`FK_INSTITUICAO_EXTRAC_id_Extra`),
  ADD KEY `FK_ALUNO_6` (`FK_ETNIA_id_etnia`),
  ADD KEY `FK_ALUNO_7` (`FK_USUARIO_Siape`);

--
-- Indexes for table `cota`
--
ALTER TABLE `cota`
  ADD PRIMARY KEY (`id_Cota`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_Curso`);

--
-- Indexes for table `depoimento`
--
ALTER TABLE `depoimento`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indexes for table `etnia`
--
ALTER TABLE `etnia`
  ADD PRIMARY KEY (`id_etnia`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `FK_evento_2` (`fk_USUARIO_Siape`);

--
-- Indexes for table `instituicao_extrac`
--
ALTER TABLE `instituicao_extrac`
  ADD PRIMARY KEY (`id_Extra`);

--
-- Indexes for table `relatorio`
--
ALTER TABLE `relatorio`
  ADD PRIMARY KEY (`id_relatorio`),
  ADD KEY `FK_relatorio_2` (`fk_USUARIO_Siape`);

--
-- Indexes for table `renda`
--
ALTER TABLE `renda`
  ADD PRIMARY KEY (`id_Renda`);

--
-- Indexes for table `status_m`
--
ALTER TABLE `status_m`
  ADD PRIMARY KEY (`id_Status`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Siape`),
  ADD KEY `FK_USUARIO_2` (`FK_CURSO_id_Curso`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `FK_ALUNO_2` FOREIGN KEY (`FK_RENDA_id_Renda`) REFERENCES `renda` (`id_Renda`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_ALUNO_3` FOREIGN KEY (`FK_COTA_id_Cota`) REFERENCES `cota` (`id_Cota`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_ALUNO_4` FOREIGN KEY (`FK_STATUS_M_id_Status`) REFERENCES `status_m` (`id_Status`),
  ADD CONSTRAINT `FK_ALUNO_5` FOREIGN KEY (`FK_INSTITUICAO_EXTRAC_id_Extra`) REFERENCES `instituicao_extrac` (`id_Extra`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ALUNO_6` FOREIGN KEY (`FK_ETNIA_id_etnia`) REFERENCES `etnia` (`id_etnia`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ALUNO_7` FOREIGN KEY (`FK_USUARIO_Siape`) REFERENCES `usuario` (`Siape`) ON DELETE CASCADE;

--
-- Constraints for table `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `FK_evento_2` FOREIGN KEY (`fk_USUARIO_Siape`) REFERENCES `usuario` (`Siape`) ON DELETE CASCADE;

--
-- Constraints for table `relatorio`
--
ALTER TABLE `relatorio`
  ADD CONSTRAINT `FK_relatorio_2` FOREIGN KEY (`fk_USUARIO_Siape`) REFERENCES `usuario` (`Siape`) ON DELETE CASCADE;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_USUARIO_2` FOREIGN KEY (`FK_CURSO_id_Curso`) REFERENCES `curso` (`id_Curso`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
