<?php
include_once("../../compartido/pantalla.php");
class formEmitirComprobantePago extends Pantalla
{
    public function formEmitirComprobantePagoShow()
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
                Emitir Comprobante
            </title>
            <script src="https://cdn.tailwindcss.com"></script>
        </head>

        <body>

            <div class="flex h-screen overflow-hidden">
                <?php $this->formSideBarShow($privilegios); ?>
                <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                    <?php $this->formHeadShow_2(); ?>

                    <!-- ===== Main  ===== -->
                    <main class="h-full bg-gray-900">
                        <div class="mx-auto max-w-screen-2xl p-4 h-full">

                            <div class="flex flex-col gap-10">

                                <!-- ====== Table -->
                                <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
                                    <div class="max-w-full overflow-x-auto">
                                        <div class="row mb-4">
                            
                                        </div>
                                        <table class="w-full table-auto min-h-[70vh] h-full">
                                            <thead>
                                                <tr class="bg-gray-100 text-left">
                                                    <th class="min-w-[220px] px-4 py-4 font-medium text-black xl:pl-11">
                                                        ID
                                                    </th>
                                                    <th class="min-w-[150px] px-4 py-4 font-medium text-black">
                                                        Cliente
                                                    </th>
                                                        <th class="px-4 py-4 font-medium text-black">
                                                        Monto
                                                    </th>
                                                    <th class="px-4 py-4 font-medium text-black">
                                                        Accion
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($usuarioArray)): ?>
                                                    <?php foreach ($usuarioArray as $key => $usuario): ?>
                                                        <tr>
                                                            <td class="border-b border-[#eee] px-4 py-4 dark:border-strokedark">
                                                                <h5 class="font-medium text-black"><?= $key ?></h5>
                                                            </td>
                                                            <td class="border-b border-[#eee] px-4 py-4 dark:border-strokedark">
                                                                <h5 class="font-medium text-black"><?= htmlspecialchars($usuario['nombre']); ?></h5>
                                                            </td>
                                                            <td class="border-b border-[#eee] px-4 py-4 dark:border-strokedark">
                                                                <div class="flex items-center space-x-3">
                                                                    <form action="../moduloUsuario/getVerificarEditarUsuario.php" method="post">
                                                                        <input name="idUsuario" value="<?= $usuario['id_usuario'] ?>" type="text" hidden>
                                                                        <button name="btnEditarUsuario" type="submit" class="hover:text-blue-700">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" width="20" height="20" viewBox="0 0 576 512">
                                                                                <path fill="" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z" />
                                                                            </svg>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                            <td class="border-b border-[#eee] px-4 py-4 dark:border-strokedark">
                                                                <h5 class="font-medium text-black"><?= htmlspecialchars($usuario['correo']); ?></h5>
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
        <script>
            <?php include_once("../js/listarPedidosScript.js"); ?>
        </script>

        </html>
<?php
    }
}