<?php

function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}

$btnDistribuidores = $_POST['btnDistribuidores'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnDistribuidores) || validarBoton($btnRegresar)) {
    include_once('./controlEnlaceDistribuidores.php');
    $objForm = new controlEnlaceDistribuidores;
    $objForm = $objForm->mostrarListarDistribuidores();
} else {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/mensajeSistema.php');
    $objMsj = new mensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", '../../index.php');
}