<?php
    
    include_once('Recursos/Consultas/QuerNoti.php')
?>

<section class="card">
    <div class="contenedor__principal ">
        <article class="card__content__grid">
            <?php foreach ( $ResuEjer as $RegTab01): 
                            $TituNoti = $RegTab01[0];
                            $DescNoti = $RegTab01[1];
                            $ImagNoti = $RegTab01[2];
                            $TamaDesc = $RegTab01[6];
                            $RutaArch = '/ExpeElectroni/105/PaguWeb/2023/Noticias/';
            ?>
            <div class="card__content">
                <div class="img__not">
                    <img src="<?=$RutaArch?><?=$ImagNoti?>" alt="Not1">
                </div>
                <div class="card__Not">
                    <a href="#">
                        <span class="title">
                            <?=$TituNoti?>
                        </span>
                    </a>
                    <p class="card__content__text">
                        <?=$DescNoti?>
                            </br>
                        <?php 
                            if($TamaDesc == 1){
                                echo("</br>");
                            }
                            for ($i=1; $i<$TamaDesc ; $i++) { 
                                echo("</br>");
                            }
                        ?>
                    </p>
                    <a href="/EstrPagi/PagiNoti.php" class="action">
                        Más
                    </a>
                </div>
            </div>
            <?php endforeach?>
        </article>
    </div>
</main>
