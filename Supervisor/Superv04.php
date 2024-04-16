<!DOCTYPE html>
<html>
<body class=""> 
<?php include '../EstrPagi/HeadGene.php'?>
<body class=""> 
<?php include '../EstrPagi/EncaGene.php'?>

<div class="contenedor__layer">
        <div class="swiper" id="swiper-1">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="/img/layer/1.png" alt="">
                </div>
            </div>
        </div>        
</div>
<?php
//echo 'ubicacion'.$_SERVER['DOCUMENT_ROOT'].'<br>';
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');
$ClavAyun = 105;

//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$ConUniTr = $ABusqMae[0]; 
$ClaUniTr = $ABusqMae[1];
$DesUniTr = $ABusqMae[2];

//Bandera de visualizar msg
$BandMens = false;
if ( isset($_GET["Param0"]) )
	$BandMens = true;

if( isset($_GET["Param1"]) )
	$ConsBusq = $_GET["Param1"];	#COINCIDENCIA CON LA BD  

//----------------------------------------------------------- 
//Datos del Layer
$InstSql =  "SELECT SNumeEmpl, SServPubli, SCategoria ". 
			"FROM  stsupervisor ".
			"WHERE SAyuntamiento = '".$ClavAyun."' AND ".
	 			  "SConsecut =".$ConsBusq." ";
if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();
$ListSupe = $ResuSql->fetch();
		
$VC03 = "";  $VC04 = ""; 
$VC05 = "";  $VC06 = "";
if ($ListSupe)
  { $VC03 = $ListSupe[0];	//SNumeEmpl
	$VC04 = $ListSupe[1];	//SServPubli
	$VC05 = $ListSupe[2];	//SCategoria
  }


?>

<table  border="1" cellpadding="0" cellspacing="0" bgcolor="#FECC0D">
<tr>
				<th></th>
				<td><a href="SupeList.php">Regresar</a></td>
			</tr>

<tr>
				<th>No empleado</th>
				<td><?=$VC03?>></td>
			</tr>
			<tr>
				<th>Nombre</td>
				<td><?=$VC04?></td>
			</tr>
			<tr>
				<th>Categoria</td>
				<td><?=$VC05?></td>
			</tr>
</table>
</body>
</html>