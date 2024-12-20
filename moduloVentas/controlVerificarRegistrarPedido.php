<?php
class controlVerificarRegistrarPedido
{
    public function mostrarRegistrarPedido()
    {
        include_once('../modelo/productos.php');
        $OBJTipos = new productos;
        $productos = $OBJTipos->obtenerProductos();
        include_once('../modelo/clientes.php');
        $OBJTipos = new clientes;
        $clientes = $OBJTipos->obtenerClientes();
        include_once('../moduloVentas/formRegistrarPedido.php');
        $OBJForm = new formRegistrarPedido;
        $OBJForm = $OBJForm->formRegistrarPedidoShow($productos, $clientes);
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
