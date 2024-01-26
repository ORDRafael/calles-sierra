<?php
include("conexion.php");

if (isset($_GET['id'])) {
    // Obtener el ID del paciente a eliminar
    $idPaciente = $_GET['id'];

    // Eliminar el paciente de la base de datos
    $sql = "DELETE FROM paciente WHERE id = '$idPaciente'";
    if (mysqli_query($conexion, $sql)) {
        // Redirigir al archivo lista-paciente.php
        header("Location: lista-paciente.php");
        exit();
    } else {
        echo "Error al eliminar el paciente: " . mysqli_error($conexion);
    }
} else {
    echo "ID de paciente no proporcionado";
}

mysqli_close($conexion);
?>