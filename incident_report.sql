-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2021 a las 22:23:30
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `incident_report`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ir_area`
--

CREATE TABLE `ir_area` (
  `area_id` int(11) NOT NULL,
  `session_nom` varchar(30) NOT NULL,
  `area_nom` varchar(30) NOT NULL,
  `tip_est_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ir_area`
--

INSERT INTO `ir_area` (`area_id`, `session_nom`, `area_nom`, `tip_est_id_fk`) VALUES
(1, 'CALL CENTER', 'POPAYAN', 1),
(2, 'CALL CENTER', 'VERSALLES', 1),
(3, 'CALL CENTER', 'MEDELLIN ', 1),
(4, 'CALL CENTER', 'BARRANQUILLA', 1),
(5, 'CALL CENTER', 'IBAGUE', 1),
(6, 'CALL CENTER', 'CCQ', 1),
(7, 'CALL CENTER', 'PEREIRA', 1),
(8, 'CALL CENTER', 'CALI', 1),
(9, 'CALL CENTER', 'CORPAS', 1),
(10, 'CALL CENTER', 'JAMUNDI PILOTO', 1),
(11, 'GESTION DE RIESGO', 'EVITAVILIDAD', 1),
(12, 'ENCUESTA DE CALIDAD', 'ASISTENCIAL', 1),
(13, 'no ', 'no', 2),
(14, 'gestion de riesgo', 'odontogia', 2),
(15, 'EJEMPLO1', 'EJEMPLO 2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ir_categoria`
--

