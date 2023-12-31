<?php
include("conexion.php");
include("menu.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'correo/PHPMailer/Exception.php';
require 'correo/PHPMailer/PHPMailer.php';
require 'correo/PHPMailer/SMTP.php';

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

    // Envío de correo electrónico con PHPMailer
    $mail = new PHPMailer();

    try {
        //Server settings
        //$mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'rafaelordaz16@gmail.com';                     //SMTP username
        $mail->Password   = 'hxutbsizyqdqasid';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('rafaelordaz16@gmail.com', 'Rafael Ordaz');
        $mail->addAddress('rafaelordaz16@gmail.com');     //Add a recipient
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'CITA AGENDADA';
        $mail->Body    = 'Se ha agendado con exito la cita en el hospital calles sierra';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
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

    <form method="POST">
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

        <input type="submit" value="Agendar Cita">
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