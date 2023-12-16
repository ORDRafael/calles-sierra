<?php
include("conexion.php");

// Obtén los datos del formulario de registro
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$correo = $_POST['correo'];
$confirm_correo = $_POST['confirm_correo'];

// Verifica si las contraseñas coinciden
if ($password !== $confirm_password) {
  echo 'Las contraseñas no coinciden. Por favor, inténtalo nuevamente.';
  exit;
}

// Validación adicional de la contraseña (por ejemplo, longitud mínima, caracteres especiales, complejidad)

// Hashear la contraseña antes de guardarla en la base de datos
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Preparar y escapar los datos
$stmt = mysqli_prepare($conexion, "INSERT INTO usuarios (usuario, contrasena, correo) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $username, $hashed_password, $correo);

// Ejecutar la consulta preparada
if (mysqli_stmt_execute($stmt)) {
    echo "Registro exitoso. Ahora puedes iniciar sesión con tu nueva cuenta.";
    header("Location: login.php");
} else {
    echo "Error al registrar el usuario: " . mysqli_error($conexion);
    header("Location: registro.php");
}

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>