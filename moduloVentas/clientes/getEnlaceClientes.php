<?php
function validarBoton($boton)
{
    return isset($boton);
}
$btnClientes = $_POST['btnClientes'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnClientes) || validarBoton($btnRegresar)) {
    include_once('../../moduloVentas/clientes/controlEnlaceClientes.php');
} else {
    include_once('../../compartido/mensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../index.php");
}
