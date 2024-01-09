<?php include("menu.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include("conexion.php");

// Obtener los datos de los pacientes de la base de datos
$query = "SELECT * FROM paciente";
$result = mysqli_query($conexion, $query);

// Verificar si se encontraron registros
if (mysqli_num_rows($result) > 0) {
    // Mostrar la tabla de pacientes
    echo "<h1>Lista de pacientes</h1>";
    echo "<table class='tabla-pacientes'>";
    echo "<tr>
        <th>Cédula</th> 
        <th>Primer nombre</th>
        <th>Segundo nombre</th>
        <th>Primer apellido</th>
        <th>Segundo apellido</th>
        <th>Representante</th>
        <th>Nacimiento</th>
        <th>Edo. Civil</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Sexo</th>
        <th>Lugar nacimiento</th>
        <th>Nacionalidad</th>
        <th>Correo</th>
        <th>Acciones</th>
      </tr>";

    // Recorrer los resultados y mostrar cada paciente en una fila de la tabla
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['cedula']."</td>";
        echo "<td>".$row['primer_nombre']."</td>";
        echo "<td>".$row['segundo_nombre']."</td>";
        echo "<td>".$row['primer_apellido']."</td>";
        echo "<td>".$row['segundo_apellido']."</td>";
        echo "<td>".$row['representante']."</td>";
        echo "<td>".$row['fecha_nacimiento']."</td>";
        echo "<td>".$row['estado_civil']."</td>";
        echo "<td>".$row['direccion']."</td>";
        echo "<td>".$row['telefono']."</td>";
        echo "<td>".$row['sexo']."</td>";
        echo "<td>".$row['lugar_nacimiento']."</td>";
        echo "<td>".$row['nacionalidad']."</td>";
        echo "<td>".$row['correo']."</td>";
        echo "<td>
        <a href='editar_paciente.php?id=".$row['id']."'>Editar</a>
        | <a href='eliminar_paciente.php?id=".$row['id']."'>Eliminar</a>
        |  <a href='crear_informe.php?id=".$row['id']."'>Reportes</a>
        </td>";
      
        echo "</tr>";
    }

    echo "</table>";
} else {
    // No se encontraron registros
    echo "No se encontraron pacientes registrados.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
</body>
</html>