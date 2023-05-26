<?php session_start(); ?>

<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Consultar</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp' crossorigin='anonymous'>
    <link rel="stylesheet" href="consulta.css">
</head>
<body>
<?php include 'header.php'?>

    <div style="display: flex; justify-content: center; align-items: center; height: 789px;" class="rounded-pill panel-1 ">
        <div class="col-md-4 text-center">
            <h3 class="titulo">Tipo de Consulta</h3>
            <form name="login" action="Vmostrar.php" method="POST">
                <div class="form-group">
                    <select name="tipo" class="form-select" aria-label="Default select example" >
                    <option name="tipo" value="todo">Mostar DB completa</option>
                    <option name="tipo" value="id">Buscar ID</option>
                    <option name="tipo" value="nombre">Buscar Nombre</option>
                    <option name="tipo" value="apellido">Buscar Apellido</option>
                    <option name="tipo" value="email">Buscar Email</option>
                    <option name="tipo" value="telefono">Buscar Telefono</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="consulta" class="control-label"></label>
                    <input type="text" id="consulta" name="consulta" placeholder="Ingresa el dato a consultar" class="form-control" />
                </div>
                <div class="form-group mt-4 text-center">
                    <input type="submit" value="Consultar" class="btn btn-outline-primary" />
                    <a href="inicio.php" class="btn btn-outline-secondary">Volver</a>
                </div>
            </form>
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
