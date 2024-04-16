<script src="../app.js"></script>

	<?php 
	include_once "Archivos/Files/fecha.php";
	require("Archivos/Conexiones/ConeEscuela.php");

	if(isset($_POST['Ingresar'])){
		$BandQuer = true; 
		$MatrAlum = htmlentities(addslashes($_POST["InputCla"]));
		$ClavMate = htmlentities(addslashes($_POST["InputCon"]));

		$InstSql = "SELECT MPAConsMaPr,MConsecutivo,MDescripcion,". 
						  "PConsecutivo,PNombre,". 
						  "AConsecutivo,ANombre ".
				   "FROM cdmatprofalu ". 
				   "inner Join CDMateProf ON MPAConsMaPr = MPConsecutivo ANd MPProfesor = 1 ". 
				   "Inner JOIN CTMateria ON MConsecutivo = MPMateria AND Mclave = '$ClavMate' ". 
				   "Inner Join ctalumno ON MPAConsAlum = AConsecutivo AND AMatricula = '$MatrAlum' ".  
				   "Inner Join ctprofesor ON PConsecutivo = MPProfesor  AND PConsecutivo = 1 ";
		if ($BandQuer)echo "1) <br>".$InstSql."<br>";
		$ResuSql = $con->prepare($InstSql);
		$ResuSql->execute();
		$result = $ResuSql->fetch();
		if( $result ){
			$ConsAlum = $result['AConsecutivo'];
			$NombAlum = $result['ANombre'];

			$ConsMate = $result['MConsecutivo'];
			$NombMate = $result['MDescripcion'];

			$ConsProf = $result['PConsecutivo'];
			$NombProf = $result['PNombre'];

			$ConsMaPr = $result['MPAConsMaPr'];	

			$EjerTrab = $hoy['year'];


			$ArCookie = $ConsAlum.'|'.$MatrAlum.'|'.$NombAlum.'|'.
						$ConsMate.'|'.$ClavMate.'|'.$NombMate.'|'.
						$ConsProf.'|'.$NombProf.'|'.$ConsMaPr.'|';
			setcookie("CEncaAcc", "$ArCookie");

			$Nivel = 1;
			$ArCooki2 = $Nivel.'|||';
			setcookie("CMenu", "$ArCooki2");
			header("location: MenuAlum.php");			
		}else{
			echo 
				'<script>
					alert("No se encotraron registros\nVerifique que los datos sean correctos");
				</script>';
			header("location: IntraAlumno.php");
		}
	}
	
	?>
	<!--Formulario de login-->
<?php include 'Includes/Header.php'?>

<div class="contenedor">
	<form class="form" method="post" name="formulario" onsubmit="return validarl(this)">
		<img class="img-3" src="http://201.122.44.34/img/SIMGAMod.jpg" alt="">
		<input class="clave" type="text" placeholder="Digitar Matricula" name="InputCla" />
		<input class="password" type="password" placeholder="Digita materia" name="InputCon" />
		<!-- <input type="submit" name="Ingresar" class="ingresar" value="Ingresar" > -->
		<button type="submit" name="Ingresar" class="ingresar" value="Ingresar" >
			Ingresar
		</button>
				<!-- <a href="../index.php">Salir</a> -->
	</form>
</div>


<?php include 'Includes/Footer.php'?>
