<?php
function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}
function validarCamposUsuario($txtUsuario, $txtContrasenia, $txtNombre, $txtCorreo, $arrayPrivilegios, $intHabilitado)
{
    if (
        strlen(trim($txtUsuario)) > 3  && strlen(trim($txtContrasenia)) > 3 &&
        strlen(trim($txtNombre)) > 3 && strlen(trim($txtCorreo)) > 3 && isset($intHabilitado) && isset($arrayPrivilegios) && count($arrayPrivilegios) > 0
    )
        return 1;
    else
        return 0;
}

// buscador
$btnBuscarUsuario = $_POST['btnBuscarUsuario'] ?? null;
$txtBuscarNombre = $_POST['txtBuscarNombre'] ?? null;
$txtBuscarUsername = $_POST['txtBuscarUsername'] ?? null;

// formulario
$txtUsuario = $_POST['txtUsuario']  ?? null;
$txtContrasenia = $_POST['txtContrasenia']  ?? null;
$txtNombre = $_POST['txtNombre']  ?? null;
$txtCorreo = $_POST['txtCorreo']  ?? null;
$intHabilitado = $_POST['intHabilitado']  ?? null;
$arrayPrivilegios = $_POST['arrayPrivilegios'] ?? null;

// para botones
$idUsuario = $_POST['idUsuario'] ?? null;
$btnEditarUsuario = $_POST['btnEditarUsuario'] ?? null;
$btnConfirmarEditarUsuario = $_POST['btnConfirmarEditarUsuario'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnBuscarUsuario)) {
    include_once('../moduloUsuario/controlVerificarEditarUsuario.php');
    $objForm = new controlVerificarEditarUsuario;
    $objForm = $objForm->mostrarListarUsuario($txtBuscarNombre, $txtBuscarUsername);
} else if (validarBoton($btnEditarUsuario) || validarBoton($btnRegresar)) {
    include_once('./controlVerificarEditarUsuario.php');
    $objForm = new controlVerificarEditarUsuario;
    $objForm = $objForm->mostrarEditarUsuario($idUsuario);
} else if (validarBoton($btnConfirmarEditarUsuario)) {
    if (validarCamposUsuario($txtUsuario, $txtContrasenia, $txtNombre, $txtCorreo, $arrayPrivilegios, $intHabilitado)) {
        include_once('../moduloUsuario/controlVerificarEditarUsuario.php');
        $objForm = new controlVerificarEditarUsuario;
        $objForm = $objForm->actualizarUsuario($idUsuario, $txtUsuario, $txtContrasenia, $txtNombre, $txtCorreo, $arrayPrivilegios, $intHabilitado);
    } else {
        include_once('../compartido/mensajeSistema.php');
        $objMsj = new mensajeSistema;
        $objMsj->mensajeSistemaShow("Error: Datos no validos<br>", "../moduloUsuario/getVerificarRegistrarUsuario.php");
    }
} else {
    include_once('../compartido/mensajeSistema.php');
    $objMsj = new mensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../index.php");
}
