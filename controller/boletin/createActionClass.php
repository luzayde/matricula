<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {


      $fecha = request::getInstance()->getPost(cabeceraBoletinTableClass::getNameField
                      (cabeceraBoletinTableClass::FECHA_BOLETIN, true));
      $estudiante = request::getInstance()->getPost(cabeceraBoletinTableClass::getNameField
                      (cabeceraBoletinTableClass::ID_ESTUDIANTE, true));
      $grado = request::getInstance()->getPost(cabeceraBoletinTableClass::getNameField
                      (cabeceraBoletinTableClass::GRADO, true));
      $anoLectivo = request::getInstance()->getPost(cabeceraBoletinTableClass::getNameField
                      (cabeceraBoletinTableClass::ANO_LECTIVO, true));
      $periodo = request::getInstance()->getPost(cabeceraBoletinTableClass::getNameField
                      (cabeceraBoletinTableClass::PERIODO_ACADEMICO, true));
      $observaciones = request::getInstance()->getPost(cabeceraBoletinTableClass::getNameField
                      (cabeceraBoletinTableClass::OBSERVACIONES, true));
      $promedio = request::getInstance()->getPost(cabeceraBoletinTableClass::getNameField
                      (cabeceraBoletinTableClass::PROMEDIO, true));

      $data = array(
          cabeceraBoletinTableClass::FECHA_BOLETIN => $fecha,
          cabeceraBoletinTableClass::ID_ESTUDIANTE => $estudiante,
          cabeceraBoletinTableClass::GRADO => $grado,
          cabeceraBoletinTableClass::ANO_LECTIVO => $anoLectivo,
          cabeceraBoletinTableClass::PERIODO_ACADEMICO => $periodo,
          cabeceraBoletinTableClass::OBSERVACIONES => $observaciones,
          cabeceraBoletinTableClass::PROMEDIO => $promedio,
          cabeceraBoletinTableClass::BOLETIN_ID => 1//provisional
      );
      cabeceraBoletinTableClass::insert($data);
      session::getInstance()->setSuccess("Se ha insertado con exito el registro");
      log::register('Se ha creado un registro con el id: ', cabeceraBoletinTableClass::getNameTable());
      routing::getInstance()->redirect('boletin', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
