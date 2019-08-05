-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Jun-2019 às 21:01
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE `atividade` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `atividade` varchar(255) NOT NULL,
  `ordem` int(11) NOT NULL,
  `condicao` int(11) NOT NULL,
  `start` datetime DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(100) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `endereco` varchar(255) COLLATE utf8_bin NOT NULL,
  `bairro` varchar(255) COLLATE utf8_bin NOT NULL,
  `cidade` varchar(255) COLLATE utf8_bin NOT NULL,
  `estado` varchar(255) COLLATE utf8_bin NOT NULL,
  `complemento` varchar(255) COLLATE utf8_bin NOT NULL,
  `cep` varchar(255) COLLATE utf8_bin NOT NULL,
  `ponto_referecia` varchar(255) COLLATE utf8_bin NOT NULL,
  `tel1` varchar(255) COLLATE utf8_bin NOT NULL,
  `tel2` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `cpf_cnpj` varchar(255) COLLATE utf8_bin NOT NULL,
  `rg` varchar(255) COLLATE utf8_bin NOT NULL,
  `condominio` varchar(255) COLLATE utf8_bin NOT NULL,
  `bloco` varchar(255) COLLATE utf8_bin NOT NULL,
  `apartamento` varchar(255) COLLATE utf8_bin NOT NULL,
  `local_entrega` varchar(255) COLLATE utf8_bin NOT NULL,
  `observacoes` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `endereco`, `bairro`, `cidade`, `estado`, `complemento`, `cep`, `ponto_referecia`, `tel1`, `tel2`, `email`, `cpf_cnpj`, `rg`, `condominio`, `bloco`, `apartamento`, `local_entrega`, `observacoes`) VALUES
