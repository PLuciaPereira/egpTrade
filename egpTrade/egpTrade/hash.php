<?php
/**
 * Script de utilidad administrativa local para generar o actualizar contraseñas.
 * Por seguridad, solo se permite su ejecución a través de la interfaz de línea de comandos (CLI).
 */

if (php_sapi_name() !== 'cli') {
    die("Acceso denegado: este script solo puede ejecutarse desde la terminal o consola de comandos.\n");
}

include('conexion.php');

$contra = $argv[1] ?? null;

if (!$contra) {
    echo "========================================================\n";
    echo "  UTILIDAD DE GENERACION / ACTUALIZACION DE CONTRASEÑA  \n";
    echo "========================================================\n";
    echo "Uso: php hash.php <nueva_contraseña>\n";
    echo "Ejemplo: php hash.php MiClaveSegura2026\n\n";
    exit(1);
}

$contraseñaHasheada = password_hash($contra, PASSWORD_DEFAULT);

// Actualiza la contraseña del usuario administrador de forma segura mediante consulta preparada
$sql = "UPDATE administrador SET CONTRASEÑA = ? WHERE ID = 1";
$stmt = $conexion->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $contraseñaHasheada);
    if ($stmt->execute()) {
        echo "Contraseña de administrador actualizada correctamente en la base de datos.\n";
    } else {
        echo "Error al actualizar la contraseña: " . $stmt->error . "\n";
    }
    $stmt->close();
} else {
    echo "Error preparando la consulta: " . $conexion->error . "\n";
}

$conexion->close();
?>
