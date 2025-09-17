<?php
include("conexion.php");

$mercaderia = isset($_POST['mercaderia']) ? trim($_POST['mercaderia']) : '';
$paisOrigen = isset($_POST["origen"]) ? trim($_POST["origen"]) : '';
$paisProc = isset($_POST["procedencia"]) ? trim($_POST["procedencia"]) : '';
$descripcion = isset($_POST["desc"]) ? trim($_POST["desc"]) : '';


$stmt = $conexion->prepare ("INSERT INTO mercaderia (nombre, origen, procedencia, descripcion) 
        VALUES (?, ?, ?, ?)");
$stmt -> bind_param("ssss", $mercaderia,$paisOrigen,$paisProc,$descripcion);

if ($stmt->execute()) {
    header("Location: listadoMercaderia.php");
    exit(); 
} else {
    echo "Error al ejecutar la consulta: " . $stmt->error;
}
?>
