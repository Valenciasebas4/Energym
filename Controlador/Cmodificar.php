<?php
session_start();
require '../Modelo/Usuario.php';

$id = $_POST["id"];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fnacimiento = $_POST['fnacimiento'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$fregistro = $_POST['fregistro'];
$rol = $_POST['rol'];
$db = new PDO("mysql:host=localhost;dbname=dbgym", "root", "");


if (editarUsuario($id, $nombre, $apellido, $fnacimiento, $email, $telefono,$fregistro,$rol, $db)) {
    // Redirige al usuario a la página
    header("Location: http://127.0.0.1/Energym/vista/Vconsulta.php");
    exit; // Termina la ejecución del script
} else {
    echo "Error al crear usuario o el usuario ya existe";
}
// Cerrar conexión
$db = null;


?>