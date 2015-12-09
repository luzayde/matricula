
<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php view::includePartial('default/menuPrincipal') ?>
<div class="container container-fluid">
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('default', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('acudiente', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
    </div>
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th>
            <input type="checkbox" id="chkAll">
          </th>
          <th>   Nombres</th>
          <th> Apellidos </th>
          <th>  Direccion </th>
          <th> Telefono </th>
          <th> Telefono oficina </th>
          <th>  Email  </th>
          <th>  Ocupacion </th>
        </tr>
      </thead>        
      <tbody>
        <?php foreach ($objAcudientes as $key): ?>
          <tr>
            <th><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></th>
            <th><?php echo $key->nombre ?> </th>
            <th><?php echo $key->apellido ?></th>
            <th><?php echo $key->direccion ?></th>
            <th><?php echo $key->telefono ?></th>
            <th><?php echo $key->telefono_oficina ?></th>
            <th><?php echo $key->email ?></th>
            <th><?php echo $key->ocupacion ?></th>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </form>
</div>