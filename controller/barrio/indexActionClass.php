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
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $fieldsBarrio = array(
          barrioTableClass::ID_BARRIO,
          barrioTableClass::NOMBRE_BARRIO,
          barrioTableClass::DELETED_AT,
          barrioTableClass::ID_CIUDAD
      );

      $orderBy = arraY(
          barrioTableClass::NOMBRE_BARRIO
      );

      $this->objBarrio = barrioTableClass::getAll($fieldsBarrio, true, $orderBy, "ASC");
      $this->defineView("index", "barrio", session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
