/*
Navicat MySQL Data Transfer

Source Server         : MyData
Source Server Version : 50612
Source Host           : 127.0.0.1:3306
Source Database       : inverbienes

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2016-02-01 18:24:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_acreedores
-- ----------------------------
DROP TABLE IF EXISTS `t_acreedores`;
CREATE TABLE `t_acreedores` (
  `ID_ACREEDOR` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(80) DEFAULT NULL,
  `TELEFONO` bigint(20) DEFAULT NULL,
  `CELULAR` varchar(10) DEFAULT NULL,
  `DIRECCION` varchar(80) DEFAULT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `DOCUMENTO` bigint(20) DEFAULT NULL,
  `CORREO` varchar(60) DEFAULT NULL,
  `NOMBRE_CUENTA` varchar(60) DEFAULT NULL,
  `NUMERO_CUENTA` bigint(20) DEFAULT NULL,
  `MANEJO_CARTERA` binary(1) DEFAULT NULL,
  `RECLAMA_PERSONALMENTE` binary(1) DEFAULT NULL,
  `LIGADO` tinyint(3) DEFAULT '0' COMMENT 'Si el cliente esta ligado a una solicitud',
  `ESTADO` binary(1) DEFAULT '1',
  `USUARIO_REGISTRA` bigint(20) DEFAULT NULL,
  `USUARIO_MODIFICA` bigint(20) DEFAULT NULL,
  `USUARIO_ELIMINA` bigint(20) DEFAULT NULL,
  `FECHA_MODIFICA` datetime DEFAULT NULL,
  `FECHA_REGISTRA` datetime DEFAULT NULL,
  `FECHA_ELIMINA` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_ACREEDOR`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_acreedores
-- ----------------------------
INSERT INTO `t_acreedores` VALUES ('1', 'LUIS EDUARDO ARELAVO BUITRAGO', '2339966', '3002789433', 'CRR 44#72-147', '1', '8296753', '', null, null, null, null, '1', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('2', 'ROSA ELENA ARBOLEDA', '5040886', '3137257521', '', '1', '35532294', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('3', 'CARLOS CALLE', '5035959', '3122233613', '', '1', '0', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('4', 'LUIS ALONSO CASTAÑO CORRALES', '2169066', '', '', '1', '555692', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('5', 'DAVID ANDRES MORALES CORREA', '5122898', '', '', '1', '1152218079', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('6', 'SERGIO ANDRES LONDOÑO QUINTERO', '2657730', '3152767911', '', '1', '71384763', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('7', 'MARIA FERNANDA CASTILLO', '2657730', '3152767911', '', '1', '39360356', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('8', 'ERMINSUL CASTAÑO URREGO', '5122898', '', '', '1', '70433100', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('9', 'FABIO CASTAÑO', '0', '', '', '1', '603716', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('10', 'SANDRA PATRICIA CORREA VARGAS', '5122898', '', '', '1', '43555014', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('11', 'JANETH CORREA VARGAS', '5122898', '', '', '1', '43735840', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('12', 'WILLIAM ERNESTO VELIS ESCOBAR', '5122898', '', '', '1', '415231', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('13', 'AICARDO GAVIRIA VARGAS', '5122898', '', '', '1', '71634665', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('14', 'JOSE LUIS GARCES PAREJA', '5040886', '3137257521', 'CLL 23#65E-22', '1', '15520582', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('15', 'JUAN SEBASTIAN GIRALDO SOSA', '2310070', '3148929192', '', '1', '1218713062', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('16', 'ELVIA DEISY GUZMAN DE ROJAS', '2115402', '2360292', '', '1', '323600452', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('17', 'RAFAEL ANGEL HERNANDEZ OROZCO', '2310070', '3006154784', 'CALLE 50N°48-03', '1', '70128088', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('18', 'GLORIA ELENA HIGUITA ACOSTA', '5812898', '3146382500', 'CRR 88A#34A-12 APT 204 EDI ALMERIA PLAZA', '1', '32524079', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('19', 'MARIA LILYAM LOPEZ LOPEZ', '4227053', '3103965684', '', '1', '0', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('20', 'ANGELA MARIA MESA CARDONA', '2310070', '', '', '1', '32518712', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('21', 'VLADIMIR MARTINEZ RIVERA', '3655412', '3007832623', '', '1', '71597701', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('22', 'EDILBERTO MONTOYA JIMENEZ', '3173400500', '3175162713', 'CRR89#30-08', '1', '15490968', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('23', 'RUBIELA JIIMENEZ LARREA', '3173400500', '3175162713', 'CRR89#30-08', '1', '43340531', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('24', 'FANNY DE JESUS MONTOYA MONTOYA', '4819596', '3127156029', '', '1', '32099170', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('25', ' GLORIA AMPARO MOSCOSO GIL', '2284692', '2397835', 'CALLE 50N°48-03', '1', '42962787', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('26', 'ROSALBA MOSCOSO GIL', '5852100', '3128997646', '', '1', '21511399', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('27', 'MARIA DEL SOCORRO OROZCO DE HERNANDEZ', '2310070', '3148929192', '', '1', '21345549', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('28', 'MARIA BETSABE OLAYA BENITEZ', '3617624', '3104897528', '', '1', '0', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('29', 'FABIO ARTURO OQUENDO HURTADO', '0', '3128509826', '', '1', '70054087', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('30', 'LUIS FELIPE JARAMILLO SALDARRIAGA', '2310070', '3128509826', '', '1', '71788721', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('31', 'HUMBERTO DE JESUS OSORIO BETANCUR', '2792349', '3137961938', '', '1', '6786626', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('32', 'REINA MERY OSPINA', '4170700', '3215788940', '', '1', '0', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('33', 'JUAN JOSE PATIÑO MUÑOZ', '0', '', '', '1', '0', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('34', 'LIBARDO PEREZ ALVAREZ', '2140837', '3117275575', '', '1', '0', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('35', 'MARIBEL PEREZ PEREZ', '0', '3217532713', '', '1', '43670329', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('36', 'MARGARITA POSADA GALLEGO', '2310070', '3148929192', '', '1', '43432665', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('37', 'IRMA DE JESUS ROJAS MARULANDA', '0', '3206812433', '', '1', '0', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('38', 'LEON MARINO ROJAS MARULANDA', '0', '3117386630', '', '1', '3372604', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('39', 'GRISELDA GIRALDO GIRALDO', '0', '3128932587', '', '1', '22055863', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('40', 'NATALIA SALDARRIAGA VILLA', '0', '3122886669', '', '1', '43615443', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('41', 'MARIA CELINA SERNA MARTINEZ', '4225255', '3008569375', '', '1', '32410028', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('42', 'CARMEN MIRIAM SANCHEZ DE CARDONA', '2325809', '3167733530', 'CRR 41B#30B-60 APT 304', '1', '22085327', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('43', ' GABRIEL DE JESUS SANCHEZ RIOS', '4619765', '3136453496', 'CALLE 21A#59-16', '1', '715474', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('44', 'FRANCISCO JOSE SUAREZ ALVAREZ', '2643945', '3154084687', 'CRR 77B#54A-25', '1', '71616943', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('45', 'ROSA ANGELICA VELASQUEZ HERRERA', '5970812', '3117003115', 'CALLE 40#59CC-33', '1', '32305220', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('46', 'JORGE ARMANDO BETANCUR', '0', '3113053721', '', '1', '8291246', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('47', 'MARTHA LIA VASQUEZ PEREZ', '0', '3113053721', '', '1', '32483775', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('48', 'MARIA ELEONORA VILLA', '3422683', '3207067006', '', '1', '22115034', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('49', 'GILBERTO VILLA TOBON', '2161069', '3003994793', '', '1', '8230451', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('50', 'JUAN GUILLERMO ZAMBRANO ', '2310070', '3148929192', 'CALLE 50N°48-03', '1', '17157052', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('51', 'AMELIA ROSA CAICEDO', '0', '3218018422', '', '1', '21670904', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('52', 'JORGE DARIO ZAPATA LOPERA', '231000', '3155443555', '', '1', '6785729', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);
INSERT INTO `t_acreedores` VALUES ('53', 'YAMILE ZAPATA MOSCOSO', '2310070', '3218018422', '', '1', '32104592', '', null, null, null, null, '0', 0x31, null, null, null, null, '2016-02-01 16:54:00', null);

-- ----------------------------
-- Table structure for t_archivos
-- ----------------------------
DROP TABLE IF EXISTS `t_archivos`;
CREATE TABLE `t_archivos` (
  `ID_ARCHIVO` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` bigint(20) DEFAULT NULL,
  `ID_OBSERVACION` bigint(20) DEFAULT NULL,
  `ESTADO` binary(1) DEFAULT '0',
  `NOMBRE_ARCHIVO` varchar(255) DEFAULT NULL,
  `RUTA_ARCHIVO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_ARCHIVO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_archivos
-- ----------------------------

-- ----------------------------
-- Table structure for t_ciudades
-- ----------------------------
DROP TABLE IF EXISTS `t_ciudades`;
CREATE TABLE `t_ciudades` (
  `ID_CIUDAD` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `DEPARTAMENTO` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_CIUDAD`)
) ENGINE=InnoDB AUTO_INCREMENT=1121 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of t_ciudades
-- ----------------------------
INSERT INTO `t_ciudades` VALUES ('1', 'MEDELLIN', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('2', 'ABEJORRAL', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('3', 'ABRIAQUI', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('4', 'ALEJANDRIA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('5', 'AMAGA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('6', 'AMALFI', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('7', 'ANDES', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('8', 'ANGELOPOLIS', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('9', 'ANGOSTURA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('10', 'ANORI', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('11', 'SANTAFE DE ANTIOQUIA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('12', 'ANZA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('13', 'APARTADO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('14', 'ARBOLETES', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('15', 'ARGELIA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('16', 'ARMENIA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('17', 'BARBOSA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('18', 'BELMIRA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('19', 'BELLO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('20', 'BETANIA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('21', 'BETULIA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('22', 'CIUDAD BOLIVAR', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('23', 'BRICE&Ntilde;O', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('24', 'BURITICA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('25', 'CACERES', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('26', 'CAICEDO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('27', 'CALDAS', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('28', 'CAMPAMENTO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('29', 'CA&Ntilde;ASGORDAS', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('30', 'CARACOLI', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('31', 'CARAMANTA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('32', 'CAREPA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('33', 'EL CARMEN DE VIBORAL', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('34', 'CAROLINA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('35', 'CAUCASIA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('36', 'CHIGORODO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('37', 'CISNEROS', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('38', 'COCORNA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('39', 'CONCEPCION', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('40', 'CONCORDIA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('41', 'COPACABANA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('42', 'DABEIBA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('43', 'DON MATIAS', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('44', 'EBEJICO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('45', 'EL BAGRE', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('46', 'ENTRERRIOS', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('47', 'ENVIGADO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('48', 'FREDONIA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('49', 'FRONTINO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('50', 'GIRALDO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('51', 'GIRARDOTA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('52', 'GOMEZ PLATA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('53', 'GRANADA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('54', 'GUADALUPE', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('55', 'GUARNE', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('56', 'GUATAPE', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('57', 'HELICONIA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('58', 'HISPANIA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('59', 'ITAGUI', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('60', 'ITUANGO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('61', 'JARDIN', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('62', 'JERICO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('63', 'LA CEJA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('64', 'LA ESTRELLA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('65', 'LA PINTADA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('66', 'LA UNION', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('67', 'LIBORINA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('68', 'MACEO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('69', 'MARINILLA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('70', 'MONTEBELLO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('71', 'MURINDO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('72', 'MUTATA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('73', 'NARI&Ntilde;O', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('74', 'NECOCLI', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('75', 'NECHI', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('76', 'OLAYA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('77', 'PE', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('78', 'PEQUE', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('79', 'PUEBLORRICO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('80', 'PUERTO BERRIO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('81', 'PUERTO NARE', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('82', 'PUERTO TRIUNFO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('83', 'REMEDIOS', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('84', 'RETIRO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('85', 'RIONEGRO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('86', 'SABANALARGA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('87', 'SABANETA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('88', 'SALGAR', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('89', 'SAN ANDRES DE CUERQUIA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('90', 'SAN CARLOS', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('91', 'SAN FRANCISCO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('92', 'SAN JERONIMO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('93', 'SAN JOSE DE LA MONTA&Ntilde;A', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('94', 'SAN JUAN DE URABA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('95', 'SAN LUIS', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('96', 'SAN PEDRO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('97', 'SAN PEDRO DE URABA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('98', 'SAN RAFAEL', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('99', 'SAN ROQUE', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('100', 'SAN VICENTE', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('101', 'SANTA BARBARA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('102', 'SANTA ROSA DE OSOS', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('103', 'SANTO DOMINGO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('104', 'EL SANTUARIO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('105', 'SEGOVIA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('106', 'SONSON', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('107', 'SOPETRAN', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('108', 'TAMESIS', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('109', 'TARAZA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('110', 'TARSO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('111', 'TITIRIBI', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('112', 'TOLEDO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('113', 'TURBO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('114', 'URAMITA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('115', 'URRAO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('116', 'VALDIVIA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('117', 'VALPARAISO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('118', 'VEGACHI', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('119', 'VENECIA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('120', 'VIGIA DEL FUERTE', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('121', 'YALI', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('122', 'YARUMAL', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('123', 'YOLOMBO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('124', 'YONDO', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('125', 'ZARAGOZA', 'ANTIOQUIA');
INSERT INTO `t_ciudades` VALUES ('126', 'BARRANQUILLA', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('127', 'BARANOA', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('128', 'CAMPO DE LA CRUZ', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('129', 'CANDELARIA', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('130', 'GALAPA', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('131', 'JUAN DE ACOSTA', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('132', 'LURUACO', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('133', 'MALAMBO', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('134', 'MANATI', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('135', 'PALMAR DE VARELA', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('136', 'PIOJO', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('137', 'POLONUEVO', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('138', 'PONEDERA', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('139', 'PUERTO COLOMBIA', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('140', 'REPELON', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('141', 'SABANAGRANDE', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('142', 'SABANALARGA', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('143', 'SANTA LUCIA', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('144', 'SANTO TOMAS', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('145', 'SOLEDAD', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('146', 'SUAN', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('147', 'TUBARA', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('148', 'USIACURI', 'ATLANTICO');
INSERT INTO `t_ciudades` VALUES ('149', 'BOGOTA, D.C.', 'BOGOTA');
INSERT INTO `t_ciudades` VALUES ('150', 'CARTAGENA', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('151', 'ACHI', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('152', 'ALTOS DEL ROSARIO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('153', 'ARENAL', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('154', 'ARJONA', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('155', 'ARROYOHONDO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('156', 'BARRANCO DE LOBA', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('157', 'CALAMAR', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('158', 'CANTAGALLO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('159', 'CICUCO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('160', 'CORDOBA', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('161', 'CLEMENCIA', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('162', 'EL CARMEN DE BOLIVAR', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('163', 'EL GUAMO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('164', 'EL PE&Ntilde;ON', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('165', 'HATILLO DE LOBA', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('166', 'MAGANGUE', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('167', 'MAHATES', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('168', 'MARGARITA', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('169', 'MARIA LA BAJA', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('170', 'MONTECRISTO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('171', 'MOMPOS', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('172', 'NOROSI', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('173', 'MORALES', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('174', 'PINILLOS', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('175', 'REGIDOR', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('176', 'RIO VIEJO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('177', 'SAN CRISTOBAL', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('178', 'SAN ESTANISLAO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('179', 'SAN FERNANDO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('180', 'SAN JACINTO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('181', 'SAN JACINTO DEL CAUCA', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('182', 'SAN JUAN NEPOMUCENO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('183', 'SAN MARTIN DE LOBA', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('184', 'SAN PABLO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('185', 'SANTA CATALINA', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('186', 'SANTA ROSA', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('187', 'SANTA ROSA DEL SUR', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('188', 'SIMITI', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('189', 'SOPLAVIENTO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('190', 'TALAIGUA NUEVO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('191', 'TIQUISIO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('192', 'TURBACO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('193', 'TURBANA', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('194', 'VILLANUEVA', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('195', 'ZAMBRANO', 'BOLIVAR');
INSERT INTO `t_ciudades` VALUES ('196', 'TUNJA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('197', 'ALMEIDA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('198', 'AQUITANIA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('199', 'ARCABUCO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('200', 'BELEN', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('201', 'BERBEO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('202', 'BETEITIVA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('203', 'BOAVITA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('204', 'BOYACA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('205', 'BRICE&Ntilde;O', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('206', 'BUENAVISTA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('207', 'BUSBANZA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('208', 'CALDAS', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('209', 'CAMPOHERMOSO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('210', 'CERINZA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('211', 'CHINAVITA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('212', 'CHIQUINQUIRA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('213', 'CHISCAS', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('214', 'CHITA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('215', 'CHITARAQUE', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('216', 'CHIVATA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('217', 'CIENEGA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('218', 'COMBITA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('219', 'COPER', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('220', 'CORRALES', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('221', 'COVARACHIA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('222', 'CUBARA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('223', 'CUCAITA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('224', 'CUITIVA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('225', 'CHIQUIZA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('226', 'CHIVOR', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('227', 'DUITAMA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('228', 'EL COCUY', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('229', 'EL ESPINO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('230', 'FIRAVITOBA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('231', 'FLORESTA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('232', 'GACHANTIVA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('233', 'GAMEZA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('234', 'GARAGOA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('235', 'GUACAMAYAS', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('236', 'GUATEQUE', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('237', 'GUAYATA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('238', 'GsICAN', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('239', 'IZA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('240', 'JENESANO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('241', 'JERICO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('242', 'LABRANZAGRANDE', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('243', 'LA CAPILLA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('244', 'LA VICTORIA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('245', 'LA UVITA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('246', 'VILLA DE LEYVA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('247', 'MACANAL', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('248', 'MARIPI', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('249', 'MIRAFLORES', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('250', 'MONGUA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('251', 'MONGUI', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('252', 'MONIQUIRA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('253', 'MOTAVITA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('254', 'MUZO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('255', 'NOBSA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('256', 'NUEVO COLON', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('257', 'OICATA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('258', 'OTANCHE', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('259', 'PACHAVITA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('260', 'PAEZ', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('261', 'PAIPA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('262', 'PAJARITO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('263', 'PANQUEBA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('264', 'PAUNA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('265', 'PAYA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('266', 'PAZ DE RIO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('267', 'PESCA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('268', 'PISBA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('269', 'PUERTO BOYACA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('270', 'QUIPAMA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('271', 'RAMIRIQUI', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('272', 'RAQUIRA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('273', 'RONDON', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('274', 'SABOYA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('275', 'SACHICA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('276', 'SAMACA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('277', 'SAN EDUARDO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('278', 'SAN JOSE DE PARE', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('279', 'SAN LUIS DE GACENO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('280', 'SAN MATEO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('281', 'SAN MIGUEL DE SEMA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('282', 'SAN PABLO DE BORBUR', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('283', 'SANTANA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('284', 'SANTA MARIA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('285', 'SANTA ROSA DE VITERBO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('286', 'SANTA SOFIA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('287', 'SATIVANORTE', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('288', 'SATIVASUR', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('289', 'SIACHOQUE', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('290', 'SOATA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('291', 'SOCOTA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('292', 'SOCHA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('293', 'SOGAMOSO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('294', 'SOMONDOCO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('295', 'SORA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('296', 'SOTAQUIRA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('297', 'SORACA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('298', 'SUSACON', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('299', 'SUTAMARCHAN', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('300', 'SUTATENZA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('301', 'TASCO', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('302', 'TENZA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('303', 'TIBANA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('304', 'TIBASOSA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('305', 'TINJACA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('306', 'TIPACOQUE', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('307', 'TOCA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('308', 'TOGsI', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('309', 'TOPAGA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('310', 'TOTA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('311', 'TUNUNGUA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('312', 'TURMEQUE', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('313', 'TUTA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('314', 'TUTAZA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('315', 'UMBITA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('316', 'VENTAQUEMADA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('317', 'VIRACACHA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('318', 'ZETAQUIRA', 'BOYACA');
INSERT INTO `t_ciudades` VALUES ('319', 'MANIZALES', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('320', 'AGUADAS', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('321', 'ANSERMA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('322', 'ARANZAZU', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('323', 'BELALCAZAR', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('324', 'CHINCHINA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('325', 'FILADELFIA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('326', 'LA DORADA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('327', 'LA MERCED', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('328', 'MANZANARES', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('329', 'MARMATO', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('330', 'MARQUETALIA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('331', 'MARULANDA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('332', 'NEIRA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('333', 'NORCASIA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('334', 'PACORA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('335', 'PALESTINA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('336', 'PENSILVANIA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('337', 'RIOSUCIO', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('338', 'RISARALDA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('339', 'SALAMINA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('340', 'SAMANA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('341', 'SAN JOSE', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('342', 'SUPIA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('343', 'VICTORIA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('344', 'VILLAMARIA', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('345', 'VITERBO', 'CALDAS');
INSERT INTO `t_ciudades` VALUES ('346', 'FLORENCIA', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('347', 'ALBANIA', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('348', 'BELEN DE LOS ANDAQUIES', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('349', 'CARTAGENA DEL CHAIRA', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('350', 'CURILLO', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('351', 'EL DONCELLO', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('352', 'EL PAUJIL', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('353', 'LA MONTA&Ntilde;ITA', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('354', 'MILAN', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('355', 'MORELIA', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('356', 'PUERTO RICO', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('357', 'SAN JOSE DEL FRAGUA', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('358', 'SAN VICENTE DEL CAGUAN', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('359', 'SOLANO', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('360', 'SOLITA', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('361', 'VALPARAISO', 'CAQUETA');
INSERT INTO `t_ciudades` VALUES ('362', 'POPAYAN', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('363', 'ALMAGUER', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('364', 'ARGELIA', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('365', 'BALBOA', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('366', 'BOLIVAR', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('367', 'BUENOS AIRES', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('368', 'CAJIBIO', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('369', 'CALDONO', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('370', 'CALOTO', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('371', 'CORINTO', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('372', 'EL TAMBO', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('373', 'FLORENCIA', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('374', 'GUACHENE', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('375', 'GUAPI', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('376', 'INZA', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('377', 'JAMBALO', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('378', 'LA SIERRA', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('379', 'LA VEGA', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('380', 'LOPEZ', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('381', 'MERCADERES', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('382', 'MIRANDA', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('383', 'MORALES', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('384', 'PADILLA', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('385', 'PAEZ', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('386', 'PATIA', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('387', 'PIAMONTE', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('388', 'PIENDAMO', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('389', 'PUERTO TEJADA', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('390', 'PURACE', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('391', 'ROSAS', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('392', 'SAN SEBASTIAN', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('393', 'SANTANDER DE QUILICHAO', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('394', 'SANTA ROSA', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('395', 'SILVIA', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('396', 'SOTARA', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('397', 'SUAREZ', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('398', 'SUCRE', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('399', 'TIMBIO', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('400', 'TIMBIQUI', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('401', 'TORIBIO', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('402', 'TOTORO', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('403', 'VILLA RICA', 'CAUCA');
INSERT INTO `t_ciudades` VALUES ('404', 'VALLEDUPAR', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('405', 'AGUACHICA', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('406', 'AGUSTIN CODAZZI', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('407', 'ASTREA', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('408', 'BECERRIL', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('409', 'BOSCONIA', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('410', 'CHIMICHAGUA', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('411', 'CHIRIGUANA', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('412', 'CURUMANI', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('413', 'EL COPEY', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('414', 'EL PASO', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('415', 'GAMARRA', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('416', 'GONZALEZ', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('417', 'LA GLORIA', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('418', 'LA JAGUA DE IBIRICO', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('419', 'MANAURE', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('420', 'PAILITAS', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('421', 'PELAYA', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('422', 'PUEBLO BELLO', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('423', 'RIO DE ORO', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('424', 'LA PAZ', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('425', 'SAN ALBERTO', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('426', 'SAN DIEGO', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('427', 'SAN MARTIN', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('428', 'TAMALAMEQUE', 'CESAR');
INSERT INTO `t_ciudades` VALUES ('429', 'MONTERIA', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('430', 'AYAPEL', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('431', 'BUENAVISTA', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('432', 'CANALETE', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('433', 'CERETE', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('434', 'CHIMA', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('435', 'CHINU', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('436', 'CIENAGA DE ORO', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('437', 'COTORRA', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('438', 'LA APARTADA', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('439', 'LORICA', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('440', 'LOS CORDOBAS', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('441', 'MOMIL', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('442', 'MONTELIBANO', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('443', 'MO&Ntilde;ITOS', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('444', 'PLANETA RICA', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('445', 'PUEBLO NUEVO', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('446', 'PUERTO ESCONDIDO', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('447', 'PUERTO LIBERTADOR', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('448', 'PURISIMA', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('449', 'SAHAGUN', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('450', 'SAN ANDRES SOTAVENTO', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('451', 'SAN ANTERO', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('452', 'SAN BERNARDO DEL VIENTO', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('453', 'SAN CARLOS', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('454', 'SAN PELAYO', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('455', 'TIERRALTA', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('456', 'VALENCIA', 'CORDOBA');
INSERT INTO `t_ciudades` VALUES ('457', 'AGUA DE DIOS', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('458', 'ALBAN', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('459', 'ANAPOIMA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('460', 'ANOLAIMA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('461', 'ARBELAEZ', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('462', 'BELTRAN', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('463', 'BITUIMA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('464', 'BOJACA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('465', 'CABRERA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('466', 'CACHIPAY', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('467', 'CAJICA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('468', 'CAPARRAPI', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('469', 'CAQUEZA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('470', 'CARMEN DE CARUPA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('471', 'CHAGUANI', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('472', 'CHIA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('473', 'CHIPAQUE', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('474', 'CHOACHI', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('475', 'CHOCONTA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('476', 'COGUA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('477', 'COTA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('478', 'CUCUNUBA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('479', 'EL COLEGIO', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('480', 'EL PE&Ntilde;ON', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('481', 'EL ROSAL', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('482', 'FACATATIVA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('483', 'FOMEQUE', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('484', 'FOSCA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('485', 'FUNZA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('486', 'FUQUENE', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('487', 'FUSAGASUGA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('488', 'GACHALA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('489', 'GACHANCIPA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('490', 'GACHETA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('491', 'GAMA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('492', 'GIRARDOT', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('493', 'GRANADA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('494', 'GUACHETA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('495', 'GUADUAS', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('496', 'GUASCA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('497', 'GUATAQUI', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('498', 'GUATAVITA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('499', 'GUAYABAL DE SIQUIMA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('500', 'GUAYABETAL', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('501', 'GUTIERREZ', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('502', 'JERUSALEN', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('503', 'JUNIN', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('504', 'LA CALERA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('505', 'LA MESA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('506', 'LA PALMA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('507', 'LA PE&Ntilde;A', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('508', 'LA VEGA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('509', 'LENGUAZAQUE', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('510', 'MACHETA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('511', 'MADRID', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('512', 'MANTA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('513', 'MEDINA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('514', 'MOSQUERA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('515', 'NARI&Ntilde;O', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('516', 'NEMOCON', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('517', 'NILO', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('518', 'NIMAIMA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('519', 'NOCAIMA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('520', 'VENECIA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('521', 'PACHO', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('522', 'PAIME', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('523', 'PANDI', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('524', 'PARATEBUENO', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('525', 'PASCA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('526', 'PUERTO SALGAR', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('527', 'PULI', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('528', 'QUEBRADANEGRA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('529', 'QUETAME', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('530', 'QUIPILE', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('531', 'APULO', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('532', 'RICAURTE', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('533', 'SAN ANTONIO DEL TEQUENDAMA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('534', 'SAN BERNARDO', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('535', 'SAN CAYETANO', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('536', 'SAN FRANCISCO', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('537', 'SAN JUAN DE RIO SECO', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('538', 'SASAIMA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('539', 'SESQUILE', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('540', 'SIBATE', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('541', 'SILVANIA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('542', 'SIMIJACA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('543', 'SOACHA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('544', 'SOPO', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('545', 'SUBACHOQUE', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('546', 'SUESCA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('547', 'SUPATA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('548', 'SUSA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('549', 'SUTATAUSA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('550', 'TABIO', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('551', 'TAUSA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('552', 'TENA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('553', 'TENJO', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('554', 'TIBACUY', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('555', 'TIBIRITA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('556', 'TOCAIMA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('557', 'TOCANCIPA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('558', 'TOPAIPI', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('559', 'UBALA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('560', 'UBAQUE', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('561', 'VILLA DE SAN DIEGO DE UBATE', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('562', 'UNE', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('563', 'UTICA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('564', 'VERGARA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('565', 'VIANI', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('566', 'VILLAGOMEZ', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('567', 'VILLAPINZON', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('568', 'VILLETA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('569', 'VIOTA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('570', 'YACOPI', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('571', 'ZIPACON', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('572', 'ZIPAQUIRA', 'CUNDINAMARCA');
INSERT INTO `t_ciudades` VALUES ('573', 'QUIBDO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('574', 'ACANDI', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('575', 'ALTO BAUDO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('576', 'ATRATO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('577', 'BAGADO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('578', 'BAHIA SOLANO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('579', 'BAJO BAUDO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('580', 'BOJAYA', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('581', 'EL CANTON DEL SAN PABLO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('582', 'CARMEN DEL DARIEN', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('583', 'CERTEGUI', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('584', 'CONDOTO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('585', 'EL CARMEN DE ATRATO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('586', 'EL LITORAL DEL SAN JUAN', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('587', 'ISTMINA', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('588', 'JURADO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('589', 'LLORO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('590', 'MEDIO ATRATO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('591', 'MEDIO BAUDO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('592', 'MEDIO SAN JUAN', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('593', 'NOVITA', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('594', 'NUQUI', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('595', 'RIO IRO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('596', 'RIO QUITO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('597', 'RIOSUCIO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('598', 'SAN JOSE DEL PALMAR', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('599', 'SIPI', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('600', 'TADO', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('601', 'UNGUIA', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('602', 'UNION PANAMERICANA', 'CHOCO');
INSERT INTO `t_ciudades` VALUES ('603', 'NEIVA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('604', 'ACEVEDO', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('605', 'AGRADO', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('606', 'AIPE', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('607', 'ALGECIRAS', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('608', 'ALTAMIRA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('609', 'BARAYA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('610', 'CAMPOALEGRE', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('611', 'COLOMBIA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('612', 'ELIAS', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('613', 'GARZON', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('614', 'GIGANTE', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('615', 'GUADALUPE', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('616', 'HOBO', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('617', 'IQUIRA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('618', 'ISNOS', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('619', 'LA ARGENTINA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('620', 'LA PLATA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('621', 'NATAGA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('622', 'OPORAPA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('623', 'PAICOL', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('624', 'PALERMO', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('625', 'PALESTINA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('626', 'PITAL', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('627', 'PITALITO', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('628', 'RIVERA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('629', 'SALADOBLANCO', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('630', 'SAN AGUSTIN', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('631', 'SANTA MARIA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('632', 'SUAZA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('633', 'TARQUI', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('634', 'TESALIA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('635', 'TELLO', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('636', 'TERUEL', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('637', 'TIMANA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('638', 'VILLAVIEJA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('639', 'YAGUARA', 'HUILA');
INSERT INTO `t_ciudades` VALUES ('640', 'RIOHACHA', 'LA GUAJIRA');
INSERT INTO `t_ciudades` VALUES ('641', 'ALBANIA', 'LA GUAJIRA');
INSERT INTO `t_ciudades` VALUES ('642', 'BARRANCAS', 'LA GUAJIRA');
INSERT INTO `t_ciudades` VALUES ('643', 'DIBULLA', 'LA GUAJIRA');
INSERT INTO `t_ciudades` VALUES ('644', 'DISTRACCION', 'LA GUAJIRA');
INSERT INTO `t_ciudades` VALUES ('645', 'EL MOLINO', 'LA GUAJIRA');
INSERT INTO `t_ciudades` VALUES ('646', 'FONSECA', 'LA GUAJIRA');
INSERT INTO `t_ciudades` VALUES ('647', 'HATONUEVO', 'LA GUAJIRA');
INSERT INTO `t_ciudades` VALUES ('648', 'LA JAGUA DEL PILAR', 'LA GUAJIRA');
INSERT INTO `t_ciudades` VALUES ('649', 'MAICAO', 'LA GUAJIRA');
INSERT INTO `t_ciudades` VALUES ('650', 'MANAURE', 'LA GUAJIRA');
INSERT INTO `t_ciudades` VALUES ('651', 'SAN JUAN DEL CESAR', 'LA GUAJIRA');
INSERT INTO `t_ciudades` VALUES ('652', 'URIBIA', 'LA GUAJIRA');
INSERT INTO `t_ciudades` VALUES ('653', 'URUMITA', 'LA GUAJIRA');
INSERT INTO `t_ciudades` VALUES ('654', 'VILLANUEVA', 'LA GUAJIRA');
INSERT INTO `t_ciudades` VALUES ('655', 'SANTA MARTA', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('656', 'ALGARROBO', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('657', 'ARACATACA', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('658', 'ARIGUANI', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('659', 'CERRO SAN ANTONIO', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('660', 'CHIBOLO', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('661', 'CIENAGA', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('662', 'CONCORDIA', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('663', 'EL BANCO', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('664', 'EL PI&Ntilde;ON', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('665', 'EL RETEN', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('666', 'FUNDACION', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('667', 'GUAMAL', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('668', 'NUEVA GRANADA', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('669', 'PEDRAZA', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('670', 'PIJI&Ntilde;O DEL CARMEN', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('671', 'PIVIJAY', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('672', 'PLATO', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('673', 'PUEBLOVIEJO', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('674', 'REMOLINO', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('675', 'SABANAS DE SAN ANGEL', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('676', 'SALAMINA', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('677', 'SAN SEBASTIAN DE BUENAVISTA', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('678', 'SAN ZENON', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('679', 'SANTA ANA', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('680', 'SANTA BARBARA DE PINTO', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('681', 'SITIONUEVO', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('682', 'TENERIFE', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('683', 'ZAPAYAN', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('684', 'ZONA BANANERA', 'MAGDALENA');
INSERT INTO `t_ciudades` VALUES ('685', 'VILLAVICENCIO', 'META');
INSERT INTO `t_ciudades` VALUES ('686', 'ACACIAS', 'META');
INSERT INTO `t_ciudades` VALUES ('687', 'BARRANCA DE UPIA', 'META');
INSERT INTO `t_ciudades` VALUES ('688', 'CABUYARO', 'META');
INSERT INTO `t_ciudades` VALUES ('689', 'CASTILLA LA NUEVA', 'META');
INSERT INTO `t_ciudades` VALUES ('690', 'CUBARRAL', 'META');
INSERT INTO `t_ciudades` VALUES ('691', 'CUMARAL', 'META');
INSERT INTO `t_ciudades` VALUES ('692', 'EL CALVARIO', 'META');
INSERT INTO `t_ciudades` VALUES ('693', 'EL CASTILLO', 'META');
INSERT INTO `t_ciudades` VALUES ('694', 'EL DORADO', 'META');
INSERT INTO `t_ciudades` VALUES ('695', 'FUENTE DE ORO', 'META');
INSERT INTO `t_ciudades` VALUES ('696', 'GRANADA', 'META');
INSERT INTO `t_ciudades` VALUES ('697', 'GUAMAL', 'META');
INSERT INTO `t_ciudades` VALUES ('698', 'MAPIRIPAN', 'META');
INSERT INTO `t_ciudades` VALUES ('699', 'MESETAS', 'META');
INSERT INTO `t_ciudades` VALUES ('700', 'LA MACARENA', 'META');
INSERT INTO `t_ciudades` VALUES ('701', 'URIBE', 'META');
INSERT INTO `t_ciudades` VALUES ('702', 'LEJANIAS', 'META');
INSERT INTO `t_ciudades` VALUES ('703', 'PUERTO CONCORDIA', 'META');
INSERT INTO `t_ciudades` VALUES ('704', 'PUERTO GAITAN', 'META');
INSERT INTO `t_ciudades` VALUES ('705', 'PUERTO LOPEZ', 'META');
INSERT INTO `t_ciudades` VALUES ('706', 'PUERTO LLERAS', 'META');
INSERT INTO `t_ciudades` VALUES ('707', 'PUERTO RICO', 'META');
INSERT INTO `t_ciudades` VALUES ('708', 'RESTREPO', 'META');
INSERT INTO `t_ciudades` VALUES ('709', 'SAN CARLOS DE GUAROA', 'META');
INSERT INTO `t_ciudades` VALUES ('710', 'SAN JUAN DE ARAMA', 'META');
INSERT INTO `t_ciudades` VALUES ('711', 'SAN JUANITO', 'META');
INSERT INTO `t_ciudades` VALUES ('712', 'SAN MARTIN', 'META');
INSERT INTO `t_ciudades` VALUES ('713', 'VISTAHERMOSA', 'META');
INSERT INTO `t_ciudades` VALUES ('714', 'PASTO', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('715', 'ALBAN', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('716', 'ALDANA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('717', 'ANCUYA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('718', 'ARBOLEDA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('719', 'BARBACOAS', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('720', 'BELEN', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('721', 'BUESACO', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('722', 'COLON', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('723', 'CONSACA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('724', 'CONTADERO', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('725', 'CORDOBA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('726', 'CUASPUD', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('727', 'CUMBAL', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('728', 'CUMBITARA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('729', 'CHACHAGsI', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('730', 'EL CHARCO', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('731', 'EL PE&Ntilde;OL', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('732', 'EL ROSARIO', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('733', 'EL TABLON DE GOMEZ', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('734', 'EL TAMBO', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('735', 'FUNES', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('736', 'GUACHUCAL', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('737', 'GUAITARILLA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('738', 'GUALMATAN', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('739', 'ILES', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('740', 'IMUES', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('741', 'IPIALES', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('742', 'LA CRUZ', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('743', 'LA FLORIDA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('744', 'LA LLANADA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('745', 'LA TOLA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('746', 'LA UNION', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('747', 'LEIVA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('748', 'LINARES', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('749', 'LOS ANDES', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('750', 'MAGsI', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('751', 'MALLAMA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('752', 'MOSQUERA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('753', 'NARI&Ntilde;O', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('754', 'OLAYA HERRERA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('755', 'OSPINA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('756', 'FRANCISCO PIZARRO', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('757', 'POLICARPA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('758', 'POTOSI', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('759', 'PROVIDENCIA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('760', 'PUERRES', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('761', 'PUPIALES', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('762', 'RICAURTE', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('763', 'ROBERTO PAYAN', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('764', 'SAMANIEGO', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('765', 'SANDONA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('766', 'SAN BERNARDO', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('767', 'SAN LORENZO', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('768', 'SAN PABLO', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('769', 'SAN PEDRO DE CARTAGO', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('770', 'SANTA BARBARA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('771', 'SANTACRUZ', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('772', 'SAPUYES', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('773', 'TAMINANGO', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('774', 'TANGUA', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('775', 'SAN ANDRES DE TUMACO', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('776', 'TUQUERRES', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('777', 'YACUANQUER', 'NARI&Ntilde;O');
INSERT INTO `t_ciudades` VALUES ('778', 'CUCUTA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('779', 'ABREGO', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('780', 'ARBOLEDAS', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('781', 'BOCHALEMA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('782', 'BUCARASICA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('783', 'CACOTA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('784', 'CACHIRA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('785', 'CHINACOTA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('786', 'CHITAGA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('787', 'CONVENCION', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('788', 'CUCUTILLA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('789', 'DURANIA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('790', 'EL CARMEN', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('791', 'EL TARRA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('792', 'EL ZULIA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('793', 'GRAMALOTE', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('794', 'HACARI', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('795', 'HERRAN', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('796', 'LABATECA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('797', 'LA ESPERANZA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('798', 'LA PLAYA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('799', 'LOS PATIOS', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('800', 'LOURDES', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('801', 'MUTISCUA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('802', 'OCA&Ntilde;A', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('803', 'PAMPLONA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('804', 'PAMPLONITA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('805', 'PUERTO SANTANDER', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('806', 'RAGONVALIA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('807', 'SALAZAR', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('808', 'SAN CALIXTO', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('809', 'SAN CAYETANO', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('810', 'SANTIAGO', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('811', 'SARDINATA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('812', 'SILOS', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('813', 'TEORAMA', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('814', 'TIBU', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('815', 'TOLEDO', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('816', 'VILLA CARO', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('817', 'VILLA DEL ROSARIO', 'N. DE SANTANDER');
INSERT INTO `t_ciudades` VALUES ('818', 'ARMENIA', 'QUINDIO');
INSERT INTO `t_ciudades` VALUES ('819', 'BUENAVISTA', 'QUINDIO');
INSERT INTO `t_ciudades` VALUES ('820', 'CALARCA', 'QUINDIO');
INSERT INTO `t_ciudades` VALUES ('821', 'CIRCASIA', 'QUINDIO');
INSERT INTO `t_ciudades` VALUES ('822', 'CORDOBA', 'QUINDIO');
INSERT INTO `t_ciudades` VALUES ('823', 'FILANDIA', 'QUINDIO');
INSERT INTO `t_ciudades` VALUES ('824', 'GENOVA', 'QUINDIO');
INSERT INTO `t_ciudades` VALUES ('825', 'LA TEBAIDA', 'QUINDIO');
INSERT INTO `t_ciudades` VALUES ('826', 'MONTENEGRO', 'QUINDIO');
INSERT INTO `t_ciudades` VALUES ('827', 'PIJAO', 'QUINDIO');
INSERT INTO `t_ciudades` VALUES ('828', 'QUIMBAYA', 'QUINDIO');
INSERT INTO `t_ciudades` VALUES ('829', 'SALENTO', 'QUINDIO');
INSERT INTO `t_ciudades` VALUES ('830', 'PEREIRA', 'RISARALDA');
INSERT INTO `t_ciudades` VALUES ('831', 'APIA', 'RISARALDA');
INSERT INTO `t_ciudades` VALUES ('832', 'BALBOA', 'RISARALDA');
INSERT INTO `t_ciudades` VALUES ('833', 'BELEN DE UMBRIA', 'RISARALDA');
INSERT INTO `t_ciudades` VALUES ('834', 'DOSQUEBRADAS', 'RISARALDA');
INSERT INTO `t_ciudades` VALUES ('835', 'GUATICA', 'RISARALDA');
INSERT INTO `t_ciudades` VALUES ('836', 'LA CELIA', 'RISARALDA');
INSERT INTO `t_ciudades` VALUES ('837', 'LA VIRGINIA', 'RISARALDA');
INSERT INTO `t_ciudades` VALUES ('838', 'MARSELLA', 'RISARALDA');
INSERT INTO `t_ciudades` VALUES ('839', 'MISTRATO', 'RISARALDA');
INSERT INTO `t_ciudades` VALUES ('840', 'PUEBLO RICO', 'RISARALDA');
INSERT INTO `t_ciudades` VALUES ('841', 'QUINCHIA', 'RISARALDA');
INSERT INTO `t_ciudades` VALUES ('842', 'SANTA ROSA DE CABAL', 'RISARALDA');
INSERT INTO `t_ciudades` VALUES ('843', 'SANTUARIO', 'RISARALDA');
INSERT INTO `t_ciudades` VALUES ('844', 'BUCARAMANGA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('845', 'AGUADA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('846', 'ALBANIA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('847', 'ARATOCA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('848', 'BARBOSA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('849', 'BARICHARA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('850', 'BARRANCABERMEJA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('851', 'BETULIA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('852', 'BOLIVAR', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('853', 'CABRERA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('854', 'CALIFORNIA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('855', 'CAPITANEJO', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('856', 'CARCASI', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('857', 'CEPITA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('858', 'CERRITO', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('859', 'CHARALA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('860', 'CHARTA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('861', 'CHIMA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('862', 'CHIPATA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('863', 'CIMITARRA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('864', 'CONCEPCION', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('865', 'CONFINES', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('866', 'CONTRATACION', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('867', 'COROMORO', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('868', 'CURITI', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('869', 'EL CARMEN DE CHUCURI', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('870', 'EL GUACAMAYO', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('871', 'EL PE&Ntilde;ON', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('872', 'EL PLAYON', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('873', 'ENCINO', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('874', 'ENCISO', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('875', 'FLORIAN', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('876', 'FLORIDABLANCA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('877', 'GALAN', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('878', 'GAMBITA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('879', 'GIRON', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('880', 'GUACA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('881', 'GUADALUPE', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('882', 'GUAPOTA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('883', 'GUAVATA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('884', 'GsEPSA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('885', 'HATO', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('886', 'JESUS MARIA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('887', 'JORDAN', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('888', 'LA BELLEZA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('889', 'LANDAZURI', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('890', 'LA PAZ', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('891', 'LEBRIJA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('892', 'LOS SANTOS', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('893', 'MACARAVITA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('894', 'MALAGA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('895', 'MATANZA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('896', 'MOGOTES', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('897', 'MOLAGAVITA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('898', 'OCAMONTE', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('899', 'OIBA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('900', 'ONZAGA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('901', 'PALMAR', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('902', 'PALMAS DEL SOCORRO', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('903', 'PARAMO', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('904', 'PIEDECUESTA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('905', 'PINCHOTE', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('906', 'PUENTE NACIONAL', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('907', 'PUERTO PARRA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('908', 'PUERTO WILCHES', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('909', 'RIONEGRO', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('910', 'SABANA DE TORRES', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('911', 'SAN ANDRES', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('912', 'SAN BENITO', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('913', 'SAN GIL', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('914', 'SAN JOAQUIN', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('915', 'SAN JOSE DE MIRANDA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('916', 'SAN MIGUEL', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('917', 'SAN VICENTE DE CHUCURI', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('918', 'SANTA BARBARA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('919', 'SANTA HELENA DEL OPON', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('920', 'SIMACOTA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('921', 'SOCORRO', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('922', 'SUAITA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('923', 'SUCRE', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('924', 'SURATA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('925', 'TONA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('926', 'VALLE DE SAN JOSE', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('927', 'VELEZ', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('928', 'VETAS', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('929', 'VILLANUEVA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('930', 'ZAPATOCA', 'SANTANDER');
INSERT INTO `t_ciudades` VALUES ('931', 'SINCELEJO', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('932', 'BUENAVISTA', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('933', 'CAIMITO', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('934', 'COLOSO', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('935', 'COROZAL', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('936', 'COVE&Ntilde;AS', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('937', 'CHALAN', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('938', 'EL ROBLE', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('939', 'GALERAS', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('940', 'GUARANDA', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('941', 'LA UNION', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('942', 'LOS PALMITOS', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('943', 'MAJAGUAL', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('944', 'MORROA', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('945', 'OVEJAS', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('946', 'PALMITO', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('947', 'SAMPUES', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('948', 'SAN BENITO ABAD', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('949', 'SAN JUAN DE BETULIA', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('950', 'SAN MARCOS', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('951', 'SAN ONOFRE', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('952', 'SAN PEDRO', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('953', 'SAN LUIS DE SINCE', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('954', 'SUCRE', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('955', 'SANTIAGO DE TOLU', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('956', 'TOLU VIEJO', 'SUCRE');
INSERT INTO `t_ciudades` VALUES ('957', 'IBAGUE', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('958', 'ALPUJARRA', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('959', 'ALVARADO', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('960', 'AMBALEMA', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('961', 'ANZOATEGUI', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('962', 'ARMERO', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('963', 'ATACO', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('964', 'CAJAMARCA', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('965', 'CARMEN DE APICALA', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('966', 'CASABIANCA', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('967', 'CHAPARRAL', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('968', 'COELLO', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('969', 'COYAIMA', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('970', 'CUNDAY', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('971', 'DOLORES', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('972', 'ESPINAL', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('973', 'FALAN', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('974', 'FLANDES', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('975', 'FRESNO', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('976', 'GUAMO', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('977', 'HERVEO', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('978', 'HONDA', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('979', 'ICONONZO', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('980', 'LERIDA', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('981', 'LIBANO', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('982', 'MARIQUITA', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('983', 'MELGAR', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('984', 'MURILLO', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('985', 'NATAGAIMA', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('986', 'ORTEGA', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('987', 'PALOCABILDO', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('988', 'PIEDRAS', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('989', 'PLANADAS', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('990', 'PRADO', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('991', 'PURIFICACION', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('992', 'RIOBLANCO', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('993', 'RONCESVALLES', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('994', 'ROVIRA', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('995', 'SALDA&Ntilde;A', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('996', 'SAN ANTONIO', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('997', 'SAN LUIS', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('998', 'SANTA ISABEL', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('999', 'SUAREZ', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('1000', 'VALLE DE SAN JUAN', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('1001', 'VENADILLO', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('1002', 'VILLAHERMOSA', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('1003', 'VILLARRICA', 'TOLIMA');
INSERT INTO `t_ciudades` VALUES ('1004', 'CALI', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1005', 'ALCALA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1006', 'ANDALUCIA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1007', 'ANSERMANUEVO', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1008', 'ARGELIA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1009', 'BOLIVAR', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1010', 'BUENAVENTURA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1011', 'GUADALAJARA DE BUGA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1012', 'BUGALAGRANDE', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1013', 'CAICEDONIA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1014', 'CALIMA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1015', 'CANDELARIA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1016', 'CARTAGO', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1017', 'DAGUA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1018', 'EL AGUILA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1019', 'EL CAIRO', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1020', 'EL CERRITO', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1021', 'EL DOVIO', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1022', 'FLORIDA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1023', 'GINEBRA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1024', 'GUACARI', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1025', 'JAMUNDI', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1026', 'LA CUMBRE', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1027', 'LA UNION', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1028', 'LA VICTORIA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1029', 'OBANDO', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1030', 'PALMIRA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1031', 'PRADERA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1032', 'RESTREPO', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1033', 'RIOFRIO', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1034', 'ROLDANILLO', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1035', 'SAN PEDRO', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1036', 'SEVILLA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1037', 'TORO', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1038', 'TRUJILLO', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1039', 'TULUA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1040', 'ULLOA', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1041', 'VERSALLES', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1042', 'VIJES', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1043', 'YOTOCO', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1044', 'YUMBO', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1045', 'ZARZAL', 'VALLE DEL CAUCA');
INSERT INTO `t_ciudades` VALUES ('1046', 'ARAUCA', 'ARAUCA');
INSERT INTO `t_ciudades` VALUES ('1047', 'ARAUQUITA', 'ARAUCA');
INSERT INTO `t_ciudades` VALUES ('1048', 'CRAVO NORTE', 'ARAUCA');
INSERT INTO `t_ciudades` VALUES ('1049', 'FORTUL', 'ARAUCA');
INSERT INTO `t_ciudades` VALUES ('1050', 'PUERTO RONDON', 'ARAUCA');
INSERT INTO `t_ciudades` VALUES ('1051', 'SARAVENA', 'ARAUCA');
INSERT INTO `t_ciudades` VALUES ('1052', 'TAME', 'ARAUCA');
INSERT INTO `t_ciudades` VALUES ('1053', 'YOPAL', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1054', 'AGUAZUL', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1055', 'CHAMEZA', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1056', 'HATO COROZAL', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1057', 'LA SALINA', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1058', 'MANI', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1059', 'MONTERREY', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1060', 'NUNCHIA', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1061', 'OROCUE', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1062', 'PAZ DE ARIPORO', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1063', 'PORE', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1064', 'RECETOR', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1065', 'SABANALARGA', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1066', 'SACAMA', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1067', 'SAN LUIS DE PALENQUE', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1068', 'TAMARA', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1069', 'TAURAMENA', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1070', 'TRINIDAD', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1071', 'VILLANUEVA', 'CASANARE');
INSERT INTO `t_ciudades` VALUES ('1072', 'MOCOA', 'PUTUMAYO');
INSERT INTO `t_ciudades` VALUES ('1073', 'COLON', 'PUTUMAYO');
INSERT INTO `t_ciudades` VALUES ('1074', 'ORITO', 'PUTUMAYO');
INSERT INTO `t_ciudades` VALUES ('1075', 'PUERTO ASIS', 'PUTUMAYO');
INSERT INTO `t_ciudades` VALUES ('1076', 'PUERTO CAICEDO', 'PUTUMAYO');
INSERT INTO `t_ciudades` VALUES ('1077', 'PUERTO GUZMAN', 'PUTUMAYO');
INSERT INTO `t_ciudades` VALUES ('1078', 'LEGUIZAMO', 'PUTUMAYO');
INSERT INTO `t_ciudades` VALUES ('1079', 'SIBUNDOY', 'PUTUMAYO');
INSERT INTO `t_ciudades` VALUES ('1080', 'SAN FRANCISCO', 'PUTUMAYO');
INSERT INTO `t_ciudades` VALUES ('1081', 'SAN MIGUEL', 'PUTUMAYO');
INSERT INTO `t_ciudades` VALUES ('1082', 'SANTIAGO', 'PUTUMAYO');
INSERT INTO `t_ciudades` VALUES ('1083', 'VALLE DEL GUAMUEZ', 'PUTUMAYO');
INSERT INTO `t_ciudades` VALUES ('1084', 'VILLAGARZON', 'PUTUMAYO');
INSERT INTO `t_ciudades` VALUES ('1085', 'SAN ANDRES', 'SAN ANDRES');
INSERT INTO `t_ciudades` VALUES ('1086', 'PROVIDENCIA', 'SAN ANDRES');
INSERT INTO `t_ciudades` VALUES ('1087', 'LETICIA', 'AMAZONAS');
INSERT INTO `t_ciudades` VALUES ('1088', 'EL ENCANTO', 'AMAZONAS');
INSERT INTO `t_ciudades` VALUES ('1089', 'LA CHORRERA', 'AMAZONAS');
INSERT INTO `t_ciudades` VALUES ('1090', 'LA PEDRERA', 'AMAZONAS');
INSERT INTO `t_ciudades` VALUES ('1091', 'LA VICTORIA', 'AMAZONAS');
INSERT INTO `t_ciudades` VALUES ('1092', 'MIRITI - PARANA', 'AMAZONAS');
INSERT INTO `t_ciudades` VALUES ('1093', 'PUERTO ALEGRIA', 'AMAZONAS');
INSERT INTO `t_ciudades` VALUES ('1094', 'PUERTO ARICA', 'AMAZONAS');
INSERT INTO `t_ciudades` VALUES ('1095', 'PUERTO NARI&Ntilde;O', 'AMAZONAS');
INSERT INTO `t_ciudades` VALUES ('1096', 'PUERTO SANTANDER', 'AMAZONAS');
INSERT INTO `t_ciudades` VALUES ('1097', 'TARAPACA', 'AMAZONAS');
INSERT INTO `t_ciudades` VALUES ('1098', 'INIRIDA', 'GUAINIA');
INSERT INTO `t_ciudades` VALUES ('1099', 'BARRANCO MINAS', 'GUAINIA');
INSERT INTO `t_ciudades` VALUES ('1100', 'MAPIRIPANA', 'GUAINIA');
INSERT INTO `t_ciudades` VALUES ('1101', 'SAN FELIPE', 'GUAINIA');
INSERT INTO `t_ciudades` VALUES ('1102', 'PUERTO COLOMBIA', 'GUAINIA');
INSERT INTO `t_ciudades` VALUES ('1103', 'LA GUADALUPE', 'GUAINIA');
INSERT INTO `t_ciudades` VALUES ('1104', 'CACAHUAL', 'GUAINIA');
INSERT INTO `t_ciudades` VALUES ('1105', 'PANA PANA', 'GUAINIA');
INSERT INTO `t_ciudades` VALUES ('1106', 'MORICHAL', 'GUAINIA');
INSERT INTO `t_ciudades` VALUES ('1107', 'SAN JOSE DEL GUAVIARE', 'GUAVIARE');
INSERT INTO `t_ciudades` VALUES ('1108', 'CALAMAR', 'GUAVIARE');
INSERT INTO `t_ciudades` VALUES ('1109', 'EL RETORNO', 'GUAVIARE');
INSERT INTO `t_ciudades` VALUES ('1110', 'MIRAFLORES', 'GUAVIARE');
INSERT INTO `t_ciudades` VALUES ('1111', 'MITU', 'VAUPES');
INSERT INTO `t_ciudades` VALUES ('1112', 'CARURU', 'VAUPES');
INSERT INTO `t_ciudades` VALUES ('1113', 'PACOA', 'VAUPES');
INSERT INTO `t_ciudades` VALUES ('1114', 'TARAIRA', 'VAUPES');
INSERT INTO `t_ciudades` VALUES ('1115', 'PAPUNAUA', 'VAUPES');
INSERT INTO `t_ciudades` VALUES ('1116', 'YAVARATE', 'VAUPES');
INSERT INTO `t_ciudades` VALUES ('1117', 'PUERTO CARRE&Ntilde;O', 'VICHADA');
INSERT INTO `t_ciudades` VALUES ('1118', 'LA PRIMAVERA', 'VICHADA');
INSERT INTO `t_ciudades` VALUES ('1119', 'SANTA ROSALIA', 'VICHADA');
INSERT INTO `t_ciudades` VALUES ('1120', 'CUMARIBO', 'VICHADA');

-- ----------------------------
-- Table structure for t_comentarios
-- ----------------------------
DROP TABLE IF EXISTS `t_comentarios`;
CREATE TABLE `t_comentarios` (
  `ID_COMENTARIO` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_OBSERVACION` bigint(20) DEFAULT NULL,
  `ID_USUARIO` bigint(20) DEFAULT NULL,
  `COMENTARIO` varchar(1000) DEFAULT NULL,
  `FECHA_COMENTARIO` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_COMENTARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_comentarios
-- ----------------------------

-- ----------------------------
-- Table structure for t_consecutivos
-- ----------------------------
DROP TABLE IF EXISTS `t_consecutivos`;
CREATE TABLE `t_consecutivos` (
  `NOMBRE` varchar(30) DEFAULT NULL,
  `CONSECUTIVO` bigint(20) DEFAULT NULL,
  `FECHA_MODIFICA` datetime DEFAULT NULL,
  `USUARIO_MODIFICA` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_consecutivos
-- ----------------------------
INSERT INTO `t_consecutivos` VALUES ('RECIBO', '34009', '2016-01-20 13:26:02', null);
INSERT INTO `t_consecutivos` VALUES ('SOLICITUD', '3', '2015-12-10 14:55:35', null);
INSERT INTO `t_consecutivos` VALUES ('CUADRE', '1', '2015-12-10 14:55:35', '1');

-- ----------------------------
-- Table structure for t_deudores
-- ----------------------------
DROP TABLE IF EXISTS `t_deudores`;
CREATE TABLE `t_deudores` (
  `ID_DEUDOR` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(80) DEFAULT NULL,
  `TELEFONO` bigint(20) DEFAULT NULL,
  `CELULAR` varchar(10) DEFAULT NULL,
  `DIRECCION` varchar(255) DEFAULT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `DOCUMENTO` bigint(20) DEFAULT NULL,
  `ENCARGADO` varchar(40) DEFAULT NULL,
  `CORREO` varchar(255) DEFAULT NULL,
  `LIGADO` tinyint(3) DEFAULT '0' COMMENT 'Si el cliente esta ligado a una solicitud',
  `ESTADO` tinyint(1) DEFAULT '1',
  `USUARIO_REGISTRA` bigint(20) DEFAULT NULL,
  `USUARIO_MODIFICA` bigint(20) DEFAULT NULL,
  `USUARIO_ELIMINA` bigint(20) DEFAULT NULL,
  `FECHA_MODIFICA` datetime DEFAULT NULL,
  `FECHA_REGISTRA` datetime DEFAULT NULL,
  `FECHA_ELIMINA` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_DEUDOR`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_deudores
-- ----------------------------
INSERT INTO `t_deudores` VALUES ('1', 'ANA PIEDAD FERNANDEZ ALVAREZ', '2396099', '3127832813', 'CRA 43 # 40-03 ', '1', '21400044', '', '', '2', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('2', 'ANGELA BEATRIZ VANEGAS', '2381816', '', 'CRA 84 # 31 A 45 INT 0102', '1', '43020494', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('3', 'AMANDA ARANGO DE OSPINA', '5815246', '', 'cll 103 #82 int 301', '1', '32496420', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('4', 'ARNOLDO DE JESUS CARO GALLEGO', '2844724', '', 'CLL 59 # 18 D 67', '1', '8221041', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('5', 'ADRIANA MARIA GALEANO', '4427536', '', 'CLL 79 # 50-38', '1', '43513163', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('6', 'BEATRIZ ELENA BARRENECHE HINCAPIE', '2222446', '3007035084', 'CLL 51 A # 28-39', '1', '43062738', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('7', 'BLANCA ROSMERY GRANADA', '2112290', '', 'CLL 89 A # 36-27', '1', '43540391', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('8', 'BLANCA EDELMIRA TRUJILLO', '0', '3205551195', 'CRA 49 # 101-23 INT 301', '1', '25033915', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('9', 'CELINA CARO DE FLOREZ', '5216913', '3215914108', 'CRA 43 A # 96-91 INT 121', '1', '21558258', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('10', 'CARLOS MARIO PABON HERNANDEZ', '2617870', '3186009495', 'CLL 94 # 46 A 12 INT 301', '1', '71365180', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('11', 'CENET DE JESUS RODAS', '5709697', '3148054521', 'CLL 57 # 24 BB 67', '1', '43513425', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('12', 'DIANA PATRICIA HERNANDEZ', '5770515', '', 'CLL 34 C # 81-92 INT 601', '1', '43547444', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('13', 'DONALDO DE JESUS RAYO', '2735564', '3015959056', 'CLL 20 F # 72-22', '1', '8297608', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('14', 'DORIS ALEIDA GALLEGO', '5163366', '3117274637', 'CLL 82 C # 50 E 59 INT 101', '1', '43083698', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('15', 'DEYANIRA AREIZA GOMEZ', '2696365', '3177041739', 'CRA 40 A # 86 A 74', '1', '21689250', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('16', 'EDGAR MONTOYA CARMONA', '2374880', '', 'CRA 74 # 93-80', '1', '70099586', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('17', 'ELIZABET HINCAPIE CANO', '5849073', '3016823666', 'CLL 101 # 78 A 59', '1', '43593042', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('18', 'ENOCH DE JESUS URREGO CASTRILLON', '5825122', '3113139611', 'CLL 107 B # 81-107', '1', '560428', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('19', 'FREDY UBEIMAR GIRALDO MARTINEZ', '2571815', '3005045085', 'AV 37 B # 60 A -36', '1', '71775636', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('20', 'GLORIA MARIA GONZALEZ TORO', '4387666', '3175299324', 'CLL 64 A # 106-151 INT 104', '1', '42786912', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('21', 'JAIRO ANTONIO LONDOÑO MONCADA', '5714701', '3203438040', 'CRA 43 AA #88-147', '1', '8310841', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('22', 'JOSE GABRIEL HINESTROZA', '4416909', '3104269475', 'CLL 86 A #92 A -22', '1', '8335448', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('23', 'JUAN FERNANDO MONTOYA', '2856949', '', 'CLL 9 AA SUR # 54-41', '1', '88224138', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('24', 'JOSEFINA CARDONA ARANGO', '4710598', '', 'CLL 98 #  67 - 16 INT 200', '1', '21326974', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('25', 'JOSE MURIEL GALVIS GALVIS', '5823138', '3117757007', 'CLL 203 # 73-79', '1', '3516129', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('26', 'JOSE JUVENAL JIMENEZ', '4930379', '', 'CLL 34 C # 107-02', '1', '70660624', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('27', 'KELLY VILLADA ALZATE', '2936513', '3177830739', 'CLL 46 #29-15 (301)', '1', '43587805', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('28', 'LIBIA DIAZ DE LOPEZ', '2363700', '', 'CLL 96# 38-35', '1', '21263090', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('29', 'LUIS FERNANDO LAMPION MONSALVE', '4913146', '', 'CRA 44 A #105-07', '1', '71699150', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('30', 'LUZ ENITH HIGUITA DE HIGUITA', '3210817', '3108897973', 'CRA 49 # 96-27', '1', '72976870', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('31', 'LUZ MARINA OSSA CASTRILLON', '5969698', '3015057679', 'CLL 29 #58 DD 109', '1', '32076452', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('32', 'LUZ IRENE ZAPATA ZAPATA', '2172207', '3136964176', 'CRA 35 # 40 A -19', '1', '43046060', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('33', 'MARIA LIBIA MESA OSORIO', '4517573', '', 'CRA 62 D # 72 A 117', '1', '21491296', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('34', 'MARIA EDILMA VALENCIA POSADA', '4622464', '', 'CLL 123 CON 50-09 INT 0102', '1', '43015767', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('35', 'MARIA OFELIA URREGO CARDONA', '0', '', 'CLL 98 A # 49-32', '1', '32469748', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('36', 'MARIA DOMITILA CADAVID RODRIGUEZ', '4712894', '', 'CLL 99 C # 64 B 21', '1', '21763887', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('37', 'MARIA GALEANO SANCHEZ', '2526616', '3134209180', ' CL 89 # 37-8', '1', '43802947', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('38', 'MARIA CLEMIRA AREIZA', '5112818', '', 'CRA 41A-82-31 (101)', '1', '63250309', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('39', 'MIGUEL ANGEL GALLEGO ', '2366024', '3128858182', 'CL 98 # 51-90 (302)', '1', '8246806', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('40', 'MARTHA NELLY MONA MUÑOZ', '2115747', '3127058114', 'CRA 41 # 70-27', '1', '43534677', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('41', 'MARIA ELENA LONDOÑO MARTINEZ', '2391776', '3147430903', 'CRA 32 A # 30 A 18 INT 302', '1', '43531549', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('42', 'MARIA RUBIELA VILLEGAS DE POSADA', '3719878', '', 'CLL 49 C # 5-114', '1', '32551043', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('43', 'MARIA ROSMIRA ARIAS GARCIA', '4610484', '3215740655', 'CRA 42 # 87-34 INT 201', '1', '32477940', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('44', 'MARIO ALONSO RAMIREZ', '2128487', '3117500166', 'CRA 44 # 87-16 INT 302', '1', '98517693', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('45', 'MARTHA ELENA SALAZAR DE GARCIA', '8463519', '', 'CLL 65 E # 45 A 34', '1', '22108608', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('46', 'NUBIA MORENO RAMIREZ', '2273304', '', 'CRA 67 A # 114-19 INT 301', '1', '37800002', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('47', 'NUBIA AMPARO ARBOLEDA', '2217728', '', 'CRA 8 A # 56-23', '1', '42962807', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('48', 'NUBIA ROSA LOPEZ DE GIRALDO', '2146432', '', 'CLL 52 #4-16', '1', '32498298', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('49', 'PIEDAD BIBIANA BETANCUR', '2135250', '', 'CRA 49 A # 82-67', '1', '43574908', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('50', 'RUTH ELENA RAMIREZ', '4742783', '', 'CRA 72 B 96-73 INT 301', '1', '32497808', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('51', 'SENET LETICIA VASQUEZ VELEZ ', '2598784', '', 'CLL 58 # 31-63', '1', '32698033', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('52', 'SANDRA MARIA ROJAS HURTADO', '2520367', '3128306981', 'CRA 118 # 39 DA 64', '1', '29114140', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('53', 'FEDERICO POSADA VILLA Y TERESA DEL CARME', '4226553', '3118549033', 'CRA 90 C # 76 DA 13', '1', '32510065', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('54', 'TERESA GARCIA DE CAICEDO', '2145197', '', 'CLL 49 # 49 INT 201', '1', '21545525', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('55', 'ANA MARIA URREGO', '6003101', '', 'CLL 75 # 52 A 64', '1', '32431418', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('56', 'CLAUDIA ELENA ARROYABE', '5812537', '3206931537', 'CLL 80 # 71-02/11', '1', '43062729', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('57', 'FERNANDO MANUEL FUENTES', '3106264', '3122487315', 'CLL 64 F # 117-59', '1', '71799226', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('58', 'ISABEL CRISTINA GOMEZ TOBON ', '4445684', '', 'CRA 76 # 3-14 INT 118', '1', '43874278', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('59', 'JANETH GARCIA PACHECO', '4730808', '3217722593', 'CRA 84 A # 37 B 54', '1', '1027945479', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('60', 'LUZ MARINA RESTREPO ADARVE', '2273963', '', 'CRA 24 C # 55-26', '1', '32534370', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('61', 'MARIA FANNY GIL LAVERDE', '0', '3013294222', 'CRA 54 B #29 AA 09', '1', '43051703', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('62', 'MARIA IRENE LONDOÑO', '2924277', '', 'CLL 61 A #42-04', '1', '32443826', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('63', 'RAMIRO CORDOBA ANDRADE', '0', '3104911129', 'CLL 76 # 50-89', '1', '7187460', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('64', 'JOSE FERNANDO TORRES ECHAVARRIA', '2397635', '3136163000', 'CLL 79 # 37-09', '1', '71719694', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('65', 'FRANCISCO JAVIER ARANGO', '4927506', '3128402655', 'LETRA', '1', '70094107', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('66', 'JHON JAIRO OSPINA BERRIO', '4040254', '', 'CLL 79 # 50-30', '1', '71613743', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('67', 'ANGELA MARCELA HERRERA ZAPATA', '0', '3192227945', 'CLL 57 B # 7-66 INT 117', '1', '43260177', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('68', 'LILIA DEL SOCORRO PATIÑO RIOS', '4388009', '', 'LOTE', '1', '43361355', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('69', 'RAMIRO ANTONIO GIRALDO', '4961710', '3007177423', 'CLL 48 B #120 E 25', '1', '70088', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('70', 'SIMON BOLIVAR', '3370835', '3133183743', 'CLL 4 BB # 7 ESTE 33', '1', '98527144', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('71', 'ESTHER CRISTINA HERNANDEZ HINCAPIE', '5805375', '3128890591', 'CRA 78 B 104 B 8', '1', '43662654', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('72', 'FERNANDO TOBON B', '0', '3136643148', 'CLL 70 N° 49-28', '1', '98564439', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('73', 'NELLY LONDOÑO ', '5815042', '3152846463', 'CRA 69 N°73-95', '1', '21359232', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('74', 'CATALINA MARIA ARANGO MONTOYA', '0', '3007478309', 'AV 46 B N° 64-112 APT 301', '1', '39358902', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('75', 'MARIA LUZ DARY RODRIGUEZ', '2643064', '3128697559', 'CRA 94 B N°48 A 86', '1', '43018316', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('76', 'DIOMER STIVENS MORENO', '2270315', '', 'cll 97 N°37-58 INT 301', '1', '71314975', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('77', 'DELIO DE JESUS PEREZ HERNANDEZ', '0', '3136758153', 'CLL 79N° 95 AA 03', '1', '3385539', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('78', 'JULIO GARZON', '4621476', '3104488560', 'CLL 26 N° 58 BB-14', '1', '70048188', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('79', 'MARIA DE LOS ANGELES PEREZ', '2260276', '', 'CLL 52 B N° 13-44', '1', '32432254', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('80', 'MARIA NELSY ISAZA VELASQUEZ', '2671685', '3113392800', 'CLL 97 B N° 84 < 04', '1', '31652371', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('81', 'VICENTE ARANGO', '0', '', 'CRA 62 C N°51-13-27', '1', '3428736', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('82', 'JHON JAIRO MONTOYA', '0', '3207119520', 'CLL 104 DD N° 82 FF 25', '1', '70116728', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('83', 'FANNY PINO CHANCI', '5839703', '3017483549', 'CRA 80 N° 77 BB-62', '1', '22187463', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('84', 'AMALFI SIERRA', '5809049', '3015459276', 'CLL 79 A 86-02', '1', '43070430', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('85', 'BEATRIZ ELENA RIOS CAMACHO', '0', '3216073987', 'CLL 49 N°17 B 22 (260)', '1', '43549350', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('86', 'JORGE IVAN JARAMILLO', '2215381', '3183364501', 'CLL 49 C N° 9 A 07', '1', '8064902', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('87', 'JUAN EFREN GUTIERREZ', '2347615', '', 'CLL49BB#95-51 (301)', '1', '71671859', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('88', 'MARIA EUNICE BENITEZ CASTAÑEDA', '4927822', '', 'CRR 11A#34B-30', '1', '43503749', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('89', 'JOSE NICOLAS VELASQUEZ', '0', '3226909846', 'CLL48D #95-98', '1', '8409117', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('90', 'LUCILA ISABEL SAENZ MARMOL', '2319335', '3107961619', 'CLL 106 B N°74-86', '1', '52644529', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('91', 'JESUS ANTONIO HERNANDEZ', '2332420', '3127702242', 'CRA 72 A N° 25 A APT 301', '1', '18530009', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('92', 'JOSE IGNACIO LONDOÑO', '4820703', '', 'AV 40 N° 65-71', '1', '71213594', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('93', 'LEONIDAS BEDOYA', '0', '', 'CLL 50 N° 48-03', '1', '3523198', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('94', 'MARTHA LUZ ECHAVARRIA PARRA', '2117356', '', 'CLL 51 B N° 82 C 75', '1', '42974502', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('95', 'LEON ALBERTO LARA', '2698150', '3147057601', 'CRA 17 C N° 47-17', '1', '70588515', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('96', 'AMANDA MEJIA', '2332801', '', 'LETRA', '1', '32457579', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('97', 'MISAEL ANTONIO BOLIVAR', '2178828', '3166660502', 'CRA 39 C N°48-23', '1', '32412591', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('98', 'MARIA ELVIA DAVILA DE JURADO', '5712923', '3136065558', 'CRA 50 C N° 82-91', '1', '21371715', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('99', 'CARLOS AUGUSTO JURADO DAVILA', '3016018168', '2338168', 'CRA 50 C N° 82-91', '1', '71594317', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('100', 'LUZ STELLA ACOSTA', '2342684', '3103816735', 'VERDA BATEA SECA', '1', '32518162', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('101', 'TERESA ARANGO DE VERA', '2362082', '', 'CLL 77 N° 49-46', '1', '21352351', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('102', 'MARIBLE ORTEGA', '3425437', '3103888578', 'LETRA', '1', '43074624', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('103', 'LUZ IRENE ZAPATA ZAPATA', '0', '', '', '1', '43046060', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('104', 'DIANA CAROLINA PEREZ', '2671488', '3128831617', 'CALLE 103D#63E-40(0223)', '1', '43909467', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('105', 'GLORIA MARIA BETANCUR ECHAVARRIA', '5884467', '', 'CALLE 57D#29-53 2PISO', '1', '43073973', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('106', 'MARIA VIRGELINA ARIAS DE MARIN', '4529787', '', 'CRR 68#100-114 (301)', '1', '32459117', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('107', 'MARIA RUBIELA TEJADA GONZALEZ', '5276960', '3117397816', 'CALLE 86 #41A-05', '1', '43007642', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('108', 'NATALIA ANDREA GIL SANCHEZ', '4835043', '3137471308', 'AV 45B  65-06 INT 301', '1', '43166162', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('109', 'NOLASCO DE JESUS LOPERA OSORNO', '2161826', '', 'CALLE 57A #24BB-42(261)', '1', '71656801', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('110', 'OFELIA DEL SOCORRO SOTO CORTES', '2754295', '', 'CRR 58BB#27B-23 APT 101', '1', '32457088', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('111', 'POMPILIO GUTIERREZ AGUIRRE', '3148320979', '', 'CALLE 77D#85A-16', '1', '1219719', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('112', 'PETER ALONSO QUIÑONES NIÑO', '3103749876', '3105018443', 'CRR 9D#44-50', '1', '71670712', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('113', 'YIMI ANTONIO DIAZ VARGAS', '2574596', '3117985764', 'CALLE 89#93A-118 (302) ', '1', '78739443', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('114', 'AURORA RUIZ DE RUIZ', '2171490', '3126406282', 'CRR 31#46-27', '1', '21346523', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('115', 'EDGAR DE JESUS ZAPATA  ZAPATA', '2679715', '3137145613', 'CLL 95A #84-52', '1', '71706480', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('116', 'LUZ ELENA ACEVEDO', '3117737064', '', 'CRR 76A#84-53', '1', '42875715', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('117', 'LUIS CARLOS ARANGO PUERTA', '2696543', '', 'CLL 5 # 16-38', '1', '3625074', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('118', 'EDWIN RAUL MEJIA DUARTE', '6008416', '3113532196', 'AV 38#44-62 (101)', '1', '98662867', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('119', 'BERTALINA ECHAVARRIA DE TORRES', '2399197', '', 'CRR 43#67-19', '1', '32465304', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('120', 'LILIAM DEL CARMEN SALDARRIAGA', '2772926', '3127456519', 'CRA 44 N° 46-39', '1', '42772030', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('121', 'LUZ MIRIAM MARIN RAMIREZ', '6032700', '3117337410', 'CRA 33 N° 29-22', '1', '24627462', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('122', 'AIDE DEL SOCORRO JARAMILLO ', '5835129', '', 'CRA 70 N° 95-88', '1', '42983711', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('123', 'AURA MAGDALENA RENDON ', '2211989', '3146786214', 'CRA 23 N° 38-73', '1', '42894091', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('124', 'CARLOS MARIO PEREZ GARCES', '2211953', '3127806335', 'CRA 8 A N° 57 A 11 (101)', '1', '71702032', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('125', 'RODRIGO DE JESUS ORTIZ ALVAREZ', '2529295', '3122042658', 'CRA 130 N° 34 B 56', '1', '32399178', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('126', 'DARLY MILENA ZAPATA PATIÑO', '2881812', '3103905420', 'CRA 43 A N° 56 SR -32 (160)', '1', '21468585', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('127', 'CLARA ELENA BERRIO OSORIO', '5817738', '3146183478', 'CLL 82 N° 41 A 18 (301)', '1', '43549294', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('128', 'MARTHA INES SERNA OSORNO ', '4663969', '2060965', 'CRA 49 C N° 99-43', '1', '21544125', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('129', 'MARIA DEYANIRA VASQUEZ', '0', '3167895412', 'CLL 63 B N° 100-99', '1', '43469351', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('130', 'BEATRIZ ELENA HINCAPIE GOMEZ', '2171497', '', 'CRA 26 A N° 57-33', '1', '43043253', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('131', 'BEATRIZ ELENA NARVAEZ', '0', '3146813759', 'CLL 53 N° 41-51 (3017)', '1', '52137135', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('132', 'WALTER HERNANDO RIVERA', '5857718', '3148703469', 'CRA 86 B N° 49 DD 96', '1', '71645241', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('133', 'EZEQUIEL RUEDA SALAMANCA', '0', '3185893601', 'PAGARE', '1', '13255744', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('134', 'JESUS AMANDA BRICEÑO VASQUEZ', '5216678', '', 'EDIFICIO PEREZGUTIEREZ ', '1', '49473966', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('135', 'ROSA INES CASTRO DE GALVIS', '2181958', '3117757007', '', '1', '329837', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('136', 'DOLLY RUBIELA CASAFUZ', '0', '3017177150', 'CRA 25 N° 34-16', '1', '21409694', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('137', 'BLANCA LUZ OCAMPO CIRO', '5240585', '', 'CLL 94 N° 50-37', '1', '43970352', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('138', 'JORGE ISAAC GARAY RENTERIA', '5246060', '', 'CRA 21 N° 107-19', '1', '121473209', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('139', 'FRANCISCO JOSE TORRES', '4263735', '3216992359', 'CRA 96 N° 62 D-03', '1', '15524671', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('140', 'CARLOS MARIO PIEDRAHITA', '3207330178', '3137008903', 'CRA 35 N° 53-57', '1', '15500021', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('141', 'BLANCA LIBIA TABORDA Y/O CARLOS GALLEGO', '3684462', '3148845270', 'CLL 9 N° 4 A ESTE-75 (302)', '1', '42772604', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('142', 'ELKIN DE JESUS GONZALEZ', '0', '', 'LOTE 4 ', '1', '71584258', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('143', 'ROSA DEL CARMEN ROJAS SEPULVEDA', '4345237', '', 'CLL 48 DD N° 99 CC -52', '1', '32436985', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('144', 'OSCAR EMILIO VASQUEZ', '4633993', '', 'CRA 76 N° 110-19', '1', '3330788', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('145', 'LEONEL DE JESUS HERNANDEZ GONZALEZ', '2364043', '3006086976', 'PAGARE', '1', '71770631', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('146', 'ELCY CECILIA MORALES VANEGAS', '0', '3147793598', 'CRA 45 A N° 104 A 14', '1', '43043386', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('147', 'ROCIO DEL SOCORRO LAMPION', '4923081', '', 'CRA 102 N° 33 B 9 (201)', '1', '43010405', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('148', 'SANDRA CLEYDE TABARES MESA', '4182083', '3123332697', 'CRA 45 N° 32 B 46', '1', '43180464', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('149', 'SULAY JOHANA DAZA OCHOA', '4761728', '3113920921', 'CLL 107 A N° 82 A 55', '1', '43105996', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('150', 'MARIELA ORTEGA ALVAREZ', '5814907', '3122886669', 'CLL 54 E 02 N° E06', '1', '32533143', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('151', 'MIRIAM REYES MEJIA', '3623873', '3163496010', 'CRA 54 N° 10 B  SR 6', '1', '21323619', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('152', 'ALDEMAR USUGA BERRIO', '4774178', '', 'CLL 102 N° 63 C 36', '1', '8270189', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('153', 'JAIRO ALONSO LONDOÑO U.', '4967043', '3105976895', 'CLL 102 N° 48 E 30', '1', '71212928', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('154', 'AMANDA ROLDAN DE V.', '2376904', '3004245572', 'CRA 75 B N° 96-103', '1', '43004736', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('155', 'BEATRIZ ELENA CARMONA', '5216974', '3216044651', 'CLL 103 N° 45 A 44', '1', '42999498', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('156', 'JHON EDISON RODRIGUEZ', '2521836', '3045871835', 'CLL 40 N° 116-17', '1', '8027723', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('157', 'LUZ MILA ECHAVARRIA RESTREPO', '4810062', '', 'CLL 46 N° 83-67-65', '1', '32495970', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('158', 'MANUEL JOSE SOTO CORTES', '2585997', '', 'CRA 50A#94-68', '1', '78116027', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('159', 'CARLOS AUGUSTO ARANGO G', '0', '3128013552', 'CRA 93A#36-30 (1 PISO)', '1', '71583990', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('160', 'INGRY YOHANA MUÑOZ ALTAMIRANDA', '4193674', '', 'CLL 49 E N° 96 B 32', '1', '43203782', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('161', 'JHON JAIRO MONTOYA', '2935987', '3207119529', 'CLL 104 DD N° 82 FF 25', '1', '70116728', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('162', 'MARLENY DEL CARMEN GOMEZ', '0', '', 'CRA 17 F N° 48-41', '1', '42650750', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('163', 'MANUELA ARANGO VALLEJO', '2777514', '3015347413', 'CLL 67 N° 48-07', '1', '1037635118', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('164', 'OLGA DE JESUS MUÑOZ QUINTERO', '5855958', '5805632', 'CRA 41 N° 70-22', '1', '32471655', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('165', 'JULIANA VILLA GOMEZ', '2335169', '2851805', 'CLL 70 N° 39-30', '1', '1214723918', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('166', 'ADRIANA CASAFUZ RUIZ', '2147640', '3017789448', 'CRA 24 D N° 34-38', '1', '43078704', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('167', 'BLANCA EDELMIRA TRUJILLO', '5271004', '3205551195', 'CLL 32 B N° 81 B APT 202', '1', '25033915', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('168', 'GILMA DE JESUS LOPERA BUSTAMANTE', '2642432', '3117738489', 'CLL 76 D A N° 91 B 58', '1', '32395078', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('169', 'MARIA LICINIA LOPERA CATAÑO', '3106554245', '3134345398', 'CLL 70 N° 57-34', '1', '32315205', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('170', 'ORLANDO DE JESUS FERNANDEZ BETANCUR', '2675979', '3002494707', 'CLL 104 N° 68 A 38 APT 201', '1', '8347343', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('171', 'ELKIN DARIO RODRIGUEZ GOMEZ', '2366142', '3004778447', 'CRR 46A # 96-46', '1', '70060904', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('172', 'LUZ ELENA RAVE ROJAS', '3434493', '', 'CRA 73 N° 92-41', '1', '32498399', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('173', 'MARTHA RUTH SANCHEZ', '4828200', '', 'AV 45 B N° 63-06 APT 401', '1', '22690418', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('174', 'MARIA JOSE ALZATE CARMONA', '5832830', '3187953591', 'CRA 77 C N° 44-15', '1', '42758285', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('175', 'MARGARITA MARIA VELASQUEZ DE CASTRILLON', '2536241', '3113042244', 'CLL 46 N° 43-135 APT 704', '1', '32406755', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('176', 'REINALDO DE JESUS OSPINA RESTREPO', '5885329', '3136701930', 'CLL 102 C N° 82 FF 23', '1', '3467648', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('177', 'MARIA LEONOR VILLEGAS', '2336185', '3042082019', 'CRA 35 N° 86 B 121', '1', '32305220', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('178', 'ARY GUEVARA CARDONA', '3418566', '', 'CLL 26 N° 73-61', '1', '79777655', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('179', 'FUNDACION JARDIN DE AMOR', '0', '3043734792', 'CLL 53 N° 40-77', '1', '42987624', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('180', 'LILIANA MARIA ALVAREZ RAMIREZ', '2119772', '3016655841', 'CRA 36 B N° 81-46', '1', '43633480', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('181', 'WILLIAN ARANGO BEDOYA', '2226521', '3012847510', 'CLL 52 N° 03-27', '1', '70630746', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('182', 'ALIRIO DE JESUS VALENCIA GONZALEZ', '5841924', '3145822143', 'CRA 80 N° 161 A 10 INT 301', '1', '98493584', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('183', 'GUSTAVO DE JESUS GARCIA DOMINGUEZ', '3146071951', '5978847', 'AV 49 B N° 57-16', '1', '15369169', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('184', 'JAVIER DE JESUS METAUTE', '4161154', '', 'CRA 41 A N° 83-59', '1', '8242303', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('185', 'MARIA LIBIA MARIN ZAPATA', '2579790', '', 'CRA 76 N° 9134 INT 301', '1', '32488149', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('186', 'MIGUEL ANGEL GALLEGO ', '2366024', '', 'CLL 98 N° 51 96', '1', '8246866', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('187', 'OSCAR EMILIO SEGURA RESTREPO', '0', '3207073419', 'CLL 26 N° 58-75', '1', '8308660', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('188', 'AIDE OCHOA BALLESTEROS', '0', '', 'CRA 78 A N° 3-14', '1', '42874498', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('189', 'MARIA NILSA GUTIERREZ', '2370992', '3128781299', 'CRA 75 A N° 94-95', '1', '32079067', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('190', 'ARGEMIRO DE JESUS HERRERA', '5724887', '3108519667', 'CRA 37 A N° 105-18 APT 101', '1', '70163396', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('191', 'EDILIA HIGUITA DE GOMEZ', '2369264', '3127478635', 'CRA 39 N° 96-31', '1', '32438598', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('192', 'JOSE ELIECER OSPINA ARIAS', '4649268', '3106371891', 'CRA 76 N° 20 E 36', '1', '70662722', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('193', 'LUZ MARINA CASTAÑEDA RESTREPO', '2862640', '3147114169', 'CRA 78 A N° 2 A 33', '1', '32449338', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('194', 'PEDRO PABLO GARCIA ', '5830701', '', 'CRA 67 N° 93-21 INT 301', '1', '70065208', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);
INSERT INTO `t_deudores` VALUES ('195', 'RAFAEL HERNANDEZ OROZCO', '2310070', '', 'PARAJE QUEBRADA ARRIBA', '1', '70128088', '', '', '0', '1', null, null, null, null, '2015-12-10 15:57:23', null);

-- ----------------------------
-- Table structure for t_empresa
-- ----------------------------
DROP TABLE IF EXISTS `t_empresa`;
CREATE TABLE `t_empresa` (
  `TELEFONO` bigint(15) DEFAULT NULL,
  `DIRECCION` varchar(60) DEFAULT NULL,
  `NIT` varchar(20) DEFAULT NULL,
  `CORREO` varchar(60) DEFAULT NULL,
  `GERENTE` varchar(60) DEFAULT NULL,
  `NOMBRE_PROTOCOLISTA` varchar(80) DEFAULT NULL,
  `TELEFONO_PROTOCOLISTA` varchar(10) DEFAULT NULL,
  `FECHA_ACTUALIZA` datetime(1) DEFAULT NULL,
  `USUARIO_ACTUALIZA` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_empresa
-- ----------------------------
INSERT INTO `t_empresa` VALUES ('5122899', 'Cll 50 Nro 48-3 Of 806', '890934372-2', 'inverbienes2010@hotmail.com', 'Rafael Hernandez', 'JOSE EDUARDO', '2518063', '2016-01-20 13:24:56.0', null);

-- ----------------------------
-- Table structure for t_inmuebles
-- ----------------------------
DROP TABLE IF EXISTS `t_inmuebles`;
CREATE TABLE `t_inmuebles` (
  `ID_INMUEBLE` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_PROPIETARIO` bigint(20) NOT NULL COMMENT 'Es el dueño del inmueble',
  `TIPO_INMUEBLE` tinyint(2) NOT NULL,
  `MATRICULA` varchar(30) NOT NULL,
  `NUMERO_NOTARIA` varchar(20) NOT NULL,
  `NUMERO_ESCRITURA` varchar(20) NOT NULL,
  `DIRECCION` varchar(60) DEFAULT NULL,
  `CERCA` varchar(90) DEFAULT NULL COMMENT 'Lugares cercanos al inmueble',
  `ID_CIUDAD` tinyint(4) NOT NULL,
  `FECHA_CONSTITUCION` date DEFAULT NULL,
  `FECHA_ENTREGA_ESCRITURA` date DEFAULT NULL,
  `UTILIZADO` binary(1) DEFAULT '0' COMMENT 'Identifica sí el inmueble esta siendo utilizado por una solicitud',
  `ESTADO` binary(1) DEFAULT '1',
  `FECHA_REGISTRA` datetime(1) DEFAULT NULL,
  `USUARIO_REGISTRA` bigint(20) DEFAULT NULL,
  `FECHA_MODIFICA` date DEFAULT NULL,
  `USUARIO_MODIFICA` bigint(20) DEFAULT NULL,
  `FECHA_ELIMINA` datetime(1) DEFAULT NULL,
  `USUARIO_ELIMINA` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_INMUEBLE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_inmuebles
-- ----------------------------

-- ----------------------------
-- Table structure for t_intereses
-- ----------------------------
DROP TABLE IF EXISTS `t_intereses`;
CREATE TABLE `t_intereses` (
  `ID_INTERES` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_SOLICITUD` bigint(20) DEFAULT NULL,
  `VALOR` varchar(10) DEFAULT NULL,
  `CONCEPTO` varchar(60) DEFAULT NULL,
  `MES` int(2) DEFAULT NULL,
  `PERIODO` varchar(10) DEFAULT NULL,
  `CONSECUTIVO` bigint(20) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  PRIMARY KEY (`ID_INTERES`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_intereses
-- ----------------------------

-- ----------------------------
-- Table structure for t_modulos
-- ----------------------------
DROP TABLE IF EXISTS `t_modulos`;
CREATE TABLE `t_modulos` (
  `ID_MODULO` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(255) DEFAULT NULL,
  `PADRE` smallint(3) DEFAULT NULL,
  `ORDEN` smallint(3) DEFAULT NULL,
  PRIMARY KEY (`ID_MODULO`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_modulos
-- ----------------------------
INSERT INTO `t_modulos` VALUES ('1', 'Clientes', null, null);
INSERT INTO `t_modulos` VALUES ('2', 'administrar_deudores', '1', '1');
INSERT INTO `t_modulos` VALUES ('3', 'administrar_acreedores', '1', '2');
INSERT INTO `t_modulos` VALUES ('4', 'Financiero', null, null);
INSERT INTO `t_modulos` VALUES ('5', 'administrar_recibos', '4', '1');
INSERT INTO `t_modulos` VALUES ('6', 'realizar_informes', '4', '2');
INSERT INTO `t_modulos` VALUES ('7', 'Hipotecas', null, null);
INSERT INTO `t_modulos` VALUES ('8', 'administrar_solicitudes', '7', '1');
INSERT INTO `t_modulos` VALUES ('9', 'administrar_inmuebles', '7', '2');
INSERT INTO `t_modulos` VALUES ('10', 'Par?metros', null, null);
INSERT INTO `t_modulos` VALUES ('11', 'exportar_clientes', '10', '1');
INSERT INTO `t_modulos` VALUES ('12', 'importar_clientes', '10', '2');
INSERT INTO `t_modulos` VALUES ('13', 'empresa', '10', '3');
INSERT INTO `t_modulos` VALUES ('14', 'consecutivos', '10', '5');
INSERT INTO `t_modulos` VALUES ('15', 'Sesi?n cr?dito', null, null);
INSERT INTO `t_modulos` VALUES ('16', 'acreedores', '15', '1');
INSERT INTO `t_modulos` VALUES ('17', 'deudores', '15', '2');

-- ----------------------------
-- Table structure for t_movimientos
-- ----------------------------
DROP TABLE IF EXISTS `t_movimientos`;
CREATE TABLE `t_movimientos` (
  `ID_MOVIMIENTO` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_SOLICITUD` bigint(20) DEFAULT NULL,
  `ID_USUARIO` bigint(5) DEFAULT NULL,
  `CONSECUTIVO` bigint(20) DEFAULT NULL,
  `SECUENCIA` tinyint(5) DEFAULT NULL,
  `CONCEPTO` varchar(100) DEFAULT NULL,
  `CHEQUE` varchar(20) DEFAULT NULL,
  `BANCO` varchar(20) DEFAULT NULL,
  `VALOR` double(10,0) DEFAULT NULL,
  `TIPO_MOV` tinyint(4) DEFAULT NULL,
  `INFO_AP` date DEFAULT NULL,
  `DESCRIPCION` varchar(30) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `ANULADO` binary(1) DEFAULT '0',
  `FECHA_ANULA` date DEFAULT NULL,
  `USUARIO_ANULA` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_MOVIMIENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_movimientos
-- ----------------------------

-- ----------------------------
-- Table structure for t_notificaciones
-- ----------------------------
DROP TABLE IF EXISTS `t_notificaciones`;
CREATE TABLE `t_notificaciones` (
  `ID_NOTIFICACION` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` bigint(20) DEFAULT NULL,
  `ACCION` bigint(20) DEFAULT NULL,
  `TIPO` varchar(3) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL,
  `VISTO` binary(1) DEFAULT '0',
  `FECHA_DISPONIBLE` date DEFAULT NULL,
  `USUARIO_ACCION` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_NOTIFICACION`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_notificaciones
-- ----------------------------
INSERT INTO `t_notificaciones` VALUES ('1', '1', '233333', 'ai', '2016-01-20 12:25:56', 0x30, null, '3');
INSERT INTO `t_notificaciones` VALUES ('2', '2', '233333', 'ai', '2016-01-20 12:25:56', 0x30, null, '3');
INSERT INTO `t_notificaciones` VALUES ('3', '1', '1', 'ri', '2016-01-20 12:41:43', 0x30, null, '3');
INSERT INTO `t_notificaciones` VALUES ('4', '2', '1', 'ri', '2016-01-20 12:41:43', 0x30, null, '3');
INSERT INTO `t_notificaciones` VALUES ('5', '1', '34000', 'ri', '2016-01-20 13:39:09', 0x30, null, '3');
INSERT INTO `t_notificaciones` VALUES ('6', '2', '34000', 'ri', '2016-01-20 13:39:09', 0x30, null, '3');
INSERT INTO `t_notificaciones` VALUES ('7', '1', '34001', 'ri', '2016-01-20 13:41:38', 0x30, null, '3');
INSERT INTO `t_notificaciones` VALUES ('8', '2', '34001', 'ri', '2016-01-20 13:41:38', 0x30, null, '3');
INSERT INTO `t_notificaciones` VALUES ('9', '1', '34002', 'ri', '2016-01-20 13:45:13', 0x30, null, '3');
INSERT INTO `t_notificaciones` VALUES ('10', '2', '34002', 'ri', '2016-01-20 13:45:13', 0x30, null, '3');
INSERT INTO `t_notificaciones` VALUES ('11', '1', '34003', 'ri', '2016-01-20 13:47:11', 0x30, null, '3');
INSERT INTO `t_notificaciones` VALUES ('12', '2', '34003', 'ri', '2016-01-20 13:47:11', 0x30, null, '3');
INSERT INTO `t_notificaciones` VALUES ('13', '2', '34004', 'ri', '2016-02-01 17:50:05', 0x30, null, '1');
INSERT INTO `t_notificaciones` VALUES ('14', '2', '34005', 'ri', '2016-02-01 18:08:59', 0x30, null, '1');
INSERT INTO `t_notificaciones` VALUES ('15', '2', '34006', 'ri', '2016-02-01 18:09:33', 0x30, null, '1');
INSERT INTO `t_notificaciones` VALUES ('16', '2', '34007', 'ri', '2016-02-01 18:11:21', 0x30, null, '1');
INSERT INTO `t_notificaciones` VALUES ('17', '2', '34008', 'ri', '2016-02-01 18:12:10', 0x30, null, '1');

-- ----------------------------
-- Table structure for t_observaciones
-- ----------------------------
DROP TABLE IF EXISTS `t_observaciones`;
CREATE TABLE `t_observaciones` (
  `ID_OBSERVACION` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` bigint(20) DEFAULT NULL,
  `ASUNTO` varchar(255) DEFAULT NULL,
  `OBSERVACION` varchar(2000) DEFAULT NULL,
  `ESTADO` binary(1) DEFAULT '0',
  `PRIORIDAD` tinyint(2) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL,
  `VISTO` binary(1) DEFAULT '0',
  PRIMARY KEY (`ID_OBSERVACION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_observaciones
-- ----------------------------

-- ----------------------------
-- Table structure for t_pagares
-- ----------------------------
DROP TABLE IF EXISTS `t_pagares`;
CREATE TABLE `t_pagares` (
  `ID_SOLICITUD` bigint(20) DEFAULT NULL,
  `VALOR` double(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_pagares
-- ----------------------------

-- ----------------------------
-- Table structure for t_pago_temp
-- ----------------------------
DROP TABLE IF EXISTS `t_pago_temp`;
CREATE TABLE `t_pago_temp` (
  `ID_PAGO_TEMP` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` bigint(20) DEFAULT NULL,
  `ID_SOLICITUD` bigint(20) DEFAULT NULL,
  `VALOR` double(10,0) DEFAULT NULL,
  `TIPO` tinyint(4) DEFAULT NULL,
  `CONCEPTO` varchar(100) DEFAULT NULL,
  `CHEQUE` varchar(20) DEFAULT NULL,
  `BANCO` varchar(60) DEFAULT NULL,
  `METADATO` varchar(10) DEFAULT NULL,
  `METADATO2` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_PAGO_TEMP`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_pago_temp
-- ----------------------------

-- ----------------------------
-- Table structure for t_permisos
-- ----------------------------
DROP TABLE IF EXISTS `t_permisos`;
CREATE TABLE `t_permisos` (
  `ID_MODULO` bigint(20) DEFAULT NULL,
  `ID_USUARIO` bigint(20) DEFAULT NULL,
  `AUTORIZADO` binary(1) DEFAULT NULL,
  `USUARIO_REGISTRA` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_permisos
-- ----------------------------
INSERT INTO `t_permisos` VALUES ('2', '1', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('3', '1', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('5', '1', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('6', '1', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('8', '1', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('9', '1', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('11', '1', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('12', '1', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('13', '1', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('14', '1', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('16', '1', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('17', '1', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('2', '2', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('3', '2', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('5', '2', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('6', '2', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('8', '2', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('9', '2', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('11', '2', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('12', '2', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('13', '2', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('14', '2', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('16', '2', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('17', '2', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('2', '3', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('3', '3', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('5', '3', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('6', '3', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('8', '3', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('9', '3', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('11', '3', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('12', '3', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('13', '3', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('14', '3', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('16', '3', 0x31, '1');
INSERT INTO `t_permisos` VALUES ('17', '3', 0x31, '1');

-- ----------------------------
-- Table structure for t_referencias
-- ----------------------------
DROP TABLE IF EXISTS `t_referencias`;
CREATE TABLE `t_referencias` (
  `ID_DEUDOR` bigint(20) DEFAULT NULL,
  `NOMBRE_REFERENCIA` varchar(50) DEFAULT NULL,
  `TELEFONO_REFERENCIA` bigint(14) DEFAULT NULL,
  `DIRECCION_REFERENCIA` varchar(50) DEFAULT NULL,
  `TIPO_REFERENCIA` binary(1) DEFAULT NULL,
  `FECHA_REGISTRO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_referencias
-- ----------------------------

-- ----------------------------
-- Table structure for t_solicitudes
-- ----------------------------
DROP TABLE IF EXISTS `t_solicitudes`;
CREATE TABLE `t_solicitudes` (
  `ID_SOLICITUD` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_DEUDOR` bigint(20) DEFAULT NULL,
  `ID_ACREEDOR` bigint(20) DEFAULT NULL,
  `ID_INMUEBLE` bigint(20) DEFAULT NULL,
  `SOLICITUD` bigint(20) DEFAULT NULL COMMENT 'Consecutivo de la solicitud',
  `FECHA_INICIO` date DEFAULT NULL,
  `FECHA_FIN` date DEFAULT NULL,
  `TIPO_HIPOTECA` binary(1) DEFAULT '0',
  `CAPITAL_INICIAL` double(10,0) DEFAULT NULL,
  `ABONADO` double(10,0) DEFAULT '0',
  `ABONO_INTERES` double(10,0) DEFAULT '0',
  `COMISION_OFICINA` varchar(4) DEFAULT NULL,
  `CUOTA_ADMINISTRACION` varchar(4) DEFAULT NULL,
  `AJUSTE` varchar(4) DEFAULT NULL,
  `HIPOTECADO` tinyint(3) DEFAULT NULL,
  `INTERES_MENSUAL` varchar(4) DEFAULT NULL,
  `FECHA_REGISTRA` datetime(1) DEFAULT NULL,
  `USUARIO_REGISTRA` bigint(20) DEFAULT NULL,
  `FECHA_ELIMINA` datetime DEFAULT NULL,
  `USUARIO_ELIMINA` bigint(20) DEFAULT NULL,
  `ESTADO` binary(1) DEFAULT '1',
  `VENCE_ANO` binary(1) DEFAULT '0' COMMENT 'Notificación de cuando vence al año',
  `ESTADO_HIPOTECA` int(2) DEFAULT '1',
  PRIMARY KEY (`ID_SOLICITUD`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_solicitudes
-- ----------------------------

-- ----------------------------
-- Table structure for t_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `t_usuarios`;
CREATE TABLE `t_usuarios` (
  `ID_USUARIO` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `CORREO` varchar(60) DEFAULT NULL,
  `CLAVE` varchar(40) DEFAULT NULL,
  `AVATAR` tinyint(2) DEFAULT '1',
  `NIVEL` tinyint(2) DEFAULT '0',
  `ESTADO` binary(1) DEFAULT '1',
  `FECHA_REGISTRO` datetime DEFAULT NULL,
  `USUARIO_REGISTRA` bigint(20) DEFAULT NULL,
  `FACHA_ULTIMO_INICIO_SESION` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_usuarios
-- ----------------------------
INSERT INTO `t_usuarios` VALUES ('1', 'Alexis Muñoz', 'Alexis', 'a', '1', '2', 0x31, '2015-08-19 21:53:04', '1', '2016-02-01 18:08:13');
INSERT INTO `t_usuarios` VALUES ('2', 'Alejandra Caro Moscoso', 'alejandra.1284@hotmail.com', '12345678', '3', '2', 0x31, '2015-12-10 15:26:14', '1', '2016-02-01 17:28:56');
