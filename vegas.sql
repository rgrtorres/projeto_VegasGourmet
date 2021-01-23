-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 13-Maio-2019 às 01:33
-- Versão do servidor: 5.7.20
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vegas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio_site`
--

CREATE TABLE `cardapio_site` (
  `id_cardapio` int(11) NOT NULL,
  `item_cardapio` varchar(255) NOT NULL,
  `acompanhamento_item_cardapio` varchar(255) NOT NULL,
  `preco_item_cardapio` varchar(255) NOT NULL,
  `categoria_item_cardapio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cardapio_site`
--

INSERT INTO `cardapio_site` (`id_cardapio`, `item_cardapio`, `acompanhamento_item_cardapio`, `preco_item_cardapio`, `categoria_item_cardapio`) VALUES
(2, 'X-Bacon', 'Hamburgue, Milho, Ervilha, Bacon, Queijo e Fritas', '15.00', 'LancheA'),
(3, 'X-Bacon', 'Hamburgue, Milho, Ervilha, Bacon, Queijo e Fritas', '12.00', 'LancheT'),
(4, 'Coca-Cola', 'Lata 350 ml', '6.00', 'Bebida'),
(5, 'Camarão', 'Porção de camarão com cebola e azeite', '35.00', 'Porcao'),
(6, 'X-Tudo', 'Hamburgue, Frango, Milho, Ervilha, Queijo, Presunto, Bacon, Catupiry, Ovo e Fritas', '19.00', 'LancheA'),
(7, 'X-Tudo', 'Hamburgue, Frango, Milho, Ervilha, Queijo, Presunto, Bacon, Catupiry, Ovo e Fritas', '15.00', 'LancheT'),
(8, 'X-Egg', 'Hamburgue, Milho, Ervilha, ovo e Fritas', '15.00', 'LancheA'),
(9, 'X-Egg', 'Hamburgue, Milho, Ervilha, ovo e Fritas', '13.00', 'LancheT'),
(10, 'Fanta Uva', 'Lata 350 ml', '5.00', 'Bebida'),
(11, 'Suco de Laranja', '500 ML', '11.00', 'Bebida'),
(12, 'Isca de Peixe', 'Molho Tártaro', '40.00', 'Porcao'),
(13, 'Isca de Frango', 'Molho Tártaro', '45.00', 'Porcao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato_site`
--

