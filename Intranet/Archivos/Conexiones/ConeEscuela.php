<?php
	$contraseña = "";
 
	try{
		$con = new PDO("mysql:host=localhost;dbname=escuela", "root", $contraseña);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con->exec("SET CHARACTER SET utf8");
	}catch(PDOException $error){
		die("Conexion Fallida: ".$error->getMessage());
	}
?>