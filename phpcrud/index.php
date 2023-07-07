<?php
// Iniciamos la sesión
session_start();

// Verificar si hay un mensaje en la sesión
if (isset($_SESSION['mensaje'])) {
    echo "<p>" . $_SESSION['mensaje'] . "</p>";
    unset($_SESSION['mensaje']); // Eliminar el mensaje de la sesión
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Inicio</title>
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
            <a class="nav-link active" href="#" aria-current="page">CRUD PHP <span class="visually-hidden">(current)</span></a>
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
          <h1 class="display-5 fw-bold">Crud PHP</h1>
          <p class="col-md-8 fs-4">Bienvenido a la página de inicio de sesion</p>
          <p class="col-md-8 fs-4">Ingrese sus credenciales:</p>
            <form method="post" action="listarUsuarios.php">
                <div class="mb-3">
                    <label for="rut" class="form-label">RUT:</label>
                    <input type="text"
                    class="form-control" name="rut" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Ingrese su rut</small>
                </div>
                <div class="mb-3">
                    <label for="clave" class="form-label">Contraseña:</label>
                    <input type="password"
                    class="form-control" name="clave" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Aquí su contraseña</small>
                </div>
                <input button class="btn btn-primary btn-lg"  type="submit" value="Iniciar Sesión"></button>
                <a href="registrar.php" button class="btn btn-primary btn-lg" type="button">Registrar</button></a>
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