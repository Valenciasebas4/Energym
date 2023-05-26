<?php

class Database{
    public static function connect()
    {

       $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbgym";

        // crear una conexión
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // verificar la conexión
        if (!$conn) {
            die("La conexión ha fallado: " . mysqli_connect_error());
        }
        echo "Conexión exitosa";
    }
}
?>