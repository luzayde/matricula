<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#estudiante" aria-controls="home" role="tab" data-toggle="tab">Datos del estudiante</a></li>
  <li role="presentation"><a href="#acudiente" aria-controls="profile" role="tab" data-toggle="tab">Acudientes</a></li>
</ul>

<form enctype="multipart/form-data" method="post" action="<?php echo routing::getInstance()->getUrlWeb('estudiante', ((isset($objAsignatura)) ? 'update' : 'create')) ?>">
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="estudiante">

      <table class="table table-responsive table-bordered">
        <tr>
          <th>
            Nombres
          </th>
          <th>
            <input type="text" name="<?php echo estudianteTableClass::getNameField(estudianteTableClass::NOMBRE, true) ?>">
          </th>
        </tr>
        <tr>
          <th>
            Apellidos 
          </th>
          <th>
            <input type="text" name="<?php echo estudianteTableClass::getNameField(estudianteTableClass::APELLIDO, true) ?>">
          </th>
        </tr>
        <tr>
          <th>
            Fecha de nacimiento 
          </th>
          <th>
            <input type="date" name="<?php echo estudianteTableClass::getNameField(estudianteTableClass::NACIMIENTO, true) ?>">
          </th>
        </tr>
        <tr>
          <th>
            Direccion 
          </th>
          <th>
            <input type="text" name="<?php echo estudianteTableClass::getNameField(estudianteTableClass::DIRECCION, true) ?>">
          </th>
        </tr>
        <tr>
          <th>
            Ciudad 
          </th>
          <th>
            <select name='<?php echo estudianteTableClass::getNameField(estudianteTableClass::CIUDAD_ID, true) ?>'>
              <option value="">---</option>
              <?php foreach ($objCiudad as $key): ?>
                <option value="<?php echo $key->id ?>"><?php echo $key->nombre_ciudad ?></option>
              <?php endforeach; ?>
            </select>
          </th>
        </tr>
        <tr>
          <th>
            EPS 
          </th>
          <th>
            <input type="text" name="<?php echo estudianteTableClass::getNameField(estudianteTableClass::EPS, true) ?>">
          </th>
        </tr>
        <tr>
          <th>
            Correo 
          </th>
          <th>
            <input type="text" name="<?php echo estudianteTableClass::getNameField(estudianteTableClass::CORREO, true) ?>">
          </th>
        </tr>
        <tr>
          <th>
            Tipo de sangre 
          </th>
          <th>
            <select name='<?php echo estudianteTableClass::getNameField(estudianteTableClass::TIPO_RH, true) ?>'>
              <option value="">---</option>
              <?php foreach ($objRh as $key): ?>
                <option value="<?php echo $key->id ?>"><?php echo $key->nom_tipo_rh ?></option>
              <?php endforeach; ?>
            </select>
          </th>
        </tr>
        <tr>
          <th>
            Tipo de documento 
          </th>
          <th>
            <select name='<?php echo estudianteTableClass::getNameField(estudianteTableClass::TIPO_ID, true) ?>'>
              <option value="">---</option>
              <?php foreach ($objTipoId as $key): ?>
                <option value="<?php echo $key->id ?>"><?php echo $key->nom_tipo_id ?></option>
              <?php endforeach; ?>
            </select>
          </th>
        </tr>
        <tr>
          <th>
            Numero de identificacion
          </th>
          <th>
            <input type="number" name="<?php echo estudianteTableClass::getNameField(estudianteTableClass::NUMERO_IDENTIFICACION, true) ?>">
          </th>
        </tr>
        <tr>
          <th>
            Foto
          </th>
          <th>
            <input type="file" name="<?php echo estudianteTableClass::getNameField(estudianteTableClass::FOTO, true) ?>">
          </th>
        </tr>

      </table>

    </div>
    <div role="tabpanel" class="tab-pane" id="acudiente">

      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#padre" 
                                                  aria-controls="padre" role="tab" data-toggle="tab">Padre</a></li>
        <li role="presentation"><a href="#madre" 
                                   aria-controls="madre" role="tab" data-toggle="tab">Madre</a></li>
      </ul>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="padre">

          <input type="checkbox"  onclick="mostrarFormPadre()"><span>No existe</span>

          <select id='selectPadre' style='display:block;' name="<?php echo estudianteTableClass::getNameField(estudianteTableClass::ID_ACUDIENTE_PADRE, true) ?>">
            <option value="">...</option>
            <?php foreach ($objPadre as $key): ?>
              <option value="<?php echo $key->id ?>"><?php echo $key->nombre ?><?php echo $key->apellido ?></option>            
            <?php endforeach; ?>
          </select>
          <div style="text-align: center">
            <table class="table table-responsive table-bordered" id='formPadre' style='display:none; align-content: center'>
              <tr>
                <th colspan="2">
                  Informacion del padre
                </th>
              </tr>
              <tr>
                <th>
                  Nombre
                </th>
                <th>
                  <input type="text" name="<?php echo acudientePadreTableClass::getNameField(acudientePadreTableClass::NOMBRE, true) ?>">
                </th>
              </tr>
              <tr>
                <th>
                  Apellidos
                </th>
                <th>
                  <input type="text" name="<?php echo acudientePadreTableClass::getNameField(acudientePadreTableClass::APELLIDO, true) ?>">
                </th>
              </tr>
              <tr>
                <th>
                  Direccion
                </th>
                <th>
                  <input type="text" name="<?php echo acudientePadreTableClass::getNameField(acudientePadreTableClass::DIRECCION, true) ?>">
                </th>
              </tr>
              <tr>
                <th>
                  Telefono
                </th>
                <th>
                  <input type="text" name="<?php echo acudientePadreTableClass::getNameField(acudientePadreTableClass::TELEFONO, true) ?>">
                </th>
              </tr>
              <tr>
                <th>
                  Telefono oficina
                </th>
                <th>
                  <input type="text" name="<?php echo acudientePadreTableClass::getNameField(acudientePadreTableClass::TELEFONO_OFICINA, true) ?>">
                </th>
              </tr>
              <tr>
                <th>
                  Ocupacion
                </th>
                <th>
                  <input type="text" name="<?php echo acudientePadreTableClass::getNameField(acudientePadreTableClass::OCUPACION, true) ?>">
                </th>
              </tr>
              <tr>
                <th>
                  Email
                </th>
                <th>
                  <input type="text" name="<?php echo acudientePadreTableClass::getNameField(acudientePadreTableClass::EMAIL, true) ?>">
                </th>
              </tr>
            </table>
          </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="madre" >
          <input type="checkbox"  onclick="mostrarFormMadre()"><span>No existe</span>
          <select id='selecMadre' style='display:block;' name="<?php echo estudianteTableClass::getNameField(estudianteTableClass::ID_ACUDIENTE_MADRE, true) ?>">
            <option value="">...</option>
            <?php foreach ($objMadre as $key): ?>
              <option value="<?php echo $key->id ?>"><?php echo $key->nombre ?><?php echo $key->apellido ?></option>            
            <?php endforeach; ?>
          </select>
          <table class="table table-responsive table-bordered" id='formMadre' style='display:none;'>
            <tr>
              <th colspan="2" class="text-center">
                Informacion de la madre
              </th>
            </tr>
            <tr>
              <th>
                Nombre
              </th>
              <th>
                <input type="text" name="<?php echo acudienteMadreTableClass::getNameField(acudienteMadreTableClass::NOMBRE, true) ?>">
              </th>
            </tr>
            <tr>
              <th>
                Apellidos
              </th>
              <th>
                <input type="text" name="<?php echo acudienteMadreTableClass::getNameField(acudienteMadreTableClass::APELLIDO, true) ?>">
              </th>
            </tr>
            <tr>
              <th>
                Direccion
              </th>
              <th>
                <input type="text" name="<?php echo acudienteMadreTableClass::getNameField(acudienteMadreTableClass::DIRECCION, true) ?>">
              </th>
            </tr>
            <tr>
              <th>
                Telefono
              </th>
              <th>
                <input type="text" name="<?php echo acudienteMadreTableClass::getNameField(acudienteMadreTableClass::TELEFONO, true) ?>">
              </th>
            </tr>
            <tr>
              <th>
                Telefono oficina
              </th>
              <th>
                <input type="text" name="<?php echo acudienteMadreTableClass::getNameField(acudienteMadreTableClass::TELEFONO_OFICINA, true) ?>">
              </th>
            </tr>
            <tr>
              <th>
                Ocupacion
              </th>
              <th>
                <input type="text" name="<?php echo acudienteMadreTableClass::getNameField(acudienteMadreTableClass::OCUPACION, true) ?>">
              </th>
            </tr>
            <tr>
              <th>
                Email
              </th>
              <th>
                <input type="text" name="<?php echo acudienteMadreTableClass::getNameField(acudienteMadreTableClass::EMAIL, true) ?>">
              </th>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>

  <input type="submit" value="<?php echo i18n::__(((isset($objAsignatura)) ? 'update' : 'register')) ?>">
</form>
