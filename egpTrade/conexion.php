<?php
    if (file_exists(__DIR__ . '/../config.local.php')) {
        require_once __DIR__ . '/../config.local.php';
    }

    $servidor = defined('DB_HOST') ? DB_HOST : 'localhost';
    $user = defined('DB_USER') ? DB_USER : 'root';
    $contraseña = defined('DB_PASS') ? DB_PASS : '';
    $db = defined('DB_NAME') ? DB_NAME : 'egpcomex';
    
    $conexion = new mysqli($servidor, $user, $contraseña, $db);
    
    if ($conexion->connect_errno) {
        die("No se ha podido conectar a la base de datos " . $conexion->connect_error);
    }
?>
