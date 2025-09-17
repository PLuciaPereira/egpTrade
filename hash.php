<?php

include ('conexion.php');

$contra = "toluma990";
$contraseñaHasheada = password_hash($contra, PASSWORD_DEFAULT);

$sql = "INSERT INTO administrador (ID, NOMBRE, CONTRASEÑA) VALUES (1,'Eduardo', '$contraseñaHasheada')";
$consulta = mysqli_query($conexion,$sql);

if ($consulta) {
    echo "Contraseña registrada correctamente.";
} else {
    echo "Error al insertar la contraseña: " . mysqli_error($conexion);
}

$conexion->close();
?>
