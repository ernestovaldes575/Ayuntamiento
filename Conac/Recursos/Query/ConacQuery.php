<?php
    //?Conexion
    include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasConac.php');
    
    switch ($QuerTrab) {
        case '01':
            $InstSql =  "SELECT cejercicio,  COUNT(*) AS TOTAL ".
                        "FROM ctconac ".
                        "WHERE ctipo = 'CO' ".
                        "GROUP BY cejercicio ".
                        "ORDER BY cejercicio DESC";
            
            $RespSql = $ConeBase->prepare($InstSql);
            $RespSql->execute();
            $ResuEjer = $RespSql->fetchAll();
            break;
        case '02':
                $InstSql =  "SELECT cperiodo, cpedescri, COUNT(*) AS TOTAL ".
                            "FROM   ctconac ".
                            "INNER  JOIN ccperiodo ON cperiodo = cpeclave ".
                            "WHERE  ctipo = 'CO' AND ".
                                    "cejercicio = $EjerTrab ".
                            "GROUP BY cperiodo, cpedescri";

            $RespSql = $ConeBase->prepare($InstSql);
            $RespSql->execute();
            $ResuPeri = $RespSql->fetchAll();
            break;
        case '03':
            $InstSql =  "SELECT cclasinfo, ccidescri, COUNT(*) AS TOTAL ".
                        "FROM   ctconac ".
                        "INNER  JOIN ccclasinfo ON cclasinfo = cciclave ".
                        "WHERE  ctipo = 'CO' AND cejercicio = $EjerTrab AND cperiodo = '$ClavPeri' ".
                        "GROUP  BY cclasinfo, ccidescri";
                        
            $RespSql = $ConeBase->prepare($InstSql);
            $RespSql->execute();
            $ResuClIn = $RespSql->fetchAll();
            break;
        case '04':
            $InstSql =  "SELECT cruta, carchivo ".
                        "FROM   ctconac ".
                        "INNER  JOIN ccclasinfo ON cclasinfo = cciclave ".
                        "WHERE  ctipo = 'CO' AND cejercicio = $EjerTrab AND ".
                                "cperiodo = '$ClavPeri' AND ".
                                "cclasinfo = '$ClavClIn'";

            $RespSql = $ConeBase->prepare($InstSql);
            $RespSql->execute();
            $ResuCona = $RespSql->fetchAll();
            break;
        default:
    }