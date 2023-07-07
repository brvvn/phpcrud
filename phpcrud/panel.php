<?php
//Iniciamos la sesión
session_start();
require("Clases/Conexion.php");

// Validar el inicio de sesión
//if (!isset($_SESSION['rut'])) {
    // Redireccionar al formulario de inicio de sesión si no hay sesión activa
  //  header('Location: index.php');
    //exit();
//}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Bienvenido, <?php echo $_SESSION['rut']; ?>!</h1>
        <h2>Datos de usuarios</h2>
        <br>
        <h4>DATOS:</h4>
        <br>
        <?php
        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();
        $conexion->Conecta();

        $consulta = "SELECT * FROM Usuario";

        $resultado = $conexion->Ejecuta($consulta);

        // Verificar si hay registros en el resultado
        if ($resultado->num_rows > 0) {
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>RUT</th>
                        <th>Nombres</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Recorrer los registros con un bucle while
                    while ($row = $resultado->fetch_assoc()) {
                        // Acceder a los datos de cada registro
                        $rut = $row['rut'];
                        $nombres = $row['nombres'];
                        $apellido_paterno = $row['apellido_paterno'];
                        $apellido_materno = $row['apellido_materno'];
                        $direccion = $row['direccion'];
                        $telefono = $row['telefono'];

                        // Imprimir los datos en filas de la tabla
                        echo "<tr>";
                        echo "<td>" . $rut . "</td>";
                        echo "<td>" . $nombres . "</td>";
                        echo "<td>" . $apellido_paterno . "</td>";
                        echo "<td>" . $apellido_materno . "</td>";
                        echo "<td>" . $direccion . "</td>";
                        echo "<td>" . $telefono . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
            // Si no hay registros, mostrar un mensaje
            echo "<p>No se encontraron registros en la base de datos.</p>";
        }

        ?>
        <a href="index.php" button class="btn btn-primary btn-lg" type="button">Inicio</button></a>
    </div>

    <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>