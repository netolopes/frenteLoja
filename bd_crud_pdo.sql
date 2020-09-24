-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 24-Set-2020 às 20:12
-- Versão do servidor: 5.7.28
-- versão do PHP: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_crud_pdo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aux`
--

DROP TABLE IF EXISTS `aux`;
CREATE TABLE IF NOT EXISTS `aux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_id` int(11) NOT NULL,
  `tipo_produto_id` int(11) NOT NULL,
  `valor` float NOT NULL,
  `qtde` int(11) NOT NULL,
  `ipi` float NOT NULL,
  `icms` float NOT NULL,
  `pis` float NOT NULL,
  `cofins` float NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aux`
--

INSERT INTO `aux` (`id`, `produto_id`, `tipo_produto_id`, `valor`, `qtde`, `ipi`, `icms`, `pis`, `cofins`, `status`) VALUES
(13, 7, 2, 950.4, 1, 15, 3.5, 2.5, 7.5, NULL),
(14, 4, 4, 1700, 2, 12, 2.4, 3.2, 5.5, NULL),
(15, 8, 1, 200.55, 3, 10, 3.2, 2.5, 7, NULL),
(16, 1, 1, 1500, 1, 10, 3.2, 2.5, 7, NULL),
(17, 1, 1, 1500, 1, 10, 3.2, 2.5, 7, NULL),
(18, 6, 4, 55.4, 1, 12, 2.4, 3.2, 5.5, NULL),
(19, 3, 2, 1000, 2, 15, 3.5, 2.5, 7.5, NULL),
(20, 4, 4, 1700, 3, 12, 2.4, 3.2, 5.5, NULL),
(21, 2, 3, 1200, 3, 15, 2.5, 3.6, 6, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `impostos`
--

DROP TABLE IF EXISTS `impostos`;
CREATE TABLE IF NOT EXISTS `impostos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipi` float NOT NULL,
  `icms` float NOT NULL,
  `pis` float NOT NULL,
  `cofins` float NOT NULL,
  `tipo_produto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `impostos`
--

INSERT INTO `impostos` (`id`, `ipi`, `icms`, `pis`, `cofins`, `tipo_produto_id`) VALUES
(1, 15, 3.5, 2.5, 7.5, 2),
(2, 10, 3.2, 2.5, 7, 1),
(3, 12, 2.4, 3.2, 5.5, 4),
(4, 15, 2.5, 3.6, 6, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(200) NOT NULL,
  `valor` float NOT NULL,
  `tipo_produto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `descricao`, `valor`, `tipo_produto_id`) VALUES
(1, 'tv full hd 50p', 1500, 1),
(2, 'Iphone apple ', 1200, 3),
(3, 'cama box ', 1000, 2),
(4, 'notebook hp', 1700, 4),
(5, 'impressora hp', 950.55, 4),
(6, 'pen drive kingston', 55.4, 4),
(7, 'guarda roupa 2 portas', 950.4, 2),
(8, 'liquidificador', 200.55, 1),
(9, 'cel samsung a10', 750.8, 3),
(10, 'refrigerador consul', 2560.45, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_produtos`
--

DROP TABLE IF EXISTS `tipo_produtos`;
CREATE TABLE IF NOT EXISTS `tipo_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_produtos`
--

INSERT INTO `tipo_produtos` (`id`, `descricao`) VALUES
(1, 'eletrodomesticos'),
(2, 'moveis'),
(3, 'celulares'),
(4, 'informatica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `birthdate` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `birthdate`) VALUES
(2, 'adm', 'adm@adm.com', NULL, NULL),
(3, 'client', 'client@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_id` int(11) NOT NULL,
  `tipo_produto_id` int(11) NOT NULL,
  `valor` float NOT NULL,
  `qtde` int(11) NOT NULL,
  `total_impostos` float NOT NULL,
  `total_venda` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
