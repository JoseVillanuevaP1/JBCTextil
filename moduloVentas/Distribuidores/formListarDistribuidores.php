<?php
include_once("../../compartido/pantalla.php");
class formListarDistribuidores extends Pantalla
{
    public function formListarDistribuidoresShow()
    {
        session_start();
        $privilegios = $_SESSION["privilegios"];
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="icon" type="image/png" href="../images/JBCTEXTIL.png">
            <title>
                Distribuidores
            </title>
            <script src="https://cdn.tailwindcss.com"></script>
        </head>

        <body>

            <div class="flex h-screen overflow-hidden">
                <?php $this->formSideBarShow($privilegios); ?>
                <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                    <?php $this->formHeadShow_2(); ?>

                    <!-- ===== Main  ===== -->
                    <main class="min-h-screen bg-gray-900">
                        <div class="mx-auto max-w-screen-2xl p-4 h-full">

                            <div class="flex flex-col gap-10">

                                <!-- ====== Table -->
                                <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
                                    <div class="max-w-full overflow-x-auto">
                                        <div class="row mb-4">
                                            <!-- Filtros y botones en una sola fila -->
                                            <div class="flex gap-2 mb-4 items-center">
                                                <form action="./getEnlaceDistribuidores.php" method="post" class="flex gap-3 mb-4 items-center w-full">
                                                    <div class="flex items-center gap-2 w-1/2">
                                                        <label for="txtBuscarNombreProducto" class="text-lg font-medium text-gray-700">Nombre del Distribuidor</label>
                                                        <input type="text" id="txtBuscarNombreProducto" name="txtBuscarDistribuidor" placeholder="Distribuidor" class="ml-3 px-4 py-2 border rounded-lg w-full" />
                                                    </div>

                                                
                                                    <!-- Botón de Buscar -->
                                                    <div class="flex items-center gap-2 w-1/6">
                                                        <button name="btnBuscarDistribuidor" type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200 flex items-center w-full text-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                                <circle cx="11" cy="11" r="8" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35" />
                                                            </svg>
                                                            Buscar
                                                        </button>
                                                    </div>
                                                </form>

                                                <form action="./getVerificarRegistrarDistribuidor.php" method="post" class="flex gap-1 mb-4 items-center">
                                                    <div class="flex items-center gap-2 w-full">
                                                        <button name="btnRegistrarDistribuidor" type="submit" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-200 flex items-center w-full text-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5" />
                                                            </svg>
                                                            Agregar
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                        <table class="w-full table-auto h-[70vh]">
                                            <thead>
                                                <tr class="bg-gray-100 text-left">
                                                    <th class="min-w-[220px] px-4 py-4 font-medium text-black xl:pl-11">
                                                        ID
                                                    </th>
                                                    <th class="min-w-[150px] px-4 py-4 font-medium text-black">
                                                        Nombre
                                                    </th>
                                                    <th class="min-w-[150px] px-4 py-4 font-medium text-black">
                                                        RUC
                                                    </th>
                                                                                                        <th class="min-w-[150px] px-4 py-4 font-medium text-black">
                                                        Direccion
                                                    </th>
                                                    <th class="min-w-[150px] px-4 py-4 font-medium text-black">
                                                        Correo
                                                    </th>
                                                    <th class="min-w-[150px] px-4 py-4 font-medium text-black">
                                                        Telefono
                                                    </th>
                                                                                          
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- ====== Table-->
                            </div>

                            </table>
                        </div>
                    </main>
                    <!-- ===== Main ===== -->

                </div>
            </div>

        </body>
        <script>
            <?php include_once("../js/toggleHeader.js"); ?>
        </script>

        </html>
<?php
    }
}
