<?php include '../Components/EncaPrin.php'?>
<?php include '../Components/Menu.php'?>

<?php
    include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');
?>
    <main class="FondoImg">
        <div class="EncaCent">
            <div class="TituCont">
                <h2>Integrantes de Cabildo</h2>
            </div>
        </div>
    </main>

    <main class="ContPres">
        <div class="PresImag">
            <img src="https://www.zinacantepec.gob.mx/cabildo/CABILDO-01.png" alt="Imagen Presidente">
        </div>
    </main>

    <main class="contenedor__principal__cabildo">
        <div class="principal__cabildo effect">
            <div class="princial__cabildo__grid">
                <div class="card__direcciones">
                    <div class="card__contenedor__direcciones">
                        <div class="card">
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
                            <div class="front__content">
                                <img src="<?=$RutaImag?><?=$ImagSind?>">
                            </div>
                            <?php
                                }
                            ?>
                            <div class="sindico">
                                <h2>Dulce María Bastida Alvarez</h2>
                                <h3>Síndico Municipal</h3>
                                <p>
                                    <i class="bi bi-telephone-fill"></i>
                                    7229177206
                                </p>
                                <p>
                                    <i class="bi bi-geo-alt-fill"></i>
                                    Constitucion 101, Centro, 51350 San Miguel Zinacantepec, Méx.
                                </p>
                            </div>
                        </div>
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
                <div class="card__direcciones">
                    <div class="card__contenedor__direcciones">
                        <div class="card effect">
                            <div class="front__content">
                                <img    src="<?=$LigaRegi?><?=$ImagRegi?>" 
                                        alt="imagen-Ejemplo">
                            </div>
                            <div class="<?=$ClasFond?>">
                                <h2><?=$ResuNomb?></h2>
                                <h3><?=$ResuCarg?></h3>
                                <p>
                                    <i class="bi bi-telephone-fill"></i>
                                    <?=$ResuTele?>
                                </p>
                                <p>
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <?=$ResuDire?> <?=$DescAyun?>, Méx 
                                    <?=$ColoAyun?>,<?=$CodiAyun?>
                                
                                </p>
                            </div>
                        </div>
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