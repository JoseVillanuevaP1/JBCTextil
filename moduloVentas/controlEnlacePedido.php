<?php
class controlEnlacePedido
{
    public function mostrarListarPedidos()
    {
        include_once('../moduloVentas/formListarPedidos.php');
        $objForm = new formListarPedidos;
        $objForm = $objForm->formListarPedidosShow();
    }
}
