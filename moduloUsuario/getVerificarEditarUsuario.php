<?php
function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}
function validarCamposUsuario($txtUsuario, $txtContrasenia, $txtNombre, $txtCorreo, $arrayPrivilegios)
{
    if (
        strlen(trim($txtUsuario)) > 3  && strlen(trim($txtContrasenia)) > 3 &&
        strlen(trim($txtNombre)) > 3 && strlen(trim($txtCorreo)) > 3 && isset($arrayPrivilegios) && count($arrayPrivilegios) > 0
    )
        return 1;
    else
        return 0;
}

$btnBuscarUsuario = $_POST['btnBuscarUsuario'] ?? null;
$txtBuscarNombre = $_POST['txtBuscarNombre'] ?? null;
$txtBuscarUsername = $_POST['txtBuscarUsername'] ?? null;


$btnEditarUsuario = $_POST['btnEditarUsuario'] ?? null;
$btnConfirmarEditarUsuario = $_POST['btnConfirmarEditarUsuario'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnBuscarUsuario)) {
    include_once('../moduloUsuario/controlVerificarEditarUsuario.php');
    $objForm = new controlVerificarEditarUsuario;
    $objForm = $objForm->mostrarListarUsuario($txtBuscarNombre, $txtBuscarUsername);
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
        $objMsj = new mensajeSistema;
        $objMsj->mensajeSistemaShow("Error: Datos no validos<br>", "../moduloUsuario/getVerificarRegistrarUsuario.php");
    }
} else {
    include_once('../compartido/mensajeSistema.php');
    $objMsj = new mensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../index.php");
}
