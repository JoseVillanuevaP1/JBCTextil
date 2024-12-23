<?php
class controlVerificarEditarPedido
{
    public function mostrarListarPedidos($txtBuscarCliente, $txtBuscarDesde, $txtBuscarHasta, $txtBuscarEstado)
    {
        include_once('../../modelo/pedidos.php');
        $objuser = new pedidos;
        $pedidosArray = $objuser->obtenerPedidos($txtBuscarCliente, $txtBuscarDesde, $txtBuscarHasta, $txtBuscarEstado);
        include_once('../../moduloVentas/pedidos/formListarPedidos.php');
        $objForm = new formListarPedidos;
        $objForm = $objForm->formListarPedidosShow($pedidosArray, $txtBuscarCliente, $txtBuscarDesde, $txtBuscarHasta, $txtBuscarEstado);
    }
    public function mostrarEditarPedido($idPedido)
    {
        include_once('../../modelo/pedidos.php');
        $objpedido = new pedidos;
        $pedido = $objpedido->obtenerPedido($idPedido);
        include_once('../../modelo/detalles_pedido.php');
        $objdetalles = new detalles_pedido;
        $detallesPedido = $objdetalles->obtenerDetallesPedido($idPedido);
        include_once('../../modelo/productos.php');
        $OBJTipos = new productos;
        $productos = $OBJTipos->obtenerProductosPedido($idPedido);
        include_once('../../modelo/clientes.php');
        $OBJTipos = new clientes;
        $clientes = $OBJTipos->obtenerClientesPedido($idPedido);
        include_once('../../moduloVentas/pedidos/formEditarPedido.php');
        $OBJForm = new formEditarPedido;
        $OBJForm = $OBJForm->formEditarPedidoShow($pedido, $detallesPedido, $productos, $clientes);
    }

    public function editarPedido($idPedido, $txtCliente, $txtFechaEntrega, $txtLugarEntrega, $arrayProductos, $txtFechaEmision, $txtEstado, $txtIdUsuario)
    {
        include_once('../../modelo/pedidos.php');
        $OBJTipos = new pedidos;
        $OBJTipos->editarPedido($txtCliente, $txtFechaEntrega, $txtLugarEntrega, $txtFechaEmision, $txtEstado, $txtIdUsuario);
        include_once('../../modelo/detalles_pedido.php');
        $OBJTipos = new detalles_pedido;
        $OBJTipos = $OBJTipos->editarDetallesPedido($idPedido, $arrayProductos);
        include_once('../../compartido/mensajeConfirmacion.php');
        $OBJ = new mensajeConfirmacion;
        $OBJ = $OBJ->mensajeConfirmacionShow("Se editó exitosamente", "../pedidos/getEnlacePedido.php");
    }
}
