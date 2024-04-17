<?php

require 'funciones.php';

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>  
      <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>  

    <?php
   
    $csslibs=["menu"=>"y","pie"=>"y","normatividad"=>"y","conac"=>"y"];
   printCSSlibs($csslibs);

 
    
    ?>
 
</head>
<body>

<?php //require 'menu.php';?> 
<div class="max_titulo">
<h1>Sistema de Recursos Federales Transferidos (SRFT)</h1>
</div>

<div class="tab" id="sfrt2022">

	<ul>
		<li><a href="#sfrt-1-2022">1er Trimestre</a></li>
		<li><a href="#sfrt-2-2022">2do Trimestre</a></li>
	</ul>

	<div id="sfrt-1-2022">
		<ul class="lista_conac">           
			<li class="list-group-item"><a class="titulos" href="../CONAC/2023/1T/5 SISTEMA DE RECURSOS FEDERALES TRANSFERIDOS/EJERCICIO DEL GASTO.pdf">1.-EJERCICIO DEL GASTO 1ER TIM 2023 FISM Y FORTAMUN.pdf</a></li>
			<li class="list-group-item"><a class="titulos" href="../CONAC/2023/1T/5 SISTEMA DE RECURSOS FEDERALES TRANSFERIDOS/INDICADORES.pdf">2.-INDICADORES 1ER TRIM 2023 FISM Y FORTAMUN.</a></li>
			<li class="list-group-item"><a class="titulos" href="../CONAC/2023/1T/5 SISTEMA DE RECURSOS FEDERALES TRANSFERIDOS/DESTINO DEL GASTO.pdf">3.-DESTINO DEL GASTO 1ER TRIMESTRE 2023 FISM.</a></li>			            
		</ul>
	</div>
	
	<div id="sfrt-2-2022">
		<ul class="lista_conac">           
			<li class="list-group-item"><a class="titulos" href="../CONAC/2023/2T/5 SISTEMA DE RECURSOS FEDERALES TRANSFERIDOS/INDICADORES 2DO TRIMESTRE 2023 VALIDADO.pdf">1.- INDICADORES.</a></li>
			<li class="list-group-item"><a class="titulos" href="../CONAC/2023/2T/5 SISTEMA DE RECURSOS FEDERALES TRANSFERIDOS/EJERCICIO DEL GASTO 2DO TRIM 2023 VALIDADO.pdf">2.- EJERCICIO DEL GASTO.</a></li>
			<li class="list-group-item"><a class="titulos" href="../CONAC/2023/2T/5 SISTEMA DE RECURSOS FEDERALES TRANSFERIDOS/DESTINO DEL GASTO 2DO TRIM 2023 VALIDADO.pdf">3.- DESTINO DEL GASTO.</a></li>			            
		</ul>
	</div>
	
</div>




