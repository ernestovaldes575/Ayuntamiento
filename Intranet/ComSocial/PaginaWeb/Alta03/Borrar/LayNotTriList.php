<!DOCTYPE html>
<html lang="es">
<?php include ($_SERVER['DOCUMENT_ROOT'].'/Intranet/Includes/Header.php')?>
<script language="JavaScript" src="LayNotTriList.js"></script>
<?php
//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$TipoDocu = $ABusqMae[0]; 
$EjerTrab = $ABusqMae[1];
$MesTrab  = $ABusqMae[2];
$EstaRevi = $ABusqMae[3];

//Bandera de visualizar msg
$BandMens = false;
if ( isset($_GET["Param0"]) )
	$BandMens = true;

//Ejercicio
if ( isset($_GET["Param1"]) ){
	$EjerTrab = $_GET["Param1"];
	$ArCooki4 = $TipoDocu .'|'. $EjerTrab .'|'. $MesTrab .'|'. $EstaRevi .'|';
	setcookie("CBusqMae", "$ArCooki4");
}

//Estado de la revision
if ( isset($_GET["Param2"]) ){
	$EstaRevi = $_GET["Param2"];
	$ArCooki4 = $TipoDocu .'|'. $EjerTrab .'|'. $MesTrab .'|'. $EstaRevi .'|';
	setcookie("CBusqMae", "$ArCooki4");
}

$EstaRevI = ""; $EstaRevR = ""; $EstaRevP = ""; $EstaRevT = ""; 
switch( $EstaRevi ){
	case "I":	$EstaRevI = "checked";	break;	//Registro inicial
	case "R":	$EstaRevR = "checked";	break;	//Revision
	case "A":	$EstaRevR = "checked";	break;	//Aprobacion
	case "P":	$EstaRevP = "checked";	break;	//Publicacion
	case "C":	$EstaRevT = "checked";	break;	//Terminacion de publicacion
}

include 'LayNotTriConf02.php';
?>	
	<!--encabezado-->

	<div class="tabla">
		<div class="titulo"><h2><?=$DescTiSe ?> / <?=$DescOpSe ?></h2></div>
		<div class="botones">
			<a href="/Intranet/menuintranet.php" class="regresar">Regresar</a>
			<input type="checkbox" name="C06" value="I" onChange="CargaEsta('I')" <?=$EstaRevI?>>
			Propuesta
			&nbsp;&nbsp; 
			<input type="checkbox" name="C06" value="R" onChange="CargaEsta('R')" <?=$EstaRevR?>> Revision
			&nbsp;&nbsp;
			<input type="checkbox" name="C06" value="P" onChange="CargaEsta('P')" <?=$EstaRevP?>> Publicación 
			&nbsp;&nbsp;
			<input type="checkbox" name="C06" value="T" onChange="CargaEsta('T')" <?=$EstaRevT?>> Termino de la Publicacion

			<div class="lista">
				<select name="AAreaResp" onChange="CargaEjercicio(this.value)" class="AAreaResp">
					<?php 
					foreach($CataEjer as $RegiTabl): 
						$ClavCata = $RegiTabl[0];		
						$DescCata = $RegiTabl[1];  
						$Activo = "";
						if ( $ClavCata == $EjerTrab)
							$Activo = "selected"; 
						?>
						<option value="<?=$ClavCata?>" <?=$Activo?>> <?=$ClavCata?> </option>
						<?php	
					endforeach;
					?>
				</select>
			</div>
			<?php 
			  if($Alta == "A"){ ?>
				<a href="LayNotTri.php?Param1=A&Param2=0" class="nuevo">
					+Nuevo
				</a>			
			<?php } ?>
		</div>

		<table class="table">
			<thead class="thead">
				<tr>
					<td>Titulo</td>				<!--Cambiar-->
					<td>Descripcion</td>		<!--Cambiar-->
					<td>Fecha de Registro</td>	<!--Cambiar-->
					<td>Imagen</td>
					<td>Doc. Mostrar</td>
					<td>Arch/Imag</td>
					<td>Donde Mostrar</td>
					<td>Eliminar</td>	
					<td>Editar</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<?php 
				foreach ($ListLaye as $RegiTabl): 
				    $VC03=$RegiTabl[0];		//LConsecut,,,
					$VC04=$RegiTabl[1];		//LEjercicio,
					$VC05=$RegiTabl[2];		//LMesRegi,

				    $VC06=$RegiTabl[3];		//LTitulo,
				    $VC07=$RegiTabl[4];		//LDescripcion
					$VC08=$RegiTabl[5];		//LFechAlta

				    $VC09=$RegiTabl[6];		//LImagen

				    $VC10=$RegiTabl[7];		//LAbrirLiDoIm
					$VC11=$RegiTabl[8];		//LAImagDocu
					$VC12=$RegiTabl[9];		//LLiga
					$VC13=$RegiTabl[10];	//LVentRefe
					$VC14=$RegiTabl[11]; 	//LSenaSord

				    $VC15=$RegiTabl[12];	//CTDCarpeta
					$VC16=$RegiTabl[13];	//LEstaSegu

					//Mostrar documento
					$DocuMost = ""; $BanDocMo=false;
					switch( $VC10  ){
						case "N": $DocuMost = "No Mostrar";	break;
						case "I": $DocuMost = "Imagen";		$BanDocMo=true;	break;
						case "L": $DocuMost = "Liga";		break;
						case "A": $DocuMost = "Archivo";	$BanDocMo=true;	break;
					}
					echo "Valor".$BanDocMo."<br>";
					//-----------------------------------------------------------  	
					//Donde se va a mostrar
					$DondAbri = ""; 
					switch( $VC13  ){
						case "N": $DondAbri = "No Mostra";	break;
						case "V": $DondAbri = "Vantana";	break;
						case "P": $DondAbri = "Pagina";		break;
					}
					$RutaArch = '/ExpeElectroni/'.$ClavAyun.'/PaguWeb/'.$VC04.'/'.$VC15.'/';
				?>
				<tr>
					<td><?=$VC06?></td>				<!--Cambiar-->
					<td><?=$VC07?></td>				<!--Cambiar-->
					<td><?=$VC08?></td>				<!--Cambiar-->
					<td>
					  <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'I')">
					   Doc</a>
					   <? if ( $VC09 != "") { ?> 
					   <a href="javascript:window.open('<?=$RutaArch.$VC09?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
					   Ver </a> 
					   <? } ?>
					</td>
					<td> <?=$DocuMost?></td>				 
					<td>*<?=$BanDocMo?>*
					 <? if ( $BanDocMo) { ?>		
					      <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'A')">Doc</a>
						  <? if ( $VC11 != "" ) { ?>
					    	 <a href="javascript:window.open('<?=$RutaArch.$VC10?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0"> ver</a>  
					<? 		 } 
						 } ?>
					</td>
					<td> <?=$DondAbri?></td>			 
					<!-- iconos dentro de la libreria font-awesome.min.css -->
					<td data-titulo="Eliminar: ">
					  <?php if($Baja == "A" && $VC16 == "I" ){ ?>
							<a href="LayNotTri.php?Param1=B&Param2=<?= $VC03?>" class="btn_delete">
							<i class="bi bi-trash-fill"></i>
						<?php } ?>
					</td>
					<td data-titulo="Editar: ">
						<?php if($Modi == "A"  && $VC16 == "I"){ ?>
							<a href="LayNotTri.php?Param1=M&Param2=<?= $VC03?>" class="btn_update">
							<i class="bi bi-pencil-fill"></i>
						<?php } ?>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>