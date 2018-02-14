-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Fev-2018 às 20:58
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `usuario`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 7),
(7, 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `usuario`, `matricula`, `curso`) VALUES
(1, 8, '222', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `anexo`
--

INSERT INTO `anexo` (`id`, `projeto`, `nome`, `localizacao`, `tipo`, `dataPostagem`) VALUES
(1, 1, 'InternetDasCoisasCerto.docx', 'uploads/projeto/c4ca4238a0b923820dcc509a6f75849b/documentos/InternetDasCoisasCerto.docx', '/documentos/', '2018-01-23'),
(2, 1, 'img_padrao.png', 'uploads/projeto/c4ca4238a0b923820dcc509a6f75849b/imagens/img_padrao.png', '/imagens/', '2018-01-23'),
(3, 2, 'CANCER.pdf', 'uploads/projeto/c81e728d9d4c2f636f067f89cc14862c/documentos/CANCER.pdf', '/documentos/', '2018-02-14'),
(4, 2, 'img_padrao.png', 'uploads/projeto/c81e728d9d4c2f636f067f89cc14862c/imagens/img_padrao.png', '/imagens/', '2018-02-14'),
(5, 3, 'CANCER.pdf', 'uploads/projeto/eccbc87e4b5ce2fe28308fd9f2a7baf3/documentos/CANCER.pdf', '/documentos/', '2018-02-14'),
(6, 3, 'img_padrao.png', 'uploads/projeto/eccbc87e4b5ce2fe28308fd9f2a7baf3/imagens/img_padrao.png', '/imagens/', '2018-02-14'),
(7, 4, 'CANCER.pdf', 'uploads/projeto/a87ff679a2f3e71d9181a67b7542122c/documentos/CANCER.pdf', '/documentos/', '2018-02-14'),
(8, 4, 'img_padrao.png', 'uploads/projeto/a87ff679a2f3e71d9181a67b7542122c/imagens/img_padrao.png', '/imagens/', '2018-02-14'),
(9, 5, 'CANCER.pdf', 'uploads/projeto/e4da3b7fbbce2345d7772b0674a318d5/documentos/CANCER.pdf', '/documentos/', '2018-02-14'),
(10, 5, 'img_padrao.png', 'uploads/projeto/e4da3b7fbbce2345d7772b0674a318d5/imagens/img_padrao.png', '/imagens/', '2018-02-14'),
(11, 6, 'CANCER.pdf', 'uploads/projeto/1679091c5a880faf6fb5e6087eb1b2dc/documentos/CANCER.pdf', '/documentos/', '2018-02-14'),
(12, 6, 'img_padrao.png', 'uploads/projeto/1679091c5a880faf6fb5e6087eb1b2dc/imagens/img_padrao.png', '/imagens/', '2018-02-14'),
(13, 7, 'CANCER.pdf', 'uploads/projeto/8f14e45fceea167a5a36dedd4bea2543/documentos/CANCER.pdf', '/documentos/', '2018-02-14'),
(14, 7, 'img_padrao.png', 'uploads/projeto/8f14e45fceea167a5a36dedd4bea2543/imagens/img_padrao.png', '/imagens/', '2018-02-14'),
(15, 8, 'CANCER.pdf', 'uploads/projeto/c9f0f895fb98ab9159f51fd0297e236d/documentos/CANCER.pdf', '/documentos/', '2018-02-14'),
(16, 8, 'img_padrao.png', 'uploads/projeto/c9f0f895fb98ab9159f51fd0297e236d/imagens/img_padrao.png', '/imagens/', '2018-02-14'),
(17, 9, 'CANCER.pdf', 'uploads/projeto/45c48cce2e2d7fbdea1afc51c7c6ad26/documentos/CANCER.pdf', '/documentos/', '2018-02-14'),
(18, 9, 'img_padrao.png', 'uploads/projeto/45c48cce2e2d7fbdea1afc51c7c6ad26/imagens/img_padrao.png', '/imagens/', '2018-02-14'),
(19, 10, 'CANCER.pdf', 'uploads/projeto/d3d9446802a44259755d38e6d163e820/documentos/CANCER.pdf', '/documentos/', '2018-02-14'),
(20, 10, 'img_padrao.png', 'uploads/projeto/d3d9446802a44259755d38e6d163e820/imagens/img_padrao.png', '/imagens/', '2018-02-14'),
(21, 11, 'CANCER.pdf', 'uploads/projeto/6512bd43d9caa6e02c990b0a82652dca/documentos/CANCER.pdf', '/documentos/', '2018-02-14'),
(22, 11, 'img_padrao.png', 'uploads/projeto/6512bd43d9caa6e02c990b0a82652dca/imagens/img_padrao.png', '/imagens/', '2018-02-14'),
(23, 14, 'CANCER.pdf', 'uploads/projeto/aab3238922bcc25a6f606eb525ffdc56/documentos/CANCER.pdf', '/documentos/', '2018-02-14'),
(24, 14, 'img_padrao.png', 'uploads/projeto/aab3238922bcc25a6f606eb525ffdc56/imagens/img_padrao.png', '/imagens/', '2018-02-14'),
(25, 16, 'CANCER.pdf', 'uploads/projeto/c74d97b01eae257e44aa9d5bade97baf/documentos/CANCER.pdf', '/documentos/', '2018-02-14'),
(26, 16, 'img_padrao.png', 'uploads/projeto/c74d97b01eae257e44aa9d5bade97baf/imagens/img_padrao.png', '/imagens/', '2018-02-14');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=162 ;

--
-- Extraindo dados da tabela `certificado`
--

INSERT INTO `certificado` (`id`, `nome`, `caixaReferente`, `anoExercicio`) VALUES
(1, 'III Semana de IniciaÃ§Ã£o CientÃ­fica', 'Diversos', '2017.2'),
(2, 'Semana de enfermagem', 'ENF/2013/2014', '2013.1'),
(3, 'Palestra LogÃ­stica no Brasil', 'ADM - 2013/2015', '2013.1'),
(4, 'Minicurso Marketing Pessoal - III Semana de AdministraÃ§Ã£o - Envelope 2', 'ADM - 2013/2015', '2013.2'),
(5, 'Visita TÃ©cnica FarmÃ¡cia Feitosa', 'ADM - 2013/2015', '2014.1'),
(6, 'Visita TÃ©cnica a Tuboarte', 'ADM - 2013/2015', '2013.1'),
(7, 'Visita TÃ©cnica a Tuboarte', 'ADM - 2013/2015', '2015.2'),
(8, 'ComissÃ£o Organizadora - V Semana do Administrador', 'ADM - 2013/2015', '2015.2'),
(9, 'I Integradm', 'ADM - 2013/2015', '2015.2'),
(10, 'Visita TÃ©cnica ao Complexo PortuÃ¡rio do Pecem', 'ADM - 2013/2015', '2015.1'),
(11, 'Projeto Blitz Verde', 'ADM - 2013/2015', '2014.1'),
(12, 'MetalÃºrgica Pe. CÃ­cero', 'ADM - 2013/2015', '2014.1'),
(13, 'Trabalhos apresentados - I Mostra de Trabalhos CientÃ­ficos ', 'ADM - 2013/2015', '2015.1'),
(14, 'V Semana do Administrador - Envelope 2', 'ADM - 2013/2015', '2015.2'),
(15, 'Projeto Blitz Verde - Consumo Consiente', 'ADM - 2013/2015', '2014.2'),
(16, 'III LogÃ­stica em AÃ§Ã£o', 'ADM - 2013/2015', '2013.2'),
(17, 'Workshop Entendendo a Real situaÃ§Ã£o da Ã¡gua', 'ADM - 2013/2015', '2015.1'),
(18, 'Workshop Projeto Blitz Verde', 'ADM - 2013/2015', '2014.2'),
(19, 'Visita TÃ©cnica Empresa Bom Sinal em Barbalha', 'ADM - 2013/2015', '2013.2'),
(20, 'ADMTEC 2015', 'ADM - 2013/2015', '2015.2'),
(21, 'Visita TÃ©cnica Empresa IcoFort', 'ADM - 2013/2015', '2014.1'),
(22, 'A utilizaÃ§Ã£o dos MÃ©todos Ãgeis na gestÃ£o de Projetos', 'ADM - 2013/2015', '2015.2'),
(23, 'Minicurso Marketing Pessoal - III Semana de AdministraÃ§Ã£o - Envelope 1', 'ADM - 2013/2015', '2013.2'),
(24, 'DeclaraÃ§Ã£o Visita TÃ©cnica a Comunidade Jurema', 'ADM - 2013/2015', '2014.2'),
(25, 'IV Semana do Administrador', 'ADM - 2013/2015', '2014.2'),
(26, 'V Semana do Administrador - Envelope 1', 'ADM - 2013/2015', '2015.2'),
(27, 'Projeto Blitz Verde - Jaguaribe/ Ce', 'ADM - 2013/2015', '2014.1'),
(28, 'I Feira de Marketing e LogÃ­stica', 'ADM - 2013/2015', '2013.1'),
(29, 'Visita TÃ©cnica CerÃ¢mica Gomes de Matos', 'ADM - 2013/2015', '2013.1'),
(30, 'CafÃ© FilosÃ³fico', 'ADM - 2016/2017', '2016.2'),
(31, 'ApresentaÃ§Ã£o em Sala TemÃ¡tica - ADMTEC', 'ADM - 2016/2017', '2016.1'),
(32, 'I SeminÃ¡rio de GestÃ£o Empresarial', 'ADM - 2016/2017', '2016.1'),
(33, 'ComissÃ£o Organizadora - Minicurso MotivaÃ§Ã£o o caminho para o sucesso', 'ADM - 2016/2017', '2016.1'),
(34, 'Projeto de ExtensÃ£o - O AvanÃ§o TecnolÃ³gico no Ã‚mbito Empresarial', 'ADM - 2016/2017', '2016.1'),
(35, 'ADM em Foco', 'ADM - 2016/2017', '2016.2'),
(36, 'ADMTEC 2016', 'ADM - 2016/2017', '2016.1'),
(37, 'Workshop ADM FVS em Foco', 'ADM - 2016/2017', '2016.1'),
(38, 'ADMCONT - INOVATION', 'ADM - 2016/2017', '2016.1'),
(39, 'ComissÃ£o Organizadora ADMTEC', 'ADM - 2016/2017', '2016.1'),
(40, 'Visita TÃ©cnica a Tuboarte', 'ADM - 2016/2017', '2016.2'),
(41, 'AÃ§Ã£o InteraÃ§Ã£o com quem faz acontecer', 'ADM - 2016/2017', '2016.2'),
(42, 'AÃ§Ã£o de ExtensÃ£o - As habilidades essenciais dos negociadores', 'ADM - 2016/2017', '2015.1'),
(43, 'ComissÃ£o Organizadora da VI Semana do Administrador', 'ADM - 2016/2017', '2016.2'),
(44, 'Projeto de ExtensÃ£o - AÃ§Ã£o Ecoar', 'ADM - 2016/2017', '2016.2'),
(45, 'Visita TÃ©cnica UNIPACE', 'ADM - 2016/2017', '2016.2'),
(46, 'ComissÃ£o Organizadora - CafÃ© FilosÃ³fico', 'ADM - 2016/2017', '2016.2'),
(47, 'Papo ADM - 2016', 'ADM - 2016/2017', '2016.1'),
(48, 'ComissÃ£o Organizadora - Papo ADM 2016', 'ADM - 2016/2017', '2016.1'),
(49, 'Curso de OratÃ³ria', 'ADM - 2016/2017', '2017.1'),
(50, 'Workshop ComÃ©rcio Exterior', 'ADM - 2016/2017', '2017.1'),
(51, 'Talkshow do Consultor', 'ADM - 2016/2017', '2016.2'),
(52, 'DeclaraÃ§Ã£o LaboratÃ³rio de Marketing - Startando soluÃ§Ãµes', 'ADM - 2016/2017', '2016.2'),
(53, 'VI Semana do Administrador', 'ADM - 2016/2017', '2016.2'),
(54, 'VI Semana do Administrador - Lista 2', 'ADM - 2016/2017', '2016.2'),
(55, 'Curso de ExtensÃ£o em redes de Computadores e SeguranÃ§a e InformaÃ§Ã£o', 'ADS - 2013/2014', '2014.2'),
(56, 'ComissÃ£o Organizadora - III Ciclo de Palestras', 'ADS - 2013/2014', '2014.1'),
(57, 'Programa de ExtensÃ£o de ADS', 'ADS - 2013/2014', '2013.2'),
(58, 'Flisol - Minicurso VirtualizaÃ§Ã£o e Software Livre', 'ADS - 2013/2014', '2014.1'),
(59, 'Monitores Projeto de ExtensÃ£o Tecnologia na Melhor Idade', 'ADS - 2013/2014', '2014.1'),
(60, 'III Ciclo de Palestras', 'ADS - 2013/2014', '2014.1'),
(61, 'Palestra ComÃ©rcio EletrÃ´nico e CÃ³digo de Defesa do Consumidor', 'ADS - 2013/2014', '2014.1'),
(62, 'Visita TÃ©cnica Empresa Brisanet', 'ADS - 2013/2014', '2014.2'),
(63, 'Curso de InformÃ¡tica BÃ¡sica', 'ADS - 2013/2014', '2014.1'),
(64, 'OSBiblio', 'ADS - 2013/2014', '2013.2'),
(65, 'II Semana de Tecnologia', 'ADS - 2013/2014', '2013.2'),
(66, 'Flisol', 'ADS - 2013/2014', '2014.1'),
(67, 'Palestra Proposta TÃ©cnica Comercial', 'ADS - 2013/2014', '2013.1'),
(68, 'I ExposiÃ§Ã£o CientÃ­fica de InovaÃ§Ãµes TecnolÃ³gicas', 'ADS - 2013/2014', '2014.1'),
(69, 'Visita a Brisanet', 'ADS - 2013/2014', '2013.1'),
(70, 'Nivelamento em LÃ­ngua Portuguesa', 'ADS - 2013/2014', '2014.1'),
(71, 'Visita TÃ©cnica ao Porto Digital', 'ADS - 2013/2014', '2014.2'),
(72, 'Minicurso IntroduÃ§Ã£o ao Gimp', 'ADS - 2013/2014', '2014.1'),
(73, 'Flisol - Palestra de Software Livre: uma questÃ£o de liberdade', 'ADS - 2013/2014', '2014.1'),
(74, 'I Semana de Tecnologia', 'ADS - 2013/2014', '2013.1'),
(75, 'Flisol - IntroduÃ§Ã£o ao Desenvolvimento de Aplicativos', 'ADS - 2013/2014', '2014.1'),
(76, 'V Semana de Tecnologia', 'ADS - 2015/2017', '2016.2'),
(77, 'Eco Reverse', 'ADS - 2015/2017', '2016.1'),
(78, 'Trabalho apresentados na I Mostra de Projetos Integradores', 'ADS - 2015/2017', '2015.1'),
(79, 'ComissÃ£o Organizadora - IV Semana de Tecnologia', 'ADS - 2015/2017', '2015.2'),
(80, 'Visita TÃ©cnica Brisanet', 'ADS - 2015/2017', '2016.1'),
(81, 'DeclaraÃ§Ã£o Visita TÃ©cnica a Empresas de MÃ©dio e Grande Porte de Fortaleza', 'ADS - 2015/2017', '2015.2'),
(82, 'Projeto Integrando e Programando', 'ADS - 2015/2017', '2015.1'),
(83, 'ComissÃ£o Organizadora - II Semana TecnolÃ³gica', 'ADS - 2015/2017', '2015.1'),
(84, 'Visita TÃ©cnica a Brisanet - 23 de Abril de 2015', 'ADS - 2015/2017', '2015.1'),
(85, 'Curso PreparatÃ³rio para CertificaÃ§Ã£o OCJP', 'ADS - 2015/2017', '2015.1'),
(86, 'I Maratona de ProgramaÃ§Ã£o de IAPL', 'ADS - 2015/2017', '2015.1'),
(87, 'Curso Tecnologia na Melhor Idade - 06/03 a 13/11', 'ADS - 2015/2017', '2015.1'),
(88, 'ComissÃ£o Organizadora - V Semana de Tecnologia', 'ADS - 2015/2017', '2016.2'),
(89, 'ComissÃ£o Organizadora - ADMTEC 2017', 'ADS - 2015/2017', '2017.1'),
(90, 'Curso de Desenvolvimento Android', 'ADS - 2015/2017', '2016.1'),
(91, 'Trabalhos - IV Mostra de Projetos Integradores', 'ADS - 2015/2017', '2016.2'),
(92, 'Minicurso - Gerentes a LÃ­deres', 'ADS - 2015/2017', '2015.2'),
(93, 'Curso de LÃ³gica de ProgramaÃ§Ã£o', 'ADS - 2015/2017', '2016.1'),
(94, 'Projeto de ExtensÃ£o - Desenvolvimento de Sistemas embasados em requisitos', 'ADS - 2015/2017', '2016.1'),
(95, 'SeminÃ¡rio Interdisciplinariedade, Ã‰tica e Empreendedorismo', 'ADS - 2015/2017', '2015.2'),
(96, 'Design GrÃ¡fico', 'ADS - 2015/2017', '2017.1'),
(97, 'III Mostra de Projetos Integradores', 'ADS - 2015/2017', '2016.1'),
(98, 'I Mostra de Projeto Integrador', 'ADS - 2015/2017', '2015.1'),
(99, 'Minicurso - Planejamento da NegociaÃ§Ã£o', 'ADS - 2015/2017', '2015.2'),
(100, 'Interdisciplinariedade Ã‰tica e Empreendedorismo', 'ADS - 2015/2017', '2016.1'),
(101, 'Curso Tecnologia na Faculdade - Ensino MÃ©dio', 'ADS - 2015/2017', '2016.1'),
(102, 'IV Semana de Tecnologia - Debatedores', 'ADS - 2015/2017', '2015.1'),
(103, 'IV Semana de Tecnologia', 'ADS - 2015/2017', '2015.2'),
(104, 'IV Semana de Tecnologia - Colaboradores', 'ADS - 2015/2017', '2015.2'),
(105, 'A Ã©tica e a responsabilidade social dos profissionais de ADM e ADS', 'ADS - 2015/2017', '2017.1'),
(106, 'I SimpÃ³sio sobre Direito do Trabalho', 'CONT - 2013/2017', '2015.2'),
(107, 'III Encontro de Contadores em Debate com a Sociedade', 'CONT - 2013/2017', '2014.2'),
(108, 'Semana do Contabilista 2014', 'CONT - 2013/2017', '2014.1'),
(109, 'IV Encontro de Contadores', 'CONT - 2013/2017', '2015.2'),
(110, 'DeclaraÃ§Ã£o Palestra de Encerramento SIC 2015', 'CONT - 2013/2017', '2015.2'),
(111, 'V Encontro de Contadores', 'CONT - 2013/2017', '2016.2'),
(112, 'Papo ContÃ¡bil 2017', 'CONT - 2013/2017', '2017.1'),
(113, 'ComissÃ£o Organizadora I FÃ³rum de ModernizaÃ§Ã£o de GestÃ£o', 'CONT - 2013/2017', '2015.2'),
(114, 'Visita TÃ©cnica Super Queiroz', 'CONT - 2013/2017', '2016.2'),
(115, 'ComissÃ£o Organizadora Papo ContÃ¡bil 2017', 'CONT - 2013/2017', '2017.1'),
(116, 'Palestra Linguagem Brasileira de Sinais', 'CONT - 2013/2017', '2014.2'),
(117, 'Compreendendo a Linguagem Brasileira de Sinais', 'CONT - 2013/2017', '2014.2'),
(118, 'Visita TÃ©cnica ao Supermercado Queiroz - 06/2016', 'CONT - 2013/2017', '2016.1'),
(119, 'Workshop Entendendo a Real situaÃ§Ã£o da Ã¡gua', 'CONT - 2013/2017', '2015.1'),
(120, 'Palestrantes - I SimpÃ³sio sobre Direito do Trabalho', 'CONT - 2013/2017', '2015.2'),
(121, 'Minicurso EducaÃ§Ã£o Financeira - Semana do Contabilista', 'CONT - 2013/2017', '2014.1'),
(122, 'Minicurso NoÃ§Ãµes de DÃ©bito e CrÃ©dito: um introduÃ§Ã£o a Contabilidade - Semana do Contabilista 2', 'CONT - 2013/2017', '2015.1'),
(123, 'Minicurso ContribuiÃ§Ã£o dos Softwares para as PrÃ¡ticas ContÃ¡beis', 'CONT - 2013/2017', '2015.1'),
(124, 'Programa Papo ContÃ¡bil', 'CONT - 2013/2017', '2014.2'),
(125, 'Blitz Verde - Lixo DomÃ©stico', 'CONT - 2013/2017', '2014.1'),
(126, 'ComissÃ£o Organizadora - V Encontro de Contadores em Debate com a Sociedade', 'CONT - 2013/2017', '2016.2'),
(127, 'Projeto de ExtensÃ£o Blitz Verde', 'CONT - 2013/2017', '2014.1'),
(128, 'Minicurso MatemÃ¡tica Aplicada - II Encontro de Contadores em Debate com a Sociedade', 'CONT - 2013/2017', '2013.1'),
(129, 'ComissÃ£o Organizadora - Semana do Contabilista 2014', 'CONT - 2013/2017', '2014.1'),
(130, 'Minicurso Abertura de Empresa Simples Nacional', 'CONT - 2013/2017', '2014.1'),
(131, 'Semana do Contabilista 2016 - Mincursos', 'CONT - 2013/2017', '2016.1'),
(132, 'ADMTECH', 'CONT - 2013/2017', '2015.2'),
(133, 'I FÃ³rum de ModernizaÃ§Ã£o da GestÃ£o ContÃ¡bil ', 'CONT - 2013/2017', '2015.2'),
(134, 'AÃ§Ã£o Ultima Gota', 'CONT - 2013/2017', '2015.1'),
(135, 'VI Encontro de Contadores em Debate com a Sociedade', 'CONT - 2013/2017', '2017.2'),
(136, 'ComissÃ£o Organizadora - VI Encontro de Contadores em Debate com a Sociedade', 'CONT - 2013/2017', '2017.2'),
(137, 'I ConferÃªncia de EducaÃ§Ã£o FÃ­sica, Esporte e InclusÃ£o', 'EDF - 2015/2017', '2017.1'),
(138, 'Semana do Profissional de EducaÃ§Ã£o FÃ­sica', 'EDF - 2015/2017', '2017.2'),
(139, 'ComissÃ£o Organizadora - Jogos UniversitÃ¡rios 2017', 'EDF - 2015/2017', '2017.1'),
(140, 'I Torneio de Futsal Escolar da FVS', 'EDF - 2015/2017', '2016.2'),
(141, 'I Corrida de Rua Noturna da FVS', 'EDF - 2015/2017', '2017.1'),
(142, 'Atividade de ExtensÃ£o RecreAÃ§Ã£o', 'EDF - 2015/2017', '2017.1'),
(143, 'Evento Mais AÃ§Ã£o - Iguatu/Ce', 'EDF - 2015/2017', '2015.1'),
(144, 'ComissÃ£o Organizadora - I ConferÃªncia de EducaÃ§Ã£o FÃ­sica, Esporte e InclusÃ£o', 'EDF - 2015/2017', '2017.1'),
(145, 'Semana do Calouro', 'EDF - 2015/2017', '2017.1'),
(146, 'SeminÃ¡rio de EducaÃ§Ã£o FÃ­sica - PromoÃ§Ã£o da SaÃºde na Escola', 'EDF - 2015/2017', '2017.1'),
(147, 'Semana do Calouro - Oficina de Mini Atletismo (2016)', 'EDF - 2015/2017', '2016.1'),
(148, 'Palestra com o CREF', 'EDF - 2015/2017', '2016.1'),
(149, 'II Semana AcadÃªmica - Minicurso NutriÃ§Ã£o Esportiva na PrÃ¡tica da MusculaÃ§Ã£o', 'EDF - 2015/2017', '2016.2'),
(150, 'AÃ§Ã£o I Movimente - se com SaÃºde', 'EDF - 2015/2017', '2016.1'),
(151, 'Feira de ProfissÃµes - Pereiro', 'EDF - 2015/2017', '2016.1'),
(152, 'Feira de ProfissÃµes - Jaguaribe', 'EDF - 2015/2017', '2016.1'),
(153, 'SeminÃ¡rio de EducaÃ§Ã£o FÃ­sica - AvaliaÃ§Ã£o Funcional', 'EDF - 2015/2017', '2017.1'),
(154, 'ComissÃ£o Organizadora Jogos UniversitÃ¡rios - 2Âª EdiÃ§Ã£o', 'EDF - 2015/2017', '2016.1'),
(155, 'I Semana AcadÃªmica de EducaÃ§Ã£o FÃ­sica (Corrigidos)', 'EDF - 2015/2017', '2015.2'),
(156, 'ComissÃ£o Organizadora II Semana AcadÃªmica de EducaÃ§Ã£o FÃ­sica', 'EDF - 2015/2017', '2016.2'),
(157, 'Semana do Calouro - Oficina Esportes Coletivos (2016)', 'EDF - 2015/2017', '2016.1'),
(158, 'Semana do Calouro - Oficina de AvaliaÃ§Ã£o FÃ­sica (2016)', 'EDF - 2015/2017', '2016.1'),
(159, 'Semana do Calouro - Oficina de Jogos como Ferramenta de Aprendizagem (2016)', 'EDF - 2015/2017', '2016.1'),
(160, 'AÃ§Ã£o Ciclo Sesc - Cedro/Ce', 'EDF - 2015/2017', '2015.1'),
(161, 'ComissÃ£o Organizadora - Jornada de ProduÃ§Ã£o CientÃ­fica de PrÃ¡ticas', 'EDF - 2015/2017', '2017.1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`) VALUES
(1, 'AdministraÃ§Ã£o'),
(2, 'AnÃ¡lise e Desenvolvimento de Sistemas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `usuario`) VALUES
(1, 6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `observacao`
--

INSERT INTO `observacao` (`id`, `projeto`, `usuario`, `dataPostagem`, `conteudo`) VALUES
(1, 1, 3, '2018-01-23', 'Projeto submetido.'),
(2, 1, 3, '2018-01-23', 'nada'),
(3, 1, 3, '2018-01-23', 'Projeto alterado e submetido novamente.'),
(4, 2, 3, '2018-02-14', 'Projeto submetido.'),
(5, 3, 3, '2018-02-14', 'Projeto submetido.'),
(6, 4, 3, '2018-02-14', 'Projeto submetido.'),
(7, 5, 3, '2018-02-14', 'Projeto submetido.'),
(8, 6, 3, '2018-02-14', 'Projeto submetido.'),
(9, 7, 3, '2018-02-14', 'Projeto submetido.'),
(10, 8, 3, '2018-02-14', 'Projeto submetido.'),
(11, 7, 3, '2018-02-14', 'x'),
(12, 7, 3, '2018-02-14', 'Projeto alterado e submetido novamente.'),
(13, 7, 3, '2018-02-14', 'aaaaaa'),
(14, 7, 3, '2018-02-14', 'Projeto alterado e submetido novamente.'),
(15, 7, 3, '2018-02-14', '1'),
(16, 7, 3, '2018-02-14', '2'),
(17, 7, 3, '2018-02-14', ''),
(18, 7, 3, '2018-02-14', 'm'),
(19, 9, 3, '2018-02-14', 'Projeto submetido.'),
(20, 10, 3, '2018-02-14', 'SÃ³ klnkjbihvhvhv'),
(21, 11, 3, '2018-02-14', 's'),
(22, 16, 3, '2018-02-14', 'h');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(11) NOT NULL,
  `titulacao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE IF NOT EXISTS `projeto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `usuario` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `inicioOcorrencia` date NOT NULL,
  `finalOcorrencia` date NOT NULL,
  `inicioInscricao` date NOT NULL,
  `finalInscricao` date NOT NULL,
  `abrirInscricao` char(3) NOT NULL,
  `situacao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE IF NOT EXISTS `setor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id`, `nome`) VALUES
(1, 'area1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `senha`, `tipoAcesso`) VALUES
(1, 'Adriano Lima Cï¿½ndido', '33148652878', '1892376', 'admin'),
(2, 'Carlos Williamy Lourenço Andrade', '07229082374', '94901711', 'admin'),
(3, 'Kerma MÃ¡rcia de Freitas', '82645108334', '##kerma123##', 'admin'),
(4, 'Lucas AmÃ¢ncio de Lima', '05388807320', 'lucas2017', 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `vinculoareaprojeto`
--

INSERT INTO `vinculoareaprojeto` (`id`, `projeto`, `tipoArea`, `area`) VALUES
(2, 1, 'curso', 1),
(3, 2, 'curso', 1),
(4, 3, 'curso', 1),
(5, 4, 'curso', 1),
(6, 5, 'curso', 1),
(7, 6, 'curso', 1),
(9, 8, 'curso', 2),
(13, 7, 'curso', 2),
(14, 10, 'curso', 1),
(15, 11, 'curso', 1),
(16, 14, 'setor', 1),
(17, 16, 'setor', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `vinculocertificadousuario`
--

INSERT INTO `vinculocertificadousuario` (`id`, `certificado`, `usuario`, `situacao`) VALUES
(1, 145, 3, 'NÃ£o Entregue'),
(2, 131, 3, 'NÃ£o Entregue'),
(3, 148, 3, 'Entregue'),
(4, 161, 3, 'NÃ£o Entregue');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinculousuariopermissao`
--

CREATE TABLE IF NOT EXISTS `vinculousuariopermissao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `permissao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=459 ;

--
-- Extraindo dados da tabela `vinculousuariopermissao`
--

INSERT INTO `vinculousuariopermissao` (`id`, `usuario`, `permissao`) VALUES
(447, 1, 'a:35:{i:0;s:16:"Aluno.EdiÃ§Ã£o.0";i:1;s:16:"Aluno.Pesquisa.1";i:2;s:22:"Aluno.VisualizaÃ§Ã£o.0";i:3;s:22:"Certificado.Cadastro.1";i:4;s:22:"Certificado.EdiÃ§Ã£o.0";i:5;s:22:"Certificado.Pesquisa.1";i:6;s:28:"Certificado.VisualizaÃ§Ã£o.0";i:7;s:34:"Certificado.VisualizaÃ§Ã£o_Geral.0";i:8;s:24:"Certificado.Vinculados.0";i:9;s:35:"Certificado.Pesquisa_Por_UsuÃ¡rio.1";i:10;s:35:"Certificado.Vincular_Certificados.1";i:11;s:16:"Curso.Cadastro.1";i:12;s:16:"Curso.EdiÃ§Ã£o.0";i:13;s:16:"Curso.Pesquisa.1";i:14;s:22:"Curso.VisualizaÃ§Ã£o.0";i:15;s:20:"Professor.EdiÃ§Ã£o.0";i:16;s:20:"Professor.Pesquisa.1";i:17;s:26:"Professor.VisualizaÃ§Ã£o.0";i:18;s:18:"Projeto.Cadastro.1";i:19;s:18:"Projeto.EdiÃ§Ã£o.0";i:20;s:18:"Projeto.Pesquisa.1";i:21;s:24:"Projeto.VisualizaÃ§Ã£o.0";i:22;s:30:"Projeto.VisualizaÃ§Ã£o_Geral.0";i:23;s:17:"Projeto.Avaliar.0";i:24;s:16:"Setor.Cadastro.1";i:25;s:16:"Setor.EdiÃ§Ã£o.0";i:26;s:16:"Setor.Pesquisa.1";i:27;s:22:"Setor.VisualizaÃ§Ã£o.0";i:28;s:19:"UsuÃ¡rio.Cadastro.1";i:29;s:19:"UsuÃ¡rio.EdiÃ§Ã£o.0";i:30;s:19:"UsuÃ¡rio.Pesquisa.1";i:31;s:25:"UsuÃ¡rio.VisualizaÃ§Ã£o.0";i:32;s:20:"Visitante.EdiÃ§Ã£o.0";i:33;s:20:"Visitante.Pesquisa.1";i:34;s:26:"Visitante.VisualizaÃ§Ã£o.0";}'),
(448, 2, 'a:35:{i:0;s:16:"Aluno.EdiÃ§Ã£o.0";i:1;s:16:"Aluno.Pesquisa.1";i:2;s:22:"Aluno.VisualizaÃ§Ã£o.0";i:3;s:22:"Certificado.Cadastro.1";i:4;s:22:"Certificado.EdiÃ§Ã£o.0";i:5;s:22:"Certificado.Pesquisa.1";i:6;s:28:"Certificado.VisualizaÃ§Ã£o.0";i:7;s:34:"Certificado.VisualizaÃ§Ã£o_Geral.0";i:8;s:24:"Certificado.Vinculados.0";i:9;s:35:"Certificado.Pesquisa_Por_UsuÃ¡rio.1";i:10;s:35:"Certificado.Vincular_Certificados.1";i:11;s:16:"Curso.Cadastro.1";i:12;s:16:"Curso.EdiÃ§Ã£o.0";i:13;s:16:"Curso.Pesquisa.1";i:14;s:22:"Curso.VisualizaÃ§Ã£o.0";i:15;s:20:"Professor.EdiÃ§Ã£o.0";i:16;s:20:"Professor.Pesquisa.1";i:17;s:26:"Professor.VisualizaÃ§Ã£o.0";i:18;s:18:"Projeto.Cadastro.1";i:19;s:18:"Projeto.EdiÃ§Ã£o.0";i:20;s:18:"Projeto.Pesquisa.1";i:21;s:24:"Projeto.VisualizaÃ§Ã£o.0";i:22;s:30:"Projeto.VisualizaÃ§Ã£o_Geral.0";i:23;s:17:"Projeto.Avaliar.0";i:24;s:16:"Setor.Cadastro.1";i:25;s:16:"Setor.EdiÃ§Ã£o.0";i:26;s:16:"Setor.Pesquisa.1";i:27;s:22:"Setor.VisualizaÃ§Ã£o.0";i:28;s:19:"UsuÃ¡rio.Cadastro.1";i:29;s:19:"UsuÃ¡rio.EdiÃ§Ã£o.0";i:30;s:19:"UsuÃ¡rio.Pesquisa.1";i:31;s:25:"UsuÃ¡rio.VisualizaÃ§Ã£o.0";i:32;s:20:"Visitante.EdiÃ§Ã£o.0";i:33;s:20:"Visitante.Pesquisa.1";i:34;s:26:"Visitante.VisualizaÃ§Ã£o.0";}'),
(449, 4, 'a:35:{i:0;s:16:"Aluno.EdiÃ§Ã£o.0";i:1;s:16:"Aluno.Pesquisa.1";i:2;s:22:"Aluno.VisualizaÃ§Ã£o.0";i:3;s:22:"Certificado.Cadastro.1";i:4;s:22:"Certificado.EdiÃ§Ã£o.0";i:5;s:22:"Certificado.Pesquisa.1";i:6;s:28:"Certificado.VisualizaÃ§Ã£o.0";i:7;s:34:"Certificado.VisualizaÃ§Ã£o_Geral.0";i:8;s:24:"Certificado.Vinculados.0";i:9;s:35:"Certificado.Pesquisa_Por_UsuÃ¡rio.1";i:10;s:35:"Certificado.Vincular_Certificados.1";i:11;s:16:"Curso.Cadastro.1";i:12;s:16:"Curso.EdiÃ§Ã£o.0";i:13;s:16:"Curso.Pesquisa.1";i:14;s:22:"Curso.VisualizaÃ§Ã£o.0";i:15;s:20:"Professor.EdiÃ§Ã£o.0";i:16;s:20:"Professor.Pesquisa.1";i:17;s:26:"Professor.VisualizaÃ§Ã£o.0";i:18;s:18:"Projeto.Cadastro.1";i:19;s:18:"Projeto.EdiÃ§Ã£o.0";i:20;s:18:"Projeto.Pesquisa.1";i:21;s:24:"Projeto.VisualizaÃ§Ã£o.0";i:22;s:30:"Projeto.VisualizaÃ§Ã£o_Geral.0";i:23;s:17:"Projeto.Avaliar.0";i:24;s:16:"Setor.Cadastro.1";i:25;s:16:"Setor.EdiÃ§Ã£o.0";i:26;s:16:"Setor.Pesquisa.1";i:27;s:22:"Setor.VisualizaÃ§Ã£o.0";i:28;s:19:"UsuÃ¡rio.Cadastro.1";i:29;s:19:"UsuÃ¡rio.EdiÃ§Ã£o.0";i:30;s:19:"UsuÃ¡rio.Pesquisa.1";i:31;s:25:"UsuÃ¡rio.VisualizaÃ§Ã£o.0";i:32;s:20:"Visitante.EdiÃ§Ã£o.0";i:33;s:20:"Visitante.Pesquisa.1";i:34;s:26:"Visitante.VisualizaÃ§Ã£o.0";}'),
(458, 3, 'a:37:{i:0;s:16:"Aluno.EdiÃ§Ã£o.0";i:1;s:16:"Aluno.Pesquisa.1";i:2;s:22:"Aluno.VisualizaÃ§Ã£o.0";i:3;s:22:"Certificado.Cadastro.1";i:4;s:22:"Certificado.EdiÃ§Ã£o.0";i:5;s:22:"Certificado.Pesquisa.1";i:6;s:28:"Certificado.VisualizaÃ§Ã£o.0";i:7;s:34:"Certificado.VisualizaÃ§Ã£o_Geral.0";i:8;s:24:"Certificado.Vinculados.0";i:9;s:35:"Certificado.Pesquisa_Por_UsuÃ¡rio.1";i:10;s:35:"Certificado.Vincular_Certificados.1";i:11;s:16:"Curso.Cadastro.1";i:12;s:16:"Curso.EdiÃ§Ã£o.0";i:13;s:16:"Curso.Pesquisa.1";i:14;s:22:"Curso.VisualizaÃ§Ã£o.0";i:15;s:20:"Professor.EdiÃ§Ã£o.0";i:16;s:20:"Professor.Pesquisa.1";i:17;s:26:"Professor.VisualizaÃ§Ã£o.0";i:18;s:18:"Projeto.Cadastro.1";i:19;s:18:"Projeto.EdiÃ§Ã£o.0";i:20;s:18:"Projeto.Pesquisa.1";i:21;s:24:"Projeto.VisualizaÃ§Ã£o.0";i:22;s:30:"Projeto.VisualizaÃ§Ã£o_Geral.0";i:23;s:17:"Projeto.Avaliar.0";i:24;s:19:"Projeto.ExclusÃ£o.0";i:25;s:16:"Setor.Cadastro.1";i:26;s:16:"Setor.EdiÃ§Ã£o.0";i:27;s:16:"Setor.Pesquisa.1";i:28;s:22:"Setor.VisualizaÃ§Ã£o.0";i:29;s:19:"UsuÃ¡rio.Cadastro.1";i:30;s:19:"UsuÃ¡rio.EdiÃ§Ã£o.0";i:31;s:19:"UsuÃ¡rio.Pesquisa.1";i:32;s:25:"UsuÃ¡rio.VisualizaÃ§Ã£o.0";i:33;s:20:"UsuÃ¡rio.ExclusÃ£o.0";i:34;s:20:"Visitante.EdiÃ§Ã£o.0";i:35;s:20:"Visitante.Pesquisa.1";i:36;s:26:"Visitante.VisualizaÃ§Ã£o.0";}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitante`
--

CREATE TABLE IF NOT EXISTS `visitante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
