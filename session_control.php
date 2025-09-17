<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pagina_actual = basename($_SERVER['PHP_SELF']);

if (!isset($_SESSION['pagina_actual'])) {
    $_SESSION['pagina_actual'] = '';
}

// Definí las páginas que usan datos_modificar y en las que debe mantenerse
$paginas_con_datos_modificar = ['updateFormOp.php', 'updateForm.php'];

// Si estaba en una de esas páginas y ahora estoy en otra, limpiar datos_modificar
if (
    in_array($_SESSION['pagina_actual'], $paginas_con_datos_modificar) &&
    !in_array($pagina_actual, $paginas_con_datos_modificar)
) {
    unset($_SESSION['datos_modificar']);
}

// Actualiza la página actual
$_SESSION['pagina_actual'] = $pagina_actual;
?>
