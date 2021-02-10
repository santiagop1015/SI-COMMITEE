
--
-- Base de datos: `committee`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Constulta_Anios_Aplazamiento` ()  BEGIN
	
	SELECT YEAR(NOW()) -1 AS Anio
	UNION
	SELECT YEAR(NOW()) AS Anio
	UNION
	SELECT YEAR(NOW()) +1  AS Anio;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Estudiante_Registra_Aplazamiento_Semestre` (`vIdEstudiante` INT(11), `vAnioAplazamiento` INT(11), `vSemestre` INT(11), `vDescripcion` VARCHAR(1024))  BEGIN

	-- Valida que no exista registro del estudiante con el mismo semestre
    IF EXISTS (SELECT * FROM committee.aplazamiento_estudiante
				WHERE IdEstudiante = vIdEstudiante AND
					  AnioAplazamiento = vAnioAplazamiento	AND
					  Semestre = vSemestre	AND
                      Activo = TRUE
				)
	THEN 
			-- Retorna Mensaje
			BEGIN
				SELECT 'ERROR: El estudiante ya cuenta con un aplazamiento para el año y semestre indicado' AS Mensaje;
			END;
            
            -- Registra Aplazamiento
			ELSE
			BEGIN
				INSERT INTO `committee`.`aplazamiento_estudiante`
					(`IdEstudiante`,`AnioAplazamiento`,`Semestre`,`Descripcion`,`FechaCreacion`,`Activo`)
				VALUES
					(vIdEstudiante, vAnioAplazamiento, vSemestre, vDescripcion, NOW(), true);
                    
				SELECT 'EXITOSO: Proceso realizado exitosamente' AS Mensaje;

			END;
            END IF;
	

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Valida_Fechas_Documentos` (`vIdEstudiante` INT(11), `vIdEstadoDocumento` VARCHAR(255))  BEGIN

	-- Consulta Parametros del documento a cargar
    DECLARE vGrupo  CHAR(255);  
    DECLARE vNroDiasMaximo INT;
	DECLARE vNroDiasMinimo INT;
    DECLARE vOrden INT;
	DECLARE vFechaDocumentoAnterior DATE;


	SELECT Grupo INTO vGrupo FROM  tipo_documento WHERE NombreTipoDocumento = vIdEstadoDocumento;
    SELECT NroDiasMaximo INTO vNroDiasMaximo FROM  tipo_documento WHERE NombreTipoDocumento = vIdEstadoDocumento;
    SELECT NroDiasMinimo INTO vNroDiasMinimo FROM  tipo_documento WHERE NombreTipoDocumento = vIdEstadoDocumento;
    SELECT Orden INTO vOrden FROM  tipo_documento WHERE NombreTipoDocumento = vIdEstadoDocumento;
    
    
    -- Condicion para verificar si el estudiante ya tiene cargados mas documentos del mismo grupo en el sistema
    IF( (SELECT COUNT(*) FROM TESIS  ts
			INNER JOIN  tipo_documento td ON ts.id_estado = td.NombreTipoDocumento
		WHERE ID_estudiante = vIdEstudiante AND td.Grupo = vGrupo AND td.Orden < vOrden) > 0 AND (vNroDiasMaximo <> 0 OR vNroDiasMinimo <> 0))
        
        -- Si tiene mas documentos comienza a realizar validación
		THEN
			BEGIN
            
				-- Consulta la fecha del ultimo documento cargado
				SELECT 
					proyecto -- Validar que este campo sea el de la fecha que se carga el doc
                INTO vFechaDocumentoAnterior FROM TESIS  ts
						INNER JOIN  tipo_documento td ON ts.id_estado = td.NombreTipoDocumento
					WHERE ID_estudiante = vIdEstudiante AND td.Grupo = vGrupo  AND td.Orden < vOrden ORDER BY proyecto DESC  LIMIT 1;

                
                -- Valida diferencia dias minimos para subir archivo
                IF((SELECT DATEDIFF(NOW(), vFechaDocumentoAnterior)) < vNroDiasMinimo)
					
					THEN
							SELECT CONCAT('ERROR: El tiempo mínimo para subir ', vIdEstadoDocumento, ' es de ',vNroDiasMinimo, 
                            ' días respecto al anterior, que fue subido el ', vFechaDocumentoAnterior, ', hace ', DATEDIFF(NOW(), vFechaDocumentoAnterior),
                            ' días') AS Mensaje;
                        
				ELSE IF ((SELECT DATEDIFF(NOW(), vFechaDocumentoAnterior)) > vNroDiasMaximo)
						THEN
							SELECT CONCAT('ERROR: El tiempo máximo para subir ', vIdEstadoDocumento, ' es de ',vNroDiasMaximo, 
                            ' días respecto al anterior, que fue subido el ', vFechaDocumentoAnterior, ', hace ', DATEDIFF(NOW(), vFechaDocumentoAnterior),
                            ' días') AS Mensaje;
				ELSE
					SELECT 'EXITOSO: Validación de fechas correcta, puede continuar con el proceso' AS Mensaje;

                   
                   END IF;
				END IF;
               -- SELECT vFechaDocumentoAnterior;
                
                
                
                
			END;
            
            
		-- Si no tiene mas documentos retorna exitoso
        ELSE
			BEGIN
				SELECT 'EXITOSO: Validación de fechas correcta, puede continuar con el proceso' AS Mensaje;
			END;
        END IF;
    
    -- select vGrupo, vNroDiasMaximo, vNroDiasMinimo, VNroDiasMinimo;
    
    
END$$

DELIMITER ;

--
-- Estructura de tabla para la tabla `aplazamiento_estudiante`
--

CREATE TABLE `aplazamiento_estudiante` (
  `IdAplazamiento` int(11) NOT NULL,
  `IdEstudiante` int(11) DEFAULT NULL,
  `AnioAplazamiento` int(11) DEFAULT NULL,
  `Semestre` int(11) DEFAULT NULL,
  `FechaCreacion` datetime DEFAULT NULL,
  `Descripcion` varchar(1024) NOT NULL,
  `Activo` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cambios tabla `login`
--

ALTER TABLE login ADD foto2 longblob NOT NULL;

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id` int(40) NOT NULL,
  `programa` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `programa`) VALUES
