<?php
// Configuración de la conexión a la base de datos
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "comsocial";

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$ClavAyun = '105';

//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$ConUniTr = $ABusqMae[0]; 
$ClaUniTr = $ABusqMae[1];
$DesUniTr = $ABusqMae[2];

// Consulta SQL para obtener todos los registros de la tabla alumnos
$InstSql =  "SELECT SConsecut, SNumeEmpl, SServPubli, SCategoria, SFoto ". 
            "FROM  stsupervisor ".
            "WHERE SAyuntamiento = '".$ClavAyun."' AND ".
                "SUnidad =".$ConUniTr." AND ".
                "SEstado = 'A' ". 
            "ORDER BY SNumeEmpl";
$resultado = $conexion->query($InstSql);

// Crear un arreglo para almacenar los datos
$InfoTabl = array();

// Verificar si hay resultados
if ($resultado->num_rows > 0) 
    while ($fila = $resultado->fetch_assoc()) 
        $InfoTabl[] = $fila;

        // Cerrar la conexión a la base de datos
$conexion->close();

// Convertir el arreglo de InfoTabl a formato JSON
$InfoTabl_json = json_encode($InfoTabl);

?>
