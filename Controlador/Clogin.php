<?php
require '../Modelo/Usuario.php';
session_start();




$contrasena = $_POST["contrasena"];
$email = $_POST['email'];

$db = new PDO("mysql:host=localhost;dbname=dbgym", "root", "");

$id = obtenerId($email,$db);

    $nombreUsuario = obtenerNombreUsuario($id, $db);
    $rolUsuario = obtenerRol($id, $db);
    $fNacimiento = obtenerFnacimiento($id, $db);

if (validarUsuario( $contrasena,$email, $db)) {
        $_SESSION['id'] = $id;
        $_SESSION['fnacimiento'] = $fNacimiento;
        $_SESSION['rolUsuario'] = $rolUsuario;
        $_SESSION['nombreUsuario'] = $nombreUsuario;
        header("Location: http://127.0.0.1/Energym/vista/inicio.php");
        exit;
} else {
    $_SESSION['contrasena'] = $contrasena;
    $_SESSION['email'] = $email;
        header("Location: http://127.0.0.1/Energym/vista/Vregistrar.php");
        exit;
}








// Cerrar conexión
$db = null;
?>