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

      $where = null;
      
      $fields = array(
          asignaturaTableClass::COD_TIPO_ASIGNATURA,
          asignaturaTableClass::ID_ASIGNATURA,
          asignaturaTableClass::INTESIDAD_HORARIA,
          asignaturaTableClass::NOMBRE,
          asignaturaTableClass::TIPO_ASIGNATURDA
      );

      $orderBy = array(
          asignaturaTableClass::NOMBRE
      );

      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $page = config::getRowGrid() * (request::getInstance()->getGet('page') - 1);
      }
      $fieldCount = array(
          asignaturaTableClass::ID_ASIGNATURA
      );
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
      } else {
        $this->page = $page;
      }
      $lines = config::getRowGrid();
      $this->cntPages = asignaturaTableClass::count($fieldCount, true, $lines, $where);
      $this->objAsignatuas = asignaturaTableClass::getAll($fields, true, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
      $this->defineView('index', 'asignatura', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
