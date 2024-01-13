<?php
session_start();
include("conexion.php");

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados por el formulario
    $id_cita = $_POST["id_cita"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

 // Procesar los datos y realizar la actualización en la base de datos
$sqlUpdateCita = "UPDATE citas SET fecha = '$fecha', hora = '$hora', last_modified = NOW() WHERE id_citas = '$id_cita'";
if ($conexion->query($sqlUpdateCita) === TRUE) {
    echo "La cita se ha editado exitosamente";

    // Obtener el nombre del usuario responsable de la modificación
    $nombreUsuario = $_SESSION['usuario'];

    // Verificar si el nombre de usuario está definido
    if (isset($nombreUsuario)) {
        // Actualizar la información del responsable en la base de datos
        $sqlUpdateResponsable = "UPDATE citas SET nombre_usuario_modificacion = '$nombreUsuario' WHERE id_citas = '$id_cita'";
        $conexion->query($sqlUpdateResponsable);
        header("Location: citas.php");
    }
} else {
    echo "Error al editar la cita: " . $conexion->error;
}
}

// Obtener el ID de la cita a editar desde la URL
$id_cita = $_GET["id"];

// Consultar la información de la cita específica a editar
$sqlCita = "SELECT * FROM citas WHERE id_citas = '$id_cita'";
$resultadoCita = $conexion->query($sqlCita);

if ($resultadoCita->num_rows == 1) {
    // Obtener los datos de la cita
    $rowCita = $resultadoCita->fetch_assoc();
    $fecha = $rowCita["fecha"];
    $hora = $rowCita["hora"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Cita</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Cita</h1>

    <form method="POST">
        <input type="hidden" name="id_cita" value="<?php echo $id_cita; ?>">
        
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required value="<?php echo $fecha; ?>"><br>

        <label for="hora">Hora:</label>
        <input type="time" name="hora" required value="<?php echo $hora; ?>"><br>

        <input type="submit" value="Actualizar Cita">
    </form>
</body>
</html>

<?php
} else {
    echo "No se encontró la cita especificada";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>