	<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Intranet</title>
	<link rel="shortcut icon" href="Archivos/Img/logoEnc.ico"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="/build/css/style.css">
</head> 
<body>
	<header class="header">
		<img class="img-1" src="http://201.122.44.34/img/SIMGA_intra01.png" alt="">
		<img class="img-2" src="http://201.122.44.34/img/SIMGA02.png" alt="">
	</header>

<?php
	session_start();
?>
<?php
//Carga las variables
$ArCooki1 = $_COOKIE['CMenu'];
$AMenu = explode("|", $ArCooki1);
$Nivel  = $AMenu[0]; 
$OpcMen = $AMenu[1]; 
$OpcSub = $AMenu[2]; 


//Carga las variables
$ArCooki2 = $_COOKIE['CEncaAcc'];
$AEncaMae = explode("|", $ArCooki2);

$ConsUsua = $AEncaMae[0]; 
$ClavAyun = $AEncaMae[1];
$DescAyun = $AEncaMae[2];
$ConsUnid = $AEncaMae[3];
$DescUnid = $AEncaMae[4];
$EjerTrab = $AEncaMae[5];

$BandMens = false;
if(isset($_GET["Param0"]) ){
	$BandMens = true;
}

if(isset($_GET["Param1"]) ){
	$Nivel = $_GET["Param1"];
	$OpcMen = $_GET["Param2"];
	$ArCooki3 = $Nivel.'|'.$OpcMen.'||';
	setcookie("CMenu", "$ArCooki3");
}

if(isset($_GET["Param3"]) ){
	$Nivel = $_GET["Param3"];
	$OpcSub = $_GET["Param4"];
	$ArCooki4 = $Nivel.'|'.$OpcMen.'|'.$OpcSub.'|';
	setcookie("CMenu", "$ArCooki4");
}

include_once 'Archivos/Conexiones/conexion.php';

$InstSql = 	"SELECT CMEClave,CMEDescri,CMEBasDat ".
			"FROM acceso.atpermen ".
			"INNER JOIN acceso.acmenu ON CMEClave=PMenu ".
			"WHERE PAyuntamiento='".$ClavAyun."' and PConsServ='".$ConsUsua."'";

			if ($BandMens)  echo '1)<br>'.$InstSql.'<br><br>';		   
				$ResuSql = $conexion->prepare($InstSql);
				$ResuSql->execute();
				$MenuBase = $ResuSql->fetchAll();
?>	
	<div class="table-responsive container-sm">
		<table class="tabla mt-4">
			<?php 
				foreach($MenuBase as $valor){
					$CMEClave  = $valor['CMEClave'];
					$CMEDescri = $valor['CMEDescri'];
					$CMEBasDat = $valor['CMEBasDat'];?>
			<tr>
				<td>
					<a href="MenuIntranet.php?Param1=2&Param2=<?=$CMEClave?>" 
						class="enlace_primero text-success fw-semibold text-uppercase fs-4 text-decoration-none">
						<i class="bi bi-folder-fill"></i>	
						<?=$CMEDescri?>
					</a>
				</td> 
			</tr>
			<?php 
				if($Nivel > 1 && $CMEClave==$OpcMen ){
					$InstSql = 	"SELECT `CTSClave`,`CTSDescripcion` ".
								"FROM ".$CMEBasDat.".actipser ".
								"WHERE `CTSClave` in (SELECT PTipoServ ".
								"FROM $CMEBasDat.adPermi ".
								"WHERE PAyuntamiento = '".$ClavAyun."' AND ".
								"PConsServ = ".$ConsUsua.")";

				if ($BandMens)  echo '2)<br>'.$InstSql.'<br><br>';
					$ResSql2 = $conexion->prepare($InstSql);
					$ResSql2->execute();
					$submenu = $ResSql2->fetchAll();
				foreach($submenu as $valor){
						$CTSClave = $valor['CTSClave'];
						$CTSDescripcion = $valor['CTSDescripcion'];
			?>

			<tr>
				<td>
					<a href="MenuIntranet.php?Param3=3&Param4=<?=$CTSClave?>" 
						class="enlace_segundo text-info-emphasis text-uppercase fw-semibold 
						fs-5 text-decoration-none fw-semibold">
						<i class="bi bi-folder"></i>
						<?=$CTSDescripcion?>
					</a>		
				</td>
			</tr>	
			<?php 
				if ( $Nivel > 2 && $CTSClave == $OpcSub) {
					$InstSql = 	"SELECT COSClave,COSDescripcion,COSDireccion ".
								"FROM ".$CMEBasDat.".adpermi ".
								"Inner Join ".$CMEBasDat.".acopcser ON PTipoServ=COSTipSer AND POpciServ=COSClave ".
								"WHERE PAyuntamiento = '".$ClavAyun."' AND ".
											"PConsServ ='".$ConsUsua."' AND ". 
											"PTipoServ = '".$OpcSub."'";
					if ($BandMens)  echo '3)<br>'.$InstSql.'<br><br>';
					$ResSql3 = $conexion->prepare($InstSql);
					$ResSql3->execute();
					$resultado = $ResSql3->fetchAll();
					foreach($resultado as $valor){
						$COSClave       = $valor['COSClave'];
						$COSDescripcion = $valor['COSDescripcion'];
						$COSDireccion   = $valor['COSDireccion'];
					?>
			<tr>
				<td>
					<a href="ModuloIntra.php?Param1=<?=$CMEBasDat?>&Param2=<?=$CTSClave?>&Param3=<?=$CTSDescripcion?>&Param4=<?=$COSClave?>&Param5=<?=$COSDescripcion?>&Param6=<?=$COSDireccion?>" class="enlace_tercero">
					<i class="bi bi-file-earmark-check-fill"></i>
						<?=$COSDescripcion?>
					</a>	
				</td>
			</tr>
			<?php			}
						}	
					}
				}
			}
			?>
		</table>
		<div class="container mt-4 d-grid">
			<a href="/Intranet/Intranet.php" 
			class="btn-Regresar">
				Salir
			</a>
		</div>	
</body>
</html>