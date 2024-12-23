<?php
include_once("../../compartido/pantalla.php");
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
                                        <div class="px-6.5 py-2 text-center">
                                        </div>
                                        <div class="p-6.5 w-full">
                                            <div class="flex flex-wrap mb-5 w-full">
                                                <div class="mb-5 w-full">
                                                    <!-- Cliente -->
                                                    <div class="flex items-center mb-4 gap-2 w-full">
                                                        <label class="mb-3 block text-lg font-medium text-black">
                                                            Cliente
                                                        </label>
                                                        <input value="<?= $pedido["cliente"] ?>" id="txtCliente" name="txtCliente" type="text" placeholder="" class="w-full ml-4 rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" readonly>
                                                    </div>

                                                    <!-- Correo -->
                                                    <div class="flex items-center mb-4 w-full">
                                                        <label class="mb-3 block text-lg font-medium text-black">
                                                            Correo
                                                        </label>
                                                        <input value="<?= $pedido["correo_electronico"] ?>" id="txtCorreo" name="txtCorreo" type="txt" placeholder="" class="w-full ml-6 rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" readonly>
                                                    </div>

                                                    <!-- Lugar de Entrega -->
                                                    <div class="flex items-center w-full">
                                                        <label class="mb-3 block text-lg font-medium text-black">
                                                            Telefono
                                                        </label>
                                                        <input value="<?= $pedido["telefono"] ?>" name="txtTelefono" type="text" placeholder="Ingrese lugar" class="w-full ml-3 rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary " readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <h2 class="text-title-md2 font-bold text-black mb-3">
                                                DETALLES DE PEDIDO
                                            </h2>
                                            <div class="overflow-x-auto">


                                                <form action="/jbctextil/moduloVentas/informePreventa/getVerificarEmitirInformePreventa.php" method="post">
                                                    <table class="min-w-full table-auto border-collapse mb-5">
                                                        <thead>
                                                            <tr class="bg-gray-200">
                                                                <th class="px-4 py-2 text-left">Producto</th>
                                                                <th class="px-4 py-2 text-left">Descripcion</th>
                                                                <th class="px-4 py-2 text-left">Cantidad</th>
                                                                <th class="px-4 py-2 text-left">Costo Unitario</th>
                                                                <th class="px-4 py-2 text-left">Costo</th>
                                                                <th class="px-4 py-2 text-left">Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($detallesPedido as $producto):
                                                            ?>
                                                                <tr class="bg-white border-b hover:bg-gray-50">
                                                                    <input type="hidden" name="idsDetallePedido[]" value="<?= $producto['id_detalle_pedido'] ?>">
                                                                    <td class="px-4 py-2"><?php echo ucwords(htmlspecialchars($producto['producto_nombre'])); ?></td>
                                                                    <td class="px-4 py-2">
                                                                        <span><?php echo $producto['detalle_descripcion']; ?></span>
                                                                    </td>
                                                                    <td class="px-4 py-2">
                                                                        <input
                                                                            name="detalle_cantidad[]"
                                                                            type="number"
                                                                            value="<?= $producto['detalle_cantidad'] ?>"
                                                                            step="any"
                                                                            readonly>
                                                                    </td>
                                                                    <td class="px-4 py-2">
                                                                        <input
                                                                            name="doublePrecioCosto[]"
                                                                            type="number"
                                                                            step="any"
                                                                            value="<?= number_format($producto['costo'] / $producto['detalle_cantidad'], 2) ?>"
                                                                            onchange="updateCostoTotal(this)">
                                                                    </td>
                                                                    <td class="px-4 py-2">
                                                                        <input
                                                                            class="costo-total"
                                                                            type="number"
                                                                            value="<?= $producto['costo'] ?>"
                                                                            readonly>
                                                                    </td>
                                                                    <td class="px-4 py-2">
                                                                        <form action="/jbctextil/moduloVentas/informePreventa/getVerificarEmitirInformePreventa.php" method="post">
                                                                            <input name="idPedido" type="hidden" value="<?= $pedido['id_pedido'] ?>">
                                                                            <input name="intIdDetallePedido" type="hidden" value="<?= $producto['id_detalle_pedido'] ?>">
                                                                            <button name="btnAgregarRecursosPreventa" type="submit" class="text-blue-500 hover:text-blue-700">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" width="20" height="20" viewBox="0 0 384 512">
                                                                                    <path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM112 256l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                                                                </svg>
                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                    <input name="idPedido" type="hidden" value="<?= $pedido['id_pedido'] ?>">
                                                    <button name="confirmarEmitirInformePreventa" type="submit" class="flex w-full justify-center rounded bg-blue-500 p-3 font-medium text-white hover:bg-opacity-90">
                                                        Confirmar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
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
            <?php include_once("../../js/toggleHeader.js"); ?>

            function updateCostoTotal(inputElement) {
                // Encuentra la fila del input actual
                const row = inputElement.closest('tr');

                // Obtén la cantidad fija y el costo unitario modificado
                const cantidadInput = row.querySelector('input[name="detalle_cantidad[]"]');
                const costoUnitarioInput = row.querySelector('input[name="doublePrecioCosto[]"]');
                const costoTotalInput = row.querySelector('.costo-total');

                // Convierte los valores a números
                const cantidad = parseFloat(cantidadInput.value) || 0;
                const costoUnitario = parseFloat(costoUnitarioInput.value) || 0;

                // Calcula el nuevo costo total
                const costoTotal = cantidad * costoUnitario;

                // Actualiza el campo del costo total
                costoTotalInput.value = costoTotal.toFixed(2);
            }
        </script>

        </html>
<?php
    }
}
