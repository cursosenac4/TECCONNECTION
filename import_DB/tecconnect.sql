-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 06/09/2023 às 22:32
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tecconnect`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Cursos`
--

CREATE TABLE `Cursos` (
  `id_curso` smallint(6) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `url_img` text NOT NULL,
  `data` date DEFAULT NULL,
  `prazo_de_inscricao` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fim` time DEFAULT NULL,
  `num_vagas` smallint(6) DEFAULT NULL,
  `vagas_disponiveis` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `Cursos`
--

INSERT INTO `Cursos` (`id_curso`, `nome`, `descricao`, `url_img`, `data`, `prazo_de_inscricao`, `hora_inicio`, `hora_fim`, `num_vagas`, `vagas_disponiveis`) VALUES
(1, 'Curso de Programação em PHP', 'Aprenda PHP do básico ao avançado.', 'imagem_php.jpg', '2023-10-15', '2023-10-10', '09:00:00', '16:00:00', 30, 10),
(2, 'Curso de Design Gráfico', 'Crie designs incríveis com ferramentas populares.', 'imagem_design.jpg', '2023-09-20', '2023-09-15', '10:00:00', '15:00:00', 25, 5),
(3, 'Workshop de Fotografia', 'Aprimore suas habilidades fotográficas.', 'imagem_fotografia.jpg', '2023-11-05', '2023-10-30', '14:00:00', '17:00:00', 20, 15),
(4, 'Curso de Marketing Digital', 'Domine as estratégias de marketing online.', 'imagem_marketing.jpg', '2023-09-30', '2023-09-25', '18:30:00', '20:30:00', 40, 20);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Inscritos`
--

CREATE TABLE `Inscritos` (
  `id_inscrito` smallint(6) NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `id_curso` smallint(6) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `Inscritos`
--

INSERT INTO `Inscritos` (`id_inscrito`, `nome_completo`, `id_curso`, `created_at`, `deleted_at`) VALUES
(1, 'João da Silva', 1, '2023-09-06 16:02:32', NULL),
(2, 'Maria Santos', 1, '2023-09-06 16:02:32', NULL),
(3, 'Carlos Ferreira', 2, '2023-09-06 16:02:32', NULL),
(4, 'Ana Oliveira', 3, '2023-09-06 16:02:32', NULL),
(5, 'Pedro Alves', 4, '2023-09-06 16:02:32', NULL),
(6, 'Luciana Lima', 4, '2023-09-06 16:02:32', NULL),
(7, 'Rafael Pereira', 2, '2023-09-06 16:02:32', NULL),
(8, 'Isabela Costa', 1, '2023-09-06 16:02:32', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `Cursos`
--
ALTER TABLE `Cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices de tabela `Inscritos`
--
ALTER TABLE `Inscritos`
  ADD PRIMARY KEY (`id_inscrito`),
  ADD KEY `id_curso` (`id_curso`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Cursos`
--
ALTER TABLE `Cursos`
  MODIFY `id_curso` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `Inscritos`
--
ALTER TABLE `Inscritos`
  MODIFY `id_inscrito` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `Inscritos`
--
ALTER TABLE `Inscritos`
  ADD CONSTRAINT `Inscritos_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `Cursos` (`id_curso`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
