<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class insertActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $fieldsTipoAcudiente = array(
          tipoAcudienteTableClass::ID_TIPO_ACUDIENTE,
          tipoAcudienteTableClass::DESCRIPCION
      );

      $this->objTipoAcudiente = tipoAcudienteTableClass::getAll($fieldsTipoAcudiente, true);
      $this->defineView("insert", "acudiente", session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}