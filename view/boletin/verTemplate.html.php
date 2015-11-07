<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\view\viewClass as view ?>
<?php view::includePartial('default/menuPrincipal') ?>

<div class="container container-fluid">
  <?php echo view::includeHandlerMessage() ?>
  <div class="row">
    <div class="text-primary col-lg-4 col-lg-offset-4 text-center">
      <h2>BOLETIN</h2>
    </div>
  </div>
  <table class="table table-bordered table-responsive">
    <thead>
      <tr>
        <th> # de boletin</th>
        <th>Fecha de boletin</th>
        <th>Estudiante</th>
        <th>Grado</th>
        <th>Año lectivo</th>
        <th>Periodo academico</th>
        <th>Promedio</th>
        <th>Obsevaciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($objBoletin as $key): ?>
        <tr>
          <td><?php echo $key->boletin_id ?></td>
          <td><?php echo $key->fecha_boletin ?></td>
          <td><?php echo $key->id_estudiante ?></td>
          <td><?php echo $key->grado ?></td>
          <td><?php echo $key->ano_electivo ?></td>
          <td><?php echo $key->periodo_academico ?></td>
          <td><?php echo $key->promedio ?></td>
          <td><?php echo $key->observaciones ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>

  <div class="row">
    <div class="text-primary col-lg-4 col-lg-offset-4 text-center">
      <h2>DETALLES</h2>
    </div>
  </div>
  <table class="table table-bordered table-responsive">
    <thead>
      <tr>
        <th><input type="checkbox" id="chkAll"></th>
        <th>#</th>
        <th>Item</th>
        <th>Nota</th>
        <th>Desempeño</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($objDetalleBoletin as $key): ?>
        <tr>
          <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
          <td><?php echo $key->id ?></td>
          <td><?php echo $key->item ?></td>
          <td><?php echo $key->nota ?></td>
          <td><?php echo $key->desempeno ?></td>
          <td>
            <a href="<?php echo routing::getInstance()->getUrlWeb('boletin', 'ver', array
          (cabeceraBoletinTableClass::ID_CABECERA_BOLETIN => $key->id))
        ?>" class="btn btn-primary btn-xs">Ver</a>

            <a href="<?php echo routing::getInstance()->getUrlWeb('boletin', 'edit', array
                 (cabeceraBoletinTableClass::ID_CABECERA_BOLETIN => $key->id))
             ?>" class="btn btn-primary btn-xs">Editar</a>

            <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $key->id ?>" 
               class="btn btn-danger btn-xs">Eliminar</a>

            <!--MODAL DELETE-->
            <div class="modal fade" id="myModalDelete<?php echo $key->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                  </div>
                  <div class="modal-body">
                    ¿Desea eliminar el registro?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary fa fa-eraser" onclick="eliminar(<?php echo $key->id ?>,
                                    '<?php echo cabeceraBoletinTableClass::getNameField(cabeceraBoletinTableClass::ID_CABECERA_BOLETIN, true) ?>',
                                    '<?php echo routing::getInstance()->getUrlWeb('boletin', 'delete') ?>')">Eliminar</button>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
<?php endforeach ?>
    </tbody>
  </table>


</div>
