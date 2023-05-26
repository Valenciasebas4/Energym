<?php
require '../Modelo/Clases.php';
session_start();

setlocale(LC_TIME, 'es_ES'); // Establecer la configuración regional en español

$UsuarioID = $_SESSION['id'];

$ClasePersonalizada = $_POST['ClasePersonalizada'];
$FechaClase = $_POST['FechaClase'];
$DiaSemana = date('l', strtotime($FechaClase));

$db = new PDO("mysql:host=localhost;dbname=dbgym", "root", "");

// Verificar si el usuario ya tiene una clase programada para la fecha seleccionada
$query = "SELECT COUNT(*) as count FROM entrenamientos WHERE FechaClase = :fecha AND UsuarioID = :usuarioID";
$statement = $db->prepare($query);
$statement->bindParam(':fecha', $FechaClase);
$statement->bindParam(':usuarioID', $UsuarioID);
$statement->execute();

$row = $statement->fetch(PDO::FETCH_ASSOC);
$clasesExistentes = $row['count'];

if ($clasesExistentes > 0) {
    // El usuario ya tiene una clase programada para la fecha seleccionada, mostrar un mensaje de error o realizar alguna acción adecuada
    $_SESSION['mError'] = "El usuario ya tiene una clase programada para la fecha seleccionada.";
} else {
    // El usuario no tiene una clase programada para la fecha seleccionada, proceder con la inserción en la base de datos
    guardarClases($UsuarioID, $FechaClase, $DiaSemana, $ClasePersonalizada, $db);
    $_SESSION['mError'] = "Clase programada para la fecha seleccionada.";
}

header("Location: http://127.0.0.1/Energym/vista/Vperfil.php");

$db = null;
?>