<?php 
session_start();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="rclases.css">

</head>
<body>
    
<?php include 'header.php'?>

<div style="display: flex; justify-content: center; align-items: center; margin: 50px auto; height: 80.8vh;" class="rounded-pill panel-1 ">
  <div class="col-md-6 ">
    <div class="card mt-4">
      <div class="card-body">
        <h2 class="card-title">Formulario de Entrenamientos</h2>
        <form name='Entrenamientos' action='../Controlador/Cclases.php' method='POST'>
          <div class="form-group">
            <label for="ClasePersonalizada">Clase personalizada:</label>
            <select class="form-control" id="ClasePersonalizada" name="ClasePersonalizada">
              <option value="Ninguna">Ninguna</option>
              <option value="Zumba">Zumba</option>
              <option value="Yoga">Yoga</option>
              <option value="Abdomen">Abdomen</option>
              <option value="Pierna">Pierna</option>
              <option value="Bíceps">Bíceps</option>
              <option value="Tríceps">Tríceps</option>
              <option value="Cardio">Cardio</option>
            </select>
          </div>
          <div class="form-group">
            <label for="FechaClase" class="control-label">Fecha de clase:</label>
            <input type="date" id="FechaClase" name="FechaClase" class="form-control" />
          </div>
          <div class="form-group mt-4 text-center">
            <input type="submit" value="Guardar" class="btn btn-outline-primary" />
            <input type="reset" value="Eliminar" class="btn btn-outline-danger" />
            <a href="Vperfil.php" class="btn btn-outline-warning">Regresar</a>
          </div>
        </form>
      </div>
    </div>
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