<?php

session_start();

$host = "127.0.0.1";
$user = "root";
$clave = "";
$bd = "tareas";

$conn = new mysqli($host, $user, $clave, $bd);

if($conn->connect_errno){
    echo 'fallo la conexion';
}

?>