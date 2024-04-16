<?php include 'Components/Encabezado.php'?>

<?php
    include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php')
?>
    <main class="contenedor__img__presidente">
        <div class="img__presidente shadow-lg">
            <img src="https://www.zinacantepec.gob.mx/cabildo/CABILDO-01.png">
        </div>
    </main>


    <main class="w-100 flex justify-center text-center items-center" style="margin: 2.5em 0 2em 0;">
        <div class="w-70">
            <h1 class="text-5xl font-bold uppercase text-slate-600">
                Directores
            </h1>
        </div>
    </main>


    <div class="w-100 grid-center">
        <div class="w-70 grid-template-columns-3 grid-center">
        <?php
            $InstSql =  "SELECT CNombre, CCargo, CTelefono, CCorreo, CImagen, CFondo ".
                                "FROM stdire ". 
                                "WHERE CTipo = 'D' ".
                                "ORDER BY CNumero ASC";
            $RespSql = $ConeBase->prepare($InstSql);
            $RespSql->execute();
            $ResuDire = $RespSql->fetchAll();
            foreach($ResuDire as $RegTab01){ 
                    $ResuNomb = $RegTab01[0];
                    $ResuCarg = $RegTab01[1];
                    $ResuTele = $RegTab01[2];
                    $ResuCorr = $RegTab01[3];
                    $ResuImag = $RegTab01[4];
                    $ResuFond = $RegTab01[5];
                    $RutaImag = '/Gobierno/Directorio/';
        ?>
            <div class="card shadow mb-5 border-solid" style="width: 20rem;">
                <img src="<?=$RutaImag?><?=$ResuImag?>" class="card-img-top" alt="Imagen-Cabildo">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-center text-lg"><?=$ResuNomb?></h5>
                    <h5 class="card-title fw-semibold text-center text-base"><?=$ResuCarg?></h5>
                    <p class="card-text text-center">
                    <i class="bi bi-telephone-fill"></i>
                    <?=$ResuTele?>
                    </p>
                    <p class="card-text text-center">
                    <i class="bi bi-envelope-at-fill"></i>
                    <?=$ResuCorr?>
                    </p>
                </div>
            </div>
        <?php
            }
        ?>
    </div>
</div>

    <!-- <main class="contenedor__secundario">
        <div class="contenedor__cabildo__posicion">
            <div class="contenedor__grid">
                <?php
                    $InstSql =  "SELECT CNombre, CCargo, CTelefono, CCorreo, CImagen, CFondo ".
                                "FROM stdire ". 
                                "WHERE CTipo = 'D' ".
                                "ORDER BY CNumero ASC";

                    $RespSql = $ConeBase->prepare($InstSql);
                    $RespSql->execute();
                    $ResuDire = $RespSql->fetchAll();
                    foreach($ResuDire as $RegTab01){ 
                            $ResuNomb = $RegTab01[0];
                            $ResuCarg = $RegTab01[1];
                            $ResuTele = $RegTab01[2];
                            $ResuCorr = $RegTab01[3];
                            $ResuImag = $RegTab01[4];
                            $ResuFond = $RegTab01[5];
                            $RutaImag = '/Gobierno/Directorio/';
                ?>
                <div class="card__direcciones">
                    <div class="card__contenedor__direcciones">
                        <div class="card">
                            <div class="front__content">
                                <img src="<?=$RutaImag?><?=$ResuImag?>" alt="imagen-Ejemplo">
                            </div>
                            <div class="<?=$ResuFond?>">
                                <h2><?=$ResuNomb?></h2>
                                <h3><?=$ResuCarg?></h3>
                                <p>
                                    <i class="bi bi-telephone-fill"></i>
                                    <?=$ResuTele?>
                                </p>
                                <p>
                                    
                                    <?=$ResuCorr?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </main> -->

    <div class="container w-100 grid-center">
        <div class="w-70 grid-template-columns-2 grid-center">
                <?php
                    $InstSql =  "SELECT CNombre, CCargo, CTelefono, CCorreo, CImagen, CFondo ".
                                "FROM stdire ". 
                                "WHERE CTipo = 'I' ".
                                "ORDER BY CNumero ASC";
                    $RespSql = $ConeBase->prepare($InstSql);
                    $RespSql->execute();
                    $ResuDire = $RespSql->fetchAll();
                    foreach($ResuDire as $RegTab02){ 
                            $ResuNomb = $RegTab02[0];
                            $ResuCarg = $RegTab02[1];
                            $ResuTele = $RegTab02[2];
                            $ResuCorr = $RegTab02[3];
                            $ResuImag = $RegTab02[4];
                            $ResuFond = $RegTab02[5];
                            $RutaImag = '/Gobierno/Directorio/';
                ?>
                <div class="card shadow mb-5" style="width: 20rem;">
                <img src="<?=$RutaImag?><?=$ResuImag?>" class="card-img-top" alt="Imagen-Cabildo">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-center text-lg"><?=$ResuNomb?></h5>
                    <h5 class="card-title fw-semibold text-center text-base"><?=$ResuCarg?></h5>
                    <p class="card-text text-center">
                    <i class="bi bi-telephone-fill"></i>
                    <?=$ResuTele?>
                    </p>
                    <p class="card-text text-center">
                    <i class="bi bi-envelope-at-fill"></i>
                    <?=$ResuCorr?>
                    </p>
                </div>
            </div>
                <?php }?>
            </div>
        </div> 

    <div class="conatiner w-100 grid-center">
        <div class="w-70 grid-template-columns-3 grid-center">
        <?php
            $InstSql =  "SELECT CNombre, CCargo, CTelefono, CCorreo, CImagen, CFondo ".
                        "FROM stdire ". 
                        "WHERE CTipo = 'O' ".
                        "ORDER BY CNumero ASC";
            $RespSql = $ConeBase->prepare($InstSql);
            $RespSql->execute();
            $ResuDire = $RespSql->fetchAll();
            foreach($ResuDire as $RegTab01){ 
                    $ResuNomb = $RegTab01[0];
                    $ResuCarg = $RegTab01[1];
                    $ResuTele = $RegTab01[2];
                    $ResuCorr = $RegTab01[3];
                    $ResuImag = $RegTab01[4];
                    $ResuFond = $RegTab01[5];
                    $RutaImag = '/Gobierno/Directorio/';
        ?>
        <div class="card shadow mb-5" style="width: 20rem;">
                <img src="<?=$RutaImag?><?=$ResuImag?>" class="card-img-top" alt="Imagen-Cabildo">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-center text-lg"><?=$ResuNomb?></h5>
                    <h5 class="card-title fw-semibold text-center text-base"><?=$ResuCarg?></h5>
                    <p class="card-text text-center">
                    <i class="bi bi-telephone-fill"></i>
                    <?=$ResuTele?>
                    </p>
                    <p class="card-text text-center">
                    <i class="bi bi-envelope-at-fill"></i>
                    <?=$ResuCorr?>
                    </p>
                </div>
            </div>
        <?php }?>
        </div>
    </div>
    <?php include '../EstrPagi/Footer.php'?>
    <script src="../scripts/app.js"></script>
</body>
</html>