
<div class="accordion secondary-focus shadow-lg" id="accordionPanelsStayOpenExample">
    <?php
        $QuerPae = '01';
        include('../Recursos/Query/PaeQuery.php');
        foreach($ResuEjer as $RegTab01){
                $EjerPae = $RegTab01[0]?>
    <div class="accordion-item rounded">

        <h2 class="accordion-header">
            <button class="fs-5 accordion-button bg-success bg-opacity-100 fw-bold text-white fw-medium z-0" type="button" data-bs-toggle="collapse" data-bs-target="#accordionCollapse<?=$EjerPae?>" aria-expanded="true" aria-controls="accordionCollapse<?=$EjerPae?>">
                <?=$EjerPae?>
            </button>
        </h2>

        <div id="accordionCollapse<?=$EjerPae?>" class="accordion-collapse collapse bg-white
            <?php if($RegTab01 === reset($ResuEjer)) echo 'show';?>">
                <div class="accordion-body">
                    <?php
                        $QuerPae = '02';
                        include('../Recursos/Query/PaeQuery.php');
                        foreach($ResuPeri as $RegTab02){
                                $ClavPeri = $RegTab02[0];
                                $DescPeri = $RegTab02[01];
                    ?>
                    <div class="accordion-item rounded">

                        <h2 class="accordion-header">
                            <button class="z-0 accordion-button collapsed text-uppercase fw-semibold bg-success bg-opacity-75 text-dark rounded" type="button" data-bs-toggle="collapse" 
                            data-bs-target="#accordionCollapse<?=$EjerPae?>-<?=$ClavPeri?>" 
                            aria-expanded="false" 
                            aria-controls="accordionCollapse<?=$EjerPae?>-<?=$ClavPeri?>">
                                <?=$DescPeri?>
                            </button>
                        </h2>
                        
                        <div id="accordionCollapse<?=$EjerPae?>-<?=$ClavPeri?>" 
                                    class="accordion-collapse collapse 
                                    <?php if($RegTab02 === reset($ResuPeri)) echo 'show'; ?>">
                            <div class="accordion-body">
                                    <?php
                                        $QuerPae = '03';
                                        include('../Recursos/Query/PaeQuery.php');
                                        foreach($ResuClIn as $RegTab03){
                                                $ClavClIn = $RegTab03[0];
                                                $DescClIn = $RegTab03[1];   
                                    ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class= "accordion-button collapsed z-0 bg-success bg-opacity-50 text-dark fw-semibold fs-6" type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#accordionCollapse<?=$EjerPae?>-<?=$ClavPeri?>-<?=$ClavClIn?>" aria-expanded="false" 
                                            aria-controls="accordionCollapse<?=$EjerPae?>-<?=$ClavPeri?>-<?=$ClavClIn?>">
                                                <?=$DescClIn?>
                                            </button>
                                        </h2>
                                        <div id="accordionCollapse<?=$EjerPae?>-<?=$ClavPeri?>-<?=$ClavClIn?>"     class="accordion-collapse collapse 
                                        <?php if($RegTab03 === reset($ResuClIn)) echo 'show'; ?>">
                                            <div class="accordion-body">
                                                
                                                <?php
                                                    $QuerPae = '04';
                                                    include('../Recursos/Query/PaeQuery.php');
                                                    foreach($ResuPae as $RegTab04){
                                                            $RutasPae = $RegTab04[0];
                                                            $NombArch = $RegTab04[1];
                                                            
                                                            $RutaArch = "/Transparencia/$RutasPae/$NombArch";
                                                ?>
                                                <div class="d-flex">
                                                    <a class="text-wrap lh-lg fw-semibold link-secondary text-dark" href="javascript:window.open('<?=$RutaArch?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
                                                        <?=$NombArch?>
                                                    </a>
                                                </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <?php }?>
    </div>
</div>