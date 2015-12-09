<?php
use mvc\routing\routingClass as routing ?>
<?php
use mvc\view\viewClass as view ?>
<?php view::includePartial('default/menuPrincipal') ?>
<div class="container container-fluid">
  <?php echo view::includeHandlerMessage() ?>
  <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
      <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('default', 'deleteSelect') ?>" method="POST">

        <div style="margin-bottom: 10px; margin-top: 30px">
          <a href="<?php echo routing::getInstance()->getUrlWeb('barrio', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
          <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
        </div>
        <table class="table table-bordered table-responsive">
          <thead>
            <tr>
              <th>
                #
              </th>
              <th>
                Nombre
              </th>
              <th>
                Ciudad
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($objBarrio as $key): ?>            
              <tr>
                <th>
                  <?php echo $key->id ?>
                </th>
                <th>
                  <?php echo $key->nom_barrio ?>
                </th>
                <th>
                  <?php echo barrioTableClass::nombreCiudad($key->id_ciudad) ?>
                </th>
              </tr>
            <?php endforeach; ?>            
          </tbody>
        </table>

      </form>
    </div>
  </div>
</div>