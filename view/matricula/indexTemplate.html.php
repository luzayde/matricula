<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\view\viewClass as view ?>
<?php view::includePartial('default/menuPrincipal') ?>
<div class="container container-fluid">
  <?php echo view::includeHandlerMessage() ?>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('default', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('matricula', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
    </div>
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th><input type="checkbox" id="chkAll"></th>
          <th># de matricula</th>
          <th>Estudiante</th>
          <th>Acudiente</th>
          <th>Secretaria</th>
          <th>Rector</th>
          <th>Fecha de creacion</th>
          <th>Grado ingreso</th>
          <th>fecha Ingreso</th>
          <th>fecha Egreso</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objMatricula  as $key): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
            <td><?php echo $key->id ?></td>
            <td><?php echo $key->estudiante_id ?></td>
            <td><?php echo $key->acudiente_id ?></td>
            <td><?php echo $key->usuario_id_secretaria ?></td>
            <td><?php echo $key->usuario_id_rector ?></td>
            <td><?php echo $key->fecha_doc ?></td>
            <td><?php echo $key->grado_ingreso ?></td>
            <td><?php echo $key->fecha_ingreso ?></td>
            <td><?php echo $key->fecha_egreso ?></td>
            <td>
              <a href="<?php // echo routing::getInstance()->getUrlWeb('boletin', 'ver', array
//            (cabeceraBoletinTableClass::ID_CABECERA_BOLETIN => $key->id))
          ?>" class="btn btn-primary btn-xs">Ver</a>

              <a href="<?php // echo routing::getInstance()->getUrlWeb('boletin', 'edit', array
//                   (cabeceraBoletinTableClass::ID_CABECERA_BOLETIN => $key->id))
               ?>" class="btn btn-primary btn-xs">Editar</a>

              <a href="#" data-toggle="modal" data-target="#myModalDelete<?php // echo $key->id ?>" 
                 class="btn btn-danger btn-xs">Eliminar</a>

              <!--MODAL DELETE-->
              <div class="modal fade" id="myModalDelete<?php // echo $key->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                  '<?php // echo cabeceraBoletinTableClass::getNameField(cabeceraBoletinTableClass::ID_CABECERA_BOLETIN, true) ?>',
                                  '<?php // echo routing::getInstance()->getUrlWeb('boletin', 'delete') ?>')">Eliminar</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
<?php endforeach ?>
      </tbody>
    </table>
  </form>
</div>
