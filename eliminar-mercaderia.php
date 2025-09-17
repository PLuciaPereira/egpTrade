<?php
include ('conexion.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 


    $sql = "SELECT * FROM mercaderia WHERE ESTADO = 'A' AND codigo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        $update_sql = "UPDATE mercaderia SET ESTADO = 'I' WHERE codigo = ?";
        $update_stmt = $conexion->prepare($update_sql);
        $update_stmt->bind_param("i", $id);
        
        if ($update_stmt->execute()) {
            header ('Location: listadoMercaderia.php');
        } else {
            echo "Error al intentar desactivar la operacion.";
        }

        $update_stmt->close();
    } else {
        echo "La operacion no existe o ya está desactivado.";
    }

    $stmt->close();
}

$conexion->close();
?>
