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

$btnBuscarPedido = $_POST['btnBuscarPedido'] ?? null;
$btnEditarUsuario = $_POST['btnEditarUsuario'] ?? null;
$btnConfirmarEditarUsuario = $_POST['btnConfirmarEditarUsuario'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnBuscarPedido)) {

    $txtBuscarCliente = $_POST["txtBuscarCliente"] ?? null;
    $txtBuscarDesde = $_POST["txtBuscarDesde"] ?? null;
    $txtBuscarHasta = $_POST["txtBuscarHasta"] ?? null;
    $txtBuscarEstado = $_POST["txtBuscarEstado"] ?? null;

    include_once('../moduloVentas/controlVerificarEditarPedido.php');
    $objForm = new controlVerificarEditarPedido;
    $objForm = $objForm->mostrarListarPedidos($txtBuscarCliente, $txtBuscarDesde, $txtBuscarHasta, $txtBuscarEstado);
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
