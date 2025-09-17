<?php
session_start();
include ("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $consulta = $conexion->prepare("SELECT * FROM administrador WHERE NOMBRE = ?");
    $consulta->bind_param("s", $usuario);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();

        if (password_verify($contraseña, $row['CONTRASEÑA'])) {
            $_SESSION['usuario'] = $usuario;

            header("Location: index.php");
            exit(); 
        } else {
            header("Location: login.php?error=1"); 
            exit();
        }
    } else {
        header("Location: login.php?error=1");
        exit();
    }

    $consulta->close();
    $conexion->close();
}
?>
