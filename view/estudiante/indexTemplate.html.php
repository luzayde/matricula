<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\config\configClass ?>
<?php
use mvc\view\viewClass as view ?>
<?php // header("Content-type: image/jpeg");                              ?>
<?php view::includePartial('default/menuPrincipal') ?>
<div class="container container-fluid">
  <?php echo view::includeHandlerMessage() ?>
  <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
      <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('default', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
          <a href="<?php echo routing::getInstance()->getUrlWeb('estudiante', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
          <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
        </div>
        <table class="table table-bordered table-responsive">
          <thead>
            <tr>
              <th><input type="checkbox" id="chkAll"></th>
              <th>Nombre </th> <th>Apellido </th>
              <th> Fecha de nacimiento</th> <th> Telefono</th>
              <th> Direccion</th>  <th> Correo</th>
              <th> EPS</th> 
<!--              <th> Tipo de sangre</th> 
              <th> Ciudad</th> <th> Madre</th>
              <th> Padre</th>  <th> Identificacion</th>
              <th> Numero de identificacion</th> <th> Discapacidad</th>
              <th>Cual</th>
              <th>Foto</th>-->
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($objEstudiante as $key): ?>
              <tr>
                <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
                <td><?php echo $key->nombre ?></td>
                <td><?php echo $key->apellido ?></td>
                <td><?php echo $key->fecha_nacimiento ?></td>
                <td><?php echo $key->telefono ?></td>
                <td><?php echo $key->direccion ?></td>
                <td><?php echo $key->correo ?></td>
                <td><?php echo $key->eps ?></td>
  <!--                <td><?php echo $key->tipo_rh_id ?></td>
                <td><?php echo $key->ciudad_id ?></td>
                <td><?php echo $key->acudiente_id_madre ?></td>
                <td><?php echo $key->acudiente_id_padre ?></td>
                <td><?php echo $key->tipo_id_id ?></td>
                <td><?php echo $key->numero_identificacion ?></td>
                <td><?php echo $key->tipo_discapacidad_id ?></td>
                <td><?php echo $key->tipo_discapacidad_id ?></td>
                <td><?php // print estudianteTableClass::mostrarImagen($key->pp)                             ?></td>
                <td><img src="<?php echo $key->pp ?>" alt="---"></td>
                <td><?php // echo $key->pp                             ?></td>-->
                <td>        
                  <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $key->id ?>">Ver</a>
                </td>
              </tr>
              <!-- Modal -->
            <div class="modal fade" id="myModal<?php echo $key->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title modal-lg" id="myModalLabel">Modal title</h4>
                  </div>
                  <div class="modal-body">
                    <div class="container container-fluid">
                      <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3">
                          <div class="thumbnail">
                            <img class="img-circle img-responsive"
                                 src="<?php echo configClass::getUrlBase() . 'photos/' . $key->ruta_foto; ?>"  
                                 height="240" width="180"  alt="No tiene foto"  >
                          </div>
                        </div>
                        <div class="col-sm-9">
                          <h4>Datos del estudiante</h4>
                          <label>Nombre(s): </label>      <?php echo $key->nombre ?><br/>
                          <label>Apellido(s): </label>      <?php echo $key->apellido ?><br/>
                          <label>Fecha de nacimiento: </label>      <?php echo $key->fecha_nacimiento ?><br/>
                          <label>Telefono: </label>      <?php echo $key->telefono ?><br/>
                          <label>Direccion: </label>      <?php echo $key->direccion ?><br/>
                          <label>Correo: </label>      <?php echo $key->correo ?><br/>
                          <label>EPS: </label>      <?php echo $key->eps ?><br/>
                          <label>Tipo de documento: </label>      <?php echo $key->tipo_rh_id ?><br/>
                          <label>Numero de documento: </label>      <?php echo $key->numero_identificacion ?><br/>
                          <label>Ciudad: </label>      <?php echo $key->ciudad_id ?><br/>
                          <label>Tipo de sangre: </label>      <?php echo $key->tipo_rh_id ?><br/>
                          <label>Discapacidad: </label>      <?php echo $key->tipo_discapacidad_id ?><br/>
                          
                          <h4>Acudientes</h4>
                          <label>Nombre(s) del padre: </label>      <?php echo $key->acudiente_id_padre ?><br/>

                        </div>
                      </div>                      
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          </tbody>
        </table>
      </form>
    </div>
    <div class="text-right">
      pagina 
      <select id="slqPaginador" onchange="pagidator(this, '<?php echo routing::getInstance()->getUrlWeb("estudiante", 'index') ?>')">
        <?php for ($x = 1; $x <= $cntPages; $x++): ?>
          <option <?php echo (isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
        <?php endfor; ?>
      </select>
      de <?php echo $cntPages ?>
    </div>
    <div>

    </div>
  </div>
  <?php foreach ($objEstudiante as $key): ?>
    <!--    <div class="item">
          <img style="position: absolute;" src="<?php echo configClass::getUrlBase() . 'photos/' . $key->pp; ?>" alt="---" height="42" width="42">
        </div>-->
  <?php endforeach ?>

</div>

