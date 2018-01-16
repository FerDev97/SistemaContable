<!-- start:Left Menu -->
  <script type="text/javascript">
      function inventarioFinal()
      {
        $('#myModal').modal('show');
      }
      function noir()
      {
        alert("Es necesario un conteo fisico del inventario final para realizar el estado de resultados.");
        $('#myModal').modal('hide');
      }
      function ir()
      {
        document.location.href="estado.php?if="+document.getElementById("inventarioFinal").value;
      }
  </script>
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>
                    <li class="time">
                      <h1 class="animated fadeInLeft">21:00</h1>
                      <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
                    <li class="active ripple">
                      <a class="tree-toggle nav-header"><span class="fa-list fa"></span> Catalogo
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">

                          <li><a href="cuenta.php">Mantenimiento</a></li>
                      </ul>
                      <ul class="nav nav-list tree">

                          <li><a href="listacuenta.php">Lista</a></li>
                      </ul>
                    </li>
                    <li class="active ripple">
                      <a class="tree-toggle nav-header"><span class="fa-book fa"></span> Libro Diario
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">

                          <li><a href="librodiario.php">Mantenimiento</a></li>
                      </ul>
                      <ul class="nav nav-list tree">

                          <li><a href="mostrardiario.php">Mostrar</a></li>
                      </ul>
                    </li>
                    <li class="active ripple">
                      <a class="tree-toggle nav-header"><span class="fa-book fa"></span> Estado Financieros
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">

                          <li><a href="libromayor.php">Libro Mayor</a></li>
                      </ul>
                      <ul class="nav nav-list tree">

                          <li><a  onclick="inventarioFinal();">Estado de Resultados</a></li>
                      </ul>
                      <ul class="nav nav-list tree">

                          <li><a  href="balanceGeneral.php">Balance General</a></li>
                      </ul>
                    </li>
                    <li class="active ripple">
                      <a class="tree-toggle nav-header"><span class="fa-users fa"></span> Usuarios
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                          <li><a href="usuario.php">Nueva cuenta</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
            </div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Inventario Final</h4>
      </div>
      <div class="modal-body">
        <div class="form-group form-animate-text" style="margin-top:30px !important;">
          <input type="number" class="form-text" id="inventarioFinal" name="inventarioFinal" value="1" min="1" >
          <span class="bar"></span>
          <label>Inventario final.</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="ir();" class="btn btn-default" data-dismiss="modal">Ir</button>
        <button type="button" onclick="noir();" class="btn btn-default" data-dismiss="modal">Cerrar</button>

      </div>
    </div>

  </div>
</div>

          <!-- end: Menu modificado abi -->
