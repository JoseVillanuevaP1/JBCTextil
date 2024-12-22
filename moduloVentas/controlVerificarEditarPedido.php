<?php
class controlVerificarEditarPedido
{
    public function mostrarListarPedidos($txtBuscarCliente, $txtBuscarDesde, $txtBuscarHasta, $txtBuscarEstado)
    {
        include_once('../modelo/pedidos.php');
        $objuser = new pedidos;
        $pedidosArray = $objuser->obtenerPedidos($txtBuscarCliente, $txtBuscarDesde, $txtBuscarHasta, $txtBuscarEstado);
        include_once('../moduloVentas/formListarPedidos.php');
        $objForm = new formListarPedidos;
        $objForm = $objForm->formListarPedidosShow($pedidosArray, $txtBuscarCliente, $txtBuscarDesde, $txtBuscarHasta, $txtBuscarEstado);
    }
}
