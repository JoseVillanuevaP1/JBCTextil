<?php
class controlVerificarAgregarPedido
{
    public function mostrarRegistrarPedido()
    {
        include_once('../modelo/productos.php');
        $OBJTipos = new productos;
        $privilegios = $OBJTipos->obtenerProductos();
        // include_once('../moduloUsuario/formRegistrarProductos.php');
        // $OBJForm = new formRegistrarProductos;
        // $OBJForm = $OBJForm->formRegistrarProductosShow($privilegios);
    }
    public function registrarPedido($nombre, $password, $username, $correo, $arrayPrivilegios)
    {
        include_once('../modelo/usuarios.php');
        $OBJTipos = new usuarios;
        $idUsuario = $OBJTipos->registrarUsuario($nombre, $password, $username, $correo);
        include_once('../modelo/usuario_privilegios.php');
        $OBJpriv = new usuario_privilegios;
        $OBJpriv->registrarPrivilegios($idUsuario, $arrayPrivilegios);
        include_once('../compartido/mensajeSistema.php');
        $OBJ = new MensajeSistema;
        $OBJ = $OBJ->mensajeConfirmacionShow("Se registró exitosamente", "../moduloUsuario/getEnlaceUsuario.php");
    }
}
