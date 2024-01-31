<?php
include("conexion.php");
include("menu.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'correo/PHPMailer/Exception.php';
require 'correo/PHPMailer/PHPMailer.php';
require 'correo/PHPMailer/SMTP.php';

// Verificar si se ha enviado el parámetro "id" en la URL
if (isset($_GET["id"])) {
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
        $mail->Subject = 'ELIMINACION DE CITA';
        $mail->Body = 'Se ha eliminado la cita en el hospital Calles Sierra' . "\n";
        $mail->Body .= 'Fecha: ' . $fecha . "\n";
        $mail->Body .= 'Hora: ' . $hora . "\n";
        $mail->Body .= 'Agradecemos su comprension' . "\n";

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

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
