<div class="contenedor__layer tagline">
    <div class="swiper" id="swiper-1">
        <div class="swiper-wrapper">
            <?php
            include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConPagWeb.php');

            $InstSql =  "SELECT PEjercicio, PMesRegi, PImagenPagi, CTDCarpeta ".
                        "FROM ptpagina ". 
                        "INNER JOIN pctipodocu ON CTDClave = PTipoDocu ".
                        "WHERE PAyuntamiento = '$ClavAyun' AND PTipoDocu = '01' AND PEstado = 'A'";
            //echo($InstSql);
            $RespSql = $ConeBase->prepare($InstSql);     
            $RespSql->execute();
            $ResuEjer = $RespSql->fetchAll();
            foreach($ResuEjer as $RegTab01){
                    $EjerTrab = $RegTab01[0];
                    $MesTraba = $RegTab01[1];
                    $ImagTrab = $RegTab01[2];
                    $CarpImag = $RegTab01[3];
                    $RutaArch = "/ExpeElectroni/$ClavAyun/$EjerTrab/$MesTraba/$CarpImag/$ImagTrab"; 
            ?>
            <div class="swiper-slide">
                <img src="<?=$RutaArch?>" alt="">
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>