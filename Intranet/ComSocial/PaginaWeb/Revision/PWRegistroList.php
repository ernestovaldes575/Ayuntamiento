<!DOCTYPE html>
<html lang="es">
<style>
  .tb { border-collapse: collapse; width:300px; }
  .tb th, .tb td { padding: 5px; border: solid 1px #777; }
  .tb th { background-color: lightblue; }
</style>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/Intranet/Includes/Header.php')?>

<script language="JavaScript" >
//-------------------------------------------------------------------------
//Funcion de alta 
document.addEventListener('click', 
function (event) { 
  if (event.target.classList.contains('Nuev')) {
        // Redirigir a la página de modificación
        window.location.href = 'PWRegistro.php?PaAMB01=A&PaAMB02=0';
    }
  else if (event.target.classList.contains('Modi')) {
     // Botón de Modificar presionado
     const id = event.target.getAttribute('data-id');
     // Redirigir a la página de modificación con el ID
     window.location.href = 'PWRegistro.php?PaAMB01=M&PaAMB02=' + id;
    } 
 else if (event.target.classList.contains('Elim')) {
    // Botón de Modificar presionado
    const id = event.target.getAttribute('data-id');
    // Redirigir a la página de modificación con el ID
    if (confirm('¿Estás seguro de que deseas eliminar el registro?')) 
      { window.location.href = 'PWRegistro.php?PaAMB01=B&PaAMB02=' + id; }
 }    
});

//-------------------------------------------------------------------------
function CargEjer(Param)
{ location.href = "PWRegistroList.php?Param1="+Param; }

function CargaEsta(Param)
{ location.href = "PWRegistroList.php?Param2="+Param; }

function CargImag(Param1,Param2,Param3,Param4)
{ Ruta = "ImgPagSubiArch.php?Param1="+Param1+
							"&Param2="+Param2+
							"&Param3="+Param3+
							"&Param4="+Param4; 
  Dime = "width=450 height=350 top=10 left=10 scrollbars";
  Cata = window.open(Ruta,"Carga documento",Dime);
}
</script>
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
$EjecInst = "\$EstaRev$EstaRevi= 'checked'; "; 
//echo $EjecInst;
eval($EjecInst );

$CRUT = "GET";
include 'PWRegistroApi.php';
?>	
<!--encabezado-->
<table class="tb">
  <tr>
	<td>
		<select name="AAreaResp" onChange="CargEjer(this.value)">
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
	</td>
	<td colspan="10">
		<input type="checkbox" name="C06" value="I" onChange="CargaEsta('I')" <?=$EstaRevI?>> Propuesta&nbsp;&nbsp; 
		<input type="checkbox" name="C06" value="R" onChange="CargaEsta('R')" <?=$EstaRevR?>> Revision&nbsp;&nbsp;
		<input type="checkbox" name="C06" value="P" onChange="CargaEsta('P')" <?=$EstaRevP?>> Publicación &nbsp;&nbsp;
		<input type="checkbox" name="C06" value="T" onChange="CargaEsta('T')" <?=$EstaRevT?>> Termino de la Publicacion
	</td>
	<td>
	<?php 
		if ($Alta == "A"){ ?>
		  <button class='Nuev' data-id='0' 
			style="cursor: pointer; background-color:#40826D; border-color:blue; color:white; border-radius: 5px;" 
			class="flex-1 shadow-2xl transition-all opacity-50 bg-green-500 text-white flex justify-center gap-2 items-center p-3 focus:bg-black"
			onMouseOver="this.style.background='#49B675';" onMouseOut="this.style.background = '#40826D ';">
		  +Nuevo</a>
	<?php } ?>	
	</td>
	<td>
		<a href="/Intranet/menuintranet.php" class="regresar">Regresar</a>
	</td>
  </tr>
  <tr>
    <th>Titulo</th>
    <th>Descripción</th>
    <th>Inic Publ </th>
    <th>Term Publ </th>
    <th>Conc Publ</th>
    <th colspan="2">
	  Img Pagina
	  <a href="javascript:window.open('PWAyuda.php?Ayuda01=S','','width=500,height=300,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
	  <img src="/Intranet/ComSocial/Imagen/BtnInfo01.jpg" Title="Subir" width="25px" height="25px"/>
	</th>
	<th colspan="3">
	  Doc Mostrar
	  <a href="javascript:window.open('PWAyuda.php?Ayuda02=S','','width=500,height=600,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
	  <img src="/Intranet/ComSocial/Imagen/BtnInfo02.jpg" Title="Subir" width="25px" height="25px"/>
	</th>
	<th>
	Vis. Inf.
	<a href="javascript:window.open('PWAyuda.php?Ayuda03=S','','width=500,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
	  <img src="/Intranet/ComSocial/Imagen/BtnInfo03.jpg" Title="Subir" width="25px" height="25px"/>
    </th>
	<th  colspan="2">Revisa</th>
	<th></th>
	<th></th>
  </tr>
  <?php 
	foreach ($ResuSql as $RegiTabl): 
		$VC03=$RegiTabl[0];		//LConsecut,
		$VC04=$RegiTabl[1];		//LEjercicio,
		$VC05=$RegiTabl[2];		//LMesRegi

		$VC06=$RegiTabl[3];		//LTitulo
		$VC07=$RegiTabl[4];		//LDescripcion,

		$VC08=$RegiTabl[5];		//LFechPublI,
	    $VC09=$RegiTabl[6];		//LFechPublF,
	    $VC10=$RegiTabl[7];		//LFechaCier

		$VC11=$RegiTabl[8];		//LEstaSegu

		$VC12=$RegiTabl[9];		//LImagen
	    $VC13=$RegiTabl[10];		//LAbrirLiDoIm
	    $VC14=$RegiTabl[11];	//LAImagDocu
		$VC15=$RegiTabl[12];	//LLiga

		$VC16=$RegiTabl[13];	//LVentRefe
		$VC17=$RegiTabl[14];	//CTDCarpeta


		$EstaRevi = $RegiTabl[17];	//CTDCarpeta

		//Mostrar documento
		$DocuMost = ""; $BanDocMo=0;
		switch( $VC13  ){
			case "N": $DocuMost = "No Mostrar";	break;
			case "I": $DocuMost = "Imagen";		$BanDocMo=1;	break;
			case "L": $DocuMost = "Liga";		break;
			case "A": $DocuMost = "Archivo";	$BanDocMo=1;	break;
			}

		//echo "Valor".$BanDocMo."<br>";
		//-----------------------------------------------------------  	
		//Donde se va a mostrar
		$DondAbri = ""; 
		switch( $VC16 ){
			case "N": $DondAbri = "No Mostra";	break;
			case "V": $DondAbri = "Ventana";	break;
			case "P": $DondAbri = "Pagina";		break;
			}
		$RutaArch = '/ExpeElectroni/'.$ClavAyun.'/PaguWeb/'.$EjerTrab.'/'.$VC17.'/';
	?>

  <tr>
    <td><?=$VC06?></td>
    <td><?=$VC07?></td>
    <td><?=$VC08?></td>
    <td><?=$VC09?></td>
    <td><?=$VC10?></td>
	<!-- Imagen de la paguina -->
    <td>
	  <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'I')">
	  <img src="/Intranet/ComSocial/Imagen/BtnSubiImag.jpg" title="Subir Imagen de la Pagina"  width="25px"
  height="25px"/></a>
	</td>
	<td>
	  <?php if ( $VC12 != '' ) { ?> 
	    <a href="javascript:window.open('<?=$RutaArch.$VC12?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
		<img src="/Intranet/ComSocial/Imagen/BtnVisuImag.jpg"  width="25px"
  height="25px"/> </a> 
	  <?php  } ?>
	</td>
	<!-- Documento a Visualiza Img, Liga Archivo-->
	<td>
	  <img src="/Intranet/ComSocial/Imagen/BtnTipo<?=$VC13?>.png" width="25px"
  height="25px" title="Documento a Mostrar: <?=$DocuMost?>"/>	
	</td>
	<td>
	<?php if ( $VC13 != 'N' ) { ?> 
	  <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'<?=$VC13?>')">
	  <img src="/Intranet/ComSocial/Imagen/BtnSubiImag.jpg" Title="Subir <?=$DocuMost?>" width="25px" height="25px"/>
      </a>
	 <?php } ?>	
	</td>	
	<td>
	 <?php if ( $VC13 != 'N'  && $VC14 != '' ) { ?> 
	    <a href="javascript:window.open('<?=$RutaArch.$VC14?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
		<img src="/Intranet/ComSocial/Imagen/BtnVisuImag.jpg"  width="25px"
  height="25px"/> </a> 
	  <?php  } ?>
	</td>
	<!-- como se Visualiza -->
	<td>
	  <img src="/Intranet/ComSocial/Imagen/BtnMost<?=$VC16?>.png" width="25px"
  height="25px" title="Mostrar en: <?=$DondAbri?>"/>
	</td>
	<!-- Revisa -->	
	<td>
	 <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'<?=$VC13?>')">
	  <img src="/Intranet/ComSocial/Imagen/BtnSubiImag.jpg" Title="Subir <?=$DocuMost?>" width="25px" height="25px"/>
     </a>
	</td>
	<td>X</td>	
	<!-- iconos dentro de la libreria font-awesome.min.css -->
	<td data-titulo="Eliminar: " >
	  <?php if($Baja == "A" && $VC11 == "I" ){ ?>
			<button class='Elim' data-id='<?= $VC03?>' 
			style="cursor: pointer; background-color:#820000 ; border-color:blue; color:white; border-radius: 8px;" 
			class="flex-1 shadow-2xl bg-gray-800 text-white flex justify-center gap-2 items-center p-3 focus:bg-red-500"
			onMouseOver="this.style.background='#E21313';" onMouseOut="this.style.background = '#820000 ';"
			> Eliminar </button>
	  <?php } ?>
	</td>
	<td data-titulo="Editar: ">
		<?php if($Modi == "A"  && $VC11 == "I"){ ?>
			<button class='Modi' data-id='<?= $VC03?>' 
			style="cursor: pointer; background-color:#EB6320; border-color:blue; color:white; border-radius: 5px;" 
			class="flex-1 shadow-2xl transition-all opacity-50 bg-green-500 text-white flex justify-center gap-2 items-center p-3 focus:bg-black"
			onMouseOver="this.style.background='#FF8000';" onMouseOut="this.style.background = '#EB6320';">
			
			 Modificar </button></a>
		<?php } ?>
	</td>
  </tr>
  <?php	endforeach; ?> 
</table>

	<div class="tabla">
		<div class="titulo">
			  <h2><?=$DescTiSe ?> / <?=$DescOpSe ?> <?=$EjerTrab?></h2></div>
		<div class="botones">
			<div class="lista">
				<select name="AAreaResp" onChange="CargEjer(this.value)" class="AAreaResp">
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
				<button class='Nuev' style="cursor: pointer" class="flex-1 shadow-2xl transition-all opacity-50 bg-green-500 text-white flex justify-center gap-2 items-center p-3 focus:bg-black">
							<i class="bi bi-pencil-square" title="Modificar"></i>
							<a href="PWRegistro.php?PaAMB01=A&PaAMB02=0">
							+Nuevo</a></button>
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
			foreach ($ResuSql as $RegiTabl): 
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
							<img src="/Intranet/ComSocial/Imagen/BtnABC_M.gif" width="200" height="20" />
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