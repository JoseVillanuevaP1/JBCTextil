<?php
class controlVerificarRegistrarUsuario
{
    public function mostrarRegistrarUsuario()
    {
        include_once('../modelo/privilegios.php');
        $OBJTipos = new privilegios;
        $privilegios = $OBJTipos->obtenerPrivilegios();
        include_once('../moduloUsuario/formRegistrarUsuario.php');
        $OBJForm = new formRegistrarUsuario;
        $OBJForm = $OBJForm->formRegistrarUsuarioShow($privilegios);
    }
    public function registrarUsuario($nombre, $password, $username, $correo, $arrayPrivilegios)
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
