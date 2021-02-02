

-- Se crea al presente tabla para adminsitrar los tipos de documento,
-- esta administra los numeros de dias para el cargue de los documentos, validando
-- el grupo al que pertenecen ejemp (ProyectoGrado), y el orden en que se deberian cargar estos

CREATE TABLE `committee`.`tipo_documento` (
  `IdTipoDocumento` INT NOT NULL,
  `NombreTipoDocumento` CHAR(255) NOT NULL,
  `Grupo` CHAR(255) NOT NULL,
  `Orden` VARCHAR(45) NOT NULL,
  `NroDiasMinimo` INT NOT NULL,
  `NroDiasMaximo` INT NOT NULL,
  `FechaCreacion` DATETIME NOT NULL,
  `FechaModificacion` DATETIME NOT NULL,
  PRIMARY KEY (`IdTipoDocumento`));
  
  
 -- Se crea el ejemplo de la parametrizacion con el grupo de documentos ProyectoGrado
INSERT INTO `committee`.`tipo_documento`(`NombreTipoDocumento`,`Grupo`,`Orden`,`NroDiasMinimo`,`NroDiasMaximo`,`FechaCreacion`,`FechaModificacion`)
VALUES('Entrega Propuesta','ProyectoGrado',0,0,0,NOW(),NOW());
INSERT INTO `committee`.`tipo_documento`(`NombreTipoDocumento`,`Grupo`,`Orden`,`NroDiasMinimo`,`NroDiasMaximo`,`FechaCreacion`,`FechaModificacion`)
VALUES('Correccion Propuesta','ProyectoGrado',1,15,60,NOW(),NOW());
INSERT INTO `committee`.`tipo_documento`(`NombreTipoDocumento`,`Grupo`,`Orden`,`NroDiasMinimo`,`NroDiasMaximo`,`FechaCreacion`,`FechaModificacion`)
VALUES('Cancelar Propuesta','ProyectoGrado',2,15,60,NOW(),NOW());
INSERT INTO `committee`.`tipo_documento`(`NombreTipoDocumento`,`Grupo`,`Orden`,`NroDiasMinimo`,`NroDiasMaximo`,`FechaCreacion`,`FechaModificacion`)
VALUES('Entrega Anteproyecto','ProyectoGrado',3,15,60,NOW(),NOW());
INSERT INTO `committee`.`tipo_documento`(`NombreTipoDocumento`,`Grupo`,`Orden`,`NroDiasMinimo`,`NroDiasMaximo`,`FechaCreacion`,`FechaModificacion`)
VALUES('Corrección Anteproyecto','ProyectoGrado',4,15,60,NOW(),NOW());
INSERT INTO `committee`.`tipo_documento`(`NombreTipoDocumento`,`Grupo`,`Orden`,`NroDiasMinimo`,`NroDiasMaximo`,`FechaCreacion`,`FechaModificacion`)
VALUES('Cancelar Anteproyecto','ProyectoGrado',5,15,60,NOW(),NOW());
INSERT INTO `committee`.`tipo_documento`(`NombreTipoDocumento`,`Grupo`,`Orden`,`NroDiasMinimo`,`NroDiasMaximo`,`FechaCreacion`,`FechaModificacion`)
VALUES('Entrega Proyecto','ProyectoGrado',6,15,60,NOW(),NOW());
INSERT INTO `committee`.`tipo_documento`(`NombreTipoDocumento`,`Grupo`,`Orden`,`NroDiasMinimo`,`NroDiasMaximo`,`FechaCreacion`,`FechaModificacion`)
VALUES('Corrección Proyecto','ProyectoGrado',7,15,60,NOW(),NOW());
INSERT INTO `committee`.`tipo_documento`(`NombreTipoDocumento`,`Grupo`,`Orden`,`NroDiasMinimo`,`NroDiasMaximo`,`FechaCreacion`,`FechaModificacion`)
VALUES('Renuncia al proyecto','ProyectoGrado',8,15,60,NOW(),NOW());
  
  
  
  