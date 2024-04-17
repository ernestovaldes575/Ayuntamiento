<?php
$conexion = mysql_connect("www.zinacantepec.gob.mx", "zinacant_proveed", "Pr0v3d0r35") or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db("zinacant_proveedores", $conexion);
?>