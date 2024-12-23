<?php
include_once("../../compartido/pantalla.php");
class formListarPedidoComprobante extends Pantalla
{
    public function formListarPedidoComprobanteShow($pedidoArray = [])
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
                Usuario
            </title>
            <script src="https://cdn.tailwindcss.com"></script>
        </head>

        <body>

            <div class="flex h-screen overflow-hidden">
                <?php $this->formSideBarShow($privilegios); ?>
                <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                    <?php $this->formHeadShow_2(); ?>

                    <main class="h-full bg-gray-900">
                        <div class="mx-auto max-w-screen-2xl p-4 h-full">

                            <div class="flex flex-col gap-10">

                                <!-- ====== Table -->
                                <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
                                    <div class="max-w-full overflow-x-auto">
                                        <div class="row mb-4">
                                            <div class="flex gap-2 mb-4 items-center">
                                                <form action="/jbctextil/moduloVentas/ComprobantesPago/getVerificarEmitirComprobantePago.php" method="post" class="flex gap-4 mb-4 items-center w-full">
                                                    <div class="flex items-center gap-2 w-1/2">
                                                        <label for="txtBuscarCliente" class="text-lg font-medium text-gray-700">Cliente</label>
                                                        <input type="text" id="txtBuscarCliente" name="txtBuscarCliente" placeholder="Nombre" class="ml-3 px-4 py-2 border rounded-lg w-full" />
                                                    </div>
                                                    <div class="flex items-center gap-2 w-1/2">
                                                        <label for="dateBuscarDesde" class="text-lg font-medium text-gray-700">Desde</label>
                                                        <input type="date" id="txtBuscarDesde" name="txtBuscarDesde" placeholder="Fecha" class="ml-3 px-4 py-2 border rounded-lg w-full" />
                                                    </div>
                                                    <div class="flex items-center gap-2 w-1/2">
                                                        <label for="dateBuscarHasta" class="text-lg font-medium text-gray-700">Hasta</label>
                                                        <input type="date" id="txtBuscarHasta" name="txtBuscarHasta" placeholder="Fecha" class="ml-3 px-4 py-2 border rounded-lg w-full" />
                                                    </div>
                                                    <div class="flex items-center gap-2 w-1/6">
                                                        <button name="btnBuscarPedido" type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200 flex items-center w-full text-center">
                                                            Buscar
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <table class="w-full table-auto h-full">
                                            <thead>
                                                <tr class="bg-gray-100 text-left">
                                                    <th class="min-w-[150px] px-4 py-4 font-medium text-black">N°</th>
                                                    <th class="min-w-[150px] px-4 py-4 font-medium text-black">Cliente</th>
                                                    <th class="min-w-[150px] px-4 py-4 font-medium text-black">Fecha de Emision</th>
                                                    <th class="min-w-[150px] px-4 py-4 font-medium text-black">Monto</th>
                                                    <th class="px-4 py-4 font-medium text-black">Estado</th>
                                                    <th class="px-4 py-4 font-medium text-black">Tipo de comprobante</th>
                                                    <th class="px-4 py-4 font-medium text-black">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($pedidoArray)): ?>
                                                    <?php foreach ($pedidoArray as $key => $pedido): ?>
                                                        <?php
                                                        switch ($pedido['estado']) {
                                                            case 'cotizado':
                                                                $clase = 'bg-blue-300 text-blue-600';
                                                                break;

                                                        }
                                                        ?>
                                                        <tr>
                                                            <td class="border-b border-[#eee] px-4 py-4"><?= htmlspecialchars($pedido['id_pedido']) ?></td>
                                                            <td class="border-b border-[#eee] px-4 py-4"><?= htmlspecialchars($pedido['nombre_cliente']); ?></td>
                                                            <td class="border-b border-[#eee] px-4 py-4"><?= htmlspecialchars($pedido['fecha_emision']); ?></td>
                                                            <td class="border-b border-[#eee] px-4 py-4"><?= htmlspecialchars($pedido['precio_final']); ?></td>
                                                            <td class="border-b border-[#eee] px-4 py-5 border-strokedark">
                                                                <p class="inline-flex rounded-full bg-opacity-10 px-3 py-1 text-sm font-medium <?= $clase ?>">
                                                                    <?= ucwords(
                                                                        ($pedido['estado'])
                                                                    ) ?>
                                                                </p>
                                                            </td>
                                                            <form action="/jbctextil/moduloVentas/ComprobantesPago/getVerificarEmitirComprobantePago.php" method="post">
                                                                <td class="border-b border-[#eee] px-4 py-4">
                                                                    <div class="flex items-center gap-2 w-1/2">
                                                                    <label for="txtEstado" class="text-lg font-medium text-gray-700">Estado</label>
                                                                    <select id="txtEstado" name="intTipoComprobante" class="ml-3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                                                        <option value=""></option>
                                                                        <option value="1">Factura</option>
                                                                        <option value="2">Boleta</option>
                                                                    </select>
                                                                    </div>
                                                                </td>
                                                                <td class="border-b border-[#eee] px-4 py-4">
                                                                
                                                                    <input type="hidden" name="idCotizacion" value="<?= $pedido['id_cotizacion'] ?>">
                                                                    <button type="submit" name="btnSelecionar" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-200">
                                                                        Selecionar
                                                                    </button>
                                                                </td>
                                                            </form>
                                                            
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </body>

        </html>
<?php
    }
}
?>
