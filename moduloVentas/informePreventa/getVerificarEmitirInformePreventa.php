<?php
function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}
function validarCamposPedido($txtCliente, $txtFechaEntrega, $txtLugarEntrega, $arrayIdProductos, $arrayDescripcion, $arrayCantidad)
{
    if (
        isset($txtCliente) && isset($txtFechaEntrega) &&
        isset($txtLugarEntrega) && isset($arrayIdProductos) && isset($arrayDescripcion) && isset($arrayCantidad)
    )
        return 1;
    else
        return 0;
}

$idPedido = $_POST['idPedido'] ?? null;
$idDetallePedido = $_POST['intIdDetallePedido'] ?? null;
$btnEmitirInformePreventa = $_POST['btnEmitirInformePreventa'] ?? null;
$btnAgregarRecursosPreventa = $_POST['btnAgregarRecursosPreventa'] ?? null;
$confirmarEmitirInformePreventa = $_POST['confirmarEmitirInformePreventa'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnEmitirInformePreventa) || validarBoton($btnRegresar)) {
    include_once('./controlVerificarEmitirInformePreventa.php');
    $objForm = new controlVerificarEmitirInformePreventa;
    $objForm = $objForm->mostrarEmitirInformePreventa($idPedido);
} else if (validarBoton($btnAgregarRecursosPreventa)) {
    include_once('./controlVerificarEmitirInformePreventa.php');
    $objForm = new controlVerificarEmitirInformePreventa;
    $objForm = $objForm->mostrarAgregarRecursosPreventa($idPedido, $idDetallePedido);
} else if (validarBoton($confirmarEmitirInformePreventa)) {
    include_once('../compartido/mensajeSistema.php');
    $objForm = new mensajeSistema;
    $objForm = $objForm->mensajeConfirmacionShow("Se registró correctamente", "/jbctextil/moduloVentas/getEnlacePedido.php");
} else {
    include_once('../compartido/mensajeSistema.php');
    $objMsj = new mensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../index.php");
}
