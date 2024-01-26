<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:login.php");
    exit(0);
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Pacientes</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="css/style-principal.css">
  <link rel="stylesheet" href="css/style-lista-paciente.css">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="principal.php" class="logo">
                    <img src="img/LogoCallesSierra.png" alt="">
                    <span class="nav-item">Calles Sierra</span>
                </a></li>
                <li><a href="principal.php">
                    <object data="icon/house-solid.svg"></object>
                    <span class="nav-item">Inicio</span>
                </a></li>
                <li><a href="perfil.php">
                    <object data="icon/user-solid.svg"></object>
                    <span class="nav-item">Perfil</span>
                </a></li>
                <li><a href="lista-paciente.php">
                    <object data="icon/bed-solid.svg"></object>
                    <span class="nav-item">Lista de Pacientes</span>
                </a></li>
                <li><a href="registro-paciente.php">
                    <object data="icon/hospital-user-solid.svg"></object>
                    <span class="nav-item">Registrar Paciente </span>
                </a></li>
                <li><a href="lista-medicos.php">
                    <object data="icon/user-doctor-solid.svg"></object>
                    <span class="nav-item">Lista de Médicos</span>
                </a></li>
                <li><a href="registro_medico.php">
                    <object data="icon/laptop-medical-solid.svg"></object>
                    <span class="nav-item">Registrar Médicos</span>
                </a></li>
                <li><a href="citas.php">
                    <object data="icon/notes-medical-solid.svg"></object>
                    <span class="nav-item">Citas</span>
                </a></li>
                <li><a href="#">
                    <object data="icon/gear-solid.svg"></object>
                    <span class="nav-item">Configuración</span>
                </a></li>
                <li><a href="#">
                    <object data="icon/question-solid.svg"></object>
                    <span class="nav-item">Help</span>
                </a></li>
                <li><a href="logout.php">
                    <object data="icon/right-from-bracket-solid.svg"></object>
                    <span class="nav-item">Logout</span>
                </a></li>
            </ul>
        </nav>
          
        <section class="main-page">
          <h1>Lista de Pacientes</h1>
                <div class="course-box">
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
                </div>
        </section>

    </div>

</body>
</html>