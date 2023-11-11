<?php

            // Realizar la consulta a la base de datos
    $sql = "SELECT * FROM paciente";
    $resultado = $conexion->query($sql);

    // Mostrar los resultados en una tabla
    if ($resultado->num_rows > 0) {
        echo "<h1>Información de la base de datos</h1>";
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Apellido</th><th>Cédula</th><th>Correo</th><th>Especialidad</th><th>Teléfono</th></tr>";
        
        // Recorrer los resultados y mostrar cada fila en la tabla
        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['cedula'] . "</td>";
            echo "<td>" . $row['primer_nombre'] . "</td>";
            echo "<td>" . $row['segundo_nombre'] . "</td>";
            echo "<td>" . $row['primer_apellido'] . "</td>";
            echo "<td>" . $row['segundo_apellido'] . "</td>";
            echo "<td>" . $row['representante'] . "</td>";
            echo "<td>" . $row['fecha_nacimiento'] . "</td>";
          
            echo "<td>" . $row['estado_civil'] . "</td>";
            echo "<td>" . $row['direccion'] . "</td>";
            echo "<td>" . $row['telefono'] . "</td>";
            echo "<td>" . $row['sexo'] . "</td>";
            echo "<td>" . $row['lugar_nacimiento'] . "</td>";
            echo "<td>" . $row['nacionalidad'] . "</td>";
            echo "<td>" . $row['correo'] . "</td>";
            echo "</tr>";
        }
        

        echo "</table>";
    } else {
        echo "No se encontraron resultados en la base de datos.";
    }

    

    // Cerrar la conexión a la base de datos
    $conexion->close();
    ?>