<!DOCTYPE html>
<html lang="es">
<table>
<?php 
  //Imagen que se coloca en la pagina principal 
  if ( isset($_GET["Ayuda01"]) ) { ?>  
  <tr>
    <td>
      <img src="/Intranet/ComSocial/Imagen/BtnAyu01.jpg" Title="Subir " width="50px" height="50px"/>
    <td>
    <td>Imagen Pagina: Es la imagen que se 
   visualiza en la pagina principal, 
   se debe de subir la imagen de acuerdo 
   a las siguientes especificadiones: 
   alto:     ancho: 
   <img src="/Intranet/ComSocial/Imagen/BtnAyu01.jpg" Title="Subir "/>
   <td>
  </tr>
<?php } 
  //Tipo de informacion a mostra al momento de dar clik en la imagen
  if ( isset($_GET["Ayuda02"]) ) {  ?>
  <tr>
    <td>
    </td>
    <td>Documento a Mostrar: Es la informacion que se mostrara al momento de dar clik en la imagen de la pagina.
    <img src="/Intranet/ComSocial/Imagen/BtnAyu02.jpg" Title="Subir "/>
    </td>
  </tr>   
  <tr>
    <td>
      <img src="/Intranet/ComSocial/Imagen/BtnTipoN.png" Title="Subir" width="50px" height="50px"/>
    </td>
    <td>No se mostrara informacón al dar click en la imagen</td>
  </tr>  
  <tr>
    <td>
    <img src="/Intranet/ComSocial/Imagen/BtnTipoI.png" Title="Subir" width="50px" height="50px"/>
    </td>
    <td>Al dar click en la imagen, se muestra una imagen</td>
  </tr>  
  <tr>
    <td>
    <img src="/Intranet/ComSocial/Imagen/BtnTipoL.png" Title="Subir" width="50px" height="50px"/>
    </td>
    <td>Al dar click en la imagen, se muestra una paguina</td>
  </tr>  
  <tr>
    <td>
    <img src="/Intranet/ComSocial/Imagen/BtnTipoA.png" Title="Subir" width="50px" height="50px"/>
    </td>
    <td>Al dar click en la imagen, se muestra una un archivo.</td>
  </tr>  
<?php } 
  //En donde se mostrara la informacion
  if ( isset($_GET["Ayuda03"]) ) { ?>
  <tr>
    <td>
    </td>
    <td>Visualizar Información: Es la informacion que se mostrara al momento de dar clik en la imagen de la pagina que puede ser en una ventana o en otra pagina .
    <img src="/Intranet/ComSocial/Imagen/BtnAyu03.jpg" Title="Subir "/>
    </td>
  </tr>   
   <tr>
    <td>
      <img src="/Intranet/ComSocial/Imagen/BtnMostN.png" Title="Subir" width="50px" height="50px"/>
    </td>
    <td>No se mostrar la información </td>
  </tr>  
  <tr>
    <td>
    <img src="/Intranet/ComSocial/Imagen/BtnMostV.png" Title="Subir" width="50px" height="50px"/>
    </td>
    <td>Al dar click en la imagen de la pagina, la información se mostrara en una ventana (Imagen, Archivo y Paguina ).</td>
  </tr>  
  <tr>
    <td>
    <img src="/Intranet/ComSocial/Imagen/BtnTipoL.png" Title="Subir" width="50px" height="50px"/>
    </td>
    <td>Al dar click en la imagen de la pagina, la información se mostrara en una pagina(Imagen, Archivo y Paguina ).</td>
  </tr>  
 
<?php }  ?>  
</table>  
	

</body>
</html>