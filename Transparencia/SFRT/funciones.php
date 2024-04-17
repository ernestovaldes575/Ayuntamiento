<?php

require 'variable.php';

function printCSSlibs($libs){


    $cnt='';
    $cnt=$cnt.((isset($libs["css_slider"]))?'<link href="./css/contenido.css" rel="stylesheet">':'');
    $cnt=$cnt.((isset($libs["animate"]))?'<link href="./css/owl.carousel.css" rel="stylesheet">':'');
    $cnt=$cnt.((isset($libs["doc"]))?'<link href="./css/owl.theme.default.css" rel="stylesheet">':'');
    $cnt=$cnt.((isset($libs["pie"]))?'<link href="./css/pie.css" rel="stylesheet">':'');
    $cnt=$cnt.((isset($libs["menu"]))?'<link href="./css/menu.css" rel="stylesheet">':'');
    $cnt=$cnt.((isset($libs["cabildo"]))?'<link href="./css/cabildo.css" rel="stylesheet">':'');
    $cnt=$cnt.((isset($libs["dir"]))?'<link href="./css/dir.css" rel="stylesheet">':'');
    $cnt=$cnt.((isset($libs["vcabildos"]))?'<link href="./css/vcabildos.css" rel="stylesheet">':'');
    $cnt=$cnt.((isset($libs["normatividad"]))?'<link href="./css/normatividad.css" rel="stylesheet">':'');
    $cnt=$cnt.((isset($libs["conac"]))?'<link href="./css/conac.css" rel="stylesheet">':'');
    $cnt=$cnt.((isset($libs["avisos"]))?'<link href="./css/avisos.css" rel="stylesheet">':'');
    $cnt=$cnt.((isset($libs["desarrollo"]))?'<link href="./css/desarrollo.css" rel="stylesheet">':'');
    $cnt=$cnt.((isset($libs["noticias"]))?'<link href="./css/noticias.css" rel="stylesheet">':'');
    $cnt=$cnt.((isset($libs["datos"]))?'<link href="./css/datos.css" rel="stylesheet">':'');
    $cnt=$cnt.((isset($libs["contacto"]))?'<link href="./css/contacto.css" rel="stylesheet">':'');
    $cnt=$cnt.((isset($libs["vacantes"]))?'<link href="./css/vacantes.css" rel="stylesheet">':'');
    echo $cnt;
}

function printJSlibs($libs){
    $cnt='';
    
    $cnt=$cnt.((isset($libs["jquery"]))? '<script type="text/javascript" src="./js/jquery.js"></script>':'');
    $cnt=$cnt.((isset($libs["carrucel_lib"]))? '<script type="text/javascript" src="./js/owl.carousel.min.js"></script>':'');
    $cnt=$cnt.((isset($libs["slider"]))? '<script type="text/javascript" src="./js/slider.js"></script>':'');
    $cnt=$cnt.((isset($libs["menujs"]))? '<script type="text/javascript" src="./js/menu.js"></script>':'');
    $cnt=$cnt.((isset($libs["noticias"]))? '<script type="text/javascript" src="./js/noticias.js"></script>':'');
    $cnt=$cnt.((isset($libs["todasnoticias"]))? '<script type="text/javascript" src="./js/todas.js"></script>':'');
    $cnt=$cnt.((isset($libs["reporte"]))? '<script type="text/javascript" src="./js/reportes.js"></script>':'');
    echo $cnt;

}

//conexion
function conectar_my_consulta($consultaSQL){
    $mysqli_obj = new mysqli(bd_host, bd_user, bd_password, bd_name, bd_port);
    $mysqli_obj->set_charset("utf8");
    $my_result=$mysqli_obj->query($consultaSQL);
    $mysqli_obj->close();
    return $my_result;
}

//obtener boleano para ver que tipo de bd se usara
function obtenerBooleanDesdeExecucion($sql_statment,$usa_postgis,$sql_alternativo){
    $pg_res=null;
    
    $res=false;
    
    if(bd_use=="postgresql"){
        if(bd_permite_postgis){
            //no importa si la consulta usa o no postgis, cualquiera se ejecutara
            $pg_res=  conectar_pg_consulta($sql_statment);
        }else{
           if($usa_postgis){
               $pg_res=  conectar_pg_consulta($sql_alternativo);
           }else{
               $pg_res=  conectar_pg_consulta($sql_statment);
           }
        }
        //pg_res tuvo que haber devuelto un array de dos domensiones
        if($pg_res){
         $res=TRUE;   
        } 
    } //fin de si es postgres
    if(bd_use=="mysql"){
        //logicamente no se permite postgis
        //si la consulta usa postgis
        //se tendra que usar el alternativo
        $result_my=null;
        if($usa_postgis){
            //usar la funcion de condulta que haya echo, pero usando el sql
            //alternativo
            $result_my=  conectar_my_consulta($sql_alternativo);
            
        }else{
            //usar la funcion de condulta que haya echo, pero usando el sql
            //que esta primero
            $result_my=  conectar_my_consulta($sql_statment);
            
        }
        
        if($result_my){
            $res=TRUE;
        }
    }
    
    return $res;
}

//obtener array de la consulta
function obtenerArrayDesdeConsulta($sql_statment,$usa_postgis,$sql_alternativo){
    $pg_res=null;
    $array_data=array();

    //print_r($array_data);
    
    if(bd_use=="postgresql"){
        if(bd_permite_postgis){
            //no importa si la consulta usa o no postgis, cualquiera se ejecutara
            $pg_res=  conectar_pg_consulta($sql_statment);
        }else{
           if($usa_postgis){
               $pg_res=  conectar_pg_consulta($sql_alternativo);
           }else{
               $pg_res=  conectar_pg_consulta($sql_statment);
           }
        }
        //pg_res tuvo que haber devuelto un array de dos domensiones
        if($pg_res){
            $numRegistros=  pg_num_rows($pg_res);
            for($i=0;$i<$numRegistros;$i++){
            $array_data[$i]=array();

        
            $num_fields=pg_num_fields($pg_res);
            /* @var $num_fields type */
            for($h=0;$h<$num_fields;$h++){
                $array_data[$i][$h]=  pg_fetch_result($pg_res, $i, $h);
            }
            }
        } 
    }
    
    if(bd_use=="mysql"){
        //logicamente no se permite postgis
        //si la consulta usa postgis
        //se tendra que usar el alternativo
        $result_my=null;
        if($usa_postgis){
            //usar la funcion de condulta que haya echo, pero usando el sql
            //alternativo
            $result_my=  conectar_my_consulta($sql_alternativo);
            
        }else{
            //usar la funcion de condulta que haya echo, pero usando el sql
            //que esta primero
            $result_my=  conectar_my_consulta($sql_statment);
            
        }
        
        if($result_my){
            $num_reg=$result_my->num_rows;
            for ($i=0;$i<$num_reg;$i++){
                $renglon=$result_my->fetch_array(MYSQLI_BOTH);
                //$renglon=$result_my->fetch_array(MYSQL_NUM);
                $array_data[$i]=array();
                $num_fiel=$result_my->field_count;
                for ($h=0;$h<$num_fiel;$h++){
                    $array_data[$i][$h]=$renglon[$h];
                }
                
            }
        }
    }
    return $array_data;  
    
}

function GuardarReporte($sql){

    if(bd_use=="mysql"){

        $result_my=  conectar_my_consulta($sql);
            
    }

 
 return $result_my;

}


?>