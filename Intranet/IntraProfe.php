<script src="../app.js"></script>

	<?php 
	include_once "Archivos/Files/fecha.php";
	require("Archivos/Conexiones/ConeEscuela.php");

	if(isset($_POST['Ingresar'])){
		$NumeProf = htmlentities(addslashes($_POST["InputCla"]));
		$ClavMate = htmlentities(addslashes($_POST["InputCon"]));

		$InstSql = "SELECT PConsecutivo,PNumeEmplea,PNombre ". 
				   "FROM   ctprofesor ". 
				   "WHERE PNumeEmplea = '$NumeProf' ";
		$ResuSql = $con->prepare($InstSql);
		$ResuSql->execute();
		$result = $ResuSql->fetch();
		if( $result ){
			$ConsProf = $result['PConsecutivo'];
			$NombProf = $result['PNombre'];
			
			$EjerTrab = $hoy['year'];

			$InstSql = "SELECT MConsecutivo,MDescripcion ". 
					   "FROM   ctmateria ". 
					   "WHERE MClave = '$ClavMate' ";
			$ResuSql = $con->prepare($InstSql);
			$ResuSql->execute();
			$result = $ResuSql->fetch();
			if( $result ){
				$ConsMate = $result['MConsecutivo'];
				$DescMate = $result['MDescripcion'];
			}	
			
			setcookie("CEncaAcc", "$ArCookie",time() -60);
			$ArCookie = $ConsProf.'|'.$NumeProf.'|'.$NombProf.'|'.
						$ConsMate.'|'.$ClavMate.'|'.$DescMate.'|'.
						$EjerTrab.'|';
			setcookie("CEncaAcc", "$ArCookie",time() + (60*60*60),'/');

			$Nivel = 1;
			$ArCooki2 = $Nivel.'|||';
			setcookie("CMenu", "$ArCooki2");
			header("location: MenuProfe.php");			
		}else{
			echo 
				'<script>
					alert("No se encotraron registros\nVerifique que los datos sean correctos");
				</script>';
			header("location: IntraProfe.php");
		}
	}
	
	?>
	<!--Formulario de login-->
<?php include 'Includes/Header.php'?>

<div class="contenedor">
	<form class="form" method="post" name="formulario" onsubmit="return validarl(this)">
		<img class="img-3" src="http://201.122.44.34/img/SIMGAMod.jpg" alt="">
		<input class="clave" type="text" placeholder="Digita Clave" name="InputCla" />
		<input class="password" type="password" placeholder="Digita Contraseña" name="InputCon" />
		<!-- <input type="submit" name="Ingresar" class="ingresar" value="Ingresar" > -->
		<button type="submit" name="Ingresar" class="ingresar" value="Ingresar" >
			Ingresar
		</button>
				<!-- <a href="../index.php">Salir</a> -->
	</form>
</div>


<?php include 'Includes/Footer.php'?>
