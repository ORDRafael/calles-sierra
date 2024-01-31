<?php
include("conexion.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'correo/PHPMailer/Exception.php';
require 'correo/PHPMailer/PHPMailer.php';
require 'correo/PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si el correo electrónico existe en la base de datos
    $email = $_POST['correo'];


    $sql = "SELECT * FROM usuarios WHERE correo = '$email'";
    $result = $conexion->query($sql);
    
    if ($result->num_rows > 0) {
        // El correo electrónico existe en la base de datos
        // Continúa con el proceso de restablecimiento de contraseña
    } else {
        // El correo electrónico no existe en la base de datos
        echo "El correo electrónico no está registrado.";
    }

    // Generar un token único
$token = uniqid();

// Calcular la fecha de expiración (por ejemplo, 1 hora después de la solicitud)
$expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));

// Guardar el token en la base de datos junto con el correo electrónico y la fecha de expiración
$sql = "UPDATE usuarios SET token = '$token', expiration = '$expiration' WHERE correo = '$email'";
if ($conexion->query($sql) === TRUE) {
    // El token se ha guardado exitosamente en la base de datos
} else {
    echo "Error al guardar el token en la base de datos: " . $conexion->error;
}

// Enviar el correo electrónico al usuario con el token en el enlace
$resetLink = "http://localhost/change_password.php?token=$token"; // Cambia "tudominio.com" por tu dominio real o una URL local



// Crear una nueva instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurar los ajustes de SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Cambia esto por el servidor SMTP real que estés utilizando
    $mail->SMTPAuth = true;
    $mail->Username = 'agendamientosnotif@gmail.com'; // Cambia esto por tu dirección de correo electrónico real
    $mail->Password = 'qqekczefteydtuxr'; // Cambia esto por tu contraseña real
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Configurar los detalles del correo electrónico
    $mail->setFrom('agendamientosnotif@gmail.com', 'Hospital Calles Sierra'); // Cambia esto por tu dirección de correo electrónico real y el nombre de tu sitio web
    $mail->addAddress($email); // Cambia esto por la dirección de correo electrónico del destinatario
    $mail->Subject = 'Restablecer contraseña';

    // Generar el enlace para restablecer la contraseña con el token
    $resetLink = "http://localhost/calles-sierra-main/tesis/cambio-contrasena.php?token=$token"; // Cambia "localhost" y "/change_password.php" según tu configuración
    $mail->Body = "Hola,\n\nHaz solicitado restablecer tu contraseña. Haz clic en el siguiente enlace para crear una nueva contraseña:\n\n$resetLink\n\nSi no solicitaste restablecer tu contraseña, puedes ignorar este correo.\n\nSaludos,\nTu sitio web";

    // Enviar el correo electrónico
    $mail->send();

    echo "Se ha enviado un correo electrónico con las instrucciones para restablecer tu contraseña. Por favor, revisa tu bandeja de entrada.";
} catch (Exception $e) {
    echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contrasena</title>
    <link rel="stylesheet" href="css/style-login.css">
</head>
<body>
    <form method="post">
    <h2>Recuperar Contraseña</h2>
        <input type="email" name="correo" placeholder="Ingresa tu correo" required>
        <button class="boton" type="submit">Enviar</button>
        <input type="button" class="boton" onclick="history.back()" name="Atrás" value="Atrás">
    </form>
</body>
</html>