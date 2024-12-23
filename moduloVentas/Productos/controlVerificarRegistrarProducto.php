<?php
class controlVerificarRegistrarProducto
{
    public function mostrarRegistrarProducto()
    {
        include_once('../../modelo/privilegios.php');
        $OBJTipos = new privilegios;
        $privilegios = $OBJTipos->obtenerPrivilegios();
        include_once('./formRegistrarProducto.php');
        $OBJForm = new formRegistrarProducto;
        $OBJForm = $OBJForm->formRegistrarProductoShow($privilegios);
    }
    public function registrarProducto($txtNombre)
    {
        include_once('../../modelo/productos.php');
        $OBJTipos = new productos;
        $OBJTipos->registrarProducto($txtNombre);
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/mensajeConfirmacion.php');
        $OBJ = new mensajeConfirmacion;
        $OBJ = $OBJ->mensajeConfirmacionShow("Se registró exitosamente", "../Productos/getEnlaceProductos.php");
    }
}