DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Constulta_Anios_Aplazamiento`()
BEGIN
	
	SELECT YEAR(NOW()) -1 AS Anio
	UNION
	SELECT YEAR(NOW()) AS Anio
	UNION
	SELECT YEAR(NOW()) +1  AS Anio;

END$$
DELIMITER ;
