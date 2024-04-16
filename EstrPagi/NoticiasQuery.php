<?php 
    switch ($QuerNoti) {
        case '01':
            $InstSql =  "SELECT LEjercicio, COUNT(*) AS TotaRegi ". 
                        "FROM  stlayers ".
                        "WHERE LTipoDocu = '04'".  
                        "GROUP BY LEjercicio";
                //if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
                $RespSql = $ConeBase->prepare($InstSql);
                $RespSql->execute();
                $ResNot01 = $RespSql->fetchAll();
            break;
        case '02':
            $InstSql =  "SELECT LMesRegi, cmedescri, COUNT(*) AS TotaRegi ". 
                                "FROM stlayers ". 
                                "INNER JOIN scmes ON LMesRegi = cmeclave ".
                                "WHERE LTipoDocu = '04' AND ". 
                                "LEjercicio = $EjerNoti ".  
                                "GROUP BY LMesRegi, cmedescri ".
                                "ORDER BY LMesRegi, cmedescri";
                   // if ($BandMens)  echo '2)'.$InstSql.'<br>'; 
                    $RespSql = $ConeBase->prepare($InstSql);
                    $RespSql->execute();
                    $ResNot02 = $RespSql->fetchAll();
            break;
        case '03':
            $InstSql =  "SELECT LTitulo, LDescripcion, LImagen, ".
                                "LAbrirLiDoIm, LAImagDocu, LLiga, LVentRefe ".
                        "FROM stlayers ". 
                        "INNER JOIN scmes ON LMesRegi = cmeclave ".
                        "WHERE  LTipoDocu = '04' AND ". 
                        "LEjercicio = $EjerNoti  AND ".	
                        "LMesRegi = '$ClavMes' ".
                        "ORDER BY LFechPublI";
                    //if ($BandMens)  echo '2)'.$InstSql.'<br>'; 
                    $RespSql = $ConeBase->prepare($InstSql);
                    $RespSql->execute();
                    $ResNot03 = $RespSql->fetchAll();
            break;
        default:
            # code...
            break;
    }