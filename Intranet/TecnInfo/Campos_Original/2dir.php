<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Archivos/CSS/Consulta.css">
    <title>Directorios</title>
    <!--icono de la pestaña (logo)-->
    <link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />
</head>
<body>
<script language="javascript">
function PasRut01(Param1,Param2)
{ 
  opener.top.formulario.NombArch.value=Param1+"/"+Param2;
  window.close();
}

function PasRut02(Param1,Param2)
{
   opener.top.formulario.RutaArch.value=Param1+"/";
  window.close();
}

</script>
<?php
$directorio = $_SERVER['DOCUMENT_ROOT'].'/Intranet/';
$sub = $_GET['carpeta'];

$ARutaArc = explode("/", $sub);
$TamaArc = count($ARutaArc);
//echo "$TamaArc".$TamaArc;

$CreaRuta = "";
for ($i=1; $i<($TamaArc-1); $i++)
  $CreaRuta .= $ARutaArc[$i]."/";

  //echo "$CreaRuta".$CreaRuta;
?>
<table>
  <tr>
      <td colspan="2">
      <h1 aria-setsize="3px">Directorio de Archivos</h1>
      </td>
  </tr>
  <tr>
    <td><a href="2dir.php?carpeta=">Raiz</a>  </td>
    <th><a href="2dir.php?carpeta=<?=$CreaRuta?>">Regresar</a></th>
  </tr>

<?php
    $directorio = $directorio . $sub;
    $listar = opendir($directorio);
    while (($archivo = readdir($listar)) !== false) { ?>
    <tr>
      <td colspan="2">
      <?php
        if($archivo != "." && $archivo != "..") {
          if (substr($archivo, -4, -3) ==".") { ?>
            <a href="#" onClick="PasRut02('<?=$sub?>','<?=$archivo?>')"><?=$archivo?></a>
      <?php
            }else{ ?>
              <a href="2dir.php?carpeta=<?=$sub?>/<?=$archivo?>"><?=$archivo?>/</a>
      <?php
            }
        } ?>
      </td>
    </tr>
<?php
    }
    closedir($listar);
    ?>
</table>
</body>
</html>