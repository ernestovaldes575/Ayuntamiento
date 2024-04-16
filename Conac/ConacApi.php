<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasConac.php');
//Carga las variables
$ArCooki1 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki1);
$EjerTrab = $ABusqMae[0];
$BandMens = true;

switch ($CRUT){ 
	case "GET1": 
			//Carga el registro para Consulta
			$InstSql = "SELECT cejercicio,  COUNT(*) AS TOTAL ".
						"FROM ctconac ". 
						"GROUP BY cejercicio ". 
						"ORDER BY cejercicio DESC";
		break;

	case "GET2":
			if( isset($_GET['Param1']) != '')	
				{$EjerTrab = $_GET["Param1"];
					$ArCooki2  = $EjerTrab .'|';
					setcookie("CBusqMae", "$ArCooki2");
				}
			//Carga el registro
			$InstSql = "SELECT cperiodo, cpedescri, COUNT(*) AS TOTAL ".
						"FROM ctconac ".
						"INNER JOIN ccperiodo ON cperiodo = cpeclave ".
						"WHERE cejercicio = $EjerTrab ".
						"GROUP BY cperiodo, cpedescri";
		break;

	case "GET3":
			if( isset($_GET['Param2']) != '')	
				{$PeriCons = $_GET["Param2"];
				$ArCooki3  = $EjerTrab .'|'.$PeriCons.'|';
				setcookie("CBusqMae", "$ArCooki3");
			}else{
				$PeriCons = $ABusqMae[1];
			}
			$InstSql = "SELECT cclasinfo, ccidescri, COUNT(*) AS TOTAL ".
						"FROM ctconac ". 
						"INNER JOIN ccclasinfo ON cclasinfo = cciclave ".
						"WHERE cejercicio = $EjerTrab AND cperiodo = '$PeriCons' ".
						"GROUP BY cclasinfo, ccidescri";
		break;

	case "GET4":
		$PeriCons = $ABusqMae[1];
		if( isset($_GET['Param3']) != '')	
				{$LiInCons = $_GET["Param3"];
				$ArCooki4  = $EjerTrab .'|'.$PeriCons.'|'.$LiInCons.'|';
				setcookie("CBusqMae", "$ArCooki4");
			}else{
				$LiInCons = $ABusqMae[2];
			}
			$InstSql = 	"SELECT cruta, carchivo ".
						"FROM	ctconac ". 
						"INNER JOIN ccclasinfo ON cclasinfo = cciclave ".
						"WHERE  cejercicio = $EjerTrab AND ".
								"cperiodo = '$PeriCons' AND ". 
								"cclasinfo = '$LiInCons'";
		break;
}
if ($BandMens)  //echo '1)'.$InstSql.'<br>';
$RespSql = $ConeBase->prepare($InstSql);
$RespSql->execute();
	//$tot_rows = $ResuSql->rowCount();
	$ListLaye = $RespSql->fetchAll();
?>	
