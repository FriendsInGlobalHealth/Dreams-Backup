-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2019 a las 19:44:31
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vbg_sam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_area`
--

CREATE TABLE `sa_area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(250) NOT NULL,
  `area_status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_area`
--

INSERT INTO `sa_area` (`area_id`, `area_name`, `area_status`) VALUES
(21, 'V.MEDICINA LEGAL ', 'active'),
(20, 'IV. Cuidados ClÃ­nicos Centrados no Utente ', 'active'),
(19, 'III. IdentificaÃ§Ã£o Precoce de VÃ­timas de ViolÃªncia  ', 'active'),
(18, 'II. Materiais e Infraestruturas ', 'active'),
(17, 'I. Disponibilidade de cuidados pÃ³s VBG ', 'active'),
(22, 'VI. Sistema de ReferÃªncia e Seguimento da VÃ­tima ', 'active'),
(31, 'VIII. PolÃ­ticas de Cuidados de SaÃºde', 'active'),
(30, 'VII. FormaÃ§Ã£o e Melhoria de Qualidade ', 'active'),
(32, 'IX. CriaÃ§Ã£o de Demanda Para Uso de Cuidados PÃ³s ViolÃªncia ', 'active'),
(33, 'X. Reporte e Sistemas de InformaÃ§Ã£o ', 'active'),
(34, 'Teste', 'active'),
(35, 'Wila', 'active'),
(36, 'Monitorio avaliacao', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_area_padrao`
--

CREATE TABLE `sa_area_padrao` (
  `area_padrao_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `area_padrao_name` varchar(250) NOT NULL,
  `area_padrao_status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_area_padrao`
--

INSERT INTO `sa_area_padrao` (`area_padrao_id`, `area_id`, `area_padrao_name`, `area_padrao_status`) VALUES
(34, 17, '1. A US oferece cuidados acessÃ­veis e gratuitos Ã s vÃ­timas de violÃªncia ', 'active'),
(35, 18, '2. A US tem materiais de IEC GBV  ', 'active'),
(36, 18, '3. A US tem infraestruturas equipamentos e materiais adequados para providenciar cuidados pÃ³s violÃªncia (Veja detalhes na Caixa 1)', 'active'),
(37, 19, '4. A US identifica precocemente utentes que tenham sido vÃ­timas de violÃªncia ', 'active'),
(38, 19, '5. O Provedor faz perguntas sobre VPI de forma apropriada', 'active'),
(39, 19, '6. O provedor avalia o risco imediato que os utentes podem ter no momento da revelaÃ§Ã£o ', 'active'),
(40, 20, '7. O Provedor obtÃ©m consentimento informado para exame fÃ­sico ', 'active'),
(41, 20, '8. Provedor de saÃºde realiza o tratamento das lesÃµes ', 'active'),
(42, 20, '9. O provedor demostra conhecimento em aconselhamento de crise para evitar revitimizaÃ§Ã£o ', 'active'),
(43, 20, '10. O provedor pÃµe em prÃ¡tica as orientaÃ§Ãµes para atendimento Ã¡ crianÃ§as e adolescentes vÃ­timas de violÃªncia e exploraÃ§Ã£o sexual  ', 'active'),
(44, 20, '11. Provedor respeita e mantÃ©m a privacidade e confidencialidade do utente  ', 'active'),
(45, 20, '12. O provedor oferece atendimento humanizado e respeitoso para evitar revitimizaÃ§Ã£o ', 'active'),
(46, 20, '13. Provedor realiza exame das lesÃµes extragenitais e gÃ©nito-anais ', 'active'),
(47, 20, '14.A US oferece contracepÃ§Ã£o de emergÃªncia para vÃ­timas de violÃªncia sexual do sexo feminino de acordo com o protocolo  ', 'active'),
(48, 20, '15. O provedor oferece Ã¡s vÃ­timas de violÃªncia aconselhamento e testagem para HIV e profilaxia pÃ³s exposiÃ§Ã£o para HIV (PPE) dentro de 72 Horas depois da violÃªncia sexual  ', 'active'),
(49, 20, '16. O provedor oferece medicaÃ§Ãµes relevantes para prevenÃ§Ã£o ou tratamento de infecÃ§Ãµes de transmissÃ£o sexual ', 'active'),
(50, 20, '17. O provedor oferece assistÃªncia psicolÃ³gica aos utentes vÃ­timas de violÃªncia sexual ', 'active'),
(51, 21, ' 18.O provedor realiza o exame mÃ©dico-legal de acordo com as recomendaÃ§Ãµes nacionais  ', 'active'),
(52, 21, '19. O provedor colecta, armazena e / ou transporta evidÃªncias forenses de forma segura de acordo com protocolo nacional ', 'active'),
(53, 22, '20. A US tem sistema de referÃªncia para facilitar a utilizaÃ§Ã£o dos serviÃ§os necessÃ¡rios na rede de apoio Ã¡ vÃ­tima de violÃªncia  ', 'active'),
(54, 22, '21. Os provedores oferecem serviÃ§os de seguimento da vÃ­tima de violÃªncia ', 'active'),
(55, 30, '22. Todos provedores que oferecem serviÃ§os pÃ³s VBG foram treinados para exercerem seus papÃ©is e responsabilidades no cuidado com os utentes ', 'active'),
(56, 30, '23. A US tem um Sistema de melhoria continua de qualidade de cuidados pÃ³s VBG', 'active'),
(57, 31, '24. A US tem protocolos para oferecer cuidados pÃ³s violÃªncia de acordo com as recomendaÃ§Ãµes nacionais ', 'active'),
(58, 32, '25. A US apoia a divulgaÃ§Ã£o dos serviÃ§os e aumento de consciÃªncia de uso de cuidados ', 'active'),
(59, 33, '26. A US possui fichas de notificaÃ§Ã£o, livros de registo e outros instrumentos de recolha de dados dos cuidados pÃ³s VBG ', 'active'),
(60, 33, ' 27. A US tem um Sistema de avaliaÃ§Ã£o e monitoria de dados VBG ', 'active'),
(61, 33, '28. Os dados de VBG sÃ£o analisados para melhorar a prestaÃ§Ã£o de serviÃ§os oferecidos e sistemas de resposta Ã¡ VBG ', 'active'),
(62, 36, 'Verificacao dados', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_bairro`
--

CREATE TABLE `sa_bairro` (
  `bairro_id` int(11) NOT NULL,
  `bairro_name` varchar(250) NOT NULL,
  `bairro_status` enum('active','inactive') NOT NULL,
  `Latitude_N` double NOT NULL,
  `Longitude_E` double NOT NULL,
  `country_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_bairro`
--

INSERT INTO `sa_bairro` (`bairro_id`, `bairro_name`, `bairro_status`, `Latitude_N`, `Longitude_E`, `country_id`, `province_id`, `district_id`) VALUES
(1, 'fomento', 'active', 15.5, 16.3, 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_cargo`
--

CREATE TABLE `sa_cargo` (
  `cargo_id` int(11) NOT NULL,
  `cargo_name` varchar(250) NOT NULL,
  `cargo_status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_cargo`
--

INSERT INTO `sa_cargo` (`cargo_id`, `cargo_name`, `cargo_status`) VALUES
(1, 'Director do Hospital', 'active'),
(2, 'Administrador do Hospital', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_categoria`
--

CREATE TABLE `sa_categoria` (
  `categoria_id` int(11) NOT NULL,
  `categoria_name` varchar(250) NOT NULL,
  `categoria_status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_categoria`
--

INSERT INTO `sa_categoria` (`categoria_id`, `categoria_name`, `categoria_status`) VALUES
(1, 'Administrador', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_country`
--

CREATE TABLE `sa_country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(250) NOT NULL,
  `country_status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_country`
--

INSERT INTO `sa_country` (`country_id`, `country_name`, `country_status`) VALUES
(1, 'Mozambique', 'active'),
(2, 'Angola', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_criterion_verification`
--

CREATE TABLE `sa_criterion_verification` (
  `criterion_verification_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `area_padrao_id` int(11) NOT NULL,
  `criterion_verification_name` varchar(300) NOT NULL,
  `criterion_verification_description` text NOT NULL,
  `criterion_verification_control` int(11) NOT NULL,
  `product_minimum_order` double(10,2) NOT NULL,
  `criterion_verification_enter_by` int(11) NOT NULL,
  `criterion_verification_status` enum('active','inactive') NOT NULL,
  `criterion_verification_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_criterion_verification`
--

INSERT INTO `sa_criterion_verification` (`criterion_verification_id`, `area_id`, `area_padrao_id`, `criterion_verification_name`, `criterion_verification_description`, `criterion_verification_control`, `product_minimum_order`, `criterion_verification_enter_by`, `criterion_verification_status`, `criterion_verification_date`) VALUES
(38, 17, 34, '1.1 A US oferece cuidados pÃ³s violÃªncia 24 horas por dia OU apoia ao utente a ter cuidados de referÃªncia em outras US que oferecem cuidados 24 horas', '1.1 A US oferece cuidados pÃ³s violÃªncia 24 horas por dia OU apoia ao utente a ter cuidados de referÃªncia em outras US que oferecem cuidados 24 horas', 1, 0.00, 2, 'active', '2019-05-27'),
(39, 17, 34, '1.2 A US nÃ£o condiciona a oferta de cuidados ao reporte Ã¡ policia.', '1.2 A US nÃ£o condiciona a oferta de cuidados ao reporte Ã¡ policia.', 1, 0.00, 2, 'active', '2019-05-27'),
(40, 17, 34, 'Verifique na aceitaÃ§Ã£o se esta disponÃ­vel informaÃ§Ã£o sobre disponibilidade de serviÃ§os independentemente de a vÃ­tima ter uma guia da polÃ­cia. ', 'Verifique na aceitaÃ§Ã£o se esta disponÃ­vel informaÃ§Ã£o sobre disponibilidade de serviÃ§os independentemente de a vÃ­tima ter uma guia da polÃ­cia.', 1, 0.00, 2, 'active', '2019-05-27'),
(41, 17, 34, '1.3 A US tem todas guias de referÃªncia inclusive para polÃ­cia para que a vÃ­tima nÃ£o tenha que ir a polÃ­cia para ter as guias de referÃªncia. ', '1.3 A US tem todas guias de referÃªncia inclusive para polÃ­cia para que a vÃ­tima nÃ£o tenha que ir a polÃ­cia para ter as guias de referÃªncia. \r\n', 1, 0.00, 2, 'active', '2019-05-27'),
(42, 17, 34, '1.4 A US garante privacidade durante o atendimento. ', '1.4 A US garante privacidade durante o atendimento. \r\n', 1, 0.00, 2, 'active', '2019-05-27'),
(43, 17, 34, '1.5 A US oferece cuidados gratuitos para vÃ­timas de violÃªncia ', '1.5 A US oferece cuidados gratuitos para vÃ­timas de violÃªncia \r\n', 1, 0.00, 2, 'active', '2019-05-27'),
(44, 17, 34, '1.6 A US prioriza as vÃ­timas de violÃªncia sexual para garantir que estas recebam os cuidados mais rÃ¡pido possÃ­veis ', '1.6 A US prioriza as vÃ­timas de violÃªncia sexual para garantir que estas recebam os cuidados mais rÃ¡pido possÃ­veis \r\n', 1, 0.00, 2, 'active', '2019-05-27'),
(45, 17, 34, '1.7 A US tem fluxograma de atendimento que garante acesso aos cuidados que todos utentes independentemente do sexo, orientaÃ§ao sexual, raÃ§a , religiÃ£o, idade, estado marital etc.', '1.7 A US tem fluxograma de atendimento que garante acesso aos cuidados que todos utentes independentemente do sexo, orientaÃ§ao sexual, raÃ§a , religiÃ£o, idade, estado marital etc.\r\n', 1, 0.00, 2, 'active', '2019-05-27'),
(46, 18, 35, '2.1 A US tem materiais IEC visÃ­veis dirigidos aos utentes sobre VBG (e.g.,cartazes, planfletos, leis, direitos em Ã¡reas de maior circulaÃ§Ã£o de utentes como por ex. corredores, farmÃ¡cia, consultas etc.)', '2.1 A US tem materiais IEC visÃ­veis dirigidos aos utentes sobre VBG (e.g.,cartazes, planfletos, leis, direitos em Ã¡reas de maior circulaÃ§Ã£o de utentes como por ex. corredores, farmÃ¡cia, consultas etc.)\r\n', 1, 0.00, 2, 'active', '2019-05-27'),
(47, 18, 36, '3.1 A oferta de serviÃ§os VBG ocorre dentro ou perto de uns US ', '3.1 A oferta de serviÃ§os VBG ocorre dentro ou perto de uns US \r\n', 1, 0.00, 2, 'active', '2019-05-27'),
(48, 18, 36, '3.2 A US usa letreiros e sinais discretos  e fluxograma claro para aumentar o acesso, seguranÃ§a e privacidade para utentes e provedores. ', '3.2 A US usa letreiros e sinais discretos  e fluxograma claro para aumentar o acesso, seguranÃ§a e privacidade para utentes e provedores. \r\n', 1, 0.00, 2, 'active', '2019-05-27'),
(49, 18, 36, '3.3 O local de atendimento tÃªm privacidade (a vitima ou o provedor nÃ£o podem ser ouvidas ou vistas durante o atendimento), estÃ¡ limpo, ventilado e iluminado. ', '3.3 O local de atendimento tÃªm privacidade (a vitima ou o provedor nÃ£o podem ser ouvidas ou vistas durante o atendimento), estÃ¡ limpo, ventilado e iluminado. ', 1, 0.00, 5, 'active', '2019-06-04'),
(50, 18, 36, '3.4 A US tem um local com privacidade, limpo e confortavel para internamento de curta duraÃ§Ã£o caso a vÃ­tima necessite ', '3.4 A US tem um local com privacidade, limpo e confortavel para internamento de curta duraÃ§Ã£o caso a vÃ­tima necessite ', 1, 0.00, 5, 'active', '2019-06-04'),
(51, 18, 36, '3.5 A US tem equipamentos essenciais (Infraestruturas, mobiliÃ¡rio, documentos) disponÃ­veis (VEJA CAIXA 1 se algum artigo estiver em falta este critÃ©rio Ã© NÃƒO).', '3.5 A US tem equipamentos essenciais (Infraestruturas, mobiliÃ¡rio, documentos) disponÃ­veis (VEJA CAIXA 1 se algum artigo estiver em falta este critÃ©rio Ã© NÃƒO).', 1, 0.00, 5, 'active', '2019-06-04'),
(52, 18, 36, '3.6 A US tem um sistema para verificar trimestralmente se os medicamentos,vacinas e testes rÃ¡pidos estÃ£o dentro do prazo de validade e tem meios para descarga se expirados. ', '3.6 A US tem um sistema para verificar trimestralmente se os medicamentos,vacinas e testes rÃ¡pidos estÃ£o dentro do prazo de validade e tem meios para descarga se expirados. ', 1, 0.00, 5, 'active', '2019-06-04'),
(53, 18, 36, '3.7 A US integra consumÃ­veis, vacinas e testes para VBG na gestÃ£o e distribuiÃ§Ã£o de medicamentos necessÃ¡rios para responder a violÃªncia na cadeia de distribuiÃ§Ã£o de medicamentos. ', '3.7 A US integra consumÃ­veis, vacinas e testes para VBG na gestÃ£o e distribuiÃ§Ã£o de medicamentos necessÃ¡rios para responder a violÃªncia na cadeia de distribuiÃ§Ã£o de medicamentos. ', 1, 0.00, 5, 'active', '2019-06-04'),
(54, 18, 36, '3.8 A US tem para pelo menos 3 meses de stock de medicamentos e consumÃ­veis para responder a casos de violÃªncia (VEJA CAIXA 1 se algum artigo estiver em falta este critÃ©rio Ã© NÃƒO).', '3.8 A US tem para pelo menos 3 meses de stock de medicamentos e consumÃ­veis para responder a casos de violÃªncia (VEJA CAIXA 1 se algum artigo estiver em falta este critÃ©rio Ã© NÃƒO).', 1, 0.00, 5, 'active', '2019-06-04'),
(55, 19, 37, '4.1O provedor pergunta sobre violÃªncia aos utentes que tenham sinais e sintomas de violÃªncia  para VPI e/ou VS.(VEJA CAIXA 2)', '4.1O provedor pergunta sobre violÃªncia aos utentes que tenham sinais e sintomas de violÃªncia  para VPI e/ou VS.(VEJA CAIXA 2)', 1, 0.00, 5, 'active', '2019-06-04'),
(56, 19, 37, '4.2 A US tem um algoritmo de rastreio de violÃªncia para perguntar sobre VPI ou VS alinhada com as normas nacionais e da OMS ', '4.2 A US tem um algoritmo de rastreio de violÃªncia para perguntar sobre VPI ou VS alinhada com as normas nacionais e da OMS ', 1, 0.00, 5, 'active', '2019-06-04'),
(57, 19, 37, '4.3 A US realiza rastreio clinico de VBG (VPI ou VS) somente se nos  serviÃ§ostodos os seguintes requisitos estÃ£o disponiveis: â€¢	Protocolo de cuidados pÃ³s VBG em vigor â€¢	QuestionÃ¡rio com  perguntas padrao onde provedores podem documentar respostas.  â€¢	Provedores oferecem serviÃ§os imediatos', '4.3 A US realiza rastreio clinico de VBG (VPI ou VS) somente se nos  serviÃ§ostodos os seguintes requisitos estÃ£o disponiveis:\r\nâ€¢	Protocolo de cuidados pÃ³s VBG em vigor\r\nâ€¢	QuestionÃ¡rio com  perguntas padrao onde provedores podem documentar respostas. \r\nâ€¢	Provedores oferecem serviÃ§os imediatos.\r\nâ€¢	Provedores forma treinados em rastreio de VBG (VPI ou VS)\r\nâ€¢	Sala de atendimento com privacidade \r\nâ€¢	Sistema de referÃªncia para outros serviÃ§os \r\nSe estes critÃ©rios nÃ£o estiverem observados os cuidados VBG sÃ£o inadequados e nÃ£o deve ser realizado o rastreio clinico ou universal de VBG .\r\n', 0, 0.00, 5, 'active', '2019-06-04'),
(58, 19, 37, '4 Provedores realizam rastreio clinico quando assessando pacientes em outras portas de entrada apropriadas (CPN, ATS, PF, PTV, SAAJ a partir dos 15 anos etc.) se os critÃ©rios mÃ­nimos forem observados ', '4 Provedores realizam rastreio clinico quando assessando pacientes em outras portas de entrada apropriadas (CPN, ATS, PF, PTV, SAAJ a partir dos 15 anos etc.) se os critÃ©rios mÃ­nimos forem observados ', 1, 0.00, 5, 'active', '2019-06-04'),
(59, 19, 38, '5.1 O provedor nunca pergunta sobre violÃªncia quando o utente esta acompanhado pelo parceiro ou pessoas da famÃ­lia. ', '5.1 O provedor nunca pergunta sobre violÃªncia quando o utente esta acompanhado pelo parceiro ou pessoas da famÃ­lia. ', 1, 0.00, 5, 'active', '2019-06-04'),
(60, 19, 38, '5.2 O provedor aflora o tÃ³pico sobre VBG cuidadosamente fazendo colocaÃ§Ãµes gerais sobre VBG  antes de fazer perguntas directamente sobre a situaÃ§Ã£o do utente . ', '5.2 O provedor aflora o tÃ³pico sobre VBG cuidadosamente fazendo colocaÃ§Ãµes gerais sobre VBG  antes de fazer perguntas directamente sobre a situaÃ§Ã£o do utente . ', 1, 0.00, 5, 'active', '2019-06-04'),
(61, 19, 38, '5.3 O provedor nÃ£o forÃ§a o rastreio para utentes que nÃ£o querem ser rastreados  ', '5.3 O provedor nÃ£o forÃ§a o rastreio para utentes que nÃ£o querem ser rastreados  ', 1, 0.00, 5, 'active', '2019-06-04'),
(62, 19, 38, '5.4 O provedor explica ao detalhe as questÃµes que vai fazer para compor um plano de seguranÃ§a com utente ', '5.4 O provedor explica ao detalhe as questÃµes que vai fazer para compor um plano de seguranÃ§a com utente ', 1, 0.00, 5, 'active', '2019-06-04'),
(63, 19, 38, '5.5 O provedor faz perguntas directas e simples sobre violÃªncia e documenta.', '5.5 O provedor faz perguntas directas e simples sobre violÃªncia e documenta.', 1, 0.00, 5, 'active', '2019-06-04'),
(64, 19, 39, '6.1 O provedor faz perguntas simples e diretas para avaliar sinais de perigo de vida imediato    â€¢	A violÃªncia tem sido cada vez mais frequente nos Ãºltimos 6 meses? â€¢	Ele /e usou ou ameaÃ§ou uma arma? â€¢	Ele/a tentou estrangular? â€¢	Acredita que ele/a possa matar â€“ te? â€¢	Alguma vez ele /', '6.1 O provedor faz perguntas simples e diretas para avaliar sinais de perigo de vida imediato   \r\nâ€¢	A violÃªncia tem sido cada vez mais frequente nos Ãºltimos 6 meses?\r\nâ€¢	Ele /e usou ou ameaÃ§ou uma arma?\r\nâ€¢	Ele/a tentou estrangular?\r\nâ€¢	Acredita que ele/a possa matar â€“ te?\r\nâ€¢	Alguma vez ele /a bateu durante a gravidez?\r\nâ€¢	Ele /a tem comportamento violento constante?\r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(65, 19, 39, '6.2 Se o utente responde SIM a alguma das perguntas ou se o utente sÃ£o oferecidos os cuidados imediatos ', '6.2 Se o utente responde SIM a alguma das perguntas ou se o utente sÃ£o oferecidos os cuidados imediatos ', 1, 0.00, 5, 'active', '2019-06-04'),
(66, 19, 39, '6.3 O provedor apoia a fazer o plano de seguranÃ§a fazendo as questÃµes descritas abaixo: â€¢	Se tiver que sair as pressas de casa para onde iria?  â€¢	Sairia sozinha ou com os seus filhos? (Se a utente tiver filhos)  â€¢	Que documentos precisaria organizar, dinheiro levaria consigo? â€¢	Pode guarda', '6.3 O provedor apoia a fazer o plano de seguranÃ§a fazendo as questÃµes descritas abaixo:\r\nâ€¢	Se tiver que sair as pressas de casa para onde iria? \r\nâ€¢	Sairia sozinha ou com os seus filhos? (Se a utente tiver filhos) \r\nâ€¢	Que documentos precisaria organizar, dinheiro levaria consigo?\r\nâ€¢	Pode guardar pertences essenciais num local seguro caso precise sair de casa? \r\nâ€¢	Onde procuraria ajuda ou dinheiro no caso de emergÃªncia? \r\nâ€¢	HÃ¡ um vizinho a quem vocÃª ligaria para chamar a polÃ­cia se vocÃª estivesse em perigo?\r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(67, 20, 40, '7.1 O provedor obtÃ©m consetimento escrito ou verbal (assentimento e concordÃ¢ncia da crianÃ§a),   antes de realizar qualquer procedimento e explica os procedimentos ao utente e seus tutores se este for menor', '7.1 O provedor obtÃ©m consetimento escrito ou verbal (assentimento e concordÃ¢ncia da crianÃ§a),   antes de realizar qualquer procedimento e explica os procedimentos ao utente e seus tutores se este for menor', 1, 0.00, 5, 'active', '2019-06-04'),
(68, 20, 40, '7.2 O provedor obtÃ©m consentimento para realizar a testagem para HIV de acordo com as directrizes nacionais de aconselhamento e testagem 10 ', '7.2 O provedor obtÃ©m consentimento para realizar a testagem para HIV de acordo com as directrizes nacionais de aconselhamento e testagem 10 ', 1, 0.00, 5, 'active', '2019-06-04'),
(69, 20, 40, '7.3 O provedor segue as normas para obter o consentimento de menores de idade ', '7.3 O provedor segue as normas para obter o consentimento de menores de idade ', 1, 0.00, 5, 'active', '2019-06-04'),
(70, 20, 40, '7.4 O provedor nunca forÃ§a o utente a ser examinado a nÃ£o ser que o exame permita resolver uma situaÃ§Ã£o que coloque em perigo a vida do utente', '7.4 O provedor nunca forÃ§a o utente a ser examinado a nÃ£o ser que o exame permita resolver uma situaÃ§Ã£o que coloque em perigo a vida do utente\r\n\r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(71, 20, 40, '7.5 O provedor clarifica que o utente pode recusar qualquer procedimento.', '7.5 O provedor clarifica que o utente pode recusar qualquer procedimento.', 1, 0.00, 5, 'active', '2019-06-04'),
(72, 20, 40, '7.6 O provedor respeita a decisÃ£o do utente de nÃ£o reportar a polÃ­cia ', '7.6 O provedor respeita a decisÃ£o do utente de nÃ£o reportar a polÃ­cia ', 1, 0.00, 5, 'active', '2019-06-04'),
(73, 20, 40, '7.7 Se o reporte Ã¡ policia Ã¡ mandatÃ¡rio (e.g. utente menor), o provedor reporta o caso e informa aos tutores do utente a importÃ¢ncia de seguir com a referÃªncia. ', '7.7 Se o reporte Ã¡ policia Ã¡ mandatÃ¡rio (e.g. utente menor), o provedor reporta o caso e informa aos tutores do utente a importÃ¢ncia de seguir com a referÃªncia. ', 1, 0.00, 5, 'active', '2019-06-04'),
(74, 20, 40, '7.8 Os provedores de saÃºde reportam casos de violÃªncia contra crianÃ§a. ', '7.8 Os provedores de saÃºde reportam casos de violÃªncia contra crianÃ§a. ', 1, 0.00, 5, 'active', '2019-06-04'),
(75, 20, 41, '8.1 O Provedor avalia e documenta os sinais vitais da vÃ­tima (especificar sinais vitais )', '8.1 O Provedor avalia e documenta os sinais vitais da vÃ­tima (especificar sinais vitais )', 1, 0.00, 5, 'active', '2019-06-04'),
(76, 20, 41, '8.2 O provedor verifica se o utente estÃ¡ estabilizado e verifica os sinais de perigo e corrige-os imediatamente.  ', '8.2 O provedor verifica se o utente estÃ¡ estabilizado e verifica os sinais de perigo e corrige-os imediatamente.  ', 1, 0.00, 5, 'active', '2019-06-04'),
(77, 20, 41, '8.3 O provedor colhe a anamneses detalhada dos pais / ou tutores quando o utente Ã© menor ou nÃ£o pode dar consentimento  ', '8.3 O provedor colhe a anamneses detalhada dos pais / ou tutores quando o utente Ã© menor ou nÃ£o pode dar consentimento  ', 1, 0.00, 5, 'active', '2019-06-04'),
(78, 20, 41, '8.4 O provedor faz o tratamento das lesÃµes gÃ©nito-anais de acordo com o protocolo.', '8.4 O provedor faz o tratamento das lesÃµes gÃ©nito-anais de acordo com o protocolo.', 1, 0.00, 5, 'active', '2019-06-04'),
(79, 20, 41, '8.5 O provedor faz o tratamento das lesÃµes extragenitas de acordo com o protocolo de avaliaÃ§Ã£o de paciente traumatizado colhe as evidÃªncias mÃ©dico-legal:', '8.5 O provedor faz o tratamento das lesÃµes extragenitas de acordo com o protocolo de avaliaÃ§Ã£o de paciente traumatizado colhe as evidÃªncias mÃ©dico-legal:', 1, 0.00, 5, 'active', '2019-06-04'),
(80, 20, 42, '9.1 O provedor demonstra conhecimento, empatia, e habilidades de comunicaÃ§Ã£o com os pacientes:   Verifique se o provedor :  â€¢	Realiza escuta activa (escuta sem interromper, nÃ£o pressiona o paciente a falar) â€¢	Valida o que o paciente diz (i.e. da importÃ¢ncia ao o que paciente fala) â€¢	Mostra', '9.1 O provedor demonstra conhecimento, empatia, e habilidades de comunicaÃ§Ã£o com os pacientes: \r\n\r\nVerifique se o provedor : \r\nâ€¢	Realiza escuta activa (escuta sem interromper, nÃ£o pressiona o paciente a falar)\r\nâ€¢	Valida o que o paciente diz (i.e. da importÃ¢ncia ao o que paciente fala)\r\nâ€¢	Mostra compaixÃ£o e preocupaÃ§Ã£o \r\nâ€¢	NÃ£o culpa nem julga o paciente \r\nâ€¢	Fala de acordo com o grau de compreensÃ£o e nÃ­vel de entendimento do utente \r\nâ€¢	Evita usar termos tÃ©cnicos e usa linguagem simples \r\nâ€¢	Usa linguagem verbal e nÃ£o-verbal que o paciente pode entender \r\nâ€¢	Encoraja o paciente a fazer perguntas \r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(81, 20, 43, '10.1 O provedor solicita a presenÃ§a de um assistente social durante o exame ou durante a  interaÃ§Ã£o com a polÃ­cia de uma crianÃ§a/ adolescente vÃ­tima de violÃªncia', '10.1 O provedor solicita a presenÃ§a de um assistente social durante o exame ou durante a  interaÃ§Ã£o com a polÃ­cia de uma crianÃ§a/ adolescente vÃ­tima de violÃªncia', 1, 0.00, 5, 'active', '2019-06-04'),
(82, 20, 43, '10.2 O provedor mostra empatia, apoio durante o aconselhamento pÃ³s trauma e anamnese ', '10.2 O provedor mostra empatia, apoio durante o aconselhamento pÃ³s trauma e anamnese ', 1, 0.00, 5, 'active', '2019-06-04'),
(83, 20, 43, '10.3 Se o provedor suspeita de violÃªncia dentro de casa, colabora para apoiar na proteÃ§Ã£o da crianÃ§a (abrigo temporÃ¡rio ou famÃ­lia substituta)', '10.3 Se o provedor suspeita de violÃªncia dentro de casa, colabora para apoiar na proteÃ§Ã£o da crianÃ§a (abrigo temporÃ¡rio ou famÃ­lia substituta)', 1, 0.00, 5, 'active', '2019-06-04'),
(84, 20, 43, '10.4 Em caso de menores, o provedor usa tÃ©cnicas de comunicaÃ§Ã£o apropriadas para crianÃ§as. Pergunta de verificaÃ§Ã£o: Podem nomear uma tÃ©cnica de comunicaÃ§Ã£o apropriada para crianÃ§as que usa com os utentes? (Marque SIM se o provedor mencionar trÃªs ou mais exemplos descritos abaixo) â€¢	Vali', '10.4 Em caso de menores, o provedor usa tÃ©cnicas de comunicaÃ§Ã£o apropriadas para crianÃ§as.\r\nPergunta de verificaÃ§Ã£o: Podem nomear uma tÃ©cnica de comunicaÃ§Ã£o apropriada para crianÃ§as que usa com os utentes?\r\n(Marque SIM se o provedor mencionar trÃªs ou mais exemplos descritos abaixo)\r\nâ€¢	Valida a experiÃªncia da crianÃ§a e elogia â€“ a por repÃ³rter sem culpÃ¡-la \r\nâ€¢	DÃ¡ possibilidade a crianÃ§a de fazer escolhas (Esta tÃ©cnica ajuda a crianÃ§a a recuperar o controlo e sentir-se empoderada . \r\nâ€¢	Faz uma pergunta de cada vez.\r\nâ€¢	Evita perguntas directas (Ex. Ao invÃ©s de perguntar â€œEle/a tocou-te nos genitais?â€ pode perguntar (â€œOnde ele/a te tocou?)\r\nâ€¢	Evita fazer muitas perguntas ou perguntas fechadas isto pode confundir a crianÃ§a e fazer com que esta forneÃ§a informaÃ§Ãµes erradas ou contraditÃ³rias (Ex. Ao invÃ©s de perguntar â€œQuem fez isso foi uma pessoa foi um estranho, um vizinho, familiar ou colega de escola?)\r\nâ€¢	Evita perguntar a crianÃ§a abaixo de 10 anos sobre quando ocorreu o episÃ³dio de violÃªncia pois estes nÃ£o tÃªm noÃ§Ã£o do tempo. \r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(85, 20, 43, '10.5 O provedor permite que a crianÃ§a se faÃ§a acompanhar por um tutor ou pelos pais durante o exame fÃ­sico. (Desde que nÃ£o sejam perpetradores ) ', '10.5 O provedor permite que a crianÃ§a se faÃ§a acompanhar por um tutor ou pelos pais durante o exame fÃ­sico. (Desde que nÃ£o sejam perpetradores ) ', 1, 0.00, 5, 'active', '2019-06-04'),
(86, 20, 43, '10.6 O provedor nÃ£o usa espÃ©culo durante o exame gÃ©nito â€“ anal a nÃ£o ser para reparar lesÃµes no canal vaginal sob anestesia adequada para cada caso', '10.6 O provedor nÃ£o usa espÃ©culo durante o exame gÃ©nito â€“ anal a nÃ£o ser para reparar lesÃµes no canal vaginal sob anestesia adequada para cada caso', 1, 0.00, 5, 'active', '2019-06-04'),
(87, 20, 43, '10.7 A US usa bonecas/os, papel, lÃ¡pis apropriados para facilitar a anamnese em crianÃ§as ', '10.7 A US usa bonecas/os, papel, lÃ¡pis apropriados para facilitar a anamnese em crianÃ§as ', 1, 0.00, 5, 'active', '2019-06-04'),
(88, 20, 44, '11.1O provedor nÃ£o partilha informaÃ§Ãµes relacionadas com o caso com pessoas que nÃ£o estÃ£o envolvidas no tratamento do paciente. ', '11.1O provedor nÃ£o partilha informaÃ§Ãµes relacionadas com o caso com pessoas que nÃ£o estÃ£o envolvidas no tratamento do paciente. ', 1, 0.00, 5, 'active', '2019-06-04'),
(89, 20, 44, '11.2 O Provedor permite que apenas pessoal autorizado esteja presente na sala de consulta durante o atendimento. ', '11.2 O Provedor permite que apenas pessoal autorizado esteja presente na sala de consulta durante o atendimento. ', 1, 0.00, 5, 'active', '2019-06-04'),
(90, 20, 44, '11.3 O provedor oferece um local adequado com privacidade e tempo para o paciente despir-se e vestir-se para realizar exame fÃ­sico.', '11.3 O provedor oferece um local adequado com privacidade e tempo para o paciente despir-se e vestir-se para realizar exame fÃ­sico.', 1, 0.00, 5, 'active', '2019-06-04'),
(91, 20, 44, '11.4 A US mantÃ©m os registos mÃ©dicos legais, evidÃªncias e outros documentos relevantes com identificadores pessoais (Nome, endereÃ§o etc.) num cacifo fechado Ã¡ chave de acordo com recomendaÃ§Ãµes nacionais.', '11.4 A US mantÃ©m os registos mÃ©dicos legais, evidÃªncias e outros documentos relevantes com identificadores pessoais (Nome, endereÃ§o etc.) num cacifo fechado Ã¡ chave de acordo com recomendaÃ§Ãµes nacionais.', 1, 0.00, 5, 'active', '2019-06-04'),
(92, 20, 44, '11.5 A US possui as polÃ­ticas nacionais que orientam o acesso aos registos mÃ©dico legal e forenses ', '11.5 A US possui as polÃ­ticas nacionais que orientam o acesso aos registos mÃ©dico legal e forenses ', 1, 0.00, 5, 'active', '2019-06-04'),
(93, 20, 45, '12.1 O provedor controla a dor durante o exame fÃ­sico de acordo com o protocolo.', '12.1 O provedor controla a dor durante o exame fÃ­sico de acordo com o protocolo.', 1, 0.00, 5, 'active', '2019-06-04'),
(94, 20, 45, '12.2 Provedor oferece medicaÃ§Ã£o para alÃ­vio da dor quando necessÃ¡rio.', '12.2 Provedor oferece medicaÃ§Ã£o para alÃ­vio da dor quando necessÃ¡rio.', 1, 0.00, 5, 'active', '2019-06-04'),
(95, 20, 45, '12.3 O provedor mantÃ©m o corpo do utente coberto com lenÃ§Ã³is ou pijama para evitar exposiÃ§Ã£o desnecessÃ¡ria e revitimizaÃ§Ã£o.', '12.3 O provedor mantÃ©m o corpo do utente coberto com lenÃ§Ã³is ou pijama para evitar exposiÃ§Ã£o desnecessÃ¡ria e revitimizaÃ§Ã£o.', 1, 0.00, 5, 'active', '2019-06-04'),
(96, 20, 45, '12.4 A US oferece ao utente a possibilidade de escolher  sexo do provedor que vai realizar o exame fÃ­sico .', '12.4 A US oferece ao utente a possibilidade de escolher  sexo do provedor que vai realizar o exame fÃ­sico .', 1, 0.00, 5, 'active', '2019-06-04'),
(97, 20, 45, '12.5 A US oferece uma refeiÃ§Ã£o simples apÃ³s exame fÃ­sico', '12.5 A US oferece uma refeiÃ§Ã£o simples apÃ³s exame fÃ­sico', 1, 0.00, 5, 'active', '2019-06-04'),
(98, 20, 46, '13.1 Provedor regista na ficha de primeira intenÃ§Ã£o todos achados do exame fÃ­sico e tratamentos realizados de forma detalhada e documentada na ficha de notificaÃ§Ã£o ou diÃ¡rio clÃ­nico e na ficha de primeira intenÃ§Ã£o ', '13.1 Provedor regista na ficha de primeira intenÃ§Ã£o todos achados do exame fÃ­sico e tratamentos realizados de forma detalhada e documentada na ficha de notificaÃ§Ã£o ou diÃ¡rio clÃ­nico e na ficha de primeira intenÃ§Ã£o ', 1, 0.00, 5, 'active', '2019-06-04'),
(99, 20, 46, '13.2 O provedor usa espÃ©culo apenas quando apropriado e sÃ³ quando estÃ¡ formado para tal.   Pergunta de verificaÃ§Ã£o: Quando vocÃª usaria um  espÃ©culo?  Probe: Em que condiÃ§Ãµes acha que o uso do espÃ©culo Ã© apropriado? Exemplos de uso inapropriado de espÃ©culos   â€¢	Em crianÃ§as a nÃ£o ser q', '13.2 O provedor usa espÃ©culo apenas quando apropriado e sÃ³ quando estÃ¡ formado para tal. \r\n\r\nPergunta de verificaÃ§Ã£o: Quando vocÃª usaria um  espÃ©culo? \r\nProbe: Em que condiÃ§Ãµes acha que o uso do espÃ©culo Ã© apropriado?\r\nExemplos de uso inapropriado de espÃ©culos  \r\nâ€¢	Em crianÃ§as a nÃ£o ser quando suspeita de uma lesÃ£o no canal vaginal com sangramento numa crianÃ§a.\r\nâ€¢	Quando nÃ£o tem indicaÃ§Ã£o clÃ­nica \r\nâ€¢	Quando o paciente recusa \r\nâ€¢	Quando o provedor nÃ£o foi formado para usar o espÃ©culo\r\nâ€¢	Se o paciente tiver mais de 20 semanas de gravidez ou se tiver sangramento \r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(100, 20, 46, '13.3 Se o p paciente tiver sido estrangulado o provedor pede para este retornar a US se sentir subitamente: dificuldade respiratÃ³ria, alteraÃ§Ã£o do timbre da voz, estresse respiratÃ³rio atÃ© 72 H depois da violÃªncia   Probe: Se o utente tiver sido estrangulado hÃ¡ alguma recomendaÃ§Ã£o que daria ', '13.3 Se o p paciente tiver sido estrangulado o provedor pede para este retornar a US se sentir subitamente: dificuldade respiratÃ³ria, alteraÃ§Ã£o do timbre da voz, estresse respiratÃ³rio atÃ© 72 H depois da violÃªncia \r\n Probe: Se o utente tiver sido estrangulado hÃ¡ alguma recomendaÃ§Ã£o que daria a ele? Porque?\r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(101, 20, 46, '13.4 O provedor de saÃºde usa o anoscÃ³pio para exame anal se a vÃ­tima tiver sangramento anal abundante, ou refere para unidade sanitÃ¡ria com capacidade cirÃºrgica.', '13.4 O provedor de saÃºde usa o anoscÃ³pio para exame anal se a vÃ­tima tiver sangramento anal abundante, ou refere para unidade sanitÃ¡ria com capacidade cirÃºrgica.', 1, 0.00, 5, 'active', '2019-06-04'),
(102, 20, 47, '14.1 O provedor oferece medicamentos orais para contracepÃ§Ã£o de emergÃªncia (CE) dentro de 120 horas (5 dias) a pÃ³s o contacto sexual. ', '14.1 O provedor oferece medicamentos orais para contracepÃ§Ã£o de emergÃªncia (CE) dentro de 120 horas (5 dias) a pÃ³s o contacto sexual. ', 1, 0.00, 5, 'active', '2019-06-04'),
(103, 20, 47, '14.2 Se CE oral nÃ£o estiver disponÃ­vel ou se houver alguma contraindicaÃ§Ã£o, um provedor treinado pode inserir dispositivo intrauterino (DIU) sempre que o utente optar com contracepÃ§Ã£o de longa duraÃ§Ã£o  Pergunta de VerificaÃ§Ã£o: Se CE por via oral nÃ£o estiver disponÃ­vel, pode inserir um DI', '14.2 Se CE oral nÃ£o estiver disponÃ­vel ou se houver alguma contraindicaÃ§Ã£o, um provedor treinado pode inserir dispositivo intrauterino (DIU) sempre que o utente optar com contracepÃ§Ã£o de longa duraÃ§Ã£o \r\nPergunta de VerificaÃ§Ã£o: Se CE por via oral nÃ£o estiver disponÃ­vel, pode inserir um DIU?  \r\nProbe 1: (Se a resposta do provedor for SIM) VocÃª foi treinado para inserir DIU?\r\nProbe 2: (Se a resposta do provedor for SIM) O VocÃª confirma com a utente primeiro se esta deseja fazer contracepÃ§Ã£o de longa duraÃ§Ã£o antes de inserir o DIU?\r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(104, 20, 47, '14.3 Se o utente desejar contracepÃ§Ã£o de longa duraÃ§Ã£o com DIU o provedor treinado insere o DIU em 120 horas (5 dias) depois do contacto sexual  ', '14.3 Se o utente desejar contracepÃ§Ã£o de longa duraÃ§Ã£o com DIU o provedor treinado insere o DIU em 120 horas (5 dias) depois do contacto sexual  ', 1, 0.00, 5, 'active', '2019-06-04'),
(105, 20, 47, '14.4 Se o utente recusa contracepÃ§Ã£o de emergÃªncia (CE), o provedor oferece informaÃ§Ã£o sobre importÃ¢ncia de contracepÃ§Ã£o e seguimento para realizar teste de gravidez. ', '14.4 Se o utente recusa contracepÃ§Ã£o de emergÃªncia (CE), o provedor oferece informaÃ§Ã£o sobre importÃ¢ncia de contracepÃ§Ã£o e seguimento para realizar teste de gravidez. ', 1, 0.00, 5, 'active', '2019-06-04'),
(106, 20, 48, '15.1 O provedor oferece aconselhamento e testagem para HIV para vÃ­timas de violÃªncia sexual de acordo com os protocolos nacionais ', '15.1 O provedor oferece aconselhamento e testagem para HIV para vÃ­timas de violÃªncia sexual de acordo com os protocolos nacionais ', 1, 0.00, 5, 'active', '2019-06-04'),
(107, 20, 48, '15.2 Se o teste do HIV for negativo e nÃ£o tiverem passado 72H apÃ³s a ocorrÃªncia de violÃªncia sexual, o provedor informa ao utente sobre o factores de risco para infecÃ§Ã£o pelo HIV e determina com o utente se este necessita iniciar PPE.  Pergunta de verificaÃ§Ã£o: Se o utente for HIV negativo qu', '15.2 Se o teste do HIV for negativo e nÃ£o tiverem passado 72H apÃ³s a ocorrÃªncia de violÃªncia sexual, o provedor informa ao utente sobre o factores de risco para infecÃ§Ã£o pelo HIV e determina com o utente se este necessita iniciar PPE. \r\nPergunta de verificaÃ§Ã£o: Se o utente for HIV negativo que informaÃ§Ãµes vocÃª forneceria ao utente?\r\n(Se o provedor responder SIM a um ou mais factores de risco discutidos com os utentes)\r\nâ€¢	A natureza da violÃªncia sexual (Que orifÃ­cios foram penetrados, se ouve ou nÃ£o lesÃ£o anal ou genital etc.) \r\nâ€¢	NÃºmero de perpetradores \r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(108, 20, 48, '15.3 Se o utente for HIV negativo e a violÃªncia sexual tiver ocorrido dentro de 72H o provedor oferece o a dose comple de PPE para 28 dias de acordo com as recomendaÃ§Ãµes nacionais Ex. o provedor da a dose completa de PPE para o utente nÃ£o ter que voltar ou interromper PPE)', '15.3 Se o utente for HIV negativo e a violÃªncia sexual tiver ocorrido dentro de 72H o provedor oferece o a dose comple de PPE para 28 dias de acordo com as recomendaÃ§Ãµes nacionais Ex. o provedor da a dose completa de PPE para o utente nÃ£o ter que voltar ou interromper PPE)', 1, 0.00, 5, 'active', '2019-06-04'),
(109, 20, 48, '15.4 Se o utente Ã© uma crianÃ§a e o teste para HIV for negativo e a ocorrÃªncia de violÃªncia sexual for dentro das 72H o provedor oferece o a dose complete pediÃ¡trica de acordo com os protocolos nacionais ', '15.4 Se o utente Ã© uma crianÃ§a e o teste para HIV for negativo e a ocorrÃªncia de violÃªncia sexual for dentro das 72H o provedor oferece o a dose complete pediÃ¡trica de acordo com os protocolos nacionais ', 1, 0.00, 5, 'active', '2019-06-04'),
(110, 20, 48, '15.5 Se PPE for for administrado, o provedor aconselha sobre efeitos colaterais, importÃ¢ncia da adesÃ£o e de completar o ciclo completo de PPE para garantir que a PPE seja efectiva na reduÃ§Ã£o do risco de transmissÃ£o do HIV ', '15.5 Se PPE for for administrado, o provedor aconselha sobre efeitos colaterais, importÃ¢ncia da adesÃ£o e de completar o ciclo completo de PPE para garantir que a PPE seja efectiva na reduÃ§Ã£o do risco de transmissÃ£o do HIV ', 1, 0.00, 5, 'active', '2019-06-04'),
(111, 20, 48, '15.6 A US possui um sistema de seguimento de utentes fazem PPE e documenta se os utentes terminam o regime de PPE ', '15.6 A US possui um sistema de seguimento de utentes fazem PPE e documenta se os utentes terminam o regime de PPE ', 1, 0.00, 5, 'active', '2019-06-04'),
(112, 20, 48, '15.7 Se o utente for HIV positivo, Ã© referido para os serviÃ§os TARV.  Pergunta de VerificaÃ§Ã£o: Se o utente for HIV positivo para onde refere? ', '15.7 Se o utente for HIV positivo, Ã© referido para os serviÃ§os TARV. \r\nPergunta de VerificaÃ§Ã£o: Se o utente for HIV positivo para onde refere? \r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(113, 20, 48, '15.8 Se o utente recusa fazer teste para HIV ou tem o ser estado desconhecido e se a ocorrÃªncia de violÃªncia foi a menos de 72 Horas, o provedor oferece PPE e encoraja o utente a regressar para aconselhamento e testagem para HIV ', '15.8 Se o utente recusa fazer teste para HIV ou tem o ser estado desconhecido e se a ocorrÃªncia de violÃªncia foi a menos de 72 Horas, o provedor oferece PPE e encoraja o utente a regressar para aconselhamento e testagem para HIV ', 1, 0.00, 5, 'active', '2019-06-04'),
(114, 20, 49, '16.1 O provedor oferece a profilaxia ou tratamento para ITS de acordo com as normas nacionais ', '16.1 O provedor oferece a profilaxia ou tratamento para ITS de acordo com as normas nacionais ', 1, 0.00, 5, 'active', '2019-06-04'),
(115, 20, 49, '16.2 Provedor oferece vacinaÃ§Ã£o antitetÃ¢nica de acordo com o protocolo nacional.  ', '16.2 Provedor oferece vacinaÃ§Ã£o antitetÃ¢nica de acordo com o protocolo nacional.  ', 1, 0.00, 5, 'active', '2019-06-04'),
(116, 20, 49, '16.3 O provedor oferece a vacinaÃ§Ã£o para Hepatite B dentro de 24 horas apÃ³s a ocorrÃªncia de violÃªncia sexual de acordo com a elegibilidade do utente de acordo com as recomendaÃ§Ãµes nacionais.  (Se a vacinaÃ§Ã£o para hepatite B nÃ£o estÃ¡ disponÃ­vel escreva â€œN/Aâ€ nos comentÃ¡rios e nÃ£o co', '16.3 O provedor oferece a vacinaÃ§Ã£o para Hepatite B dentro de 24 horas apÃ³s a ocorrÃªncia de violÃªncia sexual de acordo com a elegibilidade do utente de acordo com as recomendaÃ§Ãµes nacionais. \r\n(Se a vacinaÃ§Ã£o para hepatite B nÃ£o estÃ¡ disponÃ­vel escreva â€œN/Aâ€ nos comentÃ¡rios e nÃ£o conte o padrÃ£o)\r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(117, 20, 50, '17.1 O provedor oferece aconselhamento pÃ³s trauma : escuta activamente, Ã© empÃ¡tico , parafraseia, e identifica necessidades de apoio social ', '17.1 O provedor oferece aconselhamento pÃ³s trauma : escuta activamente, Ã© empÃ¡tico , parafraseia, e identifica necessidades de apoio social ', 1, 0.00, 5, 'active', '2019-06-04'),
(118, 20, 50, '17.2 Provedores tÃªm conhecimento sobre serviÃ§os de saÃºde mental a serem oferecidos de acordo com as recomendaÃ§Ãµes nacionais or OMS . ', '17.2 Provedores tÃªm conhecimento sobre serviÃ§os de saÃºde mental a serem oferecidos de acordo com as recomendaÃ§Ãµes nacionais or OMS . ', 1, 0.00, 5, 'active', '2019-06-04'),
(119, 20, 50, '17.3 Provedor oferece referÃªncias para seguimento psicolÃ³gico de longo termo OU atravÃ©s dos grupos de apoio ', '17.3 Provedor oferece referÃªncias para seguimento psicolÃ³gico de longo termo OU atravÃ©s dos grupos de apoio ', 1, 0.00, 5, 'active', '2019-06-04'),
(120, 21, 51, '18.1 O provedor realiza avaliaÃ§Ã£o mÃ©dico-legal e coleta evidencias se as seguintes condiÃ§Ãµes estÃ£o criadas:  â€¢	O provedor recebeu treinamento especÃ­fico para avaliaÃ§Ã£o mÃ©dico-legal   . â€¢	A US tem um programa de supervisÃ£o funcional que inclui --pÃ³s treinamento. â€¢	Existem recomendaÃ', '18.1 O provedor realiza avaliaÃ§Ã£o mÃ©dico-legal e coleta evidencias se as seguintes condiÃ§Ãµes estÃ£o criadas: \r\nâ€¢	O provedor recebeu treinamento especÃ­fico para avaliaÃ§Ã£o mÃ©dico-legal   .\r\nâ€¢	A US tem um programa de supervisÃ£o funcional que inclui --pÃ³s treinamento.\r\nâ€¢	Existem recomendaÃ§Ãµes nacionais para assistÃªncia mÃ©dica legal e coordenaÃ§Ã£o com outros intervenientes  \r\nâ€¢	Existe cadeia de evidÃªncias funcional \r\nSe algum destes requisitos nÃ£o tiver sido observado, a atenÃ§Ã£o mÃ©dico-legal Ã© considerada inadequada e os provedores nÃ£o devem realizar exame mÃ©dico-legal. \r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(121, 21, 51, '18.2 O provedor que foi treinado para realizar a avaliaÃ§Ã£o mÃ©dico-legal colhe a histÃ³ria do paciente ou tutor acordo com as recomendaÃ§Ãµes nacionais ', '18.2 O provedor que foi treinado para realizar a avaliaÃ§Ã£o mÃ©dico-legal colhe a histÃ³ria do paciente ou tutor acordo com as recomendaÃ§Ãµes nacionais ', 1, 0.00, 5, 'active', '2019-06-04'),
(122, 21, 51, '18.3 O provedor treinado colhe as evidÃªncias forenses e documenta de forma apropriada as lesÃµes dentro de 5 dias depois da ocorrÃªncia de violÃªncia sexual ou a qualquer momento da ---de  violÃªncia baseada na histÃ³ria fornecida pelo utente que incluem: â€¢	Zaragatoa vaginal, perianal, anal ou or', '18.3 O provedor treinado colhe as evidÃªncias forenses e documenta de forma apropriada as lesÃµes dentro de 5 dias depois da ocorrÃªncia de violÃªncia sexual ou a qualquer momento da ---de  violÃªncia baseada na histÃ³ria fornecida pelo utente que incluem:\r\nâ€¢	Zaragatoa vaginal, perianal, anal ou oral (de acordo com a histÃ³ria).\r\nâ€¢	Colher a zaragatoa de controlo para poder comparar com a zaragatoa com evidÃªncia (Se assim for indicado)\r\nâ€¢	Colher amostras do leito ungueal (Se estiver indicado)\r\nâ€¢	Testar a roupa interior para presenÃ§a de sÃ©men ou fluidos orgÃ¢nicos, pele, cabelo ou objectos como zippers entre outros  \r\nâ€¢	Recolher pelos pÃºbicos que estejam na roupa da vÃ­tima \r\nâ€¢	Avaliar a presenÃ§a de vestÃ­gios do local de facto na roupa ou na pele da vÃ­tima (Relva, areia etc.)\r\nâ€¢	Colher zaragatoas hÃºmidas no corpo da vÃ­tima (e.g., onde o perpetrador possa ter mordido, beijado ou ejaculado de acordo com histÃ³ria)\r\nâ€¢	Colher evidÃªncia usando fonte de luz alternativa que reconhece vestÃ­gios de lÃ­quidos e tecidos humanos (SÃ©men, urina e saliva)\r\nâ€¢	Realizar foto documentaÃ§Ã£o forense de lesÃµes  \r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(123, 21, 52, '19.1 O provedor estÃ¡ consciente sobre a importÃ¢ncia das evidÃªncias forenses para julgamento dos casos.', '19.1 O provedor estÃ¡ consciente sobre a importÃ¢ncia das evidÃªncias forenses para julgamento dos casos.', 1, 0.00, 5, 'active', '2019-06-04'),
(124, 21, 52, '19.2 Os provedores usam um protocolo estandarizado para colher, selar e armazenar evidÃªncias forenses ', '19.2 Os provedores usam um protocolo estandarizado para colher, selar e armazenar evidÃªncias forenses ', 1, 0.00, 5, 'active', '2019-06-04'),
(125, 21, 52, '19.3 Os provedores estÃ£o alerta a sinais mais frequentes de laceraÃ§Ãµes, eritemas que indicam violÃªncia . ', '19.3 Os provedores estÃ£o alerta a sinais mais frequentes de laceraÃ§Ãµes, eritemas que indicam violÃªncia . ', 1, 0.00, 5, 'active', '2019-06-04'),
(126, 21, 52, '19.4 Provedor faz questÃµes para clarificar e entender as lesÃµes observadas que nÃ£o condizem com a histÃ³ria clÃ­nica ', '19.4 Provedor faz questÃµes para clarificar e entender as lesÃµes observadas que nÃ£o condizem com a histÃ³ria clÃ­nica ', 1, 0.00, 5, 'active', '2019-06-04'),
(127, 21, 52, '19.5 O provedor usa equipamento de proteÃ§Ã£o individual (barrete, mascara cirÃºrgica, luvas, avental, sapatos fechados) quando realiza o exame mÃ©dico-legal.', '19.5 O provedor usa equipamento de proteÃ§Ã£o individual (barrete, mascara cirÃºrgica, luvas, avental, sapatos fechados) quando realiza o exame mÃ©dico-legal.', 1, 0.00, 5, 'active', '2019-06-04'),
(128, 21, 52, '19.6 O provedor colhe evidÃªncias forenses para violÃªncia sexual dentro de 5 dias.', '19.6 O provedor colhe evidÃªncias forenses para violÃªncia sexual dentro de 5 dias.', 1, 0.00, 5, 'active', '2019-06-04'),
(129, 21, 52, '19.7 O provedor realiza a colecta de amostras forenses de acordo com as recomendaÃ§Ãµes nacionais (Guia de atendimento Ã¡ vÃ­tima de violÃªncia e ficha de primeira intenÃ§Ã£o)  ', '19.7 O provedor realiza a colecta de amostras forenses de acordo com as recomendaÃ§Ãµes nacionais (Guia de atendimento Ã¡ vÃ­tima de violÃªncia e ficha de primeira intenÃ§Ã£o)  ', 1, 0.00, 5, 'active', '2019-06-04'),
(130, 21, 52, '19.8 O provedor mantem a cadeia de custÃ³dia  para seguranÃ§a, colecta, armazenamento e transporte de evidÃªncias e foto documentaÃ§Ã£o.', '19.8 O provedor mantem a cadeia de custÃ³dia  para seguranÃ§a, colecta, armazenamento e transporte de evidÃªncias e foto documentaÃ§Ã£o.', 1, 0.00, 5, 'active', '2019-06-04'),
(131, 21, 52, '19.9 A Unidade SanitÃ¡ria tem sistema para minimizar o nÃºmero de pessoas que maneja a cadeia de custÃ³dia.', '19.9 A Unidade SanitÃ¡ria tem sistema para minimizar o nÃºmero de pessoas que maneja a cadeia de custÃ³dia.', 1, 0.00, 5, 'active', '2019-06-04'),
(132, 21, 52, '19.10 A US tem recursos disponÃ­veis para apoiar e capacitar  o provedor para testemunhar em tribunal caso seja solicitado ', '19.10 A US tem recursos disponÃ­veis para apoiar e capacitar  o provedor para testemunhar em tribunal caso seja solicitado ', 1, 0.00, 5, 'active', '2019-06-04'),
(133, 21, 52, '19.11 Se o utente da o consentimento, o provedor fornece foto documentaÃ§Ã£o das lesÃµes exolicando que as fotos sÃ£o confidenciais para que o paciente tenha o cuidado clinico adequado para o uso no tribunal como prova.   (NOTA : O uso de telefones celulares pessoais nÃ£o Ã© recomendado por questÃµe', '19.11 Se o utente da o consentimento, o provedor fornece foto documentaÃ§Ã£o das lesÃµes exolicando que as fotos sÃ£o confidenciais para que o paciente tenha o cuidado clinico adequado para o uso no tribunal como prova.  \r\n(NOTA : O uso de telefones celulares pessoais nÃ£o Ã© recomendado por questÃµes de seguranÃ§a e privacidade)\r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(134, 22, 53, '20.1 O provedor informa ao utente sobre a disponibilidade de serviÃ§os e faz as referÃªncias escritas para os serviÃ§os relevantes para seguimento da vÃ­tima. (Incluindo serviÃ§os baseados na comunidade):  Meios de verificaÃ§Ã£o: Se a vÃ­tima de violÃªncia precisa de apoio para alÃ©m daquele que jÃ¡', '20.1 O provedor informa ao utente sobre a disponibilidade de serviÃ§os e faz as referÃªncias escritas para os serviÃ§os relevantes para seguimento da vÃ­tima. (Incluindo serviÃ§os baseados na comunidade): \r\nMeios de verificaÃ§Ã£o: Se a vÃ­tima de violÃªncia precisa de apoio para alÃ©m daquele que jÃ¡ recebeu na US que outras referÃªncias vocÃª realiza?\r\nOs exemplos podem :\r\nâ€¢	Policia/ apoio juridico\r\nâ€¢	Abrigo temporÃ¡rio \r\nâ€¢	Aconselhamento legal \r\nâ€¢	Apoio psicossocial de longo termo ( Individual, grupo de apoio, terapia cognitiva e comportamental, etc.)\r\nâ€¢	ProtecÃ§Ã£o da crianÃ§a (se necessÃ¡rio ou requerido por lei)\r\nâ€¢	Empoderamento econÃ³mico / ServiÃ§os domiciliÃ¡rios s\r\nâ€¢	Aborto seguro de acordo com as leis nacionais \r\nâ€¢	Cuidados mÃ©dicos de seguimento (se necessÃ¡rio)\r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(135, 22, 53, '20.2 Se a US nÃ£o tem um laboratÃ³rio o provedor refere para uma US com capacidade laboratorial  Se a US nÃ£o tem laboratÃ³rio, marque N/A no comentÃ¡rio e nÃ£o coloque #', '20.2 Se a US nÃ£o tem um laboratÃ³rio o provedor refere para uma US com capacidade laboratorial \r\nSe a US nÃ£o tem laboratÃ³rio, marque N/A no comentÃ¡rio e nÃ£o coloque #\r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(136, 22, 53, '20.3 A US tem guias de referÃªncia e contra referencia  para documentar as referÃªncias realizadas ', '20.3 A US tem guias de referÃªncia e contra referencia  para documentar as referÃªncias realizadas ', 1, 0.00, 5, 'active', '2019-06-04'),
(137, 22, 53, '20.4 A US informa os actores chave (policia, organizaÃ§Ãµes comunitÃ¡rias etc.) acerca dos serviÃ§os que esta oferece e horÃ¡rio de funcionamento e informa que as vÃ­timas sÃ£o bem-vindas mesmo sem referÃªncia da polÃ­cia ou que precisam ter seguimento jurÃ­dico - legal. ', '20.4 A US informa os actores chave (policia, organizaÃ§Ãµes comunitÃ¡rias etc.) acerca dos serviÃ§os que esta oferece e horÃ¡rio de funcionamento e informa que as vÃ­timas sÃ£o bem-vindas mesmo sem referÃªncia da polÃ­cia ou que precisam ter seguimento jurÃ­dico - legal. ', 1, 0.00, 5, 'active', '2019-06-04'),
(138, 22, 53, '20.5 A US tem uma lista de serviÃ§os de apoio que tenham sido mapeados a nÃ­vel local/ distrital /provincial ', '20.5 A US tem uma lista de serviÃ§os de apoio que tenham sido mapeados a nÃ­vel local/ distrital /provincial ', 1, 0.00, 5, 'active', '2019-06-04'),
(139, 22, 53, '20.6 A US actualiza a lista de referÃªncias pelo menos uma (1) vez por ano ligando para os nÃºmeros das listas ou visitando os locais de referÃªncia para confirmar a sua viabilidade', '20.6 A US actualiza a lista de referÃªncias pelo menos uma (1) vez por ano ligando para os nÃºmeros das listas ou visitando os locais de referÃªncia para confirmar a sua viabilidade', 1, 0.00, 5, 'active', '2019-06-04'),
(140, 22, 54, '21.1 O provedor fornece maior informaÃ§Ã£o possÃ­vel para todas referÃªncias necessÃ¡rias para o utente na visita inicial ', '21.1 O provedor fornece maior informaÃ§Ã£o possÃ­vel para todas referÃªncias necessÃ¡rias para o utente na visita inicial ', 1, 0.00, 5, 'active', '2019-06-04'),
(141, 22, 54, '21.2 A US tem serviÃ§os de seguimento do utente vÃ­tima de violÃªncia. ', '21.2 A US tem serviÃ§os de seguimento do utente vÃ­tima de violÃªncia. ', 1, 0.00, 5, 'active', '2019-06-04'),
(142, 22, 54, '21.3 O provedor responsÃ¡vel pelo seguimento do utente monitora a condiÃ§Ã£o clinica, tratamento e profilaxia pÃ³s exposiÃ§Ã£o, contracepÃ§Ã£o de emergÃªncia testagem em HIV e oferece aconselhamento de seguimento de acordo com as necessidades do utente. ', '21.3 O provedor responsÃ¡vel pelo seguimento do utente monitora a condiÃ§Ã£o clinica, tratamento e profilaxia pÃ³s exposiÃ§Ã£o, contracepÃ§Ã£o de emergÃªncia testagem em HIV e oferece aconselhamento de seguimento de acordo com as necessidades do utente. ', 1, 0.00, 5, 'active', '2019-06-04'),
(143, 22, 54, '21.4 O provedor pede consentimento para seguimento via telefone ou por SMS e documenta o nÃºmero no processo clinico de forma privada. ', '21.4 O provedor pede consentimento para seguimento via telefone ou por SMS e documenta o nÃºmero no processo clinico de forma privada. ', 1, 0.00, 5, 'active', '2019-06-04'),
(144, 22, 54, '21.5 A US tem disponÃ­vel telefone ou crÃ©dito para contactos telefÃ³nicos para seguimento de pacientes que ofereÃ§am consentimento ', '21.5 A US tem disponÃ­vel telefone ou crÃ©dito para contactos telefÃ³nicos para seguimento de pacientes que ofereÃ§am consentimento ', 1, 0.00, 5, 'active', '2019-06-04'),
(145, 22, 54, '21.6 A  US tem ponto focal para apoiar a coordenaÃ§Ã£o e referÃªncias na rede multisectorial  ', '21.6 A  US tem ponto focal para apoiar a coordenaÃ§Ã£o e referÃªncias na rede multisectorial  ', 1, 0.00, 5, 'active', '2019-06-04'),
(146, 22, 54, '21.7 O provedor ou ponto focal realiza o seguimento do utente de acordo com as recomendaÃ§Ãµes nacionais ou no mÃ­nimo, um mÃªs apos o incidente e novamente apos 2 meses.', '21.7 O provedor ou ponto focal realiza o seguimento do utente de acordo com as recomendaÃ§Ãµes nacionais ou no mÃ­nimo, um mÃªs apos o incidente e novamente apos 2 meses.', 1, 0.00, 5, 'active', '2019-06-04'),
(147, 22, 54, '21.8 O provedor encoraja o seguimento atravÃ©s de estratÃ©gias como: telefonemas, SMS, visitas domiciliÃ¡rias, apoio no transporte, acompanhamento ao serviÃ§o se o paciente consentiu ser contactado', '21.8 O provedor encoraja o seguimento atravÃ©s de estratÃ©gias como: telefonemas, SMS, visitas domiciliÃ¡rias, apoio no transporte, acompanhamento ao serviÃ§o se o paciente consentiu ser contactado', 1, 0.00, 5, 'active', '2019-06-04'),
(148, 30, 55, '22.1 Os provedores recebem   (formaÃ§Ã£o contÃ­nua  relevante para exercerem seus papÃ©is e responsabilidades. A formaÃ§Ã£o deve incluir os seguintes elementos:  â€¢	Pedir consentimento ou assentimento para cuidados pÃ³s violÃªncia  â€¢	Oferece cuidados na porta de entrada (Ouvir, Inquirir, Validar,', '22.1 Os provedores recebem   (formaÃ§Ã£o contÃ­nua  relevante para exercerem seus papÃ©is e responsabilidades. A formaÃ§Ã£o deve incluir os seguintes elementos: \r\nâ€¢	Pedir consentimento ou assentimento para cuidados pÃ³s violÃªncia \r\nâ€¢	Oferece cuidados na porta de entrada (Ouvir, Inquirir, Validar, Oferecer SeguranÃ§a, Apoiar e fazer as ReferÃªncias).\r\nâ€¢	Mantem a privacidade e confidencialidade\r\nâ€¢	Como garantir a seguranÃ§a dos pacientes, provedores \r\nâ€¢	Como documentar histÃ³ria mÃ©dica relevante \r\nâ€¢	Avaliar, documentar e tratar lesÃµes gÃ©nito anais e extras genitais  \r\nâ€¢	Prevenir a experiÃªncia de retraumatizaÃ§Ã£o  durante o exame  \r\nâ€¢	Fazer diagnÃ³stico e prescriÃ§Ã£o de contracepÃ§Ã£o de emergÃªncia, Profilaxia PÃ³s ExposiÃ§Ã£o (PPE), profilaxia e tratamento de InfecÃ§Ãµes de TransmissÃ£o Sexual para adultos e crianÃ§as \r\nâ€¢	Aconselhamento e testagem para HIV e sÃ­filis \r\nâ€¢	Exame fÃ­sico e tratamento das lesÃµes em crianÃ§as e adolescentes \r\nâ€¢	Reporte mandatÃ³rios  de violÃªncia contra crianÃ§as e adolescentes (menores de 16 anos)\r\nâ€¢	ReferÃªncias necessÃ¡rias \r\nâ€¢	Normas e politicas nacionais incluindo reporte mandatÃ¡rio \r\nâ€¢	Tipos de VBG, suas causas, consequÃªncias, sinais e sintomas incluindo stress pÃ³s traumÃ¡tico \r\nâ€¢	Aborda valores e atitudes dos provedores \r\nâ€¢	PrevenÃ§Ã£o de revitimizaÃ§Ã£o e trauma secundÃ¡rio, se aplicÃ¡vel.\r\nâ€¢	Aborda o estigma e nÃ£o discriminaÃ§Ã£o \r\nâ€¢	InteraÃ§Ã£o utente povedor de forma sensÃ­vel e sem julgamentos \r\nâ€¢	Rastreio de violÃªncia baseada no gÃ©nero caso tenha serviÃ§os pos violÃªncia disponiveis \r\nâ€¢	Realiza aconselhamento psicolÃ³gico de acordo com as normas nacionais \r\nâ€¢	  AssistÃªncia psicolÃ³gica de longo termo de acordo com as recomendaÃ§Ãµes nacionais.\r\nâ€¢	  Colher, selar e manter a cadeia de evidÃªncias \r\nâ€¢	Examinar e tratar vÃ­timas que fazem parte de populaÃ§Ãµes chave (Ex. Mulheres tratabalhoras do sexo, homens que fazem sexo com homens, pessoas que injectam drogas prisioneiros) \r\nâ€¢	Oferecer cuidados de seguimento (Ex. LigaÃ§Ã£o com cuidados e tratamento para HIV ou para programas de empoderamento econÃ³mico etc.)\r\nâ€¢	  Realizar exame e documentaÃ§Ã£o forense \r\nâ€¢	Testemunhar em tribunal \r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(149, 30, 56, '23.1 A US realiza a actualizaÃ§Ã£o em serviÃ§o dos provedores de cuidados pÃ³s VBG pelo menos uma vez por ano. ', '23.1 A US realiza a actualizaÃ§Ã£o em serviÃ§o dos provedores de cuidados pÃ³s VBG pelo menos uma vez por ano. ', 1, 0.00, 5, 'active', '2019-06-04'),
(150, 30, 56, '23.2 Provedores recebem retorno verbal ou escrito apÃ³s as supervisÃµes ', '23.2 Provedores recebem retorno verbal ou escrito apÃ³s as supervisÃµes ', 1, 0.00, 5, 'active', '2019-06-04'),
(151, 30, 56, '23.3 A US tem pelo menos um mecanismo anÃ³nimo para reporte o nÃ­vel de satisfaÃ§Ã£o dos utentes (Ex. inquÃ©ritos de satisfaÃ§Ã£o dos utentes, feed back da comunidade, caixa de sugestÃµes e reclamaÃ§Ãµes, linha verde etc.)', '23.3 A US tem pelo menos um mecanismo anÃ³nimo para reporte o nÃ­vel de satisfaÃ§Ã£o dos utentes (Ex. inquÃ©ritos de satisfaÃ§Ã£o dos utentes, feed back da comunidade, caixa de sugestÃµes e reclamaÃ§Ãµes, linha verde etc.)', 1, 0.00, 5, 'active', '2019-06-04'),
(152, 30, 56, '23.4 A US realiza formaÃ§Ã£o em serviÃ§o e expande as competÃªncias para outros provedores, realiza encontros de equipe e outras actividades de formaÃ§Ã£o continua  Exemplos : â€¢	RevisÃ£o de pares  â€¢	SupervisÃ£o mensal para discutir casos, abordar o trauma que os provedores experimentam receber m', '23.4 A US realiza formaÃ§Ã£o em serviÃ§o e expande as competÃªncias para outros provedores, realiza encontros de equipe e outras actividades de formaÃ§Ã£o continua \r\nExemplos :\r\nâ€¢	RevisÃ£o de pares \r\nâ€¢	SupervisÃ£o mensal para discutir casos, abordar o trauma que os provedores experimentam receber mentoria e resposta sobre os serviÃ§os oferecidos\r\nâ€¢	Plano de palestras sobre VBG na US\r\n', 1, 0.00, 5, 'active', '2019-06-04');
INSERT INTO `sa_criterion_verification` (`criterion_verification_id`, `area_id`, `area_padrao_id`, `criterion_verification_name`, `criterion_verification_description`, `criterion_verification_control`, `product_minimum_order`, `criterion_verification_enter_by`, `criterion_verification_status`, `criterion_verification_date`) VALUES
(153, 30, 56, '23.5 A US tem mecanismos para apoiar e promover o auto cuidado  para provedores que possam apresentar sinais de trauma que resulte dos cuidados Ã¡ vÃ­tima.', '23.5 A US tem mecanismos para apoiar e promover o auto cuidado  para provedores que possam apresentar sinais de trauma que resulte dos cuidados Ã¡ vÃ­tima.', 1, 0.00, 5, 'active', '2019-06-04'),
(154, 31, 57, '24.1 A US tem as orientaÃ§Ãµes e polÃ­ticas nacionais para atendimento: â€¢	Guia para atendimento Ã¡ vÃ­tima de violÃªncia  â€¢	Algoritmos e ajudas de trabalho (Job AID): ï‚§	Aconselhamento pÃ³s violÃªncia  ï‚§	Cuidados clÃ­nicos pÃ³s violÃªncia sexual: PPE dosagem e prescriÃ§Ã£o, ContracepÃ§Ã£o de ', '24.1 A US tem as orientaÃ§Ãµes e polÃ­ticas nacionais para atendimento:\r\nâ€¢	Guia para atendimento Ã¡ vÃ­tima de violÃªncia \r\nâ€¢	Algoritmos e ajudas de trabalho (Job AID):\r\nï‚§	Aconselhamento pÃ³s violÃªncia \r\nï‚§	Cuidados clÃ­nicos pÃ³s violÃªncia sexual: PPE dosagem e prescriÃ§Ã£o, ContracepÃ§Ã£o de EmergÃªncia (CE), DiagnÃ³stico e profilaxia par ITS \r\nï‚§	Fichas de notificaÃ§Ã£o \r\nï‚§	Algoritmo para crianÃ§as e adolescentes\r\nï‚§	 tratamento clinico de crianÃ§as e adolescentes\r\nï‚§	  Rede de referÃªncias \r\nï‚§	  Exame mÃ©dico-legal e colecta de evidÃªncias \r\nï‚§	  Protocolo para armazenamento e cadeia de custÃ³dia \r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(155, 31, 57, '24.2 O provedores conhecem u usam estas normas ', '24.2 O provedores conhecem u usam estas normas ', 1, 0.00, 5, 'active', '2019-06-04'),
(156, 32, 58, '25.1 A US trabalha com outros serviÃ§os para integrar o rastreio de VBG nos seus programas como HIV, Consulta PrÃ© Natal, Planeamento Familiar (Desde que tenham pelo menos 60% de padrÃµes observados.) ', '25.1 A US trabalha com outros serviÃ§os para integrar o rastreio de VBG nos seus programas como HIV, Consulta PrÃ© Natal, Planeamento Familiar (Desde que tenham pelo menos 60% de padrÃµes observados.) ', 1, 0.00, 5, 'active', '2019-06-04'),
(157, 32, 58, '25.2 A US tem ligaÃ§Ã£o com a comunidade para aumentar a consciÃªncia sobre VBG, serviÃ§os de resposta disponÃ­veis ou a US conduz serviÃ§os moveis para trabalhar com as comunidades sobre VBG.', '25.2 A US tem ligaÃ§Ã£o com a comunidade para aumentar a consciÃªncia sobre VBG, serviÃ§os de resposta disponÃ­veis ou a US conduz serviÃ§os moveis para trabalhar com as comunidades sobre VBG.', 1, 0.00, 5, 'active', '2019-06-04'),
(158, 33, 59, '26.1 O provedor recolhe informaÃ§Ã£o relevante sobre os cuidados pÃ³s VBG disponÃ­veis: â€¢	ProveniÃªncia  â€¢	Sexo do utente e do perpetrador (s) â€¢	Idade do utente e perpetrador  â€¢	NÃºmero de perpetradores  â€¢	RelaÃ§Ã£o com o perpetrador  â€¢	Tempo e data da violÃªncia  â€¢	Data e tempo do ate', '26.1 O provedor recolhe informaÃ§Ã£o relevante sobre os cuidados pÃ³s VBG disponÃ­veis:\r\nâ€¢	ProveniÃªncia \r\nâ€¢	Sexo do utente e do perpetrador (s)\r\nâ€¢	Idade do utente e perpetrador \r\nâ€¢	NÃºmero de perpetradores \r\nâ€¢	RelaÃ§Ã£o com o perpetrador \r\nâ€¢	Tempo e data da violÃªncia \r\nâ€¢	Data e tempo do atendimento \r\nâ€¢	Tipo de violÃªncia \r\nâ€¢	DescriÃ§Ã£o do incidente\r\nâ€¢	LocalizaÃ§Ã£o de contacto sexual no caso de violÃªncia sexual (vaginal, oral, anal)\r\nâ€¢	DescriÃ§Ã£o de objecto penetrante (pÃ©nis, dedos ou objectos)\r\nâ€¢	Se houve uso de preservativo \r\nâ€¢	Risco de gravidez \r\nâ€¢	Risco de HIV e ITS \r\nâ€¢	HistÃ³ria de relaÃ§Ã£o sexual anterior a violÃªncia sexual pelo menos 5 dias \r\nâ€¢	 Documenta as lesÃµes no exame de primeira intenÃ§Ã£o (Diagrama detalhado)\r\nâ€¢	MedicaÃ§Ãµes administradas incluindo as recusadas \r\nâ€¢	Se houve colecta de evidÃªncias \r\nâ€¢	Sinais e sintomas de VBG \r\nâ€¢	HistÃ³ria de lesÃ£o anterior (e.g., lesÃµes jÃ¡ existentes, violÃªncia sexual prÃ©via, gravidez, HIV, mutilaÃ§Ã£o genital)\r\nâ€¢	Sinais vitais \r\nâ€¢	ReferÃªncias realizadas \r\nâ€¢	DiscussÃ£o de Plano de seguranÃ§a \r\nâ€¢	Registos de visitas de seguimento \r\nâ€¢	Se o paciente retornar para seguimento das consultas de VBG quais serviÃ§os foram recebidos durante a visita.\r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(159, 33, 59, '26.2 Os provedores registam informaÃ§Ã£o completa nas fichas de registo ', '26.2 Os provedores registam informaÃ§Ã£o completa nas fichas de registo ', 1, 0.00, 5, 'active', '2019-06-04'),
(160, 33, 60, '27.1 Os provedores sÃ£o treinados a colher e regista os dados ', '27.1 Os provedores sÃ£o treinados a colher e regista os dados ', 1, 0.00, 5, 'active', '2019-06-04'),
(161, 33, 60, '27.2 A US tem um Sistema de coleta anÃ¡lise de dados e tendÃªncias de  VBG (NÃºmero de casos, tipo de violÃªncia, Idade dos utentes e serviÃ§os utilizados etc) e o sistema Ã© usado.', '27.2 A US tem um Sistema de coleta anÃ¡lise de dados e tendÃªncias de  VBG (NÃºmero de casos, tipo de violÃªncia, Idade dos utentes e serviÃ§os utilizados etc) e o sistema Ã© usado.', 1, 0.00, 5, 'active', '2019-06-04'),
(162, 33, 60, '27.3 O ponto focal / gestor da US verifica os dados de forma periÃ³dica para avaliar a consistÃªncia e qualidade de dados. ', '27.3 O ponto focal / gestor da US verifica os dados de forma periÃ³dica para avaliar a consistÃªncia e qualidade de dados. ', 1, 0.00, 5, 'active', '2019-06-04'),
(163, 33, 61, '28.1 Os dados VBG sÃ£o desagregados por sexo ', '28.1 Os dados VBG sÃ£o desagregados por sexo ', 1, 0.00, 5, 'active', '2019-06-04'),
(164, 33, 61, '28.2  Os dados de VBG sÃ£o desagregados em idades (0-4, 5-9, 10-14, 15-19, 20-24, 25-29, 30-49, 50-59, 60+)', '28.2  Os dados de VBG sÃ£o desagregados em idades (0-4, 5-9, 10-14, 15-19, 20-24, 25-29, 30-49, 50-59, 60+)', 1, 0.00, 5, 'active', '2019-06-04'),
(165, 33, 61, '28.3 Os dados VBG sÃ£o desagregados por tipo de violÃªncia e se Ã© violÃªncia por parceiro Ã­ntimo:  â€¢	ViolÃªncia sexual pelo parceiro ou nÃ£o parceiro  â€¢	ViolÃªncia fÃ­sica pelo parceiro ou nÃ£o parceiro  â€¢	ViolÃªncia psicolÃ³gica pelo parceiro ou nÃ£o parceiro', '28.3 Os dados VBG sÃ£o desagregados por tipo de violÃªncia e se Ã© violÃªncia por parceiro Ã­ntimo: \r\nâ€¢	ViolÃªncia sexual pelo parceiro ou nÃ£o parceiro \r\nâ€¢	ViolÃªncia fÃ­sica pelo parceiro ou nÃ£o parceiro \r\nâ€¢	ViolÃªncia psicolÃ³gica pelo parceiro ou nÃ£o parceiro\r\n', 1, 0.00, 5, 'active', '2019-06-04'),
(166, 33, 61, '28.4 Os dados de VBG inclui numero de vÃ­timas que receberam PPE dentro de 72 horas ', '28.4 Os dados de VBG inclui numero de vÃ­timas que receberam PPE dentro de 72 horas ', 1, 0.00, 5, 'active', '2019-06-04'),
(167, 33, 61, '28.5 Os dados de VBG inclui numero de pessoas que completaram o regime de PPE ', '28.5 Os dados de VBG inclui numero de pessoas que completaram o regime de PPE ', 1, 0.00, 5, 'active', '2019-06-04'),
(168, 33, 61, '28.6 Nos dados de VBG esta descrito se a vÃ­tima faz parte de alguma populaÃ§Ã£o chave ou vulnerÃ¡vel ( Ex. pessoa com deficiÃªncia )(completar quem Ã© a populaÃ§ao chave)', '28.6 Nos dados de VBG esta descrito se a vÃ­tima faz parte de alguma populaÃ§Ã£o chave ou vulnerÃ¡vel ( Ex. pessoa com deficiÃªncia )(completar quem Ã© a populaÃ§ao chave)', 1, 0.00, 5, 'active', '2019-06-04'),
(169, 33, 61, '28.7 Os dados de VBG sÃ£o partilhados com o programa de cuidados de tratamento para HIV atravÃ©s de identificadores Ãºnicos a prontuÃ¡rios  mÃ©dicos compartilhado.', '28.7 Os dados de VBG sÃ£o partilhados com o programa de cuidados de tratamento para HIV atravÃ©s de identificadores Ãºnicos a prontuÃ¡rios  mÃ©dicos compartilhado.', 1, 0.00, 5, 'active', '2019-06-04'),
(170, 33, 61, '28.8 Os dados de VBG sem identificadores estÃ£o disponÃ­veis para a equipe de gestÃ£o e da equipe multisectorial (Sempre que for prudente e seguro)', '28.8', 0, 0.00, 5, 'active', '2019-06-04'),
(171, 33, 61, '28.9 Planos de mudanÃ§a baseados nas lacunas observadas nÃ£o feitos apos a revisÃ£o de dados. ', '28.9', 0, 0.00, 5, 'active', '2019-06-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_district`
--

CREATE TABLE `sa_district` (
  `district_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `district_name` varchar(250) NOT NULL,
  `district_status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_district`
--

INSERT INTO `sa_district` (`district_id`, `province_id`, `district_name`, `district_status`) VALUES
(2, 2, 'Chokwe', 'active'),
(3, 1, 'Matola', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_evaluation_criterion_order`
--

CREATE TABLE `sa_evaluation_criterion_order` (
  `evaluation_order_criterion_id` int(11) NOT NULL,
  `order_id` varchar(250) NOT NULL,
  `item_name` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL DEFAULT '0',
  `item_unit` varchar(30) NOT NULL DEFAULT '0',
  `evaluation_order_id` int(11) NOT NULL,
  `coment` text NOT NULL,
  `user_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_evaluation_criterion_order`
--

INSERT INTO `sa_evaluation_criterion_order` (`evaluation_order_criterion_id`, `order_id`, `item_name`, `item_quantity`, `item_unit`, `evaluation_order_id`, `coment`, `user_id`) VALUES
(8, '5cff989939921', 38, 1, '1', 127, 'Array', '0'),
(9, '5cff99cb3cf53', 46, 0, '1', 129, 'Array', '0'),
(10, '5cff9e1051de7', 38, 1, '1', 133, 'Array', '0'),
(11, '5cff9e63d0296', 38, 1, '1', 133, 'nao', '0'),
(12, '5cff9ea00483f', 38, 1, '1', 134, '', '0'),
(13, '5cff9ea00483f', 39, 1, '1', 134, 'sim', '0'),
(14, '5cff9ff167069', 38, 1, '1', 136, 'sim', '0'),
(15, '5cffb0305b515', 46, 1, '1', 138, '', ''),
(16, '5cffb0305b515', 47, 1, '1', 138, '', ''),
(17, '5d0037a720529', 46, 1, '1', 150, '', ''),
(18, '5d0037df9191b', 46, 1, '1', 151, '', ''),
(19, '5d00393776ec7', 46, 1, '0', 157, '', ''),
(20, '5d003d626ccc5', 46, 1, '1', 167, '', ''),
(21, '5d003d96a0da4', 46, 1, '0', 168, '', ''),
(22, '5d003ebda1229', 46, 1, '0', 173, '', ''),
(23, '5d003fa091bea', 46, 1, '0', 174, '', ''),
(24, '5d0040693d51f', 46, 0, '1', 178, '', ''),
(25, '5d00413f91316', 46, 0, '0', 179, '', ''),
(26, '5d00419f08499', 46, 1, '0', 180, '', ''),
(27, '5d00420ee7b2a', 46, 1, '', 181, '', ''),
(28, '5d0042f8817c6', 46, 1, '', 183, '', '2'),
(29, '5d00446352230', 38, 0, '', 185, '', '2'),
(30, '5d00446352230', 39, 1, '', 185, '', '2'),
(31, '5d00446352230', 46, 1, '', 185, '', '2'),
(32, '5d0044f913e77', 38, 1, '', 186, 'sim', '2'),
(33, '5d0044f913e77', 39, 0, '', 186, 'nao', '2'),
(34, '5d0044f913e77', 40, 1, '', 186, 'sim', '2'),
(35, '5d00454bce4ec', 55, 1, '', 187, '', '2'),
(36, '5d00454bce4ec', 56, 1, '', 187, '', '2'),
(37, '5d00454bce4ec', 57, 1, '', 187, '', '2'),
(38, '5d00454bce4ec', 58, 1, '', 187, '', '2'),
(39, '5d0045871516d', 59, 1, '', 188, '', '2'),
(40, '5d0045871516d', 60, 1, '', 188, '', '2'),
(41, '5d0045871516d', 61, 1, '', 188, '', '2'),
(42, '5d0045871516d', 62, 1, '', 188, '', '2'),
(43, '5d0045871516d', 63, 1, '', 188, '', '2'),
(44, '5d0045cbe1bef', 38, 0, '', 189, 'nao', '2'),
(45, '5d004616979c6', 38, 0, '', 190, 'nao', '2'),
(46, '5d004616979c6', 39, 0, '', 190, 'nao', '2'),
(47, '5d004616979c6', 40, 0, '', 190, 'nao', '2'),
(48, '5d004616979c6', 41, 0, '', 190, 'nao', '2'),
(49, '5d004616979c6', 42, 0, '', 190, 'nao', '2'),
(50, '5d004616979c6', 43, 0, '', 190, 'nao', '2'),
(51, '5d004616979c6', 44, 0, '', 190, 'nao', '2'),
(52, '5d004616979c6', 45, 0, '', 190, 'nao', '2'),
(53, '5d00c6c5eef4d', 46, 1, '', 197, '', '2'),
(54, '5d0280e477b95', 46, 1, '', 205, '', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_evaluation_order`
--

CREATE TABLE `sa_evaluation_order` (
  `evaluation_order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `evaluation_order_district` int(11) NOT NULL,
  `evaluation_order_total` double(10,2) NOT NULL,
  `evaluation_order_date` date NOT NULL,
  `evaluation_order_us` varchar(255) NOT NULL,
  `evaluation_order_type` text NOT NULL,
  `period_status` enum('quarterly','semiannual') NOT NULL,
  `period_type` int(11) NOT NULL,
  `evaluation_equipe_clinic` varchar(200) NOT NULL,
  `evaluation_order_status` varchar(100) NOT NULL DEFAULT 'active',
  `evaluation_order_created_date` date NOT NULL,
  `place_affection_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_evaluation_order`
--

INSERT INTO `sa_evaluation_order` (`evaluation_order_id`, `user_id`, `evaluation_order_district`, `evaluation_order_total`, `evaluation_order_date`, `evaluation_order_us`, `evaluation_order_type`, `period_status`, `period_type`, `evaluation_equipe_clinic`, `evaluation_order_status`, `evaluation_order_created_date`, `place_affection_id`) VALUES
(47, 2, 0, 0.00, '2019-05-27', 'US', 'Interna', 'quarterly', 0, '', 'active', '2019-05-27', 0),
(48, 2, 0, 0.00, '2019-05-27', 'US', 'Interna', 'quarterly', 0, '', 'active', '2019-05-27', 0),
(49, 2, 0, 0.00, '2019-05-27', 'US', 'Interna', 'quarterly', 0, '', 'active', '2019-05-27', 0),
(50, 2, 0, 0.00, '2019-05-27', 'US', 'Interna', 'quarterly', 0, '', 'active', '2019-05-27', 0),
(51, 2, 0, 1.01, '2019-05-27', 'US', 'Interna', 'quarterly', 0, '', 'active', '2019-05-27', 0),
(52, 2, 0, 2.02, '2019-05-27', 'US', 'Interna', 'quarterly', 0, '', 'active', '2019-05-27', 0),
(53, 2, 0, 3.03, '2019-05-27', 'US', 'Interna', 'quarterly', 0, '', 'active', '2019-05-27', 0),
(54, 2, 0, 1.01, '2019-05-27', 'US', 'Externa', 'semiannual', 0, '', 'active', '2019-05-27', 0),
(55, 6, 0, 7.07, '2019-05-30', 'US', 'Interna', 'quarterly', 0, '', 'active', '2019-05-30', 0),
(56, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, '', '', '0000-00-00', 0),
(57, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, 'Eusebio', '', '0000-00-00', 0),
(58, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, '', '', '0000-00-00', 0),
(59, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, '', '', '0000-00-00', 0),
(60, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, 'crisostimo', '', '0000-00-00', 0),
(61, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, 'crisostimo', 'active', '0000-00-00', 0),
(62, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, 'crisostimo', 'active', '0000-00-00', 0),
(63, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, 'crisostimo', 'active', '0000-00-00', 0),
(64, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, 'crisostimo', 'active', '2019-06-10', 0),
(65, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, 'crisostimo', 'active', '2019-06-10', 0),
(66, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, 'crisostimo', 'active', '2019-06-10', 0),
(67, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, 'crisostimo', 'active', '2019-06-10', 0),
(68, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, 'crisostimo', 'active', '2019-06-10', 0),
(69, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, '', 'active', '2019-06-10', 0),
(70, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, '', 'active', '2019-06-10', 0),
(71, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, '', 'active', '2019-06-10', 0),
(72, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, '', 'active', '2019-06-10', 0),
(73, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, '', 'active', '2019-06-10', 0),
(74, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, '', 'active', '2019-06-10', 0),
(75, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, '', 'active', '2019-06-10', 0),
(76, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, '', 'active', '2019-06-10', 0),
(77, 2, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 3, '', 'active', '2019-06-10', 0),
(78, 2, 0, 0.00, '2019-06-10', '', '', 'quarterly', 0, '', 'active', '2019-06-10', 0),
(79, 3, 0, 0.00, '0000-00-00', '', '1', 'quarterly', 0, '', 'active', '0000-00-00', 0),
(80, 2, 0, 0.00, '0000-00-00', '', '', 'quarterly', 0, '', 'active', '0000-00-00', 0),
(81, 2, 0, 0.00, '2019-06-10', '', '', 'quarterly', 0, '', 'active', '2019-06-10', 0),
(82, 3, 0, 0.00, '0000-00-00', '', '', 'quarterly', 0, '', 'active', '0000-00-00', 0),
(83, 3, 0, 0.00, '2019-06-10', '', '1', 'quarterly', 0, '', 'active', '2019-06-10', 0),
(84, 2, 0, 0.00, '2019-06-10', '', '', 'quarterly', 0, '', 'active', '2019-06-10', 0),
(85, 3, 0, 0.00, '0000-00-00', '', '1', 'quarterly', 3, 'Maura', 'active', '0000-00-00', 0),
(86, 3, 0, 0.00, '0000-00-00', '', '1', 'quarterly', 0, 'Eusebio, Maura, Munhezy', 'active', '0000-00-00', 0),
(87, 3, 0, 0.00, '0000-00-00', '', '1', 'quarterly', 0, 'Eusebio, Maura, Munhezy', 'active', '0000-00-00', 0),
(88, 3, 0, 0.00, '0000-00-00', '', '1', 'quarterly', 0, 'Eusebio, Maura, Munhezy', 'active', '0000-00-00', 0),
(89, 3, 0, 0.00, '0000-00-00', '', '1', 'quarterly', 0, 'Eusebio, Maura, Munhezy', 'active', '0000-00-00', 0),
(90, 3, 0, 0.00, '0000-00-00', '', '1', 'quarterly', 0, '', 'active', '0000-00-00', 0),
(91, 3, 0, 0.00, '0000-00-00', '', '', 'quarterly', 4, '', 'active', '0000-00-00', 0),
(92, 3, 0, 0.00, '2019-06-10', '', '2', 'quarterly', 4, '', 'active', '2019-06-10', 0),
(93, 2, 0, 0.00, '2019-06-10', '', '1', 'quarterly', 4, '', 'active', '2019-06-10', 0),
(94, 2, 0, 0.00, '2019-06-10', '', '1', 'quarterly', 4, '', 'active', '2019-06-10', 0),
(95, 2, 0, 0.00, '2019-06-10', '', '1', 'quarterly', 3, '', 'active', '2019-06-10', 0),
(96, 2, 0, 0.00, '2019-06-10', '', '1', 'quarterly', 4, '', 'active', '2019-06-10', 0),
(97, 2, 0, 0.00, '2019-06-10', '', '1', 'quarterly', 4, '', 'active', '2019-06-10', 0),
(98, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, 'Provedor', 'active', '2019-06-11', 0),
(99, 2, 0, 0.00, '2019-06-11', '', '', 'quarterly', 0, '', 'active', '2019-06-11', 0),
(100, 2, 0, 0.00, '2019-06-11', '', '', 'quarterly', 0, '', 'active', '2019-06-11', 0),
(101, 2, 0, 0.00, '2019-06-11', '', '', 'quarterly', 0, '', 'active', '2019-06-11', 0),
(102, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, '', 'active', '2019-06-11', 0),
(103, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, 'maura, etc', 'active', '2019-06-11', 0),
(104, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, 'Eusebio', 'active', '2019-06-11', 0),
(105, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, 'Sergio', 'active', '2019-06-11', 0),
(106, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, 'Eusebio', 'active', '2019-06-11', 0),
(107, 2, 0, 0.00, '2019-06-11', '', '', 'quarterly', 3, 'Nacarapa', 'active', '2019-06-11', 0),
(108, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, 'Nacarapa', 'active', '2019-06-11', 0),
(109, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, '', 'active', '2019-06-11', 0),
(110, 2, 0, 0.00, '2019-06-11', '', '2', 'quarterly', 3, '', 'active', '2019-06-11', 0),
(111, 2, 0, 0.00, '2019-06-11', '', '2', 'quarterly', 3, '', 'active', '2019-06-11', 0),
(112, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, 'maura', 'active', '2019-06-11', 0),
(113, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, '', 'active', '2019-06-11', 0),
(114, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 4, 'maura', 'active', '2019-06-11', 0),
(115, 2, 0, 0.00, '2019-06-11', '', '2', 'quarterly', 4, 'crisostimo', 'active', '2019-06-11', 0),
(116, 2, 0, 0.00, '2019-06-11', '', '2', 'quarterly', 4, 'crisostimo', 'active', '2019-06-11', 0),
(117, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 4, 'Provedor1, Provedor2', 'active', '2019-06-11', 0),
(118, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, 'Provedor', 'active', '2019-06-11', 0),
(119, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, 'Provedor', 'active', '2019-06-11', 0),
(120, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, 'Provedor', 'active', '2019-06-11', 0),
(121, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, 'Provedor', 'active', '2019-06-11', 0),
(122, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 0, '', 'active', '2019-06-11', 0),
(123, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 0, '', 'active', '2019-06-11', 0),
(124, 2, 0, 0.00, '2019-06-11', '', '2', 'quarterly', 4, 'Teste', 'active', '2019-06-11', 0),
(125, 2, 0, 0.00, '2019-06-11', '', '2', 'quarterly', 4, '', 'active', '2019-06-11', 0),
(126, 2, 0, 0.00, '2019-06-11', '', '2', 'quarterly', 4, '', 'active', '2019-06-11', 0),
(127, 2, 0, 0.00, '2019-06-11', '', '2', 'quarterly', 3, '', 'active', '2019-06-11', 0),
(128, 2, 0, 0.00, '2019-06-11', '', '2', 'quarterly', 3, 'jhpiego', 'active', '2019-06-11', 0),
(129, 2, 0, 0.00, '2019-06-11', '', '2', 'quarterly', 3, 'jhpiego', 'active', '2019-06-11', 0),
(130, 2, 0, 0.00, '2019-06-11', '', '2', 'quarterly', 3, 'jhpiego', 'active', '2019-06-11', 0),
(131, 2, 0, 0.00, '2019-06-11', '', '2', 'quarterly', 3, 'jhpiego', 'active', '2019-06-11', 0),
(132, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, '', 'active', '2019-06-11', 0),
(133, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, '', 'active', '2019-06-11', 0),
(134, 2, 0, 0.00, '2019-06-11', '', '', 'quarterly', 4, '', 'active', '2019-06-11', 0),
(135, 2, 0, 0.00, '2019-06-11', '', '', 'quarterly', 4, '', 'active', '2019-06-11', 0),
(136, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 4, '', 'active', '2019-06-11', 0),
(137, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 4, '', 'active', '2019-06-11', 0),
(138, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 3, '', 'active', '2019-06-11', 0),
(139, 2, 0, 0.00, '2019-06-11', '', '1', 'quarterly', 4, '', 'active', '2019-06-11', 0),
(140, 2, 0, 0.00, '0000-00-00', '', '', 'quarterly', 0, '', 'active', '0000-00-00', 0),
(141, 2, 0, 0.00, '2019-06-11', '', '', 'quarterly', 0, '', 'active', '2019-06-11', 0),
(142, 2, 0, 0.00, '2019-06-11', '', '', 'quarterly', 0, '', 'active', '2019-06-11', 0),
(143, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(144, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(145, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(146, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(147, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(148, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(149, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(150, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(151, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(152, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(153, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(154, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(155, 2, 0, 0.00, '2019-06-12', '', '1', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(156, 2, 0, 0.00, '2019-06-12', '', '1', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(157, 2, 0, 0.00, '2019-06-12', '', '1', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(158, 2, 0, 0.00, '2019-06-12', '', '1', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(159, 2, 0, 0.00, '2019-06-12', '', '1', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(160, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(161, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(162, 2, 0, 0.00, '2019-06-12', '', '1', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(163, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(164, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(165, 2, 0, 0.00, '2019-06-12', '', '1', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(166, 2, 0, 0.00, '2019-06-12', '', '1', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(167, 2, 0, 0.00, '2019-06-12', '', '1', 'quarterly', 3, 'Pinho', 'active', '2019-06-12', 0),
(168, 2, 0, 0.00, '2019-06-12', '', '1', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(169, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(170, 2, 0, 0.00, '2019-06-12', '', '1', 'quarterly', 4, 'll', 'active', '2019-06-12', 0),
(171, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, 'crisostimo', 'active', '2019-06-12', 0),
(172, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(173, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 3, 'Provedor', 'active', '2019-06-12', 0),
(174, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(175, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(176, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(177, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(178, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(179, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(180, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(181, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, 'Provedor', 'active', '2019-06-12', 0),
(182, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(183, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(184, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(185, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(186, 2, 0, 0.00, '2019-06-12', '', '1', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(187, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(188, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, 'Calo', 'active', '2019-06-12', 0),
(189, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(190, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(191, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(192, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(193, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(194, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(195, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(196, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(197, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(198, 2, 0, 0.00, '2019-06-12', '', '2', 'quarterly', 3, '', 'active', '2019-06-12', 0),
(199, 2, 0, 0.00, '2019-06-12', '', '', 'quarterly', 0, '', 'active', '2019-06-12', 0),
(200, 2, 0, 0.00, '2019-06-13', '', '1', 'quarterly', 0, '', 'active', '2019-06-13', 0),
(201, 2, 0, 0.00, '2019-06-13', '', '', 'quarterly', 0, '', 'active', '2019-06-13', 0),
(202, 2, 0, 0.00, '2019-06-13', '', '1', 'quarterly', 0, '', 'active', '2019-06-13', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_evaluation_order_criterion`
--

CREATE TABLE `sa_evaluation_order_criterion` (
  `evaluation_order_criterion_id` int(11) NOT NULL,
  `evaluation_order_id` int(11) NOT NULL,
  `criterion_verification_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_evaluation_order_criterion`
--

INSERT INTO `sa_evaluation_order_criterion` (`evaluation_order_criterion_id`, `evaluation_order_id`, `criterion_verification_id`, `quantity`) VALUES
(0, 49, 38, 1),
(0, 50, 38, 0),
(0, 51, 38, 1),
(0, 52, 38, 1),
(0, 52, 38, 0),
(0, 52, 38, 1),
(0, 53, 38, 1),
(0, 53, 39, 0),
(0, 53, 41, 1),
(0, 53, 44, 0),
(0, 53, 45, 1),
(0, 54, 38, 1),
(0, 55, 38, 1),
(0, 55, 39, 1),
(0, 55, 41, 1),
(0, 55, 42, 1),
(0, 55, 43, 1),
(0, 55, 44, 1),
(0, 55, 45, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_evaluation_type`
--

CREATE TABLE `sa_evaluation_type` (
  `evaluation_type_id` int(11) NOT NULL,
  `evaluation_type_name` varchar(250) NOT NULL,
  `evaluation_type_status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_evaluation_type`
--

INSERT INTO `sa_evaluation_type` (`evaluation_type_id`, `evaluation_type_name`, `evaluation_type_status`) VALUES
(1, 'Interna', 'active'),
(2, 'Externa', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_instance`
--

CREATE TABLE `sa_instance` (
  `instance_id` int(11) NOT NULL,
  `instance_name` varchar(250) NOT NULL,
  `instance_status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_instance`
--

INSERT INTO `sa_instance` (`instance_id`, `instance_name`, `instance_status`) VALUES
(1, 'US', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_meio_verificacao`
--

CREATE TABLE `sa_meio_verificacao` (
  `id` int(11) NOT NULL COMMENT 'codigo do meio de verificacao',
  `nome_meio_verificacao` varchar(250) NOT NULL COMMENT 'nome do meio de verificacao',
  `criterio_verificacao_id` int(11) NOT NULL COMMENT 'codigo do criterio de verificacao',
  `area_padrao_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `resposta` int(11) NOT NULL DEFAULT '0',
  `nome_area` varchar(255) DEFAULT NULL,
  `nome_area_padrao` varchar(255) DEFAULT NULL,
  `nome_criterio` varchar(255) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'estado do meio de verificacao'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_period`
--

CREATE TABLE `sa_period` (
  `period_id` int(11) NOT NULL,
  `period_name` varchar(250) NOT NULL,
  `period_status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_period`
--

INSERT INTO `sa_period` (`period_id`, `period_name`, `period_status`) VALUES
(4, 'T2', 'active'),
(3, 'T1', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_place_affection`
--

CREATE TABLE `sa_place_affection` (
  `place_affection_id` int(11) NOT NULL,
  `place_affection_name` varchar(250) NOT NULL,
  `place_affection_status` enum('active','inactive') NOT NULL,
  `service_id` int(11) NOT NULL,
  `sub_service_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `bairro_id` int(11) NOT NULL,
  `instance_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_place_affection`
--

INSERT INTO `sa_place_affection` (`place_affection_id`, `place_affection_name`, `place_affection_status`, `service_id`, `sub_service_id`, `country_id`, `province_id`, `district_id`, `bairro_id`, `instance_id`) VALUES
(1, 'HCM', 'active', 1, 1, 1, 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_province`
--

CREATE TABLE `sa_province` (
  `province_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `province_name` varchar(250) NOT NULL,
  `province_status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_province`
--

INSERT INTO `sa_province` (`province_id`, `country_id`, `province_name`, `province_status`) VALUES
(1, 1, 'Maputo', 'active'),
(2, 1, 'Gaza', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_service`
--

CREATE TABLE `sa_service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `service_status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_sub_service`
--

CREATE TABLE `sa_sub_service` (
  `sub_service_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `sub_service_name` varchar(250) NOT NULL,
  `sub_service_status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_type` enum('master','user') NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL,
  `cargo_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `place_affection_id` int(11) NOT NULL,
  `bairro_id` int(11) NOT NULL,
  `instance_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_email`, `user_password`, `user_name`, `user_type`, `user_status`, `cargo_id`, `categoria_id`, `country_id`, `province_id`, `district_id`, `place_affection_id`, `bairro_id`, `instance_id`) VALUES
(1, 'munhezy.cuco@gmail.com', '$2y$10$v9LtHIqJRg77F3138Z9w4OGp9SkZZOlViiWA7a/LyHf3es295CDLy', 'munhezy', 'master', 'Active', 0, 0, 0, 1, 0, 0, 0, 0),
(2, 'nacarapa@gmail.com', '$2y$10$v9LtHIqJRg77F3138Z9w4OGp9SkZZOlViiWA7a/LyHf3es295CDLy', 'Nacarapa', 'master', 'Active', 1, 1, 1, 1, 3, 1, 1, 1),
(3, 'ana.baptista@jhpiego.org', '$2y$10$v9LtHIqJRg77F3138Z9w4OGp9SkZZOlViiWA7a/LyHf3es295CDLy', 'Ana Baptista', 'master', 'Active', 1, 1, 1, 1, 3, 1, 1, 1),
(4, 'guest@jhpiego.org', '$2y$10$v9LtHIqJRg77F3138Z9w4OGp9SkZZOlViiWA7a/LyHf3es295CDLy', 'Guest', 'user', 'Active', 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'jordao.cololo@gmail.com', '$2y$10$v9LtHIqJRg77F3138Z9w4OGp9SkZZOlViiWA7a/LyHf3es295CDLy', 'Jordao', 'master', 'Active', 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'eusebio.matsinhe@jhpiego.org', '$2y$10$sTNASWqRSKLbP6zrUVm3kukplOjPznJgSZHatUl1HxKm9y50HAOnu', 'eusebio', 'user', 'Active', 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sa_area`
--
ALTER TABLE `sa_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indices de la tabla `sa_area_padrao`
--
ALTER TABLE `sa_area_padrao`
  ADD PRIMARY KEY (`area_padrao_id`);

--
-- Indices de la tabla `sa_bairro`
--
ALTER TABLE `sa_bairro`
  ADD PRIMARY KEY (`bairro_id`);

--
-- Indices de la tabla `sa_cargo`
--
ALTER TABLE `sa_cargo`
  ADD PRIMARY KEY (`cargo_id`);

--
-- Indices de la tabla `sa_categoria`
--
ALTER TABLE `sa_categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `sa_country`
--
ALTER TABLE `sa_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indices de la tabla `sa_criterion_verification`
--
ALTER TABLE `sa_criterion_verification`
  ADD PRIMARY KEY (`criterion_verification_id`);

--
-- Indices de la tabla `sa_district`
--
ALTER TABLE `sa_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indices de la tabla `sa_evaluation_criterion_order`
--
ALTER TABLE `sa_evaluation_criterion_order`
  ADD PRIMARY KEY (`evaluation_order_criterion_id`);

--
-- Indices de la tabla `sa_evaluation_order`
--
ALTER TABLE `sa_evaluation_order`
  ADD PRIMARY KEY (`evaluation_order_id`);

--
-- Indices de la tabla `sa_evaluation_type`
--
ALTER TABLE `sa_evaluation_type`
  ADD PRIMARY KEY (`evaluation_type_id`);

--
-- Indices de la tabla `sa_instance`
--
ALTER TABLE `sa_instance`
  ADD PRIMARY KEY (`instance_id`);

--
-- Indices de la tabla `sa_period`
--
ALTER TABLE `sa_period`
  ADD PRIMARY KEY (`period_id`);

--
-- Indices de la tabla `sa_place_affection`
--
ALTER TABLE `sa_place_affection`
  ADD PRIMARY KEY (`place_affection_id`);

--
-- Indices de la tabla `sa_province`
--
ALTER TABLE `sa_province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indices de la tabla `sa_service`
--
ALTER TABLE `sa_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indices de la tabla `sa_sub_service`
--
ALTER TABLE `sa_sub_service`
  ADD PRIMARY KEY (`sub_service_id`);

--
-- Indices de la tabla `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sa_area`
--
ALTER TABLE `sa_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `sa_area_padrao`
--
ALTER TABLE `sa_area_padrao`
  MODIFY `area_padrao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `sa_bairro`
--
ALTER TABLE `sa_bairro`
  MODIFY `bairro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sa_cargo`
--
ALTER TABLE `sa_cargo`
  MODIFY `cargo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sa_categoria`
--
ALTER TABLE `sa_categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sa_country`
--
ALTER TABLE `sa_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sa_criterion_verification`
--
ALTER TABLE `sa_criterion_verification`
  MODIFY `criterion_verification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT de la tabla `sa_district`
--
ALTER TABLE `sa_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sa_evaluation_criterion_order`
--
ALTER TABLE `sa_evaluation_criterion_order`
  MODIFY `evaluation_order_criterion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `sa_evaluation_order`
--
ALTER TABLE `sa_evaluation_order`
  MODIFY `evaluation_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT de la tabla `sa_evaluation_type`
--
ALTER TABLE `sa_evaluation_type`
  MODIFY `evaluation_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sa_instance`
--
ALTER TABLE `sa_instance`
  MODIFY `instance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sa_period`
--
ALTER TABLE `sa_period`
  MODIFY `period_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sa_place_affection`
--
ALTER TABLE `sa_place_affection`
  MODIFY `place_affection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sa_province`
--
ALTER TABLE `sa_province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sa_service`
--
ALTER TABLE `sa_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sa_sub_service`
--
ALTER TABLE `sa_sub_service`
  MODIFY `sub_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
