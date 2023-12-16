<?php
include("conexion.php");
include("menu.php");

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados por el formulario
    $id_paciente = $_POST["paciente"];
    $id_medico = $_POST["medico"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

    // Procesar los datos y realizar la inserción en la base de datos
    $sqlInsertCita = "INSERT INTO citas (id_paciente, id_medico, fecha, hora) VALUES ('$id_paciente', '$id_medico', '$fecha', '$hora')";

    if ($conexion->query($sqlInsertCita) === TRUE) {
        echo "La cita se ha guardado exitosamente";
        
        // Obtener el ID del chat desde el formulario
        $chatId = $_POST["chatId"];
        
        // Mensaje a enviar al bot de Telegram
        $mensaje = "Estimado paciente, su cita ha sido agendada con éxito";

        // URL de la API de Telegram para enviar mensajes
        $url = "https://api.telegram.org/bot6826692261:AAGTPmTTshN5afklFj0qdlrO_vcRrNoeC1U/sendMessage";

        // Parámetros de la solicitud HTTP
        $datos = array(
            "chat_id" => $chatId,
            "text" => $mensaje
        );

        // Realizar la solicitud HTTP a la API de Telegram
        $options = array(
            "http" => array(
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "method" => "POST",
                "content" => http_build_query($datos)
            )
        );
        $context = stream_context_create($options);
        $resultado = file_get_contents($url, false, $context);

        // Verificar si se envió correctamente el mensaje
        if ($resultado === false) {
            echo "Error al enviar el mensaje al bot de Telegram";
        } else {
            echo "Mensaje enviado al bot de Telegram";
        }
    } else {
        echo "Error al guardar la cita: " . $conexion->error;
    }

    // Redirigir nuevamente a la misma página para evitar envío duplicado del formulario
    header("Location: citas.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Agendado de Citas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Agendado de Citas</h1>

    <form id="formulario" action="" method="post">
        <label for="paciente">Paciente:</label>
        <select name="paciente" required>
            <?php
            // Consulta para obtener la lista de pacientes de la base de datos
            $sqlPacientes = "SELECT * FROM paciente";
            $resultadoPacientes = $conexion->query($sqlPacientes);

            if ($resultadoPacientes->num_rows > 0) {
                // Recorre los resultados y muestra las opciones del select
                while ($row = $resultadoPacientes->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["primer_nombre"] . " " . $row["primer_apellido"] . "</option>";
                }
            } else {
                echo "<option value=''>No hay pacientes registrados</option>";
            }
            ?>
        </select><br>

        <label for="medico">Médico:</label>
        <select name="medico" required>
            <?php
            // Consulta para obtener la lista de médicos de la base de datos
            $sqlMedicos = "SELECT * FROM medicos";
            $resultadoMedicos = $conexion->query($sqlMedicos);

            if ($resultadoMedicos->num_rows > 0) {
                // Recorre los resultados y muestra las opciones del select
                while ($row = $resultadoMedicos->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . " " . $row["apellido"] . "</option>";
                }
            } else {
                echo "<option value=''>No hay médicos registrados</option>";
            }
            ?>
        </select><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required><br>

        <label for="hora">Hora:</label>
        <input type="time" name="hora" required><br>

        <button type="submit" value="Agendar Cita">Agendar Cita</button>
        
    </form>
  

    <h2>Citas Agendadas</h2>

    <?php
    // Consulta para obtener las citas agendadas
    $sqlCitas = "SELECT citas.*, primer_nombre AS primer_paciente, primer_apellido AS primer_apellido, nombre AS nombre_medico, apellido AS apellido_medico,
                especialidad AS ocupacion
                FROM citas
                INNER JOIN paciente ON citas.id_paciente = paciente.id
                INNER JOIN medicos ON citas.id_medico = medicos.id";
    $resultadoCitas = $conexion->query($sqlCitas);
   
    if ($resultadoCitas->num_rows > 0) {
        // Muestra las citas agendadas en una tabla
        echo "<table class='tabla-pacientes'>
                <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Especialidad</th>
                <th>Acciones</th>
            </tr>";

        while ($row = $resultadoCitas->fetch_assoc()) {
            $horaCompleta = date("H:i", strtotime($row["hora"]));
            echo "<tr>
                    <td>" . $row["fecha"] . "</td>
                    <td>" . $horaCompleta . "</td>
                    <td>" . $row["primer_paciente"] . "</td>
                    <td>" . $row["nombre_medico"] . " " . $row["apellido_medico"] . "</td>
                    <td>" . $row["ocupacion"] . "</td>
                    <td> <a href='eliminar_cita.php?id=".$row['id_citas']."'>Eliminar</a>
        </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No hay citas agendadas.";
    }
    ?>

</body>
</html>