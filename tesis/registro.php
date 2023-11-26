<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="registrar_usuario.php" method="POST">
  <label for="username">Nombre de usuario:</label>
  <input type="text" name="username" required>
  
  <label for="password">Contraseña:</label>
  <input type="password" name="password" required>
  
  <label for="confirm_password">Confirmar contraseña:</label>
  <input type="password" name="confirm_password" required>
  
  <button type="submit">Registrar</button>
</form>
</body>
</html>
