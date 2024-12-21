<?php
include_once("../../compartido/pantalla.php");
class formListarClientes extends Pantalla
{
    public function formListarClientesShow($clientesArray = [])
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
                Clientes
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
                                                <form action="../../moduloVentas/clientes/getVerificarEditarCliente.php" method="post" class="flex gap-3 mb-4 items-center w-full">
                                                    <div class="flex items-center gap-2 w-1/2">
                                                        <label for="txtBuscarNombre" class="text-lg font-medium text-gray-700">Nombre</label>
                                                        <input type="text" id="txtBuscarNombre" name="txtBuscarNombre" placeholder="Usuario" class="ml-3 px-4 py-2 border rounded-lg w-full" />
                                                    </div>

                                                    <!-- Botón de Buscar -->
                                                    <div class="flex items-center gap-2 w-1/6">
                                                        <button name="btnBuscarCliente" type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200 flex items-center w-full text-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                                <circle cx="11" cy="11" r="8" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35" />
                                                            </svg>
                                                            Buscar
                                                        </button>
                                                    </div>
                                                </form>

                                                <form action="../../moduloVentas/clientes/getVerificarRegistrarCliente.php" method="post" class="flex gap-1 mb-4 items-center">
                                                    <div class="flex items-center gap-2 w-full">
                                                        <button name="btnRegistrarCliente" type="submit" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-200 flex items-center w-full text-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5" />
                                                            </svg>
                                                            Registrar clientes
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
                                                        Cliente
                                                    </th>
                                                    <th class="min-w-[120px] px-4 py-4 font-medium text-black">
                                                        Documento
                                                    </th>
                                                    <th class="px-4 py-4 font-medium text-black">
                                                        Correo electronico
                                                    </th>
                                                    <th class="px-4 py-4 font-medium text-black">
                                                        Direccion
                                                    </th>
                                                    <th class="px-4 py-4 font-medium text-black">
                                                        Editar
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="overflow-y-auto bg-white">
                                                <?php if (isset($clientesArray)): ?>
                                                    <?php foreach ($clientesArray as $key => $clientes): ?>
                                                        <tr>
                                                            <td class="border-b border-[#eee] px-4 py-4 dark:border-strokedark">
                                                                <h5 class="font-medium text-black"><?= $key + 1 ?></h5>
                                                            </td>
                                                            
                                                            <td class="border-b border-[#eee] px-4 py-4 dark:border-strokedark">
                                                                <h5 class="font-medium text-black"><?= htmlspecialchars($clientes['nombre']); ?></h5>
                                                                <h5 class="font-medium text-black"><?= htmlspecialchars($clientes['apellido']); ?></h5>
                                                            </td>
                                                                                                                                                                            
                                                            <td class="border-b border-[#eee] px-4 py-4 dark:border-strokedark">
                                                                <h5 class="font-medium text-black"><?= htmlspecialchars($clientes['documento']); ?></h5>
                                                            </td>
                                                            <td class="border-b border-[#eee] px-4 py-4 dark:border-strokedark">
                                                                <h5 class="font-medium text-black"><?= htmlspecialchars($clientes['correo_electronico']); ?></h5>
                                                            </td>
                                                            <td class="border-b border-[#eee] px-4 py-4 dark:border-strokedark">
                                                                <h5 class="font-medium text-black"><?= htmlspecialchars($clientes['direccion']); ?></h5>
                                                            </td>
                                                            <td class="border-b border-[#eee] px-4 py-4 dark:border-strokedark">
                                                                <div class="flex items-center space-x-3">
                                                                    <form action="../clientes/getVerificarEditarCliente.php" method="post">
                                                                        <input name="idCliente" value="<?= $clientes['id_cliente'] ?>" type="text" hidden>
                                                                        <button name="btnEditarCliente" type="submit" class="hover:text-blue-700">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" width="20" height="20" viewBox="0 0 576 512">
                                                                                <path fill="" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z" />
                                                                            </svg>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
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
