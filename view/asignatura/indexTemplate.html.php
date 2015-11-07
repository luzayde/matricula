<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\view\viewClass as view ?>
<?php view::includePartial('default/menuPrincipal') ?>
<div class="container container-fluid">
  <?php echo view::includeHandlerMessage() ?>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('default', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('asignatura', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
    </div>
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th><input type="checkbox" id="chkAll"></th>
          <th>Codigo de la asignatura</th>
          <th>Nombre</th>
          <th>Intensidad horaria</th>
          <th>Tipo asignatura</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objAsignatuas as $key): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
            <td><?php echo $key->cod_tipo_asignatura ?></td>
            <td><?php echo $key->nombre ?></td>
            <td><?php echo $key->intesidad_horaria ?></td>
            <td><?php echo $key->tipo_asignatura_id ?></td>
            <td>
              <a href="<?php echo routing::getInstance()->getUrlWeb('asignatura', 'edit', array(asignaturaTableClass::ID_ASIGNATURA => $key->id)) ?>" class="btn btn-primary btn-xs">Editar</a>
              <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $key->id ?>" class="btn btn-danger btn-xs">Eliminar</a>

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
                      <button type="button" class="btn btn-primary fa fa-eraser" onclick="eliminar(<?php echo $key->id ?>, '<?php echo asignaturaTableClass::getNameField(asignaturaTableClass::ID_ASIGNATURA, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('asignatura', 'delete') ?>')">Eliminar</button>
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
  <div class="text-right">
    <nav>
      <ul class="pagination" id="slqPaginador">
        <li class='<?php echo (($page == 1 or $page == 0) ? "disabled" : "active" ) ?>' id="anterior"><a href="#" aria-label="Previous"onclick="paginador(1, '<?php echo routing::getInstance()->getUrlWeb('asignatura', 'index') ?>')"><span aria-hidden="true">&Ll;</span></a></li>
        <?php $count = 0 ?>
        <?php for ($x = 1; $x <= $cntPages; $x++): ?>
          <li class='<?php echo (($page == $x) ? "disabled" : "active" ) ?>' onclick="paginador(<?php echo $x ?>, '<?php echo routing::getInstance()->getUrlWeb('asignatura', 'index') ?>')"><a href="#"><?php echo $x ?> <span class="sr-only">(current)</span></a></li>
          <?php $count++ ?>        
        <?php endfor; ?>
        <li class='<?php echo (($page == $count) ? "disabled" : "active" ) ?>' onclick="paginador(<?php echo $count ?>, '<?php echo routing::getInstance()->getUrlWeb('asignatura', 'index') ?>')" id="anterior"><a href="#" aria-label="Previous"><span aria-hidden="true">&Gg;</span></a></li>
      </ul>
    </nav>
  </div>
</div>
