<?php
include("conexion.php");

// Obtener el id del paciente desde la URL
$idPaciente = $_GET['id'];

// Realizar una consulta para obtener los datos del paciente
$sql = "SELECT * FROM paciente WHERE id = '$idPaciente'";
$result = mysqli_query($conexion, $sql);

// Verificar si se encontró el paciente
if (mysqli_num_rows($result) > 0) {
    // Obtener los datos del paciente
    $row = mysqli_fetch_assoc($result);
    $idPaciente = $row['id'];
    $cedulaPaciente = $row['cedula'];
    $primer_nombre = $row['primer_nombre'];
    $segundo_nombre = $row['segundo_nombre'];
    $primer_apellido = $row['primer_apellido'];
    $segundo_apellido = $row['segundo_apellido'];
    $representante = $row['representante'];
    $fecha_nacimiento = $row['fecha_nacimiento'];
    $estado_civil = $row['estado_civil'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
    $sexo = $row['sexo'];
    $lugar_nacimiento = $row['lugar_nacimiento'];
    $nacionalidad = $row['nacionalidad'];
    $correo = $row['correo'];
    
    // Mostrar el formulario de edición con los datos del paciente
    echo "<h1>Editar Paciente</h1>";
    echo "<form action='actualizar-paciente.php' method='POST'>";
    echo "Cédula: <input type='text' name='cedula' value='$cedulaPaciente' required><br>";
    echo "Primer nombre: <input type='text' name='primer_nombre' value='$primer_nombre'><br>
    Segundo nombre: <input type='text' name='segundo_nombre' value='$segundo_nombre'><br>
    Primer  apellido: <input type='text' name='primer_apellido' value='$primer_apellido'><br>
    Segundo apellido: <input type='text' name='segundo_apellido' value='$segundo_apellido'><br>
    Representante: <input type='text' name='representante' value='$representante'><br>
    Fecha de nacimiento: <input type='date' name='fecha_nacimiento' value='$fecha_nacimiento'><br>
    Estado civil: <input type='text' name='estado_civil' value='$estado_civil'><br>
    Direccion: <input type='text' name='direccion' value='$direccion'><br>
    Telefono: <input type='tel' name='telefono' value='$telefono'><br>
    Sexo: <input type='text' name='sexo' value='$sexo'><br>
    Lugar de nacimiento: <input type='text' name='lugar_nacimiento' value='$lugar_nacimiento'><br>
    Nacionalidad: <input type='text' name='nacionalidad' value='$nacionalidad'><br>
    Correo: <input type='email' name='correo' value='$correo'><br>
    <input type='hidden' name='id_paciente' value='$idPaciente'>";
    

    echo "<input type='submit' value='Actualizar'>";
    echo "</form>";
} else {
    echo "Paciente no encontrado.";
}


if (isset($_GET['error']) && $_GET['error'] === 'cedula_existente') {
    echo "La nueva cédula ya está registrada. Por favor, elija una cédula diferente.";
}

mysqli_close($conexion);
?>