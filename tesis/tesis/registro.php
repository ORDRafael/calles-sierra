<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario</title>
    <script>
        function enviarFormulario() {
            // Obtener los valores de los campos del formulario
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;
            var correo = document.getElementById("correo").value;
            var confirm_correo = document.getElementById("confirm_correo").value;

            // Enviar los datos a registrar_usuario.php
            fetch('registrar_usuario.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'username=' + username + '&password=' + password + '&confirm_password=' + confirm_password + '&correo=' + correo + '&confirm_correo=' + confirm_correo
            })
            .then(function(response) {
                // Redirigir al usuario a login.php después de registrar los datos
                if (response.ok) {
                    window.location.href = 'login.php';
                }
            });

            // Enviar los datos a enviar-prueba.php
            fetch('correo/enviar-prueba.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'correo=' + correo
            });
            
        }
    </script>
</head>
<body>
    <form method="post">
        <!-- Campos del formulario -->
        <input type="text" name="username" id="username" placeholder="Nombre" required><br>
        <input type="password" name="password" id="password" placeholder="Contraseña" required><br>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmar Contraseña" required><br>
        <input type="email" name="correo" id="correo" placeholder="Correo" required><br>
        <input type="email" name="confirm_correo" id="confirm_correo" placeholder="Confirmar Correo" required><br>
        <button type="button" onclick="enviarFormulario()">Enviar</button>
    </form>
</body>
</html>