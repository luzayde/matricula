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
      if (request::getInstance()->hasGet(estudianteTableClass::ID_ESTUDIANTE, true)) {
        $id = request::getInstance()->getGet(estudianteTableClass::ID_ESTUDIANTE, true);
        $fields2 = array(
            estudianteTableClass::APELLIDO,
            estudianteTableClass::CORREO, estudianteTableClass::DIRECCION,
            estudianteTableClass::EPS, estudianteTableClass::ID_ESTUDIANTE,
            estudianteTableClass::NOMBRE,
            estudianteTableClass::TELEFONO,
            estudianteTableClass::NACIMIENTO
        );
        $whereId = array(estudianteTableClass::ID_ESTUDIANTE => $id);
        $this->objEstudiante = estudianteTableClass::getAll($fields2, true, null, null, null, null, $whereId);
        exit();
      } else {
        $fields = array(
            estudianteTableClass::APELLIDO,
            estudianteTableClass::CORREO,
            estudianteTableClass::DIRECCION,
            estudianteTableClass::EPS,
            estudianteTableClass::ID_ESTUDIANTE,
            estudianteTableClass::NOMBRE,
            estudianteTableClass::TELEFONO,
            estudianteTableClass::NACIMIENTO,
            estudianteTableClass::CIUDAD_ID,
            estudianteTableClass::FOTO,
            estudianteTableClass::ID_ACUDIENTE_MADRE,
            estudianteTableClass::ID_ACUDIENTE_PADRE,
            estudianteTableClass::NUMERO_IDENTIFICACION,
            estudianteTableClass::TIPO_RH,
            estudianteTableClass::TIPO_ID,
            estudianteTableClass::TIPO_DISCAPACIDAD
        );
        $orderBy = array(
            estudianteTableClass::NOMBRE
        );
        $page = 0;
        if (request::getInstance()->hasGet("page")) {
          $this->page = request::getInstance()->getGet("page");
          $page = request::getInstance()->getGet("page") - 1;
          $page = $page * config::getRowGrid();
        }
        $this->cntPages = estudianteTableClass::getTotalPage(config::getRowGrid());
        $this->objEstudiante = estudianteTableClass::getAll($fields, true, $orderBy, 'ASC', config::getRowGrid(), $page);
        $this->defineView('index', 'estudiante', session::getInstance()->getFormatOutput());
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
