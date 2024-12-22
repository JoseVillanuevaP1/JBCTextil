<?php
class controlEnlaceReportes
{
    public function mostrarListarFiltrosReportes()
    {
        include_once('../moduloReportes/formListarFiltrosReportes.php');
        $objForm = new formListarFiltrosReportes;
        $objForm = $objForm->formListarFiltrosReportesShow();
    }
}