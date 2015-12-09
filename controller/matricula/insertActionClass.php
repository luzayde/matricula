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

      $fieldsAcudiente = array(
      acudienteTableClass::ID_ACUDIENTE, acudienteTableClass::ID_ACUDIENTE
      );
      $this->objAcudiente = acudienteTableClass::getAll($fieldsAcudiente, true);
      
      $fieldsRector = array(
          usuarioTableClass::ID, usuarioTableClass::USER
      );
      $whereRector = array(
      usuarioTableClass::CARGO => acudienteTableClass::RECTOR
      );
      $this->objRector = usuarioTableClass::getAll($fieldsRector, true, null,  null,  null,  null, $whereRector);
      $this->defineView("insert", "matricula", session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
