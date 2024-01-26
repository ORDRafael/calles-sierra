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
    $pregunta1 = $_POST['pregunta1'];
    $respuesta1 = $_POST['respuesta1'];
    $pregunta2 = $_POST['pregunta2'];
    $respuesta2 = $_POST['respuesta2'];

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
    $stmt = mysqli_prepare($conexion, "INSERT INTO usuarios (usuario, contrasena, correo, pregunta1, respuesta1, pregunta2, respuesta2) VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssssss", $username, $hashed_password, $correo, $pregunta1, $respuesta1, $pregunta2, $respuesta2);

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
        <label>Pregunta de seguridad 1:</label>
        <select name="pregunta1" required>
            <option value="">Selecciona una pregunta</option>
            <option value="1">¿Cuál es tu color favorito?</option>
            <option value="2">¿Cuál es el nombre de tu mascota?</option>
            <option value="3">¿Cuál es tu película favorita?</option>
        </select><br>
        <input type="text" name="respuesta1" placeholder="Respuesta de seguridad 1" required><br>
        <label>Pregunta de seguridad 2:</label>
        <select name="pregunta2" required>
            <option value="">Selecciona una pregunta</option>
            <option value="1">¿Cuál es tu comida favorita?</option>
            <option value="2">¿Cuál es el nombre de tu mejor amigo/a de la infancia?</option>
            <option value="3">¿Cuál es tu lugar de vacaciones favorito?</option>
        </select><br>
        <input type="text" name="respuesta2" placeholder="Respuesta de seguridad 2" required><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>