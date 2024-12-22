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
$btnEditarUsuario = $_POST['btnEditarUsuario'] ?? null;
$btnConfirmarEditarUsuario = $_POST['btnConfirmarEditarUsuario'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnBuscarCliente)) {
    include_once('../../moduloVentas/clientes/controlVerificarEditarCliente.php');
    $txtBuscarNombre = $_POST['txtBuscarNombre'];
    $objForm = new controlVerificarEditarCliente;
    $objForm = $objForm->mostrarListarCliente($txtBuscarNombre);
} else if (validarBoton($btnEditarUsuario) || validarBoton($btnRegresar)) {
    $idUsuario = $_POST['idUsuario'];
    include_once('./controlVerificarEditarUsuario.php');
    $objForm = new controlVerificarEditarUsuario;
    $objForm = $objForm->mostrarEditarUsuario($idUsuario);
} else if (validarBoton($btnConfirmarEditarUsuario)) {
    $idUsuario = $_POST['idUsuario'];
    $txtUsuario = $_POST['txtUsuario'];
    $txtContrasenia = $_POST['txtContrasenia'];
    $txtNombre = $_POST['txtNombre'];
    $txtCorreo = $_POST['txtCorreo'];
    $arrayPrivilegios = $_POST['arrayPrivilegios'] ?? null;

    if (validarCamposUsuario($txtUsuario, $txtContrasenia, $txtNombre, $txtCorreo, $arrayPrivilegios)) {
        include_once('../moduloUsuario/controlVerificarEditarUsuario.php');
        $objForm = new controlVerificarEditarUsuario;
        $objForm = $objForm->actualizarUsuario($idUsuario, $txtUsuario, $txtContrasenia, $txtNombre, $txtCorreo, $arrayPrivilegios);
    } else {
        include_once('../compartido/mensajeSistema.php');
        $objMsj = new MensajeSistema;
        $objMsj->mensajeSistemaShow("Error: Datos no validos<br>", "../moduloUsuario/getVerificarRegistrarUsuario.php");
    }
} else {
    include_once('../compartido/mensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../index.php");
}
