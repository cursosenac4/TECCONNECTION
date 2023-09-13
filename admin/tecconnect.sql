-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Set-2023 às 02:11
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome`, `descricao`, `url_img`, `data`, `prazo_de_inscricao`, `hora_inicio`, `hora_fim`, `num_vagas`, `vagas_disponiveis`) VALUES
(1, 'Excel', 'Aprenda PHP do básico ao avançado.', 'imagem_php.jpg', '2023-10-15', '2023-10-10', '09:00:00', '16:00:00', 30, 10),
(2, 'Canva', 'Crie designs incríveis com ferramentas populares.', 'imagem_design.jpg', '2023-09-20', '2023-09-15', '10:00:00', '15:00:00', 25, 5),
(3, 'Windows 10', 'Aprimore suas habilidades fotográficas.', 'imagem_fotografia.jpg', '2023-11-05', '2023-10-30', '14:00:00', '17:00:00', 20, 15),
(4, 'Nuvem', 'Domine as estratégias de marketing online.', 'imagem_marketing.jpg', '2023-09-30', '2023-09-25', '18:30:00', '20:30:00', 40, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos_senac`
--

CREATE TABLE `cursos_senac` (
  `id_curso_senac` smallint(6) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cursos_senac`
--

INSERT INTO `cursos_senac` (`id_curso_senac`, `nome`, `codigo`) VALUES
(1, 'Técnico em Administração', '153'),
(2, 'Técnico em Logística', '154'),
(3, 'Técnico em Recursos Humanos', '155'),
(4, 'Técnico em Segurança do Trabalho', '121'),
(5, 'Técnico em Logística', '42'),
(6, 'Técnico em Segurança do Trabalho', '211'),
(7, 'Libras Básico', '177'),
(8, 'Recepcionista', '128');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscritos`
--

CREATE TABLE `inscritos` (
  `id_inscrito` smallint(6) NOT NULL,
  `nome_completo` varchar(255) DEFAULT NULL,
  `dt_nasc` date DEFAULT NULL,
  `id_curso` smallint(6) DEFAULT NULL,
  `id_curso_senac` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `cursos_senac`
--
ALTER TABLE `cursos_senac`
  ADD PRIMARY KEY (`id_curso_senac`);

--
-- Índices para tabela `inscritos`
--
ALTER TABLE `inscritos`
  ADD PRIMARY KEY (`id_inscrito`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_curso_senac` (`id_curso_senac`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cursos_senac`
--
ALTER TABLE `cursos_senac`
  MODIFY `id_curso_senac` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `inscritos`
--
ALTER TABLE `inscritos`
  ADD CONSTRAINT `inscritos_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `inscritos_ibfk_2` FOREIGN KEY (`id_curso_senac`) REFERENCES `cursos_senac` (`id_curso_senac`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
