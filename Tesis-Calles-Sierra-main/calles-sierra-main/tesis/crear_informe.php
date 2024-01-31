<?php
include("conexion.php");

// Obtener el ID del paciente desde la URL
$idPaciente = $_GET['id'];

// Consultar la tabla de pacientes para obtener los datos del paciente
// Aquí debes usar tu propio código para hacer la consulta a la base de datos
$query = "SELECT * FROM paciente WHERE id = $idPaciente";
$resultado = mysqli_query($conexion, $query);
$paciente = mysqli_fetch_assoc($resultado);

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener el contenido del informe desde el formulario
  $contenidoInforme = $_POST['contenido'];
  $diagnostico = $_POST['diagnostico'];
  $medicamentos = $_POST['medicamentos'];
  $evolucion = $_POST['evolucion'];
  $recomendaciones = $_POST['recomendaciones'];

  // Realizar una consulta a la tabla pacientes para verificar la existencia del ID
  $sql = "SELECT id FROM paciente WHERE id = $idPaciente";
  $result = mysqli_query($conexion, $sql);

  // Verificar el resultado de la consulta
  if (mysqli_num_rows($result) > 0) {
    // El valor del id existe en la tabla pacientes, puedes continuar con la inserción en la tabla informes
    // Realiza la inserción en la tabla informes
    $sqlInsert = "INSERT INTO informes (id_paciente, contenido, diagnostico, medicamentos, 
    evolucion, recomendaciones) VALUES ('$idPaciente', '$contenidoInforme', '$diagnostico',
    '$medicamentos', '$evolucion', '$recomendaciones')";
    if (mysqli_query($conexion, $sqlInsert)) {
      echo "Los datos se han guardado correctamente.";
    } else {
      echo "Error al insertar en la tabla informes: " . mysqli_error($conexion);
    }
  } else {
    // El valor de cedula_paciente no existe en la tabla pacientes, muestra un mensaje de error
    echo "La identificación no existe en la tabla pacientes.";
  }
}

// Realizar la consulta para obtener el historial de informes del paciente
$queryHistorial = "SELECT * FROM informes WHERE id_paciente = $idPaciente ORDER BY fecha DESC";
$resultadoHistorial = mysqli_query($conexion, $queryHistorial);

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

<link rel="stylesheet" href="css/styles.css">

<div class='area-btn'>
<a href="lista-paciente.php">Atrás</a>
        </div>

<div class="container">
    <h1>Reportes</h1>
    <?php if($paciente): ?>
    <form method="POST">
        <label for="cedula">Cédula:</label>
        <input type="text" id="cedula" value="<?php echo $paciente['cedula']; ?>" disabled>
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" value="<?php echo $paciente['primer_nombre']; ?>" disabled>
        
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" value="<?php echo $paciente['primer_apellido']; ?>" disabled>

        <label for="diagnostico">Diagnóstico:</label>
        <input type="text" id="diagnostico" name="diagnostico">

        <label for="medicamentos">Medicamentos:</label>
        <input type="text" id="medicamentos" name="medicamentos"> <br><br>

        <label for="evolucion">Evolución:</label>
        <input type="text" id="evolucion" name="evolucion">

        <label for="recomendaciones">Recomendaciones:</label>
        <input type="text" id="recomendaciones" name="recomendaciones"> <br><br>

        <label for="contenido">Reporte:</label>
        <textarea name="contenido" rows="5" cols="50" placeholder="Escribe el contenido del informe"></textarea><br>
        
        <!-- Resto del formulario -->
        
        <input type="submit" value="Guardar">
    </form>
    
    <h2>Historial de Informes</h2>
    <?php if(mysqli_num_rows($resultadoHistorial) > 0): ?>
      <?php while($informe = mysqli_fetch_assoc($resultadoHistorial)): ?>
        <div>
          <h3>Fecha: <?php echo $informe['fecha']; ?></h3>
          <p>Diagnóstico: <?php echo $informe['diagnostico']; ?></p>
          <p>Medicamentos: <?php echo $informe['medicamentos']; ?></p>
          <p>Evolución: <?php echo $informe['evolucion']; ?></p>
          <p>Reporte: <?php echo $informe['contenido']; ?></p>
          <p>Recomendaciones: <?php echo $informe['recomendaciones']; ?></p>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No hayinformes en el historial.</p>
    <?php endif; ?>
  <?php else: ?>
    <p>No se encontró ningún paciente con ese ID.</p>
  <?php endif; ?>
</div>