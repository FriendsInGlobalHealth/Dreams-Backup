-- MySQL dump 10.13  Distrib 5.7.33, for Linux (x86_64)
--
-- Host: localhost    Database: vbg_sam
-- ------------------------------------------------------
-- Server version	5.7.33-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `sa_action_plan`
--

DROP TABLE IF EXISTS `sa_action_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_action_plan` (
  `action_plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL COMMENT 'Causa',
  `apellido` varchar(50) DEFAULT NULL COMMENT 'Tipo de Causa',
  `email` varchar(50) DEFAULT NULL COMMENT 'IntervenÃ§Ã£o',
  `telefono` varchar(50) DEFAULT NULL COMMENT 'Periodo',
  PRIMARY KEY (`action_plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_action_plan`
--

LOCK TABLES `sa_action_plan` WRITE;
/*!40000 ALTER TABLE `sa_action_plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `sa_action_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_action_plan1`
--

DROP TABLE IF EXISTS `sa_action_plan1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_action_plan1` (
  `action_plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `action_plan_period` int(11) DEFAULT NULL,
  `cause_plan_id` int(11) DEFAULT NULL,
  `cause_type_id` int(11) DEFAULT NULL,
  `intervention_plan_id` int(11) DEFAULT NULL,
  `responsible_plan_id` int(11) DEFAULT NULL,
  `order_evaluaction_id` int(11) DEFAULT NULL,
  `action_plan_status` enum('active','inactive') NOT NULL,
  `action_plan_date` date DEFAULT NULL,
  `action_plan_updaty` date DEFAULT NULL,
  `status_intervention_id` int(11) DEFAULT '1',
  `coment` text,
  PRIMARY KEY (`action_plan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_action_plan1`
--

LOCK TABLES `sa_action_plan1` WRITE;
/*!40000 ALTER TABLE `sa_action_plan1` DISABLE KEYS */;
INSERT INTO `sa_action_plan1` VALUES (15,5,3,1,2,2,2,11,'active','2019-09-18',NULL,1,NULL),(14,5,1,1,1,2,1,6,'active','2019-09-18',NULL,1,NULL);
/*!40000 ALTER TABLE `sa_action_plan1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_area`
--

DROP TABLE IF EXISTS `sa_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_area` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(250) NOT NULL,
  `area_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_area`
--

LOCK TABLES `sa_area` WRITE;
/*!40000 ALTER TABLE `sa_area` DISABLE KEYS */;
INSERT INTO `sa_area` VALUES (21,'V.MEDICINA LEGAL ','active'),(20,'IV. Cuidados ClÃ­nicos Centrados no Utente','active'),(19,'III. IdentificaÃ§Ã£o Precoce de VÃ­timas de ViolÃªncia  ','active'),(18,'II. Materiais e Infraestruturas ','active'),(17,'I. Disponibilidade de cuidados pÃ³s VBG ','active'),(22,'VI. Sistema de ReferÃªncia e Seguimento da VÃ­tima ','active'),(31,'VIII. PolÃ­ticas de Cuidados de SaÃºde','active'),(30,'VII. FormaÃ§Ã£o e Melhoria de Qualidade ','active'),(32,'IX. CriaÃ§Ã£o de Demanda Para Uso de Cuidados PÃ³s ViolÃªncia ','active'),(33,'X. Reporte e Sistemas de InformaÃ§ao','active'),(38,'InformaÃ§Ã£o','active');
/*!40000 ALTER TABLE `sa_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_area_padrao`
--

DROP TABLE IF EXISTS `sa_area_padrao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_area_padrao` (
  `area_padrao_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `area_padrao_name` varchar(250) NOT NULL,
  `area_padrao_status` enum('active','inactive') NOT NULL,
  `area_padrao_description` text,
  PRIMARY KEY (`area_padrao_id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_area_padrao`
--

LOCK TABLES `sa_area_padrao` WRITE;
/*!40000 ALTER TABLE `sa_area_padrao` DISABLE KEYS */;
INSERT INTO `sa_area_padrao` VALUES (34,17,'1. A US oferece cuidados acessÃ­veis e gratuitos Ã s vÃ­timas de violÃªncia','active','1.'),(35,18,'2. A US tem materiais de IEC GBV  ','active','2.'),(36,18,'3. A US tem infraestruturas equipamentos e materiais adequados para providenciar cuidados pÃ³s violÃªncia (Veja detalhes na Caixa 1)','active','3.'),(37,19,'4. A US identifica precocemente utentes que tenham sido vÃ­timas de violÃªncia ','active','4.'),(38,19,'5. O Provedor faz perguntas sobre VPI de forma apropriada','active','5.'),(39,19,'6. O provedor avalia o risco imediato que os utentes podem ter no momento da revelaÃ§Ã£o ','active','6.'),(40,20,'7. O Provedor obtÃ©m consentimento informado para exame fÃ­sico ','active','7.'),(41,20,'8. Provedor de saÃºde realiza o tratamento das lesÃµes ','active','8.'),(42,20,'9. O provedor demostra conhecimento em aconselhamento de crise para evitar revitimizaÃ§Ã£o ','active','9.'),(43,20,'10. O provedor pÃµe em prÃ¡tica as orientaÃ§Ãµes para atendimento Ã¡ crianÃ§as e adolescentes vÃ­timas de violÃªncia e exploraÃ§Ã£o sexual  ','active','10.'),(44,20,'11. Provedor respeita e mantÃ©m a privacidade e confidencialidade do utente  ','active','11.'),(45,20,'12. O provedor oferece atendimento humanizado e respeitoso para evitar revitimizaÃ§Ã£o ','active','12.'),(46,20,'13. Provedor realiza exame das lesÃµes extragenitais e gÃ©nito-anais ','active','13.'),(47,20,'14.A US oferece contracepÃ§Ã£o de emergÃªncia para vÃ­timas de violÃªncia sexual do sexo feminino de acordo com o protocolo  ','active','14.'),(48,20,'15. O provedor oferece Ã¡s vÃ­timas de violÃªncia aconselhamento e testagem para HIV e profilaxia pÃ³s exposiÃ§Ã£o para HIV (PPE) dentro de 72 Horas depois da violÃªncia sexual  ','active','15.'),(49,20,'16. O provedor oferece medicaÃ§Ãµes relevantes para prevenÃ§Ã£o ou tratamento de infecÃ§Ãµes de transmissÃ£o sexual ','active','16.'),(50,20,'17. O provedor oferece assistÃªncia psicolÃ³gica aos utentes vÃ­timas de violÃªncia sexual ','active','17.'),(51,21,' 18.O provedor realiza o exame mÃ©dico-legal de acordo com as recomendaÃ§Ãµes nacionais  ','active','18.'),(52,21,'19. O provedor colecta, armazena e / ou transporta evidÃªncias forenses de forma segura de acordo com protocolo nacional ','active','19.'),(53,22,'20. A US tem sistema de referÃªncia para facilitar a utilizaÃ§Ã£o dos serviÃ§os necessÃ¡rios na rede de apoio Ã¡ vÃ­tima de violÃªncia  ','active','20.'),(54,22,'21. Os provedores oferecem serviÃ§os de seguimento da vÃ­tima de violÃªncia ','active','21.'),(55,30,'22. Todos provedores que oferecem serviÃ§os pÃ³s VBG foram treinados para exercerem seus papÃ©is e responsabilidades no cuidado com os utentes ','active','22.'),(56,30,'23. A US tem um Sistema de melhoria continua de qualidade de cuidados pÃ³s VBG','active','23.'),(57,31,'24. A US tem protocolos para oferecer cuidados pÃ³s violÃªncia de acordo com as recomendaÃ§Ãµes nacionais ','active','24.'),(58,32,'25. A US apoia a divulgaÃ§Ã£o dos serviÃ§os e aumento de consciÃªncia de uso de cuidados ','active','25.'),(59,33,'26. A US possui fichas de notificaÃ§Ã£o, livros de registo e outros instrumentos de recolha de dados dos cuidados pÃ³s VBG ','active','26.'),(60,33,' 27. A US tem um Sistema de avaliaÃ§Ã£o e monitoria de dados VBG ','active','27.'),(61,33,'28. Os dados de VBG sÃ£o analisados para melhorar a prestaÃ§Ã£o de serviÃ§os oferecidos e sistemas de resposta Ã¡ VBG ','active','28.');
/*!40000 ALTER TABLE `sa_area_padrao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_bairro`
--

DROP TABLE IF EXISTS `sa_bairro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_bairro` (
  `bairro_id` int(11) NOT NULL AUTO_INCREMENT,
  `bairro_name` varchar(250) NOT NULL,
  `bairro_status` enum('active','inactive') NOT NULL,
  `Latitude_N` double NOT NULL,
  `Longitude_E` double NOT NULL,
  `country_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY (`bairro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_bairro`
--

LOCK TABLES `sa_bairro` WRITE;
/*!40000 ALTER TABLE `sa_bairro` DISABLE KEYS */;
INSERT INTO `sa_bairro` VALUES (1,'fomento','active',15.5,16.3,1,1,3);
/*!40000 ALTER TABLE `sa_bairro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_cargo`
--

DROP TABLE IF EXISTS `sa_cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_cargo` (
  `cargo_id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo_name` varchar(250) NOT NULL,
  `cargo_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`cargo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_cargo`
--

LOCK TABLES `sa_cargo` WRITE;
/*!40000 ALTER TABLE `sa_cargo` DISABLE KEYS */;
INSERT INTO `sa_cargo` VALUES (1,'Director do Hospital','active'),(2,'Administrador do Hospital','active'),(4,'Ponto Focal da US','active');
/*!40000 ALTER TABLE `sa_cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_categoria`
--

DROP TABLE IF EXISTS `sa_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_categoria` (
  `categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_name` varchar(250) NOT NULL,
  `categoria_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_categoria`
--

LOCK TABLES `sa_categoria` WRITE;
/*!40000 ALTER TABLE `sa_categoria` DISABLE KEYS */;
INSERT INTO `sa_categoria` VALUES (1,'Administrador','active');
/*!40000 ALTER TABLE `sa_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_cause_plan`
--

DROP TABLE IF EXISTS `sa_cause_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_cause_plan` (
  `cause_plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `area_padrao_id` int(11) NOT NULL,
  `criterion_verification_id` int(11) NOT NULL,
  `cause_plan_name` varchar(300) NOT NULL,
  `cause_plan_description` text NOT NULL,
  `cause_plan_status` enum('active','inactive') NOT NULL,
  `cause_plan_date` date NOT NULL,
  PRIMARY KEY (`cause_plan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_cause_plan`
--

LOCK TABLES `sa_cause_plan` WRITE;
/*!40000 ALTER TABLE `sa_cause_plan` DISABLE KEYS */;
INSERT INTO `sa_cause_plan` VALUES (1,17,34,38,'Falta de Recursos','Falta de Recursos','active','2019-06-27'),(2,17,34,39,'Falta de Formacao','Falta de Formacao','','2019-06-27');
/*!40000 ALTER TABLE `sa_cause_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_cause_type`
--

DROP TABLE IF EXISTS `sa_cause_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_cause_type` (
  `cause_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `area_padrao_id` int(11) NOT NULL,
  `criterion_verification_id` int(11) NOT NULL,
  `cause_type_name` varchar(300) NOT NULL,
  `cause_type_description` text NOT NULL,
  `cause_type_status` enum('active','inactive') NOT NULL,
  `cause_type_date` date NOT NULL,
  PRIMARY KEY (`cause_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_cause_type`
--

LOCK TABLES `sa_cause_type` WRITE;
/*!40000 ALTER TABLE `sa_cause_type` DISABLE KEYS */;
INSERT INTO `sa_cause_type` VALUES (1,17,34,38,'Humanos','','active','2019-06-27'),(2,17,34,39,'Financeiros','','active','2019-06-27');
/*!40000 ALTER TABLE `sa_cause_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_country`
--

DROP TABLE IF EXISTS `sa_country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(250) NOT NULL,
  `country_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_country`
--

LOCK TABLES `sa_country` WRITE;
/*!40000 ALTER TABLE `sa_country` DISABLE KEYS */;
INSERT INTO `sa_country` VALUES (1,'Mozambique','active'),(2,'Angola','active'),(3,'Espanha','active');
/*!40000 ALTER TABLE `sa_country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_criterion_verification`
--

DROP TABLE IF EXISTS `sa_criterion_verification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_criterion_verification` (
  `criterion_verification_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `area_padrao_id` int(11) NOT NULL,
  `criterion_verification_name` varchar(300) NOT NULL,
  `criterion_verification_description` text NOT NULL,
  `criterion_verification_control` int(11) NOT NULL,
  `product_minimum_order` double(10,2) NOT NULL,
  `criterion_verification_enter_by` int(11) NOT NULL,
  `criterion_verification_status` enum('active','inactive') NOT NULL,
  `criterion_verification_date` date NOT NULL,
  PRIMARY KEY (`criterion_verification_id`)
) ENGINE=MyISAM AUTO_INCREMENT=173 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_criterion_verification`
--

LOCK TABLES `sa_criterion_verification` WRITE;
/*!40000 ALTER TABLE `sa_criterion_verification` DISABLE KEYS */;
INSERT INTO `sa_criterion_verification` VALUES (38,17,34,'1.1 A US oferece cuidados pÃ³s violÃªncia 24 horas por dia OU apoia ao utente a ter cuidados de referÃªncia em outras US que oferecem cuidados 24 horas','1.1',1,0.00,2,'active','2019-05-27'),(39,17,34,'1.2 A US nÃ£o condiciona a oferta de cuidados ao reporte Ã¡ policia.','1.2',1,0.00,2,'active','2019-05-27'),(40,17,34,'Verifique na aceitaÃ§Ã£o se esta disponÃ­vel informaÃ§Ã£o sobre disponibilidade de serviÃ§os independentemente de a vÃ­tima ter uma guia da polÃ­cia.','v',1,0.00,2,'active','2019-05-27'),(41,17,34,'1.3 A US tem todas guias de referÃªncia inclusive para polÃ­cia para que a vÃ­tima nÃ£o tenha que ir a polÃ­cia para ter as guias de referÃªncia.','1.3\r\n',1,0.00,2,'active','2019-05-27'),(42,17,34,'1.4 A US garante privacidade durante o atendimento. ','1.4',1,0.00,2,'active','2019-05-27'),(43,17,34,'1.5 A US oferece cuidados gratuitos para vÃ­timas de violÃªncia','1.5\r\n',1,0.00,2,'active','2019-05-27'),(44,17,34,'1.6 A US prioriza as vÃ­timas de violÃªncia sexual para garantir que estas recebam os cuidados mais rÃ¡pido possÃ­veis','1.6',1,0.00,2,'active','2019-05-27'),(45,17,34,'1.7 A US tem fluxograma de atendimento que garante acesso aos cuidados que todos utentes independentemente do sexo, orientaÃ§ao sexual, raÃ§a , religiÃ£o, idade, estado marital etc.','1.7',1,0.00,2,'active','2019-05-27'),(46,18,35,'2.1 A US tem materiais IEC visÃ­veis dirigidos aos utentes sobre VBG (e.g.,cartazes, planfletos, leis, direitos em Ã¡reas de maior circulaÃ§Ã£o de utentes como por ex. corredores, farmÃ¡cia, consultas etc.)','2.1\r\n',1,0.00,2,'active','2019-05-27'),(47,18,36,'3.1 A oferta de serviÃ§os VBG ocorre dentro ou perto de uns US','3.1',1,0.00,2,'active','2019-05-27'),(48,18,36,'3.2 A US usa letreiros e sinais discretos e fluxograma claro para aumentar o acesso, seguranÃ§a e privacidade para utentes e provedores.','3.2',1,0.00,2,'active','2019-05-27'),(49,18,36,'3.3 O local de atendimento tÃªm privacidade (a vitima ou o provedor nÃ£o podem ser ouvidas ou vistas durante o atendimento), estÃ¡ limpo, ventilado e iluminado.','3.3',1,0.00,5,'active','2019-06-04'),(50,18,36,'3.4 A US tem um local com privacidade, limpo e confortavel para internamento de curta duraÃ§Ã£o caso a vÃ­tima necessite','3.4 ',1,0.00,5,'active','2019-06-04'),(51,18,36,'3.5 A US tem equipamentos essenciais (Infraestruturas, mobiliÃ¡rio, documentos) disponÃ­veis (VEJA CAIXA 1 se algum artigo estiver em falta este critÃ©rio Ã© NÃƒO).','3.5',1,0.00,5,'active','2019-06-04'),(52,18,36,'3.6 A US tem um sistema para verificar trimestralmente se os medicamentos,vacinas e testes rÃ¡pidos estÃ£o dentro do prazo de validade e tem meios para descarga se expirados.','3.6',1,0.00,5,'active','2019-06-04'),(53,18,36,'3.7 A US integra consumÃ­veis, vacinas e testes para VBG na gestÃ£o e distribuiÃ§Ã£o de medicamentos necessÃ¡rios para responder a violÃªncia na cadeia de distribuiÃ§Ã£o de medicamentos.','3.7',1,0.00,5,'active','2019-06-04'),(54,18,36,'3.8 A US tem para pelo menos 3 meses de stock de medicamentos e consumÃ­veis para responder a casos de violÃªncia (VEJA CAIXA 1 se algum artigo estiver em falta este critÃ©rio Ã© NÃƒO).','3.8',1,0.00,5,'active','2019-06-04'),(55,19,37,'4.1O provedor pergunta sobre violÃªncia aos utentes que tenham sinais e sintomas de violÃªncia para VPI e/ou VS.(VEJA CAIXA 2)','4.1',1,0.00,5,'active','2019-06-04'),(56,19,37,'4.2 A US tem um algoritmo de rastreio de violÃªncia para perguntar sobre VPI ou VS alinhada com as normas nacionais e da OMS','4.2 ',1,0.00,5,'active','2019-06-04'),(57,19,37,'4.3 A US realiza rastreio clinico de VBG (VPI ou VS) somente se nos serviÃ§ostodos os seguintes requisitos estÃ£o disponiveis: â€¢ Protocolo de cuidados pÃ³s VBG em vigor â€¢ QuestionÃ¡rio com perguntas padrao onde provedores podem documentar respostas. â€¢ Provedores oferecem serviÃ§os imediatos','4.3\r\n',0,0.00,5,'active','2019-06-04'),(58,19,37,'4 Provedores realizam rastreio clinico quando assessando pacientes em outras portas de entrada apropriadas (CPN, ATS, PF, PTV, SAAJ a partir dos 15 anos etc.) se os critÃƒÂ©rios mÃƒÂ­nimos forem observados ','4',1,0.00,5,'active','2019-06-04'),(59,19,38,'5.1 O provedor nunca pergunta sobre violÃƒÂªncia quando o utente esta acompanhado pelo parceiro ou pessoas da famÃƒÂ­lia. ','5.1',1,0.00,5,'active','2019-06-04'),(60,19,38,'5.2 O provedor aflora o tÃƒÂ³pico sobre VBG cuidadosamente fazendo colocaÃƒÂ§ÃƒÂµes gerais sobre VBG  antes de fazer perguntas directamente sobre a situaÃƒÂ§ÃƒÂ£o do utente . ','5.2',1,0.00,5,'active','2019-06-04'),(172,19,38,'5.3 1O provedor nÃ£o fornece o rastreio para utentes que nÃ£o querem ser rastreados','5.3',1,0.00,5,'active','2019-06-04'),(62,19,38,'5.4 O provedor explica ao detalhe as questÃƒÂµes que vai fazer para compor um plano de seguranÃƒÂ§a com utente ','5.4',1,0.00,5,'active','2019-06-04'),(63,19,38,'5.5 O provedor faz perguntas directas e simples sobre violÃƒÂªncia e documenta.','5.5',1,0.00,5,'active','2019-06-04'),(64,19,39,'6.1 O provedor faz perguntas simples e diretas para avaliar sinais de perigo de vida imediato    Ã¢â‚¬Â¢	A violÃƒÂªncia tem sido cada vez mais frequente nos ÃƒÂºltimos 6 meses? Ã¢â‚¬Â¢	Ele /e usou ou ameaÃƒÂ§ou uma arma? Ã¢â‚¬Â¢	Ele/a tentou estrangular? Ã¢â‚¬Â¢	Acredita que ele/a possa matar Ã¢â‚¬â','6.1\r\n',1,0.00,5,'active','2019-06-04'),(65,19,39,'6.2 Se o utente responde SIM a alguma das perguntas ou se o utente sÃƒÂ£o oferecidos os cuidados imediatos ','6.2',1,0.00,5,'active','2019-06-04'),(66,19,39,'6.3 O provedor apoia a fazer o plano de seguranÃƒÂ§a fazendo as questÃƒÂµes descritas abaixo: Ã¢â‚¬Â¢	Se tiver que sair as pressas de casa para onde iria?  Ã¢â‚¬Â¢	Sairia sozinha ou com os seus filhos? (Se a utente tiver filhos)  Ã¢â‚¬Â¢	Que documentos precisaria organizar, dinheiro levaria consigo?','6.3\r\n',1,0.00,5,'active','2019-06-04'),(67,20,40,'7.1 O provedor obtÃƒÂ©m consetimento escrito ou verbal (assentimento e concordÃƒÂ¢ncia da crianÃƒÂ§a),   antes de realizar qualquer procedimento e explica os procedimentos ao utente e seus tutores se este for menor','7.1',1,0.00,5,'active','2019-06-04'),(68,20,40,'7.2 O provedor obtÃƒÂ©m consentimento para realizar a testagem para HIV de acordo com as directrizes nacionais de aconselhamento e testagem 10 ','7.2',1,0.00,5,'active','2019-06-04'),(69,20,40,'7.3 O provedor segue as normas para obter o consentimento de menores de idade ','7.3',1,0.00,5,'active','2019-06-04'),(70,20,40,'7.4 O provedor nunca forÃ§a o utente a ser examinado a nÃ£o ser que o exame permita resolver uma situaÃ§Ã£o que coloque em perigo a vida do utente','7.4\r\n',1,0.00,5,'active','2019-06-04'),(71,20,40,'7.5 O provedor clarifica que o utente pode recusar qualquer procedimento.','7.5',1,0.00,5,'active','2019-06-04'),(72,20,40,'7.6 O provedor respeita a decisÃ£o do utente de nÃ£o reportar a polÃ­cia','7.6 ',1,0.00,5,'active','2019-06-04'),(73,20,40,'	7.7 Se o reporte Ã¡ policia Ã¡ mandatÃ¡rio (e.g. utente menor), o provedor reporta o caso e informa aos tutores do utente a importÃ¢ncia de seguir com a referÃªncia.','7.7',1,0.00,5,'active','2019-06-04'),(74,20,40,'7.8 Os provedores de saÃºde reportam casos de violÃªncia contra crianÃ§a.','7.8',1,0.00,5,'active','2019-06-04'),(75,20,41,'8.1 O Provedor avalia e documenta os sinais vitais da vÃ­tima (especificar sinais vitais )','8.1',1,0.00,5,'active','2019-06-04'),(76,20,41,'8.2 O provedor verifica se o utente estÃ¡ estabilizado e verifica os sinais de perigo e corrige-os imediatamente.','8.2',1,0.00,5,'active','2019-06-04'),(77,20,41,'8.3 O provedor colhe a anamneses detalhada dos pais / ou tutores quando o utente Ã© menor ou nÃ£o pode dar consentimento','8.3',1,0.00,5,'active','2019-06-04'),(78,20,41,'8.4 O provedor faz o tratamento das lesÃµes gÃ©nito-anais de acordo com o protocolo.','8.4',1,0.00,5,'active','2019-06-04'),(79,20,41,'8.5 O provedor faz o tratamento das lesÃµes extragenitas de acordo com o protocolo de avaliaÃ§Ã£o de paciente traumatizado colhe as evidÃªncias mÃ©dico-legal:','8.5',1,0.00,5,'active','2019-06-04'),(80,20,42,'9.1 O provedor demonstra conhecimento, empatia, e habilidades de comunicaÃ§Ã£o com os pacientes: Verifique se o provedor : â€¢ Realiza escuta activa (escuta sem interromper, nÃ£o pressiona o paciente a falar) â€¢ Valida o que o paciente diz (i.e. da importÃ¢ncia ao o que paciente fala) â€¢ Mostra','9.1\r\n',1,0.00,5,'active','2019-06-04'),(81,20,43,'10.1 O provedor solicita a presenÃ§a de um assistente social durante o exame ou durante a interaÃ§Ã£o com a polÃ­cia de uma crianÃ§a/ adolescente vÃ­tima de violÃªncia','10.1',1,0.00,5,'active','2019-06-04'),(82,20,43,'10.2 O provedor mostra empatia, apoio durante o aconselhamento pÃ³s trauma e anamnese','10.2',1,0.00,5,'active','2019-06-04'),(83,20,43,'10.3 Se o provedor suspeita de violÃªncia dentro de casa, colabora para apoiar na proteÃ§Ã£o da crianÃ§a (abrigo temporÃ¡rio ou famÃ­lia substituta)','10.3',1,0.00,5,'active','2019-06-04'),(84,20,43,'10.4 Em caso de menores, o provedor usa tÃ©cnicas de comunicaÃ§Ã£o apropriadas para crianÃ§as. Pergunta de verificaÃ§Ã£o: Podem nomear uma tÃ©cnica de comunicaÃ§Ã£o apropriada para crianÃ§as que usa com os utentes? (Marque SIM se o provedor mencionar trÃªs ou mais exemplos descritos abaixo) â€¢ Vali','10.4\r\n',1,0.00,5,'active','2019-06-04'),(85,20,43,'10.5 O provedor permite que a crianÃ§a se faÃ§a acompanhar por um tutor ou pelos pais durante o exame fÃ­sico. (Desde que nÃ£o sejam perpetradores )','10.5',1,0.00,5,'active','2019-06-04'),(86,20,43,'10.6 O provedor nÃ£o usa espÃ©culo durante o exame gÃ©nito â€“ anal a nÃ£o ser para reparar lesÃµes no canal vaginal sob anestesia adequada para cada caso','10.6',1,0.00,5,'active','2019-06-04'),(87,20,43,'10.7 A US usa bonecas/os, papel, lÃ¡pis apropriados para facilitar a anamnese em crianÃ§as','10.7',1,0.00,5,'active','2019-06-04'),(88,20,44,'11.1O provedor nÃ£o partilha informaÃ§Ãµes relacionadas com o caso com pessoas que nÃ£o estÃ£o envolvidas no tratamento do paciente.','11.1O',1,0.00,5,'active','2019-06-04'),(89,20,44,'11.2 O Provedor permite que apenas pessoal autorizado esteja presente na sala de consulta durante o atendimento. ','11.2 ',1,0.00,5,'active','2019-06-04'),(90,20,44,'11.3 O provedor oferece um local adequado com privacidade e tempo para o paciente despir-se e vestir-se para realizar exame fÃ­sico.','11.3 ',1,0.00,5,'active','2019-06-04'),(91,20,44,'11.4 A US mantÃ©m os registos mÃ©dicos legais, evidÃªncias e outros documentos relevantes com identificadores pessoais (Nome, endereÃ§o etc.) num cacifo fechado Ã¡ chave de acordo com recomendaÃ§Ãµes nacionais.','11.4 ',1,0.00,5,'active','2019-06-04'),(92,20,44,'11.5 A US possui as polÃ­ticas nacionais que orientam o acesso aos registos mÃ©dico legal e forenses','11.5',1,0.00,5,'active','2019-06-04'),(93,20,45,'12.1 O provedor controla a dor durante o exame fÃ­sico de acordo com o protocolo.','12.1',1,0.00,5,'active','2019-06-04'),(94,20,45,'12.2 Provedor oferece medicaÃ§Ã£o para alÃ­vio da dor quando necessÃ¡rio.','12.2',1,0.00,5,'active','2019-06-04'),(95,20,45,'12.3 O provedor mantÃ©m o corpo do utente coberto com lenÃ§Ã³is ou pijama para evitar exposiÃ§Ã£o desnecessÃ¡ria e revitimizaÃ§Ã£o.','12.3',1,0.00,5,'active','2019-06-04'),(96,20,45,'12.4 A US oferece ao utente a possibilidade de escolher sexo do provedor que vai realizar o exame fÃ­sico .','12.4',1,0.00,5,'active','2019-06-04'),(97,20,45,'12.5 A US oferece uma refeiÃ§Ã£o simples apÃ³s exame fÃ­sico','12.5',1,0.00,5,'active','2019-06-04'),(98,20,46,'13.1 Provedor regista na ficha de primeira intenÃ§Ã£o todos achados do exame fÃ­sico e tratamentos realizados de forma detalhada e documentada na ficha de notificaÃ§Ã£o ou diÃ¡rio clÃ­nico e na ficha de primeira intenÃ§Ã£o','13.1',1,0.00,5,'active','2019-06-04'),(99,20,46,'13.2 O provedor usa espÃƒÂ©culo apenas quando apropriado e sÃƒÂ³ quando estÃƒÂ¡ formado para tal.   Pergunta de verificaÃƒÂ§ÃƒÂ£o: Quando vocÃƒÂª usaria um  espÃƒÂ©culo?  Probe: Em que condiÃƒÂ§ÃƒÂµes acha que o uso do espÃƒÂ©culo ÃƒÂ© apropriado? Exemplos de uso inapropriado de espÃƒÂ©culos   Ã¢â‚¬','13.2\r\n',1,0.00,5,'active','2019-06-04'),(100,20,46,'13.3 Se o p paciente tiver sido estrangulado o provedor pede para este retornar a US se sentir subitamente: dificuldade respiratÃƒÂ³ria, alteraÃƒÂ§ÃƒÂ£o do timbre da voz, estresse respiratÃƒÂ³rio atÃƒÂ© 72 H depois da violÃƒÂªncia   Probe: Se o utente tiver sido estrangulado hÃƒÂ¡ alguma recomendaÃƒ','13.3\r\n',1,0.00,5,'active','2019-06-04'),(101,20,46,'13.4 O provedor de saÃƒÂºde usa o anoscÃƒÂ³pio para exame anal se a vÃƒÂ­tima tiver sangramento anal abundante, ou refere para unidade sanitÃƒÂ¡ria com capacidade cirÃƒÂºrgica.','13.4',1,0.00,5,'active','2019-06-04'),(102,20,47,'14.1 O provedor oferece medicamentos orais para contracepÃƒÂ§ÃƒÂ£o de emergÃƒÂªncia (CE) dentro de 120 horas (5 dias) a pÃƒÂ³s o contacto sexual. ','14.1',1,0.00,5,'active','2019-06-04'),(103,20,47,'14.2 Se CE oral nÃƒÂ£o estiver disponÃƒÂ­vel ou se houver alguma contraindicaÃƒÂ§ÃƒÂ£o, um provedor treinado pode inserir dispositivo intrauterino (DIU) sempre que o utente optar com contracepÃƒÂ§ÃƒÂ£o de longa duraÃƒÂ§ÃƒÂ£o  Pergunta de VerificaÃƒÂ§ÃƒÂ£o: Se CE por via oral nÃƒÂ£o estiver disponÃƒÂ','14.2\r\n',1,0.00,5,'active','2019-06-04'),(104,20,47,'14.3 Se o utente desejar contracepÃƒÂ§ÃƒÂ£o de longa duraÃƒÂ§ÃƒÂ£o com DIU o provedor treinado insere o DIU em 120 horas (5 dias) depois do contacto sexual  ','14.3',1,0.00,5,'active','2019-06-04'),(105,20,47,'14.4 Se o utente recusa contracepÃƒÂ§ÃƒÂ£o de emergÃƒÂªncia (CE), o provedor oferece informaÃƒÂ§ÃƒÂ£o sobre importÃƒÂ¢ncia de contracepÃƒÂ§ÃƒÂ£o e seguimento para realizar teste de gravidez. ','14.4',1,0.00,5,'active','2019-06-04'),(106,20,48,'15.1 O provedor oferece aconselhamento e testagem para HIV para vÃƒÂ­timas de violÃƒÂªncia sexual de acordo com os protocolos nacionais ','15.1',1,0.00,5,'active','2019-06-04'),(107,20,48,'15.2 Se o teste do HIV for negativo e nÃƒÂ£o tiverem passado 72H apÃƒÂ³s a ocorrÃƒÂªncia de violÃƒÂªncia sexual, o provedor informa ao utente sobre o factores de risco para infecÃƒÂ§ÃƒÂ£o pelo HIV e determina com o utente se este necessita iniciar PPE.  Pergunta de verificaÃƒÂ§ÃƒÂ£o: Se o utente for','15.2\r\n',1,0.00,5,'active','2019-06-04'),(108,20,48,'15.3 Se o utente for HIV negativo e a violÃƒÂªncia sexual tiver ocorrido dentro de 72H o provedor oferece o a dose comple de PPE para 28 dias de acordo com as recomendaÃƒÂ§ÃƒÂµes nacionais Ex. o provedor da a dose completa de PPE para o utente nÃƒÂ£o ter que voltar ou interromper PPE)','15.3',1,0.00,5,'active','2019-06-04'),(109,20,48,'15.4 Se o utente Ã© uma crianÃ§a e o teste para HIV for negativo e a ocorrÃªncia de violÃªncia sexual for dentro das 72H o provedor oferece o a dose complete pediÃ¡trica de acordo com os protocolos nacionais','15.4 ',1,0.00,5,'active','2019-06-04'),(110,20,48,'15.5 Se PPE for for administrado, o provedor aconselha sobre efeitos colaterais, importÃ¢ncia da adesÃ£o e de completar o ciclo completo de PPE para garantir que a PPE seja efectiva na reduÃ§Ã£o do risco de transmissÃ£o do HIV','15.5 ',1,0.00,5,'active','2019-06-04'),(111,20,48,'15.6 A US possui um sistema de seguimento de utentes fazem PPE e documenta se os utentes terminam o regime de PPE ','15.6',1,0.00,5,'active','2019-06-04'),(112,20,48,'15.7 Se o utente for HIV positivo, Ã© referido para os serviÃ§os TARV. Pergunta de VerificaÃ§Ã£o: Se o utente for HIV positivo para onde refere?','15.7\r\n',1,0.00,5,'active','2019-06-04'),(113,20,48,'15.8 Se o utente recusa fazer teste para HIV ou tem o ser estado desconhecido e se a ocorrÃªncia de violÃªncia foi a menos de 72 Horas, o provedor oferece PPE e encoraja o utente a regressar para aconselhamento e testagem para HIV','15.8',1,0.00,5,'active','2019-06-04'),(114,20,49,'16.1 O provedor oferece a profilaxia ou tratamento para ITS de acordo com as normas nacionais ','16.1',1,0.00,5,'active','2019-06-04'),(115,20,49,'16.2 Provedor oferece vacinaÃ§Ã£o antitetÃ¢nica de acordo com o protocolo nacional.','16.2 ',1,0.00,5,'active','2019-06-04'),(116,20,49,'16.3 O provedor oferece a vacinaÃ§Ã£o para Hepatite B dentro de 24 horas apÃ³s a ocorrÃªncia de violÃªncia sexual de acordo com a elegibilidade do utente de acordo com as recomendaÃ§Ãµes nacionais. (Se a vacinaÃ§Ã£o para hepatite B nÃ£o estÃ¡ disponÃ­vel escreva â€œN/Aâ€ nos comentÃ¡rios e nÃ£o co','16.3 \r\n',1,0.00,5,'active','2019-06-04'),(117,20,50,'17.1 O provedor oferece aconselhamento pÃ³s trauma : escuta activamente, Ã© empÃ¡tico , parafraseia, e identifica necessidades de apoio social','17.1 ',1,0.00,5,'active','2019-06-04'),(118,20,50,'17.2 Provedores tÃƒÂªm conhecimento sobre serviÃƒÂ§os de saÃƒÂºde mental a serem oferecidos de acordo com as recomendaÃƒÂ§ÃƒÂµes nacionais or OMS . ','17.2  ',1,0.00,5,'active','2019-06-04'),(119,20,50,'17.3 Provedor oferece referÃƒÂªncias para seguimento psicolÃƒÂ³gico de longo termo OU atravÃƒÂ©s dos grupos de apoio ','17.3 ',1,0.00,5,'active','2019-06-04'),(120,21,51,'18.1 O provedor realiza avaliaÃƒÂ§ÃƒÂ£o mÃƒÂ©dico-legal e coleta evidencias se as seguintes condiÃƒÂ§ÃƒÂµes estÃƒÂ£o criadas:  Ã¢â‚¬Â¢	O provedor recebeu treinamento especÃƒÂ­fico para avaliaÃƒÂ§ÃƒÂ£o mÃƒÂ©dico-legal   . Ã¢â‚¬Â¢	A US tem um programa de supervisÃƒÂ£o funcional que inclui --pÃƒÂ³s tre','18.1 \r\n',1,0.00,5,'active','2019-06-04'),(121,21,51,'18.2 O provedor que foi treinado para realizar a avaliaÃƒÂ§ÃƒÂ£o mÃƒÂ©dico-legal colhe a histÃƒÂ³ria do paciente ou tutor acordo com as recomendaÃƒÂ§ÃƒÂµes nacionais ','18.2 ',1,0.00,5,'active','2019-06-04'),(122,21,51,'18.3 O provedor treinado colhe as evidÃƒÂªncias forenses e documenta de forma apropriada as lesÃƒÂµes dentro de 5 dias depois da ocorrÃƒÂªncia de violÃƒÂªncia sexual ou a qualquer momento da ---de  violÃƒÂªncia baseada na histÃƒÂ³ria fornecida pelo utente que incluem: Ã¢â‚¬Â¢	Zaragatoa vaginal, peri','18.3 \r\n',1,0.00,5,'active','2019-06-04'),(123,21,52,'19.1 O provedor estÃ¡ consciente sobre a importÃ¢ncia das evidÃªncias forenses para julgamento dos casos.','19.1',1,0.00,5,'active','2019-06-04'),(124,21,52,'19.2 Os provedores usam um protocolo estandarizado para colher, selar e armazenar evidÃªncias forenses','19.2 ',1,0.00,5,'active','2019-06-04'),(125,21,52,'19.3 Os provedores estÃ£o alerta a sinais mais frequentes de laceraÃ§Ãµes, eritemas que indicam violÃªncia .','19.3',1,0.00,5,'active','2019-06-04'),(126,21,52,'19.4 Provedor faz questÃµes para clarificar e entender as lesÃµes observadas que nÃ£o condizem com a histÃ³ria clÃ­nica','19.4',1,0.00,5,'active','2019-06-04'),(127,21,52,'19.5 O provedor usa equipamento de proteÃ§Ã£o individual (barrete, mascara cirÃºrgica, luvas, avental, sapatos fechados) quando realiza o exame mÃ©dico-legal.','19.5',1,0.00,5,'active','2019-06-04'),(128,21,52,'19.6 O provedor colhe evidÃªncias forenses para violÃªncia sexual dentro de 5 dias.','19.6',1,0.00,5,'active','2019-06-04'),(129,21,52,'19.7 O provedor realiza a colecta de amostras forenses de acordo com as recomendaÃ§Ãµes nacionais (Guia de atendimento Ã¡ vÃ­tima de violÃªncia e ficha de primeira intenÃ§Ã£o)','19.7',1,0.00,5,'active','2019-06-04'),(130,21,52,'19.8 O provedor mantem a cadeia de custÃ³dia para seguranÃ§a, colecta, armazenamento e transporte de evidÃªncias e foto documentaÃ§Ã£o.','19.8',1,0.00,5,'active','2019-06-04'),(131,21,52,'19.9 A Unidade SanitÃ¡ria tem sistema para minimizar o nÃºmero de pessoas que maneja a cadeia de custÃ³dia.','19.9',1,0.00,5,'active','2019-06-04'),(132,21,52,'19.10 A US tem recursos disponÃ­veis para apoiar e capacitar o provedor para testemunhar em tribunal caso seja solicitado','19.10 ',1,0.00,5,'active','2019-06-04'),(133,21,52,'19.11 Se o utente da o consentimento, o provedor fornece foto documentaÃƒÂ§ÃƒÂ£o das lesÃƒÂµes exolicando que as fotos sÃƒÂ£o confidenciais para que o paciente tenha o cuidado clinico adequado para o uso no tribunal como prova.   (NOTA : O uso de telefones celulares pessoais nÃƒÂ£o ÃƒÂ© recomendado ','19.11\r\n',1,0.00,5,'active','2019-06-04'),(134,22,53,'20.1 O provedor informa ao utente sobre a disponibilidade de serviÃƒÂ§os e faz as referÃƒÂªncias escritas para os serviÃƒÂ§os relevantes para seguimento da vÃƒÂ­tima. (Incluindo serviÃƒÂ§os baseados na comunidade):  Meios de verificaÃƒÂ§ÃƒÂ£o: Se a vÃƒÂ­tima de violÃƒÂªncia precisa de apoio para alÃ','20.1 ',1,0.00,5,'active','2019-06-04'),(135,22,53,'20.2 Se a US nÃƒÂ£o tem um laboratÃƒÂ³rio o provedor refere para uma US com capacidade laboratorial  Se a US nÃƒÂ£o tem laboratÃƒÂ³rio, marque N/A no comentÃƒÂ¡rio e nÃƒÂ£o coloque #','20.2\r\n',1,0.00,5,'active','2019-06-04'),(136,22,53,'20.3 A US tem guias de referÃƒÂªncia e contra referencia  para documentar as referÃƒÂªncias realizadas ','20.3 ',1,0.00,5,'active','2019-06-04'),(137,22,53,'20.4 A US informa os actores chave (policia, organizaÃƒÂ§ÃƒÂµes comunitÃƒÂ¡rias etc.) acerca dos serviÃƒÂ§os que esta oferece e horÃƒÂ¡rio de funcionamento e informa que as vÃƒÂ­timas sÃƒÂ£o bem-vindas mesmo sem referÃƒÂªncia da polÃƒÂ­cia ou que precisam ter seguimento jurÃƒÂ­dico - legal. ','20.4  ',1,0.00,5,'active','2019-06-04'),(138,22,53,'20.5 A US tem uma lista de serviÃƒÂ§os de apoio que tenham sido mapeados a nÃƒÂ­vel local/ distrital /provincial ','20.5',1,0.00,5,'active','2019-06-04'),(139,22,53,'20.6 A US actualiza a lista de referÃªncias pelo menos uma (1) vez por ano ligando para os nÃºmeros das listas ou visitando os locais de referÃªncia para confirmar a sua viabilidade','20.6',1,0.00,5,'active','2019-06-04'),(140,22,54,'21.1 O provedor fornece maior informaÃ§Ã£o possÃ­vel para todas referÃªncias necessÃ¡rias para o utente na visita inicial','21.1',1,0.00,5,'active','2019-06-04'),(141,22,54,'21.2 A US tem serviÃƒÂ§os de seguimento do utente vÃƒÂ­tima de violÃƒÂªncia. ','21.2 ',1,0.00,5,'active','2019-06-04'),(142,22,54,'21.3 O provedor responsÃƒÂ¡vel pelo seguimento do utente monitora a condiÃƒÂ§ÃƒÂ£o clinica, tratamento e profilaxia pÃƒÂ³s exposiÃƒÂ§ÃƒÂ£o, contracepÃƒÂ§ÃƒÂ£o de emergÃƒÂªncia testagem em HIV e oferece aconselhamento de seguimento de acordo com as necessidades do utente. ','21.3 ',1,0.00,5,'active','2019-06-04'),(143,22,54,'21.4 O provedor pede consentimento para seguimento via telefone ou por SMS e documenta o nÃºmero no processo clinico de forma privada.','21.4',1,0.00,5,'active','2019-06-04'),(144,22,54,'21.5 A US tem disponÃ­vel telefone ou crÃ©dito para contactos telefÃ³nicos para seguimento de pacientes que ofereÃ§am consentimento','21.5',1,0.00,5,'active','2019-06-04'),(145,22,54,'21.6 A US tem ponto focal para apoiar a coordenaÃ§Ã£o e referÃªncias na rede multisectorial','21.6',1,0.00,5,'active','2019-06-04'),(146,22,54,'21.7 O provedor ou ponto focal realiza o seguimento do utente de acordo com as recomendaÃ§Ãµes nacionais ou no mÃ­nimo, um mÃªs apos o incidente e novamente apos 2 meses.','21.7',1,0.00,5,'active','2019-06-04'),(147,22,54,'21.8 O provedor encoraja o seguimento atravÃ©s de estratÃ©gias como: telefonemas, SMS, visitas domiciliÃ¡rias, apoio no transporte, acompanhamento ao serviÃ§o se o paciente consentiu ser contactado','21.8',1,0.00,5,'active','2019-06-04'),(148,30,55,'22.1 Os provedores recebem (formaÃ§Ã£o contÃ­nua relevante para exercerem seus papÃ©is e responsabilidades. A formaÃ§Ã£o deve incluir os seguintes elementos: â€¢ Pedir consentimento ou assentimento para cuidados pÃ³s violÃªncia â€¢ Oferece cuidados na porta de entrada (Ouvir, Inquirir, Validar,','22.1\r\n',1,0.00,5,'active','2019-06-04'),(149,30,56,'23.1 A US realiza a actualizaÃ§Ã£o em serviÃ§o dos provedores de cuidados pÃ³s VBG pelo menos uma vez por ano.','23.1',1,0.00,5,'active','2019-06-04'),(150,30,56,'23.2 Provedores recebem retorno verbal ou escrito apÃ³s as supervisÃµes','23.2',1,0.00,5,'active','2019-06-04'),(151,30,56,'23.3 A US tem pelo menos um mecanismo anÃ³nimo para reporte o nÃ­vel de satisfaÃ§Ã£o dos utentes (Ex. inquÃ©ritos de satisfaÃ§Ã£o dos utentes, feed back da comunidade, caixa de sugestÃµes e reclamaÃ§Ãµes, linha verde etc.)','23.3',1,0.00,5,'active','2019-06-04'),(152,30,56,'23.4 A US realiza formaÃ§Ã£o em serviÃ§o e expande as competÃªncias para outros provedores, realiza encontros de equipe e outras actividades de formaÃ§Ã£o continua Exemplos : â€¢ RevisÃ£o de pares â€¢ SupervisÃ£o mensal para discutir casos, abordar o trauma que os provedores experimentam receber m','23.4',1,0.00,5,'active','2019-06-04'),(153,30,56,'23.5 A US tem mecanismos para apoiar e promover o auto cuidado para provedores que possam apresentar sinais de trauma que resulte dos cuidados Ã¡ vÃ­tima.','23.5',1,0.00,5,'active','2019-06-04'),(154,31,57,'24.1 A US tem as orientaÃ§Ãµes e polÃ­ticas nacionais para atendimento: â€¢ Guia para atendimento Ã¡ vÃ­tima de violÃªncia â€¢ Algoritmos e ajudas de trabalho (Job AID): ï‚§ Aconselhamento pÃ³s violÃªncia ï‚§ Cuidados clÃ­nicos pÃ³s violÃªncia sexual: PPE dosagem e prescriÃ§Ã£o, ContracepÃ§Ã£o de','24.1\r\n',1,0.00,5,'active','2019-06-04'),(155,31,57,'24.2 O provedores conhecem u usam estas normas ','24.2',1,0.00,5,'active','2019-06-04'),(156,32,58,'25.1 A US trabalha com outros serviÃ§os para integrar o rastreio de VBG nos seus programas como HIV, Consulta PrÃ© Natal, Planeamento Familiar (Desde que tenham pelo menos 60% de padrÃµes observados.)','25.1',1,0.00,5,'active','2019-06-04'),(157,32,58,'25.2 A US tem ligaÃ§Ã£o com a comunidade para aumentar a consciÃªncia sobre VBG, serviÃ§os de resposta disponÃ­veis ou a US conduz serviÃ§os moveis para trabalhar com as comunidades sobre VBG.','25.2',1,0.00,5,'active','2019-06-04'),(158,33,59,'26.1 O provedor recolhe informaÃ§Ã£o relevante sobre os cuidados pÃ³s VBG disponÃ­veis: â€¢ ProveniÃªncia â€¢ Sexo do utente e do perpetrador (s) â€¢ Idade do utente e perpetrador â€¢ NÃºmero de perpetradores â€¢ RelaÃ§Ã£o com o perpetrador â€¢ Tempo e data da violÃªncia â€¢ Data e tempo do ate','26.1',1,0.00,5,'active','2019-06-04'),(159,33,59,'26.2 Os provedores registam informaÃ§Ã£o completa nas fichas de registo','26.2',1,0.00,5,'active','2019-06-04'),(160,33,60,'27.1 Os provedores sÃ£o treinados a colher e regista os dados','27.1',1,0.00,5,'active','2019-06-04'),(161,33,60,'27.2 A US tem um Sistema de coleta anÃ¡lise de dados e tendÃªncias de VBG (NÃºmero de casos, tipo de violÃªncia, Idade dos utentes e serviÃ§os utilizados etc) e o sistema Ã© usado.','27.2',1,0.00,5,'active','2019-06-04'),(162,33,60,'27.3 O ponto focal / gestor da US verifica os dados de forma periÃ³dica para avaliar a consistÃªncia e qualidade de dados.','27.3',1,0.00,5,'active','2019-06-04'),(163,33,61,'28.1 Os dados VBG sÃ£o desagregados por sexo ','28.1',0,0.00,5,'active','2019-06-04'),(164,33,61,'28.2 Os dados de VBG sÃ£o desagregados em idades (0-4, 5-9, 10-14, 15-19, 20-24, 25-29, 30-49, 50-59, 60+)','28.2 ',0,0.00,5,'active','2019-06-04'),(165,33,61,'28.3 Os dados VBG sÃ£o desagregados por tipo de violÃªncia e se Ã© violÃªncia por parceiro Ã­ntimo: â€¢ ViolÃªncia sexual pelo parceiro ou nÃ£o parceiro â€¢ ViolÃªncia fÃ­sica pelo parceiro ou nÃ£o parceiro â€¢ ViolÃªncia psicolÃ³gica pelo parceiro ou nÃ£o parceiro','28.3\r\n',0,0.00,5,'active','2019-06-04'),(166,33,61,'28.4 Os dados de VBG inclui numero de vÃ­timas que receberam PPE dentro de 72 horas','28.4',0,0.00,5,'active','2019-06-04'),(167,33,61,'28.5 Os dados de VBG inclui numero de pessoas que completaram o regime de PPE ','28.5',0,0.00,5,'active','2019-06-04'),(168,33,61,'28.6 Nos dados de VBG esta descrito se a vÃ­tima faz parte de alguma populaÃ§Ã£o chave ou vulnerÃ¡vel ( Ex. pessoa com deficiÃªncia )(completar quem Ã© a populaÃ§ao chave)','28.6',0,0.00,5,'active','2019-06-04'),(169,33,61,'28.7 Os dados de VBG sÃ£o partilhados com o programa de cuidados de tratamento para HIV atravÃ©s de identificadores Ãºnicos a prontuÃ¡rios mÃ©dicos compartilhado.','28.7',0,0.00,5,'active','2019-06-04'),(170,33,61,'28.8 Os dados de VBG sem identificadores estÃ£o disponÃ­veis para a equipe de gestÃ£o e da equipe multisectorial (Sempre que for prudente e seguro)','28.8',0,0.00,5,'active','2019-06-04'),(171,33,61,'28.9 Planos de mudanÃ§a baseados nas lacunas observadas nÃ£o feitos apos a revisÃ£o de dados. ','28.9',0,0.00,5,'active','2019-06-04');
/*!40000 ALTER TABLE `sa_criterion_verification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_district`
--

DROP TABLE IF EXISTS `sa_district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL,
  `district_name` varchar(250) NOT NULL,
  `district_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_district`
--

LOCK TABLES `sa_district` WRITE;
/*!40000 ALTER TABLE `sa_district` DISABLE KEYS */;
INSERT INTO `sa_district` VALUES (2,2,'Chokwe','active'),(3,1,'Matola','active'),(4,9,'KaMubukwane','active'),(5,9,'KaMpfumu','active'),(6,9,'KaMaxaquene','active'),(7,9,'KaMavota','active'),(8,9,'KaTembe','active'),(9,9,'KaNyaka','active'),(10,9,'Nlhamankulu','active');
/*!40000 ALTER TABLE `sa_district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_evaluation_criterion_order`
--

DROP TABLE IF EXISTS `sa_evaluation_criterion_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_evaluation_criterion_order` (
  `evaluation_order_criterion_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(250) NOT NULL,
  `item_name` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL DEFAULT '0',
  `item_unit` varchar(30) NOT NULL DEFAULT '0',
  `evaluation_order_id` int(11) NOT NULL,
  `coment` text NOT NULL,
  `user_id` varchar(11) NOT NULL,
  PRIMARY KEY (`evaluation_order_criterion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_evaluation_criterion_order`
--

LOCK TABLES `sa_evaluation_criterion_order` WRITE;
/*!40000 ALTER TABLE `sa_evaluation_criterion_order` DISABLE KEYS */;
INSERT INTO `sa_evaluation_criterion_order` VALUES (8,'5cff989939921',38,1,'1',127,'Array','0'),(9,'5cff99cb3cf53',46,0,'1',129,'Array','0'),(10,'5cff9e1051de7',38,1,'1',133,'Array','0'),(11,'5cff9e63d0296',38,1,'1',133,'nao','0'),(12,'5cff9ea00483f',38,1,'1',134,'','0'),(13,'5cff9ea00483f',39,1,'1',134,'sim','0'),(14,'5cff9ff167069',38,1,'1',136,'sim','0'),(15,'5cffb0305b515',46,1,'1',138,'',''),(16,'5cffb0305b515',47,1,'1',138,'',''),(17,'5d0037a720529',46,1,'1',150,'',''),(18,'5d0037df9191b',46,1,'1',151,'',''),(19,'5d00393776ec7',46,1,'0',157,'',''),(20,'5d003d626ccc5',46,1,'1',167,'',''),(21,'5d003d96a0da4',46,1,'0',168,'',''),(22,'5d003ebda1229',46,1,'0',173,'',''),(23,'5d003fa091bea',46,1,'0',174,'',''),(24,'5d0040693d51f',46,0,'1',178,'',''),(25,'5d00413f91316',46,0,'0',179,'',''),(26,'5d00419f08499',46,1,'0',180,'',''),(27,'5d00420ee7b2a',46,1,'',181,'',''),(28,'5d0042f8817c6',46,1,'',183,'','2'),(29,'5d00446352230',38,0,'',185,'','2'),(30,'5d00446352230',39,1,'',185,'','2'),(31,'5d00446352230',46,1,'',185,'','2'),(32,'5d0044f913e77',38,1,'',186,'sim','2'),(33,'5d0044f913e77',39,0,'',186,'nao','2'),(34,'5d0044f913e77',40,1,'',186,'sim','2'),(35,'5d00454bce4ec',55,1,'',187,'','2'),(36,'5d00454bce4ec',56,1,'',187,'','2'),(37,'5d00454bce4ec',57,1,'',187,'','2'),(38,'5d00454bce4ec',58,1,'',187,'','2'),(39,'5d0045871516d',59,1,'',188,'','2'),(40,'5d0045871516d',60,1,'',188,'','2'),(41,'5d0045871516d',61,1,'',188,'','2'),(42,'5d0045871516d',62,1,'',188,'','2'),(43,'5d0045871516d',63,1,'',188,'','2'),(44,'5d0045cbe1bef',38,0,'',189,'nao','2'),(45,'5d004616979c6',38,0,'',190,'nao','2'),(46,'5d004616979c6',39,0,'',190,'nao','2'),(47,'5d004616979c6',40,0,'',190,'nao','2'),(48,'5d004616979c6',41,0,'',190,'nao','2'),(49,'5d004616979c6',42,0,'',190,'nao','2'),(50,'5d004616979c6',43,0,'',190,'nao','2'),(51,'5d004616979c6',44,0,'',190,'nao','2'),(52,'5d004616979c6',45,0,'',190,'nao','2'),(53,'5d00c6c5eef4d',46,1,'',197,'','2'),(54,'5d0280e477b95',46,1,'',205,'','2'),(55,'5d050efb9c3dd',46,1,'',204,'','2'),(56,'5d050f22bdcea',46,1,'',204,'','2'),(57,'5d0a8ee8a0abd',38,1,'',206,'sim','2'),(58,'5d0a90829a4a5',46,1,'',210,'','2'),(59,'5d0a90829a4a5',47,1,'',210,'','2'),(60,'5d0a90829a4a5',48,1,'',210,'','2'),(61,'5d0a90829a4a5',49,1,'',210,'','2'),(62,'5d6e805aaf379',38,1,'',277,'','2'),(63,'5d6e805aaf379',46,1,'',277,'','2'),(64,'5d713410b24d1',38,0,'',285,'','2'),(65,'5d713410b24d1',39,0,'',285,'','2'),(66,'5d713410b24d1',40,0,'',285,'','2'),(67,'5d713410b24d1',46,1,'',285,'','2'),(68,'5d713410b24d1',75,1,'',285,'','2'),(69,'5d713410b24d1',76,1,'',285,'','2'),(70,'5d713410b24d1',77,1,'',285,'','2'),(71,'5d713410b24d1',78,1,'',285,'','2'),(72,'5d713410b24d1',79,0,'',285,'','2'),(73,'5d713575ba79f',38,0,'',286,'','2'),(74,'5d713575ba79f',39,0,'',286,'','2'),(75,'5d713575ba79f',40,0,'',286,'','2'),(76,'5d713575ba79f',41,0,'',286,'','2'),(77,'5d713575ba79f',42,0,'',286,'','2'),(78,'5d713575ba79f',43,0,'',286,'','2'),(79,'5d713575ba79f',44,0,'',286,'','2'),(80,'5d713575ba79f',45,0,'',286,'','2'),(81,'5d71361d86cfb',38,0,'',287,'','2'),(82,'5d71361d86cfb',39,0,'',287,'','2'),(83,'5d71361d86cfb',40,0,'',287,'','2'),(84,'5d71361d86cfb',41,1,'',287,'','2'),(85,'5d71361d86cfb',42,1,'',287,'','2'),(86,'5d71361d86cfb',43,1,'',287,'','2'),(87,'5d71361d86cfb',44,1,'',287,'','2'),(88,'5d71361d86cfb',45,0,'',287,'','2'),(89,'5d7570c73441b',140,1,'',294,'','2'),(90,'5d7570c73441b',141,1,'',294,'','2'),(91,'5d7570c73441b',142,1,'',294,'','2'),(92,'5d78faca7c366',163,1,'',345,'','2'),(93,'5d78faca7c366',164,1,'',345,'','2'),(94,'5d78faca7c366',165,1,'',345,'','2'),(95,'5d78faca7c366',166,1,'',345,'','2'),(96,'5d78fb321979a',163,1,'',345,'','2'),(97,'5d78fb321979a',164,1,'',345,'','2'),(98,'5d78fb321979a',165,1,'',345,'','2'),(99,'5d78fb321979a',166,1,'',345,'','2'),(100,'5d78fb4041e3e',163,1,'',345,'','2'),(101,'5d78fb4041e3e',164,1,'',345,'','2'),(102,'5d78fb4041e3e',165,1,'',345,'','2'),(103,'5d78fb4041e3e',166,1,'',345,'','2'),(104,'5d79244d32fd2',163,1,'',359,'','2'),(105,'5d79244d32fd2',164,1,'',359,'','2'),(106,'5d79244d32fd2',165,1,'',359,'','2'),(107,'5d79244d32fd2',166,1,'',359,'','2'),(108,'5d796befb1fca',46,1,'',362,'','2'),(109,'5d796cac333dd',38,1,'',363,'','2'),(110,'5d796d0280b1f',38,1,'',364,'','2'),(111,'5d796d0280b1f',39,0,'',364,'','2'),(112,'5d7a3eb1b9580',38,0,'',396,'','2'),(113,'5d7a3f19067f6',46,1,'',397,'','2'),(114,'5d7a3fb3c612a',47,1,'',398,'','2'),(115,'5d7f62fa44903',46,1,'',0,'','2'),(116,'5d7f62fa44903',47,1,'',0,'','2'),(117,'5d7f62fa44903',48,1,'',0,'','2'),(118,'5d7f62fa44903',49,1,'',0,'','2'),(119,'5d7f62fa44903',50,1,'',0,'','2'),(120,'5d8233920322d',38,1,'',1,'','5'),(121,'5d82363427d03',38,1,'',6,'','5'),(122,'5d82363427d03',39,1,'',6,'','5'),(123,'5d82363427d03',40,1,'',6,'','5'),(124,'5d82363427d03',41,1,'',6,'','5'),(125,'5d82363427d03',42,1,'',6,'','5'),(126,'5d823b1413a55',38,1,'',11,'','5'),(127,'5d823b1413a55',39,0,'',11,'','5'),(128,'5d823b1413a55',40,1,'',11,'','5'),(129,'5d823b1413a55',41,1,'',11,'','5'),(130,'5d823b948e9b5',46,0,'',12,'','5');
/*!40000 ALTER TABLE `sa_evaluation_criterion_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_evaluation_order`
--

DROP TABLE IF EXISTS `sa_evaluation_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_evaluation_order` (
  `evaluation_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `evaluation_order_district` int(11) NOT NULL,
  `evaluation_order_total` double(10,2) DEFAULT '0.00',
  `evaluation_order_date` varchar(50) NOT NULL,
  `evaluation_order_us` varchar(255) DEFAULT NULL,
  `evaluation_order_type` text,
  `period_status` enum('quarterly','semiannual') NOT NULL,
  `period_type` int(11) NOT NULL,
  `evaluation_equipe_clinic` varchar(200) NOT NULL,
  `evaluation_order_status` varchar(100) NOT NULL DEFAULT 'active',
  `evaluation_order_created_date` datetime DEFAULT NULL,
  `place_affection_id` int(11) NOT NULL,
  PRIMARY KEY (`evaluation_order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_evaluation_order`
--

LOCK TABLES `sa_evaluation_order` WRITE;
/*!40000 ALTER TABLE `sa_evaluation_order` DISABLE KEYS */;
INSERT INTO `sa_evaluation_order` VALUES (1,5,3,0.00,' 2019-09-18',NULL,'2','quarterly',3,'Ernesto Mahumane','active','2019-09-18 00:00:00',1),(2,5,3,0.00,' 2019-09-18',NULL,'2','quarterly',4,'','active','2019-09-18 00:00:00',1),(3,5,3,0.00,' 2019-09-18',NULL,'2','quarterly',4,'','active','2019-09-18 00:00:00',1),(4,5,3,0.00,' 2019-09-18',NULL,'2','quarterly',3,'Ernesto Mahumane','active','2019-09-18 00:00:00',1),(5,5,3,0.00,' 2019-09-18',NULL,'2','quarterly',3,'Ernesto Mahumane','active','2019-09-18 00:00:00',1),(6,5,3,0.00,' 2019-09-18',NULL,'1','quarterly',3,'1234','active','2019-09-18 00:00:00',1),(7,5,3,0.00,' 2019-09-18',NULL,'1','quarterly',4,'Ernesto Mahumane','active','2019-09-18 00:00:00',1),(8,5,3,0.00,' 2019-09-18',NULL,'1','quarterly',4,'Ernesto Mahumane','active','2019-09-18 00:00:00',1),(9,5,3,0.00,' 2019-09-18',NULL,'1','quarterly',4,'Ernesto Mahumane','active','2019-09-18 00:00:00',1),(10,5,3,0.00,' 2019-09-18',NULL,'1','quarterly',4,'Ernesto Mahumane','active','2019-09-18 00:00:00',1),(11,5,3,0.00,' 2019-09-18',NULL,'1','quarterly',4,'Ernesto Mahumane','active','2019-09-18 00:00:00',1),(12,5,3,0.00,' 2019-09-18',NULL,'2','quarterly',4,'Cololo','active','2019-09-18 00:00:00',1),(13,5,3,0.00,' 2019-09-18',NULL,'1','quarterly',3,'Ernesto Mahumane','active','2019-09-18 00:00:00',1),(14,5,3,0.00,' 2019-09-18',NULL,'1','quarterly',3,'Ernesto Mahumane','active','2019-09-18 00:00:00',1),(15,5,3,0.00,' 2019-09-18',NULL,'2','quarterly',3,'Ernesto Mahumane','active','2019-09-18 00:00:00',1),(16,5,3,0.00,' 2019-09-18',NULL,'2','quarterly',3,'Ernesto Mahumane','active','2019-09-18 00:00:00',1),(17,5,3,0.00,' 2019-09-18',NULL,'2','quarterly',4,'Ernesto Mahumane2','active','2019-09-18 00:00:00',1),(18,2,3,0.00,' 2019-09-19',NULL,'2','quarterly',3,'','active','2019-09-19 00:00:00',1),(19,3,3,0.00,' 2019-09-23',NULL,'1','quarterly',3,'Ana Baptista ','active','2019-09-23 00:00:00',1),(20,2,3,0.00,' 2019-09-28',NULL,'2','quarterly',3,'Nacarapa','active','2019-09-28 00:00:00',1),(21,5,3,0.00,' 2019-10-01',NULL,'2','quarterly',3,'smi','active','2019-10-01 00:00:00',1),(22,2,3,0.00,' 2019-10-10',NULL,'2','quarterly',3,'','active','2019-10-10 00:00:00',1),(23,5,3,0.00,' 2019-10-16',NULL,'1','quarterly',3,'Policia','active','2019-10-16 00:00:00',1),(24,5,3,0.00,' 2019-10-19',NULL,'1','quarterly',3,'Enfermeiro','active','2019-10-19 00:00:00',1),(25,5,3,0.00,' 2019-10-19',NULL,'2','quarterly',4,'Enfermeiro','active','2019-10-19 00:00:00',1),(26,5,3,0.00,' 2019-10-19',NULL,'2','quarterly',4,'Enfermeiro','active','2019-10-19 00:00:00',1),(27,5,3,0.00,' 2019-10-29',NULL,'2','quarterly',3,'Enfermeiro','active','2019-10-29 00:00:00',1),(28,5,3,0.00,' 2019-10-29',NULL,'2','quarterly',3,'Enfermeiro,policia','active','2019-10-29 00:00:00',1),(29,5,3,0.00,' 2020-07-22',NULL,'1','quarterly',4,'Ernesto Mahumane2','active','2020-07-22 00:00:00',1);
/*!40000 ALTER TABLE `sa_evaluation_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_evaluation_order_criterion2`
--

DROP TABLE IF EXISTS `sa_evaluation_order_criterion2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_evaluation_order_criterion2` (
  `evaluation_order_criterion_id` int(11) NOT NULL,
  `evaluation_order_id` int(11) NOT NULL,
  `criterion_verification_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_evaluation_order_criterion2`
--

LOCK TABLES `sa_evaluation_order_criterion2` WRITE;
/*!40000 ALTER TABLE `sa_evaluation_order_criterion2` DISABLE KEYS */;
INSERT INTO `sa_evaluation_order_criterion2` VALUES (0,49,38,1),(0,50,38,0),(0,51,38,1),(0,52,38,1),(0,52,38,0),(0,52,38,1),(0,53,38,1),(0,53,39,0),(0,53,41,1),(0,53,44,0),(0,53,45,1),(0,54,38,1),(0,55,38,1),(0,55,39,1),(0,55,41,1),(0,55,42,1),(0,55,43,1),(0,55,44,1),(0,55,45,1);
/*!40000 ALTER TABLE `sa_evaluation_order_criterion2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_evaluation_type`
--

DROP TABLE IF EXISTS `sa_evaluation_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_evaluation_type` (
  `evaluation_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `evaluation_type_name` varchar(250) NOT NULL,
  `evaluation_type_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`evaluation_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_evaluation_type`
--

LOCK TABLES `sa_evaluation_type` WRITE;
/*!40000 ALTER TABLE `sa_evaluation_type` DISABLE KEYS */;
INSERT INTO `sa_evaluation_type` VALUES (1,'Interna','active'),(2,'Externa','active');
/*!40000 ALTER TABLE `sa_evaluation_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_instance`
--

DROP TABLE IF EXISTS `sa_instance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_instance` (
  `instance_id` int(11) NOT NULL AUTO_INCREMENT,
  `instance_name` varchar(250) NOT NULL,
  `instance_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`instance_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_instance`
--

LOCK TABLES `sa_instance` WRITE;
/*!40000 ALTER TABLE `sa_instance` DISABLE KEYS */;
INSERT INTO `sa_instance` VALUES (1,'US','active');
/*!40000 ALTER TABLE `sa_instance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_intervention_plan`
--

DROP TABLE IF EXISTS `sa_intervention_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_intervention_plan` (
  `intervention_plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `area_padrao_id` int(11) NOT NULL,
  `criterion_verification_id` int(11) NOT NULL,
  `intervention_plan_name` varchar(300) NOT NULL,
  `intervention_plan_description` text NOT NULL,
  `intervention_plan_status` enum('active','inactive') NOT NULL,
  `intervention_plan_date` date NOT NULL,
  PRIMARY KEY (`intervention_plan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_intervention_plan`
--

LOCK TABLES `sa_intervention_plan` WRITE;
/*!40000 ALTER TABLE `sa_intervention_plan` DISABLE KEYS */;
INSERT INTO `sa_intervention_plan` VALUES (1,17,34,38,'Formacao','formacao','active','2019-06-27'),(2,17,34,39,'Compra de Material','Compra de material','active','2019-06-27');
/*!40000 ALTER TABLE `sa_intervention_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_meio_verificacao`
--

DROP TABLE IF EXISTS `sa_meio_verificacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_meio_verificacao`
--

LOCK TABLES `sa_meio_verificacao` WRITE;
/*!40000 ALTER TABLE `sa_meio_verificacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `sa_meio_verificacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_period`
--

DROP TABLE IF EXISTS `sa_period`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_period` (
  `period_id` int(11) NOT NULL AUTO_INCREMENT,
  `period_name` varchar(250) NOT NULL,
  `period_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`period_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_period`
--

LOCK TABLES `sa_period` WRITE;
/*!40000 ALTER TABLE `sa_period` DISABLE KEYS */;
INSERT INTO `sa_period` VALUES (4,'T2','active'),(3,'T1','active');
/*!40000 ALTER TABLE `sa_period` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_period_plan`
--

DROP TABLE IF EXISTS `sa_period_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_period_plan` (
  `period_id` int(11) NOT NULL AUTO_INCREMENT,
  `period_name` varchar(250) NOT NULL,
  `period_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`period_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_period_plan`
--

LOCK TABLES `sa_period_plan` WRITE;
/*!40000 ALTER TABLE `sa_period_plan` DISABLE KEYS */;
INSERT INTO `sa_period_plan` VALUES (1,'Imediato','active'),(2,'30 Dias','active'),(3,'60 Dias','active');
/*!40000 ALTER TABLE `sa_period_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_place_affection`
--

DROP TABLE IF EXISTS `sa_place_affection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_place_affection` (
  `place_affection_id` int(11) NOT NULL AUTO_INCREMENT,
  `place_affection_name` varchar(250) NOT NULL,
  `place_affection_status` enum('active','inactive') NOT NULL,
  `service_id` int(11) NOT NULL,
  `sub_service_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `bairro_id` int(11) NOT NULL,
  `instance_id` int(11) NOT NULL,
  PRIMARY KEY (`place_affection_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_place_affection`
--

LOCK TABLES `sa_place_affection` WRITE;
/*!40000 ALTER TABLE `sa_place_affection` DISABLE KEYS */;
INSERT INTO `sa_place_affection` VALUES (1,'HCM','active',1,1,1,1,3,1,1);
/*!40000 ALTER TABLE `sa_place_affection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_province`
--

DROP TABLE IF EXISTS `sa_province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `province_name` varchar(250) NOT NULL,
  `province_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_province`
--

LOCK TABLES `sa_province` WRITE;
/*!40000 ALTER TABLE `sa_province` DISABLE KEYS */;
INSERT INTO `sa_province` VALUES (1,1,'Maputo','active'),(2,1,'Gaza','active'),(3,1,'Inhambane','active'),(4,1,'Sofala','active'),(5,1,'Manica','active'),(6,1,'Zambezia','active'),(7,1,'Nampula','active'),(8,1,'Tete','active'),(9,1,'Maputo Cidade','active'),(10,1,'Niassa','active'),(11,1,'Cabo Delgado','active');
/*!40000 ALTER TABLE `sa_province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_responsible_plan`
--

DROP TABLE IF EXISTS `sa_responsible_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_responsible_plan` (
  `responsible_plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `area_padrao_id` int(11) NOT NULL,
  `criterion_verification_id` int(11) NOT NULL,
  `responsible_plan_name` varchar(300) NOT NULL,
  `responsible_plan_description` text NOT NULL,
  `responsible_plan_status` enum('active','inactive') NOT NULL,
  `responsible_plan_date` date NOT NULL,
  PRIMARY KEY (`responsible_plan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_responsible_plan`
--

LOCK TABLES `sa_responsible_plan` WRITE;
/*!40000 ALTER TABLE `sa_responsible_plan` DISABLE KEYS */;
INSERT INTO `sa_responsible_plan` VALUES (1,17,34,38,'Provedor1','P1','active','2019-06-27'),(2,17,34,39,'Provedor2','P2','active','2019-06-27');
/*!40000 ALTER TABLE `sa_responsible_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_service`
--

DROP TABLE IF EXISTS `sa_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(250) NOT NULL,
  `service_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_service`
--

LOCK TABLES `sa_service` WRITE;
/*!40000 ALTER TABLE `sa_service` DISABLE KEYS */;
INSERT INTO `sa_service` VALUES (1,'US','active');
/*!40000 ALTER TABLE `sa_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_status_intervention`
--

DROP TABLE IF EXISTS `sa_status_intervention`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_status_intervention` (
  `status_intervention_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_intervention_name` varchar(250) NOT NULL,
  `status_intervention_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`status_intervention_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_status_intervention`
--

LOCK TABLES `sa_status_intervention` WRITE;
/*!40000 ALTER TABLE `sa_status_intervention` DISABLE KEYS */;
INSERT INTO `sa_status_intervention` VALUES (1,'Aberto','active'),(2,'Fechado','active');
/*!40000 ALTER TABLE `sa_status_intervention` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_sub_service`
--

DROP TABLE IF EXISTS `sa_sub_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_sub_service` (
  `sub_service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `sub_service_name` varchar(250) NOT NULL,
  `sub_service_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`sub_service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_sub_service`
--

LOCK TABLES `sa_sub_service` WRITE;
/*!40000 ALTER TABLE `sa_sub_service` DISABLE KEYS */;
INSERT INTO `sa_sub_service` VALUES (1,1,'GBV','active');
/*!40000 ALTER TABLE `sa_sub_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `instance_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_details`
--

LOCK TABLES `user_details` WRITE;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` VALUES (1,'munhezy.cuco@gmail.com','$2y$10$v9LtHIqJRg77F3138Z9w4OGp9SkZZOlViiWA7a/LyHf3es295CDLy','munhezy','master','Active',1,1,1,1,3,1,1,1),(2,'nacarapa@gmail.com','$2y$10$v9LtHIqJRg77F3138Z9w4OGp9SkZZOlViiWA7a/LyHf3es295CDLy','Nacarapa','master','Active',1,1,1,1,3,1,1,1),(3,'ana.baptista@jhpiego.org','$2y$10$v9LtHIqJRg77F3138Z9w4OGp9SkZZOlViiWA7a/LyHf3es295CDLy','Ana Baptista','master','Active',1,1,1,1,3,1,1,1),(4,'guest@jhpiego.org','$2y$10$v9LtHIqJRg77F3138Z9w4OGp9SkZZOlViiWA7a/LyHf3es295CDLy','Guest','user','Active',1,1,1,1,3,1,1,1),(5,'jordao.cololo@gmail.com','$2y$10$v9LtHIqJRg77F3138Z9w4OGp9SkZZOlViiWA7a/LyHf3es295CDLy','Jordao','master','Active',1,1,1,1,3,1,1,1),(6,'eusebio.matsinhe@jhpiego.org','$2y$10$sTNASWqRSKLbP6zrUVm3kukplOjPznJgSZHatUl1HxKm9y50HAOnu','eusebio','user','Active',1,1,1,1,3,1,1,1);
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-19 15:31:31
