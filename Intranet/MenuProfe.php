<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Intranet</title>
	<link rel="shortcut icon" href="Archivos/Img/logoEnc.ico"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="/Intranet/Estilos/Header.css">
	<link rel="stylesheet" href="/Intranet/Estilos/CRUD.css">
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
$ConsProf = $AEncaMae[0]; 
$NumeProf = $AEncaMae[1];
$NombProf = $AEncaMae[2];

echo "ConsProf:".$ConsProf."<br>";

$BandMens = false;

if ( isset($_GET["Param1"]) ){
	$Nivel = $_GET["Param1"];
	$OpcMen = $_GET["Param2"];
	$ArCooki3 = $Nivel.'|'.$OpcMen.'||';
	setcookie("CMenu", "$ArCooki3");
}
if ( isset($_GET["Param3"]) ){
	$Nivel = $_GET["Param3"];
	$OpcSub = $_GET["Param4"];
	$ArCooki4 = $Nivel.'|'.$OpcMen.'|'.$OpcSub.'|';
	setcookie("CMenu", "$ArCooki4");
}

/*include_once 'Archivos/Conexiones/ConeEscuela.php';

$InstSql = 	"SELECT CMEClave,CMEDescri,CMEBasDat ".
			"FROM acceso.atpermen ".
			"INNER JOIN acceso.acmenu ON CMEClave=PMenu ".
			"WHERE PAyuntamiento='".$ClavAyun."' and PConsServ='".$ConsUsua."'";

if ($BandMens)  echo '1)<br>'.$InstSql.'<br><br>';		   
$ResuSql = $conexion->prepare($InstSql);
$ResuSql->execute();
$MenuBase = $ResuSql->fetchAll(); */

?>	
		<table>
			<tr>
				<td>
					<i class="bi bi-folder-fill"></i>	
					Escuela
				</td> 
			</tr>
			<tr>
				<td>&nbsp;&nbsp;
					<i class="bi bi-folder"></i>
					<!--Profesor -->
				</td>
			</tr>	
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="Escuela/ProfMate.php" class="enlace_tercero">
					<i class="bi bi-file-earmark-check-fill"></i>
					<!--	Materia -->
					</a>	
				</td>
			</tr>	

			<tr>
				<td>&nbsp;&nbsp;
					<i class="bi bi-folder"></i>
					<!-- Alumnos-->
				</td>
			</tr>	
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="Escuela/ProfMateAlum.php" class="enlace_tercero">
					<i class="bi bi-file-earmark-check-fill"></i>
						<!--Registra Alumnos -->
					</a>	
				</td>
			</tr>	
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="Escuela/CreaClase.php" class="enlace_tercero">
					<i class="bi bi-file-earmark-check-fill"></i>
						Crear Clase
					</a>	
				</td>
			</tr>	

		</table>
	<a href="/Intranet/IntraProfe.php" class="enlace1 exit">Salir</a>
</body>
</html>
							