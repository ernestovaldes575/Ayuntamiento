
<?php
//Bandera de visualizar msg
$CRUT = "GET1";
include 'ConacApi.php'; 
?>	
	<?php include '../ConacInic/Header.php'?>	
	<!--encabezado-->
	<main class="contenedor__main__principal">
		<div class="contenedor__main__secundario">
			<div class="contenedor__titulo">
				<h2>Gobierno Municipal 2022-2024</h2>
			</div>
			<div class="contenedor__titulo__secundario">
				<h1>Ayuntamiento de Zinacantepec 2023</h1>
			</div>
			<div class="contenedor__lista__conac">
				<ul>
					<li>Conac DIF</li>
					<li>Conac IMCUFIDEZ</li>
					<li>Conac OPDAPAS</li>
				</ul>
			</div>
			<div class="contenedor__ejercicio">
			<?php 
				foreach ($ListLaye as $RegiTabl): 
				$VC03=$RegiTabl[0];		//LConsecut,,,
			?>
				<a href="PeriodoLista.php?Param1=<?=$VC03?>">
					<?=$VC03?>
				</a>
			<?php endforeach ?>
			</div>
		</div>
	</main>