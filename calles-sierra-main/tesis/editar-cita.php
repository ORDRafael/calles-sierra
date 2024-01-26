<?php
session_start();
include("conexion.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'correo/PHPMailer/Exception.php';
require 'correo/PHPMailer/PHPMailer.php';
require 'correo/PHPMailer/SMTP.php';

$id_citas = $_GET["id"];

$sqlCita = "SELECT * FROM citas WHERE id_citas = '$id_citas'";
$resultadoCita = $conexion->query($sqlCita);

if ($resultadoCita->num_rows == 1) {
    $rowCita = $resultadoCita->fetch_assoc();
    $id_paciente = $rowCita["id_paciente"];

    $sqlPaciente = "SELECT correo FROM paciente WHERE id = '$id_paciente'";
    $resultadoPaciente = $conexion->query($sqlPaciente);

    if ($resultadoPaciente->num_rows == 1) {
        $rowPaciente = $resultadoPaciente->fetch_assoc();
        $correo_paciente = $rowPaciente["correo"];
        
        // Resto del código para enviar el correo al correo_paciente
    } else {
        // No se encontró el paciente o hay más de un paciente con el mismo ID
        echo "Error al obtener el correo del paciente.";
        exit();
    }
} else {
    // No se encontró la cita o hay más de una cita con el mismo ID
    echo "Error al obtener los datos de la cita.";
    exit();
}

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

    $mail = new PHPMailer();

    try {
        //Server settings
        //$mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'agendamientosnotif@gmail.com';                     //SMTP username
        $mail->Password   = 'qqekczefteydtuxr';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('agendamientosnotif@gmail.com', 'Hospital Calles Sierra');
        $mail->addAddress($correo_paciente); //Add a recipient
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'MODIFICACION DE CITA';
        $mail->Body = 'Se ha modificado con éxito la cita en el hospital Calles Sierra' . "\n";
        $mail->Body .= 'Fecha: ' . $fecha . "\n";
        $mail->Body .= 'Hora: ' . $hora . "\n";
        $mail->Body .= 'Agradecemos su comprension' . "\n";

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

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