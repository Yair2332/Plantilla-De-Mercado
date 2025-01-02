<?php

class Database
{
    private $host_name = "localhost";
    private $database = "tienda_online";
    private $charset = "utf8";

    private $user_name = "root";
    private $password = "";

    function conexion()
    {
        try {
            $conexion = "mysql:host=" . $this->host_name . "; dbname=" . $this->database . "; charset=" . $this->charset;
            $opcion = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $db = new PDO($conexion, $this->user_name, $this->password, $opcion);
            return $db;
        } catch (PDOException $e) {
            echo "Error al conectar con database -> " . $e;
        };
    }
}
