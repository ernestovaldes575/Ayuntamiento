<?php include '../EstrPagi/HeadGene.php'?>
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

<!-- Empieza Codigo --> 
<div class="max_titulo">
    <h1>Datos Abiertos</h1>
</div>

<div class="datos">
    <p>
        El Ayuntamiento de Zinacantepec ponen a su disposición, datos abiertos con las características técnicas necesarias para ser usados, reutilizados y redistribuidos libremente por cualquier persona; información que puede ser de utilidad, para realizar investigaciones, gráficos o desarrollar ideas innovadoras que puedan generar beneficios sociales y económicos, mejorando la calidad de vida de las personas.
    </p>
<div class=" body_item">
<div class="items">

<a href="descarga.php?file=GIROS ALIMENTOS.xlsx">
<img src="./img/ex.png">
    <p>Giros de alimentos</p>
</a>

</div>

<div class="items">

<a href="descarga.php?file=PADRÓN DE ESCUELAS.xlsx">
<img src="./img/ex.png">
 <p>Padrón General de Escuelas</p>
</a>

</div>

<div class="items">

<a href="descarga.php?file=DIRECCION DELEGACIONES.xlsx">
<img src="./img/ex.png">
 <p>Padrón de delegaciones que cuentan con oficinas de atención</p>
</a>
</div>
<div class="items">

<a href="descarga.php?file=PADRÓN DE ESCUELAS.xlsx">
<img src="./img/ex.png">
 <p>Artesanías</p>
</a>

</div>
</div>

</div>


 
<?php require 'pie.php';?>
       
       <?php
           $jslibs=["jquery"=>"y","menujs"=>"y"];
           printJSlibs($jslibs);
           ?>
       </body>
       </html>