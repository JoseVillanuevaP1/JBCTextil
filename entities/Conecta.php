<?php
class Conecta
{
    public function ConectaBD()
    {
        return mysqli_connect('localhost', 'root', '', 'db_prueba');
    }
}
