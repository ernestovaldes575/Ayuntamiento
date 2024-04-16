<!DOCTYPE html>
<html>
<body class=""> 
<?php include '../EstrPagi/HeadGene.php'?>
<body class=""> 
<?php include '../EstrPagi/EncaGene.php'?>

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
  include('SupeListInic.php');	//Carga Informacion
?>

<!-- Mostrar la tabla HTML con los botones -->
<table border='1'>
    <thead>
        <tr style="background-color: #D6D6D6;">
                <th>No Empleado</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <td><a href="DepeList.php" > Regresar </a></td>
            </tr>
    </thead>
    <tbody>
<?php
if (!empty($InfoTabl)) {
    foreach ($InfoTabl as $RegiTabl) { 
		  $ConsServ = $RegiTabl['SConsecut']   ?>
        <tr> 
          <td><?=$RegiTabl['SNumeEmpl']?></td>
          <td><?=$RegiTabl['SServPubli']?></td>
          <td><?=$RegiTabl['SCategoria']?></td>
          <td><a href="Superv04.php?Param1=<?= $ConsServ?>" class="btn_update">
						 Ver
						</a></td>
        </tr>
<?php    }
} ?>

  </tbody>
 </table>

</body>
</html>