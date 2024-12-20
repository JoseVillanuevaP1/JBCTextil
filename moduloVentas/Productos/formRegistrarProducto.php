<?php
include_once("../../compartido/pantalla.php");
class formRegistrarProducto extends Pantalla
{
    public function formRegistrarProductoShow()
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
            <link rel="icon" type="image/png" href="/JBCTextil/images/JBCTEXTIL.png">
            <title>
                Registrar Producto
            </title>
            <script src="https://cdn.tailwindcss.com"></script>
        </head>


        <body>


            <div class="flex h-screen overflow-hidden">
                <?php $this->formSideBarShow($privilegios); ?>
                <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                    <?php $this->formHeadShow_2(); ?>


                    <!-- ===== Main  ===== -->
                    <main class="min-h-screen bg-gray-900">
                        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                            <!-- Breadcrumb Start -->
                            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                <h2 class="text-title-md2 font-bold text-white text-center">
                                    REGISTRAR PRODUCTO
                                </h2>
                            </div>
                            <!-- Breadcrumb End -->


                            <!-- ====== Form Layout Section Start -->
                            <div class="grid grid-cols-1">
                                <div class="flex flex-col">
                                    <!-- Contact Form -->
                                    <div class="rounded-lg border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-5">
                                        <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark text-center mb-6">
                                            <h3 class="font-bold text-black text-lg">
                                                NUEVO PRODUCTO
                                            </h3>
                                        </div>
                                        <form action="#">
                                            <div class="p-6.5">
               
                                                <div class="mb-6">
                                                    <label class="mb-3 block text-lg font-medium text-black">
                                                        Nombre Completo
                                                    </label>
                                                    <input type="text" placeholder="" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                </div>
                                                                       
                                                <button class="flex w-full justify-center rounded bg-blue-500 p-3 font-medium text-white hover:bg-opacity-90">
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
