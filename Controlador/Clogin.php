<?php
require '../Modelo/Usuario.php';
session_start();

// Reiniciar la variable de sesión 'error'
$_SESSION['error'] = '';


$id = $_POST["id"];
$email = $_POST['email'];
$db = new PDO("mysql:host=localhost;dbname=dbgym", "root", "");



// Validar usuario
if (validarUsuario($id, $email, $db)) {
    $nombreUsuario = obtenerNombreUsuario($id, $db);
    $rolUsuario = obtenerRol($id, $db);
    $fNacimiento = obtenerFnacimiento($id, $db);
    if ($nombreUsuario) {
        $_SESSION['id'] = $id;
        $_SESSION['fnacimiento'] = $fNacimiento;
        $_SESSION['rolUsuario'] = $rolUsuario;
        $_SESSION['nombreUsuario'] = $nombreUsuario;
        // Redirigimos al usuario a la página de inicio
        header("Location: http://127.0.0.1/Energym/vista/inicio.php");
        exit;
    } else {
        $_SESSION['error'] = "Error al obtener el nombre de usuario.";
        header("Location: http://127.0.0.1/Energym/vista/Vregistrar.php");
        exit;
    }
} else {
    $existeID = existeID($id, $db);
    $existeEmail = existeEmail($email, $db);
    if ($existeID || $existeEmail) {
        $_SESSION['error'] = "El usuario ya existe.";
        header("Location: http://127.0.0.1/Energym/vista/login.php");
        exit;
    } else {
        $_SESSION['error'] = "Registrar Usuario";
        header("Location: http://127.0.0.1/Energym/vista/Vregistrar.php");
        exit;
    }
}

// Cerrar conexión
$db = null;
?>