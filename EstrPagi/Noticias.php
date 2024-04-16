<main class="card">
    <div class="contenedor__principal ">
        <article class="card__content__grid">
            <?php
            include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasPagWeb.php');

            $InstSql =  "SELECT PTitulo, PEjercicio, PMesRegi, PImagenPagi, PDocuLiga, ". 
                                "PDocumento, PLiga, PVentRefe, CTDCarpeta, PDescripcion ".
                        "FROM ptpagina ".
                        "INNER JOIN pctipodocu ON CTDClave = PTipoDocu ".
                        "WHERE PAyuntamiento = $ClavAyun ".
                        "AND PTipoDocu = '04'   ";

            $RespSql = $ConeBase->prepare($InstSql);
            $RespSql->execute();
            $ResuEjer = $RespSql->fetchAll();
            foreach($ResuEjer as $RegTab01){
                    $EjerTrab = $RegTab01['PEjercicio'];
                    $MesTraba = $RegTab01['PMesRegi'];
                    $ImagNoti = $RegTab01['PImagenPagi'];
                    $CarpNoti = $RegTab01['CTDCarpeta'];
                    $DescNoti = $RegTab01['PDescripcion'];
                    $TituNoti = $RegTab01['PTitulo'];
                    $ImagPagi = "/ExpeElectroni/$ClavAyun/$EjerTrab/$MesTraba/$CarpNoti /$ImagNoti";
            ?>
            <div class="card__content">
                <div class="img__not">
                    <img src="<?=$ImagPagi?>" alt="Not1">
                </div>
                <div class="card__Not">
                    <a href="#"><span class="title"><?=$TituNoti?></span></a>
                    <p class="card__content__text">
                        <?=$DescNoti?>
                    </p>
                    <a href="" class="action">
                        Más
                    </a>
                </div>
            </div>
            <?php
            }
            ?>
        </article>
    </div>
</main>
