<?php
function validarBoton($boton)
{
    return isset($boton);    
}

$btnProductos = $_POST['btnProductos'] ?? null ;
$btnRegresar = $_POST['btnRegresar'] ?? null;


if (validarBoton($btnProductos) || validarBoton($btnRegresar)) {
    include_once('./formListarProductos.php');
    $objForm = new formListarProductos;
    $objForm = $objForm->formListarProductosShow();
} else if (validarBoton($btnConfirmarRegistrarProducto)){

    $txtRegistrarNombreProducto = $_POST['txtRegistrarNombreProducto'];
    if (validarCamposUsuario($txtRegistrarNombreProducto )) {
        include_once('./moduloVentas/controlVerificarRegistrarProducto.php');
        $objForm = new controlVerificarRegistrarUsuario;
        $objForm = $objForm->registrarUsuario($txtRegistrarNombreProducto);
    } else {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
        $objMsj = new MensajeSistema;
        $objMsj->mensajeSistemaShow("Error: No se aceptan campos en blanco<br>", "../moduloUsuario/getVerificarRegistrarUsuario.php");
    }
    
} else {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/pantalla.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", '../index.php');
}


if (validarBoton($btnUsuarios) || validarBoton($btnRegresar)) {
    include_once('../moduloUsuario/controlEnlaceUsuario.php');
    $objForm = new controlEnlaceUsuario;
    $objForm = $objForm->mostrarListarUsuario();
} else {
    include_once('../compartido/mensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", '../index.php');
}
