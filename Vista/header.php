<header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3 fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" >ENERGYM</a>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="inicio.php" >Inicio</a>
                        </li>
                            <?php
                                // Obtener el rol del usuario
                                $role = $_SESSION['rolUsuario'];

                                // Si el rol es "admin", mostrar las etiquetas <a>
                                if ($role == 'admin') {
                                    echo ' <li class="nav-item">
                                                <a class="nav-link text-dark" href="Vconsulta.php" >Consultas</a>
                                            </li>'; 
                                            
                                }
                                // Si el rol es "admin", mostrar las etiquetas <a>
                                if (($role == 'user')||($role == 'admin') ) {
                                 echo ' <li class="nav-item">
                                            <a class="nav-link text-dark" href="Vejercicios.php" >Ejercicios</a>
                                        </li>';
                                                                            
                                }
                            ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (($role == 'user')||($role == 'admin') ) {
                                 echo '<li class="nav-item">
                                            <a class="nav-link text-dark" href="Vperfil.php" >Mi Perfil</a>
                                        </li>';
                                                                            
                                }
                                ?>
                        <li class="nav-item">
                                <a class="nav-link text-dark" ><?php echo $_SESSION['nombreUsuario'] ; ?></a>
                            </li>
                            <?php
                            //Boton cerrar
                                // Verificar si hay una sesión activa
                                if (session_status() == PHP_SESSION_ACTIVE) {
                                    // Mostrar un botón para cerrar la sesión
                                    echo '<form method="post" action="http://127.0.0.1/Energym/Controlador/cerrar_sesion.php">
                                            <input type="submit" value="Cerrar Sesión" class="btn btn-outline-primary" />
                                        </form>';
                                } else {
                                    // No hay una sesión activa, redirigir a la página de inicio de sesión
                                    header("Location: http://127.0.0.1/Energym/vista/index.php");
                                    exit();
                                }
                            ?>
                    </ul>
                </div>
            </div>
        </nav>
</header>