<?php
    $servidor = 'localhost';
    $user = 'root';
    $contraseña = '';
    $db = 'egpcomex';
    
    $conexion = new mysqli($servidor, $user, $contraseña, $db);
    
    if ($conexion->connect_errno) {
        die("No se ha podido conectar a la base de datos " . $conexion->connect_error);
    }
    ?>
