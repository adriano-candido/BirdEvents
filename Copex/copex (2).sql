-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Jan-2018 às 18:32
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `usuario`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, 'III Semana de Iniciação Científica', 'Diversos', '2017.2'),
(2, 'Semana de enfermagem', 'ENF/2013/2014', '2013.1'),
(3, 'Palestra Logística no Brasil', 'ADM - 2013/2015', '2013.1'),
(4, 'Minicurso Marketing Pessoal - III Semana de Administração - Envelope 2', 'ADM - 2013/2015', '2013.2'),
(5, 'Visita Técnica Farmácia Feitosa', 'ADM - 2013/2015', '2014.1'),
(6, 'Visita Técnica a Tuboarte', 'ADM - 2013/2015', '2013.1'),
(7, 'Visita Técnica a Tuboarte', 'ADM - 2013/2015', '2015.2'),
(8, 'Comissão Organizadora - V Semana do Administrador', 'ADM - 2013/2015', '2015.2'),
(9, 'I Integradm', 'ADM - 2013/2015', '2015.2'),
(10, 'Visita Técnica ao Complexo Portuário do Pecem', 'ADM - 2013/2015', '2015.1'),
(11, 'Projeto Blitz Verde', 'ADM - 2013/2015', '2014.1'),
(12, 'Metalúrgica Pe. Cícero', 'ADM - 2013/2015', '2014.1'),
(13, 'Trabalhos apresentados - I Mostra de Trabalhos Científicos ', 'ADM - 2013/2015', '2015.1'),
(14, 'V Semana do Administrador - Envelope 2', 'ADM - 2013/2015', '2015.2'),
(15, 'Projeto Blitz Verde - Consumo Consiente', 'ADM - 2013/2015', '2014.2'),
(16, 'III Logística em Ação', 'ADM - 2013/2015', '2013.2'),
(17, 'Workshop Entendendo a Real situação da água', 'ADM - 2013/2015', '2015.1'),
(18, 'Workshop Projeto Blitz Verde', 'ADM - 2013/2015', '2014.2'),
(19, 'Visita Técnica Empresa Bom Sinal em Barbalha', 'ADM - 2013/2015', '2013.2'),
(20, 'ADMTEC 2015', 'ADM - 2013/2015', '2015.2'),
(21, 'Visita Técnica Empresa IcoFort', 'ADM - 2013/2015', '2014.1'),
(22, 'A utilização dos Métodos Ágeis na gestão de Projetos', 'ADM - 2013/2015', '2015.2'),
(23, 'Minicurso Marketing Pessoal - III Semana de Administração - Envelope 1', 'ADM - 2013/2015', '2013.2'),
(24, 'Declaração Visita Técnica a Comunidade Jurema', 'ADM - 2013/2015', '2014.2'),
(25, 'IV Semana do Administrador', 'ADM - 2013/2015', '2014.2'),
(26, 'V Semana do Administrador - Envelope 1', 'ADM - 2013/2015', '2015.2'),
(27, 'Projeto Blitz Verde - Jaguaribe/ Ce', 'ADM - 2013/2015', '2014.1'),
(28, 'I Feira de Marketing e Logística', 'ADM - 2013/2015', '2013.1'),
(29, 'Visita Técnica Cerâmica Gomes de Matos', 'ADM - 2013/2015', '2013.1'),
(30, 'Café Filosófico', 'ADM - 2016/2017', '2016.2'),
(31, 'Apresentação em Sala Temática - ADMTEC', 'ADM - 2016/2017', '2016.1'),
(32, 'I Seminário de Gestão Empresarial', 'ADM - 2016/2017', '2016.1'),
(33, 'Comissão Organizadora - Minicurso Motivação o caminho para o sucesso', 'ADM - 2016/2017', '2016.1'),
(34, 'Projeto de Extensão - O Avanço Tecnológico no Âmbito Empresarial', 'ADM - 2016/2017', '2016.1'),
(35, 'ADM em Foco', 'ADM - 2016/2017', '2016.2'),
(36, 'ADMTEC 2016', 'ADM - 2016/2017', '2016.1'),
(37, 'Workshop ADM FVS em Foco', 'ADM - 2016/2017', '2016.1'),
(38, 'ADMCONT - INOVATION', 'ADM - 2016/2017', '2016.1'),
(39, 'Comissão Organizadora ADMTEC', 'ADM - 2016/2017', '2016.1'),
(40, 'Visita Técnica a Tuboarte', 'ADM - 2016/2017', '2016.2'),
(41, 'Ação Interação com quem faz acontecer', 'ADM - 2016/2017', '2016.2'),
(42, 'Ação de Extensão - As habilidades essenciais dos negociadores', 'ADM - 2016/2017', '2015.1'),
(43, 'Comissão Organizadora da VI Semana do Administrador', 'ADM - 2016/2017', '2016.2'),
(44, 'Projeto de Extensão - Ação Ecoar', 'ADM - 2016/2017', '2016.2'),
(45, 'Visita Técnica UNIPACE', 'ADM - 2016/2017', '2016.2'),
(46, 'Comissão Organizadora - Café Filosófico', 'ADM - 2016/2017', '2016.2'),
(47, 'Papo ADM - 2016', 'ADM - 2016/2017', '2016.1'),
(48, 'Comissão Organizadora - Papo ADM 2016', 'ADM - 2016/2017', '2016.1'),
(49, 'Curso de Oratória', 'ADM - 2016/2017', '2017.1'),
(50, 'Workshop Comércio Exterior', 'ADM - 2016/2017', '2017.1'),
(51, 'Talkshow do Consultor', 'ADM - 2016/2017', '2016.2'),
(52, 'Declaração Laboratório de Marketing - Startando soluções', 'ADM - 2016/2017', '2016.2'),
(53, 'VI Semana do Administrador', 'ADM - 2016/2017', '2016.2'),
(54, 'VI Semana do Administrador - Lista 2', 'ADM - 2016/2017', '2016.2'),
(55, 'Curso de Extensão em redes de Computadores e Segurança e Informação', 'ADS - 2013/2014', '2014.2'),
(56, 'Comissão Organizadora - III Ciclo de Palestras', 'ADS - 2013/2014', '2014.1'),
(57, 'Programa de Extensão de ADS', 'ADS - 2013/2014', '2013.2'),
(58, 'Flisol - Minicurso Virtualização e Software Livre', 'ADS - 2013/2014', '2014.1'),
(59, 'Monitores Projeto de Extensão Tecnologia na Melhor Idade', 'ADS - 2013/2014', '2014.1'),
(60, 'III Ciclo de Palestras', 'ADS - 2013/2014', '2014.1'),
(61, 'Palestra Comércio Eletrônico e Código de Defesa do Consumidor', 'ADS - 2013/2014', '2014.1'),
(62, 'Visita Técnica Empresa Brisanet', 'ADS - 2013/2014', '2014.2'),
(63, 'Curso de Informática Básica', 'ADS - 2013/2014', '2014.1'),
(64, 'OSBiblio', 'ADS - 2013/2014', '2013.2'),
(65, 'II Semana de Tecnologia', 'ADS - 2013/2014', '2013.2'),
(66, 'Flisol', 'ADS - 2013/2014', '2014.1'),
(67, 'Palestra Proposta Técnica Comercial', 'ADS - 2013/2014', '2013.1'),
(68, 'I Exposição Científica de Inovações Tecnológicas', 'ADS - 2013/2014', '2014.1'),
(69, 'Visita a Brisanet', 'ADS - 2013/2014', '2013.1'),
(70, 'Nivelamento em Língua Portuguesa', 'ADS - 2013/2014', '2014.1'),
(71, 'Visita Técnica ao Porto Digital', 'ADS - 2013/2014', '2014.2'),
(72, 'Minicurso Introdução ao Gimp', 'ADS - 2013/2014', '2014.1'),
(73, 'Flisol - Palestra de Software Livre: uma questão de liberdade', 'ADS - 2013/2014', '2014.1'),
(74, 'I Semana de Tecnologia', 'ADS - 2013/2014', '2013.1'),
(75, 'Flisol - Introdução ao Desenvolvimento de Aplicativos', 'ADS - 2013/2014', '2014.1'),
(76, 'V Semana de Tecnologia', 'ADS - 2015/2017', '2016.2'),
(77, 'Eco Reverse', 'ADS - 2015/2017', '2016.1'),
(78, 'Trabalho apresentados na I Mostra de Projetos Integradores', 'ADS - 2015/2017', '2015.1'),
(79, 'Comissão Organizadora - IV Semana de Tecnologia', 'ADS - 2015/2017', '2015.2'),
(80, 'Visita Técnica Brisanet', 'ADS - 2015/2017', '2016.1'),
(81, 'Declaração Visita Técnica a Empresas de Médio e Grande Porte de Fortaleza', 'ADS - 2015/2017', '2015.2'),
(82, 'Projeto Integrando e Programando', 'ADS - 2015/2017', '2015.1'),
(83, 'Comissão Organizadora - II Semana Tecnológica', 'ADS - 2015/2017', '2015.1'),
(84, 'Visita Técnica a Brisanet - 23 de Abril de 2015', 'ADS - 2015/2017', '2015.1'),
(85, 'Curso Preparatório para Certificação OCJP', 'ADS - 2015/2017', '2015.1'),
(86, 'I Maratona de Programação de IAPL', 'ADS - 2015/2017', '2015.1'),
(87, 'Curso Tecnologia na Melhor Idade - 06/03 a 13/11', 'ADS - 2015/2017', '2015.1'),
(88, 'Comissão Organizadora - V Semana de Tecnologia', 'ADS - 2015/2017', '2016.2'),
(89, 'Comissão Organizadora - ADMTEC 2017', 'ADS - 2015/2017', '2017.1'),
(90, 'Curso de Desenvolvimento Android', 'ADS - 2015/2017', '2016.1'),
(91, 'Trabalhos - IV Mostra de Projetos Integradores', 'ADS - 2015/2017', '2016.2'),
(92, 'Minicurso - Gerentes a Líderes', 'ADS - 2015/2017', '2015.2'),
(93, 'Curso de Lógica de Programação', 'ADS - 2015/2017', '2016.1'),
(94, 'Projeto de Extensão - Desenvolvimento de Sistemas embasados em requisitos', 'ADS - 2015/2017', '2016.1'),
(95, 'Seminário Interdisciplinariedade, Ética e Empreendedorismo', 'ADS - 2015/2017', '2015.2'),
(96, 'Design Gráfico', 'ADS - 2015/2017', '2017.1'),
(97, 'III Mostra de Projetos Integradores', 'ADS - 2015/2017', '2016.1'),
(98, 'I Mostra de Projeto Integrador', 'ADS - 2015/2017', '2015.1'),
(99, 'Minicurso - Planejamento da Negociação', 'ADS - 2015/2017', '2015.2'),
(100, 'Interdisciplinariedade Ética e Empreendedorismo', 'ADS - 2015/2017', '2016.1'),
(101, 'Curso Tecnologia na Faculdade - Ensino Médio', 'ADS - 2015/2017', '2016.1'),
(102, 'IV Semana de Tecnologia - Debatedores', 'ADS - 2015/2017', '2015.1'),
(103, 'IV Semana de Tecnologia', 'ADS - 2015/2017', '2015.2'),
(104, 'IV Semana de Tecnologia - Colaboradores', 'ADS - 2015/2017', '2015.2'),
(105, 'A ética e a responsabilidade social dos profissionais de ADM e ADS', 'ADS - 2015/2017', '2017.1'),
(106, 'I Simpósio sobre Direito do Trabalho', 'CONT - 2013/2017', '2015.2'),
(107, 'III Encontro de Contadores em Debate com a Sociedade', 'CONT - 2013/2017', '2014.2'),
(108, 'Semana do Contabilista 2014', 'CONT - 2013/2017', '2014.1'),
(109, 'IV Encontro de Contadores', 'CONT - 2013/2017', '2015.2'),
(110, 'Declaração Palestra de Encerramento SIC 2015', 'CONT - 2013/2017', '2015.2'),
(111, 'V Encontro de Contadores', 'CONT - 2013/2017', '2016.2'),
(112, 'Papo Contábil 2017', 'CONT - 2013/2017', '2017.1'),
(113, 'Comissão Organizadora I Fórum de Modernização de Gestão', 'CONT - 2013/2017', '2015.2'),
(114, 'Visita Técnica Super Queiroz', 'CONT - 2013/2017', '2016.2'),
(115, 'Comissão Organizadora Papo Contábil 2017', 'CONT - 2013/2017', '2017.1'),
(116, 'Palestra Linguagem Brasileira de Sinais', 'CONT - 2013/2017', '2014.2'),
(117, 'Compreendendo a Linguagem Brasileira de Sinais', 'CONT - 2013/2017', '2014.2'),
(118, 'Visita Técnica ao Supermercado Queiroz - 06/2016', 'CONT - 2013/2017', '2016.1'),
(119, 'Workshop Entendendo a Real situação da água', 'CONT - 2013/2017', '2015.1'),
(120, 'Palestrantes - I Simpósio sobre Direito do Trabalho', 'CONT - 2013/2017', '2015.2'),
(121, 'Minicurso Educação Financeira - Semana do Contabilista', 'CONT - 2013/2017', '2014.1'),
(122, 'Minicurso Noções de Débito e Crédito: um introdução a Contabilidade - Semana do Contabilista 2015', 'CONT - 2013/2017', '2015.1'),
(123, 'Minicurso Contribuição dos Softwares para as Práticas Contábeis', 'CONT - 2013/2017', '2015.1'),
(124, 'Programa Papo Contábil', 'CONT - 2013/2017', '2014.2'),
(125, 'Blitz Verde - Lixo Doméstico', 'CONT - 2013/2017', '2014.1'),
(126, 'Comissão Organizadora - V Encontro de Contadores em Debate com a Sociedade', 'CONT - 2013/2017', '2016.2'),
(127, 'Projeto de Extensão Blitz Verde', 'CONT - 2013/2017', '2014.1'),
(128, 'Minicurso Matemática Aplicada - II Encontro de Contadores em Debate com a Sociedade', 'CONT - 2013/2017', '2013.1'),
(129, 'Comissão Organizadora - Semana do Contabilista 2014', 'CONT - 2013/2017', '2014.1'),
(130, 'Minicurso Abertura de Empresa Simples Nacional', 'CONT - 2013/2017', '2014.1'),
(131, 'Semana do Contabilista 2016 - Mincursos', 'CONT - 2013/2017', '2016.1'),
(132, 'ADMTECH', 'CONT - 2013/2017', '2015.2'),
(133, 'I Fórum de Modernização da Gestão Contábil ', 'CONT - 2013/2017', '2015.2'),
(134, 'Ação Ultima Gota', 'CONT - 2013/2017', '2015.1'),
(135, 'VI Encontro de Contadores em Debate com a Sociedade', 'CONT - 2013/2017', '2017.2'),
(136, 'Comissão Organizadora - VI Encontro de Contadores em Debate com a Sociedade', 'CONT - 2013/2017', '2017.2'),
(137, 'I Conferência de Educação Física, Esporte e Inclusão', 'EDF - 2015/2017', '2017.1'),
(138, 'Semana do Profissional de Educação Física', 'EDF - 2015/2017', '2017.2'),
(139, 'Comissão Organizadora - Jogos Universitários 2017', 'EDF - 2015/2017', '2017.1'),
(140, 'I Torneio de Futsal Escolar da FVS', 'EDF - 2015/2017', '2016.2'),
(141, 'I Corrida de Rua Noturna da FVS', 'EDF - 2015/2017', '2017.1'),
(142, 'Atividade de Extensão RecreAção', 'EDF - 2015/2017', '2017.1'),
(143, 'Evento Mais Ação - Iguatu/Ce', 'EDF - 2015/2017', '2015.1'),
(144, 'Comissão Organizadora - I Conferência de Educação Física, Esporte e Inclusão', 'EDF - 2015/2017', '2017.1'),
(145, 'Semana do Calouro', 'EDF - 2015/2017', '2017.1'),
(146, 'Seminário de Educação Física - Promoção da Saúde na Escola', 'EDF - 2015/2017', '2017.1'),
(147, 'Semana do Calouro - Oficina de Mini Atletismo (2016)', 'EDF - 2015/2017', '2016.1'),
(148, 'Palestra com o CREF', 'EDF - 2015/2017', '2016.1'),
(149, 'II Semana Acadêmica - Minicurso Nutrição Esportiva na Prática da Musculação', 'EDF - 2015/2017', '2016.2'),
(150, 'Ação I Movimente - se com Saúde', 'EDF - 2015/2017', '2016.1'),
(151, 'Feira de Profissões - Pereiro', 'EDF - 2015/2017', '2016.1'),
(152, 'Feira de Profissões - Jaguaribe', 'EDF - 2015/2017', '2016.1'),
(153, 'Seminário de Educação Física - Avaliação Funcional', 'EDF - 2015/2017', '2017.1'),
(154, 'Comissão Organizadora Jogos Universitários - 2ª Edição', 'EDF - 2015/2017', '2016.1'),
(155, 'I Semana Acadêmica de Educação Física (Corrigidos)', 'EDF - 2015/2017', '2015.2'),
(156, 'Comissão Organizadora II Semana Acadêmica de Educação Física', 'EDF - 2015/2017', '2016.2'),
(157, 'Semana do Calouro - Oficina Esportes Coletivos (2016)', 'EDF - 2015/2017', '2016.1'),
(158, 'Semana do Calouro - Oficina de Avaliação Física (2016)', 'EDF - 2015/2017', '2016.1'),
(159, 'Semana do Calouro - Oficina de Jogos como Ferramenta de Aprendizagem (2016)', 'EDF - 2015/2017', '2016.1'),
(160, 'Ação Ciclo Sesc - Cedro/Ce', 'EDF - 2015/2017', '2015.1'),
(161, 'Comissão Organizadora - Jornada de Produção Científica de Práticas', 'EDF - 2015/2017', '2017.1');

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
(1, 'Administração'),
(2, 'Análise e Desenvolvimento de Sistemas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `situacao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE IF NOT EXISTS `setor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `senha`, `tipoAcesso`) VALUES
(1, 'Adriano Lima Cândido', '33148652878', '1892376', 'admin'),
(2, 'Carlos Williamy Lourenço Andrade', '07229082374', '94901711', 'aluno'),
(3, 'Kerma MÃ¡rcia de Freitas', '82645108334', '##kerma123##', 'admin'),
(4, 'Lucas AmÃ¢ncio de Lima', '05388807320', 'lucas2017', 'admin'),
(5, 'Teste', '44484129469', '123', 'professor');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinculousuariopermissao`
--

CREATE TABLE IF NOT EXISTS `vinculousuariopermissao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `permissao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Extraindo dados da tabela `vinculousuariopermissao`
--

INSERT INTO `vinculousuariopermissao` (`id`, `usuario`, `permissao`) VALUES
(37, 3, 'Aluno.EdiÃ§Ã£o.0'),
(38, 3, 'Aluno.Pesquisa.1'),
(39, 3, 'Aluno.VisualizaÃ§Ã£o.0'),
(40, 3, 'Certificado.Cadastro.1'),
(41, 3, 'Certificado.EdiÃ§Ã£o.0'),
(42, 3, 'Certificado.Pesquisa.1'),
(43, 3, 'Certificado.VisualizaÃ§Ã£o.0'),
(44, 3, 'Certificado.VisualizaÃ§Ã£o_Geral.0'),
(45, 3, 'Certificado.Vinculados.0'),
(46, 3, 'Certificado.Pesquisa_Por_UsuÃ¡rio.1'),
(47, 3, 'Certificado.Vincular_Certificados.1'),
(48, 3, 'Curso.Cadastro.1'),
(49, 3, 'Curso.EdiÃ§Ã£o.0'),
(50, 3, 'Curso.Pesquisa.1'),
(51, 3, 'Curso.VisualizaÃ§Ã£o.0'),
(52, 3, 'Professor.EdiÃ§Ã£o.0'),
(53, 3, 'Professor.Pesquisa.1'),
(54, 3, 'Professor.VisualizaÃ§Ã£o.0'),
(55, 3, 'Projeto.Cadastro.1'),
(56, 3, 'Projeto.EdiÃ§Ã£o.0'),
(57, 3, 'Projeto.Pesquisa.1'),
(58, 3, 'Projeto.VisualizaÃ§Ã£o.0'),
(59, 3, 'Projeto.VisualizaÃ§Ã£o_Geral.0'),
(60, 3, 'Projeto.Avaliar.0'),
(61, 3, 'Setor.Cadastro.1'),
(62, 3, 'Setor.EdiÃ§Ã£o.0'),
(63, 3, 'Setor.Pesquisa.1'),
(64, 3, 'Setor.VisualizaÃ§Ã£o.0'),
(65, 3, 'UsuÃ¡rio.Cadastro.1'),
(66, 3, 'UsuÃ¡rio.EdiÃ§Ã£o.0'),
(67, 3, 'UsuÃ¡rio.Pesquisa.1'),
(68, 3, 'UsuÃ¡rio.VisualizaÃ§Ã£o.0'),
(69, 3, 'Visitante.EdiÃ§Ã£o.0'),
(70, 3, 'Visitante.Pesquisa.1'),
(71, 3, 'Visitante.VisualizaÃ§Ã£o.0');

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
