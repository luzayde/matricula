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
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasRequest(asignaturaTableClass::ID_ASIGNATURA)) {

        $fieldsTipoAsignatura = array(
            tipoAsignaturaTableClass::ID_TIPO_ASIGNATURA,
            tipoAsignaturaTableClass::DESCRIPCION
        );

        $this->objTipoAsignatura = tipoAsignaturaTableClass::getAll($fieldsTipoAsignatura, false);

        $fields = array(
            asignaturaTableClass::ID_ASIGNATURA,
            asignaturaTableClass::INTESIDAD_HORARIA,
            asignaturaTableClass::NOMBRE,
            asignaturaTableClass::TIPO_ASIGNATURDA
        );
        $where = array(
            asignaturaTableClass::ID_ASIGNATURA => request::getInstance()->getRequest(asignaturaTableClass::ID_ASIGNATURA)
        );
        $this->objAsignatura = asignaturaTableClass::getAll($fields, true, null, null, null, null, $where);
        $this->defineView('edit', 'asignatura', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('asignatura', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
