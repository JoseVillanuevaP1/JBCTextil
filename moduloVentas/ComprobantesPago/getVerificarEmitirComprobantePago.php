<?php
function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}
function validarCamposComprobantesPago($txtNombre, $txtRUC, $txtDireccion, $txtCorreo,$txtTelefono1,$txtTelefono2,$txtTelefono3)
{
    if (
        strlen(trim($txtNombre)) > 3  && strlen(trim($txtRUC)) == 11 &&
        strlen(trim($txtDireccion)) > 3 && strlen(trim($txtCorreo)) > 3 &&
        (strlen(trim($txtTelefono1)) == 0 OR strlen(trim($txtTelefono1))== 9) &&
        (strlen(trim($txtTelefono2)) == 0 OR strlen(trim($txtTelefono2)) == 9) &&
        (strlen(trim($txtTelefono3)) == 0 OR strlen(trim($txtTelefono3)) == 9)
    )
        return 1;
    else
        return 0;
}

$txtBuscarCliente = $_POST["txtBuscarCliente"] ?? null;
$txtBuscarDesde = $_POST["txtBuscarDesde"] ?? null;
$txtBuscarHasta = $_POST["txtBuscarHasta"] ?? null;
$idCotizacion = $_POST["idCotizacion"] ?? null;
$txt_password = $_POST["txt_password"] ?? null;
$intTipoComprobante = $_POST["intTipoComprobante"] ?? null;

$datosFormulario1 = [
    'txtBuscarCliente' => $_POST["txtBuscarCliente"] ?? null,
    'txtBuscarDesde' => $_POST["txtBuscarDesde"] ?? null,
    'txtBuscarHasta' => $_POST["txtBuscarHasta"] ?? null,
    'idCotizacion' => $_POST["idCotizacion"] ?? null,
    'txt_password' => $_POST["txt_password"] ?? null,
    'intTipoComprobante' => $_POST["intTipoComprobante"] ?? null,
];

$datosFormularioJson = $_POST['datosFormularioJson'] ?? null;
$datosFormulario = $datosFormularioJson ? json_decode($datosFormularioJson, true) : [];


$btnEmitirComprobantePago = $_POST['btnEmitirComprobantePago'] ?? null;
$btnBuscarPedido = $_POST['btnBuscarPedido'] ?? null;
$btnSelecionar = $_POST['btnSelecionar'] ?? null;
$btnConfirmar = $_POST['btnConfirmar'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnEmitirComprobantePago) || validarBoton($btnRegresar)) 
{
    include_once('./controlVerificarEmitirComprobantePago.php');
    $verificar = new controlVerificarEmitirComprobantePago;
    $verificar->mostrarFormListarPedidoComprobante();
} else {
    if (validarBoton($btnBuscarPedido) || validarBoton($btnRegresar)) {
        include_once('./controlVerificarEmitirComprobantePago.php');
        $buscar = new controlVerificarEmitirComprobantePago;
        $buscar->buscarpedido($txtBuscarCliente,$txtBuscarDesde,$txtBuscarHasta);
    
    }else{
        if (validarBoton($btnSelecionar)) {
            include_once('./controlVerificarEmitirComprobantePago.php');
            $seleccionar = new controlVerificarEmitirComprobantePago;
            $array=$seleccionar->mostrarVerificacionUsuario($datosFormulario1);
        } else {
            if (validarBoton($btnConfirmar)) {
                session_start();
                $intIdUsuario = $_SESSION["idUsuario"];
                $txtFechaEmision = date('Y-m-d');
                include_once('./controlVerificarEmitirComprobantePago.php');
                $confirmar = new controlVerificarEmitirComprobantePago;
                $confirmar->verificarContraseña($intIdUsuario, $txt_password, $txtFechaEmision, $datosFormulario);
            
            } else {
                include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/mensajeSistema.php');
                $error = new mensajeSistema;
                $error->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../../index.php");
            }
        }
        }    
        }
