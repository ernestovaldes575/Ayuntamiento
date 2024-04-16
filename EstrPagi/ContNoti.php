
    <div class="accordion z-0 shadow-lg" id="accordionPanelsStayOpenExample">
        <?php foreach ( $ResNot01 as $RegTab01){
                    $EjerNoti = $RegTab01[0];
        ?> 
    <div class="accordion-item z-0 rounded">
        <h2 class="accordion-header">
            <!-- AÑO -->
            <button class="fs-5 accordion-button bg-success text-white fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#accordionCollapse<?=$EjerNoti?>" aria-expanded="true" aria-controls="accordionCollapse<?=$EjerNoti?>">
                <?=$EjerNoti?>
            </button>
        </h2>
        <div id="accordionCollapse<?=$EjerNoti?>"
            class="accordion-collapse collapse bg-white
                    <?php if($RegTab01 === reset($ResNot01)) echo 'show'?>">
            <div class="accordion-body">
                <?php 
                    $QuerNoti = 2;
                    include 'NoticiasQuery.php';                    
                    foreach($ResNot02 as $RegTab02){
                            $ClavMes = $RegTab02[0];
                            $DescMes = $RegTab02[1];
                ?>
                <div class="accordion-item ">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-success bg-opacity-75 text-uppercase fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#accordionCollapse<?=$EjerNoti?>-<?=$ClavMes?>" aria-expanded="false" aria-controls="accordionCollapse<?=$EjerNoti?>-<?=$ClavPeri?>">
                            <?=$DescMes?>
                        </button>
                    </h2>
                    <div id="accordionCollapse<?=$EjerNoti?>-<?=$ClavMes?>" 
                        class="accordion-collapse collapse 
                            <?php if($RegTab02 === reset($ResNot02)) echo 'show'?>">
                        <div class="accordion-body accordion-body-2">
                        <?php
                            $QuerNoti = 3;
                            include 'NoticiasQuery.php';

                            foreach($ResNot03 as $RegTab03){
                                    $TituNoti = $RegTab03[0];
                                    $DescNoti = $RegTab03[1];
                                    $ImagNoti = $RegTab03[2];
                                    $AbrirLDI = $RegTab03[3];
                                    $ImagDocu = $RegTab03[4];
                                    $LigaRefe = $RegTab03[5];
                                    $VentSali = $RegTab03[6];
                                    $RutaArch = '/ExpeElectroni/105/PaguWeb/2023/Noticias/';
                        ?>
                            <div class="accordion-contenido grid gap-2">
                                <div class="contenido__ImagNoti border">
                                    <img class="imgnoti" src="<?=$RutaArch?><?=$ImagNoti?>" alt="Not1">  
                                </div>
                                <div class="contenido__TituDesc border">
                                    <h2 class="fw-semibold">
                                        <?=$TituNoti?>
                                    </h2>
                                    <p class="fw-medium">
                                        <?=$DescNoti?>
                                    </p>
                                </div>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <?php }?>
    </div>
    </div>
</div>