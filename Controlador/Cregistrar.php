<?php
require '../Modelo/Usuario.php';
session_start();
$id = $_POST["id"];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fnacimiento = $_POST['fnacimiento'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$fregistro = date('Y-m-d');
$rol = "user";
$contrasena = $_POST['contrasena'];
$db = new PDO("mysql:host=localhost;dbname=dbgym", "root", "");





if (validarContrasena($contrasena)) {
    if (validarCrearUsuario($id, $nombre, $apellido, $fnacimiento, $email, $telefono,$fregistro,$rol,$contrasena, $db)) {
        // Redirige al usuario a la página
        header("Location: http://127.0.0.1/Energym/vista/Login.php");
        exit; // Termina la ejecución del script
    } else {
        echo "Error al crear usuario o el usuario ya existe";
    }
} else {
    echo 'La contraseña no cumple con los requisitos de seguridad.' .$contrasena;
}


    





// Cerrar conexión
$db = null;


?>