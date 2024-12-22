<?php
include_once("../../compartido/pantalla.php");
class formEditarDistribuidor extends Pantalla
{
    public function formEditarDistribuidorShow($distribuidoresArray)
    {
        session_start();
        $privilegios = $_SESSION["privilegios"];
        $distribuidor = $distribuidoresArray[0];
        
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="icon" type="image/png" href="../images/JBCTEXTIL.png">
            <title>
                Distribuidores
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
                        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                            <!-- Breadcrumb Start -->
                            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                <h2 class="text-title-md2 font-bold text-white text-center">
                                    EDITAR DISTRIBUIDOR
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
                                        <form action="../Distribuidores/getVerificarEditarDistribuidor.php" method="post">
                                            <div class="p-6.5">
                                                <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                                                    <div class="w-full xl:w-1/2 hidden">
                                                        <input name="idDistribuidor" type="text" value="<?= $distribuidor["id_distribuidor"] ?>" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                    </div>
                                                    <div class="w-full xl:w-1/2">
                                                        <label class="mb-3 block text-lg font-medium text-black dark:text-black">
                                                            Nombre
                                                        </label>
                                                        <input name="txtNuevoNombreDistribuidor" type="text" value="<?= $distribuidor["nombre"] ?>" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                    </div>
                                                    <div class="w-full xl:w-1/2">
                                                        <label class="mb-3 block text-lg font-medium text-black dark:text-black">
                                                            RUC
                                                        </label>
                                                        <input name="txtNuevoRUCDistribuidor" type="text" value="<?= $distribuidor["ruc"] ?>" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                    </div>
                                                    <div class="w-full xl:w-1/2">
                                                        <label class="mb-3 block text-lg font-medium text-black dark:text-black">
                                                            Direccion
                                                        </label>
                                                        <input name="txtNuevaDireccionDistribuidor" type="text" value="<?= $distribuidor["direccion"] ?>" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                    </div>
                                                    <div class="w-full xl:w-1/2">
                                                        <label class="mb-3 block text-lg font-medium text-black dark:text-black">
                                                            Correo
                                                        </label>
                                                        <input name="txtNuevoCorreoDistribuidor" type="text" value="<?= $distribuidor["correo"] ?>" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                    </div>
                                                    <div class="w-full xl:w-1/2">
                                                        <label class="mb-3 block text-lg font-medium text-black dark:text-black">
                                                            Telefono1
                                                        </label>
                                                        <input name="intNuevoTelefono1Distribuidor" type="text" value="<?= $distribuidor["telefono1"] ?>" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                    </div>
                                                    <div class="w-full xl:w-1/2">
                                                        <label class="mb-3 block text-lg font-medium text-black dark:text-black">
                                                            Telefono2
                                                        </label>
                                                        <input name="intNuevoTelefono2Distribuidor" type="text" value="<?= $distribuidor["telefono2"] ?>" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                    </div>
                                                    <div class="w-full xl:w-1/2">
                                                        <label class="mb-3 block text-lg font-medium text-black dark:text-black">
                                                            Telefono3
                                                        </label>
                                                        <input name="intNuevoTelefono3Distribuidor" type="text" value="<?= $distribuidor["telefono3"] ?>" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                    </div>
                                                    
                        
                                                </div>
                                                       
                                                <button name="btnConfirmarEditarDistribuidor" type="submit" class="flex w-full justify-center rounded bg-blue-500 p-3 font-medium text-white hover:bg-opacity-90">
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