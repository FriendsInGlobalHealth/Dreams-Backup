-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-05-2019 a las 23:45:18
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `vbg_sam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_area`
--

CREATE TABLE IF NOT EXISTS `sa_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_area` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `sa_area`
--

INSERT INTO `sa_area` (`id`, `nome_area`, `estado`) VALUES
(1, 'I. Disponibilidade de cuidados pós VBG \r\n', 1),
(2, 'II. Materiais e Infraestruturas \r\n', 1),
(3, 'III. Identificação Precoce de Vítimas de Violência  \r\n', 1),
(4, 'IV. Cuidados Clínicos Centrados no Utente \r\n', 1),
(5, 'V.MEDICINA LEGAL \r\n', 1),
(6, 'VI. Sistema de Referência e Seguimento da Vítima \r\n', 1),
(7, 'VII. Formação e Melhoria de Qualidade \r\n', 1),
(8, 'VIII. Políticas de Cuidados de Saúde \r\n', 1),
(9, 'IX. Criação de Demanda Para Uso de Cuidados Pós Violência \r\n', 1),
(10, 'X. Reporte e Sistemas de Informação \r\n', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_area_padrao`
--

CREATE TABLE IF NOT EXISTS `sa_area_padrao` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo da area padrao',
  `nome_area_padrao` varchar(250) NOT NULL COMMENT 'nome da area padrao',
  `area_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'estado da area padrao',
  PRIMARY KEY (`id`),
  KEY `fk_area` (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Volcar la base de datos para la tabla `sa_area_padrao`
--

INSERT INTO `sa_area_padrao` (`id`, `nome_area_padrao`, `area_id`, `estado`) VALUES
(1, '1. A US oferece cuidados acessíveis e gratuitos às vítimas de violência \r\n', 1, 1),
(2, '2. A US tem materiais de IEC GBV  \r\n', 2, 1),
(3, '3. A US tem infraestruturas equipamentos e materiais adequados para providenciar cuidados pós violência (Veja detalhes na Caixa 1)\r\n', 2, 1),
(4, '4. A US identifica precocemente utentes que tenham sido vítimas de violência \r\n', 3, 1),
(5, '5. O Provedor faz perguntas sobre VPI de forma apropriada \r\n', 3, 1),
(6, '6. O provedor avalia o risco imediato que os utentes podem ter no momento da revelação \r\n', 3, 1),
(7, '7. O Provedor obtém consentimento informado para exame físico \r\n', 4, 1),
(8, '8. Provedor de saúde realiza o tratamento das lesões \r\n', 4, 1),
(9, '9. O provedor demostra conhecimento em aconselhamento de crise para evitar revitimização \r\n', 4, 1),
(10, '10. O provedor põe em prática as orientações para atendimento á crianças e adolescentes vítimas de violência e exploração sexual  \r\n', 4, 1),
(11, '11. Provedor respeita e mantém a privacidade e confidencialidade do utente  \r\n', 4, 1),
(12, '12. O provedor oferece atendimento humanizado e respeitoso para evitar revitimização \r\n', 4, 1),
(13, '13. Provedor realiza exame das lesões extragenitais e génito-anais \r\n', 4, 1),
(14, '14.A US oferece contracepção de emergência para vítimas de violência sexual do sexo feminino de acordo com o protocolo  \r\n', 4, 1),
(15, '15. O provedor oferece ás vítimas de violência aconselhamento e testagem para HIV e profilaxia pós exposição para HIV (PPE) dentro de 72 Horas depois da violência sexual  \r\n', 4, 1),
(16, '16. O provedor oferece medicações relevantes para prevenção ou tratamento de infecções de transmissão sexual \r\n', 4, 1),
(17, '17. O provedor oferece assistência psicológica aos utentes vítimas de violência sexual \r\n', 4, 1),
(18, ' 18.O provedor realiza o exame médico-legal de acordo com as recomendações nacionais  \r\n', 5, 1),
(19, '19. O provedor colecta, armazena e / ou transporta evidências forenses de forma segura de acordo com protocolo nacional \r\n', 5, 1),
(20, '20. A US tem sistema de referência para facilitar a utilização dos serviços necessários na rede de apoio á vítima de violência  \r\n', 6, 1),
(21, '21. Os provedores oferecem serviços de seguimento da vítima de violência \r\n', 6, 1),
(22, '22. Todos provedores que oferecem serviços pós VBG foram treinados para exercerem seus papéis e responsabilidades no cuidado com os utentes \r\n', 7, 1),
(23, '23. A US tem um Sistema de melhoria continua de qualidade de cuidados pós VBG\r\n', 7, 1),
(24, '24. A US tem protocolos para oferecer cuidados pós violência de acordo com as recomendações nacionais \r\n', 8, 1),
(25, '25. A US apoia a divulgação dos serviços e aumento de consciência de uso de cuidados \r\n', 9, 1),
(26, '26. A US possui fichas de notificação, livros de registo e outros instrumentos de recolha de dados dos cuidados pós VBG \r\n', 10, 1),
(27, ' 27. A US tem um Sistema de avaliação e monitoria de dados VBG \r\n', 10, 1),
(28, '28. Os dados de VBG são analisados para melhorar a prestação de serviços oferecidos e sistemas de resposta á VBG \r\n', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_avaliacao`
--

CREATE TABLE IF NOT EXISTS `sa_avaliacao` (
  `id_a` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo da avaliacao',
  `data_avaliacao` date NOT NULL COMMENT 'data da criacao da avaliacao',
  `nome_avaliacao` varchar(250) NOT NULL COMMENT 'nome da avaliacao',
  `instancia_id` int(11) NOT NULL COMMENT 'instancia da avaliacao',
  `tipo_avaliacao_id` int(11) NOT NULL COMMENT 'tipo da avaliacao',
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'estado da avaliacao',
  PRIMARY KEY (`id_a`),
  KEY `pk_instancia` (`instancia_id`),
  KEY `pk_tipo_avaliacao` (`tipo_avaliacao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `sa_avaliacao`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_avaliacao_identificacao`
--

CREATE TABLE IF NOT EXISTS `sa_avaliacao_identificacao` (
  `id_ai` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo da avaliacao da identificacao',
  `nome_avaliacao_identificacao` varchar(250) NOT NULL COMMENT 'nome da avaliacao',
  `data_avaliacao` date NOT NULL COMMENT 'data de avaliacao',
  `provincia_id` int(11) NOT NULL COMMENT 'codigo da provincia',
  `distrito_id` int(11) NOT NULL COMMENT 'codigo do distrito',
  `localidade_id` int(11) NOT NULL COMMENT 'codifo da localidade ',
  `avaliacao_id` int(11) NOT NULL COMMENT 'codigo da avaliacao',
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'estado da avaliacao',
  PRIMARY KEY (`id_ai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `sa_avaliacao_identificacao`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_avaliacao_padrao`
--

CREATE TABLE IF NOT EXISTS `sa_avaliacao_padrao` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo da avaliacao padrao',
  `data_avaliacao` date NOT NULL COMMENT 'data da avaliacao',
  `nome_avaliacao_padrao` varchar(250) NOT NULL COMMENT 'nome da avaliacao',
  `Avaliacao_id` int(11) NOT NULL COMMENT 'codigo avaliacao',
  `Meio_Verificacao_id` int(11) NOT NULL COMMENT 'codigo meio de verificacao',
  `criterio_verificacao_id` int(11) NOT NULL COMMENT 'criterio de verificacao',
  `area_padrao_id` int(11) NOT NULL COMMENT 'codigo area padrao',
  `resultado` int(11) NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'estado da avaliacao',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `sa_avaliacao_padrao`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_avaliacao_servico`
--

CREATE TABLE IF NOT EXISTS `sa_avaliacao_servico` (
  `id_as` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo da avaliacao de servico',
  `nome_avaliacao` varchar(250) NOT NULL COMMENT 'nome da avaliacao',
  `servico_id` int(11) NOT NULL COMMENT 'codigo do servico',
  `sub_servico_id` int(11) NOT NULL COMMENT 'codigo do sub servico',
  `data_criacao` date NOT NULL COMMENT 'data de criacao da avaliacao',
  `avaliacao_id` int(11) NOT NULL COMMENT 'codigo da avaliacao',
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'estado do servico',
  PRIMARY KEY (`id_as`),
  KEY `pk_sub_servico` (`sub_servico_id`),
  KEY `pk_avaliacao` (`avaliacao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `sa_avaliacao_servico`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_criterio_verificacao`
--

CREATE TABLE IF NOT EXISTS `sa_criterio_verificacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo do criterio de verificacao',
  `id_ar` int(11) NOT NULL COMMENT 'codigo da area padrao',
  `nome_criterio` varchar(250) NOT NULL COMMENT 'nome do criterio',
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'estado do criterio de verificacao',
  PRIMARY KEY (`id`),
  KEY `pk_area_padrao` (`id_ar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Volcar la base de datos para la tabla `sa_criterio_verificacao`
--

INSERT INTO `sa_criterio_verificacao` (`id`, `id_ar`, `nome_criterio`, `estado`) VALUES
(3, 1, '1.1 A US oferece cuidados pós violência 24 horas por dia OU apoia ao utente a ter cuidados de referência em outras US que oferecem cuidados 24 horas \r\n', 1),
(4, 1, '1.2 A US não condiciona a oferta de cuidados ao reporte á policia. \r\n', 1),
(5, 1, 'Verifique na aceitação se esta disponível informação sobre disponibilidade de serviços independentemente de a vítima ter uma guia da polícia. \r\n', 1),
(6, 1, '1.3 A US tem todas guias de referência inclusive para polícia para que a vítima não tenha que ir a polícia para ter as guias de referência. \r\n', 1),
(7, 1, '(PEÇA PARA VER AS GUIAS DE REFERÊNCIA)\r\n', 1),
(8, 1, '1.4 A US garante privacidade durante o atendimento. \r\n', 1),
(9, 1, '1.5 A US oferece cuidados gratuitos para vítimas de violência \r\n', 1),
(10, 1, '1.6 A US prioriza as vítimas de violência sexual para garantir que estas recebam os cuidados mais rápido possíveis \r\n', 1),
(11, 1, '1.7 A US tem fluxograma de atendimento que garante acesso aos cuidados que todos utentes independentemente do sexo, orientaçao sexual, raça , religião, idade, estado marital etc.\r\n', 1),
(12, 2, '2.1 A US tem materiais IEC visíveis dirigidos aos utentes sobre VBG (e.g.,cartazes, planfletos, leis, direitos em áreas de maior circulação de utentes como por ex. corredores, farmácia, consultas etc.)\r\n', 1),
(13, 3, '3.1 A oferta de serviços VBG ocorre dentro ou perto de uns US \r\n', 1),
(14, 3, '3.2 A US usa letreiros e sinais discretos  e fluxograma claro para aumentar o acesso, segurança e privacidade para utentes e provedores. \r\n', 1),
(15, 3, '3.3 O local de atendimento têm privacidade (a vitima ou o provedor não podem ser ouvidas ou vistas durante o atendimento), está limpo, ventilado e iluminado. \r\n', 1),
(16, 3, ' 3.4 A US tem um local com privacidade, limpo e confortavel para internamento de curta duração caso a vítima necessite \r\n', 1),
(17, 3, '3.5 A US tem equipamentos essenciais (Infraestruturas, mobiliário, documentos) disponíveis (VEJA CAIXA 1 se algum artigo estiver em falta este critério é NÃO).\r\n', 1),
(18, 3, '3.6 A US tem um sistema para verificar trimestralmente se os medicamentos,vacinas e testes rápidos estão dentro do prazo de validade e tem meios para descarga se expirados. \r\n', 1),
(19, 3, '3.7 A US integra consumíveis, vacinas e testes para VBG na gestão e distribuição de medicamentos necessários para responder a violência na cadeia de distribuição de medicamentos. \r\n', 1),
(20, 3, '3.8 A US tem para pelo menos 3 meses de stock de medicamentos e consumíveis para responder a casos de violência (VEJA CAIXA 1 se algum artigo estiver em falta este critério é NÃO).\r\n', 1),
(21, 4, '4.1O provedor pergunta sobre violência aos utentes que tenham sinais e sintomas de violência  para VPI e/ou VS.(VEJA CAIXA 2)\r\n', 1),
(22, 4, '4.2 A US tem um algoritmo de rastreio de violência para perguntar sobre VPI ou VS alinhada com as normas nacionais e da OMS \r\n', 1),
(23, 4, '4.3 A US realiza rastreio clinico de VBG (VPI ou VS) somente se nos  serviçostodos os seguintes requisitos estão disponiveis:\r\n', 1),
(24, 4, '•   Protocolo de cuidados pós VBG em vigor\r\n', 1),
(25, 4, '·     Questionário com  perguntas padrao onde provedores podem documentar respostas. \r\n', 1),
(26, 4, '·      Provedores oferecem serviços imediatos.\r\n', 1),
(27, 4, '·      Provedores forma treinados em rastreio de VBG (VPI ou VS)\r\n', 1),
(28, 4, '·      Sala de atendimento com privacidade \r\n', 1),
(29, 4, '·      Sistema de referência para outros serviços \r\n', 1),
(30, 4, 'Se estes critérios não estiverem observados os cuidados VBG são inadequados e não deve ser realizado o rastreio clinico ou universal de VBG .\r\n', 1),
(31, 4, ' 4.4 Provedores realizam rastreio clinico quando assessando pacientes em outras portas de entrada apropriadas (CPN, ATS, PF, PTV, SAAJ a partir dos 15 anos etc.) se os critérios mínimos forem observados \r\n', 1),
(32, 5, '5.1 O provedor nunca pergunta sobre violência quando o utente esta acompanhado pelo parceiro ou pessoas da família. \r\n', 1),
(33, 5, '5.2 O provedor aflora o tópico sobre VBG cuidadosamente fazendo colocações gerais sobre VBG  antes de fazer perguntas directamente sobre a situação do utente . \r\n', 1),
(34, 5, '5.3 O provedor não força o rastreio para utentes que não querem ser rastreados  \r\n', 1),
(35, 5, '5.4 O provedor explica ao detalhe as questões que vai fazer para compor um plano de segurança com utente \r\n', 1),
(36, 5, '5.5 O provedor faz perguntas directas e simples sobre violência e documenta.\r\n', 1),
(37, 6, '6.1 O provedor faz perguntas simples e diretas para avaliar sinais de perigo de vida imediato \r\n', 1),
(38, 6, '·      A violência tem sido cada vez mais frequente nos últimos 6 meses?\r\n', 1),
(39, 6, '·      Ele /e usou ou ameaçou uma arma?\r\n', 1),
(40, 6, '·      Ele/a tentou estrangular?\r\n', 1),
(41, 6, '·      Acredita que ele/a possa matar – te?\r\n', 1),
(42, 6, '·      Alguma vez ele /a bateu durante a gravidez?\r\n', 1),
(43, 6, '·      Ele /a tem comportamento violento constante?\r\n', 1),
(44, 6, '6.2 Se o utente responde SIM a alguma das perguntas ou se o utente são oferecidos os cuidados imediatos \r\n', 1),
(45, 6, '6.3 O provedor apoia a fazer o plano de segurança fazendo as questões descritas abaixo:\r\n', 1),
(46, 6, '·         Se tiver que sair as pressas de casa para onde iria? \r\n', 1),
(47, 6, '·         Sairia sozinha ou com os seus filhos? (Se a utente tiver filhos) \r\n', 1),
(48, 6, '·         Que documentos precisaria organizar, dinheiro levaria consigo?\r\n', 1),
(49, 6, '·         Pode guardar pertences essenciais num local seguro caso precise sair de casa? \r\n', 1),
(50, 6, '·         Onde procuraria ajuda ou dinheiro no caso de emergência? \r\n', 1),
(51, 6, '·         Há um vizinho a quem você ligaria para chamar a polícia se você estivesse em perigo?\r\n', 1),
(52, 7, '7.1 O provedor obtém consetimento escrito ou verbal (assentimento e concordância da criança) antes de realizar qualquer procedimento e explica os procedimentos ao utente e seus tutores se este for menor\r\n', 1),
(53, 7, '7.2 O provedor obtém consentimento para realizar a testagem para HIV de acordo com as directrizes nacionais de aconselhamento e testagem \r\n', 1),
(54, 7, '7.3 O provedor segue as normas para obter o consentimento de menores de idade \r\n', 1),
(55, 7, '7.4 O provedor nunca força o utente a ser examinado a não ser que o exame permita resolver uma situação que coloque em perigo a vida do utente\r\n', 1),
(56, 7, '7.5 O provedor clarifica que o utente pode recusar qualquer procedimento.\r\n', 1),
(57, 7, '7.6 O provedor respeita a decisão do utente de não reportar a polícia \r\n', 1),
(58, 7, '7.7 Se o reporte á policia á mandatário (e.g. utente menor), o provedor reporta o caso e informa aos tutores do utente a importância de seguir com a referência. \r\n', 1),
(59, 7, '7.8 Os provedores de saúde reportam casos de violência contra criança. \r\n', 1),
(60, 8, '8.1 O Provedor avalia e documenta os sinais vitais da vítima (especificar sinais vitais )\r\n', 1),
(61, 8, '8.2 O provedor verifica se o utente está estabilizado e verifica os sinais de perigo e corrige-os imediatamente.  \r\n', 1),
(62, 8, '8.3 O provedor colhe a anamneses detalhada dos pais / ou tutores quando o utente é menor ou não pode dar consentimento  \r\n', 1),
(63, 8, '8.4 O provedor faz o tratamento das lesões génito-anais de acordo com o protocolo.\r\n', 1),
(64, 8, '8.5 O provedor faz o tratamento das lesões extragenitas de acordo com o protocolo de avaliação de paciente traumatizado colhe as evidências médico-legal:\r\n', 1),
(65, 9, '9.1 O provedor demonstra conhecimento, empatia, e habilidades de comunicação com os pacientes: \r\n', 1),
(66, 9, 'Verifique se o provedor : \r\n', 1),
(67, 9, '·         Realiza escuta activa (escuta sem interromper, não pressiona o paciente a falar)\r\n', 1),
(68, 9, '·         Valida o que o paciente diz (i.e. da importância ao o que paciente fala)\r\n', 1),
(69, 9, '·         Mostra compaixão e preocupação \r\n', 1),
(70, 9, '·         Não culpa nem julga o paciente \r\n', 1),
(71, 9, '·         Fala de acordo com o grau de compreensão e nível de entendimento do utente \r\n', 1),
(72, 9, '·         Evita usar termos técnicos e usa linguagem simples \r\n', 1),
(73, 9, '·         Usa linguagem verbal e não-verbal que o paciente pode entender \r\n', 1),
(74, 9, '·         Encoraja o paciente a fazer perguntas \r\n', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_distrito`
--

CREATE TABLE IF NOT EXISTS `sa_distrito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_Distrito` varchar(250) NOT NULL COMMENT 'Nome do Distrito',
  `provincia_id` int(11) NOT NULL COMMENT 'Codigo da Provincia',
  `Estado` int(11) NOT NULL DEFAULT '1' COMMENT 'Estado do distrito',
  PRIMARY KEY (`id`),
  KEY `PK_provincia` (`provincia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `sa_distrito`
--

INSERT INTO `sa_distrito` (`id`, `Nome_Distrito`, `provincia_id`, `Estado`) VALUES
(1, 'Macia', 2, 1),
(2, 'Xai Xai', 2, 1),
(3, 'Chokwe', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_instancia`
--

CREATE TABLE IF NOT EXISTS `sa_instancia` (
  `id_I` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id da tabela instancia',
  `nome_instancia` varchar(250) NOT NULL COMMENT 'nome da instancia',
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'estado da instancia',
  PRIMARY KEY (`id_I`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `sa_instancia`
--

INSERT INTO `sa_instancia` (`id_I`, `nome_instancia`, `estado`) VALUES
(1, 'US', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_localidade`
--

CREATE TABLE IF NOT EXISTS `sa_localidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo da localidade',
  `nome_localidade` varchar(250) NOT NULL COMMENT 'nome da localizacao',
  `distrito_id` int(11) NOT NULL COMMENT 'codigo do distrito',
  `provincia_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'estado da localidade',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `sa_localidade`
--

INSERT INTO `sa_localidade` (`id`, `nome_localidade`, `distrito_id`, `provincia_id`, `estado`) VALUES
(1, 'Machel', 3, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_meio_verificacao`
--

CREATE TABLE IF NOT EXISTS `sa_meio_verificacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo do meio de verificacao',
  `nome_meio_verificacao` varchar(250) NOT NULL COMMENT 'nome do meio de verificacao',
  `criterio_verificacao_id` int(11) NOT NULL COMMENT 'codigo do criterio de verificacao',
  `area_padrao_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `resposta` int(11) NOT NULL DEFAULT '0',
  `nome_area` varchar(255) DEFAULT NULL,
  `nome_area_padrao` varchar(255) DEFAULT NULL,
  `nome_criterio` varchar(255) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'estado do meio de verificacao',
  PRIMARY KEY (`id`),
  KEY `pk_criterio_verificacao` (`criterio_verificacao_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `sa_meio_verificacao`
--

INSERT INTO `sa_meio_verificacao` (`id`, `nome_meio_verificacao`, `criterio_verificacao_id`, `area_padrao_id`, `area_id`, `resposta`, `nome_area`, `nome_area_padrao`, `nome_criterio`, `comentario`, `estado`) VALUES
(4, 'R', 4, 1, 1, 0, 'I. Disponibilidade de cuidados pós VBG \r\n', '1. A US oferece cuidados acessíveis e gratuitos às vítimas de violência \r\n', '1.2 A US não condiciona a oferta de cuidados ao reporte á policia. \r\n', NULL, 1),
(5, 'E,R', 3, 1, 1, 0, 'I. Disponibilidade de cuidados pós VBG \r\n', '1. A US oferece cuidados acessíveis e gratuitos às vítimas de violência \r\n', '1.1 A US oferece cuidados pós violência 24 horas por dia OU apoia ao utente a ter cuidados de referência em outras US que oferecem cuidados 24 horas \r\n', NULL, 1),
(6, 'Teste4', 7, 1, 1, 0, 'I. Disponibilidade de cuidados pós VBG \r\n', '1. A US oferece cuidados acessíveis e gratuitos às vítimas de violência \r\n', '(PEÇA PARA VER AS GUIAS DE REFERÊNCIA)\r\n', NULL, 1),
(7, 'teste7', 16, 3, 2, 0, 'II. Materiais e Infraestruturas \r\n', '3. A US tem infraestruturas equipamentos e materiais adequados para providenciar cuidados pós violência (Veja detalhes na Caixa 1)\r\n', ' 3.4 A US tem um local com privacidade, limpo e confortavel para internamento de curta duração caso a vítima necessite \r\n', NULL, 1),
(8, 'Teste9', 8, 1, 1, 0, 'I. Disponibilidade de cuidados pós VBG \r\n', '1. A US oferece cuidados acessíveis e gratuitos às vítimas de violência \r\n', '1.4 A US garante privacidade durante o atendimento. \r\n', NULL, 1),
(9, 'test10', 3, 1, 1, 0, 'I. Disponibilidade de cuidados pós VBG \r\n', '1. A US oferece cuidados acessíveis e gratuitos às vítimas de violência \r\n', '1.1 A US oferece cuidados pós violência 24 horas por dia OU apoia ao utente a ter cuidados de referência em outras US que oferecem cuidados 24 horas \r\n', NULL, 1),
(10, 'teste11', 12, 2, 2, 0, 'II. Materiais e Infraestruturas \r\n', '2. A US tem materiais de IEC GBV  \r\n', '2.1 A US tem materiais IEC visíveis dirigidos aos utentes sobre VBG (e.g.,cartazes, planfletos, leis, direitos em áreas de maior circulação de utentes como por ex. corredores, farmácia, consultas etc.)\r\n', NULL, 1),
(11, 'Teste12', 13, 3, 2, 0, 'II. Materiais e Infraestruturas \r\n', '3. A US tem infraestruturas equipamentos e materiais adequados para providenciar cuidados pós violência (Veja detalhes na Caixa 1)\r\n', '3.1 A oferta de serviços VBG ocorre dentro ou perto de uns US \r\n', NULL, 1),
(12, 'Teste13', 6, 1, 1, 0, 'I. Disponibilidade de cuidados pós VBG \r\n', '1. A US oferece cuidados acessíveis e gratuitos às vítimas de violência \r\n', '1.3 A US tem todas guias de referência inclusive para polícia para que a vítima não tenha que ir a polícia para ter as guias de referência. \r\n', NULL, 1),
(13, '', 23, 4, 3, 0, 'III. Identificação Precoce de Vítimas de Violência  \r\n', '4. A US identifica precocemente utentes que tenham sido vítimas de violência \r\n', '4.3 A US realiza rastreio clinico de VBG (VPI ou VS) somente se nos  serviçostodos os seguintes requisitos estão disponiveis:\r\n', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_meio_verificacao_resposta`
--

CREATE TABLE IF NOT EXISTS `sa_meio_verificacao_resposta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_resposta` varchar(255) NOT NULL COMMENT 'nome da resposta',
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'estado da resposta',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `sa_meio_verificacao_resposta`
--

INSERT INTO `sa_meio_verificacao_resposta` (`id`, `nome_resposta`, `estado`) VALUES
(1, 'Sim', 1),
(2, 'Nao', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_pais`
--

CREATE TABLE IF NOT EXISTS `sa_pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo da provincia',
  `nome_pais` varchar(250) NOT NULL COMMENT 'nome da provincia',
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'estado da provincia',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `sa_pais`
--

INSERT INTO `sa_pais` (`id`, `nome_pais`, `estado`) VALUES
(1, 'Mozambique', 1),
(2, 'RSA', 1),
(3, 'Portugal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_provincia`
--

CREATE TABLE IF NOT EXISTS `sa_provincia` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo da provincia',
  `nome_provincia` varchar(250) NOT NULL COMMENT 'nome da provincia',
  `pais_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'estado da provincia',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `sa_provincia`
--

INSERT INTO `sa_provincia` (`id`, `nome_provincia`, `pais_id`, `estado`) VALUES
(1, 'Maputo', 1, 1),
(2, 'Gaza', 1, 1),
(3, 'Sofala', 1, 1),
(4, 'Tete', 1, 1),
(5, 'Zambezia', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_servico`
--

CREATE TABLE IF NOT EXISTS `sa_servico` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo do servico',
  `nome_servico` varchar(250) NOT NULL COMMENT 'nome do servico',
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'estado do servico',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `sa_servico`
--

INSERT INTO `sa_servico` (`id`, `nome_servico`, `estado`) VALUES
(1, 'Recurso Social', 1),
(2, 'Violencia Baseada no Genero', 1),
(3, 'Sessoes HIV', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_sub_servico`
--

CREATE TABLE IF NOT EXISTS `sa_sub_servico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_sub_servico` varchar(250) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `PK_Servico` (`servico_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `sa_sub_servico`
--

INSERT INTO `sa_sub_servico` (`id`, `nome_sub_servico`, `servico_id`, `estado`) VALUES
(1, 'Cuidados Pos Violencia', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_tipo_avaliacao`
--

CREATE TABLE IF NOT EXISTS `sa_tipo_avaliacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo do tipo de avaliaca',
  `nome_tipo_avaliacao` varchar(255) NOT NULL COMMENT 'nome do tipo de avaliacao',
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'estado do tipo de avaliacao',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `sa_tipo_avaliacao`
--

INSERT INTO `sa_tipo_avaliacao` (`id`, `nome_tipo_avaliacao`, `estado`) VALUES
(1, 'Interna', 1),
(2, 'Externa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_users`
--

CREATE TABLE IF NOT EXISTS `sa_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `previlegio` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `useremail` varchar(255) DEFAULT NULL,
  `userphone` varchar(255) DEFAULT NULL,
  `provincia_id` int(11) DEFAULT '0',
  `distrito_id` int(11) DEFAULT '0',
  `bairro_id` int(11) DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `sa_users`
--

INSERT INTO `sa_users` (`id`, `email`, `senha`, `previlegio`, `username`, `useremail`, `userphone`, `provincia_id`, `distrito_id`, `bairro_id`, `estado`) VALUES
(1, 'na', '', 0, NULL, NULL, NULL, 0, 0, 0, 1);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `sa_area_padrao`
--
ALTER TABLE `sa_area_padrao`
  ADD CONSTRAINT `fk_area` FOREIGN KEY (`area_id`) REFERENCES `sa_area` (`id`);

--
-- Filtros para la tabla `sa_avaliacao`
--
ALTER TABLE `sa_avaliacao`
  ADD CONSTRAINT `pk_instancia` FOREIGN KEY (`instancia_id`) REFERENCES `sa_instancia` (`id_I`),
  ADD CONSTRAINT `pk_tipo_avaliacao` FOREIGN KEY (`tipo_avaliacao_id`) REFERENCES `sa_tipo_avaliacao` (`id`);

--
-- Filtros para la tabla `sa_avaliacao_servico`
--
ALTER TABLE `sa_avaliacao_servico`
  ADD CONSTRAINT `pk_avaliacao` FOREIGN KEY (`avaliacao_id`) REFERENCES `sa_avaliacao` (`id_a`),
  ADD CONSTRAINT `pk_sub_servico` FOREIGN KEY (`sub_servico_id`) REFERENCES `sa_sub_servico` (`id`);

--
-- Filtros para la tabla `sa_criterio_verificacao`
--
ALTER TABLE `sa_criterio_verificacao`
  ADD CONSTRAINT `pk_area_padrao` FOREIGN KEY (`id_ar`) REFERENCES `sa_area_padrao` (`id`);

--
-- Filtros para la tabla `sa_distrito`
--
ALTER TABLE `sa_distrito`
  ADD CONSTRAINT `PK_provincia` FOREIGN KEY (`provincia_id`) REFERENCES `sa_provincia` (`id`);

--
-- Filtros para la tabla `sa_meio_verificacao`
--
ALTER TABLE `sa_meio_verificacao`
  ADD CONSTRAINT `pk_criterio_verificacao` FOREIGN KEY (`criterio_verificacao_id`) REFERENCES `sa_criterio_verificacao` (`id`);

--
-- Filtros para la tabla `sa_sub_servico`
--
ALTER TABLE `sa_sub_servico`
  ADD CONSTRAINT `PK_Servico` FOREIGN KEY (`servico_id`) REFERENCES `sa_servico` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
