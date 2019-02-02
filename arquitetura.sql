-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 17-Set-2018 às 17:47
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arquitetura`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigo`
--

DROP TABLE IF EXISTS `artigo`;
CREATE TABLE IF NOT EXISTS `artigo` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `status` int(11) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `artigo`
--

INSERT INTO `artigo` (`cod`, `titulo`, `url`, `descricao`, `status`, `thumb`, `data`) VALUES
(22, 'titulo testes', 'titulo-testes', '&#60;!DOCTYPE html&#62;&#13;&#10;&#60;html&#62;&#13;&#10;&#60;head&#62;&#13;&#10;&#60;/head&#62;&#13;&#10;&#60;body&#62;&#13;&#10;&#60;p&#62;descricao do artigo dia de hj&#60;/p&#62;&#13;&#10;&#60;/body&#62;&#13;&#10;&#60;/html&#62;', 1, 'posts/2018/09/titulo-teste.jpg', '2018-09-15 10:43:35'),
(24, 'Titulo artigo dois', 'titulo-artigo-dois', '&#60;!DOCTYPE html&#62;&#13;&#10;&#60;html&#62;&#13;&#10;&#60;head&#62;&#13;&#10;&#60;/head&#62;&#13;&#10;&#60;body&#62;&#13;&#10;&#60;p&#62;Descricao artigo dois teste&#60;/p&#62;&#13;&#10;&#60;/body&#62;&#13;&#10;&#60;/html&#62;', 1, 'posts/2018/09/titulo-artigo-dois.jpg', '2018-09-15 11:23:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`cod`, `titulo`, `url`, `descricao`, `status`, `data`) VALUES
(9, 'interiores', 'interiores', 'Interiores de apartamento', 1, '2018-09-12 22:05:09'),
(10, 'urbanismo', 'urbanismo', 'Estrutura floral', 1, '2018-09-12 22:05:41'),
(13, 'informe', 'informe', 'Informe Topo', 1, '2018-09-15 20:27:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
CREATE TABLE IF NOT EXISTS `mensagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `valor` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`cod`, `titulo`, `categoria`, `url`, `descricao`, `valor`, `status`, `thumb`, `data`) VALUES
(22, 'Interior de Quarto', '9', 'interior-de-quarto', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n&lt;p&gt;Quarto com uma estrutura verde, com tr&ecirc;s lumin&aacute;rias para clareando de forma n&iacute;tida, um guarda roupas&nbsp; espelhado para dar ampla vis&atilde;o de que o espa&ccedil;o &eacute; maior, estantes laterais com suporte para parede com uma cor clara para ficar de acordo com o ambiente, os travesseiros est&atilde;o de acordo com as cores ambientes.&nbsp;&lt;/p&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;', NULL, 1, 'posts/2018/09/interior-de-quarto.jpg', '2018-09-12 22:13:02'),
(23, 'interiores', '12', 'interiores', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n&lt;p&gt;teste&lt;/p&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;', NULL, 1, 'posts/2018/09/interiores.jpg', '2018-09-12 22:14:57'),
(24, 'interiores', '9', 'interiores', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n&lt;p&gt;teste&lt;/p&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;', NULL, 1, 'posts/2018/09/interiores-1536802407.jpg', '2018-09-12 22:33:27'),
(26, 'interiores teste', '9', 'interiores-teste', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n&lt;p&gt;Titulo Teste&lt;/p&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;', NULL, 1, 'posts/2018/09/interiores-teste.jpg', '2018-09-15 19:31:59'),
(27, 'interiores', '9', 'interiores', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n&lt;p&gt;Titulo Teste&lt;/p&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;', NULL, 1, 'posts/2018/09/interiores-1537050778.jpg', '2018-09-15 19:32:58'),
(28, 'interiores', '9', 'interiores', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n&lt;p&gt;Titulo Teste&lt;/p&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;', NULL, 1, 'posts/2018/09/interiores-1537050828.jpg', '2018-09-15 19:33:48'),
(29, 'urbanismo', '10', 'urbanismo', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n&lt;p&gt;Titulo Teste&lt;/p&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;', NULL, 1, 'posts/2018/09/urbanismo.jpg', '2018-09-15 19:54:09'),
(30, 'Arquitetura', '13', 'arquitetura', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n&lt;p&gt;Arquitetura Postes&lt;/p&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;', NULL, 1, 'posts/2018/09/arquitetura.jpg', '2018-09-15 20:29:19'),
(31, 'Design de Interiores', '13', 'design-de-interiores', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n&lt;p&gt;Design de Interiores&lt;/p&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;', NULL, 1, 'posts/2018/09/design-de-interiores.jpg', '2018-09-15 20:29:57'),
(32, 'Reformas', '13', 'reformas', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n&lt;p&gt;Reformas&lt;/p&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;', NULL, 1, 'post/2018/09/reformas.jpg', '2018-09-15 20:30:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sliders`
--

DROP TABLE IF EXISTS `tb_sliders`;
CREATE TABLE IF NOT EXISTS `tb_sliders` (
  `slider_cod` int(11) NOT NULL AUTO_INCREMENT,
  `slider_titulo` varchar(255) NOT NULL,
  `slider_status` int(11) NOT NULL,
  `slider_link` varchar(255) NOT NULL,
  `slider_thumb` varchar(255) NOT NULL,
  `slider_tamanho` char(1) NOT NULL,
  PRIMARY KEY (`slider_cod`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_sliders`
--

INSERT INTO `tb_sliders` (`slider_cod`, `slider_titulo`, `slider_status`, `slider_link`, `slider_thumb`, `slider_tamanho`) VALUES
(4, 'urbanismo', 1, '#', 'sliders/2018/09/urbanismo-1537031411.jpg', 'g'),
(3, 'Interior de Quartosss', 1, '#', 'sliders/2018/09/interior-de-quarto-1537031045.jpg', 'g'),
(5, 'projetos', 1, '#', 'sliders/2018/09/projetos.jpg', 'g');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` int(1) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `bairro` varchar(180) DEFAULT NULL,
  `cidade` varchar(180) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod`, `usuario`, `email`, `status`, `nome`, `senha`, `nivel`, `cep`, `bairro`, `cidade`, `endereco`, `estado`, `data`) VALUES
(2, 'Leticia', 'leticia@gmail.com', 1, 'Leticia', '827ccb0eea8a706c4c34a16891f84e7b', 1, ' 71950-904', 'Areal (Águas Claras)', 'Brasília', 'QS 1 Rua 210 Lote 40', 'DF', '2018-07-13 09:48:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
