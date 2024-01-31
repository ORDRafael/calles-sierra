<?php 

include("conexion.php");

if (isset($_POST["send"])){

    if (
        strlen($_POST['nombre']) >= 1 && 
        strlen($_POST['apellido']) >= 1 && 
        strlen($_POST['cedula']) >= 1 &&
        strlen($_POST['correo']) >= 1 &&
        strlen($_POST['especialidad']) >= 1 && 
        strlen($_POST['telefono']) >= 1
    ) {
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $cedula = trim($_POST['cedula']);
        $correo = trim($_POST['correo']);
        $telefono = trim($_POST['telefono']);
        $especialidad = trim($_POST['especialidad']);
        
        $consulta = "INSERT INTO medicos(nombre, apellido, cedula,correo,telefono,especialidad) 
                VALUES ('$nombre', '$apellido', '$cedula','$correo','$telefono','$especialidad')";
        $resultado = mysqli_query($conexion, $consulta);
    if($resultado) {
        ?>
            <h3> Completado el registro </h3>  
        <?php
    }   else {
        ?>
        <h3> Error </h3>  
        <?php
    }
    } else {
        ?>
        <h3> Llena todos los campos </h3>  
        <?php
    }

     // Enviar el correo

    //  $to = $correo;
    //  $subject = "Confirmación de registro";
    //  $message = "Estimado(a) $nombre, $apellido,\n\nGracias por registrarte. Tus datos han sido registrados correctamente.\n\nSaludos,\nTu empresa";
    //  $headers = "From: rafaelordaz16@gmail.com";
 
    //  if (mail($to, $subject, $message, $headers)) {
    //      echo "Se ha enviado un correo de confirmación a $correo.";
    //  } else {
    //      echo "Error al enviar el correo.";
    //  }
 
}

?>