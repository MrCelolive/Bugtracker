-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Jul-2022 às 23:30
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cesaestore`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `precoTotal` double DEFAULT NULL,
  `numArtigos` int(11) DEFAULT NULL,
  `dataHora` datetime DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `id_utilizador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id`, `precoTotal`, `numArtigos`, `dataHora`, `estado`, `id_utilizador`) VALUES
(1, 130, 11, '2022-01-01 10:00:00', 'Finalizada', 1),
(2, 130, 11, '0000-00-00 00:00:00', 'Carrinho', 1),
(3, 0, 0, '0000-00-00 00:00:00', 'Carrinho', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra_produto`
--

CREATE TABLE `compra_produto` (
  `id_compra` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco_unit` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `compra_produto`
--

INSERT INTO `compra_produto` (`id_compra`, `id_produto`, `quantidade`, `preco_unit`) VALUES
(1, 2, 10, 10),
(1, 3, 1, 30),
(2, 1, 1, 100),
(2, 2, 10, 10),
(2, 3, 1, 30),
(3, 1, 1, 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `quantidadeStock` int(11) DEFAULT NULL,
  `tipoProduto` varchar(255) DEFAULT NULL,
  `visibilidade` tinyint(1) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `preco`, `quantidadeStock`, `tipoProduto`, `visibilidade`, `foto`) VALUES
(1, 'Monitor', 'Monitor de 32', 100, 10, 'Hardware', 1, 'p1.png'),
(2, 'Teclado', 'Teclado PT', 10, 12, 'Hardware', 1, 'p2.png'),
(3, 'Tinteiros', 'Tinteiro para Impressora XPTO', 30, 8, 'Consumíveis', 0, 'p3.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoutilizador`
--

CREATE TABLE `tipoutilizador` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipoutilizador`
--

INSERT INTO `tipoutilizador` (`id`, `descricao`) VALUES
(1, 'administrador'),
(2, 'utilizador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_tipoUtilizador` int(11) DEFAULT NULL,
  `dataHoraBan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id`, `username`, `password`, `foto`, `id_tipoUtilizador`, `dataHoraBan`) VALUES
(1, 'admin', 'pass', 'u1.png', 1, NULL),
(2, 'user', 'pass', 'u2.png', 2, NULL),
(3, 'ban', 'pass', 'u3.png', 2, '2023-01-01 10:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilizador` (`id_utilizador`);

--
-- Índices para tabela `compra_produto`
--
ALTER TABLE `compra_produto`
  ADD PRIMARY KEY (`id_compra`,`id_produto`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipoutilizador`
--
ALTER TABLE `tipoutilizador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_tipoUtilizador` (`id_tipoUtilizador`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipoutilizador`
--
ALTER TABLE `tipoutilizador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id`);

--
-- Limitadores para a tabela `compra_produto`
--
ALTER TABLE `compra_produto`
  ADD CONSTRAINT `compra_produto_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id`),
  ADD CONSTRAINT `compra_produto_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `utilizador_ibfk_1` FOREIGN KEY (`id_tipoUtilizador`) REFERENCES `tipoutilizador` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
