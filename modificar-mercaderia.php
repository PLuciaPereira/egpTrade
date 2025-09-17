<?php
include("conexion.php");


$id_mercaderia = isset($_POST['codigo']) ? $_POST['codigo'] : '';
$mercaderia = isset($_POST['mercaderia']) ? trim($_POST['mercaderia']) : '';
$paisOrigen = isset($_POST["origen"]) ? trim($_POST["origen"]) : '';
$paisProc = isset($_POST["procedencia"]) ? trim($_POST["procedencia"]) : '';
$descripcion = isset($_POST["desc"]) ? trim($_POST["desc"]) : '';


$consulta = $conexion -> prepare("UPDATE mercaderia 
             SET nombre=?,   
                 origen=?, 
                 procedencia=?, 
                 descripcion=? 
             WHERE codigo=?");
$consulta -> bind_param("siisi", $mercaderia, $paisOrigen, $paisProc, $descripcion, $id_mercaderia);             

if ($consulta ->execute()) {
    header("Location: listadoMercaderia.php");
    exit;
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}
?>
