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
        strlen(trim($txtNombreCliente)) > 0 && strlen(trim($txtNombreCliente)) <= 30 &&
        strlen(trim($txtApellidoCliente)) > 0 && strlen(trim($txtApellidoCliente)) <= 30 &&
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

$btnBuscarCliente = $_POST['btnBuscarCliente'] ?? null;
$btnEditarCliente = $_POST['btnEditarCliente'] ?? null;
$btnConfirmarEditarCliente = $_POST['btnConfirmarEditarCliente'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnBuscarCliente)) {
    include_once('../../moduloVentas/clientes/controlVerificarEditarCliente.php');
    $txtBuscarNombre = $_POST['txtBuscarNombre'];
    $objForm = new controlVerificarEditarCliente;
    $objForm = $objForm->mostrarListarCliente($txtBuscarNombre);
} else if (validarBoton($btnEditarCliente) || validarBoton($btnRegresar)) {
    $idCliente = $_POST['idCliente'];
    include_once('./controlVerificarEditarCliente.php');
    $objForm = new controlVerificarEditarCliente;
    $objForm = $objForm->mostrarEditarCliente($idCliente);
} else if (validarBoton($btnConfirmarEditarCliente)) {

    $idCliente = $_POST['idCliente'];
    $txtNombreCliente = $_POST['txtNuevosNombresCliente'];
    $txtApellidoCliente = $_POST['txtNuevosApellidosCliente'];
    $intTipoDocumento = $_POST['intNuevoTipoDocumentoCliente'];
    $intDocumento = $_POST['intNuevoDocumentoCliente'];
    $intTelefonoCliente = $_POST['intNuevoTelefonoCliente'];
    $txtCorreoCliente = $_POST['txtNuevoCorreoCliente'];
    $txtDireccionCliente = $_POST['txtNuevaDireccionCliente'];

    if (validarCamposCliente($txtNombreCliente,$txtApellidoCliente,$intTipoDocumento,$intDocumento,$intTelefonoCliente,$txtCorreoCliente,$txtDireccionCliente)) {
        include_once('./controlVerificarEditarCliente.php');
        $objForm = new controlVerificarEditarCliente;
        $objForm = $objForm->editarCliente($idCliente,$txtNombreCliente,$txtApellidoCliente,$intTipoDocumento,$intDocumento,$intTelefonoCliente,$txtCorreoCliente,$txtDireccionCliente);
    } else {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
        $objMsj = new MensajeSistema;
        $objMsj->mensajeSistemaShow("Error: Datos no validos<br>", "../moduloVentas/clientes/getVerificarEditarCliente.php");
    }
} else {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../../index.php");
}
