CREATE TABLE `aplazamiento_estudiante` (
  `IdAplazamiento` int(11) NOT NULL AUTO_INCREMENT,
  `IdEstudiante` int(11) DEFAULT NULL,
  `AnioAplazamiento` int(11) DEFAULT NULL,
  `Semestre` int(11) DEFAULT NULL,
  `FechaCreacion` datetime DEFAULT NULL,
  `Descripcion` varchar(1024) NOT NULL,
  `Activo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`IdAplazamiento`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
