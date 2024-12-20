<?php
class tipos_documento
{
    private function EjecutarConexion()
    {
     include_once('conexion.php');
     $OBJConexion = new conexion;
       return $OBJConexion->ConectaBD();
    }

    // public function obtenerTiposDocumento()
    //     {
    //         // Crear una instancia de la clase conexion
    //         $conexion = new conexion();
    //         $conexion->conectarBD();  // Llamamos al método no estático en la instancia

    //         // Consulta para validar login
    //         $sql = "SELECT id_tipo_documento, nombre FROM tipos_documento ";
            
    //         $resultado = $conexion->getConexion()->query($sql);

    //         while ($fila = $resultado->fetch_assoc()) {
    //             $tiposDocumentos[] = $fila;
    //         }

    //     }


    /********************************************/
    public function obtenerTiposDocumento()
    {
        $conexion = $this->EjecutarConexion();
        $consulta = "SELECT id_tipo_documento, nombre FROM tipos_documento";
        $resultado = mysqli_query($conexion, $consulta);
        mysqli_close($conexion);

        $tiposDocumento = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $tiposDocumento[] = $fila;
        }

        return $tiposDocumento;
    }
}
