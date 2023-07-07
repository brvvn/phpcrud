<?php
// * * Modificado: 04/07/2023 - Jose Montecinos
//Iniciamos la sesión
session_start();

require("Clases/Conexion.php");

// Crear una instancia de la clase Conexion
$conexion = new Conexion();
$conexion->Conecta();

// Validar el inicio de sesión
if (!isset($_SESSION['rut'])) {
    // Redireccionar al formulario de inicio de sesión si no hay sesión activa
    header('Location: index.php');
    exit();
}
?>

<head>
  <title>Panel Usuario Normal</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

<nav class="navbar navbar-expand navbar-dark bg-dark">
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="index.php" aria-current="page">CRUD PHP <span class="visually-hidden">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="listarUsuarios.php">Usuarios</a>
        </li>
    </ul>
</nav>

<main class="container">
    <?php ?>
    <div class="p-1 mb-2 bg-light rounded-3">
        <div class="container-fluid py-10">
          <h1 class="display-5 fw-bold">Crud PHP | Panel Usuario</h1>
          <p class="col-md-8 fs-4">Panel de usuario normal</p>

    <?php
        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();
        $conexion->Conecta();

        $consulta = "SELECT * FROM Usuario";

        $resultado = $conexion->Ejecuta($consulta);

        // Verificar si hay registros en el resultado
        if ($resultado->num_rows > 0) {
        ?>
            <table class="table table-bordered">
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
                    while ($row = $resultado->fetch_assoc()) {
                        // Accedemos a los datos de cada registro
                        $rut = $row['rut'];
                        $nombres = $row['nombres'];
                        $apellido_paterno = $row['apellido_paterno'];
                        $apellido_materno = $row['apellido_materno'];
                        $direccion = $row['direccion'];
                        $telefono = $row['telefono'];

                        // Aquí mprimir los datos en filas de la tabla
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
                <a href="index.php" button class="btn btn-primary btn-lg" type="button">Inicio</button></a>
        <?php
    } else {
        // Si no hay registros, mostrar un mensaje
        echo "<p>No se encontraron registros de usuarios.</p>";
    }
    
    ?>

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