<?php
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_de_datos = 'QPromotor';

// Crear una conexión
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar si hay errores de conexión
if ($conexion->connect_errno) {
    echo "Error al conectar a la base de datos: " . $conexion->connect_error;
    // Aquí puedes agregar el manejo de errores adecuado para tu aplicación
} else {
    // Recuperar los datos enviados desde el formulario
    $rut = $_POST['txtRut'];
    $nombres = $_POST['txtNombre'];
    $apellidoPaterno = $_POST['txtApellidoP'];
    $apellidoMaterno = $_POST['txtApellidoM'];
    $direccion = $_POST['txtDireccion'];
    $telefono = $_POST['txtTelefono'];
    $clave = $_POST['txtContraseña'];

    // Ejecutar la consulta de inserción
    $query = "INSERT INTO Usuario (rut, nombres, apellido_paterno, apellido_materno, direccion, telefono, clave) 
              VALUES ('$rut', '$nombres', '$apellidoPaterno', '$apellidoMaterno', '$direccion', '$telefono', '$clave')";

    if ($conexion->query($query)) {
        echo "Usuario registrado exitosamente";
    } else {
        echo "Error al registrar el usuario: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Registrarse</title>
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
            <a class="nav-link" href="<?php echo $url_base; ?>modulos/usuarios/">Usuarios</a>
        </li>
    </ul>
</nav>
  <main class="container">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Registrate</h1>
            <p class="col-md-8 fs-4">Completa el siguiente formulario para registrarte en nuestra base de datos.</p>
            <form class="text-left- bg-light" action="registrar.php" method="post">
                <div class="mb-3">
                    <label for="" class="form-label">R.U.T</label>
                    <input type="text" class="form-control" name="txtRut" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Ingrese su Rut</small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="txtNombre" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Ingrese su nombre</small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" name="txtApellidoP" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Ingrese su apellido paterno</small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" name="txtApellidoM" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Ingrese su apellido materno</small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="txtDireccion" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Ingrese su dirección</small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Telefono</label>
                    <input type="text" class="form-control" name="txtTelefono" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Ingrese su número de telefono</small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="txtContraseña" id="" placeholder="">
                </div>
                <button type="submit" class="btn btn-success">Registrar</button>
            </form>
            
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


<!--ANTES ME FUNCIONABA!! -->
</html>

