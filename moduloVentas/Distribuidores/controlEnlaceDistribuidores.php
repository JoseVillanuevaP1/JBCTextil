<?php
class controlEnlaceDistribuidores
{
    public function mostrarListarDistribuidores()
    {
        include_once('./formListarDistribuidores.php');
        $objForm = new formListarDistribuidores;
        $objForm = $objForm->formListarDistribuidoresShow();
    }
}