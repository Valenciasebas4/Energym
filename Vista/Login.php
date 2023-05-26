<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
</head>
  <body>


    <div style="display: flex; justify-content: center; align-items: center; margin: 38px auto; height: 550px;">
        <div class="col-md-4 text-center">
            <h3>Iniciar Sesión</h3>
            <form name="login" action="../Controlador/Clogin.php" method="POST">
                <div class="form-group">
                    <label for="email" class="control-label"></label>
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" required class="form-control" />
                </div>
                <div class="form-group">
                    <label for="id" class="control-label"></label>
                    <input type="password" value="FakePSW" id="myInput" name="id" placeholder="Ingresa tu ID" required class="form-control" />
                    <input type="checkbox" onclick="myFunction()">Ver Contraseña
                </div>
                <div class="form-group mt-4 text-center">
                    <input type="submit" value="Iniciar Sesión" class="btn btn-outline-primary" />
                    <a href="Vregistrar.php" class="btn btn-outline-success">Registrar nuevo usuario</a>
                    <a href="index.php" class="btn btn-outline-warning">Regresar</a>
                </div>
            </form>
        </div>
    </div>



</body>

</html>
<script>
    function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
    x.type = "text";
    } else {
    x.type = "password";
    }
    }
</script>