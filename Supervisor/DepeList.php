<?php include '../EstrPagi/EncaPrin.php'?>
<?php include '../EstrPagi/Menu.php'?>

<div class="contenedor__layer">
        <div class="swiper" id="swiper-1">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="/img/layer/1.png" alt="">
                </div>
            </div>
        </div>        
</div> 

<?php
  include('DepeListInic.php');	//Carga Informacion
  echo("Valor tabla $InfoTabl_json <br>");
  $DecoTabl = json_decode($InfoTabl_json);
    echo("valor json DecoTabl <br>");
?>

<!-- Mostrar la tabla HTML con los botones -->
<table border='1'>
    <thead>
        <tr style="background-color: #D6D6D6;">
                <th>Clave</th>
                <th>Descripcion</th>
                <th>Consulta</th>
            </tr>
    </thead>
    <tbody>
<?php
  echo('entra');
  if(!empty($DecoTabl)) {
    foreach ($DecoTabl as $RegiTabl) { 
		$ConsUnid = $RegiTabl['SUnidad']   ?>
        <tr> 
          <td><?=$RegiTabl['CUNClaveUnidad']?></td>
          <td><?=$RegiTabl['CUNDescripcion']?></td>
          <td><a href="DepeListCons.php?Param1=<?= $ConsUnid?>" >Ver</a></td>
        </tr>
    <?php
    }
  } 
?>

</tbody>
</table>

</body>
</html>