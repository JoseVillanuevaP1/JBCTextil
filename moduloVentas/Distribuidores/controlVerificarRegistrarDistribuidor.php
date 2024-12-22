<?php
class controlVerificarRegistrarDistribuidor
{
    public function mostrarRegistrarDistribuidor()
    {
        include_once('../../modelo/privilegios.php');
        $OBJTipos = new privilegios;
        $privilegios = $OBJTipos->obtenerPrivilegios();
        include_once('./formRegistrarDistribuidor.php');
        $OBJForm = new formRegistrarDistribuidor;
        $OBJForm = $OBJForm->formRegistrarDistribuidorShow($privilegios);
    }
    public function registrarDistribuidor($nombre,$RUC,$Direccion,$Correo,$Telefono1,$Telefono2,$Telefono3)
    {
        include_once('../../modelo/distribuidores.php');
        $OBJTipos = new distribuidores;
        $OBJTipos->registrarDistribuidor($nombre,$RUC,$Direccion,$Correo,$Telefono1,$Telefono2,$Telefono3);
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/mensajeConfirmacion.php');
        $OBJ = new mensajeConfirmacion;
        $OBJ = $OBJ->mensajeConfirmacionShow("Se registró exitosamente", "../Distribuidores/getEnlaceDistribuidores.php");
    }
}