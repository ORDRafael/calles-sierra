<?php
include("conexion.php");

// Obtener los datos del formulario de edición
$idPaciente = $_POST['id_paciente'];
$cedulaPaciente = $_POST['cedula'];
$primer_nombre = $_POST['primer_nombre'];
$segundo_nombre = $_POST['segundo_nombre'];
$primer_apellido = $_POST['primer_apellido'];
$segundo_apellido = $_POST['segundo_apellido'];
$representante = $_POST['representante'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$edad = $_POST['edad'];
$estado_civil = $_POST['estado_civil'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$sexo = $_POST['sexo'];
$lugar_nacimiento = $_POST['lugar_nacimiento'];
$nacionalidad = $_POST['nacionalidad'];
$correo = $_POST['correo'];

    // Verificar si la nueva cédula ya existe en la base de datos
    $sql = "SELECT * FROM paciente WHERE cedula = '$cedulaPaciente'";
    $result = mysqli_query($conexion, $sql);

// Actualizar los datos del paciente en la base de datos
$sql = "UPDATE paciente SET cedula = '$cedulaPaciente', primer_nombre = '$primer_nombre', segundo_nombre = '$segundo_nombre', primer_apellido = '$primer_apellido',
segundo_apellido = '$segundo_apellido', representante = '$representante', fecha_nacimiento ='$fecha_nacimiento', estado_civil = '$estado_civil', direccion = '$direccion', telefono ='$telefono',
sexo = '$sexo', lugar_nacimiento = '$lugar_nacimiento', nacionalidad ='$nacionalidad', correo = '$correo' WHERE id = '$idPaciente'";


if (mysqli_query($conexion, $sql)) {
    // Redirigir al archivo lista-pacientes.php
    header("Location: lista-paciente.php");
    exit(); // Asegúrate de agregar esta línea para evitar que el código se siga ejecutando después de la redirección
} else {
    echo "Error al actualizar los datos del paciente: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>