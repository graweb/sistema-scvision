-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Ago-2020 às 02:01
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `scvision`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes_fornecedores`
--

CREATE TABLE `tb_clientes_fornecedores` (
  `id_cliente_fornecedor` int(11) NOT NULL,
  `razao_social` varchar(100) NOT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `banco` varchar(30) DEFAULT NULL,
  `agencia` smallint(8) DEFAULT NULL,
  `conta` varchar(15) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `tipo_logradouro` varchar(15) DEFAULT NULL,
  `logradouro` varchar(120) DEFAULT NULL,
  `numero` varchar(5) DEFAULT NULL,
  `complemento` varchar(120) DEFAULT NULL,
  `situacao` tinyint(1) NOT NULL DEFAULT 0,
  `tipo` tinyint(1) NOT NULL DEFAULT 1,
  `cadastrado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ficha_clinica`
--

CREATE TABLE `tb_ficha_clinica` (
  `id_ficha_clinica` int(11) NOT NULL,
  `fk_id_otica` int(11) NOT NULL,
  `fk_id_forma_pagamento` int(11) NOT NULL DEFAULT 1,
  `fk_id_hirschberg` int(11) NOT NULL DEFAULT 1,
  `fk_id_olho_dominante` int(11) NOT NULL DEFAULT 1,
  `nome` varchar(40) NOT NULL,
  `profissao` varchar(30) DEFAULT NULL,
  `genero` tinyint(1) NOT NULL COMMENT '1 = Feminino / 2 = Masculino',
  `idade` tinyint(3) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_ultima_consulta` datetime DEFAULT NULL,
  `motivo_consulta` text DEFAULT NULL,
  `informacoes_pessoais` text DEFAULT NULL,
  `auto_od` float(10,2) DEFAULT NULL,
  `auto_oe` float(10,2) DEFAULT NULL,
  `afinacao_od` float(10,2) DEFAULT NULL,
  `afinacao_oe` float(10,2) DEFAULT NULL,
  `oculos_antigo_od` float(10,2) DEFAULT NULL,
  `oculos_antigo_oe` float(10,2) DEFAULT NULL,
  `situacao` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = aberta / 1 = atendida / 3 = cancelada',
  `cadastrado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_formas_pagamento`
--

