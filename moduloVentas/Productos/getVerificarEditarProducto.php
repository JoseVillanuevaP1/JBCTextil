<?php
function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}

function validarCamposProducto($txtNombreProducto)
{
    if (
        strlen(trim($txtNombreProducto)) > 0 && strlen(trim($txtNombreProducto)) <= 30
    )
        return TRUE;
    else
        return FALSE;
}

$btnBuscarProducto = $_POST['btnBuscarProducto'] ?? null;
$btnEditarProducto = $_POST['btnEditarProducto'] ?? null;
$btnConfirmarEditarProducto= $_POST['btnConfirmarEditarProducto'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnBuscarProducto)) {
    include_once('../../moduloVentas/Productos/controlVerificarEditarProducto.php');
    $txtBuscarNombreProducto = $_POST['txtBuscarNombreProducto'];
    $objForm = new controlVerificarEditarProducto;
    $objForm = $objForm->mostrarListarProducto($txtBuscarNombreProducto);
} else if (validarBoton($btnEditarProducto) || validarBoton($btnRegresar)) {
    $idProducto = $_POST['idProducto'];
    include_once('./controlVerificarEditarProducto.php');
    $objForm = new controlVerificarEditarProducto;
    $objForm = $objForm->mostrarEditarProducto($idProducto);
} else if (validarBoton($btnConfirmarEditarProducto)) {

    $idProducto = $_POST['idProducto'];
    $txtNombreProducto = $_POST['txtNuevoNombreProducto'];
    
    if (validarCamposProducto($txtNombreProducto)) {
        include_once('./controlVerificarEditarProducto.php');
        $objForm = new controlVerificarEditarProducto;
        $objForm = $objForm->editarProducto($idProducto, $txtNombreProducto);
    } else {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
        $objMsj = new MensajeSistema;
        $objMsj->mensajeSistemaShow("Error: Datos no validos<br>", "../Productos/getEnlaceProductos.php");
    }
} else {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../../index.php");
}