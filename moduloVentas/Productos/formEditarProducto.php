<?php
include_once("../compartido/pantalla.php");
class formEditarUsuario extends Pantalla
{
    public function formEditarUsuarioShow($privilegios, $usuarioArray, $privilegiosArray)
    {
        $usuario = $usuarioArray[0];
        $privilegiosArray = array_column($privilegiosArray, 'id_privilegio');
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
                Usuario
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
                                    REGISTRAR USUARIO
                                </h2>

                                <nav>
                                    <ol class="flex items-center gap-2 text-white">
                                        <li>
                                            <a class="font-medium" href="index.html">Usuario / </a>
                                        </li>
                                        <li class="font-medium text-primary">Registrar Usuario</li>
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
                                        <form action="../moduloVentas/Productos/getVerificarEditarProducto.php" method="post">
                                            <div class="p-6.5">
                                                <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                                                    <div class="w-full xl:w-1/2 hidden">
                                                        <input name="idProducto" type="text" value="<?= $producto["id_producto"] ?>" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                    </div>
                                                    <div class="w-full xl:w-1/2">
                                                        <label class="mb-3 block text-lg font-medium text-black dark:text-black">
                                                            Nombre
                                                        </label>
                                                        <input name="txtNombre" type="text" value="<?= $producto["name"] ?>" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                    </div>
                                            
                                                </div>
                                            
                                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3 mb-5">
                                                    <?php foreach ($privilegios as $index => $privilegio): ?>
                                                        <?php if ($index % 2 === 0):
                                                        ?>
                                                            <div class="space-y-4">
                                                            <?php endif; ?>

                                                            <label for="checkboxLabel<?= $privilegio['id_privilegio']; ?>" class="flex cursor-pointer select-none items-center text-lg font-medium text-black">
                                                                <div class="relative">
                                                                    <input
                                                                        type="checkbox"
                                                                        id="checkboxLabel<?= $privilegio['id_privilegio']; ?>"
                                                                        class="sr-only"
                                                                        value="<?= $privilegio['id_privilegio']; ?>"
                                                                        name="arrayPrivilegios[]"
                                                                        <?php if (in_array($privilegio['id_privilegio'], $privilegiosArray)): ?> checked <?php endif; ?>>

                                                                    <div class="mr-4 flex h-5 w-5 items-center justify-center rounded-full border border-blue-600 <?php if (in_array($privilegio['id_privilegio'], $privilegiosArray)): ?> !border-4 <?php endif; ?>">
                                                                        <span class="h-2.5 w-2.5 rounded-full bg-transparent"></span>
                                                                    </div>
                                                                </div>
                                                                <?= ucfirst(htmlspecialchars($privilegio['nombre'])); ?>
                                                            </label>

                                                            <?php if ($index % 2 === 1 || $index === count($privilegios) - 1): // Termina la columna 
                                                            ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>

                                                <button name="btnConfirmarEditarProducto" type="submit" class="flex w-full justify-center rounded bg-blue-500 p-3 font-medium text-white hover:bg-opacity-90">
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
            <?php include_once("../js/toggleCheckBox.js"); ?>
        </script>

        </html>
<?php
    }
}
