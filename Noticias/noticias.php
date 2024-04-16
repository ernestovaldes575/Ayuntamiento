<?php
require './php_function/funciones.php';
?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
       <?php
         $csslibs=["css_slider"=>"y","avisos"=>"y","docs"=>"y","pie"=>"y","menu"=>"y"];
        printCSSlibs($csslibs);

        ?>
    </head>
    <body>

    <?php require("menu.php") ?>

 

<div class="noticias">
        <div class="titulo_central">
            <span>Gobierno Municipal 2022 - 2024</span>
        <h1 >Últimas Noticias</h1>
        </div>

        <div class="body_noticias">
            <a href="#">
            <div class="item_noticias">
                <img src="https://zinacantepec.gob.mx/imgnoticias/marzo23/tacof.jpg">
                <div class="info_n">
                <i class="fa fa-newspaper-o fa-3x" aria-hidden="true"> <span class="fecha">21-03-25</span></i>
                <h2>FIRMA DE CONVENIO. ENTRE EL PODER JUDICIAL DE EDOMEX PARA ATENDER, PREVENIR Y ERRADICAR LA VIOLENCIA FAMILIAR</h2>

                </div>



            </div>
            </a>
            <div class="item_noticias">
                
                <img src="https://zinacantepec.gob.mx/imgnoticias/marzo23/uni.jpg">
                <div class="info_n">
                <i class="fa fa-newspaper-o fa-3x" aria-hidden="true"> <span class="fecha">21-03-25</span></i>
                <h2>Entrega de uniformes a Elementos de la Dirección de Seguridad</h2>

                </div>



            </div>

            <div class="item_noticias">
                <img src="https://zinacantepec.gob.mx/imgnoticias/marzo23/uni.jpg">



            </div>

            <div class="item_noticias">
                <img src="https://zinacantepec.gob.mx/imgnoticias/marzo23/tacof.jpg">



            </div>

            <div class="item_noticias">
                <img src="https://zinacantepec.gob.mx/imgnoticias/marzo23/tacof.jpg">



            </div>


            <a href="#">
            <div class="item_noticias">
                <img src="https://zinacantepec.gob.mx/imgnoticias/marzo23/tacof.jpg">
                <div class="info_n">
                <i class="fa fa-newspaper-o fa-3x" aria-hidden="true"> <span class="fecha">21-03-25</span></i>
                <h2>FIRMA DE CONVENIO. ENTRE EL PODER JUDICIAL DE EDOMEX PARA ATENDER, PREVENIR Y ERRADICAR LA VIOLENCIA FAMILIAR</h2>

                </div>



            </div>
            </a>


        </div>
    
        </div>

        <?php require("pie.php") ?>
        <?php
    $jslibs=["jquery"=>"y","menujs"=>"y","todasnoticias"=>"y"];
    printJSlibs($jslibs);
    ?>
<div style="
    background: red;
    position: fixed;
    left: 0;
    bottom: 0;
    padding: 5px;
    font-family: helcetica;
">
            
           <a href="./pdf/avisocs.pdf" style="
    color: white;
    width: auto;
    display: block;
    font-family: helvetica;
    font-size: 12px;
">Avisos de privacidad de comunicaci&oacute;n social</a>       </div>
    </body>
</html>