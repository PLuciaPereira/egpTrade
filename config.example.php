<?php
/**
 * Plantilla de configuración general.
 * Copiar este archivo como `config.local.php` y configurar las credenciales correspondientes al entorno.
 */

// Base de datos MySQL
define('DB_HOST', 'localhost');
define('DB_USER', 'tu_usuario');
define('DB_PASS', 'tu_password');
define('DB_NAME', 'egpcomex');

// Configuración SMTP de correos (PHPMailer)
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USER', 'tu_correo@gmail.com');
define('SMTP_PASS', 'tu_contraseña_de_aplicacion');
define('SMTP_PORT', 587);
define('MAIL_TO', 'correo_destino@gmail.com');
