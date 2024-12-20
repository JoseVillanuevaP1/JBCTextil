<?php
    class controlVerificarRegistrarCliente
    {
        public function traerTiposDocumentos()
        {
            include_once('../../modelo/tipo_documento.php');
            include_once('../cleintes/formRegistrarCliente.php');
            $objUsuarioPrivilegio = new usuarioPrivilegio();
            $objBienvenida = new screenBienvenida();
        }
    }
?>