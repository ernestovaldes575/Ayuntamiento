<!DOCTYPE html>
<html lang="es">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facultades de área</title>
	<link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="/build/css/style.css">
	<link rel="stylesheet" href="css/spinner.css">
</head>
<script language="JavaScript" src="PWRegistro.js"></script>

<body> 
	<header class="shadow mb-4 bg-white">
	<?php 
   		//Varibales Globales
		include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
   		//Encabezado	
		require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaPrin.php'); 
	?> 
	</header>
	
	<?php 
		//Carga de la Informacion	
		$CRUD = "GET";
		include 'PWRegistroApi.php';	
		//echo "Valor CRUD: $CRUD";
	?>

		<!-- <caption>
			<?=	$DescTiSe?>
		</caption> -->
	<div class="container-sm bg-secondary p-4 shadow mb-5">
		<form id="PideDato" method="post" name="formulario" onsubmit="validarFormulario()" action="PWRegistroApi.php">
			<input type="hidden" name="C00" id="VN01" value="<?=$CRUD?>">
			<input type="hidden" name="C01" id="VN02" value="<?=$TipoMovi?>">
			<input type="hidden" name="C02" id="VN03" value="<?=$ConsBusq?>">
			<div class="mb-3 row">
				<div class="col-md-6">
					<label for="formGroupExampleInput" class="form-label fw-bold text-white">Titulo</label>
					<input type="text" class="form-control" id="formGroupExampleInput" 
					placeholder="Titulo">
				</div>
				<div class="col-md-6">
					<label for="formGroupExampleInput" class="form-label">Descripcion</label>
					<input type="text" class="form-control" id="formGroupExampleInput" 
					placeholder="Descripcion">
				</div>
			</div>
		</form>
	</div>

