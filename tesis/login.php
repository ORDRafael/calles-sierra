<?php
include("conexion.php");

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores ingresados por el usuario
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["password"];

    // Verificar la autenticación en la base de datos
    $query = "SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuarioDB = $result->fetch_assoc();
    $stmt->close();

    if ($usuarioDB) {
        // Autenticación exitosa, redirigir a la página de inicio
        header("Location: principal.php");
        exit();
    } else {
        $mensajeError = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form class="form" method="post" autocomplete="off">
        <h2>Bienvenido!</h2>
        
        <div class="input-group">
            <div class="input-container">
                <input type="text" name="usuario" placeholder="Nombre" required>
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="input-container">
                <input type="password" name="password" placeholder="Contraseña" required>
                <i class="fa-solid fa-lock"></i>
            </div>

            <div>
                <button class="boton" type="submit" name="send" value="Enviar">Enviar</button>
            </div>
        </div>
        
        <?php
        // Mostrar mensaje de error si existe
        if (isset($mensajeError)) {
            echo '<p class="error">' . $mensajeError . '</p>';
        }
        ?>
    </form>
</body>
</html>