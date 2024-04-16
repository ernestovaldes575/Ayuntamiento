<?php
	$contraseña = "";
	
	try{
		$ConeBase = new PDO("mysql:host=localhost;dbname=paginaweb", "root", $contraseña);
		$ConeBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$ConeBase->exec("SET CHARACTER SET utf8");
	}catch(PDOException $error){
		die("Conexion Fallida: ".$error->getMessage());
	}
