<article class="article__carrusel item-1">
    <div class="swiper" id="swiper-2">
        <div class="swiper-wrapper">
            <?php
            include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConPagWeb.php');
            $InstSql =  "SELECT PEjercicio, PMesRegi, PImagenPagi, ".
                                "PDocuLiga, PDocumento, PLiga, PVentRefe, CTDCarpeta  ".
                        "FROM ptpagina ".
                        "INNER JOIN pctipodocu ON CTDClave = PTipoDocu ".
                        "WHERE PAyuntamiento = $ClavAyun AND PTipoDocu = '02' AND PEstado = 'A'";
            $RespSql = $ConeBase->prepare($InstSql);
            $RespSql->execute();
            $ResuEjer = $RespSql->fetchAll();
            foreach($ResuEjer as $RegTab01){
                    $EjerTrab = $RegTab01['PEjercicio'];
                    $MesTraba = $RegTab01['PMesRegi'];
                    $ImagTrab = $RegTab01['PImagenPagi'];
                    $DocuLiga = $RegTab01['PDocuLiga'];
                    $DocuTrab = $RegTab01['PDocumento'];
                    $LigaTrab = $RegTab01['PLiga'];
                    $VentRefe = $RegTab01['PVentRefe']; //N NADA, P PAGINA, V VENTANA
                    $CarpImag = $RegTab01['CTDCarpeta'];
                    $ImagPagi = "/ExpeElectroni/$ClavAyun/$EjerTrab/$MesTraba/$CarpImag/$ImagTrab";
                    $RutaArch = "/ExpeElectroni/$ClavAyun/$EjerTrab/$MesTraba/$CarpImag/$DocuTrab";
                    // echo($DocuLiga);
                    // echo($VentRefe);
                    $InicHtml = '';
                    $TermHtml = '';
                    if($DocuLiga <> "N"){
                        // echo('Entra');
                        if($VentRefe == "V"){
                            $InicHtml = "javascript:window.open('$RutaArch','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0";
                        }
                        if($VentRefe == "P"){
                            // echo('Pagina');
                            $InicHtml = $RutaArch;
                        }
                    }

                    
            ?>
            <div class="swiper-slide">
                <a href="<?=$InicHtml?>">
                    <img src="<?=$ImagPagi?>" alt="">
                </a>
            </div>
            <?php
                }
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div> 
</article>  