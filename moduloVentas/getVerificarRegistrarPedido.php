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

$btnRegistrarPedido = $_POST['btnRegistrarPedido'] ?? null;
$btnConfirmarRegistrarPedido = $_POST['btnConfirmarRegistrarPedido'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnRegistrarPedido) || validarBoton($btnRegresar)) {
    include_once('./controlVerificarRegistrarPedido.php');
    $objForm = new controlVerificarRegistrarPedido;
    $objForm = $objForm->mostrarRegistrarPedido();
} else if (validarBoton($btnConfirmarRegistrarPedido)) {

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
