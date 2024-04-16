<?php
    include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');

    $InstSql =  "SELECT LTitulo, LDescripcion, ".
                                "LImagen, LAbrirLiDoIm, LAImagDocu, LPublicacion, ".
                                "6 - ROUND(LENGTH(LDescripcion) / 30) ".
                        "FROM stlayers ".  
                        "WHERE LTipoDocu = '04'";
    
    $RespSql = $ConeBase->prepare($InstSql);
    $RespSql->execute();
    $ResuEjer = $RespSql->fetchAll();