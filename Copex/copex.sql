-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Jan-2018 às 01:21
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `copex`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `usuario`) VALUES
(1, 1),
(2, 33),
(3, 34),
(4, 35),
(5, 36),
(7, 38);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `matricula` varchar(15) NOT NULL,
  `curso` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `usuario`, `matricula`, `curso`) VALUES
(1, 24, '123', 10),
(2, 25, '000', 11),
(3, 26, '999', 11),
(4, 27, '998', 11),
(5, 28, '111', 11),
(6, 29, '112', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anexo`
--

CREATE TABLE IF NOT EXISTS `anexo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projeto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `localizacao` text NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `dataPostagem` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;

--
-- Extraindo dados da tabela `anexo`
--

INSERT INTO `anexo` (`id`, `projeto`, `nome`, `localizacao`, `tipo`, `dataPostagem`) VALUES
(154, 170, 'folha de pagamento.pdf', 'uploads/evento/149e9677a5989fd342ae44213df68868/documentos/folha de pagamento.pdf', '/documentos/', '2017-09-01'),
(155, 170, 'makro_atacadista_dicas_para_economizar_energia_eletrica.png', 'uploads/evento/149e9677a5989fd342ae44213df68868/imagens/makro_atacadista_dicas_para_economizar_energia_eletrica.png', '/imagens/', '2017-09-01'),
(156, 171, 'Bala de Prata.docx', 'uploads/evento/a4a042cf4fd6bfb47701cbc8a1653ada/documentos/Bala de Prata.docx', '/documentos/', '2017-09-02'),
(157, 171, 'bat.jpg', 'uploads/evento/a4a042cf4fd6bfb47701cbc8a1653ada/imagens/bat.jpg', '/imagens/', '2017-09-02'),
(158, 172, 'Bala de Prata.docx', 'uploads/evento/1ff8a7b5dc7a7d1f0ed65aaa29c04b1e/documentos/Bala de Prata.docx', '/documentos/', '2017-09-02'),
(159, 172, 'bat.jpg', 'uploads/evento/1ff8a7b5dc7a7d1f0ed65aaa29c04b1e/imagens/bat.jpg', '/imagens/', '2017-09-02'),
(160, 173, 'Bala de Prata.docx', 'uploads/evento/f7e6c85504ce6e82442c770f7c8606f0/documentos/Bala de Prata.docx', '/documentos/', '2017-09-02'),
(161, 173, 'bat.jpg', 'uploads/evento/f7e6c85504ce6e82442c770f7c8606f0/imagens/bat.jpg', '/imagens/', '2017-09-02'),
(162, 170, 'Modelo_BancaTCC.pptx', 'uploads/evento/149e9677a5989fd342ae44213df68868/documentos/Modelo_BancaTCC.pptx', '/documentos/', '2017-09-02'),
(163, 170, 'tela.png', 'uploads/evento/149e9677a5989fd342ae44213df68868/imagens/tela.png', '/imagens/', '2017-09-02'),
(164, 170, 'Modelo_BancaTCC.pptx', 'uploads/evento/149e9677a5989fd342ae44213df68868/documentos/Modelo_BancaTCC.pptx', '/documentos/', '2017-09-02'),
(165, 170, 'tela.png', 'uploads/evento/149e9677a5989fd342ae44213df68868/imagens/tela.png', '/imagens/', '2017-09-02'),
(166, 170, 'iron.jpg', 'uploads/evento/149e9677a5989fd342ae44213df68868/imagens/iron.jpg', '/imagens/', '2017-09-02'),
(167, 173, 'iron.jpg', 'uploads/evento/f7e6c85504ce6e82442c770f7c8606f0/imagens/iron.jpg', '/imagens/', '2017-09-03'),
(168, 170, 'Chrysanthemum.jpg', 'uploads/evento/149e9677a5989fd342ae44213df68868/imagens/Chrysanthemum.jpg', '/imagens/', '2017-09-03'),
(169, 174, 'EXERCICIO SALA DE AULA INVERTIDA.docx', 'uploads/evento/bf8229696f7a3bb4700cfddef19fa23f/documentos/EXERCICIO SALA DE AULA INVERTIDA.docx', '/documentos/', '2017-09-25'),
(170, 174, 'bat.jpg', 'uploads/evento/bf8229696f7a3bb4700cfddef19fa23f/imagens/bat.jpg', '/imagens/', '2017-09-25'),
(171, 175, 'EXERCICIO SALA DE AULA INVERTIDA.docx', 'uploads/evento/82161242827b703e6acf9c726942a1e4/documentos/EXERCICIO SALA DE AULA INVERTIDA.docx', '/documentos/', '2017-09-25'),
(172, 175, 'bat.jpg', 'uploads/evento/82161242827b703e6acf9c726942a1e4/imagens/bat.jpg', '/imagens/', '2017-09-25'),
(173, 176, 'calvin.docx', 'uploads/evento/38af86134b65d0f10fe33d30dd76442e/documentos/calvin.docx', '/documentos/', '2017-09-25'),
(174, 176, 'iron.jpg', 'uploads/evento/38af86134b65d0f10fe33d30dd76442e/imagens/iron.jpg', '/imagens/', '2017-09-25'),
(175, 177, 'calvin.docx', 'uploads/evento/96da2f590cd7246bbde0051047b0d6f7/documentos/calvin.docx', '/documentos/', '2017-09-25'),
(176, 177, 'Desert.jpg', 'uploads/evento/96da2f590cd7246bbde0051047b0d6f7/imagens/Desert.jpg', '/imagens/', '2017-09-25'),
(177, 178, 'calvin.docx', 'uploads/evento/8f85517967795eeef66c225f7883bdcb/documentos/calvin.docx', '/documentos/', '2017-09-25'),
(178, 178, 'Desert.jpg', 'uploads/evento/8f85517967795eeef66c225f7883bdcb/imagens/Desert.jpg', '/imagens/', '2017-09-25'),
(179, 180, '00001d2d.pdf', 'uploads/evento/045117b0e0a11a242b9765e79cbf113f/documentos/00001d2d.pdf', '/documentos/', '2017-12-24'),
(180, 180, 'telas.png', 'uploads/evento/045117b0e0a11a242b9765e79cbf113f/imagens/telas.png', '/imagens/', '2017-12-24'),
(181, 181, '00001d2d.pdf', 'uploads/evento/fc221309746013ac554571fbd180e1c8/documentos/00001d2d.pdf', '/documentos/', '2017-12-24'),
(182, 181, 'telas.png', 'uploads/evento/fc221309746013ac554571fbd180e1c8/imagens/telas.png', '/imagens/', '2017-12-24'),
(183, 182, '235-478-1-SM.pdf', 'uploads/evento/4c5bde74a8f110656874902f07378009/documentos/235-478-1-SM.pdf', '/documentos/', '2017-12-24'),
(184, 182, 'telas.png', 'uploads/evento/4c5bde74a8f110656874902f07378009/imagens/telas.png', '/imagens/', '2017-12-24'),
(185, 183, 'RESUMO EXPANDIDO O USO DE THREADS.docx', 'uploads/evento/cedebb6e872f539bef8c3f919874e9d7/documentos/RESUMO EXPANDIDO O USO DE THREADS.docx', '/documentos/', '2017-12-25'),
(186, 183, 'super.jpg', 'uploads/evento/cedebb6e872f539bef8c3f919874e9d7/imagens/super.jpg', '/imagens/', '2017-12-25'),
(187, 184, 'RESUMO EXPANDIDO O USO DE THREADS.docx', 'uploads/evento/6cdd60ea0045eb7a6ec44c54d29ed402/documentos/RESUMO EXPANDIDO O USO DE THREADS.docx', '/documentos/', '2017-12-25'),
(188, 184, 'screenshot-pizza-realife-cooking.png', 'uploads/evento/6cdd60ea0045eb7a6ec44c54d29ed402/imagens/screenshot-pizza-realife-cooking.png', '/imagens/', '2017-12-25'),
(189, 185, 'RESUMO EXPANDIDO O USO DE THREADS.docx', 'uploads/evento/eecca5b6365d9607ee5a9d336962c534/documentos/RESUMO EXPANDIDO O USO DE THREADS.docx', '/documentos/', '2017-12-25'),
(190, 185, 'screenshot-pizza-realife-cooking.png', 'uploads/evento/eecca5b6365d9607ee5a9d336962c534/imagens/screenshot-pizza-realife-cooking.png', '/imagens/', '2017-12-25'),
(191, 186, 'O Uso de Threads no Desenvolvimento de um Software de Ponto EletrÃ´nico.docx', 'uploads/evento/9872ed9fc22fc182d371c3e9ed316094/documentos/O Uso de Threads no Desenvolvimento de um Software de Ponto EletrÃ´nico.docx', '/documentos/', '2017-12-25'),
(192, 186, 'screenshot-pizza-realife-cooking.png', 'uploads/evento/9872ed9fc22fc182d371c3e9ed316094/imagens/screenshot-pizza-realife-cooking.png', '/imagens/', '2017-12-25'),
(193, 187, 'RESUMO EXPANDIDO O USO DE THREADS.docx', 'uploads/evento/31fefc0e570cb3860f2a6d4b38c6490d/documentos/RESUMO EXPANDIDO O USO DE THREADS.docx', '/documentos/', '2017-12-25'),
(194, 187, 'screenshot-pizza-realife-cooking.png', 'uploads/evento/31fefc0e570cb3860f2a6d4b38c6490d/imagens/screenshot-pizza-realife-cooking.png', '/imagens/', '2017-12-25'),
(195, 188, 'RESUMO EXPANDIDO O USO DE THREADS.docx', 'uploads/evento/9dcb88e0137649590b755372b040afad/documentos/RESUMO EXPANDIDO O USO DE THREADS.docx', '/documentos/', '2017-12-25'),
(196, 188, 'screenshot-pizza-realife-cooking.png', 'uploads/evento/9dcb88e0137649590b755372b040afad/imagens/screenshot-pizza-realife-cooking.png', '/imagens/', '2017-12-25'),
(197, 189, 'RESUMO EXPANDIDO O USO DE THREADS.docx', 'uploads/evento/a2557a7b2e94197ff767970b67041697/documentos/RESUMO EXPANDIDO O USO DE THREADS.docx', '/documentos/', '2017-12-25'),
(198, 189, 'screenshot-pizza-realife-cooking.png', 'uploads/evento/a2557a7b2e94197ff767970b67041697/imagens/screenshot-pizza-realife-cooking.png', '/imagens/', '2017-12-25'),
(199, 190, 'RESUMO EXPANDIDO O USO DE THREADS.docx', 'uploads/evento/cfecdb276f634854f3ef915e2e980c31/documentos/RESUMO EXPANDIDO O USO DE THREADS.docx', '/documentos/', '2017-12-25'),
(200, 190, 'screenshot-pizza-realife-cooking.png', 'uploads/evento/cfecdb276f634854f3ef915e2e980c31/imagens/screenshot-pizza-realife-cooking.png', '/imagens/', '2017-12-25'),
(201, 191, 'RESUMO EXPANDIDO O USO DE THREADS.docx', 'uploads/evento/0aa1883c6411f7873cb83dacb17b0afc/documentos/RESUMO EXPANDIDO O USO DE THREADS.docx', '/documentos/', '2017-12-25'),
(202, 191, 'screenshot-pizza-realife-cooking.png', 'uploads/evento/0aa1883c6411f7873cb83dacb17b0afc/imagens/screenshot-pizza-realife-cooking.png', '/imagens/', '2017-12-25'),
(203, 192, 'RESUMO EXPANDIDO O USO DE THREADS.docx', 'uploads/evento/58a2fc6ed39fd083f55d4182bf88826d/documentos/RESUMO EXPANDIDO O USO DE THREADS.docx', '/documentos/', '2017-12-25'),
(204, 192, 'screenshot-pizza-realife-cooking.png', 'uploads/evento/58a2fc6ed39fd083f55d4182bf88826d/imagens/screenshot-pizza-realife-cooking.png', '/imagens/', '2017-12-25'),
(205, 193, 'RESUMO EXPANDIDO O USO DE THREADS.docx', 'uploads/evento/bd686fd640be98efaae0091fa301e613/documentos/RESUMO EXPANDIDO O USO DE THREADS.docx', '/documentos/', '2017-12-26'),
(206, 193, 'screenshot-pizza-realife-cooking.png', 'uploads/evento/bd686fd640be98efaae0091fa301e613/imagens/screenshot-pizza-realife-cooking.png', '/imagens/', '2017-12-26'),
(207, 194, 'RESUMO EXPANDIDO O USO DE THREADS.docx', 'uploads/evento/a597e50502f5ff68e3e25b9114205d4a/documentos/RESUMO EXPANDIDO O USO DE THREADS.docx', '/documentos/', '2017-12-26'),
(208, 194, 'screenshot-pizza-realife-cooking.png', 'uploads/evento/a597e50502f5ff68e3e25b9114205d4a/imagens/screenshot-pizza-realife-cooking.png', '/imagens/', '2017-12-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `certificado`
--

CREATE TABLE IF NOT EXISTS `certificado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `caixaReferente` varchar(50) NOT NULL,
  `anoExercicio` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `certificado`
--

INSERT INTO `certificado` (`id`, `nome`, `caixaReferente`, `anoExercicio`) VALUES
(1, 'certificado', 'caixa', '2017.2'),
(2, 'certo', 'bv', '2017.1'),
(3, 'nnnn', 'nnn', '2000.2'),
(16, 'ddd', 'ddd', '2021.1'),
(17, 'a', 'a', '1997.1'),
(18, 'a', 'a', '1997.1'),
(19, 'x', 'x', '1997.1'),
(20, 'a', 'a', '1997.1'),
(21, 'b', 'b', '1997.1'),
(22, 'c', 'c', '1997.1'),
(23, 'd', 'd', '1997.1'),
(24, 'e', 'e', '1997.1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`) VALUES
(10, 'AnÃ¡lise e Desenvolvimento de Sistemas'),
(11, 'as'),
(12, 'Excel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `usuario`) VALUES
(2, 23),
(3, 52),
(4, 53),
(5, 54),
(6, 55);

-- --------------------------------------------------------

--
-- Estrutura da tabela `observacao`
--

CREATE TABLE IF NOT EXISTS `observacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projeto` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `dataPostagem` date NOT NULL,
  `conteudo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=155 ;

--
-- Extraindo dados da tabela `observacao`
--

INSERT INTO `observacao` (`id`, `projeto`, `usuario`, `dataPostagem`, `conteudo`) VALUES
(112, 170, 22, '2017-09-01', 'Evento submetido.'),
(113, 170, 23, '2017-09-01', 'Muito Bom'),
(114, 171, 22, '2017-09-02', 'Evento submetido.'),
(115, 172, 22, '2017-09-02', 'Evento submetido.'),
(116, 173, 22, '2017-09-02', 'Evento submetido.'),
(117, 170, 22, '2017-09-02', 'Evento alterado e submetido novamente.'),
(118, 170, 22, '2017-09-02', 'Evento alterado e submetido novamente.'),
(119, 170, 22, '2017-09-02', 'Evento alterado e submetido novamente.'),
(120, 170, 22, '2017-09-02', 'Evento alterado e submetido novamente.'),
(121, 170, 22, '2017-09-02', 'Evento alterado e submetido novamente.'),
(122, 170, 23, '2017-09-02', 'Marrom meno'),
(123, 170, 23, '2017-09-02', 'Evento alterado e submetido novamente.'),
(124, 173, 23, '2017-09-03', 'opa'),
(125, 173, 23, '2017-09-03', 'b'),
(126, 173, 23, '2017-09-03', 'Evento alterado e submetido novamente.'),
(127, 170, 23, '2017-09-03', 'foi'),
(128, 170, 23, '2017-09-03', 'Evento alterado e submetido novamente.'),
(129, 174, 22, '2017-09-25', 'Evento submetido.'),
(130, 175, 22, '2017-09-25', 'Evento submetido.'),
(131, 176, 22, '2017-09-25', 'Evento submetido.'),
(132, 177, 22, '2017-09-25', 'Evento submetido.'),
(133, 178, 22, '2017-09-25', 'Evento submetido.'),
(134, 176, 23, '2017-10-08', 'a'),
(135, 176, 22, '2017-10-08', 'Evento alterado e submetido novamente.'),
(136, 180, 22, '2017-12-24', 'Evento submetido.'),
(137, 181, 22, '2017-12-24', 'Evento submetido.'),
(138, 182, 22, '2017-12-24', 'Evento submetido.'),
(139, 183, 22, '2017-12-25', 'Evento submetido.'),
(140, 184, 22, '2017-12-25', 'Evento submetido.'),
(141, 185, 22, '2017-12-25', 'Evento submetido.'),
(142, 186, 22, '2017-12-25', 'Evento submetido.'),
(143, 187, 22, '2017-12-25', 'Evento submetido.'),
(144, 188, 22, '2017-12-25', 'Evento submetido.'),
(145, 189, 22, '2017-12-25', 'Evento submetido.'),
(146, 190, 22, '2017-12-25', 'Evento submetido.'),
(147, 191, 22, '2017-12-25', 'Evento submetido.'),
(148, 192, 22, '2017-12-25', 'Evento submetido.'),
(149, 193, 22, '2017-12-26', 'Evento submetido.'),
(150, 194, 22, '2017-12-26', 'Evento submetido.'),
(151, 194, 23, '2017-12-26', 'mhckucygxyhx'),
(152, 194, 23, '2017-12-26', 'Evento alterado e submetido novamente.'),
(153, 194, 23, '2017-12-26', 'aaa'),
(154, 194, 23, '2017-12-26', 'Evento alterado e submetido novamente.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(11) NOT NULL,
  `titulacao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id`, `usuario`, `titulacao`) VALUES
(6, '22', 'Mestre');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE IF NOT EXISTS `projeto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `professor` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `inicioOcorrencia` date NOT NULL,
  `finalOcorrencia` date NOT NULL,
  `inicioInscricao` date NOT NULL,
  `finalInscricao` date NOT NULL,
  `situacao` text NOT NULL,
  `caixaReferente` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=195 ;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id`, `nome`, `tipo`, `professor`, `descricao`, `inicioOcorrencia`, `finalOcorrencia`, `inicioInscricao`, `finalInscricao`, `situacao`, `caixaReferente`) VALUES
(170, 'Semana da Tecnologia', '10', 6, 'A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b A b ', '2017-09-01', '2017-09-01', '2017-07-07', '2017-09-01', 'enviado', 'Sem caixa'),
(171, 'Nome evento', '10', 6, 'desc', '2017-09-02', '0000-00-00', '2017-08-07', '0000-00-00', 'enviado', 'Sem caixa'),
(172, 'Nome evento', '10', 6, 'desc', '2017-09-03', '0000-00-00', '2017-09-07', '0000-00-00', 'enviado', 'Sem caixa'),
(173, 'Nome evento e', '10', 6, 'desc', '2017-09-04', '2015-11-26', '2017-09-30', '2017-02-01', 'enviado', 'Sem caixa'),
(174, 'nome', '11', 6, 'eve', '2017-09-04', '2017-09-21', '2017-09-03', '2017-11-10', 'enviado', 'Sem caixa'),
(175, 'nome', '11', 6, 'eve', '2017-09-04', '2017-09-21', '2017-09-03', '2017-11-10', 'enviado', 'Sem caixa'),
(176, 'a', '11', 6, 'as', '2017-09-24', '2017-09-24', '2017-09-24', '2017-09-24', 'enviado', 'Sem caixa'),
(177, 'x', '10', 6, 'vb', '2017-09-10', '2017-09-15', '2017-09-24', '2017-09-24', 'enviado', 'Sem caixa'),
(178, 'x', '10', 6, 'vb', '2017-09-10', '2017-09-15', '2017-09-24', '2017-09-24', 'enviado', 'Sem caixa'),
(179, 'Teste 1455', 'outros', 6, 'Evento', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'enviado', 'Sem caixa'),
(180, 'Teste 1455', 'institucional', 6, 'Evento', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'enviado', 'Sem caixa'),
(181, 'Excel', 'institucional', 6, 'Excel', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'enviado', 'Sem caixa'),
(182, 'Evento2043', 'outros', 6, 'Evento2043', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'enviado', 'Sem caixa'),
(183, 'evento2512A', 'outros', 6, 'evento2512A', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'enviado', 'Sem caixa'),
(184, 'xxxxxxx', 'outros', 6, 'xxxxxxxxxxxx', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'enviado', 'Sem caixa'),
(185, 'xxxxxxx', 'outros', 6, 'xxxxxxxxxxxx', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'enviado', 'Sem caixa'),
(186, 'cccccccccc', 'outros', 6, 'aaaaaaaaaaaa', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'enviado', 'Sem caixa'),
(187, 'aaa', 'curso', 6, 'aaaaaaaaaaa', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'enviado', 'Sem caixa'),
(188, 'abc', 'institucional', 6, 'asdfsdv', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'enviado', 'Sem caixa'),
(189, 'avbsdb', 'institucional', 6, 'asdvsdv', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'enviado', 'Sem caixa'),
(190, 'aaaaa', 'outros', 6, 'axxxxxxxxx', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'enviado', 'Sem caixa'),
(191, 'aaaaa', 'outros', 6, 'axxxxxxxxx', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'enviado', 'Sem caixa'),
(192, 'mmmmmmmm', 'curso', 6, 'aaa', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'enviado', 'Sem caixa'),
(193, 'khiclugcu', 'institucional', 6, 'ljhvhucuc', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'enviado', 'Sem caixa'),
(194, 'bbbbbbbbbbbbbbbbb', 'outros', 6, 'cccccccccccccc', '2017-12-30', '2017-12-30', '2017-12-30', '2017-12-30', 'enviado', 'Sem caixa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetox`
--

CREATE TABLE IF NOT EXISTS `projetox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `projetox`
--

INSERT INTO `projetox` (`id`, `nome`, `tipo`) VALUES
(1, 'aaa', 'napi'),
(2, 'aaa', 'napi'),
(3, 'mcjgxj', 'curso'),
(4, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'institucional'),
(5, 'projeto', 'curso'),
(6, 'analista', 'napi'),
(7, 'matematica', 'curso'),
(8, 'analista', 'curso'),
(9, 'analista', 'curso'),
(10, 'analista', 'curso'),
(11, 'analista', 'institucional'),
(12, 'analista', 'institucional'),
(13, 'projeto', 'curso'),
(14, 'projeto', 'curso'),
(15, 'projeto', 'curso'),
(16, 'projeto', 'curso'),
(17, 'cccc', 'curso'),
(18, 'mmmmmmmmmmmmmm', 'institucional'),
(19, 'testeProjeto', 'napi'),
(20, 'x', 'outros'),
(21, 'x', 'outros'),
(22, 'x', 'curso'),
(23, 'x', 'curso'),
(24, 'z', 'outros'),
(25, 'z', 'outros'),
(26, 'v', 'institucional'),
(27, 'n', 'curso');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE IF NOT EXISTS `setor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id`, `nome`) VALUES
(1, 'setor---'),
(2, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` char(11) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `tipoAcesso` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `senha`, `tipoAcesso`) VALUES
(1, 'Jose Edicarlos', '05540698304', 'copex', 'admin'),
(22, 'Carlos Albertos', '722', 'copex', 'professor'),
(23, 'Alan Pereira', '020', 'copex', 'funcionario'),
(24, 'aluno x', '000', 'copex', 'aluno'),
(26, 'alunoteste', '999', 'copex', 'aluno'),
(27, 'teste aluno 2', '998', 'copex', 'aluno'),
(28, 'jose', '111', 'copex', 'aluno'),
(29, 'josef', '112', 'copex', 'aluno'),
(32, 'visitante', '000', 'v', 'visitante'),
(33, 'Usuario1641', '273', 'copex', 'admin'),
(34, 'Excel', '341', 'copex', 'admin'),
(35, 'add', '004', 'copex', 'admin'),
(36, 'teste0010', '0010', 'copex', 'admin'),
(38, 'v', '853', 'copex', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinculoareaprojeto`
--

CREATE TABLE IF NOT EXISTS `vinculoareaprojeto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projeto` int(11) NOT NULL,
  `tipoArea` varchar(255) NOT NULL,
  `area` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `vinculoareaprojeto`
--

INSERT INTO `vinculoareaprojeto` (`id`, `projeto`, `tipoArea`, `area`) VALUES
(1, 25, 'setor', 2),
(2, 26, 'curso', 10),
(3, 26, 'curso', 11),
(4, 27, 'curso', 10),
(5, 180, 'curso', 10),
(6, 181, 'curso', 10),
(7, 181, 'curso', 11),
(8, 181, 'curso', 12),
(9, 182, 'setor', 2),
(10, 183, 'setor', 2),
(11, 184, 'setor', 1),
(12, 185, 'setor', 1),
(13, 186, 'setor', 1),
(14, 187, 'curso', 10),
(15, 188, 'curso', 10),
(16, 189, 'curso', 10),
(17, 190, 'setor', 1),
(18, 191, 'setor', 1),
(19, 192, 'curso', 10),
(20, 193, 'curso', 10),
(25, 194, 'setor', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinculocertificadoaluno`
--

CREATE TABLE IF NOT EXISTS `vinculocertificadoaluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `certificado` int(11) NOT NULL,
  `aluno` varchar(15) NOT NULL,
  `situacao` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `vinculocertificadoaluno`
--

INSERT INTO `vinculocertificadoaluno` (`id`, `certificado`, `aluno`, `situacao`) VALUES
(1, 2, '111', 'NÃ£o Entregue'),
(2, 3, '111', 'NÃ£o Entregue'),
(3, 1, '111', 'Entregue'),
(4, 1, '112', 'NÃ£o Entregue');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinculocertificadousuario`
--

CREATE TABLE IF NOT EXISTS `vinculocertificadousuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `certificado` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `situacao` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `vinculocertificadousuario`
--

INSERT INTO `vinculocertificadousuario` (`id`, `certificado`, `usuario`, `situacao`) VALUES
(13, 1, 1, 'Entregue'),
(14, 1, 22, 'Entregue'),
(15, 1, 23, 'Entregue'),
(16, 2, 1, 'Entregue'),
(17, 2, 22, 'Entregue'),
(18, 2, 23, 'Entregue'),
(19, 2, 24, 'Entregue'),
(20, 2, 25, 'Entregue'),
(21, 2, 27, 'NÃ£o Entregue'),
(22, 17, 24, 'NÃ£o Entregue'),
(23, 1, 23, 'Entregue'),
(24, 1, 25, 'NÃ£o Entregue'),
(25, 19, 23, 'NÃ£o Entregue'),
(26, 19, 24, 'Entregue'),
(28, 21, 1, 'Entregue'),
(29, 22, 1, 'Entregue'),
(30, 23, 1, 'Entregue');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinculoprojetocurso`
--

CREATE TABLE IF NOT EXISTS `vinculoprojetocurso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projeto` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `vinculoprojetocurso`
--

INSERT INTO `vinculoprojetocurso` (`id`, `projeto`, `curso`) VALUES
(1, 17, 10),
(14, 18, 10),
(15, 22, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinculousuariopermissao`
--

CREATE TABLE IF NOT EXISTS `vinculousuariopermissao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `permissao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=228 ;

--
-- Extraindo dados da tabela `vinculousuariopermissao`
--

INSERT INTO `vinculousuariopermissao` (`id`, `usuario`, `permissao`) VALUES
(4, 3, 'Cursos'),
(5, 3, 'Professores'),
(6, 3, 'Setores'),
(7, 3, 'Visitantes'),
(68, 34, 'Visitantes'),
(67, 34, 'UsuÃ¡rios'),
(98, 36, 'Projetos.Visualizar.0'),
(84, 35, 'UsuÃ¡rios'),
(83, 35, 'Projetos'),
(82, 35, 'Cursos'),
(81, 35, 'Alunos'),
(99, 36, 'Setores.Cadastrar.1'),
(97, 36, 'Projetos.Listar.1'),
(96, 36, 'Professores.Visualizar.0'),
(95, 36, 'Cursos.Listar.1'),
(94, 36, 'Certificados.Editar.0'),
(93, 36, 'Alunos.Cadastrar.1'),
(100, 36, 'Setores.Editar.0'),
(101, 36, 'UsuÃ¡rios.Editar.0'),
(102, 36, 'UsuÃ¡rios.Visualizar.0'),
(103, 36, 'Visitantes.Cadastrar.1'),
(104, 36, 'Visitantes.Visualizar.0'),
(105, 37, 'Alunos.Cadastrar.1'),
(106, 37, 'Alunos.Editar.0'),
(107, 37, 'Alunos.Visualizar.0'),
(108, 37, 'Certificados.Cadastrar.1'),
(109, 37, 'Certificados.Editar.0'),
(110, 37, 'Certificados.Listar.1'),
(111, 37, 'Certificados.Visualizar.0'),
(112, 37, 'Professores.Cadastrar.1'),
(113, 37, 'Professores.Editar.0'),
(114, 37, 'Professores.Listar.1'),
(115, 37, 'Professores.Visualizar.0'),
(116, 37, 'Projetos.Cadastrar.1'),
(117, 37, 'Projetos.Listar.1'),
(118, 37, 'Projetos.Visualizar.0'),
(119, 37, 'Setores.Cadastrar.1'),
(120, 37, 'Setores.Editar.0'),
(121, 37, 'Setores.Listar.1'),
(122, 37, 'Setores.Visualizar.0'),
(123, 37, 'UsuÃ¡rios.Editar.0'),
(124, 37, 'UsuÃ¡rios.Listar.1'),
(125, 37, 'UsuÃ¡rios.Visualizar.0'),
(126, 37, 'Visitantes.Cadastrar.1'),
(127, 37, 'Visitantes.Listar.1'),
(128, 37, 'Visitantes.Visualizar.0'),
(129, 38, 'Alunos.Cadastrar.1'),
(130, 38, 'Alunos.Editar.0'),
(131, 38, 'Alunos.Listar.1'),
(132, 38, 'Alunos.Visualizar.0'),
(133, 38, 'Certificados.Cadastrar.1'),
(134, 38, 'Certificados.Editar.0'),
(135, 38, 'Certificados.Listar.1'),
(136, 38, 'Certificados.Visualizar.0'),
(137, 38, 'Cursos.Cadastrar.1'),
(138, 38, 'Cursos.Editar.0'),
(139, 38, 'Cursos.Listar.1'),
(140, 38, 'Cursos.Visualizar.0'),
(141, 38, 'Professores.Cadastrar.1'),
(142, 38, 'Professores.Editar.0'),
(143, 38, 'Professores.Listar.1'),
(144, 38, 'Professores.Visualizar.0'),
(145, 38, 'Projetos.Listar.1'),
(146, 38, 'Projetos.Visualizar.0'),
(147, 38, 'Setores.Listar.1'),
(148, 38, 'Setores.Visualizar.0'),
(149, 38, 'UsuÃ¡rios.Editar.0'),
(150, 38, 'UsuÃ¡rios.Listar.1'),
(151, 38, 'UsuÃ¡rios.Visualizar.0'),
(152, 38, 'Visitantes.Editar.0'),
(153, 38, 'Visitantes.Listar.1'),
(154, 38, 'Visitantes.Visualizar.0'),
(221, 1, 'UsuÃ¡rio.EdiÃ§Ã£o.0'),
(220, 1, 'UsuÃ¡rio.Cadastro.1'),
(219, 1, 'Setor.VisualizaÃ§Ã£o.0'),
(218, 1, 'Setor.Pesquisa.1'),
(217, 1, 'Setor.EdiÃ§Ã£o.0'),
(216, 1, 'Setor.Cadastro.1'),
(215, 1, 'Projeto.VisualizaÃ§Ã£o.0'),
(214, 1, 'Projeto.Pesquisa.1'),
(213, 1, 'Projeto.EdiÃ§Ã£o.0'),
(212, 1, 'Projeto.Cadastro.1'),
(211, 1, 'Professor.VisualizaÃ§Ã£o.0'),
(210, 1, 'Professor.Pesquisa.1'),
(209, 1, 'Professor.EdiÃ§Ã£o.0'),
(208, 1, 'Professor.Cadastro.1'),
(207, 1, 'Curso.VisualizaÃ§Ã£o.0'),
(206, 1, 'Curso.Pesquisa.1'),
(205, 1, 'Curso.EdiÃ§Ã£o.0'),
(204, 1, 'Curso.Cadastro.1'),
(203, 1, 'Certificado.VisualizaÃ§Ã£o.0'),
(202, 1, 'Certificado.Pesquisa.1'),
(201, 1, 'Certificado.EdiÃ§Ã£o.0'),
(200, 1, 'Certificado.Cadastro.1'),
(199, 1, 'Aluno.VisualizaÃ§Ã£o.0'),
(198, 1, 'Aluno.Pesquisa.1'),
(197, 1, 'Aluno.EdiÃ§Ã£o.0'),
(222, 1, 'UsuÃ¡rio.Pesquisa.1'),
(223, 1, 'UsuÃ¡rio.VisualizaÃ§Ã£o.0'),
(224, 1, 'Visitante.Cadastro.1'),
(225, 1, 'Visitante.EdiÃ§Ã£o.0'),
(226, 1, 'Visitante.Pesquisa.1'),
(227, 1, 'Visitante.VisualizaÃ§Ã£o.0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitante`
--

CREATE TABLE IF NOT EXISTS `visitante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `visitante`
--

INSERT INTO `visitante` (`id`, `usuario`) VALUES
(1, 32);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
