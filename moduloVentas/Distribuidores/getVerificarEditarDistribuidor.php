<?php
function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}
function validarCamposDistribuidor($txtNombre, $intRUC, $txtDireccion, $txtCorreo,$intTelefono1,$intTelefono2,$intTelefono3)
{
    if (
        strlen(trim($txtNombre)) > 3  && strlen(trim($intRUC)) == 11 &&
        strlen(trim($txtDireccion)) > 3 && strlen(trim($txtCorreo)) > 3 &&
        (strlen(trim($intTelefono1)) == 0 OR strlen(trim($intTelefono1))== 9) &&
        (strlen(trim($intTelefono2)) == 0 OR strlen(trim($intTelefono2)) == 9) &&
        (strlen(trim($intTelefono3)) == 0 OR strlen(trim($intTelefono3)) == 9)
    )
        return 1;
    else
        return 0;
}

$btnBuscarDistribuidor = $_POST['btnBuscarDistribuidor'] ?? null;
$btnEditarDistribuidor = $_POST['btnEditarDistribuidor'] ?? null;
$btnConfirmarEditarDistribuidor = $_POST['btnConfirmarEditarDistribuidor'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnBuscarDistribuidor)) {
    include_once('../../moduloVentas/Distribuidores/controlVerificarEditarDistribuidor.php');
    $txtBuscarNombreDistribuidor = $_POST['txtBuscarNombreDistribuidor'];
    $objForm = new controlVerificarEditarDistribuidor;
    $objForm = $objForm->mostrarListarDistribuidores($txtBuscarNombreDistribuidor);
} else if (validarBoton($btnEditarDistribuidor) || validarBoton($btnRegresar)) {
    $idDistribuidor = $_POST['idDistribuidor'];
    include_once('./controlVerificarEditarDistribuidor.php');
    $objForm = new controlVerificarEditarDistribuidor;
    $objForm = $objForm->mostrarEditarDistribuidor($idDistribuidor);
} else if (validarBoton($btnConfirmarEditarDistribuidor)) {

    $idDistribuidor = $_POST['idDistribuidor'];
    $txtNombreDistribuidor = $_POST['txtNuevoNombreDistribuidor'];
    $intRUCDistribuidor = $_POST['txtNuevoRUCDistribuidor'];
    $txtDireccionDistribuidor = $_POST['txtNuevaDireccionDistribuidor'];
    $txtCorreoDistribuidor = $_POST['txtNuevoCorreoDistribuidor'];
    $intTelefono1Distribuidor = $_POST['intNuevoTelefono1Distribuidor'];
    $intTelefono2Distribuidor = $_POST['intNuevoTelefono2Distribuidor'];
    $intTelefono3Distribuidor = $_POST['intNuevoTelefono3Distribuidor'];

    if (validarCamposDistribuidor($txtNombreDistribuidor,$intRUCDistribuidor,$txtDireccionDistribuidor,$txtCorreoDistribuidor,$intTelefono1Distribuidor,$intTelefono2Distribuidor,$intTelefono3Distribuidor)) {
        include_once('./controlVerificarEditarDistribuidor.php');
        $objForm = new controlVerificarEditarDistribuidor;
        $objForm = $objForm->editarDistribuidor($idDistribuidor,$txtNombreDistribuidor,$intRUCDistribuidor,$txtDireccionDistribuidor,$txtCorreoDistribuidor,$intTelefono1Distribuidor,$intTelefono2Distribuidor,$intTelefono3Distribuidor);
    } else {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/mensajeSistema.php');
        $objMsj = new mensajeSistema;
        $objMsj->mensajeSistemaShow("Error: Datos no validos<br>", "../Distribuidores/getEnlaceDistribuidores.php");
    }
} else {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/mensajeSistema.php');
    $objMsj = new mensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../../index.php");
}