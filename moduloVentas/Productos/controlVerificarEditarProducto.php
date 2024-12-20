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
    public function mostrarEditarProducto($idProducto)
    {
        include_once('../modelo/productos.php');
        $objuser = new productos;
        $usuarioArray = $objuser->obtenerProducto($idProducto);
        include_once('../modelo/usuario_privilegios.php');
        $objuserp = new usuario_privilegios;
        $privilegiosArray = $objuserp->obtenerUsuarioPrivilegios($idUsuario);
        $objuser = new usuarios;
        $usuarioArray = $objuser->obtenerUsuario($idUsuario);
        include_once('../modelo/privilegios.php');
        $OBJTipos = new privilegios;
        $privilegios = $OBJTipos->obtenerPrivilegios();
        include_once('../moduloUsuario/formEditarUsuario.php');
        $OBJForm = new formEditarUsuario;
        $OBJForm = $OBJForm->formEditarUsuarioShow($privilegios, $productoArray, $privilegiosArray);
    }

    public function actualizarProducto($idProducto, $txtNombre, $arrayPrivilegios)
    {
        include_once('../modelo/usuarios.php');
        $OBJTipos = new productos;
        $OBJTipos->actualizarProducto($idProducto, $txtNombre);
        include_once('../compartido/mensajeSistema.php');
        $OBJ = new MensajeSistema;
        $OBJ = $OBJ->mensajeConfirmacionShow("Se editó exitosamente", "../moduloVentas/Productos/getEnlaceProductos.php");
    }
   
}