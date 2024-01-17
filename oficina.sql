-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Junho-2021 às 12:59
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8
-- Autor: Cristian Marques Santos

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `oficina`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(2, 'Lubrificantes'),
(3, 'Peças Carro'),
(4, 'Peças Motos'),
(6, 'Óleos'),
(7, 'Acessórios');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `telefone`, `email`, `endereco`, `data`) VALUES
(1, 'Pedro Campos', '688.555.555-55', '(33) 33333-3333', 'hugovasconcelosf@hotmail.com', 'Rua A', '2020-10-26'),
(3, 'Marta Campos', '878.888.888-88', '(88) 88888-8888', 'marta@hotmail.com', 'Rua c', '2020-10-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comissoes`
--

CREATE TABLE `comissoes` (
  `id` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `mecanico` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `id_servico` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comissoes`
--

INSERT INTO `comissoes` (`id`, `valor`, `mecanico`, `tipo`, `id_servico`, `data`) VALUES
(6, '75.00', '788.888.888-60', 'Orçamento', 2, '2020-10-28'),
(8, '75.00', '788.888.888-60', 'Orçamento', 2, '2020-10-28'),
(9, '75.00', '788.888.888-60', 'Orçamento', 3, '2020-10-28'),
(10, '39.00', '788.888.888-60', 'Serviço', 15, '2020-10-28'),
(11, '300.00', '877.777.777-77', 'Orçamento', 9, '2020-10-28'),
(12, '240.00', '877.777.777-77', 'Orçamento', 8, '2020-10-27'),
(13, '105.00', '877.777.777-77', 'Orçamento', 7, '2020-10-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `funcionario` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `id_conta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `compras`
--

INSERT INTO `compras` (`id`, `produto`, `valor`, `funcionario`, `data`, `id_conta`) VALUES
(3, 9, '40.00', '000.000.000-00', '2020-10-21', 7),
(4, 14, '500.00', '000.000.000-00', '2020-10-21', 8),
(5, 15, '250.00', '000.000.000-00', '2020-10-21', 9),
(6, 9, '300.00', '000.000.000-00', '2020-10-21', 11),
(7, 16, '700.00', '000.000.000-00', '2020-10-26', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `funcionario` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `data_venc` date NOT NULL,
  `pago` varchar(5) NOT NULL,
  `imagem` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`id`, `descricao`, `valor`, `funcionario`, `data`, `data_venc`, `pago`, `imagem`) VALUES
(3, 'Telefone', '705.00', '866.655.555-55', '2020-10-21', '2020-10-22', 'Não', 'conta3.jpg'),
(4, 'Pagamento Luz', '450.00', '866.655.555-55', '2020-10-21', '2020-10-21', 'Sim', 'movimentacoes.pdf'),
(6, 'Conta Teste', '50.00', '866.655.555-55', '2020-10-21', '2020-10-19', 'Sim', 'sem-foto.jpg'),
(7, 'Compra de Produtos', '40.00', '000.000.000-00', '2020-10-21', '2020-10-21', 'Não', NULL),
(8, 'Compra de Produtos', '500.00', '000.000.000-00', '2020-10-21', '2020-10-21', 'Sim', NULL),
(9, 'Compra de Produtos', '250.00', '000.000.000-00', '2020-10-21', '2020-10-21', 'Sim', NULL),
(10, 'Pagamento Eletricista', '250.00', '866.655.555-55', '2020-10-21', '2020-10-21', 'Não', 'movimentacoes.pdf'),
(11, 'Compra de Produtos', '300.00', '000.000.000-00', '2020-10-21', '2020-10-21', 'Sim', NULL),
(12, 'Compra de Produtos', '700.00', '000.000.000-00', '2020-10-26', '2020-10-26', 'Sim', NULL),
(13, 'Pagamento Encanador', '250.00', '866.655.555-55', '2020-10-26', '2020-10-26', 'Não', 'sem-foto.jpg'),
(15, 'Comissão', '39.00', '788.888.888-60', '2020-10-28', '2020-10-28', 'Não', NULL),
(16, 'Comissão', '39.00', '788.888.888-60', '2020-10-28', '2020-10-28', 'Não', NULL),
(17, 'Comissão', '75.00', '788.888.888-60', '2020-10-28', '2020-10-28', 'Não', NULL),
(18, 'Comissão', '75.00', '788.888.888-60', '2020-10-28', '2020-10-28', 'Não', NULL),
(19, 'Comissão', '75.00', '788.888.888-60', '2020-10-28', '2020-10-28', 'Não', NULL),
(20, 'Comissão', '75.00', '788.888.888-60', '2020-10-28', '2020-10-28', 'Não', NULL),
(21, 'Comissão', '39.00', '788.888.888-60', '2020-10-28', '2020-10-28', 'Não', NULL),
(22, 'Comissão', '300.00', '877.777.777-77', '2020-10-28', '2020-10-28', 'Não', NULL),
(23, 'Comissão', '240.00', '877.777.777-77', '2020-10-28', '2020-10-28', 'Não', NULL),
(24, 'Comissão', '105.00', '877.777.777-77', '2020-10-28', '2020-10-28', 'Não', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_receber`
--

CREATE TABLE `contas_receber` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `adiantamento` decimal(8,2) DEFAULT NULL,
  `mecanico` varchar(20) NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `funcionario` varchar(20) DEFAULT NULL,
  `data` date NOT NULL,
  `pago` varchar(5) NOT NULL,
  `id_servico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contas_receber`
--

INSERT INTO `contas_receber` (`id`, `descricao`, `valor`, `adiantamento`, `mecanico`, `cliente`, `funcionario`, `data`, `pago`, `id_servico`) VALUES
(2, 'Orçamento', '785.00', '400.00', '788.888.888-60', '688.555.555-55', NULL, '2020-10-28', 'Sim', 2),
(3, 'Orçamento', '785.00', '0.00', '788.888.888-60', '688.555.555-55', NULL, '2020-10-28', 'Não', 2),
(4, 'Orçamento', '785.00', '0.00', '788.888.888-60', '688.555.555-55', NULL, '2020-10-28', 'Não', 2),
(5, 'Orçamento', '785.00', '0.00', '788.888.888-60', '688.555.555-55', NULL, '2020-10-28', 'Não', 2),
(6, 'Orçamento', '785.00', '0.00', '788.888.888-60', '688.555.555-55', NULL, '2020-10-28', 'Não', 2),
(7, 'Orçamento', '785.00', '0.00', '788.888.888-60', '688.555.555-55', NULL, '2020-10-28', 'Não', 2),
(8, 'Orçamento', '785.00', '0.00', '788.888.888-60', '688.555.555-55', NULL, '2020-10-28', 'Não', 2),
(9, 'Orçamento', '785.00', '0.00', '788.888.888-60', '688.555.555-55', NULL, '2020-10-28', 'Não', 2),
(10, 'Orçamento', '785.00', '0.00', '788.888.888-60', '688.555.555-55', NULL, '2020-10-28', 'Não', 2),
(11, 'Orçamento', '0.00', '0.00', '788.888.888-60', '878.888.888-88', NULL, '2020-10-28', 'Não', 3),
(12, 'Orçamento', '0.00', '0.00', '788.888.888-60', '878.888.888-88', NULL, '2020-10-28', 'Não', 3),
(13, 'Orçamento', '250.00', '0.00', '788.888.888-60', '878.888.888-88', NULL, '2020-10-28', 'Não', 3),
(14, 'Orçamento', '1235.00', '0.00', '877.777.777-77', '688.555.555-55', NULL, '2020-10-28', 'Não', 5),
(15, 'Orçamento', '885.00', '0.00', '877.777.777-77', '688.555.555-55', NULL, '2020-10-28', 'Não', 7),
(16, 'Orçamento', '885.00', '0.00', '877.777.777-77', '688.555.555-55', NULL, '2020-10-28', 'Não', 7),
(17, 'Orçamento', '1600.00', '0.00', '877.777.777-77', '878.888.888-88', NULL, '2020-10-28', 'Não', 9),
(18, 'Orçamento', '550.00', '0.00', '877.777.777-77', '688.555.555-55', NULL, '2020-10-28', 'Não', 10),
(19, 'Orçamento', '800.00', '0.00', '877.777.777-77', '688.555.555-55', NULL, '2020-10-28', 'Não', 8),
(20, 'Orçamento', '260.00', '0.00', '788.888.888-60', '688.555.555-55', NULL, '2020-10-28', 'Não', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo_pessoa` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `tipo_pessoa`, `cpf`, `telefone`, `email`, `endereco`) VALUES
(1, 'Marcos Souza', 'Jurídica', '55.555.555/5558-88', '(55) 55555-5555', 'marcos@hotmail.com', 'Rua A'),
(3, 'Paloma Campos', 'Física', '585.555.555-55', '(66) 66666-6666', 'paloma@hotmail.com', 'Rua D');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mecanicos`
--

CREATE TABLE `mecanicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mecanicos`
--

INSERT INTO `mecanicos` (`id`, `nome`, `cpf`, `telefone`, `email`, `endereco`) VALUES
(1, 'Marcela Silva', '788.888.888-60', '(88) 88888-8888', 'marcela@hotmail.com', 'Rua A'),
(5, 'Mecânico Teste', '877.777.777-77', '(77) 77777-7777', 'mecanico@hotmail.com', 'Rua S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacoes`
--

CREATE TABLE `movimentacoes` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `funcionario` varchar(20) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `movimentacoes`
--

INSERT INTO `movimentacoes` (`id`, `tipo`, `descricao`, `valor`, `funcionario`, `data`) VALUES
(1, 'Saída', 'Conta Teste', '50.00', '866.655.555-55', '2020-10-21'),
(2, 'Saída', 'Compra de Produtos', '500.00', '866.655.555-55', '2020-10-21'),
(3, 'Saída', 'Compra de Produtos', '300.00', '866.655.555-55', '2020-09-21'),
(4, 'Saída', 'Compra de Produtos', '700.00', '866.655.555-55', '2020-10-26'),
(5, 'Entrada', 'Adiantamento', '350.00', '866.655.555-90', '2020-10-28'),
(6, 'Entrada', 'Adiantamento', '350.00', '866.655.555-90', '2020-10-28'),
(7, 'Entrada', 'Orçamento', '435.00', '866.655.555-90', '2020-10-28'),
(8, 'Saída', 'Pagamento Luz', '450.00', '866.655.555-90', '2020-10-28'),
(9, 'Entrada', 'Adiantamento', '400.00', '866.655.555-90', '2020-10-28'),
(10, 'Entrada', 'Orçamento', '385.00', '866.655.555-90', '2020-10-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamentos`
--

CREATE TABLE `orcamentos` (
  `id` int(11) NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `veiculo` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `servico` int(11) NOT NULL,
  `data` date NOT NULL,
  `data_entrega` date NOT NULL,
  `garantia` int(11) NOT NULL,
  `mecanico` varchar(20) NOT NULL,
  `obs` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orcamentos`
--

INSERT INTO `orcamentos` (`id`, `cliente`, `veiculo`, `descricao`, `valor`, `servico`, `data`, `data_entrega`, `garantia`, `mecanico`, `obs`, `status`) VALUES
(2, '688.555.555-55', 2, 'Troca de óleo, balanceamento...', '250.00', 3, '2020-10-26', '2020-10-30', 30, '788.888.888-60', 'Nenhuma', 'Concluído'),
(3, '878.888.888-88', 4, 'Descricao .....', '250.00', 6, '2020-10-26', '2020-10-29', 60, '788.888.888-60', 'Nenhuma', 'Concluído'),
(5, '688.555.555-55', 3, 'Troca da Suspensão', '450.00', 2, '2020-10-27', '2020-10-30', 30, '877.777.777-77', '', 'Aprovado'),
(6, '688.555.555-55', 3, 'Troca de Suspensão, etc....', '260.00', 7, '2020-10-27', '2020-10-27', 60, '788.888.888-60', 'Carro com amassado nas portas, arranhões no painél.', 'Aprovado'),
(7, '688.555.555-55', 2, 'Trocar oleo, trocar peneus...', '350.00', 3, '2020-10-28', '2020-10-31', 50, '877.777.777-77', 'Veículo apresenta ..', 'Concluído'),
(8, '688.555.555-55', 3, 'Pintura no  veículo ...', '800.00', 5, '2020-10-28', '2020-10-30', 60, '877.777.777-77', 'Nenhuma', 'Concluído'),
(9, '878.888.888-88', 4, 'Manutenção preventiva anual', '1000.00', 3, '2020-10-28', '2020-10-30', 50, '877.777.777-77', 'Nenhuma', 'Concluído'),
(10, '688.555.555-55', 3, 'Trocar Suspensão', '550.00', 2, '2020-10-28', '2020-10-29', 60, '877.777.777-77', 'Nenhuma', 'Aprovado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orc_prod`
--

CREATE TABLE `orc_prod` (
  `id` int(11) NOT NULL,
  `orcamento` int(11) NOT NULL,
  `produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orc_prod`
--

INSERT INTO `orc_prod` (`id`, `orcamento`, `produto`) VALUES
(24, 2, 14),
(25, 5, 13),
(26, 5, 14),
(27, 5, 8),
(28, 2, 9),
(29, 2, 7),
(32, 7, 16),
(33, 7, 9),
(34, 9, 15),
(35, 9, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE `os` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `mecanico` varchar(20) NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `data_entrega` date NOT NULL,
  `concluido` varchar(5) NOT NULL,
  `valor_mao_obra` decimal(8,2) NOT NULL,
  `data` date NOT NULL,
  `veiculo` int(11) NOT NULL,
  `garantia` int(11) DEFAULT NULL,
  `obs` text NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `id_orc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `os`
--

INSERT INTO `os` (`id`, `descricao`, `valor`, `mecanico`, `cliente`, `data_entrega`, `concluido`, `valor_mao_obra`, `data`, `veiculo`, `garantia`, `obs`, `tipo`, `id_orc`) VALUES
(10, 'Manutenção Preventiva', '785.00', '788.888.888-60', '688.555.555-55', '2020-10-30', 'Sim', '250.00', '2020-10-28', 2, 30, 'Nenhuma', 'Orçamento', 2),
(11, 'Manutenção Preventiva', '785.00', '788.888.888-60', '688.555.555-55', '2020-10-30', 'Sim', '250.00', '2020-10-28', 2, 30, 'Nenhuma', 'Orçamento', 2),
(12, 'Balanceamento', '0.00', '788.888.888-60', '878.888.888-88', '2020-10-29', 'Não', '250.00', '2020-10-28', 4, 60, 'Nenhuma', 'Orçamento', 3),
(13, 'Balanceamento', '0.00', '788.888.888-60', '878.888.888-88', '2020-10-29', 'Não', '250.00', '2020-10-28', 4, 60, 'Nenhuma', 'Orçamento', 3),
(14, 'Balanceamento', '250.00', '788.888.888-60', '878.888.888-88', '2020-10-29', 'Sim', '250.00', '2020-10-28', 4, 60, 'Nenhuma', 'Orçamento', 3),
(15, 'Troca de Óleo', '130.00', '788.888.888-60', '688.555.555-55', '2020-10-29', 'Sim', '130.00', '2020-10-28', 3, 60, '', 'Serviço', NULL),
(16, 'Serviços de Oficina', '1235.00', '877.777.777-77', '688.555.555-55', '2020-10-30', 'Não', '450.00', '2020-10-28', 3, 30, '', 'Orçamento', 5),
(17, 'Manutenção Preventiva', '885.00', '877.777.777-77', '688.555.555-55', '2020-10-31', 'Não', '350.00', '2020-10-28', 2, 50, 'Veículo apresenta ..', 'Orçamento', 7),
(18, 'Manutenção Preventiva', '885.00', '877.777.777-77', '688.555.555-55', '2020-10-27', 'Sim', '350.00', '2020-10-28', 2, 50, 'Veículo apresenta ..', 'Orçamento', 7),
(19, 'Manutenção Preventiva', '1600.00', '877.777.777-77', '878.888.888-88', '2020-10-30', 'Sim', '1000.00', '2020-10-28', 4, 50, 'Nenhuma', 'Orçamento', 9),
(20, 'Serviços de Oficina', '550.00', '877.777.777-77', '688.555.555-55', '2020-10-28', 'Não', '550.00', '2020-10-28', 3, 60, 'Nenhuma', 'Orçamento', 10),
(21, 'Pintura', '800.00', '877.777.777-77', '688.555.555-55', '2020-10-30', 'Sim', '800.00', '2020-10-28', 3, 60, 'Nenhuma', 'Orçamento', 8),
(22, 'Troca de Óleo', '130.00', '877.777.777-77', '688.555.555-55', '2020-11-03', 'Não', '130.00', '2020-10-28', 3, 60, 'Nenhuma', 'Serviço', NULL),
(23, 'Balanceamento', '120.00', '788.888.888-60', '688.555.555-55', '2020-10-29', 'Não', '120.00', '2020-10-28', 3, 30, 'Arranhões nas portas, luz quebrada.', 'Serviço', NULL),
(24, 'Troca de Óleo', '130.00', '788.888.888-60', '878.888.888-88', '2020-10-28', 'Não', '130.00', '2020-10-28', 4, 60, '', 'Serviço', NULL),
(25, 'Alinhamento', '260.00', '788.888.888-60', '688.555.555-55', '2020-10-27', 'Não', '260.00', '2020-10-28', 3, 60, 'Carro com amassado nas portas, arranhões no painél.', 'Orçamento', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `categoria` int(11) NOT NULL,
  `fornecedor` int(11) NOT NULL,
  `valor_compra` decimal(8,2) NOT NULL,
  `valor_venda` decimal(8,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `categoria`, `fornecedor`, `valor_compra`, `valor_venda`, `estoque`, `descricao`, `imagem`) VALUES
(4, 'Bateria', 3, 3, '250.00', '350.00', 5, 'A Bateria,é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas....', 'bateria.jpg'),
(7, 'Correia Dentada', 3, 3, '150.00', '200.00', 8, 'A correia dentada, também chamada de correia de distribuição, é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas q', 'correia-dentada.jpg'),
(8, 'Óleo Pneu Pretinho', 6, 1, '25.00', '35.00', 5, 'As principais características dos óleos lubrificantes são a viscosidade, o índice de viscosidade (IV) e a densidade. A viscosidade mede a dificuldade com que o óleo escorre (escoa).', 'pneu-pretinho.jpg'),
(9, 'Óleo Lubrificante', 2, 1, '20.00', '35.00', 17, 'Linha de Lubrificação Aeronáutica Completa, você encontra na Lubvap. Melhores Preços, Qualidade Comprovada, Atendimento Personalizado, e muito mais, Confira. Atendimento 24h. Produto a pronta entrega. Melhor preço. Garantia de eficiência. Marcas: Rocol, A', 'oleo.jpg'),
(10, 'Cabo de Ignição', 3, 1, '250.00', '300.00', 11, 'A correia dentada, também chamada de correia de distribuição, é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas que resultam da fricção constante pelo movimento de tração.A correia dentada, também chamada de correia de distribuição, é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas que resultam da fricção constante pelo movimento de tração.', 'cabo-de-ignicao.jpg'),
(11, 'Calota Aro 13', 3, 1, '120.00', '220.00', 10, 'A correia dentada, também chamada de correia de distribuição, é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas que resultam da fricção constante pelo movimento de tração.A correia dentada, também chamada de correia de distribuição, é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas que resultam da fricção constante pelo movimento de tração.', 'calota-aro13.jpg'),
(12, 'Capa Proteção', 7, 1, '100.00', '120.00', 14, 'A correia dentada, também chamada de correia de distribuição, é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas que resultam da fricção constante pelo movimento de tração.A correia dentada, também chamada de correia de distribuição, é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas que resultam da fricção constante pelo movimento de tração.', 'capa-protecao.jpg'),
(13, 'Embreagem', 3, 1, '350.00', '450.00', 19, 'A correia dentada, também chamada de correia de distribuição, é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas que resultam da fricção constante pelo movimento de tração.A correia dentada, também chamada de correia de distribuição, é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas que resultam da fricção constante pelo movimento de tração.', 'embreagem.jpg'),
(14, 'Faról', 3, 3, '250.00', '300.00', 3, 'A correia dentada, também chamada de correia de distribuição, é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas que resultam da fricção constante pelo movimento de tração.A correia dentada, também chamada de correia de distribuição, é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas que resultam da fricção constante pelo movimento de tração.', 'farol-de-carro.jpg'),
(15, 'Freio Disco', 3, 3, '250.00', '300.00', 3, 'A correia dentada, também chamada de correia de distribuição, é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas que resultam da fricção constante pelo movimento de tração.A correia dentada, também chamada de correia de distribuição, é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas que resultam da fricção constante pelo movimento de tração.', 'freio-de-disco.jpg'),
(16, 'ParaChoque Dianteiro', 3, 1, '350.00', '500.00', 13, 'A correia dentada, também chamada de correia de distribuição, é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas que resultam da fricção constante pelo movimento de tração.A correia dentada, também chamada de correia de distribuição, é uma peça matreira. Além de não dar sinais evidentes de desgaste ou pistas de que algo está mal, ela mantém ocultas na sua parte interna, composta por pequenos dentes de borracha, as mazelas que resultam da fricção constante pelo movimento de tração.', 'parachoque-dianteiro.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recepcionistas`
--

CREATE TABLE `recepcionistas` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `recepcionistas`
--

INSERT INTO `recepcionistas` (`id`, `nome`, `cpf`, `telefone`, `email`, `endereco`) VALUES
(1, 'Paulo Campos', '866.655.555-55', '(00) 00000-0000', 'paulo@hotmail.com', 'Rua A'),
(3, 'Recepcionista Teste', '444.444.444-44', '(44) 44444-4444', 'recep@hotmail.com', 'Rua A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `valor` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `nome`, `valor`) VALUES
(1, 'Troca de Óleo', '130.00'),
(2, 'Serviços de Oficina', '0.00'),
(3, 'Manutenção Preventiva', '0.00'),
(5, 'Pintura', '0.00'),
(6, 'Balanceamento', '120.00'),
(7, 'Alinhamento', '100.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`) VALUES
(1, 'Marcela Silva', '788.888.888-60', 'marcela@hotmail.com', '123', 'mecanico'),
(2, 'Administrador', '000.000.000-00', 'hvfadvocacia@gmail.com', '123', 'admin'),
(3, 'Paulo Campos', '866.655.555-90', 'paulo@hotmail.com', '123', 'recep'),
(5, 'Recepcionista Teste', '444.444.444-44', 'recep@hotmail.com', '123', 'recep'),
(10, 'Mecânico Teste', '877.777.777-77', 'mecanico@hotmail.com', '123', 'mecanico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `cor` varchar(30) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `ano` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `marca`, `modelo`, `cor`, `placa`, `ano`, `km`, `cliente`, `data`) VALUES
(2, 'Fiat', 'Uno', 'Verde', 'PKX-4125', 2005, 160000, '688.555.555-55', '2020-10-26'),
(3, 'Ford', 'Ká', 'Branca', 'PWD-4545', 2018, 50000, '688.555.555-55', '2020-10-26'),
(4, 'Ford', 'Ranger Storm', 'Vermelha', 'RWS-7895', 2020, 8000, '878.888.888-88', '2020-10-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `funcionario` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `id_orc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `produto`, `valor`, `funcionario`, `data`, `id_orc`) VALUES
(1, 16, '500.00', '877.777.777-77', '2020-10-28', 7),
(2, 9, '35.00', '877.777.777-77', '2020-10-28', 7),
(3, 15, '300.00', '877.777.777-77', '2020-10-28', 9),
(4, 10, '300.00', '877.777.777-77', '2020-10-28', 9);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `comissoes`
--
ALTER TABLE `comissoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mecanicos`
--
ALTER TABLE `mecanicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orc_prod`
--
ALTER TABLE `orc_prod`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `recepcionistas`
--
ALTER TABLE `recepcionistas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `comissoes`
--
ALTER TABLE `comissoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `mecanicos`
--
ALTER TABLE `mecanicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `orc_prod`
--
ALTER TABLE `orc_prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `recepcionistas`
--
ALTER TABLE `recepcionistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
