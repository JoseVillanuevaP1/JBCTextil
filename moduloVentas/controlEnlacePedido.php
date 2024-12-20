<?php
class controlEnlacePedido
{
    public function mostrarListarPedido()
    {
        include_once('../moduloVentas/formListarPedidos.php');
        $objForm = new formListarPedidos;
        $objForm = $objForm->formListarPedidosShow();
    }
}
