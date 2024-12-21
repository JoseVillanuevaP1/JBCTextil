<?php
function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}

function validarCamposCliente($txtNombreCliente, $txtApellidoCliente, $intTipoDocumento, $intDocumento, $intTelefonoCliente, $txtCorreoCliente, $txtDireccionCliente)
{
    if (
        strlen(trim($txtNombreCliente)) > 0 && strlen(trim($txtNombreCliente)) <= 50 &&
        strlen(trim($txtApellidoCliente)) > 0 && strlen(trim($txtApellidoCliente)) <= 50 &&
        (
            (trim($intTipoDocumento) == 1 && strlen(trim($intDocumento)) == 8) ||
            (trim($intTipoDocumento) == 2 && strlen(trim($intDocumento)) == 11)
        ) &&
        (strlen(trim($intTelefonoCliente)) == 9 || strlen(trim($intTelefonoCliente)) == 0) &&
        (
            strlen(trim($txtCorreoCliente)) == 0 ||
            (strpos(trim($txtCorreoCliente), '@') !== false && strlen(trim($txtCorreoCliente)) <= 30)
        ) &&
        strlen(trim($txtDireccionCliente)) <= 150
    )
        return TRUE;
    else
        return FALSE;
}

$btnRegistrarCliente = $_POST['btnRegistrarCliente'] ?? null;
$btnConfirmarRegistrarCliente = $_POST['btnConfirmarRegistrarCliente'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnRegistrarCliente) || validarBoton($btnRegresar)) {
    include_once('./controlVerificarRegistrarCliente.php');

    $objForm = new controlVerificarRegistrarCliente;
    $objForm = $objForm->traerTiposDocumentos();
} else if (validarBoton($btnConfirmarRegistrarCliente)) {


    $txtNombreCliente = $_POST['txtNombreCliente'];
    $txtApellidoCliente = $_POST['txtApellidoCliente'];
    $intTipoDocumento = $_POST['intTipoDocumento'];
    $intDocumento = $_POST['intDocumento'];
    $intTelefonoCliente = $_POST['intTelefonoCliente'];
    $txtCorreoCliente = $_POST['txtCorreoCliente'];
    $txtDireccionCliente = $_POST['txtDireccionCliente'];

    if (validarCamposCliente($txtNombreCliente, $txtApellidoCliente, $intTipoDocumento, $intDocumento, $intTelefonoCliente, $txtCorreoCliente, $txtDireccionCliente)) {
        include_once('./controlVerificarRegistrarCliente.php');
        $objForm = new controlVerificarRegistrarCliente;
        $objForm = $objForm->registrarCliente($txtNombreCliente, $txtApellidoCliente, $intTipoDocumento, $intDocumento, $intTelefonoCliente, $txtCorreoCliente, $txtDireccionCliente);
    } else {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
        $objMsj = new MensajeSistema;
        $objMsj->mensajeSistemaShow("Error: Datos no validos<br>", "../clientes/getVerificarRegistrarCliente.php");
    }
} else {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../../index.php");
}
