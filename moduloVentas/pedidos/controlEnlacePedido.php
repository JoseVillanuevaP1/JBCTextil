<?php
class controlEnlacePedido
{
    public function mostrarListarPedidos()
    {
        include_once('./formListarPedidos.php');
        $objForm = new formListarPedidos;
        $objForm = $objForm->formListarPedidosShow();
    }
}
