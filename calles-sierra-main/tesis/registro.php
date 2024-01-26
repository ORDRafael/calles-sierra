<?php
include("conexion.php");

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores de los campos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $correo = $_POST['correo'];
    $confirm_correo = $_POST['confirm_correo'];
    // Validar los datos del formulario
    // ...

    // Verificar si las contraseñas coinciden
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
        mysqli_stmt_close($stmt);
        mysqli_close($conexion);
        header("Location: login.php");
        exit;
    } else {
        echo "Error al registrar el usuario: " . mysqli_error($conexion);
        mysqli_stmt_close($stmt);
        mysqli_close($conexion);
        header("Location: registro.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario</title>
</head>
<body>
    <form method="post">
        <!-- Campos del formulario -->
        <input type="text" name="username" placeholder="Nombre" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <input type="password" name="confirm_password" placeholder="Confirmar Contraseña" required><br>
        <input type="email" name="correo" placeholder="Correo" required><br>
        <input type="email" name="confirm_correo" placeholder="Confirmar Correo" required><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>