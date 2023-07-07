<?php
session_start();
require("Clases/Conexion.php");

// Validar el inicio de sesión
if (!isset($_SESSION['rut'])) {
    // Redireccionar al formulario de inicio de sesión si no hay sesión activa
    header('Location: index.php');
    exit();
}

// Verificar si se ha enviado un formulario para eliminar un usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si el rut del usuario a eliminar está presente en la solicitud POST
    if (isset($_POST["rut"])) {
        $rut = $_POST["rut"];

        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();
        $conexion->Conecta();

        // Realizar la consulta de eliminación
        $query = "DELETE FROM usuario WHERE rut = '$rut'";
        $resultado = $conexion->Ejecuta($query);

        if ($resultado) {
            echo "El usuario ha sido eliminado correctamente.";
        } else {
            echo "Error al eliminar el usuario!";
        }
    } else {
        echo "Falta el rut del usuario a eliminar...";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Eliminar Usuario</title>
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
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <h1 class="display-5 fw-bold">Crud PHP | Eiminar Usuarios</h1>
          <p class="col-md-8 fs-4">Panel para eliminar un usuario</p>
          <p class="col-md-8 fs-4">Ingrese el RUT del usuario a eliminar</p>
            <form method="post" action="eliminarUsuario.php">
                <div class="mb-3">
                    <label for="rut" class="form-label">RUT:</label>
                    <input type="text"
                    class="form-control" name="rut" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Ingrese el rut</small>
                </div>
                <input button class="btn btn-primary btn-lg"  type="submit" value="Eliminar"></button>
                <a href="index.php" button class="btn btn-primary btn-lg" type="button">Inicio</button></a>
            </form>
        </div>
      </div>

  </main>
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