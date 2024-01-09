<?php
include("conexion.php");
include("menu.php");

// Verificar si se ha enviado el parámetro "id" en la URL
if (isset($_GET["id"])) {
    $id_citas = $_GET["id"];

    // Sentencia SQL para eliminar la cita
    $sqlEliminarCita = "DELETE FROM citas WHERE id_citas = $id_citas";

    if ($conexion->query($sqlEliminarCita) === TRUE) {
        echo "La cita ha sido eliminada exitosamente";
        header("Location: citas.php");
    } else {
        echo "Error al eliminar la cita: " . $conexion->error;
    }
} else {
    echo "ID de cita no proporcionado";
}
?>