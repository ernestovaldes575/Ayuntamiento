<!DOCTYPE html>
<html lang="es">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facultades de área</title>
	<link rel="stylesheet" type="text/css" href="/Intranet/Encabezado/EstiIntr.css">
</head>
<script language="JavaScript" src="PWRegistro.js"></script>

<body> 
 <header>
  <?php 
   //Varibales Globales
   include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
   //Encabezado	
   require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaPrin.php'); 
  ?> 
 </header>

<?php 
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasPagWeb.php');

$ArCook01 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCook01);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$TipoDocu = $ABusqMae[0]; 
$EjerTrab = $ABusqMae[1];
$MesTrab  = $ABusqMae[2];
$EstaRevi = $ABusqMae[3];
$ConsCamb = $ABusqMae[4];

if(isset($_POST['Enviar']))
  { $BandMens = true;
    $ServPub = $_POST['C01'];
    $NuevSegu = "04";
    $InstSql = "UPDATE PTPagina ". 
              "SET     PEstaSegu = '$NuevSegu', PSerPubRev= $ServPub, ". 
                      "PFechRevi = date(now()) ".
              "WHERE  PAyuntamiento = '$ClavAyun' AND ".
                    "PEjercicio = '$EjerTrab' AND ".
                    "PTipoDocu = '$TipoDocu' AND ". 
                    "PConsecut = $ConsCamb ";
    if ($BandMens)  echo '2)'.$InstSql.'<br>'; 
    $ResuSql = $ConeBase->prepare($InstSql);
    $ResuSql->execute();

    $MensResp = ($ResuSql) ?  "Algo ha fallado!!!" : "Registro actualizado correctamente";
    if (!$ResuSql) 
    echo '<script>alert("'.$MensResp.'");</script>';

    header( "Location: PWRegistro.php?PaAMB01=M&PaAMB02=$ConsCamb&PaAMB03=$NuevSegu" );  

} else {
  $BandMens = true;   
  if ( isset($_GET["ConsDocu"]) ) {
   $ConsCamb =  $_GET["ConsDocu"]; 
   $ArCook02 = $TipoDocu .'|'. $EjerTrab .'|'. $MesTrab .'|'. $EstaRevi .'|'.$ConsCamb.'|';
	setcookie("CBusqMae", "$ArCook02");  
  }
  //------------------------------------------------------------------------
	//Datos del Catalogo
	$InstSql = "SELECT SConsecutivo,SNombre ". 
             "FROM   ptserpub ". 
             "WHERE  SAyuntamiento = '$ClavAyun' ";
	if ($BandMens)  echo '2)'.$InstSql.'<br>'; 			
	$EjInSql = $ConeBase->prepare($InstSql);
	$EjInSql->execute();
	$CataSePu = $EjInSql->fetchAll();  
  
  ?>
<form method="post" name="formulario" onsubmit="">
<table>
  <tr>
	  <th>Área Responsable</td>
		<td>
			<select name="C01">
			<?php 
        foreach($CataSePu as $RegiTabl): 
								$ClavCata = $RegiTabl['SConsecutivo'];
								$DescCata = $RegiTabl['SNombre'];  ?>
				<option value="<?=$ClavCata?>" ><?=$DescCata?> </option>
			<?php	endforeach;	?>
				</select>
		</td>
	</tr>
  <tr>
   <th></th>
   <td><input type="submit" name="Enviar" class="registrar" value="Guardar" ></td> 
  </tr>   
</table>  
</form>
<?php
} 
?>  
</table>  
</body>
</html>