<?php
function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}
function validarCamposComprobantesPago($txtNombre, $txtRUC, $txtDireccion, $txtCorreo,$txtTelefono1,$txtTelefono2,$txtTelefono3)
{
    if (
        strlen(trim($txtNombre)) > 3  && strlen(trim($txtRUC)) == 11 &&
        strlen(trim($txtDireccion)) > 3 && strlen(trim($txtCorreo)) > 3 &&
        (strlen(trim($txtTelefono1)) == 0 OR strlen(trim($txtTelefono1))== 9) &&
        (strlen(trim($txtTelefono2)) == 0 OR strlen(trim($txtTelefono2)) == 9) &&
        (strlen(trim($txtTelefono3)) == 0 OR strlen(trim($txtTelefono3)) == 9)
    )
        return 1;
    else
        return 0;
}

$btnEmitirComprobantePago = $_POST['btnEmitirComprobantePago'] ?? null;
$btnConfirmarEmitirComprobantePago = $_POST['btnConfirmarEmitirComprobantePago'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnEmitirComprobantePago) || validarBoton($btnRegresar)) {
    include_once('./controlVerificarEmitirComprobantePago.php');
    $objForm = new controlVerificarEmitirComprobantePago;
    $objForm = $objForm->mostrarEmitirComprobantePago();
} else if (validarBoton($btnConfirmarEmitirComprobantePago)) {

    $txtNombre = $_POST['txtNombre'];
    $txtRUC = $_POST['txtRUC'];
    $txtDireccion = $_POST['txtDireccion'];
    $txtCorreo = $_POST['txtCorreo'];
    $txtTelefono1 = $_POST['txtTelefono1'];
    $txtTelefono2  = $_POST['txtTelefono2'];
    $txtTelefono3  = $_POST['txtTelefono3'];

    if (validarCamposDistribuidor($txtNombre, $txtRUC, $txtDireccion, $txtCorreo,$txtTelefono1,$txtTelefono2,$txtTelefono3)) {
        include_once('./controlVerificarEmitirComprobantePago.php');
        $objForm = new controlVerificarEmitirComprobantePago;
        $objForm = $objForm->registrarDistribuidor($txtNombre, $txtRUC, $txtDireccion, $txtCorreo,$txtTelefono1,$txtTelefono2,$txtTelefono3);
    } else {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
        $objMsj = new MensajeSistema;
        $objMsj->mensajeSistemaShow("Error: Datos no validos<br>", "../ComprobantesPago/getVerificarEmitirComprobantePago.php");
    }
} else {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../../index.php");
}