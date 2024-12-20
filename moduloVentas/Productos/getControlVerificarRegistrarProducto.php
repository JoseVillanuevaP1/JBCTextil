<?php
function validarBoton($boton)
{
    return isset($boton);    
}


$btnProductos = $_POST['btnRegistrarProducto'] ?? null ;


if (validarBoton($btnProductos)) {
    include_once('./formRegistrarProducto.php');
    $objForm = new formRegistrarProducto;
    $objForm = $objForm->formRegistrarProductoShow();
} else {
    include_once('../../compartido/mensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeErrorShow("Error: Se ha detectado un acceso no autorizado<br>", "<p><a href='../index.php'>Ir al inicio</a></p>");
}
