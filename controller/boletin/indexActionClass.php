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
      cabeceraBoletinTableClass::ANO_LECTIVO,
      cabeceraBoletinTableClass::FECHA_BOLETIN,
      cabeceraBoletinTableClass::GRADO,
      cabeceraBoletinTableClass::ID_CABECERA_BOLETIN,
      cabeceraBoletinTableClass::ID_ESTUDIANTE,
      cabeceraBoletinTableClass::OBSERVACIONES,
      cabeceraBoletinTableClass::PERIODO_ACADEMICO,
      cabeceraBoletinTableClass::PROMEDIO
      );

      $orderBy = array(
      cabeceraBoletinTableClass::ID_ESTUDIANTE
      );
      $this->objBoletin = cabeceraBoletinTableClass::getAll($fields, true, $orderBy, 'ASC');
      $this->defineView('index', 'boletin', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
