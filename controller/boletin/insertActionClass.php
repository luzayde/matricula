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

      $fieldsEstudiante = array(
      estudianteTableClass::ID_ESTUDIANTE,
      estudianteTableClass::NOMBRE,
      estudianteTableClass::APELLIDO
      );
      $this->objEstudiante= estudianteTableClass::getAll($fieldsEstudiante, false);
      $fieldsGrado = array(
      gradoTableClass::ID_GRADO,
      gradoTableClass::GRADO,
      gradoTableClass::ID_DIRECTOR_GRUṔO
      );
      $this->objGrado = gradoTableClass::getAll($fieldsGrado, false);
      $this->defineView("insert", "boletin", session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
