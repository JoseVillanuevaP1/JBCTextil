<?php
include_once("../../compartido/pantalla.php");
class formRegistrarPedido extends Pantalla
{
    public function formRegistrarPedidoShow($productos, $clientes)
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
                                        <form action="/jbctextil/moduloVentas/pedidos/getVerificarRegistrarPedido.php" method="post">
                                            <div class="p-6.5">
                                                <div class="flex flex-wrap gap-4 mb-5">
                                                    <!-- Cliente -->
                                                    <div class="flex-1">
                                                        <label class="mb-3 block text-lg font-medium text-black">
                                                            Cliente
                                                        </label>
                                                        <div class="relative z-20 bg-transparent dark:bg-form-input">
                                                            <select name="txtCliente" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                                <option value="" class="text-body">
                                                                    Selecciona
                                                                </option>
                                                                <?php foreach ($clientes as $cliente): ?>
                                                                    <option value="<?= htmlspecialchars($cliente['id_cliente']); ?>" class="text-body">
                                                                        <?= htmlspecialchars($cliente['nombre']); ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <span class="absolute right-4 top-1/2 z-30 -translate-y-1/2">
                                                                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g opacity="0.8">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill=""></path>
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                        </div>
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
                                                            <tr>
                                                                <td class="border border-gray-300 px-4 py-2">
                                                                    <select name="arrayIdProductos[]" class="w-full rounded border border-gray-300 px-2 py-1">
                                                                        <option value="">Selecciona</option>
                                                                        <?php foreach ($productos as $producto): ?>
                                                                            <option value="<?= htmlspecialchars($producto['id_producto']); ?>" class="text-body">
                                                                                <?= htmlspecialchars($producto['nombre']); ?>
                                                                            </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </td>
                                                                <td class="border border-gray-300 px-4 py-2">
                                                                    <input type="text" name="arrayDescripcion[]" class="w-full rounded border border-gray-300 px-2 py-1" placeholder="Descripción">
                                                                </td>
                                                                <td class="border border-gray-300 px-4 py-2">
                                                                    <input type="number" name="arrayCantidad[]" class="w-full rounded border border-gray-300 px-2 py-1" placeholder="Cantidad">
                                                                </td>
                                                                <td class="border border-gray-300 px-4 py-2 text-center">
                                                                    <button type="button" class="text-red-500 hover:text-red-700" onclick="removeRow(this)">
                                                                        Eliminar
                                                                    </button>
                                                                </td>
                                                            </tr>
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
