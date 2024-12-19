<?php
class Conexion
{
    public function ConectaBD()
    {
        return mysqli_connect('localhost', 'root', '', 'jv_textil');
    }
}
