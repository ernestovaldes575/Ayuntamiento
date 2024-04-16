<?php
	//fecha en español
	$hoy = getdate();
	//convertir dia de la semana en español
	if($hoy['wday'] == 1){
		$dia = 'Lunes';
	}elseif($hoy['wday'] == 2){
		$dia = 'Martes';
	}elseif($hoy['wday'] == 3){
		$dia = 'Miercoles';
	}elseif($hoy['wday'] == 4){
		$dia = 'Jueves';
	}elseif($hoy['wday'] == 5){
		$dia = 'Viernes';
	}elseif($hoy['wday'] == 6){
		$dia = 'Sabado';
	}elseif($hoy['wday'] == 0){
		$dia = 'Domingo';
	}
	//convertir mes del año en español 
	if($hoy['mon'] == 1){
		$mes = 'enero';
	}elseif($hoy['mon'] == 2){
		$mes = 'febrero';
	}elseif($hoy['mon'] == 3){
		$mes = 'marzo';
	}elseif($hoy['mon'] == 4){
		$mes = 'abril';
	}elseif($hoy['mon'] == 5){
		$mes = 'mayo';
	}elseif($hoy['mon'] == 6){
		$mes = 'junio';
	}elseif($hoy['mon'] == 7){
		$mes = 'julio';
	}elseif($hoy['mon'] == 8){
		$mes = 'agosto';
	}elseif($hoy['mon'] == 9){
		$mes = 'septiembre';
	}elseif($hoy['mon'] == 10){
		$mes = 'octubre';
	}elseif($hoy['mon'] == 11){
		$mes = 'noviembre';
	}elseif($hoy['mon'] == 12){
		$mes = 'diciembre';
	}
	//fecha completa dia - numero de dia del mes - mes - año
	$fecha = $dia . " " . $hoy['mday'] . " de " . $mes. " de " . $hoy['year'];
?>