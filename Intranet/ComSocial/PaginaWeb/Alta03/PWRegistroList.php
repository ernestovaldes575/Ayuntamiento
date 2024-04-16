<!DOCTYPE html>
<html lang="es">
<?php include ($_SERVER['DOCUMENT_ROOT'].'/Intranet/Includes/Header.php')?>
<script language="JavaScript" src="PWRegistro.js"></script>
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
$EjecInst = '$EstaRev'.$EstaRevi.'= "checked"; '; 
eval($EjecInst );

$CRUT = "GET";
include 'PWRegistroApi.php';
?>	
	<!--encabezado-->

	<div class="tabla">
		<div class="titulo"><h2><?=$DescTiSe ?> / <?=$DescOpSe ?></h2></div>
		<div class="botones">
			<div class="lista">
				<select name="AAreaResp" onChange="CargaEjercicio(this.value)" class="AAreaResp">
					<?php 
					foreach($CataEjer as $RegiTabl): 
						$ClavCata = $RegiTabl[0];		
						$DescCata = $RegiTabl[1];  
						$Activo = ( $ClavCata == $EjerTrab) ? "selected" : ""; 
						?>
						<option value="<?=$ClavCata?>" <?=$Activo?>> <?=$ClavCata?> </option>
						<?php	
					endforeach;
					?>
				</select>
			</div>
			
			<input type="checkbox" name="C06" value="I" onChange="CargaEsta('I')" <?=$EstaRevI?>>
			Propuesta&nbsp;&nbsp; 
			<input type="checkbox" name="C06" value="R" onChange="CargaEsta('R')" <?=$EstaRevR?>> Revision&nbsp;&nbsp;
			<input type="checkbox" name="C06" value="P" onChange="CargaEsta('P')" <?=$EstaRevP?>> Publicación &nbsp;&nbsp;
			<input type="checkbox" name="C06" value="T" onChange="CargaEsta('T')" <?=$EstaRevT?>> Termino de la Publicacion

			<?php 
			  if($Alta == "A"){ ?>
				<button class='Nuev'>+Nuevo</button>
			<?php } ?>

			<a href="/Intranet/menuintranet.php" class="regresar">Regresar</a>		
		</div>

		<table>
				<tr>
					<td>Titulo</td>				<!--Cambiar-->
					<td>Descripcion</td>		<!--Cambiar-->
					<td>Fecha </td>	<!--Cambiar-->
					<td>Imagen Pag</td>
					<td>Doc. Mostrar</td>
					<td>Arch/Imag</td>
					<td>Donde Mostrar</td>
					<td>Eliminar</td>	
					<td>Editar</td>
				</tr>
			<?php 
			foreach ($ListLaye as $RegiTabl): 
			    $VC03=$RegiTabl[0];		//LConsecut,,,
				$VC04=$RegiTabl[1];		//LEjercicio,
				$VC05=$RegiTabl[2];		//LMesRegi,

			    $VC06=$RegiTabl[3];		//LTitulo,
			    $VC07=$RegiTabl[4];		//LDescripcion
				$VC08=$RegiTabl[5];		//LFechAlta

			    $VC09=$RegiTabl[6];		//-->LImagen

			    $VC10=$RegiTabl[7];		//-->LAbrirLiDoIm
				$VC11=$RegiTabl[8];		//LAImagDocu

				$VC12=$RegiTabl[9];		//LLiga
				$VC13=$RegiTabl[10];	//LVentRefe
				$VC14=$RegiTabl[11]; 	//LSenaSord

			    $VC15=$RegiTabl[12];	//CTDCarpeta
				$VC16=$RegiTabl[13];	//LEstaSegu
				//Mostrar documento
				$DocuMost = ""; $BanDocMo=0;
				switch( $VC10  ){
					case "N": $DocuMost = "No Mostrar";	break;
					case "I": $DocuMost = "Imagen";		$BanDocMo=1;	break;
					case "L": $DocuMost = "Liga";		break;
					case "A": $DocuMost = "Archivo";	$BanDocMo=1;	break;
				}

				//echo "Valor".$BanDocMo."<br>";
				//-----------------------------------------------------------  	
				//Donde se va a mostrar
				$DondAbri = ""; 
				switch( $VC13 ){
					case "N": $DondAbri = "No Mostra";	break;
					case "V": $DondAbri = "Ventana";	break;
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
					   <?php if ( $VC09 != '' ) { ?> 
					   <a href="javascript:window.open('<?=$RutaArch.$VC09?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
					   Ver </a> 
					   <?php  } ?>
					</td>
					<td> <?=$DocuMost?></td>				 
					<td>
					<?php if ( $BanDocMo == 1) { ?>		
					      <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'A')">Doc</a>
					<?php if ( $VC11 != '' ) { ?>
					    	 <a href="javascript:window.open('<?=$RutaArch.$VC12?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0"> ver</a>  
					<?php     } 
						 } ?>
					</td>
					<td> <?=$DondAbri?></td>	
							 
					<!-- iconos dentro de la libreria font-awesome.min.css -->
					<td data-titulo="Eliminar: " >
					  <?php if($Baja == "A" && $VC16 == "I" ){ ?>
							<button class='Elim' data-id='<?= $VC03?>' style="cursor: pointer;" class="flex-1 shadow-2xl bg-gray-800 text-white flex justify-center gap-2 items-center p-3 focus:bg-red-500">
							<i class="bi bi-eraser-fill" title="Eliminar"></i> 	
							Eliminar</button>
					  <?php } ?>
					</td>
					<td data-titulo="Editar: ">
						<?php if($Modi == "A"  && $VC16 == "I"){ ?>
							<button class='Modi' data-id='<?= $VC03?>' style="cursor: pointer" class="flex-1 shadow-2xl transition-all opacity-50 bg-green-500 text-white flex justify-center gap-2 items-center p-3 focus:bg-black">
							<i class="bi bi-pencil-square" title="Modificar"></i>
							Modificar</button>
						<?php } ?>
					</td>
				</tr>
				<?php endforeach ?>
		</table>
		<script> 
		</script>
	</div>
</body>
</html>