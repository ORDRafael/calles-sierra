<?php 
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pacientes</title>
</head>
<body>
    lista pacientes

    <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                  <th>Cedula</th>
                  <th>Primer nombre</th>
                  <th>Segundo nombre</th>
                  <th>Primer apellido</th>
                  <th>Segundo Apellido</th>
                  <th>Representante</th>
                  <th>Nacimiento</th>
                  <th>Edad</th>
                  <th>Estado civil</th>
                  <th>Direccion</th>
                  <th>Telefono#</th>
                  <th>Sexo</th>
                  <th>Nacionalidad</th>
                  <th>Correo</th>
                  <th>Acciones..</th>                 
                </tr>
            </thead>
          </table>
    </div>

    <?php
    include("pacientes.php");
     ?>

</body>

</html>

<?php
include("conexion.php");

// Obtener la lista de pacientes desde la base de datos
$query = "SELECT id, primer_nombre, fecha_nacimiento, DATEDIFF(CURDATE(), fecha_nacimiento) / 365 AS edad FROM paciente";
$result = mysqli_query($conexion, $sql);


// Mostrar la lista de pacientes y el enlace para crear reporte
while ($row = mysqli_fetch_assoc($result)) {
  $idPaciente = $row['id'];
  $primer_nombre = $row['primer_nombre'];
  $fecha_nacimiento = $row['fecha_nacimiento'];
  $edad = $row['edad'];

  echo "<p>$idPaciente - $primer_nombre - $fecha_nacimiento - $edad <a href='editar_paciente.php?id=$idPaciente'>Editar</a> -
    <a href='eliminar_paciente.php?id=$idPaciente'>Eliminar</a>
  - <a href='crear_informe.php?id=$idPaciente'>Crear Reporte</a></p>";
  
}

// Liberar el resultado de la consulta
mysqli_free_result($result);

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>