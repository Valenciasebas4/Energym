<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../Vista/registrar.css">
</head>
<body>

    <div style="display: flex; justify-content: center; align-items: center; margin: 1px auto; height: 540px;" class="rounded-pill panel-1 ">
        <div class="col-md-4 text-center">
            <h3>Registrar</h3>
            <form name="login" action="../Controlador/Cregistrar.php" method="POST">
                <div class="form-group ">
                    <label for="id" class="control-label"></label>
                    <input type="number" id="id" name="id" placeholder="Ingresa el ID" required class="form-control" />
                </div>
                <div class="form-group">
                    <label for="nombre" class="control-label"></label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre" required class="form-control" />
                </div>
                <div class="form-group">
                    <label for="apellido" class="control-label"></label>
                    <input type="text" id="apellido" name="apellido" placeholder="Apellido" required class="form-control" />
                </div>
                <div class="form-group">
                    <label for="fnacimiento" class="control-label"></label>
                    <input type="date" id="fnacimiento" name="fnacimiento" placeholder="Fecha de nacimiento" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="email" class="control-label"></label>
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" required class="form-control" />
                </div>
                <div class="form-group">
                    <label for="telefono" class="control-label"></label>
                    <input type="text" id="telefono" name="telefono" placeholder="Telefono" class="form-control" />
                </div>
                <div class="form-group mt-4 text-center">
                    <input type="submit" value="Registrar" class="btn btn-outline-primary" />
                    <a href="Login.php" class="btn btn-outline-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>
    <div class="custom-shape-divider-bottom-1685105879">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
    </svg>
</div>
</body>

</html>
