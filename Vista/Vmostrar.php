<?php
session_start();
//Conectar a la base de datos
$db = new PDO("mysql:host=localhost;dbname=dbgym", "root", "");

//Se capturan los datos que envia el form desde Vconsulta
$tipo = $_POST['tipo'];
$consulta = $_POST['consulta'];


switch ($tipo) {
  case 'todo':
    // Preparar la consulta SQL
    $query = "SELECT * FROM usuarios ";
    break;
  case 'id':
    // Preparar la consulta SQL
    $query = "SELECT * FROM usuarios WHERE id like '$consulta%'";
    break;
    case 'nombre':
      $query = "SELECT * FROM usuarios WHERE nombre like '$consulta%'";
      break;
      case 'apellido':
        $query = "SELECT * FROM usuarios WHERE apellido like '$consulta%'";
        break;
        case 'email':
          $query = "SELECT * FROM usuarios WHERE email like '$consulta%'";
          break;
          case 'telefono':
            $query = "SELECT * FROM usuarios WHERE telefono like '$consulta%'";
            break;
  default:
    # code...
    break;
}

// Ejecutar la consulta y obtener los resultados
$resultado = $db->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp' crossorigin='anonymous'>
    <link rel="stylesheet" href="mostrar.css">
</head>
<body>
    
<?php include 'header.php'?>

<div style="display: flex; justify-content: center; align-items: center; margin: 5px auto; height: 100vh;" class="rounded-pill panel-1 ">
        <div class="col-md-8 text-center">
            <h3>Modificar</h3>
            <form name="login" action="Vmodificar.php" method="POST">
                <div class="form-group">
                    <label for="editar" class="control-label"></label>
                    <input type="text" id="editar" name="editar" placeholder="Ingresa el ID a editar" class="form-control" />
                </div>
                <div class="form-group mt-4 text-center">
                    <input type="submit" value="Editar" class="btn btn-outline-primary" />
                    <a href="Vconsulta.php" class="btn btn-outline-secondary">Regresar</a>
                </div>
            </form>
            <table class='table table-striped' style="margin: 40px auto">
                <thead>
                  <tr>
                    <th scope='col'>#ID</th>
                    <th scope='col'>NOMBRE</th>
                    <th scope='col'>APELLIDO</th>
                    <th scope='col'>FECHA DE NACIMIENTO</th>
                    <th scope='col'>EMAIL</th>
                    <th scope='col'>TELEFONO</th>
                    <th scope='col'>FECHA REGISTRO</th>
                    <th scope='col'>ROL</th>
                  </tr>
                </thead>
                <?php
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tbody>
                              <tr>
                                <th scope='row'>".$fila['id']."</td>
                                <td>".$fila['nombre']."</td>
                                <td>".$fila['apellido']."</td>
                                <td>".$fila['fnacimiento']."</td>
                                <td>".$fila['email']."</td>
                                <td>".$fila['telefono']."</td>
                                <td>".$fila['fregistro']."</td>
                                <td>".$fila['rol']."</td>
                              </tr>
                          </tbody>";
                    }
                ?>
              </table>
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