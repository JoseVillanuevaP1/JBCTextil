<?php
function validarBoton($boton)
{
    return isset($boton);    
}

$btnProductos = $_POST['btnProductos'] ?? null ;

if (validarBoton($btnProductos)) {
    include_once('./formListarProductos.php');
    $objForm = new formListarProductos;
    $objForm = $objForm->formListarProductosShow();
} else {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/pantalla.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeErrorShow("Error: Se ha detectado un acceso no autorizado<br>", "<p><a href='../index.php'>Ir al inicio</a></p>");
}
