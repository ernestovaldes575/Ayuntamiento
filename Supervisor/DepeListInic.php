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

$ClavAyun = 105;

// Consulta SQL para obtener todos los registros de la tabla alumnos
$InstSql = "SELECT SUnidad,CUNClaveUnidad,CUNDescripcion ". 
        "FROM etsupeunid ". 
        "INNER JOIN acceso.ACUnidades ON SUnidad=CUNConsecutivo ". 
        "WHERE SAyuntamiento = '".$ClavAyun."' ";
echo("Instruccion SQL $InstSql <br>");
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
echo(" json tabla $InfoTabl_json <br>");
?>
