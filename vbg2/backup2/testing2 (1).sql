-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2019 a las 07:36:22
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
-- Base de datos: `testing2`
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
(33, 'X. Reporte e Sistemas de InformaÃ§Ã£o ', 'active');

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
(61, 33, '28. Os dados de VBG sÃ£o analisados para melhorar a prestaÃ§Ã£o de serviÃ§os oferecidos e sistemas de resposta Ã¡ VBG ', 'active');



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
(48, 18, 36, '3.2 A US usa letreiros e sinais discretos  e fluxograma claro para aumentar o acesso, seguranÃ§a e privacidade para utentes e provedores. ', '3.2 A US usa letreiros e sinais discretos  e fluxograma claro para aumentar o acesso, seguranÃ§a e privacidade para utentes e provedores. \r\n', 1, 0.00, 2, 'active', '2019-05-27');

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
-- Estructura de tabla para la tabla `sa_evaluation_order`
--

CREATE TABLE `sa_evaluation_order` (
  `evaluation_order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `evaluation_order_total` double(10,2) NOT NULL,
  `evaluation_order_date` date NOT NULL,
  `evaluation_order_us` varchar(255) NOT NULL,
  `evaluation_order_type` text NOT NULL,
  `period_status` enum('quarterly','semiannual') NOT NULL,
  `evaluation_order_status` varchar(100) NOT NULL,
  `evaluation_order_created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sa_evaluation_order`
--

INSERT INTO `sa_evaluation_order` (`evaluation_order_id`, `user_id`, `evaluation_order_total`, `evaluation_order_date`, `evaluation_order_us`, `evaluation_order_type`, `period_status`, `evaluation_order_status`, `evaluation_order_created_date`) VALUES
(47, 2, 0.00, '2019-05-27', 'US', 'Interna', 'quarterly', 'active', '2019-05-27'),
(48, 2, 0.00, '2019-05-27', 'US', 'Interna', 'quarterly', 'active', '2019-05-27'),
(49, 2, 0.00, '2019-05-27', 'US', 'Interna', 'quarterly', 'active', '2019-05-27'),
(50, 2, 0.00, '2019-05-27', 'US', 'Interna', 'quarterly', 'active', '2019-05-27'),
(51, 2, 1.01, '2019-05-27', 'US', 'Interna', 'quarterly', 'active', '2019-05-27'),
(52, 2, 2.02, '2019-05-27', 'US', 'Interna', 'quarterly', 'active', '2019-05-27'),
(53, 2, 3.03, '2019-05-27', 'US', 'Interna', 'quarterly', 'active', '2019-05-27'),
(54, 2, 1.01, '2019-05-27', 'US', 'Externa', 'semiannual', 'active', '2019-05-27');

-- --------------------------------------------------------




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
(0, 54, 38, 1);

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
  `user_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_email`, `user_password`, `user_name`, `user_type`, `user_status`) VALUES
(1, 'munhezy.cuco@gmail.com', '$2y$10$v9LtHIqJRg77F3138Z9w4OGp9SkZZOlViiWA7a/LyHf3es295CDLy', 'munhezy', 'master', 'Active'),
(2, 'nacarapa@gmail.com', '$2y$10$v9LtHIqJRg77F3138Z9w4OGp9SkZZOlViiWA7a/LyHf3es295CDLy', 'Nacarapa', 'master', 'Active'),
(3, 'ana.baptista@jhpiego.org', '$2y$10$v9LtHIqJRg77F3138Z9w4OGp9SkZZOlViiWA7a/LyHf3es295CDLy', 'Ana Baptista', 'master', 'Active'),
(4, 'guest@jhpiego.org', '$2y$10$v9LtHIqJRg77F3138Z9w4OGp9SkZZOlViiWA7a/LyHf3es295CDLy', 'Guest', 'user', 'Active'),
(5, 'jordao.cololo@gmail.com', '$2y$10$v9LtHIqJRg77F3138Z9w4OGp9SkZZOlViiWA7a/LyHf3es295CDLy', 'Jordao', 'master', 'Active');

-- --------------------------------------------------------

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
-- AUTO_INCREMENT de la tabla `sa_area`
--
ALTER TABLE `sa_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `sa_area_padrao`
--
ALTER TABLE `sa_area_padrao`
  MODIFY `area_padrao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
  MODIFY `criterion_verification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `sa_district`
--
ALTER TABLE `sa_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sa_evaluation_order`
--
ALTER TABLE `sa_evaluation_order`
  MODIFY `evaluation_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
-- AUTO_INCREMENT de la tabla `sa_verification_criterion`
--
ALTER TABLE `sa_verification_criterion`
  MODIFY `verification_criterion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


--
-- AUTO_INCREMENT de la tabla `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
