<?php
/*Creacion de Clase para Logearse*/

require("Clases/Conexion.php");
session_start();
class Autenticar
{
    private $rut;
    private $clave;

    public function __construct($rut, $clave)
    {
        $this->rut = $rut;
        $this->clave = $clave;
    }

    public function Validar()
    {
        $conexion = new Conexion();
        $conexion->Conecta();

        $consulta = "SELECT * FROM usuario WHERE rut = '$this->rut' AND clave = '$this->clave'";

        $resultado = $conexion->Ejecuta($consulta);  // esto es una funcion

        if ($resultado->num_rows == 1) {

            $row = $resultado->fetch_assoc();
            $tipoUsuario = $row['codigo'];

            $rut = $row['rut'];

          // var_dump($rut);
         //die();


           $_SESSION[$tipoUsuario]= 'codigo';

            if ($tipoUsuario == 1) {
                $_SESSION['rut']= $rut;
                header("location: listarUsuarios.php");

            } elseif ($tipoUsuario == 2) {
                $_SESSION['rut']= $rut;
                header("location:panel.php");

            } else {
                header('Location: index.php');
            }
        }
    }
}