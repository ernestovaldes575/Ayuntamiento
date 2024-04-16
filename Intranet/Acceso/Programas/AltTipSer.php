<?php
//archivo de conexion a la bd
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conlogin.php');

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

    $C03 = $_POST['C03'];
    $C04 = $_POST['C04'];

    //Instrucciones
switch ($TipoMovi)
    {
    case "A": #Alta
        $sql = "INSERT INTO $BaseDato.actipser (CTSClave, CTSDescripcion) VALUES ('".$C03."', '".$C04."')";
    break;
    case "B":#Borrar
        $sql = "DELETE FROM $BaseDato.actipser WHERE CTSClave = $ConFacAr";
    break;
    }
    $resultado = $con->prepare($sql);
    $resultado->execute();
    $resultado->closeCursor();

    $message = "El registro fallo!!";
    if ($resultado)
        $message = "Actualizacion exitosa!";

    //opener.top.ListaCaja.location.reload();
    echo '<script>top.location.href= "TipoServLista.php"; </script>';
    echo '<script>location.href= "../../Archivos/Img/MEBlanco.gif"; </script>';

    //$PagiRegr = "location: ../../../img/MEBlanco.gif";
    //header($PagiRegr);
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
    $sql = "SELECT CTSClave, CTSDescripcion ".
           "FROM $BaseDato.actipser ".
           "WHERE CTSClave  = '".$ClavSubm."'  ";
    $resultado = $con->prepare($sql);
    $resultado->execute();
    $RegiTabl = $resultado->fetch();

    $VC03= ""; $VC04="";

    if($RegiTabl){
        $VC03 = $RegiTabl['CTSClave'];
        $VC04 = $RegiTabl['CTSDescripcion'];
    }
    else
    {  $sql = "SELECT MAX(CTSClave)+1 AS SiguRegi, length(MAX(CTSClave) + 1) as TamaSiRe ".
                "FROM $BaseDato.actipser ";
        $resultado = $con->prepare($sql);
        $resultado->execute();
        $RegiTabl = $resultado->fetch();

        $VC03 = "01";
        if ($RegiTabl)
        { $TamaSiRe = $RegiTabl['TamaSiRe'];
            $VC03 = $RegiTabl['SiguRegi'];
            $VC03 = ($TamaSiRe < 10 ) ? "0".$VC03 : $VC03;
        }
    }
    //TipoMovimiento
    $MesnTiMo = "";
    switch( $TipoMovi ){
    case "A":	$MesnTiMo = "Registrar"; break;
    case "B":	$MesnTiMo = "Eliminar"; break;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AltTipServ</title>
    <link rel="stylesheet" href="../../Archivos/CSS/OpciMenu.css">
    <link rel="stylesheet" href="../../Archivos/CSS/font-awesome.min.css">
</head>
<body>

<div class="princ">
		<form action="" method="post" name="formulario">
			<!-- opciones de crud-->
			<input type="hidden" name="C01" value="<?=$TipoMovi?>">
            <input type="hidden" name="C02" value="<?=$ClavSubm?>"></td>
			<!--el value de todos los inputs es lo que esta en la base de datos correspondiente al elemento que se pulso-->
			<table>
				<tr>
                    <td>Clave</td>
					<td><input type="text" name="C03" value="<?=$VC03?>"></td>
                </tr>
                <tr>
					<td>Descripcion</td>
					<td><input type="text" name="C04" value="<?=$VC04?>"></td>
				</tr>
            </table>
            <div class="botones">
				<a href="../../../Archivos/Img/MEBlanco.gif" name="cancelar" class="cancelar">Cancelar</a>
				<input type="submit" value="Enviar" name="Enviar" class="registrar" value="<?=$MesnTiMo?>">
			    </div>
		</form>
</div>

<?php
}
?>
</body>
</html>