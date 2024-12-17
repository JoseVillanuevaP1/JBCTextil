<?php
class pageGeneral
{
  protected function formHeadShow()
  {
?>
    <header class="bg-gray-950">
      <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
          <a href="#" class="-m-1.5 p-1.5">
            <span class="text-lg/6 text-white font-semibold">JBC TEXTIL</span>
          </a>
        </div>
        <div class="lg:flex lg:gap-x-12">
          <div class="relative">
            <a href="#" class="text-sm/6 font-semibold text-white"></a>
          </div>
        </div>
        <div class="lg:flex lg:flex-1 lg:justify-end">
          <p class="text-lg/6 font-semibold text-white">Bienvenido al Sistema</p>
        </div>
      </nav>
    </header>
  <?php
  }
  protected function formHeadShow_2()
  {
  ?>
    <table width="200" border="0" align="center">
      <tr>
        <td><img src="../images/cicsa.jpg" width="254" height="92" /></td>
        <td>
          <table width="400" border="0">
            <tr>
              <td align="center"> <span class="postcontent"><strong>DEPARTAMENTO DE SISTEMAS</strong></span></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  <?php
  }
  protected function formHeadReportShow()
  {
  ?>
    <table width="700" border="0" align="center">
      <tr>
        <td align="center"><img src="../images/cicsa.jpg" width="223" height="78" /></td>
        <td>
          <table width="327" border="0" align="center">
            <tr>
              <td align="center"> <span class="postcontent"><strong>DEPARTAMENTO DE SISTEMAS</strong></span></td>
            </tr>
            <tr>
              <td align="center">ATSIS - Consulting Group</td>
            </tr>
            <tr>
              <td align="center"><?php echo date("d/m/Y") . " - " . date("h:i:s"); ?></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <hr />
        </td>
      </tr>
    </table>
  <?php
  }
  protected function formFooterShow()
  {
  ?>
    <footer class="bg-gray-950 rounded-lg shadow mt-4">
      <div class="w-full max-w-screen-xl mx-auto p-4 8">
        <hr class="my-6 border-gray-400 sm:mx-auto" />
        <span class="block text-sm text-center text-gray-400">© 2024 <a href="#" class="hover:underline">JBC Textil</a>. Todos los derechos reservados.</span>
      </div>
    </footer>
<?php
  }
}
?>