CREATE TABLE `tb_formas_pagamento` (
  `id_forma_pagamento` int(11) NOT NULL,
  `codigo_forma_pagamento` varchar(10) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `cadastrado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_formas_pagamento`
--

INSERT INTO `tb_formas_pagamento` (`id_forma_pagamento`, `codigo_forma_pagamento`, `descricao`, `valor`, `cadastrado_em`, `atualizado_em`) VALUES
(1, '001', 'Dinheiro', '0.00', '2020-07-21 22:06:52', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_hirschberg`
--

CREATE TABLE `tb_hirschberg` (
  `id_hirschberg` int(11) NOT NULL,
  `codigo_hirschberg` varchar(10) NOT NULL,
  `descricao` text NOT NULL,
  `cadastrado_em` timestamp NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_hirschberg`
--

INSERT INTO `tb_hirschberg` (`id_hirschberg`, `codigo_hirschberg`, `descricao`, `cadastrado_em`, `atualizado_em`) VALUES
(1, '001', 'Hirschberg', '2020-07-21 22:07:17', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_movimentos`
--

CREATE TABLE `tb_movimentos` (
  `id_movimento` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_cliente_fornecedor` int(11) NOT NULL,
  `numero_nfe` varchar(20) NOT NULL,
  `lote_1` varchar(40) NOT NULL,
  `lote_2` varchar(40) DEFAULT NULL,
  `lote_3` varchar(40) DEFAULT NULL,
  `lote_4` varchar(40) DEFAULT NULL,
  `lote_5` varchar(40) DEFAULT NULL,
  `quantidade` smallint(6) NOT NULL,
  `tipo` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = entrada \\\\ 2 = saída',
  `data_entrada` datetime DEFAULT NULL,
  `data_saida` datetime DEFAULT NULL,
  `data_validade_1` date NOT NULL,
  `data_validade_2` date DEFAULT NULL,
  `data_validade_3` date DEFAULT NULL,
  `data_validade_4` date DEFAULT NULL,
  `data_validade_5` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_olho_dominante`
--

CREATE TABLE `tb_olho_dominante` (
  `id_olho_dominante` int(11) NOT NULL,
  `codigo_olho_dominante` varchar(10) NOT NULL,
  `descricao` text NOT NULL,
  `cadastrado_em` timestamp NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_olho_dominante`
--

INSERT INTO `tb_olho_dominante` (`id_olho_dominante`, `codigo_olho_dominante`, `descricao`, `cadastrado_em`, `atualizado_em`) VALUES
(1, '001', 'Olho Dominante', '2020-07-21 22:07:30', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_oticas`
--

CREATE TABLE `tb_oticas` (
  `id_otica` int(11) NOT NULL,
  `otica` varchar(40) NOT NULL,
  `situacao` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = inativa / 1 = ativa',
  `cadastrado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_oticas`
--

INSERT INTO `tb_oticas` (`id_otica`, `otica`, `situacao`, `cadastrado_em`, `atualizado_em`) VALUES
(1, '123 oticas', 1, '2020-06-19 18:05:44', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_permissoes`
--

CREATE TABLE `tb_permissoes` (
  `id_permissao` int(11) NOT NULL,
  `nome` varchar(30) CHARACTER SET latin1 NOT NULL,
  `permissoes` text CHARACTER SET latin1 NOT NULL,
  `situacao` tinyint(1) NOT NULL DEFAULT 0,
  `cadatrado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_permissoes`
--

INSERT INTO `tb_permissoes` (`id_permissao`, `nome`, `permissoes`, `situacao`, `cadatrado_em`, `atualizado_em`) VALUES
(1, 'Administrador', 'a:45:{s:13:\"vFichaClinica\";s:1:\"1\";s:13:\"aFichaClinica\";s:1:\"1\";s:13:\"eFichaClinica\";s:1:\"1\";s:13:\"dFichaClinica\";s:1:\"1\";s:16:\"vFormasPagamento\";s:1:\"1\";s:16:\"aFormasPagamento\";s:1:\"1\";s:16:\"eFormasPagamento\";s:1:\"1\";s:16:\"dFormasPagamento\";s:1:\"1\";s:11:\"vHirschberg\";s:1:\"1\";s:11:\"aHirschberg\";s:1:\"1\";s:11:\"eHirschberg\";s:1:\"1\";s:11:\"dHirschberg\";s:1:\"1\";s:14:\"vOlhoDominante\";s:1:\"1\";s:14:\"aOlhoDominante\";s:1:\"1\";s:14:\"eOlhoDominante\";s:1:\"1\";s:14:\"dOlhoDominante\";s:1:\"1\";s:7:\"vOticas\";s:1:\"1\";s:7:\"aOticas\";s:1:\"1\";s:7:\"eOticas\";s:1:\"1\";s:7:\"dOticas\";s:1:\"1\";s:21:\"vClientesFornecedores\";s:1:\"1\";s:21:\"aClientesFornecedores\";s:1:\"1\";s:21:\"eClientesFornecedores\";s:1:\"1\";s:21:\"dClientesFornecedores\";s:1:\"1\";s:9:\"vProdutos\";s:1:\"1\";s:9:\"aProdutos\";s:1:\"1\";s:9:\"eProdutos\";s:1:\"1\";s:9:\"dProdutos\";s:1:\"1\";s:11:\"vMovEntrada\";s:1:\"1\";s:11:\"aMovEntrada\";s:1:\"1\";s:11:\"eMovEntrada\";s:1:\"1\";s:11:\"dMovEntrada\";s:1:\"1\";s:9:\"vMovSaida\";s:1:\"1\";s:9:\"aMovSaida\";s:1:\"1\";s:9:\"eMovSaida\";s:1:\"1\";s:9:\"dMovSaida\";s:1:\"1\";s:11:\"vRelatorios\";s:1:\"1\";s:15:\"vConfigUsuarios\";s:1:\"1\";s:15:\"aConfigUsuarios\";s:1:\"1\";s:15:\"eConfigUsuarios\";s:1:\"1\";s:15:\"dConfigUsuarios\";s:1:\"1\";s:17:\"vConfigPermissoes\";s:1:\"1\";s:17:\"aConfigPermissoes\";s:1:\"1\";s:17:\"eConfigPermissoes\";s:1:\"1\";s:17:\"dConfigPermissoes\";s:1:\"1\";}', 1, '2020-06-08 22:23:41', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `id_produto` int(11) NOT NULL,
  `produto` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `custo_unitario` decimal(10,2) DEFAULT NULL,
  `preco_venda` decimal(10,2) DEFAULT NULL,
  `unidade` varchar(10) DEFAULT NULL,
  `quantidade` smallint(6) NOT NULL DEFAULT 10,
  `descricao` text DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT 0,
  `cadastrado_em` timestamp NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_relatorios`
--

CREATE TABLE `tb_relatorios` (
  `id_relatorio` int(11) NOT NULL,
  `relatorio` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sessoes`
--

CREATE TABLE `tb_sessoes` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_sessoes`
--

INSERT INTO `tb_sessoes` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('fb2ae8e43a41af32562c6541f39f98b7bdcb7d48', '201.17.80.121', 1591656643, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313635363634333b),
('e6cfd9dce22e60515410cdc391cdc916a6dd1576', '201.17.80.121', 1591656739, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313635363731343b),
('b77f5f1c6c3a2f7a48065a63e3a49e5c75b3a1d2', '201.17.80.121', 1591656802, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313635363830323b),
('ef971851b2304981375e3f1bc438e69733d7845b', '201.17.80.121', 1591656802, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313635363830323b),
('7307ff8a47d4584b26d7688c7e7c100cb22bf760', '201.17.80.121', 1591657916, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313635373931363b),
('3dbca921c73e8d0cf1834c5e9ca473122433b237', '201.17.80.121', 1591657916, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313635373931363b),
('1e9a03737b399fcceb604f3f1aeea56d61fd88ad', '201.17.80.121', 1591657937, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313635373933373b),
('ef9e0fed9759f2c4050945dea7d0aca35efa9cdd', '201.17.80.121', 1591657938, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313635373933383b),
('12df6adb7d70e0d3d599a4324e4e0e8d84965dcd', '201.17.80.121', 1591658004, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313635383030343b),
('08b8c95ea6535657478f7a4c622f3ff9c1a80dc5', '201.17.80.121', 1591658237, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313635383233373b),
('eee127fa150a978b3719a611d62b3512a68812dd', '201.17.80.121', 1591658570, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313635383537303b),
('130d2a1fa76c57eb0dff1a54a48d9f5d4056164d', '147.135.220.31', 1591806549, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313830363534383b),
('433a1483d80e894c78b4d8bb174bb8b3d1e679f5', '162.247.74.74', 1591807140, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313830373133393b),
('e5080090352ef258c7b79a3de1fc624f865aca97', '177.37.116.176', 1591975629, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313937353537323b69645f7573756172696f7c733a313a2232223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a363a22456c697a6961223b656d61696c7c733a32343a22656c697a6961406f70746f63656e7465722e636f6d2e6272223b6d756461725f73656e68617c733a313a2231223b6c6f6761646f7c623a313b),
('99f4596312c5e26c3f3cb396c6bf87ba0b25c5ca', '38.145.83.209', 1592033615, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539323033333631343b),
('93b67a873879ec7a96680e5afdaaa7a1eb67e5a8', '177.84.33.242', 1592229672, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539323232393637323b),
('3a484ae82d7f65f5b9114d21aa261bc0a2f2f9b3', '189.112.139.137', 1592589944, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539323538393934343b69645f7573756172696f7c733a313a2232223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a363a22456c697a6961223b656d61696c7c733a32343a22656c697a6961406f70746f63656e7465722e636f6d2e6272223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('932d31ea0ae4a7573af04584969168034f68a38d', '189.112.139.137', 1592590565, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539323539303536353b69645f7573756172696f7c733a313a2232223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a363a22456c697a6961223b656d61696c7c733a32343a22656c697a6961406f70746f63656e7465722e636f6d2e6272223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('dc521e906972466b5f294a523d291bb8d48457e0', '189.112.139.137', 1592590764, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539323539303736343b),
('eba1feecddf92cb98c3d1a567a9509339f5ae02f', '201.17.80.121', 1592591079, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539323539313037393b),
('bf42a81c88f8741b4dd7668780b63957d1eb2487', '177.79.116.159', 1592594659, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539323539343634343b69645f7573756172696f7c733a313a2232223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a363a22456c697a6961223b656d61696c7c733a32343a22656c697a6961406f70746f63656e7465722e636f6d2e6272223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('37a0d014d89f18f451bd69f2bdbd1a78c7a216a7', '18.196.19.45', 1592655280, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539323635353238303b),
('2ac72d5773a8df0367a91a78371a1a1bc80587a6', '18.196.19.45', 1592655281, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539323635353238313b),
('a1ea9c6c3ff1db3a4448bb7075a762c06bd5d179', '177.84.33.242', 1592857596, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539323835373539353b),
('31373401779de303c6f353ba39f32c288851224f', '177.84.33.242', 1593090179, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333039303137393b),
('6d4057bcd7f0b474f32018c92515f2d760f72f8c', '189.112.139.137', 1593623525, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333632333532353b69645f7573756172696f7c733a313a2232223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a363a22456c697a6961223b656d61696c7c733a32343a22656c697a6961406f70746f63656e7465722e636f6d2e6272223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('ecacc24d52375ac0f537c14fa2a980e7861cac6c', '189.112.139.137', 1593623525, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333632333532353b69645f7573756172696f7c733a313a2232223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a363a22456c697a6961223b656d61696c7c733a32343a22656c697a6961406f70746f63656e7465722e636f6d2e6272223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('9181a8c7f7b40b3a881667b0a64f438152747eec', '189.112.139.137', 1593633549, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333633333534393b),
('72c020de7c701254a2ee9b52a556c2610856bf32', '201.17.80.121', 1593632546, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333633323534363b),
('ba150c138933b101a5768ac5d874a3a441ff7739', '201.17.80.121', 1593632601, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333633323630313b),
('5a846c3a6bccbdf9c3e3acbd375157ced4ed597e', '189.112.139.137', 1593633647, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333633333534393b69645f7573756172696f7c733a313a2232223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a363a22456c697a6961223b656d61696c7c733a32343a22656c697a6961406f70746f63656e7465722e636f6d2e6272223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('7fd2c9d022494b330ed3c7c4f9bcc2fb58486e59', '131.220.6.156', 1593786026, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333738363032363b),
('edda67bc186a55e26597115e2e2c6b4b5a895ace', '131.220.6.156', 1593786027, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333738363032373b),
('3eeb4b722323afd6411fb6f55f1daff5c0ca21ef', '187.67.97.124', 1594076167, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539343037363136373b),
('ee80c5ea4b698745b179e877e1e368aabbb8bf37', '177.84.33.242', 1594307527, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539343330373532373b),
('cb765b765a739e0c0fd3b9693bf33c4631d9cb77', '187.13.208.108', 1594491988, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539343439313938383b69645f7573756172696f7c733a313a2232223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a363a22456c697a6961223b656d61696c7c733a32343a22656c697a6961406f70746f63656e7465722e636f6d2e6272223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('04ebb79f25de8454ccd5a13cd19ff126d370365e', '187.13.208.108', 1594491989, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539343439313938383b69645f7573756172696f7c733a313a2232223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a363a22456c697a6961223b656d61696c7c733a32343a22656c697a6961406f70746f63656e7465722e636f6d2e6272223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('8763069065f578d8dc90e48fd36ae330b5799148', '189.112.139.137', 1594743218, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539343734333139373b69645f7573756172696f7c733a313a2232223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a363a22456c697a6961223b656d61696c7c733a32343a22656c697a6961406f70746f63656e7465722e636f6d2e6272223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('086059fe2594b6479f3cbbbd1f535d2a20bd57d8', '177.84.33.242', 1594929573, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539343932393537333b),
('4aa98b7e4da743fa1a64df2a0068722fa75301bd', '189.112.139.137', 1595344758, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353334343735383b69645f7573756172696f7c733a313a2232223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a363a22456c697a6961223b656d61696c7c733a32343a22656c697a6961406f70746f63656e7465722e636f6d2e6272223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('e63277992d7ea3abb7544013deec5c04fb71b99b', '189.112.139.137', 1595344758, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353334343735383b),
('742a6af8f61e9fe16a484257f0e939d5297521e0', '201.17.80.121', 1595369824, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353336393832343b),
('f5132dab1123de7bac2ea4cc5d9e4f727443c2ad', '189.112.139.137', 1595857116, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353835373131363b69645f7573756172696f7c733a313a2232223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a363a22456c697a6961223b656d61696c7c733a32343a22656c697a6961406f70746f63656e7465722e636f6d2e6272223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('f2e97b6035531f1879eb1ac239d40144131c6c93', '189.112.139.137', 1595857171, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353835373135313b69645f7573756172696f7c733a313a2234223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a31303a2254616972697320536332223b656d61696c7c733a32373a2273616e64726f2e63617374726f407363327465632e636f6d2e6272223b6d756461725f73656e68617c733a313a2231223b6c6f6761646f7c623a313b);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `fk_id_permissao` int(11) NOT NULL,
  `nome` varchar(80) CHARACTER SET latin1 NOT NULL,
  `usuario` varchar(45) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT '40bd001563085fc35165329ea1ff5c5ecbdbbeef',
  `situacao` tinyint(1) NOT NULL DEFAULT 0,
  `tipo` tinyint(1) NOT NULL DEFAULT 1,
  `mudar_senha` tinyint(1) NOT NULL DEFAULT 0,
  `cadastrado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `fk_id_permissao`, `nome`, `usuario`, `email`, `senha`, `situacao`, `tipo`, `mudar_senha`, `cadastrado_em`, `atualizado_em`) VALUES
(1, 1, 'Administrador', 'admin', 'graweb1@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1, 0, '2020-06-08 22:24:20', NULL),
(2, 1, 'Elizia', 'Elizia', 'elizia@optocenter.com.br', '930b43e9b581536f31fcfd89a5fad2f2130c629e', 1, 1, 0, '2020-06-08 23:16:26', NULL),
(3, 1, 'Joelma', 'Joelma', 'joelma@optocenter.com.br', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1, 1, '2020-06-08 23:17:01', NULL),
(4, 1, 'Tairis Sc2', 'Tairis ', 'sandro.castro@sc2tec.com.br', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 3, 0, '2020-07-27 13:38:36', NULL);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_ficha_clinica`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vw_ficha_clinica` (
`id_ficha_clinica` int(11)
,`fk_id_otica` int(11)
,`otica` varchar(40)
,`fk_id_forma_pagamento` int(11)
,`descricao_forma_pgto` text
,`fk_id_hirschberg` int(11)
,`descricao_hirschberg` text
,`fk_id_olho_dominante` int(11)
,`descricao_olho_dominante` text
,`nome` varchar(40)
,`profissao` varchar(30)
,`genero` tinyint(1)
,`idade` tinyint(3)
,`telefone` varchar(15)
,`data_nascimento` varchar(10)
,`data_ultima_consulta` varchar(10)
,`motivo_consulta` text
,`informacoes_pessoais` text
,`auto_od` float(10,2)
,`auto_oe` float(10,2)
,`afinacao_od` float(10,2)
,`afinacao_oe` float(10,2)
,`oculos_antigo_od` float(10,2)
,`oculos_antigo_oe` float(10,2)
,`situacao` tinyint(1)
,`cadastrado_em` varchar(26)
,`atualizado_em` datetime
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_movimentos`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vw_movimentos` (
`id_movimento` int(11)
,`id_produto` int(11)
,`produto` varchar(50)
,`id_cliente_fornecedor` int(11)
,`razao_social` varchar(100)
,`numero_nfe` varchar(20)
,`lote_1` varchar(40)
,`lote_2` varchar(40)
,`lote_3` varchar(40)
,`lote_4` varchar(40)
,`lote_5` varchar(40)
,`quantidade` smallint(6)
,`tipo` tinyint(1)
,`data_entrada` varchar(24)
,`data_saida` varchar(24)
,`data_validade_1` varchar(10)
,`data_validade_2` varchar(10)
,`data_validade_3` varchar(10)
,`data_validade_4` varchar(10)
,`data_validade_5` varchar(10)
);

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_ficha_clinica`
--
DROP TABLE IF EXISTS `vw_ficha_clinica`;

CREATE ALGORITHM=UNDEFINED DEFINER=`sc2tec98`@`localhost` SQL SECURITY DEFINER VIEW `vw_ficha_clinica`  AS  select `tb_ficha_clinica`.`id_ficha_clinica` AS `id_ficha_clinica`,`tb_ficha_clinica`.`fk_id_otica` AS `fk_id_otica`,`tb_oticas`.`otica` AS `otica`,`tb_ficha_clinica`.`fk_id_forma_pagamento` AS `fk_id_forma_pagamento`,`tb_formas_pagamento`.`descricao` AS `descricao_forma_pgto`,`tb_ficha_clinica`.`fk_id_hirschberg` AS `fk_id_hirschberg`,`tb_hirschberg`.`descricao` AS `descricao_hirschberg`,`tb_ficha_clinica`.`fk_id_olho_dominante` AS `fk_id_olho_dominante`,`tb_olho_dominante`.`descricao` AS `descricao_olho_dominante`,`tb_ficha_clinica`.`nome` AS `nome`,`tb_ficha_clinica`.`profissao` AS `profissao`,`tb_ficha_clinica`.`genero` AS `genero`,`tb_ficha_clinica`.`idade` AS `idade`,`tb_ficha_clinica`.`telefone` AS `telefone`,date_format(`tb_ficha_clinica`.`data_nascimento`,'%d/%m/%Y') AS `data_nascimento`,date_format(`tb_ficha_clinica`.`data_ultima_consulta`,'%d/%m/%Y') AS `data_ultima_consulta`,`tb_ficha_clinica`.`motivo_consulta` AS `motivo_consulta`,`tb_ficha_clinica`.`informacoes_pessoais` AS `informacoes_pessoais`,`tb_ficha_clinica`.`auto_od` AS `auto_od`,`tb_ficha_clinica`.`auto_oe` AS `auto_oe`,`tb_ficha_clinica`.`afinacao_od` AS `afinacao_od`,`tb_ficha_clinica`.`afinacao_oe` AS `afinacao_oe`,`tb_ficha_clinica`.`oculos_antigo_od` AS `oculos_antigo_od`,`tb_ficha_clinica`.`oculos_antigo_oe` AS `oculos_antigo_oe`,`tb_ficha_clinica`.`situacao` AS `situacao`,date_format(`tb_ficha_clinica`.`cadastrado_em`,'%d/%m/%Y - %H:%i:%s') AS `cadastrado_em`,`tb_ficha_clinica`.`atualizado_em` AS `atualizado_em` from ((((`tb_ficha_clinica` left join `tb_oticas` on(`tb_ficha_clinica`.`fk_id_otica` = `tb_oticas`.`id_otica`)) left join `tb_formas_pagamento` on(`tb_ficha_clinica`.`fk_id_forma_pagamento` = `tb_formas_pagamento`.`id_forma_pagamento`)) left join `tb_hirschberg` on(`tb_ficha_clinica`.`fk_id_hirschberg` = `tb_hirschberg`.`id_hirschberg`)) left join `tb_olho_dominante` on(`tb_ficha_clinica`.`fk_id_olho_dominante` = `tb_olho_dominante`.`id_olho_dominante`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_movimentos`
--
DROP TABLE IF EXISTS `vw_movimentos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`sc2tec98`@`localhost` SQL SECURITY DEFINER VIEW `vw_movimentos`  AS  select `tb_movimentos`.`id_movimento` AS `id_movimento`,`tb_movimentos`.`id_produto` AS `id_produto`,`tb_produtos`.`produto` AS `produto`,`tb_movimentos`.`id_cliente_fornecedor` AS `id_cliente_fornecedor`,`tb_clientes_fornecedores`.`razao_social` AS `razao_social`,`tb_movimentos`.`numero_nfe` AS `numero_nfe`,`tb_movimentos`.`lote_1` AS `lote_1`,`tb_movimentos`.`lote_2` AS `lote_2`,`tb_movimentos`.`lote_3` AS `lote_3`,`tb_movimentos`.`lote_4` AS `lote_4`,`tb_movimentos`.`lote_5` AS `lote_5`,`tb_movimentos`.`quantidade` AS `quantidade`,`tb_movimentos`.`tipo` AS `tipo`,date_format(`tb_movimentos`.`data_entrada`,'%d/%m/%Y %H:%i:%s') AS `data_entrada`,date_format(`tb_movimentos`.`data_saida`,'%d/%m/%Y %H:%i:%s') AS `data_saida`,date_format(`tb_movimentos`.`data_validade_1`,'%d/%m/%Y') AS `data_validade_1`,date_format(`tb_movimentos`.`data_validade_2`,'%d/%m/%Y') AS `data_validade_2`,date_format(`tb_movimentos`.`data_validade_3`,'%d/%m/%Y') AS `data_validade_3`,date_format(`tb_movimentos`.`data_validade_4`,'%d/%m/%Y') AS `data_validade_4`,date_format(`tb_movimentos`.`data_validade_5`,'%d/%m/%Y') AS `data_validade_5` from ((`tb_movimentos` left join `tb_produtos` on(`tb_movimentos`.`id_produto` = `tb_produtos`.`id_produto`)) left join `tb_clientes_fornecedores` on(`tb_movimentos`.`id_cliente_fornecedor` = `tb_clientes_fornecedores`.`id_cliente_fornecedor`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_clientes_fornecedores`
--
ALTER TABLE `tb_clientes_fornecedores`
  ADD PRIMARY KEY (`id_cliente_fornecedor`);

--
-- Índices para tabela `tb_ficha_clinica`
--
ALTER TABLE `tb_ficha_clinica`
  ADD PRIMARY KEY (`id_ficha_clinica`),
  ADD KEY `fk_id_otica_idx` (`fk_id_otica`),
  ADD KEY `fk_id_hirschberg_idx` (`fk_id_hirschberg`),
  ADD KEY `fk_id_olho_dominante_idx` (`fk_id_olho_dominante`),
  ADD KEY `fk_id_forma_pagamento_idx` (`fk_id_forma_pagamento`);

--
-- Índices para tabela `tb_formas_pagamento`
--
ALTER TABLE `tb_formas_pagamento`
  ADD PRIMARY KEY (`id_forma_pagamento`);

--
-- Índices para tabela `tb_hirschberg`
--
ALTER TABLE `tb_hirschberg`
  ADD PRIMARY KEY (`id_hirschberg`);

--
-- Índices para tabela `tb_movimentos`
--
ALTER TABLE `tb_movimentos`
  ADD PRIMARY KEY (`id_movimento`),
  ADD KEY `FK_ID_PRODUTO_idx` (`id_produto`),
  ADD KEY `FK_ID_CLI_FORN_idx` (`id_cliente_fornecedor`);

--
-- Índices para tabela `tb_olho_dominante`
--
ALTER TABLE `tb_olho_dominante`
  ADD PRIMARY KEY (`id_olho_dominante`);

--
-- Índices para tabela `tb_oticas`
--
ALTER TABLE `tb_oticas`
  ADD PRIMARY KEY (`id_otica`);

--
-- Índices para tabela `tb_permissoes`
--
ALTER TABLE `tb_permissoes`
  ADD PRIMARY KEY (`id_permissao`);

--
-- Índices para tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `tb_relatorios`
--
ALTER TABLE `tb_relatorios`
  ADD PRIMARY KEY (`id_relatorio`);

--
-- Índices para tabela `tb_sessoes`
--
ALTER TABLE `tb_sessoes`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `FK_ID_PERMISSAO_idx` (`fk_id_permissao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_clientes_fornecedores`
--
ALTER TABLE `tb_clientes_fornecedores`
  MODIFY `id_cliente_fornecedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_ficha_clinica`
--
ALTER TABLE `tb_ficha_clinica`
  MODIFY `id_ficha_clinica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_formas_pagamento`
--
ALTER TABLE `tb_formas_pagamento`
  MODIFY `id_forma_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_hirschberg`
--
ALTER TABLE `tb_hirschberg`
  MODIFY `id_hirschberg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_movimentos`
--
ALTER TABLE `tb_movimentos`
  MODIFY `id_movimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_olho_dominante`
--
ALTER TABLE `tb_olho_dominante`
  MODIFY `id_olho_dominante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_oticas`
--
ALTER TABLE `tb_oticas`
  MODIFY `id_otica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_permissoes`
--
ALTER TABLE `tb_permissoes`
  MODIFY `id_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_relatorios`
--
ALTER TABLE `tb_relatorios`
  MODIFY `id_relatorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_ficha_clinica`
--
ALTER TABLE `tb_ficha_clinica`
  ADD CONSTRAINT `fk_id_forma_pagamento` FOREIGN KEY (`fk_id_forma_pagamento`) REFERENCES `tb_formas_pagamento` (`id_forma_pagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_hirschberg` FOREIGN KEY (`fk_id_hirschberg`) REFERENCES `tb_hirschberg` (`id_hirschberg`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_olho_dominante` FOREIGN KEY (`fk_id_olho_dominante`) REFERENCES `tb_olho_dominante` (`id_olho_dominante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_otica` FOREIGN KEY (`fk_id_otica`) REFERENCES `tb_oticas` (`id_otica`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_movimentos`
--
ALTER TABLE `tb_movimentos`
  ADD CONSTRAINT `FK_ID_CLI_FORN` FOREIGN KEY (`id_cliente_fornecedor`) REFERENCES `tb_clientes_fornecedores` (`id_cliente_fornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ID_PRODUTO` FOREIGN KEY (`id_produto`) REFERENCES `tb_produtos` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `FK_ID_PERMISSAO` FOREIGN KEY (`fk_id_permissao`) REFERENCES `tb_permissoes` (`id_permissao`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
