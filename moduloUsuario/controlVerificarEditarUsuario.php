<?php
class controlVerificarEditarUsuario
{
    public function mostrarListarUsuario()
    {
        include_once('../modelo/usuarios.php');
        $objuser = new usuarios;
        $usuarioArray = $objuser->obtenerUsuarios();
        include_once('../moduloUsuario/formListarUsuarios.php');
        $objForm = new formListarUsuarios;
        $objForm = $objForm->formListarUsuariosShow($usuarioArray);
    }
    // public function registrarUsuario($nombre, $password, $username, $correo, $arrayPrivilegios)
    // {
    //     include_once('../modelo/usuarios.php');
    //     $OBJTipos = new usuarios;
    //     $idUsuario = $OBJTipos->registrarUsuario($nombre, $password, $username, $correo);
    //     include_once('../modelo/usuario_privilegios.php');
    //     $OBJpriv = new usuario_privilegios;
    //     $OBJpriv->registrarPrivilegios($idUsuario, $arrayPrivilegios);
    //     include_once('../compartido/mensajeSistema.php');
    //     $OBJ = new MensajeSistema;
    //     $OBJ = $OBJ->mensajeConfirmacionShow("Se registró exitosamente", "../moduloUsuario/getEnlaceUsuario.php");
    // }
}
