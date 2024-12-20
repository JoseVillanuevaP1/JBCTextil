<?php
include_once("../../compartido/pantalla.php");
class formRegistrarCliente extends Pantalla
{
    public function formRegistrarClienteShow($listaTipoDocumento)
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
                Cliente
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
                                    REGISTRAR CLIENTE
                                </h2>


                            </div>
                            <!-- Breadcrumb End -->

                            <!-- ====== Form Layout Section Start -->
                            <div class="grid grid-cols-1">
                                <div class="flex flex-col">
                                    <!-- Contact Form -->
                                    <div class="rounded-lg border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-5">
                                        <div class="border-b border-stroke px-6.5 py-2 dark:border-strokedark text-center mb-6">
                                        </div>
                                        <form action="../clientes/getVerificarRegistrarCliente.php" method="post">
                                            <div class="p-6.5">
                                                <div class="mb-5">
                                                    <label class="mb-3 block text-lg font-medium text-black">
                                                        Nombre
                                                    </label>
                                                    <input name="txtNombreCliente" type="text" placeholder="" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                </div>

                                                <div class="mb-5">
                                                    <label class="mb-3 block text-lg font-medium text-black">
                                                        Apellido <span class="text-meta-1"></span>
                                                    </label>
                                                    <input name="txtApellidoCliente" type="text" placeholder="" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                </div>
                                                <div class="mb-5">
                                                    <label class="mb-3 block text-lg font-medium text-black">
                                                        Tipo de documento <span class="text-meta-1"></span>
                                                    </label>
                                                    <select name="intTipoDocumento" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                        <option value="" disabled selected>Seleccione un tipo de documento</option>
                                                        <?php
                                                        foreach ($listaTipoDocumento as $tipo) {
                                                            echo "<option value=\"{$tipo['id_tipo_documento']}\">{$tipo['nombre']}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mb-5">
                                                    <label class="mb-3 block text-lg font-medium text-black">
                                                        Documento
                                                    </label>
                                                    <input name="intDocumento" type="number" placeholder="" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                </div>

                                                <div class="mb-5">
                                                    <label class="mb-3 block text-lg font-medium text-black">
                                                        Telefono <span class="text-meta-1"></span>
                                                    </label>
                                                    <input name="intTelefonoCliente" type="number" placeholder="" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                </div>
                                                <div class="mb-5">
                                                    <label class="mb-3 block text-lg font-medium text-black">
                                                        Correo Electrónico
                                                    </label>
                                                    <input name="txtCorreoCliente" type="email" placeholder="" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                </div>

                                                <div class="mb-5">
                                                    <label class="mb-3 block text-lg font-medium text-black">
                                                        Direccion <span class="text-meta-1"></span>
                                                    </label>
                                                    <input name="txtDireccionCliente" type="txt" placeholder="" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                </div>
                                                <button name="btnConfirmarRegistrarCliente" type="submit" class="flex w-full justify-center rounded bg-blue-500 p-3 font-medium text-white hover:bg-opacity-90">
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

        </html>
<?php
    }
}
