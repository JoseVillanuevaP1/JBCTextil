<?php
class controlVerificarEditarProducto
{
    public function mostrarListarProducto()
    {
        include_once('../../modelo/productos.php');
        $objuser = new productos;
        $productoArray = $objuser->obtenerProductos();
        include_once('./formListarProductos.php');
        $objForm = new formListarProductos;
        $objForm = $objForm->formListarProductosShow($productoArray);
    }
   
}