<div>
	<form id="PideDato" method="post" name="formulario" onsubmit="validarFormulario()" action="PWRegistroApi.php">
		<input type="hidden" name="C00" id="VN01" value="<?=$CRUD?>">
		<input type="hidden" name="C01" id="VN02" value="<?=$TipoMovi?>">
		<input type="hidden" name="C02" id="VN03" value="<?=$ConsBusq?>">

		<div class="contenedor-tabla">
			<div class="contenedor-tabla-sec">
			<table class="ListInfo01 tabla">
				<tr class="">
					<td scope="row" class="text-uppercase">
							Campo
					</td>
					<td>
						<a class="btn-Regresar container" href="PWRegistroList.php">
							Regresar
						</a>
					</td>
				</tr>	
				<tr>
					<th>Titulo</th>
					<td>
						<input id="VT03" type="text" name="C03" value="<?=$VC03?>"
						placeholder="Titulo" class="form-control">
					</td>
				</tr>	
				<tr>
					<th>Descripcion</th>
					<td>
					<!-- onkeyup="checaMensaje(this.value)" -->
						<input type="text" name="C04" value="<?=$VC04?>" class="form-control"
						placeholder="Descripción" id="VT04">
					</td>	  
				</tr>
				<?php if ( $TipoMovi != "A" ) { ?>	    
				<tr>
					<th>Imagen de la página</a></th>
					<td><!-- Ayuda imagen -->
						<div class="d-flex justify-content-between">
							<a href="javascript:window.open('PWAyuda.php?Ayuda01=S','','width=500,height=300,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
								<i class="bi bi-info-circle-fill text-danger fs-1"></i>
								<!-- <img src="/Intranet/ComSocial/Imagen/BtnInfo01.jpg" Title="Subir" width="25px" height="25px"/> -->
							</a>
							<!-- Subir imagen -->
							<a href="#" onclick="CarImgPa(<?= $ConsBusq?>,<?=$VC01?>,<?=$VC02?>,'I')">
							<i class="bi bi-file-arrow-up-fill text-dark fs-1"></i>
								<!-- <img src="/Intranet/ComSocial/Imagen/BtnSubiImag.jpg" 
								title="Subir Imagen de la Pagina"  width="25px" height="25px"/> -->
							</a>
							<!-- Visualizar Image -->
							<?php if ( $VC07 != '' ) { ?> 
							<a href="javascript:window.open('<?=$RutaArch.$VC07?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
								<i class="bi bi-eye-fill fs-1 text-success"></i>
								<!-- <img src="/Intranet/ComSocial/Imagen/BtnVisuImag.jpg">  -->
							<?php if ( $VC07 != '' ) echo "</a> "; } ?> 
						</div>
					</td>	
				</tr>
				<?php  } ?>      
				<tr>
					<th>Incio de la Publicacion</th>
					<td>
						<input type="date" id="VT05" name="C05" class="form-control"
						value="<?=$VC05?>" onkeyup="checaMensaje(this.value)">
					</td>
				</tr>	
				<tr>
					<th>Termino de la Publicacion</th>
					<td>
						<input type="date" id="VT06" name="C06" class="form-control" 
						value="<?=$VC06?>" onkeyup="checaMensaje(this.value)">
					</td>
				</tr>
				<tr>
					<th>Al dar clik se Mostrar</th>
					<td>
						<select name="C07" class="btn-Nuevo container">
							<?php 
								foreach($CataMoDo as $RegiTabl){ 
										$ClavCata = $RegiTabl[0];		
										$DescCata = $RegiTabl[1];  
										$Activo = ( $ClavCata == $VC08) ? "selected" : ""; ?>
								<option value="<?=$ClavCata?>" <?=$Activo?>>
									<?=$ClavCata?> <?=$DescCata?>
								</option>
							<?php  } ?>
						</select>
					</td>
				</tr>	
				<?php if ( $TipoMovi != "A" && ( $VC08 != 'N' && $VC08 != 'L' ) ) { ?>
				<tr>
					<th>Documento a mostrar <?=$VC08?> </th>
					<td><!-- Ayuda imagen -->
						<a href="javascript:window.open('PWAyuda.php?Ayuda02=S','','width=500,height=300,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
							<img src="/Intranet/ComSocial/Imagen/BtnInfo01.jpg" Title="Subir"/>
						</a>
						<!-- Subir imagen -->
						<a href="#" onclick="CargArchi(<?= $ConsBusq?>,<?=$VC01?>,<?=$VC02?>,'<?=$VC08?>')">
							<img src="/Intranet/ComSocial/Imagen/BtnSubiImag.jpg" title="Subir Imagen de la Pagina"/>
						</a>
						<!-- Visualizar Image -->
						<?php if ( $VC09 != '' ) { ?> 
						<a href="javascript:window.open('<?=$RutaArch.$VC09?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
							<img src="/Intranet/ComSocial/Imagen/BtnVisuImag.jpg"/> 
						<?php if ( $VC09 != '' ) echo "</a> "; } ?>  
					</td>	
				</tr>	
				<?php  }
				if ( $VC08 == 'L' ) {  ?>            
				<tr>
					<th>Liga</th>
					<td>
						<input type="text" name="C08" value="<?=$VC10?>" 
						onkeyup="checaMensaje(this.value)" placeholder="Liga">
					</td>
				</tr>	
				<?php } 
				if ( $VC08 != 'N') { ?>
				<tr>
					<th>Donde se visuzaliza documento</th>
					<td>
						<select name="C09" >
							<?php 
								foreach($CataDoVe as $RegiTabl){ 
										$ClavCata = $RegiTabl[0];		
										$DescCata = $RegiTabl[1];  
										$Activo = ( $ClavCata == $VC11) ? "selected" : ""; ?>
							<option value="<?=$ClavCata?>" <?=$Activo?>>
								<?=$ClavCata?> <?=$DescCata?>
							</option>
							<?php }?>
						</select>		
					</td>
				</tr>	
					<?php } if ( $TipoMovi != "A" ) { ?>
				<tr>
					<th>Seguimiento</th>
					<td	>
						<table >
							<tr>
								<td>
									<?php
										$BandMovi = false;
										$DescSegi = "Creación de Documento";
										switch ($EstaSegu){ 
											case "01": $DescSegi = "Creación de Documento";
														$BandMovi = true;break;
											case "02": $DescSegi="Enviar documento a Com. Social";
														$BandMovi = true;break;
											case "03": $DescSegi="Recepcin de Com Social";	
																			break;
											case "04": $DescSegi="Asignar SP ";				
																			break;
											case "05": $DescSegi="Enviar a Analisis";			
																			break;
											case "06": $DescSegi="Recibir para su Analisis";	
																			break;
											case "07": $DescSegi="Analisis";					
																			break;
											case "08": $DescSegi="Publicacion";				
																			break;
											case "09": $DescSegi="Cierre";					
																				break;
										}  
									?>
									<img src="/Intranet/PaginaWeb/Imagen/EstaSegu<?=$EstaSegu?>.gif" 
										title="<?=$DescSegi?>"/><?=$DescSegi?>
								</td>
								<td>
									<div class="d-flex justify-content-between text-center">
										<?php if ($BandMovi) { ?>
										<a href='PWEstado.php?ConsDocu=<?=$ConsBusq?>&CambSegu=01'> <?php } ?>
											<img src="/Intranet/PaginaWeb/Imagen/EstaSegu01.gif"
											title="Regresar a Creacion"/>
										<?php if ($BandMovi); ?>
											Creación del Documento	
										</a>	
										<?php if ($BandMovi) { ?>	
										<a href="PWEstado.php?ConsDocu=<?=$ConsBusq?>&CambSegu=02"> <?php } ?>
											<img src="/Intranet/PaginaWeb/Imagen/EstaSegu02.gif"title="Enviar a Comunicacion social"/>
										<?php if ($BandMovi);?>	  	
											Enviar a Com Social
										</a>
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr>	
				<?php } ?>	
				<tr>
					<td></td>
					<td>
					<?php if ( $EstaSegu == '01' ) { ?>
						<button type="submit" name="Enviar" placeholder="Registrar"
						value="<?=$MesnTiMo?>" class="btn-Submit container opacity-50" disabled>
							Registrar
						</button>
					<?php } ?>	
					</td>
				</tr>
			</table>
				<div class="visually-hidden">
					<div class="spinner">
						<div class="bounce1"></div>
						<div class="bounce2"></div>
						<div class="bounce3"></div>
					</div>
				</div>
			</div>
		</div>
	</form>	

	
</div>

	

	<script src="Formulario.js"></script>
</body>
</html>