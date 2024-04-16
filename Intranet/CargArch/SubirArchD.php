<?php
//Dimensiones de la Imagen
$ArCooki3 = $_COOKIE['CImpoArc'];
$AImpoArc = explode("|", $ArCooki3);
$CarpArch = $AImpoArc[2]; 
$AnchImag = $AImpoArc[3]; 
$AltoImag = $AImpoArc[4];
$TamaImag = $AImpoArc[5]; 

$ArCooki4 = $_COOKIE['CSubiArc'];
$ASubiArc = explode("|", $ArCooki4);
$Tipo = $ASubiArc[0]; 
$Ruta = $ASubiArc[1]; 
$Nomb = $ASubiArc[2]; 
$Pagi = $ASubiArc[3]; 

$BandMens = false;
$BanEdoIm = true;

if ( $BandMens ) {
   echo '$Tipo: '.$Tipo.'<br>';
   echo '$Ruta: '.$Ruta.'<br>';
   echo '$Nomb: '.$Nomb.'<br>';
   echo '$Pagi: '.$Pagi.'<br>';
  }

if(isset($_FILES['image'])){

   $errors= array();
   $file_name = $_FILES['image']['name'];
   $file_size = $_FILES['image']['size'];
   $file_tmp  = $_FILES['image']['tmp_name'];
   $file_type = $_FILES['image']['type'];
   $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
   //strtolower(end(explode('.',$_FILES['image']['name'])));
      
   $NomArcP = $Nomb.'.'.$file_ext;
   $ArCooki5  = $Tipo .'|'. $Ruta .'|'. $Nomb .'|'. $Pagi .'|'. $NomArcP .'|'  ;
   setcookie("CSubiArc", "$ArCooki5",time() + (60*60),'/');

      if ( $BandMens ) {
      echo '$file_name: '.$file_name.'<br>';
      echo '$file_size: '.$file_size.'<br>';
      echo '$file_tmp: '.$file_tmp.'<br>';
      echo '$file_type: '.$file_type.'<br>';
      echo '$file_ext: '.$file_ext.'<br>'; }

      $extensions= array("gif","jpeg","jpg","png","pdf");
      
      $errors = "";
      if(in_array($file_ext,$extensions)=== false){
         $errors .= "La extencion no es valida, Extenciones validad (gif,jpeg,jpg,png,pdf).<br>";
         $BanEdoIm = false;
      }
      
      if($file_size > $TamaImag){
         $errors .='El archivo es mas grande de 2 MB <br>';
         $BanEdoIm = false;
      }
      
      //borrar
      if ($ancho > $AnchImag || $alto > $AltoImag)
         { //unlink($Ruta.$NomArcP);
          $errors .='El archivo no cumple las dimenciones Ancho:$AnchImag, Alto: $AltoImag  ';
          $BanEdoIm = false;
         } 
         
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$Ruta.$NomArcP);
         
         list($ancho, $alto, $tipo, $atributos) = getimagesize($Ruta.$NomArcP);

         if ( $BandMens ) {
            echo "ruta: ".$Ruta.$NomArcP."<br>";
            echo "ancho: ". $ancho."<br>";
            echo "alto: ". $alto."<br>";
            echo "Success"; }

 
      }

      //Liga
      if ( $BanEdoIm  )
       header('location: '.$Pagi);

   }
?>
<html>
   <body>
   <?php 
      echo "<br><br>";
      echo "El archivo a subir debe tener <br>";
      echo "las siguientes carcateristicas:<br>";
      echo "ancho: ". $AnchImag."<br>";
      echo "alto: ". $AltoImag."<br><br>";
      echo "<br><br>";
     if ( !$BanEdoIm )
     { 
      echo "El Archivo:".$NomArcP."<br>";
      echo "tiene las siguientes dimenciones:";
      echo "Ancho: ". $ancho."<br>";
      echo "Alto: ". $alto."<br>";
      echo $errors;
      echo "<br><br>";
      echo "<a href='#' onclick='javascript: window.close(); '>Salir</a><br><br>";
      echo "<br><br>";
     } ?>   
     <br>
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" /><br>
         <input type="submit"/>
      </form>
   </body>
</html>