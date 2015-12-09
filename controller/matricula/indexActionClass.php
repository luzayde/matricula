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
      $fields = array(
      matriculaTableClass::DIRECCION_ACUDIENTE,
      matriculaTableClass::ESCUELA_PROCEDENCIA,
      matriculaTableClass::ESTADO,
      matriculaTableClass::ESTUDIANTE_ID,
      matriculaTableClass::FECHA_DOC,
      matriculaTableClass::FECHA_EGRESO,
      matriculaTableClass::FECHA_INGRESO,
      matriculaTableClass::GRADO_INGRESO,
      matriculaTableClass::ID_ACUDIENTE,
      matriculaTableClass::ID_MATRICULA,
      matriculaTableClass::OBSERVACIONES,
      matriculaTableClass::TELEFONO_ACUDIENTE,
      matriculaTableClass::USUARIO_ID_RECTOR,
      matriculaTableClass::USUARIO_ID_SECRETARIA
      );
      $orderBy = array(
      matriculaTableClass::FECHA_INGRESO
      );
      $this->objMatricula = matriculaTableClass::getAll($fields, true, $orderBy, 'ASC');
      $this->defineView('index', 'matricula', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
