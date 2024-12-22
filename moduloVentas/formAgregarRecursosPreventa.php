<?php
include_once("../compartido/pantalla.php");
class formAgregarRecursosPreventa extends Pantalla
{
    public function formAgregarRecursosPreventaShow($idPedido, $detallePedido, $recursos, $tipos_recurso, $distribuidores, $recursosPedido = [])
    {
        print_r($idPedido);
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
                Recursos Detalle Pedido
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
                                    AGREGAR RECURSOS PREVENTA
                                </h2>

                                <nav>
                                    <ol class="flex items-center gap-2 text-white">
                                        <li>
                                            <a class="font-medium" href="index.html">Preventa / </a>
                                        </li>
                                        <li class="font-medium text-primary">Agregar Recursos Preventa</li>
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
                                        <form action="/jbctextil/moduloVentas/getVerificarRegistrarPedido.php" method="post">
                                            <div class="p-6.5">
                                                <div class="flex flex-wrap mb-5 w-full">
                                                    <div class="mb-5 w-full">

                                                        <div class="flex items-center mb-4 gap-2 w-full">
                                                            <div class="flex items-center mb-4 gap-2 w-full">
                                                                <label class="block text-lg font-medium text-black mr-6">
                                                                    Cantidad
                                                                </label>
                                                                <input value="<?= $detallePedido["cantidad"] ?>" id="txtCantidad" name="txtCantidad" type="number" placeholder="" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" readonly>
                                                            </div>

                                                            <div class="flex items-center mb-4 w-full">
                                                                <label class="block text-lg font-medium text-black mx-4">
                                                                    Producto
                                                                </label>
                                                                <input value="<?= $detallePedido["nombre"] ?>" id="txtNombre" name="txtNombre" type="text" placeholder="" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="flex items-center w-full">
                                                            <label class="mb-3 block text-lg font-medium text-black">
                                                                Descripcion
                                                            </label>
                                                            <input value="<?= $detallePedido["descripcion"] ?>" name="txtDescripcion" type="text" placeholder="Ingrese lugar" class="w-full ml-3 rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary " readonly>
                                                        </div>
                                                    </div>
                                                    <form action="/jbctextil/moduloVentas/getVerificarEmitirInformePreventa.php" method="post">
                                                        <input type="text" name="idPedido" value="<?= $idPedido ?>" hidden>
                                                        <div class="container mx-auto my-5">

                                                            <table class="min-w-full border-collapse border border-gray-300">
                                                                <thead>
                                                                    <tr class="bg-gray-100">
                                                                        <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Tipo Recurso</th>
                                                                        <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Recurso</th>
                                                                        <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Distribuidor</th>
                                                                        <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Precio</th>
                                                                        <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Acciones</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="table-body">
                                                                </tbody>
                                                            </table>
                                                            <div class="mt-4">
                                                                <button type="button" class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600" onclick="addRow()">
                                                                    Agregar
                                                                </button>
                                                            </div>

                                                        </div>

                                                        <button name="btnEmitirInformePreventa" type="submit" class="flex w-full justify-center rounded bg-blue-500 p-3 font-medium text-white hover:bg-opacity-90">
                                                            Confirmar
                                                        </button>
                                                    </form>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </main>

            </div>


        </body>
        <script>
            function addRow() {
                const tableBody = document.getElementById('table-body');
                tableBody.innerHTML += `
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">
                                <select name="arrayTiposRecurso[]" class="w-full rounded border border-gray-300 px-2 py-1">
                                    <?php foreach ($tipos_recurso as $tipo_recurso): ?>
                                        <option value="<?= htmlspecialchars($tipo_recurso['id_tipo_recurso']); ?>" class="text-body">
                                            <?= htmlspecialchars($tipo_recurso['nombre']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <select name="arrayRecursos[]" class="w-full rounded border border-gray-300 px-2 py-1">
                                    <?php foreach ($recursos as $recurso): ?>
                                        <option value="<?= htmlspecialchars($recurso['id_recurso']); ?>" class="text-body">
                                            <?= htmlspecialchars($recurso['nombre']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <select name="arrayDistribuidores[]" class="w-full rounded border border-gray-300 px-2 py-1">
                                    <?php foreach ($distribuidores as $arrayDistribuidor): ?>
                                        <option value="<?= htmlspecialchars($arrayDistribuidor['id_distribuidor']); ?>" class="text-body">
                                            <?= htmlspecialchars($arrayDistribuidor['nombre']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <input type="number" name="arrayPrecios[]" class="w-full rounded border border-gray-300 px-2 py-1" placeholder="Precio">
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button type="button" class="text-red-500 hover:text-red-700" onclick="removeRow(this)">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                `;
            }

            function removeRow(button) {
                const row = button.closest('tr');
                row.remove();
            }
        </script>

        </html>
<?php
    }
}
