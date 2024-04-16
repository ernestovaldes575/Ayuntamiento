<?php include 'Recursos/Encabezado.php'?>
<?php
$BandMens = false;
    if (isset($_GET["Param0"]) )
    $BandMens = true;
    
    //?Conexion
    include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');
    $QuerNoti = '01';
    include 'NoticiasQuery.php'
?>
    <main class="contenedor-layer">
        <img src="../img/layer/1.png" alt="">
    </main>
    <section class="contenedor-conac container-sm mb-5 mt-5">
        <div>
            <h1 class="text-uppercase text-success fw-bolder text-center fs-1 mb-5">
                Noticias
            </h1>
            <?php include 'ContNoti.php'?>
        </div>
    </section>

    <script src="../scripts/app.js"></script>    
</body>
</html>