DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Estudiante_Registra_Aplazamiento_Semestre`(
	vIdEstudiante int(11) ,
	vAnioAplazamiento int(11),
    vSemestre int(11),
    vDescripcion VARCHAR(1024)
    )
BEGIN

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
DELIMITER ;
