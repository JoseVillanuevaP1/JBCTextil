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

$btnRegistrarUsuario = $_POST['btnRegistrarUsuario'] ?? null;
$txtUsuario = $_POST['txtUsuario']  ?? null;
$txtContrasenia = $_POST['txtContrasenia']  ?? null;
$txtNombre = $_POST['txtNombre']  ?? null;
$txtCorreo = $_POST['txtCorreo']  ?? null;
$intHabilitado = $_POST['intHabilitado']  ?? null;
$arrayPrivilegios = $_POST['arrayPrivilegios'] ?? null;

$btnConfirmarRegistrarUsuario = $_POST['btnConfirmarRegistrarUsuario'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnRegistrarUsuario) || validarBoton($btnRegresar)) {
    include_once('./controlVerificarRegistrarUsuario.php');
    $objForm = new controlVerificarRegistrarUsuario;
    $objForm = $objForm->mostrarRegistrarUsuario();
} else if (validarBoton($btnConfirmarRegistrarUsuario)) {

    if (validarCamposUsuario($txtUsuario, $txtContrasenia, $txtNombre, $txtCorreo, $arrayPrivilegios, $intHabilitado)) {
        include_once('../moduloUsuario/controlVerificarRegistrarUsuario.php');
        $objForm = new controlVerificarRegistrarUsuario;
        $objForm = $objForm->registrarUsuario($txtUsuario, $txtContrasenia, $txtNombre, $txtCorreo, $arrayPrivilegios, $intHabilitado);
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
