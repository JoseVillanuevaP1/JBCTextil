<?php
class recursos
{
    private function EjecutarConexion()
    {
        include_once('conexion.php');
        $OBJConexion = new conexion;
        return $OBJConexion->ConectaBD();
    }
    /***************************************************************************************/
    /***************************************************************************************/
    public function obtenerRecursos()
    {
        $conexion = $this->EjecutarConexion();
        // Consulta con filtro OR para nombre y username
        $consulta = "SELECT id_recurso, nombre
						FROM recursos";
        // Ejecutar la consulta
        $resultado = mysqli_query($conexion, $consulta);

        $recursos = [];
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $recursos[] = $fila;
            }
        }
        // Cerrar la conexión
        mysqli_close($conexion);
        return $recursos;
    }
}
