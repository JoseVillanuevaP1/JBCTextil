<?php
function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}
function validarCamposPedido($txtUsuario, $txtContrasenia, $txtNombre, $txtCorreo, $arrayPrivilegios)
{
    if (
        strlen(trim($txtUsuario)) > 3  && strlen(trim($txtContrasenia)) > 3 &&
        strlen(trim($txtNombre)) > 3 && strlen(trim($txtCorreo)) > 3 && isset($arrayPrivilegios) && count($arrayPrivilegios) > 0
    )
        return 1;
    else
        return 0;
}

$btnRegistrarUsuario = $_POST['btnRegistrarUsuario'] ?? null;
$btnConfirmarRegistrarUsuario = $_POST['btnConfirmarRegistrarUsuario'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnRegistrarPedido) || validarBoton($btnRegresar)) {
    include_once('./controlVerificarAgregarPedido.php');
    $objForm = new controlVerificarAgregarPedido;
    $objForm = $objForm->mostrarRegistrarPedido();
} else if (validarBoton($btnConfirmarRegistrarUsuario)) {

    $txtUsuario = $_POST['txtUsuario'];
    $txtContrasenia = $_POST['txtContrasenia'];
    $txtNombre = $_POST['txtNombre'];
    $txtCorreo = $_POST['txtCorreo'];
    $arrayPrivilegios = $_POST['arrayPrivilegios'] ?? null;

    if (validarCamposUsuario($txtUsuario, $txtContrasenia, $txtNombre, $txtCorreo, $arrayPrivilegios)) {
        include_once('../moduloUsuario/controlVerificarRegistrarUsuario.php');
        $objForm = new controlVerificarRegistrarUsuario;
        $objForm = $objForm->registrarUsuario($txtUsuario, $txtContrasenia, $txtNombre, $txtCorreo, $arrayPrivilegios);
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
