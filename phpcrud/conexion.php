
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
}


?>


