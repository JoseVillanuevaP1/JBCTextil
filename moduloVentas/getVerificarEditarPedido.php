<?php
function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}
function validarCamposPedido($txtCliente, $txtFechaEntrega, $txtLugarEntrega, $arrayIdProductos, $arrayDescripcion, $arrayCantidad)
{
    if (
        isset($txtCliente) && isset($txtFechaEntrega) &&
        isset($txtLugarEntrega) && isset($arrayIdProductos) && isset($arrayDescripcion) && isset($arrayCantidad)
    )
        return 1;
    else
        return 0;
}

$btnBuscarPedido = $_POST['btnBuscarPedido'] ?? null;
$btnEditarPedido= $_POST['btnEditarPedido'] ?? null;
$btnConfirmarEditarPedido = $_POST['btnConfirmarEditarPedido'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnBuscarPedido)) {
    include_once('../moduloVentas/controlVerificarEditarPedido.php');
    $txtBuscarNombre = $_POST['txtBuscarNombreClientePedido'];
    $objForm = new controlVerificarEditarPedido;
    $objForm = $objForm->mostrarListarPedidos($txtBuscarNombre);
} else if (validarBoton($btnEditarPedido) || validarBoton($btnRegresar)) {
    $idPedido = $_POST['idPedido'];
    include_once('./controlVerificarEditarPedido.php');
    $objForm = new controlVerificarEditarPedido;
    $objForm = $objForm->mostrarEditarPedido($idPedido);
} else if (validarBoton($btnConfirmarEditarPedido)) {

    $idPedido = $_POST['idPedido'];
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
