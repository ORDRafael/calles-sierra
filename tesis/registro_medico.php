<?php 
include("send.php");
include("menu.php"); 
?>

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
     <h2>Anadir medicos</h2>
        
    <div class="input-group">

        <div class="input-container">
        <input type="text" name="nombre" placeholder="Nombre">
        <i class="fa-solid fa-user"></i>
        </div>

        <div class="input-container">
        <input type="text" name="apellido" placeholder="Apellido">
        <i class="fa-solid fa-user"></i>
        </div>

        <div class="input-container">
        <input type="number" name="cedula" placeholder="Cedula">
        <i class="fa-solid fa-phone"></i>
        </div>
        
        <div class="input-container">
        <input type="tel" name="telefono"placeholder="Telefono">
        <i class="fa-solid fa-phone"></i>
        </div>

        <div class="input-container">
        <input type="email" name="correo"placeholder = "Email">
        <i class="fa-solid fa-envelope"></i>
        </div>

        <div>
        <select name="especialidad">
            <option>Cardiologia</option>
            <option>Alergología</option>
            <option>Endocrinología</option>
            <option>Gastroenterología</option>
            <option>Hematología</option>
            <option>Medicina interna</option>
            <option>Nefrología</option>
            <option>Neumología</option>
            <option>Neurología</option>
            <option>Nutriología</option>
            <option>Oncología</option>
            <option>Pediatría</option>
            <option>Psiquiatría</option>
            <option>Dermatología</option>
            <option>Traumatología</option>
            <option>Urologia</option>
        </select>
        </div>

         <div>
        <button class="boton" type="submit" name="send" value="Enviar">Enviar</button>
        </div>

        <!-- <div> -->
        <!-- <table>
            <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>cedula</th>
            <th>telefono</th>
            <th>correo</th>
            <th>especialidad</th>
            </tr>
            <tr>
                <td>Rafael</td>
                <td>Ordaz</td>
                <td>27169435</td>
                <td>04146560053</td>
                <td>rafael@gmail.com</td>
                <td>Cardiologia</td>
            </tr>
            <tr>
                <td>Freilix</td>
                <td>Revilla</td>
                <td>1</td>
                <td>0424545455</td>
                <td>freilix@gmial</td>
                <td>Neurologo</td>
            </tr> -->

     <!-- buscador -->
    <!-- <input type="search" name="buscar" placeholder="especialidad">
    <input type="submit" value="Buscar"> -->

            <?php
            include("medicos.php");
            ?>
   


        
        </table>
        </div>

    </div>
    </form>
</body>
</html>