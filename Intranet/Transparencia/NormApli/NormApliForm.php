<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conexion.php');

//Carga las variables


if(isset($_POST['Enviar'])){
    $TipoMovi = $_POST['C01'];
    $ConFacAr = $_POST['C02'];

    $C06 = $_POST['C06'];
    $C07 = $_POST['C07'];
    $C08 = $_POST['C08'];
    $C09 = $_POST['C09'];
    $C10 = $_POST['C10'];
    $C11 = $_POST['C11'];
    $C12 = $_POST['C12'];
    $C13 = $_POST['C13'];
    $C14 = $_POST['C14'];
    $C15 = $_POST['C15'];

    //Instrucciones
switch ($TipoMovi)
    {
    case "A": #Alta
        $sql = "INSERT INTO normap (AAyuntamiento, AEjercicio, AFechaInicio, AFechaTermino, ATipoNorma, ATipoNormaOtro,
        ADenominacion, AFechaDOF, AFechaUltima, AHipervinculo, AAreaResp, ANota) VALUES ('".$ClavAyun."', '".$EjerTrab."',
        '".$C06."', '".$C07."', '".$C08."', '".$C09."', '".$C10."', '".$C11."', '".$C12."', '".$C13."', '".$ConsUnid."', '".$C15."')";
    break;
    case "M":#Modificar
        $sql = "UPDATE normap SET AFechaInicio = '".$C06."', AFechaTermino = '".$C07."', ATipoNorma = '".$C08."', ATipoNormaOtro = '".$C09."',
        ADenominacion = '".$C10."', AFechaDOF = '".$C11."', AFechaUltima = '".$C12."', AHipervinculo = '".$C13."',
        ANota = '".$C15."' WHERE AConsecutivo = $ConFacAr";
    break;
    case "B":#Borrar
        $sql = "DELETE FROM normap WHERE AConsecutivo = $ConFacAr";
    break;
    }
    $resultado = $conexion->prepare($sql);
    $resultado->execute();

    $message = "El registro fallo!!";
    if ($resultado)
        $message = "Actualizacion exitosa!";

    $PagiRegr = "location: NormApliCons.php";
    header($PagiRegr);
    echo '<script>alert("'.$message.'");</script>';
    $resultado->closeCursor();

}else{
    if ( trim($_GET["Param1"]) != '' )
    {
    $TipoMovi = $_GET["Param1"];	#Tipo de Movimiento
    $ConFacAr = $_GET["Param2"];	#Tipo de Movimiento
    }

    //Datos del Catalogo
    $sql = $conexion->prepare("SELECT * FROM tcnormatividad");
    $sql->execute();
    $CataNorm = $sql->fetchAll();

    //Datos de la tabla
    $sql = "SELECT * FROM normap WHERE AConsecutivo = $ConFacAr";
    $resultado = $conexion->prepare($sql);
    $resultado->execute();
    $row = $resultado->fetch();

    $VC04= ""; $VC05= ""; $VC06= ""; $VC07= ""; $VC08= ""; $VC09= "";
    $VC10= ""; $VC11= ""; $VC12= ""; $VC13= ""; $VC14= ""; $VC15= "";

    if($row){
        $VC04 = $row['AAyuntamiento'];
        $VC05 = $row['AEjercicio'];
        $VC06 = $row['AFechaInicio'];
        $VC07 = $row['AFechaTermino'];
        $VC08 = $row['ATipoNorma'];
        $VC09 = $row['ATipoNormaOtro'];
        $VC10 = $row['ADenominacion'];
        $VC11 = $row['AFechaDOF'];
        $VC12 = $row['AFechaUltima'];
        $VC13 = $row['AHipervinculo'];
        $VC14 = $row['AAreaResp'];
        $VC15 = $row['ANota'];
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
	<title>Normatividad Aplicable</title>
	<link rel="stylesheet" href="../../Archivos/CSS/CRUD.css">
        <!--icono de la pestaña (logo)-->
    <link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />
        <!--jquery para validar campos-->
    <script src="../../Archivos/JS/jquery-1.11.1.js"></script>
</head>
<body>
	<!--encabezado-->
	<header><?php require_once('../../Archivos/Files/header.php'); ?></header>
	<br>

	<!--formulario de Actualizacion-->
	<div class="principal">
		<h1>Normatividad Aplicable<br>
            <?=$DescUnid?></h1>
		<form action="" method="post" name="formulario">
			<!-- opciones de crud-->
			<input type="hidden" name="C01" value="<?=$TipoMovi?>">
            <input type="hidden" name="C02" value="<?=$ConFacAr?>"></td>
			<!--el value de todos los inputs es lo que esta en la base de datos correspondiente al elemento que se pulso-->
			<table>
				<tr>
					<td class="etiqueta">Fecha de Inicio</td>
					<td class="contenido"><input type="date" name="C06" id="AFechaInicio" value="<?=$VC06?>"></td>
				</tr>
				<tr>
					<td class="etiqueta">Fecha de Termino</td>
					<td class="contenido"><input type="date" name="C07" id="AFechaTermino" value="<?=$VC07?>"></td>
				</tr>
				<tr>
					<td class="etiqueta">ATipoNorma</td>
					<td class="contenido">
                    <select name="C08">
                        <?php
                                foreach($CataNorm as $valor):
                                    $ClavCata = $valor['CNOClave'];
                                    $DescCata = $valor['CNODescripcion'];

                                    $Activo = "";
                                    if ($ClavCata == $VC08)
                                        $Activo = "selected";
                                ?>
                                        <option value='<?=$ClavCata?>'<?=$Activo?>><?=$DescCata?></option>
                                <?php
                                    endforeach;
                                ?>
                            </select>
                    </td>
				</tr>
				<tr>
                <tr>
					<td class="etiqueta">ATipoNormaOtro</td>
					<td class="contenido"><input type="text" name="C09" id="ATipoNormaOtro" placeholder="Ingresa Otro Tipo de Norma" value="<?=$VC09?>"></td>
				</tr>
				<tr>
					<td class="etiqueta">Denominacion</td>
					<td class="contenido"><input type="text" name="C10" id="ADenominacion" placeholder="Ingresa Denominacion" value="<?=$VC10?>"></td>
				</tr>
				<tr>
					<td class="etiqueta">AFechaDOF</td>
					<td class="contenido"><input type="date" name="C11" id="AFechaDOF" placeholder="Ingresa Fecha (DOF)" value="<?=$VC11?>"></td>
				</tr>
                <tr>
					<td class="etiqueta">AFechaUltima</td>
					<td class="contenido"><input type="date" name="C12" id="AFechaUltima" placeholder="Ingresa Ultima Fecha" value="<?=$VC12?>"></td>
				</tr>
				<tr>
				<tr>
					<td class="etiqueta">Hipervinculo</td>
					<td class="contenido"><input type="text" name="C13" id="AHipervinculo" placeholder="Ingresa Hipervinculo" value="<?=$VC13?>"></td>
				</tr>
				<tr>
					<td class="etiqueta">Nota</td>
					<td class="contenido"><input type="text" name="C15" id="ANota" placeholder="Ingresa Nota" value="<?=$VC15?>"></td>
				</tr>
			</table>
			<div class="botones">
				<a href="NormApliCons.php" name="cancelar" class="cancelar">Cancelar</a>
				<input type="submit" name="Enviar" class="registrar" value="<?=$MesnTiMo?>">
			</div>
		</form>
	</div>
<?php
}
?>

</body>
</html>