<?php
include ('conexion.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $sql = "SELECT * FROM cliente WHERE ESTADO = 'A' AND nroCliente = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $update_sql = "UPDATE cliente SET ESTADO = 'I' WHERE nroCliente = ?";
        $update_stmt = $conexion->prepare($update_sql);
        $update_stmt->bind_param("i", $id);
        
        if ($update_stmt->execute()) {
            header ('Location: listadoClientes.php');
        } else {
            echo "Error al intentar desactivar el cliente.";
        }

        $update_stmt->close();
    } else {
        echo "El cliente no existe o ya está desactivado.";
    }

    $stmt->close();
}

$conexion->close();
?>
