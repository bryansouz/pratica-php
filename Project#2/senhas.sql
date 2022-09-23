-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23-Set-2022 às 16:17
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `senhas`
--

DROP TABLE IF EXISTS `senhas`;
CREATE TABLE IF NOT EXISTS `senhas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `senhas`
--

INSERT INTO `senhas` (`id`, `email`, `senha`, `nome`) VALUES
(8, 'bryan.soares19@hotmail.com', '$2y$10$WGFZylbi2hWOKPxCGBgtKelaluI2g/bT7x7xQV/CIyOM/7z4AoJcq', 'Bryan'),
(9, '', '$2y$10$5f/DcN8W8nQg1uuSLbHlU.mwbmoED2hyB88VR2nHNpRRxqGCw8x/G', ''),
(10, 'nolzard@hotmail.com', '$2y$10$Pax1iJdtNu34BSaEfnX30ONnhBNhMMkYXf2aIjGMXk04f0ZuI1V7W', 'Nolzard'),
(11, 'bryan.soares19@hotmail.com', '$2y$10$88QRKER67y8cbPuMBouMxeMJr9R.7YjcIb7561vdfKSXHBjpOUhWS', 'Matheus'),
(12, 'bryan.soares19@hotmail.com', '$2y$10$j2z.1kQvbEY0Tt5ZPHeybu0AQ/hcfzk8m4HK6./9b2g0qRVIpTkj6', 'fulano'),
(13, 'cuck', '$2y$10$04Kg9KVKlp5rNcd2r4RsWOk6XruT54IHSIqpyyiya9mHTEBv4LRq.', 'fulano'),
(14, 'bryan.soares19@hotmail.com', '$2y$10$amj3A0NrEHLex05/FrMfp.w0nX0BCuvT2AtUKuDYeOIZQ1Q6HScxS', 'fulano'),
(15, 'bryan.soares19@hotmail.com', '$2y$10$bgov8f644CYzOZ8L7ugezu71Ob.oJaUq/pnC6GGzRfYDQd99UcvVC', 'fulano'),
(16, 'nolzard@hotmail.com', '$2y$10$v7esZdVE2nU/nvpWy9sURu8B.wNra7o6X7sX5xFKqWZzVnrsx/Lle', 'fulano'),
(17, 'bryan.soares19@hotmail.com', '$2y$10$yzkQtUML8ra1QHAnvA0zZeJXLeAwJYD.5WahraaBU4jXn.NCEVcQm', 'fulano'),
(18, 'nolzard@hotmail.com', '$2y$10$Kf4amfAJfsPHPPGUbM0CwuDz0FrJ74DA9odGCf7ZKOH5tHyLSQPv.', 'fulano');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
