<?php
class controlVerificarEditarPedido
{
    public function mostrarListarPedidos($txtBuscarNombre)
    {
        include_once('../modelo/pedidos.php');
        $objuser = new pedidos;
        $pedidosArray = $objuser->obtenerPedidos($txtBuscarNombre);
        include_once('../moduloVentas/formListarPedidos.php');
        $objForm = new formListarPedidos;
        $objForm = $objForm->formListarPedidosShow($pedidosArray);
    }
    public function mostrarEditarPedido($idPedido)
    {
        
        include_once('../modelo/productos.php');
        $OBJTipos = new productos;
        $productos = $OBJTipos->obtenerProductosPedido();
        include_once('../modelo/clientes.php');
        $OBJTipos = new clientes;
        $clientes = $OBJTipos->obtenerClientesPedido();
        include_once('../moduloVentas/formEditarPedido.php');
        $OBJForm = new formEditarPedido;
        $OBJForm = $OBJForm->formEditarPedidoShow($productos, $clientes);
    }

    public function editarPedido($idCliente,$txtNombreCliente,$txtApellidoCliente,$intTipoDocumento,$intDocumento,$intTelefonoCliente,$txtCorreoCliente,$txtDireccionCliente)
    {
        include_once('../../modelo/pedidos.php');
        $OBJTipos = new pedidos;
        $OBJTipos->editarPedido($idCliente,$txtNombreCliente,$txtApellidoCliente,$intTipoDocumento,$intDocumento,$intTelefonoCliente,$txtCorreoCliente,$txtDireccionCliente);
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/mensajeConfirmacion.php');
        $OBJ = new mensajeConfirmacion;
        $OBJ = $OBJ->mensajeConfirmacionShow("Se editó exitosamente", "../clientes/getEnlaceClientes.php");
    }
}
