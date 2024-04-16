
<?php 
  switch ($DatoList){
	case "01": //Catalogo del Ejercicio  ?>
			<select name="AAreaResp" onChange="CargEjer(this.value)">
			<?php foreach($CataEjer as $RegiTabl): 
						$ClavCata = $RegiTabl[0];		
						$DescCata = $RegiTabl[1];  
						$Activo = ( $ClavCata == $EjerTrab) ? "selected" : ""; ?>
				<option value="<?=$ClavCata?>" <?=$Activo?>> <?=$ClavCata?> </option>
			<?php  endforeach; ?>
			</select>
<?php	 break;
	case "02": //Catalogo de Estados ?>
			<select name="EstaDocu" onChange="CargEsta(this.value)">
			<?php 	foreach($CataEsta as $RegiTabl): 
							$ClavCata = $RegiTabl[0];		
							$DescCata = $RegiTabl[1];  
							$Activo = ( $ClavCata == $EstaRevi) ? "selected" : ""; ?>
					<option value="<?=$ClavCata?>" <?=$Activo?>> 
					<?=$ClavCata?> <?=$DescCata?> </option>
			<?php	endforeach;	?>
		</select>
<?php	 break;
	case "03": 
				//Datos de la lista
				$VC03=$RegiTabl['PConsecut'];	//LConsecut,
				$VC04=$RegiTabl['PEjercicio'];	//LEjercicio,
				$VC05=$RegiTabl['PMesRegi'];	//LMesRegi
		
				$VC06=$RegiTabl['PTitulo'];		//Titulo
				$VC07=$RegiTabl['PDescripcion'];//Descripcion
		
				$VC08=$RegiTabl['PFechPublI'];	//Fecha Inicial de Publicacion
				$VC09=$RegiTabl['PFechPublF'];	//Fecha Final de Publicacion
				$VC10=$RegiTabl['PFechaCier'];	//Fecha de Cierre 

				//Imagen que se visualiza en la pagina
				$VC11=$RegiTabl['ImagPagi'];	//Imagen de la Pagina

				//Al dar clik sobre la imagen que se va a mostra		
				$VC12=$RegiTabl['PDocuLiga'];	//Nada, Imagem, Archivo, Liga
				$VC13=$RegiTabl['Docume'];		//Doc Img pdf a mostrar
				$VC14=$RegiTabl['PLiga'];		//LAImagDocu

				//Dondes se va a mostrar la informacion
				$VC15=$RegiTabl['PVentRefe'];	//No se Muestra, Venana, Pagina
		
				$VC19=$RegiTabl['PEstaSegu'];	//Estado Publicacion
		
				//-----------------------------------------------------------
				//Documento a Mostrar
				$DocuMost = ""; $BanDocMo=0;
				switch( $VC12  ){
					case "N": $DocuMost = "No Mostrar Documento";	break;
					case "A": $DocuMost = "Mostrar Archivo";	$BanDocMo=1;	break;
					case "I": $DocuMost = "Mostrar Imagen";		$BanDocMo=1;	break;
					case "L": $DocuMost = "Enviar a una pagina";		break;
					}

				//-----------------------------------------------------------
				//Donde se va a mostrar
				$DondAbri = ""; 
				switch( $VC15 ){
					case "N": $DondAbri = "No se abrira documento";		break;
					case "V": $DondAbri = "Visualizar en una Ventana";	break;
					case "P": $DondAbri = "Visualizar en una Pagina";	break;
					}
				
				$RutaArch = "/ExpeElectroni/$ClavAyun/PaguWeb/$EjerTrab/$CarpTiDo/";
		break;
	} // switch ($DatoList){?>		
  <?php 

