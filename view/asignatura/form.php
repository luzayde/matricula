<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('asignatura', ((isset($objAsignatura)) ? 'update' : 'create')) ?>">
  <?php if (isset($objAsignatura) == true): ?>
  <input name="<?php echo asignaturaTableClass::getNameField(asignaturaTableClass::ID_ASIGNATURA, true) ?>" 
           value="<?php echo $objAsignatura[0]->id ?>" type="hidden">
  <?php endif ?>
  <table class="table table-responsive table-bordered">
    <tr>
      <th>
        Nombre de la asignatura
      </th>
      <th>
        <input value="<?php echo ((isset($objAsignatura) == true) ? $objAsignatura[0]->nombre : '') ?>"
               type="text" name="<?php echo asignaturaTableClass::getNameField(asignaturaTableClass::NOMBRE, true) ?>">
      </th>
    </tr>
    <tr>
      <th>
        Tipo de asignatura
      </th>  
      <th>
        <select name="<?php echo asignaturaTableClass::getNameField(asignaturaTableClass::TIPO_ASIGNATURDA, true) ?>">
          <option value="">....</option>
          <?php foreach ($objTipoAsignatura as $key): ?>
            <option value="<?php echo $key->id ?>"><?php echo $key->desc_tipo_asignatura ?></option>
          <?php endforeach; ?>
        </select>
      </th>
    </tr>
    <tr>
      <th>
        Intesidad Horaria
      </th>
      <th>
        <input value="<?php echo ((isset($objAsignatura) == true) ? $objAsignatura[0]->intesidad_horaria : '') ?>"
               type="text" name="<?php echo asignaturaTableClass::getNameField(asignaturaTableClass::INTESIDAD_HORARIA, true) ?>">          
      </th>
    </tr>
  </table>
  <input type="submit" value="<?php echo i18n::__(((isset($objAsignatura)) ? 'update' : 'register')) ?>">
</form>