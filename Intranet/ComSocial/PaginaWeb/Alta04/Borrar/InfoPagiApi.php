<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'comsocial';

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $InstSql = "SELECT LConsecut,LEjercicio,LMesRegi,". 
                       "RTRIM(LTitulo),RTRIM(LDescripcion),LFechAlta, ".
                       "RTRIM(LImagen), LAbrirLiDoIm, ". 
                       "RTRIM(LAImagDocu), RTRIM(LLiga), LVentRefe, ". 
                       "RTRIM(LSenaSord), RTRIM(CTDCarpeta), LEstaSegu ".
               "FROM    stlayers ".
               "INNER JOIN sctipodocu ON ctdclave = LTipoDocu ".				
               "WHERE  LAyuntamiento = '".$ClavAyun."' AND ".
                       "LUnidad =".$ConsUnid." AND ".
                       "LEjercicio = '".$EjerTrab."' AND ".
                       "LTipoDocu = '".$TipoDocu."' AND ". 
                       "LEstaSegu = '".$EstaRevi."' AND ".
                       "LEstado = 'A' ";
 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    
        // Consulta la base de datos para obtener los datos del alumno por su ID
        $InstSql .= "AND LConsecut=" .$id;
    } 
        
    $result = $mysqli->query($query);
    $alumnos = array();
   
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $alumnos[] = $row;
        }

        echo json_encode($alumnos);
    } else {
        echo json_encode(['error' => 'No se pudieron recuperar los alumnos']);
    }
}

$mysqli->close();
?>
