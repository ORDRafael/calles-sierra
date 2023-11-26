<?php 
include("send-pacientes.php");
?>
<?php include("menu.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
</head> 
<body>
    <form class="form" method="post" autocomplete="off">
     <h2>Anadir pacientes</h2>
        
    <div class="input-group">

        <div class="input-container">
        <input type="number" name="cedula" placeholder="Cedula">
        <i class="fa-solid fa-user"></i>
        </div>

        <div class="input-container">
        <input type="text" name="primer_nombre" placeholder="Primer nombre">
        <i class="fa-solid fa-user"></i>
        </div>

        <div class="input-container">
        <input type="text" name="segundo_nombre" placeholder="Segundo nombre">
        <i class="fa-solid fa-phone"></i>
        </div>
        
        <div>
            <input type="text" name="primer_apellido"placeholder="Primer apellido">
        </div>

        <div>
            <input type="text" name="segundo_apellido" placeholder="Segundo apellido">
        </div>

        <div>
            <input type="text" name="representante" placeholder="Representante">
        </div>

        <div>
            <input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
        </div>

            <!-- COLOCARLO TIPO CHECHBOX -->
        <div>
            <input type="text" name="estado_civil" placeholder="Estado civil">
        </div>

        <div>
            <input type="text" name="direccion" placeholder="Direccion">
        </div>

        <div class="input-container">
        <input type="tel" name="telefono"placeholder="Telefono">
        <i class="fa-solid fa-phone"></i>
        </div>
            <!-- COLOCAR TIPO CHECHBOX -->
        <div>
            <input type="text" name="sexo" placeholder="Sexo">
        </div>

        <div>
            <input type="text" name="lugar_nacimiento" placeholder="Lugar de nacimiento">
        </div>

        <div>
            <input type="text" name="nacionalidad" placeholder="Nacionalidad">
        </div>

        <div class="input-container">
        <input type="email" name="correo"placeholder = "Correo">
        <i class="fa-solid fa-envelope"></i>
        </div>

         <div>
        <button class="boton" type="submit" name="send" value="Enviar">Enviar</button>
        </div>
        

    </div>
    </form>
</body>
</html>