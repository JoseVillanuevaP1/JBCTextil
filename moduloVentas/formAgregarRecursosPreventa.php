<?php
include_once("../compartido/pantalla.php");
class formAgregarRecursosPreventa extends Pantalla
{
    public function formAgregarRecursosPreventaShow($idDetallePedido, $recursos, $tipos_recurso, $distribuidores)
    {
        session_start();
        $privilegiosUser = $_SESSION["privilegios"];
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="icon" type="image/png" href="../images/JBCTEXTIL.png">
            <title>
                Pedido
            </title>
            <script src="https://cdn.tailwindcss.com"></script>
        </head>

        <body>

            <div class="flex h-screen overflow-hidden">
                <?php $this->formSideBarShow($privilegiosUser); ?>
                <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                    <?php $this->formHeadShow_2(); ?>

                    <!-- ===== Main  ===== -->
                    <main class="h-full bg-gray-900">
                        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                            <!-- Breadcrumb Start -->
                            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                <h2 class="text-title-md2 font-bold text-white text-center">
                                    REGISTRAR PEDIDO
                                </h2>

                                <nav>
                                    <ol class="flex items-center gap-2 text-white">
                                        <li>
                                            <a class="font-medium" href="index.html">Pedido / </a>
                                        </li>
                                        <li class="font-medium text-primary">Registrar Pedido</li>
                                    </ol>
                                </nav>
                            </div>
                            <!-- Breadcrumb End -->

                            <!-- ====== Form Layout Section Start -->
                            <div class="grid grid-cols-1">
                                <div class="flex flex-col">
                                    <!-- Contact Form -->
                                    <div class="rounded-lg border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-5">
                                        <div class="border-b border-stroke px-6.5 py-2 dark:border-strokedark text-center mb-6">
                                        </div>
                                        <form action="../moduloVentas/getVerificarRegistrarPedido.php" method="post">
                                            <div class="p-6.5">
                                                <div class="flex flex-wrap gap-4 mb-5">
                                                    <!-- Cliente -->
                                                    <div class="flex-1">
                                                        <label class="mb-3 block text-lg font-medium text-black">
                                                            Cliente
                                                        </label>
                                                    </div>

                                                    <!-- Fecha de Entrega -->
                                                    <div class="flex-1">
                                                        <label class="mb-3 block text-lg font-medium text-black">
                                                            Fecha de Entrega
                                                        </label>
                                                        <input id="txtFechaEntrega" name="txtFechaEntrega" type="date" placeholder="" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                    </div>

                                                    <!-- Lugar de Entrega -->
                                                    <div class="flex-1">
                                                        <label class="mb-3 block text-lg font-medium text-black">
                                                            Lugar de Entrega
                                                        </label>
                                                        <input id="txtLugarEntrega" name="txtLugarEntrega" type="text" placeholder="Ingrese lugar" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                    </div>
                                                </div>

                                                <div class="container mx-auto my-5">
                                                    <table class="min-w-full border-collapse border border-gray-300">
                                                        <thead>
                                                            <tr class="bg-gray-100">
                                                                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Producto</th>
                                                                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Descripción</th>
                                                                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Cantidad</th>
                                                                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="table-body">
                                                        </tbody>
                                                    </table>
                                                    <div class="mt-4">
                                                        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="addRow()">
                                                            Agregar Fila
                                                        </button>
                                                    </div>
                                                </div>


                                                <button name="btnConfirmarRegistrarPedido" type="submit" class="flex w-full justify-center rounded bg-blue-500 p-3 font-medium text-white hover:bg-opacity-90">
                                                    Confirmar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ====== Form Layout Section End -->
                </div>
                </main>
                <!-- ===== Main ===== -->

            </div>
            </div>

        </body>
        <script>
            <?php include_once("../js/toggleHeader.js"); ?>
        </script>
        <script>
            const productos = <?= json_encode($productos); ?>;
            <?php include_once("../js/registrarPedidos.js"); ?>
        </script>

        </html>
<?php
    }
}
