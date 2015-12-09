<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>

<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('barrio', 'create') ?>">
  <table class="table table-responsive table-bordered">
    <tr>
      <th>
        Nombre del barrio
      </th>
      <th>
        <input type="text" name="<?php echo barrioTableClass::getNameField(barrioTableClass::NOMBRE_BARRIO, true) ?>">
      </th>
    </tr>
    <tr>
      <th>
        Ciudad
      </th>  
      <th>
        <select name="<?php echo barrioTableClass::getNameField(barrioTableClass::ID_CIUDAD, true) ?>">
          <option value="">....</option>
          <?php foreach ($objCiudad as $key): ?>
            <option value="<?php echo $key->id ?>"><?php echo $key->nombre_ciudad ?></option>
          <?php endforeach; ?>
        </select>
      </th>
    </tr>
  </table>
  <input type="submit" value="Registrar">
</form>