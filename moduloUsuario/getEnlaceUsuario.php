<?php

function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}

$btnUsuarios = $_POST['btnUsuarios'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnUsuarios) || validarBoton($btnRegresar)) {
    include_once('../moduloUsuario/controlEnlaceUsuario.php');
    $objForm = new controlEnlaceUsuario;
    $objForm = $objForm->mostrarListarUsuario();
} else {
    include_once('../compartido/mensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "<p><a href='../index.php'>Ir al inicio</a></p>");
}
