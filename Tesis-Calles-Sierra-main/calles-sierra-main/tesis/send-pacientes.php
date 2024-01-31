<?php 

include("conexion.php");

if (isset($_POST["send"])){

    if (
        strlen($_POST['cedula']) >= 1 && 
        strlen($_POST['primer_nombre']) >= 1 && 
        strlen($_POST['segundo_nombre']) >= 1 &&
        strlen($_POST['primer_apellido']) >= 1 &&
        strlen($_POST['segundo_apellido']) >= 1 && 
        strlen($_POST['representante']) >= 1 &&
        strlen($_POST['fecha_nacimiento']) >= 1 && 
        strlen($_POST['estado_civil']) >= 1 &&
        strlen($_POST['direccion']) >= 1 &&
        strlen($_POST['telefono']) >= 1 && 
        strlen($_POST['sexo']) >= 1 &&
        strlen($_POST['lugar_nacimiento']) >= 1 && 
        strlen($_POST['nacionalidad']) >= 1 &&
        strlen($_POST['correo']) >= 1 
    ) {
        $cedula = trim($_POST['cedula']);
        $primer_nombre = trim($_POST['primer_nombre']);
        $segundo_nombre = trim($_POST['segundo_nombre']);
        $primer_apellido = trim($_POST['primer_apellido']);
        $segundo_apellido = trim($_POST['segundo_apellido']);
        $representante = trim($_POST['representante']);
        $fecha_nacimiento = trim($_POST['fecha_nacimiento']);
        $estado_civil = trim($_POST['estado_civil']);
        $direccion = trim($_POST['direccion']);
        $telefono = trim($_POST['telefono']);
        $sexo = trim($_POST['sexo']);
        $lugar_nacimiento = trim($_POST['lugar_nacimiento']);
        $nacionalidad = trim($_POST['nacionalidad']);
        $correo = trim($_POST['correo']);
        
        $consulta = "INSERT INTO paciente(cedula, primer_nombre, segundo_nombre,primer_apellido,segundo_apellido,
        representante,fecha_nacimiento,estado_civil,direccion,telefono,sexo,lugar_nacimiento,nacionalidad,correo) 
                VALUES ('$cedula', '$primer_nombre', '$segundo_nombre','$primer_apellido','$segundo_apellido',
                '$representante','$fecha_nacimiento', '$estado_civil','$direccion','$telefono',
                '$sexo','$lugar_nacimiento','$nacionalidad','$correo')";
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

}

?>