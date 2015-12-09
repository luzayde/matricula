<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

class estudianteTableClass extends estudianteBaseTableClass {

  public static function getTotalPage($lines) {
    try {
      $sql = "select count(id) AS cantidad "
              . "from " . estudianteTableClass::getNameTable() .
              " where " . estudianteTableClass::DELETED_AT . " is null ";
      $answer = model::getInstance()->prepare($sql);
      $answer->execute();
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return ceil($answer[0]->cantidad / $lines);
    } catch (Exception $exc) {
      throw $exc;
    }
  }

}
