
<?php
$CRUT = "GET2";
include 'ConacApi.php'; 
?>	
	<?php include '../ConacInic/Header.php'?>
	<!--encabezado-->
	<main class="contenedor__main__principal">
		<div class="contenedor__main__secundario">
			<div class="contenedor__titulo">
				<h2>
					CONAC Periodo <?=$EjerTrab?>
				</h2>
			</div>
			<div class="contenedor__ejercicio">
			<?php 
				foreach ($ListLaye as $RegiTabl): 
					$VC03=$RegiTabl[0]; 
					$VC04=$RegiTabl[1];	
			?>
			<a href="ClasInfoLista.php?Param2=<?=$VC03?>">
				<?=$VC03?> <?=$VC04?>
			</a>
			<?php endforeach ?>
			</div>
		</div>
	</main>