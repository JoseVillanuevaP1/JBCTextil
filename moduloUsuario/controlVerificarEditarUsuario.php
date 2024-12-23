<?php
class controlVerificarEditarUsuario
{
    public function mostrarListarUsuario($txtBuscarNombre, $txtBuscarUsername)
    {
        include_once('../modelo/usuarios.php');
        $objuser = new usuarios;
        $usuarioArray = $objuser->obtenerUsuarios($txtBuscarNombre, $txtBuscarUsername);
        include_once('../moduloUsuario/formListarUsuarios.php');
        $objForm = new formListarUsuarios;
        $objForm = $objForm->formListarUsuariosShow($usuarioArray);
    }
    public function mostrarEditarUsuario($idUsuario)
    {
        include_once('../modelo/usuarios.php');
        $objuser = new usuarios;
        $usuarioArray = $objuser->obtenerUsuario($idUsuario);
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
        $OBJForm = $OBJForm->formEditarUsuarioShow($privilegios, $usuarioArray, $privilegiosArray);
    }

    public function actualizarUsuario($idUsuario, $txtUsuario, $txtContrasenia, $txtNombre, $txtCorreo, $arrayPrivilegios, $habilitado)
    {
        include_once('../modelo/usuarios.php');
        $OBJTipos = new usuarios;
        $OBJTipos->actualizarUsuario($idUsuario, $txtUsuario, $txtContrasenia, $txtNombre, $txtCorreo, $arrayPrivilegios, $habilitado);
        include_once('../compartido/mensajeConfirmacion.php');
        $OBJ = new mensajeConfirmacion;
        $OBJ = $OBJ->mensajeConfirmacionShow("Se editó exitosamente", "../moduloUsuario/getEnlaceUsuario.php");
    }
}
