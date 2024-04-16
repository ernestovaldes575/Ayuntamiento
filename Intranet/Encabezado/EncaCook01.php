<?php
	//Carga las variables
	$ArCooki1 = $_COOKIE['CEncaAcc'];
	$AEncaAcc = explode("|", $ArCooki1);

	$ConsUsua = $AEncaAcc[0]; 
	$ClavAyun = $AEncaAcc[1];
	$DescAyun = $AEncaAcc[2];
	$ConsUnid = $AEncaAcc[3];
	$DescUnid = $AEncaAcc[4];
	$EjerTrab = $AEncaAcc[5];


	$ArCooki2 = $_COOKIE['CModulo'];
	$AModulo = explode("|", $ArCooki2);
	$Cons = $AModulo[4];
	$Alta = $AModulo[5];
	$Modi = $AModulo[6];
	$Baja = $AModulo[7];

?>