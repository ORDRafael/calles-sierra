<?php
include("conexion.php");

// Obtener el ID del paciente desde la URL
$idPaciente = $_GET['id'];

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener el contenido del informe desde el formulario
  $contenidoInforme = $_POST['contenido'];

// Realizar una consulta a la tabla pacientes para verificar la existencia del ID
$sql = "SELECT id FROM paciente WHERE id = $idPaciente";
$result = mysqli_query($conexion, $sql);

  // Verificar el resultado de la consulta
  if (mysqli_num_rows($result) > 0) {
    // El valor del id existe en la tabla pacientes, puedes continuar con la inserción en la tabla informes
    // Realiza la inserción en la tabla informes
    $sqlInsert = "INSERT INTO informes (id_paciente, contenido) VALUES ('$idPaciente', '$contenidoInforme')";
    if (mysqli_query($conexion, $sqlInsert)) {
      echo "Los datos se han guardado correctamente.";
    } else {
      echo "Error al insertar en la tabla informes: " . mysqli_error($conexion);
    }
  } else {
    // El valor de cedula_paciente no existe en la tabla pacientes, muestra un mensaje de error
    echo "La identificacion no existe en la tabla pacientes.";
  }
  
  if (mysqli_num_rows($result) === 0) {
    // La cédula del paciente en la URL no coincide con la cédula en el formulario, mostrar un mensaje de error y redirigir
    echo "Acceso no autorizado.";
    // Redirigir a una página de error o a una página de inicio, por ejemplo:
    header("Location: error.php");
    exit(); // Detener la ejecución del script
  }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Crear Informe</title>
</head>
<body>
  <h1>Crear Informe</h1>

  <form method="POST">
    <textarea name="contenido" rows="5" cols="50" placeholder="Escribe el contenido del informe"></textarea><br>
    <input type="submit" value="Guardar Informe">
  </form>
</body>
</html>
