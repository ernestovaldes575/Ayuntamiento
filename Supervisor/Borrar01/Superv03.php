<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zinacantepec</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
        <link rel="shortcut icon" href="../img/logo/logoEnc.png" />
        <link rel="stylesheet" href="../layouts/Reset.css">
        <link rel="stylesheet" href="../layouts/Nav.css">
        <link rel="stylesheet" href="../layouts/Main.css">
        <link rel="stylesheet" href="../layouts/Noticias.css">
        <link rel="stylesheet" href="../layouts/CardNot.css">
        <link rel="stylesheet" href="../layouts/Footer.css">
        <link rel="stylesheet" href="../layouts/Interes.css">
        <link rel="stylesheet" href="../layouts/Sociales.css">
        <link rel="stylesheet" href="../layouts/Main_Sec.css">
        <link rel="stylesheet" href="../layouts/Layer.css">
        <link rel="stylesheet" href="../layouts/Swiper.css">
</head>

<body>  
    <div id = "fb-root" >
        <script async defer crossorigin = "anonymous" 
                src = "https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v18.0" nonce = "NhxAKH3u" >
        </script> 
    </div>

    <div id="fb-root">
        <script async defer crossorigin="anonymous" 
            src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v18.0" nonce="pzS825Ox">
        </script>
    </div>

<?php require('PagiPrinEnca.php') ?>    <!--Encabezado -->
<?php require('PagiPrinLaye.php') ?>    
<?php require('PagiPrinMenu.php') ?> 
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

	//Listado de Supervisores
	$InstSql =  "SELECT SConsecut, SNumeEmpl, SServPubli, SCategoria, SFoto ". 
				"FROM  stsupervisor ".
				"WHERE SAyuntamiento = '".$ClavAyun."' AND ".
					  "SUnidad =".$ConUniTr." AND ".
					  "SEstado = 'A' ". 
				"ORDER BY SNumeEmpl"	  ;
	if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
	$ResuSql = $ConeBase->prepare($InstSql);
	$ResuSql->execute();
	$tot_rows = $ResuSql->rowCount();
	$ListSupe = $ResuSql->fetchAll();

?>

<table  border="1" cellpadding="0" cellspacing="0" bgcolor="#FECC0D">
			<thead>
				<tr>
					<td>No Empleado</td>
					<td>Nombre</td>
					<td>Categoria</td>
					<td><a href="Superv01.php" > Regresar </a></td>	
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($ListSupe as $RegiTabl): 
				    $VC03=$RegiTabl[0];		//SConsecut
					$VC04=$RegiTabl[1];		//SNumeEmpl
					$VC05=$RegiTabl[2];		//SServPubli
					$VC06=$RegiTabl[3];		//SCategoria
					$VC07=$RegiTabl[4];		//SFoto

					$RutaArch = '/ExpeElectroni/'.$ClavAyun.'/Supervisor/'.$VC07;
				?>
				<tr>
					<td><?=$VC04?></td>				<!--Cambiar-->
					<td><?=$VC05?></td>				<!--Cambiar-->
					<td><?=$VC06?></td>				<!--Cambiar-->
					<td data-titulo="Editar: ">
						<a href="Superv04.php?Param1=<?= $VC03?>" class="btn_update">
						 Ver
						</a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>



<?php require('PagiPrinPie.php') ?> 
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="../scripts/app.js"></script>
</body>
</html>