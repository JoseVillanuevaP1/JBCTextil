<?php
include_once("../compartido/pantalla.php");
class formEmitirInformePreventa extends Pantalla
{
    public function formEmitirInformePreventaShow($pedido, $detallesPedido)
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
                Informe Preventa
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
                                    EMITIR PREVENTA
                                </h2>

                                <nav>
                                    <ol class="flex items-center gap-2 text-white">
                                        <li>
                                            <a class="font-medium" href="index.html">Pedido / </a>
                                        </li>
                                        <li class="font-medium text-primary">Emitir Preventa</li>
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
                                        <form action="../moduloVentas/getVerificarEmitirInformePreventa.php" method="post">
                                            <div class="p-6.5 w-full">
                                                <div class="flex flex-wrap mb-5 w-full">
                                                    <div class="mb-5 w-full">
                                                        <!-- Cliente -->
                                                        <div class="flex flex- mb-4 gap-2 w-full">
                                                            <label class="mb-3 block text-lg font-medium text-black">
                                                                Cliente
                                                            </label>
                                                            <input value="<?= $pedido["cliente"] ?>" id="txtCliente" name="txtCliente" type="text" placeholder="" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" readonly>
                                                        </div>

                                                        <!-- Correo -->
                                                        <div class="mb-4 w-full">
                                                            <label class="mb-3 block text-lg font-medium text-black">
                                                                Correo
                                                            </label>
                                                            <input value="<?= $pedido["correo_electronico"] ?>" id="txtCorreo" name="txtCorreo" type="txt" placeholder="" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" readonly>
                                                        </div>

                                                        <!-- Lugar de Entrega -->
                                                        <div class="mb-4 w-full">
                                                            <label class="mb-3 block text-lg font-medium text-black">
                                                                Telefono
                                                            </label>
                                                            <input value="<?= $pedido["telefono"] ?>" name="txtTelefono" type="text" placeholder="Ingrese lugar" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary " readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="overflow-x-auto">
                                                    <table class="min-w-full table-auto border-collapse">
                                                        <thead>
                                                            <tr class="bg-gray-200">
                                                                <th class="px-4 py-2 text-left">Producto</th>
                                                                <th class="px-4 py-2 text-left">Costo Unitario</th>
                                                                <th class="px-4 py-2 text-left">Cantidad</th>
                                                                <th class="px-4 py-2 text-left">Costo</th>
                                                                <th class="px-4 py-2 text-left">Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="bg-white border-b hover:bg-gray-50">
                                                                <td class="px-4 py-2">Producto 1</td>
                                                                <td class="px-4 py-2 text-right"><span class="text-green-500">$10.00</span></td>
                                                                <td class="px-4 py-2 text-right">5</td>
                                                                <td class="px-4 py-2 text-right"><span class="text-green-500">$50.00</span></td>
                                                                <td class="px-4 py-2 text-center">
                                                                    <button class="text-blue-500 hover:text-blue-700">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" width="20" height="20" viewBox="0 0 384 512">
                                                                            <path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM112 256l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                                                        </svg>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <!-- Puedes agregar más filas aquí -->
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <button name="confirmarEmitirInformePreventa" type="submit" class="flex w-full justify-center rounded bg-blue-500 p-3 font-medium text-white hover:bg-opacity-90">
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
