<?php
require '../Modelo/Usuario.php';
session_start();




$contrasena = $_POST["contrasena"];
$email = $_POST['email'];

$db = new PDO("mysql:host=localhost;dbname=dbgym", "root", "");

$id = obtenerId($email,$db);





if (validarUsuario( $contrasena,$email, $db)) {
    $nombreUsuario = obtenerNombreUsuario($id, $db);
    $rolUsuario = obtenerRol($id, $db);
    $fNacimiento = obtenerFnacimiento($id, $db);
    if ($nombreUsuario) {
        $_SESSION['id'] = $id;
        $_SESSION['fnacimiento'] = $fNacimiento;
        $_SESSION['rolUsuario'] = $rolUsuario;
        $_SESSION['nombreUsuario'] = $nombreUsuario;
        header("Location: http://127.0.0.1/Energym/vista/inicio.php");
        exit;
} else {
        header("Location: http://127.0.0.1/Energym/vista/Vregistrar.php");
        exit;
}
}else {
    $existeContrasena = existeContrasena($contrasena, $db);
    $existeEmail = existeEmail($email, $db);
    if ($existeID || $existeEmail) {
        session_start();
        $_SESSION['mensaje'] = '¡Error: Nombre de usuario o contraseña incorrectos!';
        header("Location: http://127.0.0.1/Energym/vista/login.php");
        exit;
    } else {
        $_SESSION['mensaje'] = "Registrar Usuario";
        header("Location: http://127.0.0.1/Energym/vista/Vregistrar.php");
        exit;
    }
}









// Cerrar conexión
$db = null;
?>