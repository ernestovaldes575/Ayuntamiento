    <?php include 'Components/Encabezado.php'?>
    <main class="contenedor-layer">
        <img src="../img/layer/1.png" alt="">
    </main>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');
?>
    <main class="ContPres mb-5">
        <div class="PresImag">
            <img src="https://www.zinacantepec.gob.mx/cabildo/CABILDO-01.png" 
            alt="Imagen Presidente" class="shadow-lg">
        </div>
    </main>

    <main class="w-100 flex justify-center text-center items-center">
        <div class="w-70">
            <h1 class="text-5xl font-bold uppercase text-slate-600">
                Integrantes de Cabildo
            </h1>
        </div>
    </main>

    <main class="contenedor__principal__cabildo">
        <div class="principal__cabildo effect">
            <div class="princial__cabildo__grid">
                <div class="card shadow  rounded-4" style="width: 20rem;">
                    <?php
                        $InstSql =  "SELECT LImagen ". 
                                    "FROM   stlayers ". 
                                    "WHERE  LTipoDocu = '10' AND ". 
                                    "LTitulo LIKE '%Sind%'";
                        $RespSql = $ConeBase->prepare($InstSql);
                        $RespSql->execute();
                        $ResuImag = $RespSql->fetchAll();
                        foreach($ResuImag as $RegTab01){
                                $ImagSind = $RegTab01[0];
                                $RutaImag = '/ExpeElectroni/105/PaguWeb/2022/Cabildo/';
                        ?>
                        <img src="<?=$RutaImag?><?=$ImagSind?>" 
                        class="card-img-top rounded-lg" alt="Sindico-Municipal">
                    <?php }?>
                    <div class="card-body">
                        <h5 class="card-title fs-5 fw-bold text-center">Dulce María Bastida Alvarez</h5>
                        <p class="card-text shadow-md text-center">Sindico Municipal</p>
                        <p class="card-text text-center">
                            <i class="bi bi-telephone-fill"></i>
                            7229177206
                        </p>
                        <p class="card-text text-center">
                            <i class="bi bi-geo-alt-fill"></i>
                            Constitucion 101, Centro, 51350 San Miguel Zinacantepec, Méx.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <main class="contenedor__secundario">
        <div class="contenedor__cabildo__posicion">
            <div class="contenedor__grid">
            <?php
                $InstSql =  "SELECT CNombre, CCargo, CTelefono, CDireccion, CImagen, CAYDescripcion, Colonia, CodiPost, CFondo ". 
                            "FROM stcabidire ".
                            "INNER JOIN acceso.acayuntamiento ON CAyuntamiento = CAYClave ".
                            "WHERE CCabiDir = 'C' ". 
                            "AND CTipo = 'R' ".
                            "ORDER BY CNumero ASC";
                $RespSql = $ConeBase->prepare($InstSql);
                $RespSql->execute();
                $ResuCabi = $RespSql->fetchAll();
            
                foreach($ResuCabi as $RegTab02){
                        $ResuNomb = $RegTab02[0];
                        $ResuCarg = $RegTab02[1];
                        $ResuTele = $RegTab02[2];
                        $ResuDire = $RegTab02[3];
                        $ImagRegi = $RegTab02[4];
                        $DescAyun = $RegTab02[5];
                        $ColoAyun = $RegTab02[6];
                        $CodiAyun = $RegTab02[7];
                        $ClasFond = $RegTab02[8];
                        $LigaRegi = '/ExpeElectroni/105/PaguWeb/2022/Cabildo/';
            ?> 
            <div class="card shadow mb-5" style="width: 20rem;">
                <img src="<?=$LigaRegi?><?=$ImagRegi?>" class="card-img-top" alt="Imagen-Cabildo">
                <div class="card-body">
                    <h2 class="card-title fw-bold text-center text-lg"><?=$ResuNomb?></h2>
                    <h3 class="card-title fw-semibold text-center text-base"><?=$ResuCarg?></h3>
                    <p class="card-text text-center">
                    <i class="bi bi-telephone-fill"></i>
                    <?=$ResuTele?>
                    </p>
                    <p class="card-text text-center">
                        <i class="bi bi-geo-alt-fill"></i>
                            <?=$ResuDire?> <?=$DescAyun?>, Méx 
                            <?=$ColoAyun?>,<?=$CodiAyun?>
                    </p>
                </div>
            </div>
            <?php
                }
            ?>
            </div>
        </div>
    </main>


    <script src="/scripts/app.js"></script>
    <script>ScrollReveal().reveal('.effect',{interval:150});</script>
    <?php include '../EstrPagi/Footer.php'?>  

</body>
</html>