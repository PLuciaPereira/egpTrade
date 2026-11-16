<?php
/**
 * Script de utilidad administrativa local para generar, insertar o actualizar contraseñas.
 * Por seguridad, solo se permite su ejecución a través de la interfaz de línea de comandos (CLI).
 */

if (php_sapi_name() !== 'cli') {
    die("Acceso denegado: este script solo puede ejecutarse desde la terminal o consola de comandos.\n");
}

include('conexion.php');

$contra = $argv[1] ?? null;
$usuario = $argv[2] ?? 'Eduardo';

if (!$contra) {
    echo "========================================================\n";
    echo "  UTILIDAD DE GENERACION / ACTUALIZACION DE CONTRASEÑA  \n";
    echo "========================================================\n";
    echo "Uso: php hash.php <nueva_contraseña> [usuario]\n";
    echo "Ejemplo: php hash.php MiClaveSegura2026\n";
    echo "Ejemplo para otro usuario: php hash.php MiClaveSegura2026 Eduardo\n\n";
    exit(1);
}

$contraseñaHasheada = password_hash($contra, PASSWORD_DEFAULT);

// Inserta si no existe o actualiza si ya existe el usuario con ID 1
$sql = "INSERT INTO administrador (ID, NOMBRE, CONTRASEÑA) VALUES (1, ?, ?) 
        ON DUPLICATE KEY UPDATE NOMBRE = VALUES(NOMBRE), CONTRASEÑA = VALUES(CONTRASEÑA)";

$stmt = $conexion->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ss", $usuario, $contraseñaHasheada);
    if ($stmt->execute()) {
        echo "Contraseña para el usuario '{$usuario}' guardada exitosamente en la base de datos 'egpcomex'.\n";
    } else {
        echo "Error al guardar la contraseña: " . $stmt->error . "\n";
    }
    $stmt->close();
} else {
    echo "Error preparando la consulta: " . $conexion->error . "\n";
}

$conexion->close();
?>
