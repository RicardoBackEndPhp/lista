-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Abr-2019 às 07:55
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lista`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `date_create`) VALUES
(1, 'Tarefa pessoal', '2019-03-30 21:11:54'),
(2, 'trabalho', '2019-03-30 21:11:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `list`
--

CREATE TABLE `list` (
  `id_list` int(11) NOT NULL,
  `title_list` varchar(200) NOT NULL,
  `content_list` text NOT NULL,
  `category` int(11) NOT NULL DEFAULT '1',
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edition_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NULL DEFAULT NULL COMMENT 'Data da conclusão da tarefa',
  `completed` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'indicador de tarefa concluída'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `list`
--

INSERT INTO `list` (`id_list`, `title_list`, `content_list`, `category`, `creation_date`, `edition_date`, `end_date`, `completed`) VALUES
(1, 'Título 1', 'Teste de conteúdo nº 1', 1, '2019-03-30 21:09:19', NULL, NULL, 0),
(2, 'Título 2', 'Teste de conteúdo nº 2', 1, '2019-03-30 21:09:19', NULL, NULL, 0),
(3, 'Título 3', 'Teste de conteúdo nº 3', 1, '2019-03-30 21:16:17', NULL, NULL, 0),
(4, 'Título 4', 'Teste de conteúdo nº 4', 1, '2019-03-30 21:16:17', '2019-03-30 21:17:00', NULL, 0),
(5, 'Título 5', 'Teste de conteúdo nº 5', 1, '2019-03-30 21:16:44', '2019-03-30 21:17:30', NULL, 0),
(6, 'Título 6', 'Teste de conteúdo nº 6', 2, '2019-03-30 21:16:44', '2019-03-30 21:17:41', NULL, 0),
(7, 'Título 7', 'Teste de conteúdo nº 7', 1, '2019-03-30 21:19:09', NULL, NULL, 0),
(8, 'Título 8', 'Teste de conteúdo nº 8', 2, '2019-03-30 21:19:09', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id_list`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
