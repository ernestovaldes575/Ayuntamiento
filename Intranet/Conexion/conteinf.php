<?php
	$contraseña = "";
	try{
		$cone = new PDO("mysql:host=localhost;dbname=tecninfo", "root", $contraseña);
		$cone->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$cone->exec("SET CHARACTER SET utf8");
	}catch(PDOException $error){
		die("Conexion Fallida: ".$error->getMessage());
	}
?>