CREATE TABLE `ir_categoria` (
  `cate_id` int(11) NOT NULL,
  `cate_nom` varchar(100) NOT NULL,
  `tip_est_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ir_categoria`
--

INSERT INTO `ir_categoria` (`cate_id`, `cate_nom`, `tip_est_id_fk`) VALUES
(1, 'FALLA AGENTES', 1),
(2, 'FALLA EN EL 3CXPHONE', 1),
(3, 'FALLAS EN EL PC', 1),
(4, 'DISPOSITIVOS DAÑADOS', 1),
(5, 'FALLA CONECTIVIDAD CLINICA', 1),
(6, 'FALLA DE KERBERUS', 1),
(7, 'FALLA EN LAS LLAMADAS', 1),
(8, 'FALLA DE LOGUEO', 1),
(9, 'FALLA EN EL HOSVITAL ', 1),
(10, 'FALLA CITAPP', 1),
(11, 'FALLA EXTERNO', 1),
(12, 'MONITOEO', 1),
(13, 'SERVIDORES NUBE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ir_colaborador`
--

CREATE TABLE `ir_colaborador` (
  `col_id` int(11) NOT NULL,
  `col_login_num` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `col_nom` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `col_cargo` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tip_est_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ir_colaborador`
--

INSERT INTO `ir_colaborador` (`col_id`, `col_login_num`, `col_nom`, `col_cargo`, `tip_est_id_fk`) VALUES
(1, '642', 'DANYA VALENTINA MOLINA AGUILLON', 'AGENTE', 1),
(2, '480', 'MARIA DEL PILAR MEJIA PARAMO', 'AGENTE', 1),
(3, '446', 'MARIA VALENTINA CELIS LOURIDO', 'AGENTE', 1),
(4, '629', 'NATALIA ANDREA LOPEZ D\"ACOSTA', 'AGENTE', 1),
(5, '414', 'SARAI HERNANDEZ', 'LIDER', 1),
(6, '472', 'STEPHANY BASTIDAS', 'AGENTE', 1),
(7, '493', 'DIANA CAROLINA BARRIOS VARELA', 'AGENTE', 1),
(8, '599', 'JOSE LUIS CHARRY', 'AGENTE', 1),
(9, '428', 'LAUREN CORONEL', 'AGENTE', 1),
(10, '833', 'MARIA ALEJANDRA ARANDA SANCHEZ', 'AGENTE', 1),
(11, '427', 'SOFIA NOVOA', 'AGENTE', 1),
(13, '417', 'BRIGITTE BAUTISTA JIMENEZ', 'AGENTE', 1),
(14, '626', 'DANIELA DIAZ RODRIGUEZ', 'AGENTE', 1),
(15, '405', 'DANNA GISELLA FRANCO RIOS', 'AGENTE', 1),
(16, '464', 'JHOAN MANUEL LOPEZ', 'AGENTE', 1),
(17, '621', 'JUAN DIEGO OSORIO', 'AGENTE', 1),
(18, '449', 'LINA MARCELA TABORDA RAMIREZ', 'LIDER', 1),
(19, '661', 'MONICA YULEIMA GUERRERO OTERO', 'AGENTE', 1),
(20, '810', 'PAOLA ANDREA MOLINA', 'AGENTE', 1),
(21, '817', 'QUIMBERLY VIAFARA RUBIANO', 'AGENTE', 1),
(22, '474', 'SAMUEL ALBERTO MU?OZ OSORNO', 'AGENTE', 1),
(23, '532', 'TATIANA PEREA ORTIZ', 'AGENTE', 1),
(24, '492', 'YACKELINE YEPES', 'AGENTE', 1),
(25, '824', 'YERALDINE VALENCIA', 'AGENTE', 1),
(26, '861', 'BRYAN FLOREZ GARCIA', 'AGENTE', 1),
(27, '535', 'BRYHAN RESTREPO', 'AGENTE', 1),
(28, '628', 'DANIEL MAURICIO RESTREPO AGUDELO', 'AGENTE', 1),
(29, '421', 'ISAMAR MERCEDES ARCINIEGAS CHAMORRO', 'AGENTE', 1),
(30, '813', 'KAREN GISELA MURILLO MURILLO', 'AGENTE', 1),
(31, '800', 'LEYDI LORENA CAMAYO CASTRO', 'AGENTE', 1),
(32, '630', 'MARIA ANGELICA PARDO JIMENEZ', 'AGENTE', 1),
(33, '551', 'MARIA DEL PILAR CRIOLLO REALPE', 'AGENTE', 1),
(34, '658', 'PAOLA ANDREA MONTOYA', 'LIDER', 1),
(35, '483', 'PAULA ANDREA SANDOVAL ALVAREZ', 'AGENTE', 1),
(36, '476', 'YINNA GUAMANGA MEDINA', 'AGENTE', 1),
(37, '660', 'YULI VANESSA RODRIGUEZ QUINTERO', 'AGENTE', 1),
(38, 'N/A', 'KATHERINE POVEDA CHURTA', 'AGENTE', 1),
(39, '465', 'ALISSON TATIANA CARDENAS ACEVEDO', 'AGENTE', 1),
(40, '432', 'CAMILA VALENCIA JORDAN', 'AGENTE', 1),
(41, '812', 'CARLOS ANDRES PINO', 'AGENTE', 1),
(42, '431', 'DANYELI AGREDO', 'AGENTE', 1),
(43, '445', 'DIANA CRISTINA LOPEZ GIRALDO', 'LIDER', 1),
(44, '457', 'ELIANA FERNANDEZ ACOSTA', 'AGENTE', 1),
(45, '803', 'ESTEFANI MURILLO ALBORNOZ', 'AGENTE', 1),
(46, '466', 'JUNIOR ANDRES GARCIA VARGAS', 'AGENTE', 1),
(47, '556', 'KEVIN ANDRES SANCHEZ', 'AGENTE', 1),
(48, '527', 'MARIA ALEJANDRA QUINTERO', 'AGENTE', 1),
(49, '477', 'MARIA CAMILA PEÑA MONTOYA', 'AGENTE', 1),
(50, '406', 'MARLIN ANDREA PEREZ TIBOCHA', 'AGENTE', 1),
(51, '444', 'NICOLAS FRANCO AYALA', 'AGENTE', 1),
(52, '801', 'MARTHA LORENA PEREZ', 'AGENTE', 1),
(53, '488', 'TATIANA BOLAÑOS', 'AGENTE', 1),
(54, '455', 'JAIME ALEJANDRO RUIZ RENGIFO', 'AGENTE', 1),
(55, '422', 'JOSE FRANCISCO ACOSTA', 'AGENTE', 1),
(56, '411', 'KATHERINE SANCHEZ ROJAS', 'AGENTE', 1),
(57, '475', 'LINA MARCELA PLAZA', 'AGENTE', 1),
(58, '663', 'LUISA MARIA CAICEDO', 'AGENTE', 1),
(59, '536', 'MAYERLY BURGOS FRANCO', 'AGENTE', 1),
(60, '410', 'NERLY MOSQUERA', 'LIDER', 1),
(61, '640', 'ANDRES DAVID RAMIREZ DIAZ', 'AGENTE', 1),
(62, '841', 'ANGELICA MARIA DIAZ NAVARRO', 'AGENTE', 1),
(63, '439', 'ANGIE TATIANA CASTILLO', 'AGENTE', 1),
(64, '430', 'EVELYN JOHANNA VELAZQUEZ', 'LIDER', 1),
(65, '639', 'KATHERINE ANDREA AVILA', 'AGENTE', 1),
(66, '836', 'LINA MARCELACORTEZ DAVID', 'AGENTE', 1),
(67, '408', 'LINA MARIA ARAGON MEDINA', 'AGENTE', 1),
(68, '804', 'LUZ ADRIANA OSORIO RINCON', 'AGENTE', 1),
(69, '401', 'SANDRA SOLARTE', 'AGENTE', 1),
(70, '848', 'YERALDINE SAMUEL', 'AGENTE', 1),
(71, '862', 'JOSE DAVID TAMAYO', 'AGENTE', 1),
(72, '412', 'ALBA MERY CASTILLO', 'AGENTE', 1),
(73, '605', 'BRAYAN ALEXANDER ANACONA', 'AGENTE', 1),
(74, '826', ' CRISTIAN CAMILO DELGADO MARIN', 'AGENTE', 1),
(75, '486', 'CAROLINA SOSCUE', 'AGENTE', 1),
(76, '635', 'DANIELA BOCANEGRA GONZALEZ', 'LIDER', 1),
(77, '407', 'DANIELA MORALES OCAMPO', 'AGENTE', 1),
(78, '613', 'DINANCELA ARCE SAA', 'AGENTE', 1),
(79, '601', 'GERALDINE ANDREA LOPEZ', 'AGENTE', 1),
(80, '418', 'JEFERSON CASTILLO SANCHEZ', 'AGENTE', 1),
(81, '543', 'JENNIFER ALEXANDRA LONDO?O ORDO?EZ', 'AGENTE', 1),
(82, '581', 'JESSIKA JANETH MAMBAGUE', 'AGENTE', 1),
(83, '807', 'JOHANNA MARCELA LOPEZ ORDO?EZ', 'AGENTE', 1),
(84, '625', 'JUANA VALENTINA VAHOS', 'AGENTE', 1),
(85, '441', 'LEYDI JOHANNA PINEDA AGUI?O', 'AGENTE', 1),
(86, '638', 'MARY JAKELINNE REYES CAICEDO', 'AGENTE', 1),
(87, '656', 'MICHEL NATHALIA MERA TORRES', 'AGENTE', 1),
(88, '572', 'NATALIA MONTA?EZ OSORIO', 'AGENTE', 1),
(89, '440', 'SEBASTIAN LONDO?O', 'AGENTE', 1),
(90, '409', 'YENNI GONZALEZ', 'AGENTE', 1),
(91, '398', 'YULI LOZANO IBARRA', 'AGENTE', 1),
(92, '462', 'KARLA MARCELA ROSENDO', 'AGENTE', 1),
(93, '435', ' KATTALINA CORREDOR', 'AGENTE', 1),
(94, '423', 'LESLY GISELLA AGUDELO VIVEROS', 'AGENTE', 1),
(95, '442', 'LINDANA ARIZA RAMIREZ', 'LIDER', 1),
(96, '849', 'MONICA MANTILLA', 'AGENTE', 1),
(97, '860', 'VALERIA BLANDON', 'AGENTE', 1),
(98, '840', 'ANYI ANTE', 'AGENTE', 1),
(99, '627', 'CARLOS ALEXIS ACOSTA', 'AGENTE', 1),
(100, '478', 'GLADYS ACENETH GIRALDO SANCHEZ', 'AGENTE', 1),
(101, '500', 'INGRID LORENA ROJAS DOMINGUEZ', 'AGENTE', 1),
(102, '845', 'RONALDO PONTON', 'AGENTE', 1),
(103, '802', 'TATIANA PELAEZ LONDO?O', 'AGENTE', 1),
(104, '631', 'DANIELA BONILLA VELASCO', 'AGENTE', 1),
(105, '611', 'ELIANA LIZETH CRUZ', 'AGENTE', 1),
(106, '420', 'GERALDINE RODRIGUEZ RESTREPO', 'LIDER', 1),
(107, '419', 'NATHALY VAZQUEZ', 'AGENTE', 1),
(108, '403', 'YESIKA DANIELA NAVAS CASTILLO', 'AGENTE', 1),
(109, '863', 'ADRIANA ALEJANDRA MUÑOZ', 'AGENTE', 1),
(110, '844', 'EFRAIN MELENDEZ HERRERA', 'AGENTE', 1),
(111, '850', 'LUZ MARY RAMOS', 'AGENTE', 1),
(112, '860', 'VALERIA BLANDON', 'AGENTE', 1),
(113, '861', 'BRYAN FLOREZ', 'AGENTE', 1),
(114, '862', 'JOSE TAMAYO', 'AGENTE', 1),
(115, '863', 'ADRIANA MUÑOZ', 'AGENTE', 1),
(116, 'N/A', 'KATHERINE POVEDA', 'AGENTE', 1),
(137, 'NO APLICA', 'CRISTIAN GARCIA', 'APRENDIZ TI', 2),
(138, 'NO APLICA', 'maria fernanda', 'APRENDIZ TI', 2),
(139, 'no aplica', 'andrea lopez', 'mantenimiento', 2),
(140, 'no aplica', 'cristian ', 'aprendiz ', 2),
(141, 'NO APLICA', 'TODOS', 'NO APLICA', 1),
(142, 'NO APLICA', 'CRISTIAN SANCHEZ', 'APRENDIZ ', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ir_estado`
--

CREATE TABLE `ir_estado` (
  `est_id` int(11) NOT NULL,
  `est_des` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ir_estado`
--

INSERT INTO `ir_estado` (`est_id`, `est_des`) VALUES
(1, 'abierto'),
(2, 'cerrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ir_novedad`
--

CREATE TABLE `ir_novedad` (
  `nove_id` int(11) NOT NULL,
  `nove_fecha` date NOT NULL,
  `nove_hora_ini` datetime NOT NULL,
  `nove_hora_fin` datetime NOT NULL,
  `nove_tiem_total` varchar(25) NOT NULL,
  `cate_id_fk` int(11) NOT NULL,
  `tip_inci_id_fk` int(11) NOT NULL,
  `area_id_fk` int(11) NOT NULL,
  `col_id_fk` int(11) NOT NULL,
  `usu_id_fk` int(11) NOT NULL,
  `est_id_fk` int(11) NOT NULL,
  `tip_est_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ir_novedad`
--

INSERT INTO `ir_novedad` (`nove_id`, `nove_fecha`, `nove_hora_ini`, `nove_hora_fin`, `nove_tiem_total`, `cate_id_fk`, `tip_inci_id_fk`, `area_id_fk`, `col_id_fk`, `usu_id_fk`, `est_id_fk`, `tip_est_id_fk`) VALUES
(11, '2021-05-07', '2021-05-07 15:00:00', '2021-05-07 20:57:00', '5 horas, 57 minutos', 3, 10, 9, 141, 1, 2, 1),
(12, '2021-05-07', '2021-05-08 16:55:00', '2021-05-10 11:49:00', '42 horas, 54 minutos', 1, 1, 10, 11, 1, 2, 1),
(13, '2021-05-10', '2021-05-10 15:59:00', '2021-05-10 16:02:00', '0 horas, 3 minutos', 3, 8, 9, 43, 1, 2, 2),
(14, '2021-05-10', '2021-05-10 16:02:00', '0000-00-00 00:00:00', 'NaN horas, NaN minutos', 3, 8, 9, 74, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ir_rol`
--

CREATE TABLE `ir_rol` (
  `rol_id` int(11) NOT NULL,
  `rol_des` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ir_rol`
--

INSERT INTO `ir_rol` (`rol_id`, `rol_des`) VALUES
(1, 'administrador'),
(2, 'lider'),
(3, 'supervisor ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ir_tipo_estado`
--

CREATE TABLE `ir_tipo_estado` (
  `tip_est_id` int(11) NOT NULL,
  `tip_est_des` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ir_tipo_estado`
--

INSERT INTO `ir_tipo_estado` (`tip_est_id`, `tip_est_des`) VALUES
(1, 'habilitar'),
(2, 'inhabilitar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ir_tipo_incidencia`
--

CREATE TABLE `ir_tipo_incidencia` (
  `tip_inci_id` int(11) NOT NULL,
  `tip_inci_nom` varchar(150) NOT NULL,
  `tip_est_id_fk` int(11) NOT NULL,
  `cate_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ir_tipo_incidencia`
--

INSERT INTO `ir_tipo_incidencia` (`tip_inci_id`, `tip_inci_nom`, `tip_est_id_fk`, `cate_id_fk`) VALUES
(1, 'sin energía usuario', 1, 1),
(2, 'sin internet usuario', 1, 1),
(3, 'intermitencia o falla internet usuario (VPN, LLAMADAS ENTRECORTADAS,LENTITUD HOSVITAL) ', 1, 1),
(4, 'desconfiguracion de ext x-phone', 1, 2),
(5, 'deslogueo x-phone se fue energía e internet ', 1, 2),
(6, 'fallas de ext x-phone - internet usuario', 1, 2),
(7, 'fallas de ext x-phone - no han conectado vpn\r\n', 1, 2),
(8, 'equipo no enciende', 1, 3),
(9, 'reinicio de equipo', 1, 3),
(10, 'sistema lento ', 1, 3),
(11, 'falla de programas pc', 1, 3),
(12, 'actualizacion del sistema', 1, 3),
(21, 'teclado dañado', 1, 4),
(22, 'mouse dañado', 1, 4),
(23, 'diadema dañada', 1, 4),
(24, 'daño cargador', 1, 4),
(25, 'fallas en el vpn - clinica', 1, 5),
(26, 'fallas de acceso de escritorio remoto', 1, 5),
(27, 'falla de kerberus - lentitud de procesos campaña', 1, 6),
(28, 'falla de kerberus - llamadas no conectan  campaña', 1, 6),
(29, 'falla de kerberus - no carga kerberus  campaña', 1, 6),
(30, 'falla del kerberus - tipificacion no guarda campaña ', 1, 6),
(31, 'fallas de audio llamadas - clinica / usuario', 1, 7),
(32, 'fallas de audio llamadas - internet dapa', 1, 7),
(33, 'fallas troncales de une', 1, 7),
(34, 'fallas troncales de claro', 1, 7),
(35, 'gateway saturado llamadas salientes', 1, 7),
(36, 'minutos no disponibles', 1, 7),
(37, 'falla de logueo 3cxphone', 1, 8),
(38, 'no permite logueo por no actualizar contraseña ', 1, 8),
(39, 'fallas de logueo rfast', 1, 8),
(40, 'fallas en hosvital - clínica sin internet ', 1, 9),
(41, 'falla en hosvital - clinica base de datos', 1, 9),
(42, 'hosvital  intermitente  - conectividad clinica', 1, 9),
(46, 'citapp no carga - internet usuario', 1, 10),
(47, 'citapp no carga - servidor de aplicacion', 1, 10),
(48, 'citapp lento', 1, 10),
(49, 'caida de validadores externo', 1, 11),
(50, 'falla disposivo', 1, 12),
(51, 'sin nada de nada', 1, 12),
(52, 'bloqueo app', 2, 2),
(53, 'conectividad', 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ir_usuario`
--

CREATE TABLE `ir_usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_num_doc` int(11) NOT NULL,
  `usu_nom` varchar(15) NOT NULL,
  `usu_nom_two` varchar(15) DEFAULT NULL,
  `usu_ape` varchar(15) NOT NULL,
  `usu_ape_two` varchar(15) DEFAULT NULL,
  `usu_correo` varchar(30) NOT NULL,
  `usu_contra` varchar(8) NOT NULL,
  `rol_id_fk` int(11) NOT NULL,
  `tip_est_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ir_usuario`
--

INSERT INTO `ir_usuario` (`usu_id`, `usu_num_doc`, `usu_nom`, `usu_nom_two`, `usu_ape`, `usu_ape_two`, `usu_correo`, `usu_contra`, `rol_id_fk`, `tip_est_id_fk`) VALUES
(1, 1060806960, 'cristian ', 'camilo', 'garcia ', 'sanchez', 'aprendiz.sistemas3@ospedale.co', '2580.', 1, 1),
(12, 2353464, 'luisa', 'andrea', 'paz', 'lopez', 'csf343535', '1234', 2, 1),
(13, 245975944, 'carlos', 'fernando', 'camayo', 'paz', 'ccarlos@gmai@gmail.com', '5944', 3, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ir_area`
--
ALTER TABLE `ir_area`
  ADD PRIMARY KEY (`area_id`),
  ADD KEY `tip_est_id_fk` (`tip_est_id_fk`);

--
-- Indices de la tabla `ir_categoria`
--
ALTER TABLE `ir_categoria`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indices de la tabla `ir_colaborador`
--
ALTER TABLE `ir_colaborador`
  ADD PRIMARY KEY (`col_id`),
  ADD KEY `tip_est_id_fk` (`tip_est_id_fk`);

--
-- Indices de la tabla `ir_estado`
--
ALTER TABLE `ir_estado`
  ADD PRIMARY KEY (`est_id`);

--
-- Indices de la tabla `ir_novedad`
--
ALTER TABLE `ir_novedad`
  ADD PRIMARY KEY (`nove_id`),
  ADD KEY `camp_id_fk` (`area_id_fk`),
  ADD KEY `usu_id_fk` (`usu_id_fk`),
  ADD KEY `tip_novedad_id_fk` (`tip_inci_id_fk`),
  ADD KEY `est_id_fk` (`est_id_fk`),
  ADD KEY `ir_novedad_ibfk_6` (`tip_est_id_fk`),
  ADD KEY `col_id_fk` (`col_id_fk`),
  ADD KEY `cate_id_fk` (`cate_id_fk`);

--
-- Indices de la tabla `ir_rol`
--
ALTER TABLE `ir_rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `ir_tipo_estado`
--
ALTER TABLE `ir_tipo_estado`
  ADD PRIMARY KEY (`tip_est_id`);

--
-- Indices de la tabla `ir_tipo_incidencia`
--
ALTER TABLE `ir_tipo_incidencia`
  ADD PRIMARY KEY (`tip_inci_id`),
  ADD KEY `tip_est_id_fk` (`tip_est_id_fk`),
  ADD KEY `cate_id_fk` (`cate_id_fk`);

--
-- Indices de la tabla `ir_usuario`
--
ALTER TABLE `ir_usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `rol_id_fk` (`rol_id_fk`),
  ADD KEY `tip_est_id_fk` (`tip_est_id_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ir_area`
--
ALTER TABLE `ir_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ir_categoria`
--
ALTER TABLE `ir_categoria`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ir_colaborador`
--
ALTER TABLE `ir_colaborador`
  MODIFY `col_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT de la tabla `ir_estado`
--
ALTER TABLE `ir_estado`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ir_novedad`
--
ALTER TABLE `ir_novedad`
  MODIFY `nove_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `ir_rol`
--
ALTER TABLE `ir_rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ir_tipo_estado`
--
ALTER TABLE `ir_tipo_estado`
  MODIFY `tip_est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ir_tipo_incidencia`
--
ALTER TABLE `ir_tipo_incidencia`
  MODIFY `tip_inci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `ir_usuario`
--
ALTER TABLE `ir_usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ir_area`
--
ALTER TABLE `ir_area`
  ADD CONSTRAINT `ir_area_ibfk_1` FOREIGN KEY (`tip_est_id_fk`) REFERENCES `ir_tipo_estado` (`tip_est_id`);

--
-- Filtros para la tabla `ir_colaborador`
--
ALTER TABLE `ir_colaborador`
  ADD CONSTRAINT `ir_colaborador_ibfk_1` FOREIGN KEY (`tip_est_id_fk`) REFERENCES `ir_tipo_estado` (`tip_est_id`);

--
-- Filtros para la tabla `ir_novedad`
--
ALTER TABLE `ir_novedad`
  ADD CONSTRAINT `ir_novedad_ibfk_3` FOREIGN KEY (`usu_id_fk`) REFERENCES `ir_usuario` (`usu_id`),
  ADD CONSTRAINT `ir_novedad_ibfk_5` FOREIGN KEY (`est_id_fk`) REFERENCES `ir_estado` (`est_id`),
  ADD CONSTRAINT `ir_novedad_ibfk_6` FOREIGN KEY (`tip_est_id_fk`) REFERENCES `ir_tipo_estado` (`tip_est_id`),
  ADD CONSTRAINT `ir_novedad_ibfk_7` FOREIGN KEY (`col_id_fk`) REFERENCES `ir_colaborador` (`col_id`),
  ADD CONSTRAINT `ir_novedad_ibfk_8` FOREIGN KEY (`tip_inci_id_fk`) REFERENCES `ir_tipo_incidencia` (`tip_inci_id`),
  ADD CONSTRAINT `ir_novedad_ibfk_9` FOREIGN KEY (`cate_id_fk`) REFERENCES `ir_categoria` (`cate_id`);

--
-- Filtros para la tabla `ir_tipo_incidencia`
--
ALTER TABLE `ir_tipo_incidencia`
  ADD CONSTRAINT `ir_tipo_incidencia_ibfk_1` FOREIGN KEY (`tip_est_id_fk`) REFERENCES `ir_tipo_estado` (`tip_est_id`),
  ADD CONSTRAINT `ir_tipo_incidencia_ibfk_2` FOREIGN KEY (`cate_id_fk`) REFERENCES `ir_categoria` (`cate_id`);

--
-- Filtros para la tabla `ir_usuario`
--
ALTER TABLE `ir_usuario`
  ADD CONSTRAINT `ir_usuario_ibfk_1` FOREIGN KEY (`rol_id_fk`) REFERENCES `ir_rol` (`rol_id`),
  ADD CONSTRAINT `ir_usuario_ibfk_2` FOREIGN KEY (`tip_est_id_fk`) REFERENCES `ir_tipo_estado` (`tip_est_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
