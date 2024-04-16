<?php
	$contraseña = ''; //NXBWSHJ4E46L
	$user = 'root';//difzinac_intranet
	$dbname = 'acceso';//difzinac_acceso


	try{
		$con = new PDO("mysql:host=localhost;dbname=$dbname", "$user", $contraseña);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con->exec("SET CHARACTER SET utf8");
	}catch(PDOException $error){
		die("Conexion Fallida: ".$error->getMessage());
	}

	
?>