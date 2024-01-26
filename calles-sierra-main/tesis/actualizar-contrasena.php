<?php
include("conexion.php");

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el token y la nueva contraseña del formulario
    $token = $_POST['token'];
    $newPassword = $_POST['password'];

    // Verificar si el token es válido
    $sql = "SELECT token FROM usuarios WHERE token = '$token' AND expiration > NOW()";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // El token es válido, actualizar la contraseña del usuario
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $sql = "UPDATE usuarios SET contrasena = '$hashedPassword' WHERE token = '$token'";
        if ($conexion->query($sql)) {
            echo "Contraseña actualizada exitosamente.";
             // Redirigir al usuario a la página de inicio de sesión
            header("Location: login.php");
            exit(); // Asegúrate de salir del script después de redirigir
        } else {
            echo "Error al actualizar la contraseña: " . $conexion->error;
        }
    } else {
        echo "El token no es válido o ha expirado.";
    }
} else {
    echo "Acceso inválido a esta página.";
}