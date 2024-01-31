<?php
include("conexion.php");

// Verificar si se ha proporcionado un token válido en la URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verificar si el token existe en la base de datos y no ha expirado
    $sql = "SELECT token FROM usuarios WHERE token = '$token' AND expiration > NOW()";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // El token es válido, mostrar el formulario para cambiar la contraseña
?>
        <form method="post" action="actualizar-contrasena.php">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <label for="password">Nueva contraseña:</label>
            <input type="password" name="password" id="password" required>
            <label for="confirm_password">Confirmar contraseña:</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
            <input type="submit" value="Cambiar contraseña">
        </form>
<?php
    } else {
        echo "El token no es válido o ha expirado.";
    }
} else {
    echo "No se ha proporcionado un token válido en la URL.";
}