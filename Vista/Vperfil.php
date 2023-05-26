
<?php

session_start();
//Conectar a la base de datos
$db = new PDO("mysql:host=localhost;dbname=dbgym", "root", "");

//Se captura el valor de la session ID creada en el login
$id = $_SESSION['id'];





$query = "SELECT nombre,apellido,fnacimiento,telefono,email,fregistro FROM usuarios WHERE id = '$id' ";
$resultado = $db->query($query); // Se obtiene la consulta preparada 

$query2 = "SELECT FechaClase,DiaSemana,ClasePersonalizada FROM entrenamientos WHERE UsuarioID = '$id' ";
$resultado2 = $db->query($query2); // Se obtiene la consulta preparada 


$fechaLimite = date('Y-m-d', strtotime('-5 days'));

$query = "DELETE FROM entrenamientos WHERE FechaClase < '$fechaLimite'";
$db = new PDO("mysql:host=localhost;dbname=dbgym", "root", "");
$db->exec($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../Vista/perfil.css">
</head>
<body>

<?php include 'header.php'?>

<div class="banner">
    <div class="container mt-4">
        <div class="row align-items-center main">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Perfil del Gimnasio</h3>
                    </div>
                    <div class="card-body">
                       <!-- <div class="text-center"> 
                        <img src="ruta-de-la-imagen.jpg" alt="Foto de perfil" class="img-fluid rounded-circle" style="width: 150px;">
                        </div> -->
                        <?php
                        $fechaNacimiento = $_SESSION['fnacimiento'];
                        $fechaActual = date("Y-m-d");
                        $edad = date_diff(date_create($fechaNacimiento), date_create($fechaActual));
                        $anios = $edad->format('%y');
                            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) { //Se ejecuta el while para obtener los datos del usuario
                                echo "
                                
                                <h4 class='text-center mt-3'>Nombre: ".$fila['nombre']." ".$fila['apellido']."</h4>
                                <p class='text-center'>Edad: ".$anios." Años</p>
                                <p class='text-center'>Email: ".$fila['email']."</p>
                                <p class='text-center'>Miembro desde: ".$fila['fregistro']."</p>
                                ";
                                }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mt-4 text-center">
          <a href="Vclases.php" class="btn btn-primary">Registrar Clase</a>
        </div>
    </div>
</div>

<div class="calendar">
    <h1>Calendario de entrenamientos</h1>
    <p>*Las clases se eliminaran pasado 5 días*</p>
    <p>*No puedes agregar más de una clase en la misma fecha*</p>
    <div id="events-container">
    <?php if (isset($mensajeError) && !empty($mensajeError)) { ?>
    <div class="alert alert-danger">
        <?php echo $mensajeError; ?>
    </div>
<?php } ?>   
      <?php

        // Verificar si hay resultados
        if ($resultado2->rowCount() > 0) {
          // Mostrar los resultados en HTML
          while($row = $resultado2->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="event">';
            echo '<h2 class="event-title">' . $row['ClasePersonalizada'] . '</h2>';
            echo '<p class="event-date">' . $row['DiaSemana'] . '</p>';
            echo '<p class="event-date">' . $row['FechaClase'] . '</p>';
            echo '</div>';
          }
        } else {
          echo '<p>No se encontraron entrenamientos para este usuario.</p>';
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
<style>
    /* Estilos del calendario */
    .calendar {
      width: 100%;
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }
    .event {
      margin-bottom: 10px;
      padding: 10px;
      background-color: #f2f2f2;
      border-radius: 4px;
    }
    .event-title {
      font-weight: bold;
      margin: 0;
    }
    .event-date {
      margin: 0;
    }
  </style>