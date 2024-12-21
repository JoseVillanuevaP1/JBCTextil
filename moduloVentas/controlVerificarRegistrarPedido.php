<?php
class controlVerificarRegistrarPedido
{
    public function mostrarRegistrarPedido()
    {
        include_once('../modelo/productos.php');
        $OBJTipos = new productos;
        $productos = $OBJTipos->obtenerProductosPedido();
        include_once('../modelo/clientes.php');
        $OBJTipos = new clientes;
        $clientes = $OBJTipos->obtenerClientesPedido();
        include_once('../moduloVentas/formRegistrarPedido.php');
        $OBJForm = new formRegistrarPedido;
        $OBJForm = $OBJForm->formRegistrarPedidoShow($productos, $clientes);
    }
    public function registrarPedido($txtCliente, $txtFechaEntrega, $txtLugarEntrega,  $arrayProductos, $txtFechaEmision, $txtEstado, $txtIdUsuario)
    {
        include_once('../modelo/pedidos.php');
        $OBJpriv = new pedidos;
        $idPedido = $OBJpriv->registrarPedido($txtCliente, $txtFechaEntrega, $txtLugarEntrega, $txtFechaEmision, $txtEstado, $txtIdUsuario);
        include_once('../modelo/detalles_pedido.php');
        $OBJTipos = new detalles_pedido;
        $OBJTipos = $OBJTipos->registrarDetallesPedido($idPedido, $arrayProductos);
        include_once('../compartido/mensajeSistema.php');
        $OBJ = new MensajeSistema;
        $OBJ = $OBJ->mensajeConfirmacionShow("Se registró exitosamente", "../moduloVentas/getEnlacePedido.php");
    }
}
