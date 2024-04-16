<?php include '../ConacInic/Encabezado.php'?>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasConac.php');

    $InstSql =  "SELECT cejercicio,  COUNT(*) AS TOTAL ".
                "FROM ctconac ".
                "WHERE ctipo = 'SR' ".
                "GROUP BY cejercicio ".
                "ORDER BY cejercicio DESC";
        $RespSql = $ConeBase->prepare($InstSql);
        $RespSql->execute();
        $ResuEjer = $RespSql->fetchAll();
?>

<div class="accordion " id="accordionPanelsStayOpenExample">
    <?php foreach ($ResuEjer as $RegTab01):
        $EjerTrab = $RegTab01[0];
    ?>
    <!-- Contenedor Pirncipal Inicio -->
    <div class="accordion-item z-0" style="width: 80%;">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accordionCollapse<?=$EjerTrab?>" aria-expanded="true" aria-controls="accordionCollapse<?=$EjerTrab?>">
                <?=$EjerTrab?>
            </button>
        </h2>
        <div id="accordionCollapse<?=$EjerTrab?>" class="bg-primary bg-gradient accordion-collapse collapse bg-opacity-50">
            <!-- Contenedor Cuerpo 1 INICIO-->
            <div class="accordion-body">
                <?php
                    $InstSql =  "SELECT cperiodo, cpedescri, COUNT(*) AS TOTAL ".
                                "FROM ctconac ".
                                "INNER JOIN ccperiodo ON cperiodo = cpeclave ".
                                "WHERE ctipo = 'SR'AND ".
                                      "cejercicio = $EjerTrab ".
                                "GROUP BY cperiodo, cpedescri";
                        $RespSql = $ConeBase->prepare($InstSql);
                        $RespSql->execute();
                        $ResuPeri = $RespSql->fetchAll();
                        
                    foreach (   $ResuPeri as $RegTab02):    
                                $ClavPeri = $RegTab02[0];
                                $DescPeri = $RegTab02[1];
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionCollapse<?=$EjerTrab?>-<?=$ClavPeri?>" aria-expanded="false" aria-controls="accordionCollapse<?=$EjerTrab?>-<?=$ClavPeri?>">
                            <?=$DescPeri?>
                        </button>
                    </h2>
                    <div id="accordionCollapse<?=$EjerTrab?>-<?=$ClavPeri?>" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <?php
                                $InstSql =  "SELECT cclasinfo, ccidescri, COUNT(*) AS TOTAL ".
                                            "FROM ctconac ".
                                            "INNER JOIN ccclasinfo ON cclasinfo = cciclave ".
                                            "WHERE ctipo = 'SR'AND cejercicio = $EjerTrab AND cperiodo = '$ClavPeri' ".
                                            "GROUP BY cclasinfo, ccidescri";
                                $RespSql = $ConeBase->prepare($InstSql);
                                $RespSql->execute();
                                $ResuClIn = $RespSql->fetchAll();
                            ?>
                            <?php foreach ( $ResuClIn as $RegTab03):
                                            $ClavClIn = $RegTab03[0];
                                            $DescClIn = $RegTab03[1];
                            ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionCollapse<?=$EjerTrab?>-<?=$ClavPeri?>-<?=$ClavClIn?>" aria-expanded="false" aria-controls="accordionCollapse<?=$EjerTrab?>-<?=$ClavPeri?>-<?=$ClavClIn?>">
                                        <?=$DescClIn?>
                                    </button>
                                </h2>
                                <div id="accordionCollapse<?=$EjerTrab?>-<?=$ClavPeri?>-<?=$ClavClIn?>" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <?php
                                            $InstSql =  "SELECT cruta, carchivo ".
                                                        "FROM ctconac ".
                                                        "INNER JOIN ccclasinfo ON cclasinfo = cciclave ".
                                                        "WHERE ctipo = 'SR'AND cejercicio = $EjerTrab AND ".
                                                        "cperiodo = '$ClavPeri' AND ".
                                                        "cclasinfo = '$ClavClIn'";

                                            $RespSql = $ConeBase->prepare($InstSql);
                                            $RespSql->execute();
                                            $ResuCona = $RespSql->fetchAll();
                                        ?>
                                        <?php foreach ( $ResuCona as $RegTab04):
                                                        $RutaOrig = $RegTab04[0];
                                                        $NombArch = $RegTab04[1];
                                                        $RutaArch = "/Transparencia/$RutaOrig/$NombArch";

                                        ?>
                                        <a href="javascript:window.open('<?=$RutaArch?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
                                            <?=$NombArch?>
                                        </a>
                                        <?php endforeach?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach?>
                        </div>
                    </div>
                </div>
                <?php endforeach?>
            </div>
            <!-- Contenedor Cuerpo 1 FIN -->
        </div>
    </div>
    <?php endforeach?>
</div>
<script src="../scripts/app.js"></script>
</body>
</html>