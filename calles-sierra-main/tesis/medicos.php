<?php
            
            // Realizar la consulta a la base de datos
    $sql = "SELECT * FROM medicos";
    $resultado = $conexion->query($sql);

    // Mostrar los resultados en una tabla
    if ($resultado->num_rows > 0) {
        echo "<h1>Información de la base de datos</h1>";
        echo "<table class='tabla-pacientes'>";
        echo "<tr><th>Nombre</th><th>Apellido</th><th>Cédula</th><th>Correo</th><th>Especialidad</th><th>Teléfono</th></tr>";
        
        // Recorrer los resultados y mostrar cada fila en la tabla
        while ($row = $resultado->fetch_assoc()) {
            
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellido'] . "</td>";
            echo "<td>" . $row['cedula'] . "</td>";
            echo "<td>" . $row['correo'] . "</td>";
            echo "<td>" . $row['especialidad'] . "</td>";
            echo "<td>" . $row['telefono'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron resultados en la base de datos.";
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
    ?>