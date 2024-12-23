<?php
function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}
function validarCamposPedido($txtCliente, $txtFechaEntrega, $txtLugarEntrega, $arrayIdDetallePedido, $arrayIdProductos, $arrayDescripcion, $arrayCantidad)
{
    if (
        isset($txtCliente) && isset($txtFechaEntrega) && isset($arrayIdDetallePedido) &&
        isset($txtLugarEntrega) && isset($arrayIdProductos) && isset($arrayDescripcion) && isset($arrayCantidad)
    )
        return 1;
    else
        return 0;
}

$txtBuscarCliente = $_POST["txtBuscarCliente"] ?? null;
$txtBuscarDesde = $_POST["txtBuscarDesde"] ?? null;
$txtBuscarHasta = $_POST["txtBuscarHasta"] ?? null;
$txtBuscarEstado = $_POST["txtBuscarEstado"] ?? null;


$txtCliente = $_POST['txtCliente'] ?? null;
$txtFechaEntrega = $_POST['txtFechaEntrega'] ?? null;
$txtLugarEntrega = $_POST['txtLugarEntrega'] ?? null;
$arrayIdDetallePedido = $_POST['arrayIdDetallePedido'] ?? null;
$arrayIdProductos = $_POST['arrayIdProductos'] ?? null;
$arrayDescripcion = $_POST['arrayDescripcion'] ?? null;
$arrayCantidad = $_POST['arrayCantidad'] ?? null;

$idPedido = $_POST['idPedido'] ?? null;
$btnBuscarPedido = $_POST['btnBuscarPedido'] ?? null;
$btnEditarPedido = $_POST['btnEditarPedido'] ?? null;
$btnConfirmarEditarPedido = $_POST['btnConfirmarEditarPedido'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnBuscarPedido)) {
    include_once('./controlVerificarEditarPedido.php');
    $txtBuscarNombre = $_POST['txtBuscarCliente'];
    $objForm = new controlVerificarEditarPedido;
    $objForm = $objForm->mostrarListarPedidos($txtBuscarCliente, $txtBuscarDesde, $txtBuscarHasta, $txtBuscarEstado);
} else if (validarBoton($btnEditarPedido) || validarBoton($btnRegresar)) {
    include_once('../pedidos/controlVerificarEditarPedido.php');
    $objForm = new controlVerificarEditarPedido;
    $objForm = $objForm->mostrarEditarPedido($idPedido);
} else if (validarBoton($btnConfirmarEditarPedido)) {
    if (validarCamposPedido($txtCliente, $txtFechaEntrega, $txtLugarEntrega, $arrayIdDetallePedido, $arrayIdProductos, $arrayDescripcion, $arrayCantidad)) {

        $arrayProductos = [];
        foreach ($arrayIdProductos as $index => $idProducto) {
            $arrayProductos[] = [
                'id_detalle_pedido' => $arrayIdDetallePedido[$index] ?? null,
                'idProducto' => ($idProducto),
                'descripcion' => ($arrayDescripcion[$index]),
                'cantidad' => (int)$arrayCantidad[$index]
            ];
        }
        session_start();
        $txtIdUsuario = $_SESSION["idUsuario"];
        $txtEstado = 'pedido';
        $txtFechaEmision = date('Y-m-d');
        include_once('../../moduloVentas/pedidos/controlVerificarEditarPedido.php');
        $objForm = new controlVerificarEditarPedido;
        $objForm = $objForm->editarPedido($idPedido, $txtCliente, $txtFechaEntrega, $txtLugarEntrega, $arrayProductos, $txtFechaEmision, $txtEstado, $txtIdUsuario);
    } else {
        include_once('../compartido/mensajeSistema.php');
        $objMsj = new mensajeSistema;
        $objMsj->mensajeSistemaShow("Error: Datos no validos<br>", "../moduloVentas/pedidos/getVerificarEditarPedido.php");
    }
} else {
    include_once('../compartido/mensajeSistema.php');
    $objMsj = new mensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "/jbctextil/index.php");
}
