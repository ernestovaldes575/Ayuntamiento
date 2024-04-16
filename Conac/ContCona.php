<section class="contenedor-conac container-sm mb-5 mt-5">
    <div class="contenedor-conac-centrar">
        <h1 class="text-uppercase text-success fw-bolder text-center fs-1 mb-5">
            CONAC
        </h1>
        <div class="accordion secondary-focus shadow-lg" id="accordionPanelsStayOpenExample">        
        <?php $QuerTrab = '01';
                include('Query/ConacQuery.php');
                foreach($ResuEjer as $RegTab01){
                        $EjerTrab = $RegTab01[0];?>
        <div class="accordion-item rounded" >
        <h2 class="accordion-header">
            <!-- AÑO -->
            <button class="fs-5 accordion-button bg-success bg-opacity-100 fw-bold text-white fw-medium z-0" type="button" data-bs-toggle="collapse" data-bs-target="#accordionCollapse<?=$EjerTrab?>" aria-expanded="true" aria-controls="accordionCollapse<?=$EjerTrab?>">
                <?=$EjerTrab?>
            </button>
        </h2>
        <div id="accordionCollapse<?=$EjerTrab?>"
            class="accordion-collapse collapse bg-white
            <?php if($RegTab01 === reset($ResuEjer)) echo 'show';?>">
            <!-- Contenedor Cuerpo 1 INICIO-->
            <div class="accordion-body">
                <?php   
                    $QuerTrab = '02';
                    include('Query/ConacQuery.php');
                    foreach($ResuPeri as $RegTab02){   
                            $ClavPeri = $RegTab02[0];
                            $DescPeri = $RegTab02[1];   
                ?>
                <div class="accordion-item rounded">
                    <h2 class="accordion-header">
                        <button class="z-0 accordion-button collapsed text-uppercase 
                        fw-semibold bg-success bg-opacity-75 text-dark rounded" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#accordionCollapse<?=$EjerTrab?>-<?=$ClavPeri?>" 
                        aria-expanded="falsearia-controls="accordionCollapse<?=$EjerTrab?>-<?=$ClavPeri?>">
                            <?=$DescPeri?>
                        </button>
                    </h2>
                    <div id="accordionCollapse<?=$EjerTrab?>-<?=$ClavPeri?>" 
                        class="accordion-collapse collapse 
                        <?php if($RegTab02 === reset($ResuPeri)) echo 'show'; ?>">
                    
                        <div class="accordion-body">
                            <?php
                                $QuerTrab = '03';
                                include('Query/ConacQuery.php');
                                foreach($ResuClIn as $RegTab03){
                                        $ClavClIn = $RegTab03[0];
                                        $DescClIn = $RegTab03[1];
                            ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class= "accordion-button collapsed z-0 bg-success bg-opacity-50 text-dark fw-semibold fs-6" type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#accordionCollapse<?=$EjerTrab?>-<?=$ClavPeri?>-<?=$ClavClIn?>" aria-expanded="false" 
                                            aria-controls="accordionCollapse<?=$EjerTrab?>-<?=$ClavPeri?>-<?=$ClavClIn?>">
                                            <?=$DescClIn?>
                                    </button>
                                </h2>
                                <div id="accordionCollapse<?=$EjerTrab?>-<?=$ClavPeri?>-<?=$ClavClIn?>"     class="accordion-collapse collapse 
                                <?php if($RegTab03 === reset($ResuClIn)) echo 'show'; ?>">
                                    <div class="accordion-body">
                                        <?php
                                            $QuerTrab = '04';
                                            include('Query/ConacQuery.php');
                                            foreach($ResuCona as $RegTab04){
                                                    $RutaOrig = $RegTab04[0];
                                                    $NombArch = $RegTab04[1];
                                                    $RutaArch = "/Transparencia/$RutaOrig/$NombArch";
                                        ?>
                                        <a class="lh-base" href="javascript:window.open('<?=$RutaArch?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
                                            <?=$NombArch?>
                                        </a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        </div>
        <?php }?>
        </div>
    </div>
</section>