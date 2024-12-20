<?php

function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}

$btnComprobantesDePago = $_POST['btnComprobantesDePago'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnComprobantesDePago) || validarBoton($btnRegresar)) {
    include_once('./controlEnlaceComprobantesPago.php');
    $objForm = new controlEnlaceComprobantePago;
    $objForm = $objForm->mostrarListarComprobantePago();
} else {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", '../../index.php');
}
