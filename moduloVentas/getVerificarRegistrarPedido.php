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

$btnRegistrarPedido = $_POST['btnRegistrarPedido'] ?? null;
$btnConfirmarRegistrarPedido = $_POST['btnConfirmarRegistrarPedido'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnRegistrarPedido) || validarBoton($btnRegresar)) {
    include_once('./controlVerificarRegistrarPedido.php');
    $objForm = new controlVerificarRegistrarPedido;
    $objForm = $objForm->mostrarRegistrarPedido();
} else if (validarBoton($btnConfirmarRegistrarPedido)) {

    $txtCliente = $_POST['txtCliente'];
    $txtFechaEntrega = $_POST['txtFechaEntrega'];
    $txtLugarEntrega = $_POST['txtLugarEntrega'];
    $arrayIdProductos = $_POST['arrayIdProductos'] ?? null;
    $arrayDescripcion = $_POST['arrayDescripcion'] ?? null;
    $arrayCantidad = $_POST['arrayCantidad'] ?? null;

    if (validarCamposPedido($txtCliente, $txtFechaEntrega, $txtLugarEntrega, $arrayIdProductos, $arrayDescripcion, $arrayCantidad)) {

        $arrayProductos = [];
        foreach ($arrayIdProductos as $index => $idProducto) {
            $arrayProductos[] = [
                'idProducto' => ($idProducto),
                'descripcion' => ($arrayDescripcion[$index]),
                'cantidad' => (int)$arrayCantidad[$index]
            ];
        }
        session_start();
        $txtIdUsuario = $_SESSION["idUsuario"];
        $txtEstado = 'pedido';
        $txtFechaEmision = date('Y-m-d');

        include_once('../moduloVentas/controlVerificarRegistrarPedido.php');
        $objForm = new controlVerificarRegistrarPedido;
        $objForm = $objForm->registrarPedido($txtCliente, $txtFechaEntrega, $txtLugarEntrega, $arrayProductos, $txtFechaEmision, $txtEstado, $txtIdUsuario);
    } else {
        include_once('../compartido/mensajeSistema.php');
        $objMsj = new MensajeSistema;
        $objMsj->mensajeSistemaShow("Error: Datos no validos<br>", "../moduloVentas/getVerificarRegistrarPedido.php");
    }
} else {
    include_once('../compartido/mensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../index.php");
}
