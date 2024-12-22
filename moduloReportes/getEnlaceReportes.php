<?php

function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}

$btnReportes = $_POST['btnReportes'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnReportes) || validarBoton($btnRegresar)) {
    include_once('./controlEnlaceReportes.php');
    $objForm = new controlEnlaceReportes;
    $objForm = $objForm->mostrarListarFiltrosReportes();
} else {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/mensajeSistema.php');
    $objMsj = new mensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", '../../index.php');
}