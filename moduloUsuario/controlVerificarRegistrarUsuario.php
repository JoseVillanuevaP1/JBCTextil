<?php
class controlVerificarRegistrarUsuario
{
    public function verificarDatosRegistrarUsuario()
    {
        include_once('../modelo/tipos_documento.php');
        $OBJTipos = new tipos_documento;
        $TiposDocumento = $OBJTipos->obtenerTiposDocumento();
        include_once('../moduloUsuario/formRegistrarUsuario.php');
        $OBJForm = new formRegistrarUsuario;
        $OBJForm = $OBJForm->formRegistrarUsuarioShow($TiposDocumento);
    }
}