<div class="tab" id="sfrt2021">

  <ul>
    <li><a href="#sfrt-1-2021">1er Trimestre</a></li>
    <li><a href="#sfrt-2-2021">2do Trimestre</a></li>
    <li><a href="#sfrt-3-2021">3er Trimestre</a></li>
    <li><a href="#sfrt-4-2021">4to Trimestre</a></li>

    <li><a href="#sfrt-cierre">Cierre 2021</a></li>
  </ul>
  <div id="sfrt-1-2021">
  <ul class="lista_conac">
            <li class="list-group-item"><a class="titulos" href="../CONAC/2022/SRFT/EJERCICIO DEL GASTO 1ER TIM 2022 FISM Y FORTAMUN.pdf">1.- EJERCICIO DEL GASTO 1ER TIM 2022 FISM Y FORTAMUN.</a></li>
            <li class="list-group-item"><a class="titulos" href="../CONAC/2022/SRFT/INDICADORES 1ER TRIM 2022 FISM Y FORTAMUN.pdf">2.- INDICADORES 1ER TRIM 2022 FISM Y FORTAMUN.</a></li>
			 <li class="list-group-item"><a class="titulos" href="../CONAC/2022/SRFT/DESTINO DEL GASTO 1ER TIM 2022 FISM.pdf">3.- DESTINO DEL GASTO 1ER TRIMESTRE 2022 FISM.</a></li>
			
            
		 </ul>

  </div>
  <div id="sfrt-2-2021">
  <ul class="lista_conac">
            <li class="list-group-item"><a class="titulos" href="../CONAC/2022/2T/SRFT/1. EJERCICIO DEL GASTO 2DO TRIMESTRE 2022 VALIDADO.pdf">1.-EJERCICIO DEL GASTO 2DO TIM 2022 FISM Y FORTAMUN.</a></li>
            <li class="list-group-item"><a class="titulos" href="../CONAC/2022/2T/SRFT/2. INDICADORES 2DO TRIMESTRE 2022 VALIDADOS.pdf">2. INDICADORES 2DO TRIMESTRE 2022 VALIDADOS.</a></li>
			 <li class="list-group-item"><a class="titulos" href="../CONAC/2022/2T/SRFT/3. DESTINO DEL GASTO 2DO TRIMESTRE 2022 (1).pdf">3.-DESTINO DEL GASTO 2DO TRIMESTRE 2022 FISM.</a></li>
			
            
		 </ul>

  </div>
  <div id="sfrt-3-2021">
  <ul class="lista_conac">
             <li class="list-group-item"><a class="titulos" href="../CONAC/2022/3T/SRFT/EJERCICIO DEL GASTO 3ER TRIMESTRE 2022 VALIDADO.pdf">1. EJERCICIO DEL GASTO 3ER TRIMESTRE 2022 VALIDADO.</a></li>
             <li class="list-group-item"><a class="titulos" href="../CONAC/2022/3T/SRFT/INDICADORES 3ER TRIMESTRE 2022 VALIDADO.pdf">2. INDICADORES 3ER  TRIMESTRE 2022 VALIDADOS.</a></li>
        <li class="list-group-item"><a class="titulos" href="../CONAC/2022/3T/SRFT/DESTINO DEL GASTO 3ER TRIMESTRE 2022 VALIDADO.pdf">3.-DESTINO DEL GASTO 3ER TRIMESTRE 2022 .</a></li>
       
             
      </ul>

  </div>
  <div id="sfrt-4-2021">
  <ul class="lista_conac">
             <li class="list-group-item"><a class="titulos" href="../CONAC/2022/4T/SRFT/1 EJERCICIO DEL GASTO 4TO TRIMESTRE 2022 VALIDADO.pdf">1 EJERCICIO DEL GASTO 4TO TRIMESTRE 2022 VALIDADO.</a></li>
             <li class="list-group-item"><a class="titulos" href="../CONAC/2022/4T/SRFT/2 INDICADORES 4TO TRIMESTRE 2022 VALIDADOS.pdf">2 INDICADORES 4TO TRIMESTRE 2022 VALIDADOS.</a></li>
        <li class="list-group-item"><a class="titulos" href="../CONAC/2022/4T/SRFT/3. DESTINO DEL GASTO 4TO TRIM 2022  VALIDADO.pdf">3. DESTINO DEL GASTO 4TO TRIM 2022  VALIDADO</a></li>
       
             
      </ul>

  </div>
  <div class="sfrt-cierre">

  
  <ul class="lista_conac">
            <li class="list-group-item"><a class="titulos" href="../CONAC/2022/2T/SRFT/SRFT CIERRE 2021/1. EJERCICIO DEL GASTO CIERRE 2021 VALIDADO.pdf">1. EJERCICIO DEL GASTO CIERRE 2021 VALIDADO.</a></li>
            <li class="list-group-item"><a class="titulos" href="../CONAC/2022/2T/SRFT/SRFT CIERRE 2021/2. INDICADORES CIERRE 2021 VALIDADO.pdf">2. INDICADORES CIERRE 2021 VALIDADO.</a></li>
			 <li class="list-group-item"><a class="titulos" href="../CONAC/2022/2T/SRFT/SRFT CIERRE 2021/3. DESTINO DEL GASTO CIERRE 2021 VALIDADO.pdf">3. DESTINO DEL GASTO CIERRE 2021 VALIDADO.</a></li>
			
            
		 </ul>
  </div>


</div>



<?php //require("pie.php") ?>
<?php
    $jslibs=["menujs"=>"y"];
    printJSlibs($jslibs);
?>
   
   <script>  
         $( function() {
    $( "#sfrt2021" ).tabs( { hide: { effect: "Fade", duration: 50000 }, active: 5});
    $( "#sfrt2022" ).tabs( { hide: { effect: "Fade", duration: 50000 }, active: 5});
   
  } );
      </script> 
</body>
</html>


