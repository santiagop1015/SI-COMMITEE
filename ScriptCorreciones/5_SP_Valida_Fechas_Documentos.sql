DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Valida_Fechas_Documentos`(
	vIdEstudiante int(11) ,
	vIdEstadoDocumento varchar(255))
BEGIN

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
