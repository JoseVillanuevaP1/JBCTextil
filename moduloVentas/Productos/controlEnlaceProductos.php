<?php
class controlEnlaceProductos
{
    public function mostrarListarProductos()
    {
        include_once('./formListarProductos.php');
        $objForm = new formListarProductos;
        $objForm = $objForm->formListarProductosShow();
    }
}