(1, 'Sistemas'),
(2, 'Industrial'),
(3, 'Mecanica'),
(4, 'Ambiental');

-- --------------------------------------------------------

--
-- Cambios para la tabla `tesis`
--

ALTER TABLE tesis ADD fecha_doc date NOT NULL;

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `IdTipoDocumento` int(11) NOT NULL,
  `NombreTipoDocumento` char(255) NOT NULL,
  `Grupo` char(255) NOT NULL,
  `Orden` varchar(45) NOT NULL,
  `NroDiasMinimo` int(11) NOT NULL,
  `NroDiasMaximo` int(11) NOT NULL,
  `FechaCreacion` datetime NOT NULL,
  `FechaModificacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`IdTipoDocumento`, `NombreTipoDocumento`, `Grupo`, `Orden`, `NroDiasMinimo`, `NroDiasMaximo`, `FechaCreacion`, `FechaModificacion`) VALUES
(0, 'Entrega Propuesta', 'ProyectoGrado', '0', 0, 0, '2021-02-08 21:16:29', '2021-02-08 21:16:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(40) NOT NULL,
  `TipoUsuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `TipoUsuario`) VALUES
(1, 'Administrador'),
(2, 'Coordinador'),
(3, 'Director'),
(4, 'Estudiante'),
(5, 'Dinvestigar'),
(6, 'Secretaria'),
(7, 'Jurado'),
(8, 'Decanatura'),
(9, 'Postgrados'),
(10, 'Cifi');


--
-- Indices de la tabla `aplazamiento_estudiante`
--
ALTER TABLE `aplazamiento_estudiante`
  ADD PRIMARY KEY (`IdAplazamiento`);

--
-- Indices de la tabla `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`IdTipoDocumento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);
