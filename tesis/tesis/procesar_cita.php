<?php 
include("conexion.php");

// Consulta para obtener la lista de pacientes
$sqlPacientes = "SELECT * FROM paciente";
$resultadoPacientes = $conexion->query($sqlPacientes);

if ($resultadoPacientes->num_rows > 0) {
    // Recorre los resultados y muestra la lista de pacientes
    while ($row = $resultadoPacientes->fetch_assoc()) {
        echo "Paciente: " . $row["primer_nombre"] . " " . $row["primer_apellido"] . "<br>";
    }
} else {
    echo "No hay pacientes registrados.";
}

// Consulta para obtener la lista de médicos
$sqlMedicos = "SELECT * FROM medicos";
$resultadoMedicos = $conexion->query($sqlMedicos);

if ($resultadoMedicos->num_rows > 0) {
    // Recorre los resultados y muestra la lista de médicos
    while ($row = $resultadoMedicos->fetch_assoc()) {
        echo "Médico: " . $row["nombre"] . " " . $row["apellido"] . "<br>";
    }
} else {
    echo "No hay médicos registrados.";
}

// Obtener los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

    // Validar los datos (ejemplo: verificar que no exista una cita para la misma fecha y hora)
    // Agrega aquí tus validaciones personalizadas

    // Insertar la cita en la base de datos
    $sqlInsertCita = "INSERT INTO citas (fecha, hora) VALUES ('$fecha', '$hora')";
    if ($conexion->query($sqlInsertCita) === TRUE) {
        echo "Cita creada exitosamente.<br>";
    } else {
        echo "Error al crear la cita: " . $conexion->error;
    }
}

// Recuperar y mostrar las citas existentes
$sqlCitas = "SELECT * FROM citas";
$resultadoCitas = $conexion->query($sqlCitas);

if ($resultadoCitas->num_rows > 0) {
    // Recorre los resultados y muestra las citas existentes
    while ($row = $resultadoCitas->fetch_assoc()) {
        echo "Cita: " . $row["fecha"] . " " . $row["hora"] . "<br>";
    }
} else {
    echo "No hay citas registradas.";
}


// Cerrar la conexión a la base de datos
$conexion->close();
?>