CREATE TABLE `contato_site` (
  `id_contato` int(11) NOT NULL,
  `nome_contato` varchar(255) NOT NULL,
  `telefone_contato` varchar(255) NOT NULL,
  `email_contato` varchar(255) NOT NULL,
  `msg_contato` text NOT NULL,
  `data_contato` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato_site`
--

INSERT INTO `contato_site` (`id_contato`, `nome_contato`, `telefone_contato`, `email_contato`, `msg_contato`, `data_contato`) VALUES
(1, 'Renan Torres', '13982121061', 'rgrtorres@hotmail.com', 'Ótimo Site', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes_painel`
--

CREATE TABLE `funcoes_painel` (
  `id_funcao` int(11) NOT NULL,
  `nome_funcao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcoes_painel`
--

INSERT INTO `funcoes_painel` (`id_funcao`, `nome_funcao`) VALUES
(1, 'Administrador'),
(2, 'Gerencia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_acesso`
--

CREATE TABLE `menu_acesso` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `diretorio` varchar(255) NOT NULL,
  `id_menupai` int(11) NOT NULL DEFAULT '0',
  `icone` varchar(255) NOT NULL,
  `ativo` enum('Ativo','Inativo') DEFAULT 'Ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `menu_acesso`
--

INSERT INTO `menu_acesso` (`id_menu`, `menu`, `diretorio`, `id_menupai`, `icone`, `ativo`) VALUES
(1, 'Gerenciar', '', 0, 'fas fa-cog', 'Ativo'),
(2, 'Gêrenciar Modulos', 'gerenciar_modulo.php', 1, 'fas fa-plus-square', 'Ativo'),
(3, 'Permissão de acesso', 'gerenciar_permissao.php', 1, 'fas fa-key', 'Ativo'),
(4, 'Gêrenciar Funções', 'gerenciar_funcao.php', 1, 'fas fa-users-cog', 'Ativo'),
(5, 'Usuários', '', 0, 'fas fa-users', 'Ativo'),
(6, 'Usuários do Painel', 'usuarios_painel.php', 5, 'fas fa-user-plus', 'Ativo'),
(7, 'Site', '', 0, 'fas fa-at', 'Ativo'),
(8, 'Contato', 'contato_site.php', 7, 'far fa-comment-dots', 'Ativo'),
(9, 'Cárdapio', '', 0, 'fas fa-cheese', 'Ativo'),
(10, 'Porções', 'porcoes.php', 9, 'fas fa-fish', 'Ativo'),
(11, 'Bebidas', 'bebidas.php', 9, 'fas fa-cocktail', 'Ativo'),
(12, 'Lanches Tradicionais', 'lanches_tradicionais.php', 9, 'fas fa-hamburger', 'Ativo'),
(13, 'Lanches Artesanais', 'lanches_artesanais.php', 9, 'fas fa-hamburger', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao_acesso`
--

CREATE TABLE `permissao_acesso` (
  `id_permissao` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_funcao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissao_acesso`
--

INSERT INTO `permissao_acesso` (`id_permissao`, `id_menu`, `id_funcao`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 2),
(8, 8, 2),
(9, 13, 2),
(10, 12, 2),
(11, 11, 2),
(12, 10, 2),
(13, 9, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_funcoes`
--

CREATE TABLE `usuarios_funcoes` (
  `id_usuario_funcao` int(11) NOT NULL,
  `id_funcao` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios_funcoes`
--

INSERT INTO `usuarios_funcoes` (`id_usuario_funcao`, `id_funcao`, `id_usuario`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_painel`
--

CREATE TABLE `usuarios_painel` (
  `id_usuario_painel` int(11) NOT NULL,
  `usuario_painel` varchar(255) NOT NULL,
  `senha_painel` varchar(255) NOT NULL,
  `avatar_painel` varchar(255) NOT NULL DEFAULT 'foto-default.png',
  `status_usuario_painel` enum('Ativo','Inativo') NOT NULL DEFAULT 'Ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios_painel`
--

INSERT INTO `usuarios_painel` (`id_usuario_painel`, `usuario_painel`, `senha_painel`, `avatar_painel`, `status_usuario_painel`) VALUES
(1, 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'foto-default.png', 'Ativo'),
(2, 'Renan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'foto-default.png', 'Ativo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cardapio_site`
--
ALTER TABLE `cardapio_site`
  ADD PRIMARY KEY (`id_cardapio`);

--
-- Indexes for table `contato_site`
--
ALTER TABLE `contato_site`
  ADD PRIMARY KEY (`id_contato`);

--
-- Indexes for table `funcoes_painel`
--
ALTER TABLE `funcoes_painel`
  ADD PRIMARY KEY (`id_funcao`);

--
-- Indexes for table `menu_acesso`
--
ALTER TABLE `menu_acesso`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `permissao_acesso`
--
ALTER TABLE `permissao_acesso`
  ADD PRIMARY KEY (`id_permissao`);

--
-- Indexes for table `usuarios_funcoes`
--
ALTER TABLE `usuarios_funcoes`
  ADD PRIMARY KEY (`id_usuario_funcao`);

--
-- Indexes for table `usuarios_painel`
--
ALTER TABLE `usuarios_painel`
  ADD PRIMARY KEY (`id_usuario_painel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cardapio_site`
--
ALTER TABLE `cardapio_site`
  MODIFY `id_cardapio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `contato_site`
--
ALTER TABLE `contato_site`
  MODIFY `id_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `funcoes_painel`
--
ALTER TABLE `funcoes_painel`
  MODIFY `id_funcao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu_acesso`
--
ALTER TABLE `menu_acesso`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `permissao_acesso`
--
ALTER TABLE `permissao_acesso`
  MODIFY `id_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `usuarios_funcoes`
--
ALTER TABLE `usuarios_funcoes`
  MODIFY `id_usuario_funcao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios_painel`
--
ALTER TABLE `usuarios_painel`
  MODIFY `id_usuario_painel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
