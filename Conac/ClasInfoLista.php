
<?php
$CRUT = "GET3";
include 'ConacApi.php'; 
?>	
	<?php include '../ConacInic/Header.php'?>
	<!--encabezado-->
	<div class="tabla">
		<div class="titulo">
            <h2>CONAC-<?=$EjerTrab?><a href="EjerLista.php">/Ejercicio/</a><a href="PeriodoLista.php">Periodo</a>/Clasificacion</br>
				
			</h2>
		</div>
			<div class="botones">
				<div class="lista">

				</div>
				
			<a href="PeriodoLista.php" class="regresar">
				Regresar
			</a>		
		</div>
		<table class="table">
			<tr	class="head">
				<td>Clasificacion</td>				<!--Cambiar-->
			</tr>
		<?php 
		foreach ($ListLaye as $RegiTabl): 
			$VC03=$RegiTabl[0];
            $VC04=$RegiTabl[1];		
			
		?>
				<tr class="body">
					<td><?=$VC03?></td><!--Cambiar-->	
                    <td><?=$VC04?></td>
					</td>
					<td data-titulo="Editar: ">
						
							<button style=
							"font-size:.7em; background-color: blue; 
							padding:.5em; margin-top:.3em; border-radius:1em; 
							cursor:pointer; color:aliceblue;
							text-transform:uppercase " class='Modi' data-id='<?= $VC03?>'>
								<i class="bi bi-pencil-square"></i>
								<a href="Conac.php?Param3=<?=$VC03?>">
									Modifica
								</a>
							</button>
					</td>
				</tr>
				<?php endforeach ?>
		</table>

		<script>
		</script>
	<?php
	?>
	</div>

</body>
</html>