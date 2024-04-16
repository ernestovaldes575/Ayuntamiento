<script src="../app.js"></script>

	<?php 
	include_once "Archivos/Files/fecha.php";
	require("Archivos/Conexiones/conlogin.php");

	if(isset($_POST['Ingresar'])){
		echo 'entrar';
		$usuario = htmlentities(addslashes($_POST["InputCla"]));
		$password = htmlentities(addslashes($_POST["InputCon"]));
		$InstSql = "SELECT AConsecut,AAyuntamiento,CAYDescripcion,". 
					"AUnidAdmi,CUNClaveUnidad,CUNDescripcion ". 
					"FROM atacceso ". 
					"inner Join acayuntamiento ON  CAYClave = AAyuntamiento ".
					"inner Join acunidades ON CUNConsecutivo = AUnidAdmi ".
					"WHERE AClaceAcce = '".$usuario."' AND ". 
							"AContAcce= '".$password."'";

		echo "1)<br>$InstSql<br>";
		$ResuSql = $con->prepare($InstSql);
		$ResuSql->execute();
		$result = $ResuSql->fetch();
		echo "2)<br>$InstSql<br>";
		if( $result ){
			$ConsUsua = $result['AConsecut'];
			$ClavAyun = $result['AAyuntamiento'];
			$DescAyun = $result['CAYDescripcion'];
			$ConsUnid = $result['AUnidAdmi'];
			$DescUnid = $result['CUNDescripcion'];
			$EjerTrab = $hoy['year'];

			$ArCookie = $ConsUsua.'|'.$ClavAyun.'|'.$DescAyun.'|'.$ConsUnid.'|'.$DescUnid.'|'.$EjerTrab.'|';
			setcookie("CEncaAcc", "$ArCookie");

			session_start();
			$_SESSION["usua"] = $result['AAyuntamiento'];

			$Nivel = 1;
			$ArCooki2 = $Nivel.'|||';
			setcookie("CMenu", "$ArCooki2");
			header("location: MenuIntranet.php");
			
		}else{
			echo 
				'<script>
					alert("No se encotraron registros\nVerifique que los datos sean correctos");
				</script>';
			header("location: Intranet.php");
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
