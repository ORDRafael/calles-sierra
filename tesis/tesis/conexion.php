<?php
$conexion = new mysqli("localhost", "root", "", "formulario");

// Verificar si la conexión se realizó correctamente
if ($conexion->connect_errno) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>