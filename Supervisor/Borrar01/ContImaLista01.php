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

// Consulta SQL para obtener todos los registros de la tabla alumnos
$sql = "SELECT LConsecut, LTitulo, LDescripcion, LImagen  FROM stlayers";
$resultado = $conexion->query($sql);

// Crear un arreglo para almacenar los datos
$InfoTabl = array();

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $InfoTabl[] = $fila;
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();

// Convertir el arreglo de InfoTabl a formato JSON
$InfoTabl_json = json_encode($InfoTabl);

?>
<!-- Mostrar la tabla HTML con los botones -->
<table border='1'>
    <thead>
        <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido 2</th>
                <th>Edad 2</th>
                <th>Acciones</th>
            </tr>
    </thead>
    <tbody>
<?php
if (!empty($InfoTabl)) {
    foreach ($InfoTabl as $RegiTabl) { ?>
        <tr> 
          <td><?=$RegiTabl['LConsecut']?></td>
          <td><?=$RegiTabl['LTitulo']?></td>
          <td><?=$RegiTabl['LDescripcion']?></td>
          <td><?=$RegiTabl['LImagen']?></td>
          <td><button onclick='modificar(" . $RegiTabl['LConsecut'] . ")'>Modificar</button>
              <button onclick='eliminar(" . $RegiTabl['LConsecut'] . ")'>Eliminar</button>
          </td>
        </tr>
<?php    }
} ?>

  </tbody>
 </table>


<script>
    function modificar(id) {
        // Implementa aquí la lógica para la modificación
        console.log('Modificar el alumno con ID ' + id);
    }

    function eliminar(id) {
        // Implementa aquí la lógica para la eliminación
        console.log('Eliminar el alumno con ID ' + id);
    }
</script>
