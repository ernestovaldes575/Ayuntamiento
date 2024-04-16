<?php
$ArCooki6 = $_COOKIE['CSubiArc'];
$ASubiArc = explode("|", $ArCooki6);
$Tipo = $ASubiArc[0]; 
$Ruta = $ASubiArc[1]; 
$Nomb = $ASubiArc[2]; 
$Pagi = $ASubiArc[3]; 

      echo '$Tipo'.$Tipo.'<br>';
      echo '$Ruta'.$Ruta.'<br>';
      echo '$Nomb'.$Nomb.'<br>';
      echo '$Pagi'.$Pagi.'<br>';


   if(isset($_FILES['image'])){

      $ArCooki4 = $_COOKIE['CSubiArc'];
      $ASubiArc = explode("|", $ArCooki4);
      $Tipo = $ASubiArc[0]; 
      $Ruta = $ASubiArc[1]; 
      $Nomb = $ASubiArc[2]; 
      $Pagi = $ASubiArc[3]; 

      echo '$Tipo'.$Tipo.'<br>';
      echo '$Ruta'.$Ruta.'<br>';
      echo '$Nomb'.$Nomb.'<br>';
      echo '$Pagi'.$Pagi.'<br>';
      
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp  = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext  = strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $NomArcP = $Nomb.'.'.$file_ext;
      $ArCooki5  = $Tipo .'|'. $Ruta .'|'. $Nomb .'|'. $Pagi .'|'. $NomArcP .'|'  ;
      setcookie("CSubiArc", "$ArCooki5",time() + (60*60*24*90),'/');


      echo '$file_name: '.$file_name.'<br>';
      echo '$file_size: '.$file_size.'<br>';
      echo '$file_tmp: '.$file_tmp.'<br>';
      echo '$file_type: '.$file_type.'<br>';
      echo '$file_ext: '.$file_ext.'<br>';

      $extensions= array("gif","jpeg","jpg","png","pdf");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="La extencion no es valida, Extenciones validad (gif,jpeg,jpg,png,pdf).";
      }
      
      if($file_size > 2097152){
         $errors[]='El archivo es mas grande de 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$Ruta.$NomArcP);
         echo "Success";
      }else{
         print_r($errors);
      }

      //Liga
      header('location: '.$Pagi);

   }
?>
<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      
   </body>
</html>