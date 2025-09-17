<?php 
session_start();
include("conexion.php");

$destinacion = isset($_POST['destinacion']) ? trim($_POST['destinacion']) : '';
$mercaderia = isset($_POST['mercaderia']) ? trim($_POST['mercaderia']) : '';
$numOficializacion = isset($_POST["nroOficializacion"]) ? trim($_POST["nroOficializacion"]) : '';
$fecha_Of = isset($_POST["fechaOficializacion"]) ? trim($_POST["fechaOficializacion"]) : '';
$transporte = isset($_POST["transporte_id"]) ? trim($_POST["transporte_id"]) : '';
$digitalizacion = isset($_POST["digitalizacion_id"]) ? trim($_POST["digitalizacion_id"]) : '';
$nrocliente = isset($_POST["cliente_nro"]) ? trim($_POST["cliente_nro"]) : '';
$provExtranjero = isset($_POST["prov"]) ?  trim($_POST["prov"]) : '';
$idTributario = isset($_POST["idT"]) ?  trim($_POST["idT"]) : '';

$_SESSION['datos'] = $_POST;


$query = "SELECT * FROM OPERACION WHERE nroOficializacion = ? AND ESTADO = 'A' ";

$stmt = mysqli_prepare($conexion, $query);
mysqli_stmt_bind_param($stmt, "s", $numOficializacion);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $campoRepetido = 'Dato';
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['nroOficializacion'] === $numOficializacion) {
            $campoRepetido = 'Nro de oficializacion';
            break;
        }
    }

    header("Location: formularioOperaciones.php?campoRepetido=" . urlencode($campoRepetido));
    exit;
}

   $sql = $conexion -> prepare("INSERT INTO operacion (destinacion, mercaderia_id, nroOficializacion, fechaOficializacion, transporte_id, digitalizacion_id, cliente_nro, provExtranjero, idTributario) 
            VALUES (?, ?, ?, ?, ?, ?, ?,?,?)") ;
   $sql -> bind_param("sissiiiss", $destinacion, $mercaderia, $numOficializacion,$fecha_Of, $transporte, $digitalizacion, $nrocliente, $provExtranjero, $idTributario);         

    if ($sql->execute()) {
    unset($_SESSION['datos']);
    header("Location: listadoOperaciones.php");
    exit;
} else { 
    echo "Error al ejecutar la consulta: " . $conexion->error . "<br>";
    var_dump($sql); // Para debug si lo necesitas
}

    // Cerrar conexión de forma correcta
    $sql->close();
    $conexion->close();


?>
