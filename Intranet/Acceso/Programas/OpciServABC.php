<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conlogin.php');

//Carga las variables
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/EncaCook.php');

$ArCooki3 = $_COOKIE['CPermMenu'];
$APermMen = explode("|", $ArCooki3);
$ClavBaDa = $APermMen[0];
$DescBaDa = $APermMen[1];
$BaseDato = $APermMen[2];
$ClavMenu = $APermMen[3];
$DescMenu = $APermMen[4];

if(isset($_POST['Enviar'])){
    $TipoMovi = $_POST['C01'];
    $ConFacAr = $_POST['C02'];

    $C07 = $_POST['C07'];
    $C03 = $_POST['C03'];
    $C04 = $_POST['C04'];
    $C05 = $_POST['C05'];
    /*
    SELECT `COSTipSer``COSClave``COSDescripcion``COSDireccion` FROM `acopser` WHERE `COSTipSer``COSClave`
    */
    //Instrucciones
switch ($TipoMovi)
    {
    case "A": #Alta
        $sql = "INSERT INTO $BaseDato.acopcser (COSTipSer, COSClave, COSDescripcion, COSDireccion ) VALUES ('".$C07."','".$C03."', '".$C04."', '/Intranet".$C05."')";
    break;
    case "M":#Modificar
        $sql = "UPDATE $BaseDato.acopcser SET COSTipSer = '".$C07."', COSClave = '".$C03."', COSDescripcion = '".$C04."', COSDireccion = '/Intranet".$C05."'  WHERE COSClave = $ConFacAr";
        #$sql = "UPDATE acopser SET COSClave = '".$C03."', COSDescripcion = '".$C04."', COSDireccion = '".$C05."' WHERE COSTipSer = $ConFacAr";
    break;
    case "B":#Borrar
        $sql = "DELETE FROM $BaseDato.acopcser WHERE COSClave = $ConFacAr";
    break;
    }
    echo $TipoMovi;
    $resultado = $con->prepare($sql);
    $resultado->execute();
    $resultado->closeCursor();

    $message = "El registro fallo!!";
    if ($resultado)
        $message = "Actualizacion exitosa!";

    echo '<script>top.location.href= "TipoServLista.php"; </script>';
    echo '<script>location.href= "../../../Archivos/Img/MEBlanco.gif"; </script>';

    #$PagiRegr = "location: OpciServABC.php";
    #header($PagiRegr);
    echo '<script>alert("'.$message.'");</script>';

}else{
    if ( trim($_GET["Param1"]) != '' )
    {
        $TipoMovi = $_GET["Param1"];	#Tipo de Movimiento
        $ClavSubm = $_GET["Param2"];	#Tipo de Movimiento
    }

    //Crear la cookie
    $ArCooki4 = "00";
    setcookie("CRutaArch", "$ArCooki4");


    //Datos de la tabla
    $sql = "SELECT COSTipSer,COSClave,COSDescripcion,COSDireccion ".
           "FROM $BaseDato.acopcser ".
           "WHERE COSTipSer = '".$ClavMenu."' AND ".
           "COSClave  = '".$ClavSubm."'  ";
    $resultado = $con->prepare($sql);
    $resultado->execute();
    $RegiTabl = $resultado->fetch();

    $VC07= ""; $VC03= ""; $VC04= ""; $VC05= "";

    if($RegiTabl){
        $VC07 = $RegiTabl['COSTipSer'];
        $VC03 = $RegiTabl['COSClave'];
        $VC04 = $RegiTabl['COSDescripcion'];
        $VC05 = $RegiTabl['COSDireccion'];
    }
    else{
        $sql = "SELECT MAX(COSClave)+1 AS SiguRegi, length(MAX(COSClave) + 1) as TamaSiRe ".
                "FROM $BaseDato.acopcser ";
        $resultado = $con->prepare($sql);
        $resultado->execute();
        $RegiTabl = $resultado->fetch();

        $VC03 = "01";
        if ($RegiTabl)
        { $TamaSiRe = $RegiTabl['TamaSiRe'];
            $VC03 = $RegiTabl['SiguRegi'];
            $VC03 = ($TamaSiRe < 10 ) ? "00".$VC03 : $VC03;
        }

    }
    //TipoMovimiento
    $MesnTiMo = "";
    switch( $TipoMovi ){
    case "A":	$MesnTiMo = "Registrar"; break;
    case "M":	$MesnTiMo = "Actualizar"; break;
    case "B":	$MesnTiMo = "Eliminar"; break;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Opcion de Servicio</title>
	<link rel="stylesheet" href="../../Archivos/CSS/opcABC.css">
	<!--icono de la pestaña (logo)-->
	<link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />
    <link rel="stylesheet" href="../../Archivos/CSS/font-awesome.min.css">
</head>
<body>
	<!--formulario de Actualizacion-->
	<div class="principal">
		<form action="" method="post" name="formulario">
			<!-- opciones de crud-->
			<input type="hidden" name="C01" value="<?=$TipoMovi?>">
            <input type="hidden" name="C02" value="<?=$ClavSubm?>"></td>
			<!--el value de todos los inputs es lo que esta en la base de datos correspondiente al elemento que se pulso-->
			<table>
                <tr>
					<td>Tipo de Servicio</td>
					<td><input type="text" name="C07" value="<?=$VC07?>"></td>
				</tr>
				<tr>
					<td>Clave</td>
					<td><input type="text" name="C03" value="<?=$VC03?>"></td>
				</tr>
				<tr>
					<td>Descripcion</td>
					<td><input type="text" name="C04" value="<?=$VC04?>"></td>
				</tr>
                <tr>
					<td>Direccion</td>
					<td><input type="text" name="C05" placeholder="Digitar la URL" value="<?=$VC05?>" size="80">
                        <a href="javascript:window.open('2dir.php?carpeta=','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
                        Imagen</a> 
                    </td>
				</tr>
			</table>
			<div class="botones">
				<a href="../../Arvhicos/Img/MEBlanco.gif" name="cancelar" class="cancelar">Cancelar</a>
				<input type="submit" value="Enviar" name="Enviar" class="registrar" value="<?=$MesnTiMo?>">
			</div>
		</form>
	</div>
<?php
}
?>
</body>
</html>