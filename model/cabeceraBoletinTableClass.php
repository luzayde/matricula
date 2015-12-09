<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

class cabeceraBoletinTableClass extends cabeceraBoletinBaseTableClass {

//Metodo para retornar el nombre del estudiante
  public static function retornarNombre($id) {
    $nom = "";
    $field = arraY(
        estudianteTableClass::ID_ESTUDIANTE,
        estudianteTableClass::APELLIDO,
        estudianteTableClass::NOMBRE
    );
    $objEstudiante = estudianteTableClass::getAll($field, true);

    foreach ($objEstudiante as $key) {
      if ($key->id == $id) {
        $nom = $key->nombre . " " . $key->apellido;
      }
    }
    return $nom;
  }

}
