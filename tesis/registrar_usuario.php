<?php
include("conexion.php");

// Obtén los datos del formulario de registro
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Verifica si las contraseñas coinciden
if ($password !== $confirm_password) {
  echo 'Las contraseñas no coinciden. Por favor, inténtalo nuevamente.';
  exit;
}

// Aquí puedes agregar lógica adicional para verificar la fortaleza de la contraseña, validar el formato del correo electrónico, etc.

// Hashear la contraseña antes de guardarla en la base de datos
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Guarda los datos del usuario en tu base de datos
// Código para insertar los datos en la tabla de usuarios

// Mostrar un mensaje de registro exitoso
echo 'Registro exitoso. Ahora puedes iniciar sesión con tu nueva cuenta.';

// Construir la consulta SQL 
$sql = "INSERT INTO usuarios (usuario, contrasena) VALUES ('$username', '$hashed_password')";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) {
    echo "Registro exitoso. Ahora puedes iniciar sesión con tu nueva cuenta.";
} else {
    echo "Error al registrar el usuario: " . mysqli_error($conexion);
}
?>

REVISA EL PROBLEMA DE LA CONTRASENA, SALE HASHEADA EN LA BASE DE DATOS Y NO DEJA INGRESAR CON LA REAL
rafa 12345
12345 12345