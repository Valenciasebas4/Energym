
<?php
// Inicia la sesión
session_start();


// Si la sesión existe y ha estado inactiva por más de 5 minutos, la destruimos
if (isset($_SESSION['ultimoAcceso']) && (time() - $_SESSION['ultimoAcceso'] > 300)) {
    session_unset(); // Limpiamos las variables de sesión
    session_destroy(); // Destruimos la sesión
    header("Location: http://127.0.0.1/Energym/vista/index.php?sessionExpired=true");
    exit;
}

// Actualizamos el tiempo de último acceso
$_SESSION['ultimoAcceso'] = time();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
   <link rel="stylesheet" href="inicio.css">
    
</head>
<body>
    
<?php include 'header.php'?>
    
    <div class="banner">
        <div class="container">
            <h1>Gimnasio ENERGYM</h1>
            <p>Tu lugar para alcanzar tus metas de fitness</p>
            <a href="#" class="btn btn-outline-primary">Más información</a>
        </div>
    </div>

    <div class="container sec-1 panel-1 rounded-pill">
        <div class="jumbotron text-center">
            <h1 class="display-4">Potencia tu cuerpo, nutre tu mente</h1>
            <p class="lead">¡Descubre los valores excepcionales de nuestro gimnasio!</p>
        </div>
    </div>

    <div class="container sec-1 panel-2 rounded-end-pill text-center">
        <div class="row">
            <div class="col-md-4">
                <h2>Información del gimnasio</h2>
                <p>Nuestro gimnasio es un lugar de vanguardia dedicado a promover el bienestar físico y mental de nuestros miembros. Nos enorgullece ofrecer instalaciones de primer nivel, una amplia gama de servicios y un enfoque integral para ayudar a nuestros clientes a alcanzar sus metas de acondicionamiento físico.</p>
                <a href="info.php" class="btn btn-primary">Más información</a>
            </div>
            <div class="col-md-4">
                <h2>Horarios</h2>
                <p>Horarios de apertura y cierre.</p>
            </div>
            <div class="col-md-4">
                <h2>Contacto</h2>
                <p>Dirección del gimnasio:</p>
                <p>Número de teléfono:</p>
                <p>Correo electrónico:</p>
            </div>
        </div>
    </div>

    <div class="container sec-1 panel-3 rounded-5 text-center">
        <h2>Servicios</h2>

        <div class="service">
            <h3>Entrenamiento personalizado</h3>
            <p>El servicio de entrenamiento personalizado es un programa diseñado específicamente para ayudarte a alcanzar tus objetivos de acondicionamiento físico de manera efectiva y segura. Está diseñado y dirigido por un entrenador personal certificado que tiene experiencia en el campo del fitness y la salud.</p>
        </div>

        <div class="service">
            <h3>Clases grupales</h3>
            <p>El servicio de clases grupales es una opción de entrenamiento en la que te unes a un grupo de personas con objetivos similares para participar en sesiones de ejercicio dirigidas por un instructor calificado. Estas clases se llevan a cabo en un entorno grupal y suelen ser energéticas, motivadoras y divertidas.</p>
        </div>

        <div class="service">
            <h3>Áreas de musculación</h3>
            <p>El servicio de áreas de musculación es un espacio dedicado al entrenamiento de fuerza y desarrollo muscular. Estas áreas se encuentran comúnmente en gimnasios, centros deportivos o instalaciones fitness. Proporcionan una amplia gama de equipos y herramientas diseñadas específicamente para ayudar a los usuarios a trabajar y fortalecer los diferentes grupos musculares de su cuerpo.</p>
        </div>
    </div>

    <div class="container sec-1 panel-4 text-center">
        <h2>Instalaciones</h2>
        <div class="gallery">
            <img src="../Vista/img/img-gym/section-2.jpeg" class="rounded-4" alt="Instalación 1">
            <img src="../Vista/img/img-gym/section-3.jpeg" class="rounded-4" alt="Instalación 2">
            <!-- Agrega más imágenes según sea necesario -->
        </div>
    </div>

    <div class="container sec-2 panel-5  rounded text-center">
        <h1>Clases y Horarios</h1>
        <div class="class row align-items-center">
            <div class="col">
                <img src="../Vista/img/img-clases/yoga-white-100.png" >
                <h2>Yoga</h2>
            </div>
            <div class="col">
                <p>Tipo de entrenamiento: Ejercicios de estiramiento y posturas corporales enfocadas en la respiración y la relajación.</p>
                <p>Beneficios: Mejora de la flexibilidad, reducción del estrés, fortalecimiento muscular y aumento de la concentración.</p>
                <p>Horario: Lunes y Miércoles de 9:00 AM a 10:30 AM</p>
            </div>
            <hr style="color: white">
        </div>

        <div class="class row align-items-center">
            <div class="col">
                <img src="../Vista/img/img-clases/zumba-white-100.png"  >
                <h2>Zumba</h2>
            </div>
            <div class="col">
                <p>Tipo de entrenamiento: Baile aeróbico que combina ritmos latinos y movimientos de fitness.</p>
                <p>Beneficios: Quema de calorías, mejora de la resistencia cardiovascular, tonificación muscular y aumento de la energía.</p>
                <p>Horario: Martes y Jueves de 6:00 PM a 7:00 PM</p>
            </div>   
            <hr style="color: white"> 
        </div>

        <div class="class row align-items-center">
            <div class="col">
                <img src="../Vista/img/img-clases/pilates-white-100.png" >
                <h2>Pilates</h2>
            </div>
            <div class="col">
                <p>Tipo de entrenamiento: Ejercicios de bajo impacto que se enfocan en fortalecer los músculos centrales del cuerpo.</p>
                <p>Beneficios: Mejora de la postura, fortalecimiento de los músculos abdominales y dorsales, aumento de la flexibilidad y reducción del estrés.</p>
                <p>Horario: Viernes de 10:00 AM a 11:00 AM</p>
            </div>   
        </div>
    </div>

    <div class="container sec-2 panel-6 text-center">
        <h1>Entrenadores</h1>
        <div class="class row align-items-center">
            <div class="col">
                <p>Especialidades: Entrenamiento de fuerza, pérdida de peso y acondicionamiento físico general.
                    Descripción: Sara es una entrenadora certificada con más de 5 años de experiencia en el campo del fitness. Se especializa en ayudar a sus clientes a alcanzar sus objetivos de fuerza, perder peso de manera efectiva y mejorar su condición física general. Con su enfoque motivador y su conocimiento experto, Sara guía a sus clientes hacia un estilo de vida saludable y activo.</p>
            </div>
            <div class="col">
                <img src="../Vista/img/img-entrenadores/woman-100.png" class="rounded-circle" alt="...">
                <h2>Sara Johnson</h2>
            </div>
        </div>

        <div class="class row align-items-center">
            <div class="col">
                <p>Especialidades: Entrenamiento de resistencia, entrenamiento de mujeres y nutrición deportiva.
                    Descripción: Emily es una apasionada del entrenamiento de resistencia y se especializa en ayudar a las mujeres a desarrollar fuerza y tonificar sus cuerpos. Además de su experiencia en el gimnasio, también tiene conocimientos en nutrición deportiva y trabaja con sus clientes para diseñar planes de alimentación equilibrados que complementen su entrenamiento. Emily es conocida por su enfoque amigable y su capacidad para motivar a sus clientes a superar sus límites.</p>
            </div>
            <div class="col">
                <img src="../Vista/img/img-entrenadores/woman-100.png" class="rounded-circle" alt="...">
                <h2>Emily Rodriguez</h2>
            </div>
        </div>

        <div class="class row align-items-center">
            <div class="col">
                <p>Especialidades: Entrenamiento de alta intensidad, entrenamiento funcional y rehabilitación de lesiones.
                    Descripción: David es un entrenador altamente capacitado y experimentado en el entrenamiento de alta intensidad y funcional. Con su enfoque dinámico y desafiante, ayuda a sus clientes a mejorar su rendimiento físico y alcanzar sus metas de acondicionamiento. Además, tiene experiencia en la rehabilitación de lesiones y trabaja en estrecha colaboración con sus clientes para asegurarse de que se recuperen adecuadamente y vuelvan a estar en plena forma.</p>
            </div>
            <div class="col">
                <img src="../Vista/img/img-entrenadores/man-100.png" class="rounded-circle" alt="...">
                <h2>David Smith</h2>
            </div>
        </div>
    </div>

    <div class="container sec-1 panel-7 text-center">
        <h2>Solicitud de quejas y reclamos</h2>
        <form name="formulario" action="procesar_formulario.php" method="POST">
                <div class="form-group">
                    <label for="nombre" class="control-label"></label>
                    <input type="text" id="nombre" name="nombre" required placeholder="Nombre" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="email" class="control-label"></label>
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" required class="form-control" />
                </div>
                <div class="form-group">
                    <label for="mensaje" class="control-label"></label>
                    <textarea id="mensaje" name="mensaje" required placeholder="Ingresa informacion que solicitas" class="form-control"></textarea><br><br>
                </div>
                <div class="form-group mt-4 text-center">
                    <input type="submit" value="Enviar" class="btn btn-outline-primary" />
                </div>
        </form> 
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