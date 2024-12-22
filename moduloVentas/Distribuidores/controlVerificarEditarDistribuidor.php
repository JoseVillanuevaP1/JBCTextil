<?php
class controlVerificarEditarDistribuidor
{
    public function mostrarListarDistribuidores($txtNombreBuscarDistribuidor)
    {
        include_once('../../modelo/distribuidores.php');
        $objuser = new distribuidores;
        $distribuidoresArray = $objuser->obtenerDistribuidores($txtNombreBuscarDistribuidor);
        include_once('../../moduloVentas/Distribuidores/formListarDistribuidores.php');
        $objForm = new formListarDistribuidores;
        $objForm = $objForm->formListarDistribuidoresShow($distribuidoresArray);
    }
    public function mostrarEditarDistribuidor($idDistribuidor)
    {
        include_once('../../modelo/distribuidores.php');
        $objuser = new distribuidores;
        $distribuidorArray = $objuser->obtenerDistribuidor($idDistribuidor);
        include_once('./formEditarDistribuidor.php');
        $OBJForm = new formEditarDistribuidor;
        $OBJForm = $OBJForm->formEditarDistribuidorShow($distribuidorArray);
    }

    public function editarDistribuidor($idDistribuidor,$txtNombreDistribuidor,$intRUCDistribuidor,$txtDireccionDistribuidor,$txtCorreoDistribuidor,$intTelefono1Distribuidor,$intTelefono2Distribuidor,$intTelefono3Distribuidor)
    {
        include_once('../../modelo/distribuidores.php');
        $OBJTipos = new distribuidores;
        $OBJTipos->editarDistribuidor($idDistribuidor,$txtNombreDistribuidor,$intRUCDistribuidor,$txtDireccionDistribuidor,$txtCorreoDistribuidor,$intTelefono1Distribuidor,$intTelefono2Distribuidor,$intTelefono3Distribuidor);
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/mensajeConfirmacion.php');
        $OBJ = new mensajeConfirmacion;
        $OBJ = $OBJ->mensajeConfirmacionShow("Se editó exitosamente", "../Distribuidores/getEnlaceDistribuidores.php");
    }
}