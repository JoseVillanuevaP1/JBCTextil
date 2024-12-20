<?php
class controlVerificarEditarPedido
{
    public function mostrarListarPedidos()
    {
        include_once('../modelo/pedidos.php');
        $objuser = new pedidos;
        $usuarioArray = $objuser->obtenerPedidos();
        include_once('../moduloVentas/formListarPedidos.php');
        $objForm = new formListarPedidos;
        $objForm = $objForm->formListarPedidosShow($usuarioArray);
    }
}
