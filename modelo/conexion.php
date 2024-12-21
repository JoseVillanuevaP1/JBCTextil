<?php
class Conexion
{
    public function ConectaBD()
    {
        return mysqli_connect('localhost', 'root', 'Jorge.02.Bravo.09', 'jv_textil');
    }
}
