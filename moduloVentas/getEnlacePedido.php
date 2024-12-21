<?php

function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}

$btnPedidos = $_POST['btnPedidos'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnPedidos) || validarBoton($btnRegresar)) {
    include_once('./controlEnlacePedido.php');
    $objForm = new controlEnlacePedido;
    $objForm = $objForm->mostrarListarPedidos();
} else {
    include_once('../compartido/mensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../index.php");
}
