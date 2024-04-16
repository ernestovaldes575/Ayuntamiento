
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
	case "03": //Datos de la lista
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
				$VC13=$RegiTabl[10];	//LAbrirLiDoIm
				$VC14=$RegiTabl[11];	//LAImagDocu
				$VC15=$RegiTabl[12];	//LLiga
		
				$VC16=$RegiTabl[13];	//LVentRefe
				$VC17=$RegiTabl[14];	//CTDCarpeta
		
				//Creacion	
				$EC18 = "01"; $DC18= "Creacion"; 
				$VC18 = $RegiTabl[15];	//Esta Revi
				switch ($VC18 )
				{ case "C": $EC18="01"; $DC18= "Creacion"; break; //Creacion
				  case "E": $EC18="02"; $DC18= "Envio"; break;//Envio
				}
				
				//Revision
				$EC19 = "03"; $DC19="Pendiente";
				$VC19=$RegiTabl[16];	//EstaAuto
				switch ($VC19 )
				{ case "P": $EC19="03"; $DC19="Pendiente"; break;	//Pendiente
				  case "R": $EC19="04"; $DC19="Recepcion"; break;	//Recepcion 
				  case "A": $EC19="05"; $DC19="Asiganar SP"; break;	//Asinacion a SP 
				}
		
				//Publicacion
				$EC20 = "06"; $DC20="Pendiente";
				$VC20=$RegiTabl[17];	//Esta Publi
				switch ($VC20 )
				{ case "P": $EC20="06"; $DC20="Pendiente"; break; //Pendiente
				  case "A": $EC20="07"; $DC20="Analisis"; break; //Analisi
				  case "U": $EC20="08"; $DC20="Publicacion"; break; //Publicacion
				}
		
				$VC21=$RegiTabl[18];	//Esta Seguimiento
		
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
		break;
	} // switch ($DatoList){?>		
  <?php 

