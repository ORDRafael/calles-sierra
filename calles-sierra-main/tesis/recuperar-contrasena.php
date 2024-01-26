<?php
include("conexion.php");

// Consultar los usuarios existentes en la base de datos
$query = "SELECT usuario FROM usuarios";
$result = mysqli_query($conexion, $query);
$usuarios = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Verificar si se ha seleccionado un usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedUser = $_POST['usuario'];

    $query = "SELECT contrasena FROM usuarios WHERE usuario = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "s", $selectedUser);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $contrasena);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Mostrar la contraseña o generar una nueva contraseña temporal
    if ($contrasena) {
        echo "La contraseña del usuario seleccionado es: " . $contrasena;
    } else {
        // Generar una nueva contraseña temporal
        $nuevaContrasena = generarContrasenaTemporal();


        // Actualizar la contraseña en la base de datos
        $query = "UPDATE usuarios SET contrasena = ? WHERE usuario = ?";
        $stmt = mysqli_prepare($conexion, $query);
        mysqli_stmt_bind_param($stmt, "ss", $nuevaContrasena, $selectedUser);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // Enviar la nueva contraseña temporal al usuario (aquí puedes implementar tu propia lógica para enviar el correo electrónico o notificar al usuario)

        echo "Se ha enviado una nueva contraseña temporal al usuario. Por favor, revisa tu correo electrónico.";
    }
}

// Función para generar una contraseña temporal aleatoria
function generarContrasenaTemporal($longitud = 8) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $contrasena = '';
    for ($i = 0; $i < $longitud; $i++) {
        $index = rand(0, strlen($caracteres) - 1);
        $contrasena .= $caracteres[$index];
    }
    return $contrasena;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recuperar Contraseña</title>
</head>
<body>
    <form method="post">
        
        <!-- Selección del usuario -->
        <label>Selecciona un usuario:</label>
        <select name="usuario" required>
            <option value="">Selecciona un usuario</option>
            <?php foreach ($usuarios as $usuario): ?>
                <option value="<?php echo $usuario['usuario']; ?>"><?php echo $usuario['usuario']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Recuperar Contraseña</button>
    </form>
</body>
</html>