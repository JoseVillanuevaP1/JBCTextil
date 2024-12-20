<?php
class controlEnlaceUsuario
{
    public function mostrarListarUsuario()
    {
        include_once('../moduloUsuario/formListarUsuarios.php');
        $objForm = new formListarUsuarios;
        $objForm = $objForm->formListarUsuariosShow();
    }
}
