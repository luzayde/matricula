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

      $fieldsAcudiente = array(
          acudienteTableClass::APELLIDO,
          acudienteTableClass::DIRECCION,
          acudienteTableClass::EMAIL,
          acudienteTableClass::ESTADO,
          acudienteTableClass::ID_ACUDIENTE,
          acudienteTableClass::NOMBRE,
          acudienteTableClass::OCUPACION,
          acudienteTableClass::TELEFONO,
          acudienteTableClass::TELEFONO_OFICINA,
          acudienteTableClass::TIPO_ACUDIENTE
      );

      $orderBy = array(
          acudienteTableClass::ID_ACUDIENTE
      );
      $this->objAcudientes = acudienteTableClass::getAll($fieldsAcudiente, true, $orderBy, 'ASC');
      $this->defineView('index', 'acudiente', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
