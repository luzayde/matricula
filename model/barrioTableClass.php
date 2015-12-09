<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

class barrioTableClass extends barrioBaseTableClass {

  public static function nombreCiudad($id) {
    $nombre = "";
    $fieldsCiudad = array(
        ciudadTableClass::ID_CIUDAD,
        ciudadTableClass::NOMBRE_CIUDAD
    );

    $objCiudad = ciudadTableClass::getAll($fieldsCiudad, true);

    foreach ($objCiudad as $key) {
      if ($key->id == $id) {
        $nombre = $key->nombre_ciudad;
      }
    }
    return $nombre;
  }

}
