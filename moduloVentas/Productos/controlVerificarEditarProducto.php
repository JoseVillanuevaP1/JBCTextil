<?php
class controlVerificarEditarProducto
{
    public function mostrarListarProducto($txtBuscarNombreProducto)
    {
        include_once('../../modelo/productos.php');
        $objuser = new productos;
        $productoArray = $objuser->obtenerProductos($txtBuscarNombreProducto);
        include_once('../../moduloVentas/Productos/formListarProductos.php');
        $objForm = new formListarProductos;
        $objForm = $objForm->formListarProductosShow($productoArray);
    }
    public function mostrarEditarProducto($idProducto)
    {
        include_once('../../modelo/productos.php');
        $objuser = new productos;
        $productoArray = $objuser->obtenerProducto($idProducto);
        include_once('./formEditarProducto.php');
        $OBJForm = new formEditarProducto;
        $OBJForm = $OBJForm->formEditarProductoShow($productoArray);
    }

    public function editarProducto($idProducto, $txtNombreProducto)
    {
        include_once('../../modelo/productos.php');
        $OBJTipos = new productos;
        $OBJTipos->editarProducto($idProducto, $txtNombreProducto);
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/mensajeConfirmacion.php');
        $OBJ = new mensajeConfirmacion;
        $OBJ = $OBJ->mensajeConfirmacionShow("Se editó exitosamente", "../Productos/getEnlaceProductos.php");
    }
}