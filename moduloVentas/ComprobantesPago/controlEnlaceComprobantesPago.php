<?php
class controlEnlaceComprobantePago
{
    public function mostrarListarComprobantePago()
    {
        include_once('./formListarComprobantesPago.php');
        $objForm = new formListarComprobantesPago;
        $objForm = $objForm->formListarComprobantesPagoShow();
    }
}