(6, 'JoÃ£o Garcia', 'Rua: Das BromÃ©lias  NÃºmero 552', 'Jardin Cidade', 'FlorianÃ³polis', 'Santa Catarina', '00001', '89222-000', 'proximo a igreja', '(48)996958772', '(48)991567880', 'contato@seusitesc.com.br', '000.000.00-00', '5555555-5', 'Das Rosas', '04', '24', 'Guarita', 'Ao chegar pedir para a portaria interfonar'),
(8, 'Rafael Palmeira', 'Rua: Das CamÃ©lias NÃºmero 25', 'Passo Fundo', 'SÃ£o francisco do Sul', 'SC', '00000', '89239-000', 'PrÃ³ximo ao mercado do Paulinho', '(47)997333065', '(47)992036858', 'contato@seusitesc.com.br', '789.028.889-44', '5555555-5', 'Renato Kaiser ', '04', '24', '', 'Sem Obs'),
(9, 'Pedro', 'Rua dos passaros N 5', 'Aventureiro', 'Joinville', 'SC', 'Quadra ', '89225-222', 'proximo a igreja', '34353556', '(47)998999455', 'contato@seusitesc.com.br', '000000', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor`
--

CREATE TABLE `cor` (
  `id` int(100) NOT NULL,
  `cor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cor`
--

INSERT INTO `cor` (`id`, `cor`) VALUES
(1, 'success');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `id` int(100) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `despesa` varchar(255) NOT NULL,
  `data` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`id`, `valor`, `despesa`, `data`) VALUES
(1, '30', 'agua', '27/05/2019'),
(10, '50.00', 'internet', '01/06/2019');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesas`
--

CREATE TABLE `mesas` (
  `id` int(100) NOT NULL,
  `id_mesa` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mesas`
--

INSERT INTO `mesas` (`id`, `id_mesa`, `nome`, `status`) VALUES
(406, '1', '', '1'),
(407, '2', '', '1'),
(408, '3', '', '1'),
(409, '4', '', '1'),
(410, '5', '', '1'),
(411, '6', '', '1'),
(412, '7', '', '1'),
(413, '8', '', '1'),
(414, '9', '', '1'),
(415, '10', '', '1'),
(430, '11', '', '1'),
(431, '12', '', '1'),
(432, '13', '', '1'),
(433, '14', '', '1'),
(434, '15', '', '1'),
(435, '16', '', '1'),
(436, '17', '', '1'),
(437, '18', '', '1'),
(438, '19', '', '1'),
(439, '20', '', '1'),
(440, '21', '', '1'),
(441, '22', '', '1'),
(442, '23', '', '1'),
(443, '24', '', '1'),
(444, '25', '', '1'),
(445, '26', '', '1'),
(446, '27', '', '1'),
(447, '28', '', '1'),
(448, '29', '', '1'),
(449, '30', '', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL,
  `delivery` varchar(100) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `idmesa` varchar(100) NOT NULL,
  `produto` varchar(255) NOT NULL,
  `quantidade` varchar(100) NOT NULL,
  `hora_pedido` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `observacao` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `data` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `gorjeta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `detalhes` varchar(255) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `preco_custo` varchar(100) NOT NULL DEFAULT '0.00',
  `preco_venda` varchar(100) NOT NULL DEFAULT '0.00',
  `estoque_atual` int(100) NOT NULL,
  `estoque_minimo` int(100) NOT NULL,
  `data_compra` varchar(100) NOT NULL,
  `data_validade` varchar(100) NOT NULL,
  `unidade` varchar(100) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `fornecedor` varchar(255) NOT NULL,
  `observacoes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `categoria`, `detalhes`, `codigo`, `preco_custo`, `preco_venda`, `estoque_atual`, `estoque_minimo`, `data_compra`, `data_validade`, `unidade`, `marca`, `fornecedor`, `observacoes`) VALUES
(100, 'FANTA GUARANA 2L', 'BEBIDAS', 'PET 2L', '7894900093056', '2.95', '6.50', 3, 5, '16/12/2016', '25/04/2019', 'L', 'Coca-Cola', 'Vonpar', 'FANTA GUARANA PET 2L'),
(110, 'Pizza de Frango e Catupiri', 'PIZZAS', '', '01', '6.50', '15.99', 0, 0, '', '', 'unidade', '', '', ''),
(111, 'Pizza de Peperoni', 'PIZZAS', '', '02', '6.50', '18.95', 0, 0, '', '', 'unidade', '', '', ''),
(131, 'Coca-Cola', 'BEBIDAS', 'PET 2L', '789889556123', '2.95', '6.50', 4, 5, '17/04/2019', '24/05/2019', 'L', 'Coca-Cola', 'Vonpar', 'Coca-Cola 2 Litros'),
(132, 'X-Salada', 'LANCHES', '', '', '3.00', '7.50', 10, 3, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` int(100) NOT NULL,
  `pergunta` varchar(255) NOT NULL,
  `resposta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(100) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `rendimento` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `valor`, `cliente`, `rendimento`, `data`) VALUES
(80, '15.99', 'Rafael2', 'Mesa', '27/05/2019'),
(110, '31.98', 'Pedro', 'Delivery', '01/06/2019'),
(111, '37.90', 'Rafael Jose Vieira', 'Delivery', '01/06/2019'),
(112, '13.00', 'Rafael Jose Vieira', 'Delivery', '01/06/2019'),
(114, '44.98', 'Rafael Jose Vieira', 'Mesa', '02/06/2019'),
(115, '37.90', 'joÃ£o', 'Delivery', '02/06/2019'),
(117, '31.98', 'Rafael Jose Vieira', 'Delivery', '02/06/2019'),
(120, '31.98', 'Rafael Jose Vieira', 'Delivery', '02/06/2019'),
(121, '31.98', 'Pedro', 'Mesa', '02/06/2019'),
(122, '31.98', 'Pedro', 'Mesa', '03/06/2019'),
(123, '44.4', 'Pedro', 'Mesa', '03/06/2019'),
(124, '38.48', 'Amanda', 'Mesa', '03/06/2019'),
(125, '18.95', 'Amanda', 'Mesa', '03/06/2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atividade`
--
ALTER TABLE `atividade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `despesas`
--
ALTER TABLE `despesas`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=456;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
