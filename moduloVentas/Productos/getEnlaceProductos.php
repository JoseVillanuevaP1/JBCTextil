<?php

function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}

$btnProductos = $_POST['btnProductos'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnProductos) || validarBoton($btnRegresar)) {
    include_once('./controlEnlaceProductos.php');
    $objForm = new controlEnlaceProductos;
    $objForm = $objForm->mostrarListarProductos();
} else {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", '../../index.php');
}
