<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('boletin', ((isset($objBoletin)) ? 'update' : 'create')) ?>">
  <?php if (isset($objBoletin) == true): ?>
    <input name="<?php echo cabeceraBoletinTableClass::getNameField(cabeceraBoletinTableClass::ID_CABECERA_BOLETIN, true) ?>" 
           value="<?php echo $objBoletin[0]->id ?>" type="hidden">
         <?php endif ?>
  <table class="table table-responsive table-bordered">
    <tr>
      <th>
        Fecha del boletin
      </th>
      <th>
        <input type="datetime-local" name="<?php echo cabeceraBoletinTableClass::getNameField(cabeceraBoletinTableClass::FECHA_BOLETIN, true) ?>">
      </th>
    </tr>
    <tr>
      <th>
        Estudiante
      </th>  
      <th>
        <select name="<?php echo cabeceraBoletinTableClass::getNameField(cabeceraBoletinTableClass::ID_ESTUDIANTE, true) ?>">
          <option value="">....</option>
          <?php foreach ($objEstudiante as $key): ?>
            <option value="<?php echo $key->id ?>"><?php echo $key->nombre . " " . $key->apellido ?> </option>
          <?php endforeach; ?>
        </select>
      </th>
    </tr>
    <tr>
      <th>
        Grado
      </th>  
      <th>
        <select name="<?php echo cabeceraBoletinTableClass::getNameField(cabeceraBoletinTableClass::GRADO, true) ?>">
          <option value="">....</option>
          <?php foreach ($objGrado as $key): ?>
            <option value="<?php echo $key->id ?>"><?php echo $key->grado . " " . $key->director_grupo_id ?></option>
          <?php endforeach; ?>
        </select>
      </th>
    </tr>
    <tr>
      <th>
        Año lectivo
      </th>
      <th>
        <input value="<?php echo ((isset($objBoletin) == true) ? $objBoletin[0]->ano_electivo : '') ?>"
               type="text" name="<?php echo cabeceraBoletinTableClass::getNameField(cabeceraBoletinTableClass::ANO_LECTIVO, true) ?>">          
      </th>
    </tr>
    <tr>
      <th>
        Periodo academico
      </th>
      <th>
        <input value="<?php echo ((isset($objBoletin) == true) ? $objBoletin[0]->periodo_academico : '') ?>"
               type="text" name="<?php echo cabeceraBoletinTableClass::getNameField(cabeceraBoletinTableClass::PERIODO_ACADEMICO, true) ?>">          
      </th>
    </tr>
    <tr>
      <th>
        Promedio
      </th>
      <th>
        <input value="<?php echo ((isset($objBoletin) == true) ? $objBoletin[0]->promedio : '') ?>"
               type="number" name="<?php echo cabeceraBoletinTableClass::getNameField(cabeceraBoletinTableClass::PROMEDIO, true) ?>">          
      </th>
    </tr>
    <tr>
      <th>
        Observaciones
      </th>
      <th>
        <textarea value="<?php echo ((isset($objBoletin) == true) ? $objBoletin[0]->ibservaciones : '') ?>"
                  name="<?php echo cabeceraBoletinTableClass::getNameField(cabeceraBoletinTableClass::OBSERVACIONES, true) ?>">          
        </textarea>
      </th>
    </tr>
  </table>
  <input type="submit" value="<?php echo i18n::__(((isset($objBoletin)) ? 'update' : 'register')) ?>">
</form>