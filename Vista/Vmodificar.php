<?php 
session_start();

//Conectar a la base de datos
$db = new PDO("mysql:host=localhost;dbname=dbgym", "root", "");

//Se capturan los datos que envia el form desde Vconsulta

$id = $_POST['editar'];


// Ejecutar la consulta y obtener los resultados
$query = "SELECT * FROM usuarios WHERE id = $id";
$resultado = $db->query($query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp' crossorigin='anonymous'>
    <link rel="stylesheet" href="consulta.css">
</head>
<body>

<?php include 'header.php'?>

<div style="display: flex; justify-content: center; align-items: center; margin: 20px auto; height: 100vh;" class="rounded-pill panel-1 ">
        <div class="col-md-4 text-center">
            <h3>Modificar</h3>
             <?php
             while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                echo "                
                <form name='modificar' action='../Controlador/Cmodificar.php' method='POST'>
                    <div class='form-group'>
                        <label for='id' class='form-label' >ID:</label>
                        <input type='number' id='id' name='id' value='" . $fila["id"] . "' readonly  required class='form-control'>
                    </div>
                    <div class='form-group'>
                        <label for='nombre'>Nombre:</label>
                        <input type='text' id='nombre' name='nombre' value='" . $fila["nombre"] . "' required class='form-control'>
                    </div>
                    <div class='form-group'>
                        <label for='apellido'>Apellido:</label>
                        <input type='text' id='apellido' name='apellido' value='" . $fila["apellido"] . "' required class='form-control'>
                    </div>
                    <div class='form-group'>
                        <label for='fnacimiento'>F.Nacimiento:</label>
                        <input type='date' id='fnacimiento' name='fnacimiento' value='" . $fila["fnacimiento"] . "' required class='form-control'>
                    </div>
                    <div class='form-group'>
                        <label for='email'>Email:</label>
                        <input type='email' id='email' name='email' value='" . $fila["email"] . "' required class='form-control'>
                    </div>
                    <div class='form-group'>
                        <label for='telefono'>Télefono:</label>
                        <input type='text' id='telefono' name='telefono' value='" . $fila["telefono"] . "' required class='form-control'>
                    </div>
                    <div class='form-group'>
                        <label for='fregistro'>F.Registro:</label>
                        <input type='date' id='fregistro' name='fregistro' value='" . $fila["fregistro"] . "' readonly  required class='form-control' >
                    </div>
                    <div class='form-group'>
                        <label for='rol' class='control-label'></label>
                        <input type='text' id='rol' name='rol' value=' " . $fila["rol"] . "' class='form-control' />
                    </div>
                    <div class='form-group mt-4 text-center'>
                        <input type='submit' value='Modificar' class='btn btn-outline-primary' />
                        <a href='Vconsulta.php' class='btn btn-outline-secondary'>Volver</a>
                    </div>
                </form>"; 
             }
             ?>
        </div>
    </div>
</body>
<footer class="footer bg-dark text-light text-center">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <p>&copy; 2023 Mi Sitio Web. Todos los derechos reservados.</p>
                <p style="color: white;">Creado por ****** &copy;<?=date('Y')?></p>
            </div>
            </div>
        </div>
</footer>
</html>